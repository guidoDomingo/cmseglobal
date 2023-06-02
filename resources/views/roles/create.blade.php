@extends('layout')

@section('title')
    Nuevo Rol
@endsection
@section('content')
    <section class="content-header">
        <h1>
            <small>Crear nuevo Rol</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="{{ route('roles.index') }}">Redes</a></li>
            <li class="active">Nuevo</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Nuevo Rol </h3>
                    </div>
                    <div class="box-body">
                        @include('partials._flashes')
                        @include('partials._messages')
                        {!! Form::open(['route' => ['roles.store'] , 'method' => 'POST']) !!}
                        @include('roles.partials.fields')
                        @include('roles.partials.permissions')
                        <a class="btn btn-default" href="{{ route('roles.index') }}" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="box-footer">
                    {{--@include('roles.partials.delete')--}}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('page_scripts')
    @parent
    {{--@include('roles.partials.scripts')--}}
    {{--    @include('partials._delete_form_js')--}}
@endsection
