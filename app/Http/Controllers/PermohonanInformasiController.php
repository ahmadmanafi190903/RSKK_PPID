<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemperolehInformasi;
use App\Models\MendapatkanSalinanInformasi;
use App\Models\PermohonanInformasi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Events\PermohonanInformasiEvent;

class PermohonanInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $information = PermohonanInformasi::latest()->paginate(5);
        // @dd($information);
        return view('admin.permohonaninformasi.index', [
            'information' => $information
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $get_information = MemperolehInformasi::all();
        $get_copy = MendapatkanSalinanInformasi::all();
        return view('user.formulir.form-permohonan', [
            'get_information' => $get_information, 
            'get_copy' => $get_copy ]);
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
            'nik' => 'required|digits:16|numeric',
            'file_ktp' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
            'informasi_yang_dibutuhkan' => 'required',
            'alasan_penggunaan_informasi' => 'required',
            'id_memperoleh_informasi' => 'required',
            'id_mendapatkan_salinan_informasi' => 'required',
        ],[
            'required' => 'Data harus diisi.',
            'max' => 'Karakter :attribute maksimal :max.',
            'digits' => ':attribute harus :digits digit.',
            'numeric' => ':attribute harus berupa angka.',
            'unique' => ':attribute sudah terdaftar.',
            'file' => ':attribute harus berupa file.',
            'image' => ':attribute harus berupa gambar.',
            'exists' => ':attribute tidak valid.',
            'mimes' => ':attribute harus berupa gambar.',
            'email' => ':attribute harus berupa email yang valid.', 
        ]);

        $ktp = $request->file('file_ktp');
        $extension = $ktp->getClientOriginalExtension();
        $randomName = Str::random(10);
        $file_name = $randomName . '.' . $extension;
        $file_path = $ktp->storeAs('ktp', $file_name, 'public');

        PermohonanInformasi::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'nik' => $request->nik,
            'file_ktp' => $file_path,
            'informasi_yang_dibutuhkan' => $request->informasi_yang_dibutuhkan,
            'alasan_penggunaan_informasi' => $request->alasan_penggunaan_informasi,
            'id_memperoleh_informasi' => $request->id_memperoleh_informasi,
            'id_mendapatkan_salinan_informasi' => $request->id_mendapatkan_salinan_informasi
        ]);

        return redirect('/')->with('success', 'Permohonan berhasil dikirim');

        // PermohonanInformasiEvent::dispatch( $request->all() );
    }
    
    /**
     * Display the specified resource.
     */
    public function show(PermohonanInformasi $permohonaninformasi)
    {
        // @dd($permohonaninformasi);
        $id = PermohonanInformasi::find($permohonaninformasi->id);
        if ($permohonaninformasi->id_status == 1) {
            $id->update([
                'id_status' => '2'
            ]);
            $permohonaninformasi->refresh();
        }
        return view('admin.permohonaninformasi.show', [
            'item' => $permohonaninformasi
        ]);
    }

    public function reject(Request $request, PermohonanInformasi $permohonaninformasi)
    {
        // @dd($request);
        $request->validate([
            'pesan_ditolak' => 'required',
        ],[
            'required' => 'Data :attribute harus diisi.'
        ]);

        $permohonaninformasi->update([
            'id_status' => '3',
            'pesan_ditolak' => $request->pesan_ditolak
        ]);
        return redirect('/admin/permohonan_informasi/'.$permohonaninformasi->id)->with('success', 'Permohonan berhasil ditolak');
    }
    public function accept(Request $request, PermohonanInformasi $permohonaninformasi)
    {
        $permohonaninformasi->update([
            'id_status' => '4',
        ]);

        return redirect('/admin/permohonan_informasi/'.$permohonaninformasi->id)->with('success', 'Permohonan berhasil diterima');
    }

    public function upload(Request $request, PermohonanInformasi $permohonaninformasi)
    {
        $request->validate([
            'file_acc_permohonan' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
        ],[
            'required' => 'Data harus diisi.',
            'file' => ':attribute harus berupa file.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berupa gambar.',
        ]);

        $file = $request->file('file_acc_permohonan');
        $extension = $file->getClientOriginalExtension();
        $randomName = Str::random(10);
        $file_name = $randomName . '.' . $extension;
        $file_path = $file->storeAs('file_acc', $file_name, 'public');

        $permohonaninformasi->update([
            'file_acc_permohonan' => $file_path
        ]);

        return redirect('/admin/permohonan_informasi/'.$permohonaninformasi->id)->with('success', 'File berhasil diupload');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PermohonanInformasi $permohonaninformasi)
    {
        // @dd($permohonaninformasi);
        $get_information = MemperolehInformasi::all();
        $get_copy = MendapatkanSalinanInformasi::all();
       return view('admin.permohonaninformasi.edit', [
        'information' => $permohonaninformasi,
        'get_information' => $get_information, 
        'get_copy'=> $get_copy
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PermohonanInformasi $permohonaninformasi)
    {
        // @dd($request->file_ktp);
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'no_telepon' => 'required|numeric',
            'pekerjaan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nik' => 'required|digits:16|numeric',
            'informasi_yang_dibutuhkan' => 'required',
            'alasan_penggunaan_informasi' => 'required',
            'file_ktp' => 'file|mimes:jpg,png,jpeg,pdf|max:2048',
            'id_memperoleh_informasi' => 'required',
            'id_mendapatkan_salinan_informasi' => 'required',
        ],[
            'required' => 'Data harus diisi.',
            'max' => 'Karakter :attribute maksimal :max.',
            'digits' => ':attribute harus :digits digit.',
            'numeric' => ':attribute harus berupa angka.',
            'file' => ':attribute harus berupa file.',
            'image' => ':attribute harus berupa gambar.',
            'exists' => ':attribute tidak valid.',
            'mimes' => ':attribute harus berupa gambar.',
            'email' => ':attribute harus berupa email yang valid.',
        ]);

        if ($request->file_ktp) {
            $ktp = $request->file('file_ktp');
            $extension = $ktp->getClientOriginalExtension();
            $randomName = Str::random(10);
            $file_name = $randomName . '.' . $extension;
            $file_path = $ktp->storeAs('ktp', $file_name, 'public');
            Storage::disk('public')->delete($permohonaninformasi->file_ktp);
        } else {
            $file_path = $permohonaninformasi->file_ktp;
        }

        $permohonaninformasi->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'nik' => $request->nik,
            'informasi_yang_dibutuhkan' => $request->informasi_yang_dibutuhkan,
            'alasan_penggunaan_informasi' => $request->alasan_penggunaan_informasi,
            'id_memperoleh_informasi' => $request->id_memperoleh_informasi,
            'id_mendapatkan_salinan_informasi' => $request->id_mendapatkan_salinan_informasi,
            'file_ktp' => $file_path
        ]);

        return redirect('/admin/permohonan_informasi')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PermohonanInformasi $permohonaninformasi)
    {
        $file_name = $permohonaninformasi->file_ktp;
        if ($file_name && Storage::disk('public')->exists($file_name)) {
            Storage::disk('public')->delete($file_name);
        }
        $permohonaninformasi->delete();
        return redirect('/admin/permohonan_informasi')->with('success', 'Data berhasil dihapus');
    }

    public function riwayat()
    {
        $information = [];
        if (request('email')) {
            $information = PermohonanInformasi::where('email', request('email'))->get();
        }
  
        return view('user.formulir.riwayat-user', compact('information'));
    }

    public function login()
    {
        return view('auth.login');
    }

    
}