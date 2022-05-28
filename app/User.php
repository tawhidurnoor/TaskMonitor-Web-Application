<?php

namespace App;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateTime;
use Facade\FlareClient\Time\Time;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'company_name', 'password', 'login_mode',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getPermissionGroups()
    {
        $permission_groups = Permission::select('group_name as name')
            ->groupBy('group_name')
            ->get();

        return $permission_groups;
    }

    public static function getpermissionsByGroupName($group_name)
    {
        $permissions = DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    }

    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }

    public static function workTime($user_id)
    {
        $days = 0;
        $hours = 0;
        $minites = 0;

        //getting project ids of this employee's project
        $projects = Project::where('user_id', Auth::user()->id)->get();

        $project_ids_array = [];

        foreach ($projects as $project) {
            array_push($project_ids_array, $project->id);
        }
        
        $time_trackers = TimeTracker::where('user_id', $user_id)
        ->whereIn('project_id', $project_ids_array)
        ->get();

        $total_hour = 0;
        foreach($time_trackers as $time_tracker){
            $start = new Carbon($time_tracker->start);
            $end = new Carbon($time_tracker->end);

            $total_hour += $end->diffInHours($start);
        }

        return $total_hour;
        
    }
}
