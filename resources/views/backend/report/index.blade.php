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

                        <select name="employee" data-control="select2"
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
                        <button type="submit" class="btn btn-primary"
                            id="kt_account_profile_details_submit">Filter</button>
                        <button class="btn btn-danger reset_button">Reset</button>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
            </form>
            <!--end::Details-->

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
