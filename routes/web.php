<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Master_WebController;
use App\Http\Controllers\Web\Astrologer_WebController;
use App\Http\Controllers\Web\Auth_WebController;
use App\Http\Controllers\Web\User_WebController;
use App\Http\Controllers\Web\Wallet_WebController;
use App\Http\Controllers\Admin\Payment_AdminController;
use App\Http\Controllers\Web\UserQueryController;
use App\Models\Userdetail;

// Route::get('/mahapurusa-yoga',function(){
//     return view('web-stories.astrology-view')->name('mahapurusa_yoga');
// });
Route::view('/web-stories', 'web.web-stories');
Route::prefix('/')->controller(Master_WebController::class)->group(function () {
    Route::get('/', 'home_page')->name('home.page');
    Route::get('/contact', 'contact_page')->name('contact.page');
    Route::get('/about', 'about_page')->name('about.page');
    Route::get('/astrology-blog', 'blog_page')->name('blog.page');
    Route::get('/astrology-blog/{slug}', 'blog_details_page')->name('blog_details.page');
    Route::get('/astrology-blog/category/{category_slug}', 'blog_page')->name('blog_category.page');
    Route::get('/talk-to-astrologer', 'talk_to_astrologer_page')->name('talk_to_astrologer.page');
    Route::get('/chat-with-astrologer', 'chat_with_astrologer_page')->name('chat_with_astrologer.page');
    Route::get('/register-as-astrologer', 'register_as_astrologer_page')->name('register_as_astrologer.page');
    Route::get('/best-astrologer/{slug}', 'astrologer_profile_page')->name('astrologer_profile.page');
    Route::get('/city-wise-astrologers', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.city-wise-astrologers', compact('user'));
    })->name('city_wise_astrologers.page');
    Route::get('/privacy-policy', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.privacy-policy', compact('user'));
    })->name('privacy_policy.page');
    Route::get('/terms-of-use', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.terms-of-use', compact('user'));
    })->name('terms_of_use.page');
    Route::get('/web-stories', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.web-stories', compact('user'));
    })->name('web_stories.page');
    Route::get('/refund-cancellation', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.refund-cancellation', compact('user'));
    })->name('refund_cancellation.page');
    Route::get('/cookie-policy', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.cookie-policy', compact('user'));
    })->name('cookie_policy.page');
    Route::get('/disclaimer', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.disclaimer', compact('user'));
    })->name('disclaimer.page');
    Route::get('/mahapurusa-yoga', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.mahap', compact('user'));
    })->name('maha');
    Route::get('/role-of-planets', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.role-planets', compact('user'));
    })->name('role');
    Route::get('/walking-barefoot-in-grass', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.walking-barefoot', compact('user'));
    })->name('walking');
    Route::get('/unknown-facts-about-capricorn', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.capricorn-zodiac', compact('user'));
    })->name('capricorn');
    Route::get('/unknown-facts-about-scorpio', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.scorpion-zodiac', compact('user'));
    })->name('scorpio');
    Route::get('/city-wise-astrologers/{slug}', 'city_page')->name('city.page');
});

Route::get('/vastu-tips-career-growth', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.career-growth', compact('user'));
    })->name('career-growth');
    Route::get('/vastu-remedies-business-growth', function () {
        $user = '';
        if (!empty(auth()->user()->uid)) {
            $user = Userdetail::where('uid', auth()->user()->uid)->first();
        }
        return view('web.business-growth', compact('user'));
    })->name('business-growth');
// Authenticated Routes

Route::prefix('account')->middleware(['auth'])->group(function () {

    Route::controller(User_WebController::class)->group(function () {
        Route::get('/', 'account_page')->name('account.page');
        Route::post('/user/ajax', 'store')->name('user.ajax');
    });

    Route::controller(Wallet_WebController::class)->group(function () {
        Route::get('/add-wallet-money', 'recharge_page')->name('recharge.page');
        Route::get('/recharge-success', 'recharge_success')->name('recharge_success.page');
        // Route::get('/recharge-success', function () {
        //     return view('web.user.recharge-success');
        // })->name('recharge_success.page');
        Route::get('/payment-history', 'payment_history_page')->name('payment_history.page');
        Route::post('/wallet/ajax', 'store')->name('wallet.ajax');
    });
});


// Register as Astrologer (Public)
Route::prefix('/')->controller(Astrologer_WebController::class)->group(function () {
    Route::post('/register-as-astrologer/create', 'register_astrologer')->name('register_astrologer.create');
});


// User Register & Login Routes
Route::controller(Auth_WebController::class)->group(function () {
    Route::get('/login', function () {
        return redirect()->route('home.page');
    })->middleware('guest')->name('login');
    Route::post('/login', 'login')->middleware('guest')->name('user.login');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/logout', 'logout');
});

// user query routes
Route::controller(UserQueryController::class)->group(function () {
    // Route::post('get-in-touch', 'getInTouch')->name('get-in-touch');
    Route::post('contact-enquiry', 'getInTouch')->name('contact-enquiry');
    Route::get('call-form/{id}', 'callForm');
    Route::get('chat-form/{id}', 'chatForm');
});

require __DIR__ . '/admin.php';
