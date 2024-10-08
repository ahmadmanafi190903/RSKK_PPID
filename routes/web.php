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
use App\Http\Controllers\SubmenuController;
use App\Models\InformasiPublikDetail;

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
    Route::get('/permohonan_informasi/{permohonaninformasi}', [PermohonanInformasiController::class, 'show'])->middleware('role:super_admin,admin,operator');
    Route::patch('/permohonan_informasi/{permohonaninformasi}/tolak', [PermohonanInformasiController::class, 'reject'])->middleware('role:super_admin,admin');
    Route::patch('/permohonan_informasi/{permohonaninformasi}/terima', [PermohonanInformasiController::class, 'accept'])->middleware('role:super_admin,admin');
    Route::patch('/permohonan_informasi/{permohonaninformasi}/upload', [PermohonanInformasiController::class, 'upload'])->middleware('role:super_admin,admin');
    Route::get('/permohonan_informasi/{permohonaninformasi}/edit', [PermohonanInformasiController::class, 'edit'])->middleware('role:super_admin,admin');
    Route::patch('/permohonan_informasi/{permohonaninformasi}', [PermohonanInformasiController::class, 'update'])->middleware('role:super_admin,admin');
    Route::delete('/permohonan_informasi/{permohonaninformasi}', [PermohonanInformasiController::class, 'destroy'])->middleware('role:super_admin,admin');

    // pengajuan keberatan
    Route::get('/pengajuan_keberatan', [PengajuanKeberatanController::class, 'index'])->middleware('role:super_admin,admin,operator');
    Route::get('/pengajuan_keberatan/{pengajuankeberatan}', [PengajuanKeberatanController::class, 'show'])->middleware('role:super_admin,admin,operator');
    Route::patch('/pengajuan_keberatan/{pengajuankeberatan}/tolak', [PengajuanKeberatanController::class, 'reject'])->middleware('role:super_admin,admin');
    Route::patch('/pengajuan_keberatan/{pengajuankeberatan}/terima', [PengajuanKeberatanController::class, 'accept'])->middleware('role:super_admin,admin');
    Route::patch('/pengajuan_keberatan/{pengajuankeberatan}/upload', [PengajuanKeberatanController::class, 'upload'])->middleware('role:super_admin,admin');
    Route::get('/pengajuan_keberatan/{pengajuankeberatan}/edit', [PengajuanKeberatanController::class, 'edit'])->middleware('role:super_admin,admin');
    Route::patch('/pengajuan_keberatan/{pengajuankeberatan}', [PengajuanKeberatanController::class, 'update'])->middleware('role:super_admin,admin');
    Route::delete('/pengajuan_keberatan/{pengajuankeberatan}', [PengajuanKeberatanController::class, 'destroy'])->middleware('role:super_admin,admin');

    // informasi publik
    Route::get('/informasi_publik', [InformasiPublikController::class, 'index'])->middleware('role:super_admin,admin,operator');
    Route::get('/informasi_publik/create', [InformasiPublikController::class, 'create'])->middleware('role:super_admin,operator');
    Route::post('/informasi_publik', [InformasiPublikController::class, 'store'])->middleware('role:super_admin,operator');
    Route::get('/informasi_publik/{informasipublik}', [InformasiPublikController::class, 'edit'])->middleware('role:super_admin,operator');
    Route::patch('/informasi_publik/{informasipublik}', [InformasiPublikController::class, 'update'])->middleware('role:super_admin,operator');
    Route::delete('/informasi_publik/{informasipublik}', [InformasiPublikController::class, 'destroy'])->middleware('role:super_admin,operator');

    // informasi publik detail
    Route::get('/informasi_publik/{informasipublikid}/detail', [InformasiPublikDetailController::class, 'index'])->middleware('role:super_admin,admin,operator');
    Route::get('/informasi_publik/{informasipublikid}/detail/create', [InformasiPublikDetailController::class, 'create'])->middleware('role:super_admin,operator');
    Route::post('/informasi_publik/{informasipublikid}/detail', [InformasiPublikDetailController::class, 'store'])->middleware('role:super_admin,operator');
    Route::get('/informasi_publik/{informasipublikid}/{informasiPublikDetail}/detail', [InformasiPublikDetailController::class, 'edit'])->middleware('role:super_admin,operator');
    Route::patch('/informasi_publik/{informasiPublikDetail}/detail', [InformasiPublikDetailController::class, 'update'])->middleware('role:super_admin,operator');
    Route::delete('/informasi_publik/{informasiPublikDetail}/detail', [InformasiPublikDetailController::class, 'destroy'])->middleware('role:super_admin,operator');

    // Email
    Route::get('/email', [EmailController::class, 'index'])->middleware('role:super_admin,admin');
    Route::get('/email/{permohonaninformasi}/send', [EmailController::class, 'send'])->middleware('role:super_admin,admin');

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
