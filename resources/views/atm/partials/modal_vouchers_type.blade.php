<!-- Modal -->
<div id="modalNuevoTipo" class="modal fade modal-xl" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                <h4 class="modal-title">Asignar Tipo de Comprobante <label class="idTransaccion"></label></h4>
            </div>
                {!! Form::open(['route' => ['pointsofsale.vouchertypes.store', 0] , 'method' => 'POST', 'role' => 'form','id'=>'nuevoTipo-form']) !!}
            <div class="box-body">
                @include('partials._messages')
                @include('posvouchertypes.partials.modal_fields')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary has-spinner" id="btnGuardarTipo"><span class="spinner"><i class="fa fa-circle-o-notch fa-spin"></i></span> Guardar</button>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>
{{-- modal end --}}