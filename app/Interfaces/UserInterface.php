<?php
/**
 * Created by PhpStorm.
 * User: hamed
 * Date: 10/30/18
 * Time: 12:43 AM
 */

namespace App\Interfaces;


use App\Http\Requests\UserFormRequest;

interface UserInterface extends BaseInterface
{


    /**
     * @param UserFormRequest $request
     * @return mixed
     */
    public function store(UserFormRequest $request);

    /**
     * @param UserFormRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UserFormRequest $request, $id);


}