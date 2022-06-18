<?php

namespace App\Http\Controllers\Backend;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Invitation;
use App\Project;
use App\ProjectPeople;
use App\User;
use App\TimeTracker;
use App\Screenshot;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->email_verified_at == null) {
            return redirect()->route('profile.index');
        }

        $default_screenshot_duration = Setting::where('user_id', Auth::user()->id)->value('screenshot_duration');

        $projects = Project::where('user_id', Auth::user()->id)->get();
        $employees = Employee::where('employer_id', Auth::user()->id)->get();


        //screenshots
        $project_ids = [];
        foreach ($projects as $p) {
            array_push($project_ids, $p->id);
        }

        $time_trackers = TimeTracker::whereIn('project_id', $project_ids)->get();
        $time_tracker_ids = [];
        foreach ($time_trackers as $tt) {
            array_push($time_tracker_ids, $tt->id);
        }

        $screenshots = Screenshot::whereIn('time_tracker_id', $time_tracker_ids)->limit(6)->get();
        //end screenshots

        //start stat
        $work_hour_seven_days = $this->workTime(7);
        $work_hour_fourteen_days = $this->workTime(14);
        $work_hour_previous_seven_days = $work_hour_fourteen_days - $work_hour_seven_days;

        $work_hour_difference = $work_hour_seven_days - $work_hour_previous_seven_days;

        if ($work_hour_previous_seven_days == 0) {
            if($work_hour_difference == 0){
                $percent_difference = 0;
            }else{
                $percent_difference = 100;
            }
        } else {
            $percent_difference = $work_hour_difference / $work_hour_previous_seven_days * 100;
        }

        return view('backend.dashboard.dashboard',[
            'projects' => $projects,
            'employees' => $employees,
            'work_hour_seven_days' => $work_hour_seven_days,
            'percent_difference' => $percent_difference,
            'default_screenshot_duration' => $default_screenshot_duration,
            'greetings' => $this->getGreeting(),
            'screenshots' => $screenshots,
        ]);
    }

    public static function workTime($time_dutation)
    {
        //getting project ids of this employee's project
        $projects = Project::where('user_id', Auth::user()->id)->get();

        $project_ids_array = [];

        foreach ($projects as $project) {
            array_push($project_ids_array, $project->id);
        }

        $date = Carbon::today()->subDays($time_dutation);

        $time_trackers = TimeTracker::whereIn('project_id', $project_ids_array)->where('start', '>=', $date)->get();

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

        return $total_hour;
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

    public function getGreeting()
    {
        $greetings = "";

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");

        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $greetings = "Good morning";
        } else

        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            $greetings = "Good afternoon";
        } else

        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            $greetings = "Good evening";
        } else

        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            $greetings = "Good night";
        }

        return $greetings;

    }
}
