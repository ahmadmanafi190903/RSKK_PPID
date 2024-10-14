<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = Berita::latest()->paginate(5);
        return view('admin.properties.berita.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.properties.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'url' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ], $this->feedback_validate);

        $image = $request->file('image');
        $file_org =  $image->getClientOriginalName();
        $random_name = Str::random(5);
        $file_name = $random_name . '-' . $file_org;
        $file_path = $image->storeAs('image', $file_name, 'public');

        Berita::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'url' => $request->url,
            'image' => $file_path
        ]);

        return redirect('/berita')->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        return view('admin.properties.berita.edit', [
            'item' => $berita
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'url' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ], $this->feedback_validate);

        if ($request->image) {
            $image = $request->file('image');
            $file_org =  $image->getClientOriginalName();
            $random_name = Str::random(5);
            $file_name = $random_name . '-' . $file_org;
            $file_path = $image->storeAs('image', $file_name, 'public');
            Storage::disk('public')->delete($berita->image);
        } else {
            $file_path = $berita->image;
        }

        $berita->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'url' => $request->url,
            'image' => $file_path
        ]);

        return redirect('/berita')->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        $file_name = $berita->image;
        if ($file_name && Storage::disk('public')->exists($file_name)) {
            Storage::disk('public')->delete($file_name);
        }
        $berita->delete();
        return redirect('/berita')->with('success', 'Berita berhasil dihapus');
    }
}
