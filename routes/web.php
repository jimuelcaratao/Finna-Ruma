<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Host\DashboardController as HostDashboardController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\SinglePostController;
use Illuminate\Support\Facades\Route;

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

// Global routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rentals', [RentalController::class, 'index'])->name('rentals');
Route::get('/rental', [SinglePostController::class, 'index'])->name('single-post');

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
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
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
    });
});
