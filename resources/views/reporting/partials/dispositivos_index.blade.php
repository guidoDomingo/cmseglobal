<section class="content">
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
                <form action="{{route('reports.dispositivos.search')}}" method="GET">
                    <div class="box-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-6">
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
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- /.form-group -->
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
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer" style="display: block;">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(isset($notifications))
        <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Resultados</h3>
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
                                    <th>ATM</th>
                                    <th>Sucursal</th>
                                    <th>Mensaje</th>
                                    <th>Código Error</th>
                                    <th>Error</th>
                                    <th>Descripción</th>
                                    <th>Fecha Inicio</th>
                                    <th>Transaction ID</th>
                                   <!-- <th>Acciones</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notifications as $notification)
                                    <tr data-id="{{ $notification->id  }}" data-notification="{{ $notification->id }}">
                                        <td>{{$notification->id}}</td>
                                        <td>{{$notification->code}}</td>
                                        <td>{{$notification->pdv}}</td>
                                        @if($notification->service_id == null)
                                            <td>{{$notification->message}}</td>
                                        @else
                                            <td><b>{{$notification->provider}}</b> | {{$notification->service_id}} : <b>{{$notification->service_description}}</b>  <br>{{$notification->message}}</td>
                                        @endif
                                        <td>{{$notification->error_code}}</td>
                                        <td>{{$notification->error_description}}</td>
                                        <td>{{$notification->mensaje}}</td>
                                        <td>{{ Carbon\Carbon::parse($notification->created_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>{{$notification->transaction_id}}</td>
                                    <!--    <td> - </td> -->
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
                            <div class="dataTables_info" role="status" aria-live="polite">{{ $notifications->total() }} registros en total</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                {!! $notifications->appends(['owner_id' => $owner_id, 'branch_id' => $branch_id,'pos_id' => $pos_id, 'reservationtime' => $reservationtime ])->links('paginator') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>

@section('aditional_css')
     <link href="{{ asset('src/assets/css/light/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
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
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
    <script>
        //Cascading dropdown list de redes / sucursales
        $('.select2').select2();
        $('.info').on('click',function(e){
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

            $.get('{{ url('reports') }}/info/tickets/' + id, function(data) {
                console.log(data);
            });

        });

        $('#owner_id').on('change', function(e){
            var owner_id = e.target.value;
            $.get('{{ url('reports') }}/ddl/branches/' + owner_id, function(data) {
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
        console.log($('#reservationtime').val());
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
    </script>
@endsection

