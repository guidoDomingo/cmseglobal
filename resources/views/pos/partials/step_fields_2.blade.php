<div class="mb-3">
    {!! Form::label('branch_id', 'Sucursal', ['class' => 'form-label']) !!}
    <a style="margin-left: 8em" href='#' id="nuevaSucursal" data-bs-toggle="modal" data-bs-target="#modalNuevaSucursal">
        <small>Agregar <i class="fa fa-plus"></i></small>
    </a>
    <div class="input-group mt-2">
        <span class="input-group-text">
            <i class="fa fa-sitemap"></i>
        </span> 
        {!! Form::select('branch_id', $branches, $selected_branch, ['class' => ' select2', 'placeholder' => 'Seleccione una Sucursal...', 'style' => 'width: 50%' ]) !!}
    </div>
</div>

@if (\Sentinel::getUser()->inRole('atms_v2.area_comercial'))
    <!-- Code for commercial area role -->
    @foreach (['pos_code' => 'Código de Sucursal', 'ondanet_code' => 'Código de deposito', 'description' => 'Nombre'] as $field => $label)
        <div class="mb-3">
            {!! Form::label($field, $label, ['class' => 'form-label']) !!}
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-keyboard-o"></i>
                </span>
                @if ($field === 'description')
                    {!! Form::text($field, null, ['class' => 'form-control', 'placeholder' => $label, 'id' => 'description_sucursal', 'readonly' => true]) !!}
                @else
                    {!! Form::text($field, ($field === 'pos_code') ? '001' : 5000, ['class' => 'form-control', 'placeholder' => $label, 'readonly' => true]) !!}
                @endif
            </div>
        </div>
    @endforeach
@else
    <!-- Code for non-commercial area role -->
    @foreach (['pos_code' => 'Código de Sucursal', 'ondanet_code' => 'Código de deposito', 'description' => 'Nombre'] as $field => $label)
        <div class="mb-3">
            {!! Form::label($field, $label, ['class' => 'form-label']) !!}
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-keyboard-o"></i>
                </span>
                @if ($field === 'description')
                    {!! Form::text($field, null, ['class' => 'form-control', 'placeholder' => $label]) !!}
                @else
                    {!! Form::text($field, ($field === 'pos_code') ? '001' : 5000, ['class' => 'form-control', 'placeholder' => $label]) !!}
                @endif
            </div>
        </div>
    @endforeach
@endif

@if(isset($deposits))
    <div class="mb-3">
        {!! Form::label('deposit_code', 'Depósito relacionado:', ['class' => 'form-label']) !!}
        @foreach($deposits as $deposit)
            <p>
                <strong>Código de depósito:</strong> {{ $deposit->deposit_code }}
                <strong>Código Ondanet:</strong> {{ $deposit->ondanet_code }}
                <strong>Creado por:</strong> {{  $deposit->createdBy->username }}  el {{ date('d/m/y H:i', strtotime($deposit->created_at)) }}
                @if($deposit->updatedBy != null)
                    <strong>Modificado por:</strong> {{  $deposit->updatedBy->username }}  el {{ date('d/m/y H:i', strtotime($deposit->updated_at)) }}
                @endif
            </p>
        @endforeach
    </div>
@endif

@if(isset($pointofsale) && $pointofsale->createdBy != null)
    @if(!empty($pointofsale))
        <div class="mb-3">
            {!! Form::label('created_by', 'Creado por:', ['class' => 'form-label']) !!}
            <p>{{  $pointofsale->createdBy->username }}  el {{ date('d/m/y H:i', strtotime($pointofsale->created_at)) }}</p>
        </div>
    @endif
@endif

@if(isset($pointofsale) && $pointofsale->updatedBy != null)
    @if(!empty($pointofsale))
        <div class="mb-3">
            {!! Form::label('updated_by', 'Modificado por:', ['class' => 'form-label']) !!}
            <p>{{  $pointofsale->updatedBy->username }}  el {{ date('d/m/y H:i', strtotime($pointofsale->updated_at)) }}</p>
        </div>
    @endif
@endif


