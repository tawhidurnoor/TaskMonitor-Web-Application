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
                <span class="text-dark fw-bolder fs-1">Search Results</span>
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
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
                <li class="breadcrumb-item text-dark">Search Result</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--end::Actions-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post" id="kt_post">
        <!--begin::Toolbar-->
        <div class="d-flex flex-wrap flex-stack pb-7">
            <!--begin::Title-->
            <div class="d-flex flex-wrap align-items-center my-1">
                <h3 class="fw-bolder me-5 my-1">Users ({{count($users)}})</h3>
                <!--begin::Search-->
                <form action="{{route('employee.search')}}" method="post">
                    @csrf
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-3 position-absolute ms-3">
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
                        <input type="email" id="kt_filter_search"
                            class="form-control form-control-sm form-control-solid w-150px ps-10" placeholder="Search"
                            name="email" value="{{$serach_query}}" />
                    </div>
                </form>
                <!--end::Search-->
            </div>
            <!--end::Title-->

            @if (count($users) > 0)
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
            @endif

        </div>
        <!--end::Toolbar-->
        <!--begin::Tab Content-->
        <div class="tab-content">
            @if(count($users) > 0)
            <!--begin::Tab pane-->
            <div id="kt_project_users_card_pane" class="tab-pane fade show active">
                <!--begin::Row-->
                <div class="row g-6 g-xl-9">
                    @foreach ($users as $user)
                    <!--begin::Col-->
                    <div class="col-md-6 col-xxl-4">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-65px symbol-circle mb-5">
                                    @isset($user->profile_picture)
                                    <img alt="Profile Picture"
                                        src="{{asset('uploaded_files/profile_pictures/'.$user->profile_picture)}}" />
                                    @else
                                    <img alt="Profile Picture"
                                        src="{{Avatar::create($user->first_name." ".$user->last_name)->toBase64()}}" />
                                    @endisset
                                    <div
                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3">
                                    </div>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">
                                    {{$user->first_name}} {{$user->last_name}}
                                </a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                <div class="fw-bold text-gray-400 mb-6">
                                    {{$user->email}}
                                    <br>
                                    Joined {{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y')}}
                                </div>
                                <!--end::Position-->
                                <form action="{{route('employee.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="employee_id" value="{{$user->id}}">
                                    <button type="submit" class="btn btn-light btn-sm">Invite</button>
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
                                        <th class="min-w-250px">User</th>
                                        <th class="min-w-150px">Email</th>
                                        <th class="min-w-90px">Joined</th>
                                        <th class="min-w-50px text-end">Action</th>
                                    </tr>
                                </thead>
                                <!--end::Head-->
                                <!--begin::Body-->
                                <tbody class="fs-6">
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Wrapper-->
                                                <div class="me-5 position-relative">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-35px symbol-circle">
                                                        @isset($user->profile_picture)
                                                        <img alt="Profile Picture"
                                                            src="{{asset('uploaded_files/profile_pictures/'.$user->profile_picture)}}" />
                                                        @else
                                                        <img alt="Profile Picture"
                                                            src="{{Avatar::create($user->first_name." ".$user->last_name)->toBase64()}}" />
                                                        @endisset
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
                                                    <a href="#" class="mb-1 text-gray-800 text-hover-primary">
                                                        {{$user->first_name}} {{$user->last_name}}
                                                    </a>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y')}}
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-sm">Invite</a>
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
            @else

            <center>
                <img src="{{asset('assets_backend/media/illustrations/sketchy-1/5.png')}}" width="45%" height="45%">
                <h2>Oops... we didn't fint anything that matches this search :(</h2>
            </center>
            <br>
            @if ($serach_query != auth()->user()->email)
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-bold">
                            <h4 class="text-gray-900 fw-bolder">Email was not found in our system</h4>
                            <div class="fs-6 text-gray-700">But you still can ask <b>{{$serach_query}}</b> to
                                <a class="fw-bolder" href="billing.html">join Timetracker</a>.
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
            @endif

            @endif
        </div>
        <!--end::Tab Content-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection