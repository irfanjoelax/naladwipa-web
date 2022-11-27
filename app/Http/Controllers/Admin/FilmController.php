<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FilmController extends Controller
{
    public function index(Request $request, Film $films)
    {
        $keyword = $request->input('keyword');

        $films = $films->when($keyword, function ($query) use ($keyword) {
            return $query->where('title', 'like', '%' . $keyword . '%');
        })->latest()->paginate(10);

        $request = $request->all();

        return view('admin.film.index', [
            'activeMenu' => 'film',
            'request'    => $request,
            'films'      => $films,
        ]);
    }

    public function create()
    {
        return view('admin.film.form', [
            'activeMenu' => 'film',
            'isEdit'     => false,
            'urlForm'    => route('film.store')
        ]);
    }

    public function store(Request $request)
    {
        Film::create([
            'id'    => Str::uuid(),
            'title' => $request->title,
            'slug'  => Str::slug($request->title),
            'url'   => $request->url,
        ]);

        Alert::success('Success', 'Your film has been created');

        return redirect()->route('film.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.film.form', [
            'activeMenu' => 'film',
            'isEdit'     => true,
            'urlForm'    => route('film.update', ['film' => $id]),
            'film'       => Film::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        Film::find($id)->update([
            'title' => $request->title,
            'slug'  => Str::slug($request->title),
            'url'   => $request->url,
        ]);

        Alert::info('Success', 'Your film has been updated');

        return redirect()->route('film.index');
    }

    public function destroy($id)
    {
        Film::find($id)->delete();

        Alert::error('Success', 'Your film has been deleted');

        return redirect()->route('film.index');
    }
}
