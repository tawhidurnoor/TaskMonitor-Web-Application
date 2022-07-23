<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubscriptionPrice extends Component
{
    public $subscription;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.subscription-price');
    }
}
