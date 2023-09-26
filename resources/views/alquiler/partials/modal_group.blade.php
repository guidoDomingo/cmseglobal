<!-- Modal -->
<div id="modalNuevoGrupo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalNuevoGrupoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h4 class="modal-title">Nuevo Grupo <label></label></h4>
            </div>
            {!! Form::open(['route' => 'groups.store_venta', 'method' => 'POST', 'role' => 'form', 'id' => 'nuevogroup-form']) !!}
            <div class="modal-body">
                <div class="box-body">
                    @include('partials._flashes')
                    @include('partials._messages')
                    @include('groups.partials.fields')
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">
                    
                    Guardar
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<style type="text/css">
    /*se agranda el modal para poder cargar el map*/
    @media screen and (min-width: 1200px) {
        .modal-large>.modal-dialog {
            width: 1200px;
        }
    }

</style>
{{-- modal end --}}
