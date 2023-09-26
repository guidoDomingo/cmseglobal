<div class="mb-3">
    {!! Form::label('description', 'Nombre', ['class' => 'form-label']) !!}
    {!! Form::text('description', null , ['class' => 'form-control', 'placeholder' => 'nombre de sucursal' ]) !!}
</div>
<div class="mb-3">
    {!! Form::label('branch_code', 'Código Sucursal (Facturación)', ['class' => 'form-label']) !!}
    {!! Form::text('branch_code', null , ['class' => 'form-control', 'placeholder' => 'Código de Sucursal' ]) !!}
</div>
<div class="mb-3">
    {!! Form::label('address', 'Dirección', ['class' => 'form-label']) !!}
    {!! Form::text('address', null , ['class' => 'form-control', 'placeholder' => 'dirección' ]) !!}
</div>
<div class="mb-3">
    {!! Form::label('phone', 'Teléfono', ['class' => 'form-label']) !!}
    {!! Form::text('phone', null , ['class' => 'form-control', 'placeholder' => 'teléfono' ]) !!}
</div>
<div class="mb-3">
    {!! Form::label('user', 'Responsable', ['class' => 'form-label']) !!}
    {!! Form::select('user_id', $users, $user_id, ['class' => 'form-control select2', 'style' => 'width:100%']) !!}
</div>
