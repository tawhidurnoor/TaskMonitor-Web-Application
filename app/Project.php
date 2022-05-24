<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // public function projectPeople()
    // {
    //     return $this->hasManyThrough(
    //         ProjectPeople::class,
    //         User::class,
    //         'id', // Foreign key on the users table
    //         'project_id', // Foreign key on the project_people table
    //         'user_id', // Local key on the users table
    //         'id' // Local key on the project_people table
    //     );
    // }
}
