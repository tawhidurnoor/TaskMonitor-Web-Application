@extends('backend.layouts.full.mainlayout')

@section('body')
    <!--begin::Content-->
    <div class="content flex-column-fluid" id="kt_content">
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <div class="page-title d-flex flex-column py-1">
                <h1 class="d-flex align-items-center my-1">
                    <span class="text-dark fw-bolder fs-1">Subscription list</span>
                </h1>
            </div>

            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                <button class="btn btn-flex btn-sm btn-primary fw-bolder border-0 fs-6 h-40px" data-bs-toggle="modal"
                    data-bs-target="#add_modal" id="kt_toolbar_primary_button">
                    + Add subscription
                </button>
                <!--end::Button-->
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="d-flex h-100 align-items-center subscription">
                    <button data-subscription=""
                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow subscription-edit">
                        <i class="bi bi-pencil-fill fs-7"></i>
                    </button>
                    <button data-subscription=""
                        class="btn btn-icon btn-circle btn-active-color-danger w-25px h-25px bg-body shadow subscription-remove">
                        <i class="bi bi-x fs-2"></i>
                    </button>
                    <!--begin::Option-->
                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                        <!--begin::Heading-->
                        <div class="mb-7 text-center">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-5 fw-boldest">
                                Free
                            </h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-gray-400 fw-bold mb-5">
                                This is free tier.
                            </div>
                            <!--end::Description-->
                            <!--begin::Price-->
                            <span class="fs-3x fw-bolder text-primary">Free</span>
                            <!--end::Price-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Features-->
                        <div class="w-100 mb-10">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-5">
                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to 10 Active Users</span>
                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                            rx="10" fill="currentColor" />
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
                                <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Screenshots are saved for 2
                                    {{ Str::plural('Month', 2) }}</span>
                                <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                            rx="10" fill="currentColor" />
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                rx="10" fill="currentColor" />
                                            <path
                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                @else
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen040.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                rx="10" fill="currentColor" />
                                            <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                                transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                            <rect x="8.41422" y="7" width="12" height="2"
                                                rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                height="20" rx="10" fill="currentColor" />
                                            <rect x="7" y="15.3137" width="12" height="2"
                                                rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                            <rect x="8.41422" y="7" width="12" height="2"
                                                rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                height="20" rx="10" fill="currentColor" />
                                            <rect x="7" y="15.3137" width="12" height="2"
                                                rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                            <rect x="8.41422" y="7" width="12" height="2"
                                                rx="1" transform="rotate(45 8.41422 7)" fill="currentColor" />
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
            </div>
            @foreach ($subscriptions as $item)
                <div class="col-xl-4">
                    <div class="d-flex h-100 align-items-center subscription">
                        <button data-subscription="{{ $item->id }}"
                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow subscription-edit">
                            <i class="bi bi-pencil-fill fs-7"></i>
                        </button>
                        <button data-subscription="{{ $item->id }}"
                            class="btn btn-icon btn-circle btn-active-color-danger w-25px h-25px bg-body shadow subscription-remove">
                            <i class="bi bi-x fs-2"></i>
                        </button>
                        <!--begin::Option-->
                        <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                            <!--begin::Heading-->
                            <div class="mb-7 text-center">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-5 fw-boldest">
                                    {{ $item->subscription_name }}
                                </h1>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="text-gray-400 fw-bold mb-5">
                                    {{ $item->description }}
                                </div>
                                <!--end::Description-->
                                <!--begin::Price-->
                                @foreach ($item->priceTiers as $priceTier)
                                    <div class="text-center">
                                        <span class="mb-2 me-5 text-primary">{{ $priceTier->tier_name }}</span>
                                        @if ($priceTier->pivot->tier_price)
                                            <span class="mb-2 text-primary">$</span>
                                            <span class="fs-3x fw-bolder text-primary"
                                                data-kt-plan-price-month="{{ $priceTier->pivot->tier_price }}"
                                                data-kt-plan-price-annual="{{ $priceTier->pivot->tier_price }}">{{ $priceTier->pivot->tier_price }}</span>
                                            <span class="fs-7 fw-bold opacity-50">/ <span
                                                    data-kt-element="period">Mon</span></span>
                                        @else
                                            <span class="fs-3x fw-bolder text-primary">Free</span>
                                        @endif
                                    </div>
                                @endforeach
                                <!--end::Price-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Features-->
                            <div class="w-100 mb-10">
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Up to
                                        {{ $item->number_of_employee }} Active Users</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
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
                                    <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">Screenshots are saved for
                                        {{ $item->screenshot_preserve_duration }}
                                        {{ Str::plural('Month', $item->screenshot_preserve_duration) }}</span>
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
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
                                    @if ($item->finance_module)
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
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
                                    @if ($item->accounting_module)
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
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
                                    @if ($item->network_platform)
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
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
                </div>
            @endforeach

        </div>
    </div>
    <!--end::Content-->
    <div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form action="{{ route('subscription.store') }}" method="POST" class="form">
                        @csrf
                        @method('post')
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Add Subscription</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->


                        <div class="row mb-">
                            <!--begin::Col-->
                            <input type="text" name="subscription_name"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-3"
                                placeholder="Subscription name">
                            <textarea type="text" name="subscription_description"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-3" placeholder="Subscription description"></textarea>
                            <input type="number" name="screenshot_preserve_duration"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-3"
                                placeholder="Screenshot preserve duration (in months)">
                            <input type="number" name="number_of_employee"
                                class="form-control form-control-lg form-control-solid mb-3 mb-lg-3"
                                placeholder="Maximum number of employee">
                            <div class="form-check form-check-custom form-check-solid mb-3 mb-lg-3">
                                <input class="form-check-input" type="checkbox" value="yes" name="finance_module"
                                    id="finance_module" />
                                <label class="form-check-label" for="finance_module">
                                    Financial Module
                                </label>
                            </div>
                            <div class="form-check form-check-custom form-check-solid mb-3 mb-lg-3">
                                <input class="form-check-input" type="checkbox" value="yes" name="accounting_module"
                                    id="accounting_module" />
                                <label class="form-check-label" for="accounting_module">
                                    Accounting Module
                                </label>
                            </div>
                            <div class="form-check form-check-custom form-check-solid mb-3 mb-lg-3">
                                <input class="form-check-input" type="checkbox" value="yes" name="network_platform"
                                    id="network_platform" />
                                <label class="form-check-label" for="network_platform">
                                    Network Module
                                </label>
                            </div>
                            <hr>
                            <h2>Price Tier</h2>
                            @foreach ($price_tiers as $item)
                                <div class="row">
                                    <div class="col-6">
                                        <p class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3 mb-0">{{ $item->tier_name }}
                                        </p>
                                        <p class="m-0 p-0 text-gray-400 fw-bold fs-6 flex-grow-1 pe-3">Leave empty to
                                            disable</p>
                                    </div>
                                    <div class="col-6">
                                        <input type="hidden" name="price_tier_id[]" value="{{ $item->id }}">
                                        <input type="number" name="price_tier[]"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-3"
                                            placeholder="Price">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                Done
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
@endsection

@push('js')
    <script>
        $('.subscription-edit').on('click', () => {})
        $('.subscription-remove').on('click', (e) => {
            $.ajax({
                type: 'POST',
                url: `{{ url('subscription') }}/${e.currentTarget.dataset.subscription}`,
                data: {
                    _method: 'delete'
                },
                success: function(response) {
                    location.reload();
                }
            });
        })
    </script>
@endpush
