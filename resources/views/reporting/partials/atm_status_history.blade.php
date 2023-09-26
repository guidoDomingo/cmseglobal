@section("aditional_css")
    <!-- DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->

    <style>
        .daterangepicker {
            background-color: #060818 !important;
            border: 1px solid #444;
        }
    
    </style>

@endsection

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class=" box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtros de búsqueda</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div>
                <form action="{{ route('reports.atm_status_history_search') }}" method="GET">
                    <div class="box-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('owners', 'Redes') !!}
                                    {!! Form::select('owner_id', $owners, $owner_id, ['id' => 'owner_id', 'class' => 'form-control select2']) !!}
                                </div>
                                 <div class="form-group" id="div">
                                    {!! Form::label('minis', 'Tipo miniterminal') !!}
                                    {!! Form::select('tipo_id',['0' => 'Todos','1'=>'Manejado por Eglobal','2'=>'Manejado por Cliente'],$tipo_id ,['class' => 'form-control select2','id' => 'tipo_id']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('branches', 'Sucursales') !!}
                                    {!! Form::select('branches_id', $branches, $branche_id, [
                                        'id' => 'branches_id',
                                        'class' => 'form-control select2',
                                    ]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('atm', 'ATMs') !!}
                                    {!! Form::select('atm_id', $atms, $atm_id, ['id' => 'atm_id', 'class' => 'form-control select2']) !!}
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        {!! Form::label('status', 'Estados') !!}
                                        {!! Form::select('status_id', $status, $status_id, ['id' => 'status_id', 'class' => 'form-control select2']) !!}
                                    </div>
                                    <label>Rango de Tiempo & Fecha:</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                                        <input name="reservationtime" type="text" id="reservationtime"
                                            class="form-control pull-right" value="{{ old('reservationtime', $reservationtime ?? '') }}" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-primary" name="search"
                                            value="search">BUSCAR</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-success" name="search"
                                            value="download">EXPORTAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="box-tools">
                        <div class="input-group" style="width:200px; float:right; padding-right:10px">
                            {!! Form::model(Request::only(['context']),['route' => 'reports.conciliations_details.search', 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
                            {!! Form::text('context' ,null , ['class' => 'form-control input-sm pull-right', 'placeholder' => 'Nro. Ingreso', 'autocomplete' => 'off' ]) !!}
                            {!! Form::close()!!}
                        </div>
                    </div> --}}
                    {{-- <div class="box-footer" style="display: block;">

                    </div> --}}

                </form>
            </div>
        </div>
    </div>

    <div class="">
        <div class="box-header">
            <h3 class="box-title">Historico de Estados</h3>
        </div>
        <div class="box-body  no-padding">
            <div class="row">
                <div class="col-xs-12">
                    <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Nombre ATM</th>
                                <th>Encargado</th>
                                <th>Mensaje</th>
                                <th>Estado</th>
                                <th>Inicio</th>
                                <th>Fin</th>
                                <th>Tiempo Transcurrido</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($atmStatus as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->comments }}</td>
                                    <td>
                                    @if($item->status == 'Offline')
                                    <a class="label label-warning">
                                       Offline
                                     </a>
                                   @endif
                                   @if($item->status == 'Online')
                                    <a class="label label-success">
                                       Online
                                     </a>
                                   @endif
                                   @if($item->status == 'Suspendido')
                                   <a class="label label-danger">
                                      Suspendido
                                    </a>
                                  @endif
                                  @if($item->status == 'Bloqueado')
                                   <a class="label label-danger">
                                      Bloqueado
                                    </a>
                                  @endif
                                </td>
                                    <td>{{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i:s')  }}</td>
                                    @if (empty($item->updated_at))
                                    <td>{{  ($item->updated_at)  }}</td>
                                    @else
                                    <td>{{ Carbon\Carbon::parse($item->updated_at)->format('d/m/Y H:i:s')  }}</td>
                                    @endif
                                        @if($item->diferencia > 0)
                                        <td>{{ $item->diferencia.' Min' }}
                                        @else
                                        <td>{{ $item->diferencia}}
                                       @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
    <!-- datatables -->
    <link rel="stylesheet" href="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css">
    <script src="/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- InputMask -->
    <script src="/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="/bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <link href="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet"
        type="text/css" />
    <script src="/bower_components/admin-lte/plugins/daterangepicker/moment.min.js"></script>
    <script src="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- bootstrap datepicker -->
    <script src="/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>

    <script>

$(document).ready(function(){
    var owner_id =  "<?php echo $owner_id; ?>";
    if(owner_id == 16){
        $( "#div" ).show();
    }else{
        $( "#div" ).hide();
    }
});
        $('.select2').select2();

        $('#owner_id').on('select2:select', function(e) {
            var id = e.currentTarget.value;
            if(id == 16){
                $( "#div" ).show(); 
            }else{
                $( "#div" ).hide();
                get_brands(id,-1)
            }       
        });

        $('#tipo_id').on('select2:select', function(e) {
            var tipo_id = e.currentTarget.value; 
            get_brands(-1,tipo_id);
        });

        function get_brands(id,tipo_id) {
            var url = '/reports/atm_status_history/get_branches';
            var json = {
                _token: token,
                id: id,
                tipo_id:tipo_id
            };
            $.post(url, json, function(data, status) {

                $('#branches_id').val(null).trigger('change');
                $('#branches_id').empty().trigger("change");

                for (var i = 0; i < data.length; i++) {
                    var item = data[i];
                    var id = item.id;
                    var description = item.description;
                    var option = new Option(description, id, false, false);
                    $('#branches_id').append(option);
                }
                var option = new Option('Todos', '0', false, false);
                $('#branches_id').append(option);
                $('#branches_id').val('0').trigger('change');
                $('#atm_id').val('0').trigger('change'); 
            });
        }
        $('#branches_id').on('select2:select', function(e) {
            var id = e.currentTarget.value;
            get_atms(id);
        });

        function get_atms(id) {
            var url = '/reports/atm_status_history/get_atms';
            var json = {
                _token: token,
                id: id
            };
            $.post(url, json, function(data, status) {

                $('#atm_id').val(null).trigger('change');
                $('#atm_id').empty().trigger("change");

                
                for (var i = 0; i < data.length; i++) {
                    var item = data[i];
                    var id = item.id;
                    var description = item.description;
                    var option = new Option(description, id, false, false);
                    $('#atm_id').append(option);
                }
                var option = new Option('Todos', '0', false, false);
                $('#atm_id').append(option);
                $('#atm_id').val('0').trigger('change'); 
            });
        }





        //Datatable config
        var data_table_config = {
            //custom
            orderCellsTop: true,
            fixedHeader: true,
            pageLength: 20,
            lengthMenu: [
                1, 2, 5, 10, 20, 30, 50, 70, 100, 150, 300, 500, 1000, 1500, 2000
            ],
            dom: '<"pull-left"f><"pull-right"l>tip',
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            scroller: true,
            processing: true,
            initComplete: function(settings, json) {
                $('#content').css('display', 'block');
                $('#div_load').css('display', 'none');
                //$('body > div.wrapper > header > nav > a').trigger('click');
            }
        }

        var table = $('#datatable_1').DataTable(data_table_config);


        $('.mostrar').hide();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {
            "placeholder": "dd/mm/yyyy"
        });
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {
            "placeholder": "mm/dd/yyyy"
        });
        //reservation date preset
        if ($('#reservationtime').val() == '') {

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
                'Mes Pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            },
            dateLimit: {
                'months': 1,
                'days': -1,

            },
            minDate: new Date(2000, 1 - 1, 1),
            maxDate: new Date(),
            showDropdowns: true,
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
    </script>


@endsection
