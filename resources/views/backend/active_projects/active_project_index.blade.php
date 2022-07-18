@extends('backend.layouts.full.mainlayout')

@section('body')
    <!--begin::Toolbar-->
    <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column py-1">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center my-1">
                <span class="text-dark fw-bolder fs-1">My Projects</span>
            </h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center py-1">
            <!--begin::Button-->
            <a href="#" class="btn btn-flex btn-sm btn-primary fw-bolder border-0 fs-6 h-40px" data-bs-toggle="modal"
                data-bs-target="#kt_modal_create_project" id="kt_toolbar_primary_button">Create Project</a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Toolbar-->


    <!--begin::Post-->
    <div class="post" id="kt_post">
        <!--begin::Card-->
        @foreach ($projects as $project)
            <div class="card mb-4 shadow-sm">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">{{ $project->title }}</span>
                        <span class="text-muted mt-1 fw-bold fs-7">Started at:
                            {{ $project->created_at->format('d M, Y') }}</span>
                    </h3>
                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                        title="" data-bs-original-title="Click to assign an employee">
                        {{-- <a href="{{ route('project.details', encrypt($project->id)) }}"
                            class="btn btn-sm btn-light btn-active-primary">Details</a> --}}
                        <button
                            class="btn btn-flex btn-sm btn-primary fw-bolder border-0 fs-6 h-40px assign-employee-button"
                            data-id="{{ encrypt($project->id) }}">Assign Employee</button>
                    </div>
                </div>
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th class="min-w-200px">Employee</th>
                                    <th class="min-w-150px">Today's tasks</th>
                                    <th class="min-w-150px">Today total time</th>
                                    <th class="min-w-150px">
                                        <div class="d-flex flex-column w-100 me-2">
                                            <div class="d-flex flex-stack mb-2">
                                                Total Time This Week
                                            </div>
                                            <div class="w-100">
                                                <span class="me-2 fs-7 fw-bold"> Week: (Sunday) </span>
                                            </div>
                                        </div>
                                    </th>
                                    <th class="min-w-100px">Action</th>
                                    {{-- <th class="min-w-100px text-end">Actions</th> --}}
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach ($project->projectPeople as $idx => $employee)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-45px me-5">
                                                    @isset($employee->user->profile_picture)
                                                        <img alt="Profile Picture"
                                                            src="{{ asset('uploaded_files/profile_pictures/' . $employee->user->profile_picture) }}"
                                                            class="w-100" />
                                                    @else
                                                        <img alt="Profile Picture"
                                                            src="{{ Avatar::create($employee->user->name)->toBase64() }}"
                                                            class="w-100" />
                                                    @endisset
                                                </div>

                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="{{ route('project.timeTracker', [encrypt($project->id), encrypt($employee->user->id)]) }}"
                                                        class="text-dark fw-bolder text-hover-primary fs-6">{{ $employee->user->name }}</a>
                                                    @if ($employee->user->id == $project->user_id)
                                                        <span
                                                            class="text-muted fw-bold text-muted d-block fs-7">Co-ordinator</span>
                                                    @endif
                                                </div>

                                                @if ($employee->is_active == true)
                                                    <span style="margin:10px"
                                                        class="badge badge-light-success me-auto">Active</span>
                                                @else
                                                    <span style="margin:10px"
                                                        class="badge badge-light-danger me-auto">Removed</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            @php
                                                $totalMinutes = 0;
                                                $todayTotal = 0;
                                                $tasksToday = false;
                                            @endphp
                                            <div class="d-flex flex-column w-100 me-2">
                                                @foreach ($employee->timeTrackers as $timeTrack)
                                                    @php
                                                        $start = new \Carbon\Carbon($timeTrack->start);
                                                        if (!is_null($timeTrack->end)) {
                                                            $end = new \Carbon\Carbon($timeTrack->end);
                                                        } else {
                                                            $end = now();
                                                        }
                                                        $totalMinutes += $end->diffInRealMinutes($start);
                                                        if ($start->isSameDay()) {
                                                            $todayTotal += $end->diffInRealMinutes($start);
                                                        }
                                                    @endphp
                                                    @if ($timeTrack->created_at->isSameDay())
                                                        @php
                                                            $tasksToday = true;
                                                        @endphp
                                                        @if (is_null($timeTrack->end))
                                                            <span class="me-2 fs-7 fw-bold">{{ $timeTrack->task_title }} -
                                                                (<span class="text-muted">from:</span> @php
                                                                    $start = new \Carbon\Carbon($timeTrack->start);
                                                                    echo $start->format('h:i a');
                                                                @endphp,
                                                                <span class="text-muted">Currently working</span>)
                                                            </span>
                                                        @else
                                                            <span class="me-2 fs-7 fw-bold">{{ $timeTrack->task_title }} -
                                                                (<span class="text-muted">from:</span> @php
                                                                    $start = new \Carbon\Carbon($timeTrack->start);
                                                                    echo $start->format('h:i a');
                                                                @endphp,
                                                                <span class="text-muted">to</span> @php
                                                                    $end = new \Carbon\Carbon($timeTrack->end);
                                                                    echo $end->format('h:i a');
                                                                @endphp)</span>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @if (!$tasksToday)
                                                    <span class="text-muted fw-bold text-muted d-block fs-7">Today tracker
                                                        not started!</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-flex flex-column w-100 me-2">
                                                <div class="d-flex flex-stack mb-2">
                                                    <span
                                                        class="me-2 fs-7 fw-bold">{{ sprintf('%02d', intdiv($todayTotal, 60)) . ' Hours, ' . sprintf('%02d', $todayTotal % 60) . ' Minutes' }}</span>
                                                </div>
                                                {{-- <div class="progress h-6px w-100">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> --}}
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-flex flex-column w-100 me-2">
                                                <div class="d-flex flex-stack mb-2">
                                                    <span
                                                        class="me-2 fs-7 fw-bold">{{ sprintf('%02d', intdiv($totalMinutes, 60)) . ' Hours, ' . sprintf('%02d', $totalMinutes % 60) . ' Minutes' }}</span>
                                                </div>
                                                {{-- <div class="progress h-6px w-100">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> --}}
                                            </div>
                                        </td>

                                        <td>
                                            @if ($employee->is_active == true)
                                                <button class="btn btn-light-danger btn-sm remove_project_member"
                                                    data-id="{{ $employee->id }}">Remove</button>
                                            @else
                                                <button class="btn btn-light-success btn-sm reassign_project_member_button"
                                                    data-id="{{ $employee->id }}">Reassign</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--end::Card body-->
            </div>
        @endforeach
        <!--end::Card-->
    </div>
    <!--end::Post-->



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
@endsection

