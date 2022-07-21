<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPriceTier extends Model
{
    use HasFactory;

    protected $fillable = ['subscription_id', 'price_tier_id', 'tier_price'];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function priceTier()
    {
        return $this->belongsTo(PriceTier::class);
    }
}
