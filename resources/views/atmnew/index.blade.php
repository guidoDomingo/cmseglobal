@extends('app')
@section('title')
    ABM miniterminales
@endsection
@section('refresh')
    <meta http-equiv="refresh" content="900">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            ABM miniterminales
            <small>Listado de ATMS</small>
        </h1>
        @if (isset($owner))
            <h4>
                Última Versión de la App
                <small>{{ $owner->app_last_version }}</small>
            </h4>
        @endif
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">ABM miniterminales</a></li>
            <li class="active">lista</li>
        </ol>
    </section>

    <br />

    <div class="d-none" id="div_load" style="text-align: center; margin-bottom: 10px; font-size: 20px;">
        <div>
            <i class="fa fa-spin fa-refresh fa-2x" style="vertical-align: sub;"></i> &nbsp;
            Cargando...

            <p id="rows_loaded" title="Filas cargadas"></p>
        </div>
    </div>

    <div id="modal" class="modal fade modal-xl" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document" style="background: white; border-radius: 5px">
            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    <div class="modal-title" style="font-size: 20px;">
                        Acciones: &nbsp; <small> <b> </b> </small>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <a class="btn btn-success btn-flat btn-row" title="Editar"
                    href="{{ route('atmnew.edit', ['atmnew' => 1]) }}"><i class="fa fa-pencil"></i></a>

                <a class="btn-delete btn btn-danger btn-flat btn-row" title="Eliminar" href="#"><i
                        class="fa fa-remove"></i></a>


                <a class="btn btn-primary btn-flat btn-row" title="Parametros"
                    href="{{ route('atmnew.params', ['id' => 1]) }}"><i class="fa fa-gear"></i></a>


                <a class="btn btn-warning btn-flat btn-row" title="Partes"
                    href="{{ route('atmnew.parts', ['id' => 1]) }}"><i class="fa fa-wrench"></i></a>


                <a class="btn btn-success btn-flat btn-row" title="Editar Housing"
                    href="{{ route('atmnew.housing', ['id' => 1]) }}"><i class="fa fa-list"></i></a>

            </div>
        </div>
    </div>

    <section class="content" id="content" style="">
        @include('partials._flashes')

        <div class="p-3 rounded" style="margin-top: -15px; background-color: #181D39">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Búsqueda personalizada</h3>
                <div></div> <!-- Placeholder for any box tools you might want to add -->
            </div>
            <div class="mt-3">
                @if (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('atms_v2.area_comercial') || \Sentinel::getUser()->inRole('atms_v2.area_eglobalt'))
                    <div class="mb-3">
                        <a href="{{ route('atmnew.form_step_new') }}" class="btn btn-primary btn-sm" role="button">
                            <span class="fa fa-plus"></span> Agregar
                        </a>
                    </div>
                @endif

                {!! Form::model(Request::only(['name']), ['route' => 'atmnew.index', 'method' => 'GET', 'role' => 'search', 'id' => 'atmSearch']) !!}

                <div class="mb-3">
                    <button type="button" class="btn btn-success btn-sm" name="export" value="false" id='export'>
                        <span class="fa fa-file-excel-o"></span> Exportar
                    </button>
                </div>

                <div class="mb-3">
                    {!! Form::select('owner_id', $owners, $owner_id, ['id' => 'ownerId', 'class' => 'form-selectselect2', 'style' => 'width:100%']) !!}
                </div>

                <div class="mb-3">
                    {!! Form::select('group_id', $groups, $group_id, ['id' => 'groupId', 'class' => 'form-selectselect2', 'style' => 'width:100%']) !!}
                </div>

                <div class="mb-3" style="display: none">
                    <div class="form-group">
                        <select class="form-select" id="record_limit" name="record_limit">
                            <!-- Options go here -->
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    {!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Nombre', 'autocomplete' => 'off']) !!}
                </div>

                <div style="display: none">
                    {!! Form::radio('download', 'false', ['id' => 'download']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>


        <div class="">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        @if (\Sentinel::getUser()->hasAccess('superuser'))
                            <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Identificador</th>
                                        <th>Red</th>
                                        <th>Creado</th>
                                        <th>Estado</th>
                                        <th>Ultima Actualización</th>
                                        <th>Tiempo Transcurrido</th>
                                        @if (Sentinel::hasAccess('mantenimiento.arqueo_remoto'))
                                            <th>Arqueo Remoto</th>
                                        @endif
                                        @if (Sentinel::hasAccess('marca.add|edit'))
                                            <th>Grilla Tradicional</th>
                                        @endif
                                        <th>App Versions</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atms as $atm)
                                        @if ($atm->atm_status == 80)
                                            <tr class="danger" data-id="{{ $atm->id }}">
                                            @else
                                            <tr data-id="{{ $atm->id }}">
                                        @endif
                                        <td>{{ $atm->id }}.</td>
                                        <td>{{ $atm->name }}</td>
                                        <td>
                                            {{ $atm->code }} -
                                            @if (Sentinel::hasAccess('atms_v2.credentials.add|edit'))
                                                <a href="{{ route('atm.credentials.index', ['atm' => $atm->id]) }}"><i
                                                        class="fa fa-key"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $atm->owner_name }}</td>
                                        <td style="text-align: center">
                                            @if ($atm->atm_status == -1)
                                                
                                                    <div class="progress-bar bg-primary progress-bar-striped mb-3"
                                                        role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 80%">
                                                        <span class="">15%</span>
                                                    </div>
                                                
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso1"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso1v1"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -2)
                                                
                                                    <div class="progress-bar bg-primary progress-bar-striped mb-3"
                                                        role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 80%">
                                                        <span class="">30%</span>
                                                    </div>
                                               
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso2"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso2v1"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -3)
                                           
                                                    <div class="progress-bar bg-primary progress-bar-striped mb-3"
                                                        role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 80%">
                                                        <span class="">45%</span>
                                                    </div>
                                           
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso3"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso3v1"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -4)
                                               
                                                    <div class="progress-bar bg-primary progress-bar-striped mb-3"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 80%">
                                                        <span class="">60%</span>
                                                    </div>
                                             
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso4"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso4v1"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            {{-- ABM miniterminales v2 --}}
                                            @if ($atm->atm_status == -5)
                                                
                                                    <div class="progress-bar bg-primary progress-bar-striped mb-3"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 80%">
                                                        <span class="">15%</span>
                                                    </div>
                                               
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso5"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso5v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -6)
                                                
                                                    <div class="progress-bar bg-primary progress-bar-striped mb-3"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 80%">
                                                        <span class="">25%</span>
                                                    </div>
                                                
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso6"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso6v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -7)
                                           
                                                <div class="progress-bar bg-info mb-3" role="progressbar" style="width: 80%" aria-valuenow="100" aria-valuemin="50" aria-valuemax="100">35%</div>
                                             
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso7"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso7v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -8)
                                                
                                                    <div class="progress-bar bg-primary progress-bar-striped mb-3"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 80%">
                                                        <span class="">40%</span>
                                                    </div>
                                               
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso8"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso8v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -14)
                                               
                                                    <div class="progress-bar bg-primary progress-bar-striped mb-3"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 80%">
                                                        <span class="">55%</span>
                                                    </div>
                                               
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso9"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso9v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif

                                            @if ($atm->atm_status == -9)
                                           
                                                <div class="progress-bar bg-primary progress-bar-striped mb-3"
                                                    role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: 80%">
                                                    <span class="">65%</span>
                                                </div>
                                           
                                            <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso10"
                                                data-bs-toggle="modal" data-bs-target="#modalProgreso10v2"><i
                                                    class="fa fa-eye"></i></a>
                                            @endif

                                            @if ($atm->atm_status == -10)
                                                
                                                    <div class="progress-bar bg-primary progress-bar-striped mb-3"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 75%">
                                                        <span class="">75%</span>
                                                    </div>
                                               
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso11"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso11v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -11)
                                                
                                                    <div class="progress-bar bg-primary progress-bar-striped mb-3"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 85%">
                                                        <span class="">85%</span>
                                                    </div>
                                                
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso12"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso12v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -12)
                                                
                                                    <div class="progress-bar progress-bar-success progress-bar-striped mb-3"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%">
                                                        <span class="">100%</span>
                                                    </div>
                                               
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso13"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso13v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                        </td>
                                        @if (($atm->atm_status == 0 && $atm->elasep <= 20) || $atm->id == 153)
                                            <td><span><i class="fa fa-circle text-success"></i> Online </span></td>
                                        @else
                                            @if ($atm->atm_status != 0 && $atm->atm_status != 80 && $atm->id != 153)
                                                @if (!\Sentinel::getUser()->hasAccess('superuser'))
                                                    <td><span><i class="fa fa-circle text-red"></i> Suspendido</span></td>
                                                @else
                                                    <td><span><i class="fa fa-circle text-red"></i> Suspendido <i
                                                                class="pay-info fa fa-info-circle" style="cursor:pointer"
                                                                data-bs-toggle="tooltip" title="Detalle"></i></span></td>
                                                @endif
                                            @else
                                                @if ($atm->atm_status == 80)
                                                    <td>
                                                        <small style="font-weight: bold; color: #dd4b39">ACCESO NO
                                                            AUTORIZADO</small>
                                                    </td>
                                                @else
                                                    <td><span><i class="fa fa-circle text-yellow"></i> Offline </span></td>
                                                @endif
                                            @endif

                                        @endif
                                        <td>{{ $atm->last_request_at }}</td>
                                        <td>{{ $atm->elasep }}</td>
                                        @if (Sentinel::hasAccess('mantenimiento.arqueo_remoto'))
                                            <td>
                                                @if ($atm->arqueo_remoto == true)
                                                    <label class="switch">
                                                        <input type="checkbox" class="arqueo_remoto" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" class="arqueo_remoto">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </td>
                                        @endif
                                        @if (Sentinel::hasAccess('marca.add|edit'))
                                            <td>
                                                @if ($atm->grilla_tradicional == true)
                                                    <label class="switch">
                                                        <input type="checkbox" class="grilla_tradicional" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" class="grilla_tradicional">
                                                        <span class="slider round"></span>
                                                    </label>
                                                @endif
                                            </td>
                                        @endif
                                        <td>{{ $atm->compile_version }}</td>
                                        @if ($atm->atm_status != 80)
                                            <td>
                                                <div class="btn-group" role="group">
                                                    @if (Sentinel::hasAccess('atms_v2.add|edit'))
                                                        <a class="btn btn-outline-success" title="Editar" href="{{ route('atmnew.edit', ['atmnew' => $atm->id]) }}"><i class="fa fa-pencil"></i></a>
                                                    @endif
                                                    @if (Sentinel::hasAccess('atms_v2.delete'))
                                                        <a class="btn btn-outline-danger" title="Eliminar" href="{{ route('atmnew.delete', ['id' => $atm->id]) }}"><i class="fa fa-remove"></i></a>
                                                    @endif
                                                    @if (Sentinel::hasAccess('atms_v2.params'))
                                                        <a class="btn btn-outline-primary" title="Parametros" href="{{ route('atmnew.params', ['id' => $atm->id]) }}"><i class="fa fa-gear"></i></a>
                                                    @endif
                                                    @if (Sentinel::hasAccess('atms_v2.parts'))
                                                        <a class="btn btn-outline-warning" title="Partes" href="{{ route('atmnew.parts', ['id' => $atm->id]) }}"><i class="fa fa-wrench"></i></a>
                                                    @endif
                                                    @if (Sentinel::hasAccess('atms_v2.housing.add|edit'))
                                                        <a class="btn btn-outline-secondary" title="Editar Housing" href="{{ route('atmnew.housing', ['id' => $atm->id]) }}"><i class="fa fa-list"></i></a>
                                                    @endif
                                                </div>
                                            </td>

                                        @else
                                            <td>
                                                @if (Sentinel::hasAccess('atms_v2.reactivar.add|edit'))
                                                    <button class="reactivar">Reactivar</button>
                                                @endif
                                            </td>
                                        @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombre</th>
                                        <th>Identificador</th>
                                        <th>Red</th>
                                        <th>Creado</th>
                                        <th>Estado</th>
                                        <th>Fecha de creación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atms as $atm)
                                        @if ($atm->atm_status == 80)
                                            <tr class="danger" data-id="{{ $atm->id }}">
                                            @else
                                            <tr data-id="{{ $atm->id }}">
                                        @endif
                                        <td>{{ $atm->id }}.</td>
                                        <td>{{ $atm->name }}</td>
                                        <td>{{ $atm->code }}</td>
                                        <td>{{ $atm->owner_name }}</td>
                                        <td style="text-align: center">
                                            @if ($atm->atm_status == -1)
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 20%">
                                                        <span class="">15%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso1"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso1v1"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -2)
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 40%">
                                                        <span class="">30%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso2"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso2v1"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -3)
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 45%">
                                                        <span class="">45%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso3"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso3v1"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -4)
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 60%">
                                                        <span class="">60%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso4"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso4v1"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            {{-- ABM miniterminales v2 --}}
                                            @if ($atm->atm_status == -5)
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 15%">
                                                        <span class="">15%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso5"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso5v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -6)
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 25%">
                                                        <span class="">25%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso6"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso6v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -7)
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 35%">
                                                        <span class="">35%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso7"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso7v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -8)
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 40%">
                                                        <span class="">40%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso8"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso8v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif

                                            @if ($atm->atm_status == -14)
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 55%">
                                                        <span class="">55%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso9"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso9v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif

                                            @if ($atm->atm_status == -9)
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 65%">
                                                        <span class="">65%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso10"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso10v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -10)
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 75%">
                                                        <span class="">75%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso11"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso11v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -11)
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary progress-bar-striped"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 85%">
                                                        <span class="">85%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso12"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso12v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            @if ($atm->atm_status == -12)
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success progress-bar-striped"
                                                        role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 100%">
                                                        <span class="">100%</span>
                                                    </div>
                                                </div>
                                                <a class="btn btn-secondary" title="Ver Progreso" href="#" id="progreso13"
                                                    data-bs-toggle="modal" data-bs-target="#modalProgreso13v2"><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                        </td>

                                        @if (($atm->atm_status == 0 && $atm->elasep <= 20) || $atm->id == 153)
                                            <td><span><i class="fa fa-circle text-success"></i> Online </span></td>
                                        @else
                                            @if ($atm->atm_status != 0 && $atm->atm_status != 80 && $atm->id != 153)
                                                <td><span><i class="fa fa-circle text-red"></i> Suspendido</span></td>
                                            @else
                                                @if ($atm->atm_status == 80)
                                                    <td><span class="label label-danger"> <small>ACCESO NO
                                                                AUTORIZADO</small> </span></td>
                                                @else
                                                    <td><span><i class="fa fa-circle text-yellow"></i> Offline </span></td>
                                                @endif
                                            @endif

                                        @endif
                                        <td style="text-align: center">
                                            {{ $atm->last_request_at }}</td>
                                        @if ($atm->atm_status != 80)
                                            <td style="text-align: center">
                                                @if (Sentinel::hasAccess('atms_v2.add|edit')) 
                                                    
                                                    @if(\Sentinel::getUser()->inRole('atms_v2.area_comercial') AND $atm->atm_status <> -6 AND $atm->atm_status <> -7 AND $atm->atm_status <> -8 AND $atm->atm_status <> -9 AND $atm->atm_status <> -10 AND $atm->atm_status <> -11 AND $atm->atm_status <> -12 AND $atm->atm_status <> -13 AND $atm->atm_status <> -14)
                                                        <a class="btn btn-success btn-flat btn-row" title="Editar"
                                                            href="{{ route('atmnew.edit', ['atmnew' => $atm->id]) }}"><i
                                                                class="fa fa-pencil"></i></a>

                                                    @elseif (\Sentinel::getUser()->inRole('contract.check.receptiondate') AND $atm->atm_status == 0  or $atm->atm_status == -14 or $atm->atm_status == -11 or $atm->atm_status == -10 or $atm->atm_status == -9 or $atm->atm_status == -8 or $atm->atm_status == -6 or $atm->atm_status == -12)
                                                        <a class="btn btn-success" title="Editar"
                                                        href="{{ route('atmnew.edit', ['atmnew' => $atm->id]) }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                    @elseif ((\Sentinel::getUser()->inRole('atms_v2.area_legales') AND $atm->atm_status == -6))
                                                            <a class="btn btn-success" title="Editar"
                                                            href="{{ route('atmnew.edit', ['atmnew' => $atm->id]) }}"><i
                                                                class="fa fa-pencil"></i></a>


                                                    @elseif (\Sentinel::getUser()->inRole('atms_v2.area_antell') AND $atm->atm_status == -8)
                                            
                                                        <a class="btn btn-success" title="Editar"
                                                        href="{{ route('atmnew.edit', ['atmnew' => $atm->id]) }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                    @elseif (\Sentinel::getUser()->inRole('atms_v2.area_fraude') AND $atm->atm_status == -14)
                                    
                                                        <a class="btn btn-success" title="Editar"
                                                        href="{{ route('atmnew.edit', ['atmnew' => $atm->id]) }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                    @elseif (\Sentinel::getUser()->inRole('atms_v2.area_contabilidad') AND $atm->atm_status == -9)
                                        
                                                        <a class="btn btn-success" title="Editar"
                                                        href="{{ route('atmnew.edit', ['atmnew' => $atm->id]) }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                    @elseif (\Sentinel::getUser()->inRole('atms_v2.area_logisticas') AND $atm->atm_status == -10)
                                    
                                                        <a class="btn btn-success" title="Editar"
                                                        href="{{ route('atmnew.edit', ['atmnew' => $atm->id]) }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                    
                                                    @elseif (\Sentinel::getUser()->inRole('atms_v2.area_eglobalt') AND $atm->atm_status == -11)
                                    
                                                        <a class="btn btn-success" title="Editar"
                                                        href="{{ route('atmnew.edit', ['atmnew' => $atm->id]) }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                    @endif

                                                @endif
                                            </td>
                                        @else
                                            <td style="text-align: center">
                                                Sin acción disponible.
                                            </td>
                                        @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Modal -->
    <div id="myModal" class="modal fade modal-xl" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detalles - ATM <label class="idAtm"></label></h4>
                </div>
                <div class="modal-body">
                    <table id="detalles" class="table table-bordered table-hover dataTable" role="grid"
                        aria-describedby="Table1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_disabled" rowspan="1" colspan="1">Dispositivo</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1">Mensaje</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1">Fecha Inicio</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1">Fecha Fin</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1">Tiempo Transcurrido</th>
                            </tr>
                        </thead>
                        <tbody id="modal-contenido">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="sorting_disabled" rowspan="1" colspan="1">Dispositivo</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1">Mensaje</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1">Fecha Inicio</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1">Fecha Fin</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1">Tiempo Transcurrido</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div id="acciones">
                        <div id="message_box" class="text-center alert  display: none;"></div>
                        <div id="keys_spinn" class="text-center" style="margin: 50px 10px; display: none;"><i
                                class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></div>
                        <form role="form" id="reactivation-form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="txtDescription">Descripción</label>
                                    <textarea id="txtDescription" name="txtDescription" class="form-control" rows="3"
                                        placeholder="Describa brevemente el caso ..."></textarea>
                                    <input type="hidden" id="txtatm_id">
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button disabled type="buttom" style="display: none;" id="process-reactivacion"
                        class="btn btn-primary pull-left">Reactivar</button>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    {!! Form::open(['route' => ['atmnew.destroy', ':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection

@section('page_scripts')
    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
    @include('partials._delete_row_js')
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
    <!-- datatables -->
    <link rel="stylesheet" href="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css">
    <script src="/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
        $('.select2').select2();
        $('.pay-info').on('click', function(e) {
            e.preventDefault();
            var row = $(this).parents('tr');
            var atm_id = row.data('id');
            $.get('{{ url('reports') }}/info/atm_notification/' + atm_id, function(data) {
                $(".idAtm").html(atm_id);
                $("#modal-contenido").html(data);
                $("#detalles").show();
                $('#keys_spinn').hide();
                $('#process-reactivacion').hide();
                $('#message_box').hide();
                $("#myModal").modal("show");
            });
        });

        $('.reactivar').on('click', function(e) {
            e.preventDefault();
            var row = $(this).parents('tr');
            var atm_id = row.data('id');

            $(".idAtm").html(atm_id);
            $("#detalles").hide();
            $('#process-reactivacion').show();
            $('#reactivation-form').show();
            $('#keys_spinn').hide();
            $('#message_box').hide();
            $('#txtatm_id').val(atm_id);
            $('#txtDescription').val('');
            $("#myModal").modal("show");
        });

        $('#txtDescription').on('keyup', function(e) {
            if ($(this).val() != '') {
                document.getElementById("process-reactivacion").disabled = false;
            } else {
                document.getElementById("process-reactivacion").disabled = true;
            }
        });

        $('#process-reactivacion').on('click', function(e) {
            $('#keys_spinn').show();
            $('#reactivation-form').hide();
            $('#message_box').html('Procesando reactivación');
            $('#message_box').addClass('alert-warning');
            $('#process-reactivacion').hide();
            $('#message_box').show();

            let form = $('#reactivation-form')[0];
            let data = new FormData(form);
            let atm_id = $('#txtatm_id').val();
            data.append("_token", token);
            data.append("_atm_id", atm_id);

            $.ajax({
                type: "POST",
                url: "atm/new/reactivate",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function(data) {
                    //console.log("SUCCESS : ", data);
                    if (data.error == false) {
                        $('#message_box').html(data.message);
                        $('#message_box').addClass('alert-success');
                    } else {
                        $('#message_box').html(data.message);
                        $('#message_box').addClass('alert-danger');
                    }

                    $('#message_box').show();
                    $('#keys_spinn').hide();
                },
                error: function(e) {
                    $('#message_box').html(
                        'Lo sentimos, se produjo un error al procesar la reactivación');
                    $('#message_box').addClass('alert-danger');
                    $('#message_box').show();
                    $('#keys_spinn').hide();
                }
            });

            setTimeout(function() {
                $('#myModal').modal('hide')
                location.reload();
            }, 5000);

        });

        $('.arqueo_remoto').on('change', function(e) {
            e.preventDefault();
            let row = $(this).parents('tr');
            let atm_id = row.data('id');
            let value = null;
            let mensaje = '';
            $(".idAtm").html(atm_id);

            if ($(this).is(':checked')) {
                // Hacer algo si el checkbox ha sido seleccionado
                value = true;
                mensaje = 'Arqueo Remoto habilitado'
            } else {
                // Hacer algo si el checkbox ha sido deseleccionado
                value = false;
                mensaje = 'Arqueo Remoto desactivado'
            }

            $.post("atm/new/arqueo_remoto", {
                _token: token,
                _atm_id: atm_id,
                _value: value
            }, function(data) {
                console.log('Solicitud procesada ' + mensaje);
            });
        });

        $('.grilla_tradicional').on('change', function(e) {
            e.preventDefault();
            let row = $(this).parents('tr');
            let atm_id = row.data('id');
            let value = null;
            let mensaje = '';
            var checkeado = $(this).is(':checked');
            var thisAtm = $(this);

            if ($(this).is(':checked')) {
                // Hacer algo si el checkbox ha sido seleccionado
                value = true;
                mensaje = 'Grilla tradicional habilitada'
            } else {
                // Hacer algo si el checkbox ha sido deseleccionado
                value = false;
                mensaje = 'Grilla tradicional desactivada'
            }

            $.post("atm/new/grilla_tradicional", {
                _token: token,
                _atm_id: atm_id,
                _value: value
            }, function(data) {
                if (data.error) {
                    thisAtm.prop('checked', !checkeado);
                    alert('Ha ocurrido un error');
                }

                console.log('Solicitud procesada ' + mensaje);
            });
        });

        $(document).on('change', '#ownerId', function() {
            $('#atmSearch').submit();
        });

        $(document).on('change', '#groupId', function() {
            $('#atmSearch').submit();
        });

        $(document).on('change', '#record_limit', function() {
            $('#atmSearch').submit();
        });

        //var=document.getElementById('download');
        $(document).on('click', '#export', function(e) {
            $('input[name="download"]:checked').val('download')

            //document.getElementById("download").value="download"; 
            $('#atmSearch').submit();
            /*
            e.preventDefault(); 
            document.getElementById("export").value="download"; */
        });


        var data_table_config = {
            //custom
            orderCellsTop: true,
            fixedHeader: true,
            pageLength: 20,
            lengthMenu: [
                1, 2, 5, 10, 20, 30, 50, 70, 100, 150, 300, 500, 1000, 1500, 2000
            ],
            dom: '<"pull-left"f><"pull-right"l>tip',
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            scroller: true,
            displayLength: 10,
            processing: true,
            initComplete: function(settings, json) {
                $('#content').css('display', 'block');
                $('#div_load').css('display', 'none');
                $('body > div.wrapper > header > nav > a').trigger('click');
            }
        }

        $('#datatable_1').DataTable(data_table_config);

        //console.log("record_limit:", <?php echo $record_limit; ?>);

        //$('#record_limit').val("<?php echo $record_limit; ?>");
    </script>
@endsection
@section('aditional_css')
    <!-- DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 30px;
            height: 17px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 13px;
            width: 13px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(13px);
            -ms-transform: translateX(13px);
            transform: translateX(13px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        body.dark .box-body {
            overflow: unset !important; 
        }

        body.dark .table thead tr th {
            max-width: 120px !important; /* Aumentar el ancho máximo */
            white-space: normal !important; /* Evitar el ajuste de línea */
        }

        body.dark .table tbody tr td {
            max-width: 120px !important; /* Aumentar el ancho máximo */
            white-space: normal !important; /* Evitar el ajuste de línea */
        }

        body.dark .btn-group {
            display: flex;
            flex-direction: column;
        }

        /* Estilos personalizados para la barra de progreso */
        .custom-progress-bar {
            background-color: #007BFF; /* Fondo azul */
            font-weight: bold; /* Texto en negrita */
            border: 1px solid #0056b3; /* Borde con color */
            border-radius: 8px; /* Radio de esquina */
            height: 20px; /* Ajusta la altura de la barra */
            font-size: 14px; /* Tamaño del texto */
        }



    </style>
@endsection


@include('atmnew.partials.modal_progreso')
