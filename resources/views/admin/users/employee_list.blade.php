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
                    <span class="text-dark fw-bolder fs-1">My Profile</span>
                </h1>
                <!--end::Title-->
                {{-- <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="../index.html" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Crafted</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Account</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Overview</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb--> --}}
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                {{-- <a href="#" class="btn btn-flex btn-sm btn-primary fw-bolder border-0 fs-6 h-40px" data-bs-toggle="modal"
                data-bs-target="#kt_modal_create_campaign" id="kt_toolbar_primary_button">Create</a> --}}
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post" id="kt_post">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                @isset(auth()->user()->profile_picture)
                                    <img alt="Profile Picture"
                                        src="uploaded_files/profile_pictures/{{ auth()->user()->profile_picture }}" />
                                @else
                                    <img alt="Profile Picture"
                                        src="{{ Avatar::create(auth()->user()->name)->setDimension(500, 500)->setFontSize(250)->toBase64() }}" />
                                @endisset
                                <div
                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px">
                                </div>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">
                                            {{ $user->name }} </a>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        {{-- <a href="#"
                                        class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Developer
                                    </a>
                                    <a href="#"
                                        class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->SF, Bay Area
                                    </a> --}}
                                        <a href="#"
                                            class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            {{ $user->email }}
                                        </a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Profile Details</h3>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Action-->
                    {{-- <a href="{{route('profile.edit')}}" class="btn btn-primary align-self-center">Edit Profile</a> --}}
                    <!--end::Action-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <!--begin::Row-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Full Name</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">
                                {{ $user->name }}
                            </span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Company</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold text-gray-800 fs-6">
                                @isset($user->company_name)
                                    {{ $user->company_name }}
                                @else
                                    <span class="badge badge-light-danger">Company not added</span>
                                @endisset
                            </span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-4 fw-bold text-muted">Email</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800">
                                {{ $user->email }}
                                @if (isset($user->email_verified_at) && $user->login_method == 'email')
                                    <span class="badge badge-success">Verified</span>
                                @elseif($user->login_method == 'gmail')
                                    <span class="badge badge-success">Google Login</span>
                                @else
                                    <span class="badge badge-danger">Not Verified</span>
                                @endisset
                        </span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--end::Input group-->


            </div>
            <!--end::Card body-->
        </div>
        <!--end::details View-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
<div class="content flex-column-fluid" id="kt_content">
    <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
        <div class="page-title d-flex flex-column py-1">
            <h1 class="d-flex align-items-center my-1">
                <span class="text-dark fw-bolder fs-1">Employee List</span>
            </h1>
        </div>
    </div>
    <div class="post" id="kt_post">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <input type="text" data-kt-user-table-filter="search"
                            class="form-control form-control-solid w-950px ps-14" placeholder="Search user" />
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end align-items-center d-none"
                        data-kt-user-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger"
                            data-kt-user-table-select="delete_selected">Delete
                            Selected</button>
                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-230px">Employeer</th>
                            <th class="min-w-150px">Email</th>
                            <th class="min-w-50px">Total Emoloyees</th>
                            <th class="min-w-50px">Total Proejct Creted</th>
                            <th class="min-w-50px">Total Assigned Proejct</th>
                            <th class="min-w-150px">Joined</th>
                            <th class="min-w-150px">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-bold">
                        @foreach ($users as $user)
                            <tr>
                                <td class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        <a href="#">
                                            <div class="symbol-label">
                                                @isset($user->profile_picture)
                                                    <img alt="Profile Picture"
                                                        src="{{ asset('uploaded_files/profile_pictures/' . $user->profile_picture) }}"
                                                        class="w-100" />
                                                @else
                                                    <img alt="Profile Picture"
                                                        src="{{ Avatar::create($user->name)->toBase64() }}"
                                                        class="w-100" />
                                                @endisset
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column">

                                        {{ $user->name }}
                                        @isset($user->mac_address)
                                            <span class="badge badge-light-warning fw-bolder my-2">NO UI</span>
                                        @endisset
                                    </div>
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <th>
                                    {{ count($user->employees) }}
                                </th>
                                <th>
                                    {{ count($user->projects) }}
                                </th>
                                <th>
                                    {{ count($user->assignedProjects) }}
                                </th>
                                <td>
                                    {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions

                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="{{ route('users.details', $user->id) }}"
                                                class="menu-link px-3">Details</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="{{ route('users.compose.mail', $user->id) }}"
                                                class="menu-link px-3">Send eMail</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@section('modals')
@endsection


@section('scripts')
<script src="{{ asset('assets_backend/js/custom/apps/user-management/users/list/table.js') }}"></script>
<script src="{{ asset('assets_backend/js/custom/utilities/modals/users-search.js') }}"></script>

<script>
    $(document).on('click', '.edit_button', function(e) {
        e.preventDefault();
        $('#edit_modal').modal('show');
        var id = $(this).data('id');
        getEditDetails(id);
    });

    $(document).on('click', '.edit_button_no_ui', function(e) {
        e.preventDefault();
        $('#edit_modal_no_ui').modal('show');
        var id = $(this).data('id');
        getNoUiEditDetails(id);
    });

    $(document).on('click', '.archive_button', function(e) {
        e.preventDefault();
        $('#archive_modal').modal('show');
        var id = $(this).data('id');
        document.getElementById("archive_form").action = "employee/archive/" + id;
    });

    function getEditDetails(id) {
        $.ajax({
            type: 'GET',
            url: 'employee/' + id,
            dataType: 'json',
            success: function(response) {
                $('#screenshot_duration').val(response.screenshot_duration);
            }
        });
        document.getElementById("edit_form").action = "employee/" + id;
    }

    function getNoUiEditDetails(id) {
        $.ajax({
            type: 'GET',
            url: 'employee/' + id,
            dataType: 'json',
            success: function(response) {
                $('#name').val(response.name);
                $('#mac_address_no_ui').val(response.mac_address);
                $('#screenshot_duration').val(response.screenshot_duration);
            }
        });
        document.getElementById("edit_form_no_ui").action = "employee/" + id;
    }
</script>

<script>
    document.getElementById("mac_address").addEventListener('keyup', function() {
        // remove non digits, break it into chunks of 2 and join with a colon
        this.value =
            (this.value.toUpperCase()
                .replace(/[^\d|A-Z]/g, '')
                .match(/.{1,2}/g) || [])
            .join("-")
    });
</script>

<script>
    document.getElementById("mac_address_no_ui").addEventListener('keyup', function() {
        // remove non digits, break it into chunks of 2 and join with a colon
        this.value =
            (this.value.toUpperCase()
                .replace(/[^\d|A-Z]/g, '')
                .match(/.{1,2}/g) || [])
            .join("-")
    });
</script>
@endsection
