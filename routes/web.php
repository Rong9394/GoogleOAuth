<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SsoController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    // Normal old login
    Route::get('login', [AuthenticationController::class, 'showLogin'])->name('view_login');
    Route::post('login', [AuthenticationController::class, 'login'])->name('login');

    // Normal old registration
    Route::get('register', [AuthenticationController::class, 'showRegistration'])->name('view_registration');
    Route::post('register', [AuthenticationController::class, 'register'])->name('register');

    // Social Login Routes
    Route::get('/auth/redirect', [SsoController::class, 'authenticateWithIdp']);
    Route::get('/auth/callback', [SsoController::class, 'callback']);
});
