<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanKeberatan;
use App\Models\PermohonanInformasi;
use App\Models\AlasanPengajuan;
use App\Events\PengajuanKeberatanEvent;
use Illuminate\Support\Facades\Crypt;

class PengajuanKeberatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submission = PengajuanKeberatan::latest()->paginate(5);
        return view('admin.pengajuankeberatan.index', [
            'submission' => $submission
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reason = AlasanPengajuan::all();
        if (request('pemohon')) {
            $dekripsi = Crypt::decrypt(request('pemohon'));
            $applicant = PermohonanInformasi::where('id', $dekripsi)->first();
            return view('user.formulir.form-pengajuan', [
                'reason' => $reason,
                'applicant' => $applicant 
            ]);
        } else {
            $applicant = [];
            return view('user.formulir.form-pengajuan', [
                'reason' => $reason,
                'applicant' => $applicant 
            ]);
        }
    }

    // public function create2()
    // {
    //     $applicant = [];
    //     if (request('pemohon')) {
    //         $applicant = PermohonanInformasi::where('id', request('pemohon'))->first();
    //     }
    //     $reason = AlasanPengajuan::all();
    //     return view('user.formulir.form-pengajuan', [
    //         'reason' => $reason,
    //         'applicant' => $applicant 
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'nama' => 'required|max:255',
        'email' => 'required|email:rfc,dns|max:255',
        'no_telepon' => 'required|numeric',
        'pekerjaan' => 'required|max:255',
        'alamat' => 'required|max:255',
        'id_alasan_pengajuan' => 'required',
        'tujuan_penggunaan_informasi' => 'required',
    ],$this->feedback_validate);

    PengajuanKeberatan::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'no_telepon' => $request->no_telepon,
        'pekerjaan' => $request->pekerjaan,
        'alamat' => $request->alamat,
        'id_alasan_pengajuan' => $request->id_alasan_pengajuan,
        'tujuan_penggunaan_informasi' => $request->tujuan_penggunaan_informasi,
    ]);

    return redirect('/')->with('success', 'Pengajuan keberatan berhasil dikirim');

    // PengajuanKeberatanEvent::dispatch($request->nama, $request->email);
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanKeberatan $pengajuankeberatan)
    {
        if ($pengajuankeberatan->id_status == 1) {
            $pengajuankeberatan->update([
                'id_status' => '2'
            ]);
            $pengajuankeberatan->refresh();
        }
        return view('admin.pengajuankeberatan.show', [
            'submission' => $pengajuankeberatan
        ]);
    }

    public function reject(Request $request, PengajuanKeberatan $pengajuankeberatan)
    {
        $request->validate([
            'pesan_ditolak' => 'required',
        ],[
            'required' => 'Data harus diisi.'
        ]);

        $pengajuankeberatan->update([
            'id_status' => '3',
            'pesan_ditolak' => $request->pesan_ditolak,
        ]);

        return redirect('/pengajuan_keberatan/' . $pengajuankeberatan->id)->with('success', 'Pengajuan keberatan berhasil ditolak');
    }

    public function accept(Request $request, PengajuanKeberatan $pengajuankeberatan)
    {
        $pengajuankeberatan->update([
            'id_status' => '4',
        ]);

        return redirect('/pengajuan_keberatan/' . $pengajuankeberatan->id)->with('success', 'Pengajuan keberatan berhasil diterima');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanKeberatan $pengajuankeberatan)
    {
        $reason = AlasanPengajuan::all();
        return view('admin.pengajuankeberatan.edit', [
            'submission' => $pengajuankeberatan,
            'reason' => $reason
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengajuanKeberatan $pengajuankeberatan)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns,rfc|max:255',
            'no_telepon' => 'required|numeric',
            'pekerjaan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'id_alasan_pengajuan' => 'required',
            'tujuan_penggunaan_informasi' => 'required|max:255',
        ],$this->feedback_validate);

        $pengajuankeberatan->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'id_alasan_pengajuan' => $request->id_alasan_pengajuan,
            'tujuan_penggunaan_informasi' => $request->tujuan_penggunaan_informasi,
        ]);

        return redirect('/pengajuan_keberatan')->with('success', 'Pengajuan keberatan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengajuanKeberatan $pengajuankeberatan)
    {
        $pengajuankeberatan->delete();
        return redirect('/pengajuan_keberatan')->with('success', 'Pengajuan keberatan berhasil dihapus');
    }
}
