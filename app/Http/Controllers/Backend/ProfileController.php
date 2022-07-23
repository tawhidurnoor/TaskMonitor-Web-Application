<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('backend.profile.index', [
            'user' => $user,
        ]);
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('backend.profile.edit', [
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

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $extention = $file->getClientOriginalExtension();

            //naming file
            $user_name = Auth::user()->name;
            $user_name = str_replace(" ", "_", $user_name);
            $user_name = strtolower($user_name);
            $user_name = strrev($user_name);

            $filename = time() . '_' . $user_name . '_' . Auth::user()->id . '.' . $extention;

            if (isset(Auth::user()->profile_picture)) {
                unlink('uploaded_files/profile_pictures/' . Auth::user()->profile_picture);
            }

            $file->move('uploaded_files/profile_pictures/', $filename);

            $user->profile_picture = $filename;
        }

        $user->save();
        session()->flash('success', 'Updated successfully.');
        return back();
    }
}
