@extends('app')

@section('title')
    Servicio Por Marca {{ $servicio_marca->descripcion }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ $servicio_marca->descripcion }}
            <small>Modificación de Servicios por Marca</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route('servicios_marca.index') }}">Serivicos Por Marcas</a></li>
            <li><a href="#">{{ $servicio_marca->descripcion }}</a></li>
            <li class="active">Modificar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar {{ $servicio_marca->descripcion }}</h3>
                    </div>
                    <div class="box-body">
                        @include('partials._flashes')
                        @include('partials._messages')
                        {!! Form::model($servicio_marca, ['route' => ['servicios_marca.update', $servicio_marca->service_id, $servicio_marca->service_source_id ] , 'method' => 'PUT', 'id' => 'editarMarca-form']) !!}
                        @include('servicios_marcas.partials.fields')

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="box-footer">
{{--                    @include('marcas.partials.delete')--}}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script src="/js/filepond/filepond-plugin-image-preview.js"></script>
<script src="/js/filepond/filepond-plugin-image-exif-orientation.js"></script>
<script src="/js/filepond/filepond-plugin-file-validate-size.js"></script>
<script src="/js/filepond/filepond-plugin-file-encode.js"></script>
<script src="/js/filepond/filepond.min.js"></script>
<script src="/js/filepond/filepond.jquery.js"></script>

<script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
<script type="text/javascript">
    $('.select2').select2();

    //validacion formulario 
    $('#editarMarca-form').validate({
        rules: {
            "descripcion": {
                required: true,
            },
            "categoria_id": {
                required: true,
            },
            "service_source_id": {
                required: true,
            },
        },
        messages: {
            "descripcion": {
                required: "Ingrese la descripción",
            },
            "categoria_id": {
                required: "Seleccione la categoria",
            },
            "service_source_id": {
                required: "Seleccione el service source",
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
        allowMultiple: false,
    });
</script>
@endsection
@section('aditional_css')

    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

     <style>
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
