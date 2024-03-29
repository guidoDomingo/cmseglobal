@extends('app')
@section('title')
    Baja de miniterminales
@endsection
@section('refresh')
    <meta http-equiv="refresh" content="900">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            PROCEDIMIENTO DE BAJA
            <small>Listado de ATMS</small>
        </h1>
       
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Gestor de terminales</a></li>
            <li><a href="#">Baja</a></li>
            <li class="active">ATMS</li>
        </ol>
    </section>

    <br />


    <div id="div_load" class="d-none" style="text-align: center; margin-bottom: 10px; font-size: 20px;">
        <div>
            <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
    </div>

    <section class="content" id="content" style="">
        @include('partials._flashes')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                         
                            <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align:center; vertical-align: middle;">Cliente</th>
                                    <th style="text-align:center; vertical-align: middle; width:45px;">Ruc</th>
                                    <th style="text-align:center; vertical-align: middle;">Dirección</th>
                                    <th style="text-align:center; vertical-align: middle;">Teléfono</th>
                                    <th style="text-align:center; vertical-align: middle; width:40px;">Estado del cliente</th>
                                    <th style="text-align:center; vertical-align: middle; width:20px;">Administrar</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grupos as $grupo)
                                    <td style="vertical-align: middle;">{{ $grupo->id }}.</td>
                                    <td style="vertical-align: middle;">{{ $grupo->description }}</td>
                                    <td style="vertical-align: middle; width:45px;">{{ $grupo->ruc }}</td>
                                    <td style="vertical-align: middle;">{{ $grupo->direccion }}</td>
                                    <td style="vertical-align: middle;">{{ $grupo->telefono }}</td>
                                    @if ($grupo->status == 0 )
                                        <td style="text-align:center; vertical-align: middle; width:40px;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success btn-flat  btn-sm"><span>Activo</span></button>
                                            </div>
                                        </td>
                                    @elseif ($grupo->status == 1 )
                                        <td style="text-align:center; vertical-align: middle; width:40px;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary btn-flat  btn-sm">Bloqueado</button>
                                            </div>
                                        </td>
                                    @elseif ($grupo->status == 2 )
                                        <td style="text-align:center; vertical-align: middle; width:40px;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning btn-flat  btn-sm">En proceso de Inactivación</button>
                                            </div>
                                        </td>
                                    @elseif ($grupo->status == 3 )
                                        <td style="text-align:center; vertical-align: middle; width:40px;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-flat  btn-sm">Gestión comercial</button>
                                            </div>
                                        </td>
                                    @elseif ($grupo->status == 4 )
                                        <td style="text-align:center; vertical-align: middle; width:40px;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-flat  btn-sm">Gestión prejudicial</button>
                                            </div>
                                        </td>
                                    @elseif ($grupo->status == 5 )
                                        <td style="text-align:center; vertical-align: middle; width:40px;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-flat  btn-sm">Gestión Judicial</button>
                                            </div>
                                        </td>
                                    @elseif ($grupo->status == 6 )
                                        <td style="text-align:center; vertical-align: middle; width:40px;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-flat  btn-sm">Gestión aseguradora</button>
                                            </div>
                                        </td>
                                    @elseif ($grupo->status == 7 )
                                        <td style="text-align:center; vertical-align: middle; width:40px;">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger btn-flat  btn-sm">Inactivo</button>
                                            </div>
                                        </td>
                                    @elseif ($grupo->status == 8 )
                                        <td style="text-align:center; vertical-align: middle; width:40px;">
                                            <div class="btn-group">
                                                <button type="button" class="btn bg-purple btn-flat  btn-sm">Logística</button>
                                            </div>
                                        </td>
                                    @endif
                                    
                                    <td style="text-align:center; width: 170px; vertical-align: middle; width:20px;">
                                        @if (Sentinel::hasAccess('bajas'))
                                            <a class="btn-sm btn-bitbucket btn-flat btn-row" title="Administrar grupo" href="{{ route('atms.groups',['id' => $grupo->id])}}"><i class="fa fa-arrow-right"></i></a>
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

@endsection

@section('page_scripts')
    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
    @include('partials._delete_row_js')
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

    <script type="text/javascript">


        $('.select2').select2();
        
        var data_table_config = {
            //custom
            //orderCellsTop: true,
            order: [[5, 'desc']], //ordenar por numero de columna
            fixedHeader: true,
            pageLength: 20,
            columnDefs: [{  // para definir el ancho de las columnas segun el target
                width: "10px",
                targets: 0 //columna de id
                },
                {
                    width: "60px",
                    targets: 4 //columna de acciones
                }, 
            ],           
            lengthMenu: [
                1, 2, 5, 10, 20, 30, 50, 70, 100
            ],
            dom: '<"pull-left"f><"pull-right"l>tip',
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            scroller: true,
            displayLength: 10,
            processing: true,
            initComplete: function(settings, json) {
                $('#content').css('display', 'block');
                $('#div_load').css('display', 'none');
               // $('body > div.wrapper > header > nav > a').trigger('click');
            }
        }

        $('#datatable_1').DataTable(data_table_config);

    </script>
@endsection
@section('aditional_css')
    <!-- DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->

    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        /*se agranda el modal para poder cargar el map*/
        @media screen and (min-width: 900px){
            .modal-large>.modal-dialog{
                width: 900px;
            }
        }
    </style>
    <style>
        /*boton de acciones*/
        .btn-app-acciones{
            padding-top:35px;
            width: 160px; 
            height: 100px;
        }

       /* START - CONF SPINNER */
       table.dataTable thead {background-color:rgb(179, 179, 184)}
        .lds-roller {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }
        .lds-roller div {
            animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            transform-origin: 40px 40px;
        }
        .lds-roller div:after {
            content: " ";
            display: block;
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: rgb(64, 83, 255);
            margin: -4px 0 0 -4px;
        }
        .lds-roller div:nth-child(1) {
            animation-delay: -0.036s;
        }
        .lds-roller div:nth-child(1):after {
            top: 63px;
            left: 63px;
        }
        .lds-roller div:nth-child(2) {
            animation-delay: -0.072s;
        }
        .lds-roller div:nth-child(2):after {
            top: 68px;
            left: 56px;
        }
        .lds-roller div:nth-child(3) {
            animation-delay: -0.108s;
        }
        .lds-roller div:nth-child(3):after {
            top: 71px;
            left: 48px;
        }
        .lds-roller div:nth-child(4) {
            animation-delay: -0.144s;
        }
        .lds-roller div:nth-child(4):after {
            top: 72px;
            left: 40px;
        }
        .lds-roller div:nth-child(5) {
            animation-delay: -0.18s;
        }
        .lds-roller div:nth-child(5):after {
            top: 71px;
            left: 32px;
        }
        .lds-roller div:nth-child(6) {
            animation-delay: -0.216s;
        }
        .lds-roller div:nth-child(6):after {
            top: 68px;
            left: 24px;
        }
        .lds-roller div:nth-child(7) {
            animation-delay: -0.252s;
        }
        .lds-roller div:nth-child(7):after {
            top: 63px;
            left: 17px;
        }
        .lds-roller div:nth-child(8) {
            animation-delay: -0.288s;
        }
        .lds-roller div:nth-child(8):after {
            top: 56px;
            left: 12px;
        }
        @keyframes lds-roller {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        /* END - CONF SPINNER */

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
