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
                <span class="text-dark fw-bolder fs-1">Project Users</span>
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="../../index.html" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Apps</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Projects</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Users</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
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
                <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                    <!--begin::Image-->
                    <div
                        class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                        @isset($project->project_logo)
                        <img src="{{asset('uploaded_files/project_logo/'.$project->project_logo)}}"
                            alt="{{$project->title}}" class="mw-50px mw-lg-75px" />
                        @else
                        {{-- <img src="assets_backend/media/svg/files/ai.svg" alt="{{$project->title}}" class="p-3" />
                        --}}
                        <img src="{{Avatar::create($project->title)->toBase64()}}" alt="" class="mw-50px mw-lg-75px" />
                        @endisset
                    </div>
                    <!--end::Image-->
                    <!--begin::Wrapper-->
                    <div class="flex-grow-1">
                        <!--begin::Head-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::Details-->
                            <div class="d-flex flex-column">
                                <!--begin::Status-->
                                <div class="d-flex align-items-center mb-1">
                                    <span class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">
                                        {{$project->title}}
                                    </span>
                                    <span class="badge badge-light-success me-auto">In Progress</span>
                                </div>
                                <!--end::Status-->
                                <!--begin::Description-->
                                <div class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400">
                                    {{$project->description}}
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::Head-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap justify-content-start">
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap">
                                <!--begin::Stat-->
                                <div
                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">
                                        <div class="fs-4 fw-bolder">{{
                                            \Carbon\Carbon::parse($project->created_at)->format('d M, Y')}}</div>
                                    </div>
                                    <!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-bold fs-6 text-gray-400">Created At</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->
                            </div>
                            <!--end::Stats-->
                            <!--begin::Users-->
                            <div class="symbol-group symbol-hover mb-3">
                                @foreach ($projectPeople as $projectPerson)
                                @if ($loop->index+1 == 8)
                                    @break
                                @endif
                                <!--begin::User-->
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                    title="{{$projectPerson->name}}">
                                    @isset($projectPerson->profile_picture)
                                    <img alt="Profile Picture"
                                        src="{{asset('uploaded_files/profile_pictures/'.$projectPerson->profile_picture)}}" />
                                    @else
                                    <img alt="Profile Picture"
                                        src="{{Avatar::create($projectPerson->name)->toBase64()}}" />
                                    @endisset
                                </div>
                                <!--end::User-->
                                @endforeach

                                @if (count($projectPeople) > 7)
                                    <!--begin::All users-->
                                    <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                                        <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bolder" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                            title="View more users">+{{count($projectPeople) - 7}}</span>
                                    </a>
                                    <!--end::All users-->
                                @endif
                                
                            </div>
                            <!--end::Users-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Details-->
                
                <!--begin::Actions-->
                <div class="d-flex mb-4">
                    <a href="#" class="btn btn-sm btn-bg-light btn-active-color-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_users_search">Add User</a>
                </div>
                <!--end::Actions-->

                {{--
                <div class="separator"></div>
                <!--begin::Nav-->
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
                    <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6 active" href="users.html">Users</a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6" href="files.html">Time Trackers</a>
                    </li>
                    <!--end::Nav item-->
                </ul>
                <!--end::Nav--> --}}
            </div>
        </div>
        <!--end::Navbar-->
        <!--begin::Toolbar-->
        <div class="d-flex flex-wrap flex-stack pb-7">
            <!--begin::Title-->
            <div class="d-flex flex-wrap align-items-center my-1">
                <h3 class="fw-bolder me-5 my-1">Users ({{count($projectPeople)}})</h3>
            </div>
            <!--end::Title-->
            <!--begin::Controls-->
            <div class="d-flex flex-wrap my-1">
                <!--begin::Tab nav-->
                <ul class="nav nav-pills me-6 mb-2 mb-sm-0">
                    <li class="nav-item m-0">
                        <a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary me-3 active"
                            data-bs-toggle="tab" href="#kt_project_users_card_pane">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3" />
                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3" />
                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor"
                                            opacity="0.3" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                    </li>
                    <li class="nav-item m-0">
                        <a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary" data-bs-toggle="tab"
                            href="#kt_project_users_table_pane">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                    </li>
                </ul>
                <!--end::Tab nav-->
            </div>
            <!--end::Controls-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Tab Content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div id="kt_project_users_card_pane" class="tab-pane fade show active">
                <!--begin::Row-->
                <div class="row g-6 g-xl-9">
                    @foreach ($projectPeople as $projectPerson)
                    <!--begin::Col-->
                    <div class="col-md-6 col-xxl-4">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-65px symbol-circle mb-5">
                                    @isset($projectPerson->profile_picture)
                                    <img alt="Profile Picture"
                                        src="{{asset('uploaded_files/profile_pictures/'.$projectPerson->profile_picture)}}" />
                                    @else
                                    <img alt="Profile Picture"
                                        src="{{Avatar::create($projectPerson->name)->toBase64()}}" />
                                    @endisset
                                    {{-- <div
                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3">
                                    </div> --}}
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <span class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">
                                    {{$projectPerson->name}}
                                </span>
                                <!--end::Name-->
                                <!--begin::Email-->
                                <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">{{$projectPerson->email}}</p>
                                <!--end::Email-->
                                <br>
                                <form>
                                    <button class="btn btn-light-danger btn-sm remove_project_member" data-id="{{$projectPerson->id}}">Remove</button>
                                    <a href="{{route('project.timeTracker', [encrypt($project->id), encrypt($projectPerson->user_id)] )}}" type="submit" class="btn btn-light btn-sm">Time Tracker</a>
                                </form>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->
                    @endforeach
                </div>
                <!--end::Row-->

                <!--begin::Pagination-->
                {{-- <div class="d-flex flex-stack flex-wrap pt-10">
                    <div class="fs-6 fw-bold text-gray-700">Showing 1 to 10 of 50 entries</div>
                    <!--begin::Pages-->
                    <ul class="pagination">
                        <li class="page-item previous">
                            <a href="#" class="page-link">
                                <i class="previous"></i>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">4</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">5</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">6</a>
                        </li>
                        <li class="page-item next">
                            <a href="#" class="page-link">
                                <i class="next"></i>
                            </a>
                        </li>
                    </ul>
                    <!--end::Pages-->
                </div> --}}
                <!--end::Pagination-->

            </div>
            <!--end::Tab pane-->
            <!--begin::Tab pane-->
            <div id="kt_project_users_table_pane" class="tab-pane fade">
                <!--begin::Card-->
                <div class="card card-flush">
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="kt_project_users_table"
                                class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                                <!--begin::Head-->
                                <thead class="fs-7 text-gray-400 text-uppercase">
                                    <tr>
                                        <th class="min-w-250px">User</th>
                                        <th class="min-w-150px">Email</th>
                                        <th class="min-w-50px text-end">Action</th>
                                    </tr>
                                </thead>
                                <!--end::Head-->
                                <!--begin::Body-->
                                <tbody class="fs-6">
                                    @foreach ($projectPeople as $projectPerson)
                                        <tr>
                                            <td>
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Wrapper-->
                                                    <div class="me-5 position-relative">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            @isset($projectPerson->profile_picture)
                                                            <img alt="Profile Picture" src="{{asset('uploaded_files/profile_pictures/'.$projectPerson->profile_picture)}}" />
                                                            @else
                                                            <img alt="Profile Picture"
                                                                src="{{Avatar::create($projectPerson->name)->toBase64()}}" />
                                                            @endisset
                                                        </div>
                                                        <!--end::Avatar-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <span class="mb-1 text-gray-800 text-hover-primary">
                                                            {{$projectPerson->name}}
                                                        </span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::User-->
                                            </td>
                                            <td>{{$projectPerson->email}}</td>
                                            <td class="text-end">
                                                <button class="btn btn-light-danger btn-sm remove_project_member" data-id="{{$projectPerson->id}}">Remove</button>
                                                <a href="{{route('project.timeTracker', [encrypt($project->id), encrypt($projectPerson->user_id)] )}}" type="submit" class="btn btn-light btn-sm">Time Tracker</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Tab pane-->
        </div>
        <!--end::Tab Content-->
        
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection

