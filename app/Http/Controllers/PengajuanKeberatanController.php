<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanKeberatan;
use App\Models\PermohonanInformasi;
use App\Models\AlasanPengajuan;
use App\Events\PengajuanKeberatanEvent;
use App\Models\Reference;
use Illuminate\Support\Facades\Crypt;

class PengajuanKeberatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submission = PengajuanKeberatan::latest()->paginate(5);
        return view('admin.pengajuankeberatan.index', compact('submission'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reason = Reference::where('slug', 'pengajuan')->get();
        if (request('pemohon')) {
            $dekripsi = Crypt::decrypt(request('pemohon'));
            $applicant = PermohonanInformasi::where('id', $dekripsi)->first();
            return view('user.formulir.form-pengajuan', compact('reason', 'applicant'));
        } else {
            $applicant = [];
            return view('user.formulir.form-pengajuan', compact('reason', 'applicant'));
        }
    }

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
        'alasan_pengajuan_id' => 'required',
        'tujuan_penggunaan_informasi' => 'required',
    ],$this->feedback_validate);

    PengajuanKeberatan::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'no_telepon' => $request->no_telepon,
        'pekerjaan' => $request->pekerjaan,
        'alamat' => $request->alamat,
        'alasan_pengajuan_id' => $request->alasan_pengajuan_id,
        'tujuan_penggunaan_informasi' => $request->tujuan_penggunaan_informasi,
    ]);

    return redirect('/')->with('success', 'Pengajuan keberatan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanKeberatan $pengajuanKeberatan)
    {
        if ($pengajuanKeberatan->status_id == 2) {
            $pengajuanKeberatan->update([
                'status_id' => '3'
            ]);
            $pengajuanKeberatan->refresh();
        }
        return view('admin.pengajuankeberatan.show', [
            'item' => $pengajuanKeberatan
        ]);
    }

    public function reject(Request $request, PengajuanKeberatan $pengajuanKeberatan)
    {
        $pengajuanKeberatan->update([
            'status_id' => '0'
        ]);

        return redirect('/pengajuan_keberatan/' . $pengajuanKeberatan->id)->with('success', 'Pengajuan keberatan berhasil ditolak');
    }

    public function accept(Request $request, PengajuanKeberatan $pengajuanKeberatan)
    {
        $pengajuanKeberatan->update([
            'status_id' => '1',
        ]);

        return redirect('/pengajuan_keberatan/' . $pengajuanKeberatan->id)->with('success', 'Pengajuan keberatan berhasil diterima');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanKeberatan $pengajuanKeberatan)
    {
        $reason = Reference::where('slug', 'pengajuan')->get();
        return view('admin.pengajuankeberatan.edit', compact('reason', 'pengajuanKeberatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengajuanKeberatan $pengajuanKeberatan)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns,rfc|max:255',
            'no_telepon' => 'required|numeric',
            'pekerjaan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'alasan_pengajuan_id' => 'required',
            'tujuan_penggunaan_informasi' => 'required|max:255',
        ],$this->feedback_validate);

        $pengajuanKeberatan->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'alasan_pengajuan_id' => $request->alasan_pengajuan_id,
            'tujuan_penggunaan_informasi' => $request->tujuan_penggunaan_informasi,
        ]);

        return redirect('/pengajuan_keberatan')->with('success', 'Pengajuan keberatan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengajuanKeberatan $pengajuanKeberatan)
    {
        $pengajuanKeberatan->delete();
        return redirect('/pengajuan_keberatan')->with('success', 'Pengajuan keberatan berhasil dihapus');
    }
}
