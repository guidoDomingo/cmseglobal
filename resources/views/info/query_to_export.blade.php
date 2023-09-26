@extends('app')

@section('title')
    Ejecutar Consulta 
@endsection
@section('content')
<style>
    input:invalid+span:after {
        content: '✖';
        padding-left: 5px;
    }

    input:valid+span:after {
        content: '✓';
        padding-left: 5px;
    }

    tr {
        height: 15px;
    }

    .points {
        max-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        background-color: #285f6c; 
        border-color: #285f6c;
        color: white;
    }
</style>

<?php

$message = $data['message'];
$records = $data['lists']['records'];
$headers = $data['lists']['headers'];
$query = $data['inputs']['query'];
$json = json_encode($data['lists']['records']);

$data_aux = json_encode($data);

?>

<section class="content-header">

    <div class="row">
        <div class="col-md-12">
            @if ($message !== '')
                <div class="alert alert-error alert-dismissable">
                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-times"></i>Atención:</h4>

                    {{$message}}
                </div>
            @endif
        </div>
    </div>

    <div class="box box-default" style="border-radius: 5px;">
        
        <div class="box-header with-border">

            <h3 class="box-title" style="font-size: 25px;">Ejecutar Consulta</h3>

            <div class="box-tools pull-right">
                
                <div class="btn-group">

                    <button class="btn btn-default" type="button" title="Buscar según los filtros en los registros." id="search" name="search" onclick="search('search')" style="background-color: #285f6c; color:white; border: none">
                        <span class="fa fa-play"></span> Ejecutar consulta
                    </button>

                    <button class="btn btn-default" type="button" title="Borrar la consulta ingresada." onclick="eraser_query()" style="margin-left: 5px; margin-right: 5px; background-color: #285f6c; color: white; border: none">
                        <span class="fa fa-eraser"></span> Borrar consulta
                    </button>
                
                    @if (count($records) > 0)
                        <button class="btn btn-default" type="button" title="Convertir tabla en archivo excel." id="generate_x" name="generate_x" onclick="modal_generate_x()" style="background-color: #285f6c; color: white; border: none">
                            <span class="fa fa-excel-x"></span> Exportar
                        </button>
                    @endif

                </div>
            </div>

        </div>

        <div class="box-body">

            <div id="div_load" style="text-align: center; margin-bottom: 10px; font-size: 20px;">
                <div>
                    <i class="fa fa-spin fa-refresh fa-2x" style="vertical-align: sub;"></i> &nbsp;
                    Cargando...

                    <p id="rows_loaded" title="Filas cargadas"></p>
                </div>
            </div>

            <div id="content" style="display: none">

                <div id="hidden_query" style="display: none">{{ $query }}</div>

                {!! Form::open(['route' => 'info_query_to_export', 'method' => 'POST', 'role' => 'form', 'id' => 'form_search']) !!}
                <div class="row">
                    <div class="col-md-12">
                        <!--<label for="query">Ingresar consulta a ejecutar:</label>-->
                        <div class="form-group">
                            <textarea class="form-control" id="query" name="query" placeholder="Ingresa aquí tu consulta a exportar" required 
                            style="border-radius: 5px; border: 1px solid #285f6c; resize: vertical; height: 70vh; box-sizing: border-box; max-height: none;"></textarea>
                        </div>
                    </div>
                </div>

                <input name="json" id="json" type="hidden">
                {!! Form::close() !!}


                @if (count($headers) > 0)
                    <div class="box box-default" style="border: 1px solid #d2d6de;">
                        <div class="box-header with-border">
                            <h3 class="box-title">Mostrar / Ocultar columnas</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" id="search_open"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body" id="hide_show_columns">
                        </div>
                    </div>

                    <div class="box box-default" style="border: 1px solid #d2d6de; overflow-x: scroll; scroll-behavior: auto !important">
                        <div class="box-header with-border">
                            <h3 class="box-title">Listado del query</h3>
                        </div>
                        <div class="box-body">

                            <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                                <thead>
                                    <tr style="background-color: #285f6c; color: white;">
                                        @foreach ($headers as $item)
                                        <th>{{ $item }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $sub_key)
                                    <?php
                                    $sub_key_aux = json_encode($sub_key);
                                    ?>

                                    <tr>
                                        @foreach ($headers as $item)
                                        <td title="{{ $sub_key[$item] }}"> {{ $sub_key[$item] }} </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <!-- Modal: modal_view_options para ver todas las opciones disponibles de la transacción -->
    <div id="modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" href="#">

        <div class="modal-dialog" role="document" style="background: white; border-radius: 5px; width: 80%;">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <div class="modal-title" style="font-size: 20px; text-align: center">
                        Opciones disponibles para exportar
                    </div>
                </div>

                <div class="modal-body" style="text-align: center">
                    <div class="btn-group" role="group">

                        <button class="btn btn-success" type="button" title="Exportar a .xls" onclick="search('xls')">
                            <span class="fa fa-file-excel-o"></span> xls
                        </button>

                        <button class="btn btn-success" type="button" title="Exportar a .xlsx" onclick="search('xlsx')" style="margin-right: 5px">
                            <span class="fa fa-file-excel-o"></span> xlsx
                        </button>

                        <button class="btn btn-success" type="button" title="Exportar a .csv" onclick="search('csv')" style="margin-right: 5px">
                            <span class="fa fa-file-excel-o"></span> csv
                        </button>

                        <button class="btn btn-danger" data-bs-dismiss="modal">
                            <span class="fa fa-times"></span> &nbsp; Cerrar ventana
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">

</section>

@endsection

@section('page_scripts')
@include('partials._selectize')
@include('partials._sql_formatter')
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
<!-- datatables -->
<link rel="stylesheet" href="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css">
<script src="/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- date-range-picker -->
<link href="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<script src="/bower_components/admin-lte/plugins/daterangepicker/moment.min.js"></script>
<script src="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>

<!-- bootstrap datepicker -->
<script src="/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- iCheck -->
<link rel="stylesheet" href="/bower_components/admin-lte/plugins/iCheck/square/grey.css">
<script src="/bower_components/admin-lte/plugins/iCheck/icheck.min.js"></script>

<script type="text/javascript" src=""></script>

<!-- Iniciar objetos -->
<script type="text/javascript">

    @if(count($records) <= 0)
    $('#content').css('display', 'block');
    $('#div_load').css('display', 'none');
    @endif

    console.log('Datos recibidos:', {!!$data_aux!!});

    function eraser_query() {
        $('#query').val(null);
    }

    function modal_generate_x() {
        $("#modal").modal("show");
    }

    function search(button_name) {

        var query = $('#query').val();

        if (query !== '') {
            if (button_name == 'search') {
                $('#content').css('display', 'none');
                $('#div_load').css('display', 'block');
            }

            $('#form_search').append('<input type="hidden" name="button_name" value="' + button_name + '" />');
            $('#form_search').submit();
        } else {
            Swal.fire({
                    title: 'Atención',
                    text: 'Ingresar la consulta.',
                    type: 'warning',
                    showCancelButton: false,
                    closeOnClickOutside: false,
                    confirmButtonColor: '#00c0ef',
                    confirmButtonText: 'Aceptar'
                },
                function(isConfirm) {}
            );

        }
    }

    var data_table_config = {
        fixedHeader: true,
        pageLength: 5,
        lengthMenu: [
            1, 2, 5, 10, 20, 30, 50, 70, 100, 150, 300, 500, 1000, 1500, 2000
        ],
        dom: '<"pull-left"f><"pull-right"l>tip',
        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        scroller: true,
        displayLength: 5,
        order: [],
        columnDefs: [{
            targets: 'no-sort',
            orderable: false,
        }],
        "columnDefs": [{
            "height": "25",
            "targets": 0
        }],
        initComplete: function(settings, json) {
            $('#content').css('display', 'block');
            $('#div_load').css('display', 'none');
        }
    }

    var table = $('#datatable_1').DataTable(data_table_config);

    var hide_show_columns = [];

    var ths = $("#datatable_1").find("th");

    var index = 0;

    for (var i = index; i < ths.length; i++) {
        hide_show_columns.push(ths[i].innerHTML);
    }

    for (var i = index; i < hide_show_columns.length; i++) {

        var description = hide_show_columns[i];

        $('#hide_show_columns').append(
            '<a class="toggle-vis btn btn-default btn-sm" data-column="' + i + '" id="toggle-vis-' + i +
            '" value="' + description + '" state="on" title="Mostrar / Ocultar columna: ' + description +
            '" style="margin-top: 3px; background-color: #285f6c; border-color: #285f6c; color: white;">' +
            '<i class="fa fa-eye"></i> &nbsp;' + description +
            '</a> '
        );
    }

    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();

        var column = table.column($(this).attr('data-column'));
        column.visible(!column.visible());

        var fa = (!column.visible()) ? 'eye-slash' : 'eye';
        $(this).html('<i class="fa fa-' + fa + '"></i> &nbsp;' + $(this).attr('value'));
    });

    //Esconder la alerta después de 5 segundos. 
    //$(".alert").delay(5000).slideUp(300);
    //$('[data-toggle="popover"]').popover();

    var format = window.sqlFormatter.format;

    $('#query').html(format($('#hidden_query').html()));

    // Asignación de lo que se exportará luego.
    var json = {!!$json!!};
    json = JSON.stringify(json);
    $('#json').val(json);
    console.log('JSON:', $('#json').val());
</script>
@endsection

@section('aditional_css')
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
    </style>
@endsection
