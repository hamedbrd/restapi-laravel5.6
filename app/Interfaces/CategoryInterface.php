<?php
/**
 * Created by PhpStorm.
 * User: hamed
 * Date: 10/30/18
 * Time: 12:15 PM
 */

namespace App\Interfaces;


use App\Http\Requests\CategoryRequest;

interface CategoryInterface extends BaseInterface
{
    /**
     * @param CategoryRequest $request
     * @return mixed
     */
    public function store(CategoryRequest $request);

    /**
     * @param CategoryRequest $request
     * @param $id
     * @return mixed
     */
    public function update(CategoryRequest $request, $id);


}