<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <title> @if($portfolio->title) {{ $portfolio->title.' |' }} @endif  {{ siteInfo()->title }}</title>
<!--
Elegance Template
https://templatemo.com/tm-528-elegance
-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/font-awesome.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/fullpage.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/owl.carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/templatemo-style.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <link rel="icon" href="{{ asset('front/images/site-icon/'.siteInfo()->icon) }}">

    </head>

    <body>

    <div id="video">
        <div class="preloader">
            <div class="preloader-bounce">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <header id="header">
            <div class="container-fluid">
                <div class="navbar">
                    <a href="{{ route('frontend') }}" id="logo" title="{{ siteInfo()->title }}">
                        <img width="80px" src="{{ asset('front/images/site-logo/'.siteInfo()->logo) }}" alt="{{ siteInfo()->title }}">
                    </a>
                    <div class="navigation-row">
                        <nav id="navigation">
                            <button type="button" class="navbar-toggle"> <i class="fa fa-bars"></i> </button>
                            <div class="nav-box navbar-collapse">
                                <ul class="navigation-menu nav navbar-nav navbars" id="nav">
                                    <li><a href="{{ route('frontend') }}/#home"><i class="fa fa-home"></i> Home</a></li>
                                    <li><a href="{{ route('frontend') }}/#about"><i class="fa fa-user" aria-hidden="true"></i> About Me</a></li>
                                    <li><a href="{{ route('frontend') }}/#services"><i class="fa fa-building-o" aria-hidden="true"></i> Services</a></li>
                                    <li><a href="{{ route('frontend') }}/#skill"><i class="fa fa-suitcase" aria-hidden="true"></i> My Skills</a></li>
                                    <li><a href="{{ route('frontend') }}/#portfolios"><i class="fa fa-support" aria-hidden="true"></i> Portfolios</a></li>
                                    <li><a href="{{ route('frontend') }}/#tesimonials"><i class="fa fa-comment-o" aria-hidden="true"></i> Testimonials</a></li>
                                    <li><a href="{{ route('frontend') }}/#contact"><i class="fa fa-phone"></i> Contact Me</a></li>
                                    @auth
                                        <li><a target="_blank" href="{{ route('dashboard') }}"><i class="fa fa-sign-in"></i> Dashboard</a></li>
                                    @else
                                        <li><a target="_blank" href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Sign In</a></li>
                                    @endauth
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <video autoplay muted loop id="myVideo">
          <source src="{{ asset('front/video/background-video/'.siteInfo()->backgroundVideo) }}" type="video/mp4">
        </video>
        <div id="fullpage" class="fullpage-default">
            @yield('content')
        </div>
        {{-- Social Start  --}}
        <div id="social-icons">
            <div class="text-right">
                <ul class="social-icons">
                    @foreach ($socials as $social)
                    <li><a href="{{ 'https://'.$social->socialSite->master_url.'/'.$social->url_name }}" target="_blank" title="{{ $social->socialSite->site_name }}"><i class="{{ $social->socialSite->site_icon }}"></i></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        {{-- Social end  --}}
    </div>
    <script src="{{ asset('front/js/jquery.js') }}"></script>

    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('front/js/fullpage.min.js') }}"></script>

    <script src="{{ asset('front/js/scrolloverflow.js') }}"></script>

    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('front/js/jquery.inview.min.js') }}"></script>

    <script src="{{ asset('front/js/form.js') }}"></script>

    <script src="{{ asset('front/js/custom.js') }}"></script>
  </body>
</html>

