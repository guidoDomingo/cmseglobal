@extends('app')

@section('title')
    Usuarios
@endsection

@section('aditional_css')
    <style>
        .nav-link {
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Usuarios
            <small>Nuevo Usuario</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Sucursal</a></li>
            <li class="active">agregar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class=" box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nuevo Usuario</h3>
                    </div>
                    <div class="box-body">
                        @include('partials._messages')
                        {!! Form::open(['route' => ['users.store'], 'method' => 'POST', 'role' => 'form']) !!}

                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-help-0-tab" data-bs-toggle="tab" data-bs-target="#tab_help_0" aria-controls="tab_help_0" aria-selected="true">Datos de usuario</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-help-1-tab" data-bs-toggle="tab" data-bs-target="#tab_help_1" aria-controls="tab_help_1" aria-selected="false">Permisos</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content mt-3">
                                    <div class="tab-pane fade show active" id="tab_help_0" aria-labelledby="tab-help-0-tab">
                                        @include('users.partials.fields')
                                    </div>
                                    <div class="tab-pane fade" id="tab_help_1" aria-labelledby="tab-help-1-tab">
                                        @include('users.partials.permissions')
                                    </div>
                                </div>
                            </div>
                        </div>


                        <a class="btn btn-default" href="{{ route('users.index') }}" role="button">Cancelar</a>
                        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
