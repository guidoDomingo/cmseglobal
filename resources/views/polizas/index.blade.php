
@extends('app')
@section('title')
    Gestor de Pólizas
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Gestor de Pólizas
            <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Gestor de terminales</a></li>
            <li class="active">Pólizas</li>
        </ol>
    </section>
    <section class="content">
        @include('partials._flashes')
        <div class="box box-primary">
   
            <div class="box-body">
                {{-- <div class="row"> --}}
                    <div class="col-xs-12">
                        @if ($polizas)
                            <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                                <thead>
                                <tr>
                                    <th style="text-align:center; vertical-align:middle;width:10px">ID</th>
                                    <th style="text-align:center; vertical-align:middle;">Ruc</th>
                                    <th style="text-align:center; vertical-align:middle;">Grupo</th>
                                    {{-- <th style="text-align:center; vertical-align:middle;">Endoso</th> --}}
                                    <th style="text-align:center; vertical-align:middle;">Número de Póliza</th>
                                    <th style="text-align:center; vertical-align:middle;">Tipo de Póliza</th>
                                    <th style="text-align:center; vertical-align:middle;">Capital</th>
                                    <th style="text-align:center; vertical-align:middle;">Linea operativa</th>
                                    <th style="text-align:center; vertical-align:middle;">Estado</th>
                                    <th style="text-align:center; vertical-align:middle;">Fecha de creación</th>
                                    <th style="text-align:center; vertical-align:middle; width:100px">Modificar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($polizas as $poliza)
                                    <tr data-id="{{ $poliza->id  }}">
                                        <td style="text-align:center; vertical-align:middle;">{{ $poliza->id }}</td>
                                        <td style="text-align:center; vertical-align:middle;">{{ $poliza->grupo_ruc }}</td>
                                        <td style="text-align:center; vertical-align:middle;">{{ $poliza->grupo }}</td>
                                        {{-- <td style="text-align:center; vertical-align:middle;">{{ $poliza->insurance_code }}.</td> --}}
                                        <td style="text-align:center; vertical-align:middle;">{{ $poliza->number }}</td>
                                        <td style="text-align:center; vertical-align:middle;">{{ $poliza->tipo}}</td>
                                        {{-- <td style="text-align:center; vertical-align:middle;">{{ $poliza->tipo->description}}</td> --}}
                                        <td style="text-align:center; vertical-align:middle;">{{ number_format($poliza->capital) }}</td>
                                        <td style="text-align:center; vertical-align:middle;">{{ number_format($poliza->capital_operativo) }}</td>

                                        @if ( $poliza->status == 1)
                                            <td style="text-align:center; vertical-align: middle;">RECEPCIONADO</td>
                                        @elseif ($poliza->status == 2)                                     
                                            <td style="text-align:center; vertical-align: middle;">ACTIVO</td>
                                        @elseif ($poliza->status == 3)
                                            <td style="text-align:center; vertical-align: middle;">INACTIVO</td>
                                        @elseif ($poliza->status == 4)
                                            <td style="text-align:center; vertical-align: middle;">VENCIDO</td>
                                        @endif
                                        <td style="text-align:center; vertical-align: middle;">{{ date('d/m/Y H:i:s', strtotime($poliza->created_at)) }}</td>

                                        <td style="text-align:center; vertical-align:middle;">
                                            @if (Sentinel::hasAccess('insurances_form.edit'))
                                                <a class="btn btn-success btn-flat btn-row" title="Editar" href="{{ route('insurances.edit',['insurance' => $poliza->id])}}"><i class="fa fa-pencil"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </section>
    {!! Form::open(['route' => ['insurances.destroy',':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}

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
<link rel="stylesheet" href="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css">
<script src="/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
   $(document).ready(function () {
        $('#detalles').DataTable({
            "columnDefs": [{
            "targets": 0
            }],
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ resultados",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningun dato disponible en esta tabla",
                "sInfo": "Mostrando resultados _START_-_END_ de  _TOTAL_",
                "sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar ",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Ultimo",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
            "iDisplayLength": 50, 
            "processing": true,
            "serverSide": true,
            }
        });
    });
</script>
<script type="text/javascript">
    $('.btn-delete').click(function(e){
        e.preventDefault();
        var row = $(this).parents('tr');
        var id = row.data('id');
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
                var url = form.attr('action').replace(':ROW_ID',id);
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
@endsection

@section('aditional_css')
    <!-- DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->
    <style>
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

