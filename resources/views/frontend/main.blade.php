<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="//fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <title>{{ siteInfo()->title }}</title>
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
                                    <li data-menuanchor="home" class="active"><a href="#home"><i class="fa fa-home"></i> Home</a></li>
                                    <li data-menuanchor="about"><a href="#about"><i class="fa fa-user" aria-hidden="true"></i> About Me</a></li>
                                    <li data-menuanchor="services"><a href="#services"><i class="fa fa-building-o" aria-hidden="true"></i> Services</a></li>
                                    <li data-menuanchor="skill"><a href="#skill"><i class="fa fa-suitcase" aria-hidden="true"></i> My Skills</a></li>
                                    <li data-menuanchor="portfolios"><a href="#portfolios"><i class="fa fa-support" aria-hidden="true"></i> Portfolios</a></li>
                                    <li data-menuanchor="tesimonials"><a href="#tesimonials"><i class="fa fa-comment-o" aria-hidden="true"></i> Testimonials</a></li>
                                    <li data-menuanchor="contact"><a href="#contact"><i class="fa fa-phone"></i> Contact Me</a></li>
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
            <div class="section animated-row" data-section="home">
                <div class="section-inner">
                    <div class="welcome-box">
                        <span class="welcome-first animate" data-animate="fadeInUp">Hello, I Am</span>
                        <h1 class="welcome-title animate" data-animate="fadeInUp">{{ siteInfo()->title }}</h1>
                        <p class="animate" data-animate="fadeInUp">{{ siteInfo()->description }}</p>
                        <div class="mx-auto">
                            <div class="scroll-down next-section animate mx-auto" data-animate="fadeInUp"><img src="{{ asset('front/images/mouse-scroll.png') }}" alt=""><span>Scroll Down</span></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="section animated-row" data-section="about">
                <div class="section-inner">
                    <div class="about-section">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 wide-col-laptop">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="about-contentbox">
                                            <div class="animate" data-animate="fadeInUp">
                                                <span style="font-size:18px !important;">Who am i?</span>
                                                <h2>About Me </h2>
                                                <p>{{ $about->about }}</p>
                                            </div>
                                            <div class="facts-list owl-carousel">
                                                <div class="item animate" data-animate="fadeInUp">
                                                    <div class="counter-box">
                                                        <i class="fa fa-trophy counter-icon" aria-hidden="true"></i><span class="count-number">{{ $about->awards }}</span> Awards Won
                                                    </div>
                                                </div>
                                                <div class="item animate" data-animate="fadeInUp">
                                                    <div class="counter-box">
                                                        <i class="fa fa-graduation-cap counter-icon" aria-hidden="true"></i><span class="count-number">{{ $about->degrees }}</span> Degrees
                                                    </div>
                                                </div>
                                                <div class="item animate" data-animate="fadeInUp">
                                                    <div class="counter-box">
                                                        <i class="fa fa-desktop counter-icon" aria-hidden="true"></i><span class="count-number">{{ $about->experience_year }}</span> Experience Years
                                                    </div>
                                                </div>
                                                <div class="item animate" data-animate="fadeInUp">
                                                    <div class="counter-box">
                                                        <i class="fa fa-certificate counter-icon" aria-hidden="true"></i><span class="count-number">{{ $about->certificates }}</span> Certificates
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <figure class="about-img animate" data-animate="fadeInUp"><img width="500px" src="{{ asset('front/images/about/'.$about->image) }}" class="rounded" alt="{{ siteInfo()->title }}"></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section animated-row" data-section="services">
                <div class="section-inner">
                    <div class="row justify-content-center">
                        <div class="col-md-8 wide-col-laptop">
                            <div class="title-block animate" data-animate="fadeInUp">
                                <span style="font-size:18px !important;">What I Do?</span>
                                <h2>Services</h2>
                            </div>
                            <div class="services-section">
                                <div class="services-list owl-carousel">
                                    @foreach ($services as $service)
                                        <div class="item animate" data-animate="fadeInUp">
                                            <div class="service-box">
                                                <span class="service-icon"><i class="fa {{ $service->icon_name }}" aria-hidden="true"></i></span>
                                                <h3>{{ $service->service_name }}</h3>
                                                <p>{{ $service->summary }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section animated-row" data-section="skill">
                <div class="section-inner">
                    <div class="row justify-content-center">
                        <div class="col-md-7 wide-col-laptop">
                            <div class="title-block animate" data-animate="fadeInUp">
                                <span style="font-size:18px !important;">What i’m good?</span>
                                <h2>My Skills</h2>
                            </div>
                            <div class="skills-row animate" data-animate="fadeInDown">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        @foreach ($skills as $sItem)
                                            <div class="skill-item">
                                                <h6>{{ $sItem->name }}</h6>
                                                <div class="skill-bar">
                                                    <span>{{ $sItem->percentage.'%' }}</span>
                                                    <div class="filled-bar" style="width: {{ $sItem->percentage }}% !important;"></div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section animated-row" data-section="portfolios">
                <div class="section-inner">
                    <div class="row justify-content-center">
                        <div class="col-md-8 wide-col-laptop">
                            <div class="title-block animate" data-animate="fadeInUp">
                                <span style="font-size:18px !important;">Latest Work</span>
                                <h2>Portfolios</h2>
                            </div>
                            <div class="gallery-section">
                                <div class="gallery-list owl-carousel">
                                    @foreach ($portfolios as $portfolio)
                                            <div class="item animate" data-animate="fadeInUp">
                                                <div class="portfolio-item">
                                                    <a href="{{ route('frontendPort',$portfolio->slug) }}">
                                                        <div class="thumb">
                                                            <img src="{{ asset('image/portfolios').'/'.$portfolio->created_at->format('Y/m/').$portfolio->id.'/'.$portfolio->thumbnail }}" alt="{{ $portfolio->title }}" >
                                                        </div>
                                                        <div class="thumb-inner animate" data-animate="fadeInUp">
                                                            <p class="text-center text-muted">- Click for more details -</p>
                                                            <h4>{{ $portfolio->title }}</h4>
                                                            <p>{{ $portfolio->summary }}</p>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div>

                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <a href="#" class="btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section animated-row" data-section="tesimonials">
                <div class="section-inner">
                    <div class="row justify-content-center">
                        <div class="col-md-8 wide-col-laptop">
                            <div class="title-block animate" data-animate="fadeInUp">
                                <span style="font-size:18px !important;">what THEY SAY?</span>
                                <h2>TESTIMONIALS</h2>
                            </div>
                            <div class="col-md-8 offset-md-2">

                                    <div class="testimonials-section">

                                        <div class="testimonials-slider owl-carousel">
                                            @foreach ($testimonial as $testi)
                                            <div class="item animate" data-animate="fadeInUp">
                                                <div class="testimonial-item">
                                                    <div class="client-row">
                                                        <img src="{{ asset('front/images/testimonial/'.$testi->image) }}" class="rounded-circle" alt="profile 1">
                                                    </div>
                                                    <div class="testimonial-content">
                                                        <h4 class="pb-1 mb-0">{{ $testi->name }}</h4>
                                                        <span class="font-weight-bold">{{ $testi->designation }}</span>
                                                        <p>"{{ $testi->praise }}"</p>                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section animated-row" data-section="contact">
                <div class="section-inner">
                    <div class="row justify-content-center">
                        <div class="col-md-7 wide-col-laptop">
                            <div class="title-block animate" data-animate="fadeInUp">
                                <span style="font-size:18px !important;">Get In Touch!</span>
                                <h2>Contact</h2>
                            </div>
                            <div class="contact-section">
                                <div class="row">
                                    <div class="col-md-6 animate" data-animate="fadeInUp">
                                        <div class="contact-box">
                                            <div class="contact-row">
                                                <i class="fa fa-map-marker"></i> 123 New Street Here, Wonderful City 10220
                                            </div>
                                            <div class="contact-row">
                                                <i class="fa fa-phone"></i> 090 080 0210
                                            </div>
                                            <div class="contact-row">
                                                <i class="fa fa-envelope"></i> info@company.co
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 animate" data-animate="fadeInUp">
                                        <form id="ajax-contact" method="post" action="#">
                                            <div class="input-field">
                                                <input type="text" class="form-control" name="name" id="name" required placeholder="Name">
                                            </div>
                                            <div class="input-field">
                                                <input type="email" class="form-control" name="email" id="email" required placeholder="Email">
                                            </div>
                                            <div class="input-field">
                                                <textarea class="form-control" name="message" id="message" required placeholder="Message"></textarea>
                                            </div>
                                            <button class="btn" type="submit">Submit</button>
                                        </form>
                                        <div id="form-messages" class="mt-3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Social Start  --}}
        <div id="social-icons">
            <div class="text-right">
                <ul class="social-icons">
                    @foreach ($socials as $social)
                        <li>
                            <a href="{{ 'https://'.$social->socialSite->master_url.'/'.$social->url_name }}" target="_blank" title="{{ $social->socialSite->site_name }}"><i class="{{ $social->socialSite->site_icon }}"></i></a>
                        </li>
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
