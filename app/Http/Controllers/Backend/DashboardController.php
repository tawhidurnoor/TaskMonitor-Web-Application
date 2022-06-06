<?php

namespace App\Http\Controllers\Backend;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Invitation;
use App\Project;
use App\ProjectPeople;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->email_verified_at == null) {
            return redirect()->route('profile.index');
        }

        $total_work_hour_this_week = 

        $projects = Project::where('user_id', Auth::user()->id)->get();
        $employees = Employee::where('employer_id', Auth::user()->id)->get();
        return view('backend.dashboard.dashboard',[
            'projects' => $projects,
            'employees' => $employees
        ]);
    }

    public function employeeIndex()
    {
        if (Auth::user()->email_verified_at == null) {
            return redirect()->route('profile.index');
        }

        $invitations = Invitation::where('employee_mail', Auth::user()->email)->get();
        $projects = ProjectPeople::where('user_id', Auth::user()->id)->get();

        return view('backend.dashboard.dashboard_employee',[
            'invitations' => $invitations,
            'projects' => $projects,
        ]);
    }

    public function modeSwitcher()
    {
        $user = User::findOrFail(Auth::user()->id);

        if (Auth::user()->login_mode == 'employee') {
            $user->login_mode = 'employer';
            $user->save();
            return redirect()->route('dashboard');
        }else{
            $user->login_mode = 'employee';
            $user->save();
            return redirect()->route('employee.dashboard');
        }
    }
}
