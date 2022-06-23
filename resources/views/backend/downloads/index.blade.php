@extends('backend.layouts.full.mainlayout')

@section('body')
    <!--begin::Content-->
    <div class="content flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column py-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center my-1">
                    <span class="text-dark fw-bolder fs-1">Downloads</span>
                </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../../index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-200 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Downloads</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post" id="kt_post">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h1>Download Our Dextop Application</h1>
                    </div>
                    <!--begin::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">

                    <style>
                        .btn-desktop-purple {
                            background-image: linear-gradient(to bottom, #8241f9, #4e277b);
                            border-color: #150a27;
                            color: #fff;
                        }

                        .btn-large {
                            padding: 0.75em 1.25em;
                            font-size: inherit;
                            border-radius: 6px;
                        }

                        .btn {
                            color: #24292e;
                            background-color: #eff3f6;
                            background-image: linear-gradient(-180deg, #fafbfc 0%, #eff3f6 90%);
                        }

                        .btn {
                            position: relative;
                            display: inline-block;
                            padding: 6px 12px;
                            font-size: 14px;
                            font-weight: 600;
                            line-height: 20px;
                            white-space: nowrap;
                            vertical-align: middle;
                            cursor: pointer;
                            user-select: none;
                            background-repeat: repeat-x;
                            background-position: -1px -1px;
                            background-size: 110% 110%;
                            border: 1px solid rgba(27, 31, 35, 0.2);
                            border-radius: 0.25em;
                            appearance: none;
                        }
                    </style>
                    <p>
                        For tracking your employee and maintain project progress download our dextop apllication.
                    </p>
                    <br>
                    <a class="mx-1 my-3 f3 btn btn-large btn-desktop-purple"
                    href="{{ URL::to( '/public_downloads/dextop_application/v_1.0/TimeTrackerDextopClient_1.0_Setup.exe')  }}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            style="fill: #24292e;transform: ;msFilter:;">
                            <path
                                d="m3 5.557 7.357-1.002.004 7.097-7.354.042L3 5.557zm7.354 6.913.006 7.103-7.354-1.011v-6.14l7.348.048zm.892-8.046L21.001 3v8.562l-9.755.077V4.424zm9.758 8.113-.003 8.523-9.755-1.378-.014-7.161 9.772.016z">
                            </path>
                        </svg>
                        Download for Windows (64bit)
                    </a>

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
