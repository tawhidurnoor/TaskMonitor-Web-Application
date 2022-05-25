<?php

namespace App\Http\Controllers\Backend;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->email_verified_at == null) {
            return redirect()->route('profile.index');
        }

        $projects = Project::where('user_id', Auth::user()->id)->get();
        $employees = Employee::where('employer_id', Auth::user()->id)->get();
        return view('backend.dashboard',[
            'projects' => $projects,
            'employees' => $employees
        ]);
    }
}
