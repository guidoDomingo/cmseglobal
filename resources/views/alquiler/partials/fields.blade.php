<div class="form-group">
    {!! Form::label('grupo', 'Cliente', ['class' => 'col-2']) !!} <a href='#' id="nuevoGrupo" data-bs-toggle="modal" data-bs-target="#modalNuevoGrupo"><small>Agregar <i class="fa fa-plus"></i></small></a>
    {!! Form::select('group_id', $grupos, null, ['id' => 'group_id', 'class' => 'form-control select2','placeholder' => 'Seleccione una opción']) !!}
</div>

<div class="form-group">
    {!! Form::checkbox('checkbox', 'checked', false, ['id' => 'cbox1']) !!} <span style="font-weight:bold;">Este Cliente es prestador de servicios</span> 
</div>

<div class="form-group">
    {!! Form::label('serialnumber', 'Codigo de maquina') !!}
    {!! Form::select('serialnumber', $seriales, null, ['id' => 'serial', 'class' => 'form-control select2', 'name' => 'serialnumber[]', 'multiple' => 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::label('amount', 'Importe') !!}
    {!! Form::text('amount', null, ['id' => 'amount','class' => 'form-control', 'placeholder' => 'Ingresar el importe' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('num_cuota', 'Cantidad de Cuotas') !!}
    {!! Form::text('num_cuota', null, ['id' => 'num_cuota','class' => 'form-control', 'placeholder' => 'Ingresar el numero de cuota' ]) !!}
    {!! Form::label('cant_cuotas', 'Monto total: ', ['id' => 'cant_cuotas', 'name' => 'cant_cuotas']) !!}
</div>

<a class="btn btn-default" href="{{ route('alquiler.index') }}" role="button">Cancelar</a>
