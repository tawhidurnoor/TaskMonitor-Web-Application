<?php

namespace App\Http\Controllers\Backend;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeEmployerController extends Controller
{
    public function index()
    {
        $employers = Employee::where('employee_id', Auth::user()->id)
        ->join('users', 'users.id', 'employees.employer_id')
        ->selectRaw('employees.id, users.first_name, users.last_name, users.profile_picture, users.email, users.company_name')
        ->get();
        
        return view('backend.employee_module.employer.index', [
            'employers' => $employers,
        ]);
    }
}
