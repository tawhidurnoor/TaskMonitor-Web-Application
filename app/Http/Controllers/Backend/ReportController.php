<?php

namespace App\Http\Controllers\Backend;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Project;
use App\TimeTracker;
use App\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $date = null;
        $date_formatted = null;
        $dates = null;
        $work_hours = null;
        $employee = null;
        $user = null;
        $is_request = 0;

        ///getting day lists based of selected date range
        if (isset($request->date)) {
            $is_request = 1;
            $date = $request->date;
            $from_date = explode(" - ", $date)[0];
            $to_date = explode(" - ", $date)[1];

            //start getting dates
            $dates = [];

            $startDate = strtotime($from_date);
            $endDate = strtotime($to_date);

            for ($currentDate = $startDate; $currentDate <= $endDate; $currentDate += (86400)) {
                $date_n = date('Y-m-d', $currentDate);
                $dates[] = $date_n;
            }

            //end getting dates
            $date_formatted = [];
            foreach ($dates as $key => $date_value) {
                array_push($date_formatted, date_create($date_value)->format('M d, Y'));
            }
        } else {
            $date = Carbon::now() . " - " . Carbon::now()->subDays(30);
        }

        //getting work hours
        if (isset($request->employee_id)) {
            $user = User::findOrFail($request->employee_id);

            //getting project ids of this employee's project
            $projects = Project::where('user_id', Auth::user()->id)->get();

            $project_ids_array = [];

            foreach ($projects as $project) {
                array_push($project_ids_array, $project->id);
            }

            $work_hours = [];

            foreach ($dates as $key => $date_value) {

                $time_trackers = TimeTracker::where('user_id', $user->id)
                    ->whereIn('project_id', $project_ids_array)
                    ->whereDate('start', $date_value)
                    ->get();

                $total_hour = 0;

                foreach ($time_trackers as $time_tracker) {
                    $start = new Carbon($time_tracker->start);

                    if (isset($time_tracker->end)) {
                        $end = new Carbon($time_tracker->end);
                    } else {
                        $end = Carbon::now();
                    }


                    $total_hour += $end->diffInHours($start);
                }

                array_push($work_hours, $total_hour);
            }
        }

        //all emoloyees list
        $employees = Employee::where('employer_id', Auth::user()->id)
            ->join('users', 'users.id', 'employees.employee_id')
            ->selectRaw('users.id, users.name')
            ->get();

        return view('backend.report.index', [
            'is_request' => $is_request,
            'date' => $date,
            'employees' => $employees,
            'employee' => $employee,
            'dates' => $date_formatted,
            'work_hours' => $work_hours,
        ]);
    }
}
