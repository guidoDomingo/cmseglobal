

<div class="mb-3">
  {!! Form::label('pos_voucher_type_id', 'Tipo de comprobante') !!}
  <a class="ms-4" href='#' id="nuevoTipoComprobante" data-bs-toggle="modal" data-bs-target="#modalNuevoTipo"><small>Asignar <i class="fa fa-plus"></i></small></a>
	<div class="input-group">
    	
		@if(isset($posVoucher))
			@if(empty($posVoucher))
				<span class="input-group-text">
					<i class="fa fa-file-text"></i>
				</span>
				{!! Form::select('pos_voucher_type_id', [] ,null , ['class' => 'select2 ','placeholder' => 'Seleccione un Tipo...']) !!}
			@else
				<span class="input-group-text">
					<i class="fa fa-file-text"></i>
				</span>
				{!! Form::select('pos_voucher_type_id', [$posVoucher->voucherType->id => $posVoucher->voucherType->getDescription().' - '.$posVoucher->voucher_code], $posVoucher->voucherType->id, ['class' => ' select2 ','placeholder' => 'Seleccione un Tipo...']) !!}
			@endif
		@else
			<span class="input-group-text">
				<i class="fa fa-file-text"></i>
			</span>
			{!! Form::select('pos_voucher_type_id', [] ,null , ['class' => ' select2 ','placeholder' => 'Seleccione un Tipo...']) !!}
		@endif
	</div>
</div>

<div class="mb-3">
	{!! Form::label('stamping', 'Timbrado') !!}
	<div class="input-group">
    	<span class="input-group-text">
            <i class="fa fa-keyboard-o"></i>
        </span>
		{!! Form::text('stamping', null , ['class' => 'form-control', 'placeholder' => 'Timbrado' ]) !!}
	</div>
</div>

<div class="mb-3">
	{!! Form::label('from_number', 'Numeración desde:') !!}
	<div class="input-group">
    	<span class="input-group-text">
            <i class="fa fa-filter"></i>
        </span>
		{!! Form::text('from_number', null , ['class' => 'form-control', 'placeholder' => 'Desde' ]) !!}
	</div>
</div>

<div class="mb-3">
	{!! Form::label('to_number', 'Numeración hasta:') !!}
	<div class="input-group">
    	<span class="input-group-text">
            <i class="fa fa-filter"></i>
        </span>
		{!! Form::text('to_number', null , ['class' => 'form-control', 'placeholder' => 'Hasta' ]) !!}
	</div>
</div>

<div class="mb-3">
	{!! Form::label('valid_from', 'Válido desde:') !!}
	<div class="input-group">
		<span class="input-group-text">
			<i class="fa fa-calendar"></i>
		</span>
		{!! Form::text('valid_from', null , ['class' => 'form-control', 'data-inputmask' => "'alias': 'dd/mm/yyyy'", 'data-mask' => 'dd/mm/yyyy' ]) !!}
	</div>
</div>

<div class="mb-3">
	{!! Form::label('valid_until', 'Válido hasta:') !!}
	<div class="input-group">
		<span class="input-group-text">
			<i class="fa fa-calendar"></i>
		</span>
		{!! Form::text('valid_until', null , ['class' => 'form-control', 'data-inputmask' => "'alias': 'dd/mm/yyyy'", 'data-mask' => 'dd/mm/yyyy' ]) !!}
	</div>
</div>

@include('partials._date_picker')

