<?php

namespace App;

use Carbon\CarbonInterval;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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

    public function workTime($created_at, $updated_at)
    {
        $days = $created_at->diffInDays($updated_at);
        $hours = $created_at->diffInHours($updated_at->subDays($days));
        $minutes = $created_at->diffInMinutes($updated_at->subHours($hours));
        $seconds = $created_at->diffInSeconds($updated_at->subMinutes($minutes));
        return CarbonInterval::days($days)->hours($hours)->minutes($minutes)->seconds($seconds)->forHumans();
    }
}
