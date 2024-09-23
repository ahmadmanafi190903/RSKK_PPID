<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermohonanInformasiController;
use App\Http\Controllers\PengajuanKeberatanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiPublikController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('user.index');
});


Route::get('/testing', function () {
    return view('testing');
});



//user
Route::get('/permohonan', [PermohonanInformasiController::class, 'create']);
Route::post('/permohonan/create', [PermohonanInformasiController::class, 'store']);
Route::get('/riwayat', [PermohonanInformasiController::class, 'riwayat'])->name('riwayat');

Route::get('/pengajuan',[PengajuanKeberatanController::class,'create']);
Route::post('/pengajuan/create',[PengajuanKeberatanController::class,'store']);

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

    // pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->middleware('role:super_admin');
});