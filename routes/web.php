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
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\ApparatusController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PotentialController;
use App\Http\Controllers\Admin\VillageProfileController;

use App\Models\News;
use App\Models\Announcement;
use App\Models\Apparatus;
use App\Models\Gallery;
use App\Models\Potential;
use App\Models\VillageProfile;


/*
|--------------------------------------------------------------------------
| PUBLIC / HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $latestNews = News::where('status', 'published')
        ->orderByDesc('published_at')
        ->latest()
        ->take(3)
        ->get();

    $latestAnnouncements = Announcement::where('status', 'published')
        ->orderByDesc('published_at')
        ->latest()
        ->take(3)
        ->get();

    $apparatuses = Apparatus::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('id')
        ->take(8)
        ->get();

    $galleries = Gallery::where('is_active', true)
        ->orderBy('sort_order')
        ->orderByDesc('created_at')
        ->take(8)
        ->get();

    $potentials = Potential::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('id')
        ->take(8)
        ->get();

    $villageProfile = VillageProfile::first();

    return view('welcome', compact(
        'latestNews',
        'latestAnnouncements',
        'apparatuses',
        'galleries',
        'potentials',
        'villageProfile'
    ));

})->name('home');


/*
|--------------------------------------------------------------------------
| PUBLIC BERITA
|--------------------------------------------------------------------------
*/

Route::get('/berita', function () {

    $news = News::where('status', 'published')
        ->orderByDesc('published_at')
        ->latest()
        ->paginate(9);

    return view('news.index', compact('news'));

})->name('news.index');


Route::get('/berita/{news:slug}', function (News $news) {

    if ($news->status !== 'published') {
        abort(404);
    }

    return view('news.show', compact('news'));

})->name('news.show');


/*
|--------------------------------------------------------------------------
| PUBLIC PENGUMUMAN
|--------------------------------------------------------------------------
*/

Route::get('/pengumuman', function () {

    $announcements = Announcement::where('status', 'published')
        ->orderByDesc('published_at')
        ->latest()
        ->paginate(10);

    return view('announcements.index', compact('announcements'));

})->name('announcements.index');


/*
|--------------------------------------------------------------------------
| GUEST
|--------------------------------------------------------------------------
*/

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


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/dashboard', function () {

        $user = auth()->user();

        if ($user->resident) {
            return redirect()->route('warga.dashboard');
        }

        return redirect()->route('admin.dashboard');

    })->name('dashboard');

});


