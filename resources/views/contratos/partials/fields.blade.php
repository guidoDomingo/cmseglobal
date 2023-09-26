<div class="row">
   @if (\Sentinel::getUser()->inRole('superuser') || \Sentinel::getUser()->inRole('atms_v2.area_eglobalt'))   {{--desbloquear campo de numero de contrato --}}
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('number', 'Número de Contrato') !!}
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa fa-file"></i>
                    </span>
                    {!! Form::text('number', isset($contrato) ? $contrato->number : null  , ['class' => 'form-control', 'placeholder' => 'Ingrese el número de contrato..' ,'id' =>'number_contract']) !!}
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('number', 'Número de Contrato') !!}
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa fa-file"></i>
                    </span>
                    {!! Form::text('number', isset($contrato) ? $contrato->number : null  , ['class' => 'form-control', 'placeholder' => 'Ingrese el número de contrato..' ,'id' =>'number_contract','readonly'=>true]) !!}
                </div>
            </div>
        </div>
    @endif
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('group_id', 'Grupo') !!}  <a style="margin-left: 8em" href='#' id="nuevoGrupo" data-bs-toggle="modal" data-bs-target="#modalNuevoGrupo"><small>Agregar <i class="fa fa-plus"></i></small></a>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-sitemap"></i>
                </span>
                @if(isset($grupo))
                    @if(empty($grupo))
                        {!! Form::select('group_id', $groups , null , ['id' => 'group_id', 'class' => 'select2 object-type','placeholder' => 'Seleccione un Grupo...']) !!}
                    @else
                        {!! Form::select('group_id', [$grupo->id => $grupo->description], $grupo->id, ['class' => 'select2 object-type','placeholder' => 'Seleccione un Grupo...','style' => 'width: 100%']) !!}
                    @endif
                @else
                    {!! Form::select('group_id', $groups , null , ['id' => 'group_id', 'class' => 'select2 object-type','placeholder' => 'Seleccione un grupo...','style' => 'width: 100%']) !!}
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
           {!! Form::label('contract_type', 'Tipo de Contrato') !!} @if ((\Sentinel::getUser()->inRole('superuser')))<a style="margin-left: 8em" href='#' id="nuevoTipoContrato" data-bs-toggle="modal" data-bs-target="#modalNuevoTipoContrato"><small>Agregar <i class="fa fa-plus"></i></small></a>@endif
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-filter"></i>
                </span>
                {!! Form::select('contract_type', $contract_types, null, ['id' => 'contract_type','class' => 'select2','style' => 'width: 50%','placeholder'=>'Seleccione un tipo de contrato...']) !!}
            </div>
       </div>
   </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('credit_limit', 'Línea de Crédito') !!}
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-money"></i>
                </span>
                {!! Form::text('credit_limit', null , ['class' => 'form-control', 'placeholder' => 'Ingrese la línea de crédito', 'id' =>'credit_limit_contract']) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Rango de vigencia:</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-clock-o"></i>
                </span>
                <input name="reservationtime" type="text" id="reservationtime" class="form-control" value="{{$reservationtime_contract or ''}}"  />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('status', 'Estado') !!}
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa fa-check-square-o"></i>
                    </span>
                    {!! Form::select('status', ['1' => 'RECEPCIONADO','2' => 'VALIDADO','3' => 'COMPLETADO','4' => 'VALIDADO POR FINANZAS', '5' => 'ANULADO'], null, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
