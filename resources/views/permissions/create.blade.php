@extends('app')

@section('title')
    Nuevo Permiso
@endsection

@section('aditional_css')
    <style>
        .permiso-edit a, button{
            margin-top: 5px;
        }
    </style>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Permisos
            <small>Nuevo Permiso</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Permisos</a></li>
            <li class="active">agregar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nuevo Permiso</h3>
                    </div>
                    <div class="box-body">
                        @include('partials._messages')
                        {!! Form::open(['route' => 'permissions.store' , 'method' => 'POST', 'role' => 'form', 'class' => 'permiso-edit']) !!}
                        @include('permissions.partials.fields')
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
