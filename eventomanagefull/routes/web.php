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

Route::view('/', 'end_user.homepage');

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
Route::view('/eventmanager','eventmanager')->middleware('auth:eventmanager');

Route::get('admin/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::post('admin/password/reset','Auth\AdminResetPasswordController@reset');
Route::get('admin/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

Route::get('vendor/password/reset','Auth\VendorForgotPasswordController@showLinkRequestForm')->name('vendor.password.request');
Route::post('vendor/password/email','Auth\VendorForgotPasswordController@sendResetLinkEmail')->name('vendor.password.email');
Route::post('vendor/password/reset','Auth\VendorResetPasswordController@reset');
Route::get('vendor/password/reset/{token}','Auth\VendorResetPasswordController@showResetForm')->name('vendor.password.reset');

Route::get('admin/eventmanager-reg','AdminController@goToEventManagerRegistration');
Route::post('admin/eventmanager-reg','AdminController@registerEventManager');

//end_user root path
Route::get('homepage',function(){
    return view("end_user.homepage");
});
Route::get('about',function(){
    return view("end_user.about_us");
});
Route::get('gallery',function(){
    return view("end_user.gallery");
});
Route::get('contact',function(){
    return view("end_user.contact");
});

Route::get('service',function(){
    return view("end_user.serv_wedding");
});
Route::get('registermulti',function(){
    return view("end_user.registra_step");
});
Route::get('multi',function(){
    return view("end_user.multi");
});

///wedding services add and redirected
/*Route::get('login', function () {
    if(Auth::check()) {
        return redirect('home');
    } else {
        return view('auth.login');
    }
});*/


Route::get('admin/eventmanager-remove','AdminController@goToEventManagerRemove');
Route::delete('admin/eventmanager-remove/{id}','AdminController@removeEventManager');

Route::get('login/eventmanager','Auth\LoginController@showEventManagerLoginForm');
Route::post('login/eventmanager', 'Auth\LoginController@eventmanagerLogin');

Route::get('company/details/{vendorType?}',function($vendorType=null){
    if($vendorType===null){
        return redirect()->to('vendor');
    }else{
        return view('vendor.companydetails');
    }
});

Route::post('company/details/{vendorType}',['uses' => 'VendorController@saveVendorCompanyDetails']);

Route::get('{vendorType}/add/service','VendorController@redirectToService');
Route::post('{vendorType}/add/service',['uses' => 'VendorController@saveVendorService']);

Route::get('{vendorType}/make/package/{dinetime?}','VendorController@goToMakePackageWithData');
Route::post('/saveToPacakage','VendorController@savePackage');

Route::get('/list/service/{vendorType}','VendorController@showListServicePage')->name('listservice');

Route::post('delete/service','VendorController@deleteService');

Route::get('/edit/service/{id}/{vendorType}','VendorController@editServiceShowFormwithData');
Route::post('edit/service/{id}/{vendorType}','VendorController@editService');

Route::get('event/allocated','EventManagerController@showAllocatedEventPage');