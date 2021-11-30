<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\DataOdpController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\InstansiController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Models\Artikel;
use App\Models\Carousel;
use App\Models\Dokumen;
use App\Models\Galeri;
use App\Models\Kontak;
use App\Models\User;
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
    return view('welcome', [
        'carousel' => Carousel::where('status', 'active')->get(),
        'video' => Galeri::where('jenis', 'video')->orderBy('created_at', 'desc')->first(),
        'artikel' => Artikel::orderBy('created_at', 'desc')->limit(3)->get(),
        'kontak' => Kontak::first()
    ]);
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard', [
            'user_count' => User::all()->count(),
            'artikel_count' => Artikel::all()->count(),
            'galeri_count' => Galeri::all()->count(),
            'dokumen_count' => Dokumen::all()->count()
        ]);
    })->name('dashboard');

    Route::resource('manage-carousel', CarouselController::class)->except(['show']);
    Route::resource('manage-instansi', InstansiController::class)->except(['show']);
    Route::resource('manage-users', UserController::class)->except(['show']);
    Route::resource('manage-artikel', ArtikelController::class);
    Route::resource('manage-galeri', GaleriController::class)->except(['show']);
    Route::resource('manage-info', InfoController::class)->only(['index', 'edit', 'update']);
    Route::resource('manage-dokumen', DokumenController::class);

    Route::get('manage-users/reset-password/{id}', [UserController::class, 'resetPassword'])->name('manage-users.reset-password');
    Route::get('manage-users/change-password', [UserController::class, 'changePassword'])->name('manage-users.change-password');
    Route::post('manage-users/ganti-password', [UserController::class, 'storePassword'])->name('manage-users.store-password');
    Route::get('manage-users/profile', [UserController::class, 'profile'])->name('manage-users.profile');

    Route::resource('manage-kontak', KontakController::class)->only(['index', 'edit', 'update']);

    Route::get('data-opd', [DokumenController::class, 'getOdp'])->name('file-odp');
    Route::get('data-opd/jenis', [DokumenController::class, 'detailOpd'])->name('jenis-odp');
    Route::get('data-integrasi/jenis', [DokumenController::class, 'detailIntegrasi'])->name('jenis-integrasi');
    Route::get('data-opd/search', [DokumenController::class, 'findOdp'])->name('file-odp.search');
    Route::get('aksi-integrasi', [DokumenController::class, 'getIntegrasi'])->name('aksi-integrasi');
    Route::get('aksi-integrasi/search', [DokumenController::class, 'findIntegrasi'])->name('aksi-integrasi.search');

    Route::resource('manage-data-opd', DataOdpController::class);
});

Route::get('info-stunting', [UserUserController::class, 'infoStunting'])->name('info-stunting');

Route::get('artikel', [UserUserController::class, 'getArtikel'])->name('artikel');
Route::get('artikel/find', [UserUserController::class, 'search'])->name('artikel.search');
Route::get('artikel/{slug}', [UserUserController::class, 'detailArtikel'])->name('artikel.detail');

Route::get('galeri', [UserUserController::class, 'getGaleri'])->name('galeri');
Route::get('video', [UserUserController::class, 'getVideo'])->name('video');
Route::get('preview/{id}', [UserUserController::class, 'preview'])->name('preview');
