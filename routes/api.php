<?php

use App\Http\Controllers\Api\Astrologer\ApiAstrologerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth_ApiController;
use App\Http\Controllers\Api\Astrologer_ApiController;
use App\Http\Controllers\Api\Chat\ApiChatController;
use App\Http\Controllers\Api\Horoscope\ApiHoroscopeController;
use App\Http\Controllers\Api\User_ApiController;
// use App\Http\Controllers\Api\Product_ApiController;
// use App\Http\Controllers\Api\Category_ApiController;
// use App\Http\Controllers\Api\Address_ApiController;
// use App\Http\Controllers\Api\Order_ApiController;
// use App\Http\Controllers\Api\Video_ApiController;
// use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Api\Mix_ApiController;
use App\Http\Controllers\Api\User\ApiUserController;

// use App\Http\Controllers\Api\Webinar_ApiController;

// Authenticated Routes
Route::middleware('auth:sanctum')->group(function () {

    // User details
    Route::apiResource('userdetails', User_ApiController::class);

    // Astrologer
    // Route::apiResource('astrologer', Astrologer_ApiController::class);

    // Products
    // Route::apiResource('product', Product_ApiController::class);

    // Orders
    // Route::apiResource('order', Order_ApiController::class);

    // Category
    // Route::apiResource('category', Category_ApiController::class);

    // Address
    // Route::apiResource('address', Address_ApiController::class);

    // Video
    // Route::apiResource('video', Video_ApiController::class);

    // Video
    // Route::apiResource('webinar', Webinar_ApiController::class);


    // // Payment
    // Route::apiResource('payment', PaymentController::class);


    // Mix Controller --> Slider /
    Route::apiResource('getdata', Mix_ApiController::class);
    // Route::apiResource('setdata', Mix_ApiController::class);

    // by KK
    // auth routes
    Route::controller(ApiAstrologerController::class)->group(function () {
        Route::get('/astrologer', 'list');
        Route::get('/astrologer/data', 'data');
        Route::post('/astrologer/update', 'update');
        Route::post('/astrologer/image', 'imgUpload');
        Route::post('/astrologer/logout', 'logout');
    });
    Route::controller(ApiUserController::class)->group(function () {
        Route::get('/user/data', 'data');
        Route::post('/user/update', 'update');
        Route::post('/user/image', 'imgUpload');
        Route::post('/user/logout', 'logout');
    });
    Route::controller(ApiChatController::class)->group(function () {
        Route::post('/chat/send', 'save');
        Route::get('/chat/data', 'data');
        Route::get('/chat/receiver', 'receiver');
    });
});

// Register & Login Api
Route::controller(Auth_ApiController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/verify/login-otp', 'verify_login_otp');
    Route::middleware('auth:sanctum')->post('/logout', 'logout');
});


// by KK

//  guest routes
Route::controller(ApiAstrologerController::class)->group(function () {
    Route::post('/astrologer/register', 'register');
    Route::post('/astrologer/send-otp', 'sendOtp');
    Route::post('/astrologer/verify-otp', 'verifyOtp');
});
Route::controller(ApiUserController::class)->group(function () {
    Route::post('/user/send-otp', 'sendOtp');
    Route::post('/user/verify-otp', 'verifyOtp');
});
Route::controller(ApiHoroscopeController::class)->group(function () {
    Route::get('/horoscope/data', 'data');
});
