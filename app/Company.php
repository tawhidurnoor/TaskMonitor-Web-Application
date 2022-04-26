<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function staffs()
    {
        return $this->hasMany(Staff::class);
    }
}
