<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceTier extends Model
{
    protected $fillable = ['tier_name', 'payment_interval'];

    use HasFactory;
}
