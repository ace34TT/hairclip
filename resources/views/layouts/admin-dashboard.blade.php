<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>AdminWrap Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('images/logo/1_transparent_logo_black_scroped.png') }}">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin-template/assets/node_modules/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href=" {{ asset('admin-template/assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{ asset('admin-template/assets/node_modules/morrisjs/morris.css') }} rel="stylesheet">
    <!--c3 CSS -->
    <link href=" {{ asset('admin-template/assets/node_modules/c3-master/c3.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('admin-template/html/css/style.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('admin-template/html/css/pages/dashboard1.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href=" {{ asset('admin-template/html/css/colors/default.css') }}" id="theme" rel="stylesheet">
    @stack('styles')
    <title>@yield('title')</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
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
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <img src="{{ asset('images/logo/1_transparent_logo_black.png') }}" alt="homepage"
                                class="dark-logo" style="height: 50px; width: 50px" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            Hairclip
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                                href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-xs-down search-box"> <a
                                class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i
                                    class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a
                                    class="srh-btn"><i class="fa fa-times"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a href="{{ route('admin.profile') }}"
                                class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" id="navbarDropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <x-uiw-user style="height: 25px; width : 25px;" /> <span class="hidden-md-down">Admin
                                    &nbsp;</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
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
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}"
                                aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Tableau de
                                    bord</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.order-list') }}"
                                aria-expanded="false"><i class="fa fa-list" aria-hidden="true"></i></i><span
                                    class="hide-menu">Commandes</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.sock-availability') }}"
                                aria-expanded="false"><i class="fa fa-th" aria-hidden="true"></i></i><span
                                    class="hide-menu">Etat de
                                    stock</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.stock-movements') }}"
                                aria-expanded="false"><i class="fa fa-book" aria-hidden="true"></i></i><span
                                    class="hide-menu">Mouvements de stock
                                </span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.logout') }}"
                                aria-expanded="false"><i class="fa fa-sign-out" aria-hidden="true"></i><span
                                    class="hide-menu">Deconnexion</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">@yield('current-page')</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                            <li class="breadcrumb-item active">@yield('current-page')</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Sales Chart and browser state-->
                <!-- ============================================================== -->
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2021 Adminwrap by <a href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin-template/assets/node_modules/jquery/jquery.min.js') }} "></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('admin-template/assets/node_modules/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('admin-template/html/js/perfect-scrollbar.jquery.min.js') }} "></script>
    <!--Wave Effects -->
    <script src="{{ asset('admin-template/html/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('admin-template/html/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('admin-template/html/js/custom.min.js') }} "></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{ asset('admin-template/assets/node_modules/raphael/raphael-min.js') }} "></script>
    <script src="{{ asset('admin-template/assets/node_modules/morrisjs/morris.min.js') }} "></script>
    <!--c3 JavaScript -->
    <script src="{{ asset('admin-template/assets/node_modules/d3/d3.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/node_modules/c3-master/c3.min.js') }} "></script>
    <!-- Chart JS -->
    <script src="{{ asset('admin-template/html/js/dashboard1.js') }} "></script>
    @yield('script')
</body>

</html>
