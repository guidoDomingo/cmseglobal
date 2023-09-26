@extends('app')

@section('title')
Nuevo Web Service
@endsection
@section('content')
<section class="content-header">
  <h1>
    Web Service
    <small>Creación de Web Service</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="#">Web Service</a></li>
    <li class="active">agregar</li>
  </ol>
</section>
<section class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
		<div class="box-header with-border">
	      <h3 class="box-title">Nuevo Web Service</h3>
	    </div>
	    <div class="box-body">
			@include('partials._messages')
			{!! Form::open(['route' => 'webservices.store' , 'method' => 'POST', 'role' => 'form']) !!}
			@include('webservices.partials.fields')
			<a class="btn btn-default" href="{{ route('webservices.index') }}" role="button">Cancelar</a>
			<button type="submit" class="btn btn-primary">Guardar</button>
			{!! Form::close() !!}
	    </div>
		</div>

	</div>
</div>
</section>
@endsection

@section('js')
	 {{-- AGREGAR SELECT  --}}
    <script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
    <script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                 new TomSelect(".select2",{
                  create: true,
                   sortField: {
                   field: "text",
                    direction: "asc"
                }
                });

                 new TomSelect(".select",{
                  create: true,
                   sortField: {
                   field: "text",
                    direction: "asc"
                }
                });
         });

    </script>
 {{-- FIN SELECT  --}}
@endsection

@section('aditional_css')
	{{-- PARA AGREGAR SELECT  --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/tomSelect/custom-tomSelect.css') }}">
{{-- FIN DE SELECT  --}}
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
