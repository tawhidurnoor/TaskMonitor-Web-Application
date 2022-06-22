<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    protected $fillable = ['time_tracker_id', 'user_id', 'image', 'created_at'];
}
