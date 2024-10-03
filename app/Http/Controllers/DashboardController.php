<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermohonanInformasi;
use App\Models\PengajuanKeberatan;
use App\Models\InformasiPublik;
use App\Models\Rating;

class DashboardController extends Controller
{
    public function index()
    {
        $information = PermohonanInformasi::all();
        $submission = PengajuanKeberatan::all();
        $public = InformasiPublik::all();
        return view('admin.dashboard', [
            'information' => $information,
            'submission' => $submission,
            'public' => $public
        ]);
    }

    public function home()
    {
        $ratings = Rating::take(6)->latest()->get();
        return view('user.index', [
            'ratings' => $ratings
        ]);
    }
}
