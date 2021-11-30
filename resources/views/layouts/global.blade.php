<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title') | SIMDA Stunting</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SCOPE MOBILE VERSION RESPONSIVE -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />

    <!-- SCOPE ADD TO HOMESCREEN AND THEME COLOR -->
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-title" content="SIMDA Stunting">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <!-- SCOPE COLOR FOR BROWSER CHROME, FIREFOX AND OPERA -->
    <meta name="theme-color" content="#F17127" />

    <!-- SCOPE BROWSER WINDOWS PHONE -->
    <meta name="msapplication-navbutton-color" content="#F17127">

    <!-- SCOPE BROWSER IOS, SAFARI BROWSER -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="HandheldFriendly" content="true" />

    <!-- SCOPE SHARE FACEBOOK -->
    <meta property="og:url" content="http://urlnya.com/"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="SIMDA Stunting"/>
    <meta property="og:description" content="SIMDA Stunting"/>
    <meta property="og:image" content="URL IMAGE WEBSITE"/>

    <!-- SCOPE SHARE TWITTER -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="apecsa"/>
    <meta name="twitter:title" content="SIMDA Stunting">
    <meta name="twitter:description" content="SIMDA Stunting"/>
    <meta name="twitter:creator" content="Fathan Rohman"/>
    <meta name="twitter:image:src" content="https://website.com/image250X250.png"/>
    <meta name="twitter:domain" content="website.com"/>

    <!-- SCOPE SHARE GOOGLE PLUS -->
    <meta itemprop="name" content="SIMDA Stunting"/>
    <meta itemprop="description" content="Apecsa Optima Solusi (ApecsaOS) Bergerak di jasa pembuatan aplikasi, e-gov, erp, custom software, mobile application"/>
    <meta itemprop="image" content="https://website.com/image250X250.png"/>

    <!-- SCOPE STLYESHEET -->
    <link rel="icon" type="image/ico" href="{{asset('user/images/logo/favicon.ico')}}"/>
    <link rel="stylesheet" href="{{asset('user/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/revolution-slider.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/main-responsive.css')}}">
      <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
      <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('plugins/ekko-lightbox/ekko-lightbox.css')}}">
  @yield('style')

    <script src="{{asset('user/js/jquery-3.1.0.min.js')}}"></script>
    <style>
        .navbar-nav > li{
            margin-left:4px;
            margin-right:4px;

            padding-left: 20px;
            padding-right: 20px;

            background-color: #FFC000
            }

        .navbar-nav > li > a {
            font-size: 12pt;
        }
    </style>
  </head>
  <body>
    <div class="apecsaos-wrapper">
      <!-- START SCOPE HEADER -->
      <!-- <header class="header-wrapper">
        <div class="container">
          <div class="box-header">
            <div class="introduce">
              <span>
                Selamat datang di SIMDA Stunting
              </span>
            </div>
            <div class="content">
              <ul>
                <li>
                  <div class="icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <span>admin@apecsa-indonesia.com</span>
                </li>
                <li>
                  <div class="icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <span>(021) 234 454</span>
                </li>
                <li>
                  <div class="icon">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <span>Cilandak, Jakarta Selatan</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header> -->
      <!-- END SCOPE HEADER -->

      <!-- START SCOPE NAVBAR BOOTSTRAP -->
      <div id="navbar-fixed-apecsaos"  style="background-color: #FFC000">
        <div class="container" style="background-color: #FFC000; padding-top: 10px">
            <div class="row">
               <div class="col-md-1 col-sm-1 col-xs-2">
                   <div style="margin: auto">
                    <img src="{{ asset('dist/img/logo-marowali.png') }}" alt="" class="img-responsive">
                </div>
               </div>
               <div class="col-md-11 col-sm-11 col-xs-10">
                   <h4>SISTEM INFORMASI MANAJEMEN DATA STUNTING</h4>
                   <h4>KABUPATEN MAROWALI</h4>
               </div>
            </div>
        </div>
        <div class="row">
        <nav class="navbar navbar-default" style="background-color: #356EB2">
          <div class="container">
            <div class="col-md-12">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-apecsaos" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">

                </a>
              </div>
              <div class="collapse navbar-collapse" id="navbar-apecsaos">
                <ul class="nav navbar-nav">
                  <li class="{{ Request::is('/') ? 'active' : '' }} panel">
                        <a href="/">HOME</a>
                    </li>
                  <li class="{{ Request::is('info-stunting') ? 'active' : '' }} panel"><a href="{{ route('info-stunting') }}">INFO STUNTING</a></li>
                  <li class="{{ Request::is('artikel') ? 'active' : '' }} panel"><a href="{{ route('artikel') }}">ARTIKEL</a></li>
                  <li class="{{ Request::is('galeri') ? 'active' : '' }} panel"><a href="{{ route('galeri') }}">GALERI</a></li>
                  @if (Auth::check())
                    <li class="{{ Request::is('file-opd') ? 'active' : '' }} panel"><a href="{{ route('file-odp') }}">DATA OPD</a></li>
                    <li class="{{ Request::is('aksi-integrasi') ? 'active' : '' }} panel"><a href="{{ route('aksi-integrasi') }}">AKSI INTEGRASI</a></li>
                  @endif

                </ul>
                <ul class="nav navbar-nav pull-right">
                    @if (Auth::check())
                    <li class="dropdown">
                        <a class="dropwown-toggle" data-toggle="dropdown" href="#">
                            <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle elevation-1" width="30" alt="{{ Auth::user()->name }}">
                        </a>
                        <ul class="dropdown-menu">
                            <li class="text-center"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                           <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <li class="text-center" > <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" style="color: black">
                                    Logout
                                    </a>
                                </li>
                            </form>
                        </ul>
                    </li>
                    @else
                        <li class="nav-item panel">
                            <a href="{{ url('login') }}" class="btn btn-sm bg-pink-red text-white">LOGIN</a>
                        </li>
                    @endif
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
      @yield('content')

      <!-- START SCOPE FOOTER -->
      <footer class="footer-wrapper diagonal-shadow" >
        <div class="container">
          <div class="col-md-12">
            <div class="box-footer">
              <div class="image">
                <img src="assets/images/logo/logo.png" alt="">
              </div>
              <div class="social-media">
                <a href="{{ Kontak::get()->facebook }}" class="btn btn-default btn-social-media facebook">
                  <i class="fab fa-facebook"></i>
                </a>
                <a href="{{ Kontak::get()->twitter }}" class="btn btn-default btn-social-media twitter">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="http://linkedin.com" class="btn btn-default btn-social-media linkedin">
                  <i class="fab fa-linkedin"></i>
                </a>
                <a href="{{ Kontak::get()->instagram }}" class="btn btn-default btn-social-media instagram">
                  <i class="fab fa-instagram"></i>
                </a>
              </div>
              <div class="corpyright">
                <span>&copy; Corpytight 2021 SIMDA Stunting</span><br>
                <span>Anything Is Possible</span>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- END SCOPE FOOTER -->
      <a href="" id="back-to-top" data-toggle="tooltip" data-placement="top" title="Back to top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>
  </body>

  <!-- SCOPE JAVASCRIPT -->
  <script src="{{asset('user/js/bootstrap.js')}}"></script>
  <script src="{{asset('user/js/jquery.scrolltofixed.js')}}"></script>
  <script src="{{asset('user/js/revolution.min.js')}}"></script>
  <script src="{{asset('user/js/wow.min.js')}}"></script>
  <script src="{{asset('user/js/owl.carousel.js')}}"></script>
  <script src="{{asset('user/js/wow.min.js')}}"></script>
  <script src="{{asset('user/js/jquery.scrollspeed.js')}}"></script>
  <script src="{{asset('user/js/main.js')}}"></script>
  <!-- Ekko Lightbox -->
