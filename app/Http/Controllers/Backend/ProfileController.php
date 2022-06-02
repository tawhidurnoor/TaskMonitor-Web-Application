<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
