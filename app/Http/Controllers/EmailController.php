<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Information;
use App\Models\PermohonanInformasi;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        $informations = PermohonanInformasi::where('status_id', 1)->latest()->paginate(5); 
        return view('admin.email.index', [
            'informations' => $informations
        ]);
    }

    public function send(PermohonanInformasi $permohonanInformasi){

        $data = $permohonanInformasi;
        $data->update([
            'status_pengiriman' => true
        ]);
        Mail::to($data->email)->send(new Information($data));
        return redirect()->back()->with('success', 'berhasil dikirim');
        // return view('admin.email.create', [
        //     'information' => $permohonaninformasi
        // ]);
    }
}
