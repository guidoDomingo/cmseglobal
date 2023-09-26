<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Ventas pendientes de afectar extractos</h3>
        </div>
        <div class="box-body  no-padding">
            <div class="row">
                <div class="col-xs-12">
                    <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>ATM</th>
                                <th>Description</th>
                                <th>Destino Operacion</th>
                                <th>Monto</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movements as $item)
                         <tr data-id="{{$item->id}}">
                            <td>{{$item->id}}</td>
                            <td>{{$item->atm}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                                @if($item->destination_operation_id == 1)
                                 <a class="label label-danger" id="">
                                    Error
                                  </a>
                                @endif
                                @if($item->destination_operation_id == 0)
                                <a class="label label-success" id="">
                                   Pendiente
                                 </a>
                               @endif
                            </td>
                            <td>{{number_format($item->amount,0)}}</td> 
                            <td style="text-align: center">
                                @if($item->destination_operation_id == 1)
                                <a class="btn btn-success btn-flat btn-row btn-afectar" title="Relanzar"  ><i class="fa fa-rotate-left"></i></a>
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



        $('.mostrar').hide();

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
     
        $('.btn-afectar').click(function(e){
            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');

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
                    var url = '/reports/movements_affecting_extracts_update';
                    var type = "";
                    var title = "";
                
                    $.post(url,{_token: token,_id: id}, function(result){
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

