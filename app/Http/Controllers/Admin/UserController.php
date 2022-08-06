<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('login_mode', '!=', 'admin')
            ->where('login_mode', '!=', 'employee')
            ->where('email', '!=', Auth::user()->email)
            ->get();
        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function details(User $user)
    {
        $created_projects = Project::where('user_id', $user->id)->get();

        $assigned_projects = Project::join('project_people', 'project_people.project_id', 'projects.id')
            ->where('project_people.user_id', $user->id)
            ->selectRaw('projects.*')
            ->get();

        return view('users.details', [
            'user' => $user,
            'created_projects' => $created_projects,
            'assigned_projects' => $assigned_projects
        ]);
    }

    public function composeMail(User $user)
    {
        return view('users.compose_mail', [
            'user' => $user,
        ]);
    }

    private $subject = "";

    public function sendMail(User $user, Request $request)
    {
        $to_name = $user->name;
        $to_email = $request->compose_to;
        $this->subject = $request->compose_subject;
        $mail_body = $request->mail_body;
        $data = array('name' => $to_name, "body" => $mail_body);

        Mail::send('users.mail_body', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject($this->subject);
            $message->from('noreply@timetracker.codecloudtech.com', $this->subject);
        });
    }

    public function employeeList($id)
    {
        $users = User::where('login_mode', '!=', 'admin')
            ->where('email', '!=', Auth::user()->email)
            ->join('employees', 'employees.employee_id', '=', 'users.id')
            ->where('employees.employer_id', '=', $id)
            ->get();

        $user = User::findOrfail($id);
        //echo $employee;

        return view('users.employee_list', [
            'users' => $users,
            'user' => $user,
        ]);
    }
}
