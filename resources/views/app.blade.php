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

    

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        {{-- NADBAR --}}

            @include('nadbar_plantilla')

        {{-- END NADBAR --}}

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

                {{-- SIDEBAR --}}

                    @include("sidebar_plantilla")

                {{-- END SIDEBAR --}}

            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">
                    
                    <div class="row layout-top-spacing">

                        @yield('content')

                        <div class="d-flex justify-content-end" style="position: fixed; bottom: 20px; right: 20px;">
                            <a id="back-to-top" href="#" class="btn bg-orange back-to-top" role="button" title="Volver arriba" data-bs-toggle="tooltip" data-bs-placement="right" style="width: 50px">
                                <span class="glyphicon glyphicon-chevron-up"></span>
                            </a>
                        </div>

                        
                    </div>

                </div>

            </div>
            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Eglobalt © <span class="dynamic-year" id="dynamic-year" ></span> <a target="_blank" href="#"></a>, Tecnología en movimineto.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">CMS <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
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

        // Obtén el elemento span con id "dynamic-year"
        var dynamicYearElement = document.getElementById("dynamic-year");

        // Obtén el año actual
        var currentYear = new Date().getFullYear();

        // Actualiza el contenido del elemento span con el año actual
        dynamicYearElement.textContent = currentYear;



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