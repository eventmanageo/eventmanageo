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
Route::get('multi',function(){
    return view("end_user.multi");
});


Route::get("insertform","multiInsertController@insertform");
Route::post("insert","multiInsertController@insert");
///wedding services add and redirected
/*Route::get('login', function () {
    if(Auth::check()) {
        return redirect('home');
    } else {
        return view('auth.login');
    }
});*/

// services all url of end user




Route::get('invites','EnduserViewController@invites');

Route::get('catering','EnduserViewController@catering');
Route::post('catering_store','EnduserViewController@catering_store');


Route::get('makup','EnduserViewController@makup');
Route::post('makup_store','EnduserViewController@makup_store');


Route::get('photo','EnduserViewController@photo');
Route::post('photographer','EnduserViewController@photographer');



Route::get('decorator','EnduserViewController@decorator');
Route::post('decoration','EnduserViewController@decoration');


Route::get('sound','EnduserViewController@sound');
Route::post('sound_DJ','EnduserViewController@sound_DJ');


Route::get('transport','EnduserViewController@transport');
Route::post('transport_store','EnduserViewController@transport_store');


// user profile
Route::get('profile','userProfileController@index');
Route::post('profile_update','userProfileController@update');

// cart added display
Route::get('view_service','serviceCartController@ViewService');

// delete added cart
Route::get('deleted_caterer/{id}','serviceCartController@delete_caterer');



// pakages route
Route::get('pakages_caterer','serviceCartController@pakages_caterer');



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

Route::get('/allocate/event/manager','AdminController@showEventManagerAllocatePage');
Route::get('/allocated/event/manager','AdminController@showEventManagerAllocatedPage');

Route::get('getEventManagerListAjax','AdminController@returnEventMangerList');

Route::get('/checkEventManagerAvailability','AdminController@checkEventManagerAvailability');
Route::get('/getEventManagerName','AdminController@showEventManagerDetails');

Route::get('/list/package/{vendorType}','VendorController@showListPackage')->name('listpackage');
Route::post('delete/package','VendorController@deletePackage');

// admin profile
Route::get('admin/profile','AdminController@showprofile');

// vendor profile
Route::get('vendor/profile','AdminController@vendor_profile');

Route::get('/ask-event-details/{eventType}', 'HomeController@redirectToAskEventDetails');
Route::post('/insert-into-event-basic-details', 'HomeController@insertIntoEventBasicDetails');

Route::get('/services/{vendorType}', 'HomeController@redirectToServices');
Route::get('/services/{vendorType}/{itemId}/{vendorId}', 'HomeController@redirectToServiceDetails');

Route::get('getevents','HomeController@returnEvents');

Route::get('saveToEvent', 'HomeController@savetoEvent');
Route::get('/mybag','HomeController@myBag');
Route::get('/mybag/{eventId}','HomeController@showEventItems');
Route::get('/getItem','HomeController@getEventItem');
Route::get('/publishEvent', 'HomeController@publishEvent');

Route::get('/myorder', 'HomeController@myOrder');

Route::get('/vendororder/{vendorType}','VendorController@vendorOrder');
Route::get('/eventDetails', 'VendorController@returnEvents');

Route::get('/removeItem','HomeController@removeItem');
// profile of end user
Route::get('/user/profile','HomeController@viewuserprofile');

Route::get('getEventManagerListAjax','AdminController@returnEventMangerList');



// EVENTMANAGER PAGES

#profile show 
Route::get('profile','ManagerViewController@profile');


#vendoR show
Route::get('vendor','ManagerViewController@index');
Route::get('view-records','ManagerViewController@index');

#vendor update
Route::get('edit-records','ManagerViewController@index');
Route::get('edit/{id}','ManagerViewController@show');
Route::post('edit/{id}','ManagerViewController@edit'); 

#vendor delete
Route::get('delete-records','ManagerViewController@index');
Route::get('delete/{id}','ManagerViewController@destroy'); 


#cart display
Route::get('cart','ManagerCartController@cart');
Route::get('view-records','ManagerCartController@cart');

#cart edit
Route::get('edit-record','ManagerCartController@cart');
Route::get('edits/{id}','ManagerCartController@display');
Route::post('edits/{id}','ManagerCartController@edits'); 

#cart delete
Route::get('delete-record','ManagerCartController@cart');
Route::get('deletes/{id}','ManagerCartController@destroys'); 

# allocate events page 
Route::get('allocate_event','ManagerViewController@allocate');
 
#event details show

#in event add more services
Route::get('/view_detail/{eventId}','ManagerViewController@view_event_detail');
Route::get('/getItem','ManagerViewController@getEventItem');

Route::get('/confirm/{eventId}','ManagerViewController@confirmEvent');

