<?php

namespace App\Http\Controllers;

use App\Project;
use App\Screenshot;
use App\Setting;
use App\TimeTracker;
use App\User;
use App\Employee;
use App\ProjectPeople;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TestApiController extends Controller {

    public function dextop_login(Request $request) {
        // $user = User::where('email', $request->email)
        //     ->join('employees', 'employees.employee_id', 'users.id')
        //     ->selectRaw('users.*, employees.screenshot_duration')
        //     ->first();
        // if(!isset($user->screenshot_duration)){
        //     $default_screenshot_duration = Setting::where('user_id', Auth::user()->id)->value('screenshot_duration');
        //     $user->screenshot_duration = $default_screenshot_duration;
        // }

        $users = User::where('email', $request->email)->get();

        if (count($users) > 0) {
            $user = User::where('email', $request->email)->first();
            $request_password = $request->password;
            $hashed_password = $user->password;
            
            if (Hash::check($request_password, $hashed_password) == true) {
                return json_encode($users);
            } else {
                return json_encode([]);
            }
            
        } else {
            return json_encode($users);
        }
    }


    public function dextop_projects(Request $request) {
        $email = $request->email;
        $user_id = User::where('email', $email)->value('id');

        // $staff_id = null;
        // foreach($staff as $stf){
        //     $staff_id = $stf->id;
        // }
        // $project_ids = ProjectStaff::where('staff_id', $staff_id)->selectRaw('project_id')->toSql();
        $project_ids = DB::table('project_people')
                ->where('user_id', $user_id)
                ->selectRaw('project_id')
                ->get();

        $project_staff_ids_array = [];

        foreach ($project_ids as $id) {
            array_push($project_staff_ids_array, $id->project_id);
        }

        // $projects = Project::whereIn('id', $project_staff_ids_array)->select('title')->get()->pluck('title');

        $project_name_with_id = [];
        $projects = Project::whereIn('id', $project_staff_ids_array)->get();
        foreach ($projects as $project) {
            array_push($project_name_with_id, $project->id . "_" . $project->title);
        }

        return json_encode($project_name_with_id);
    }

    public function dextop_time_tracker(Request $request) {
        $email = $request->email;
        $project_id = explode("_", $request->project)[0];
        $task_title = $request->task_title;

        $user_id = User::where('email', $email)->first()->id;
        $project_people = ProjectPeople::where('user_id', $user_id)->where('project_id', $project_id)->first();
        // $project_id = Project::where('title', $project)->first()->id;

        $time_tracker = new TimeTracker();
        $time_tracker->project_id = $project_id;
        $time_tracker->user_id = $user_id;
        $time_tracker->task_title = $task_title;
        $time_tracker->start = date('Y-m-d H:i:s');
        $time_tracker->project_people_id = $project_people->id;
        $time_tracker->save();

        // $response = array($time_tracker);
        // return json_encode($response);

        return $time_tracker->id;
    }

    public function dextop_screenshot_duration(Request $request) {
        //getting screenshot duration
        $project_id = Timetracker::findOrFail($request->time_tracker_id)->project_id;

        $project = Project::findOrFail($project_id);
        $employer_id = $project->user_id;

        $employee_id = User::where('email', $request->email)->first()->id;

        $employee = Employee::where([
                    'employer_id' => $employer_id,
                    'employee_id' => $employee_id
                ])->first();

        if (isset($employee->screenshot_duration)) {
            $screenshot_duration = $employee->screenshot_duration;
        } else {
            $screenshot_duration = Setting::where('user_id', $employer_id)->first()->screenshot_duration;
        }

        return $screenshot_duration;
    }

    public function dextop_time_tracker_stop(Request $request) {
        $timeTrackerId = $request->timeTrackerId;

        $timeTracker = TimeTracker::findOrFail($timeTrackerId);
        $timeTracker->end = date('Y-m-d H:i:s');
        $timeTracker->save();

        return $timeTracker;
    }

    public function dextop_test_upload(Request $request) {
        $email = $request->email;
        $timeTrackerId = $request->timeTrackerId;

        $user_id = User::where('email', $email)->first()->id;

        $screenshot = new Screenshot();
        $screenshot->time_tracker_id = $timeTrackerId;
        $screenshot->user_id = $user_id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();

            //naming file
            $staff_name = User::where('email', $email)->first()->name;
            $single_names = explode(" ", $staff_name);
            $first_name = $single_names[0];
            $first_name = strtolower($first_name);
            $reversed_first_name = strrev($first_name);

            $filename = time() . '_' . $reversed_first_name . '_time_tracker_no_' . $timeTrackerId . '.' . $extention;
            $file->move('captured/', $filename);

            $screenshot->image = $filename;
        }

        $screenshot->save();
    }

    public function dextop_no_ui_upload(Request $request) {
        $mac_address = $request->macAddress;

        $employee = Employee::where('mac_address', $mac_address)->first();

        //creting screenshot object
        $screenshot = new Screenshot();
        $screenshot->user_id = $employee->employee_id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();

            //naming file
            $filename = time() . '_' . $mac_address . '.' . $extention;
            $file->move('captured/', $filename);

            $screenshot->image = $filename;
        }

        $screenshot->save();
    }

}
