<?php

namespace App\Http\Controllers\Backend;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Invitation;
use App\PreInvitation;
use App\ProjectPeople;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeInvitaionController extends Controller
{
    public function index()
    {
        $invitations = Invitation::where('employee_mail', Auth::user()->email)
        ->join('users', 'users.id', 'invitations.employer_id')
        ->selectRaw('invitations.id, users.name, users.profile_picture, users.email, users.company_name, invitations.created_at')
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

        //checking project invitation
        if(PreInvitation::where('email', Auth::user()->email)->count() > 0){
            $pre_invitation = PreInvitation::where('email', Auth::user()->email)->first();

            $project_people = new ProjectPeople();
            $project_people->project_id = $pre_invitation->project_id;
            $project_people->user_id = Auth::user()->id;
            $project_people->save();
            $pre_invitation->delete();
        }

        return redirect()->route('employee.employers.index');
    }

    public function rejectInvitation(Request $request)
    {
        $invitation = Invitation::findOrFail($request->id);
        $invitation->delete();
        return redirect()->route('employee.employers.index');
    }
}
