<!-- Modal -->
<div id="modalNuevaRed" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nueva Red <label class="idTransaccion"></label></h4>
            </div>
            {!! Form::open(['route' => 'owner.store' , 'method' => 'POST', 'role' => 'form', 'id'=>'nuevaRed-form']) !!}
            <div class="modal-body">
                <div class="box-body">
                    @include('partials._flashes')
                    @include('partials._messages')
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null , ['class' => 'form-control', 'placeholder' => 'Nombre' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('app_last_version', 'App Last Version') !!}
                        {!! Form::text('app_last_version', null , ['class' => 'form-control', 'placeholder' => 'Última Version de la Aplicación' ]) !!}
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