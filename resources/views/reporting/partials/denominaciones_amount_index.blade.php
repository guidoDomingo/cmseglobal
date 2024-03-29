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
                    <table id="detalles" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="Table1_info">                                             <thead>
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
                    <button type="button" class="btn btn-default pull-right" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Print Section -->
    <div id="printSection" class="printSection" style="visibility:hidden;"></div>
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
                <form action="{{route('reports.denominaciones_amount.search')}}" method="GET">
                    <div class="box-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('groups', 'Grupos') !!}
                                    {!! Form::select('group_id', $groups, $group_id , ['id' => 'group_id','class' => 'form-control select2']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('redes', 'Redes') !!}
                                    {!! Form::select('owner_id', $owners, $owner_id , ['id' => 'owner_id','class' => 'form-control select2',  'style' => 'width:100%']) !!}
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    {!! Form::label('sucursales', 'Sucursales') !!}
                                    {!! Form::select('branch_id', $branches,  $branch_id , ['id' => 'branch_id','class' => 'form-control select2',  'style' => 'width:100%']) !!}
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    {!! Form::label('pdv', 'Puntos de venta') !!}
                                    {!! Form::select('pos_id', $pos, $pos_id, ['id' => 'pos_id','class' => 'form-control select2',  'style' => 'width:100%;']) !!}
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
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('estados', 'Estados') !!}
                                    {!! Form::select('status_id', $status, $status_set, ['class' => 'form-control select2',  'style' => 'width:100%']) !!}
                                </div>
                            </div>
                        </div>
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
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body  no-padding" style="overflow: scroll">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="main" style="width:100%; height:700px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
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

    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>

    {{-- amcharts plugins --}}
    <script src="/js/echarts.min.js"></script>
    <script src="/js/xlsx.full.min.js"></script>
    <script>
        @if(isset($transactions))
        var denominaciones = {!! $denominaciones !!};
        var fechas = {!! $fechas !!};
        var chart_data = {!! $chart_data !!};
        var myChart = echarts.init(document.getElementById('main'));
        var timeData = [
            '01/09/2019', '02/09/2019', '03/09/2019'
        ];

        timeData = timeData.map(function (str) {
            return str.replace('2009/', '');
        });

        var maximoYaxis_1 = 0;
        var maximoYaxis_2 = 0;
        option = {
            title: {
                text: 'Denominaciones Utilizadas',
                subtext: '',
                x: 'center',
                top: 40
            },
            tooltip: {
                trigger: 'item',
                axisPointer: {
                    animation: false,
                },
            },
            legend: {
                data: denominaciones,
                x: 'left',
                top: 90,
                left: 20
            },
            toolbox: {
                right: 60,
                feature: {
                    dataZoom: {
                        yAxisIndex: 'none',
                        title: 'Restablecer Zoom',
                        show: false
                    },
                    restore: {
                        title: 'Restablecer'
                    },
                    saveAsImage: {
                        title: 'Guardar como imagen'
                    },
                    dataView: {
                        title: 'Ver Tabla de Datos',
                        lang: ['Lista Denominaciones', 'Cerrar', 'Restablecer'],
                        optionToContent: function(opt) {
                            var axisData = opt.xAxis[0].data;
                            var series = opt.series;
                            var table = '<div class="box-tools"><button id="exportar" class="btn btn-primary"><i class="fa fa-excel"></i>EXPORTAR</button></div><table style="width:100%;text-align:center" class="table table-hover table-bordered denominaciones"><thead><tr>'
                                 + '<th class="text-center">Fecha</th>'
                                 + '<th colspan="2" style="text-align:center">' + series[0].name + '</th>'
                                 + '<th colspan="2" style="text-align:center">' + series[2].name + '</th>'
                                 + '<th colspan="2" style="text-align:center">' + series[4].name + '</th>'
                                 + '<th colspan="2" style="text-align:center">' + series[6].name + '</th>'
                                 + '<th colspan="2" style="text-align:center">' + series[8].name + '</th>'
                                 + '</tr></thead><tbody>';
                            for (var i = 0, l = axisData.length; i < l; i++) {
                                table += '<tr>'
                                 + '<td>' + axisData[i] + '</td>'
                                 + (series[0].data[i] != 'undefined' ?'<td class="bg-success">' + series[0].data[i] + '</td>':'<td class="bg-success">0</td>')
                                 + '<td class="bg-danger">' + series[1].data[i] + '</td>'
                                 + '<td class="bg-success">' + series[2].data[i] + '</td>'
                                 + '<td class="bg-danger">' + series[3].data[i] + '</td>'
                                 + '<td class="bg-success">' + series[4].data[i] + '</td>'
                                 + '<td class="bg-danger">' + series[5].data[i] + '</td>'
                                 + '<td class="bg-success">' + series[6].data[i] + '</td>'
                                 + '<td class="bg-danger">' + series[7].data[i] + '</td>'
                                 + '<td class="bg-success">' + series[8].data[i] + '</td>'
                                 + '<td class="bg-danger">' + series[9].data[i] + '</td>'
                                 + '</tr>';
                            }
                            table += '</tbody></table>';

                            table += '<table style="width:100%;text-align:center" class="table table-hover table-bordered denominaciones"><thead><tr>'
                                 + '<th class="text-center">Fecha</th>'
                                 + '<th colspan="2" class="text-center">' + series[10].name + '</th>'
                                 + '<th colspan="2" class="text-center">' + series[12].name + '</th>'
                                 + '<th colspan="2" class="text-center">' + series[14].name + '</th>'
                                 + '<th colspan="2" class="text-center">' + series[16].name + '</th>'
                                 + '<th colspan="2" class="text-center">' + series[19].name + '</th>'
                                 + '</tr></thead><tbody>';
                            for (var i = 0, l = axisData.length; i < l; i++) {
                                table += '<tr>'
                                 + '<td>' + axisData[i] + '</td>'
                                 + '<td class="bg-success">' + series[10].data[i] + '</td>'
                                 + '<td class="bg-danger">' + series[11].data[i] + '</td>'
                                 + '<td class="bg-success">' + series[12].data[i] + '</td>'
                                 + '<td class="bg-danger">' + series[13].data[i] + '</td>'
                                 + '<td class="bg-success">' + series[14].data[i] + '</td>'
                                 + '<td class="bg-danger">' + series[15].data[i] + '</td>'
                                 + '<td class="bg-success">' + series[16].data[i] + '</td>'
                                 + '<td class="bg-danger">' + series[17].data[i] + '</td>'
                                 + '<td class="bg-success">' + series[18].data[i] + '</td>'
                                 + '<td class="bg-danger">' + series[19].data[i] + '</td>'
                                 + '</tr>';
                            }
                            table += '</tbody></table><br>';

                            return table;
                        }
                    }
                }
            },
            axisPointer: {
                link: {xAxisIndex: 'all'},
            },
            dataZoom: [
                {
                    show: true,
                    realtime: true,
                    start: 30,
                    end: 70,
                    xAxisIndex: [0, 1]
                },
                {
                    type: 'inside',
                    realtime: true,
                    start: 30,
                    end: 70,
                    xAxisIndex: [0, 1]
                }
            ],
            grid: [
                {
                    left: 100,
                    right: 50,
                    height: '32%',
                    top: '22%',
                }, 
                {
                    left: 100,
                    right: 50,
                    bottom: '11%',
                    height: '30%'
                }
            ],
            xAxis : [
                {
                    type : 'category',
                    boundaryGap : false,
                    axisLine: {onZero: true},
                    data: fechas,
                    show: false,
                },
                {
                    gridIndex: 1,
                    type : 'category',
                    boundaryGap : false,
                    axisLine: {onZero: true},
                    data: fechas,
                    position: 'top',
                }
            ],
            yAxis : [
                {
                    name : 'Ingreso',
                    nameTextStyle: {
                        fontStyle: 'italic',
                        fontWeight: 'bold',
                        fontSize: 15,
                        align: 'left'
                    },
                    type : 'value',
                    min: 0, 
                    max: function(params){
                        maximoYaxis_1 = params.max;
                        if(maximoYaxis_1 > maximoYaxis_2){
                            return maximoYaxis_1;
                        }else{
                            return maximoYaxis_2;
                        }
                    },
                    axisLine : {
                        show: true
                    },
                },
                {
                    gridIndex: 1,
                    name : 'Salida',
                    nameTextStyle: {
                        fontStyle: 'italic',
                        fontWeight: 'bold',
                        fontSize: 15,
                        align: 'left'
                    },
                    type : 'value',
                    inverse: true,
                    min: 0, 
                    max: function(params){
                        maximoYaxis_2 = params.max;
                        if(maximoYaxis_1 > maximoYaxis_2){
                            return maximoYaxis_1;
                        }else{
                            return maximoYaxis_2;
                        }
                    }
                }
            ],
            series : chart_data
        };

        myChart.setOption(option);

        myChart.on('legendselectchanged', function(category_element){
            myChart.resize();
        });

        $(document).on('click', '#exportar', function(){
            var tables = $("table.denominaciones");
            var wb = XLSX.utils.book_new();
            for(var i = 0; i < tables.length; ++i) {
              var ws = XLSX.utils.table_to_sheet(tables[i], {dateNF: 'dd/mm/yyyy;@' ,cellDates: true, raw: true});
              XLSX.utils.book_append_sheet(wb, ws, "Denominaciones" + i);
            }

            XLSX.writeFile(wb, "reporte_denominaciones.xlsx", {cellDates: false});
        })

        @endif
        //Cascading dropdown list de redes / sucursales
        $('.select2').select2();
        var servicioSeleccionado = '507';

        $('.mostrar').hide();

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

        $(document).on('select2:select','#serviceId',function(){
            var valor = $(this).val();
            var urlGetServices = "{{ route('reports.get_service_request_all') }}";
            valor = JSON.stringify(valor);
            if(valor != '' && valor != 'null'){
                $.get(urlGetServices, {id: valor}).done(function(data){
                    $('.mostrar').show();
                    servicioSeleccionado = $('#servicioRequestId').val();
                    $('#servicioRequestId').empty().trigger('change');
                    $('#servicioRequestId').select2({data: data});
                    if(servicioSeleccionado != ''){
                        $('#servicioRequestId').val(servicioSeleccionado).trigger('change');
                    }
                    if($("#checkbox2").is(':checked') ){
                        $("#servicioRequestId > option").prop("selected","selected");// Select All Options
                        $("#servicioRequestId").trigger("change");// Trigger change to select 2
                    }
                });
            }else{
                $('#servicioRequestId').select2('data', null);
                $('.mostrar').hide();
            }
        });

        $(document).on('select2:clearselect2:unselect','#serviceId',function(e){
            $("#serviceId").trigger("select2:select");
            if (!e.params.originalEvent) {
                return
            }

            e.params.originalEvent.stopPropagation();
        });

        $(document).on('select2:clearselect2:unselect','#servicioRequestId',function(e){
            if (!e.params.originalEvent) {
                return
            }

            e.params.originalEvent.stopPropagation();
        });

        $("#checkbox").click(function(){
            if($("#checkbox").is(':checked') ){
                $.when($("#serviceId > option").prop("selected","selected")).done(function(){
                    $("#serviceId").trigger("change");// Trigger change to select 2
                    $("#serviceId").trigger("select2:select");// Trigger change to select 2
                })
            }else{
                $.when($("#serviceId > option").removeAttr("selected")).done(function(){
                    $("#serviceId").trigger("change");// Trigger change to select 2
                    $("#serviceId").trigger("select2:select");// Trigger change to select 2
                })
             }
        });

        $("#checkbox2").click(function(){
            if($("#checkbox2").is(':checked') ){
                $("#servicioRequestId > option").prop("selected","selected");// Select All Options
                $("#servicioRequestId").trigger("change");// Trigger change to select 2
            }else{
                $("#servicioRequestId > option").removeAttr("selected");
                $("#servicioRequestId").trigger("change");// Trigger change to select 2
             }
        });

        $('#serviceId').trigger('select2:select');

    </script>
@endsection
@section('aditional_css')
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{ URL::asset('/bower_components/admin-lte/bootstrap/css/bootstrap.min.css') }}">
    <link type="text/css" href="/dashboard/plugins/amcharts/plugins/export/export.css" rel="stylesheet">
    <style>
        #chartdiv {
        width : 100%;
        height    : 500px;
        }
        
        .daterangepicker {
            background-color: #060818 !important;
            border: 1px solid #444;
        }
    </style>
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .select2-selection--multiple{
            overflow: hidden !important;
            height: auto !important;
        }

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
    </style>
@endsection