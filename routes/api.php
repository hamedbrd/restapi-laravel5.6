<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1/'], function (\Illuminate\Routing\Router $router) {

    $router->post('register.json', 'Auth\AuthController@register');
    $router->post('login.json', 'Auth\AuthController@login');
});



//Route::group(['prefix' => 'v1/'], function (\Illuminate\Routing\Router $router) {
Route::group(['prefix' => 'v1/', 'middleware' => \App::environment('testing') ? 'test' : 'jwt.auth'], function (\Illuminate\Routing\Router $router) {

    //users routes
    $router->get('users.json', 'UserController@index');
    $router->post('user.json', 'UserController@store');
    $router->get('user/{user}.json', 'UserController@show');
    $router->put('user/{user}.json', 'UserController@update');
    $router->delete('user/{user}.json', 'UserController@destroy');

    //products routes
    $router->get('products.json', 'ProductController@index');
    $router->post('product.json', 'ProductController@store');
    $router->get('product/{product}.json', 'ProductController@show');
    $router->put('product/{product}.json', 'ProductController@update');
    $router->delete('product/{product}.json', 'ProductController@destroy');


    //categories routes
    $router->get('categories.json', 'CategoryController@index');
    $router->post('category.json', 'CategoryController@store');
    $router->get('category/{category}.json', 'CategoryController@show');
    $router->put('category/{category}.json', 'CategoryController@update');
    $router->delete('category/{category}.json', 'CategoryController@destroy');


    $router->middleware('jwt.refresh')->get('/token/refresh', 'Auth\AuthController@refresh');


});


