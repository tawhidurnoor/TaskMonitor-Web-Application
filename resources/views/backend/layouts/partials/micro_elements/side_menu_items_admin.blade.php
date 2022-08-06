<!--begin::Menu item - Users-->
<div class="menu-item">
    <a href="{{ route('users.index') }}" class="menu-link {{ request()->segment(1) == 'users' ? 'active' : '' }}">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="transform: ;msFilter:;"
                    fill="currentColor">
                    <path
                        d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2 7.5 4.019 7.5 6.5zM20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h17z">
                    </path>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Users</span>
    </a>
</div>
<!--end::Menu item - Users-->

<!--begin::Menu item - FAQs-->
<div class="menu-item">
    <a href="{{ route('faq.index') }}" class="menu-link {{ request()->segment(1) == 'faq' ? 'active' : '' }}">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="transform: ;msFilter:;"
                    fill="currentColor">
                    <path
                        d="M12 4C9.243 4 7 6.243 7 9h2c0-1.654 1.346-3 3-3s3 1.346 3 3c0 1.069-.454 1.465-1.481 2.255-.382.294-.813.626-1.226 1.038C10.981 13.604 10.995 14.897 11 15v2h2v-2.009c0-.024.023-.601.707-1.284.32-.32.682-.598 1.031-.867C15.798 12.024 17 11.1 17 9c0-2.757-2.243-5-5-5zm-1 14h2v2h-2z">
                    </path>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">FAQs</span>
    </a>
</div>
<!--end::Menu item - FAQs-->

<!--begin::Menu item - Meta-->
<div class="menu-item">
    <a href="{{ route('metainfo.index') }}" class="menu-link {{ request()->segment(1) == 'metainfo' ? 'active' : '' }}">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="transform: ;msFilter:;"
                    fill="currentColor">
                    <path
                        d="M20.26 7.8a4.82 4.82 0 0 0-3.93-2.44 3.91 3.91 0 0 0-2.54 1.09 10.58 10.58 0 0 0-1.52 1.71 11 11 0 0 0-1.63-1.72 4.39 4.39 0 0 0-2.88-1.08A5 5 0 0 0 3.7 8 11.49 11.49 0 0 0 2 14a7 7 0 0 0 .18 1.64A4.44 4.44 0 0 0 2.71 17a3.23 3.23 0 0 0 3 1.6c1.25 0 2.19-.56 3.3-2a26.4 26.4 0 0 0 2.21-3.6l.63-1.12c.06-.09.11-.18.16-.27l.15.25 1.79 3A14.77 14.77 0 0 0 16 17.63a3.38 3.38 0 0 0 2.55 1 3 3 0 0 0 2.54-1.23 2.2 2.2 0 0 0 .18-.28 4.1 4.1 0 0 0 .31-.63l.12-.35A6.53 6.53 0 0 0 22 15a9 9 0 0 0 0-1 11.15 11.15 0 0 0-1.74-6.2zm-10.12 3.56c-.64 1-1.57 2.51-2.37 3.61-1 1.37-1.51 1.51-2.07 1.51a1.29 1.29 0 0 1-1.15-.66 3.3 3.3 0 0 1-.39-1.7A9.74 9.74 0 0 1 5.54 9a2.8 2.8 0 0 1 2.19-1.47A3 3 0 0 1 10 8.74a14.07 14.07 0 0 1 1 1.31zm8.42 5.12c-.48 0-.85-.19-1.38-.83A34.87 34.87 0 0 1 14.82 12l-.52-.86c-.36-.61-.71-1.16-1-1.65a2.46 2.46 0 0 1 .17-.27c.94-1.39 1.77-2.17 2.8-2.17a3.12 3.12 0 0 1 2.49 1.66 10.17 10.17 0 0 1 1.37 5.34c-.04 1.31-.34 2.43-1.57 2.43z">
                    </path>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Meta Information</span>
    </a>
</div>
<!--end::Menu item - Meta-->

