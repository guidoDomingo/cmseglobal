@extends('app')

@section('title')
    BAJA | Nota de rescisión
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Elaboración de documentaciones
            <small>Creación de Nota de rescisión</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Gestor de terminales</a></li>
            <li><a href="#">Baja</a></li>
            <li><a href="#">Documentaciones</a></li>
            <li><a href="#">Nota de rescisión</a></li>
            <li class="active">Agregar</li>
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
                        {!! Form::open(['route' => 'notarescision.store' , 'method' => 'POST', 'role' => 'form', 'id' => 'nuevaRescision-form']) !!}
                            @include('atm_baja.notas_rescisiones.partials.fields')
                            <div class="row">
                                <a class="btn btn-default"  href="{{ url('atm/new/'.$group_id.'/'.$group_id.'/rescision') }}" role="button">Cancelar</a>
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

<!-- DATA TABLE-->

    <script src="{{ asset('src/plugins/src/table/datatable/datatables.js') }}"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10
        });
    </script>

 <!-- DATA TABLE - FIN -->

<script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>  

<link rel="stylesheet" href="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css">
<script src="/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    $('.select2').select2();

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

    $('#fecha').datepicker({
        language: 'es',
        format: 'dd/mm/yyyy',
    });
    //validacion formulario 
    $('#nuevaRescision-form').validate({
        rules: {
            "numero": {
                required: true,
            },
            "nombre_comercial": {
                required: true,
            },
            "direccion": {
                required: true,
            },
            "fecha": {
                required: true,
            },
        },
        messages: {
            "numero": {
                required: "Ingrese una númeracion interna.",
            },
            "nombre_comercial": {
                required: "Ingrese el nombre del comercial.",
            },
            "cantidad_pagos": {
                required: "Ingrese la cantidad de pagos.",
            },
            "direccion": {
                required: "Ingrese la dirección.",
            },
            "fecha": {
                required: "Seleccione una fecha.",
            },
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }
    });
   
</script>
@endsection

@section('aditional_css')
    <!-- DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->
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