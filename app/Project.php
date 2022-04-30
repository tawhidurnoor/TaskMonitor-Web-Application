<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function staffs()
    {
        return $this->hasMany(ProjectStaff::class, 'project_id', 'id');
    }
}
