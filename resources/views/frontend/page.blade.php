@extends('frontend.layouts.full.frontend')

@section('title')
    <!-- Title  -->
    <title>{{ $page->title }} | TaskMonitor</title>
@endsection

@section('meta')
    @isset($page->meta_tags)
        {!! $page->meta_tags !!}
    @else
        {!! getMeta() !!}
    @endisset
@endsection

@section('body')
    <!--Contents-->
    <main class="about-page style-5">


        <!-- ====== start about ====== -->
        <section class="about section-padding style-4">
            <div class="integration">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-head text-center style-4">
                            <small class="title_small">{{ $page->title }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content frs-content">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        {!! $page->content !!}
                    </div>
                </div>
                <img src="{{ asset('assets_frontend/img/about/about_s4_lines.png') }}" alt="" class="lines">
                <img src="{{ asset('assets_frontend/img/about/about_s4_bubble.png') }}" alt="" class="bubble">
            </div>
        </section>
        <!-- ====== end about ====== -->


    </main>
    <!--End-Contents-->
@endsection
