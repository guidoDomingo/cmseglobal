<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">VENTAS / Conciliaciones por Grupo</h3>
                </div>
    
                <div class="box-body  no-padding">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="zero-config1" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Grupo</th>
                                    <th>Monto</th>
                                    <th>Codigo Ondanet</th>
                                    <th>Mensaje</th>
                                    <th>Fecha</th>
                                    <th>Numero de Venta</th>
                                    <th>Estado</th>
                                    <th>Monto Por Cobrar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sales as $sale)
                                <tr data-id="1">
                                    <td>{{$sale->id}}</td>
                                    <td>{{$sale->descripcion}}</td>
                                    <td>{{number_format($sale->amount,0)}}</td>
                                    <td>{{$sale->destination_operation_id}}</td>
                                    <td>{{$sale->response}}</td>
                                    <td>{{ Carbon\Carbon::parse($sale->fecha)->format('d/m/Y') }}</td>
                                    <td>{{$sale->nro_venta}}</td>
                                    <td>{{$sale->estado}}</td>
                                    <td>{{number_format($sale->monto_por_cobrar,0)}}</td>
                                    <td></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
                <div class="box-footer clearfix">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" role="status" aria-live="polite"> {{count($sales)}} registros en total</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers">
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row col-md-12">
                <div class="box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">COBRANZAS / Conciliaciones por Grupo</h3>
                    </div>
                    <div class="box-body no-padding" style="overflow: scroll">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="zero-config2" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                                    <thead>
                                    <tr>
                                        {{--<th style="width:10px">#</th>
                                        <th>Grupo</th>
                                        <th>Numero de Boleta</th>
                                        <th>Codigo Ondanet</th>
                                        <th>Mensaje</th>
                                        <th>Monto</th>
                                        <th style="width:150px">Ventas cobradas</th>
                                        <th style="width:150px">Creado</th>--}}
                                        <th>#</th>
                                        <th>Grupo</th>
                                        <th>Numero de Boleta</th>
                                        <th>Codigo Ondanet</th>
                                        <th>Mensaje</th>
                                        <th>Monto</th>
                                        <th>Ventas cobradas</th>
                                        <th>Creado</th>
                                        @if (\Sentinel::getUser()->hasAccess('superuser'))
                                        <th>Acciones</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cobranzas as $cobranza)
                                    <tr data-id="{{$cobranza->id}}" data-description="{{$cobranza->descripcion}}">
                                        <td class="{{$cobranza->id}}">{{$cobranza->id}}</td>
                                        <td>{{$cobranza->descripcion}}</td>
                                        <td>{{$cobranza->boleta_numero}}</td>
                                        <td>{{$cobranza->destination_operation_id}}</td>
                                        <td>{{$cobranza->response}}</td>
                                        <td>{{number_format($cobranza->monto,0)}}</td>
                                        <td style="word-break: break-all;">{{$cobranza->ventas_cobradas}}</td>
                                        <td>{{ date('Y-m-d', strtotime($cobranza->created_at)) }}</td>
                                        @if (\Sentinel::getUser()->hasAccess('superuser'))
                                        <td><a class="btn btn-warning btn-flat btn-row btn-relanzar" title="Relanzar" href="#" ><i class="fa fa-refresh"></i></a></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        
                    {{--<div class="box-footer clearfix">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" role="status" aria-live="polite"> {{count($cobranzas)}} registros en total</div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers">
        
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>

            <div class="row col-md-12">
                <div class="box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">CASHOUTS / Conciliaciones por Grupo</h3>
                    </div>
                    <div class="box-body no-padding" style="overflow: scroll">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped dataTable" id="datatable_2" role="grid">
                                    <thead>
                                    <tr>
                                        {{--<th style="width:10px">#</th>
                                        <th>Grupo</th>
                                        <th>Numero de Boleta</th>
                                        <th>Codigo Ondanet</th>
                                        <th>Mensaje</th>
                                        <th>Monto</th>
                                        <th style="width:150px">Ventas cobradas</th>
                                        <th style="width:150px">Creado</th>--}}
                                        <th>#</th>
                                        <th>Grupo</th>
                                        <th>ID Transaccion</th>
                                        <th>Codigo Ondanet</th>
                                        <th>Mensaje</th>
                                        <th>Monto</th>
                                        <th>Ventas cobradas</th>
                                        <th>Creado</th>
                                        @if (\Sentinel::getUser()->hasAccess('superuser'))
                                        <th>Acciones</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cashouts as $cashout)
                                    <tr data-id="{{$cashout->id}}" data-description="{{$cashout->descripcion}}">
                                        <td class="{{$cashout->id}}">{{$cashout->id}}</td>
                                        <td>{{$cashout->descripcion}}</td>
                                        <td>{{$cashout->transaction_id}}</td>
                                        <td>{{$cashout->destination_operation_id}}</td>
                                        <td>{{$cashout->response}}</td>
                                        <td>{{number_format($cashout->monto,0)}}</td>
                                        <td style="word-break: break-all;">{{$cashout->ventas_cobradas}}</td>
                                        <td>{{ date('Y-m-d', strtotime($cashout->created_at)) }}</td>
                                        @if (\Sentinel::getUser()->hasAccess('superuser'))
                                        <td><a class="btn btn-warning btn-flat btn-row btn-cashout" title="Relanzar" href="#" ><i class="fa fa-refresh"></i></a></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        
                    {{--<div class="box-footer clearfix">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" role="status" aria-live="polite"> {{count($cobranzas)}} registros en total</div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers">
        
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
    
        </div>
    </div>
    <!-- Info boxes -->
</section>

@section('js')
    <!-- DATA TABLE-->

    <script src="{{ asset('src/plugins/src/table/datatable/datatables.js') }}"></script>

    <script>

        $('#zero-config1').DataTable({
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
            $('.select2').select2();

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

            var table = $('#datatable_2').DataTable({
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
            var ths = $("#datatable_2").find("th");
            var ths = $("#datatable_1").find("th");

            var sweet_loader = '<svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg>';

            $('.btn-relanzar').click(function(e){
                e.preventDefault();
                var row = $(this).parents('tr');
                var id = row.data('id');
                Swal.fire({
                    title: "Atención!",
                    text: "Está a punto de relanzar el recibo, está seguro?.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#449d44",
                    confirmButtonText: "Si, Relanzar!",
                    cancelButtonText: "No, cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: true
                },
                function(isConfirm){

                    Swal.fire({
                        type: "warning",
                        title: 'Aguarde un momento.',
                        text: "<div class='text-center' style='margin: 50px 10px'><i class='fa fa-refresh fa-spin' style='font-size:40px'></i> </div>",
                        html: true,
                        showConfirmButton: false,
                        timer: 100000
                    });
                    if (isConfirm) {
                        var url = '/reports/conciliations/relanzar_cobranza';
                        var type = "";
                        var title = "";
                        $.post(url,{_token: token,_id: id}, function(result){
                            if(result.error == false){
                                type = "success";
                                title = "Operación realizada!";
                                
                            }else{
                                type = "error";
                                title =  "No se pudo realizar la operación"
                            }
                            Swal.fire({   title: title,   text: result.message,   type: type,   confirmButtonText: "Aceptar" });
                            location.reload();
                            
                        }).fail(function (){
                            Swal.fire('No se pudo realizar la petición.');
                        });
                    }
                });
            });

            $('.btn-cashout').click(function(e){
                e.preventDefault();
                var row = $(this).parents('tr');
                var id = row.data('id');
                Swal.fire({
                    title: "Atención!",
                    text: "Está a punto de relanzar el recibo, está seguro?.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#449d44",
                    confirmButtonText: "Si, Relanzar!",
                    cancelButtonText: "No, cancelar!",
                    closeOnConfirm: false,
                    closeOnCancel: true
                },
                function(isConfirm){

                    Swal.fire({
                        type: "warning",
                        title: 'Aguarde un momento.',
                        text: "<div class='text-center' style='margin: 50px 10px'><i class='fa fa-refresh fa-spin' style='font-size:40px'></i> </div>",
                        html: true,
                        showConfirmButton: false,
                        timer: 100000
                    });
                    if (isConfirm) {
                        var url = '/reports/conciliations/relanzar_cashout';
                        var type = "";
                        var title = "";
                        $.post(url,{_token: token,_id: id}, function(result){
                            if(result.error == false){
                                type = "success";
                                title = "Operación realizada!";
                                
                            }else{
                                type = "error";
                                title =  "No se pudo realizar la operación"
                            }
                            Swal.fire({   title: title,   text: result.message,   type: type,   confirmButtonText: "Aceptar" });
                            location.reload();
                            
                        }).fail(function (){
                            Swal.fire('No se pudo realizar la petición.');
                        });
                    }
                });
            });
            
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

    </style>
@endsection