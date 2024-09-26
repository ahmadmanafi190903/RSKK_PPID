<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('admin.menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'url' => 'nullable|max:255',
        ],$this->feedback_validate);

        Menu::create([
            'nama' => $request->nama,
            'url' => $request->url,
        ]);

        return redirect('/menu')->with('success', 'Menu Berhasil Dibuat.');
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
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'url' => 'nullable|max:255',
        ],$this->feedback_validate);

        $menu->update([
            'nama' => $request->nama,
            'url' => $request->url,
        ]);

        return redirect('/menu')->with('success', 'Menu Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        // @dd($menu->child->count());
        if($menu->child->count() > 0){
            return redirect('/menu')->with('failed', 'Tidak bisa dihapus, karena masih ada submenu');
        } else {
            $menu->delete();
            return redirect('/menu')->with('success', 'Data berhasil dihapus');
        }
    }
}
