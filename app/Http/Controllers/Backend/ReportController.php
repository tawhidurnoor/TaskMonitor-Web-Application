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
use PDF;

class ReportController extends Controller
{
    public function employeeWiseReport(Request $request)
    {
        $date = null;
        $employee_id = null;
        $date_formatted = null;
        $dates = null;
        $work_hours = null;
        $employee = null;
        $user = null;
        $is_request = 0;
        $projects = null;
        $total_hour = 0;
        $from_date = null;
        $to_date = null;
        $average_work_per_day = 0;

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
            $employee_id = $request->employee_id;
            $user = User::findOrFail($employee_id);

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

        //getting infogrphic data
        if (isset($request->employee_id)) {

            //projects assigned to this employee
            $projects = Project::join('project_people', 'project_people.project_id', 'projects.id')
                ->where('project_people.user_id', $request->employee_id)
                ->selectRaw('projects.*')
                ->get();

            //calculating total hours of work
            $project_ids_array = null;
            $project_ids_array = [];

            foreach ($projects as $project) {
                array_push($project_ids_array, $project->id);
            }

            $time_trackers = TimeTracker::where('user_id', $request->employee_id)
                ->whereIn('project_id', $project_ids_array)
                ->whereDate('start', '>=', $from_date)
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

            ///calculating average work per day
            $average_work_per_day = $total_hour / count($date_formatted);
            $average_work_per_day = number_format((float)$average_work_per_day, 2, '.', '');
        }

        //all emoloyees list
        $employees = Employee::where('employer_id', Auth::user()->id)
            ->join('users', 'users.id', 'employees.employee_id')
            ->selectRaw('users.id, users.name')
            ->get();

        return view('backend.report.employee', [
            'is_request' => $is_request,
            'date' => $date,
            'employee_id' => $employee_id,
            'employees' => $employees,
            'employee' => $employee,
            'dates' => $date_formatted,
            'work_hours' => $work_hours,
            'projects' => $projects,
            'total_hour' => $total_hour,
            'average_work_per_day' => $average_work_per_day,
        ]);
    }

    public function generalReport()
    {
        # code...
    }
}
