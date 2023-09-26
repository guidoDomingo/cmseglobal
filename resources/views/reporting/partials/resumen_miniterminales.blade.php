<section class="content">
    <!-- Modal -->
    <div id="myModal" class="modal fade modal-xl" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                      <button type="button" class="btn btn-danger btn-sm pull-right" data-bs-dismiss="modal" id="button_modal_close_x" title="Cerrar Ventana"> 
                        <i class="fa fa-times"></i>
                    </button>
                    <h4 class="modal-title">Sucursales del grupo : <label class="grupo"></label></h4>
                </div>
                <div class="modal-body">
                    <table id="detalles" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="Table1_info">
                        <thead>
                        <tr role="row">
                            <th style="display:none;" class="sorting_disabled" rowspan="1" colspan="1"></th>
                            <th style="display:none;" class="sorting_disabled" rowspan="1" colspan="1"></th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">#</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Sucursal</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Ultimo Uso</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Saldo</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Estado</th>
                        </tr>
                        </thead>
                        <tbody id="modal-contenido">

                        </tbody>
                    </table>

                    <table id="detalles_cuotas" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="Table1_info">
                        <thead>
                        <tr role="row">
                            <th style="display:none;" class="sorting_disabled" rowspan="1" colspan="1"></th>
                            <th style="display:none;" class="sorting_disabled" rowspan="1" colspan="1"></th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Tipo</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Cliente</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Vencimiento</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Cuota Nro.</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Saldo</th>
                        </tr>
                        </thead>
                        <tbody id="modal-cuotas">

                        </tbody>
                    </table>

                    <div class="text-center" id="cargando" style="margin: 50px 10px"> {{-- clase para bloquear el div y mostrar el loading --}}
                        <i class="fa fa-refresh fa-spin" style="font-size:24px"></i>
                    </div>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-danger pull-right" data-bs-dismiss="modal" id="button_modal_close" title="Cerrar Ventana"> 
                        <i class="fa fa-close"></i> &nbsp; Cerrar Ventana
                    </button>
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
                <ol class="breadcrumb" style="float: right;">
                    <button type="button" class="btn btn-primary" title="Ayuda e información" data-bs-toggle="modal"
                        data-bs-target="#modal_help" style="border-radius: 5px; margin-bottom: 5px">
                        <span class="fa fa-question" aria-hidden="true"></span> Ayuda
                    </button>
                </ol>
                <!-- /.box-header -->
                <form action="{{route('reporting.resumen_miniterminales.search')}}" method="GET" id="estadoContable-form">
                    @if ( !\Sentinel::getUser()->inRole('mini_terminal') && !\Sentinel::getUser()->inRole('supervisor_miniterminal'))

                    <div class="box-body" style="display: block;">
                        
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- Date and time range -->
                                <div class="form-group">
                                    <label>Rango de Tiempo & Fecha:</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                                        <input name="reservationtime" type="text" id="reservationtime" class="form-control pull-right" value="{{old('reservationtime', $reservationtime ?? '')}}" />
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
                    {{--<div class="box-tools">
                        <div class="input-group" style="width:200px; float:right; padding-right:10px">
                            {!! Form::model(Request::only(['context']),['route' => 'reporting.resumen_miniterminales.search', 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
                            {!! Form::text('context' ,null , ['class' => 'form-control input-sm pull-right', 'placeholder' => 'Buscar', 'autocomplete' => 'off' ]) !!}
                            {!! Form::close()!!}
                        </div>
                    </div>--}}
                @elseif (\Sentinel::getUser()->inRole('supervisor_miniterminal'))
                    <div class="box-body" style="display: block;">
                            
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- Date and time range -->
                                <div class="form-group">
                                    <label>Rango de Tiempo & Fecha:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input name="reservationtime" type="text" id="reservationtime" class="form-control pull-right" value="{{old('reservationtime', $reservationtime ?? '')}}" />
                                    </div>
                                    <div class="resumen">
                                        <label>
                                            Resumen al dia de hoy
                                        </label>
                                        <label class="switch">
                                            <input type="checkbox" class="activar_resumen" name="activar_resumen" @if(isset($reservationtime) && $reservationtime == 0) checked="checked" @endif>
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
                @elseif (\Sentinel::getUser()->inRole('mini_terminal'))
                    <div class="box-body" style="display: block;">
                            
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- Date and time range -->
                                <div class="form-group">
                                    <label>Rango de Tiempo & Fechaa:</label>
                                    <div class="input-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                                            <input name="reservationtime" type="text" id="reservationtime" class="form-control pull-right" value="{{ old('reservationtime', $reservationtime ?? '') }}" />
                                        </div>
                                    </div>
                                    <div class="resumen">
                                        <label>
                                            Resumen al dia de hoy
                                        </label>
                                        <label class="switch">
                                            <input type="checkbox" class="activar_resumen" name="activar_resumen" @if(isset($reservationtime) && $reservationtime == 0) checked="checked" @endif>
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
                                </div>
                            </div>
                        
                        </div>
                        <!-- /.row -->
                    </div>
                @endif

                <!-- /.box-body -->
                <div class="box-footer" style="display: block;">
                </div>
                </form>
            </div>
        </div>
    </div>
    @if(isset($transactions_groups))
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Resultados</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body  no-padding" style="overflow: scroll">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Total Transaccionado</th>
                                        <th>Total Pagado</th>
                                        <th>Total Reversado</th>
                                        <th>Total Cashout</th>
                                        <th>Total Pago QR</th>
                                        <th>Total Cuotas</th>
                                        <th>Saldo</th>
                                        <th>Estado</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions_groups as $transaction)
                                        <tr data-group_id="{{ $transaction->group_id  }}" data-grupo="{{ $transaction->grupo }}">
                                            <td class="{{$transaction->group_id}}">
                                                {{ $transaction->grupo }}
                                                @if (!\Sentinel::getUser()->inRole('mini_terminal'))
                                                    <div class="btn-group">
                                                        <buttom class="btn btn-default btn-xs" title="Mostrar atms">
                                                            <i class="pay-info fa fa-info-circle" style="cursor:pointer"></i>
                                                        </buttom>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ number_format($transaction->transacciones, 0) }}</td>
                                            <td>{{ number_format($transaction->depositos, 0) }}</td>
                                            <td>{{ number_format($transaction->reversiones, 0) }}</td>
                                            <td>{{ number_format($transaction->cashouts, 0) }}</td>
                                            <td>{{ number_format($transaction->pago_qr, 0) }}</td>
                                            <td>
                                                {{ number_format($transaction->cuotas, 0) }}
                                                <div class="btn-group">
                                                    <buttom class="btn btn-default btn-xs" title="Mostrar atms">
                                                        <i class="cuotas-info fa fa-info-circle" style="cursor:pointer"></i>
                                                    </buttom>
                                                </div>
                                            </td>
                                            @if($transaction->saldo > 0)
                                                <td style="color:red">{{ number_format($transaction->saldo, 0) }}</td>
                                            @else
                                                <td style="color:green">{{ number_format($transaction->saldo, 0) }}</td>
                                            @endif
                                            <td>
                                                @if( $transaction->estado == 'activo' )
                                                    <span class="label label-success">Activo</span>
                                                @elseif( $transaction->estado == 'bloqueado' )
                                                    <span class="label label-danger">Bloqueado</span>
                                                @elseif( $transaction->estado == 'inactivo' )
                                                <span class="label label-warning">Inactivo</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <div class="description-block border-right">
                                            {{-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> --}}
                                            <h2 class="description-header">{{ $total_debe_grupo }}</h2>
                                            <span class="description-text">TOTAL TRANSACCIONES</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <div class="description-block border-right">
                                            {{-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> --}}
                                            <h2 class="description-header">{{ $total_haber_grupo }}</h2>
                                            <span class="description-text">TOTAL PAGADO</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <div class="description-block border-right">
                                            {{-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> --}}
                                            <h2 class="description-header">{{ $total_reversion_grupo }}</h2>
                                            <span class="description-text">TOTAL REVERSADO</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <div class="description-block border-right">
                                            {{-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> --}}
                                            <h2 class="description-header">{{ $total_cashout_grupo }}</h2>
                                            <span class="description-text">TOTAL CASHOUT</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <div class="description-block border-right">
                                            {{-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> --}}
                                            <h2 class="description-header">{{ $total_pago_qr_grupo }}</h2>
                                            <span class="description-text">TOTAL PAGO QR</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <div class="description-block border-right">
                                            {{-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> --}}
                                            <h2 class="description-header">{{ $total_cuota_grupo }}</h2>
                                            <span class="description-text">TOTAL CUOTA</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="description-block border-right">
                                            {{-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> --}}
                                            <h2 class="description-header">{{ $total_saldo_groups }}</h2>
                                            <span class="description-text">SALDO</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="box-footer clearfix">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" role="status" aria-live="polite">{{ $transactions_groups->total() }} registros en total</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers">
                                    {!! $transactions_groups->appends(['reservationtime' => $reservationtime])->links('paginator')  !!}
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    @endif

    <!-- Modal ayuda-->
    <div id="modal_help" class="modal fade" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document"
            style="width: 800px; background: white; border-radius: 5px;">
            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
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

                                <b>Total Pagado:</b>
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

                                <b>Total Pagado:</b>
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

                                <b>Total Pagado:</b>
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
                                style="margin-right: 10px" data-bs-dismiss="modal">
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

       <!--  BEGIN CUSTOM SCRIPT FILE  -->

    <script src="{{ asset('src/plugins/src/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
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

    <link rel="stylesheet" href="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css">
    <script src="/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js"></script>

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
            //$('#reservationtime').val()
            var valuee=$('#reservationtime').val();
            if($('#reservationtime').val() == '' || $('#reservationtime').val() == 0){
                var date = new Date();
                var init = new Date(date.getFullYear(), date.getMonth(), date.getDate());
                var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

                var initWithSlashes = (init.getDate()) + '/' + (init.getMonth() + 1) + '/' + init.getFullYear() + ' 00:00:00';
                var endDayWithSlashes = (end.getDate()) + '/' + (end.getMonth() + 1) + '/' + end.getFullYear() + ' 23:59:59';
                //$('#reservationtime').val(initWithSlashes + ' - ' + endDayWithSlashes);
                var valuee=$('#reservationtime').val(initWithSlashes + ' - ' + endDayWithSlashes);
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
             $(document).on('click', '.pay-info', function(e) {
            e.preventDefault();
            var row = $(this).parents('tr');
            var group_id = row.data('group_id');
            console.log(group_id);
            var grupo = row.data('grupo');            
            if(moment(valuee, 'DD/MM/YYYY hh:mm:ss - DD/MM/YYYY hh:mm:ss').isValid()){
                var fecha=valuee.split("-");
                var dayinit=moment(fecha[0], 'DD/MM/YYYY hh:mm:ss').valueOf();
                var dayend=moment(fecha[1], 'DD/MM/YYYY hh:mm:ss').valueOf();
                var day=dayinit + '-' + dayend;
            }else{
                day=$("input[name=activar_resumen]:checked").val();
                if(day==1){
                    day=0;
                }
            }

            console.log(day);
            $("#modal-contenido").html('');
            $('#cargando').show();
            $("#detalles").hide();
            $("#detalles_cuotas").hide();
            
            $.get('{{ url('reports') }}/info/get_branch_groups/' + group_id + '/' + day, 
            
                function(data) {
                    $(".grupo").html(grupo);
                    $("#modal-contenido").html(data);
                    $("#detalles").show();
                    $("#detalles_cuotas").hide();
                    $('#cargando').hide();
                    $("#myModal").modal('show');
                });
                $("#myModal").modal('show');

            });
              $(document).on('click', '.cuotas-info', function(e) {
                e.preventDefault();
                var row = $(this).parents('tr');
                var group_id = row.data('group_id');
                console.log(group_id);
                var grupo = row.data('grupo');            

                $("#modal-cuotas").html('');
                $('#cargando').show();
                $("#detalles").hide();
                $("#detalles_cuotas").hide();

                $.get('{{ url('reports') }}/info/get_cuotas_groups/' + group_id, 
            
                function(data) {
                    console.log(data);
                    $(".grupo").html(grupo);
                    $("#modal-cuotas").html(data);
                    $("#detalles").hide();
                    $("#detalles_cuotas").show();
                    $('#cargando').hide();
                    $("#myModal").modal('show');
                });
                $("#myModal").modal('show');

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

            var table = $('#datatable_1').DataTable({
                "paging":       true,
                "ordering":     true,
                "info":         true,
                "searching":    true,
                dom: '<"pull-left"f><"pull-right"l>tip',
                language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
                columnDefs: [{
                    targets: 'no-sort',
                    orderable: false,
                }],
            });

            var ths = $("#datatable_1").find("th");


            if($("input[name=activar_resumen]:checked").val() == 1){
                $('.activar_resumen').trigger('change');
            }else{
                $('.activar_cierre').trigger('change');
            }
            
        });
    </script>
@endsection
@section('aditional_css')

    <!-- Bootstrap 3.3.4 -->
    {{-- <link rel="stylesheet" href="{{ URL::asset('/bower_components/admin-lte/bootstrap/css/bootstrap.min.css') }}"> --}}

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('src/assets/css/light/components/carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/assets/css/light/components/modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/light/components/tabs.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('src/assets/css/dark/components/carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/assets/css/dark/components/modal.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/components/tabs.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('src/plugins/src/filepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">
    <link href="{{ asset('src/plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->


    <!-- DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->

    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/light/forms/switches.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/dark/forms/switches.css') }}">

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

        /* Estilos CSS */
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