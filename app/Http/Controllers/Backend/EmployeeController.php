<?php

namespace App\Http\Controllers\Backend;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Invitation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        $employees = Employee::where('employer_id', Auth::user()->id)->get();
        return view('backend.employee.index',[
            'employees' => $employees
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
        ->selectRaw('users.first_name, users.last_name, users.profile_picture, invitations.id, invitations.employee_mail, invitations.created_at')
        ->orderBy('invitations.id', 'desc')
        ->get();
        //return $invitations;

        return view('backend.employee.invitations',[
            'invitations' => $invitations,
        ]);
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
        //
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
        //
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