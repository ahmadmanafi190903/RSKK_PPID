<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermohonanInformasi;
use App\Models\PengajuanKeberatan;

class DashboardController extends Controller
{
    public function index()
    {
        $information = PermohonanInformasi::all();
    $submission = PengajuanKeberatan::all();
    return view('admin.dashboard', [
        'information' => $information,
        'submission' => $submission
    ]);
    }
}
