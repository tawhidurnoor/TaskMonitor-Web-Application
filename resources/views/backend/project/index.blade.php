@extends('backend.layouts.full.mainlayout')

@section('head')
<title>{{$company->name}} - Project List | Time Tracker Solution</title>
@endsection

<!-- Data Table CSS
============================================ -->
<link rel="stylesheet" href="{{asset('assets_backend/css/jquery.dataTables.min.css')}}">


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
                                    <h2>Proejcts</h2>
                                    <p>Manage all <span class="bread-ntd">Projects</span> of
                                        <strong>{{$company->name}}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                <button class="btn" data-toggle="modal" data-target="#add_modal">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i> Add Proejct
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
                                    <th>Project Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td> {{$loop->index+1}} </td>
                                    <td> {{$project->title}} </td>
                                    <td style="width: 50%">
                                        {!! Str::limit($project->description, 150) !!}
                                    </td>
                                    <td>
                                        <div class="btn-list">
                                            <a href="{{route('project.details', $project->id)}}" class="btn btn-warning waves-effect">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                            </a>
                                            <button class="btn btn-info waves-effect edit-button"
                                                data-id="{{$project->id}}">
                                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                            </button>
                                            <button class="btn btn-danger waves-effect delete-button"
                                                data-id="{{$project->id}}">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
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
            <form action="{{route('project.store')}}" method="post">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="company_id" value="{{$company->id}}">

                    <div class="form-group">
                        <div class="nk-int-st">
                            <label for="title">Project Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Company Name"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="nk-int-st">
                            <label for="description">Project Description</label>
                            <textarea name="description" id="description" required></textarea>
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
    <div class="modal-dialog modal-large">
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
                            <label for="title">Project Title</label>
                            <input type="text" name="title" id="title_edit" class="form-control" placeholder="Company Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="nk-int-st">
                            <label for="description">Project Description</label>
                            <textarea name="description" id="description_edit" required></textarea>
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


{{-- CKEditor --}}
<script src="{{asset('assets_backend/ckeditor/ckeditor.js')}}"></script>

<script>
    // CKEDITOR.replace( 'description' );

    //for add
    var description = CKEDITOR.replace( 'description', {
        language: 'en',
        extraPlugins: 'notification'
    });
    
    description.on( 'required', function( evt ) {
        description.showNotification( 'This field is required.', 'warning' );
        evt.cancel();
    });


    //for edit
    var description_edit = CKEDITOR.replace( 'description_edit', {
    language: 'en',
    extraPlugins: 'notification'
    });
    
    description_edit.on( 'required', function( evt ) {
    description_edit.showNotification( 'This field is required.', 'warning' );
    evt.cancel();
    });
</script>

<script>
    $(document).on('click', '.delete-button', function(e) {
        e.preventDefault();
        $('#delete_modal').modal('show');
        var id = $(this).data('id');
        //$('#del_id').val(id);
        
        document.getElementById("delete_form").action = "./" + id;
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
            url: './show/' + id,
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $('#title_edit').val(response.title);
                description_edit.setData( response.description );
                //$('#description_edit').html(response.description);
            }
        });
        document.getElementById("edit_form").action = "./" + id;
    }
</script>

@endsection