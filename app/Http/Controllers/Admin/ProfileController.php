<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('profile.index', [
            'user' => $user,
        ]);
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('profile.edit', [
            'user' => $user,
        ]);
    }



    public function patch(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'email' => 'required',
        ]);
        $user = auth()->user();
        $user->name = $request->name;
        $user->company_name = $request->company;
        if ($user->email != $request->email) {
            $user->email = $request->email;
            $user->email = $request->email;
            $user->email_verified_at = NULL;
            $user->save();
            $user->sendEmailVerificationNotification();
            redirect()->route('profile.index');
            return back();
        }
        $user->save();
        return back();
    }
}
