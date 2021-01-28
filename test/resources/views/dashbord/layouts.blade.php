<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    @yield('title')
    <link rel="apple-touch-icon" href="{{ asset('dash/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dash/app-assets/images/logo/logo.png')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuic12nd:300,400,500,700"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dash/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/app-assets/css/components.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dash/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/app-assets/vendors/css/cryptocoins/cryptocoins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/app-assets/css/pages/app-contacts.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dash/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
    {{-- <link rel="stylesheet" href="{{asset('dash/app-assets/js/Chosen/prism.css')}}"> --}}


    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-danger navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row h-100">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item h-100">
                        <a class="navbar-brand py-1 h-100 d-flex d-md-none d-lg-flex justify-content-center align-items-center" href="{{route('HomeDashbord')}}">
                            <img class="h-100" alt="modern admin logo"
                                src="{{ asset('dash/app-assets/images/logo/logo-full.png')}}">
                        </a>
                        <a class="navbar-brand h-100 d-none d-md-flex d-lg-none justify-content-center align-items-center" href="{{route('HomeDashbord')}}">
                            <img class="h-100" alt="modern admin logo"
                                src="{{ asset('dash/app-assets/images/logo/logo.png')}}">
                        </a>
                    <!-- <a class="navbar-brand" href="{{route('HomeDashbord')}}"><img class="brand-logo" alt="modern admin logo"
                                src="{{ asset('dash/app-assets/images/logo/logo.png')}}">
                            <h3 class="brand-text">{{ setting('siteName') }}</h3>
                        </a> -->
                    </li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                            data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                href="#"><i class="ft-menu"></i></a></li>


                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i
                                    class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input required  class="input" type="text" placeholder="Search" tabindex="0"
                                    data-search="template-list">
                                <div class="search-input-close"><i class="ft-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span
                                    class="mr-1 user-name text-bold-700">{{Auth::user()->name}}</span><span
                                    class="avatar avatar-online">
                                    <img src="{{ asset('' . Auth::user()->image)}}" alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                    href="{{route('profile')}}"><i class="ft-user"></i> Edit Profile</a>

                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"
                                    onclick="document.getElementById('logout_form').submit()">
                                    <i class="ft-power"></i> Logout</a>
                                <form id="logout_form" method="post" action="{{url('logout')}}">
                                    @csrf
                                </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    @include('dashbord.mainmenu')

    <div class="app-content content">
        <div class="content-overlay"></div>
        @yield('content')
    </div>


    <!-- END: Page JS-->
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('dash/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('dash/app-assets/vendors/js/extensions/jquery.raty.js')}}"></script>
    <script src="{{ asset('dash/app-assets/vendors/js/tables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('dash/app-assets/vendors/js/charts/chart.min.js')}}"></script>
    <script src="{{ asset('dash/app-assets/vendors/js/charts/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('dash/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('dash/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('dash/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('dash/app-assets/js/scripts/pages/dashboard-crypto.js')}}"></script>

    <script src="{{ asset('dash/app-assets/js/scripts/pages/app-contacts.js')}}"></script>
     {{-- <script type="text/javascript" src="{{asset('Students/js/plugins.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="{{asset('Students/js/select-date.js')}}"></script> --}}
    <script type="text/javascript" src="{{asset('Students/js/custom-core.js')}}"></script>
    @yield('script')
    <script>
        console.clear();
    </script>
</body>
<!-- END: Body-->

</html>