<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            {!! Form::label('redes', 'Redes') !!} @if (\Sentinel::getUser()->inRole('superuser')) <a class="ms-5" href='#' id="nuevaRed" data-bs-toggle="modal" data-bs-target="#modalNuevaRed"><small>Agregar <i class="fa fa-plus"></i></small></a> @endif
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-sitemap"></i></span>
                {!! Form::select('owner_id', $owners, null, ['id' => 'owner_id','class' => 'select2','placeholder' => 'Seleccione una Red..', 'style' => 'width:50%']) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3" id="grilla" style="display: none">
            {!! Form::label('grilla_completa', 'Grilla completa') !!}
            <div class="d-block">
                {!! Form::label('si', 'SÍ', ['class' => 'me-2']) !!}
                {!! Form::radio('grilla_completa', 'si', false) !!}&nbsp;&nbsp;
                {!! Form::label('no', 'No', ['class' => 'me-2']) !!}
                {!! Form::radio('grilla_completa', 'no', true) !!}
            </div>
        </div>
    </div>
</div>

<div class="mb-3">
    {!! Form::label('name', 'Nombre') !!}
    <div class="input-group">
        <span class="input-group-text"><i class="fa fa-keyboard-o"></i></span>
        {!! Form::text('name', null , ['class' => 'form-control', 'placeholder' => 'Nombre' ]) !!}
    </div>
</div>

<div class="mb-3">
    {!! Form::label('code', 'Código Identificador') !!}
    <div class="input-group">
        <span class="input-group-text"><i class="fa fa-key"></i></span>
        @if(isset($atm->id))
            {!! Form::text('code', null , ['class' => 'form-control', 'placeholder' => 'Código' ]) !!}
        @else
            {!! Form::text('code', $atm_code , ['class' => 'form-control', 'placeholder' => 'Código','readonly'=>true]) !!}
        @endif
    </div>
</div>

<div class="mb-3">
    {!! Form::label('public_key', 'Clave Pública') !!}
    <div class="input-group mb-2">
        <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
        {!! Form::text('public_key', isset($public_key)? $public_key : null , ['class' => 'form-control key', 'readonly'=>'readonly', 'id' => 'public_key', 'placeholder' => 'clave' ]) !!}
    </div>
    {!! Form::button('Nueva clave', ['class' => 'btn btn-warning btn-generate-key']) !!}
</div>

<div class="mb-3">
    {!! Form::label('private_key', 'Clave Privada') !!}
    <div class="input-group mb-2">
        <span class="input-group-text"><i class="fa fa-lock"></i></span>
        {!! Form::text('private_key', isset($private_key) ? $private_key : null , ['class' => 'form-control key', 'readonly'=>'readonly', 'id' => 'private_key', 'placeholder' => 'clave' ]) !!}
    </div>
    {!! Form::button('Nueva Clave', ['class' => 'btn btn-warning btn-generate-key']) !!}
</div> 

@if(isset($atm->id))
    {!! Form::hidden('id',$atm->id, ['id' => 'id']) !!}
@endif


