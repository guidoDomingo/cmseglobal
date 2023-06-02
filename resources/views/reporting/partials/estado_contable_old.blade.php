<section class="content">
    <ol class="breadcrumb" style="float: right;">
        <button type="button" class="btn btn-primary" title="Ayuda e información" data-toggle="modal"
            data-target="#modal_help" style="border-radius: 5px; margin-botton: 5px">
            <span class="fa fa-question" aria-hidden="true"></span> Ayuda
        </button>
    </ol>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Print Section -->
    
    <div id="printSection" class="printSection" style="visibility:hidden;"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtros de búsqueda</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                    
                </div>
                <!-- /.box-header -->
                <form action="{{route('reporting.estado_contable_old.search')}}" method="GET" id="estadoContable-form">
                    <div class="box-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                @if( !\Sentinel::getUser()->inRole('mini_terminal') && !\Sentinel::getUser()->inRole('supervisor_miniterminal'))
                                    <div class="form-group">
                                        {!! Form::label('user', 'Usuario Mini Terminal') !!}
                                        {!! Form::select('user_id', $data_select, $user_id, ['id' => 'user_id','class' => 'form-control select2', 'placeholder' => 'Seleccione el usuario']) !!}
                                    </div>
                                @endif

                                @if(\Sentinel::getUser()->inRole('supervisor_miniterminal'))
                                    <div class="form-group">
                                        {!! Form::label('user', 'Usuario Mini Terminal') !!}
                                        {!! Form::select('user_id', $data_select, $user_id, ['id' => 'user_id','class' => 'form-control select2', 'placeholder' => 'Seleccione el usuario']) !!}
                                    </div>
                                @endif
                                
                                <div class="form-group">
                                    {!! Form::label('mostrar', 'Mostrar') !!}
                                    {!! Form::select('mostrar', ['todos' => 'Todos', 'depositos' => 'Depósitos', 'transacciones' => 'Transacciones', 'reversiones' => 'Reversiones'], $mostrar, ['id' => 'traer','class' => 'form-control select2']) !!}
                                </div>
                                <!-- /.form-group -->
                                
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- Date and time range -->
                                <div class="form-group">
                                    <label>Rango de Tiempo & Fecha:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input name="reservationtime" type="text" id="reservationtime" class="form-control pull-right" value="{{$reservationtime or ''}}" />
                                    </div>
                                    <div class="resumen">
                                        <label>
                                            Resumen al dia de hoy
                                        </label>
                                        <label class="switch">
                                            <input type="checkbox" class="activar_resumen" name="activar_resumen" value="1" @if(isset($reservationtime) && $reservationtime == 0 && $activar_resumen == 1) checked="checked" @endif>
                                            <span class="slider round"></span>
                                        </label>
                                        &nbsp &nbsp &nbsp
                                        <label>
                                            Resumen al cierre
                                        </label>
                                        <label class="switch">
                                            <input type="checkbox" class="activar_cierre" name="activar_resumen" value="2" @if(isset($reservationtime) && $reservationtime == 0 && $activar_resumen == 2) checked="checked" @endif>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-primary" name="search" value="search">BUSCAR</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-success" name="download" value="download">EXPORTAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer" style="display: block;">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(isset($transactions))
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Resultados</h3>
                        <div class="box-tools">
                            <div class="input-group" style="width:150px;">
                                {!! Form::model(Request::only(['context']),['route' => 'reporting.estado_contable_old.search', 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
                                {!! Form::text('context' ,null , ['class' => 'form-control input-sm pull-right', 'placeholder' => 'Buscar', 'autocomplete' => 'off' ]) !!}
                                {!! Form::close()!!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body  no-padding" style="overflow: scroll">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped" role="grid">
                                    <tbody>
                                    <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Concepto</th>
                                        <th>Debe</th>
                                        <th>Haber</th>
                                        <th>Saldo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{ Carbon\Carbon::parse($transaction->fecha)->format('d/m/Y H:i:s') }}</td>
                                            <td>{{ $transaction->concepto }}</td>
                                            <td class='text-right'>{{ number_format($transaction->debe,0) }}</td>
                                            <td class='text-right'>{{ number_format($transaction->haber,0) }}</td>
                                            <td class='text-right'>{{ number_format($transaction->saldo,0) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="description-block border-right">
                                            {{-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> --}}
                                            <h2 class="description-header">{{ $total_debe }}</h2>
                                            <span class="description-text">TOTAL TRANSACCIONES</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6 col-xs-6">
                                        <div class="description-block border-right">
                                            {{-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> --}}
                                            <h2 class="description-header">{{ $total_haber }}</h2>
                                            <span class="description-text">TOTAL PAGADO</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6 col-xs-6">
                                        <div class="description-block border-right">
                                            {{-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> --}}
                                            <h2 class="description-header">{{ $total_reversion }}</h2>
                                            <span class="description-text">TOTAL REVERSADO</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6 col-xs-6">
                                        <div class="description-block border-right">
                                            {{-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> --}}
                                            <h2 class="description-header">{{ $total_cashout }}</h2>
                                            <span class="description-text">TOTAL CASHOUT</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-12 col-xs-12">
                                        <div class="description-block border-right">
                                            {{-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> --}}
                                            @if($total_saldo > 0)
                                                <h2 class="description-header"  style="color:red">{{ $total_saldo }}</h2>
                                            @else
                                                <h2 class="description-header"  style="color:green">{{ $total_saldo }}</h2>
                                            @endif
                                            <span class="description-text">SALDO</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" role="status" aria-live="polite">{{ $transactions->total() }} registros en total</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers">
                                    {!! $transactions->appends(['reservationtime' => $reservationtime, 'user_id' => $user_id])->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal ayuda-->
    <div id="modal_help" class="modal fade" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
            style="width: 800px; background: white; border-radius: 5px">
            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title" style="font-size: 20px;">
                        Ayuda e información &nbsp; <small> <b> </b> </small>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <!-- TAB PANNEL -->
                <div class="panel with-nav-tabs">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_help_0" data-toggle="tab">
                                    Resumen al dia de hoy </a>
                            </li>
                            <li><a href="#tab_help_1" data-toggle="tab">
                                Resumen al Cierre </a>
                            </li>
                            <li><a href="#tab_help_2" data-toggle="tab">
                                    Búsqueda personalizada </a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <!-- Solamente el contenido se cambia -->
                            <div class="tab-pane fade in active" id="tab_help_0">
                                <h5><b>Definición de Resumen al dia de hoy:</b>
                                    El resumen al dia de hoy muestra un resumen en linea de la deuda del cliente, en dicho resumen 
                                    se tiene en cuenta todas las transacciones, todo lo depositado, hasta el momento de la consulta. </h5>
                                <hr />

                                <b>Total Transaccionado:</b> Todas las transacciones del cliente hasta la fecha. <br />

                                <b>Total Depositado:</b>
                                Todos los depositos de boletas del cliente hasta la fecha.<br />

                                <b>Saldo:</b>
                                El resultado de la diferencia entre lo transaccionado y lo depositado hasta la fecha. <br />
                            </div>
                            <div class="tab-pane fade" id="tab_help_1">
                                <h5><b>Definición de Resumen al cierre:</b>
                                    El resumen al cierre muestra un resumen segun la regla estipulada para cada cliente, en dicho 
                                    resumen se tiene en cuenta todas las transacciones hasta el ultimo dia de bloqueo adeudado y todo 
                                    lo depositado hasta la fecha.  </h5>
                                <hr/>

                                <b>Total Transaccionado:</b> Todas las transacciones del cliente hasta un dia anterior, al ultimo dia de bloqueo adeudado.
                                <br />
                                <b>Ejemplo 1: </b>
                                    Un lunes(dia de bloqueo) se habilita el resumen hasta el cierre y el resultado del total transaccionado 
                                    seria todo lo transaccionado hasta el dia antes(domingo) hasta las 23:59:59.
                                <br />
                                <b>Ejemplo 2: </b>
                                Un Martes(NO es dia de bloqueo) se habilita el resumen hasta el cierre y el resultado del total transaccionado 
                                seria todo lo transaccionado hasta el dia antes del ultimo dia de bloqueo(domingo) hasta las 23:59:59 ya que el 
                                cierre sigue siendo Lunes.
                                <br /><br />

                                <b>Total Depositado:</b>
                                Todos los depositos de boletas del cliente hasta la fecha. <br />

                                <br />

                                <b>Saldo:</b>
                                El resultado de la diferencia entre lo transaccionado y lo depositado. <br /><br /><br />

                                <b>Regla:</b>
                                Las reglas para consultar la transaccion al cierre son:
                                <br />

                                <ul>
                                    <li><b> Lunes: </b> Si buscas un dia Lunes se tiene en cuenta todas las transacciones del 
                                        cliente hasta el dia antes(Domingo) a las 23:59:59, ya que es dia de bloqueo.</li>

                                    <li><b> Martes: </b> Si buscas un dia Martes se tiene en cuenta todas las transacciones del 
                                        cliente hasta el dia antes del ultimo dia de bloqueo(Domingo) a las 23:59:59, ya que 
                                        NO es dia de bloqueo.</li>

                                    <li><b> Miercoles: </b> Si buscas un dia Miercoles se tiene en cuenta todas las transacciones 
                                        del cliente hasta el dia antes(Martes) a las 23:59:59, ya que es dia de bloqueo.</li>

                                    <li><b> Jueves: </b> Si buscas un dia Jueves se tiene en cuenta todas las transacciones del 
                                        cliente hasta el dia antes del ultimo dia de bloqueo(Martes) a las 23:59:59, ya que 
                                        NO es dia de bloqueo. </li>

                                    <li><b> Viernes: </b> Si buscas un dia Viernes se tiene en cuenta todas las transacciones 
                                        del cliente hasta el dia antes(Jueves) a las 23:59:59, ya que es dia de bloqueo. </li>

                                    <li><b> Sabado: </b> Si buscas un dia Sabado se tiene en cuenta todas las transacciones del 
                                        cliente hasta el dia antes del ultimo dia de bloqueo(Jueves) a las 23:59:59, ya que 
                                        NO es dia de bloqueo. </li>

                                    <li><b> Domingo: </b> Si buscas un dia Domingo se tiene en cuenta todas las transacciones del 
                                        cliente hasta el dia antes del ultimo dia de bloqueo(Jueves) a las 23:59:59, ya que 
                                        NO es dia de bloqueo. </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="tab_help_2">
                                <h5><b>Definición de Búsqueda Personalizada:</b>
                                    La Búsqueda Personalizada muestra un resumen donde se tienen en cuenta todas las transacciones 
                                    segun el rango de tiempo y fecha seleccionada, al igual que los depositos de boletas confirmados. <br /></h5>
                                <hr />

                                <b>Total Transaccionado:</b> Todas las transacciones del cliente en el rango de fecha y tiempo seleccionado.<br />

                                <b>Total Depositado:</b>
                                Todos los depositos de boletas confirmados en el rango de fecha y tiempo seleccionado. <br />

                                <b>Saldo:</b>
                                El resultado de la diferencia entre lo transaccionado y lo depositado en el rango de fecha y tiempo seleccionado. <br />

                                <br /> <br />
                            </div>
                        </div>
                    </div>
                    <!-- FIN TAB PANNEL -->
                </div>

                <div class="modal-footer">
                    <div style="float:right">
                        <div class="btn-group mr-2" role="group">
                            <button class="btn btn-danger pull-right" title="Cerrar ayuda e información."
                                style="margin-right: 10px" data-dismiss="modal">
                                <span class="fa fa-remove" aria-hidden="true"></span>
                                &nbsp; Cerrar ayuda
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('js')
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

            $('#estadoContable-form').validate({
                rules: {
                    "user_id": {
                        required: true,
                    },
                },
                messages: {
                    "user_id": {
                        required: "Seleccione un usuario",
                    },
                },
                errorPlacement: function (error, element) {
                    error.appendTo(element.parent());
                }
            });

            $(document).on('change', '.activar_resumen', function(){

            var isActive = $(this).prop('checked');
            $('#reservationtime').attr('disabled', isActive);
            $('.activar_cierre').prop("checked", false);

            });

            $(document).on('change', '.activar_cierre', function(){
            var isActive = $(this).prop('checked');
            $('#reservationtime').attr('disabled', isActive);
            $('.activar_resumen').prop("checked", false);

            });

            if($("input[name=activar_resumen]:checked").val() == 1){
            $('.activar_resumen').trigger('change');
            }else{
            $('.activar_cierre').trigger('change');
            }
        });
    </script>
@endsection
@section('aditional_css')
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

    </style>
@endsection