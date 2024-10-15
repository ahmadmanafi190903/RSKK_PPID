<?php

namespace App\Http\Controllers;

use App\Models\InfoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InfoServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infoService = InfoService::latest()->get();
        return view('admin.properties.infoServices.index', compact('infoService'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.properties.infoServices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
            'url' => 'required',
            'nama_button' => 'required',
        ]);

        $icon = $request->file('icon');
        $file_org =  $icon->getClientOriginalName();
        $random_name = Str::random(5);
        $file_name = $random_name . '-' . $file_org;
        $file_path = $icon->storeAs('icons', $file_name, 'public');

        InfoService::create([
            'icon' => $file_path,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'url' => $request->url,
            'nama_button' => $request->nama_button,
        ]);

        return redirect('/info_services')->with('success', 'Data info layanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(InfoService $infoForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InfoService $infoService)
    {
        return view('admin.properties.infoServices.edit', [
            'item' => $infoService
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InfoService $infoService)
    {
        $request->validate([
            'icon' => 'image|mimes:jpg,jpeg,png|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
            'url' => 'required',
            'nama_button' => 'required',
        ], $this->feedback_validate);

        if ($request->icon) {
            $icon = $request->file('icon');
            $file_org =  $icon->getClientOriginalName();
            $random_name = Str::random(5);
            $file_name = $random_name . '-' . $file_org;
            $file_path = $icon->storeAs('icons', $file_name, 'public');
            Storage::disk('public')->delete($infoService->icon);
        } else {
            $file_path = $infoService->icon;
        }

        $infoService->update([
            'icon' => $file_path,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'url' => $request->url
        ]);

        return redirect('/info_services')->with('success', 'Data info layanan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InfoService $infoService)
    {
        $file_name = $infoService->icon;
        if ($file_name && Storage::disk('public')->exists($file_name)) {
            Storage::disk('public')->delete($file_name);
        }
        $infoService->delete();
        return redirect('/info_services')->with('success', 'Data info layanan berhasil dihapus.');
    }
}
