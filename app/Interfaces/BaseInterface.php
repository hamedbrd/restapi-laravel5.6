<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: hamed
 * Date: 10/30/18
 * Time: 12:16 PM
 */

namespace App\Interfaces;


interface BaseInterface
{
    /**
     * @return object
     */
    public function index(): object;

    /**
     * @param $id
     * @return object
     */
    public function destroy($id): object;

    /**
     * @param $id
     * @return object
     */
    public function show($id): object;

}