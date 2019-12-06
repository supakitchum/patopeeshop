<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('backend.')->middleware('auth:admin')->prefix('backend')->group(function () {
    Route::get('/', 'Backend\HomeController@index')->name('dashboard');
    Route::get('stocks', 'Backend\StockController@index')->name('stocks');
    Route::resource('catalogs', 'Backend\CatalogController');
    Route::resource('colors', 'Backend\ColorController');
    Route::resource('orders', 'Backend\OrderController');
    Route::resource('payments', 'Backend\PaymentController');
    Route::resource('products', 'Backend\ProductController');
    Route::resource('receipts', 'Backend\ReceiptController');
    Route::resource('reports', 'Backend\ReportController');
    Route::resource('senders', 'Backend\SenderController');
    Route::resource('profile', 'Backend\ProfileController');
    Route::resource('customers', 'Backend\CustomerController');
    Route::resource('sizes', 'Backend\SizeController');
});

Auth::routes();
Route::get('backend/login', 'Auth\AdminLoginController@showLoginForm')->name('backend.login');
Route::post('backend/login', ['as' => 'admin-login', 'uses' => 'Auth\AdminLoginController@login']);
Route::get('backend/logout', 'Auth\AdminLoginController@logout')->name('backend.logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product-details/{pid}', 'HomeController@product_details')->name('product_details');
Route::get('/cart', function () {
    return view('frontend.cart');
});
Route::get('/checkout', function () {
    return view('frontend.checkout');
});
Route::resource('/product', 'Frontend\ProductController');