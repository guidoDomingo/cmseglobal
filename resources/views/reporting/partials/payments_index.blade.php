<section class="content">

    <!-- Modal -->
    <div id="myModalDetails" class="modal fade modal-xl" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="btn btn-danger btn-sm pull-right" data-bs-dismiss="modal" id="button_modal_close_x" title="Cerrar Ventana"> 
                        <i class="fa fa-times"></i>
                    </button>
                    <h4 class="modal-title" id="modalTitle">Detalles de la transacción <label class="idTransaccion"></label></h4>
                </div>
                <div class="modal-body">
                    <table id="detalles" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="Table1_info">                                             <thead>
                        <tr role="row">
                            <th style="display:none;" rowspan="1" colspan="1"></th>
                            <th style="display:none;" rowspan="1" colspan="1"></th>
                            <th rowspan="1" colspan="1">Tipo</th>
                            <th rowspan="1" colspan="1">Estado</th>
                            <th rowspan="1" colspan="1">Fecha</th>
                            <th rowspan="1" colspan="1">Transaction ID</th>
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
                            <th rowspan="1" colspan="1">Estado</th>
                            <th rowspan="1" colspan="1">Fecha</th>
                            <th rowspan="1" colspan="1">Transaction ID</th>
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
            <div class=" box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtros de búsqueda</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <form action="{{route('reports.payments.search')}}" method="GET">
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
@if(isset($payments))
    <!-- Tabla -->
    <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Resultados</h3>
                        <div class="box-tools">
                            <div class="input-group" style="width:150px;">
                                {!! Form::model(Request::only(['context']),['route' => 'reports.payments.search', 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
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
                                        <th></th>
                                        <th>Tipo</th>
                                        <th>Valor a Pagar</th>
                                        <th>Valor Recibido</th>
                                        <th>Valor Vuelto</th>
                                        <th>Fecha</th>
                                        <th>Sede</th>
                                        <th>Cód. Cajero</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $payment)
                                        <tr data-payment_id="{{$payment->id}}">
                                            <td>{{$payment->id}}</td>
                                            <td><i class="info fa fa-info-circle"></i></td>
                                            @if($payment->tipo_pago == 'efectivo')
                                            <td>{{$payment->tipo_pago}} <i class="print fa fa-money"></i></td>
                                            @elseif($payment->tipo_pago == 'canje')
                                                <td>{{$payment->tipo_pago}} <i class="print fa fa-tags"></i></td>
                                            @else
                                                <td>{{$payment->tipo_pago}}</td>
                                            @endif
                                            <td align="right">{{ number_format($payment->valor_a_pagar,0) }}</td>
                                            <td align="right">{{ number_format($payment->valor_recibido,0)}}</td>
                                            <td align="right">{{ number_format($payment->valor_entregado,0)}}</td>
                                            <td align="center">{{ $payment->created_at }}</td>
                                            <td align="right">{{ $payment->description }}</td>
                                            <td align="right">{{ $payment->code }}</td>
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
                                <div class="dataTables_info" role="status" aria-live="polite">{{ $payments->total() }} registros en total</div>
                            </div>
                            <div class="col-sm-6">
                                @foreach($total_payments as $total_payment)
                                <div class="dataTables_info" role="status" aria-live="polite">Total Valor a pagar: <b>{{ number_format($total_payment->monto, 0) }}</b> <i class="fa fa-money"></i> </td></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers">
                                    {!! $payments->appends(['group_id' => $group_id, 'owner_id' => $owner_id, 'branch_id' => $branch_id, 'pos_id' => $pos_id, 'reservationtime' => $reservationtime ])->links('paginator')!!}
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

            $(document).on('click', '.info', function(e) {
                e.preventDefault();
                $("#modalTitle").html('Detalle de Pago ');
                var row = $(this).parents('tr');
                var payment_id = row.data('payment_id');
                $.get('{{ url('reports') }}/info/payment_data/' + payment_id, function(data) {
                    $("#modal-contenido").html(data);
                    $("#myModalDetails").modal("show");
                });
            });

            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
            //reservation date preset
            $('#reservationtime').val()
            if($('#reservationtime').val() == ''){
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
    </script>
@endsection
@section('aditional_css')

    
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
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

    <style>
        .pagination .page-item {
            padding: 0 15px;
            margin-left: 10px;
        }
        
        .pagination li:hover {
            border-radius: 10px;
            background-color: #191E3A !important;
        }
    </style>
@endsection