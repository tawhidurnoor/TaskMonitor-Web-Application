<?php

namespace App\Http\Controllers\Backend;

use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribed = (auth()->user()->subscription_price_tier_id) ? auth()->user()->subscriptionPriceTier()->with('subscription', 'priceTier')->first() : NULL;
        $subscription = NULL;
        if($subscribed){
            $subscription = Subscription::with(['priceTiers' => function($q) use ($subscribed){
                return $q->where('price_tier_id', $subscribed->priceTier->id);
            }])->find($subscribed->subscription->id);
        }
        return view('backend.subscription.index')->with([
            'subscribed' => $subscribed,
            'subscription' => $subscription
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = auth()->user();
        $user->subscription_price_tier_id = NULL;
        $user->save();

        return back();
    }
}
