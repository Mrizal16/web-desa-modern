<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResidentController;

Route::get('/', function () {
    return view('welcome');
});


// =========================
// GUEST
// =========================

Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.process');

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');
});


// =========================
// LOGOUT
// =========================

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});


// =========================
// WARGA
// =========================

Route::middleware(['auth', 'role:Warga'])
    ->prefix('warga')
    ->name('warga.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('warga.dashboard');
        })->name('dashboard');

        Route::get('/profil', [ResidentController::class, 'profile'])
            ->name('profile');

        Route::put('/profil', [ResidentController::class, 'updateProfile'])
            ->name('profile.update');
    });


// =========================
// ADMIN
// =========================

Route::middleware(['auth', 'role:Admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

    });