@extends('frontend.layouts.full.frontend')

@section('title')
    <!-- Title  -->
    <title>TaskMonitor | Timetracking solution for your organization</title>
@endsection

@section('body')
    <!-- ====== start header ====== -->
    <header class="style-4">
        <div class="content">
            <div class="container">
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <div class="info">
                            <small class="mb-50 title_small">TaskMonitor - Timetracking solution for your
                                organization</small>
                            <h1 class="mb-30">Easily <span> Track Your Employees </span> In One App </h1>
                            {{-- <p class="text">No coding required to make customizations. The live customizer <br> has
                                everything you need.</p> --}}
                            <div class="d-flex align-items-center mt-50">
                                <a href="https://www.apple.com/app-store/"
                                    class="btn rounded-pill bg-blue4 fw-bold text-white me-4" target="_blank">
                                    <small> <i class="fab fa-apple me-2 pe-2 border-end"></i> Download App </small>
                                </a>
                                <a href="https://youtu.be/pGbIOC83-So?t=21" data-lity class="play-btn">
                                    <span class="icon me-2">
                                        <i class="fas fa-play ms-1"></i>
                                    </span>
                                    <strong class="small">View <br> Promotion</strong>
                                </a>
                            </div>
                            <span class="mt-100 me-5">
                                <small
                                    class="icon-30 bg-gray rounded-circle color-blue4 d-inline-flex align-items-center justify-content-center me-1">
                                    <i class="fas fa-sync"></i>
                                </small>
                                <small class="text-uppercase">Free 14 Days Trial</small>
                            </span>
                            <span class="mt-100">
                                <small
                                    class="icon-30 bg-gray rounded-circle color-blue4 d-inline-flex align-items-center justify-content-center me-1">
                                    <i class="fas fa-credit-card"></i>
                                </small>
                                <small class="text-uppercase">One time payment</small>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="img">
                            <img src="assets_frontend/img/header/header_4.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <img src="assets_frontend/img/header/header_4_bubble.png" alt="" class="bubble">
        </div>
        <img src="assets_frontend/img/header/header_4_wave.png" alt="" class="wave">
    </header>
    <!-- ====== end header ====== -->

    <!--Contents-->
    <main>

        <!-- ====== start clients ====== -->
        <section class="clients style-4">
            <div class="container">
                <div class="text-center">
                    <h5 class="fw-bold mb-60"><span class="color-blue4">25K+ Installation</span> and Featured on</h5>
                </div>
                <div class="client-logos pb-70">
                    <div class="row align-items-center">
                        <div class="col-6 col-lg-2">
                            <a href="#" class="img d-block">
                                <img src="assets_frontend/img/logos/1.png" alt="">
                            </a>
                        </div>
                        <div class="col-6 col-lg-2">
                            <a href="#" class="img d-block">
                                <img src="assets_frontend/img/logos/2.png" alt="">
                            </a>
                        </div>
                        <div class="col-6 col-lg-2">
                            <a href="#" class="img d-block">
                                <img src="assets_frontend/img/logos/3.png" alt="">
                            </a>
                        </div>
                        <div class="col-6 col-lg-2">
                            <a href="#" class="img d-block">
                                <img src="assets_frontend/img/logos/4.png" alt="">
                            </a>
                        </div>
                        <div class="col-6 col-lg-2">
                            <a href="#" class="img d-block">
                                <img src="assets_frontend/img/logos/5.png" alt="">
                            </a>
                        </div>
                        <div class="col-6 col-lg-2">
                            <a href="#" class="img d-block">
                                <img src="assets_frontend/img/logos/6.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end clients ====== -->

        <!-- ====== start features ====== -->
        <section class="features pt-70 pb-70 style-4">
            <div class="container">
                <div class="section-head text-center style-4">
                    <small class="title_small bg-white">TaskMonitor - Timetracking solution for your organization</small>
                    <h2 class="mb-70">Awesome <span> Features </span> </h2>
                </div>
                <div class="content">
                    <div class="features-card">
                        <div class="icon img-contain">
                            <img src="assets_frontend/img/icons/fe1.png" alt="">
                        </div>
                        <h6>Track Employees <br> and Manage Workspace</h6>
                    </div>
                    <div class="features-card">
                        <div class="icon img-contain">
                            <img src="assets_frontend/img/icons/fe2.png" alt="">
                        </div>
                        <h6>Easy Sort, Classify <br> and Search</h6>
                    </div>
                    <div class="features-card">
                        <div class="icon img-contain">
                            <img src="assets_frontend/img/icons/fe3.png" alt="">
                            <span
                                class="label icon-40 alert-success text-success rounded-circle small text-uppercase fw-bold">
                                new
                            </span>
                        </div>
                        <h6>Collaboration and <br> Invite People</h6>
                    </div>
                    <div class="features-card">
                        <div class="icon img-contain">
                            <img src="assets_frontend/img/icons/fe4.png" alt="">
                        </div>
                        <h6>Quick Track <br> Everyone</h6>
                    </div>
                    <div class="features-card">
                        <div class="icon img-contain">
                            <img src="assets_frontend/img/icons/fe5.png" alt="">
                        </div>
                        <h6>Visually Pleasing <br> accross Devices</h6>
                    </div>
                </div>
            </div>
            <img src="assets_frontend/img/feat_circle.png" alt="" class="img-circle">
        </section>
        <!-- ====== end features ====== -->

        <!-- ====== start about ====== -->
        <section class="about section-padding style-4">
            <div class="content frs-content">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6">
                            <div class="img mb-30 mb-lg-0">
                                <img src="assets_frontend/img/about/ipad.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="info">
                                <div class="section-head style-4">
                                    <small class="title_small">TaskMonitor - Timetracking solution for your
                                        organization</small>
                                    <h2 class="mb-30">Perfect solution for <span> Employeers </span> </h2>
                                </div>
                                <p class="text mb-40">
                                    Easily track your employees. Track what they are doing, how much they are doing using
                                    our desktop application. Access your dashboard form anywhere.
                                </p>
                                <ul>
                                    <li class="d-flex align-items-center mb-3">
                                        <small
                                            class="icon-30 bg-gray rounded-circle color-blue4 d-inline-flex align-items-center justify-content-center me-3">
                                            <i class="fas fa-tag"></i>
                                        </small>
                                        <h6 class="fw-bold">Tracking employees and manage workspace.</h6>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <small
                                            class="icon-30 bg-gray rounded-circle color-blue4 d-inline-flex align-items-center justify-content-center me-3">
                                            <i class="fas fa-sync"></i>
                                        </small>
                                        <h6 class="fw-bold">Automatically upload screenshots in real time.</h6>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <small
                                            class="icon-30 bg-gray rounded-circle color-blue4 d-inline-flex align-items-center justify-content-center me-3">
                                            <i class="fas fa-text-width"></i>
                                        </small>
                                        <h6 class="fw-bold">Accessable from anywhere.</h6>
                                    </li>
                                </ul>
                                <a href="page-contact-5.html" class="btn rounded-pill bg-blue4 fw-bold text-white mt-50">
                                    <small> Free Register </small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="assets_frontend/img/about/about_s4_lines.png" alt="" class="lines">
                <img src="assets_frontend/img/about/about_s4_bubble.png" alt="" class="bubble">
            </div>
            <div class="content sec-content">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-5 order-2 order-lg-0">
                            <div class="info">
                                <div class="section-head style-4">
                                    <small class="title_small">Better Note Management</small>
                                    <h2 class="mb-30">Your Notes <span> Security </span> </h2>
                                </div>
                                <p class="text mb-40">
                                    Automatically syncs across all your devices. You can also access and write notes
                                    without internet connection.
                                </p>
                                <div class="faq style-3 style-4">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse1" aria-expanded="true"
                                                    aria-controls="collapse1">
                                                    Create and Save your notes with multi-media
                                                </button>
                                            </h2>
                                            <div id="collapse1" class="accordion-collapse collapse show"
                                                aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Images, videos, PDFs and audio files are supported. Create math
                                                    expressions and diagrams directly from the app. Take photos with the
                                                    mobile app and save them to a note.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading2">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse2"
                                                    aria-expanded="false" aria-controls="collapse2">
                                                    Web Clipper Extension
                                                </button>
                                            </h2>
                                            <div id="collapse2" class="accordion-collapse collapse"
                                                aria-labelledby="heading2" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Images, videos, PDFs and audio files are supported. Create math
                                                    expressions and diagrams directly from the app. Take photos with the
                                                    mobile app and save them to a note.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading3">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse3"
                                                    aria-expanded="false" aria-controls="collapse3">
                                                    Protect your note with lock
                                                </button>
                                            </h2>
                                            <div id="collapse3" class="accordion-collapse collapse"
                                                aria-labelledby="heading3" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    Images, videos, PDFs and audio files are supported. Create math
                                                    expressions and diagrams directly from the app. Take photos with the
                                                    mobile app and save them to a note.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="https://chrome.google.com/webstore/category/extensions"
                                    class="btn btn-img mt-40 rounded-pill" target="_blank">
                                    <div class="icon img-contain">
                                        <img src="assets_frontend/img/icons/chrome_icon.png" alt="">
                                    </div>
                                    <div class="inf">
                                        <small> Available in the </small>
                                        <h6>Chrome Web Store</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 order-0 order-lg-2">
                            <div class="img mb-30 mb-lg-0">
                                <img src="assets_frontend/img/about/2mobiles.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <img src="assets_frontend/img/about/about_s4_bubble2.png" alt="" class="bubble2">
            </div>
            <div class="content trd-content">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6">
                            <div class="img mb-30 mb-lg-0">
                                <img src="assets_frontend/img/about/about_s4_img3.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="info">
                                <div class="section-head style-4">
                                    <small class="title_small">Beautiful Themes</small>
                                    <h2 class="mb-30">Focus More With <span> Dark Theme </span> </h2>
                                </div>
                                <p class="text mb-40">
                                    Apply Notero’s elegant themes to your taste. Dark themes work excellently for those
                                    who prefer distraction-free mode.
                                </p>
                                <ul>
                                    <li class="d-flex align-items-center op-4">
                                        <i class="bi bi-dot fs-2 me-2 lh-1 color-blue4"></i>
                                        <h6 class="fw-bold">Filtering notes using matched keywords</h6>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-dot fs-2 me-2 lh-1 color-blue4"></i>
                                        <h6 class="fw-bold">8 Beautiful themes for you select</h6>
                                    </li>
                                    <li class="d-flex align-items-center op-4">
                                        <i class="bi bi-dot fs-2 me-2 lh-1 color-blue4"></i>
                                        <h6 class="fw-bold">Save energy for your device</h6>
                                    </li>
                                    <li class="d-flex align-items-center op-4">
                                        <i class="bi bi-dot fs-2 me-2 lh-1 color-blue4"></i>
                                        <h6 class="fw-bold">Easy to switch between light and dark mode</h6>
                                    </li>
                                </ul>
                                <a href="page-services-5.html" class="btn rounded-pill bg-blue4 fw-bold text-white mt-50">
                                    <small> Discovery Now </small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="assets_frontend/img/about/about_s4_bubble.png" alt="" class="bubble">
            </div>
            <div class="integration pt-60">
                <div class="section-head text-center style-4">
                    <small class="title_small">One-Time Payment</small>
                    <h2 class="mb-20">Integration With <span> Popular Apps </span> </h2>
                    <p>Notero intergrate with popular apps. Help you easy to connect and collaboration</p>
                </div>
                <div class="container">
                    <div class="content">
                        <div class="img">
                            <img src="assets_frontend/img/about/intg1.png" alt="" class="mt-30">
                        </div>
                        <div class="img">
                            <img src="assets_frontend/img/about/intg5.png" alt="" class="mt-60">
                        </div>
                        <div class="img">
                            <img src="assets_frontend/img/about/intg4.png" alt="" class="mt-20">
                        </div>
                        <div class="img">
                            <img src="assets_frontend/img/about/intg3.png" alt="" class="mt-80">
                        </div>
                        <div class="img">
                            <img src="assets_frontend/img/about/intg2.png" alt="">
                        </div>
                    </div>
                </div>
                <img src="assets_frontend/img/about/intg_back.png" alt="" class="intg-back">
            </div>
            <img src="assets_frontend/img/about/about_s4_wave.png" alt="" class="top-wave">
            <img src="assets_frontend/img/about/about_s4_wave.png" alt="" class="bottom-wave">
        </section>
        <!-- ====== end about ====== -->

        <!-- ====== start screenshots  ====== -->
        <div class="screenshots style-4">
            <div class="screenshots-slider style-4">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="assets_frontend/img/screenshots/1.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="assets_frontend/img/screenshots/2.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="assets_frontend/img/screenshots/3.jpg" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="assets_frontend/img/screenshots/4.png" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="assets_frontend/img/screenshots/5.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="assets_frontend/img/screenshots/hand.png" alt="" class="mob-hand">
        </div>
        <!-- ====== end screenshots  ====== -->

        <!-- ====== start testimonials ====== -->
        <section class="testimonials style-4 pt-70">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="section-head style-4">
                                <small class="title_small">Testimonials</small>
                                <h2 class="mb-30">Loved From <span> Customers </span> </h2>
                            </div>
                            <p class="text mb-40">
                                Notero loved from thoudsands customer worldwide and get trusted from big companies.
                            </p>
                            <div class="numbs">
                                <div class="num-card">
                                    <div class="icon img-contain">
                                        <img src="assets_frontend/img/icons/testi_s4_ic1.png" alt="">
                                    </div>
                                    <h2>2,5M+</h2>
                                    <p>Downloaded and <br> Installation</p>
                                </div>
                                <div class="num-card">
                                    <div class="icon img-contain">
                                        <img src="assets_frontend/img/icons/testi_s4_ic2.png" alt="">
                                    </div>
                                    <h2>4.8/5</h2>
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p>Based on 1,258 reviews</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-70">
                                <a href="https://www.apple.com/app-store/"
                                    class="btn rounded-pill bg-blue4 fw-bold text-white me-4" target="_blank">
                                    <small> See Reviews On App Store </small>
                                </a>
                                <a href="https://youtu.be/pGbIOC83-So?t=21" data-lity class="play-btn">
                                    <span class="icon me-2">
                                        <i class="fas fa-play ms-1"></i>
                                    </span>
                                    <strong class="small">View <br> Promotion</strong>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="testi-cards">
                                <div class="client_card">
                                    <div class="user_img">
                                        <img src="assets_frontend/img/testimonials/user4.png" alt="">
                                    </div>
                                    <div class="inf_content">
                                        <div class="stars mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6>
                                            “You can even send emails to Evernote and gather <br> all of the things you
                                            need in a single place.”
                                        </h6>
                                        <p>jurgen k. <span class="text-muted"> / Senior Marketing at
                                                <span>Brator</span> </span></p>
                                    </div>
                                </div>
                                <div class="client_card">
                                    <div class="user_img">
                                        <img src="assets_frontend/img/testimonials/user5.png" alt="">
                                    </div>
                                    <div class="inf_content">
                                        <div class="stars mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6>
                                            “Notero - 1st my choice for notes app. Awesome”
                                        </h6>
                                        <p>foden p. <span class="text-muted"> / Director at <span>Ecoland Resort</span>
                                            </span></p>
                                    </div>
                                </div>
                                <div class="client_card">
                                    <div class="user_img">
                                        <img src="assets_frontend/img/testimonials/user6.png" alt="">
                                    </div>
                                    <div class="inf_content">
                                        <div class="stars mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h6>
                                            “.This app is seriously good. It’s simple, clean and <br> a real joy to
                                            use.” </h6>
                                        <p>Kerry T. <span class="text-muted"> / Designer at <span>Teckzone Inc</span>
                                            </span></p>
                                    </div>
                                </div>
                                <img src="assets_frontend/img/contact_globe.svg" alt="" class="testi-globe">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end testimonials ====== -->

        <!-- ====== start pricing ====== -->
        <section class="pricing section-padding style-4 pb-50">
            <div class="container">
                <div class="section-head text-center style-4">
                    <small class="title_small">Pricing Plan</small>
                    <h2 class="mb-30"> Start With <span> Affordable Price </span> </h2>
                </div>
                <div class="content">
                    <div class="toggle_switch d-flex align-items-center justify-content-center mb-40">
                        <div class="form-check form-switch p-0">
                            <label class="form-check-label" for="flexSwitchCheckDefault"><small>Billed
                                    monthly</small></label>
                            <input class="form-check-input float-none bg-blue4" type="checkbox"
                                id="flexSwitchCheckDefault" checked>
                            <label class="form-check-label" for="flexSwitchCheckDefault"><small>Billed
                                    annually</small></label>
                        </div>
                    </div>
                    <div class="row gx-0">
                        <div class="col-lg-6">
                            <div class="price-card">
                                <div class="price-header pb-4">
                                    <h6> <img src="assets_frontend/img/icons/price_s4_1.png" alt=""
                                            class="icon">
                                        basic Plan </h6>
                                    <h2>Free <small> / month</small></h2>
                                    <p>Free 14 days trial, you can use over 20 basic features</p>
                                </div>
                                <div class="price-body py-4">
                                    <ul>
                                        <li class="d-flex align-items-center mb-3">
                                            <small
                                                class="icon-30 bg-blue4 rounded-circle text-white d-inline-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                                <i class="far fa-sticky-note"></i>
                                            </small>
                                            <p class="fw-bold">Write 5 Notes On Only iOS & Android</p>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                            <small
                                                class="icon-30 bg-blue4 rounded-circle text-white d-inline-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                                <i class="fas fa-paperclip"></i>
                                            </small>
                                            <p class="fw-bold">Add Attachments, Tables, Codes and More To Your Notes
                                            </p>
                                        </li>
                                        <li class="d-flex align-items-center mb-3 op-3">
                                            <small
                                                class="icon-30 bg-blue4 rounded-circle text-white d-inline-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                                <i class="fas fa-lock"></i>
                                            </small>
                                            <p class="fw-bold">Protect Your Notes and Notebooks With Lock</p>
                                        </li>
                                        <li class="d-flex align-items-center mb-3 op-3">
                                            <small
                                                class="icon-30 bg-blue4 rounded-circle text-white d-inline-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                                <i class="fas fa-undo"></i>
                                            </small>
                                            <p class="fw-bold">Focus Mode and Dark Theme</p>
                                        </li>
                                        <li class="d-flex align-items-center op-3">
                                            <small
                                                class="icon-30 bg-blue4 rounded-circle text-white d-inline-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                                <i class="fas fa-download"></i>
                                            </small>
                                            <p class="fw-bold">Export to Text, PDF, HTML and Markdown formats</p>
                                        </li>
                                    </ul>
                                    <a href="page-contact-5.html"
                                        class="btn rounded-pill hover-blue4 fw-bold mt-50 px-5 border-blue4">
                                        <small>Register Now </small>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="price-card">
                                <div class="price-header pb-4">
                                    <h6> <img src="assets_frontend/img/icons/price_s4_2.png" alt=""
                                            class="icon">
                                        premium Plan </h6>
                                    <h2>$29 <small> / month</small></h2>
                                    <p>Experience all premium features and only one-time payment</p>
                                </div>
                                <div class="price-body py-4">
                                    <ul>
                                        <li class="d-flex align-items-center mb-3">
                                            <small
                                                class="icon-30 bg-blue4 rounded-circle text-white d-inline-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                                <i class="far fa-sticky-note"></i>
                                            </small>
                                            <p class="fw-bold">Write 5 Notes On Only iOS & Android</p>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                            <small
                                                class="icon-30 bg-blue4 rounded-circle text-white d-inline-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                                <i class="fas fa-paperclip"></i>
                                            </small>
                                            <p class="fw-bold">Add Attachments, Tables, Codes and More To Your Notes
                                            </p>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                            <small
                                                class="icon-30 bg-blue4 rounded-circle text-white d-inline-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                                <i class="fas fa-lock"></i>
                                            </small>
                                            <p class="fw-bold">Protect Your Notes and Notebooks With Lock</p>
                                        </li>
                                        <li class="d-flex align-items-center mb-3">
                                            <small
                                                class="icon-30 bg-blue4 rounded-circle text-white d-inline-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                                <i class="fas fa-undo"></i>
                                            </small>
                                            <p class="fw-bold">Focus Mode and Dark Theme</p>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <small
                                                class="icon-30 bg-blue4 rounded-circle text-white d-inline-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                                <i class="fas fa-download"></i>
                                            </small>
                                            <p class="fw-bold">Export to Text, PDF, HTML and Markdown formats</p>
                                        </li>
                                    </ul>
                                    <a href="page-contact-5.html"
                                        class="btn rounded-pill bg-blue4 fw-bold text-white px-5 mt-50">
                                        <small>Register Now </small>
                                    </a>
                                </div>
                                <div class="off">
                                    <span>
                                        20% <br> off
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end pricing ====== -->

        <!-- ====== start faq ====== -->
        <section class="faq section-padding style-4 pt-50">
            <div class="container">
                <div class="section-head text-center style-4">
                    <small class="title_small">Frequently Asked Question</small>
                    <h2 class="mb-30"> Need A <span> Support? </span> </h2>
                </div>
                <div class="content">
                    <div class="faq style-3 style-4">
                        <div class="accordion" id="accordionSt4">
                            <div class="row gx-5">
                                <div class="col-lg-6">
                                    <div class="accordion-item border-bottom rounded-0">
                                        <h2 class="accordion-header" id="heading11">
                                            <button class="accordion-button collapsed rounded-0 py-4" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse11"
                                                aria-expanded="true" aria-controls="collapse11">
                                                How Benefit That I Got When Choose Basic Plan?
                                            </button>
                                        </h2>
                                        <div id="collapse11" class="accordion-collapse collapse rounded-0"
                                            aria-labelledby="heading11" data-bs-parent="#accordionSt4">
                                            <div class="accordion-body">
                                                Through the collaboration with customers in discussing needs and demand,
                                                we're able to attain <br> mutual understanding, gain customer trust to
                                                offer appropriate advice
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-bottom rounded-0">
                                        <h2 class="accordion-header" id="heading12">
                                            <button class="accordion-button py-4" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse12"
                                                aria-expanded="false" aria-controls="collapse12">
                                                How Do I Organize My Notes?
                                            </button>
                                        </h2>
                                        <div id="collapse12" class="accordion-collapse collapse show rounded-0"
                                            aria-labelledby="heading12" data-bs-parent="#accordionSt4">
                                            <div class="accordion-body">
                                                Through the collaboration with customers in discussing needs and demand,
                                                we're able to attain <br> mutual understanding, gain customer trust to
                                                offer appropriate advice
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-bottom rounded-0">
                                        <h2 class="accordion-header" id="heading13">
                                            <button class="accordion-button collapsed py-4" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse13"
                                                aria-expanded="false" aria-controls="collapse13">
                                                How Long For A Standard Project
                                            </button>
                                        </h2>
                                        <div id="collapse13" class="accordion-collapse collapse rounded-0"
                                            aria-labelledby="heading13" data-bs-parent="#accordionSt4">
                                            <div class="accordion-body">
                                                Through the collaboration with customers in discussing needs and demand,
                                                we're able to attain <br> mutual understanding, gain customer trust to
                                                offer appropriate advice
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-0 rounded-0">
                                        <h2 class="accordion-header" id="heading4">
                                            <button class="accordion-button collapsed rounded-0 py-4" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse4"
                                                aria-expanded="true" aria-controls="collapse4">
                                                How About Data Security & NDA Agreement
                                            </button>
                                        </h2>
                                        <div id="collapse4" class="accordion-collapse collapse rounded-0"
                                            aria-labelledby="heading4" data-bs-parent="#accordionSt4">
                                            <div class="accordion-body">
                                                Through the collaboration with customers in discussing needs and demand,
                                                we're able to attain <br> mutual understanding, gain customer trust to
                                                offer appropriate advice
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="accordion-item border-bottom rounded-0">
                                        <h2 class="accordion-header" id="heading5">
                                            <button class="accordion-button collapsed rounded-0 py-4" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse5"
                                                aria-expanded="true" aria-controls="collapse5">
                                                How Does Notero Store My Data?
                                            </button>
                                        </h2>
                                        <div id="collapse5" class="accordion-collapse collapse rounded-0"
                                            aria-labelledby="heading5" data-bs-parent="#accordionSt4">
                                            <div class="accordion-body">
                                                Through the collaboration with customers in discussing needs and demand,
                                                we're able to attain <br> mutual understanding, gain customer trust to
                                                offer appropriate advice
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-bottom rounded-0">
                                        <h2 class="accordion-header" id="heading6">
                                            <button class="accordion-button collapsed py-4" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse6"
                                                aria-expanded="false" aria-controls="collapse6">
                                                Does Notero Support Storing Data on iCloud?
                                            </button>
                                        </h2>
                                        <div id="collapse6" class="accordion-collapse collapse rounded-0"
                                            aria-labelledby="heading6" data-bs-parent="#accordionSt4">
                                            <div class="accordion-body">
                                                Through the collaboration with customers in discussing needs and demand,
                                                we're able to attain <br> mutual understanding, gain customer trust to
                                                offer appropriate advice
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-bottom rounded-0">
                                        <h2 class="accordion-header" id="heading7">
                                            <button class="accordion-button collapsed py-4" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse7"
                                                aria-expanded="false" aria-controls="collapse7">
                                                How Do I Change My Email or Password?
                                            </button>
                                        </h2>
                                        <div id="collapse7" class="accordion-collapse collapse rounded-0"
                                            aria-labelledby="heading7" data-bs-parent="#accordionSt4">
                                            <div class="accordion-body">
                                                Through the collaboration with customers in discussing needs and demand,
                                                we're able to attain <br> mutual understanding, gain customer trust to
                                                offer appropriate advice
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-bottom rounded-0">
                                        <h2 class="accordion-header" id="heading8">
                                            <button class="accordion-button collapsed rounded-0 py-4" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse8"
                                                aria-expanded="true" aria-controls="collapse8">
                                                Can My Premium License Be Used For All Devices?
                                            </button>
                                        </h2>
                                        <div id="collapse8" class="accordion-collapse collapse rounded-0"
                                            aria-labelledby="heading8" data-bs-parent="#accordionSt4">
                                            <div class="accordion-body">
                                                Through the collaboration with customers in discussing needs and demand,
                                                we're able to attain <br> mutual understanding, gain customer trust to
                                                offer appropriate advice
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item border-0 rounded-0">
                                        <h2 class="accordion-header" id="heading9">
                                            <button class="accordion-button collapsed rounded-0 py-4" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse9"
                                                aria-expanded="true" aria-controls="collapse9">
                                                Can I Lock My Note App?
                                            </button>
                                        </h2>
                                        <div id="collapse9" class="accordion-collapse collapse rounded-0"
                                            aria-labelledby="heading9" data-bs-parent="#accordionSt4">
                                            <div class="accordion-body">
                                                Through the collaboration with customers in discussing needs and demand,
                                                we're able to attain <br> mutual understanding, gain customer trust to
                                                offer appropriate advice
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end faq ====== -->

        <!-- ====== start community ====== -->
        <section class="community section-padding pt-0 style-4">
            <div class="container">
                <div class="section-head text-center style-4">
                    <small class="title_small">Notero Community</small>
                    <h2 class="mb-30"> Join Into <span> Our Hub </span> </h2>
                </div>
                <div class="content">
                    <a href="#" class="commun-card">
                        <div class="icon">
                            <i class="fab fa-github"></i>
                        </div>
                        <div class="inf">
                            <h5>Github</h5>
                            <p>Open Source & Commnit Code</p>
                        </div>
                    </a>
                    <a href="#" class="commun-card">
                        <div class="icon">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <div class="inf">
                            <h5>Twitter</h5>
                            <p>Latest News & Update</p>
                        </div>
                    </a>
                    <a href="#" class="commun-card">
                        <div class="icon">
                            <i class="fab fa-telegram"></i>
                        </div>
                        <div class="inf">
                            <h5>Telegram</h5>
                            <p>Chanel for Community</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- ====== end community ====== -->
    </main>
    <!--End-Contents-->
@endsection
