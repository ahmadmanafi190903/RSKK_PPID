<?php

namespace App\Http\Controllers;

use App\Models\BackgroundImage;
use App\Models\Berita;
use App\Models\Card;
use App\Models\InfoBanner;
use App\Models\InfoService;
use App\Models\PermohonanInformasi;
use App\Models\PengajuanKeberatan;
use App\Models\InformasiPublik;
use App\Models\QuestAnswer;
use App\Models\Rating;
use App\Models\Video;

class DashboardController extends Controller
{
    public function index()
    {
        $information = PermohonanInformasi::all();
        $submission = PengajuanKeberatan::all();
        $public = InformasiPublik::all();
        $totalRatings = Rating::sum('star');
        $averageRating = round($totalRatings / Rating::count(), 2);
        return view('admin.dashboard', compact('information', 'submission', 'public', 'averageRating'));
    }

    public function home()
    {
        $ratings = Rating::where('status_post', 2)->take(6)->latest()->get();
        $cards = Card::take(4)->latest()->get();
        $video = Video::latest()->first();
        $news = Berita::take(3)->latest()->get();
        $infoServices = InfoService::take(2)->latest()->get();
        $thumbnail = BackgroundImage::where('slug', 'thumbnail')->take(2)->get();
        $questAnswers = BackgroundImage::where('slug', 'q&a')->first();
        $quest = QuestAnswer::all();
        return view('user.index', compact('ratings', 'cards', 'video', 'news', 'infoServices', 'thumbnail', 'questAnswers', 'quest'));
    }
}
