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
// api สำหรับที่อยู่
Route::get('/province', 'API\DistrictController@provinces');
Route::get('/province/{province_code}/amphoe', 'API\DistrictController@amphoes');
Route::get('/province/{province_code}/amphoe/{amphoe_code}/district', 'API\DistrictController@districts');
Route::get('/province/{province_code}/amphoe/{amphoe_code}/district/{district_code}', 'API\DistrictController@detail');

Route::post('image/add/{pid}', 'API\UploadController@add');
Route::post('image/delete/{pid}', 'API\UploadController@delete');
Route::get('product/{pid}', 'API\ProductController@getDetail');
Route::get('product/{pid}/{size}', 'API\ProductController@getDetail');
Route::post('filter/product', 'API\ProductController@filter');
Route::post('filter/frontend/product', 'API\ProductController@filterFrontend');
Route::post('cart/products', 'API\ProductController@getProducts');
Route::post('cart/colors', 'API\ProductController@getColor');
Route::post('cart/product/details', 'API\ProductController@getProductDetail');
Route::post('checkout', 'API\CheckoutController@checkout');