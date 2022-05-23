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
        return view('backend.employee.index');
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
        $invitations = Invitation::where('employer_id', Auth::user()->id)->where('is_request_accepted', 0)->first();
        return $invitations->userDetails()->email;

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
