<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Slider_AdminController;
use App\Http\Controllers\Admin\Testimonial_AdminController;
use App\Http\Controllers\Admin\Category_AdminController;
use App\Http\Controllers\Admin\Post_AdminController;
use App\Http\Controllers\Admin\PostCategory_AdminController;
use App\Http\Controllers\Admin\Customer_AdminController;
use App\Http\Controllers\Admin\Chat_AdminController;
use App\Http\Controllers\Admin\MediaLibrary_AdminController;
use App\Http\Controllers\Admin\Astrologer_AdminController;
use App\Http\Controllers\Admin\Plan_AdminController;
use App\Http\Controllers\Admin\Page_AdminController;
use App\Http\Controllers\Admin\Payment_AdminController;
use App\Http\Controllers\Admin\Popup_AdminController;
use App\Http\Controllers\Admin\UserQueriesController;



Route::prefix('admin')->middleware(['auth','is_admin'])->group(function(){

// Route::prefix('admin')->group(function(){

Route::get('/', function () { return redirect()->route('astrologer.index'); })->name('admin.dashboard');

// =========== Slider ==========
Route::resource('slider', Slider_AdminController::class);

// =========== Testimonial ==========
Route::resource('testimonial', Testimonial_AdminController::class);


// =========== Customer ==========
Route::resource('customer', Customer_AdminController::class);


// =========== Product Category ==========
Route::resource('category', Category_AdminController::class);

// =========== Post ==========
Route::resource('post', Post_AdminController::class);

// =========== Astrologer ==========
Route::resource('astrologer', Astrologer_AdminController::class);

// =========== Post Category ==========
Route::resource('post-category', PostCategory_AdminController::class);


// =========== Media Library ==========
Route::resource('media-library', MediaLibrary_AdminController::class);

// =========== Recharge Plans ==========
Route::resource('plan', Plan_AdminController::class);

// =========== Pages ==========
Route::resource('page', Page_AdminController::class);

// =========== Payments ==========
Route::resource('payment', Payment_AdminController::class);

// =========== Popup ==========
Route::resource('popup', Popup_AdminController::class);


// =========== Chat ==========
Route::get('/chat',function(){ return view('admin.chat.chat'); })->name('admin.chat');
Route::post('/total-msg-count',[Chat_AdminController::class,'totalMsgCount'])->name('admin.totalMsgCount');
Route::post('/get-user-details',[Chat_AdminController::class,'getUserDetails'])->name('admin.getUserDetails');
Route::post('/send-message',[Chat_AdminController::class,'sendMessage'])->name('admin.sendMessage');
Route::post('/load-messages',[Chat_AdminController::class,'loadMessages'])->name('admin.loadMessages');
Route::post('/get-chat-list',[Chat_AdminController::class,'getChatUsers'])->name('admin.getChatList');

// =========== User Queries ==========
Route::get('/user-queries', [UserQueriesController::class, 'index'])->name('admin.queries');

});
