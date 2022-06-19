<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $project)
 */
class TimeTracker extends Model
{
    public function screenshots()
    {
        return $this->hasMany(Screenshot::class, 'time_tracker_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
