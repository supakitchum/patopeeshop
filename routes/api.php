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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
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
Route::get('check-stock/{aid}', 'API\CheckoutController@checkout');

//stat api
Route::get('stat/line-chart', 'API\StatController@lineChart');

Route::post('payments/kbank/bill-payment/inquiry', '\App\Http\Controllers\Services\Payments\KbankService@BillLookup');
Route::post('payments/kbank/bill-payment/payment', '\App\Http\Controllers\Services\Payments\KbankService@BillPayment');
Route::get('payments/kbank/qr/callback', '\App\Http\Controllers\Services\Payments\KbankService@QrCallback');
Route::post('payments/kbank/qr/callback', [\App\Http\Controllers\Payment\KbankController::class,'callBack']);

Route::group(['name' => 'api.', 'prefix' => 'v1', 'middleware' => \App\Http\Middleware\PartnerApi::class], function () {
    Route::post('payments/kbank/bill', [\App\Http\Controllers\Payment\KbankController::class, 'createQR']);
    Route::post('payments/kbank/cancel', [\App\Http\Controllers\Payment\KbankController::class, 'cancelBill']);
});
