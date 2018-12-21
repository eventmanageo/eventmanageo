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

Route::view('/', 'welcome');

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
Route::view('/admin','admin')->middleware('auth:admin');
Route::view('/vendor','vendor')->middleware('auth:vendor');

Route::get('admin/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::post('admin/password/reset','Auth\AdminResetPasswordController@reset');
Route::get('admin/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

Route::get('vendor/password/reset','Auth\VendorForgotPasswordController@showLinkRequestForm')->name('vendor.password.request');
Route::post('vendor/password/email','Auth\VendorForgotPasswordController@sendResetLinkEmail')->name('vendor.password.email');
Route::post('vendor/password/reset','Auth\VendorResetPasswordController@reset');
Route::get('vendor/password/reset/{token}','Auth\VendorResetPasswordController@showResetForm')->name('vendor.password.reset');