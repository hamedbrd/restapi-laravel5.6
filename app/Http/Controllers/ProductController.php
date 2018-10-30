<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Interfaces\ProductInterface;
use App\Interfaces\UserInterface;
use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller implements ProductInterface
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): object
    {
        try {

            return ProductResource::collection(Product::paginate(2));
        } catch (\Exception $e) {
            abort(404);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request): object
    {
        try {
            $all = $request->all();
            $all['user_id'] = $this->userId;
            $product = Product::create($all);


            $product->categories()->attach($request->cat_ids);

            $product['categories'] = $product->categor;
            return new ProductResource($product);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): object
    {
        try {

            $product = Product::select('id', 'name', 'price', 'created_at', 'updated_at')->findorfail($id);
            $product['categories'] = $product->categories;
            return new ProductResource($product);

        } catch (\Exception $e) {
            abort(404);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id): object
    {
        try {

            $product = Product::findorfail($id);
            $product->update($request->all());

            if (isset($request->cat_ids) && !empty($request->cat_ids)) {

                $product->categories()->detach($product->categories);
                $product->categories()->attach($request->cat_ids);
            }


            $product = Product::findorfail($id);
            $product['categories'] = $product->categories;

            return new ProductResource($product);

        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): object
    {
        try {

            $product = Product::findorfail($id);
            $product->delete();

            return new ProductResource($product);

        } catch (\Exception $e) {
            abort(404);
        }
    }
}
