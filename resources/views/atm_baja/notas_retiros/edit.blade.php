@extends('app')

@section('title')
    BAJA | Modificar Nota de retiro
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Elaboración de documentaciones
            <small>Modificación de Nota de retiro</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Gestor de terminales</a></li>
            <li><a href="#">Baja</a></li>
            <li><a href="#">Documentaciones</a></li>
            <li><a href="#">Nota de retiro</a></li>
            <li class="active">Modificar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">
                        @include('partials._flashes')
                        @include('partials._messages')
                        {!! Form::model($nota, ['route' => ['notaretiro.update', $nota->id ] , 'method' => 'PUT', 'id' => 'editarNota-form']) !!}
                            <div class="row">
                                <div class="form-group col-md-6 borderd-campaing">
                                    <div class="title"><h4>&nbsp;<i class="fa fa-file-text-o"></i>&nbsp; NOTA DE RETIRO &nbsp;</h4></div>
                                    <div class="container-campaing">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                {!! Form::label('fecha', 'Fecha de retiro:') !!}
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    {!! Form::text('fecha', null , ['class' => 'form-control', 'data-inputmask-alias' =>'date', 'data-inputmask-inputformat'=> 'dd/mm/yyyy', 'im-insert' => 'false','placeholder'=> 'dd/mm/yyyy', 'id' =>'fecha' ]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                {!! Form::label('nombre_comercial', 'Nombre comercial:') !!}
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-keyboard-o"></i>
                                                    </div>
                                                    {!! Form::text('nombre_comercial', $grupo->description , ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre comercial' , 'readonly' => 'readonly']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                {!! Form::label('propietario', 'Propietario/a:') !!}
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-keyboard-o"></i>
                                                    </div>
                                                    {!! Form::text('propietario', Null , ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del propietario/a']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                {!! Form::label('direccion', 'Dirección comercial:') !!}
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-map"></i>
                                                    </div>
                                                    {!! Form::text('direccion', NULL , ['class' => 'form-control', 'placeholder' => 'Ingrese la dirección' ]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                {!! Form::label('referencia', 'Referencia o motivo:') !!}
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-keyboard-o"></i>
                                                    </div>
                                                    {!! Form::text('referencia', null , ['class' => 'form-control', 'placeholder' => 'Ingrese la referencia o el motivo de la nota.' ]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                {!! Form::label('ruc_representante', 'RUC o CI del representante legal:') !!}
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-black-tie"></i>
                                                    </div>
                                                    {!! Form::text('ruc_representante', null , ['class' => 'form-control', 'placeholder' => 'Ingrese el RUC o CI.' ]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                {!! Form::label('representante_legal', 'Representante legal:') !!}
                                                <div class="input-group">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-black-tie"></i>
                                                    </div>
                                                    {!! Form::text('representante_legal', null , ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre comercial' ]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>      
                                @include('atm_baja.info')

                             {{-- {!! Form::hidden('atm_id', $atm_id) !!} --}}
                            </div>
                            <div class="clearfix"></div>
                            
                            
                            <div class="row">
                                <a class="btn btn-default"  href="{{ url('atm/new/'.$grupo->id.'/'.$grupo->id.'/retiro') }}" role="button">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script src="/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/bower_components/admin-lte/plugins/datepicker/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
<script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
   
<link rel="stylesheet" href="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css">
<script src="/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    $('#listadoAtms').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "displayLength": 3,
        "language":{"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
        "bInfo" : false
    });
    
    $('.select2').select2();

    $('#fecha').datepicker({
        language: 'es',
        format: 'dd/mm/yyyy',
    });
    //validacion formulario 
    $('#editarNota-form').validate({
        rules: {
            "nombre_comercial": {
                required: true,
            },
            "propietario": {
                required: true,
            },
            "referencia": {
                required: true,
            },
            "representante_legal": {
                required: true,
            },
            "ruc_representante": {
                required: true,
            },
            "direccion": {
                required: true,
            },
            "fecha": {
                required: true,
            },
            "correos": {
                required: true,
            },
        },
        messages: {
            "ruc_representante": {
                required: "Ingrese el ruc del representante.",
            },
            "propietario": {
                required: "Ingrese el nombre del propietario.",
            },
            "representante_legal": {
                required: "Ingrese el nombre del representante legal.",
            },
            "referencia": {
                required: "Ingrese el motivo o referencia.",
            },
            "nombre_comercial": {
                required: "Ingrese el nombre del comercial.",
            },
            "direccion": {
                required: "Ingrese la dirección.",
            },
            "fecha": {
                required: "Seleccione una fecha.",
            },
            "correos": {
                required: "Ingrese al menos un destinatario.",
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
            height: 550px;
            margin-top: 20px;
            position: relative;
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

         /* INFO */
         .borderd-info {
            border: 1px solid #a1a1ac;
            border-radius: 4px;
            height: 550px;
            margin-top: 20px;
            position: relative;
            /* height: auto; */
        }

        .borderd-info .title {
            margin: -25px 0 0 50px;
            background: #fff;
            padding: 3px;
            display: inline-block;
            font-weight: bold;
            position: absolute;
        }
        .borderd-info .campaing {
            padding: 10px;
        }
        .container-info {
            margin-top: 20px;
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