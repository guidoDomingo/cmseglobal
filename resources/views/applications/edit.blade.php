@extends('app')

@section('title')
    {{ $application->name }} - Aplicación
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Aplicación
            <small>Modificación de Aplicación</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route('applications.index') }}">Aplicaciones</a></li>
            <li><a href="#">{{ $application->name }}</a></li>
            <li class="active">Modificar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar {{ $application->name }}</h3>
                    </div>
                    <div class="box-body">
                        @include('partials._flashes')
                        @include('partials._messages')
                        {!! Form::model($application, ['route' => ['applications.update', $application->id ] , 'method' => 'PUT']) !!}
                        @include('applications.partials.fields')
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="box-footer">
                    {{--@include('applications.partials.delete')--}}
                </div>
            </div>
            <div class="col-md-6">
                @include('applications.partials.atm_form')
                <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Cajeros asignados</h3>
                </div>
                <div class="box-body">
                    <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                            style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>PDV</th>
                            <th>Code</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th style="width:150px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assigned_atm as $atm)
                            <tr data-id="{{$atm->atm_id}}">
                                <td>{{$atm->atm_id}}</td>
                                <td>{{$atm->description}}</td>
                                <td>{{$atm->code}}</td>
                                @if ($atm->active == 1)
                                    <td>Activo</td>
                                @else
                                    <td>Inactivo</td>
                                @endif
                                <td>{{$atm->created_at}}</td>
                                <td><a class="btn btn-danger btn-flat btn-row btn-delete-atm" href="#"><i class="fa fa-remove" title="Eliminar"></i></a></td>
                            </tr>
                            @endforeach


                            </tbody>
                    </table>

                    {!! Form::open(['route' => ['applications.delete_assigned_atm',':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-asignatm-delete']) !!}
                    {!! Form::close() !!}

                </div>
            </div>

            </div>
        </div>
    </section>
@endsection
@section('page_scripts')
    <!-- SWEET ALERT  -->
    <script src="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/sweetalerts2/custom-sweetalert.js') }}"></script>
    <!-- SWEET ALERT - FIN -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.btn-delete-atm').click(function(e){
                e.preventDefault();
                console.log("entro");
                var row = $(this).parents('tr');
                var id = row.data('id');
                Swal.fire({
                            title: "Atención!",
                            text: "Está a punto de borrar el registro, está seguro?.",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Si, eliminar!",
                            cancelButtonText: "No, cancelar!",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                        function(isConfirm){
                            if (isConfirm) {
                                var form = $('#form-asignatm-delete');
                                var url = form.attr('action').replace(':ROW_ID',id);
                                var data = form.serialize();
                                var type = "";
                                var title = "";
                                $.post(url,data, function(result){
                                    if(result.error == false){
                                        row.fadeOut();
                                        type = "success";
                                        title = "Operación realizada!";
                                    }else{
                                        type = "error";
                                        title =  "No se pudo realizar la operación"
                                    }
                                    Swal.fire({   title: title,   text: result.message,   type: type,   confirmButtonText: "Aceptar" });
                                }).fail(function (){
                                    Swal.fire('No se pudo realizar la petición.');
                                });
                            }
                        });
            });

        });
    </script>
    <!-- DATA TABLE-->

    <script src="{{ asset('src/plugins/src/table/datatable/datatables.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
        });

    </script>

 <!-- DATA TABLE - FIN -->
    {{--@include('partials._delete_form_js')--}}
@endsection

@section('aditional_css')
     <!-- SWEET ALERTS -->
    <link rel="stylesheet" href="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.css') }}">
    <link href="{{ asset('src/plugins/css/light/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- SWEET ALERTS - FIN -->
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
