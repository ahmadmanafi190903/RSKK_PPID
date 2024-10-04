<?php

namespace App\Http\Controllers;

use App\Models\Background_image;
use Illuminate\Http\Request;

class BackgroundImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $slug, string $id)
    {
        dd($id);
        return view('admin.backgroundimage.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Background_image $background_image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Background_image $background_image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Background_image $background_image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Background_image $background_image)
    {
        //
    }
}