<!--begin::Menu item - Logos-->
<div class="menu-item">
    <a href="{{ route('logos.index') }}" class="menu-link {{ request()->segment(1) == 'logos' ? 'active' : '' }}">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="transform: ;msFilter:;"
                    fill="currentColor">
                    <path
                        d="M20 14c-.092.064-2 2.083-2 3.5 0 1.494.949 2.448 2 2.5.906.044 2-.891 2-2.5 0-1.5-1.908-3.436-2-3.5zM9.586 20c.378.378.88.586 1.414.586s1.036-.208 1.414-.586l7-7-.707-.707L11 4.586 8.707 2.293 7.293 3.707 9.586 6 4 11.586c-.378.378-.586.88-.586 1.414s.208 1.036.586 1.414L9.586 20zM11 7.414 16.586 13H5.414L11 7.414z">
                    </path>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Logos</span>
    </a>
</div>
<!--end::Menu item - Logos-->

<!--begin::Menu item - Inquiries-->
<div class="menu-item">
    <a href="{{ route('inquiries.index') }}"
        class="menu-link {{ request()->segment(1) == 'inquiries' ? 'active' : '' }}">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="transform: ;msFilter:;"
                    fill="currentColor">
                    <path
                        d="M12 6a3.939 3.939 0 0 0-3.934 3.934h2C10.066 8.867 10.934 8 12 8s1.934.867 1.934 1.934c0 .598-.481 1.032-1.216 1.626a9.208 9.208 0 0 0-.691.599c-.998.997-1.027 2.056-1.027 2.174V15h2l-.001-.633c.001-.016.033-.386.441-.793.15-.15.339-.3.535-.458.779-.631 1.958-1.584 1.958-3.182A3.937 3.937 0 0 0 12 6zm-1 10h2v2h-2z">
                    </path>
                    <path
                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z">
                    </path>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Inquiries</span>
    </a>
</div>
<!--end::Menu item - Inquiries-->

<!--begin::Menu item - Sebscription -->
<div class="menu-item">
    <a href="{{ route('subscription.index') }}"
        class="menu-link {{ request()->segment(1) == 'subscription' ? 'active' : '' }}">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="transform: ;msFilter:;"
                    fill="currentColor">
                    <path
                        d="M12 6a3.939 3.939 0 0 0-3.934 3.934h2C10.066 8.867 10.934 8 12 8s1.934.867 1.934 1.934c0 .598-.481 1.032-1.216 1.626a9.208 9.208 0 0 0-.691.599c-.998.997-1.027 2.056-1.027 2.174V15h2l-.001-.633c.001-.016.033-.386.441-.793.15-.15.339-.3.535-.458.779-.631 1.958-1.584 1.958-3.182A3.937 3.937 0 0 0 12 6zm-1 10h2v2h-2z">
                    </path>
                    <path
                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z">
                    </path>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Subscription</span>
    </a>
</div>
<!--end::Menu item - Sebscription-->

<!--begin::Menu item - Price Tier -->
<div class="menu-item">
    <a href="{{ route('price.tier.index') }}"
        class="menu-link {{ request()->segment(1) == 'price-tier' ? 'active' : '' }}">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="transform: ;msFilter:;"
                    fill="currentColor">
                    <path
                        d="M12 6a3.939 3.939 0 0 0-3.934 3.934h2C10.066 8.867 10.934 8 12 8s1.934.867 1.934 1.934c0 .598-.481 1.032-1.216 1.626a9.208 9.208 0 0 0-.691.599c-.998.997-1.027 2.056-1.027 2.174V15h2l-.001-.633c.001-.016.033-.386.441-.793.15-.15.339-.3.535-.458.779-.631 1.958-1.584 1.958-3.182A3.937 3.937 0 0 0 12 6zm-1 10h2v2h-2z">
                    </path>
                    <path
                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z">
                    </path>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Price Tier</span>
    </a>
</div>
<!--end::Menu item - Price Tier-->
