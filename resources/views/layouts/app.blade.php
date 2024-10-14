<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ========== Meta Tags ========== -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="modinatheme">
  <!-- ======== Page title ============ -->
  <title>{{ config('app.name') }}</title>
  <!-- ========== Favicon Icon ========== -->
  <link rel="shortcut icon" href="/assets/img/icons/logo-RSKK-2.ico">
  <!-- ===========  All Stylesheet ================= -->
  <!--  Icon css plugins -->
  <link rel="stylesheet" href="/assets/css/icons.css">
  <!--  animate css plugins -->
  <link rel="stylesheet" href="/assets/css/animate.css">
  <!--  slick css plugins -->
  <link rel="stylesheet" href="/assets/css/slick.css">
  <!--  magnific-popup css plugins -->
  <link rel="stylesheet" href="/assets/css/magnific-popup.css">
  <!-- metis menu css file -->
  <link rel="stylesheet" href="/assets/css/metismenu.css">
  <!-- select2 css file -->
  <link rel="stylesheet" href="/assets/css/nice-select2.css">
  <!--  Bootstrap css plugins -->
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <!--  main style css file -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <!-- template main style css file -->
  {{-- <link rel="stylesheet" href="style.css"> --}}


</head>

<body class="body-wrapper">

  {{-- alert success --}}
  @if (session('success'))
    <div class="position-fixed top-50 start-50 translate-middle p-2 text-center" style="z-index: 1050;">
      <div class="alert alert-success fade show" role="alert">
        <div class="m-3">
          <img src="/assets/img/check.png" alt="check" width="200">
        </div>
        <div class="m-3">
          <strong>{{ session('success') }}</strong>
        </div>
        <div class="m-3">
          <button type="button" class="btn btn-success btn-lg" data-bs-dismiss="alert" aria-label="Close">OK</button>
        </div>
      </div>
    </div>
  @endif

  @include('components.preloader')

  @include('components.top-bar')

  @include('components.nav')

  @yield('content')

  @include('components.footer')

  <!--  ALl JS Plugins
    ====================================== -->
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/modernizr.min.js"></script>
  <script src="/assets/js/jquery.easing.js"></script>
  <script src="/assets/js/popper.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/js/isotope.pkgd.min.js"></script>
  <script src="/assets/js/imageload.min.js"></script>
  <script src="/assets/js/scrollUp.min.js"></script>
  <script src="/assets/js/slick.min.js"></script>
  <script src="/assets/js/slick-animation.min.js"></script>
  <script src="/assets/js/magnific-popup.min.js"></script>
  <script src="/assets/js/wow.min.js"></script>
  <script src="/assets/js/metismenu.js"></script>
  <script src="/assets/js/nice-select2.js"></script>
  <script src="/assets/js/active.js"></script>
  <script src="/assets/js/app.js"></script>
</body>

</html>
