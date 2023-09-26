@extends('app')

@section('title')
    Informe de movimientos
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Cajas de ATMs
            <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Cajas de ATMs</a></li>
            <li class="active">Listado</li>
        </ol>
    </section>

    <section class="content">

        <div class="delay_slide_up">
            @include('partials._flashes')
        </div>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Búsqueda personalizada</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    {!! Form::open(['route' => 'terminal_interaction_monitoring_pos_box', 'method' => 'POST', 'role' => 'form', 'id' => 'form_search']) !!}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="timestamp">Fecha de creación:</label>
                            <input type="text" class="form-control" style="display:block" id="timestamp"
                                name="timestamp"></input>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="record_limit">Límite:</label>
                        <div class="form-group">
                            <select class="form-control select2" id="record_limit" name="record_limit">
                                <option value="" selected>Sin límite</option>
                                <option value="1">1 Registro</option>
                                <option value="2">2 Registros</option>
                                <option value="5">5 Registros</option>
                                <option value="10">10 Registros</option>
                                <option value="20">20 Registros</option>
                                <option value="30">30 Registros</option>
                                <option value="50">50 Registros</option>
                                <option value="70">70 Registros</option>
                                <option value="100">100 Registros</option>
                                <option value="150">150 Registros</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="atm_id">ATM:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="atm_id" id="atm_id"></input>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="search">Buscar...</label>
                        <br />
                        <button type="submit" class="btn btn-primary" title="Buscar según los filtros en los registros."
                            id="search" name="search">
                            <span class="fa fa-search" aria-hidden="true"></span> &nbsp; Búsqueda
                        </button>
                    </div>
                    {!! Form::close() !!}

                    <div class="col-md-2">
                        <label for="clean">Limpiar...</label>
                        <br />
                        <button class="btn btn-default" title="Limpiar filtros." id="clean" name="clean">
                            <span class="fa fa-clean"></span> &nbsp; Limpiar filtros
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-default">
            <div class="box-body">
                <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ATM</th>
                            <th>Caja</th>
                            <th>Creación</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['lists']['records_list'] as $item)
                            <?php
                            
                            $parameters = json_encode($item);
                            
                            if ($item->status == 'Activo') {
                                $checked = 'checked';
                            } else {
                                $checked = '';
                            }
                            
                            ?>

                            <tr>
                                <td>{{ $item->a_id }}</td>
                                <td>{{ $item->a_description }}</td>
                                <td>{{ $item->box }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @if (\Sentinel::getUser()->hasAccess('pos_box_edit'))
                                        <input type='checkbox' onclick="edit_atm_pos_box({{ $parameters }})"
                                            style='cursor: pointer' {{ $checked }}> &nbsp; {{ $item->status }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('page_scripts')
    @include('partials._selectize')
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
    <link href="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet"
        type="text/css" />
    <script src="/bower_components/admin-lte/plugins/daterangepicker/moment.min.js"></script>
    <script src="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- bootstrap datepicker -->
    <script src="/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>

    <!-- Iniciar objetos -->
    <script type="text/javascript">

        function edit_atm_pos_box(parameters) {
            var url = 'terminal_interaction_monitoring_pos_box_edit/';
            var json = {
                _token: token,
                parameters: parameters
            };

            Swal.fire({
                    title: 'Atención',
                    text: '¿Está seguro de realizar esta acción?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0073b7',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar',
                    closeOnClickOutside: false,
                    showLoaderOnConfirm: false
                },
                function(isConfirmMessage) {
                    if (isConfirmMessage) {
                        $.post(url, json, function(data, status) {
                            var error = data.error;
                            var message = data.message;
                            var list = data.list;
                            var type = '';
                            var text = '';

                            if (error == true) {
                                type = 'error';
                                text = 'Ocurrió un error al realizar la acción.';
                            } else {
                                type = 'success';
                            }

                            Swal.fire({
                                    title: message,
                                    text: text,
                                    type: type,
                                    showCancelButton: false,
                                    confirmButtonColor: '#3c8dbc',
                                    confirmButtonText: 'Aceptar',
                                    cancelButtonText: 'No.',
                                    closeOnClickOutside: false
                                },
                                function(isConfirmSearch) {
                                    if (isConfirmSearch) {
                                        location.reload();
                                    }
                                }
                            );
                        }).error(function(error) {
                            console.log('Error al realizar la acción:', error);
                        });
                    }
                }
            );
        }

        $(".delay_slide_up").delay(5000).slideUp(300);

        $('#timestamp').daterangepicker({
            'format': 'DD/MM/YYYY HH:mm:ss',
            'startDate': moment().startOf('month'),
            'endDate': moment().endOf('month'),
            'timePicker': true,
            'opens': 'center',
            'drops': 'down',
            'ranges': {
                'Hoy': [moment().startOf('day').toDate(), moment().endOf('day').toDate()],
                'Ayer': [moment().startOf('day').subtract(1, 'days'), moment().endOf('day').subtract(1, 'days')],
                'Semana': [moment().startOf('week'), moment().endOf('week')],
                'Mes': [moment().startOf('month'), moment().endOf('month')],
                'Año': [moment().startOf('year'), moment().endOf('year')]
            },
            'locale': {
                'applyLabel': 'Aplicar',
                'fromLabel': 'Desde',
                'toLabel': 'Hasta',
                'customRangeLabel': 'Rango Personalizado',
                'daysOfWeek': ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
                'monthNames': ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                    'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ],
                'firstDay': 1
            }
        });

        $('#timestamp').attr({
            'onkeydown': 'return false'
        });

        $('#timestamp').hover(function() {
            $('#timestamp').attr({
                'title': 'El filtro de fecha es: ' + $('#timestamp').val()
            })
        }, function() {

        });

        //Datatable config
        var data_table_config = {
            orderCellsTop: true,
            fixedHeader: true,
            pageLength: 20,
            lengthMenu: [5, 10, 20, 30, 50, 70, 100, 250, 500, 1000],
            dom: '<"pull-left"f><"pull-right"l>tip',
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            scroller: true,
        }

        var table = $('#datatable_1').DataTable(data_table_config);

        $('#atm_id').selectize({
            delimiter: ',',
            persist: false,
            openOnFocus: true,
            valueField: 'id',
            labelField: 'description',
            searchField: 'description',
            maxItems: 1,
            options: {!! $data['lists']['atms'] !!}
        });

        var inputs = {!! $data['inputs'] !!};

        if (inputs !== null) {
            $("#timestamp").val(inputs.timestamp);
            $('#record_limit').val(inputs.record_limit);
            $('#atm_id').selectize()[0].selectize.setValue(inputs.atm_id, false);
        }

        $("#clean").click(function() {
            $('#record_limit').val(null);
            $('#atm_id').selectize()[0].selectize.setValue(null, false);
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
