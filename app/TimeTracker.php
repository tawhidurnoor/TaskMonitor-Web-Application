<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $project)
 */
class TimeTracker extends Model
{
    protected $fillable = ['project_id', 'user_id', 'project_people_id', 'task_title', 'start', 'end', 'created_at'];


    public function screenshots()
    {
        return $this->hasMany(Screenshot::class, 'time_tracker_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
