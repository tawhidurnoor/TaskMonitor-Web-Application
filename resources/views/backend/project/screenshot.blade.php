@extends('backend.layouts.full.mainlayout')

@section('head')
<title> Screenshots | Time Tracker Solution</title>
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
                                    <i class="fa fa-laptop" aria-hidden="true"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Screenshot</h2>
                                    <p>
                                        {{-- {{$staff->name}}'s Time Tracker History for the project
                                        <i>{{$project->title}}</i> --}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                            <div class="breadcomb-report">
                                {{-- <button class="btn" data-toggle="modal" data-target="#add_modal">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i> Add Proejct
                                </button> --}}
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

                    {{-- content goes here --}}
                    @foreach ($screenshots as $screenshot)
                        <div class="row">
                            <div class="col">
                                <img src="{{asset('captured/'.$screenshot->image)}}" alt="" srcset="">
                            </div>
                        </div>
                    @endforeach
                
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Table area End-->

@endsection

@section('scripts')
<!-- Data Table JS
		============================================ -->
<script src="{{asset('assets_backend/js/data-table/jquery.dataTables.min.js')}}">
</script>
<script src="{{asset('assets_backend/js/data-table/data-table-act.js')}}"></script>

@endsection