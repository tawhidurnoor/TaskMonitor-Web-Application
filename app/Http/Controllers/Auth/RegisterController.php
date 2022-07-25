<?php

namespace App\Http\Controllers\Auth;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Invitation;
use App\PreInvitation;
use App\ProjectPeople;
use App\Providers\RouteServiceProvider;
use App\Setting;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:125'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'company_name' => ['max:100'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'company_name' => $data['company_name'],
            'login_mode' => $data['login_mode'],
            'password' => Hash::make($data['password']),
        ]);

        //creting settings;
        $settings = new Setting();
        $settings->user_id = $user->id;
        $settings->save();

        //adding to company as well as project(if has invitation)
        $invitation_count = Invitation::where('employee_mail', $data['email'])->count();

        if ($invitation_count > 0) {
            //invitation
            $invitation = Invitation::where('employee_mail', $data['email'])->first();

            $employee = new Employee();
            $employee->employer_id = $invitation->employer_id;
            $employee->employee_id = $user->id;
            $employee->save();

            $invitation = Invitation::findOrFail($invitation->id);
            $invitation->delete();

            //pre invitation
            $pre_invitation_count = PreInvitation::where('email', $data['email'])->count();

            if ($pre_invitation_count > 0) {
                $pre_invitation = PreInvitation::where('email', $data['email'])->first();

                $project_people = new ProjectPeople();
                $project_people->user_id = $user->id;
                $project_people->project_id = $pre_invitation->project_id;
                $project_people->save();

                $pre_invitation = PreInvitation::findOrFail($pre_invitation->id);
                $pre_invitation->delete();
            }
        }

        return $user;
    }
}
