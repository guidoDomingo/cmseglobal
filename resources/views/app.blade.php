<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Eglobalt S.A </title>

    <link rel="icon" type="image/x-icon" href="{{ asset('src/assets/img/favicon.ico') }}"/>
    <link href="{{ asset('layouts/horizontal-dark-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/horizontal-dark-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('layouts/horizontal-dark-menu/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/horizontal-dark-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('layouts/horizontal-dark-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES --> 

    <!-- BEGIN THEME GLOBAL STYLES - PARA MOSTRAR UNA LISTA -->
    <link href="{{ asset('src/assets/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/light/components/list-group.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/assets/css/light/components/tabs.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('src/assets/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/components/list-group.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/assets/css/dark/components/tabs.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->  

    {{-- PARA AGREGAR SELECT  --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/tomSelect/custom-tomSelect.css') }}"> --}}
    {{-- FIN DE SELECT  --}}

     <!-- SWEET ALERTS -->
    <link rel="stylesheet" href="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.css') }}">
    <link href="{{ asset('src/plugins/css/light/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- SWEET ALERTS - FIN -->


    {{-- TEMA ANTIGUA --}}

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('/bower_components/admin-lte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/bower_components/admin-lte/dist/css/skins/skin-black.min.css') }}"> 

    {{-- @include('partials._css') --}}
   
    @yield('aditional_css')
    @yield('page_styles')

    {{-- CUSTOM --}}
    <link href="{{ asset('src/assets/css/dark/custom.css') }}" rel="stylesheet" type="text/css" />
    
    <livewire:styles />

    <style>
        .list-group-buscador {
            display: none;
            position: absolute;
            background-color: #060818;
            padding: 10px;
            margin: 8px;
            z-index: 2;
            width: 100%;
        }

        #sidebar ul.menu-categories ul.submenu > li a {
            justify-content: flex-start !important;
        }

        body.dark #sidebar ul.menu-categories ul.submenu {
            max-width: 300px;
            width: 260px;

        }

        body.dark #sidebar ul.menu-categories ul.submenu > li.sub-submenu ul.sub-submenu {
            max-width: 300px;
            width: 260px;
            padding: 10px 0;
            margin-left: 0px !important;
            background-color: #191E3A;
        }

        .buscador-cms{
            font-size: 15px;
        }

        body{
            text-decoration: none;
        }

        .highlighted {
            background-color: #d1d1d1;  /* O cualquier otro color que desees */
        }
        

    </style>

