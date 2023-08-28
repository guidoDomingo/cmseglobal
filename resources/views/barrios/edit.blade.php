@extends('app')

@section('title')
    Barrio {{ $barrio->descripcion }}
@endsection

@section('aditional_css')
    
    {{-- PARA AGREGAR SELECT  --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/tomSelect/custom-tomSelect.css') }}">
    {{-- FIN DE SELECT  --}}

    <style>
        #editarBarrio-form a, button {
            margin-top : 10px;
        }
    </style>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            {{ $barrio->descripcion }}
            <small>Modificación de datos del Barrio</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route('barrios.index') }}">Barrios</a></li>
            <li><a href="#">{{ $barrio->descripcion }}</a></li>
            <li class="active">Modificar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar {{ $barrio->descripcion }}</h3>
                    </div>
                    <div class="box-body">
                        @include('partials._flashes')
                        @include('partials._messages')
                        {!! Form::model($barrio, ['route' => ['barrios.update', $barrio->id ] , 'method' => 'PUT', 'id' => 'editarBarrio-form']) !!}
                        @include('barrios.partials.fields')

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="box-footer">
{{--                    @include('barrios.partials.delete')--}}
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
    $('#editarBarrio-form').validate({
        rules: {
            "descripcion": {
                required: true,
            },
            "ciudad_id": {
                required: true,
            },
        },
        messages: {
            "descripcion": {
                required: "Ingrese la descripción",
            },
            "ciudad_id": {
                required: "Seleccione el departamento",
            },
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }
    });

</script>

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

