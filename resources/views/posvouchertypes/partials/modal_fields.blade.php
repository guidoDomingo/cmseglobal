<div class="mb-3">
  {!! Form::label('voucher_type_id', 'Tipo de comprobante') !!}
  {!! Form::select('voucher_type_id', $voucherTypes, null, ['class' => ' ', 'placeholder' => 'Seleccione un Tipo...', 'style' => 'width: 100%']) !!}
</div>

<div class="mb-3">
{!! Form::label('expedition_point', 'Punto de Expedición') !!}
{!! Form::text('expedition_point', null, ['class' => 'form-control', 'placeholder' => '(xxx)']) !!}
</div>
