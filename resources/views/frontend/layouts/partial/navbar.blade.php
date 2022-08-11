<!-- ====== start top navbar ====== -->
<div class="top-navbar style-4">
    <div class="container">
        <div class="content text-white">
            <span class="btn sm-butn bg-white py-0 px-2 me-2 fs-10px">
                <small class="fs-10px">Special</small>
            </span>
            <img src="{{ asset('assets_frontend/img/icons/nav_icon/imoj_heart.png') }}" alt="" class="icon-15">
            <span class="fs-10px op-6">Get </span>
            <small class="op-10 fs-10px">20% Discount</small>
            <span class="fs-10px op-6">Get for New Account</span>
            <a href="page-contact-5.html" class="fs-10px text-decoration-underline ms-2">Register Now</a>
        </div>
    </div>
</div>
<!-- ====== end top navbar ====== -->

<!-- ====== start navbar ====== -->
<nav class="navbar navbar-expand-lg navbar-light style-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('assets_backend/media/logos/' . get_logo()) }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 text-uppercase">

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        pages
                        <small class="hot alert-danger text-danger">hot</small>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <li><a class="dropdown-item" href="page-about-app.html">about</a></li>
                        <li><a class="dropdown-item" href="page-product-app.html">product</a></li>
                        <li><a class="dropdown-item" href="page-services-app.html">services</a></li>
                        <li><a class="dropdown-item" href="page-shop-app.html">shop</a></li>
                        <li><a class="dropdown-item" href="page-single-project-app.html">single project</a></li>
                        <li><a class="dropdown-item" href="page-single-post-app.html">single post</a></li>
                    </ul>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == '' ? 'active' : '' }}" href="{{ route('index') }}">
                        home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/">
                        blog
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'contact' ? 'active' : '' }}"
                        href="{{ route('contact.index') }}">
                        <img src="{{ asset('assets_frontend/img/icons/nav_icon/price.png') }}" alt=""
                            class="icon-15 me-1">
                        contact
                    </a>
                </li>
            </ul>
            <div class="nav-side">
                <div class="d-flex align-items-center">
                    @auth
                        <a href="{{ route('profile.index') }}" class="search-icon me-4">
                            <i class="bi bi-person"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn rounded-pill brd-gray hover-blue4 sm-butn fw-bold">
                            <span>Join TaskMonitor <i class="bi bi-arrow-right ms-1"></i> </span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- ====== end navbar ====== -->
