@extends('app')
@section('title')
Gestor de Updates de aplicación
@endsection
@section('content')
<section class="content-header">
  <h1>
    Actualizaciones de aplicaciones
    <small>Listado</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="#">Aplicaciones</a></li>
    <li class="active">Actualizaciones</li>
  </ol>
</section>
<section class="content">
    <div class="box">
        @include('partials._flashes')
        <div class="box-header">            
            <a href="{{ route('app_updates.create') }}" class="btn btn-primary mb-2 me-4" role="button">Agregar</a>
        </div>
        <div class="box-body  no-padding">
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-striped">
                        <tbody>
                            <thead>
                            <tr>    
                                <th style="width:10px">#</th>
                                <th>Version</th>
                                <th>Publicado por</th>
                                <th>Red</th>
                                <th style="width:200px">Publicado</th>                                
                                <th style="width:200px">Acciones</th>
                            </tr>
                            </thead>
                            @foreach($updates as $update)
                            <tr data-id="{{ $update->id  }}">                                
                                <td>{{ $update->id }}</td>
                                <td>{{ $update->version }}</td>
                                <td>{{ $update->username }}</td>
                                <td>{{ $update->owner }}</td>
                                <td>{{ date('d/m/y H:i', strtotime($update->updated_at)) }}</td>
                                <td>                                    
                                    @if (Sentinel::hasAnyAccess('applications.delete'))
                                        <a class="btn btn-danger btn-flat btn-row btn-delete" title="Eliminar" href="#" class="btn-delete"><i class="fa fa-remove"></i> </a>
                                    @endif
                                </td>
                            </tr>                            
                            @endforeach
                        </tbody>    
                    </table>
                </div>    
            </div>            
        </div> 
        <div class="clearfix">
            <div class="row">
                <div class="col-xs-12">
                    <div class="dataTables_info" role="status" aria-live="polite">{{ $updates->total() }} registros en total
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="">
                        {!! $updates->appends(Request::only(['name']))->links('paginator') !!}
                    </div>
                </div>
            </div>
        </div>       
    </div>
</section>
{!! Form::open(['route' => ['app_updates.destroy',':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}
@endsection

@section('page_scripts')
    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
    @include('partials._delete_row_js')
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
