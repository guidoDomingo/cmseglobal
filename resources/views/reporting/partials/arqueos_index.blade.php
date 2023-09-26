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
                    <table id="detalles" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="Table1_info">                                          	<thead>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="printSection" class="printSection" style="visibility:hidden;"></div>
    <div class="row">
        <div class="col-md-12">
            <div class=" box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtros de búsqueda</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <form action="{{route('reports.arqueos.search')}}" method="GET">
                    <div class="box-body" style="display: block;">

                        @if ( !\Sentinel::getUser()->inRole('mini_terminal') && !\Sentinel::getUser()->inRole('supervisor_miniterminal'))
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('groups', 'Grupos') !!}
                                        {!! Form::select('group_id', $groups, $group_id , ['id' => 'group_id','class' => 'form-control select2']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('redes', 'Redes') !!}
                                        {!! Form::select('owner_id', $owners, $owner_id, ['id' => 'owner_id','class' => 'form-control select2']) !!}
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        {!! Form::label('sucursales', 'Sucursales') !!}
                                        {!! Form::select('branch_id', $branches, $branch_id, ['id' => 'branch_id','class' => 'form-control select2']) !!}
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        {!! Form::label('pdv', 'Puntos de venta') !!}
                                        {!! Form::select('pos_id', $pos, $pos_id, ['id' => 'pos_id','class' => 'form-control select2']) !!}
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <!-- Date and time range -->
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
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-block btn-success" name="download" value="download">EXPORTAR</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif (\Sentinel::getUser()->inRole('mini_terminal'))
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <!-- Date and time range -->
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
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-block btn-success" name="download" value="download">EXPORTAR</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif (\Sentinel::getUser()->inRole('supervisor_miniterminal'))
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('user', 'Sucursales') !!}
                                        {!! Form::select('user_id', $branches, $branch_id, ['id' => 'user_id','class' => 'form-control select2', 'placeholder' => 'Seleccione el usuario']) !!}
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <!-- Date and time range -->
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
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-block btn-success" name="download" value="download">EXPORTAR</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
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
            <div class=" box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Resultados</h3>
                    <div class="box-tools">
                        <div class="input-group" style="width:150px;">
                            {!! Form::model(Request::only(['context']),['route' => 'reports.arqueos.search', 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
                            {!! Form::text('context' ,null , ['class' => 'form-control input-sm pull-right', 'placeholder' => 'Buscar', 'autocomplete' => 'off' ]) !!}
                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body  no-padding">
                    <div class="row">
                        <div class="col-xs-12">
                            <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th></th>
                                    <th>Fecha</th>
                                    <th>Valor</th>
                                    <th>Autorizado por</th>
                                    <th>Codigo Cajero</th>
                                    <th>Tipo</th>
                                    <th>Operativo</th>
                                    <th>Sede</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr data-id="{{ $transaction->id  }}" data-transaction="{{ $transaction->atm_transaction_id }}">
                                        <td align="left" class="{{$transaction->id}}">
                                            ID: {{ $transaction->id }} <br>
                                            <div class="btn-group">
                                                <buttom class="btn btn-default btn-xs" title="Mostrar info">
                                                    <i class="info fa fa-info-circle" style="cursor:pointer"></i>
                                                </buttom>
                                                @if(!is_null($transaction->reprinted) && $transaction->reprinted <> true && \Sentinel::getUser()->hasAccess('reporting.print'))
                                                    <buttom class="btn btn-default btn-xs" title="Reimprimir Ticket">
                                                        <i class="print fa fa-print"></i>
                                                    </buttom>
                                                @endif
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>{{ Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ number_format($transaction->amount,0) }}</td>
                                        <td>{{ $transaction->autorizador  }}</td>
                                        <td>{{ $transaction->code }}</td>
                                        <td>{{ $transaction->transaction_type }}</td>
                                        <td>{{ $transaction->autorizado  }}</td>
                                        <td>{{ $transaction->sede }}</td>
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
                            <div class="dataTables_info" role="status" aria-live="polite">{{ $transactions->total() }} registros en total</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                {!! $transactions->appends(['group_id' => $group_id, 'owner_id' => $owner_id, 'branch_id' => $branch_id, 'pos_id' => $pos_id, 'reservationtime' => $reservationtime ])->links('paginator')  !!}
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
        $(function(){
            $('.select2').select2();
            //Cascading dropdown list de redes / sucursales

            $(document).on('click', '.info', function(e) {
                e.preventDefault();
                var row = $(this).parents('tr');
                var id = row.data('id');
                var transaction_id = row.data('transaction');

                $.get('{{ url('reports') }}/info/details/' + id, function(data) {
                    console.log(data);
                    $(".idTransaccion").html(transaction_id);
                    $("#modal-contenido").html(data);
                    $("#myModal").modal("show");
                });



            });

            $('.print').on('click',function(e){
                e.preventDefault();
                var row = $(this).parents('tr');
                var id = row.data('id');
                $("#printSection").html('');
                $.get('{{ url('reports') }}/info/tickets/' + id, function(data) {
                    $("#printSection").html(data);
                    if(data){
                        window.print();
                        $("#printSection").html('');
                        $tag = '.'+id;
                        $($tag).html(id);
                    }
                });
            });

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
                    console.log(data);
                    $('#branch_id').empty();
                    $.each(data, function(i,item){
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
                    console.log(data);
                    $('#pos_id').empty();
                    $.each(data, function(i,item){
                        $('#pos_id').append($('<option>', {
                            value: i,
                            text : item
                        }));
                    });
                });
            });

            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
            //reservation date preset

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
                visibility:hidden;

            }
            #printSection, #printSection * {
                visibility:visible;
            }



            #printSection {
                font-size: 11px;
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                left:0;
                top:0;
            }
        }

        .daterangepicker {
            background-color: #060818 !important;
            border: 1px solid #444;
       }

        .paginator li>a {
            border: 1px solid white;
        }
        .paginator li>a {
            background-color: #060818;
        }
    </style>
@endsection
