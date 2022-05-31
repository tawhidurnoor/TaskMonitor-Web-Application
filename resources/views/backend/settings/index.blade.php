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

<!--begin::Row-->
<div class="row g-6 g-xl-9">

    <form action="{{route('settings.update', $settings->id)}}" class="form" method="post">
        @csrf
        @method('put')
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-8 fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                <span class="required">Screenshot Duration (in minutes)</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                    title="Set the default duration for taking screenhots."></i>
            </label>
            <!--end::Label-->
            <input type="number" value="{{$settings->screenshot_duration}}" class="form-control form-control-solid" placeholder="Screenshot Duration" name="screenshot_duration"
                required min="5"/>
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

</div>
<!--end::Row-->
<!--end::Pagination-->
@endsection