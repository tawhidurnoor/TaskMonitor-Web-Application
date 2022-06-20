<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectPeople extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function timeTrackers()
    {
        return $this->hasMany(TimeTracker::class);
    }
}
