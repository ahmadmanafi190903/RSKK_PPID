<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPublik;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InformasiPublikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $information_public = InformasiPublik::latest()->paginate(5);
        return view('admin.informasipublik.index', ['information_public' => $information_public]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Kategori::all();
        return view('admin.informasipublik.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'ringkasan_informasi' => 'required',
            'pejabat_penguasa_informasi' => 'required|max:255',
            'penanggung_jawab_informasi' => 'required|max:255',
            'bentuk_informasi_cetak' => 'required|max:255',
            'bentuk_informasi_digital' => 'required|max:255',
            'jangka_waktu_penyimpanan' => 'required|max:255',
            'kategori_id' => 'required',
            'link' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
        ], $this->feedback_validate );

        $link = $request->file('link');
        // $extension = $link->getClientOriginalExtension();
        $file_org =  $link->getClientOriginalName();
        $randomName = Str::random(5);
        $file_name = $randomName . '-' . $file_org;
        $file_path = $link->storeAs('link', $file_name, 'public');

        InformasiPublik::create([
            'ringkasan_informasi' => $request->ringkasan_informasi,
            'pejabat_penguasa_informasi' => $request->pejabat_penguasa_informasi,
            'penanggung_jawab_informasi' => $request->penanggung_jawab_informasi,
            'bentuk_informasi_cetak' => $request->bentuk_informasi_cetak,
            'bentuk_informasi_digital' => $request->bentuk_informasi_digital,
            'jangka_waktu_penyimpanan' => $request->jangka_waktu_penyimpanan,
            'kategori_id' => $request->kategori_id,
            'link' => $file_path
        ]);

        return redirect('/informasi_publik')->with('success', 'Informasi Publik berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InformasiPublik $informasipublik)
    {
        $categories = Kategori::all();
        return view('admin.informasipublik.edit', [
            'categories' => $categories,
            'info_public' => $informasipublik
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InformasiPublik $informasipublik)
    {
        $messages = $this->feedback_validate;
        
        $request->validate([
            'ringkasan_informasi' => 'required',
            'pejabat_penguasa_informasi' => 'required|max:255',
            'penanggung_jawab_informasi' => 'required|max:255',
            'bentuk_informasi_cetak' => 'required|max:255',
            'bentuk_informasi_digital' => 'required|max:255',
            'jangka_waktu_penyimpanan' => 'required|max:255',
            'kategori_id' => 'required',
            'link' => 'file|mimes:jpg,png,jpeg,pdf|max:2048',
        ],$this->feedback_validate);

        if ($request->link) {
            $link = $request->file('link');
            $file_org =  $link->getClientOriginalName();
            $randomName = Str::random(5);
            $file_name = $randomName . '-' . $file_org;
            $file_path = $link->storeAs('link', $file_name, 'public');
            Storage::disk('public')->delete($informasipublik->link);
        } else {
            $file_path = $informasipublik->link;
        }

        $informasipublik->update([
            'ringkasan_informasi' => $request->ringkasan_informasi,
            'pejabat_penguasa_informasi' => $request->pejabat_penguasa_informasi,
            'penanggung_jawab_informasi' => $request->penanggung_jawab_informasi,
            'bentuk_informasi_cetak' => $request->bentuk_informasi_cetak,
            'bentuk_informasi_digital' => $request->bentuk_informasi_digital,
            'jangka_waktu_penyimpanan' => $request->jangka_waktu_penyimpanan,
            'kategori_id' => $request->kategori_id,
            'link' => $file_path
        ]);

        return redirect('/informasi_publik')->with('success', 'Informasi Publik berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InformasiPublik $informasipublik)
    {
        $file_name = $informasipublik->link;
        if ($file_name && Storage::disk('public')->exists($file_name)) {
            Storage::disk('public')->delete($file_name);
        }
        $informasipublik->delete();
        return redirect('/informasi_publik')->with('success', 'Data berhasil dihapus');
    }


    public function information(string $kategori_id)
    {
        $informations = InformasiPublik::where('kategori_id', $kategori_id)->latest()->get();
        return view('user.informasipublik.index', ['informations' => $informations]);
    }
}
