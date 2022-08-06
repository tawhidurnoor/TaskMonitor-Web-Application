@extends('backend.layouts.full.mainlayout')

@section('body')
    <!--begin::Content-->
    <div class="content flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column py-1">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center my-1" style="margin-left: 30px">
                    <span class="text-dark fw-bold fs-2">Question: {{ $inquiry->message }}</span>
                </h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post" id="kt_post">
            <!--begin::Inbox App - Compose -->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                    <!--begin::Card-->
                    <div class="card">
                        <div class="card-header align-items-center">
                            <div class="card-title">
                                <h2>Compose Message</h2>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <!--begin::Form-->
                            <form action="{{ route('inquiries.send.mail', $inquiry->id) }}" method="POST"
                                id="kt_inbox_compose_form">
                                @csrf
                                <!--begin::Body-->
                                <div class="d-block">
                                    <!--begin::To-->
                                    <div class="d-flex align-items-center border-bottom px-8 min-h-50px">
                                        <!--begin::Label-->
                                        <div class="text-dark fw-bold w-20px">To:</div>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-transparent border-0"
                                            name="compose_to" value="{{ $inquiry->email }}" readonly />
                                        <!--end::Input-->
                                        <!--begin::CC & BCC buttons-->
                                        <div class="ms-auto w-75px text-end" style="display: none">
                                            <span class="text-muted fs-bold cursor-pointer text-hover-primary me-2"
                                                data-kt-inbox-form="cc_button">Cc</span>
                                            <span class="text-muted fs-bold cursor-pointer text-hover-primary"
                                                data-kt-inbox-form="bcc_button">Bcc</span>
                                        </div>
                                        <!--end::CC & BCC buttons-->
                                    </div>
                                    <!--end::To-->
                                    <!--begin::CC-->
                                    <div class="d-none align-items-center border-bottom ps-8 pe-5 min-h-50px"
                                        data-kt-inbox-form="cc" style="display: none">
                                        <!--begin::Label-->
                                        <div class="text-dark fw-bold w-75px">Cc:</div>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-transparent border-0"
                                            name="compose_cc" value="" />
                                        <!--end::Input-->
                                        <!--begin::Close-->
                                        <span class="btn btn-clean btn-xs btn-icon" data-kt-inbox-form="cc_close">
                                            <i class="la la-close"></i>
                                        </span>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::CC-->
                                    <!--begin::BCC-->
                                    <div class="d-none align-items-center border-bottom inbox-to-bcc ps-8 pe-5 min-h-50px"
                                        data-kt-inbox-form="bcc" style="display: none">
                                        <!--begin::Label-->
                                        <div class="text-dark fw-bold w-75px">Bcc:</div>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-transparent border-0"
                                            name="compose_bcc" value="" />
                                        <!--end::Input-->
                                        <!--begin::Close-->
                                        <span class="btn btn-clean btn-xs btn-icon" data-kt-inbox-form="bcc_close">
                                            <i class="la la-close"></i>
                                        </span>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::BCC-->
                                    <!--begin::Subject-->
                                    <div class="border-bottom">
                                        <input class="form-control form-control-transparent border-0 px-8 min-h-45px"
                                            name="compose_subject" placeholder="Subject" />
                                    </div>
                                    <!--end::Subject-->
                                    <!--begin::Message-->
                                    <div id="kt_inbox_form_editor" class="bg-transparent border-0 h-350px px-3">
                                        Hello,<br>{{ $inquiry->name }}</div>
                                    <textarea name="mail_body" style="display: none" id="mail_body_hidden" cols="30" rows="10"></textarea>
                                    <!--end::Message-->
                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center me-3">
                                        <!--begin::Send-->
                                        <div class="btn-group me-4">
                                            <!--begin::Submit-->
                                            {{-- <span class="btn btn-primary fs-bold px-6" data-kt-inbox-form="send">
                                                <span class="indicator-label">Send</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </span> --}}
                                            <button class="btn btn-primary fs-bold px-6" data-kt-inbox-form="send">
                                                {{-- <span class="indicator-label">Send</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span> --}}
                                                Send
                                            </button>
                                            <!--end::Submit-->
                                        </div>
                                        <!--end::Send-->
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Inbox App - Compose -->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@section('scripts')
    <!--begin::Custom Javascript(used by this page)-->
    <script src="{{ asset('assets_backend/js/custom/apps/inbox/compose.js') }}"></script>
    <script src="{{ asset('assets_backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets_backend/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets_backend/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets_backend/js/custom/intro.js') }}"></script>
    <script src="{{ asset('assets_backend/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets_backend/js/custom/utilities/modals/create-campaign.js') }}"></script>
    <script src="{{ asset('assets_backend/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
@endsection
