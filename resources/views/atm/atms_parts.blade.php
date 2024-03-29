@extends('app')

@section('title')
    Informe de movimientos
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Partes de ATMs
            <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Partes de ATMs</a></li>
            <li class="active">Listado</li>
        </ol>
    </section>

    <section class="content">

        <div class="delay_slide_up">
            @include('partials._flashes')
        </div>

        <div class="box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Búsqueda personalizada</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    {!! Form::open(['route' => 'atms_parts', 'method' => 'POST', 'role' => 'form', 'id' => 'form_search']) !!}

                    <div class="col-md-6">
                        <label for="owner_id">Red:</label>
                        <div class="form-group">
                            <input type="text" class="form-control select2" name="owner_id" id="owner_id">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="atm_id">Terminal:</label>
                        <div class="form-group">
                            <input type="text" class="form-control select2" name="atm_id" id="atm_id">
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>

                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                        <br />

                        <div class="btn-group btn-group-sm" role="group">

                            <button class="btn btn-info" type="button" title="Buscar según los filtros en los registros."
                                style="margin-right: 5px" id="search" name="search">
                                <span class="fa fa-search"></span> Buscar
                            </button>

                            <button class="btn btn-default" type="button" title="Limpiar filtros." style="margin-right: 5px"
                                id="clean" name="clean">
                                <span class="fa fa-eraser"></span> Limpiar
                            </button>

                            <button class="btn btn-success" type="button" title="Convertir tabla en archivo excel."
                                id="generate_x" name="generate_x">
                                <span class="fa fa-file-excel-o"></span> Exportar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-default">
            <div class="box-body">
                <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                    <thead>
                        <tr>
                            <th colspan="3">ATM</th>
                            <th colspan="7">Denominación</th>
                        </tr>
                        <tr>
                            <th>Descripción</th>
                            <th>Sede</th>
                            <th>Encargado</th>

                            <th>50</th>
                            <th>100</th>
                            <th>500</th>
                            <th>1.000</th>
                            <th>2.000</th>
                            <th>5.000</th>
                            <th>10.000</th>
                            <th>20.000</th>
                            <th>50.000</th>
                            <th>100.000</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $atms_list = $data['lists']['atms_list'];
                        ?>

                        @for ($i = 0; $i < count($atms_list); $i++)

                            <?php
                            $item = $atms_list[$i];
                            ?>

                            <tr>
                                <td>{{ $item['description'] }}</td>
                                <td>{{ $item['branch'] }}</td>
                                <td>{{ $item['user'] }}</td>
                                <td>{{ $item['50'] }}</td>
                                <td>{{ $item['100'] }}</td>
                                <td>{{ $item['500'] }}</td>
                                <td>{{ $item['1000'] }}</td>
                                <td>{{ $item['2000'] }}</td>
                                <td>{{ $item['5000'] }}</td>
                                <td>{{ $item['10000'] }}</td>
                                <td>{{ $item['20000'] }}</td>
                                <td>{{ $item['50000'] }}</td>
                                <td>{{ $item['100000'] }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('page_scripts')
    @include('partials._selectize')
@endsection

@section("aditional_css")
    {{-- PARA AGREGAR SELECT  --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/tomSelect/custom-tomSelect.css') }}">
{{-- FIN DE SELECT  --}}
    <!-- DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->

@endsection

@section('js')
     {{-- AGREGAR SELECT  --}}
    <script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
    <script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js') }}"></script>
    <script>
        

    </script>
 {{-- FIN SELECT  --}}
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

    <!-- Iniciar objetos -->
    <script type="text/javascript">
        //Datatable config
        var data_table_config = {
            orderCellsTop: true,
            fixedHeader: true,
            pageLength: 20,
            lengthMenu: [5, 10, 20, 30, 50, 70, 100, 250, 500, 1000],
            dom: '<"pull-left"f><"pull-right"l>tip',
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            scroller: true,
        }

        var table = $('#datatable_1').DataTable(data_table_config);

        var selective_config = {
            delimiter: ',',
            persist: false,
            openOnFocus: true,
            valueField: 'id',
            labelField: 'description',
            searchField: 'description',
            maxItems: 1,
            options: {}
        };

        $('#atm_id').selectize(selective_config)[0].selectize.addOption({!! $data['lists']['atms'] !!});
        $('#owner_id').selectize(selective_config)[0].selectize.addOption({!! $data['lists']['owners'] !!});

        var inputs = {!! $data['inputs'] !!};

        if (inputs !== null) {
            $('#owner_id').selectize()[0].selectize.setValue(inputs.owner_id, false);
            $('#atm_id').selectize()[0].selectize.setValue(inputs.atm_id, false);
        }


        $("#search").click(function() {
            //$('#search').submit();
            $('#form_search').append('<input type="hidden" name="button_name" value="search" />');
            $('#form_search').submit();
        });

        $("#generate_x").click(function() {
            $('#form_search').append('<input type="hidden" name="button_name" value="generate_x" />');
            $('#form_search').submit();
        });

        $("#clean").click(function() {
            $('#owner_id').selectize()[0].selectize.setValue(null, false);
            $('#atm_id').selectize()[0].selectize.setValue(null, false);
        });
    </script>
@endsection