@extends('app')

@section('title')
    Punto de Venta {{ $pos->description }}
@endsection
@section('content')
    <section class="content-header">
        <h1>
            {{ $pos->description }}
            <small>Modificación de datos de Punto de Venta</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route('pos.index') }}">Puntos de Ventas</a></li>
            <li><a href="#">{{ $pos->description }}</a></li>
            <li class="active">Asignar Cajero</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Asignar ATM</h3>
                    </div>
                    <div class="box-body">
                        <div id="form-alert-container">
                            @if(Session::has('atm_form_message'))
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i>Operación Exitosa</h4>
                                    {{ Session::get('atm_form_message') }}
                                </div>
                            @endif
                            @if(Session::has('atm_form_error_message'))
                                <div class="alert alert-error alert-dismissable">
                                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i>Ocurrió un error en la solicitud</h4>
                                    {{ Session::get('atm_form_error_message') }}
                                </div>
                            @endif
                        </div>
                        {!! Form::open(['route' => ['pos.atm.assign', $pos->id ] , 'method' => 'POST', 'role' => 'form', 'id' => 'form-ws-request']) !!}
                        <div class="form-group">
                            {!! Form::label('atm', 'ATM') !!}
                            {!! Form::select('atm_id',$atms , $pos->atm_id , ['class' => 'form-control chosen-select','placeholder' => 'Ninguno']) !!}
                        </div>
                        <button type="submit" id="wsrequest-submit" class="btn btn-primary">Guardar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('page_scripts')
@endsection

@section('aditional_css')
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
