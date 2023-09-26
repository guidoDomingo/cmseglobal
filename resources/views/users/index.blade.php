@extends('app')
@section('title')
    Usuarios
@endsection


@section('aditional_css')
     <link href="{{ asset('src/assets/css/light/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
     <!-- Bootstrap 3.3.4 -->
        <link rel="stylesheet" href="{{ URL::asset('/bower_components/admin-lte/bootstrap/css/bootstrap.min.css') }}">
     <!-- DATA TABLE-->
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
        
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->

    <!-- SWEET ALERTS -->
        <link rel="stylesheet" href="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.css') }}">
        <link href="{{ asset('src/plugins/css/light/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- SWEET ALERTS - FIN -->

    <style>
         .paginator li>a {
            border: 1px solid white;
        }
        .paginator li>a {
            background-color: #060818;
        }
    </style>

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Usuarios
            <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Usuarios</a></li>
            <li class="active">lista</li>
        </ol>
    </section>
    <section class="content">
        @include('partials._flashes')
        <div class="">
            <div class="box-header">
                <a href="{{ route('users.create') }}" class="btn btn-primary mb-2 me-4" role="button">Agregar</a>
                <div class="box-tools">
                    <div class="input-group" style="width:200px;">
                        {!! Form::model(Request::only(['name']),['route' => ['users.index'], 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
                        {!! Form::text('name' ,null , ['class' => 'form-control input-sm pull-right', 'placeholder' => 'Ingresar Nombre', 'autocomplete' => 'off' ]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            
                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-8">
                            <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width:10px">N°</th>
                                    <th style="width:10px">#</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Creado</th>
                                    <th>Modificado</th>
                                    <th data-width="16" class="hidden-xs hidden-sm">Estado</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                        <tr data-id="{{ $user->id  }}" data-banned="{{ $user->isBanned()  }}">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->description}}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ explode(',', $user->roles->implode('name', ','))[0] }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td style="text-align: center" class="hidden-xs hidden-sm">
                                                @if( ! $user->persistences->isEmpty())
                                                    <span><i class="fa fa-circle text-success"></i> Online</span>
                                                @else
                                                    <span><i class="fa fa-circle text-gray"></i> Offline</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (Sentinel::hasAccess('users.add|edit'))
                                                    <a class="btn btn-info btn-flat btn-row" title="Ver"
                                                    href="{{ route('users.showProfile', ['id' => $user->id]) }}"><i class="fa fa-search"></i></a>
                                                    <a class="btn btn-success btn-flat btn-row" title="Editar"
                                                    href="{{ route('users.edit',$user->id)}}"><i
                                                                class="fa fa-pencil"></i></a>
                                                @endif

                                                @if(Sentinel::hasAccess('users.force_logout'))
                                                        {{-- Logout User --}}
                                                        <a class="btn btn-warning btn-flat btn-row" title="Forzar Cierre de Sesión"
                                                        href="{{ route('users.force.logout', ['id' => $user->id]) }}"><i
                                                                    class="fa fa-frown-o"></i></a>
                                                        @if($user->isBanned())
                                                            <a class=" btn-baneo btn btn-danger btn-flat btn-row" title="Desbloquear Usuario" href="#" ><i class="fa fa-ban fa-align-center"></i> </a>
                                                        @else
                                                            <a class=" btn-baneo btn btn-success btn-flat btn-row" title="Bloquear Usuario" href="#" ><i class="fa fa-check-circle-o fa-align-center"></i> </a>
                                                        @endif
                                                @endif

                                                @if (Sentinel::hasAccess('users.delete'))
                                                    <a class=" btn-delete btn btn-danger btn-flat btn-row" title="Eliminar" href="#" ><i class="fa fa-remove"></i> </a></td>
                                                @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            
            <div class="clearfix">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" role="status" aria-live="polite">{{ $users->total() }} registros en total</div>
                    </div>
                    <div class="col-sm-12">
                        <div class=" ">
                            {!! $users->appends(Request::only(['name']))->links('paginator') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! Form::open(['route' => ['users.destroy',':ROW_ID'], 'method' => 'DELETE','id' => 'form-delete']) !!}
@endsection
@section('page_scripts')
    @include('partials._delete_row_js')
    @include('partials._user_baneo_js')
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

    <!-- SWEET ALERT  -->
    <script src="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/sweetalerts2/custom-sweetalert.js') }}"></script>
    <!-- SWEET ALERT - FIN -->
@endsection
