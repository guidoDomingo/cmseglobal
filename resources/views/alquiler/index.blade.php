@extends('app')
@section('title')
    Alquiler de Miniterminal
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Alquiler
            <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Alquileres</a></li>
            <li class="active">Lista</li>
        </ol>
    </section>
    <section class="content">
        @include('partials._flashes')
        <div class="box">

            <div class="box-header">
                <div class="row">
                    <div class="col-md-1">
                        <a href="{{ route('alquiler.create') }}" class="btn btn-primary btn-sm" role="button">
                            <span class="fa fa-plus"></span> &nbsp; Agregar
                        </a>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-success btn-sm" title="Convertir tabla en archivo excel."
                            id="export">
                            <span class="fa fa-file-excel-o"></span> &nbsp; Exportar
                        </button>
                    </div>
                </div>

                {!! Form::open(['route' => 'rental_export', 'method' => 'POST', 'role' => 'form', 'id' => 'form_export']) !!}
                <input name="json" id="json" type="hidden" value='{!! $export_list !!}'>
                {!! Form::close() !!}

                <div class="box-tools">
                    <div class="input-group" style="width:150px;">
                        {!! Form::model(Request::only(['name']),['route' => 'alquiler.index', 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
                        {!! Form::text('description' ,null , ['class' => 'form-control input-sm pull-right', 'placeholder' => 'Nombre de Grupo', 'autocomplete' => 'off' ]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="box-body  no-padding">
                <div class="row">
                    <div class="col-xs-12">
                        @if ($alquileres)
                            <table class="table table-striped">
                                <tbody>
                                <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Grupo</th>
                                    <th>Numero de Serie</th>
                                    <th>Monto</th>
                                    <th style="width:150">Creado</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alquileres as $alquiler)
                                    <tr data-id="{{ $alquiler->id  }}">
                                        <td>{{ $alquiler->id }}.</td>
                                        <td>{{ $alquiler->group->description }}</td>
                                        <td>{{ $alquiler->num_serie }}</td>
                                        <td>{{ number_format($alquiler->importe,0) }}</td>
                                        <td>{{ date('d/m/y H:i', strtotime($alquiler->created_at)) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" role="status" aria-live="polite">{{ $alquileres->total() }} registros en total
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers">
                            {!! $alquileres->appends(Request::only(['id']))->links('paginator') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! Form::open(['route' => ['alquiler.destroy',':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
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
    <script type="text/javascript">
        $("#export").click(function() {
            if ($('#json').val() !== null && $('#json').val() !== '') {
                $('#form_export').submit();
            } else {
                Swal.fire({
                    title: 'Atención',
                    text: 'La lista no tiene registros para exportar.',
                    type: 'warning',
                    showCancelButton: false,
                    closeOnConfirm: true,
                    closeOnCancel: false,
                    confirmButtonColor: '#2778c4',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    </script>
@endsection

@section('aditional_css')
     <!-- SWEET ALERTS -->
    <link rel="stylesheet" href="{{ asset('src/plugins/src/sweetalerts2/sweetalerts2.css') }}">
    <link href="{{ asset('src/plugins/css/light/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- SWEET ALERTS - FIN -->
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