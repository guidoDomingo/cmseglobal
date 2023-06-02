@extends('layout')
@section('title')
    Usuarios
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Usuarios
            <small>Editar Usuario</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Usuario</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>
    <section class="content">
        @include('partials._messages')
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Usuario</h3>
            </div>
            <div class="box-body">
                <div class="panel with-nav-tabs">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_help_0" data-toggle="tab">
                                    Datos de usuario </a>
                            </li>
                            @if (\Sentinel::getUser()->hasAccess('pos_boxes_edit'))
                                <li><a href="#tab_help_2" data-toggle="tab">
                                        Interacciones con terminal</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab_help_0">
                                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH', 'role' => 'form']) !!}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box box-default">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Usuario</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                            class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                @include('users.partials.fields')
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="box box-default">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Opciones</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                            class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <a class="btn btn-default" href="{{ route('users.index') }}" role="button">Cancelar</a>
                                                {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="box box-default">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Permisos</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                            class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                @include('users.partials.permissions')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                                {!! Form::close() !!}
                            </div>

                            @if (\Sentinel::getUser()->hasAccess('pos_boxes_edit'))
                                <div class="tab-pane fade" id="tab_help_2">
                                    @include('terminal_interaction_monitoring.pos_box.pos_boxes')
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection