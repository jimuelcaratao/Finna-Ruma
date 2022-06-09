<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Host\DashboardController as HostDashboardController;
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

Route::get('/', function () {
    return view('home');
});


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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