/*
|--------------------------------------------------------------------------
| WARGA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Warga'])
    ->prefix('warga')
    ->name('warga.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {
            return view('warga.dashboard');
        })->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | PROFIL
        |--------------------------------------------------------------------------
        */

        Route::get('/profil', [ResidentController::class, 'profile'])
            ->name('profile');

        Route::put('/profil', [ResidentController::class, 'updateProfile'])
            ->name('profile.update');


        /*
        |--------------------------------------------------------------------------
        | SURAT
        |--------------------------------------------------------------------------
        */

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

        Route::get('/surat/{letterRequest}/perbaiki', [LetterRequestController::class, 'editRevision'])
            ->name('letters.revision');

        Route::put('/surat/{letterRequest}/perbaiki', [LetterRequestController::class, 'updateRevision'])
            ->name('letters.revision.update');


        /*
        |--------------------------------------------------------------------------
        | PENGADUAN
        |--------------------------------------------------------------------------
        */

        Route::get('/pengaduan', [ComplaintController::class, 'index'])
            ->name('complaints.index');

        Route::get('/pengaduan/buat', [ComplaintController::class, 'create'])
            ->name('complaints.create');

        Route::post('/pengaduan', [ComplaintController::class, 'store'])
            ->name('complaints.store');

        Route::get('/pengaduan/{complaint}', [ComplaintController::class, 'show'])
            ->name('complaints.show');


        /*
        |--------------------------------------------------------------------------
        | NOTIFIKASI
        |--------------------------------------------------------------------------
        */

        Route::get('/notifikasi', [NotificationController::class, 'index'])
            ->name('notifications.index');

        Route::post('/notifikasi/baca-semua', [NotificationController::class, 'readAll'])
            ->name('notifications.read-all');

        Route::get('/notifikasi/{notification}', [NotificationController::class, 'read'])
            ->name('notifications.read');

    });


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:Admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [AdminLetterRequestController::class, 'dashboard'])
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | PERMOHONAN SURAT
        |--------------------------------------------------------------------------
        */

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


        /*
        |--------------------------------------------------------------------------
        | DATA WARGA
        |--------------------------------------------------------------------------
        */

        Route::get('/warga', [AdminResidentController::class, 'index'])
            ->name('warga.index');

        Route::get('/warga/{user}', [AdminResidentController::class, 'show'])
            ->name('warga.show');


        /*
        |--------------------------------------------------------------------------
        | PENGADUAN
        |--------------------------------------------------------------------------
        */

        Route::get('/pengaduan', [AdminComplaintController::class, 'index'])
            ->name('complaints.index');

        Route::get('/pengaduan/{complaint}', [AdminComplaintController::class, 'show'])
            ->name('complaints.show');

        Route::post('/pengaduan/{complaint}/proses', [AdminComplaintController::class, 'process'])
            ->name('complaints.process');

        Route::post('/pengaduan/{complaint}/selesai', [AdminComplaintController::class, 'complete'])
            ->name('complaints.complete');


        /*
        |--------------------------------------------------------------------------
        | LAPORAN
        |--------------------------------------------------------------------------
        */

        Route::get('/laporan', [ReportController::class, 'index'])
            ->name('reports.index');

        Route::get('/laporan/cetak', [ReportController::class, 'print'])
            ->name('reports.print');


        /*
        |--------------------------------------------------------------------------
        | BERITA
        |--------------------------------------------------------------------------
        */

        Route::get('/berita', [NewsController::class, 'index'])
            ->name('news.index');

        Route::get('/berita/tambah', [NewsController::class, 'create'])
            ->name('news.create');

        Route::post('/berita', [NewsController::class, 'store'])
            ->name('news.store');

        Route::get('/berita/{news}/edit', [NewsController::class, 'edit'])
            ->name('news.edit');

        Route::put('/berita/{news}', [NewsController::class, 'update'])
            ->name('news.update');

        Route::delete('/berita/{news}', [NewsController::class, 'destroy'])
            ->name('news.destroy');


        /*
        |--------------------------------------------------------------------------
        | PENGUMUMAN
        |--------------------------------------------------------------------------
        */

        Route::get('/pengumuman', [AnnouncementController::class, 'index'])
            ->name('announcements.index');

        Route::get('/pengumuman/tambah', [AnnouncementController::class, 'create'])
            ->name('announcements.create');

        Route::post('/pengumuman', [AnnouncementController::class, 'store'])
            ->name('announcements.store');

        Route::get('/pengumuman/{announcement}/edit', [AnnouncementController::class, 'edit'])
            ->name('announcements.edit');

        Route::put('/pengumuman/{announcement}', [AnnouncementController::class, 'update'])
            ->name('announcements.update');

        Route::delete('/pengumuman/{announcement}', [AnnouncementController::class, 'destroy'])
            ->name('announcements.destroy');


        /*
        |--------------------------------------------------------------------------
        | APARATUR DESA
        |--------------------------------------------------------------------------
        */

        Route::get('/aparatur', [ApparatusController::class, 'index'])
            ->name('apparatuses.index');

        Route::get('/aparatur/tambah', [ApparatusController::class, 'create'])
            ->name('apparatuses.create');

        Route::post('/aparatur', [ApparatusController::class, 'store'])
            ->name('apparatuses.store');

        Route::get('/aparatur/{apparatus}/edit', [ApparatusController::class, 'edit'])
            ->name('apparatuses.edit');

        Route::put('/aparatur/{apparatus}', [ApparatusController::class, 'update'])
            ->name('apparatuses.update');

        Route::delete('/aparatur/{apparatus}', [ApparatusController::class, 'destroy'])
            ->name('apparatuses.destroy');

    

        /*
        |--------------------------------------------------------------------------
        | GALERI DESA
        |--------------------------------------------------------------------------
        */

        Route::get('/galeri', [GalleryController::class, 'index'])
            ->name('galleries.index');

        Route::get('/galeri/tambah', [GalleryController::class, 'create'])
            ->name('galleries.create');

        Route::post('/galeri', [GalleryController::class, 'store'])
            ->name('galleries.store');

        Route::get('/galeri/{gallery}/edit', [GalleryController::class, 'edit'])
            ->name('galleries.edit');

        Route::put('/galeri/{gallery}', [GalleryController::class, 'update'])
            ->name('galleries.update');

        Route::delete('/galeri/{gallery}', [GalleryController::class, 'destroy'])
            ->name('galleries.destroy');


        /*
        |--------------------------------------------------------------------------
        | POTENSI DESA
        |--------------------------------------------------------------------------
        */

        Route::get('/potensi', [PotentialController::class, 'index'])
            ->name('potentials.index');

        Route::get('/potensi/tambah', [PotentialController::class, 'create'])
            ->name('potentials.create');

        Route::post('/potensi', [PotentialController::class, 'store'])
            ->name('potentials.store');

        Route::get('/potensi/{potential}/edit', [PotentialController::class, 'edit'])
            ->name('potentials.edit');

        Route::put('/potensi/{potential}', [PotentialController::class, 'update'])
            ->name('potentials.update');

        Route::delete('/potensi/{potential}', [PotentialController::class, 'destroy'])
            ->name('potentials.destroy');


        /*
        |--------------------------------------------------------------------------
        | PROFIL DESA
        |--------------------------------------------------------------------------
        */

        Route::get('/profil-desa', [VillageProfileController::class, 'edit'])
            ->name('village-profile.edit');

        Route::put('/profil-desa', [VillageProfileController::class, 'update'])
            ->name('village-profile.update');

    });