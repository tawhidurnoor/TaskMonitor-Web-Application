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
                                <!--begin::User-->
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                    title="{{$projectPerson->first_name}} {{$projectPerson->last_name}}">
                                    @isset($projectPerson->profile_picture)
                                    <img alt="Profile Picture"
                                        src="{{asset('uploaded_files/profile_pictures/'.$user->projectPerson)}}" />
                                    @else
                                    <img alt="Profile Picture"
                                        src="{{Avatar::create($projectPerson->first_name." ".$projectPerson->last_name)->toBase64()}}" />
                                    @endisset
                                </div>
                                <!--end::User-->
                                @endforeach

                                <!--begin::All users-->
                                <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_view_users">
                                    <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bolder"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        title="View more users">+42</span>
                                </a>
                                <!--end::All users-->
                            </div>
                            <!--end::Users-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                {{--
                <!--end::Details-->
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
                                        src="{{asset('uploaded_files/profile_pictures/'.$user->projectPerson)}}" />
                                    @else
                                    <img alt="Profile Picture"
                                        src="{{Avatar::create($projectPerson->first_name." ".$projectPerson->last_name)->toBase64()}}" />
                                    @endisset
                                    {{-- <div
                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3">
                                    </div> --}}
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <span class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">
                                    {{$projectPerson->first_name}} {{$projectPerson->last_name}}
                                </span>
                                <!--end::Name-->
                                <br>
                                <form action="" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-light-danger btn-sm">Remove</button>
                                    <a href="" type="submit" class="btn btn-light btn-sm">Time Tracker</a>
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
                <div class="d-flex flex-stack flex-wrap pt-10">
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
                </div>
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
                                        <th class="min-w-250px">Manager</th>
                                        <th class="min-w-150px">Date</th>
                                        <th class="min-w-90px">Amount</th>
                                        <th class="min-w-90px">Status</th>
                                        <th class="min-w-50px text-end">Details</th>
                                    </tr>
                                </thead>
                                <!--end::Head-->
                                <!--begin::Body-->
                                <tbody class="fs-6">
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Emma
                                                        Smith</a>
                                                    <div class="fw-bold fs-6 text-gray-400">smith@kpmg.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Oct 25, 2022</td>
                                        <td>$718.00</td>
                                        <td>
                                            <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span
                                                            class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div
                                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                    </div>
                                                    <!--end::Online-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Melody
                                                        Macy</a>
                                                    <div class="fw-bold fs-6 text-gray-400">melody@altbox.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Feb 21, 2022</td>
                                        <td>$574.00</td>
                                        <td>
                                            <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-1.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Max
                                                        Smith</a>
                                                    <div class="fw-bold fs-6 text-gray-400">max@kt.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Apr 15, 2022</td>
                                        <td>$829.00</td>
                                        <td>
                                            <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-5.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Sean
                                                        Bean</a>
                                                    <div class="fw-bold fs-6 text-gray-400">sean@dellito.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Jun 24, 2022</td>
                                        <td>$600.00</td>
                                        <td>
                                            <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-25.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Brian
                                                        Cox</a>
                                                    <div class="fw-bold fs-6 text-gray-400">brian@exchange.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Nov 10, 2022</td>
                                        <td>$432.00</td>
                                        <td>
                                            <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span
                                                            class="symbol-label bg-light-warning text-warning fw-bold">C</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div
                                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                    </div>
                                                    <!--end::Online-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Mikaela
                                                        Collins</a>
                                                    <div class="fw-bold fs-6 text-gray-400">mik@pex.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Sep 22, 2022</td>
                                        <td>$1000.00</td>
                                        <td>
                                            <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-9.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Francis
                                                        Mitcham</a>
                                                    <div class="fw-bold fs-6 text-gray-400">f.mit@kpmg.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Jun 20, 2022</td>
                                        <td>$938.00</td>
                                        <td>
                                            <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span
                                                            class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div
                                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                    </div>
                                                    <!--end::Online-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Olivia
                                                        Wild</a>
                                                    <div class="fw-bold fs-6 text-gray-400">olivia@corpmail.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Dec 20, 2022</td>
                                        <td>$697.00</td>
                                        <td>
                                            <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span
                                                            class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div
                                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                    </div>
                                                    <!--end::Online-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Neil
                                                        Owen</a>
                                                    <div class="fw-bold fs-6 text-gray-400">owen.neil@gmail.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Oct 25, 2022</td>
                                        <td>$794.00</td>
                                        <td>
                                            <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-23.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Dan
                                                        Wilson</a>
                                                    <div class="fw-bold fs-6 text-gray-400">dam@consilting.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Apr 15, 2022</td>
                                        <td>$844.00</td>
                                        <td>
                                            <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span
                                                            class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div
                                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                    </div>
                                                    <!--end::Online-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Emma
                                                        Bold</a>
                                                    <div class="fw-bold fs-6 text-gray-400">emma@intenso.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>May 05, 2022</td>
                                        <td>$645.00</td>
                                        <td>
                                            <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-12.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Ana
                                                        Crown</a>
                                                    <div class="fw-bold fs-6 text-gray-400">ana.cf@limtel.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Dec 20, 2022</td>
                                        <td>$485.00</td>
                                        <td>
                                            <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span
                                                            class="symbol-label bg-light-info text-info fw-bold">A</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div
                                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                    </div>
                                                    <!--end::Online-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Robert
                                                        Doe</a>
                                                    <div class="fw-bold fs-6 text-gray-400">robert@benko.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Mar 10, 2022</td>
                                        <td>$592.00</td>
                                        <td>
                                            <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-13.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">John
                                                        Miller</a>
                                                    <div class="fw-bold fs-6 text-gray-400">miller@mapple.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Dec 20, 2022</td>
                                        <td>$536.00</td>
                                        <td>
                                            <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span
                                                            class="symbol-label bg-light-success text-success fw-bold">L</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div
                                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                    </div>
                                                    <!--end::Online-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Lucy
                                                        Kunic</a>
                                                    <div class="fw-bold fs-6 text-gray-400">lucy.m@fentech.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Sep 22, 2022</td>
                                        <td>$482.00</td>
                                        <td>
                                            <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-21.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div
                                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                    </div>
                                                    <!--end::Online-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Ethan
                                                        Wilder</a>
                                                    <div class="fw-bold fs-6 text-gray-400">ethan@loop.com.au</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Feb 21, 2022</td>
                                        <td>$721.00</td>
                                        <td>
                                            <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Emma
                                                        Smith</a>
                                                    <div class="fw-bold fs-6 text-gray-400">smith@kpmg.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Jul 25, 2022</td>
                                        <td>$525.00</td>
                                        <td>
                                            <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-23.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Dan
                                                        Wilson</a>
                                                    <div class="fw-bold fs-6 text-gray-400">dam@consilting.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Jul 25, 2022</td>
                                        <td>$859.00</td>
                                        <td>
                                            <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Emma
                                                        Smith</a>
                                                    <div class="fw-bold fs-6 text-gray-400">smith@kpmg.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Oct 25, 2022</td>
                                        <td>$944.00</td>
                                        <td>
                                            <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Emma
                                                        Smith</a>
                                                    <div class="fw-bold fs-6 text-gray-400">smith@kpmg.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Feb 21, 2022</td>
                                        <td>$902.00</td>
                                        <td>
                                            <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-1.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Max
                                                        Smith</a>
                                                    <div class="fw-bold fs-6 text-gray-400">max@kt.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Jun 24, 2022</td>
                                        <td>$487.00</td>
                                        <td>
                                            <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Emma
                                                        Smith</a>
                                                    <div class="fw-bold fs-6 text-gray-400">smith@kpmg.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Mar 10, 2022</td>
                                        <td>$547.00</td>
                                        <td>
                                            <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span
                                                            class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div
                                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                    </div>
                                                    <!--end::Online-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Olivia
                                                        Wild</a>
                                                    <div class="fw-bold fs-6 text-gray-400">olivia@corpmail.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Feb 21, 2022</td>
                                        <td>$669.00</td>
                                        <td>
                                            <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-25.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Brian
                                                        Cox</a>
                                                    <div class="fw-bold fs-6 text-gray-400">brian@exchange.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Aug 19, 2022</td>
                                        <td>$656.00</td>
                                        <td>
                                            <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-12.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Ana
                                                        Crown</a>
                                                    <div class="fw-bold fs-6 text-gray-400">ana.cf@limtel.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Aug 19, 2022</td>
                                        <td>$839.00</td>
                                        <td>
                                            <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span
                                                            class="symbol-label bg-light-success text-success fw-bold">L</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div
                                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                    </div>
                                                    <!--end::Online-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Lucy
                                                        Kunic</a>
                                                    <div class="fw-bold fs-6 text-gray-400">lucy.m@fentech.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Nov 10, 2022</td>
                                        <td>$895.00</td>
                                        <td>
                                            <span class="badge badge-light-success fw-bolder px-4 py-3">Approved</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span
                                                            class="symbol-label bg-light-warning text-warning fw-bold">C</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div
                                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                    </div>
                                                    <!--end::Online-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Mikaela
                                                        Collins</a>
                                                    <div class="fw-bold fs-6 text-gray-400">mik@pex.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Jun 24, 2022</td>
                                        <td>$891.00</td>
                                        <td>
                                            <span class="badge badge-light-info fw-bolder px-4 py-3">In progress</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-12.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Ana
                                                        Crown</a>
                                                    <div class="fw-bold fs-6 text-gray-400">ana.cf@limtel.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Feb 21, 2022</td>
                                        <td>$900.00</td>
                                        <td>
                                            <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <img alt="Pic" src="../../assets/media/avatars/300-5.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Sean
                                                        Bean</a>
                                                    <div class="fw-bold fs-6 text-gray-400">sean@dellito.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Oct 25, 2022</td>
                                        <td>$846.00</td>
                                        <td>
                                            <span class="badge badge-light-danger fw-bolder px-4 py-3">Rejected</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        <span
                                                            class="symbol-label bg-light-info text-info fw-bold">A</span>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Online-->
                                                    <div
                                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                    </div>
                                                    <!--end::Online-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column justify-content-center">
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">Robert
                                                        Doe</a>
                                                    <div class="fw-bold fs-6 text-gray-400">robert@benko.com</div>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>Mar 10, 2022</td>
                                        <td>$915.00</td>
                                        <td>
                                            <span class="badge badge-light-warning fw-bolder px-4 py-3">Pending</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">View</a>
                                        </td>
                                    </tr>
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
        <!--begin::Modals-->
        <!--begin::Modal - View Users-->
        <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog mw-650px">
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
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="currentColor" />
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
                        <!--begin::Heading-->
                        <div class="text-center mb-13">
                            <!--begin::Title-->
                            <h1 class="mb-3">Browse Users</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-bold fs-5">If you need more info, please check out our
                                <a href="#" class="link-primary fw-bolder">Users Directory</a>.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Users-->
                        <div class="mb-15">
                            <!--begin::List-->
                            <div class="mh-375px scroll-y me-n7 pe-7">
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Emma
                                                Smith
                                                <span class="badge badge-light fs-8 fw-bold ms-2">Art
                                                    Director</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">smith@kpmg.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$23,000</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Melody
                                                Macy
                                                <span class="badge badge-light fs-8 fw-bold ms-2">Marketing
                                                    Analytic</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">melody@altbox.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$50,500</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="../../assets/media/avatars/300-1.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Max
                                                Smith
                                                <span class="badge badge-light fs-8 fw-bold ms-2">Software
                                                    Enginer</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">max@kt.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$75,900</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="../../assets/media/avatars/300-5.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Sean
                                                Bean
                                                <span class="badge badge-light fs-8 fw-bold ms-2">Web
                                                    Developer</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">sean@dellito.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$10,500</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="../../assets/media/avatars/300-25.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Brian
                                                Cox
                                                <span class="badge badge-light fs-8 fw-bold ms-2">UI/UX
                                                    Designer</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">brian@exchange.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$20,000</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-warning text-warning fw-bold">C</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Mikaela
                                                Collins
                                                <span class="badge badge-light fs-8 fw-bold ms-2">Head Of
                                                    Marketing</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">mik@pex.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$9,300</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="../../assets/media/avatars/300-9.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Francis
                                                Mitcham
                                                <span class="badge badge-light fs-8 fw-bold ms-2">Software
                                                    Arcitect</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">f.mit@kpmg.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$15,000</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Olivia
                                                Wild
                                                <span class="badge badge-light fs-8 fw-bold ms-2">System
                                                    Admin</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">olivia@corpmail.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$23,000</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Neil
                                                Owen
                                                <span class="badge badge-light fs-8 fw-bold ms-2">Account
                                                    Manager</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">owen.neil@gmail.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$45,800</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="../../assets/media/avatars/300-23.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Dan
                                                Wilson
                                                <span class="badge badge-light fs-8 fw-bold ms-2">Web
                                                    Desinger</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">dam@consilting.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$90,500</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Emma
                                                Bold
                                                <span class="badge badge-light fs-8 fw-bold ms-2">Corporate
                                                    Finance</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">emma@intenso.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$5,000</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="../../assets/media/avatars/300-12.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Ana
                                                Crown
                                                <span class="badge badge-light fs-8 fw-bold ms-2">Customer
                                                    Relationship</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">ana.cf@limtel.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$70,000</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-5">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-6">
                                            <!--begin::Name-->
                                            <a href="#"
                                                class="d-flex align-items-center fs-5 fw-bolder text-dark text-hover-primary">Robert
                                                Doe
                                                <span class="badge badge-light fs-8 fw-bold ms-2">Marketing
                                                    Executive</span></a>
                                            <!--end::Name-->
                                            <!--begin::Email-->
                                            <div class="fw-bold text-muted">robert@benko.com</div>
                                            <!--end::Email-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Details-->
                                    <!--begin::Stats-->
                                    <div class="d-flex">
                                        <!--begin::Sales-->
                                        <div class="text-end">
                                            <div class="fs-5 fw-bolder text-dark">$45,500</div>
                                            <div class="fs-7 text-muted">Sales</div>
                                        </div>
                                        <!--end::Sales-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::List-->
                        </div>
                        <!--end::Users-->
                        <!--begin::Notice-->
                        <div class="d-flex justify-content-between">
                            <!--begin::Label-->
                            <div class="fw-bold">
                                <label class="fs-6">Adding Users by Team Members</label>
                                <div class="fs-7 text-muted">If you need more info, please check budget planning</div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="" checked="checked" />
                                <span class="form-check-label fw-bold text-muted">Allowed</span>
                            </label>
                            <!--end::Switch-->
                        </div>
                        <!--end::Notice-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - View Users-->
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="currentColor" />
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
                        <div id="kt_modal_users_search_handler" data-kt-search-keypress="true"
                            data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline">
                            <!--begin::Form-->
                            <form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
                                <!--begin::Hidden input(Added to disable form autocomplete)-->
                                <input type="hidden" />
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
                                <input type="text" class="form-control form-control-lg form-control-solid px-15"
                                    name="search" value="" placeholder="Search by username, full name or email..."
                                    data-kt-search-element="input" />
                                <!--end::Input-->
                                <!--begin::Spinner-->
                                <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                                    data-kt-search-element="spinner">
                                    <span class="spinner-border h-15px w-15px align-middle text-muted"></span>
                                </span>
                                <!--end::Spinner-->
                                <!--begin::Reset-->
                                <span
                                    class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                                    data-kt-search-element="clear">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
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
                            <!--begin::Wrapper-->
                            <div class="py-5">
                                <!--begin::Suggestions-->
                                <div data-kt-search-element="suggestions">
                                    <!--begin::Heading-->
                                    <h3 class="fw-bold mb-5">Recently searched:</h3>
                                    <!--end::Heading-->
                                    <!--begin::Users-->
                                    <div class="mh-375px scroll-y me-n7 pe-7">
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Info-->
                                            <div class="fw-bold">
                                                <span class="fs-6 text-gray-800 me-2">Emma Smith</span>
                                                <span class="badge badge-light">Art Director</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Info-->
                                            <div class="fw-bold">
                                                <span class="fs-6 text-gray-800 me-2">Melody Macy</span>
                                                <span class="badge badge-light">Marketing Analytic</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <img alt="Pic" src="../../assets/media/avatars/300-1.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Info-->
                                            <div class="fw-bold">
                                                <span class="fs-6 text-gray-800 me-2">Max Smith</span>
                                                <span class="badge badge-light">Software Enginer</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <img alt="Pic" src="../../assets/media/avatars/300-5.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Info-->
                                            <div class="fw-bold">
                                                <span class="fs-6 text-gray-800 me-2">Sean Bean</span>
                                                <span class="badge badge-light">Web Developer</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <img alt="Pic" src="../../assets/media/avatars/300-25.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Info-->
                                            <div class="fw-bold">
                                                <span class="fs-6 text-gray-800 me-2">Brian Cox</span>
                                                <span class="badge badge-light">UI/UX Designer</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Users-->
                                </div>
                                <!--end::Suggestions-->
                                <!--begin::Results(add d-none to below element to hide the users list by default)-->
                                <div data-kt-search-element="results" class="d-none">
                                    <!--begin::Users-->
                                    <div class="mh-375px scroll-y me-n7 pe-7">
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='0']"
                                                        value="0" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-6.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                                        Smith</a>
                                                    <div class="fw-bold text-muted">smith@kpmg.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected="selected">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='1']"
                                                        value="1" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody
                                                        Macy</a>
                                                    <div class="fw-bold text-muted">melody@altbox.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1" selected="selected">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="2">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='2']"
                                                        value="2" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-1.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Max
                                                        Smith</a>
                                                    <div class="fw-bold text-muted">max@kt.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="3">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='3']"
                                                        value="3" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-5.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Sean
                                                        Bean</a>
                                                    <div class="fw-bold text-muted">sean@dellito.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected="selected">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="4">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='4']"
                                                        value="4" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-25.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Brian
                                                        Cox</a>
                                                    <div class="fw-bold text-muted">brian@exchange.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="5">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='5']"
                                                        value="5" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-warning text-warning fw-bold">C</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela
                                                        Collins</a>
                                                    <div class="fw-bold text-muted">mik@pex.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected="selected">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="6">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='6']"
                                                        value="6" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-9.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Francis
                                                        Mitcham</a>
                                                    <div class="fw-bold text-muted">f.mit@kpmg.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="7">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='7']"
                                                        value="7" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Olivia
                                                        Wild</a>
                                                    <div class="fw-bold text-muted">olivia@corpmail.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected="selected">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="8">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='8']"
                                                        value="8" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Neil
                                                        Owen</a>
                                                    <div class="fw-bold text-muted">owen.neil@gmail.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1" selected="selected">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="9">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='9']"
                                                        value="9" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-23.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Dan
                                                        Wilson</a>
                                                    <div class="fw-bold text-muted">dam@consilting.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="10">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='10']"
                                                        value="10" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                                        Bold</a>
                                                    <div class="fw-bold text-muted">emma@intenso.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected="selected">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="11">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='11']"
                                                        value="11" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-12.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ana
                                                        Crown</a>
                                                    <div class="fw-bold text-muted">ana.cf@limtel.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1" selected="selected">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="12">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='12']"
                                                        value="12" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Robert
                                                        Doe</a>
                                                    <div class="fw-bold text-muted">robert@benko.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="13">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='13']"
                                                        value="13" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-13.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John
                                                        Miller</a>
                                                    <div class="fw-bold text-muted">miller@mapple.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="14">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='14']"
                                                        value="14" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-success text-success fw-bold">L</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy
                                                        Kunic</a>
                                                    <div class="fw-bold text-muted">lucy.m@fentech.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected="selected">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="15">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='15']"
                                                        value="15" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="../../assets/media/avatars/300-21.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ethan
                                                        Wilder</a>
                                                    <div class="fw-bold text-muted">ethan@loop.com.au</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1" selected="selected">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="16">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='16']"
                                                        value="16" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Robert
                                                        Doe</a>
                                                    <div class="fw-bold text-muted">robert@benko.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Users-->
                                    <!--begin::Actions-->
                                    <div class="d-flex flex-center mt-15">
                                        <button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal"
                                            class="btn btn-active-light me-3">Cancel</button>
                                        <button type="submit" id="kt_modal_users_search_submit"
                                            class="btn btn-primary">Add Selected Users</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Results-->
                                <!--begin::Empty-->
                                <div data-kt-search-element="empty" class="text-center d-none">
                                    <!--begin::Message-->
                                    <div class="fw-bold py-10">
                                        <div class="text-gray-600 fs-3 mb-2">No users found</div>
                                        <div class="text-muted fs-6">Try to search by username, full name or email...
                                        </div>
                                    </div>
                                    <!--end::Message-->
                                    <!--begin::Illustration-->
                                    <div class="text-center px-5">
                                        <img src="../../assets/media/illustrations/sketchy-1/1.png" alt=""
                                            class="w-100 h-200px h-sm-325px" />
                                    </div>
                                    <!--end::Illustration-->
                                </div>
                                <!--end::Empty-->
                            </div>
                            <!--end::Wrapper-->
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
        <!--end::Modals-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection