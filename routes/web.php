<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BookingController as ControllersBookingController;
use App\Http\Controllers\CancelBookingController;
use App\Http\Controllers\ConfirmBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Host\AddListingController;
use App\Http\Controllers\Host\BookingController as HostBookingController;
use App\Http\Controllers\Host\DashboardController as HostDashboardController;
use App\Http\Controllers\Host\ListingController;
use App\Http\Controllers\OAuthController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\SinglePostController;
use App\Http\Controllers\SubmitReceiptController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\WriteReviewController;
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

// Google Auth APIs
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

// Global routes APIs
//Rentals APIs
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rentals', [RentalController::class, 'index'])->name('rentals');
Route::get('/rooms/{slug}', [SinglePostController::class, 'index'])->name('single-list');



Route::get('/host/try', function () {
    return view('pages.host-home');
})->name('host.home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Auth Users
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    //Wishlists APIs
    Route::get('/wishlist', [WishListController::class, 'index'])->name('wishlist');
    Route::post('/wishlist/{listing_id}', [WishListController::class, 'add_to_wishlist'])->name('wishlist.add');
    Route::delete('/wishlist/{listing_id}/delete', [WishListController::class, 'remove_to_wishlist'])->name('wishlist.remove');

    // Cancel booking
    Route::delete('/cancel/{booking_id}', [CancelBookingController::class, 'destroy'])->name('cancel.booking');

    // My Bookings APIs
    Route::get('/my-bookings', [ControllersBookingController::class, 'my_bookings'])->name('my-bookings');
    Route::get('/my-bookings/{booking_id}', [ControllersBookingController::class, 'index'])->name('booking');
    Route::get('/confirm/{slug}/{booking_id}', [ConfirmBookingController::class, 'confirm'])->name('confirm-booking');


    // Submit receipt
    Route::get('/submit/{booking_id}/{listing_id}', [SubmitReceiptController::class, 'index'])->name('submit_receipt');
    Route::post('/receipt/{booking_id}', [SubmitReceiptController::class, 'store'])->name('submit_receipt.store');


    // Reviews APIs
    Route::get('/review/{booking_id}/{listing_id}', [WriteReviewController::class, 'index'])->name('write_review');
    Route::post('/review/{booking_id}/{listing_id}', [WriteReviewController::class, 'write_review'])->name('write_review.write');

    Route::prefix('booking')->group(function () {

        // Payments APIs
        Route::post('/store/{listing_id}', [ControllersBookingController::class, 'store'])->name('global.booking');
        Route::post('/payment/{booking_id}', [ConfirmBookingController::class, 'payment'])->name('payment.booking');
        Route::post('/payment/complete/{booking_id}', [ConfirmBookingController::class, 'complete_payment'])->name('complete_payment.booking');
    });
});

// Admin Users APIs
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',  'is_admin'
])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/rentals', [AdminRentalController::class, 'index'])->name('admin.rentals');
        Route::post('/rentals/store', [AdminRentalController::class, 'edit_status'])->name('admin.rentals.status');

        Route::get('/bookings', [BookingController::class, 'index'])->name('admin.bookings');

        // user APIs
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::put('/users/update', [UserController::class, 'update'])->name('users.update');
        Route::post('/users/ban', [UserController::class, 'ban'])->name('user.ban');

        //categories APIs
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::delete('/categories/{category_id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::put('/categories/{category_id}', [CategoryController::class, 'restore'])->name('categories.restore');
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

        // host listing APIs
        Route::get('/my-listing', [ListingController::class, 'index'])->name('host.listing');

        Route::get('/listing/add', [AddListingController::class, 'index'])->name('host.add.listing');
        Route::get('/listing/edit/{slug}', [ListingController::class, 'edit'])->name('host.edit.listing');
        Route::post('/listing/add/store', [AddListingController::class, 'store'])->name('host.store.listing');
        Route::put('/listing/update/{listing_id}', [AddListingController::class, 'update'])->name('host.update.listing');
        Route::delete('/my-listing/{listing_id}', [ListingController::class, 'destroy'])->name('host.listing.destroy');

        // booking APIs
        Route::get('/bookings', [HostBookingController::class, 'index'])->name('host.bookings');
        Route::get('/booking/{booking_id}', [HostBookingController::class, 'view_details'])->name('host.bookings.view_details');
        Route::put('/booking/approve/{booking_id}', [HostBookingController::class, 'approve_receipt'])->name('host.bookings.approve_receipt');
        Route::put('/booking/payment/{booking_id}', [HostBookingController::class, 'update_payment'])->name('host.bookings.update_payment');
        Route::post('/booking/archive/{booking_id}', [HostBookingController::class, 'archive'])->name('host.bookings.archive');
        Route::post('/booking/complete/{booking_id}', [HostBookingController::class, 'complete_booking'])->name('host.bookings.complete');
    });
});
