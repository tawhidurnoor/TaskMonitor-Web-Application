<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware([
            'auth',
            // 'verified',
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //return view('home');
        if (Auth::user()->login_mode == 'employer') {
            return redirect()->route('dashboard');
        } elseif (Auth::user()->login_mode == 'employee') {
            return redirect()->route('employee.dashboard');
        } elseif (Auth::user()->login_mode == 'admin') {
            return redirect()->route('users.index');
        } else {

            if (isset($request->login_mode)) {
                $user = User::findOrFail(Auth::user()->id);
                $user->login_mode = $request->login_mode;
                $user->save();
                return redirect()->route('home');
            }

            return view('backend.login_mode_selector.index');
        }
    }
}
