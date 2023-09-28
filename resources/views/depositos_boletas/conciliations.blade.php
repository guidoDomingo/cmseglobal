@extends('app')
@section('title')
    Conciliaciones de Boletas
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Conciliaciones
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Deposito de Boletas</a></li>
            <li class="active">Lista</li>
        </ol>
    </section>

    <section class="content">
        @include('partials._flashes')
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Conciliaciones de Boletas de Deposito</h3>
                <div class="box-tools">
                    <div class="input-group" style="width:150px;">
                        {!! Form::model(Request::only(['name']),['route' => 'boletas.conciliations', 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
                        {!! Form::text('name' ,null , ['class' => 'form-control input-sm pull-right', 'placeholder' => 'Numero de Boleta', 'autocomplete' => 'off' ]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        
            <div class="box-body  no-padding">
                <div class="row">
                    <div class="col-md-12">
                        <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                            <tbody><thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Sucursal</th>
                                <th>Numero de Boleta</th>
                                <th>Monto</th>
                                <th>Tipo de Pago</th>
                                <th>Depositado por</th>
                                <th>Mensaje</th>
                                <th style="width:150px">Creado</th>
                                <th style="width:150px">Modificado</th>
                                <!--<th style="width:100px">Acciones</th>-->
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deposits as $deposit)
                            <tr data-id="1">
                                <td>{{$deposit->id}}</td>
                                <td>{{$deposit->sucursal}}</td>
                                <td>{{$deposit->nroboleta}}</td>
                                <td>{{$deposit->monto}}</td>
                                <td>{{$deposit->description}}</td>
                                <td>{{$deposit->username}}</td>
                                <td>{{$deposit->response}}</td>
                                <td>{{$deposit->created_at}}</td>
                                <td>{{$deposit->updated_at}}</td>
                                <!--<td></td>-->
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
                        <div class="dataTables_info" role="status" aria-live="polite"> {{count($deposits)}} registros en total</div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers">
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! Form::open(['route' => ['depositos_boletas.destroy',':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}


@endsection


@section('aditional_css')
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
@endsection
