<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.form', [
            'activeMenu'  => 'profile',
        ]);
    }

    public function store(Request $request)
    {
        $user     = Auth::user();
        $password = $user->password;

        if ($request->has('password')) {
            $password = Hash::make($request->password);
        }

        User::find($user->id)->update([
            'name'     => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);

        Alert::success('Success', 'Your profile has been updated');

        return redirect()->route('profile.index');
    }
}
