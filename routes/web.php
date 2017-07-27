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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', ['as' => 'products', 'uses' => 'Products@displayProducts']);

Route::get('/cart', ['as' => 'products', 'uses' => 'Products@displayProducts']);

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', ['as' => 'cart', 'uses' => 'Cart@index']); 
    //route: /cart
     Route::post('/add-product', ['as' => 'add-product-cart', 'uses' => 'Cart@addProduct']); 
    //route: /cart/add-product
    Route::get('/empty-cart', ['as' => 'empty-cart', 'uses' => 'Cart@emptyCart']); 
    //route: /cart/empty-cart
});

