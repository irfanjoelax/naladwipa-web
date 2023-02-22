<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Essay;
use App\Models\Program;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('welcome', [
            'banners'  => Banner::all(),
            'essay_terbaru'   => Essay::limit(5)->latest()->get(),
            'essay_terpopuler'   => Essay::limit(5)->orderBy('hit', 'DESC')->get(),
        ]);
    }
}
