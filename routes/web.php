<?php

use App\Http\Livewire\Rtl;

use Illuminate\Http\Request;
use App\Http\Livewire\Couter;
use App\Http\Livewire\Tables;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PDFController;
use App\Http\Livewire\Auth\ResetPassword;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Livewire\Booking\Rooms\BookingRoom;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Livewire\Booking\Items\BookingItems;
use App\Http\Livewire\HelpDesk\History\HelpdeskHistoryController;
use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\HelpDesk\User\HelpDeskController;
use App\Http\Livewire\Staff\Helpdesk\StaffHelpdeskController;

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


// reference the Dompdf namespace


// instantiate and use the dompdf class


Route::get('/pdf', [PDFController::class,'pdf']);




Route::prefix('auth')->group(function () {
    //redirect
    Route::prefix('redirect')->group(function () {
        Route::get('/google', [GoogleController::class,'getredirect'])->name('google-login');
        Route::get('/facebook', [FacebookController::class,'getredirect'])->name('facebook-login');
        // Route::get('/passport', [LaravelPassportController::class,'getredirect'])->name('passport-login');
        // Route::get('/line', [LineController::class,'getredirect'])->name('line-login');
    });
    //redirect

    //callback
    Route::prefix('callback')->group(function () {
        Route::get('/google', [GoogleController::class,'getcallback']);
        Route::get('/facebook', [FacebookController::class,'getcallback']);
        // Route::get('/passport', [LaravelPassportController::class,'getcallback']);
        // Route::get('/line', [LineController::class,'getcallback']);
    });
    //callback
});


Route::get('/', function () {
    return redirect('/login');
});

// Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

// Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

// Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');


Route::get('/permissiondenied', function () {
    return view('permissiondenied');
})->name('permissiondenied');

Route::get('/user-profile', UserProfile::class)->name('user-profile')->middleware('auth');

Route::middleware('auth','IsCheckProfile')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');



    Route::get('/user-management', UserManagement::class)->name('user-management');


    Route::prefix('booking')->group(function () {
        Route::get('/rooms', BookingRoom::class)->name('booking-rooms');
        Route::get('/items', BookingItems::class)->name('booking-items');
    });

    Route::prefix('items')->group(function () {
        Route::get('/rooms-items', BookingRoom::class)->name('rooms-items');
    });

    Route::prefix('helpdesk')->group(function () {
        Route::get('/', HelpDeskController::class)->name('helpdesk');
        Route::get('/history', HelpdeskHistoryController::class)->name('helpdesk-history');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/permission', Tables::class)->name('admin-permission');
        Route::get('/addedituser', Tables::class)->name('admin-addedituser');
    })->middleware('admin');

    Route::prefix('staff')->group(function () {
        Route::get('/items', Tables::class)->name('staff-items');
        Route::get('/approves', Tables::class)->name('staff-approves');
        Route::get('/helpdesk', StaffHelpdeskController::class)->name('staff-helpdesk');
    })->middleware('staff');
});

Route::get('/counter', Couter::class)->name('couter');
