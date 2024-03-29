
@extends('app')
@section('title')
    Contratos | Reporte
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Reporte de contratos
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Gestor de terminales</a></li>
            <li><a href="#">Legales</a></li>
            <li class="active">Reporte</li>
        </ol>
    </section>
    <section class="content">
        @include('partials._flashes')

        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Filtros de búsqueda</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <form action="{{ route('reports.contratos.search') }}" method="GET">
                        <div class="box-body" style="display: block;">
    
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('groups', 'Grupos') !!}
                                        {!! Form::select('group_id', $groups, $group_id, ['id' => 'group_id', 'class' => 'form-control select2']) !!}
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('atm', 'ATMs') !!}
                                        {!! Form::select('atm_id', $atms, $atm_id , ['id' => 'atm_id','class' => 'form-control select2']) !!}
                                    </div>
                                </div> --}}

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Rango de vigencia:</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                                            <input name="reservationtime" type="text" id="reservationtime" class="form-control" value="{{$reservationtime_contract}}"  placeholder="__/__/____" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('status', 'Estado del contrato') !!}
                                         
                                        {!! Form::select('status',[ '0'=> 'Todos', '1' =>'Recepcionado', '2' => 'Activo', '3' =>'Inactivo', '4' =>'Vencido'],$status, ['id' => 'status','class' => 'form-control select2']) !!}
                                  
                                    </div>
                                </div>

                               <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary w-100" name="search" value="search" id="buscar">BUSCAR</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-success w-100" name="download" value="download">EXPORTAR</button>
                                        </div>
                                    </div>
                                </div>

                                       
                            </div>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if (isset($contratos))
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Resultado de la búsqueda</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="div_load" style="text-align: center; margin-bottom: 10px; font-size: 20px;">
                        <div>
                            <i class="fa fa-spin fa-refresh fa-2x" style="vertical-align: sub;"></i> &nbsp;
                            Cargando...

                            <p id="rows_loaded" title="Filas cargadas"></p>
                        </div>
                    </div>
                    <div id="content" style="display: none" class="col-xs-12">
                        <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nro de Contrato</th>
                                    <th>Tipo</th>
                                    <th>Grupo</th>
                                    <th>Linea de crédito</th>
                                    <th>Estado</th>
                                    <th>Vigencia</th>
                                    <th>Días Restantes</th>
                                    <th>Recepción</th>
                                    <th>Aprobación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contratos as $contrato)
                                    <tr data-id="{{ $contrato->id_contract  }}">
                                        <td>{{ $contrato->id_contract }}</td>
                                        <td>{{ $contrato->number_contract }}</td>
                                        <td>{{ $contrato->description_contract_type }}</td>
                                        <td>{{ $contrato->group_ruc }} - {{ $contrato->group_description }}</td>
                                        <td>{{ number_format($contrato->credit_limit) }}</td>
                                        @if ( $contrato->status == 1)
                                            <td>RECEPCIONADO</td>
                                        @elseif ($contrato->status == 2)                                     
                                            <td>ACTIVO</td>
                                        @elseif ($contrato->status == 3)
                                            <td>INACTIVO</td>
                                        @elseif ($contrato->status == 4)
                                            <td>VENCIDO</td>
                                        @endif 
                                        <td>{{ date('d/m/Y', strtotime($contrato->date_init)).' - '. date('d/m/Y', strtotime($contrato->date_end)) }}</td>
                                        <td>{{ $contrato->restantes }}</td>
                                        
                                        @if ($contrato->reception_date == null)
                                            <td> - </td>
                                        @else
                                            <td>{{ date('d/m/Y', strtotime($contrato->reception_date))}}</td>
                                        @endif

                                        @if ($contrato->fecha_aprobacion == null)
                                            <td> - </td>
                                        @else
                                            <td>{{ date('d/m/Y', strtotime($contrato->fecha_aprobacion))}}</td>
                                        @endif

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </section>
   

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
<link href="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<script src="/bower_components/admin-lte/plugins/daterangepicker/moment.min.js"></script>
<script src="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>

<script type="text/javascript">
//Datatable config
var data_table_config = {
        //custom
        bAutoWidth: false,
        aoColumns : [
            { sWidth: "3%", "targets": 0, className: "text-center"},
            { sWidth: "8%", "targets": 1, className: "text-center"},
            { sWidth: "10%", "targets": 2},
            { sWidth: "40%", "targets": 3},
            { sWidth: "10%", "targets": 4, className: "text-center"},
            { sWidth: "10%", "targets": 5, className: "text-center"},
            { sWidth: "10%", "targets": 6, className: "text-center"},
            { sWidth: "10%", "targets": 7, className: "text-center"},
            { sWidth: "10%", "targets": 8, className: "text-center"},
            { sWidth: "10%", "targets": 9, className: "text-center"},

            ],
        orderCellsTop: true,
        fixedHeader: true,
        pageLength: 10,
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
            // $('body > div.wrapper > header > nav > a').trigger('click');
        }
        
    }

    var table = $('#detalles').DataTable(data_table_config); 
</script>
<script type="text/javascript">
    $('.select2').select2();

    //Date range picker
    $('#reservationtime').daterangepicker({
        opens: 'right',
        locale: {
            applyLabel: 'Aplicar',
            fromLabel: 'Desde',
            toLabel: 'Hasta',
            customRangeLabel: 'Rango Personalizado',
            daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie','Sab'],
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            firstDay: 1
        },
        format: 'DD/MM/YYYY',
        startDate: moment(),
        endDate: moment().add(12,'months'),
    });

    
</script>

@endsection
@section('aditional_css')
    <!-- DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
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
