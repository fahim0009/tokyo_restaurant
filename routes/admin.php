<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DeliveryChargeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\User\UserController;

//admin part start
Route::group(['prefix' =>'admin/', 'middleware' => ['auth', 'is_admin']], function(){
    Route::get('dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard')->middleware('is_admin');
    //profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('profile/{id}', [AdminController::class, 'adminProfileUpdate']);
    Route::post('changepassword', [AdminController::class, 'changeAdminPassword']);
    Route::put('image/{id}', [AdminController::class, 'adminImageUpload']);
    //profile end
    //admin registration
    Route::get('register','App\Http\Controllers\Admin\AdminController@adminindex');
    Route::post('register','App\Http\Controllers\Admin\AdminController@adminstore');
    Route::get('register/{id}/edit','App\Http\Controllers\Admin\AdminController@adminedit');
    Route::put('register/{id}','App\Http\Controllers\Admin\AdminController@adminupdate');
    Route::get('register/{id}', 'App\Http\Controllers\Admin\AdminController@admindestroy');
    //admin registration end
    //agent registration
    Route::get('agent-register','App\Http\Controllers\Admin\AdminController@agentindex');
    Route::post('agent-register','App\Http\Controllers\Admin\AdminController@agentstore');
    Route::get('agent-register/{id}/edit','App\Http\Controllers\Admin\AdminController@agentedit');
    Route::put('agent-register/{id}','App\Http\Controllers\Admin\AdminController@agentupdate');
    Route::get('agent-register/{id}', 'App\Http\Controllers\Admin\AdminController@agentdestroy');
    //agent registration end
    //user registration
    Route::get('user-register','App\Http\Controllers\Admin\AdminController@userindex');
    Route::post('user-register','App\Http\Controllers\Admin\AdminController@userstore');
    Route::get('user-register/{id}/edit','App\Http\Controllers\Admin\AdminController@useredit');
    Route::put('user-register/{id}','App\Http\Controllers\Admin\AdminController@userupdate');
    Route::get('user-register/{id}', 'App\Http\Controllers\Admin\AdminController@userdestroy');
    //user registration end
    //code master 
    Route::resource('softcode','App\Http\Controllers\Admin\SoftcodeController');
    Route::resource('master','App\Http\Controllers\Admin\MasterController');
    //code master end
    //company details
    Route::resource('company-detail','App\Http\Controllers\Admin\CompanyDetailController');
    //company details end
    //slider 
    Route::resource('sliders','App\Http\Controllers\Admin\SliderController');
    Route::get('activeslider','App\Http\Controllers\Admin\SliderController@activeslider');
    //slider end
    Route::resource('seo-settings','App\Http\Controllers\Admin\SeoSettingController');


    Route::resource('role','App\Http\Controllers\RoleController');
    Route::post('roleupdate','App\Http\Controllers\RoleController@roleUpdate');
    Route::resource('staff','App\Http\Controllers\StaffController');


    // category 
    Route::get('/category', [ProductController::class, 'category'])->name('product.category');
    Route::post('/category', [ProductController::class, 'categorystore']);
    Route::get('/category/{id}/edit', [ProductController::class, 'categoryedit']);
    Route::put('/category/{id}', [ProductController::class, 'categoryupdate']);
    Route::get('/category/{id}', [ProductController::class, 'categorydelete']);

    // Product 
    Route::get('/product', [ProductController::class, 'index'])->name('admin.product');
    Route::post('/product', [ProductController::class, 'store']);
    Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/product/{id}', [ProductController::class, 'update']);
    Route::get('/product/{id}', [ProductController::class, 'delete']);

    // coupon 
    Route::get('/coupon', [CouponController::class, 'index'])->name('admin.coupon');
    Route::post('/coupon', [CouponController::class, 'store']);
    Route::get('/coupon/{id}/edit', [CouponController::class, 'edit']);
    Route::put('/coupon/{id}', [CouponController::class, 'update']);
    Route::get('/coupon/{id}', [CouponController::class, 'delete']);
    Route::get('/activecoupon', [CouponController::class, 'activecoupon']);


    // delivery charge 
    Route::get('/delivery-charge', [DeliveryChargeController::class, 'index'])->name('deliverycharge');
    Route::get('/delivery-charge/{id}/edit', [DeliveryChargeController::class, 'edit']);
    Route::post('/delivery-charge/{id}', [DeliveryChargeController::class, 'update']);


});
//admin part end