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

Route::get('/login', ['uses'=>'Auth\LoginController@show', 'as' => 'login']);
Route::post('/login', ['uses'=>'Auth\LoginController@login', 'as' => 'login']);
Route::get('/register', ['uses'=>'Auth\RegisterController@show', 'as' => 'register']);
Route::post('/register', ['uses'=>'Auth\RegisterController@register', 'as' => 'register']);
Route::get('/payment', ['uses'=>'PaymentController@show', 'as' => 'payment']);
Route::post('/payment', ['uses'=>'PaymentController@payment', 'as' => 'payment']);
Route::get('/', ['uses'=>'HomeController@show', 'as' => 'home']);
Route::get('/logout', ['uses'=>'Auth\LoginController@logout', 'as' => 'logout']);
Route::get('/product', ['uses'=>'ProductController@show', 'as' => 'product']);
Route::post('/product', ['uses'=>'ProductController@addProduct', 'as' => 'product']);
Route::get('/delete/{id}', ['uses'=>'ProductController@deleteProduct', 'as' => 'delete_product']);