@extends('app')

@section('title')
    Canal {{ $canal->descripcion }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ $canal->descripcion }}
            <small>Modificación de datos del canal</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="{{ route('canales.index') }}">Canales</a></li>
            <li><a href="#">{{ $canal->descripcion }}</a></li>
            <li class="active">Modificar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <small style="color: red"><strong>Campos obligatorios (*)</strong></small>
                    </div>
                    <div class="box-body">
                        {{-- @include('partials._flashes') --}}
                        @include('partials._messages')
                        {!! Form::model($canal, ['route' => ['canales.update', $canal->id ] , 'method' => 'PUT', 'id' => 'editarCanla-form']) !!}
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <div class="form-group">
                                        {!! Form::label('descripcion', 'Nombre') !!}<small style="color: red"><strong>(*)</strong></small>
                                        {!! Form::text('descripcion', null , ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del canal' ]) !!}
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <div class="form-group col-md-3" style="margin-top: 25px;">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                <a class="btn btn-default" href="{{ route('canales.index') }}" role="button">Cancelar</a>
                                            </div> 
                                        </div> 
                                    </div> 
                                </div> 
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('partials._selectize')

@section('js')
<!-- SWEET ALERT  -->
    <script src="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/sweetalerts2/custom-sweetalert.js') }}"></script>
    <!-- SWEET ALERT - FIN -->
<!-- add before </body> -->
<script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>

<script type="text/javascript">
    $('.select2').select2();


    //validacion formulario 
    $('#editarCanla-form').validate({
        rules: {
            "descripcion": {
                required: true,
            },
        },
        messages: {
            "descripcion": {
                required: "Ingrese una descripción del canal.",
            },
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }
    });


           
</script>
@if (session('error') == 'ok')
<script>
    Swal.fire({
            type: "error",
            title: 'Ocurrió un error al intentar registrar el contenido. Verifique los campos',
            showConfirmButton: true,
            // timer: 1500
            });
</script>
@endif
@if (session('error_categoria') == 'ok')
<script>
    Swal.fire({
            type: "error",
            title: 'Debe seleccionar una categoría.',
            showConfirmButton: true,
            // timer: 1500
            });
</script>
@endif
@endsection

@section('aditional_css')
      <!-- SWEET ALERTS -->
    <link rel="stylesheet" href="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.css') }}">
    <link href="{{ asset('src/plugins/css/light/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- SWEET ALERTS - FIN -->
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    
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
        .borderd-content {
            border: 1px solid #a1a1ac;
            border-radius: 4px;
            height: 300px;
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

        .dark .box  {
           background-color: #191E3A;
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
    </style>
@endsection