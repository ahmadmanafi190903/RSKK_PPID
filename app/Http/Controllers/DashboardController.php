<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermohonanInformasi;
use App\Models\PengajuanKeberatan;
use App\Models\InformasiPublik;


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
            'public'=> $public
        ]);
    }
}
