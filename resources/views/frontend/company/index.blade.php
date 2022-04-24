@extends('backend.layouts.full.mainlayout')

@section('head')
<title>Your Companies | Time Tracker Solution</title>
@endsection

<!-- Data Table CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">

@section('body')

<!-- Breadcomb area Start-->
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-support"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Companies</h2>
                                    <p>Manage all <span class="bread-ntd">Companies</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button class="btn" data-toggle="modal" data-target="#add_modal">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i> Add Company
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcomb area End-->
<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <!--
                        <div class="basic-tb-hd">
                        <h2>Basic Example</h2>
                        <p>It's just that simple. Turn your simple table into a sophisticated data table and offer your users a nice experience and great features without any effort.</p>
                    </div>
                    -->

                    @include('backend.layouts.partials.messages')
                    <br>

                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Logo</th>
                                    <th>Comany Name</th>
                                    <th>Owner/Creator</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                <tr>
                                    <td> {{$loop->index+1}} </td>
                                    <td>
                                        @if(isset($company->company_logo))
                                        <img width="75px"
                                            src="{{asset('uploaded_files/company_logos/'.$company->company_logo)}}"
                                            alt="{{$company->name}}" class="img-thumbnail">
                                        @else
                                        <img width="75px" src="{{asset('static_files/company_thumbnail.jpg')}}"
                                            alt="{{$company->name}}" class="img-thumbnail">
                                        @endif
                                    </td>
                                    <td> {{$company->name}} </td>
                                    <td> {{Auth::user()->name}} </td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="{{route('project.create', $company->id)}}"
                                                class="btn btn-primary notika-btn-info waves-effect">
                                                <i class="fa fa-plus-square" aria-hidden="true"></i> Add Project
                                            </a>
                                            <button class="btn btn-info notika-btn-info waves-effect edit-button" data-id="{{$company->id}}">
                                                <i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
                                            </button>
                                            <button class="btn btn-danger notika-btn-danger waves-effect delete-button"
                                                data-id="{{$company->id}}">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                            </button>
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
    </div>
</div>
<!-- Data Table area End-->

{{-- add modal --}}
<div class="modal fade" id="add_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    {{-- <h2>Add a company</h2> --}}

                    <div class="form-group">
                        <div class="nk-int-st">
                            <label for="name">Company Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Company Name"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="nk-int-st">
                            <label for="company_logo">Company Logo</label>
                            <input type="file" name="company_logo" id="company_logo" class="form-control-file"
                                placeholder="Company Logo">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- edit modal --}}
<div class="modal fade" id="edit_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" id="edit_form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    {{-- <h2>Add a company</h2> --}}

                    <div class="form-group">
                        <div class="nk-int-st">
                            <label for="name_edit">Company Name</label>
                            <input type="text" name="name" id="name_edit" class="form-control" placeholder="Company Name"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="nk-int-st">
                            <label for="company_logo">Company Logo</label>
                            <input type="file" name="company_logo" class="form-control-file"
                                placeholder="Company Logo">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- delete modal --}}
<div class="modal fade" id="delete_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="post" id="delete_form">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h2>Delete Entry?</h2>
                    <p>Are you sure to delete this entry? This Process can't be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Data Table JS
		============================================ -->
<script src="{{asset('assets/js/data-table/jquery.dataTables.min.js')}}">
</script>
<script src="{{asset('assets/js/data-table/data-table-act.js')}}"></script>

<script>
    $(document).on('click', '.delete-button', function(e) {
        e.preventDefault();
        $('#delete_modal').modal('show');
        var id = $(this).data('id');
        //$('#del_id').val(id);
        
        document.getElementById("delete_form").action = "company/" + id;
    });

    $(document).on('click', '.edit-button', function(e) {
        e.preventDefault();
        $('#edit_modal').modal('show');
        var id = $(this).data('id');
        //$('#del_id').val(id);
        getEditDetails(id)
    });

    function getEditDetails(id) {
        $.ajax({
            type: 'GET',
            url: 'company/' + id,
            dataType: 'json',
            success: function(response) {
                $('#name_edit').val(response.name);
            }
        });
        document.getElementById("edit_form").action = "company/" + id;
    }
</script>

@endsection