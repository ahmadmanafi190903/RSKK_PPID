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
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/admin/permohonan_informasi', [PermohonanInformasiController::class, 'index']);
    Route::get('/admin/permohonan_informasi/{permohonaninformasi}', [PermohonanInformasiController::class, 'show']);
    Route::patch('/admin/permohonan_informasi/{permohonaninformasi}/tolak', [PermohonanInformasiController::class, 'reject']);
    Route::patch('/admin/permohonan_informasi/{permohonaninformasi}/terima', [PermohonanInformasiController::class, 'accept']);
    Route::patch('/admin/permohonan_informasi/{permohonaninformasi}/upload', [PermohonanInformasiController::class, 'upload']);
    Route::get('/admin/permohonan_informasi/{permohonaninformasi}/edit', [PermohonanInformasiController::class, 'edit']);
    Route::patch('/admin/permohonan_informasi/{permohonaninformasi}', [PermohonanInformasiController::class, 'update']);
    Route::delete('/admin/permohonan_informasi/{permohonaninformasi}', [PermohonanInformasiController::class, 'destroy']);


    Route::get('/admin/pengajuan_keberatan', [PengajuanKeberatanController::class, 'index']);
    Route::get('/admin/pengajuan_keberatan/{pengajuankeberatan}', [PengajuanKeberatanController::class, 'show']);
    Route::patch('/admin/pengajuan_keberatan/{pengajuankeberatan}/tolak', [PengajuanKeberatanController::class, 'reject']);
    Route::patch('/admin/pengajuan_keberatan/{pengajuankeberatan}/terima', [PengajuanKeberatanController::class, 'accept']);
    Route::patch('/admin/pengajuan_keberatan/{pengajuankeberatan}/upload', [PengajuanKeberatanController::class, 'upload']);
    Route::get('/admin/pengajuan_keberatan/{pengajuankeberatan}/edit', [PengajuanKeberatanController::class, 'edit']);
    Route::patch('/admin/pengajuan_keberatan/{pengajuankeberatan}', [PengajuanKeberatanController::class, 'update']);
    Route::delete('/admin/pengajuan_keberatan/{pengajuankeberatan}', [PengajuanKeberatanController::class, 'destroy']); 


    Route::get('/admin/informasi_publik', [InformasiPublikController::class, 'index']);
    Route::get('/admin/informasi_publik/create', [InformasiPublikController::class, 'create']);
    Route::post('/admin/informasi_publik', [InformasiPublikController::class, 'store']);
    Route::patch('/admin/informasi_publik/{informasipublik}', [InformasiPublikController::class, 'edit']);
    Route::patch('/admin/informasi_publik/{informasipublik}', [InformasiPublikController::class, 'update']);
    Route::delete('/admin/informasi_publik/{informasipublik}', [InformasiPublikController::class, 'destroy']);

    
    Route::get('/admin/pengguna', [PenggunaController::class, 'index']);
});




