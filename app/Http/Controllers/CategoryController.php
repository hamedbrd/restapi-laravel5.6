<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Interfaces\CategoryInterface;
use App\Interfaces\UserInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller implements CategoryInterface
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): object
    {
        try {

            return CategoryResource::collection(Category::paginate());

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
    public function store(CategoryRequest $request): object
    {
        try {

            $all = $request->all();
            $all['user_id'] = $this->userId;
            $category = Category::create($all);

            return new CategoryResource($category);

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

            $category = Category::select('id', 'title')->findorfail($id);
            return new CategoryResource($category);

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
    public function update(CategoryRequest $request, $id): object
    {
        try {

            $category = Category::findorfail($id);
            $category->update($request->all());

            return new CategoryResource($category);

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

            $category = Category::findorfail($id);
            $category->delete();

            return new CategoryResource($category);

        } catch (\Exception $e) {
            abort(404);
        }
    }
}
