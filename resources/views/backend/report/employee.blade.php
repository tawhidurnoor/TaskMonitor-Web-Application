@extends('backend.layouts.full.mainlayout')

@section('meta')
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
                <h1>Report</h1>
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                {{-- <a href="#" class="btn btn-flex btn-sm btn-primary fw-bolder border-0 fs-6 h-40px"
                data-bs-toggle="modal" data-bs-target="#kt_modal_new_target" id="kt_toolbar_primary_button">New
                Project</a> --}}
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post" id="kt_post">

            <!--begin::Details-->
            <form action="" class="form" method="get">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Col-->
                    <div class="col-lg-4 fv-row">

                        <input type="text" name="date" id="config-demo"
                            class="form-control form-control form-control-solid"
                            @isset($date) value="{{ $date }}" @endisset />
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-4 fv-row">

                        <select name="employee_id" data-control="select2"
                            class="form-select form-select-solid form-select fw-bold">
                            @foreach ($employees as $e)
                                <option value="{{ $e->id }}" @if ($employee == $e->id) selected @endif>

                                    {{ $e->name }}

                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-lg-4 fv-row">
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Go</button>
                        <a href="{{ route('report.employee') }}" class="btn btn-danger">Reset</a>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
            </form>
            <!--end::Details-->



            <div class="card card-xl-stretch mb-xl-8" style="padding: 10px;">


                @if ($is_request == 1)
                    <div class="position-relative">
                        <!--begin::Row-->
                        <div class="row g-3 g-lg-6">
                            <!--begin::Col-->
                            <div class="col-4">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ count($projects) }}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">Working Projects</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-4">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $total_hour }}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">hours worked
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-4">
                                <!--begin::Items-->
                                <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $average_work_per_day }}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">hours average work/day</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>

                    <br><br>



                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                    <script>
                        const labels = [
                            @php
                                foreach ($dates as $key => $dat) {
                                    echo '"' . $dat . '"' . ',';
                                }
                                
                            @endphp
                        ];

                        const data = {
                            labels: labels,
                            datasets: [{
                                label: 'Hours',
                                backgroundColor: 'rgb(0, 158, 247)',
                                borderColor: 'rgb(0, 158, 247)',
                                data: [
                                    @php
                                        foreach ($work_hours as $key => $wh) {
                                            echo '"' . $wh . '"' . ',';
                                        }
                                        
                                    @endphp
                                ],
                            }]
                        };

                        const config = {
                            type: 'bar',
                            data: data,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            },
                        };
                    </script>

                    <script>
                        const myChart = new Chart(
                            document.getElementById('myChart'),
                            config
                        );
                    </script>

                    <br><br>
                    <a href="{{ route('report.employee.pdf', 'date=' . $date . '&employee_id=' . $employee_id) }}"
                        class="btn btn-primary">Download PDF</a>
                @else
                    <h3>Please select your options</h3>
                @endif

            </div>


        </div>
        <!--end::Post-->
        <div style="margin-bottom: 15rem"></div>
    </div>
    <!--end::Content-->
@endsection

@section('scripts')
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
