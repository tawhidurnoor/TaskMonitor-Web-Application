<?php

namespace App\Http\Controllers\Backend;

use App\PriceTier;
use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PricingController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->subscriptionPriceTier);
        $price_tiers = PriceTier::get();
        return view('backend.pricing.index')->with([
            'price_tiers' => $price_tiers,
            'subscriptions' => Subscription::with(['priceTiers' => function($q) use ($price_tiers){
                return $q->where('price_tier_id', $price_tiers[0]->id);
            }])->get(),
            'price_tier' => $price_tiers[0]->id
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'subscription_tier' => 'required'
        ]);

        $user = auth()->user();
        $user->subscription_price_tier_id = $request->subscription_tier;
        $user->save();

        return redirect(route('subscription.index'));
    }

    public function fetchPricingTier($tier)
    {
        return view('backend.pricing.price_tier')->with([
            'subscriptions' => Subscription::with(['priceTiers' => function($q) use ($tier){
                return $q->where('price_tier_id', $tier);
            }])->get(),
            'price_tier' => $tier
        ]);
    }
}
