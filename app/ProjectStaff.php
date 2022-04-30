<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStaff extends Model
{
    public function staff()
    {
        return $this->hasOne(Staff::class, 'id' , 'staff_id');
    }
}
