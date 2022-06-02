@extends('backend.layouts.full.mainlayout')

@section('body')
<!--begin::Toolbar-->
<div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column py-1">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center my-1">
            <span class="text-dark fw-bolder fs-1">Settings</span>
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
            <li class="breadcrumb-item text-dark">Settings</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->
</div>
<!--end::Toolbar-->



<form action="{{route('settings.update', $settings->id)}}" class="form" method="post">
    @csrf
    @method('put')
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form id="kt_account_profile_details_form" class="form">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="required">Take Screenshot</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Works only on TimeTracker dextop appplication."></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <select name="screenshot_duration" id="screenshot_duration" value="{{$settings->screenshot_duration}}" aria-label="Take dextop screenshots" data-control="select2" class="form-select form-select-solid form-select-lg fw-bold">
                                <option value="2">Every 2 Minutes</option>
                                <option value="5">Every 5 Minutes</option>
                                <option value="10">Every 10 Minutes</option>
                                <option value="20">Every 20 Minutes</option>
                                <option value="30">Every 30 Minutes</option>
                                <option value="60">Every 60 Minutes</option>
                            </select>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="required">Workspace or Company name</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="company_name" class="form-control form-control-lg form-control-solid"
                                placeholder="Workspace or Company Name" value="{{auth()->user()->company_name}}" required/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                        Changes</button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
</form>
<!--end::Basic info-->








<!--begin::Row-->
{{-- <div class="row g-6 g-xl-9">

    <form action="{{route('settings.update', $settings->id)}}" class="form" method="post">
        @csrf
        @method('put')
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-8 fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                <span class="required">Take Screenshot</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                    title="Works only on TimeTracker dextop appplication."></i>
            </label>
            <!--end::Label-->
            <input type="number" value="{{$settings->screenshot_duration}}" class="form-control form-control-solid"
                placeholder="Screenshot Duration" name="screenshot_duration" required min="5" />
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="text-center">
            <button type="submit" class="btn btn-primary">
                <span class="indicator-label">Update</span>
            </button>
        </div>
        <!--end::Actions-->

    </form>

</div> --}}
<!--end::Row-->

@endsection

@section('scripts')
    <script>
        $('#screenshot_duration').val("{{$settings->screenshot_duration}}");
    </script>
@endsection