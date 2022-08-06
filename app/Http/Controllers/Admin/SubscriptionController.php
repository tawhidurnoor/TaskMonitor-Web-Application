<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PriceTier;
use App\Subscription;
use App\SubscriptionPriceTier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subscription.index')->with([
            'price_tiers' => PriceTier::get(),
            'subscriptions' => Subscription::with('priceTiers')->get()
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
        $request->validate([
            'subscription_name' => 'required',
            'subscription_name' => 'required',
            'screenshot_preserve_duration' => 'required',
            'number_of_employee' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $subscription = Subscription::create([
                'subscription_name' => $request->subscription_name,
                'description' => $request->subscription_description,
                'screenshot_preserve_duration' => $request->screenshot_preserve_duration,
                'number_of_employee' => $request->number_of_employee,
                'network_platform' => ($request->network_platform) ? 1 : 0,
                'accounting_module' => ($request->accounting_module) ? 1 : 0,
                'finance_module' => ($request->finance_module) ? 1 : 0,
            ]);

            foreach ($request->price_tier_id as $idx => $price_tier_id) {
                if ($request->price_tier[$idx] !== NULL) {
                    SubscriptionPriceTier::create([
                        'subscription_id' => $subscription->id,
                        'price_tier_id' => $price_tier_id,
                        'tier_price' => $request->price_tier[$idx],
                    ]);
                }
            }
        });

        return back();
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
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
    }
}