@section('modals')
<!--begin::Modals-->
<!--begin::Modal - Users Search-->
<div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
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
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <!--begin::Content-->
                <div class="text-center mb-13">
                    <h1 class="mb-3">Search Users</h1>
                    <div class="text-muted fw-bold fs-5">Invite Collaborators To Your Project</div>
                </div>
                <!--end::Content-->
                <!--begin::Search-->
                <div id="kt_modal_users_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2"
                    data-kt-search-enter="enter" data-kt-search-layout="inline">
                    <!--begin::Form-->
                    <form action="{{route('project.search.people', encrypt($project->id))}}" method="post" data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
                        @csrf
                        <!--begin::Hidden input(Added to disable form autocomplete)-->
                        <!--end::Hidden input-->
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span
                            class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
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
                        <!--end::Icon-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-lg form-control-solid px-15" name="search"
                            value="" placeholder="Search by email, or name..."
                            data-kt-search-element="input" />
                        <!--end::Input-->
                        <!--begin::Reset-->
                        <span
                            class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                            data-kt-search-element="clear">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <!--end::Reset-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Search-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Users Search-->


<!--begin::Modal - Remove Project Member-->
<div class="modal fade" id="remove_project_member_modal" tabindex="-1" aria-hidden="true">
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
                    <h1 class="mb-3">Remove Member</h1>
                    <!--end::Title-->
                </div>
                <!--end::Heading-->

                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8 fv-row">
                    Are you sure want to remove this member from this project? This can't be undone !
                </div>
                <!--end::Input group-->

                <!--begin::Actions-->
                <div class="text-center">
                    <form action="{{route('project.people.destroy')}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" id="project_people_id" name="id">
                        <button type="submit" class="btn btn-light btn-light-danger btn-sm">Remove</button>
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
<!--end::Modal - Remove Project Member-->

<!--end::Modals-->
@endsection

@section('scripts')
<script src="{{asset('assets/js/data-table/jquery.dataTables.min.js')}}">
</script>
<script src="{{asset('assets/js/data-table/data-table-act.js')}}"></script>
<script>
    $(document).on('click', '.remove_project_member', function(e) {
        e.preventDefault();
        $('#remove_project_member_modal').modal('show');
        var id = $(this).data('id');
        $('#project_people_id').val(id);
    });
</script>
@endsection