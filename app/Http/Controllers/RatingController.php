<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::latest()->paginate(5);
        // dd($rating);
        return view('admin.rating.index', compact('ratings'));
    }

    public function post(Rating $rating)
    {
        $rating->update([
            'status_post' => 2
        ]);

        return redirect('/rating')->with('success', 'Komentar dipost');
    }

    public function notpost(Rating $rating)
    {
        $rating->update([
            'status_post' => 0
        ]);

        return redirect('/rating')->with('success', 'Komentar tidak dipost');
    }
}
