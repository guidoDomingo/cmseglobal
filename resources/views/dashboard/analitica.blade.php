@extends('app')

@section('title')
    Dashboard
@endsection
@section('refresh')
    <meta http-equiv="refresh" content="900">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
@endsection
@section('aditional_css')
    <link type="text/css" href="/dashboard/plugins/amcharts/plugins/export/export.css" rel="stylesheet">
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES - STYLE PARA AGREGAR GRAFICOS-->
        <link href="{{ asset('src/plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
@endsection
@section('content')
    <div class="row" id="cancel-row">

        
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Servicios</h6>
                        </div>
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                    <a href="/webservices" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-content">

                        <div class="w-info">
                            {{-- <p class="value">$ 45,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p> --}}
                            <span class="service_info info-box-number" style="margin-top: 5px; margin-bottom: 5px">
                                <i class="fa fa-refresh fa-spin"></i>&nbsp;Cargando...
                                
                            </span>
                        </div>
                        
                    </div>

                    <div class="w-progress-stats">                                            
                        <div class="progress">
                            <a href="/webservices" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                        </div>

                        <div class="">
                            <div class="w-icon">
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    
        
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Saldos al Límite</h6>
                        </div>
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                    <a href="/dashboard/balances" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-content">

                        <div class="w-info">
                            {{-- <p class="value">$ 45,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p> --}}
                            <span class="balances_info info-box-number" style="margin-top: 5px; margin-bottom: 5px">
                                <i class="fa fa-refresh fa-spin"></i>&nbsp;Cargando...
                            </span>

                            

                        </div>
                        
                    </div>

                    <div class="w-progress-stats">                                            
                        <div class="progress">
                            <a href="/dashboard/balances" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                        </div>

                        <div class="">
                            <div class="w-icon">
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Ventas</h6>
                        </div>
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                        <a href="/reports/movements_affecting_extracts" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-content">

                        <div class="w-info">
                            {{-- <p class="value">$ 45,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p> --}}
                            <span class="pendiente_info info-box-number" style="margin-top: 5px; margin-bottom: 5px">
                                <i class="fa fa-refresh fa-spin"></i>&nbsp;Cargando...
                            </span>

                            

                            

                        </div>
                        
                    </div>

                    <div class="w-progress-stats">                                            
                        <div class="progress">
                                <a href="/reports/movements_affecting_extracts" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                        </div>

                        <div class="">
                            <div class="w-icon">
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Ingresos y Comprobantes Legales</h6>
                        </div>
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                        <a href="income_and_legal_documents" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-content">

                        <div class="w-info">
                            {{-- <p class="value">$ 45,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p> --}}
                            <span class="conciliations_info info-box-number" style="margin-top: 5px; margin-bottom: 5px">
                                <i class="fa fa-refresh fa-spin"></i>&nbsp;Cargando...
                            </span>

                            
                        </div>
                        
                    </div>

                    <div class="w-progress-stats">                                            
                        <div class="progress">
                            <a href="income_and_legal_documents" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                        </div>

                        <div class="">
                            <div class="w-icon">
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Transacciones</h6>
                        </div>
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                        <a href="/reports/success_zero" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-content">

                        <div class="w-info">
                            {{-- <p class="value">$ 45,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p> --}}
                            <span class="monto_cero_info info-box-number" style="margin-top: 5px; margin-bottom: 5px">
                                <i class="fa fa-refresh fa-spin"></i>&nbsp;Cargando...
                            </span>

                            
                        </div>
                        
                    </div>

                    <div class="w-progress-stats">                                            
                        <div class="progress">
                                <a href="/reports/success_zero" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                        </div>

                        <div class="">
                            <div class="w-icon">
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Transacciones Billetaje</h6>
                        </div>
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                        <a href="/reports/rollback" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-content">

                        <div class="w-info">
                            {{-- <p class="value">$ 45,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p> --}}
                            <span class="rollback_info info-box-number" style="margin-top: 5px; margin-bottom: 5px">
                                <i class="fa fa-refresh fa-spin"></i>&nbsp;Cargando...
                            </span>

                            
                        </div>
                        
                    </div>

                    <div class="w-progress-stats">                                            
                        <div class="progress">
                                <a href="/reports/rollback" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                        </div>

                        <div class="">
                            <div class="w-icon">
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Alertas</h6>
                        </div>
                        <div class="task-action">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                </a>

                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                        <a href="/reports/notifications" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-content">

                        <div class="w-info">
                            {{-- <p class="value">$ 45,141 <span>this week</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p> --}}
                            <span class="warning_info info-box-number" style="margin-top: 5px; margin-bottom: 5px">
                                Sin alertas
                            </span>

                            
                        </div>
                        
                    </div>

                    <div class="w-progress-stats">                                            
                        <div class="progress">
                                <a href="/reports/notifications" target="_blank" class="small-box-footer" style="text-align: center;">Ver Detalles <i class="fa fa-arrow-right"></i></a>
                        </div>

                        <div class="">
                            <div class="w-icon">
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
       

        <div class="col-md-6">
            @if (\Sentinel::getUser()->hasAccess('monitoreo.saldo') || \Sentinel::getUser()->inRole('superuser'))
                <div class="col-md-12" id="principal">

                </div>
            @endif
        </div>

             
        <div id="chartDonut" class="col-xl-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Donut</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="box-header">

                        <h3 class="box-title">ATMS</h3>

                        <div class="box-tools pull-right" style="cursor:pointer">
                            <!--<i id="reload_data_pie" style="margin: 10px;" class="fa fa-refresh pull-right" title="Actualizar" data-toggle="tooltip"></i>-->

                            <label class="radio-inline">
                                <input type="radio" name="redes" checked="checked" value="todos">Todos
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="redes" value="terminales">Terminales
                            </label>
                                    
                            <label class="radio-inline">
                                <input type="radio" name="redes" value="miniterminales">Miniterminales
                            </label>

                            <button class="btn btn-default" type="button" title="Actualizar" style="margin-left: 10px; background: transparent; color: #333; border:none; outline: none; border-radius: 25%; padding: 2px;" id="reload_data_pie">
                                <span class="fa fa-refresh"></span>
                            </button>
                        </div>

                    </div>

                    <div id="donut-chart" class=""></div>
                </div>
            </div>
        </div> 

        
         @if (\Sentinel::getUser()->hasAccess('superuser') and \Sentinel::getUser()->hasAccess('monitoreo.transacciones'))
            <div id="chartArea" class="col-xl-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 id="text1"></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5" style="margin:15px 10px; text-align: center">
                                <label class="radio-inline">
                                    <input type="radio" name="report" checked="checked" value="daily">Diario
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="report" value="weekly">Semanal
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="report" value="monthly">Mensual
                                </label>
                            </div>
                            <div class="col-md-6" style="margin:10px;">
                                <div class="input-group">
                                    {{-- <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div> --}}
                                    {{-- <input readonly="readonly" name="reservationtime" type="text" id="reservationtime" class="form-control pull-right" /> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <span class="grafico-sipin"><i class="fa fa-refresh fa-spin "></i>&nbsp;Cargando...</span>
                        <div id="s-line" class=""></div>
                    </div>
                </div>
            </div>
         @endif
       

        {{-- <div id="chartArea" class="col-xl-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Simple Area</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="s-line-area" class=""></div>
                </div>
            </div>
        </div>

        <div id="chartColumn" class="col-xl-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Simple Column</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="s-col" class=""></div>

                </div>
            </div>
        </div> --}}

        {{-- <div id="chartColumnStacked" class="col-xl-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Simple Column Stacked</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="s-col-stacked" class=""></div>
                </div>
            </div>
        </div> --}}

        {{-- <div id="chartBar" class="col-xl-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Simple Bar</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="s-bar" class=""></div>
                </div>
            </div>
        </div>

        <div id="chartMixed" class="col-xl-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Mixed</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="mixed-chart" class=""></div>
                </div>
            </div>
        </div> --}}

       

        {{-- <div id="chartRadial" class="col-xl-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Radial</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div id="radial-chart" class=""></div>
                </div>
            </div>
        </div> --}}
@endsection



@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS - SCRIPT PARA AGREGAR GRAFICOS -->
        <script src="{{ asset('src/plugins/src/apex/apexcharts.min.js') }}"></script>
        <script src="{{ asset('src/assets/js/dashboard/dash_1.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script>

        let redes = "Todos";
        let frecuency = "daily";
        let donut;  // Declara la instancia del gráfico aquí
        let grafico_sline;
        let grafico_scolstacked;

        /* donut-chart   */
       

        $('input[name=redes]').click(function() {
            redes = $(this).val();
            grafico_torta();
        });

        grafico_torta();

        function grafico_torta(){
            $.post("/dashboard/atms_general", {_redes: redes },function(data) {
                var valores = data.result.data;
                let dataArray = Object.keys(valores).map(key => {
                    return {
                        estado: key,
                        valor: valores[key]
                    };
                });

                // Si la instancia del gráfico ya existe, simplemente actualiza los datos
                if (donut) {
                    donut.updateSeries(dataArray.map(item => item.valor));
                } else {
                    // Si la instancia no existe, crea el gráfico por primera vez
                    var donutChart = {
                        chart: {
                            height: 350,
                            type: 'donut',
                            toolbar: {
                                show: false,
                            }
                        },
                        series: dataArray.map(item => item.valor),
                        labels: dataArray.map(item => item.estado),
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    }

                    donut = new ApexCharts(document.querySelector("#donut-chart"), donutChart);
                    donut.render();
                }
                
            }).error(function(){
                console.log("errorrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr");
            });
        }


        /* FIN DONOUT CHART */
        

        /* POR FRECUENCIA */

            $('input[name=report]').click(function() {
                console.log($(this).val());
                frecuency = $(this).val();
                grafico_linea();
            });

            grafico_linea();


            function grafico_linea(){
          
                $('.grafico-sipin').show();
                $.post("/dashboard/transactions", {_token: token , _frecuency: frecuency},function(data) {
             
                    // Obtener datos de transacciones
                    var transactions = data.result.data;

                    console.log(transactions, data.result.dates);
                    
                    // Actualiza tu gráfico aquí con la información de transactions
                    
                    updateSLineChart(transactions,data.result.dates);
                    //updateSColStackedChart(data.result.data,data.result.dates);
                    
                    $('.grafico-sipin').hide();
                            
                    }).error(function(){
                
                    console.log("fallooooo");
                });
            }

            function updateSLineChart(transactions, dates) {
                console.log(transactions);
                document.getElementById("text1").innerHTML = dates;

                let transformedData = transformTransactionsToSeries(transactions);

                if (grafico_sline) {
                    grafico_sline.updateSeries(transformedData.series);
                    grafico_sline.updateOptions({
                        xaxis: {
                            categories: transformedData.categories
                        }
                    });
                } else {
                    var sline = {
                        chart: {
                            height: 350,
                            type: 'line',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false,
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'straight'
                        },
                        series: transformedData.series,
                        title: {
                            text: 'Estado de transacciones',
                            align: 'left'
                        },
                        grid: {
                            row: {
                                colors: ['#f1f2f3', 'transparent'], // takes an array which will be repeated on columns
                                opacity: 0.5
                            },
                        },
                        xaxis: {
                            categories: transformedData.categories,
                        }
                    }

                    console.log(sline);

                    grafico_sline = new ApexCharts(
                        document.querySelector("#s-line"),
                        sline
                    );

                    grafico_sline.render();
                }
            }
            
           

            function transformTransactionsToSeries(transactions) {
                let categories = [];
                let Iniciadas = [];
                let Exitosas = [];
                let Error = [];
                let Canceladas = [];

                transactions.forEach(transaction => {
                    categories.push(transaction.category);
                    Iniciadas.push(transaction.Iniciadas);
                    Exitosas.push(transaction.Exitosas);
                    Error.push(transaction.Error);
                    Canceladas.push(transaction.Canceladas);
                });

                return {
                    categories: categories,
                    series: [
                        { name: 'Iniciadas', data: Iniciadas },
                        { name: 'Exitosas', data: Exitosas },
                        { name: 'Error', data: Error },
                        { name: 'Canceladas', data: Canceladas }
                    ]
                };
            }

            /*
            function transformTransactionsToSeries(transactions) {
                let categories = [];
                let Iniciadas = [];
                let Exitosas = [];
                let Error = [];
                let Canceladas = [];

                transactions.forEach(transaction => {
                    categories.push(transaction.category);
                    Iniciadas.push(transaction.Iniciadas);
                    Exitosas.push(transaction.Exitosas);
                    Error.push(transaction.Error);
                    Canceladas.push(transaction.Canceladas);
                });

                return {
                    categories: categories,
                    series: [
                        { name: 'Iniciadas', data: Iniciadas },
                        { name: 'Exitosas', data: Exitosas },
                        { name: 'Error', data: Error },
                        { name: 'Canceladas', data: Canceladas }
                    ]
                };
            }
            */

           



        /*FIN POR FRECUENCIA */

        /*STACKET */
        
        

        function updateSColStackedChart(transactions,dates) {
            console.log(transactions);
            let transformedData = transformTransactionsToSeries(transactions);
            console.log(transformedData);
            if (grafico_scolstacked) {
                grafico_scolstacked.updateOptions({
                    series: transformedData.series,
                    xaxis: {
                        categories: transformedData.categories
                    }
                });
            } else {
                var sColStacked = {
                    chart: {
                        height: 350,
                        type: 'bar',
                        stacked: true,
                        toolbar: {
                            show: false,
                        }
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            legend: {
                                position: 'bottom',
                                offsetX: -10,
                                offsetY: 0
                            }
                        }
                    }],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                        },
                    },
                    series: transformedData.series,
                    xaxis: {
                        categories: transformedData.categories,
                    },
                    legend: {
                        position: 'right',
                        offsetY: 40
                    },
                    fill: {
                        opacity: 1
                    },
                };

                grafico_scolstacked = new ApexCharts(
                    document.querySelector("#s-col-stacked"),
                    sColStacked
                );

                grafico_scolstacked.render();
            }
        }


        /*FIN STACKET */

   

     
    </script>

    {{-- SCRIPTS DEL DASHBOARD PRINCIPAL --}}

    <script>

        var $errorHtml = '<div title="Error al consultar" class="animated fadeIn text-center"><i class="fa fa-exclamation-triangle"></i><br></div>';
        var urlGetDetalle = '/dashboard/atms_detalles/';

        var dashboard =  {
            main:{
                elements:{
                    atms: function(){
                        $.post("/dashboard/atms", {_token: token }, function( data ) {
                            if(data.status){
                                $(".atm_info").html(data.result.message);
                            }else{
                                $(".atm_info").html("");
                            }

                        }).error(function(){
                            $(".atm_info").html($errorHtml);
                        });


                    },
                    services: function(){
                        $.post("/dashboard/services", {_token: token }, function( data ) {

                            if(data.status){
                                $(".service_info").html(data.result.message);
                            }else{
                                $(".service_info").html("");
                            }

                        }).error(function(){
                            $(".service_info").html($errorHtml);
                        });
                    },
                    atm_balances: function(){
                        $.post("/dashboard/balances", {_token: token }, function( data ) {

                            if(data.status){
                                $(".balances_info").html(data.result.message);
                            }else{
                                $(".balances_info").html("");
                            }

                        }).error(function(){
                            $(".balances_info").html($errorHtml);
                        });
                    },
                    warnings:function(){
                        /*

                        Comentado porque explota: 

                        $.post("/dashboard/warnings", {_token: token }, function( data ) {

                            if(data.status){
                                $(".warning_info").html(data.result.message);
                            }else{
                                $(".warning_info").html("");
                            }

                        }).error(function(){
                            $(".warning_info_info").html($errorHtml);
                        });
                        */
                    },
                    rollback:function(){
                        $.post("/dashboard/rollback", {_token: token }, function( data ) {

                            if(data.status){
                                $(".rollback_info").html(data.result.message);
                            }else{
                                $(".rollback_info").html("");
                            }

                        }).error(function(){
                            $(".rollback_info").html($errorHtml);
                        });
                    },
                    montoCero:function(){
                        $.post("/dashboard/montoCero", {_token: token }, function( data ) {

                            if(data.status){
                                $(".monto_cero_info").html(data.result.message);
                            }else{
                                $(".monto_cero_info").html("");
                            }

                        }).error(function(){
                            $(".monto_cero_info").html($errorHtml);
                        });
                    },
                    pendiente:function(){
                        $.post("/dashboard/pendiente", {_token: token }, function( data ) {

                            if(data.status){
                                $(".pendiente_info").html(data.result.message);
                            }else{
                                $(".pendiente_info").html("");
                            }

                        }).error(function(){
                            $(".pendiente_info").html($errorHtml);
                        });
                    },
                    conciliations:function(){
                        $.post("/dashboard/conciliations", {_token: token }, function( data ) {

                            if(data.status){
                                $(".conciliations_info").html(data.result.message);
                            }else{
                                $(".conciliations_info").html("");
                            }

                        }).error(function(){
                            $(".conciliations_info").html($errorHtml);
                        });
                    },
                    /*
                    transactions:function(frecuency){
                        $("#graph_spinn").show();  
                        $("#chartdiv").hide(); 
                        $.post("/dashboard/transactions", {_token: token, _frecuency: frecuency},function(data) {
                            console.log(frecuency); 
                            if(data.status){
                                graphs.lines('title',data.result.data)
                                $("#graph-title").html(data.result.dates);
                                $("#graph_spinn").hide();
                                $("#chartdiv").show(); 
                            }else{
                                $("#chartdiv").html($errorHtml);
                            }

                            console.log('hizo pos');
                        }).error(function(){
                    
                            $("#chartdiv").html($errorHtml);
                        });


                    },
                    */
                    refresh:function(){
                        $("#keys_content").hide();
                        $("#keys_spinn").show();
                        $.post("/dashboard/keys", {_token: token }, function( data ) {
                            if(data.status){
                                $("#keys_spinn").hide();
                                $("#keys_content").html(data.result.message);
                                $("#keys_content").show();
                            }else{
                                $("#keys_spinn").hide();
                                $(".keys_content").html("");
                                $("#keys_content").show();
                            }

                        }).error(function(){
                            $("#keys_spinn").hide();
                            $(".keys_content").html($errorHtml);
                            $("#keys_content").show();
                        });
                    },
                    showkey:function(key_id){
                        var key_pass    = '#pass_'+key_id;
                        var key_eye     = '#eye_'+key_id;
                        var key_forb     = '#forb_'+key_id;
                        $.post("/dashboard/show_keys", {_token: token,_key_id: key_id }, function( data ) {
                            if(data.status){
                                $(key_pass).html(data.result.message);
                                $(key_eye).hide();
                                if(data.result == -213){
                                    $(key_forb).show();
                                }
                            }else{
                                $(key_pass).html('Error');
                                $(key_eye).hide();
                            }
                        });
                    },
                    refreshAtm:function(id){
                        $("#retiro_content").hide();
                        $("#retiro_spinn").show();
                        $.post("/dashboard/atmsView", {_token: token, id: id }, function( data ) {
                            if(data.status){
                                $("#retiro_spinn").hide();
                                $("#retiro_content").html(data.result.message);
                                $("#retiro_content").show();
                            }else{
                                $("#retiro_spinn").hide();
                                $(".retiro_content").html("");
                                $("#retiro_content").show();
                            }

                        }).error(function(){
                            $("#retiro_spinn").hide();
                            $(".retiro_content").html($errorHtml);
                            $("#retiro_content").show();
                        });
                    },
                    /*
                    atms_general:function(redes){                
                        $("#graficoAtm").hide();
                        $("#atm_spinn").show();

                        $.post("/dashboard/atms_general", {_token: token, _redes: redes },function(data) {
                            var valores = data.result.data;

                            var chart = AmCharts.makeChart("graficoAtm", {
                                // "language": "es",
                                "type": "pie",
                                "startDuration": 0,
                                "pullOutDuration": 0,
                                "pullOutRadius": 0,
                                "radius": 80,
                                "theme": "none",
                                "addClassNames": true,
                                "legend":{
                                    "position":"bottom",
                                    "autoMargins":true
                                },
                                "colorField": "color",
                                "innerRadius": "20%",
                                "fontFamily": "Helvetica",
                                "defs": {
                                    "filter": [{
                                        "id": "shadow",
                                        "width": "200%",
                                        "height": "200%",
                                        "feOffset": {
                                            "result": "offOut",
                                            "in": "SourceAlpha",
                                            "dx": 0,
                                            "dy": 0
                                        },
                                        "feGaussianBlur": {
                                            "result": "blurOut",
                                            "in": "offOut",
                                            "stdDeviation": 5
                                        },
                                        "feBlend": {
                                            "in": "SourceGraphic",
                                            "in2": "blurOut",
                                            "mode": "normal"
                                        }
                                    }]
                                },
                                "dataProvider": [
                                    {
                                        "estado": "Cap. Máxima",
                                        "minutos": valores.capacidad_maxima,
                                        "color": "#00008e",
                                        "param": "capacidad_maxima"
                                    }, 
                                    {
                                        "estado": "Cant. Mínima",
                                        "minutos": valores.cantidad_minima,
                                        "color": "#00b8ef",
                                        "param": "cantidad_minima"
                                    },
                                    {
                                        "estado": "Online",
                                        "minutos": valores.online,
                                        "color": "#0A8B19",
                                        "param": "online"
                                    }, 
                                    {
                                        "estado": "Offline",
                                        "minutos": valores.offline,
                                        "color": "#FDB504",
                                        "param": "offline"
                                    }, 
                                    {
                                        "estado": "Suspendido",
                                        "minutos": valores.suspendido,
                                        "color": "#FD0404",
                                        "param": "suspendido"
                                    },
                                    {
                                        "estado": "Bloqueados",
                                        "minutos": valores.bloqueados,
                                        "color": "#770000",
                                        "param": "bloqueados"
                                    }, 
                                ],
                                "valueField": "minutos",
                                "titleField": "estado",
                                "export": {
                                    "enabled": true,
                                    "label": "Exportar",
                                }
                            });

                        

                            chart.addListener("clickSlice", handleClick);

                            function handleClick(e)
                            {
                                if(e.dataItem.dataContext.param == 'capacidad_maxima'){
                                    $('.actual').show();
                                    $('.maxima').show();
                                }else{
                                    $('.maxima').hide();
                                    $('.actual').hide();
                                }

                                $("#modal-contenido").html('');
                                $("#modal-footer").html('');
                                console.log(urlGetDetalle+e.dataItem.dataContext.param+'/'+redes);
                                $.get(urlGetDetalle+e.dataItem.dataContext.param+'/'+redes, 
                                {
                                    status: e.dataItem.dataContext.param,
                                    redes: redes
                                },
                                function(data) {
                                    $("#modal-contenido").html(data.modal_contenido);
                                    $("#modal-footer").html(data.modal_footer);
                                    $("#modalDetalleAtms").modal('show');
                                });
                            }
                            $("#atm_spinn").hide();
                            $("#graficoAtm").show();
                        }).error(function(){
                            $("#modal-contenido").html($errorHtml);
                        });
                    }
                    */
                    
                    balance_online: function(){
                        $.post("/dashboard/balance_online", {_token: token }, function( data ) {
                            console.log(data);

                            var principal_html = '';
                            var bg_class = 'gray';
                            var epin_estado = 'Error en la consulta';
                            var credit_online = 'Sin información';
                            var moneda = 'Sin información';

                            if(data.status) {

                                credit_online = data.result.data.credit;
                                moneda = data.result.data.moneda;

                                if(data.result.data.valor > 30000000) {

                                    bg_class = 'green';
                                    epin_estado = 'Estado: OK';

                                } else if(data.result.data.valor <= 30000000 && data.result.data.valor > 20000000) {

                                    bg_class = 'yellow';
                                    epin_estado = 'Estado: Saldo bajo';

                                } else if(data.result.data.valor <= 20000000 && data.result.data.valor > 5000000) {

                                    bg_class = 'orange';
                                    epin_estado = 'Estado: Crítico';

                                } else if(data.result.data.valor >= 0 && data.result.data.valor <= 5000000){

                                    bg_class = 'red';
                                    epin_estado = 'Estado: Sin saldo';

                                }

                            }

                            principal_html += '<div class="small-box bg-' + bg_class + '" style="border-radius: 15px;">';
                            principal_html += '     <div class="inner" style="padding: 20px">';
                            principal_html += '         <h3 class="credit_online">' + credit_online + '</h3>';
                            principal_html += '         <h4 class="moneda">' + moneda + '</h4>';
                            principal_html += '     </div>';
                            principal_html += '     <div class="icon" style="margin-top: 60px; margin-right: 10px;">';
                            principal_html += '         <i class="fa fa-money"></i>';
                            principal_html += '     </div>';
                            principal_html += '     <h4 class="small-box-footer">Saldo EPIN ( ' + epin_estado + ' )</h4>';
                            principal_html += '</div>';

                            $('#principal').append(principal_html);

                        }).error(function(){
                            $(".atm_info").html($errorHtml);
                        });


                    },
                },
                load:function(){

                    @if (\Sentinel::getUser()->hasAccess('monitoreo.saldo') || \Sentinel::getUser()->inRole('superuser'))
                        dashboard.main.elements.balance_online();
                    @endif

                    @if (\Sentinel::getUser()->hasAccess('monitoreo.atms'))
                        dashboard.main.elements.atms();
                    @endif

                    @if (\Sentinel::getUser()->hasAccess('monitoreo.servicios'))
                        dashboard.main.elements.services();
                    @endif

                    @if (\Sentinel::getUser()->hasAccess('monitoreo.saldos'))
                        dashboard.main.elements.atm_balances();
                    @endif

                    @if (\Sentinel::getUser()->hasAccess('monitoreo.alertas'))
                        dashboard.main.elements.warnings();
                    @endif

                    @if (\Sentinel::getUser()->hasAccess('monitoreo.billetaje'))
                        dashboard.main.elements.rollback();
                    @endif

                    @if (\Sentinel::getUser()->hasAccess('monitoreo.transacionmontocero'))
                        dashboard.main.elements.montoCero();
                    @endif

                    @if (\Sentinel::getUser()->hasAccess('monitoreo.ventasPendientesExtractos'))
                        dashboard.main.elements.pendiente();
                    @endif

                    @if (\Sentinel::getUser()->hasAccess('monitoreo.conciliaciones'))
                        dashboard.main.elements.conciliations();
                    @endif

                    //Se agrega esta validación solo para que el super user pueda ver esta información
                    @if (\Sentinel::getUser()->hasAccess('superuser') and \Sentinel::getUser()->hasAccess('monitoreo.transacciones'))
                        dashboard.main.elements.transactions('daily');
                    @endif

                    @if (\Sentinel::getUser()->hasAccess('mantenimiento.clave'))
                        dashboard.main.elements.refresh();
                    @endif

                    @if (\Sentinel::getUser()->hasAccess('minis_cashout_devolucion_vuelto'))
                        dashboard.main.elements.refreshAtm();
                    @endif

                    @if (\Sentinel::getUser()->hasAccess('monitoreo.atms'))
                        dashboard.main.elements.atms_general('todos');
                    @endif

                }
            }
        };

        dashboard.main.load();

    </script>
   


@endsection
