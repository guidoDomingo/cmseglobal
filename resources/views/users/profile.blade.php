@extends('layout')

@section('title')
    Usuarios
@endsection

@section('navbar_top')



@append
@section('content')

    <section class="content">
        {{-- @include('partials._flashes')
        @include('partials._messages') --}}
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>Operación Exitosa</h4>
                {{session('success')}}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>Error!!</h4>
                {{session('error')}}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="col-md-10">
                        <div class="box-header with-border">
                            <i class="fa fa-user"></i>
                            <h3 class="box-title">Datos de la Cuenta</h3>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="box-body">
                            <div class="dropdown">
                                <a class="btn btn-bitbucket" type="button" id="dropdownMenu1" data-toggle="dropdown"
                                   aria-expanded="true">
                                    Opciones
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li role="presentation"><a role="menuitem" tabindex="-1"
                                                               href="{{ route('reset.password.request',
                                                               ['id' => $user->id]) }}">Cambiar Contraseña</a>
                                    </li>
                                    @if(!$activate) 
                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                            href="{{ route('resend.activation.request',
                                            ['id' => $user->id]) }}">Reenviar Activacion</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <dl class="dl-horizontal">
                            <dt>Usuario</dt>
                            <dd>{{ $user->username }}</dd>

                            <dt>Email</dt>
                            <dd>{{ $user->email }}</dd>

                            <dt>Red</dt>
                            <dd>
                                @if(!is_null($user->owner))
                                    <a href="{{ route('home', ['id' => $user->owner_id]) }}">{{ $user->owner->name }}</a>
                                @endif
                            </dd>

                            <dt>Sucursal</dt>
                            <dd>
                                @if(!is_null($user->branch)) <a href="#">{{ $user->branch->description }}</a> @else
                                    &nbsp; @endif
                            </dd>

                            <dt>Roles</dt>
                            <dd>
                                @foreach($user->roles as $role)
                                    <span class="label label-primary">{{ $role->name }}</span>
                                @endforeach
                            </dd>

                            <dt>Miembro desde:</dt>
                            <dd>{{ $user->created_at->diffForHumans() }}</dd>

                            <dt>Última sesión:</dt>
                            <dd>

                                @if(!empty($user->last_login)) {{ $user->last_login->diffForHumans() }} @else
                                    &nbsp; @endif

                            </dd>

                            <dt>Estado de la cuenta:</dt>
                            <dd>

                                @if(!$activate) 
                                    <span><i class="fa fa-circle text-danger"></i> Inactivo </span>
                                @else
                                    <span><i class="fa fa-circle text-success"></i> Activo </span>
                                @endif

                            </dd>

                        </dl>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>

@stop