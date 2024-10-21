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
        $information = PermohonanInformasi::get();
        $submission = PengajuanKeberatan::all();
        $public = InformasiPublik::get();
        $ratings = Rating::latest()->get();
        $totalRatings = $ratings->sum('star');
        $averageRating = round($totalRatings / Rating::count(), 2);
        $newComments = $ratings->take(4);
        $dikirim = $information->where('status_id', 2)->count();
        $proses = $information->where('status_id', 3)->count();
        $ditolak = $information->where('status_id', 0)->count();
        $diterima = $information->where('status_id', 1)->count();

        $data = InformasiPublik::get();

        $berkala = $data->where('kategori_informasi_id', 13)->count();
        $serta_merta = $data->where('kategori_informasi_id', 14)->count();
        $setiap_saat = $data->where('kategori_informasi_id', 15)->count();
        $dikecualikan = $data->where('kategori_informasi_id', 16)->count();

        $dataInformasiPublik = [
            'berkala' => $berkala,    
            'serta_merta' => $serta_merta,    
            'setiap_saat' => $setiap_saat,    
            'dikecualikan' => $dikecualikan    
        ];

        return view('admin.dashboard', compact('information', 'submission', 'public', 'averageRating', 'newComments', 'dikirim', 
            'proses', 'ditolak', 'diterima', 'dataInformasiPublik'));
    }

    public function getData()
    {
        
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
