@extends('app')

@section('title')
    Gestor de Pólizas
@endsection
@section('content')
    <section class="content-header">
        <h1>
           Póliza n°: {{ $poliza->number }}
            <small>Modificación de datos de la póliza</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Gestor de terminales</a></li>
            <li><a href="{{ route('insurances.index') }}">Pólizas</a></li>
            <li><a href="#">N°: {{ $poliza->number }}</a></li>
            <li class="active">Modificar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar</h3>
                    </div>
                    <div class="container-fluid">
                    @include('partials._flashes')
                    @include('partials._messages')
                    {!! Form::model($poliza, ['route' => ['insurances.update', $poliza->id ] , 'method' => 'PUT', 'id' => 'editarPoliza-form']) !!}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="insurance_code">Endoso</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-keyboard-o"></i></span>
                                    {!! Form::text('insurance_code', 'EGLOBALT S.A.' , ['class' => 'form-control', 'placeholder' => 'Ingrese el código del endoso..', 'readonly' => true]) !!}
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="number">Número de Póliza</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-file"></i></span>
                                    {!! Form::text('number', null , ['class' => 'form-control', 'readonly' => true]) !!}
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="capital">Capital asegurado</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-money"></i></span>
                                    {!! Form::text('capital', null , ['id' => 'capital_poliza', 'class' => 'form-control', 'readonly' => true]) !!}
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="capital_operativo">Limite de Linea Operativa</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-money"></i></span>
                                    {!! Form::text('capital_operativo', null , ['id' => 'capital_operativo', 'class' => 'form-control', 'placeholder' => 'Linea operativa']) !!}
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Estado</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-check-square-o"></i></span>
                                    {!! Form::select('status', ['1' => 'ACTIVO', '2' => 'INACTIVO', '3' => 'VENCIDO'], null, ['class' => 'form-select', 'id' => 'status_policy']) !!}
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="insurance_policy_type_id">Tipo de Póliza</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-filter"></i></span>
                                    {!! Form::select('insurance_policy_type_id', $insurance_types, null, ['id' => 'insurance_policy_type_id', 'class' => 'form-select', 'disabled' => 'disabled']) !!}
                                    <input type="hidden" name="insurance_policy_type_id" id="insurance_policy_type_id" value="{{$poliza->insurance_policy_type_id}}">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="observaciones">Observaciones</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-comments"></i></span>
                                    <textarea id="observaciones" name="observaciones" rows="4" class="form-control">{{$poliza->observaciones}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary me-2">Actualizar</button>
                                    <a class="btn btn-default" href="{{ route('insurances.index') }}" role="button">Cancelar</a>
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
<script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
         //separador de miles - Capital de la poliza
         var separadorPol = document.getElementById('capital_poliza');

        separadorPol.addEventListener('input', (e) => {
            var entradaPol = e.target.value.split(','),
            parteEnteraPol = entradaPol[0].replace(/\./g, ''),
            salidaPol = parteEnteraPol.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            e.target.value = salidaPol;
        }, false);

        var capital_poliza = document.getElementById('capital_poliza').value;
        entryPoliza = capital_poliza.split(',');
        partEnteraPoliza = entryPoliza[0].replace(/\./g, ''),
        outputPoliza = partEnteraPoliza.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        //insertar valor con separadores de miles
        document.getElementById("capital_poliza").value = outputPoliza;

        //separador de miles - linea de poliza operativa
        var separadorPol = document.getElementById('capital_operativo');

        separadorPol.addEventListener('input', (e) => {
            var entradaPol = e.target.value.split(','),
            parteEnteraPol = entradaPol[0].replace(/\./g, ''),
            salidaPol = parteEnteraPol.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            e.target.value = salidaPol;
        }, false);

        var capital_operativo = document.getElementById('capital_operativo').value;
        entryPoliza = capital_operativo.split(',');
        partEnteraPoliza = entryPoliza[0].replace(/\./g, ''),
        outputPoliza = partEnteraPoliza.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        //insertar valor con separadores de miles
        document.getElementById("capital_operativo").value = outputPoliza;
    });
</script>       
<script type="text/javascript">

    $('.select2').select2();

    //validacion formulario 
    $('#editarPoliza-form').validate({
        rules: {
            "name": {
                required: true,
            },
            "description": {
                required: true,
            },
            "image": {
                required: true,
            },
            "price": {
                required: true,
            },
            "precionormal": {
                required: true,
            },
            "porcentajedescuento": {
                required: true,
            },
        },
        messages: {
            "name": {
                required: "Ingrese el nombre del contenido.",
            },
            "description": {
                required: "Ingrese una descripción del contenido.",
            },
            "image": {
                required: "Ingrese una url para la imagen asociada.",
            },
            "price": {
                required: "Ingrese el precio del contenido.",
            },
            "precionormal": {
                required: "Ingrese el precio normal.",
            },
            "porcentajedescuento": {
                required: "Ingrese el porcentaje de descuento.",
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
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
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