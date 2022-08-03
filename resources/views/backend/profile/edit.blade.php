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
                    <span class="text-dark fw-bolder fs-1">Edit Profile</span>
                </h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                {{-- <a href="#" class="btn btn-flex btn-sm btn-primary fw-bolder border-0 fs-6 h-40px"
                data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign"
                id="kt_toolbar_primary_button">Create</a> --}}
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post" id="kt_post">

            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Edit Details</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="patch">
                        @csrf

                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold">Avatar</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                    style="background-image: url('{{ url('assets_backend/media/avatars/avatar.webp') }}')">
                                    <!--begin::Preview existing avatar-->
                                    @isset(auth()->user()->profile_picture)
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url({{ url('uploaded_files/profile_pictures/' . auth()->user()->profile_picture) }})">
                                        </div>
                                    @else
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url({{ url('assets_backend/media/avatars/avatar.webp') }})">
                                        </div>
                                    @endisset

                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        data-kt-initialized="1">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="profile_picture" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="avatar_remove">
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        data-kt-initialized="1">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        data-kt-initialized="1">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>

                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold">Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                                @error('name')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold">Company</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="company" id="company"
                                    class="form-control @error('company') is-invalid @enderror"
                                    value="{{ $user->company_name }}">
                                @error('company')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-bold">
                                <p class="m-0 p-0">Email</p>
                                <p class="m-0 p-0">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen044.svg-->
                                    <span class="svg-icon svg-icon-muted"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                                rx="10" fill="currentColor" />
                                            <rect x="11" y="14" width="7" height="2" rx="1"
                                                transform="rotate(-90 11 14)" fill="currentColor" />
                                            <rect x="11" y="17" width="2" height="2" rx="1"
                                                transform="rotate(-90 11 17)" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--> <span class="text-muted">Changed email needs to be
                                        verified!</span>
                                </p>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <input type="text" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                                @error('email')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror

                            </div>
                            <!--end::Col-->
                        </div>
                        <button class="btn btn-primary">Update</button>
                        <!--end::Input group-->
                        <!--end::Input group-->
                        @include('backend.layouts.partials.email_varification_warning')
                    </form>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::details View-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
