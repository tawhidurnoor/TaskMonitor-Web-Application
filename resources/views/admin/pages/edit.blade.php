@extends('backend.layouts.full.mainlayout')

@section('meta')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_backend/simditor-2.3.28/assets/styles/simditor.css') }}" />
@endsection

@section('body')
    <!--begin::Content-->
    <div class="content flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column py-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center my-1">
                    <span class="text-dark fw-bolder fs-1">Edit {{ $page->title }} page</span>
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
                {{-- <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Edit Details</h3>
                    </div>
                    <!--end::Card title-->
                </div> --}}
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9">
                    <form action="{{ route('pages.update', $page->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!--begin::Row-->
                        <div class="row mb-12">

                            <!--begin::Col-->
                            <div class="col-lg-12">
                                <input type="text" name="title" class="form-control" value="{{ $page->title }}"
                                    placeholder="Page Title *" required>
                            </div>
                            <!--end::Col-->

                            <div style="margin: 10px"></div>

                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <textarea type="text" name="meta_tags" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="Meta Tags (Leave empty if you want default meta tags)" rows="5">{{ $page->meta_tags }}</textarea>
                            </div>
                            <!--end::Col-->

                            <div style="margin: 10px"></div>

                            <!--begin::Col-->
                            <div class="col-lg-12">
                                <textarea id="editor" placeholder="Page Content *" name="content" autofocus required>{{ $page->content }}</textarea>
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Row-->

                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>

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


@section('scripts')
    <script type="text/javascript" src="{{ asset('assets_backend/simditor-2.3.28/assets/scripts/jquery.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets_backend/simditor-2.3.28/assets/scripts/module.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets_backend/simditor-2.3.28/assets/scripts/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets_backend/simditor-2.3.28/assets/scripts/uploader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets_backend/simditor-2.3.28/assets/scripts/simditor.js') }}"></script>

    <script>
        Simditor.locale = 'en-US';

        var editor = new Simditor({
            textarea: $('#editor')
            //optional options
        });
    </script>
@endsection
