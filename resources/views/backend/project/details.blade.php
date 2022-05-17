@extends('backend.layouts.full.mainlayout')

@section('head')
<title>{{$project->title}} - {{$company->name}} | Time Tracker Solution</title>
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
                                    <i class="notika-icon notika-support"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>{{$project->title}} -Project details</h2>
                                    <p>Manage all <span class="bread-ntd">Staffs</span> of
                                        <strong>{{$project->title}}</strong>
                                    </p>
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
                                @foreach($project_staffs as $project_staff)
                                <tr>
                                    <td> {{$loop->index+1}} </td>
                                    <td>
                                        @if(isset($project_staff->staff->user->profile_picture))
                                        <img width="75px"
                                            src="{{asset('uploaded_files/profile_pictures/'.$project_staff->staff->user->profile_picture)}}"
                                            alt="{{$project_staff->staff->user->name}}" class="rounded">
                                        @else
                                        @if ($project_staff->staff->user->gender == 'Male')
                                        <img width="75px" src="{{asset('static_files/avatar_male_320x320.jpg')}}"
                                            alt="{{$project_staff->staff->user->name}}" class="rounded">
                                        @else
                                        <img width="75px" src="{{asset('static_files/avatar_female_320x320.jpg')}}"
                                            alt="{{$project_staff->staff->user->name}}" class="rounded">
                                        @endif
                                        @endif
                                    </td>
                                    <td> {{$project_staff->staff->user->name}} </td>
                                    <td> {{$project_staff->staff->user->email}} </td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="{{route('project.timeTracker', [$project->id , $project_staff->staff->staff_user_id])}}" class="btn btn-info waves-effect ">
                                                <i class="fa fa-info" aria-hidden="true"></i> Details
                                            </a>

                                            <button class="btn btn-danger waves-effect delete-button"
                                                data-id="{{$project_staff->id}}">
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

            <div class="modal-body">

                {{-- <h2>Add a company</h2> --}}

                <div class="table-responsive">
                    <table id="staff-table" class="table table-striped">
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
                            @foreach($all_staffs as $staff)
                            <form action="{{route('storeStaff')}}" method="post">
                                @csrf
                                <input type="hidden" name="staff_id" value="{{$staff->id}}">
                                <input type="hidden" name="project_id" value="{{$project->id}}">
                                <tr>
                                    <td> {{$loop->index+1}} </td>
                                    <td>
                                        @if(isset($staff->user->profile_picture))
                                        <img width="75px"
                                            src="{{asset('uploaded_files/profile_pictures/'.$staff->user->profile_picture)}}"
                                            alt="{{$staff->user->name}}" class="rounded">
                                        @else
                                        @if ($staff->user->gender == 'Male')
                                        <img width="75px" src="{{asset('static_files/avatar_male_320x320.jpg')}}"
                                            alt="{{$staff->user->name}}" class="rounded">
                                        @else
                                        <img width="75px" src="{{asset('static_files/avatar_female_320x320.jpg')}}"
                                            alt="{{$staff->user->name}}" class="rounded">
                                        @endif
                                        @endif
                                    </td>
                                    <td> {{$staff->user->name}} </td>
                                    <td> {{$staff->user->email}} </td>
                                    <td>
                                        <button class="btn btn-info waves-effect">
                                            Add
                                        </button>
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
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

{{-- <script>
    (function ($) {
    $(document).ready(function() {
    $('#staff-table').DataTable();
    });

    })(jQuery);
</script> --}}

<script>
    $(document).on('click', '.delete-button', function(e) {
        e.preventDefault();
        $('#delete_modal').modal('show');
        var id = $(this).data('id');
        //$('#del_id').val(id);

        document.getElementById("delete_form").action = "../../project_staff/" + id;
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
