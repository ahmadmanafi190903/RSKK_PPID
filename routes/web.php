<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermohonanInformasiController;
use App\Http\Controllers\PengajuanKeberatanController;
use App\Models\PermohonanInformasi;
use App\Models\PengajuanKeberatan;


Route::get('/', function () {
    return view('user.index');
});



Route::get('/dashboard', function () {
    $information = PermohonanInformasi::all();
    $submission = PengajuanKeberatan::all();
    return view('admin.dashboard', [
        'information' => $information,
        'submission' => $submission
    ]);
});

//user
Route::get('/permohonan', [PermohonanInformasiController::class, 'create']);
Route::post('/permohonan/create', [PermohonanInformasiController::class, 'store']);
Route::get('/riwayat', [PermohonanInformasiController::class, 'riwayat'])->name('riwayat');

Route::get('/pengajuan',[PengajuanKeberatanController::class,'create']);
Route::post('/pengajuan/create',[PengajuanKeberatanController::class,'store']);
//admin
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

Route::get('/auth/login', function (){return view('auth.login');});
