@extends('backend.layouts.full.mainlayout')

@section('body')
    <!--begin::Toolbar-->
    <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column py-1">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center my-1">
                <span class="text-dark fw-bolder fs-1">Meta Information</span>
            </h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Toolbar-->



    <form action="{{ route('metainfo.update', $meta->id) }}" class="form" method="post">
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
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row">
                            <textarea type="text" name="meta_tags" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                placeholder="Meta Tags" rows="10">{{ $meta->meta_tags }}</textarea>
                        </div>
                        <!--end::Col-->
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
                    title="Works only on TaskMonitor dextop appplication."></i>
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
