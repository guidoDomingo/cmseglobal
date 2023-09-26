<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('insurance_code', 'Endoce') !!}
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-keyboard-o"></i></span>
                {!! Form::text('insurance_code', 'EGLOBALT S.A.', ['class' => 'form-control', 'placeholder' => 'Ingrese el código del endoce..', 'readonly' => true]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('number', 'Número de Póliza') !!}
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-file"></i></span>
                {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de contrato..']) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('capital', 'Capital asegurado') !!}
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-money"></i></span>
                {!! Form::text('capital', null, ['id' => 'capital_poliza', 'class' => 'form-control', 'placeholder' => 'Ingrese el capital asegurado']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('insurance_policy_type_id', 'Tipo de Póliza') !!} 
            @if ((\Sentinel::getUser()->inRole('superuser'))) 
                <a style="margin-left: 8em" href="#" id="nuevoTipoPoliza" data-bs-toggle="modal" data-bs-target="#modalNuevoTipoPoliza">
                    <small>Agregar <i class="fa fa-plus"></i></small>
                </a>
            @endif
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-filter"></i></span>
                {!! Form::select('insurance_policy_type_id', $insurance_types, null, ['id' => 'insurance_policy_type_id', 'class' => 'select2', 'style' => 'width: 50%', 'placeholder' => 'Seleccione un tipo de póliza...']) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('observaciones', 'Observaciones') !!}
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-comments"></i></span>
                {!! Form::text('observaciones', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una observación']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('status', 'Estado') !!}
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-check-square-o"></i></span>
                {!! Form::select('status', ['1' => 'ACTIVO', '2' => 'INACTIVO', '3' => 'VENCIDO'], null, ['class' => 'select2', 'style' => 'width: 50%', 'id' => 'status_policy']) !!}
            </div>
        </div>
    </div>
</div>
