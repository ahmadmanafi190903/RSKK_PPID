<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submenu;
use App\Models\Menu;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submenus = Submenu::with('menu')->latest()->get();
        return view('admin.submenu.index', ['submenus' => $submenus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.submenu.create', ['menus' => $menus]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // @dd($request);
        $request->validate([
            'nama' => 'required|max:255',
            'url' => 'nullable|max:255',
            'menu_id' => 'required',
        ],$this->feedback_validate);

        Submenu::create([
            'nama' => $request->nama,
            'url' => $request->url,
            'menu_id' => $request->menu_id,
        ]);

        return redirect('/submenu')->with('success', 'Sub Menu Berhasil Dibuat.');
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
    public function edit(Submenu $submenu)
    {
        $menus = Menu::all();
        return view('admin.submenu.edit', [
            'submenu' => $submenu,
            'menus' => $menus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, submenu $submenu)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'url' => 'nullable|max:255',
            'menu_id' => 'required',
        ],$this->feedback_validate);

        $submenu->update([
            'nama' => $request->nama,
            'url' => $request->url,
            'menu_id' => $request->menu_id,
        ]);

        return redirect('/submenu')->with('success', 'Sub Menu Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Submenu $submenu)
    {
        $submenu->delete();
        return redirect('/submenu')->with('success', 'Data berhasil dihapus');
    }
}
