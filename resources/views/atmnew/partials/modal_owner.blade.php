<!-- Modal -->
<div class="modal fade" id="modalNuevaRed" tabindex="-1" aria-labelledby="modalNuevaRedLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNuevaRedLabel">Nueva Red <label class="idTransaccion"></label></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['route' => 'owner.store' , 'method' => 'POST', 'role' => 'form', 'id'=>'nuevaRed-form']) !!}
            <div class="modal-body">
                <div class="box-body">
                    @include('partials._flashes')
                    @include('partials._messages')
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-keyboard-o"></i>
                            </span>
                            {!! Form::text('name', null , ['class' => 'form-control', 'placeholder' => 'Nombre' , 'id' => 'name_red']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('app_last_version', 'App Last Version') !!}
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-object-group"></i>
                            </span>
                            {!! Form::text('app_last_version', null , ['class' => 'form-control', 'placeholder' => 'Última Version de la Aplicación' ]) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary has-spinner" id="load"><span class="spinner"><i class="fa fa-circle-o-notch fa-spin"></i></span> Guardar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{{-- modal end --}}
