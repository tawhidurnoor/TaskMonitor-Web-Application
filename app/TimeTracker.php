<?php

namespace App;

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
}
