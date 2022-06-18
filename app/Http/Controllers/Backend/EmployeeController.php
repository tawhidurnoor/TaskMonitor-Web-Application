<?php

namespace App\Http\Controllers\Backend;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Invitation;
use App\Project;
use App\Setting;
use App\TimeTracker;
use App\User;
use App\Screenshot;
use App\ProjectPeople;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->email_verified_at == null) {
            return redirect()->route('profile.index');
        }

        $employees = Employee::where('employer_id', Auth::user()->id)
            ->where('is_archived', 0)
            ->get();

        $screenshot_duration = Setting::where('user_id', Auth::user()->id)->value('screenshot_duration');
        return view('backend.employee.index', [
            'employees' => $employees,
            'screenshot_duration' => $screenshot_duration,
        ]);
    }

    public function search(Request $request)
    {
        $serach_query = $request->email;
        $users = User::where('email', 'LIKE', '%' . $serach_query . '%')
            ->where('email', '!=', Auth::user()->email)
            ->get();
        return view('backend.employee.search_result', [
            'serach_query' => $serach_query,
            'users' => $users,
        ]);
    }

    public function invitations()
    {
        // $invitations = Invitation::where('employer_id', Auth::user()->id)->where('is_request_accepted', 0)->get();
        $invitations = Invitation::where('employer_id', Auth::user()->id)
            ->where('is_request_accepted', 0)
            ->leftJoin('users', 'users.email', 'invitations.employee_mail')
            ->selectRaw('users.name, users.profile_picture, invitations.id, invitations.employee_mail, invitations.created_at')
            ->orderBy('invitations.id', 'desc')
            ->get();
        //return $invitations;

        return view('backend.employee.invitations', [
            'invitations' => $invitations,
        ]);
    }

    public function mailInvitations(Request $request)
    {
        $email = $request->email;
        $exploreArr = explode('@', $email);

        $to_name = $exploreArr[0];
        $to_email = $email;
        $data = array('email' => Auth::user()->email);

        Mail::send('backend.email.invitation_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Invitation to join TimeTracker');
            $message->from('noreply@timetracker.codecloudtech.com', 'Time Tracker Solution');
        });

        $invitation = new Invitation();
        $invitation->employer_id = Auth::user()->id;
        $invitation->employee_mail = $request->email;
        $invitation->save();
        return redirect()->route('employee.invitations')->with(["success" => 1]);
    }

    public function storeInvitation(Request $request)
    {
        $invitation = new Invitation();
        $invitation->employer_id = Auth::user()->id;
        $invitation->employee_mail = $request->email;
        $invitation->save();
        return redirect()->route('employee.invitations')->with(["success" => 1]);
    }

    public function destroyInvitation(Request $request)
    {
        $invitation = Invitation::findOrFail($request->id);
        $invitation->delete();
        return redirect()->back();
    }

    public function timeTracker(Employee $employee, Request $request)
    {
        $date = null;
        $project_ids = [];
        $projects = Project::where('user_id', Auth::user()->id)
            ->selectRaw('id')
            ->get();

        foreach ($projects as $project) {
            array_push($project_ids, $project->id);
        }

        $timeTrackers = TimeTracker::whereIn('project_id', $project_ids)
            ->where('user_id', $employee->employee_id)
            ->orderBy('id', 'desc');

        if (isset($request->date)) {
            $timeTrackers->whereDate('start', $request->date);
            $date = $request->date;
        }

        $timeTrackers = $timeTrackers->get();

        $user = User::findOrFail($employee->employee_id);

        return view('backend.employee.timeTracker', [
            'timeTrackers' => $timeTrackers,
            'user' => $user,
            'date' => $date,
        ]);
    }

    public function timeTrackerNoUI(Employee $employee, Request $request)
    {
        $date = null;

        $screenshots = Screenshot::where('user_id', $employee->employee_id)->orderBy('id', 'desc');

        if (isset($request->date)) {
            $screenshots->whereDate('created_at', $request->date);
            $date = $request->date;
        }

        $screenshots = $screenshots->get();

        return view('backend.employee.timeTrackerNoUI', [
            'screenshots' => $screenshots,
            'employee' => $employee,
            'date' => $date,
        ]);
    }


    public function addMacEmp(Request $request)
    {
        $user = new User();
        $user->name = "NOUI" . time();
        $user->email = $user->name . "@noreply.com";
        $user->login_mode = "no ui";
        $user->password = Hash::make("000000");
        $user->save();

        $employee = new Employee();
        $employee->employer_id = Auth::user()->id;
        $employee->employee_id = $user->id;
        $employee->mac_address = $request->mac_address;
        $employee->save();

        return redirect()->back();
    }

    public function report(Employee $employee)
    {
        $user = User::findOrFail($employee->employee_id);

        //project assigned to this user
        $project_people = ProjectPeople::where('user_id', $employee->employee_id)->get();
        $project_ids = [];
        foreach ($project_people as $pp) {
            array_push($project_ids, $pp->project_id);
        }
        $proejcts = Project::whereIn('id', $project_ids)->get();

        //workhour_calculation
        $total_worked =  $this->workTime('all', $user->id);
        $worked_this_week =  $this->workTime('7', $user->id);

        $current_work_average = $worked_this_week / 7;

        return view('backend.employee.report', [
            'user' => $user,
            'proejcts' => $proejcts,
            'total_worked' => $total_worked,
            'worked_this_week' => $worked_this_week,
            'current_work_average' => $current_work_average,
        ]);
    }

    public function workTime($time_dutation, $user_id)
    {
        //getting project ids of this employee's project
        $projects = Project::where('user_id', Auth::user()->id)->get();

        $project_ids_array = [];

        foreach ($projects as $project) {
            array_push($project_ids_array, $project->id);
        }


        if ($time_dutation == 'all') {
            $time_trackers = TimeTracker::where('user_id', $user_id)->whereIn('project_id', $project_ids_array);
        } else {
            $date = Carbon::today()->subDays($time_dutation);
            $time_trackers = TimeTracker::where('user_id', $user_id)->whereIn('project_id', $project_ids_array)->where('start', '>=', $date);
        }
        $time_trackers = $time_trackers->get();

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

    public function archive(Employee $employee)
    {
        $employee->is_archived = 1;
        $employee->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $employee = new Employee();
        // $employee->employer_id = Auth::user()->id;
        // $employee->employee_id = $request->employee_id;
        // $employee->save();

        // return redirect()->route('employee.invitations')->with(["success" => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        if (isset($employee->mac_address)) {
            $user = User::findOrFail($employee->employee_id);
            $response = [];
            $response['id'] = $employee->id;
            $response['screenshot_duration'] = $employee->screenshot_duration;
            $response['mac_address'] = $employee->mac_address;
            $response['name'] = $user->name;
            return $response;
        } else {
            return $employee;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        if (isset($request->mac_address)) {
            $user = User::findOrFail($employee->employee_id);
            $user->name = $request->name;
            $user->save();

            $employee->mac_address = $request->mac_address;
        }

        $employee->screenshot_duration = $request->screenshot_duration;
        $employee->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
