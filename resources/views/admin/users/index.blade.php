@extends('backend.layouts.full.mainlayout')

@section('body')
    <div class="content flex-column-fluid" id="kt_content">
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <div class="page-title d-flex flex-column py-1">
                <h1 class="d-flex align-items-center my-1">
                    <span class="text-dark fw-bolder fs-1">User List</span>
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
                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                                Selected</button>
                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 gs-0">
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
                                <tr style="text-align: center">
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

                                            <a href="{{ route('employee.list', $user->id) }}">{{ $user->name }}</a>
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
