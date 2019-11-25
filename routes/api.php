<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('image/add/{pid}','API\UploadController@add');
Route::post('image/delete/{pid}','API\UploadController@delete');
Route::get('product/{pid}','API\ProductController@getDetail');
Route::get('product/{pid}/{size}','API\ProductController@getDetail');
Route::post('filter/product','API\ProductController@filter');
