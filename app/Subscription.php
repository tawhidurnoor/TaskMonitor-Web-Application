<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['subscription_name','description','screenshot_preserve_duration','number_of_employee','finance_module','accounting_module','network_platform'];

    public function priceTiers()
    {
        return $this->belongsToMany(PriceTier::class, 'subscription_price_tiers', 'subscription_id', 'price_tier_id')->withPivot('tier_price', 'id');;
    }

    public function subscriptionPriceTiers()
    {
        return $this->hasMany(SubscriptionPriceTier::class);
    }
}
