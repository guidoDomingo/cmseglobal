@extends('app')

@section('title')
    Ciudad {{ $ciudad->descripcion }}
@endsection

@section('aditional_css')
    
    {{-- PARA AGREGAR SELECT  --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/tomSelect/custom-tomSelect.css') }}">
    {{-- FIN DE SELECT  --}}

    <style>
        #editarCiudad-form a, button {
            margin-top : 10px;
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

@section('content')
    <section class="content-header">
        <h1>
            {{ $ciudad->descripcion }}
            <small>Modificación de datos de Ciudad</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route('ciudades.index') }}">Ciudades</a></li>
            <li><a href="#">{{ $ciudad->descripcion }}</a></li>
            <li class="active">Modificar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar {{ $ciudad->descripcion }}</h3>
                    </div>
                    <div class="box-body">
                        @include('partials._flashes')
                        @include('partials._messages')
                        {!! Form::model($ciudad, ['route' => ['ciudades.update', $ciudad->id ] , 'method' => 'PUT', 'id' => 'editarCiudad-form']) !!}
                        @include('ciudades.partials.fields')

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="box-footer">
{{--                    @include('ciudades.partials.delete')--}}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<!-- add before </body> -->

<script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
<script type="text/javascript">
    //$('.select2').select2();

    //validacion formulario 
    $('#editarCiudad-form').validate({
        rules: {
            "descripcion": {
                required: true,
            },
            "departamento_id": {
                required: true,
            },
        },
        messages: {
            "descripcion": {
                required: "Ingrese la descripción",
            },
            "departamento_id": {
                required: "Seleccione el departamento",
            },
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }
    });

</script>
@endsection
@section('aditional_css')
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

     {{-- AGREGAR SELECT  --}}
    <script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
    <script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js') }}"></script>
    <script>
        new TomSelect(".select2",{
            create: true,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
    </script>
    {{-- FIN SELECT  --}}
@endsection
