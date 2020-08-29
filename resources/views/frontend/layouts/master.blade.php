<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link href="{{ asset('apple-touch-icon.png') }}" rel="apple-touch-icon">
  <link href="{{ asset('favicon.png') }}" rel="icon">
  <meta name="author" content="Nghia Minh Luong">
  <meta name="keywords" content="Default Description">
  <meta name="description" content="Default keyword">
  <title>Ecommerce - Laravel</title>
  <!-- Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/ps-icon/style.css') }}">
  <!-- CSS Library-->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/owl-carousel/assets/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/Magnific-Popup/dist/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/revolution/css/settings.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/revolution/css/layers.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/revolution/css/navigation.css') }}">
  <!-- Custom-->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

  @yield('styles')

</head>
<body class="ps-loading">
  <div class="header--sidebar"></div>

  @include('frontend.partials._header')

  <div class="header-services">
    <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
      <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
      <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
      <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with Sky Store</p>
    </div>
  </div>
  <main class="ps-main">

    {{-- @include('frontend.partials._slider') --}}

    <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
      <div class="ps-container">

        @yield('content')

      </div>
    </div>

    @include('frontend.partials._footer')
  </main>

  <!-- JS Library-->
  <script type="text/javascript" src="{{ asset('frontend/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/gmap3.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/imagesloaded.pkgd.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/isotope.pkgd.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/jquery.matchHeight-min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/slick/slick/slick.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
  <!-- Custom scripts-->
  <script type="text/javascript" src="{{ asset('frontend/js/main.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('frontend/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>

  @yield('scripts')

</body>
</html>