<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Card;
use App\Models\InfoService;
use App\Models\PermohonanInformasi;
use App\Models\PengajuanKeberatan;
use App\Models\InformasiPublik;
use App\Models\Rating;
use App\Models\Video;

class DashboardController extends Controller
{
    public function index()
    {
        $information = PermohonanInformasi::all();
        $submission = PengajuanKeberatan::all();
        $public = InformasiPublik::all();
        $ratings = Rating::all();
        return view('admin.dashboard', compact('information', 'submission', 'public', 'ratings'));
    }

    public function home()
    {
        $ratings = Rating::where('status_post', 2)->take(6)->latest()->get();
        $cards = Card::take(4)->latest()->get();
        $video = Video::latest()->first();
        $news = Berita::take(3)->latest()->get();
        $infoServices = InfoService::take(2)->latest()->get();
        return view('user.index', compact('ratings', 'cards', 'video', 'news', 'infoServices'));
    }
}
