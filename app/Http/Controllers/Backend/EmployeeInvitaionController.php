<?php

namespace App\Http\Controllers\Backend;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeInvitaionController extends Controller
{
    public function index()
    {
        $invitations = Invitation::where('employee_mail', Auth::user()->email)
        ->join('users', 'users.id', 'invitations.employer_id')
        ->selectRaw('invitations.id, users.first_name, users.last_name, users.profile_picture, users.email, users.company_name, invitations.created_at')
        ->get();

        return view('backend.employee_module.invitation.index',[
            'invitations' => $invitations,
        ]);
    }

    public function acceptInvitation(Request $request)
    {
        $invitation = Invitation::findOrFail($request->id);

        $employee = new Employee();
        $employee->employer_id  =$invitation->employer_id;
        $employee->employee_id = Auth::user()->id;

        $employee->save();
        $invitation->delete();
        return redirect()->route('employee.employers.index');
    }
}
