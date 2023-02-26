<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Essay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class EssayController extends Controller
{
    public function index(Request $request, Essay $essays)
    {
        $keyword = $request->input('keyword');

        $essays = $essays->when($keyword, function ($query) use ($keyword) {
            return $query->where('title', 'like', '%' . $keyword . '%');
        })->latest()->paginate(10);

        $request = $request->all();

        return view('admin.essay.index', [
            'activeMenu' => 'essay',
            'request'    => $request,
            'essays'     => $essays,
        ]);
    }

    public function create()
    {
        return view('admin.essay.form', [
            'activeMenu' => 'essay',
            'isEdit'     => false,
            'urlForm'    => route('essay.store')
        ]);
    }

    public function store(Request $request)
    {
        $image = $request->file('image')->store('essay');

        Essay::create([
            'id'      => Str::uuid(),
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'image'   => $image,
            'content' => $request->content,
        ]);

        Alert::success('Success', 'Your essay has been created');

        return redirect()->route('essay.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.essay.form', [
            'activeMenu' => 'essay',
            'isEdit'     => true,
            'urlForm'    => route('essay.update', ['essay' => $id]),
            'essay'      => Essay::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $essay = Essay::find($id);

        $image = $essay->image;

        if ($request->has('image')) {
            $image = $request->file('image')->store('essay');

            Storage::delete($essay->image);
        }

        $essay->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'image'   => $image,
            'content' => $request->content,
        ]);

        Alert::info('Success', 'Your essay has been updated');

        return redirect()->route('essay.index');
    }

    public function destroy($id)
    {
        $essay = Essay::find($id);

        Storage::delete($essay->image);

        $essay->delete();

        Alert::error('Success', 'Your essay has been deleted');

        return redirect()->route('essay.index');
    }
}
