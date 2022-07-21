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
                <span class="text-dark fw-bolder fs-1">Received Invitation</span>
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            {{--  <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Home</a>
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
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Invitation List</li>
                <!--end::Item-->
            </ul>  --}}
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
                            <th class="min-w-125px">Employer</th>
                            <th class="min-w-125px">Email</th>
                            <th class="min-w-125px">Company</th>
                            <th class="min-w-125px">Invited</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold">
                        @foreach ($invitations as $invitation)
                        <!--begin::Table row-->
                        <tr>
                            <!--begin::User=-->
                            <td class="d-flex align-items-center">
                                <!--begin:: Avatar -->
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    <a href="view.html">
                                        <div class="symbol-label">
                                            @isset($invitation->profile_picture)
                                            <img alt="Profile Picture"
                                                src="{{asset('uploaded_files/profile_pictures/'.$invitation->profile_picture)}}"
                                                class="w-100" />
                                            @else
                                            <img alt="Profile Picture" src="{{Avatar::create($invitation->name)->toBase64()}}"
                                                class="w-100" />
                                            @endisset
                                        </div>
                                    </a>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::User details-->
                                <div class="d-flex flex-column">
                                    <span" class="text-gray-800 text-hover-primary mb-1">
                                        {{$invitation->name}}
                                        </span>
                                </div>
                                <!--begin::User details-->
                            </td>
                            <!--end::User=-->
                            <!--begin::Email=-->
                            <td>
                                {{$invitation->email}}
                            </td>
                            <!--end::Email=-->
                            <!--begin::Company=-->
                            <td>
                                {{$invitation->company_name}}
                            </td>
                            <!--end::Company=-->
                            <!--begin::Invited-->
                            <td>
                                {{ \Carbon\Carbon::parse($invitation->created_at)->diffForHumans() }}
                            </td>
                            <!--end::Invited-->
                            <!--begin::Action=-->
                            <td class="text-end">
                                <!--begin::Menu-->
                                <button class="btn btn-light btn-light-success btn-sm accept_button" data-id="{{$invitation->id}}">Accept</button>
                                <button class="btn btn-light btn-light-danger btn-sm reject_button" data-id="{{$invitation->id}}">Reject</button>
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
<!--begin::Modal - Accept Invitaiotn-->
<div class="modal fade" id="accept_invitation_modal" tabindex="-1" aria-hidden="true">
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
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Accept Invitation</h1>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->

                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8 fv-row">
                    Are you sure want to accept this invitaiotn?
                </div>
                <!--end::Input group-->

                <!--begin::Actions-->
                <div class="text-center">
                    <form action="{{route('employee.accept.invitations')}}" method="post">
                        @csrf
                        <input type="hidden" id="invitation_id" name="id">
                        <button type="submit" class="btn btn-light btn-light-success btn-sm">Accept</button>
                    </form>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Accept Invitaiotn-->

<!--begin::Modal - Reject Invitaiotn-->
<div class="modal fade" id="reject_invitation_modal" tabindex="-1" aria-hidden="true">
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
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Reject Invitation</h1>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->

                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8 fv-row">
                    Are you sure want to reject this invitaiotn?
                </div>
                <!--end::Input group-->

                <!--begin::Actions-->
                <div class="text-center">
                    <form action="{{route('employee.reject.invitations')}}" method="post">
                        @csrf
                        <input type="hidden" id="invitation_id_reject" name="id">
                        <button type="submit" class="btn btn-light btn-light-danger btn-sm">Reject</button>
                    </form>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Reject Invitaiotn-->
@endsection


@section('scripts')
<script src="{{asset('assets_backend/js/custom/apps/user-management/users/list/table.js')}}"></script>
<script src="{{asset('assets_backend/js/custom/utilities/modals/users-search.js')}}"></script>
<script>
    $(document).on('click', '.accept_button', function(e) {
    e.preventDefault();
    $('#accept_invitation_modal').modal('show');
    var id = $(this).data('id');
    $('#invitation_id').val(id);
    });
</script>
<script>
    $(document).on('click', '.reject_button', function(e) {
    e.preventDefault();
    $('#reject_invitation_modal').modal('show');
    var id = $(this).data('id');
    $('#invitation_id_reject').val(id);
    });
</script>
@endsection