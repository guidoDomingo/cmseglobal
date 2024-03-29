<section class="content">
    <!-- Modal -->
    <div id="myModal" class="modal fade modal-xl" tabindex="-1" role="dialog"
        aria-labelledby="tabsModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="btn btn-danger btn-sm pull-right" data-bs-dismiss="modal" id="button_modal_close_x" title="Cerrar Ventana"> 
                        <i class="fa fa-times"></i>
                    </button>
                    <h4 class="modal-title" id="modalTitle">Reprocesar transacción batch <label class="idTransaccion"></label></h4>
                </div>
                <div class="modal-body">
                    <div id="keys_spinn" class="text-center" style="margin: 50px 10px; display: none;"><i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></div>
                    <div id="message_box" class="display: none;"></div>
                    <form id="form" role="form">
                        <div class="box-body">
                            <div class="col-lg-8">
                                <h4>ID Transacción</h4>
                                <input type="hidden" id="batchID"/>
                                <p class="margin small">Ingresar ID de la transacción(externo) reprocesada manualmente</p>
                            <div class="input-group input-group-sm">
                                <input class="form-control" type="text" id="txt_transaction_id">
                                    <span class="input-group-btn">
                                        <button id="reprocesarWithID" type="button" class="btn btn-success btn-flat">Reprocesar!</button>
                                    </span>
                            </div>
                                <p class="margin small">Si no cuenta con ID de transacción use la opción NO TENGO ID TRANSACCIÓN para reitentarlo automáticamente</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-right" data-bs-dismiss="modal" id="button_modal_close" title="Cerrar Ventana"> 
                        <i class="fa fa-close"></i> &nbsp; Cerrar Ventana
                    </button>
                    <button id="reprocesar" type="button" class="btn btn-primary">NO TENGO ID</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div id="myModalDetails" class="modal fade modal-xl" tabindex="-1" role="dialog"
        aria-labelledby="tabsModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="btn btn-danger btn-sm pull-right" data-bs-dismiss="modal" id="button_modal_close_x" title="Cerrar Ventana"> 
                        <i class="fa fa-times"></i>
                    </button>
                    <h4 class="modal-title" id="trxmodalTitle">Detalles de la transacción <label class="idTransaccion"></label></h4>
                </div>
                <div class="modal-body">
                    <table id="detalles" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="Table1_info">                                             <thead>
                        <tr role="row">
                            <th style="display:none;" rowspan="1" colspan="1"></th>
                            <th style="display:none;" rowspan="1" colspan="1"></th>
                            <th rowspan="1" colspan="1">Tipo</th>
                            <th rowspan="1" colspan="1">ID transacción</th>
                            <th rowspan="1" colspan="1">Estado</th>
                            <th rowspan="1" colspan="1">Fecha</th>
                            <th rowspan="1" colspan="1">Valor Transacción</th>
                            <th rowspan="1" colspan="1" >Cod. Pago</th>
                            <th rowspan="1" colspan="1">Factura nro.</th>
                        </tr>
                        </thead>
                        <tbody id="modal-contenido">

                        </tbody>
                        <tfoot>
                        <tr>
                            <th style="display:none;" rowspan="1" colspan="1"></th>
                            <th style="display:none;" rowspan="1" colspan="1"></th>
                            <th rowspan="1" colspan="1">Tipo</th>
                            <th rowspan="1" colspan="1">ID transacción</th>
                            <th rowspan="1" colspan="1">Estado</th>
                            <th rowspan="1" colspan="1">Fecha</th>
                            <th rowspan="1" colspan="1">Valor Transacción</th>
                            <th rowspan="1" colspan="1">Cod. Pago</th>
                            <th rowspan="1" colspan="1">Factura nro.</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-right" data-bs-dismiss="modal" id="button_modal_close" title="Cerrar Ventana"> 
                        <i class="fa fa-close"></i> &nbsp; Cerrar Ventana
                    </button>
                </div>
            </div>

        </div>
    </div>

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
                <form action="{{route('reports.batch_transactions.search')}}" method="GET">
                    <div class="box-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('groups', 'Grupos') !!}
                                    {!! Form::select('group_id', $groups, $group_id , ['id' => 'group_id','class' => 'form-control select2']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('redes', 'Redes') !!}
                                    {!! Form::select('owner_id', $owners, $owner_id , ['id' => 'owner_id','class' => 'form-control select2']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('tipoAtm', 'Canal') !!}
                                    {!! Form::select('type', $type, $type_set, ['class' => 'form-control select2']) !!}
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    {!! Form::label('sucursales', 'Sucursales') !!}
                                    {!! Form::select('branch_id', $branches,  $branch_id , ['id' => 'branch_id','class' => 'form-control select2']) !!}
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    {!! Form::label('pdv', 'Puntos de venta') !!}
                                    {!! Form::select('pos_id', $pos, $pos_id, ['id' => 'pos_id','class' => 'form-control select2']) !!}
                                </div>
                                <!-- /.form-group -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('estados', 'Estados') !!}
                                            {!! Form::select('status_id', $status, $status_set, ['class' => 'form-control select2']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipo de transacción</label>
                                            {!! Form::select('service_id', $services_data, $service_id, ['class' => 'form-control select2']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- Date and time range -->
                                <!-- Date and time range -->
                                <div class="form-group">
                                    <label>Rango de Tiempo & Fecha:</label>
                                    
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                                        <input name="reservationtime" type="text" id="reservationtime" class="form-control pull-right" value="{{ old('reservationtime', $reservationtime ?? '') }}" />
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <br>
                                <div class="row">

                                    <div class="col-md-4">
                                         <button id="loadingButton" class="btn btn-info btn-lg mb-2 me-4" style="display: none;">
                                            <span class="spinner-border text-white me-2 align-self-center loader-sm "></span> Loading
                                        </button>
                                        <button id="saveButton" type="submit" class="btn btn-block btn-primary" name="search" value="search">BUSCAR</button>
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
    @if(isset($batch_transactions))
    <!-- Tabla -->
    <div class="row">
        <div class="col-md-12">
            <div class=" box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Resultados</h3>
                    <div class="box-tools">
                        <div class="input-group" style="width:150px;">
                            {!! Form::model(Request::only(['context']),['route' => 'reports.batch_transactions.search', 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
                            {!! Form::text('context' ,null , ['class' => 'form-control input-sm pull-right', 'placeholder' => 'Buscar', 'autocomplete' => 'off' ]) !!}
                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body  no-padding" style="overflow: scroll">
                    <div class="row">
                        <div class="col-xs-12">
                            <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width:10px">#ID</th>
                                    <th>Tipo</th>
                                    <th>Ref. Numero</th>
                                    <th>Monto</th>
                                    <th>ID transacción</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Sede</th>
                                    <th>Cód. Cajero</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($batch_transactions as $batch_transaction)
                                <tr data-id="{{ $batch_transaction->id  }}" data-parent_trx_id="{{ $batch_transaction->parent_transaction_id  }}" data-transaction_id = "{{ $batch_transaction->transaction_id  }}" data-info="{{ $batch_transaction->provider  }} - {{ $batch_transaction->servicio  }}" data-status="{{$batch_transaction->status_description}}" >
                                    <td style="min-width:60px">{{ $batch_transaction->id }} <i class="trx_info fa fa-info-circle" style="cursor:pointer"></i></td>
                                    <td>{{ $batch_transaction->provider  }} - {{ $batch_transaction->servicio  }}</td>
                                    <td>{{ $batch_transaction->referencia_numero_1 }}</td>
                                    <td>{{ $batch_transaction->amount  }}</td>
                                    @if($batch_transaction->transaction_id <> '')
                                    <td align="right">{{ $batch_transaction->transaction_id }} <i class="info fa fa-eye" style="cursor:pointer"></i></td>
                                    @else
                                        <td align="center" style="color:red"><i class="info fa fa-warning" style="cursor:pointer"></i></td>
                                    @endif
                                    @if($batch_transaction->status == 'error')
                                        <td class="status" style="cursor:pointer">{!! $batch_transaction->status_description !!}</td>
                                    @else
                                        <td>{!! $batch_transaction->status_description !!} {{ $batch_transaction->username  }}</td>
                                    @endif
                                    <td>{{ $batch_transaction->fecha  }}</td>
                                    <td>{{ $batch_transaction->pdv  }}</td>
                                    <td>{{ $batch_transaction->code  }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-footer -->
                <div class="clearfix">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" role="status" aria-live="polite">{{ $batch_transactions->total() }} registros en total</div>

                        </div>
                        <div class="col-sm-6">
                            @foreach($total_transactions as $total_transaction)
                            <div class="dataTables_info" role="status" aria-live="polite">Monto total: <b>{{ number_format($total_transaction->monto, 0) }}</b> <i class="fa fa-money"></i> </td></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                                {!! $batch_transactions->appends(['group_id' => $group_id, 'owner_id' => $owner_id, 'branch_id' => $branch_id, 'pos_id' => $pos_id, 'status_id' => $status_set, 'service_id' => $service_id, 'reservationtime' => $reservationtime ])->links('paginator') !!}
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
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
    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>

    <script>
        $(function(){
            $('.select2').select2();
            //Cascading dropdown list de redes / sucursales

            $('#group_id').on('change', function(e){
            var group_id = e.target.value;            
            $.get('{{ url('reports') }}/ddl/owners/' + group_id, function(owners) {
                $('#owner_id').empty();
                $.each(owners, function(i,item){
                    $('#owner_id').append($('<option>', {
                        value: i,
                        text : item
                    }));
                });
            });
            
            $.get('{{ url('reports') }}/ddl/branches/' + group_id, function(branches) {
                $('#branch_id').empty();
                $.each(branches, function(i,item){
                    $('#branch_id').append($('<option>', {
                        value: i,
                        text : item
                        }));
                    });
                });
            });

            $('#owner_id').on('change', function(e){
                var group_id = $( "#group_id" ).val();
                var owner_id = e.target.value;
                $.get('{{ url('reports') }}/ddl/branches/' + group_id + '/' + owner_id, function(branches) {
                    $('#branch_id').empty();
                    $.each(branches, function(i,item){
                        $('#branch_id').append($('<option>', {
                            value: i,
                            text : item
                        }));
                    });
                });
            });

            $('#branch_id').on('change', function(e){
                var branch_id = e.target.value;
                $.get('{{ url('reports') }}/ddl/pdv/' + branch_id, function(data) {
                    $('#pos_id').empty();
                    $.each(data, function(i,item){
                        $('#pos_id').append($('<option>', {
                            value: i,
                            text : item
                        }));
                    });
                });
            });

            $('.status').on('click',function(e){
                e.preventDefault();
                let row = $(this).parents('tr')
                let info = row.data('info')
                let batchID = row.data('id')
                $("#modalTitle").html('Reprocesar '+info);
                $("#batchID").html(batchID);
                $("#myModal").modal("show");

            });

            $('#reprocesar').on('click', function(e) {
                e.preventDefault();
                $('#keys_spinn').show();
                $('#form').hide();
                $('#message_box').html('');
                let batchID = $("#batchID").html();
                $.post("reprocess", {_token: token, _batchID : batchID }, function( data ) {
                    console.log(data);
                    if(data.error == false){
                        console.log('1');
                        //$('#keys_spinn').hide();
                        $('#message_box').html('Transacción intentará ejecutarse automaticamente en 10 min. apróximadamente');
                        $('#message_box').show();
                        $('#form').hide();
                        $('#reprocesar').hide();
                    }else{
                        //$('#keys_spinn').hide();
                        $('#form').hide();
                        $('#message_box').html('Hubo un error al procesar la petición');
                        $('#message_box').show();
                        $('#reprocesar').hide();
                    }
                }).error(function(){
                    $('#keys_spinn').hide();
                    $('#form').hide();
                    $('#message_box').html('Hubo un error al procesar la petición');
                    $('#message_box').show();
                    $('#reprocesar').hide();
                });


                setTimeout(function(){
                    $('#myModal').modal('hide')
                    location.reload();
                }, 5000);



            });

            $('#reprocesarWithID').on('click', function(e){
                e.preventDefault();
                $('#keys_spinn').show();
                let parentTransactionId = $('#txt_transaction_id').val();
                let batchID = $("#batchID").html();
                $.post("reprocess_manually", {_token: token, _batchID : batchID, _parentID: parentTransactionId}, function( data ){
                    if(data.error == false){
                        $('#keys_spinn').hide();
                        $('#form').hide();
                        $('#reprocesar').hide();
                        $('#message_box').html('Transacción actualizada, los datos fueron actualizados manualmente');
                        $('#message_box').show();
                    }else{
                        $('#key_spinn').hide();
                        $('#form').hide();
                        $('#reprocesar').hide();
                        $('#message_box').html('Hubo un error al procesar la petición');
                        $('#message_box').show();
                        $('#reprocesar').hide();
                    }
                }).error(function(){
                    $('#key_spinn').hide();
                    $('#form').hide();
                    $('#reprocesar').hide();
                    $('#message_box').html('Hubo un error al procesar la petición');
                    $('#message_box').show();
                    $('#reprocesar').hide();
                });
                setTimeout(function(){
                    $('#myModal').modal('hide')
                    location.reload();
                }, 5000);
            });
            $(document).on('click', '.info', function(e) {
                e.preventDefault();
                $("#modalTitle").html('Detalle de la transaccion ');
                var row = $(this).parents('tr');
                var transaction_id = row.data('transaction_id');

                $.get('{{ url('reports') }}/info/batch_transaction_data/' + transaction_id, function(data) {
                    $("#modal-contenido").html(data);
                    $("#trxmodalTitle").html('Detalles de la transacción: '+transaction_id);
                    $("#myModalDetails").modal("show");
                });
            });

            $(document).on('click', '.trx_info', function(e) {
                e.preventDefault();
                $("#modalTitle").html('Detalle de la transaccion ');
                var row = $(this).parents('tr');
                var transaction_id = row.data('parent_trx_id');

                $.get('{{ url('reports') }}/info/batch_transaction_data/' + transaction_id, function(data) {
                    $("#modal-contenido").html(data);
                    $("#trxmodalTitle").html('Detalles de la transacción de origen: '+transaction_id);
                    $("#myModalDetails").modal("show");
                });
            });


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
            
        });

        document.getElementById('saveButton').addEventListener('click', function() {
            // Oculta el botón "Guardar"
            this.style.display = 'none';

            // Muestra el botón "Loading"
            document.getElementById('loadingButton').style.display = 'inline-block';
            document.getElementById('loadingButton').disabled = true;

            // Aquí puedes añadir el código para enviar los datos o cualquier otra lógica que necesites
        });
    </script>
@endsection
@section('aditional_css')
    <link href="{{ asset('src/assets/css/light/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
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
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

              <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('src/plugins/css/light/loaders/custom-loader.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/plugins/css/dark/loaders/custom-loader.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  --> 
    <style>
        .daterangepicker {
            background-color: #060818 !important;
            border: 1px solid #444;
       }
    </style>
@endsection