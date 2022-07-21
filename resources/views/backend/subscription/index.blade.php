@extends('backend.layouts.full.mainlayout')
@push('css')
    <style>
        .link-primary.active{
            text-decoration: underline;
        }
    </style>
@endpush

@section('body')
    <!--begin::Content-->
    <div class="content flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column py-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center my-1">
                    <span class="text-dark fw-bolder fs-1">Your Subscription</span>
                </h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post" id="kt_post">
            <div class="card" id="kt_pricing">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                            <p class="fw-bolder">Your are currently enjoing {{ ($subscribed) ? $subscribed->subscription->subscription_name : "Free" }} plan!</p>
                            @if ($subscribed) <p class="fw-bold text-gray-400">Your are billing cycle is {{ $subscribed->priceTier->tier_name }}!</p> @endif
                            <a href="{{ route('pricing.employer.index') }}" class="btn btn-primary btn-sm">Open Subscription Portal</a>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5 col-xxl-5">
                            @if (!$subscribed)
                                <div class="d-flex h-100 align-items-center subscription">
                                    <!--begin::Option-->
                                    <div
                                        class="h-100 w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                        <!--begin::Heading-->
                                        <div class="mb-7 text-center">
                                            <!--begin::Title-->
                                            <h1 class="text-dark mb-5 fw-boldest">
                                                Free
                                            </h1>
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <div class="text-gray-400 fw-bold mb-5">
                                                This is the free tier
                                            </div>
                                            <!--end::Description-->
                                            <!--begin::Price-->
                                            <div class="text-center">                                       
                                                <span class="fs-3x fw-bolder text-primary">Free</span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Features-->
                                        <div class="w-100 mb-10">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-5">
                                                <span
                                                    class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to 10 Active Users</span>
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
                                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Screenshots are saved for 2 {{ Str::plural("Month", 2) }}</span>
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
                                                <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Finance Module</span>
                                                @if (0)
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
                                                <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Accounting Module</span>
                                                @if (0)  
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
                                                <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Network Platform</span>
                                                @if (0)
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
                                    </div>
                                    <!--end::Option-->
                                </div>
                            @else
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
                                                <span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="{{ $subscription->priceTiers[0]->pivot->tier_price }}" data-kt-plan-price-annual="{{ $subscription->priceTiers[0]->pivot->tier_price }}">{{ $subscription->priceTiers[0]->pivot->tier_price }}</span>
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
                                            <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Finance Module</span>
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
                                            <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Accounting Module</span>
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
                                            <span class="fw-bold fs-6 text-gray-400 flex-grow-1">Network Platform</span>
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
                                </div>
                                <!--end::Option-->
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>            
            @if ($subscribed)
            <div class="card mt-10" id="kt_pricing">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-auto">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr015.svg-->
                                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M12 10.6L14.8 7.8C15.2 7.4 15.8 7.4 16.2 7.8C16.6 8.2 16.6 8.80002 16.2 9.20002L13.4 12L12 10.6ZM10.6 12L7.8 14.8C7.4 15.2 7.4 15.8 7.8 16.2C8 16.4 8.3 16.5 8.5 16.5C8.7 16.5 8.99999 16.4 9.19999 16.2L12 13.4L10.6 12Z" fill="currentColor"/>
                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM13.4 12L16.2 9.20001C16.6 8.80001 16.6 8.19999 16.2 7.79999C15.8 7.39999 15.2 7.39999 14.8 7.79999L12 10.6L9.2 7.79999C8.8 7.39999 8.2 7.39999 7.8 7.79999C7.4 8.19999 7.4 8.80001 7.8 9.20001L10.6 12L7.8 14.8C7.4 15.2 7.4 15.8 7.8 16.2C8 16.4 8.3 16.5 8.5 16.5C8.7 16.5 9 16.4 9.2 16.2L12 13.4L14.8 16.2C15 16.4 15.3 16.5 15.5 16.5C15.7 16.5 16 16.4 16.2 16.2C16.6 15.8 16.6 15.2 16.2 14.8L13.4 12Z" fill="currentColor"/>
                                    </svg></span>
                                    <!--end::Svg Icon-->
                                </div>
                                <div class="col-auto">
                                    <p class="fw-bolder mb-0">End your service</p>
                                    <p class="fw-bold m-0 p-0">End your service with us!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <form action="{{ route('subscription.destroy') }}" method="post">
                                <input type="hidden" name="_method" value="delete">
                                @csrf
                                <button class="btn btn-secondary btn-sm">Cancel your plan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection