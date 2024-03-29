@extends('backend.layouts.full.mainlayout')

@section('meta')
    {{-- lightbox --}}
    <link rel="stylesheet" href="{{ asset('assets_backend/lightbox2/dist/css/lightbox.min.css') }}">

    {{-- daterangepicker --}}
    <link rel="stylesheet" href="{{ asset('assets_backend/daterangepicker/daterangepicker.css') }}">
@endsection

@section('body')
    <!--begin::Content-->
    <div class="content flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column py-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center my-1">
                    <span class="text-dark fw-bolder fs-1">Time Tracker</span>
                </h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post" id="kt_post">
            <!--begin::Navbar-->
            <div class="card mb-8">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <form action="" class="form" method="get">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label fw-bold fs-6">
                                Select Date
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-5 fv-row">
                                <input type="text" name="date" id="config-demo"
                                    class="form-control form-control-lg form-control-solid"
                                    @isset($date) value="{{ $date }}" @endisset />
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-5 fv-row">
                                <button type="submit" class="btn btn-primary"
                                    id="kt_account_profile_details_submit">Filter</button>
                                <button class="btn btn-danger reset_button">Reset</button>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                    </form>
                    <!--end::Details-->
                    </ul>
                    <!--end::Nav-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::Toolbar-->
            <div class="d-flex flex-wrap flex-stack pb-7">
                <!--begin::Title-->
                <div class="d-flex flex-wrap align-items-center my-1">
                    <h3 class="fw-bolder me-5 my-1">Time Trackers of {{ $user->name }}
                    </h3>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Tab Content-->
            <div class="tab-content">
                <!--begin::Tab panel-->
                <div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel"
                    aria-labelledby="kt_activity_today_tab">
                    <!--begin::Timeline-->
                    <div class="timeline">
                        @foreach ($timeTrackers as $timeTracker)
                            <!--begin::Timeline item-->
                            <div class="timeline-item">
                                <!--begin::Timeline line-->
                                <div class="timeline-line w-40px"></div>
                                <!--end::Timeline line-->
                                <!--begin::Timeline icon-->
                                <div class="timeline-icon symbol symbol-circle symbol-40px">
                                    <div class="symbol-label bg-light">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Timeline icon-->
                                <!--begin::Timeline content-->
                                <div class="timeline-content mb-10 mt-n1">
                                    <!--begin::Timeline heading-->
                                    <div class="pe-3 mb-5">
                                        <!--begin::Title-->
                                        <div class="fs-5 fw-bold mb-2">{{ $timeTracker->task_title }}</div>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="d-flex align-items-center mt-1 fs-6">
                                            <!--begin::Info-->
                                            <div class="text-muted me-2 fs-7">Started at
                                                {{ $timeTracker->created_at->format('d M, Y') }}
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Timeline heading-->
                                    <!--begin::Timeline details-->
                                    <div class="row">
                                        @php
                                            $prev_hour = null;
                                        @endphp
                                        @foreach ($timeTracker->screenshots as $screenshot)
                                            @if ($prev_hour === null)
                                                {{-- <hr> --}}
                                                <p class="hour-text">Hour {{ $screenshot->created_at->format('h:00 a') }}
                                                </p>
                                                <div class="col-12 per-hour" style="position: relative">
                                                    <div class="left-bar"></div>
                                                    <div class="row ms-0">
                                                        @php
                                                            $prev_hour = $screenshot->created_at->hour;
                                                        @endphp
                                                    @elseif ($prev_hour != $screenshot->created_at->hour)
                                                    </div>
                                                </div>
                                                <hr class="mt-2">
                                                <p class="hour-text">Hour {{ $screenshot->created_at->format('h:00 a') }}
                                                </p>
                                                <div class="col-12 per-hour" style="position: relative">
                                                    <div class="left-bar"></div>
                                                    <div class="row ms-0">
                                                        @php
                                                            $prev_hour = $screenshot->created_at->hour;
                                                        @endphp
                                            @endif
                                            <div class="col-lg-4 col-xl-4 col-xxl-4 col-md-6 col-sm-12 col-12 mb-5">
                                                <!--begin::Item-->
                                                <div class="overlay me-10">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper">
                                                        <p class="screenshot-time">
                                                            {{ $screenshot->created_at->format('h:i a') }}
                                                            <span style="margin-left: 10px"
                                                                class="badge 
                                                            {{ $screenshot->activity == 'Excellent' ? 'badge-success' : ($screenshot->activity == 'Okay' ? 'badge-primary' : 'badge-danger') }}">
                                                                {{ $screenshot->activity }}
                                                            </span>

                                                            <span style="margin-left: 10px">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M21 5H3a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2zm-8 2h2v2h-2V7zm0 4h2v2h-2v-2zM9 7h2v2H9V7zm0 4h2v2H9v-2zM5 7h2v2H5V7zm0 4h2v2H5v-2zm12 6H7v-2h10v2zm2-4h-2v-2h2v2zm0-4h-2V7h2v2z"
                                                                        fill="currentColor">
                                                                    </path>
                                                                </svg>

                                                                <span class="text-dark fs-base fw-bolder lh-1">
                                                                    {{ $screenshot->keystroke }}
                                                                </span>

                                                            </span>

                                                            <span style="margin-left: 10px">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M13 2v8h6V8c0-3.309-2.691-6-6-6zM5 16c0 3.309 2.691 6 6 6h2c3.309 0 6-2.691 6-6v-4H5v4zm0-8v2h6V2C7.691 2 5 4.691 5 8z"
                                                                        fill="currentColor">
                                                                    </path>
                                                                </svg>

                                                                <span class="text-dark fs-base fw-bolder lh-1">
                                                                    {{ $screenshot->mouse_click }}
                                                                </span>

                                                            </span>
                                                        </p>
                                                        <a href="{{ asset('captured/' . $screenshot->image) }}"
                                                            data-lightbox="mygallery">
                                                            <img alt="img" class="rounded w-300px"
                                                                src="{{ asset('captured/' . $screenshot->image) }}" />
                                                        </a>
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Link-->
                                                    {{-- <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                            <a href="{{ asset('captured/'.$screenshot->image) }}" class="btn btn-sm btn-primary btn-shadow"
                                                target="_blank">Explore</a>
                                        </div> --}}
                                                    <!--end::Link-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="overflow-auto pb-5">
                                <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                    @foreach ($timeTracker->screenshots as $screenshot)
                                    <!--begin::Item-->
                                    <div class="overlay me-10">
                                        <!--begin::Image-->
                                        <div class="overlay-wrapper">
                                            <img alt="img" class="rounded w-450px"
                                                src="{{ asset('captured/'.$screenshot->image) }}" />
                                        </div>
                                        <!--end::Image-->
                                        <!--begin::Link-->
                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                            <a href="{{ asset('captured/'.$screenshot->image) }}"
                                                class="btn btn-sm btn-primary btn-shadow" target="_blank">Explore</a>
                                        </div>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Item-->
                                    @endforeach

                                </div>
                            </div> --}}
                            <!--end::Timeline details-->
                    </div>
                    <!--end::Timeline content-->
                </div>
                <!--end::Timeline item-->
                @endforeach
            </div>
            <!--end::Timeline-->
        </div>
        <!--end::Tab panel-->
    </div>
    <!--end::Tab Content-->

    </div>
    <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@section('scripts')
    {{-- lightbox --}}
    <script src="{{ asset('assets_backend/lightbox2/dist/js/lightbox.min.js') }}"></script>

    {{-- daterangerpicker --}}
    <script src="{{ asset('assets_backend/daterangepicker/daterangepicker.js') }}"></script>

    <script>
        $(document).on('click', '.reset_button', function(e) {
            e.preventDefault();
            $("input[type=date]").val("")
        });
    </script>

    <script>
        $(document).ready(function() {
            var options = {};
            options.ranges = {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ]
            };

            options.locale = {
                format: 'YYYY/MM/DD'
            };

            $('#config-demo').daterangepicker(options, function(start, end, label) {
                console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format(
                    'YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            }).click();
        });
    </script>
@endsection