@section('modals')
    <!--begin::Modal - Create Campaign-->




    <!--begin::Modal - Users Search-->
    <div class="modal fade" id="employee_search" tabindex="-1" aria-hidden="true">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
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
                        <form action="" method="post" id="search-form" class="w-100 position-relative mb-5"
                            autocomplete="off">
                            @csrf
                            <!--begin::Hidden input(Added to disable form autocomplete)-->
                            <!--end::Hidden input-->
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span
                                class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Input-->
                            <input type="email" class="form-control form-control-lg form-control-solid px-15"
                                name="search" value="" placeholder="Search by email, or name..."
                                data-kt-search-element="input" />
                            <!--end::Input-->
                            <!--begin::Reset-->
                            <span
                                class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                                data-kt-search-element="clear">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                            height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                            fill="currentColor" />
                                        <rect x="7.41422" y="6" width="16" height="2"
                                            rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
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






    <!--begin::Modal - New Target-->
    <div class="modal fade" id="kt_modal_create_project" tabindex="-1" aria-hidden="true">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
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
                    <form id="add_project" action="{{ route('project.store') }}" method="POST" class="form"
                        enctype="multipart/form-data">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Add a project</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-bold fs-5">If you need more info, please check
                                <a href="#" class="fw-bolder link-primary">Project Guidelines</a>.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Project Title</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Specify a title for the project"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Enter project Title" name="project_title" required />
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Project Details</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Write some description about the peoject"></i>
                            </label>
                            <textarea class="form-control form-control-solid" rows="3" name="project_description"
                                placeholder="Type Target Details" required></textarea>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="d-block fw-bold fs-6 mb-5">
                                <span class="required">Project Logo</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="E.g. Select a logo to represent the company that's running the campaign."></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline" data-kt-image-input="true"
                                style="background-image: url(../../assets/media/svg/files/blank-image.svg)">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="project_logo" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group-->

                        {{-- <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Tags</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Specify a target priorty"></i>
                        </label>
                        <!--end::Label-->
                        <input class="form-control form-control-solid" value="Important, Urgent" name="tags" />
                    </div>
                    <!--end::Input group--> --}}

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_target_cancel"
                                class="btn btn-light me-3">Cancel</button>
                            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
    <!--end::Modal - New Target-->
    <!--end::Modal - Create Campaign-->


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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
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
                        Are you sure want to remove this member from this project?
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <form action="{{ route('project.people.remove') }}" method="post">
                            @csrf
                            @method('put')
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

    <!--begin::Modal - Reassign Project Member-->
    <div class="modal fade" id="reassign_project_member_modal" tabindex="-1" aria-hidden="true">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
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
                        <h1 class="mb-3">Reassign Member</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Heading-->

                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        Are you sure want to reassign this member from this project?
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <form action="{{ route('project.people.reassign') }}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" id="project_people_id_reassign" name="id">
                            <button type="submit" class="btn btn-light btn-light-success btn-sm">Reassign</button>
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
    <!--end::Modal - Reassign Project Member-->
@endsection

@push('js')
@endpush

@section('scripts')
    <script>
        $(document).on('click', '.assign-employee-button', function(e) {
            e.preventDefault();
            $('#employee_search').modal('show');
            var id = $(this).data('id');
            document.getElementById("search-form").action = "/project/searchpeople/" + id;
        });
    </script>

    <script>
        $(document).on('click', '.remove_project_member', function(e) {
            e.preventDefault();
            $('#remove_project_member_modal').modal('show');
            var id = $(this).data('id');
            $('#project_people_id').val(id);
        });
    </script>

    <script>
        $(document).on('click', '.reassign_project_member_button', function(e) {
            e.preventDefault();
            $('#reassign_project_member_modal').modal('show');
            var id = $(this).data('id');
            $('#project_people_id_reassign').val(id);
        });
    </script>
@endsection
