<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InformationController extends Controller
{
    public function index()
    {
        return view('admin.information.index', [
            'activeMenu'  => 'information',
            'information' => Information::first(),
        ]);
    }

    public function sosial_media(Request $request)
    {
        Information::first()->update([
            'email'     => $request->email,
            'address'   => $request->address,
            'facebook'  => $request->facebook,
            'twitter'   => $request->twitter,
            'youtube'   => $request->youtube,
            'instagram' => $request->instagram,
        ]);

        Alert::info('Success', 'Your sosial media has been updated');

        return redirect()->route('information.index');
    }

    public function about(Request $request)
    {
        Information::first()->update([
            'about'     => $request->about,
        ]);

        Alert::info('Success', 'Your about has been updated');

        return redirect()->route('information.index');
    }

    public function visi(Request $request)
    {
        Information::first()->update([
            'visi'     => $request->visi,
        ]);

        Alert::info('Success', 'Your visi has been updated');

        return redirect()->route('information.index');
    }

    public function misi(Request $request)
    {
        Information::first()->update([
            'misi'     => $request->misi,
        ]);

        Alert::info('Success', 'Your misi has been updated');

        return redirect()->route('information.index');
    }
}
