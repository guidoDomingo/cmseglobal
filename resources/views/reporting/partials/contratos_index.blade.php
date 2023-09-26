<section class="content">
   
    <!-- Print Section -->
    <div id="printSection" class="printSection" style="visibility:hidden;"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtros de búsqueda</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('reports.contracts.search') }}" method="GET">
                    <div class="box-body" style="display: block;">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('groups', 'Grupos') !!}
                                    {!! Form::select('group_id', $groups, $group_id, ['id' => 'group_id', 'class' => 'form-control select2']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('atm', 'ATMs') !!}
                                 
                                    {!! Form::select('atm_id', $atms, $atm_id , ['id' => 'atm_id','class' => 'form-control select2']) !!}
                                </div>
                  
                                {{-- <div class="form-group">
                                    {!! Form::label('contracts', 'Contratos') !!}
                                    {!! Form::select('contract_id', $contracts, $contract_id , ['id' => 'contract_id','class' => 'form-control select2']) !!}
                                </div> --}}

                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- Date and time range -->
                                <div class="form-group">
                                    <label>Rango de Tiempo & Fecha:</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                                        <input name="reservationtime" type="text" id="reservationtime"
                                            class="form-control pull-right"
                                            value="{{ old('reservationtime', $reservationtime ?? '') }}" />
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    {!! Form::label('status', 'Estado del contrato') !!}
                                    {!! Form::select('status',[ '0'=> 'Todos', '1' =>'Recepcionado', '2' => 'Activo', '3' =>'Inactivo', '4' =>'Vencido'],$status, ['id' => 'status','class' => 'form-control']) !!}
                                </div>
                                
                                <!-- /.form group -->
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-primary" name="search"
                                            value="search" id="buscar">BUSCAR</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-success" name="download"
                                            value="download">EXPORTAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                  


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer" style="display: block;">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (isset($contracts))
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Resultados</h3>
                        <div class="box-tools">
                            <div class="input-group" style="width:150px;">
                                {!! Form::model(Request::only(['context']), ['route' => 'reports.contracts.search', 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
                                {!! Form::text('context', null, ['class' => 'form-control input-sm pull-right', 'placeholder' => 'Contrato N°', 'autocomplete' => 'off']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body  no-padding" style="overflow: scroll">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                                    <tbody>
                                        <thead>
                                            <tr>
                                                <th style="text-align:center; width:10px">#</th>
                                                <th style="text-align:center; width:88px">Contrato N°</th>
                                                <th style="text-align:center;">Tipo de contrato</th>
                                                <th style="text-align:center; width:90px">Vigencia del contrato</th>
                                                <th style="text-align:center;">Días restantes</th>
                                                <th style="text-align:center;">Limite de crédito</th>
                                                <th style="text-align:center;">Estado del contrato</th>
                                                <th style="text-align:center;">Fecha de recepción</th>
                                                <th style="text-align:center;">Fecha de aprobación</th>
                                                <th style="text-align:center;">Grupo</th>
                                                <th style="text-align:center;">ATM</th>
                                                <th style="text-align:center;">Inicio de operación</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        @foreach ($contracts as $contract)
                                            <tr>
                                                <td>{{ $contract->id_contract }}</td>
                                                <td style="font-size:0.90em; text-align:center;">{{ $contract->number_contract }}</td>
                                                <td style="font-size:0.90em; text-align:center;">{{ $contract->description_contract_type }}</td>
                                                <td style="font-size:0.90em; text-align:center;">{{ Carbon\Carbon::parse($contract->date_init)->format('d/m/Y') }} - {{ Carbon\Carbon::parse($contract->date_end)->format('d/m/Y') }}</td>
                                                <td style="font-size:0.90em; text-align:center;">{{ $contract->restantes }}</td>
                                                <td style="font-size:0.90em; text-align:center;">{{ number_format($contract->credit_limit, 0) }}</td>
                                                @if ($contract->status == 1)
                                                    <td style="font-size:0.90em; text-align:center;"> Recepcionado</td>
                                                @elseif  ($contract->status == 2)
                                                    <td style="font-size:0.90em; text-align:center;"> Activo</td>
                                                @elseif  ($contract->status == 3)
                                                    <td style="font-size:0.90em; text-align:center;"> Inactivo</td>
                                                @elseif  ($contract->status == 4)
                                                    <td style="font-size:0.90em; text-align:center;">Vencido</td>
                                                @endif
                                                <td style="font-size:0.90em; text-align:center;">{{ Carbon\Carbon::parse($contract->reception_date)->format('d/m/Y') }}</td>
                                                @if(!is_null($contract->fecha_aprobacion))
                                                    <td style="font-size:0.90em; width:80px; text-align:center;">{{ Carbon\Carbon::parse($contract->fecha_aprobacion)->format('d/m/Y') }}</td>
                                                @else
                                                    <td style="font-size:0.90em; width:80px"></td>
                                                @endif
                                                <td style="font-size:0.90em;">{{ $contract->group_description }}</td>
                                                <td style="font-size:0.90em; width:200px">{{ $contract->name }}</td>
                                                @if(!is_null($contract->inicio_operacion))
                                                    <td style="font-size:0.90em; width:80px; text-align:center;">{{ Carbon\Carbon::parse($contract->inicio_operacion)->format('d/m/Y') }}</td>
                                                @else
                                                    <td style="font-size:0.90em; width:80px"></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" role="status" aria-live="polite">
                                    <div class="dataTables_info" role="status" aria-live="polite">{{ $contracts->total() }} registros en total</div>
                                </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    @if (count($contracts) > 0)
                                        {!! $contracts->appends(['group_id' => $group_id,  'reservationtime' => $reservationtime, ])->links('paginator') !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>

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
    <!-- InputMask -->
    <script src="/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <link href="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <script src="/bower_components/admin-lte/plugins/daterangepicker/moment.min.js"></script>
    <script src="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
    
    <script>
        //Cascading dropdown list de redes / sucursales
        $('.select2').select2();

        $('#group_id').on('change', function(e) {
            var group_id = e.target.value;
            $.get('{{ url('reports') }}/ddl/owners/' + group_id, function(owners) {
                $('#owner_id').empty();
                $.each(owners, function(i, item) {
                    $('#owner_id').append($('<option>', {
                        value: i,
                        text: item
                    }));
                });
            });

            $.get('{{ url('reports') }}/ddl/branches/' + group_id, function(branches) {
                $('#branch_id').empty();
                $.each(branches, function(i, item) {
                    $('#branch_id').append($('<option>', {
                        value: i,
                        text: item
                    }));
                });
            });
        });

        $('#owner_id').on('change', function(e) {
            var group_id = $("#group_id").val();
            var owner_id = e.target.value;
            $.get('{{ url('reports') }}/ddl/branches/' + group_id + '/' + owner_id, function(branches) {
                $('#branch_id').empty();
                $.each(branches, function(i, item) {
                    $('#branch_id').append($('<option>', {
                        value: i,
                        text: item
                    }));
                });
            });
        });

        $('#branch_id').on('change', function(e) {
            var branch_id = e.target.value;
            console.log(branch_id)
            $.get('{{ url('reports') }}/ddl/pdv/' + branch_id, function(data) {
                $('#pos_id').empty();
                $.each(data, function(i, item) {
                    $('#pos_id').append($('<option>', {
                        value: i,
                        text: item
                    }));
                });
            });
        });


        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {
            "placeholder": "dd/mm/yyyy"
        });
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {
            "placeholder": "mm/dd/yyyy"
        });
        //reservation date preset
        $('#reservationtime').val()



        if ($('#reservationtime').val() == '' || $('#reservationtime').val() == 0) {
      

            $('#reservationtime').val('Todos');
        }
        //Date range picker
        $('#reservation').daterangepicker();
        $('#reservationtime').daterangepicker({
            ranges: {
                'Todos':[moment().startOf('year'), moment()],
                'Hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()],
                'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
                'Mes': [moment().startOf('month'), moment().endOf('month')],
                'Mes Pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            },
            locale: {
                applyLabel: 'Aplicar',
                fromLabel: 'Desde',
                toLabel: 'Hasta',
                customRangeLabel: 'Rango Personalizado',
                daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre',
                    'Octubre', 'Noviembre', 'Diciembre'
                ],
                firstDay: 1
            },

            format: 'DD/MM/YYYY HH:mm:ss',
            startDate: moment().startOf('month'),
            endDate: moment().endOf('month'),
        });

        $('#reservationtime').attr({
            'onkeydown': 'return false'
        });

        var fechaIncio = $('#reservationtime').val().substr(0, 10);
        var fechaFin = $('#reservationtime').val().substr(22, 10);
        var fecha1 = moment(fechaIncio, "MM-DD-YYYY");
        var fecha2 = moment(fechaFin, "MM-DD-YYYY");
        const diferencia = fecha2.diff(fecha1, 'days');
        var rsultadoDif = Math.round(diferencia / (24));



    
    </script>
@endsection
@section('aditional_css')
     <link href="{{ asset('src/assets/css/light/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />

  
    <!-- DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        @media print {
            body * {
                visibility: hidden;

            }

            #printSection,
            #printSection * {
                visibility: visible;
            }

            #printSection {
                font-size: 11px;
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                left: 0;
                top: 0;
            }
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
