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
                <span class="text-dark fw-bolder fs-1"> {{$is_archived == 1 ? "Archived": ""}} Employee List</span>
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
                <li class="breadcrumb-item text-dark">Employee List</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-1">
            <!--begin::Button-->
            <a href="{{route('employee.index')}}" class="btn btn-sm btn-bg-light btn-active-color-primary me-3">View Active Employees</a>
            <span style="width: 20px"></span>
        </div>

        <!--end::Actions-->
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
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-user-table-filter="search"
                            class="form-control form-control-solid w-950px ps-14" placeholder="Search user" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none"
                        data-kt-user-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                            Selected</button>
                    </div>
                    <!--end::Group actions-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            {{-- <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                        data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                </div>
                            </th> --}}
                            <th class="min-w-250px">User</th>
                            <th class="min-w-125px">Email/Mac Address</th>
                            <th class="min-w-50px">Screenshot Duration</th>
                            <th class="min-w-50px">Worked This Week</th>
                            <th class="min-w-50px">Worked This Month</th>
                            <th class="min-w-50px">Total Worked</th>
                            <th class="min-w-100px">Action</th>
                            {{-- <th class="text-end min-w-100px">Actions</th> --}}
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold">
                        @foreach ($employees as $employee)
                        <!--begin::Table row-->
                        <tr>
                            <!--begin::Checkbox-->
                            {{-- <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td> --}}
                            <!--end::Checkbox-->
                            <!--begin::User=-->
                            <td class="d-flex align-items-center">
                                <!--begin:: Avatar -->
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    <a href="#">
                                        <div class="symbol-label">
                                            @isset($employee->user->profile_picture)
                                            <img alt="Profile Picture"
                                                src="{{asset('uploaded_files/profile_pictures/'.$employee->user->profile_picture)}}"
                                                class="w-100" />
                                            @else
                                            <img alt="Profile Picture"
                                                src="{{Avatar::create($employee->user->name)->toBase64()}}"
                                                class="w-100" />
                                            @endisset
                                        </div>
                                    </a>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::User details-->
                                <div class="d-flex flex-column">
                                    {{$employee->user->name}}
                                    @isset($employee->mac_address)
                                        <span class="badge badge-light-warning fw-bolder my-2">NO UI</span>
                                    @endisset
                                </div>
                                <!--begin::User details-->
                            </td>
                            <!--end::User=-->
                            <!--begin::Email-->
                            <td>
                                @isset($employee->mac_address)
                                    {{$employee->mac_address}}
                                @else
                                    {{$employee->user->email}}
                                @endisset
                            </td>
                            <!--end::Email-->
                            <!--begin::Screenshot Duration-->
                            <td>
                                @isset($employee->screenshot_duration)
                                {{$employee->screenshot_duration}} minutes
                                @else
                                Deafult ({{$screenshot_duration}} mins)
                                @endisset
                            </td>
                            <!--end::Screenshot Duration-->
                            <!--begin::Worked Week-->
                            <td>{{ App\User::workTime($employee->employee_id, "Week") }} Hours</td>
                            <!--end::Worked Month-->
                            <!--begin::Worked Week-->
                            <td>{{ App\User::workTime($employee->employee_id, "Month") }} Hours</td>
                            <!--end::Worked Month-->
                            <!--begin::Worked-->
                            <td>{{ App\User::workTime($employee->employee_id, "All") }} Hours</td>
                            <!--end::Worked-->
                            <!--begin::Action=-->
                            <td class="text-end">
                                <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        @isset ($employee->mac_address)
                                        <a href="{{route('employee.timetracker.noui', $employee->id)}}" class="menu-link px-3" >Time Tracker</a>
                                        @else
                                        <a href="{{route('employee.timetracker', $employee->id)}}" class="menu-link px-3" >Time Tracker</a>
                                        @endisset
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Report-->
                                    <div class="menu-item px-3">
                                        <a href="{{route('employee.report', $employee->id)}}" class="menu-link px-3">Report</a>
                                    </div>
                                    <!--end::Report-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a class="menu-link px-3 unarchive_button" data-id="{{$employee->id}}">Unarchive</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                            <!--end::Action=-->
                        </tr>
                        <!--end::Table row-->
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection


@section('modals')


<!--begin::Modal - Unrchive Employee-->
<div class="modal fade" id="unarchive_modal" tabindex="-1" aria-hidden="true">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="currentColor" />
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
                <form id="unarchive_form" action="" method="POST" class="form">
                    @csrf
                    @method('put')
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Are you sure want to unarchive this employee?</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">Unarchive</span>
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
<!--end::Modal - Unrchive Employee-->
@endsection


@section('scripts')
<script src="{{asset('assets_backend/js/custom/apps/user-management/users/list/table.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/users-search.js')}}"></script>

<script>

    $(document).on('click', '.unarchive_button', function(e) {
        e.preventDefault();
        $('#unarchive_modal').modal('show');
        var id = $(this).data('id');
        document.getElementById("unarchive_form").action = "../employee/unarchive/" + id;
    });
</script>
@endsection