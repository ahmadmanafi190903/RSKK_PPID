<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackgroundImageController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PermohonanInformasiController;
use App\Http\Controllers\PengajuanKeberatanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\InfoFormController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\InformasiPublikController;
use App\Http\Controllers\InformasiPublikDetailController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\QuestAnswerController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\VideoController;

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

    // rating
    Route::get('/rating', [RatingController::class, 'index'])->middleware('role:super_admin');
    Route::post('/rating/{rating}/post', [RatingController::class, 'post'])->middleware('role:super_admin');
    Route::post('/rating/{rating}/notpost', [RatingController::class, 'notpost'])->middleware('role:super_admin');

    // berita
    Route::get('/berita', [BeritaController::class, 'index'])->middleware('role:super_admin');
    Route::get('/berita/create', [BeritaController::class, 'create'])->middleware('role:super_admin');
    Route::post('/berita', [BeritaController::class, 'store'])->middleware('role:super_admin');
    Route::get('/berita/{berita}', [BeritaController::class, 'edit'])->middleware('role:super_admin');
    Route::patch('/berita/{berita}', [BeritaController::class, 'update'])->middleware('role:super_admin');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->middleware('role:super_admin');

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
    Route::get('/submenu/{menuId}', [SubmenuController::class, 'index'])->middleware('role:super_admin');
    Route::get('/submenu/{menuId}/create', [SubmenuController::class, 'create'])->middleware('role:super_admin');
    Route::post('/submenu', [SubmenuController::class, 'store'])->middleware('role:super_admin');
    Route::delete('/submenu/{submenu}', [SubmenuController::class, 'destroy'])->middleware('role:super_admin');
    Route::get('/submenu/{submenu}/edit', [SubmenuController::class, 'edit'])->middleware('role:super_admin');
    Route::patch('/submenu/{submenu}', [SubmenuController::class, 'update'])->middleware('role:super_admin');

    // image
    Route::get('/image_video',[BackgroundImageController::class, 'index'])->middleware('role:super_admin');
    Route::get('/image/{slug}/create',[BackgroundImageController::class, 'create'])->middleware('role:super_admin');
    Route::post('/image',[BackgroundImageController::class, 'store'])->middleware('role:super_admin');
    Route::get('/image/{slug}/{backgroundImage}/edit',[BackgroundImageController::class, 'edit'])->middleware('role:super_admin');
    Route::patch('/image/{backgroundImage}',[BackgroundImageController::class, 'update'])->middleware('role:super_admin');
    Route::delete('/image/{backgroundImage}',[BackgroundImageController::class, 'destroy'])->middleware('role:super_admin');

    // video
    Route::get('/video/create', [VideoController::class, 'create'])->middleware('role:super_admin');
    Route::post('/video', [VideoController::class, 'store'])->middleware('role:super_admin');
    Route::get('/video/{video}/edit', [VideoController::class, 'edit'])->middleware('role:super_admin');
    Route::patch('/video/{video}', [VideoController::class, 'update'])->middleware('role:super_admin');
    Route::delete('/video/{video}', [VideoController::class, 'destroy'])->middleware('role:super_admin');

    // cards
    Route::get('/cards', [CardController::class, 'index'])->middleware('role:super_admin');
    Route::get('/cards/create', [CardController::class, 'create'])->middleware('role:super_admin');
    Route::post('/cards', [CardController::class, 'store'])->middleware('role:super_admin');
    Route::get('/cards/{card}/edit', [CardController::class, 'edit'])->middleware('role:super_admin');
    Route::patch('/cards/{card}', [CardController::class, 'update'])->middleware('role:super_admin');
    Route::delete('/cards/{card}', [CardController::class, 'destroy'])->middleware('role:super_admin');

    // info forms
    Route::get('/info_forms', [InfoFormController::class, 'index'])->middleware('role:super_admin');
    Route::get('/info_forms/create', [InfoFormController::class, 'create'])->middleware('role:super_admin');
    Route::post('/info_forms', [InfoFormController::class, 'store'])->middleware('role:super_admin');
    Route::get('/info_forms/{infoForm}/edit', [InfoFormController::class, 'edit'])->middleware('role:super_admin');
    Route::patch('/info_forms/{infoForm}', [InfoFormController::class, 'update'])->middleware('role:super_admin');
    Route::delete('/info_forms/{infoForm}', [InfoFormController::class, 'destroy'])->middleware('role:super_admin');

    // quest answare
    Route::get('/quest_answer', [QuestAnswerController::class, 'index'])->middleware('role:super_admin');
    Route::get('/quest_answer/create', [QuestAnswerController::class, 'create'])->middleware('role:super_admin');
    Route::post('/quest_answer', [QuestAnswerController::class, 'store'])->middleware('role:super_admin');
    Route::get('/quest_answer/{questAnswer}/edit', [QuestAnswerController::class, 'edit'])->middleware('role:super_admin');
    Route::patch('/quest_answer/{questAnswer}', [QuestAnswerController::class, 'update'])->middleware('role:super_admin');
    Route::delete('/quest_answer/{questAnswer}', [QuestAnswerController::class, 'destroy'])->middleware('role:super_admin');

    // informasi
    Route::get('/informasi', [InformasiController::class, 'index'])->middleware('role:super_admin');
    Route::get('/informasi/create', [InformasiController::class, 'create'])->middleware('role:super_admin');
    Route::post('/informasi', [InformasiController::class, 'store'])->middleware('role:super_admin');
    Route::get('/informasi/{informasi}/edit', [InformasiController::class, 'edit'])->middleware('role:super_admin');
    Route::patch('/informasi/{informasi}', [InformasiController::class, 'update'])->middleware('role:super_admin');
    Route::delete('/informasi/{informasi}', [InformasiController::class, 'destroy'])->middleware('role:super_admin');

    // sosmed
    Route::get('/sosmed', [SosmedController::class, 'index'])->middleware('role:super_admin');
    Route::get('/sosmed/create', [SosmedController::class, 'create'])->middleware('role:super_admin');
    Route::post('/sosmed', [SosmedController::class, 'store'])->middleware('role:super_admin');
    Route::get('/sosmed/{sosmed}/edit', [SosmedController::class, 'edit'])->middleware('role:super_admin');
    Route::patch('/sosmed/{sosmed}', [SosmedController::class, 'update'])->middleware('role:super_admin');
    Route::delete('/sosmed/{sosmed}', [SosmedController::class, 'destroy'])->middleware('role:super_admin');

    // contact
    Route::get('/kontak', [ContactController::class, 'index'])->middleware('role:super_admin');
    Route::get('/kontak/create', [ContactController::class, 'create'])->middleware('role:super_admin');
    Route::post('/kontak', [ContactController::class, 'store'])->middleware('role:super_admin');
    Route::get('/kontak/{contact}/edit', [ContactController::class, 'edit'])->middleware('role:super_admin');
    Route::patch('/kontak/{contact}', [ContactController::class, 'update'])->middleware('role:super_admin');
    Route::delete('/kontak/{contact}', [ContactController::class, 'destroy'])->middleware('role:super_admin');
});
