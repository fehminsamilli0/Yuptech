<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/assets/images/favicon.png')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


    <title>Material pro admin Template - The Ultimate Multipurpose admin template</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <link href="{{asset('backend/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/dist/js/pages/chartist/chartist-init.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/dist/css/tagsinput.css')}}"  rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{asset('backend/dist/css/style.min.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="{{route('index')}}">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{asset('backend/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="{{asset('backend/assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{asset('backend/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                            <img src="{{asset('backend/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" />
                        </span>
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                   data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                        class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto">
                    <!-- This is  -->
                    <li class="nav-item"> <a
                            class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark"
                            href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <!-- ============================================================== -->

                    </li>
                    <!-- ============================================================== -->
                    <!-- End Mega Menu -->
                    <!-- ============================================================== -->
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav">
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="locale/az"
                          aria-haspopup="true" aria-expanded="false"> <i
                                class="flag-icon flag-icon-az"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="locale/en"
                           aria-haspopup="true" aria-expanded="false"> <i
                                class="flag-icon flag-icon-gb"></i></a>
                    </li>
                    <!-- Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('backend')}}/assets/images/users/1.jpg" alt="user" width="30" class="profile-pic rounded-circle" />
                        </a>
                        <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                            <ul class="dropdown-user list-style-none">
                                <li>
                                    <div class="dw-user-box p-3 d-flex">
                                        <div class="u-img"><img src="{{asset('backend')}}/assets/images/users/1.jpg" alt="user" class="rounded" width="80"></div>
                                        <div class="u-text ml-2">
                                            <h4 class="mb-0">Steave Jobs</h4>
                                            <p class="text-muted mb-1 font-14"><a href="https://www.wrappixel.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="51273023243f11363c30383d7f323e3c">[email&#160;protected]</a></p>
                                            <a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm text-white d-inline-block">View
                                                Profile</a>
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="dropdown-divider"></li>
                                <li class="user-list"><a class="px-3 py-2" href="#"><i class="ti-user"></i> My Profile</a></li>
                                <li class="user-list"><a class="px-3 py-2" href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                <li class="user-list"><a class="px-3 py-2" href="#"><i class="ti-email"></i> Inbox</a></li>
                                <li role="separator" class="dropdown-divider"></li>
                                <li class="user-list"><a class="px-3 py-2" href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                <li role="separator" class="dropdown-divider"></li>
                                <li class="user-list"><a class="px-3 py-2" href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- Language -->
                    <!-- ============================================================== -->

                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- User profile -->
            <div class="user-profile position-relative" style="background: url({{asset('backend/assets/images/background/user-info.jpg')}}) no-repeat;">
                <!-- User profile image -->
                <div class="profile-img"> <img src="{{asset('backend')}}/assets/images/users/profile.png" alt="user" class="w-100" /> </div>
                <!-- User profile text-->
                <div class="profile-text pt-1">
                    <a href="#" class="dropdown-toggle u-dropdown w-100 text-white d-block position-relative" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Markarn Doe</a>
                    <div class="dropdown-menu animated flipInY">
                        <a href="#" class="dropdown-item"><i class="ti-user"></i>
                            My Profile</a>
                        <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My
                            Balance</a>
                        <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                        <div class="dropdown-divider"></div>
                        <a href="authentication-login1.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>
            </div>
            <!-- End User profile text-->
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="icon-settings"></i>
                            <span class="hide-menu">@lang('lang.settings') </span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{route('GeneralSettings')}}" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">@lang('lang.general')</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('GeneralContact')}}" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">@lang('lang.contact')</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('GeneralAbout')}}" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">@lang('lang.about')</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="fab fa-servicestack"></i>
                            <span class="hide-menu">@lang('lang.service')</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{route('ServiceList')}}" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">@lang('lang.servicelist')</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('ServiceCat')}}" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">@lang('lang.servicecat')</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{route('Employees')}}" class="sidebar-link">
                            <i class="fas fa-hands-helping"></i>
                            <span class="hide-menu">@lang('lang.emp')</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('Job')}}" class="sidebar-link">
                            <i class="fas fa-briefcase"></i>
                            <span class="hide-menu">İş Sahələri</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                           aria-expanded="false">
                            <i class="mr-2 mdi mdi-animation"></i>
                            <span class="hide-menu">Portfolio</span>
                        </a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item">
                                <a href="{{route('Portfolio')}}" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">Siyahı</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('PortfolioCat')}}" class="sidebar-link">
                                    <i class="mdi mdi-adjust"></i>
                                    <span class="hide-menu">Kateqoriya</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('Team')}}" class="sidebar-link">
                            <i class="fas fa-users"></i>
                            <span class="hide-menu">Komanda</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('Subs')}}" class="sidebar-link">
                            <i class="fas icon-people"></i>
                            <span class="hide-menu">Abunə</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('Thoughts')}}" class="sidebar-link">
                            <i class="fas fa-comments"></i>
                            <span class="hide-menu">Fikirlər</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('Slider')}}" class="sidebar-link">
                            <i class="mr-2 mdi mdi-image-area"></i>
                            <span class="hide-menu">Slider</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('Payment')}}" class="sidebar-link">
                            <i class="ti-money"></i>
                            <span class="hide-menu">Ödəniş</span>
                        </a>
                    </li>



                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
        <!-- Bottom points-->
        <div class="sidebar-footer">
            <!-- item-->
            <a href="#" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
            <!-- item-->
            <a href="#" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
            <!-- item-->
            <a href="#" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
        </div>
        <!-- End Bottom points-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <div class="row page-titles">

        </div>
