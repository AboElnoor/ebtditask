<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//View all categories
Route::get('/', 'CategoryController@index');

//View single category including all products
Route::get('/category/{category}', 'CategoryController@single');

//View single product
Route::get('/product/{product}', 'ProductController@single');

//Authorized user
Route::group(['middleware' => ['auth']], function () {
    //Create new category
    Route::post('/category', 'CategoryController@create');

    //Delete category
    Route::delete('/category/{category}', 'CategoryController@delete');

    //Update category
    Route::put('/category/{category}', 'CategoryController@update');

    //Create new product
    Route::post('/product', 'ProductController@create');

    //Delete product
    Route::delete('/product/{product}', 'ProductController@delete');

    //Update product
    Route::put('/product/{product}', 'ProductController@update');
});

Route::auth();

Route::get('/home', 'HomeController@index');
