<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Api\RegisterController; 
use App\Http\Controllers\Api\LoginController; 
use App\Http\Controllers\Api\ProductController; 
use App\Http\Controllers\Api\UserController; 
use App\Http\Controllers\Api\OrderController; 
use App\Http\Controllers\Api\CartController; 
use App\Http\Controllers\Api\DeliveryChargeController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user/profileinfo',[UserController::class,'profileInfo']);
    Route::post('/user/profile/update',[UserController::class,'profileUpdate']);
    Route::post('/user/password/update',[UserController::class,'passwordUpdate']);
    Route::get('/logout',[UserController::class,'logout']);

    // add favourite list
    Route::get('/user/favourite-list',[ProductController::class,'favlist']);
    Route::post('/add/favourite/{id}',[ProductController::class,'favlistAdd']);
    Route::delete('/remove/favourite/{id}',[ProductController::class,'favlistRemove']);

    // checkout
    Route::post('/checkout',[OrderController::class,'storeorder']);
    // get user all order
    Route::get('/order',[OrderController::class,'allOrder']);
    // get user all order
    Route::get('/coupon',[CartController::class,'coupon']);
    //for api
});

Route::post('/register',[RegisterController::class,'register']); 
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'login']);

Route::get('/user/{id}',[RegisterController::class,'userDetails']);
Route::get('/products',[ProductController::class,'getallproduct']);
Route::get('/about',[UserController::class,'about']);
Route::get('/contactinfo',[UserController::class,'contactInfo']);
Route::get('/deliverycharge',[DeliveryChargeController::class,'deliverycharge']);

