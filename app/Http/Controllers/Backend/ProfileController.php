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
        return view('backend.profile.index',[
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
        if($user->email != $request->email){
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
