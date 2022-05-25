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
                <span class="text-dark fw-bolder fs-1">Search Result</span>
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
        <!--begin::Toolbar-->
        <div class="d-flex flex-wrap flex-stack pb-7">
            <!--begin::Title-->
            <div class="d-flex flex-wrap align-items-center my-1">
                <h3 class="fw-bolder me-5 my-1">Users ({{count($users)}})</h3>
            </div>
            <!--end::Title-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Tab Content-->
        <div class="tab-content">
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
                                    {{-- <div
                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3">
                                    </div> --}}
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <span class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">
                                    {{$user->first_name}} {{$user->last_name}}
                                </span>
                                <!--end::Name-->
                                <!--begin::Email-->
                                <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">{{$user->email}}</p>
                                <!--end::Email-->
                                <br>
                                <form action="{{route('project.add.people', encrypt($project_id))}}" method="post">
                                    @csrf
                                    <input type="hidden" name="usere_id" value="{{$user->id}}">
                                    <button class="btn btn-light-success btn-sm remove_project_member"
                                        data-id="{{$user->id}}">Add</button>
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
        </div>
        <!--end::Tab Content-->

    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection