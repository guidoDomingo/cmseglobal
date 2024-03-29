<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('isp_id', 'Proveedor de servicios (ISP)') !!}
            <a class="ms-5" href='#' id="nuevoIsp" data-bs-toggle="modal" data-bs-target="#modalNuevoIsp"><small>Agregar <i class="fa fa-plus"></i></small></a>
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-filter"></i></span>
                {!! Form::select('isp_id', $isp_types, null, ['id' => 'isp_id','class' => 'form-control selecttom','placeholder'=>'Seleccione un proveedor (ISP)..']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('isp_acount_number', 'Número de cuenta ISP') !!}
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-keyboard-o"></i></span>
                {!! Form::text('isp_acount_number', null , ['class' => 'form-control', 'placeholder' => 'Ingrese un número de cuenta ISP' ]) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('date_init', 'Fecha inicio de vigencia') !!}
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                {!! Form::text('date_init', null, ['id' => 'date_init_network', 'class' => 'form-control', 'placeholder' => 'Ingrese la fecha de inicio de vigencia','data-inputmask' => "'alias': 'dd/mm/yyyy'", 'data-mask' => 'dd/mm/yyyy']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('date_end', 'Fecha Finalización') !!}
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                {!! Form::text('date_end', null, ['id' => 'date_end_network', 'class' => 'form-control', 'placeholder' => 'Ingrese la fecha de Finalización','data-inputmask' => "'alias': 'dd/mm/yyyy'", 'data-mask' => 'dd/mm/yyyy']) !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('contract_cod', 'Código de contrato') !!}
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-file"></i></span>
                {!! Form::text('contract_cod', null , ['class' => 'form-control', 'placeholder' => 'Ingrese el código de contrato..' ]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('status', 'Estado') !!}
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-check-square-o"></i></span>
                {!! Form::select('status', ['1' => 'ACTIVO','2' => 'INACTIVO', '3' => 'VENCIDO'],null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</div>

{{-- 
@if(isset($pointofsale))
    @if(!empty($pointofsale))
        {!! Form::hidden('branch_id',$pointofsale->branch_id) !!}
            <H1>HOLA</H1>
    @endif
@endif --}}
