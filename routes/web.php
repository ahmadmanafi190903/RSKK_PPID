<?php

use App\Http\Controllers\BackgroundImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermohonanInformasiController;
use App\Http\Controllers\PengajuanKeberatanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\InformasiPublikController;
use App\Http\Controllers\InformasiPublikDetailController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SubmenuController;

//user
Route::get('/',[DashboardController::class, 'home']);
Route::get('/permohonan-informasi/{permohonaninformasi}/download', [PermohonanInformasiController::class, 'download']);
Route::post('/rating', [PermohonanInformasiController::class, 'rating']);

Route::get('/permohonan', [PermohonanInformasiController::class, 'create']);
Route::post('/permohonan/create', [PermohonanInformasiController::class, 'store']);
Route::get('/riwayat', [PermohonanInformasiController::class, 'riwayat'])->name('riwayat');

Route::get('/pengajuan', [PengajuanKeberatanController::class, 'create']);
Route::post('/pengajuan/create', [PengajuanKeberatanController::class, 'store']);


Route::get('/informasi-publik/{id}', [InformasiPublikController::class, 'information']);

Route::get('/informasi-publik/{id}/details', [InformasiPublikController::class, 'detail']);

//admin
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('role:super_admin,admin,operator');

    // permohonan informasi
    Route::get('/permohonan_informasi', [PermohonanInformasiController::class, 'index'])->middleware('role:super_admin,admin,operator');
    Route::get('/permohonan_informasi/{permohonanInformasi}', [PermohonanInformasiController::class, 'show'])->middleware('role:super_admin,admin,operator');
    Route::patch('/permohonan_informasi/{permohonanInformasi}/tolak', [PermohonanInformasiController::class, 'reject'])->middleware('role:super_admin,admin');
    Route::patch('/permohonan_informasi/{permohonanInformasi}/terima', [PermohonanInformasiController::class, 'accept'])->middleware('role:super_admin,admin');
    Route::patch('/permohonan_informasi/{permohonanInformasi}/upload', [PermohonanInformasiController::class, 'upload'])->middleware('role:super_admin,admin');
    Route::get('/permohonan_informasi/{permohonanInformasi}/edit', [PermohonanInformasiController::class, 'edit'])->middleware('role:super_admin,admin');
    Route::patch('/permohonan_informasi/{permohonanInformasi}', [PermohonanInformasiController::class, 'update'])->middleware('role:super_admin,admin');
    Route::delete('/permohonan_informasi/{permohonanInformasi}', [PermohonanInformasiController::class, 'destroy'])->middleware('role:super_admin,admin');

    // pengajuan keberatan
    Route::get('/pengajuan_keberatan', [PengajuanKeberatanController::class, 'index'])->middleware('role:super_admin,admin,operator');
    Route::get('/pengajuan_keberatan/{pengajuanKeberatan}', [PengajuanKeberatanController::class, 'show'])->middleware('role:super_admin,admin,operator');
    Route::patch('/pengajuan_keberatan/{pengajuanKeberatan}/tolak', [PengajuanKeberatanController::class, 'reject'])->middleware('role:super_admin,admin');
    Route::patch('/pengajuan_keberatan/{pengajuanKeberatan}/terima', [PengajuanKeberatanController::class, 'accept'])->middleware('role:super_admin,admin');
    // Route::patch('/pengajuan_keberatan/{pengajuanKeberatan}/upload', [PengajuanKeberatanController::class, 'upload'])->middleware('role:super_admin,admin');
    Route::get('/pengajuan_keberatan/{pengajuanKeberatan}/edit', [PengajuanKeberatanController::class, 'edit'])->middleware('role:super_admin,admin');
    Route::patch('/pengajuan_keberatan/{pengajuanKeberatan}', [PengajuanKeberatanController::class, 'update'])->middleware('role:super_admin,admin');
    Route::delete('/pengajuan_keberatan/{pengajuanKeberatan}', [PengajuanKeberatanController::class, 'destroy'])->middleware('role:super_admin,admin');

    // informasi publik
    Route::get('/informasi_publik', [InformasiPublikController::class, 'index'])->middleware('role:super_admin,admin,operator');
    Route::get('/informasi_publik/create', [InformasiPublikController::class, 'create'])->middleware('role:super_admin,operator');
    Route::post('/informasi_publik', [InformasiPublikController::class, 'store'])->middleware('role:super_admin,operator');
    Route::get('/informasi_publik/{informasiPublik}', [InformasiPublikController::class, 'edit'])->middleware('role:super_admin,operator');
    Route::patch('/informasi_publik/{informasiPublik}', [InformasiPublikController::class, 'update'])->middleware('role:super_admin,operator');
    Route::delete('/informasi_publik/{informasiPublik}', [InformasiPublikController::class, 'destroy'])->middleware('role:super_admin,operator');

    // informasi publik detail
    Route::get('/informasi_publik/{informasiPublikId}/detail', [InformasiPublikDetailController::class, 'index'])->middleware('role:super_admin,admin,operator');
    Route::get('/informasi_publik/{informasiPublikId}/detail/create', [InformasiPublikDetailController::class, 'create'])->middleware('role:super_admin,operator');
    Route::post('/informasi_publik/{informasiPublikId}/detail', [InformasiPublikDetailController::class, 'store'])->middleware('role:super_admin,operator');
    Route::get('/informasi_publik/{informasiPublikId}/{informasiPublikDetail}/detail', [InformasiPublikDetailController::class, 'edit'])->middleware('role:super_admin,operator');
    Route::patch('/informasi_publik/{informasiPublikDetail}/detail', [InformasiPublikDetailController::class, 'update'])->middleware('role:super_admin,operator');
    Route::delete('/informasi_publik/{informasiPublikDetail}/detail', [InformasiPublikDetailController::class, 'destroy'])->middleware('role:super_admin,operator');

    // Email
    Route::get('/email', [EmailController::class, 'index'])->middleware('role:super_admin,admin');
    Route::get('/email/{permohonanInformasi}/send', [EmailController::class, 'send'])->middleware('role:super_admin,admin');

    //rating
    Route::get('/rating', [RatingController::class, 'index'])->middleware('role:super_admin');
    Route::post('/rating/{rating}/post', [RatingController::class, 'post'])->middleware('role:super_admin');
    Route::post('/rating/{rating}/notpost', [RatingController::class, 'notpost'])->middleware('role:super_admin');

    // pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->middleware('role:super_admin');

    // menus
    Route::get('/menu', [MenuController::class, 'index'])->middleware('role:super_admin');
    Route::get('/menu/create', [MenuController::class, 'create'])->middleware('role:super_admin');
    Route::post('/menu', [MenuController::class, 'store'])->middleware('role:super_admin');
    Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])->middleware('role:super_admin');
    Route::patch('/menu/{menu}', [MenuController::class, 'update'])->middleware('role:super_admin');
    Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->middleware('role:super_admin');

    // submenu
    Route::get('/submenu', [SubmenuController::class, 'index'])->middleware('role:super_admin');
    Route::get('/submenu/create', [SubmenuController::class, 'create'])->middleware('role:super_admin');
    Route::post('/submenu', [SubmenuController::class, 'store'])->middleware('role:super_admin');
    Route::delete('/submenu/{submenu}', [SubmenuController::class, 'destroy'])->middleware('role:super_admin');
    Route::get('/submenu/{submenu}/edit', [SubmenuController::class, 'edit'])->middleware('role:super_admin');
    Route::patch('/submenu/{submenu}', [SubmenuController::class, 'update'])->middleware('role:super_admin');

    // image
    Route::get('/image/{slug}',[BackgroundImageController::class, 'index'])->middleware('role:super_admin');
});
