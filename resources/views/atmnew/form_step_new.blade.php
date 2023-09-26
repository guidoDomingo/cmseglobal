@extends('app')

@section('title')
    Nuevo ATM v2
@endsection
@section('content')
    <section class="content-header">
        <h1>
            ABM miniterminales
            <small>Creación de ATM versión 2</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Atms</a></li>
            <li class="active">agregar</li>
        </ol>
    </section>
    <section class="content">
         
        {{-- step headers --}}
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel ">
                            <div class="stepwizard-step col-md-1">
                                <button href="#step-1" type="button" class="btn btn-success btn-circle">1</button>
                                <p>Comercial</p>
                            </div>
                            <div class="stepwizard-step col-md-2">
                                <button href="#step-2" type="button" class="btn btn-default btn-circle">2</button>
                                <p>Legales</p>
                            </div>
                            <div class="stepwizard-step col-md-2">
                                <button href="#step-3" type="button" class="btn btn-default btn-circle">3</button>
                                <p>Sistemas - Antell</p>
                            </div>
                            <div class="stepwizard-step col-md-2">
                                <button href="#step-4" type="button" class="btn btn-default btn-circle">4</button>
                                <p>Fraude - Antell</p>
                            </div>
                            <div class="stepwizard-step col-md-1">
                                <button href="#step-5" type="button" class="btn btn-default btn-circle">5</button>
                                <p>Contabilidad</p>
                            </div>
                            <div class="stepwizard-step col-md-2">
                                <button href="#step-6" type="button" class="btn btn-default btn-circle">6</button>
                                <p>Logísticas</p>
                            </div>
                            <div class="stepwizard-step col-md-2">
                                <button href="#step-7" type="button" class="btn btn-default btn-circle">7</button>
                                <p>Sistemas - EGT</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary setup-content" id="step-1">
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">ÁREA COMERCIAL</h3>
                    </div>
                    <div class="p-3">
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">ATM</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false">PUNTOS DE VENTAS</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="myTabsContent">
                        @if (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('atms_v2.area_comercial') || \Sentinel::getUser()->inRole('atms_v2.area_eglobalt'))
                            <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab1-tab">
                                @if (session('info'))
                                    <div class="alert alert-success">
                                        {{ session('info') }}
                                    </div>
                                @endif
                                @include('partials._messages')
                                {!! Form::open(['route' => 'atmnew.store', 'method' => 'POST', 'role' => 'form', 'id' => 'nuevoAtm-form']) !!}
                                    @include('atmnew.partials.step_fields_1')
                                    {!! Form::hidden('abm','v2') !!}
                                <a class="btn btn-default" href="{{ route('atmnew.index') }}" role="button">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Siguiente</button>
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tab2-tab">
                                @include('partials._messages')
                                {!! Form::open(['route' => 'pos.store', 'method' => 'POST', 'role' => 'form', 'id' => 'nuevoPos-form']) !!}
                                    @include('pos.partials.step_fields_2')
                                    {!! Form::hidden('abm','v2') !!}
                                <div class="mt-3">
                                    <a class="btn btn-default" href="#step-1" role="button">Atras</a>
                                    <button type="submit" class="btn btn-primary" id="btnGuardarPos">Guardar</button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        @else
                            <div class="text-center">
                                <h2>Acceso no autorizado</h2>
                            </div>
                            <div class="mt-3">
                                <a class="btn btn-primary" href="{{route('atmnew.index')}}" role="button">Salir</a>
                            </div>
                        @endif
                    </div>
                </div>

                </div>
                <div class="setup-content " id="step-2" style="background-color: #191E3A">
                    <div class="position-relative">
                        <i class="fa fa-refresh fa-spin position-absolute top-50 start-50 translate-middle"></i>
                    </div>
                    <div class="d-flex justify-content-center border-bottom py-2">
                        <h3>ÁREA LEGALES</h3>
                    </div>
                    <div class="p-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="contratos-tab" data-bs-toggle="tab" href="#tab_3" role="tab">CONTRATOS</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="polizas-tab" data-bs-toggle="tab" href="#tab_4" role="tab">PÓLIZAS</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            @if (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('atms_v2.area_legales') || \Sentinel::getUser()->inRole('atms_v2.area_eglobalt'))
                                <div class="tab-pane fade show active" id="tab_3" role="tabpanel">
                                    <div class="p-3">
                                        @include('partials._messages')
                                        {!! Form::open(['route' => 'contracts.store', 'method' => 'POST', 'role' => 'form', 'id' => 'nuevoContrato-form', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                                            @include('contratos.partials.fields')
                                            {!! Form::hidden('abm','v2') !!}
                                    </div>
                                    <div class="d-flex justify-content-between p-3 border-top">
                                        <a class="btn btn-default atras" href="#step-1" role="button">Atras</a>
                                        <button type="submit" class="btn btn-primary btnNext">Siguiente</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="tab-pane fade" id="tab_4" role="tabpanel">
                                    <div class="p-3">
                                        @include('partials._messages')
                                        {!! Form::open(['route' => 'insurances.store', 'method' => 'POST', 'role' => 'form', 'id' => 'nuevaPoliza-form']) !!}
                                            @include('polizas.partials.fields')
                                            {!! Form::hidden('abm','v2') !!}
                                    </div>
                                    <div class="d-flex justify-content-between p-3 border-top">
                                        <a class="btn btn-default atras" href="#tab_3" role="button">Atras</a>
                                        <button type="submit" class="btn btn-primary btnNext" id="btnGuardarPoliza">Guardar</button>
                                        {{-- <button class="btn btn-warning" id="btnOmitirPoliza">Omitir</button> --}}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            @else
                                <div class="d-flex justify-content-center border-bottom py-2">
                                    <h2>Acceso no autorizado</h2>
                                </div>
                                <div class="d-flex justify-content-center p-3 border-top">
                                    <a class="btn btn-primary" href="{{route('atmnew.index')}}" role="button">Salir</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
  
                <div class="setup-content" id="step-3" style="background-color: #191E3A">
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-header with-border text-center">
                        <h3 class="box-title">ÁREA DE SISTEMAS - ANTELL</h3>
                    </div>
                    <div class="box-body " >
                        <div class="nav-tabs-custom" style="background-color: #191E3A">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_5" data-bs-toggle="tab">CREDENCIALES ONDANET</a></li>
                            </ul>
                            <div class="tab-content">
                                @if (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('atms_v2.area_antell') || \Sentinel::getUser()->inRole('atms_v2.area_eglobalt'))
                                    <div class="tab-pane active" id="tab_5">
                                        <div class="box-body">
                                            @include('partials._messages')
                                            {!! Form::open(['route' => 'credentials.ondanet', 'method' => 'POST', 'role' => 'form', 'id' => 'nuevaCredencialOndanet-form']) !!}
                                            @include('atmnew.partials.step_fields_credentials_ondanet')
                                        </div>
                                        <div class="box-footer">
                                            <a class="btn btn-default atras" href="#step-1" role="button">Atras</a>
                                            <button type="submit" class="btn btn-primary btnNext" id="btnGuardarCredencialOndanet">Siguiente</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                @else
                                    <div class="box-header with-border text-center">
                                        <h2>Acceso no autorizado</h2>
                                    </div>
                                    <div class="box-footer">
                                        <a class="btn btn-primary" href="{{route('atmnew.index')}}" role="button">Salir</a>
                                    </div>
                                @endif                             
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="box box-primary setup-content" id="step-4">
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">ÁREA DE FRAUDE - ANTELL</h3>
                    </div>
                    <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab6-tab" data-bs-toggle="tab" href="#tab_6">CREDENCIALES MOMO</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            @if (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('atms_v2.area_fraude') || \Sentinel::getUser()->inRole('atms_v2.area_eglobalt'))
                                <div class="tab-pane fade show active" id="tab_6">
                                    <div class="box-body">

                                        @include('partials._messages')
                                        {!! Form::open(['route' => ['atmnew.credentials.store', 123], 'method' => 'POST', 'role' => 'form', 'id' => 'nuevaCredencial-form']) !!}

                                        <div class="form-group mb-3">
                                            @if(isset($webservices))
                                                {!! Form::label('service_id', 'Proveedor', ['class' => 'form-label']) !!}
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fa fa-sitemap"></i></span>
                                                    {!! Form::select('service_id', $webservices, 6, ['class' => 'form-control', 'placeholder' => 'Seleccione un Proveedor...', 'disabled']) !!}
                                                </div>
                                            @endif
                                        </div>

                                        <div id="user_form" class="row">
                                            <div class="col-md-6 mb-3">
                                                {!! Form::label('user', 'Usuario', ['class' => 'form-label']) !!}
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                    {!! Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'Usuario']) !!}
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                {!! Form::label('password', 'Contraseña', ['class' => 'form-label']) !!}
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                                    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        {!! Form::hidden('abm', 'v2') !!}
                                    </div>
                                    <div class="box-footer d-flex justify-content-between">
                                        <a class="btn btn-default" href="#step-1" role="button">Atras</a>
                                        <button type="submit" class="btn btn-primary" id="btnGuardarCredencial">Siguiente</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            @else
                                <div class="box-header with-border text-center">
                                    <h2>Acceso no autorizado</h2>
                                </div>
                                <div class="box-footer d-flex justify-content-center">
                                    <a class="btn btn-primary" href="{{route('atmnew.index')}}" role="button">Salir</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                </div>
                <div class="box-primary setup-content" id="step-5">
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">ÁREA CONTABILIDAD</h3>
                    </div>
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_6" data-toggle="tab">Nuevo Comprobante - PDV </a></li>
                            </ul>
                            <div class="tab-content">
                                @if (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('atms_v2.area_contabilidad') || \Sentinel::getUser()->inRole('atms_v2.area_eglobalt'))
                                    <div class="tab-pane active" id="tab_6">
                                        <div class="box-body">
                                            @include('partials._messages')
                                            {!! Form::open(['route' => ['pointsofsale.vouchers.store', 0], 'method' => 'POST', 'role' => 'form', 'id' => 'nuevoComprobante-form']) !!}
                                            @include('posvouchers.partials.step_fields_3')
                                            {!! Form::hidden('abm','v2') !!}
                                        </div>
                                        <div class="box-footer">
                                            <a class="btn btn-default atras" href="#step-2" role="button">Atras</a>
                                            <button type="submit" class="btn btn-primary"
                                                id="btnGuardarComprobante">Siguiente</button>
                                            <button class="btn btn-warning" id="btnOmitirPdv">Omitir</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                @else
                                    <div class="box-header with-border" style="text-align: center">
                                        <h2>Acceso no autorizado</h2>
                                    </div>
                                    <div class="box-footer">
                                        <a class="btn btn-primary" href="{{route('atmnew.index')}}" role="button">Salir</a>
                                    </div>
                                @endif                      
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-primary setup-content" id="step-6">
                    <div class="position-relative">
                        <div class="spinner-border text-primary d-none" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div class="box-header with-border text-center">
                        <h3>ÁREA DE LOGÍSTICAS <span id='labelRed'></span></h3>
                    </div>
                    @if (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('atms_v2.area_logisticas') || \Sentinel::getUser()->inRole('atms_v2.area_eglobalt'))
                        <div class="box-body">
                            @include('partials._messages')
                            {!! Form::open(['route' => 'netconections.store', 'method' => 'POST', 'role' => 'form', 'id' => 'nuevoLogistica-form']) !!}
                            {!! Form::hidden('abm','v2') !!}
                            @include('network_conection.partials.fields')
                        </div>
                        <div class="box-footer d-flex justify-content-between">
                            <a class="btn btn-default" role="button">Atras</a>
                            <button type="submit" class="btn btn-primary" id="btnGuardarLogistica">Siguiente</button>
                        </div>
                        {!! Form::close() !!}
                    @else
                        <div class="box-header with-border text-center">
                            <h2>Acceso no autorizado</h2>
                        </div>
                        <div class="box-footer d-flex justify-content-center">
                            <a class="btn btn-primary" href="{{route('atmnew.index')}}" role="button">Salir</a>
                        </div>
                    @endif
                </div>

                <div class="box-primary setup-content" id="step-7">
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                    <div class="box-header with-border" style="text-align: center">
                        <h3 class="box-title">ÁREA SISTEMAS - EGLOBALT <span id='labelRed'></span></h3>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Asignar Aplicación</h3>
                    </div>
                    @if (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('atms_v2.area_eglobalt'))
                        <div class="box-body">
                            @include('partials._messages')

                            {!! Form::open(['route' => ['applicationsnew.assign_atm', 0], 'method' => 'POST', 'role' => 'form', 'id' => 'asignarAplicacion-form']) !!}
                            @include('atmnew.partials.step_fields_4')
                            {!! Form::hidden('abm','v2') !!}
                        </div>
                        <div class="box-footer">
                            <a class="btn btn-default atras" href="#step-3" role="button">Atras</a>
                            <button type="submit" class="btn btn-primary" id="btnGuardarAplicacion">Siguiente</button>
                        </div>
                        {!! Form::close() !!}
                    @else
                        <div class="box-header with-border" style="text-align: center">
                            <h2>Acceso no autorizado</h2>
                        </div>
                        <div class="box-footer">
                            <a class="btn btn-primary" href="{{route('atmnew.index')}}" role="button">Salir</a>
                        </div>
                    @endif
                </div>
                
                @include('atmnew.partials.generate_hash')
            </div>
        </div>

       
    </section>

    
    

@endsection

@section('js')

        {{-- AGREGAR SELECT  --}}
    <script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
    <script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                 new TomSelect(".selecttom",{
                  create: true,
                   sortField: {
                   field: "text",
                    direction: "asc"
                }
                });
         });

        


    </script>
 {{-- FIN SELECT  --}}

    <!--  BEGIN CUSTOM SCRIPT FILE  -->

    <script src="{{ asset('src/plugins/src/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
 
    @include('atmnew.partials.js._js_scripts')

 
       
