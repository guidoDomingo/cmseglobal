<section class="content">
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Filtros de búsqueda</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <form action="{{route('reports.rollback.search')}}" method="GET">
                    <div class="box-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rango de Tiempo & Fecha:</label>
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input name="reservationtime" type="text" id="reservationtime" class="form-control pull-right" value="{{$reservationtime or ''}}" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-block btn-primary" name="search" value="search">BUSCAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div> --}}

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Transacciones fallidas sin devoluciones</h3>
            <a class="btn btn-secundary btn-flat btn-row" onclick="relanzar_todos('{{ $idsTransaction }}')" style="width:130px; float:right; padding-right:10px" title="Relanzar Todos" >Relanzar Todos &nbsp;<i class="fa fa-rotate-left"></i></a>
        </div>

        <div class="box-body  no-padding">
            <div class="row">
                <div class="col-xs-12">
                    <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Monto</th>
                                <th>Estado</th>
                                <th>Descripcion de Estado</th>
                                <th>Respuesta</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $item)
                            <tr data-id="{{$item->id}}">

                            <td>{{$item->id}}</td>
                            <td>{{number_format($item->amount,0)}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->status_description}}</td>
                            <td>{{$item->request_data}}</td>
                            <td>{{$item->name}}</td>
                            <td style="text-align: center">
                                    <a class="btn btn-success btn-flat btn-row btn-relanzar" title="Relanzar"  ><i class="fa fa-rotate-left"></i></a>
                            </td>  
                           
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     </div>

     <div class="box">
        <div class="box-header">
            <h3 class="box-title">Reversas no procesadas</h3>
            <a class="btn btn-secundary btn-flat btn-row" onclick="reversar_todos('{{ $idsRollbacks }}')" style="width:130px; float:right; padding-right:10px" title="Relanzar Todos" >Relanzar Todos &nbsp;<i class="fa fa-rotate-left"></i></a>
        </div>

        <div class="box-body  no-padding">
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-bordered table-hover dataTable" role="grid" id="datatable_2">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Transaccion</th>
                                <th>Mensaje</th>
                                <th>Monto</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fails as $item)
                            <tr data-id="{{$item->id}}">
                            <td>{{$item->id}}</td>
                            <td>{{$item->backend_transaction_id}}</td>
                            <td>{{$item->message}}</td>
                            <td>{{number_format($item->amount,0)}}</td>
                            <td style="text-align: center">
                                    <a class="btn btn-success btn-flat btn-row btn-afectar" title="Afectar"  ><i class="fa fa-rotate-left"></i></a>
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
    <link href="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <script src="/bower_components/admin-lte/plugins/daterangepicker/moment.min.js"></script>
    <script src="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- bootstrap datepicker -->
    <script src="/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>

    <script type="text/javascript">
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
        var table = $('#datatable_2').DataTable(data_table_config); 


        function relanzar_todos(idsTransaction) {
            var ids =idsTransaction;
            Swal.fire({
                title: "Atención!",
                text: "Está a punto de reversar todas las transacciones en billetaje?.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#449d44",
                confirmButtonText: "Si, Relanzar!",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    var url = '/reports/rollback/reversa_transactionAll';
                    var type = "";
                    var title = "";
                
                    $.post(url,{_token: token,_ids: ids}, function(result){
                        console.log(result);
                        if(result.error == false){
                            type = "error";
                            title = "No se pudo realizar la operación";    
                        }else{
                            type = "success";
                            title =  "Operación realizada!";
                        }
                        Swal.fire({   
                            title: title,   
                            text: result.message,   
                            type: type,   
                            confirmButtonText: "Aceptar" 
                        });
                        
                        location.reload();
                    }).fail(function (){
                        Swal.fire('No se pudo realizar la petición.');
                    });
                }
            });
        }
        function reversar_todos(idsRollback) {
            var ids =idsRollback;
           // console.log(ids);
            Swal.fire({
                title: "Atención!",
                text: "Está a punto de editar la reversa?.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#449d44",
                confirmButtonText: "Si, Reversar!",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    var url = '/reports/rollback/reversaUpdateAll';
                    var type = "";
                    var title = "";
                
                    $.post(url,{_token: token,_ids: ids}, function(result){
                       // console.log(result);
                        if(result.error == false){
                            type = "error";
                            title = "No se pudo realizar la operación";    
                        }else{
                            type = "success";
                            title =  "Operación realizada!";
                        }
                       
                        Swal.fire({   
                            title: title,   
                            text: result.message,   
                            type: type,   
                            confirmButtonText: "Aceptar" 
                        });

                        location.reload();
                    }).fail(function (){
                        Swal.fire('No se pudo realizar la petición.');
                    });
                }
            });
        }

        $('.btn-relanzar').click(function(e){
            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');

            Swal.fire({
                title: "Atención!",
                text: "Está a punto de editar la reversa?.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#449d44",
                confirmButtonText: "Si, Reversar!",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    var url = '/reports/rollback/reversa_transaction';
                    var type = "";
                    var title = "";
                
                    $.post(url,{_token: token,_id: id}, function(result){
                    if(result.error == false){
                        type = "error";
                        title = "No se pudo realizar la operación";
                            
                    }else{
                        type = "success";
                        title =  "Operación realizada!";
                    }
                        Swal.fire({   
                            title: title,   
                            text: result.message,   
                            type: type,   
                            confirmButtonText: "Aceptar" });
                       location.reload();

                    }).fail(function (){
                    Swal.fire('No se pudo realizar la petición.');
                });
                }

            });
        });


        $('.btn-afectar').click(function(e){
            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            console.log(id);

            Swal.fire({
                title: "Atención!",
                text: "Está a punto de cambiar el destino de operacion?.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#449d44",
                confirmButtonText: "Si, Afectar !",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    var url = '/reports/rollback/reversaUpdate';
                    var type = "";
                    var title = "";
                
                    $.post(url,{_token: token,_id: id}, function(result){
                        
                    if(result.error == false){
                        type = "error";
                        title = "No se pudo realizar la operación";
                            
                    }else{
                        type = "success";
                        title =  "Operación realizada!";
                    }
                        Swal.fire({   
                            title: title,   
                            text: result.message,   
                            type: type,   
                            confirmButtonText: "Aceptar" });
                            location.reload();

                    }).fail(function (){
                    Swal.fire('No se pudo realizar la petición.');
                });
                }

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

@endsection

