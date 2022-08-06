@extends('backend.layouts.full.mainlayout')

@section('body')
    <div class="content flex-column-fluid" id="kt_content">
        <div class="toolbar d-flex flex-stack flex-wrap mb-5 mb-lg-7" id="kt_toolbar">
            <div class="page-title d-flex flex-column py-1">
                <h1 class="d-flex align-items-center my-1">
                    <span class="text-dark fw-bolder fs-1">FAQs</span>
                </h1>
            </div>

            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                <a href="#" class="btn btn-flex btn-sm btn-primary fw-bolder border-0 fs-6 h-40px"
                    data-bs-toggle="modal" data-bs-target="#add_modal" id="kt_toolbar_primary_button">
                    Add a Faq
                </a>
                <!--end::Button-->
            </div>
        </div>
        <div class="post" id="kt_post">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <input type="text" data-kt-user-table-filter="search"
                                class="form-control form-control-solid w-950px ps-14" placeholder="Search user" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-user-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                                Selected</button>
                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-250px">Question</th>
                                <th class="min-w-150px">Answer</th>
                                <th class="min-w-150px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            @foreach ($faqs as $faq)
                                <tr>
                                    <td>
                                        {{ $faq->question }}
                                    </td>
                                    <th>
                                        <p>
                                            {{ $faq->answer }}
                                        </p>
                                    </th>
                                    <td>
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions

                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3 edit_button" data-id="{{ $faq->id }}">Edit</a>
                                                <a class="menu-link px-3 delete_button"
                                                    data-id="{{ $faq->id }}">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('modals')
    <!--begin::Modal - Edit Faq-->
    <div class="modal fade" id="add_modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
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
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form action="{{ route('faq.store') }}" method="POST" class="form">
                        @csrf
                        @method('post')
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Add Faq</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->


                        <div class="row mb-">
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <input type="text" name="question"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="Question">
                            </div>
                            <!--end::Col-->
                            <br>
                            <br>
                            <br>
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <textarea type="text" name="answer" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="Answer"></textarea>
                            </div>
                            <!--end::Col-->
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                Done
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Edit Faq-->

    <!--begin::Modal - Edit Faq-->
    <div class="modal fade" id="edit_modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
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
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form id="edit_form" method="POST" class="form">
                        @csrf
                        @method('put')
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Edit Faq</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->


                        <div class="row mb-">
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <input type="text" name="question" id="question"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="Question">
                            </div>
                            <!--end::Col-->
                            <br>
                            <br>
                            <br>
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <textarea type="text" name="answer" id="answer"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Answer"></textarea>
                            </div>
                            <!--end::Col-->
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Edit Faq-->



    <!--begin::Modal - Delete Faq-->
    <div class="modal fade" id="delete_modal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
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
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form id="delete_form" action="" method="POST" class="form">
                        @csrf
                        @method('delete')
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Are you sure want to delete this Faq?</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-danger">
                                <span class="indicator-label">Delete</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Delete Faq-->
@endsection


@section('scripts')
    <script src="{{ asset('assets_backend/js/custom/apps/user-management/users/list/table.js') }}"></script>
    <script src="{{ asset('assets_backend/js/custom/utilities/modals/users-search.js') }}"></script>

    <script>
        $(document).on('click', '.edit_button', function(e) {
            e.preventDefault();
            $('#edit_modal').modal('show');
            var id = $(this).data('id');
            getEditDetails(id);
        });

        function getEditDetails(id) {
            $.ajax({
                type: 'GET',
                url: 'faq/' + id,
                dataType: 'json',
                success: function(response) {
                    $('#question').val(response.question);
                    $('#answer').html(response.answer);
                }
            });
            document.getElementById("edit_form").action = "faq/" + id;
        }



        $(document).on('click', '.delete_button', function(e) {
            e.preventDefault();
            $('#delete_modal').modal('show');
            var id = $(this).data('id');
            document.getElementById("delete_form").action = "faq/delete/" + id;
        });
    </script>

    <script>
        document.getElementById("mac_address").addEventListener('keyup', function() {
            // remove non digits, break it into chunks of 2 and join with a colon
            this.value =
                (this.value.toUpperCase()
                    .replace(/[^\d|A-Z]/g, '')
                    .match(/.{1,2}/g) || [])
                .join("-")
        });
    </script>

    <script>
        document.getElementById("mac_address_no_ui").addEventListener('keyup', function() {
            // remove non digits, break it into chunks of 2 and join with a colon
            this.value =
                (this.value.toUpperCase()
                    .replace(/[^\d|A-Z]/g, '')
                    .match(/.{1,2}/g) || [])
                .join("-")
        });
    </script>
@endsection
