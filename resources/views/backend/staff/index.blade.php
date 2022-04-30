@extends('backend.layouts.full.mainlayout')

@section('head')
<title>{{$company->name}} - All Staffs | Time Tracker Solution</title>
@endsection

<!-- Data Table CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets_backend/css/jquery.dataTables.min.css')}}">

<style>
    .nk-int-st input[type="email"] {
    box-shadow: none;
    border-top: 0px solid #ccc;
    border-left: 0px solid #ccc;
    border-right: 0px solid #ccc;
    border-bottom: 1px solid #ccc;
    padding: 0px;
    resize: none;
    border-radius: 0px;
    }
</style>

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
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Staffs</h2>
                                    <p>Manage all <span class="bread-ntd">Staffs</span> of <strong>{{$company->name}}</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button class="btn" data-toggle="modal" data-target="#add_modal">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i> Add Staff
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
                                    <th>Picture</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staffs as $staff)
                                <tr>
                                    <td> {{$loop->index+1}} </td>
                                    <td>
                                        @if(isset($staff->user->profile_picture))
                                        <img width="75px"
                                            src="{{asset('uploaded_files/profile_pictures/'.$staff->user->profile_picture)}}"
                                            alt="{{$staff->user->name}}" class="rounded">
                                        @else
                                            @if ($staff->user->gender == 'Male')
                                                <img width="75px" src="{{asset('static_files/avatar_male_320x320.jpg')}}" alt="{{$staff->user->name}}" class="rounded">
                                            @else
                                                <img width="75px" src="{{asset('static_files/avatar_female_320x320.jpg')}}" alt="{{$staff->user->name}}" class="rounded">
                                            @endif
                                        @endif
                                    </td>
                                    <td> {{$staff->user->name}} </td>
                                    <td> {{$staff->user->email}} </td>
                                    <td>
                                        <div class="btn-list">
                                            <button class="btn btn-info notika-btn-info waves-effect edit-button"
                                                data-id="{{$staff->id}}">
                                                <i class="fa fa-pencil-square" aria-hidden="true"></i> Edit
                                            </button>
                                            <button class="btn btn-danger notika-btn-danger waves-effect delete-button"
                                                data-id="{{$staff->id}}">
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
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('staff.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    {{-- <h2>Add a company</h2> --}}

                    <div class="form-element-list">
                        <div class="row">
                            
                            <input type="hidden" name="company_id" value="{{$company->id}}">

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <div class="nk-int-st">
                                        <input type="text" name="name" class="form-control input-sm" placeholder="Enter Staff's Name" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label>Email Address *</label>
                                    <div class="nk-int-st">
                                        <input type="email" name="email" class="form-control input-sm" placeholder="Enter Email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label>Gender *</label>
                                    <div class="nk-int-st">
                                        <select name="gender" id="" class="form-control" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <label>Password *</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <label>Confirm Password *</label>
                                        <input type="password" name="confirm_password" class="form-control" placeholder="Reenter Pasword" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <label for="company_logo">Staff Picture</label>
                                        <input type="file" name="profile_picture" class="form-control-file" placeholder="Company Logo">
                                    </div>
                                </div>
                            </div>
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
                            <input type="text" name="name" id="name_edit" class="form-control"
                                placeholder="Company Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="nk-int-st">
                            <label for="company_logo">Company Logo</label>
                            <input type="file" name="company_logo" class="form-control-file" placeholder="Company Logo">
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
<script src="{{asset('assets_backend/js/data-table/jquery.dataTables.min.js')}}">
</script>
<script src="{{asset('assets_backend/js/data-table/data-table-act.js')}}"></script>

<script>
    $(document).on('click', '.delete-button', function(e) {
        e.preventDefault();
        $('#delete_modal').modal('show');
        var id = $(this).data('id');
        //$('#del_id').val(id);
        
        document.getElementById("delete_form").action = "../staff/" + id;
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