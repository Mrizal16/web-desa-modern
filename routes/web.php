<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\LetterRequestController;
use App\Http\Controllers\Admin\LetterRequestController as AdminLetterRequestController;


// =========================
// HOME
// =========================

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

        Route::get('/surat', [LetterRequestController::class, 'index'])
            ->name('letters.index');

        Route::get('/surat/ajukan', [LetterRequestController::class, 'create'])
            ->name('letters.create');

        Route::get('/surat/ajukan/{letterType}', [LetterRequestController::class, 'form'])
            ->name('letters.form');

        Route::post('/surat/ajukan/{letterType}', [LetterRequestController::class, 'store'])
            ->name('letters.store');

        Route::get('/surat/{letterRequest}', [LetterRequestController::class, 'show'])
            ->name('letters.show');
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

        Route::get('/permohonan', [AdminLetterRequestController::class, 'index'])
            ->name('permohonan.index');

        Route::get('/permohonan/{letterRequest}', [AdminLetterRequestController::class, 'show'])
            ->name('permohonan.show');
            
        Route::post('/permohonan/{letterRequest}/verifikasi', [AdminLetterRequestController::class, 'verify'])
            ->name('permohonan.verify');

        Route::post('/permohonan/{letterRequest}/perbaikan', [AdminLetterRequestController::class, 'requestRevision'])
            ->name('permohonan.revision');

        Route::post('/permohonan/{letterRequest}/tolak', [AdminLetterRequestController::class, 'reject'])
            ->name('permohonan.reject');
    });