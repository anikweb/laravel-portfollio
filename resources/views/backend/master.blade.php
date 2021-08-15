<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Title -->
        <title>
            @if (Route::is('dashboard')) Dashboard @elseif(Route::is('siteSettings')) Site Settings @elseif(Route::is('siteSettingsEdit')) Edit Site Settings @elseif(Route::is('aboutSettings')) About @elseif(Route::is('aboutSettingsEdit')) Edit About @elseif(Route::is('testimonialView')) Testimonials @elseif(Route::is('testimonialAdd')) Add Testimonial @elseif(Route::is('testimonialEdit')) Edit Testimonial @elseif(Route::is('skillView')) Skills @elseif(Route::is('skillAdd')) Add Skill @elseif(Route::is('skillEdit')) Edit Skill @elseif(Route::is('SocialView')) Socials @elseif(Route::is('SocialEdit')) Edit Social @elseif(Route::is('SocialAdd')) Add Social @endif | {{ siteinfo()->title }}</title>

        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="stacks" />

        <!-- Styles -->
        <link href="{{ asset('backend/plugins/pace-master/themes/blue/pace-theme-flash.css') }}" rel="stylesheet"/>
        <link href="{{ asset('backend/plugins/uniform/css/default.css') }}" rel="stylesheet"/>
        <link href="{{ asset('backend/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/plugins/line-icons/simple-line-icons.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/plugins/offcanvasmenueffects/css/menu_cornerbox.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/plugins/waves/waves.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/plugins/3d-bold-navigation/css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/plugins/slidepushmenus/css/component.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/plugins/weather-icons-master/css/weather-icons.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>

        <!-- Theme Styles -->
        <link href="{{ asset('backend/css/meteor.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/css/layers/dark-layer.css') }}" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="{{ asset('front/images/site-icon/'.siteInfo()->icon) }}">

        <script src="{{ asset('backend/plugins/3d-bold-navigation/js/modernizr.js') }}"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="compact-menu">
        <div class="overlay"></div>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
            <h3><span class="pull-left">Messages</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="icon-close"></i></a></h3>
            <div class="slimscroll">
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('backend/images/avatar2.png') }}" alt=""><span>Michael Lewis<small>Nice to meet you</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('backend/images/avatar3.png') }}" alt=""><span>John Doe<small>Nice to meet you</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('backend/images/avatar4.png') }}" alt=""><span>Emma Green<small>Nice to meet you</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('backend/images/avatar5.png') }}" alt=""><span>Nick Doe<small>Nice to meet you</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('backend/images/avatar2.png') }}" alt=""><span>Michael Lewis<small>Nice to meet you</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('backend/images/avatar3.png') }}" alt=""><span>John Doe<small>Nice to meet you</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('backend/images/avatar4.png') }}" alt=""><span>Emma Green<small>Nice to meet you</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="{{ asset('backend/images/avatar5.png') }}" alt=""><span>Nick Doe<small>Nice to meet you</small></span></a>
            </div>
		</nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
            <h3><span class="pull-left">Michael Lewis</span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
            <div class="slimscroll chat">
                <div class="chat-item chat-item-left">
                    <div class="chat-image">
                        <img src="{{ asset('backend/images/avatar2.png') }}" alt="">
                    </div>
                    <div class="chat-message">
                        Duis aute irure dolor?
                    </div>
                </div>
                <div class="chat-item chat-item-right">
                    <div class="chat-message">
                        Lorem ipsum dolor sit amet, dapibus quis, laoreet et.
                    </div>
                </div>
                <div class="chat-item chat-item-left">
                    <div class="chat-image">
                        <img src="{{ asset('backend/images/avatar2.png') }}" alt="">
                    </div>
                    <div class="chat-message">
                        Ut ullamcorper, ligula.
                    </div>
                </div>
                <div class="chat-item chat-item-right">
                    <div class="chat-message">
                        In hac habitasse platea dict umst. ligula eu tempor eu id tincidunt.
                    </div>
                </div>
                <div class="chat-item chat-item-left">
                    <div class="chat-image">
                        <img src="{{ asset('backend/images/avatar2.png') }}" alt="">
                    </div>
                    <div class="chat-message">
                        Curabitur pretium?
                    </div>
                </div>
                <div class="chat-item chat-item-right">
                    <div class="chat-message">
                        Etiam tempor. Ut tempor! ull amcorper.
                    </div>
                </div>
            </div>
            <div class="chat-write">
                <form class="form-horizontal" action="javascript:void(0);">
                    <input type="text" class="form-control" placeholder="Say something">
                </form>
            </div>
		</nav>
        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search" type="button"><i class="icon-close"></i></button>
                </span>
            </div><!-- Input Group -->
        </form><!-- Search Form -->
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button push-sidebar">
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="{{ route('dashboard') }}" class="logo-text">
                            <img width="45px" src="{{ asset('front/images/site-logo/'.siteInfo()->logo) }}" alt="{{ siteInfo()->title }}">
                        </a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="show-search"><i class="icon-magnifier"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a href="javascript:void(0);" class="sidebar-toggle"><i class="icon-arrow-left"></i></a>
                                </li>
                                <li>
                                    <a href="#cd-nav" class="cd-nav-trigger"><i class="icon-support"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-settings"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-md dropdown-list theme-settings" role="menu">
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Fixed Header
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right fixed-header-check">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Fixed Sidebar
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right fixed-sidebar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Horizontal bar
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right horizontal-bar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Toggle Sidebar
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right toggle-sidebar-check">
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Compact Menu
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right compact-menu-check" checked>
                                                    </div>
                                                </li>
                                                <li class="no-link" role="presentation">
                                                    Hover Menu
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right hover-menu-check">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="li-group">
                                            <ul class="list-unstyled">
                                                <li class="no-link" role="presentation">
                                                    Boxed Layout
                                                    <div class="ios-switch pull-right switch-md">
                                                        <input type="checkbox" class="js-switch pull-right boxed-layout-check">
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="no-link"><button class="btn btn-default reset-options">Reset Options</button></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="javascript:void(0);" class="show-search"><i class="icon-magnifier"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-envelope-open"></i><span class="badge badge-danger pull-right">6</span></a>
                                    <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                        <li><p class="drop-title">You have 6 new  messages!</p></li>
                                        <li class="dropdown-menu-list slimscroll messages">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="#">
                                                        <div class="msg-img"><div class="online on"></div><img class="img-circle" src="{{ asset('backend/images/avatar2.png') }}" alt=""></div>
                                                        <p class="msg-name">Michael Lewis</p>
                                                        <p class="msg-text">Yeah science!</p>
                                                        <p class="msg-time">3 minutes ago</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="msg-img"><div class="online off"></div><img class="img-circle" src="{{ asset('backend/images/avatar4.png') }}" alt=""></div>
                                                        <p class="msg-name">John Doe</p>
                                                        <p class="msg-text">Hi Nick</p>
                                                        <p class="msg-time">8 minutes ago</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="msg-img"><div class="online off"></div><img class="img-circle" src="{{ asset('backend/images/avatar3.png') }}" alt=""></div>
                                                        <p class="msg-name">Emma Green</p>
                                                        <p class="msg-text">Let's meet!</p>
                                                        <p class="msg-time">56 minutes ago</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="msg-img"><div class="online on"></div><img class="img-circle" src="{{ asset('backend/images/avatar5.png') }}" alt=""></div>
                                                        <p class="msg-name">Nick Doe</p>
                                                        <p class="msg-text">Nice to meet you</p>
                                                        <p class="msg-time">2 hours ago</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="msg-img"><div class="online on"></div><img class="img-circle" src="{{ asset('backend/images/avatar2.png') }}" alt=""></div>
                                                        <p class="msg-name">Michael Lewis</p>
                                                        <p class="msg-text">Yeah science!</p>
                                                        <p class="msg-time">5 hours ago</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="msg-img"><div class="online off"></div><img class="img-circle" src="{{ asset('backend/images/avatar4.png') }}" alt=""></div>
                                                        <p class="msg-name">John Doe</p>
                                                        <p class="msg-text">Hi Nick</p>
                                                        <p class="msg-time">9 hours ago</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="drop-all"><a href="#" class="text-center">All Messages</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-bell"></i><span class="badge badge-danger pull-right">3</span></a>
                                    <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                        <li><p class="drop-title">You have 3 pending tasks!</p></li>
                                        <li class="dropdown-menu-list slimscroll tasks">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="#">
                                                        <div class="task-icon badge badge-success"><i class="fa fa-user"></i></div>
                                                        <span class="badge badge-roundless badge-default pull-right">1m</span>
                                                        <p class="task-details">New user registered</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="task-icon badge badge-primary"><i class="fa fa-refresh"></i></div>
                                                        <span class="badge badge-roundless badge-default pull-right">24m</span>
                                                        <p class="task-details">3 Charts refreshed</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="task-icon badge badge-danger"><i class="fa fa-phone"></i></div>
                                                        <span class="badge badge-roundless badge-default pull-right">24m</span>
                                                        <p class="task-details">2 Missed calls</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="drop-all"><a href="#" class="text-center">All Tasks</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="user-name">nick<i class="fa fa-angle-down"></i></span>
                                        <img class="img-circle avatar" src="{{ asset('backend/images/avatar1.png') }}" width="40" height="40" alt="">
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="profile.html"><i class="icon-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="calendar.html"><i class="icon-calendar"></i>Calendar</a></li>
                                        <li role="presentation"><a href="inbox.html"><i class="icon-envelope-open"></i>Inbox<span class="badge badge-success pull-right">4</span></a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a href="lock-screen.html"><i class="icon-lock"></i>Lock screen</a></li>
                                        <li role="presentation"><a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="icon-key m-r-xs"></i>Log out</a></li>
                                        {{-- logout form  --}}
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" id="showRight">
                                        <i class="icon-bubbles"></i>
                                    </a>
                                </li>
                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <ul class="menu accordion-menu">
                        <li class="@if (Route::is('dashboard')) active @endif">
                            <a href="{{ route('dashboard') }}" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Dashboard</p><span class="active-page"></span></a>
                        </li>
                        <li>
                            <a href="profile.html" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Profile</p></a>
                        </li>
                        <li>
                            <a href="{{ route('frontend') }}" class="waves-effect waves-button" target="_blank"><span class="menu-icon icon-eye"></span><p>View Website</p></a>

                        </li>

                        <li class="droplink @if(Route::is('testimonialView') || Route::is('testimonialAdd')||Route::is('testimonialEdit')) open active @endif">
                            <a href="#" class="waves-effect waves-button" target="_blank"><span class="menu-icon icon-speech"></span><p>Testimonial</p><span class="arrow"></span></a>
                                <ul class="sub-menu" style="display: none; background:#3a3a3a">
                                    <li class="@if(Route::is('testimonialView')||Route::is('testimonialEdit')) active @endif">
                                        <a href="{{ route('testimonialView') }}" class="waves-effect waves-button "> <span class="icon-eye"></span> View Testimonial</a>
                                    </li>
                                    <li class="@if(Route::is('testimonialAdd')) active @endif">
                                        <a href="{{ route('testimonialAdd') }}" class="waves-effect waves-button"> <span class="icon-plus"></span> Add Testimonial</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="droplink @if(Route::is('skillView')||Route::is('skillAdd')||Route::is('skillEdit')) open active @endif">
                            <a href="#" class="waves-effect waves-button" target="_blank"><span class="menu-icon  icon-support"></span><p>Skills</p><span class="arrow"></span></a>
                                <ul class="sub-menu" style="display: none; background:#3a3a3a">
                                    <li class="@if(Route::is('skillView')||Route::is('skillEdit'))active @endif">
                                        <a href="{{ route('skillView') }}" class="waves-effect waves-button"> <span class="icon-eye"></span> View Skills</a>
                                    </li>
                                    <li class="@if(Route::is('skillAdd')) active @endif">
                                        <a href="{{ route('skillAdd') }}" class="waves-effect waves-button"> <span class="icon-plus"></span> Add Skills</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="droplink @if(Route::is('SocialView')||Route::is('SocialEdit')||Route::is('SocialAdd')) active open @endif">
                            <a href="#" class="waves-effect waves-button" target="_blank">
                                <span class="menu-icon  icon-support"></span>
                                <p>Socials</p>
                                <span class="arrow"></span>
                            </a>
                                <ul class="sub-menu" style="display: none; background:#3a3a3a">
                                    <li class="@if(Route::is('SocialView')||Route::is('SocialEdit')) active @endif">
                                        <a href="{{  route('SocialView') }}" class="waves-effect waves-button">
                                            <span class="icon-plus"></span>
                                            <p> View Socials</p>
                                        </a>
                                    </li>
                                    <li class="@if(Route::is('SocialAdd')) active @endif">
                                        <a href="{{ route('SocialAdd') }}" class="waves-effect waves-button">
                                            <span class="icon-plus"></span>
                                            <p>Add Socials</p>
                                        </a>
                                    </li>
                                </ul>
                        </li>
                        <li class="droplink @if(Route::is('siteSettings')||Route::is('siteSettingsEdit')||Route::is('aboutSettings')||Route::is('aboutSettingsEdit')) open active @endif">
                            <a href="#" class="waves-effect waves-button">
                                <span class="menu-icon icon-settings"></span>
                                <p>Settings</p>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none; background:#3a3a3a">
                                <li class="@if(Route::is('siteSettings')||Route::is('siteSettingsEdit')) active @endif">
                                    <a href="{{ route('siteSettings') }}" class="waves-effect waves-button" >Site Settings</a>
                                </li>
                                <li class="@if(Route::is('aboutSettings')||Route::is('aboutSettingsEdit')) active @endif">
                                    <a href="{{ route('aboutSettings') }}" class="waves-effect waves-button" >About</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            {{-- Page Main Content Start --}}
            <div class="page-inner">
            @yield('content')
            <div class="page-footer">
                <p class="no-s">Developed By <a class="text-muted" title="Anik Kumar Nandi" href="{{ url('https://aniknandi.com') }}" target="_blank">Anik Kumar Nandi</a> </p>
            </div>
        </div><!-- Page Inner -->

            {{-- Page Main Content end --}}
        </main><!-- Page Content -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>DEMOS</h3>
            </header>
            <div class="col-md-6 demo-block demo-selected demo-active">
                <p>Dark<br>Design</p>
            </div>
            <div class="col-md-6 demo-block">
                <a href="../admin2/index.html"><p>Light<br>Design</p></a>
            </div>
            <div class="col-md-6 demo-block">
                <a href="../admin3/index.html"><p>Material<br>Design</p></a>
            </div>
            <div class="col-md-6 demo-block demo-coming-soon">
                <p>Horizontal<br>(Coming)</p>
            </div>
            <div class="col-md-6 demo-block demo-coming-soon">
                <p>Coming<br>Soon</p>
            </div>
            <div class="col-md-6 demo-block demo-coming-soon">
                <p>Coming<br>Soon</p>
            </div>
        </nav>
        <div class="cd-overlay"></div>
        <!-- Javascripts -->
        <script src="{{ asset('backend/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/pace-master/pace.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/jquery-blockui/jquery.blockui.js') }}"></script>
        <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/uniform/js/jquery.uniform.standalone.js') }}"></script>
        <script src="{{ asset('backend/plugins/offcanvasmenueffects/js/classie.js') }}"></script>
        <script src="{{ asset('backend/plugins/waves/waves.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/3d-bold-navigation/js/main.js') }}"></script>
        <script src="{{ asset('backend/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/flot/jquery.flot.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/flot/jquery.flot.time.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/flot/jquery.flot.symbol.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/flot/jquery.flot.resize.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/curvedlines/curvedLines.js') }}"></script>
        <script src="{{ asset('backend/plugins/chartjs/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/js/meteor.min.js') }}"></script>
        @if (session('sessionLogin'))
            <script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>
        @endif
        @yield('footer_js')
    </body>
</html>

