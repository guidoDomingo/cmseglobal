<section class="content">
    <!-- Modal -->
    <div id="myModal" class="modal fade modal-xl" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detalles - Transaccion Nro : <label class="idTransaccion"></label></h4>
                </div>
                <div class="modal-body">
                    <table id="detalles" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="Table1_info">
                        <thead>
                        <tr role="row">
                            <th style="display:none;" class="sorting_disabled" rowspan="1" colspan="1"></th>
                            <th style="display:none;" class="sorting_disabled" rowspan="1" colspan="1"></th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Parte</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Tipo</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Denominacion</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Cantidad</th>
                        </tr>
                        </thead>
                        <tbody id="modal-contenido">

                        </tbody>
                        <tfoot>
                        <tr>
                            <th style="display:none;" rowspan="1" colspan="1"></th>
                            <th style="display:none;" rowspan="1" colspan="1"></th>
                            <th rowspan="1" colspan="1">Parte</th>
                            <th rowspan="1" colspan="1">Tipo</th>
                            <th rowspan="1" colspan="1">Denominacion</th>
                            <th rowspan="1" colspan="1">Cantidad</th>
                        </tr>
                        </tfoot>
                    </table>
                    <div id="status_description"></div>
                    <table id="payment_details" style="display: none;" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="Table2_info">                                             <thead>
                        <tr role="row">
                            <th style="display:none;" class="sorting_disabled" rowspan="1" colspan="1"></th>
                            <th style="display:none;" class="sorting_disabled" rowspan="1" colspan="1"></th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Valor a pagar</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Valor recibido</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Valor devuelto</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Fecha</th>
                        </tr>
                        </thead>
                        <tbody id="modal-contenido-payments">

                        </tbody>
                        <tfoot>
                        <tr>
                            <th style="display:none;" rowspan="1" colspan="1"></th>
                            <th style="display:none;" rowspan="1" colspan="1"></th>
                            <th rowspan="1" colspan="1">Valor a pagar</th>
                            <th rowspan="1" colspan="1">Valor recibido</th>
                            <th rowspan="1" colspan="1">Valor devuelto</th>
                            <th rowspan="1" colspan="1">Fecha</th>
                        </tr>
                        </tfoot>
                    </table>
                    <div id="devoluciones" style="display: none">
                        <div id="keys_spinn" class="text-center" style="margin: 50px 10px; display: none;"><i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></div>
                        <div id="message_box" class="display: none;"></div>
                        <form role="form" id="devolucion-form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="txtDescription">Descripción</label>
                                <textarea id="txtDescription" name="txtDescription" class="form-control" rows="3" placeholder="Describa brevemente el caso ..."></textarea>
                                <input type="hidden" id="txttransaction_id">
                            </div>
                            <div class="form-group">
                                <label for="fuComprobante">Adjunte un comprobante</label>
                                <input type="file" id="fuComprobante" name="fuComprobante">

                                <p class="help-block">El archivo debe ser una imagen.</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                    </div>
                    <div id="reprocesos" style="display: none">
                        <div id="reprocesar-info">
                            <p><b>Servicio  :</b> <span id="service_description"></span></p>
                            <p><b>Monto:</b>      <span id="transaction_amount"></span></p>
                            <p><b>Referencia:</b> <span id="transaction_referece"></span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--para activar modals con formularios para reproceso y devolución respectivamente -->
                    <button type="button" style="display: none" class="reprocesar btn btn-primary pull-left">Reprocesar</button>
                    <button type="buttom" style="display: none" class="devolucion btn btn-primary pull-left">Devolución</button>

                    <!--para ejecutar tareas de reproceso o devolucion -->
                    <button type="buttom" style="display: none" id="process_devolucion" class="btn btn-primary pull-left">Enviar a devolución</button>
                    <button type="button" style="display: none" id="run_reprocesar"class="btn btn-primary pull-left">Enviar a Reprocesar</button>
                    <!--para Cancelar sin hacer nada -->
                    <button type="button" class="btn btn-default pull-right" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Print Section -->
    <div id="printSection" class="printSection" style="visibility:hidden;"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtros de búsqueda</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <form action="{{route('reporting.historial_bloqueos.search')}}" method="GET" id="estadoContable-form">
                    <div class="box-body" style="display: block;">
                        <div class="row">
                            @if( !\Sentinel::getUser()->inRole('mini_terminal'))
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    {!! Form::label('group', 'Grupo') !!}
                                    {!! Form::select('group_id', $groups, $group_id, ['id' => 'group_id','class' => 'form-control select2']) !!}
                                    <br><br>
                                    {!! Form::label('atm', 'Atm') !!}
                                    {!! Form::select('atm_id', $atms, $atm_id, ['id' => 'atm_id','class' => 'form-control select2']) !!}
                                    <br><br>
                                </div>
                                <!-- /.form-group -->
                                
                            </div>
                            @endif
                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- Date and time range -->
                                <div class="form-group">
                                    <label>Rango de Tiempo & Fecha:</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                                        <input name="reservationtime" type="text" id="reservationtime" class="form-control pull-right" value="{{old('reservationtime', $reservationtime ?? '')}}" />
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-primary" name="search" value="search">BUSCAR</button>
                                    </div>
                                    {{--<div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-success" name="download" value="download">EXPORTAR</button>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer" style="display: block; ">
                        <div class="input-group" style="width:150px; float: right">
                            {!! Form::model(Request::only(['context']),['route' => 'reporting.boletas_depositos.search', 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
                            {{--{!! Form::text('context' ,null , ['class' => 'form-control input-sm pull-right', 'placeholder' => 'Número de Boleta', 'autocomplete' => 'off' ]) !!}--}}
                            {!! Form::close()!!}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(isset($transactions))
        <div class="row">
            <div class="col-md-12">
                <div class=" box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Resultados</h3>
                        <div class="box-tools">
                            <div class="box-footer" style="display: block; ">
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
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Saldo Pendiente</th>
                                        <th>Descripcion estado</th>
                                        <th>Accion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->id }}</td>
                                            <td>{{ $transaction->nombre }}</td>
                                            <td>{{ Carbon\Carbon::parse($transaction->fecha)->format('d/m/Y H:i') }}</td>
                                            <td>{{ number_format($transaction->saldo_pendiente, 0) }}</td>
                                            <td>
                                                @if(isset($transaction->description))
                                                    {{ $transaction->description }}
                                                @else
                                                    --
                                                @endif
                                            </td>
                                            <td>
                                                @if($transaction->bloqueado == 'Bloqueado')
                                                    <span class="label label-warning">Bloqueado</span>
                                                @else
                                                    <span class="label label-success">Desbloqueado</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class=" clearfix">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" role="status" aria-live="polite">{{ $transactions->total() }} registros en total</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    {!! $transactions->appends(['reservationtime' => $reservationtime, 'atm_id' => $atm_id, 'group_id' => $group_id])->links('paginator') !!}
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
    <script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>

    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
    <script>
        $(function(){

            //Cascading dropdown list de redes / sucursales
            $('.select2').select2();
            $('.mostrar').hide();

            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
            //reservation date preset
            $('#reservationtime').val()
            if($('#reservationtime').val() == '' || $('#reservationtime').val() == 0){
                var date = new Date();
                var init = new Date(date.getFullYear(), date.getMonth(), date.getDate());
                var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

                var initWithSlashes = (init.getDate()) + '/' + (init.getMonth() + 1) + '/' + init.getFullYear() + ' 00:00:00';
                var endDayWithSlashes = (end.getDate()) + '/' + (end.getMonth() + 1) + '/' + end.getFullYear() + ' 23:59:59';

                $('#reservationtime').val(initWithSlashes + ' - ' + endDayWithSlashes);
            }
            //Date range picker
            $('#reservation').daterangepicker();
            $('#reservationtime').daterangepicker({
                ranges: {
                    'Hoy': [moment(), moment()],
                    'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()],
                    'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
                    'Mes': [moment().startOf('month'), moment().endOf('month')],
                    'Mes Pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                locale: {
                    applyLabel: 'Aplicar',
                    fromLabel: 'Desde',
                    toLabel: 'Hasta',
                    customRangeLabel: 'Rango Personalizado',
                    daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie','Sab'],
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    firstDay: 1
                },

                format: 'DD/MM/YYYY HH:mm:ss',
                startDate: moment().startOf('month'),
                endDate: moment().endOf('month'),
            });

            $(document).on('change', '.activar_resumen', function(){
                var isActive = $(this).prop('checked');
                $('#reservationtime').attr('disabled', isActive);
            });

            $('.activar_resumen').trigger('change');

            $('#group_id').on('change', function(e){
                var group_id = e.target.value;            
                $.get('{{ url('reports') }}/ddl/atms/' + group_id, function(atms) {
                    $('#atm_id').empty();
                    $.each(atms, function(i,item){
                        $('#atm_id').append($('<option>', {
                            value: i,
                            text : item
                        }));
                    });
                });
            });
        });
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
    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display:  inline-block;
            width:    30px;
            height:   17px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 13px;
            width: 13px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(13px);
            -ms-transform: translateX(13px);
            transform: translateX(13px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .resumen {
            margin-top: 7px;
            margin-bottom: -28px;
        }
        .paginator li>a {
            border: 1px solid white;
        }
        .paginator li>a {
            background-color: #060818;
        }

    </style>
@endsection