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
use App\Models\Reference;
use App\Models\Video;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $information = PermohonanInformasi::get();
        // if (request('year')) {
        //     $information = PermohonanInformasi::whereYear('created_at', request('year'))->get()->count();
        //     dd($information);
        // }
        $submission = PengajuanKeberatan::get();
        $public = InformasiPublik::get();
        $ratings = Rating::latest()->get();
        $totalRatings = $ratings->sum('star');
        $averageRating = round($totalRatings / Rating::count(), 2);
        $newComments = $ratings->take(4);
        $dikirim = $information->where('status_id', 2)->count();
        $proses = $information->where('status_id', 3)->count();
        $ditolak = $information->where('status_id', 0)->count();
        $diterima = $information->where('status_id', 1)->count();

        // permohonan dan pengajuan grafik
        for ($i = 1; $i <= 12; $i++) { 
            $permohonanInforamsiMonth = PermohonanInformasi::whereMonth('created_at', $i)->whereYear('created_at', date('Y'))->get()->count();
            $arrayPermohonanInformasiMonth[$i] = $permohonanInforamsiMonth;
        }
        for ($i = 1; $i <= 12; $i++) { 
            $pengajuanKeberatanMonth = PengajuanKeberatan::whereMonth('created_at', $i)->whereYear('created_at', date('Y'))->get()->count();
            $arrayPengajuanKeberatanMonth[$i] = $pengajuanKeberatanMonth; 
        }

        // informasi publik grafik
        $referencesInfo = Reference::where('slug', 'informasi');
        $referencesInformasi = $referencesInfo->get();
        $referencesInformasiCount = $referencesInfo->count();
        for ($i=0; $i < $referencesInformasiCount; $i++) { 
            $InformasiPublikCount = $public->where('kategori_informasi_id', $referencesInformasi->skip($i)->first()->id)->count();
            $arrayInformasiPublik[$i] = $InformasiPublikCount;
        }

        // permohonan informasi berdasarkan salinan
        $referencesDapat = Reference::where('slug', 'mendapat');
        $referencesMedapat = $referencesDapat->get();
        $referencesMedapatCount = $referencesDapat->count();
        for ($i=0; $i < $referencesMedapatCount; $i++) { 
            $permohonanSalinanCount = $information->where('mendapatkan_salinan_informasi_id', $referencesMedapat->skip($i)->first()->id)->count();
            $arrayPermohonanSalinan[$i] = $permohonanSalinanCount;  
        }

        return view('admin.dashboard', compact('information', 'submission', 'public', 'averageRating', 'newComments', 'dikirim', 
            'proses', 'ditolak', 'diterima', 'referencesInformasi', 'arrayInformasiPublik', 'referencesInformasiCount',
            'arrayPermohonanInformasiMonth', 'arrayPengajuanKeberatanMonth', 'referencesMedapatCount','arrayPermohonanSalinan'));
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
