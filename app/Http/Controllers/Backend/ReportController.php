<?php

namespace App\Http\Controllers\Backend;

use App\Employee;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $date = null;
        $employee = null;

        if (isset($request->date)) {
            $date = $request->date;
        } else {
            $date = Carbon::now() . " - " . Carbon::now()->subDays(30);
        }

        if (isset($request->employee)) {
            $employee = $request->employee;
        }

        $employees = Employee::where('employer_id', Auth::user()->id)
            ->join('users', 'users.id', 'employees.employee_id')
            ->selectRaw('users.id, users.name')
            ->get();

        return view('backend.report.index', [
            'date' => $date,
            'employees' => $employees,
            'employee' => $employee,
        ]);
    }
}
