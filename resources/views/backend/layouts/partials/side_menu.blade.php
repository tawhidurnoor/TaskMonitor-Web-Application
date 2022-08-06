<!--begin::Aside-->
<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '225px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_toggle" data-kt-sticky="true" data-kt-sticky-name="aside-sticky"
    data-kt-sticky-offset="{default: false, lg: '1px'}" data-kt-sticky-width="{lg: '225px'}" data-kt-sticky-left="auto"
    data-kt-sticky-top="94px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
    <!--begin::Aside nav-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5 w-100 ps-4 ps-lg-0 pe-4 me-1" id="kt_aside_menu_wrapper"
        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_header" data-kt-scroll-wrappers="#kt_aside" data-kt-scroll-offset="5px">
        <!--begin::Menu-->
        <div class="menu menu-column menu-active-bg menu-hover-bg menu-title-gray-700 fs-6 menu-rounded w-100"
            id="#kt_aside_menu" data-kt-menu="true">

            <!--begin::Heading-->
            <div class="menu-item">
                <div class="menu-content pb-2">
                    <span class="menu-section text-muted text-uppercase fs-7 fw-bolder">Operations</span>
                </div>
            </div>
            <!--end::Heading-->

            @if (auth()->user()->login_mode == 'employer')
                @include('backend.layouts.partials.micro_elements.side_menu_items_employer')
            @elseif (auth()->user()->login_mode == 'employee')
                @include('backend.layouts.partials.micro_elements.side_menu_items_employee')
            @else
                @include('backend.layouts.partials.micro_elements.side_menu_items_admin')
            @endif

            <!--begin::Menu item - Downloads-->
            <div class="menu-item">
                <a href="{{ route('downloads.index') }}"
                    class="menu-link {{ request()->segment(1) == 'downloads' ? 'active' : '' }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                style="transform: ;msFilter:;" fill="currentColor">
                                <path d="M19 9h-4V3H9v6H5l7 8zM4 19h16v2H4z"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Downloads</span>
                </a>
            </div>
            <!--end::Menu item - Downloads-->

            <!--begin::Menu item - My Subscription-->
            <div class="menu-item">
                <a href="{{ route('subscription.index') }}"
                    class="menu-link {{ request()->segment(1) == 'subscription' ? 'active' : '' }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                style="transform: ;msFilter:;" fill="currentColor">
                                <path
                                    d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 8.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-2zm6 7.5H5v-2h6v2zm8 0h-6v-2h6v2z">
                                </path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">My Subscription</span>
                </a>
            </div>
            <!--end::Menu item - My Subscription-->

            <!--begin::Menu item - Pricing-->
            <div class="menu-item">
                <a href="{{ route('pricing.employer.index') }}"
                    class="menu-link {{ request()->segment(1) == 'pricing' ? 'active' : '' }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                style="transform: ;msFilter:;" fill="currentColor">
                                <path
                                    d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 8.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-2zm6 7.5H5v-2h6v2zm8 0h-6v-2h6v2z">
                                </path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Pricing</span>
                </a>
            </div>
            <!--end::Menu item - Pricing-->

            <!--begin::Menu item - Team-->
            {{-- <div class="menu-item">
                <a href="#" class="menu-link {{ request()->segment(1) == 'team' ? 'active' : '' }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                style="transform: ;msFilter:;" fill="currentColor">
                                <path
                                    d="M9.5 12c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm1.5 1H8c-3.309 0-6 2.691-6 6v1h15v-1c0-3.309-2.691-6-6-6z">
                                </path>
                                <path
                                    d="M16.604 11.048a5.67 5.67 0 0 0 .751-3.44c-.179-1.784-1.175-3.361-2.803-4.44l-1.105 1.666c1.119.742 1.8 1.799 1.918 2.974a3.693 3.693 0 0 1-1.072 2.986l-1.192 1.192 1.618.475C18.951 13.701 19 17.957 19 18h2c0-1.789-.956-5.285-4.396-6.952z">
                                </path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Our Team</span>
                </a>
            </div> --}}
            <!--end::Menu item - Team-->

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside nav-->
</div>
<!--end::Aside-->
