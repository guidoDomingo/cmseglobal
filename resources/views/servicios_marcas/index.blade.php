@extends('app')
@section('title')
    Servicios Por Marcas
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Servicios Por Marcas
            <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Servicios Por Marcas</a></li>
            <li class="active">Lista</li>
        </ol>
    </section>
    <section class="content">
        @include('partials._flashes')
        <div class="box">

            <div class="box-header">
                <h3 class="box-title">
                </h3>
                <a href="{{ route('servicios_marca.create') }}" class="btn btn-primary mb-2 me-4" role="button">Agregar</a>
                <div class="box-tools">
                    <div class="input-group" style="width:150px;">
                        {!! Form::model(Request::only(['name']),['route' => 'servicios_marca.index', 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
                        {!! Form::text('name' ,null , ['class' => 'form-control input-sm pull-right', 'placeholder' => 'Nombre', 'autocomplete' => 'off' ]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="box-body  no-padding" style="overflow: scroll">
                <div class="row">
                    <div class="col-xs-12">
                        @if ($servicios_marcas)
                            <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                                <tbody>
                                <thead>
                                <tr>
                                    <th>Marca</th>
                                    <th>Descripción</th>
                                    <th>Service Source</th>
                                    <th>Imagen Asociada</th>
                                    <th>Service Id</th>
                                    <th>Cód. Ondanet</th>
                                    <th>Nivel</th>
                                    <th>Tipo</th>
                                    <th>Promedio Comisión</th>
                                    <th style="width:100px">Creado</th>
                                    <th style="width:100px">Modificado</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($servicios_marcas as $servicios_marca)
                                    <tr data-service-id="{{ $servicios_marca->service_id }}" data-service-source-id="{{ $servicios_marca->service_source_id  }}">
                                        @if(isset($servicios_marca->marcas->descripcion))
                                        <td>{{ $servicios_marca->marcas->descripcion }}.</td>
                                        @else 
                                        <td>-</td>
                                        @endif 
                                        <td>{{ $servicios_marca->descripcion }}</td>
                                        <td>{{ $servicios_marca->service_sources->description }}</td>
                                        <td>
                                            @if(file_exists(public_path().'/resources'.trim($servicios_marca->imagen_asociada)) && !empty($servicios_marca->imagen_asociada))
                                                <img class="imagen_marcas_servicios" src="{{ url('/resources'.$servicios_marca->imagen_asociada) }}">
                                            @else
                                                {{ $servicios_marca->imagen_asociada }}
                                            @endif
                                        </td>
                                        <td>{{ $servicios_marca->service_id }}</td>
                                        <td>{{ $servicios_marca->ondanet_code }}</td>
                                        <td>{{ $servicios_marca->nivel }}</td>
                                        <td>{{ $servicios_marca->tipo }}</td>
                                        <td>{{ $servicios_marca->promedio_comision }}</td>
                                        <td>{{ date('d/m/y H:i', strtotime($servicios_marca->created_at)) }}
                                            </td>
                                        <td>{{ date('d/m/y H:i', strtotime($servicios_marca->updated_at)) }}</td>
                                        <td>
                                            @if (Sentinel::hasAccess('servicio_marca.add|edit'))
                                            <a class="btn btn-success btn-flat btn-row" title="Editar" href="{{ route('servicios_marca.edit',['service_id' => $servicios_marca->service_id,'service_source_id' => $servicios_marca->service_source_id])}}"><i class="fa fa-pencil"></i></a>
                                            @endif
                                            @if (Sentinel::hasAccess('servicio_marca.delete'))
                                            <a class="btn-delete btn btn-danger btn-flat btn-row" title="Eliminar" href="#" ><i class="fa fa-remove"></i> </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" role="status" aria-live="polite">{{ $servicios_marcas->total() }} registros en total
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="">
                            {!! $servicios_marcas->appends(Request::only(['name']))->links('paginator') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! Form::open(['route' => ['servicios_marca.destroy',':ROW_ID',':SOURCE_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}

@endsection
@section('js')
    <!-- SWEET ALERT  -->
    <script src="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/sweetalerts2/custom-sweetalert.js') }}"></script>
    <!-- SWEET ALERT - FIN -->
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
<script type="text/javascript">
    $('.btn-delete').click(function(e){
        e.preventDefault();
        var row = $(this).parents('tr');
        var service_id = row.data('service-id');
        var service_source_id = row.data('service-source-id');
        Swal.fire({
            title: "Atención!",
            text: "Está a punto de borrar el registro, está seguro?.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, eliminar!",
            cancelButtonText: "No, cancelar!",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm){
            if (isConfirm) {
                var form = $('#form-delete');
                var url = form.attr('action').replace(':ROW_ID',service_id);
                var url = url.replace(':SOURCE_ID',service_source_id);
                var data = form.serialize();
                var type = "";
                var title = "";
                $.post(url,data, function(result){
                    if(result.error == false){
                        row.fadeOut();
                        type = "success";
                        title = "Operación realizada!";
                    }else{
                        type = "error";
                        title =  "No se pudo realizar la operación"
                    }
                    Swal.fire({   title: title,   text: result.message,   type: type,   confirmButtonText: "Aceptar" });
                }).fail(function (){
                    Swal.fire('No se pudo realizar la petición.');
                });
            }
        });
    });
</script>
    {{-- @include('partials._delete_row_js') --}}
@endsection

@section('aditional_css')
    <!-- SWEET ALERTS -->
    <link rel="stylesheet" href="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.css') }}">
    <link href="{{ asset('src/plugins/css/light/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- SWEET ALERTS - FIN -->
      <link href="{{ asset('src/assets/css/light/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
    <!-- DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->
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
        .paginator li>a {
            border: 1px solid white;
        }
        .paginator li>a {
            background-color: #060818;
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
