<div class="d-flex h-100 align-items-center subscription">
    <!--begin::Option-->
    <div
        class="h-100 w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
        <!--begin::Heading-->
        <div class="mb-7 text-center">
            <!--begin::Title-->
            <h1 class="text-dark mb-5 fw-boldest">
                {{ $subscription->subscription_name }}
            </h1>
            <!--end::Title-->
            <!--begin::Description-->
            <div class="text-gray-400 fw-bold mb-5">
                {{ $subscription->description }}
            </div>
            <!--end::Description-->
            <!--begin::Price-->
            <div class="text-center">
                <span class="mb-2 me-5 text-primary">{{$subscription->priceTiers[0]->tier_name}}</span>
                @if ($subscription->priceTiers[0]->pivot->tier_price)                                        
                    <span class="mb-2 text-primary">$</span>
                    <span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="{{ $subscription->priceTiers[0]->pivot->tier_price }}" data-kt-plan-price-annual="{{ $subscription->priceTiers[0]->pivot->tier_price }}">{{ (int)$subscription->priceTiers[0]->pivot->tier_price }}</span>
                    <span class="fs-7 fw-bold opacity-50">/ <span data-kt-element="period">
                        @switch($subscription->priceTiers[0]->payment_interval)
                            @case(1)
                                Mon
                                @break
                            @case(12)
                                Year
                                @break
                            @default
                                {{ $subscription->priceTiers[0]->payment_interval }} {{ Str::plural("Month", $subscription->priceTiers[0]->payment_interval) }} 
                        @endswitch
                    </span></span>
                @else                                        
                    <span class="fs-3x fw-bolder text-primary">Free</span>
                @endif
            </div>
            <!--end::Price-->
        </div>
        <!--end::Heading-->
        <!--begin::Features-->
        <div class="w-100 mb-10">
            <!--begin::Item-->
            <div class="d-flex align-items-center mb-5">
                <span
                    class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to {{ $subscription->number_of_employee }} Active Users</span>
                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                <span class="svg-icon svg-icon-1 svg-icon-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.3" x="2" y="2" width="20"
                            height="20" rx="10" fill="currentColor" />
                        <path
                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-center mb-5">
                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Screenshots are saved for {{ $subscription->screenshot_preserve_duration }} {{ Str::plural("Month", $subscription->screenshot_preserve_duration) }}</span>
                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                <span class="svg-icon svg-icon-1 svg-icon-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.3" x="2" y="2" width="20"
                            height="20" rx="10" fill="currentColor" />
                        <path
                            d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-center mb-5">
                <span class="fw-bold fs-6 {{ ($subscription->finance_module) ? "text-gray-800" : "text-gray-400" }} flex-grow-1">Finance Module</span>
                @if ($subscription->finance_module)
                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                    <span class="svg-icon svg-icon-1 svg-icon-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20"
                                height="20" rx="10" fill="currentColor" />
                            <path
                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                @else
                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20"
                                height="20" rx="10" fill="currentColor" />
                            <rect x="7" y="15.3137" width="12" height="2"
                                rx="1" transform="rotate(-45 7 15.3137)"
                                fill="currentColor" />
                            <rect x="8.41422" y="7" width="12" height="2"
                                rx="1" transform="rotate(45 8.41422 7)"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                @endif
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-center mb-5">
                <span class="fw-bold fs-6 {{ ($subscription->accounting_module) ? "text-gray-800" : "text-gray-400" }} flex-grow-1">Accounting Module</span>
                @if ($subscription->accounting_module)  
                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                    <span class="svg-icon svg-icon-1 svg-icon-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20"
                                height="20" rx="10" fill="currentColor" />
                            <path
                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                @else
                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20"
                                height="20" rx="10" fill="currentColor" />
                            <rect x="7" y="15.3137" width="12" height="2"
                                rx="1" transform="rotate(-45 7 15.3137)"
                                fill="currentColor" />
                            <rect x="8.41422" y="7" width="12" height="2"
                                rx="1" transform="rotate(45 8.41422 7)"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                @endif
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-center mb-5">
                <span class="fw-bold fs-6 {{ ($subscription->network_platform) ? "text-gray-800" : "text-gray-400" }} flex-grow-1">Network Platform</span>
                @if ($subscription->network_platform)  
                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                    <span class="svg-icon svg-icon-1 svg-icon-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20"
                                height="20" rx="10" fill="currentColor" />
                            <path
                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                @else                                  
                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20"
                                height="20" rx="10" fill="currentColor" />
                            <rect x="7" y="15.3137" width="12" height="2"
                                rx="1" transform="rotate(-45 7 15.3137)"
                                fill="currentColor" />
                            <rect x="8.41422" y="7" width="12" height="2"
                                rx="1" transform="rotate(45 8.41422 7)"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                @endif
            </div>
            <!--end::Item-->
        </div>
        <!--end::Features-->                                            
        <!--begin::Select-->
        @if (auth()->user()->subscription_price_tier_id == $subscription->priceTiers[0]->pivot->id)
            <p class="fw-bolder">Currently Active </p>
        @else                                                
            <form action="{{ route('pricing.employer.store') }}" method="post">
                @csrf
                <input type="hidden" name="subscription_tier" value="{{ $subscription->priceTiers[0]->pivot->id }}">
                <button class="btn btn-primary">Select</button>
            </form>
        @endif
        <!--end::Select-->
    </div>
    <!--end::Option-->
</div>