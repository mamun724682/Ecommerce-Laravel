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

Route::group(['namespace' => 'Frontend'], function() {
    Route::get('/', 'HomeController@showHome')->name('frontend.home');
    Route::get('product/{slug}', 'ProductController@showDetails')->name('frontend.product.details');

    Route::post('cart/add', 'CartController@addToCart')->name('cart.add');
    Route::get('cart', 'CartController@showCart')->name('cart.show');
    Route::post('cart/remove', 'CartController@removeFromCart')->name('cart.remove');
    Route::get('cart/clear', 'CartController@clearCart')->name('cart.clear');

    Route::get('checkout', 'CartController@checkout')->name('checkout');

    // Route::get('login', 'AuthController@showLoginPage')->name('login');
    // Route::post('login', 'AuthController@processLogin')->name('login');
});