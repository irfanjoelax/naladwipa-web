<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banner.index', [
            'activeMenu' => 'banner',
            'banners'    => Banner::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.banner.form', [
            'activeMenu' => 'banner',
            'isEdit'     => false,
            'url'        => route('banner.store')
        ]);
    }

    public function store(Request $request)
    {
        $image = $request->file('image')->store('banner');

        banner::create(['image' => $image]);

        Alert::success('Success', 'Your banner has been created');

        return redirect()->route('banner.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.banner.form', [
            'activeMenu' => 'banner',
            'isEdit'     => true,
            'url'        => route('banner.update', ['banner' => $id]),
            'banner'     => banner::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $banner = banner::find($id);

        $image = $banner->image;

        if ($request->has('image')) {
            $image = $request->file('image')->store('banner');

            Storage::delete($banner->image);
        }

        $banner->update(['image' => $image]);

        Alert::info('Success', 'Your banner has been updated');

        return redirect()->route('banner.index');
    }

    public function destroy($id)
    {
        $banner = banner::find($id);

        Storage::delete($banner->image);

        $banner->delete();

        Alert::error('Success', 'Your banner has been deleted');

        return redirect()->route('banner.index');
    }
}
