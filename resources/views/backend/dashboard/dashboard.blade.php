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
                {{-- <span class="text-dark fw-bolder fs-1">Employer Dashboard</span> --}}
                <span class="text-dark fw-bolder fs-1">Hello {{auth()->user()->name}} ! {{$greetings}}</span>
                <!--begin::Description-->
                {{-- <small class="text-muted fs-6 fw-bold ms-1">You have {{count($projects)}}
                    <span class="text-primary fw-bolder">Active Projects</span>
                </small> --}}
                <!--end::Description-->
            </h1>
            <!--end::Title-->
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

        <!--begin::Row-->
        <div class="row g-5 g-xl-10">

            <!--begin::Col-->
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                <!--begin::Card widget 16-->
                <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center h-md-50 mb-5 mb-xl-10"
                    style="background-color: #ffa596;background-image:url('assets_backend/media/svg/shapes/wave-bg-dark.svg')">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bolder text-white me-2 lh-1 ls-n2">{{count($projects)}}</span>
                            <!--end::Amount-->
                            <!--begin::Subtitle-->
                            <span class="text-white opacity-50 pt-1 fw-bold fs-6">Active
                                Projects</span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-column justify-content-end pe-0">
                        {{-- Here Goes Nothing --}}
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 16-->
            </div>
            <!--end::Col-->
            

            <!--begin::Col-->
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                <!--begin::Card widget 16-->
                <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center h-md-50 mb-5 mb-xl-10"
                    style="background-color: #54a8ec;background-image:url('assets_backend/media/svg/shapes/wave-bg-dark.svg')">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bolder text-white me-2 lh-1 ls-n2">{{count($employees)}}</span>
                            <!--end::Amount-->
                            <!--begin::Subtitle-->
                            <span class="text-white opacity-50 pt-1 fw-bold fs-6">Employees</span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-column justify-content-end pe-0">
                        {{-- Here Goes Nothing --}}
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 16-->
            </div>
            <!--end::Col-->


            <!--begin::Col-->
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 col-sm-12 col-12 mb-md-5 mb-xl-10">
                <!--begin::Card widget 16-->
                <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center h-md-50 mb-5 mb-xl-10"
                    style="background-color: {{$percent_difference < 0 ? '#d34242' : '#42d386'}};background-image:url('assets_backend/media/svg/shapes/wave-bg-dark.svg')">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bolder text-white me-2 lh-1 ls-n2">{{$work_hour_seven_days}} <small style="color: white">hours work last 7 days</small></span>
                            <!--end::Amount-->
                            <!--begin::Subtitle-->
                            <span class="text-white opacity-50 pt-1 fw-bold fs-6"> 
                                @if ($percent_difference < 0)
                                    {{$percent_difference * -1}} % less form last week
                                @else
                                    {{$percent_difference}} % more form last week 
                                @endif
                            </span>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-column justify-content-end pe-0">
                        {{-- Here Goes Nothing --}}
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 16-->
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                <!--begin::Card widget 16-->
                <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center h-md-50 mb-5 mb-xl-10"
                    style="background-color: #42d3bf;background-image:url('assets_backend/media/svg/shapes/wave-bg-dark.svg')">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <div class="card-title d-flex flex-column">
                            <!--begin::Amount-->
                            <span class="fs-2hx fw-bolder text-white me-2 lh-1 ls-n2">{{$default_screenshot_duration}} <small style="color: white">Minutes</small> </span>
                            <!--end::Amount-->
                            <!--begin::Subtitle-->
                            <span class="text-white opacity-50 pt-1 fw-bold fs-6">Default Screenshot Duration</span>
                            <br>
                            <!--end::Subtitle-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-column justify-content-end pe-0">
                        {{-- Here Goes Nothing --}}
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card widget 16-->
            </div>
            <!--end::Col-->

        </div>
        <!--end::Row-->

        <div class="card shadow-sm">
            <div class="card-body">
                <select class="form-select mb-2" data-control="select2" id="heatmap_projects">
                    <option value="all" selected>All projects</option>
                    @foreach ($projects as $item)                        
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
                <div class="mt-3" id="heatmap_project"></div>
            </div>
        </div>

        <div class="card mt-5 shadow-sm">
            <div class="card-body">
                <select class="form-select mb-2" data-control="select2" id="heatmap_employees">
                    @foreach ($employees as $item)
                        <option value="{{ $item->user->id }}">{{ $item->user->name }}</option>
                    @endforeach
                </select>
                <div class="mt-3" id="heatmap_employee"></div>
            </div>
        </div>
        
        {{-- <div class="row">
            <h1 class="d-flex align-items-center my-1">
                <span class="text-dark fw-bolder fs-1">Last Screenshots</span>
            </h1>
            @foreach ($screenshots as $ss)
            <div class="col-md-6 col-lg-4 col-xl-4 col-xxl-4 col-sm-12 col-12 mb-5">
                <!--begin::Item-->
                <div class="overlay me-10">
                    <!--begin::Image-->
                    <div class="overlay-wrapper">
                        <img alt="img" class="rounded w-300px" src="{{ asset('captured/'.$ss->image) }}" />
                    </div>
                    <!--end::Image-->
                    <!--begin::Link-->
                    <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                        <a href="{{ asset('captured/'.$ss->image) }}" class="btn btn-sm btn-primary btn-shadow"
                            target="_blank">Explore</a>
                    </div>
                    <!--end::Link-->
                </div>
                <!--end::Item-->
            </div>
            @endforeach
        </div> --}}

    </div>
    <!--end::Post-->
    <div style="margin-bottom: 15rem"></div>
