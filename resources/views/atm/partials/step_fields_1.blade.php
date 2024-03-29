<div class="mb-3">
    {!! Form::label('redes', 'Redes', ['class' => 'form-label col-2']) !!} <a href='#' id="nuevaRed" data-bs-toggle="modal" data-bs-target="#modalNuevaRed"><small>Agregar <i class="fa fa-plus"></i></small></a>
    {!! Form::select('owner_id', $owners, null, ['id' => 'owner_id','class' => 'form-control select2']) !!}
</div>
<div class="mb-3">
    {!! Form::label('name', 'Nombre', ['class' => 'form-label']) !!}
    {!! Form::text('name', null , ['class' => 'form-control', 'placeholder' => 'Nombre' ]) !!}
</div>
<div class="mb-3">
    {!! Form::label('code', 'Código Identificador', ['class' => 'form-label']) !!}
    @if(isset($atm->id))
    {!! Form::text('code', null , ['class' => 'form-control', 'placeholder' => 'Código' ]) !!}
    @else
    {!! Form::text('code', $atm_code , ['class' => 'form-control', 'placeholder' => 'Código','readonly'=>true]) !!}
    @endif
</div>
<div class="mb-3">
    {!! Form::label('public_key', 'Clave Pública', ['class' => 'form-label']) !!}
    {!! Form::text('public_key', isset($public_key)? $public_key : null , ['class' => 'form-control key', 'readonly'=>'readonly', 'id' => 'public_key', 'placeholder' => 'clave' ]) !!}
    {!! Form::button('Nueva clave', ['class' => 'btn btn-warning btn-generate-key']) !!}
</div>
<div class="mb-3">
    {!! Form::label('private_key', 'Clave Privada', ['class' => 'form-label']) !!}
    {!! Form::text('private_key', isset($private_key) ? $private_key : null , ['class' => 'form-control key', 'readonly'=>'readonly', 'id' => 'private_key', 'placeholder' => 'clave' ]) !!}
    {!! Form::button('Nueva Clave', ['class' => 'btn btn-warning btn-generate-key']) !!}
</div>
@if(isset($atm->id))
    {!! Form::hidden('id', $atm->id, ['id' => 'id']) !!}
@endif

@section('page_scripts')
    @include('atm.partials.js._js_scripts')
    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
@endsection
