<?php

namespace App\Http\Controllers;

use App\Models\Essay;
use Illuminate\Http\Request;

class EssayController extends Controller
{
    public function index(Request $request, Essay $essays)
    {
        $keyword = $request->input('keyword');

        $essays = $essays->when($keyword, function ($query) use ($keyword) {
            return $query->where('title', 'like', '%' . $keyword . '%');
        })->latest()->paginate(10);

        $request = $request->all();

        return view('essay', [
            'request' => $request,
            'essays'  => $essays,
        ]);
    }

    public function detail($slug)
    {
        return view('essay_detail', [
            'essay'        => Essay::where('slug', $slug)->first(),
            'essay_latest' => Essay::limit(6)->latest()->get(),
        ]);
    }
}
