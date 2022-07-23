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
                    <span class="text-dark fw-bolder fs-1">Pricing</span>
                </h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post" id="kt_post">
            <!--begin::Pricing card-->
            <div class="card" id="kt_pricing">
                <!--begin::Card body-->
                <div class="card-body p-lg-17">
                    <!--begin::Plans-->
                    <div class="d-flex flex-column">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <h1 class="fs-2hx fw-bolder mb-5">Choose Your Plan</h1>
                            <div class="text-gray-400 fw-bold fs-5" id="price_list">
                                Our price tiers
                                @foreach ($price_tiers as $item)
                                    @if ($loop->last)
                                        AND <button data-price_tier="{{ $item->id }}" class="btn link-primary fw-bolder btn-link">{{ $item->tier_name }}</button>
                                    @elseif($loop->first)                                    
                                        <button data-price_tier="{{ $item->id }}" class="btn btn-link active link-primary fw-bolder">{{ $item->tier_name }}</button>
                                    @else
                                        , <button data-price_tier="{{ $item->id }}" class="btn btn-link link-primary fw-bolder">{{ $item->tier_name }}</button>
                                    @endif                                    
                                @endforeach
                            </div>
                        </div>
                        <!--end::Heading-->
                        <!--begin::Row-->
                        <div class="row justify-content-center" id="pricing_models">
                            <div class="col-xl-4">
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
                                        <!--begin::Select-->
                                        @if (is_null(auth()->user()->subscription_price_tier_id))
                                            <p class="fw-bolder">Currently Active </p>
                                        @endif
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            @forelse ($subscriptions as $item)
                                <div class="col-xl-4 mt-3 mt-sm-3 mt-md-0 mt-lg-0 mt-xl-0 mt-xxl-0">
                                    <x-subscription-price :subscription="$item"/>
                                </div>
                                @empty
                                <!--begin::Alert-->
                                <div class="alert alert-warning d-flex align-items-center p-5 mb-10">
                                    <!--begin::Icon-->
                                    <span class="svg-icon svg-icon-2hx svg-icon-primary me-3"></span>
                                    <!--end::Icon-->
                    
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Title-->
                                        <h4 class="mb-1 text-dark">No subscription created</h4>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Alert-->
                            @endforelse
                                
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Plans-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Pricing card-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection


@section('scripts')
<!-- If you want to use the popup integration, -->
<script>
    $('.link-primary').on('click', (e) => {
        let target = e.currentTarget;
        $.ajax({
            type: 'GET',
            url: `{{ url('pricing') }}/${e.currentTarget.dataset.price_tier}`,
            success: function(response) {
                $("#price_list>.link-primary.active").removeClass("active");
                target.classList.add('active');
                $("#pricing_models").html(response);
            }
        });
    })
</script>
@endsection