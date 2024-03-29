<!-- Modal -->
<div id="modalNuevaSucursal" class="modal modal-large fade modal-xl" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Nueva Sucursal <label class="idTransaccion"></label></h4>
            </div>
            {!! Form::open(['route' => ['owner.branches.store',0] , 'method' => 'POST', 'role' => 'form','id' => 'nuevaSucursal-form']) !!}
            <div class="modal-body">
                <div class="box-body">
                    @include('partials._messages')
                    <div class="row">
                        <div class="col-md-6">
                            @include('branches.partials.modal_fields_new')
                        </div>

                        <div class="col-md-6">
                            @include('branches.partials.modal_maps_zona')
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary has-spinner" id="btnGuardarSucursal"><span class="spinner"><i class="fa fa-circle-o-notch fa-spin"></i></span> Guardar</button>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>
<style type="text/css">
    /*se agranda el modal para poder cargar el map*/
    @media screen and (min-width: 1200px){
        .modal-large>.modal-dialog{
            width: 1200px;
        }
    }
    #modalNuevaSucursal {
    overflow: scroll;
}       
</style>
{{-- modal end --}}

{{-- Scripts --}}
{{-- @section('page_scripts')
    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
@endsection --}}