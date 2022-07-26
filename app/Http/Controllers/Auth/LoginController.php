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
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Hash;
use Str;
use Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        $user = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            [
                'email' => $user->email
            ],
            [
                'name' => $user->name,
                'email' => $user->email,
                'login_method' => 'gmail',
                'password' => Hash::make(Str::random(24)),
            ]
        );

        $settings_counter = Setting::where('user_id', $user->id)->count();

        if ($settings_counter > 0) {
            $setting = new Setting();
            $setting->user_id = $user->id;
            $setting->save();
        }

        //adding to company as well as project(if has invitation)
        $invitation_count = Invitation::where('employee_mail', $user->email)->count();

        if ($invitation_count > 0) {
            //invitation
            $invitation = Invitation::where('employee_mail', $user->email)->first();

            $employee = new Employee();
            $employee->employer_id = $invitation->employer_id;
            $employee->employee_id = $user->id;
            $employee->save();

            $invitation = Invitation::findOrFail($invitation->id);
            $invitation->delete();

            //pre invitation
            $pre_invitation_count = PreInvitation::where('email', $user->email)->count();

            if ($pre_invitation_count > 0) {
                $pre_invitation = PreInvitation::where('email', $user->email)->first();

                $project_people = new ProjectPeople();
                $project_people->user_id = $user->id;
                $project_people->project_id = $pre_invitation->project_id;
                $project_people->save();

                $pre_invitation = PreInvitation::findOrFail($pre_invitation->id);
                $pre_invitation->delete();
            }
        }

        Auth::login($user, true);
        return redirect('/home');
    }
}
