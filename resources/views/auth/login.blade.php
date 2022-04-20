<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login Register | Notika - Notika Admin Template</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="assets_backend/css/bootstrap.min.css">
  <!-- font awesome CSS
		============================================ -->
  <link rel="stylesheet" href="assets_backend/css/font-awesome.min.css">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="assets_backend/css/owl.carousel.css">
  <link rel="stylesheet" href="assets_backend/css/owl.theme.css">
  <link rel="stylesheet" href="assets_backend/css/owl.transitions.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="assets_backend/css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="assets_backend/css/normalize.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="assets_backend/css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- wave CSS
		============================================ -->
  <link rel="stylesheet" href="assets_backend/css/wave/waves.min.css">
  <!-- Notika icon CSS
		============================================ -->
  <link rel="stylesheet" href="assets_backend/css/notika-custom-icon.css">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="assets_backend/css/main.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="assets_backend/css/style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="assets_backend/css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="assets_backend/js/vendor/modernizr-2.8.3.min.js"></script>

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
</head>

<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
  <!-- Login Register area Start-->
  <div class="login-content">
    <!-- Login -->
    <div class="nk-block toggled" id="l-login">

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="nk-form">
          <div class="input-group">
            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
            <div class="nk-int-st">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              @error('email')
              <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="input-group mg-t-15">
            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
            <div class="nk-int-st">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" placeholder="Password" required autocomplete="current-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="fm-checkbox">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked'
              : '' }}> <label for="#remember"> Keep me signed in</label>
            {{-- <label><input type="checkbox" class="i-checks" name="remember" id="remember" {{ old('remember')
                ? 'checked' : '' }}> <i></i> Keep me signed in</label> --}}
          </div>
          <button type="submit" class="btn btn-login btn-success btn-float">
            <i class="notika-icon notika-right-arrow right-arrow-ant"></i>
          </button>
          {{-- <a href="#l-register" data-ma-action="nk-login-switch" data-ma-block="#l-register"
            class="btn btn-login btn-success btn-float"><i
              class="notika-icon notika-right-arrow right-arrow-ant"></i></a> --}}
        </div>
      </form>

      <div class="nk-navigation nk-lg-ic">
        <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i
            class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
        <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot
            Password</span></a>
      </div>
    </div>

    <!-- Register -->
    <div class="nk-block" id="l-register">

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="nk-form">
          <div class="input-group">
            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
            <div class="nk-int-st">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="input-group mg-t-15">
            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
            <div class="nk-int-st">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="input-group mg-t-15">
            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
            <div class="nk-int-st">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" placeholder="Password" required autocomplete="new-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="input-group mg-t-15">
            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
            <div class="nk-int-st">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                placeholder="Confirm Password" required autocomplete="new-password">
            </div>
          </div>

          <a href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login"
            class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a>
        </div>
      </form>

      <div class="nk-navigation rg-ic-stl">
        <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i
            class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
        <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot
            Password</span></a>
      </div>
    </div>

    <!-- Forgot Password -->
    <div class="nk-block" id="l-forget-password">
      <div class="nk-form">
        <p class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur
          commodo
          lorem fringilla enim feugiat commodo sed ac lacus.</p>

        <div class="input-group">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
          <div class="nk-int-st">
            <input type="text" class="form-control" placeholder="Email Address">
          </div>
        </div>

        <a href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login"
          class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a>
      </div>

      <div class="nk-navigation nk-lg-ic rg-ic-stl">
        <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i
            class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
        <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i
            class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
      </div>
    </div>
  </div>
  <!-- Login Register area End-->
  <!-- jquery
		============================================ -->
  <script src="assets_backend/js/vendor/jquery-1.12.4.min.js"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="assets_backend/js/bootstrap.min.js"></script>
  <!-- wow JS
		============================================ -->
  <script src="assets_backend/js/wow.min.js"></script>
  <!-- price-slider JS
		============================================ -->
  <script src="assets_backend/js/jquery-price-slider.js"></script>
  <!-- owl.carousel JS
		============================================ -->
  <script src="assets_backend/js/owl.carousel.min.js"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="assets_backend/js/jquery.scrollUp.min.js"></script>
  <!-- meanmenu JS
		============================================ -->
  <script src="assets_backend/js/meanmenu/jquery.meanmenu.js"></script>
  <!-- counterup JS
		============================================ -->
  <script src="assets_backend/js/counterup/jquery.counterup.min.js"></script>
  <script src="assets_backend/js/counterup/waypoints.min.js"></script>
  <script src="assets_backend/js/counterup/counterup-active.js"></script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="assets_backend/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- sparkline JS
		============================================ -->
  <script src="assets_backend/js/sparkline/jquery.sparkline.min.js"></script>
  <script src="assets_backend/js/sparkline/sparkline-active.js"></script>
  <!-- flot JS
		============================================ -->
  <script src="assets_backend/js/flot/jquery.flot.js"></script>
  <script src="assets_backend/js/flot/jquery.flot.resize.js"></script>
  <script src="assets_backend/js/flot/flot-active.js"></script>
  <!-- knob JS
		============================================ -->
  <script src="assets_backend/js/knob/jquery.knob.js"></script>
  <script src="assets_backend/js/knob/jquery.appear.js"></script>
  <script src="assets_backend/js/knob/knob-active.js"></script>
  <!--  Chat JS
		============================================ -->
  <script src="assets_backend/js/chat/jquery.chat.js"></script>
  <!--  wave JS
		============================================ -->
  <script src="assets_backend/js/wave/waves.min.js"></script>
  <script src="assets_backend/js/wave/wave-active.js"></script>
  <!-- icheck JS
		============================================ -->
  <script src="assets_backend/js/icheck/icheck.min.js"></script>
  <script src="assets_backend/js/icheck/icheck-active.js"></script>
  <!--  todo JS
		============================================ -->
  <script src="assets_backend/js/todo/jquery.todo.js"></script>
  <!-- Login JS
		============================================ -->
  <script src="assets_backend/js/login/login-action.js"></script>
  <!-- plugins JS
		============================================ -->
  <script src="assets_backend/js/plugins.js"></script>
  <!-- main JS
		============================================ -->
  <script src="assets_backend/js/main.js"></script>
</body>

</html>