</head>
<body class="layout-boxed enable-secondaryNav">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container container-xxl">
        <header class="header navbar navbar-expand-sm expand-header">

            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
            
            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="#">
                        <img src="{{ asset('bower_components/admin-lte/dist/img/user7-128x128.jpg') }}" class="navbar-logoo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="index.html" class="nav-link"> EGLOBAL </a>
                </li>
            </ul>

            <div class="search-animated toggle-search">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <form class="form-inline search-full form-inline search" role="search">
                    <div class="search-bar">
                        <input type="text" id="searchInput" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x search-close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </div>
                </form>
                <span class="badge badge-secondary">Ctrl + /</span>

                {{-- <ul id="menuList" class="list-group ">
          
                </ul> --}}

                
                <div id="menuList" class="list-group list-group-buscador">

                </div>
        
                
            </div>

            <ul class="navbar-item flex-row ms-lg-auto ms-0 action-area">

                <li class="nav-item dropdown language-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../src/assets/img/1x1/us.svg" class="flag-width" alt="flag">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="../src/assets/img/1x1/us.svg" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;English</span></a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="../src/assets/img/1x1/tr.svg" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;Turkish</span></a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="../src/assets/img/1x1/br.svg" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;Portuguese</span></a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="../src/assets/img/1x1/in.svg" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;Hindi</span></a>
                        <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="../src/assets/img/1x1/de.svg" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;German</span></a>
                    </div>
                </li>

                <li class="nav-item theme-toggle-item">
                    <a href="javascript:void(0);" class="nav-link theme-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon dark-mode"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun light-mode"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                    </a>
                </li>

                <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="badge badge-success"></span>
                    </a>

                    <div class="dropdown-menu position-absolute dropdown-notificaciones" aria-labelledby="notificationDropdown">
                        <div class="drodpown-title message">
                            <h6 class="d-flex justify-content-between"><span class="align-self-center">Messages</span> <span class="badge badge-primary">9 Unread</span></h6>
                        </div>
                        <div class="notification-scroll">
                            <div class="dropdown-item">
                                <div class="media server-log">
                                    <img src="../src/assets/img/profile-16.jpeg" class="img-fluid me-2" alt="avatar">
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Kara Young</h6>
                                            <p class="">1 hr ago</p>
                                        </div>
                                        
                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="dropdown-item">
                                <div class="media ">
                                    <img src="../src/assets/img/profile-15.jpeg" class="img-fluid me-2" alt="avatar">
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Daisy Anderson</h6>
                                            <p class="">8 hrs ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item">
                                <div class="media file-upload">
                                    <img src="../src/assets/img/profile-21.jpeg" class="img-fluid me-2" alt="avatar">
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Oscar Garner</h6>
                                            <p class="">14 hrs ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="drodpown-title notification mt-2">
                                <h6 class="d-flex justify-content-between"><span class="align-self-center">Notifications</span> <span class="badge badge-secondary">16 New</span></h6>
                            </div>

                            <div class="dropdown-item">
                                <div class="media server-log">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Server Rebooted</h6>
                                            <p class="">45 min ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item">
                                <div class="media file-upload">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Kelly Portfolio.pdf</h6>
                                            <p class="">670 kb</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-item">
                                <div class="media ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                    <div class="media-body">
                                        <div class="data-info">
                                            <h6 class="">Licence Expiring Soon</h6>
                                            <p class="">8 hrs ago</p>
                                        </div>

                                        <div class="icon-status">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </li>

                <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-container">
                            <div class="avatar avatar-sm avatar-indicators avatar-online">
                                <img alt="avatar" src="{{ asset('bower_components/admin-lte/dist/img/user7-128x128.jpg') }}" class="rounded-circle">
                            </div>
                        </div>
                    </a>

                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="user-profile-section">
                            <div class="media mx-auto">
                                <div class="emoji me-2">
                                    &#x1F44B;
                                </div>
                                <div class="media-body">
                                    <h5>{{ Sentinel::getUser()->description }}</h5>
                                    <p>{{Sentinel::getUser()->username}}</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="dropdown-item">
                            <a href="user-profile.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Profile</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="app-mailbox.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span>Inbox</span>
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="auth-boxed-lockscreen.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Lock Screen</span>
                            </a>
                        </div> --}}
                        <div class="dropdown-item">
                            <a href="{{ route('logout') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Salir</span>
                            </a>
                        </div>
                    </div>
                    
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="./index.html">
                                <img src="../src/assets/img/logo.svg" class="navbar-logo" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="./index.html" class="nav-link"> CORK </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                        </div>
                    </div>
                </div>
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu active">
                        <a href="#dashboard" data-bs-toggle="dropdown" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="dropdown-menu submenu list-unstyled" id="dashboard" data-bs-parent="#accordionExample">

                            @if (\Sentinel::getUser()->inRole('superuser'))

                            <li class="">
                                <a href="{{ route('analitica') }}"> Analitica </a>
                            </li>
                            <li>
                                <a href="{{ route('home') }}"> Dashboard </a>
                            </li>

                            @endif

                        </ul>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>APPLICATIONS</span></div>
                    </li>

                    <li class="menu">
                        <a href="#apps" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                                <span>Administración</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="dropdown-menu submenu list-unstyled" id="apps" data-bs-parent="#accordionExample">
                            @if (\Sentinel::getUser()->hasAccess('users'))
                                <li @if (Request::is('users*')) class="active" @endif>
                                    <a href="{{ route('users.index') }}"><i
                                            class="fa fa-user"></i><span>Usuarios</span></a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('roles'))
                                <li @if (Request::is('roles'))  @endif>
                                    <a href="{{ route('roles.index') }}"><i class="fa fa-users"></i>Roles</a>
                                </li>
                            @endif

                            @if (\Sentinel::getUser()->hasAccess('roles'))
                                <li @if (Request::is('roles_report')) class="active" @endif>
                                    <a href="{{ route('roles_report') }}"><i class="fa fa-users"></i><span>Roles - Reporte</span></a>
                                </li>
                            @endif


                            @if (Sentinel::getUser()->hasAccess('permissions'))
                                <li @if (Request::is('permissions*')) class="active" @endif>
                                    <a href="{{ route('permissions.index') }}"><i
                                            class="fa fa-key"></i><span>Permisos</span></a>
                                </li>
                            @endif
                            @if (Sentinel::getUser()->hasAccess('usuarios_bahia'))
                                <li @if (Request::is('usuarios_bahia*')) class="active" @endif>
                                    <a href="{{ route('usuarios_bahia.index') }}"><i class="fa fa-user"></i><span>Usuarios
                                            Bahia</span></a>
                                </li>
                            @endif
                            <li class="sub-submenu dropend">
                                <a href="#invoice" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Zonas Geográficas <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="invoice"> 
                                    @if (Sentinel::getUser()->hasAccess('departamentos'))
                                        <li @if (Request::is('departamentos*')) class="active" @endif>
                                            <a href="{{ route('departamentos.index') }}"><i
                                                    class="fa fa-location-arrow"></i> Departamentos</a>
                                        </li>
                                    @endif
                                    @if (Sentinel::getUser()->hasAccess('ciudades'))
                                        <li @if (Request::is('ciudades*')) class="active" @endif>
                                            <a href="{{ route('ciudades.index') }}"><i
                                                    class="fa fa-location-arrow"></i> Ciudades</a>
                                        </li>
                                    @endif
                                    @if (Sentinel::getUser()->hasAccess('barrios'))
                                        <li @if (Request::is('barrios*')) class="active" @endif>
                                            <a href="{{ route('barrios.index') }}"><i
                                                    class="fa fa-location-arrow"></i> Barrios</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>

                              @if (Sentinel::getUser()->hasAccess('notifications_params'))
                                <li @if (Request::is('notifications_params*')) class="active" @endif>
                                    <a href="{{ route('notifications_params.index') }}"><i
                                            class="fa fa-key"></i><span>Configurar Alertas</span></a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('parametros_comisiones'))
                                <li @if (Request::is('parametros_comisiones*')) class="active" @endif>
                                    <a href="{{ route('parametros_comisiones.index') }}">
                                        <i class="fa fa-gears"></i><span>Parametros de Comisiones</span>
                                    </a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('group'))
                                <li @if (Request::is('group*')) class="active" @endif>
                                    <a href="{{ route('groups.index') }}">
                                        <i class="fa fa-object-group"></i></i><span>Grupos</span>
                                    </a>
                                </li>
                            @endif
                            <li class="sub-submenu dropend">
                                <a href="#ecommerce" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed">Gestión de Miniterminal <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="ecommerce" data-bs-parent="#apps"> 
                                    @if (\Sentinel::getUser()->hasAccess('ventas') || \Sentinel::getUser()->hasAccess('pago_clientes') || \Sentinel::getUser()->hasAccess('descuento_comision'))
                                        <li @if (Request::is('ventas*, pago_clientes*, recibos_comisiones*')) class="active" @endif>
                                            @if (\Sentinel::getUser()->hasAccess('ventas'))
                                                <a href="{{ route('venta.index') }}">
                                                    <i class="fa fa-briefcase"></i><span>Venta Miniterminal</span>
                                                </a>
                                                <a href="{{ route('alquiler.index') }}">
                                                    <i class="fa fa-briefcase"></i><span>Alquiler Miniterminal</span>
                                                </a>
                                                <a href="{{ route('reporting.cuotas_alquiler') }}">
                                                    <i class="fa fa-tags"></i><span>Cuotas de Alquiler</span>
                                                </a>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('descuento_comision'))
                                                <a href="{{ route('recibos_comisiones.index') }}">
                                                    <i class="fa fa-list-alt"></i><span>Descuento por Comision</span>
                                                </a>
                                            @endif
                                        </li>
                                    @endif
                                </ul>
                            </li>

                            @if (\Sentinel::getUser()->hasAccess('pago_clientes'))
                                <li class="sub-submenu dropend">
                                    <a href="#ecommerce" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed">Gestión de Miniterminal <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                    <ul class="dropdown-menu list-unstyled sub-submenu" id="blog" data-bs-parent="#apps"> 
                                        @if (\Sentinel::getUser()->hasAccess('pago_clientes'))
                                            <li @if (Request::is('pago_clientes')) class="active" @endif>
                                                @if (\Sentinel::getUser()->hasAccess('pago_clientes'))
                                                    <a href="{{ route('pago_clientes') }}">
                                                        <i class="fa fa-money"></i><span>Generar Pago de clientes</span>
                                                    </a>
                                                @endif
                                            </li>
                                        @endif
                                        @if (\Sentinel::getUser()->hasAccess('pago_clientes.import_pago'))
                                            <li @if (Request::is('pago_clientes/register_pago')) class="active" @endif>
                                                @if (\Sentinel::getUser()->hasAccess('pago_clientes.import_pago'))
                                                    <a href="{{ route('pago_clientes.register_pago') }}">
                                                        <i class="fa fa-money"></i><span>Confirmar Pagos</span>
                                                    </a>
                                                @endif
                                            </li>
                                        @endif
                                        @if (\Sentinel::getUser()->hasAccess('pago_clientes'))
                                            <li @if (Request::is('pago_clientes/reporte')) class="active" @endif>
                                                <a href="{{ route('reporting.pago_cliente') }}">
                                                    <i class="fa fa-money"></i><span>Reporte de Pagos</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif

                            <li class="sub-submenu dropend">
                                <a href="#ecommerce" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed">Gestión de Dispositivos <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="blog" data-bs-parent="#apps"> 
                                    @if (\Sentinel::getUser()->hasAccess('housing'))
                                        <li @if (Request::is('housing*')) class="active" @endif>
                                            <a href="{{ route('brands.index') }}">
                                                <i class="fa fa-eject" aria-hidden="true"></i><span>Marcas - Modelos</span>
                                            </a>
                                            <a href="{{ route('miniterminales.index') }}">
                                                <i class="fa fa-building"></i><span>Housing</span>
                                            </a>
                                            <a href="{{ route('devices.showGet') }}">
                                                <i class="fa fa-server"></i><span>Listado de dispositivos</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>

                             @if (\Sentinel::getUser()->hasAccess('compra_tarex'))
                                <li @if (Request::is('compra_tarex*')) class="active" @endif>
                                    <a href="{{ route('compra_tarex.index') }}"><i class="fa fa-credit-card"></i><span>Compra de Saldo</span></a>
                                </li>
                            @endif

                        </ul>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>USER INTERFACE</span></div>
                    </li>

                    @if (\Sentinel::getUser()->hasAccess('reporting'))
                        <li class="menu">
                            <a href="#components" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                    <span>Reportes</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>
                            
                            <ul class="dropdown-menu submenu list-unstyled" id="components" data-bs-parent="#accordionExample">
                                <li class="sub-submenu dropend">
                                    <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed">Transacciones<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                    <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1">
                                        @if (\Sentinel::getUser()->hasAccess('reporting.transacciones')) 
                                            <li>
                                                <a href="{{ route('reports.transactions') }}">Historico Transacciones</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('reports.one_day_transactions') }}">Transacciones del Día</a>
                                            </li>
                                        @endif
                                        @if (\Sentinel::getUser()->hasAccess('reporting.transacciones_batch'))
                                            <li>
                                                <a href="{{ route('reports.batch_transactions') }}">Transacciones Batch</a>
                                            </li>
                                        @endif
                                        @if (\Sentinel::getUser()->hasAccess('reporting.payments'))
                                            <li>
                                                <a href="{{ route('reports.payments') }}">Pagos</a>
                                            </li>
                                        @endif
                                        @if (\Sentinel::getUser()->inRole('superuser'))
                                            <li>
                                                <a href="{{ route('terminals_payments') }}">Pagos por terminal</a>
                                            </li>
                                        @endif
                                        @if (\Sentinel::getUser()->hasAccess('reporting.vueltos'))
                                            <li>
                                                <a href="{{ route('reports.transactions_vuelto') }}">Tickets de devolucion</a>
                                            </li>
                                        @endif
                                        @if (\Sentinel::getUser()->hasAccess('reporting.vueltos'))
                                            <li>
                                                <a href="{{ route('reports.vuelto_entregado') }}">Vueltos entregados</a>
                                            </li>
                                        @endif
                                    
                                    </ul>
                                    
                                </li>

                                @if (\Sentinel::getUser()->hasAccess('reporting.vueltos'))
                                            
                                    <li id="lista_one" class="sub-submenu dropend">
                                        <a href="#lista2"  data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed">Miniterminales<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista2"> 
                                            @if (\Sentinel::getUser()->hasAccess('reporting.estado_contable'))
                                                <li>
                                                    <a href="{{ route('reporting.estado_contable') }}">Estado Contable</a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('accounting_statement_report'))

                                                <li @if (Request::is('accounting_statement*')) @endif>
                                                    <a href="{{ route('accounting_statement') }}">
                                                        <span style="">Estado Contable Unificado</span>
                                                    </a>
                                                </li>
                                                
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('reporting.miniterminales'))
                                                <li @if (Request::is('reporting/resumen_miniterminales*')) @endif>
                                                    <a href="{{ route('reporting.resumen_miniterminales') }}">
                                                        <span style="">Estado Contable por Clientes</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('reporting.miniterminales'))
                                                <li @if (Request::is('reporting/resumen_detallado_miniterminal*')) @endif>
                                                    <a href="{{ route('reporting.resumen_detallado_miniterminal') }}">
                                                        <span style="">Estado Contable Detallado</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('reporting.comisiones'))
                                                <li @if (Request::is('reporting/comisiones*')) @endif>
                                                    <a href="{{ route('reporting.comisiones') }}">
                                                        <span style="">Comisiones Miniterminales</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('reporting.sales'))
                                                <li @if (Request::is('reporting/sales*'))  @endif>
                                                    <a href="{{ route('reporting.sales') }}">
                                                        <span style="">Ventas Miniterminales</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('reporting.cobranzas'))
                                                <li @if (Request::is('reporting/cobranzas*'))  @endif>
                                                    <a href="{{ route('reporting.cobranzas') }}">
                                                        <span style="">Cobranzas Miniterminales</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('reporting.conciliaciones'))
                                                <li @if (Request::is('reporting/conciliations'))  @endif>
                                                    <a href="{{ route('reporting.conciliaciones') }}">
                                                        <span style="">Conciliaciones Miniterminales</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('reporting.conciliaciones'))
                                                <li @if (Request::is('reporting/estados_miniterminales')) @endif>
                                                    <a href="{{ route('reporting.bloqueados') }}">
                                                        <span style="">Estados Miniterminales</span>
                                                    </a>
                                                </li>
                                            @endif
                                                @if (\Sentinel::getUser()->hasAccess('reporting.conciliaciones'))
                                                <li @if (Request::is('reporting/historial_bloqueos')) @endif>
                                                    <a href="{{ route('reporting.historial_bloqueos') }}">
                                                        <span style="">Historial de Bloqueos</span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                
                                @endif

                                @if (\Sentinel::getUser()->hasAccess('reporting.negocios'))
                                    <li class="sub-submenu dropend">
                                        <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed">Análisis<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1"> 
                                            <li @if (Request::is('reports/resumen_transacciones*')) @endif>
                                                <a href="{{ route('reports.resumen_transacciones') }}">
                                                    <span>Resumen Por ATM</span>
                                                </a>
                                            </li>
                                            <li @if (Request::is('reports/estado_atm*'))  @endif>
                                                <a href="{{ route('reports.estado_atm') }}">
                                                    <span>Disponibilidad Por ATM</span>
                                                </a>
                                            </li>
                                            <li @if (Request::is('reports/atm_status_history*'))  @endif>
                                                <a href="{{ route('reports.atm_status_history') }}">Historial de Estados ATM</span></a>
                                            </li>
                                            <li @if (Request::is('reports/transactions_amount*'))  @endif>
                                                <a href="{{ route('reports.transactions_amount') }}">
                                                    <span>Transacciones por Mes</span>
                                                </a>
                                            </li>
                                            <li @if (Request::is('reports/transactions_atm*'))  @endif>
                                                <a href="{{ route('reports.transactions_atm') }}">
                                                    <span>Transacciones por ATM</span>
                                                </a>
                                            </li>
                                            <li @if (Request::is('reports/denominaciones_amount*'))  @endif>
                                                <a href="{{ route('reports.denominaciones_amount') }}">
                                                    <span>Denominaciones Utilizadas</span>
                                                </a>
                                            </li>
                                            <li @if (Request::is('reports/efectividad*'))  @endif>
                                                <a href="{{ route('reports.efectividad') }}">
                                                    <span>Efectividad</span>
                                                </a>
                                            </li>
                                        </ul>
                                                
                                    </li>
                                @endif

                                @if (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('accounting.admin'))
                                    @if (\Sentinel::getUser()->hasAccess('commissions_qr_invoices'))
                                        
                                        <li @if (Request::is('comisionFactura')) @endif>
                                            <a href="{{ route('comisionFactura') }}">
                                                <span>Comisiones Qr Venta</span>
                                            </a>
                                        </li>
                                        
                                    @endif
                                @endif
                                
                                <li class="sub-submenu dropend">
                                    <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed">Operaciones Técnicas<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                    <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1"> 
                                        @if (\Sentinel::getUser()->hasAccess('reporting.arqueos'))
                                        <li @if (Request::is('reports/arqueos*'))  @endif>
                                            <a href="{{ route('reports.arqueos') }}">
                                                <span>Arqueos</span>
                                            </a>
                                        </li>
                                        @endif
                                        @if (\Sentinel::getUser()->hasAccess('reporting.cargas'))
                                            <li @if (Request::is('reports/cargas*'))  @endif>
                                                <a href="{{ route('reports.cargas') }}">
                                                    <span>Cargas</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if (\Sentinel::getUser()->hasAccess('reporting.dispositivos'))
                                            <li @if (Request::is('reports/dispositivos*'))  @endif>
                                                <a href="{{ route('reports.dispositivos') }}">
                                                    <span>Dispositivos</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if(\Sentinel::getUser()->hasAccess('depositos_arqueos'))
                                        <li @if(Request::is('depositos_arqueos*')) @endif>
                                            <a href="{{ route('depositos_arqueos.index') }}">
                                                <span>Dépositos de Arqueos</span>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                            
                                </li>
                                
                                @if (\Sentinel::getUser()->hasAccess('reporting.transacciones'))
                                    <!--cambiar el acceso -->
                                    <li @if (Request::is('reports/installations/*'))  @endif>
                                        <a href="{{ route('reports.installations') }}">
                                            <span>Instalaciones APP-Billetaje</span>
                                        </a>
                                    </li>
                                @endif

                                @if (\Sentinel::getUser()->hasAccess('reporting.contracts_atms'))
                                    <li @if (Request::is('reports/contracts/*'))  @endif>
                                        <a href="{{ route('reports.contracts') }}">
                                            <span>Contratos Miniterminales</span>
                                        </a>
                                    </li>
                                @endif
                                
                            </ul>
                        </li>
                    @endif
                    <li class="menu">
                        <a href="#elements" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                                <span>Usuarios y Terminales</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="dropdown-menu submenu list-unstyled" id="elements" data-bs-parent="#accordionExample">
                            @if (\Sentinel::getUser()->hasAccess('atms_per_users_management'))
                                <li class="{{ Request::is('atms_per_users_management*') ? 'active' : '' }}">
                                    <a href="{{ route('atms_per_users_management') }}"><i
                                        class="fa fa-user"></i><span>Gestión de Usuarios</span></a>
                                </li>
                            @endif
                            @if (\Sentinel::getUser()->hasAccess('atms_per_users'))
                                <li class="{{ Request::is('atms_per_users') ? 'active' : '' }}">
                                    <a href="{{ route('atms_per_users') }}"><i
                                    class="fa fa-cubes"></i><span>Terminales por Usuario</span></a>
                                </li>
                            @endif

                            <li class="sub-submenu dropend ">
                                <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"><i
                                    class="fa fa-cubes"></i>Atms<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1"> 
                                   @if (\Sentinel::getUser()->hasAccess('atms'))
                                        <li @if (Request::is('atm', 'atm/*') && !Request::is('atm/gooddeals')) class="active" @endif>
                                            <a href="{{ route('atm_index') }}"><i class="fa fa-server"></i> <span>ATMs</span></a>
                                        </li>
                                    @endif

                                    @if (\Sentinel::getUser()->hasAccess('atms_parts'))
                                        <li @if (Request::is('atms_parts', 'atms_parts/*')) class="active" @endif>
                                            <a href="{{ route('atms_parts') }}"><i class="fa fa-server"></i> <span>Partes de ATMs</span></a>
                                        </li>
                                    @endif
                                </ul>
                                
                            </li>

                            @if (\Sentinel::getUser()->hasAccess('atms_v2'))
                                <li class="sub-submenu dropend ">
                                    <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"><i
                                        class="fa fa-cubes"></i>Gestor de terminales<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                    <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1"> 
                                        <li @if(Request::is('atmnew','atmnew/*','atm/new/*')) class="active" @endif>
                                            <a href="{{ route('atmnew.index') }}">
                                                <i class="fa fa-server"></i> 
                                                <span>ABM miniterminales</span>
                                            </a>
                                        </li>
                                        @if (\Sentinel::getUser()->hasAccess('insurances_form'))
                                            <li @if(Request::is('insurances*')) class="active" @endif>
                                                <a href="{{ route('insurances.index') }}">
                                                    <i class="fa fa-file-powerpoint-o"></i> 
                                                    <span>Gestor de Pólizas</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                    
                                </li>
                            

                                @if ( \Sentinel::getUser()->hasAnyAccess(['gestor_contratos','gestor_contratos.reports','reporting.contracts_atms']))

                                    <li class="sub-submenu dropend ">
                                        <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"><i
                                            class="fa fa-cubes"></i>Gestión | Legales<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1"> 
                                            @if (\Sentinel::getUser()->hasAccess('gestor_contratos'))
                                            <li @if(Request::is('contracts*')) class="active" @endif>
                                                <a href="{{ route('contracts.index') }}">
                                                    <i class="fa fa-file-text-o"></i> 
                                                    <span>Contratos</span>
                                                </a>
                                            </li>
                                            @endif

                                            @if (\Sentinel::getUser()->hasAccess('gestor_contratos.reports'))
                                            <li @if(Request::is('reporte/contrato*')) class="active" @endif>
                                                <a href="{{ route('reports.contratos') }}">
                                                    <i class="fa fa-file-text-o"></i> 
                                                    <span>Reporte | Contratos</span>
                                                </a>
                                            </li>
                                            @endif
                                        </ul>
                                        
                                    </li>

                                @endif

                                @if ( \Sentinel::getUser()->hasAnyAccess(['reports_dms','caracteristicas_clientes','categorias*','canales*','altas.bancos']))

                                    <li class="sub-submenu dropend ">
                                        <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"><i
                                            class="fa fa-cubes"></i>Clientes<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1"> 
                                                @if (\Sentinel::getUser()->hasAccess('reports_dms'))
                                                    <li @if(Request::is('reports/dms','reports/dms/*')) class="active" @endif>
                                                        <a href="{{ route('reports.dms') }}">
                                                            <i class="fa fa-file-excel-o" aria-hidden="true"></i> 
                                                            <span>Reporte de Clientes</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (\Sentinel::getUser()->hasAccess('caracteristicas_clientes'))
                                                    <li @if(Request::is('caracteristicas*','caracteristicas/clientes','caracteristicas/clientes/*')) class="active" @endif>
                                                        <a href="{{ route('caracteristicas.clientes') }}">
                                                            <i class="fa fa-cog"></i> 
                                                            <span>Caracteristicas Clientes</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (\Sentinel::getUser()->hasAccess('canales'))
                                                    <li @if(Request::is('canales*')) class="active" @endif>
                                                        <a href="{{ route('canales.index') }}">
                                                            <i class="fa fa-bullhorn"></i> 
                                                            <span>Canales de venta</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                @if (\Sentinel::getUser()->hasAccess('categorias'))
                                                    <li @if(Request::is('categorias*','categorias/*')) class="active" @endif>
                                                        <a href="{{ route('categorias.index') }}">
                                                            <i class="fa fa-bars"></i> 
                                                            <span>Categorias</span>
                                                        </a>
                                                    </li>
                                                @endif

                                                @if (\Sentinel::getUser()->hasAccess('bancos'))
                                                    <li @if(Request::is('bancos*','bancos/*')) class="active" @endif>
                                                        <a href="{{ route('bancos.index') }}">
                                                            <i class="fa fa-university"></i> 
                                                            <span>Bancos</span>
                                                        </a>
                                                    </li>
                                                @endif
                                        </ul>
                                        
                                    </li>

                                @endif


                                @if (\Sentinel::getUser()->hasAccess('bajas'))
                                    <li @if(Request::is('atm/new/baja','retiro_dispositivos*','notarescision*','pagares*','notaretiro*')) class="active" @endif>
                                        <a href="{{ route('atms.baja') }}">
                                            <i class="fa fa-power-off"></i> 
                                            <span>Baja de miniterminales</span>
                                        </a>
                                    </li>
                                @endif

                            @endif

                            @if (\Sentinel::getUser()->hasAccess('owner'))
                                <li @if (Request::is('owner', 'owner/*')) class="active" @endif>
                                    <a href="{{ route('owner.index') }}"><i class="fa fa-sitemap"></i> <span>Redes /
                                            Sucursales</span></a>
                                </li>
                            @endif

                            @if (\Sentinel::getUser()->hasAccess('minis_cashout_devolucion_vuelto'))
                                <li @if (Request::is('minis.cashout.devolucion.vuelto/*')) class="active" @endif>
                                    <a href="{{ route('reports.mini_retiro') }}">
                                        <i class="fa fa-money"></i><span>Retiro de Dinero</span>
                                    </a>
                                </li>
                            @endif
                           
                        </ul>
                    </li>

                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>TABLES AND FORMS</span></div>
                    </li>

                    @if (\Sentinel::getUser()->hasAccess('pos') || \Sentinel::getUser()->hasAccess('vouchers') || \Sentinel::getUser()->hasAccess('providers') || \Sentinel::getUser()->hasAccess('products') || \Sentinel::getUser()->hasAccess('outcomes') || \Sentinel::getUser()->hasAccess('reversiones_bancard'))
                    
                        <li class="menu">
                            <a href="#tables" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                    <span>Contabilidad</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>
                            <ul class="dropdown-menu submenu list-unstyled" id="tables" data-bs-parent="#accordionExample">

                                @if (\Sentinel::getUser()->hasAccess('pos'))
                                <li @if (Request::is('pos*', 'pointsofsale*')) class="active" @endif>
                                    <a href="{{ route('pos.index') }}">
                                        <i class="fa fa-desktop"></i><span>Puntos de Venta</span>
                                    </a>
                                </li>
                                @endif
                                @if (\Sentinel::getUser()->hasAccess('vouchers'))
                                    <li @if (Request::is('vouchers*')) class="active" @endif>
                                        <a href="{{ route('vouchers.index') }}">
                                            <i class="fa fa-list-alt"></i><span>Tipos de Comprobante</span>
                                        </a>
                                    </li>
                                @endif
                                @if (\Sentinel::getUser()->hasAccess('providers'))
                                    <li @if (Request::is('providers*')) class="active" @endif>
                                        <a href="{{ route('providers.index') }}">
                                            <i class="fa fa-truck"></i><span>Proveedores</span>
                                        </a>
                                    </li>
                                @endif
                                @if (\Sentinel::getUser()->hasAccess('products'))
                                    <li @if (Request::is('products*')) class="active" @endif>
                                        <a href="{{ route('products.index') }}">
                                            <i class="fa fa-shopping-cart"></i><span>Productos</span>
                                        </a>
                                    </li>
                                @endif
                                @if (\Sentinel::getUser()->hasAccess('outcomes'))
                                    <li @if (Request::is('outcome*')) class="active" @endif>
                                        <a href="{{ route('outcome.index') }}">
                                            <i class="fa fa-shopping-cart"></i><span>Entidades Externas</span>
                                        </a>
                                    </li>
                                @endif
                                @if(\Sentinel::getUser()->hasAccess('reversiones_bancard'))
                                    <li @if(Request::is('reversiones*')) class="active" @endif>
                                        <a href="{{ route('reversiones.index') }}">
                                            <i class="fa fa-undo"></i><span>Reversiones Bancard</span>
                                        </a>
                                    </li>
                                @endif
                                
                            </ul>
                        </li>

                    @endif

                    @if (\Sentinel::getUser()->hasAccess('applications'))
                        <li class="menu">
                            <a href="#forms" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                    <span>Aplicaciones</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>
                            <ul class="dropdown-menu submenu list-unstyled" id="forms" data-bs-parent="#accordionExample">
                                <li @if (Request::is('applications', 'applications/*', 'screens', 'screens/*')) class="active" @endif><a
                                    href="{{ route('applications.index') }}"><i class="fa fa-cube"></i>
                                    <span>Gestor de Aplicaciones</span></a>
                                </li>
                                <li @if (Request::is('app_updates', 'app_updates/*')) class="active" @endif><a
                                        href="{{ route('app_updates.index') }}"><i class="fa fa-cube"></i>
                                        <span>Gestor de actualizaciones</span></a>
                                </li>
                                <li @if (Request::is('token_dropbox', 'token_dropbox/*')) class="active" @endif><a
                                    href="{{url('token_dropbox/-1/edit')}}"><i class="fa fa-qrcode"></i>
                                    <span>Gestor de Token/Dropbox</span></a>
                                </li>

                                @if (\Sentinel::getUser()->hasAnyAccess(['webservices', 'webservices.providers', 'webservices.providers.add|edit', 'webservices.providers.delete', 'atms.update_gooddeal', 'marcas', 'servicio_marca', 'marca.grilla', 'marca.consolidar', 'marca.order']))
                                    <li class="sub-submenu dropend ">
                                        <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"><i
                                            class="fa fa-cubes"></i>Servicios Web<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1"> 
                                            
                                            @if (\Sentinel::getUser()->hasAccess('webservices.providers'))
                                                <li @if (Request::is('wsproviders*')) class="active" @endif>
                                                    <a href="{{ route('wsproviders.index') }}"><i class="fa fa-cube"></i>
                                                        <span>Proveedores</span></a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('webservices.products'))
                                                <li @if (Request::is('wsproducts*')) class="active" @endif>
                                                    <a href="{{ route('wsproducts.index') }}"><i class="fa fa-cube"></i>
                                                        <span>Productos/Operaciones</span></a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('webservices'))
                                                <li @if (Request::is('webservices*')) class="active" @endif>
                                                    <a href="{{ route('webservices.index') }}"><i class="fa fa-cube"></i> <span>Web
                                                            Services</span></a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('atms.update_gooddeal'))
                                                <li @if (Request::is('atm/gooddeals')) class="active" @endif>
                                                    <a href="{{ route('gooddeals.update') }}"><i class="fa fa-cube"></i> <span>Act.
                                                            Promociones</span></a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('marca'))
                                                <li @if (Request::is('marca*') && !Request::is('marca/consolidar', 'marca/order', 'marca/grilla_servicios')) class="active" @endif>
                                                    <a href="{{ route('marca.index') }}"><i class="fa fa-cube"></i>
                                                        <span>Marcas</span></a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('servicio_marca'))
                                                <li @if (Request::is('servicios_marca*')) class="active" @endif>
                                                    <a href="{{ route('servicios_marca.index') }}"><i class="fa fa-cube"></i>
                                                        <span>Servicios Por Marca</span></a>
                                                </li>
                                            @endif
                                            @if (\Sentinel::getUser()->hasAccess('marca.grilla'))
                                                <li @if (Request::is('marca/grilla_servicios')) class="active" @endif>
                                                    <a href="{{ route('marca.grilla_servicios') }}"><i class="fa fa-cube"></i>
                                                        <span>Grilla de Servicios</span></a>
                                                </li>
                                            @endif
                                            {{--@if (\Sentinel::getUser()->hasAccess('marca.consolidar'))
                                                <li @if (Request::is('marca/consolidar')) class="active" @endif>
                                                    <a href="{{ route('marca.consolidar') }}"><i class="fa fa-cube"></i> <span>Consolidar
                                                            Marcas</span></a>
                                                </li>
                                            @endif--}}
                                            @if (\Sentinel::getUser()->hasAccess('marca.order'))
                                                <li @if (Request::is('marca/order')) class="active" @endif>
                                                    <a href="{{ route('marca.order') }}"><i class="fa fa-cube"></i> <span>Ordenar
                                                            Marcas</span></a>
                                                </li>
                                            @endif
                                            
                                        </ul>
                                        
                                    </li>
                                @endif

                                <li class="sub-submenu dropend ">
                                    <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"><i
                                        class="fa fa-cubes"></i>Reglas<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                    <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1"> 
                                        @if (\Sentinel::getUser()->hasAccess('params_rules'))
                                            <li @if (Request::is('params_rules*')) class="active" @endif">
                                                <a href="{{ route('params_rules.index') }}"><i
                                                        class="fa fa-edit"></i></i><span>Parámetros</span></a>
                                            </li>
                                        @endif
                                        @if (\Sentinel::getUser()->hasAccess('services_rules'))
                                            <li @if (Request::is('services_rules*')) class="active" @endif>
                                                <a href="{{ route('services_rules.index') }}"><i
                                                        class="fa fa-object-group"></i></i><span>Reglas de Servicios</span></a>
                                            </li>
                                        @endif
                                        @if (\Sentinel::getUser()->hasAccess('references_rules'))
                                            <li @if (Request::is('references*')) class="active" @endif>
                                                <a href="{{ route('references.index') }}"><i
                                                        class="fa fa-phone"></i></i><span>Referencias</span></a>
                                            </li>
                                        @endif
                                    </ul>
                                    
                                </li>

                                @if (\Sentinel::getUser()->hasAccess('depositos_boletas', 'depositos_boletas.conciliations', 'depositos_cuotas'))
                                    <li class="sub-submenu dropend ">
                                        <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"><i
                                            class="fa fa-cubes"></i>Gestor de Boletas<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1"> 
                                            <li @if (Request::is('depositos_boletas', 'depositos_boletas/*', 'screens', 'screens/*')) class="active" @endif><a
                                                    href="{{ route('depositos_boletas.index') }}"><i class="fa fa-ticket"></i>
                                                    <span>Deposito de Boletas</span></a>
                                            </li>
                                             <?php
                                                $housing = \DB::table('atms')
                                                    ->select('atms.housing_id')
                                                    ->join('points_of_sale', 'atms.id', '=', 'points_of_sale.atm_id')
                                                    ->join('branches', 'branches.id', '=', 'points_of_sale.branch_id')
                                                    ->join('venta_housing', 'atms.housing_id', '=', 'venta_housing.housing_id')
                                                    ->join('venta', 'venta.id', '=', 'venta_housing.venta_id')
                                                    ->where('branches.user_id', \Sentinel::getUser()->id)
                                                    ->where('venta.tipo_venta', 'cr')
                                                    ->first();
                                            ?>

                                            @if (!empty($housing) || (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('accounting.admin') || \Sentinel::getUser()->inRole('mantenimiento.operativo')))
                                                <li @if (Request::is('depositos_cuotas', 'depositos_cuotas/*', 'screens', 'screens/*')) class="active" @endif><a
                                                        href="{{ route('depositos_cuotas.index') }}"><i class="fa fa-tasks"></i>
                                                        <span>Pago de Cuotas</span></a>
                                                </li>

                                                @if (\Sentinel::getUser()->inRole('mini_terminal'))
                                                    <li @if (Request::is('reporting.depositos_cuotas', 'reporting.depositos_cuotas/*', 'screens', 'screens/*')) class="active" @endif>
                                                        <a href="{{ route('reporting.depositos_cuotas') }}">
                                                            <i class="fa fa-tags"></i><span>Reporte de Cuotas</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endif

                                            <?php
                                                $housing_alquiler = \DB::table('atms')
                                                    ->select('atms.housing_id')
                                                    ->join('points_of_sale', 'atms.id', '=', 'points_of_sale.atm_id')
                                                    ->join('branches', 'branches.id', '=', 'points_of_sale.branch_id')
                                                    ->join('alquiler_housing', 'atms.housing_id', '=', 'alquiler_housing.housing_id')
                                                    ->join('alquiler', 'alquiler.id', '=', 'alquiler_housing.alquiler_id')
                                                    ->where('branches.user_id', \Sentinel::getUser()->id)
                                                    ->first();
                                            ?>
                                            @if (!empty($housing_alquiler) || (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('accounting.admin') || \Sentinel::getUser()->inRole('mantenimiento.operativo')))
                                                <li @if (Request::is('depositos_alquileres', 'depositos_alquileres/*', 'screens', 'screens/*')) class="active" @endif><a
                                                        href="{{ route('depositos_alquileres.index') }}"><i class="fa fa-tasks"></i>
                                                        <span>Pago de Alquiler</span></a>
                                                </li>
                                            @endif
                                            @if (!\Sentinel::getUser()->inRole('mini_terminal') && !\Sentinel::getUser()->inRole('supervisor_miniterminal'))
                                                <li @if (Request::is('boletas_conciliations*')) class="active" @endif><a
                                                        href="{{ route('boletas.conciliations') }}"><i class="fa fa-ticket"></i>
                                                        <span>Conciliaciones de Boletas</span></a>
                                                </li>
                                            @endif

                                            <li @if (Request::is('reporting/boletas_depositos*')) class="active" @endif>
                                                <a href="{{ route('reporting.boletas_depositos') }}">
                                                    <i class="fa fa-tags"></i><span>Reporte de Depositos</span>
                                                </a>
                                            </li>

                                            <li @if (Request::is('reporting/boletas_enviadas*')) class="active" @endif>
                                                <a href="{{ route('reporting.boletas_enviadas') }}">
                                                    <i class="fa fa-tags"></i><span>Reporte de Boletas Enviadas</span>
                                                </a>
                                            </li>

                                            @if (empty($housing) || (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('accounting.admin') || \Sentinel::getUser()->inRole('mantenimiento.operativo')))
                                                <li @if (Request::is('depositos_cuotas', 'depositos_cuotas/*', 'screens', 'screens/*')) class="active" @endif>
                                                    <a href="{{ route('reporting.depositos_cuotas') }}">
                                                        <i class="fa fa-tags"></i><span>Reporte de Cuotas</span>
                                                    </a>
                                                </li>
                                            @endif

                                            @if (!empty($housing_alquiler) || (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('accounting.admin') || \Sentinel::getUser()->inRole('mantenimiento.operativo')))
                                                <li @if (Request::is('depositos_cuotas', 'depositos_cuotas/*', 'screens', 'screens/*')) class="active" @endif>
                                                    <a href="{{ route('reporting.depositos_alquileres') }}">
                                                        <i class="fa fa-tags"></i><span>Reporte de Alquiler</span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                        
                                    </li>
                                @endif

                                @if (\Sentinel::getUser()->hasAccess('cms_transactions_devolutions'))
                                    <li class="sub-submenu dropend ">
                                        <a href="#lista1" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"><i
                                            class="fa fa-cubes"></i>Devoluciones<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                        <ul class="dropdown-menu list-unstyled sub-submenu" id="lista1"> 
                                            @if (!\Sentinel::getUser()->inRole('cms_transactions_report'))

                                                <li @if (Request::is('cms_transactions_index*')) class="active" @endif>
                                                    <a href="{{ route('cms_transactions_index') }}">
                                                        <i class="fa fa-clone"></i><span>Realizar devolución</span>
                                                    </a>
                                                </li>

                                            @endif

                                            @if (!\Sentinel::getUser()->inRole('cms_transactions_report_devolution'))

                                                <li @if (Request::is('cms_transactions_index_devolutions*')) class="active" @endif>
                                                    <a href="{{ route('cms_transactions_index_devolutions') }}">
                                                        <i class="fa fa-list"></i><span>Devoluciones realizadas</span>
                                                    </a>
                                                </li>

                                            @endif

                                            @if (!\Sentinel::getUser()->inRole('cms_services_with_more_returns'))

                                                <li @if (Request::is('cms_services_with_more_returns_index*')) class="active" @endif>
                                                    <a href="{{ route('cms_services_with_more_returns_index') }}">
                                                        <i class="fa fa-list"></i><span>Servicios con más demanda</span>
                                                    </a>
                                                </li>

                                            @endif
                                        </ul>
                                        
                                    </li>
                                @endif
                                
                            </ul>
                        </li>
                    @endif

                    {{-- <li class="menu">
                        <a href="#pages" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                <span>Pages</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="dropdown-menu submenu list-unstyled" id="pages" data-bs-parent="#accordionExample">
                            <li>
                                <a href="./pages-knowledge-base.html"> Knowledge Base </a>
                            </li>
                            <li>
                                <a href="./pages-faq.html"> FAQ </a>
                            </li>
                            <li>
                                <a href="./pages-contact-us.html"> Contact Form </a>
                            </li>
                            <li>
                                <a href="./user-profile.html"> Users </a>
                            </li>
                            <li>
                                <a href="./user-account-settings.html"> Account Settings </a>
                            </li>
                            <li>
                                <a href="./pages-error404.html" target="_blank"> Error </a>
                            </li>
                            <li>
                                <a href="./pages-maintenence.html" target="_blank"> Maintanence </a>
                            </li>
                            <li class="sub-submenu dropend">
                                <a href="#login" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Sign In <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="login" data-bs-parent="#pages"> 
                                    <li>
                                        <a target="_blank" href="./auth-boxed-signin.html"> Boxed </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="./auth-cover-signin.html"> Cover </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-submenu dropend">
                                <a href="#signup" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Sign Up <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="signup" data-bs-parent="#pages"> 
                                    <li>
                                        <a target="_blank" href="./auth-boxed-signup.html"> Boxed </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="./auth-cover-signup.html"> Cover </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-submenu dropend">
                                <a href="#unlock" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Unlock <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="unlock" data-bs-parent="#pages"> 
                                    <li>
                                        <a target="_blank" href="./auth-boxed-lockscreen.html"> Boxed </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="./auth-cover-lockscreen.html"> Cover </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-submenu dropend">
                                <a href="#reset" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Reset <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="reset" data-bs-parent="#pages"> 
                                    <li>
                                        <a target="_blank" href="./auth-boxed-password-reset.html"> Boxed </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="./auth-cover-password-reset.html"> Cover </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-submenu dropend">
                                <a href="#twoStep" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Two Step <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="twoStep" data-bs-parent="#pages"> 
                                    <li>
                                        <a target="_blank" href="./auth-boxed-2-step-verification.html"> Boxed </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="./auth-cover-2-step-verification.html"> Cover </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="menu">
                        <a href="#more" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                <span>More</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="dropdown-menu submenu list-unstyled" id="more" data-bs-parent="#accordionExample">

                            <li>
                                <a href="./map-leaflet.html"> Maps </a>
                            </li>
                            <li>
                                <a href="./charts-apex.html"> Charts </a>
                            </li>
                            <li>
                                <a href="./widgets.html"> Widgets </a>
                            </li>
                            <li class="sub-submenu dropend">
                                <a href="#layouts" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed"> Layouts <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                <ul class="dropdown-menu list-unstyled sub-submenu" id="layouts" data-bs-parent="#more"> 
                                    <li>
                                        <a href="./layout-blank-page.html"> Blank Page </a>
                                    </li>
                                    <li>
                                        <a href="./layout-empty.html"> Empty Page </a>
                                    </li>
                                    <li>
                                        <a href="./layout-full-width.html"> Full Width </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a target="_blank" href="../../documentation/index.html"> Documentation </a>
                            </li>
                            <li>
                                <a target="_blank" href="../../documentation/changelog.html"> Changelog </a>
                            </li>
                            
                        </ul>
                    </li> --}}

                </ul>
                
            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!--  BEGIN BREADCRUMBS  -->
                    {{-- <div class="secondary-nav">
                        <div class="breadcrumbs-container" data-page-heading="Analytics">
                            <header class="header navbar navbar-expand-sm">
                                <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                </a>
                                <div class="d-flex breadcrumb-content">
                                    <div class="page-header">

                                        <div class="page-title"><h3>Analytics Dashboard</h3></div>

                                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                                            </ol>
                                        </nav>

                                    </div>
                                </div>
                                <ul class="navbar-nav flex-row ms-auto breadcrumb-action-dropdown">
                                    <li class="nav-item more-dropdown">
                                        <div class="dropdown  custom-dropdown-icon">
                                            <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span>Settings</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down custom-dropdown-arrow"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                            </a>
                        
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">

                                                <a class="dropdown-item" data-value="Settings" data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-settings&quot;><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;3&quot;></circle><path d=&quot;M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z&quot;></path></svg>" href="javascript:void(0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Settings
                                                </a>

                                                <a class="dropdown-item" data-value="Mail" data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-mail&quot;><path d=&quot;M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z&quot;></path><polyline points=&quot;22,6 12,13 2,6&quot;></polyline></svg>" href="javascript:void(0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> Mail
                                                </a>

                                                <a class="dropdown-item" data-value="Print" data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-printer&quot;><polyline points=&quot;6 9 6 2 18 2 18 9&quot;></polyline><path d=&quot;M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2&quot;></path><rect x=&quot;6&quot; y=&quot;14&quot; width=&quot;12&quot; height=&quot;8&quot;></rect></svg>" href="javascript:void(0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg> Print
                                                </a>

                                                <a class="dropdown-item" data-value="Download" data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-download&quot;><path d=&quot;M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4&quot;></path><polyline points=&quot;7 10 12 15 17 10&quot;></polyline><line x1=&quot;12&quot; y1=&quot;15&quot; x2=&quot;12&quot; y2=&quot;3&quot;></line></svg>" href="javascript:void(0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> Download
                                                </a>

                                                <a class="dropdown-item" data-value="Share" data-icon="<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;24&quot; height=&quot;24&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; class=&quot;feather feather-share-2&quot;><circle cx=&quot;18&quot; cy=&quot;5&quot; r=&quot;3&quot;></circle><circle cx=&quot;6&quot; cy=&quot;12&quot; r=&quot;3&quot;></circle><circle cx=&quot;18&quot; cy=&quot;19&quot; r=&quot;3&quot;></circle><line x1=&quot;8.59&quot; y1=&quot;13.51&quot; x2=&quot;15.42&quot; y2=&quot;17.49&quot;></line><line x1=&quot;15.41&quot; y1=&quot;6.51&quot; x2=&quot;8.59&quot; y2=&quot;10.49&quot;></line></svg>" href="javascript:void(0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg> Share
                                                </a>
                                                
                                            </div>
                        
                                        </div>
                                    </li>
                                </ul>
                            </header>
                        </div>
                    </div> --}}
                    <!--  END BREADCRUMBS  -->
                    
                    <div class="row layout-top-spacing">

                        @yield('content')

                    </div>

                </div>

            </div>
            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

   


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/waves/waves.min.js') }}"></script>
    <script src="{{ asset('layouts/horizontal-dark-menu/app.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    
    <script src="{{ asset('src/assets/js/scrollspyNav.js') }}"></script>

    <!-- END PAGE LEVEL SCRIPTS -->

     {{-- AGREGAR SELECT  --}}
    {{-- <script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
    <script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js') }}"></script>
    <script>
        $( document ).ready(function() {
            document.addEventListener('DOMContentLoaded', function() {
                var selects = document.querySelectorAll('.select2');
                
                selects.forEach(function(selectElement) {
                    new TomSelect(selectElement, {
                        create: true,
                        sortField: {
                            field: "text",
                            direction: "asc"
                        }
                    });
                });
            });
        });

    </script> --}}
    {{-- FIN SELECT  --}}

    

    {{-- GENERALES  --}}

    <!-- SWEET ALERT  -->
    <script src="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/sweetalerts2/custom-sweetalert.js') }}"></script>
    <!-- SWEET ALERT - FIN -->

    {{-- FIN DE GENERALES --}}
    
    {{-- @include('partials._js')  --}}

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ "/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js" }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> --}}
    <script src="/js/jquery-ui.js"></script>

    {!! Html::script('assets/js/libs/libs.js') !!}
    <!-- REQUIRED JS SCRIPTS -->
    <!-- Bootstrap 3.3.4 -->
    <script src="{{ "/bower_components/admin-lte/bootstrap/js/bootstrap.min.js" }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ "/bower_components/admin-lte/dist/js/app.min.js" }}"></script>
    <script src="{{ "/assets/js/libs/libs.js" }}"></script>
    <script>
        $(document).ready(function(){
            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            // scroll body to 0px on click
            $('#back-to-top').click(function () {
                $('#back-to-top').tooltip('hide');
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });

            $('#back-to-top').tooltip('show');
        });
        var token="{{csrf_token()}}";





    </script>
    <!--<script src="/notifications/notifications.js"></script>-->

    <?php

        $role = \Sentinel::getRoles();
        
        $user_permisos = \Sentinel::findRoleById($role[0]->id);

    ?>

    <div id="user-permisos" data-permisos="{{ json_encode($user_permisos->permissions) }}"></div>

    @yield('page_scripts')
    @yield('js')

    @include('menuItems')

    <livewire:scripts />

</body>
</html>