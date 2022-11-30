<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request, Film $films)
    {
        $keyword = $request->input('keyword');

        $films = $films->when($keyword, function ($query) use ($keyword) {
            return $query->where('title', 'like', '%' . $keyword . '%');
        })->latest()->paginate(1);

        $request = $request->all();

        return view('film', [
            'request' => $request,
            'films'   => $films,
        ]);
    }

    public function detail($slug)
    {
        return view('film_detail', [
            'film'        => Film::where('slug', $slug)->first(),
            'film_latest' => Film::limit(6)->latest()->get(),
        ]);
    }
}
