@extends('frontend.layouts.full.frontend')

@section('title')
    <!-- Title  -->
    <title>TaskMonitor | Timetracking solution for your organization</title>
@endsection

@section('body')
    <!--Contents-->
    <main class="contact-page style-5">
        <!-- ====== start contact page ====== -->
        <section class="community section-padding style-5">
            <div class="container">
                <div class="section-head text-center style-4 mb-40">
                    <small class="title_small">Contact us</small>
                    <h2 class="mb-20">Get In <span> Touch </span> </h2>
                    <p>We will contact again after receive your request in 24h</p>
                </div>
                <div class="content rounded-pill">
                    <div class="commun-card">
                        <div class="icon icon-45">
                            <img src="assets_frontend/img/icons/mail3d.png" alt="">
                        </div>
                        <div class="inf">
                            <h5>contact@taskmonitor.xyz </h5>
                        </div>
                    </div>
                    <div class="commun-card">
                        <div class="icon icon-45">
                            <img src="assets_frontend/img/icons/map3d.png" alt="">
                        </div>
                        <div class="inf">
                            <h5>Motijheel, Dhaka</h5>
                        </div>
                    </div>
                    <div class="commun-card">
                        <div class="icon icon-45">
                            <img src="assets_frontend/img/icons/msg3d.png" alt="">
                        </div>
                        <div class="inf">
                            <h5>(+880) 1787 757 676</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact section-padding pt-0 style-6">
            <div class="container">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <form action="https://smartinnovates.com/items/iteck/html/contact.php" class="form"
                                method="post">
                                <p class="text-center text-danger fs-12px mb-30">The field is required mark as *</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-20">
                                            <input type="text" class="form-control" placeholder="Name *" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-20">
                                            <input type="text" class="form-control" placeholder="Email Address *"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-20">
                                            <input type="text" class="form-control" placeholder="Subject *" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea rows="10" class="form-control" placeholder="How can we help you?" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div class="form-check d-inline-flex mt-30 mb-30">
                                            <input class="form-check-input me-2 mt-0" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label small" for="flexCheckDefault">
                                                By submitting, i’m agreed to the <a href="#"
                                                    class="text-decoration-underline">Terms & Conditons</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <a href="#" class="btn rounded-pill bg-blue4 fw-bold text-white"
                                            target="_blank">
                                            <small> Send Your Request </small>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <img src="assets_frontend/img/icons/contact_a.png" alt="" class="contact_a">
                    <img src="assets_frontend/img/icons/contact_message.png" alt="" class="contact_message">
                </div>
            </div>
        </section>
        <!-- ====== end contact page ====== -->

        <!-- ====== start contact page ====== -->
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1826.3274314533771!2d90.4216712!3d23.7240161!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b851fe50e9e9%3A0xb331afe0da6dfab6!2sCodeCloud%20Technology!5e0!3m2!1sen!2sbd!4v1659956470867!5m2!1sen!2sbd"
                height="500" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <br><br><br>
        <!-- ====== start contact page ====== -->
    </main>
    <!--End-Contents-->
@endsection