@endsection


@section('aditional_css')
   
<!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('src/assets/css/light/components/carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/light/components/tabs.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('src/assets/css/dark/components/carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/components/tabs.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('src/plugins/src/filepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">
    <link href="{{ asset('src/plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
     {{-- PARA AGREGAR SELECT  --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/tomSelect/custom-tomSelect.css') }}">
    {{-- FIN DE SELECT  --}}
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/bower_components/admin-lte/plugins/pnotify/pnotify.custom.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        /* Latest compiled and minified CSS included as External Resource*/
        /* Optional theme */

        /*@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css');*/
        .stepwizard-step p {
            margin-top: 0px;
            color: #666;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            /*opacity: 1 !important;
                filter: alpha(opacity=100) !important;*/
        }

        .stepwizard .btn.disabled,
        .stepwizard .btn[disabled],
        .stepwizard fieldset[disabled] .btn {
            opacity: 1 !important;
            color: #bbb;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

        /* animacion del boton al guardar */
        .spinner {
            display: inline-block;
            opacity: 0;
            width: 0;

            -webkit-transition: opacity 0.25s, width 0.25s;
            -moz-transition: opacity 0.25s, width 0.25s;
            -o-transition: opacity 0.25s, width 0.25s;
            transition: opacity 0.25s, width 0.25s;
        }

        .has-spinner.active {
            cursor: progress;
        }

        .has-spinner.active .spinner {
            opacity: 1;
            width: auto;
            /* This doesn't work, just fix for unkown width elements */
        }

        .has-spinner.btn-mini.active .spinner {
            width: 10px;
        }

        .has-spinner.btn-small.active .spinner {
            width: 13px;
        }

        .has-spinner.btn.active .spinner {
            width: 16px;
        }

        .has-spinner.btn-large.active .spinner {
            width: 19px;
        }

    </style>
    <style>
        label span {
            font-size: 1rem;
        }

        label.error {
            color: red;
            font-size: 1rem;
            display: block;
            margin-top: 5px;
        }

        input.error {
            border: 1px dashed red;
            font-weight: 300;
            color: red;
        }

        .borderd-campaing {
            border: 1px solid #a1a1ac;
            border-radius: 4px;
            height: 370px;
            margin-top: 20px;
            position: relative;
            height: auto;
        }

        .borderd-campaing .title {
            margin: -25px 0 0 50px;
            background: #fff;
            padding: 3px;
            display: inline-block;
            font-weight: bold;
            position: absolute;
        }

        .borderd-campaing .campaing {
            padding: 10px;
        }
        .container-campaing {
            margin-top: 20px;
        }

        .borderd-content {
            border: 1px solid #a1a1ac;
            border-radius: 4px;
            height: 180px;
            margin-top: 20px;
            position: relative;
        }
        .borderd-content .title {
            margin: -25px 0 0 50px;
            background: #fff;
            padding: 3px;
            display: inline-block;
            font-weight: bold;
            position: absolute;
        }
    </style>
        <style>
            /* radio style */
            .switch {
                position: relative;
                display: inline-block;
                width: 60px;
                height: 34px;
            }
            .switch input { 
                opacity: 0;
                width: 0;
                height: 0;
            }
    
            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }
    
            .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }
    
            input:checked + .slider {
                background-color: #10b11d;
            }
    
            input:focus + .slider {
                box-shadow: 0 0 1px #10b11d;
            }
    
            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }
    
            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }
    
            .slider.round:before {
                border-radius: 50%;
            }

            .modal {
                z-index: 1052 !important;
            }

             .dark .box-body  {
           background-color: #191E3A;
            }

            .dark .box-header {
                background-color: #191E3A;
            }

            .dark .box-footer {
                background-color: #191E3A;

            }
            .dark .tab-content {
                background-color: #191E3A !important;
            }

            body.dark .box-body {
            overflow: unset !important; 
            }

            body.dark .table thead tr th {
                max-width: 120px !important; /* Aumentar el ancho máximo */
                white-space: normal; /* Evitar el ajuste de línea */
            }

            body.dark .table tbody tr td {
                max-width: 120px !important; /* Aumentar el ancho máximo */
                white-space: normal; /* Evitar el ajuste de línea */
            }
        </style>
@endsection

@include('atmnew.partials.modal_owner')
@include('atmnew.partials.modal_vouchers_type')
@include('atmnew.partials.modal_branch')
@include('atmnew.partials.modal_resume')
@include('atmnew.partials.modal_group')
@include('atmnew.partials.modal_zona')
@include('atmnew.partials.modal_departamento')
@include('atmnew.partials.modal_ciudad')
@include('atmnew.partials.modal_barrio')
@include('atmnew.partials.modal_contract_type')
@include('atmnew.partials.modal_internet_service_contract')
@include('atmnew.partials.modal_network_technology')
@include('atmnew.partials.modal_isp')
@include('atmnew.partials.modal_policy_type')
@include('atmnew.partials.modal_asociar_zona_ciudad')
@include('atmnew.partials.modal_user')
@include('atmnew.partials.modal_caracteristicas')



