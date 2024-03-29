@extends('app')

@section('title')
    Nueva Sucursal
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Sucursales
            <small>Creación de sucursal</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Promociones</a></li>
            <li><a href="#">Sucursales</a></li>
            <li class="active">agregar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">
                        @include('partials._messages')
                        {!! Form::open(['route' => 'branches_providers.store' , 'method' => 'POST', 'role' => 'form', 'id' => 'nuevoSucursal-form']) !!}
                        @include('promociones.branches_promotions.partials.fields')
                    
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<!-- add before </body> -->
<script src="/js/filepond/filepond-plugin-image-preview.js"></script>
<script src="/js/filepond/filepond-plugin-image-exif-orientation.js"></script>
<script src="/js/filepond/filepond-plugin-file-validate-size.js"></script>
<script src="/js/filepond/filepond-plugin-file-encode.js"></script>
<script src="/js/filepond/filepond.min.js"></script>
<script src="/js/filepond/filepond.jquery.js"></script>
<script src="/bower_components/admin-lte/plugins/pnotify/pnotify.custom.min.js" charset="UTF-8"></script>

<!-- add before </body> -->

<script src="/bower_components/admin-lte/plugins/pnotify/pnotify.custom.min.js" charset="UTF-8"></script>

<script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
<!-- bootstrap time picker -->
<script src="/bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
    $('.select2').select2();

    //validacion formulario 
    $('#nuevoSucursal-form').validate({
        rules: {
            "name": {
                required: true,
            },
            "address": {
                required: true,
            },
            "latitud": {
                required: true,
            },
            "longitud": {
                required: true,
            },
            "provider_branch_id": {
                required: true,
            },
        },
        messages: {
            "name": {
                required: "Ingrese el nombre de la sucursal.",
            },
            "address": {
                required: "Ingrese una dirección.",
            },
            "latitud": {
                required: "Ingrese la latitud de la sucursal",
            },
            "longitud": {
                required: "Ingrese  la longitud de la sucursal",
            },
            "provider_branch_id": {
                required: "Ingrese  ID del proveedor",
            },
        }, 
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }
    });

    // Turn input element into a pond
    FilePond.registerPlugin(
        FilePondPluginFileEncode,
        FilePondPluginImagePreview,
        FilePondPluginImageExifOrientation,
        FilePondPluginFileValidateSize
    );

    $('.filepond').filepond({
        allowMultiple: false
    });

     //Timepicker
     $('.timepicker').timepicker({
      showInputs: false,
      //format: 'hh:mm:ss',  
      minuteStep: 10
    })
</script>
@endsection

@section('aditional_css')
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="/css/filepond/filepond.css" rel="stylesheet">
    <link href="/css/filepond/filepond-plugin-image-preview.css" rel="stylesheet">

  <link rel="stylesheet" href="/bower_components/admin-lte/plugins/timepicker/bootstrap-timepicker.min.css">

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
@include('promociones.contenidos.partials.modal_categoria')
