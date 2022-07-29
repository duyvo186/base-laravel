<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(
        [
            'namespace' => 'Admin',
            'prefix' => 'admin/login',
            'as' => 'admin.',
        ],
        function () {
            // Login
            Route::get('','LoginController@index');
            Route::post('','LoginController@store')->name('login');
        }
    );
    Route::group(
        [
            'namespace' => 'Admin',
            'prefix' => 'admin',
            'as' => 'admin.',
//            'middleware' => 'auth'
        ],
        function () {
            // Home
            Route::get('','MainController@index')->name('home');

            // Two Service: Upload Product, Invoice Search
            Route::get('invoice/search', 'InvoiceController@filterSearch')->name('invoice.search');
            Route::get('customer/search', 'CustomerController@filterSearch')->name('customer.search');
            Route::post('upload/services', 'UploadController@store');
            Route::get('/testCrawler', 'CrawlerController@index');

            // Four main resource
            Route::resource('category', 'CategoryController')->except('edit');
            Route::resource('product', 'ProductController');
            Route::resource('customer', 'CustomerController');
            Route::resource('invoice', 'InvoiceController');
            Route::resource('invoiceProduct', 'InvoiceProductController');
        }
    );
});


