<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products');
Route::get('products/{product}/buy', 'App\Http\Controllers\ProductController@buy')->name('products.buy');
Route::post('products/{product}/charge', 'App\Http\Controllers\ProductController@charge')->name('products.charge');
