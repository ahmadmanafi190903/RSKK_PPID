<?php

namespace App\Http\Controllers;

use App\Mail\Information;
use App\Models\PermohonanInformasi;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {;
        $informations = PermohonanInformasi::latest()
            ->where('status_id', 1)
            ->whereNotNull('file_acc_permohonan');
        if (request('cari')) {
            $informations = $informations->where('nama', 'like', '%' . request('cari') . '%'); 
        }
        $informations = $informations->paginate(5); 
        return view('admin.menuUtama.email.index', compact('informations'));
    }

    public function send(PermohonanInformasi $permohonanInformasi){

        $data = $permohonanInformasi;
        $data->update([
            'status_pengiriman' => true
        ]);
        Mail::to($data->email)->send(new Information($data));
        return redirect()->back()->with('success', 'berhasil dikirim');
    }
}
