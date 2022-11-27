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
        return view('admin.information.form', [
            'activeMenu'  => 'information',
            'information' => Information::first(),
        ]);
    }

    public function store(Request $request)
    {
        Information::first()->update([
            'email'     => $request->email,
            'address'   => $request->address,
            'facebook'  => $request->facebook,
            'twitter'   => $request->twitter,
            'youtube'   => $request->youtube,
            'instagram' => $request->instagram,
        ]);

        Alert::info('Success', 'Your information has been updated');

        return redirect()->route('information.index');
    }
}