</div>
<!--end::Content-->
@endsection

@push('js')
    <script>

    var options = {
        series: [],
        chart: {
            height: 300,
            type: 'heatmap',                        
        },
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                let hours = Math.trunc(val/60);
                return `${hours} Hours`;
            },
        },
        tooltip: {
            custom: function (opts) {
                let date = opts.ctx.w.config.series[opts.seriesIndex].data[opts.dataPointIndex].date;
                let minutes = opts.ctx.w.config.series[opts.seriesIndex].data[opts.dataPointIndex].y;
                let hours = Math.trunc(minutes/60);
                let remainingMinutes = minutes%60;
                return `<p style="margin: 10px">${hours} Hours and ${remainingMinutes} Minutes on ${date}</p>`;
            }
        },
        colors: [
            "#008FFB"
        ],
        title: {
            text: ''
        },                    
    };

    var chart_project = new ApexCharts(document.querySelector("#heatmap_project"), options);
    var chart_employee = new ApexCharts(document.querySelector("#heatmap_employee"), options);
    chart_project.render();
    chart_employee.render();

    let fetchProjectsHeatmap = () => {
        $.ajax({
            type: 'GET',
            url: "{{ route('chart.project.heatmap') }}",
            data: {'type': $("#heatmap_projects").val()},
            dataType: 'json',
            success: function(response) {
                chart_project.updateSeries(response);
                chart_project.updateOptions({
                    title: {
                        text: 'Project based heatmap'
                    }
                })
            }
        });
    }
    let fetchEmployeesHeatmap = () => {
        $.ajax({
            type: 'GET',
            url: "{{ route('chart.employee.heatmap') }}",
            data: {'employee': $("#heatmap_employees").val()},
            dataType: 'json',
            success: function(response) {
                chart_employee.updateSeries(response);
                chart_employee.updateOptions({
                    title: {
                        text: 'Employee based heatmap'
                    }
                })
            }
        });
    }

    $("#heatmap_projects").on('change', fetchProjectsHeatmap);
    $("#heatmap_employees").on('change', fetchEmployeesHeatmap);
    // console.log(heatmap_select);
    fetchProjectsHeatmap();
    fetchEmployeesHeatmap();
        
    </script>
@endpush