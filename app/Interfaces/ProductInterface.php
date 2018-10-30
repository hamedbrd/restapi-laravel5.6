<?php
/**
 * Created by PhpStorm.
 * User: hamed
 * Date: 10/30/18
 * Time: 12:15 PM
 */

namespace App\Interfaces;


use App\Http\Requests\ProductRequest;

interface ProductInterface extends BaseInterface
{
    /**
     * @param ProductRequest $request
     * @return object
     */
    public function store(ProductRequest $request): object;

    /**
     * @param ProductRequest $request
     * @param $id
     * @return object
     */
    public function update(ProductRequest $request, $id): object;


}