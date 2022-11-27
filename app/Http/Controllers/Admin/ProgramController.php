<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    public function index(Request $request, Program $programs)
    {
        $keyword = $request->input('keyword');

        $programs = $programs->when($keyword, function ($query) use ($keyword) {
            return $query->where('title', 'like', '%' . $keyword . '%');
        })->latest()->paginate(10);

        $request = $request->all();

        return view('admin.program.index', [
            'activeMenu' => 'program',
            'request'    => $request,
            'programs'   => $programs,
        ]);
    }

    public function create()
    {
        return view('admin.program.form', [
            'activeMenu' => 'program',
            'isEdit'     => false,
            'urlForm'    => route('program.store')
        ]);
    }

    public function store(Request $request)
    {
        $image = $request->file('image')->store('program');

        Program::create([
            'id'          => Str::uuid(),
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'image'       => $image,
            'description' => $request->description,
        ]);

        Alert::success('Success', 'Your program has been created');

        return redirect()->route('program.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.program.form', [
            'activeMenu' => 'program',
            'isEdit'     => true,
            'urlForm'    => route('program.update', ['program' => $id]),
            'program'    => Program::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);

        $image = $program->image;

        if ($request->has('image')) {
            $image = $request->file('image')->store('program');

            Storage::delete($program->image);
        }

        $program->update([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'image'       => $image,
            'description' => $request->description,
        ]);

        Alert::info('Success', 'Your program has been updated');

        return redirect()->route('program.index');
    }

    public function destroy($id)
    {
        $program = Program::find($id);

        Storage::delete($program->image);

        $program->delete();

        Alert::error('Success', 'Your program has been deleted');

        return redirect()->route('program.index');
    }
}
