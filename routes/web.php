<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Host\AddListingController;
use App\Http\Controllers\Host\BookingController as HostBookingController;
use App\Http\Controllers\Host\DashboardController as HostDashboardController;
use App\Http\Controllers\Host\ListingController;
use App\Http\Controllers\OAuthController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\SinglePostController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

// Route::get('/', function () {
//     return view('pages.home');
// });

// Google Auth
Route::get('/signin-google', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');

Route::get('/callbackGoogle', [OAuthController::class, 'callbackGoogle']);

Route::get('/host/login', function () {
    return view('auth.host-login');
})->name('host.login');

Route::get('/host/register', function () {
    return view('auth.host-register');
})->name('host.register');

// Global routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rentals', [RentalController::class, 'index'])->name('rentals');
Route::get('/rental', [SinglePostController::class, 'index'])->name('single-post');

Route::get('/host/try', function () {
    return view('pages.host-home');
})->name('host.home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Admin Users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',  'is_admin'
])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/rentals', [AdminRentalController::class, 'index'])->name('admin.rentals');

        Route::get('/bookings', [BookingController::class, 'index'])->name('admin.bookings');

        // user apis
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::put('/users/update', [UserController::class, 'update'])->name('users.update');
        Route::post('/users/ban', [UserController::class, 'ban'])->name('user.ban');


        //categories Apis
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::delete('/categories/{category_id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::put('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
    });
});


// Host Users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',  'is_host'
])->group(function () {
    Route::prefix('host')->group(function () {
        Route::get('/dashboard', [HostDashboardController::class, 'index'])->name('host.dashboard');

        Route::get('/my-listing', [ListingController::class, 'index'])->name('host.listing');

        Route::get('/add-listing', [AddListingController::class, 'index'])->name('host.add.listing');
        Route::post('/add-listing/store', [AddListingController::class, 'store'])->name('host.store.listing');

        Route::get('/bookings', [HostBookingController::class, 'index'])->name('host.bookings');
    });
});
