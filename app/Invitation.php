<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    public function userDetails()
    {
        return $this->hasOne(User::class, 'email', 'employee_mail');
    }
}
