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
                    <h3 class="fw-bolder me-5 my-1">Employees ({{ count($users) }})</h3>
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
                                                    src="{{ asset('uploaded_files/profile_pictures/' . $user->profile_picture) }}" />
                                            @else
                                                <img alt="Profile Picture"
                                                    src="{{ Avatar::create($user->name)->toBase64() }}" />
                                            @endisset
                                            {{-- <div
                                        class="bg-success position-absolute border border-4 border-white h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3">
                                    </div> --}}
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Name-->
                                        <span class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">
                                            {{ $user->name }}
                                        </span>
                                        <!--end::Name-->
                                        <!--begin::Email-->
                                        <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">{{ $user->email }}</p>
                                        <!--end::Email-->
                                        <br>
                                        <form action="{{ route('project.add.people', encrypt($project_id)) }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="usere_id" value="{{ $user->id }}">
                                            <button class="btn btn-light-success btn-sm remove_project_member"
                                                data-id="{{ $user->id }}">Add</button>
                                        </form>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Col-->
                        @endforeach

                        @if (count($users) == 0)
                            <!--begin::Notice-->
                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                            rx="10" fill="currentColor" />
                                        <rect x="11" y="14" width="7" height="2" rx="1"
                                            transform="rotate(-90 11 14)" fill="currentColor" />
                                        <rect x="11" y="17" width="2" height="2" rx="1"
                                            transform="rotate(-90 11 17)" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-bold">

                                        @if ($is_project_member == 1)
                                            <h4 class="text-gray-900 fw-bolder">Entered email is already in this project
                                            </h4>
                                        @elseif ($is_registered == 1)
                                            <h4 class="text-gray-900 fw-bolder">Entered email is not found in your employee
                                                list</h4>
                                            <div class="fs-6 text-gray-700">But you still can ask
                                                <b>{{ $serach_query }}</b> to
                                                <form class="d-inline" action="{{ route('employee.mailinvitations') }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{ $serach_query }}" name="email">
                                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">join
                                                        Your team</button>
                                                </form>.
                                            </div>
                                        @elseif ($serach_query == auth()->user()->email)
                                            <h4 class="text-gray-900 fw-bolder">Don't be silly!</h4>
                                            <div class="fs-6 text-gray-700">You entered your own email!</div>
                                        @else
                                            <h4 class="text-gray-900 fw-bolder">Email was not found in our system</h4>
                                            <div class="fs-6 text-gray-700">But you still can ask
                                                <b>{{ $serach_query }}</b> to
                                                <form class="d-inline" action="{{ route('employee.mailinvitations') }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{ $serach_query }}" name="email">
                                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">join
                                                        Timetracker</button>
                                                </form>.
                                            </div>
                                        @endif


                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Notice-->
                        @endif
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
