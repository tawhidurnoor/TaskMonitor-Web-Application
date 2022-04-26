<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'staff_user_id');
    }
}
