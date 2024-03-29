
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
  			{!! Form::label('pos_voucher_type_id', 'Tipo de comprobante') !!}
			<a href="#" class="btn btn-primary btn-sm ml-4"  style="margin-left: 50%" id="nuevoTipoComprobante" data-bs-toggle="modal" data-bs-target="#modalNuevoTipo">
				<small>Asignar <i class="fas fa-plus"></i></small>
			</a>

			<div class="input-group">
				<div class="input-group-text">
					<i class="fas fas-file-text"></i>
				</div>  
				@if(isset($posVoucher))
					@if(empty($posVoucher))
						{!! Form::select('pos_voucher_type_id', [] ,null , ['class' => 'select2 object-type','placeholder' => 'Seleccione un Tipo...','style' => 'width: 50%']) !!}
					@else
				
						{!! Form::select('pos_voucher_type_id', [$posVoucher->voucherType->id => $posVoucher->voucherType->getDescription().' - '.$posVoucher->voucher_code], $posVoucher->voucherType->id, ['class' => 'select2 object-type','placeholder' => 'Seleccione un Tipo...','style' => 'width: 50%']) !!}
					@endif
				@else
					{!! Form::select('pos_voucher_type_id', [] ,null , ['class' => 'select2 object-type','placeholder' => 'Seleccione un Tipo...','style' => 'width: 50%']) !!}
				@endif
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('stamping', 'Timbrado') !!}
			<div class="input-group">
				<div class="input-group-text">
					<i class="fas fas-keyboard-o"></i>
				</div>  
				{!! Form::text('stamping', null , ['class' => 'form-control', 'placeholder' => 'Timbrado' ]) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('from_number', 'Numeración desde:') !!}
			<div class="input-group">
				<div class="input-group-text">
					<i class="fas fas-filter"></i>
				</div>  
				{!! Form::text('from_number', null , ['class' => 'form-control', 'placeholder' => 'Desde' ]) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('to_number', 'Numeración hasta:') !!}
			<div class="input-group">
				<div class="input-group-text">
					<i class="fas fas-filter"></i>
				</div>  
				{!! Form::text('to_number', null , ['class' => 'form-control', 'placeholder' => 'Hasta' ]) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('valid_from', 'Válido desde:') !!}
			<div class="input-group">
				<div class="input-group-text">
					<i class="fas fas-calendar"></i>
				</div>
				{!! Form::text('valid_from', null , ['class' => 'form-control', 'data-inputmask' => "'alias': 'dd/mm/yyyy'", 'data-mask' => 'dd/mm/yyyy' ]) !!}
			</div><!-- /.input group -->
		</div>


		{!! Form::label('valid_until', 'Válido hasta:') !!}
		<div class="input-group">
			<div class="input-group-text">
				<i class="fas fas-calendar"></i>
			</div>
			{!! Form::text('valid_until', null , ['class' => 'form-control', 'data-inputmask' => "'alias': 'dd/mm/yyyy'", 'data-mask' => 'dd/mm/yyyy' ]) !!}
		</div>

	</div>

    <div class="col-md-6">
		<div class="form-group">

			<div class="row">
				<div class="form-group col-md-12 borderd-campaing">
					<div class=""  style="margin-left: 130PX;"><h4>&nbsp; Detalles - Sistemas antell &nbsp;</h4></div>
					<div class="form-group col-md-12"  style="margin-top: 20PX;">
			
						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('vendedor', 'Vendedor') !!}
								<div class="input-group">
									<div class="input-group-text"><i class="fas fas-user"></i></div>
									{!! Form::text('vendedor', $vendedor_ondanet , ['class' => 'form-control', 'Readonly'=>'Readonly' ]) !!}
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('vendedor_cash', 'Vendedor (Cash)') !!}
								<div class="input-group">
									<div class="input-group-text"><i class="fas fas-user"></i></div>
									{!! Form::text('vendedor_cash', $vendedor_cash_ondanet , ['class' => 'form-control', 'Readonly'=>'Readonly' ]) !!}
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('vendedor_descripcion', 'Descripción') !!}
								<div class="input-group">
									<div class="input-group-text"><i class="fas fas-user"></i></div>
									{!! Form::text('vendedor_descripcion', $vendedor_descripcion_ondanet , ['class' => 'form-control', 'Readonly'=>'Readonly' ]) !!}
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('vendedor_descripcion_cash', 'Descripción (Cash)') !!}
								<div class="input-group">
									<div class="input-group-text"><i class="fas fas-user"></i></div>
									{!! Form::text('vendedor_descripcion_cash', $vendedor_descripcion_cash_ondanet , ['class' => 'form-control', 'Readonly'=>'Readonly' ]) !!}
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('vendedor_descripcion', 'Déposito') !!}
								<div class="input-group">
									<div class="input-group-text"><i class="fas fas-cc"></i></div>
									{!! Form::text('deposito', $deposito_ondanet , ['class' => 'form-control', 'Readonly'=>'Readonly' ]) !!}
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('vendedor_descripcion_cash', 'Déposito (Cash)') !!}
								<div class="input-group">
									<div class="input-group-text"><i class="fas fas-cc"></i></div>
									{!! Form::text('deposito_cash', $deposito_cash_ondanet , ['class' => 'form-control' , 'Readonly'=>'Readonly']) !!}
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('vendedor_descripcion', 'Caja') !!}
								<div class="input-group">
									<div class="input-group-text"><i class="fas fas-object-group"></i></div>
									{!! Form::text('caja', $caja_ondanet , ['class' => 'form-control', 'Readonly'=>'Readonly' ]) !!}
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('vendedor_descripcion_cash', 'Caja (Cash)') !!}
								<div class="input-group">
									<div class="input-group-text"><i class="fas fas-object-group"></i></div>
									{!! Form::text('caja_cash', $caja_cash_ondanet , ['class' => 'form-control', 'Readonly'=>'Readonly' ]) !!}
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('sucursal_descripcion', 'Sucursal') !!}
								<div class="input-group">
									<div class="input-group-text"><i class="fas fas-share-alt"></i></div>
									{!! Form::text('sucursal', $sucursal_ondanet , ['class' => 'form-control', 'Readonly'=>'Readonly' ]) !!}
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('sucursal_descripcion_cash', 'Sucursal (Cash)') !!}
								<div class="input-group">
									<div class="input-group-text"><i class="fas fas-share-alt"></i></div>
									{!! Form::text('sucursal_cash', $sucursal_cash_ondanet , ['class' => 'form-control', 'Readonly'=>'Readonly' ]) !!}
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
			

		</div>
	</div>
		
</div>

@include('partials._date_picker')