<script src="{{asset('plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
  <script>
    (function($) {

      "use strict";

      //Main Slider
      if($('.slider-apecsa .tp-banner').length){
        jQuery('.slider-apecsa .tp-banner').show().revolution({
          delay:10000,
          startwidth:1200,
          startheight:620,
          hideThumbs:600,

          thumbWidth:80,
          thumbHeight:50,
          thumbAmount:5,

          navigationType:"bullet",
          navigationArrows:"0",
          navigationStyle:"preview4",

          touchenabled:"on",
          onHoverStop:"off",

          swipe_velocity: 0.7,
          swipe_min_touches: 1,
          swipe_max_touches: 1,
          drag_block_vertical: false,

          parallax:"mouse",
          parallaxBgFreeze:"on",
          parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

          keyboardNavigation:"off",

          navigationHAlign:"center",
          navigationVAlign:"bottom",
          navigationHOffset:0,
          navigationVOffset:20,

          soloArrowLeftHalign:"left",
          soloArrowLeftValign:"center",
          soloArrowLeftHOffset:20,
          soloArrowLeftVOffset:0,

          soloArrowRightHalign:"right",
          soloArrowRightValign:"center",
          soloArrowRightHOffset:20,
          soloArrowRightVOffset:0,

          shadow:0,
          fullWidth:"on",
          fullScreen:"off",

          spinner:"spinner4",

          stopLoop:"off",
          stopAfterLoops:-1,
          stopAtSlide:-1,

          shuffle:"off",

          autoHeight:"off",
          forceFullWidth:"on",

          hideThumbsOnMobile:"on",
          hideNavDelayOnMobile:1500,
          hideBulletsOnMobile:"on",
          hideArrowsOnMobile:"on",
          hideThumbsUnderResolution:0,

          hideSliderAtLimit:0,
          hideCaptionAtLimit:0,
          hideAllCaptionAtLilmit:0,
          startWithSlide:0,
          videoJsPath:"",
          fullScreenOffsetContainer: ".slider-apecsa"
        });
      }

    })(window.jQuery);
  </script>
  <script>
    $(document).ready(function() {

      var owl = $("#owl-slide-testimonial");

      owl.owlCarousel({
          items : 2, //10 items above 1000px browser width
          itemsDesktop : [1000,2], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,2], // betweem 900px and 601px
          itemsTablet: [600,1], //2 items between 600 and 0
          itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      });

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
    });
  </script>
</html>
