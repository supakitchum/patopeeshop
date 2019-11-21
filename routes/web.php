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
    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('dashboard');
    Route::resource('catalogs','Backend\CatalogController');
    Route::resource('colors','Backend\ColorController');
    Route::resource('orders','Backend\OrderController');
    Route::resource('payments','Backend\PaymentController');
    Route::resource('products','Backend\ProductController');
    Route::resource('receipts','Backend\ReceiptController');
    Route::resource('reports','Backend\ReportController');
    Route::resource('senders','Backend\SenderController');
    Route::resource('sizes','Backend\SizeController');
});

Auth::routes();
Route::get('backend/login', 'Auth\AdminLoginController@showLoginForm')->name('backend.login');
Route::post('backend/login', ['as'=>'admin-login','uses'=>'Auth\AdminLoginController@login']);
Route::get('backend/logout','Auth\AdminLoginController@logout')->name('backend.logout');

Route::get('/home', 'HomeController@index')->name('home');
