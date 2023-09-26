@extends('app')
@section('title')
    Roles
@endsection

@section('aditional_css')
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{ URL::asset('/bower_components/admin-lte/bootstrap/css/bootstrap.min.css') }}">
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

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Roles
            <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Roles</a></li>
            <li class="active">lista</li>
        </ol>
    </section>
    <section class="content">
        @include('partials._flashes')
        <div class="">

            <div class="box-header">
                <a href="{{ route('roles.create') }}" class="btn btn-primary mb-2 me-4" role="button">Agregar</a>
                <div class="box-tools">
                    <div class="input-group" style="width:200px;">
                        {!! Form::model(Request::only(['name']), [
                            'route' => 'roles.index',
                            'method' => 'GET',
                            'class' => 'form-horizontal',
                            'role' => 'search',
                        ]) !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control input-sm pull-right',
                            'placeholder' => 'Nombre',
                            'autocomplete' => 'off',
                        ]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        @if ($roles)
                            <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">

                                <thead>
                                    <tr>
                                        <th style="width:10px">#</th>
                                        <th>Nombre</th>
                                        <th>Descripci&oacute;n</th>
                                        <th style="width:300px">Creado</th>
                                        <th style="width:300px">Modificado</th>
                                        <th style="width:250px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($roles as $role)
                                        <tr data-id="{{ $role->id }}">
                                            <td>{{ $role->id }}.</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->description }}</td>
                                            <td>{{ date('d/m/y H:i', strtotime($role->created_at)) }} </td>
                                            <td>{{ date('d/m/y H:i', strtotime($role->updated_at)) }} </td>
                                            <td>
                                                @if (Sentinel::hasAccess('roles.add|edit'))
                                                    <a class="btn btn-success btn-flat btn-row" title="Editar"
                                                        href="{{ route('roles.edit', ['role' => $role->id]) }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                @endif
                                                @if (Sentinel::hasAccess('roles.delete'))
                                                    
                                                    <a class="btn-delete btn btn-danger btn-flat btn-row" title="Eliminar"
                                                        href="#"><i class="fa fa-remove"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            No se encuentran roles
                        @endif
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" role="status" aria-live="polite">{{ $roles->total() }} registros en
                            total
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class=" ">
                            {!! $roles->appends(Request::only(['name']))->links('paginator') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! Form::open(['route' => ['roles.destroy', ':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}

    {!! Form::close() !!}

@endsection
@section('page_scripts')
    @include('partials._delete_row_js')
@endsection

@section('js')
    <!-- SWEET ALERT  -->
    <script src="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/sweetalerts2/custom-sweetalert.js') }}"></script>
    <!-- SWEET ALERT - FIN -->

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

@section('aditional_css')
    <link href="{{ asset('src/assets/css/light/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
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

        .paginator li>a {
            border: 1px solid white;
        }
        .paginator li>a {
            background-color: #060818;
        }
    </style>
@endsection
