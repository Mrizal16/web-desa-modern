<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\LetterRequestController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\LetterRequestController as AdminLetterRequestController;
use App\Http\Controllers\Admin\ResidentController as AdminResidentController;
use App\Http\Controllers\Admin\ComplaintController as AdminComplaintController;

// HOME
Route::get('/', function () {
    return view('welcome');
});

// GUEST
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// AUTH
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Redirect tombol Dashboard Laravel
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->resident) {
            return redirect()->route('warga.dashboard');
        }

        return redirect()->route('admin.dashboard');
    })->name('dashboard');
});

// WARGA
Route::middleware(['auth', 'role:Warga'])
    ->prefix('warga')
    ->name('warga.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('warga.dashboard');
        })->name('dashboard');

        Route::get('/profil', [ResidentController::class, 'profile'])->name('profile');
        Route::put('/profil', [ResidentController::class, 'updateProfile'])->name('profile.update');

        // SURAT
        Route::get('/surat', [LetterRequestController::class, 'index'])->name('letters.index');
        Route::get('/surat/ajukan', [LetterRequestController::class, 'create'])->name('letters.create');

        Route::get('/surat/ajukan/{letterType}', [LetterRequestController::class, 'form'])
            ->name('letters.form');

        Route::post('/surat/ajukan/{letterType}', [LetterRequestController::class, 'store'])
            ->name('letters.store');

        Route::get('/surat/{letterRequest}', [LetterRequestController::class, 'show'])
            ->name('letters.show');

        Route::get('/surat/{letterRequest}/perbaiki', [LetterRequestController::class, 'editRevision'])
            ->name('letters.revision');

        Route::put('/surat/{letterRequest}/perbaiki', [LetterRequestController::class, 'updateRevision'])
            ->name('letters.revision.update');

        // PENGADUAN
        Route::get('/pengaduan', [ComplaintController::class, 'index'])->name('complaints.index');
        Route::get('/pengaduan/buat', [ComplaintController::class, 'create'])->name('complaints.create');
        Route::post('/pengaduan', [ComplaintController::class, 'store'])->name('complaints.store');

        Route::get('/pengaduan/{complaint}', [ComplaintController::class, 'show'])
            ->name('complaints.show');

        // NOTIFIKASI
        Route::get('/notifikasi', [NotificationController::class, 'index'])
            ->name('notifications.index');

        Route::post('/notifikasi/baca-semua', [NotificationController::class, 'readAll'])
            ->name('notifications.read-all');

        Route::get('/notifikasi/{notification}', [NotificationController::class, 'read'])
            ->name('notifications.read');
    });

// ADMIN
Route::middleware(['auth', 'role:Admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // PERMOHONAN SURAT
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

        Route::post('/permohonan/{letterRequest}/selesai', [AdminLetterRequestController::class, 'complete'])
            ->name('permohonan.complete');

        Route::post('/permohonan/{letterRequest}/sudah-diambil', [AdminLetterRequestController::class, 'markPickedUp'])
            ->name('permohonan.picked-up');

        // DATA WARGA
        Route::get('/warga', [AdminResidentController::class, 'index'])
            ->name('warga.index');

        Route::get('/warga/{user}', [AdminResidentController::class, 'show'])
            ->name('warga.show');

        // PENGADUAN
        Route::get('/pengaduan', [AdminComplaintController::class, 'index'])
            ->name('complaints.index');

        Route::get('/pengaduan/{complaint}', [AdminComplaintController::class, 'show'])
            ->name('complaints.show');

        Route::post('/pengaduan/{complaint}/proses', [AdminComplaintController::class, 'process'])
            ->name('complaints.process');

        Route::post('/pengaduan/{complaint}/selesai', [AdminComplaintController::class, 'complete'])
            ->name('complaints.complete');
    });