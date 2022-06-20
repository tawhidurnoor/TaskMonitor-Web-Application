<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->
<head>
    @include('backend.layouts.partials.head')
    <style>
        .hour-text{
            margin: 1rem;
            padding: 5px 10px 5px 10px;
            background-color: #2ECD6F;
            width: fit-content;
            font-weight: 500;
            color: whitesmoke;
            border-radius: 5px;
        }
        .left-bar{
            border-radius: 30px 0px 0px 30px;
            display: block;
            content: " ";
            justify-content: center;
            position: absolute;
            z-index: 100;
            left: 8px;
            top: 0;
            bottom: 0;
            transform: translate(50%);
            border-left-width: 4px;
            border-left-style: solid;
            border-left-color: #2ECD6F;
        }
    </style>
</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled">
    
    <!--begin::Main-->

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-column flex-column-fluid">


            @include('backend.layouts.partials.header')


            <!--begin::Container-->
            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-stretch container-xxl">


                @include('backend.layouts.partials.side_menu')


                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid mt-5 mt-lg-10" id="kt_wrapper">


                    <!-- begin:Main Body -->
                    @yield('body')
                    <!-- end:Main Bodu-->

                    @include('backend.layouts.partials.footer')

                </div>
                <!--end::Wrapper-->


            </div>
            <!--end::Container-->

        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    @include('backend.layouts.partials.drawers')

    <!--end::Main-->


    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                    fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->

    @include('backend.layouts.partials.modals')

    @include('backend.layouts.partials.scripts')

    @yield('scripts')
</body>

</html>