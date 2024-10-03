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
        $informations = PermohonanInformasi::where('id_status', 4)->latest()->paginate(5); 
        // $data = [
        //     'nama'=>'Fikri'
        // ];
        // Mail::to('fikri.amrulloh15@gmail.com')->send(new Information($data));
        // return redirect()->back();
        return view('admin.email.index', [
            'informations' => $informations
        ]);
    }

    public function send(PermohonanInformasi $permohonaninformasi){

        $data = $permohonaninformasi;
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
