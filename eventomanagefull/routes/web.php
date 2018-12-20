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

Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/vendor', 'Auth\LoginController@showVendorLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/vendor', 'Auth\RegisterController@showVendorRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/vendor', 'Auth\LoginController@vendorLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/vendor', 'Auth\RegisterController@createVendor');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin','admin');
Route::view('/vendor','vendor');
