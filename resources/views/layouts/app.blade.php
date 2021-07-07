<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ config('map', 'Map-OS') }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="title" content="Map-OS">
    <meta name="description" content="Sistema de Controle de Ordens de Serviço">
    <meta name="keywords" content="Map-OS, admin, OS, Ordem de Serviço, Laravel, dashboard">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mapos.com.br">
    <meta property="og:title" content="Map-OS">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fontawesome -->
    <link type="text/css" href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Notyf -->
    <link type="text/css" href="{{ asset('vendor/notyf/notyf.min.css') }}" rel="stylesheet">

    @yield('css')

    @livewireStyles

</head>

<body class="bg-soft">

    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-md-none"><a class="navbar-brand mr-lg-5"
            href="../index.html"><img class="navbar-brand-dark" src="../assets/img/brand/light.svg" alt="Volt logo">
            <img class="navbar-brand-light" src="../assets/img/brand/dark.svg" alt="Volt logo"></a>
        <div class="d-flex align-items-center"><button class="navbar-toggler d-md-none collapsed" type="button"
                data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button></div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('partials.sidebar')
                <main class="content">
                    <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark pl-0 pr-2 pb-0">
                        <div class="container-fluid px-0">
                            <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                                <div class="d-flex">
                                    <!-- Search form -->
                                    <form class="navbar-search form-inline" id="navbar-search-main">
                                        <div class="input-group input-group-merge search-bar"><span
                                                class="input-group-text" id="topbar-addon"><span
                                                    class="fas fa-search"></span></span> <input type="text"
                                                class="form-control" id="topbarInputIconLeft"
                                                placeholder="{{ __('messages.search') }}" aria-label="Search"
                                                aria-describedby="topbar-addon"></div>
                                    </form>
                                </div><!-- Navbar links -->
                                <ul class="navbar-nav align-items-center">

                                    <li class="nav-item dropdown">
                                        <a class="nav-link pt-1 px-0" href="#" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <div class="media d-flex align-items-center">
                                                <img class="user-avatar md-avatar rounded-circle"
                                                    alt="Image placeholder" src="{{ asset('img/profile.png') }}">
                                                <div
                                                    class="media-body ml-2 text-dark align-items-center d-none d-lg-block">
                                                    <span class="mb-0 font-small font-weight-bold">Admin</span></div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dashboard-dropdown dropdown-menu-right mt-2">
                                            <a class="dropdown-item font-weight-bold" href="#"><span
                                                    class="far fa-user-circle"></span>My Profile</a>
                                            <a class="dropdown-item font-weight-bold" href="#"><span
                                                    class="fas fa-cog"></span>Settings</a>
                                            <a class="dropdown-item font-weight-bold" href="#"><span
                                                    class="fas fa-envelope-open-text"></span>Messages</a>
                                            <a class="dropdown-item font-weight-bold" href="#"><span
                                                    class="fas fa-user-shield"></span>Support</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item font-weight-bold" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span
                                                    class="fas fa-sign-out-alt text-danger"></span>Logout</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
                        @yield('content_header')
                    </div>

                    <div class="card border-light shadow-sm components-section">
                        <div class="card-body p-1">
                            @yield('content')
                        </div>
                    </div>

                    @include('partials.footer')

                </main>
            </div>
        </div>
    </div><!-- Core -->


    <!-- Scripts -->
    <!-- Core -->
    <script src="{{ asset('vendor/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Vendor JS -->
    <script src="{{ asset('vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
    <!-- Slider -->
    <script src="{{ asset('vendor/nouislider/distribute/nouislider.min.js') }}"></script>
    <!-- Jarallax -->
    <script src="{{ asset('vendor/jarallax/dist/jarallax.min.js') }}"></script>
    <!-- Smooth scroll -->
    <script src="{{ asset('vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <!-- Count up -->
    <script src="{{ asset('vendor/countup.js/dist/countUp.umd.js') }}"></script>
    <!-- Notyf -->
    <script src="{{ asset('vendor/notyf/notyf.min.js') }}"></script>
    <!-- Datepicker -->
    <!-- <script src="{{ asset('vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script> -->
    <!-- Simplebar -->
    <script src="{{ asset('vendor/simplebar/dist/simplebar.min.js') }}"></script>

    <script src="{{ asset('js/app-min.js') }}" defer></script>
    @yield('js')

    @livewireScripts

</body>

</html>
