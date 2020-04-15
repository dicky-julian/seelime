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
Route::get('/', 'IndexController@dashboard');

// Authentication
Route::match(['get', 'post'], '/login', 'AuthController@authLogin');
Route::match(['get', 'post'], '/register', 'AuthController@authRegister');

// Customer
Route::get('/customer', 'CustomerController@customer');
Route::match(['get', 'post'], '/add_customer', 'IndexController@add_customer');

// Menu
Route::get('/menus', 'MenuController@menu');
Route::match(['get', 'post'], '/add_menu', 'MenuController@add_menu');
Route::match(['get', 'post'], '/update_menu/{id}', 'MenuController@update_menu');
Route::get('/delete_menu/{id}', 'MenuController@delete_menu');
Route::match(['get', 'post'], '/find_menu', 'MenuController@find_menu');

// Transaksi
Route::get('/transaksi', 'TransaksiController@transaksi');
Route::match(['get', 'post'], '/add_transaksi', 'TransaksiController@add_transaksi');
Route::get('/delete_transaksi/{id_pesanan}','TransaksiController@delete_transaksi');