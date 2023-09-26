{{-- <div class="mb-3">
    {!! Form::label('app', 'Aplicación') !!}
        <div class="input-group">
            <div class="input-group-text">
                <i class="fa fa-cubes"></i>
            </div>
            @if(isset($aplicaciones))
                {!! Form::select('application_id', $aplicaciones, $app_id, ['reasignar' => false, 'class' => 'form-control select2','placeholder' => 'Seleccione una aplicacion', 'style' => 'width:100%', 'id' => 'aplicacionId']) !!}
            @else
                {!! Form::select('application_id', [], null, ['reasignar' => false, 'class' => 'form-control select2','placeholder' => 'Seleccione una aplicacion', 'style' => 'width:100%', 'id' => 'aplicacionId']) !!}
            @endif
        </div>
    {!! Form::hidden('owner_id') !!}
    {!! Form::hidden('atm_parts',$atm_parts) !!}
    {!! Form::hidden('atm_id',null, ['id' => 'atmId']) !!}
</div> --}}
{{-- @if($atm_parts <= 0)
    {!! Form::hidden('reasignar',false, ['id' => 'reasignar']) !!}
    <div class="mb-3">
        {!! Form::label('tipo_dispositivo', 'Tipo Dispositivo') !!}
        <div class="input-group">
            <div class="input-group-text">
                <i class="fa fa-desktop"></i>
            </div>
            {!! Form::select('tipo_dispositivo', [ '1 | 3' => 'Reciclador - 3 cassettes', '2 | 4' => 'Gran Pagador - 4 cassettes','2 | 6' => 'Gran Pagador - 6 cassettes', '3 | 0' => 'Miniterminal - Solo Box'], null, ['reasignar' => false, 'class' => 'form-control select2','placeholder' => 'Seleccione un dispositivo', 'style' => 'width:100%', 'id' => 'tipoDispositivo']) !!}
        </div>
    </div>
@else
    {!! Form::hidden('reasignar',true, ['id' => 'reasignar']) !!}
@endif --}}


{{-- 
<div class="mb-3">
	{!! Form::label('user_id', 'Responsable') !!}<a style="margin-left: 8em" href='#' id="nuevoTipoUsuario" data-bs-toggle="modal" data-bs-target="#modalNuevoUsuario"><small>Agregar <i class="fa fa-plus"></i></small></a>
    <div class="input-group">
        <div class="input-group-text">
            <i class="fa fa-user"></i>
        </div>  
        {!! Form::select('user_id',$users ,$user_id , ['id' => 'user_id','class' => 'form-control select2', 'style' => 'width:100%']) !!}

    </div> 
</div> --}}


<div class="col-md-12">
    <div class="mb-3">
        <div class="row">
            <div class="col-md-12 borderd-campaing mb-3">
                <div class="text-center"><h4><strong>Cliente | Detalle</strong></h4></div>
                
                <div class="col-md-4 mb-3">
                    {!! Form::label('ruc', 'Ruc') !!}
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        {!! Form::text('ruc', isset($grupo->ruc)? $grupo->ruc: null , ['class' => 'form-control', 'readonly' ]) !!}
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    {!! Form::label('description', 'Razón Social') !!}
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        {!! Form::text('description', isset($grupo->description)? $grupo->description: null , ['class' => 'form-control', 'readonly' ]) !!}
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    {!! Form::label('telefono', 'Telefono') !!}
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        {!! Form::text('telefono',isset($grupo->telefono)? $grupo->telefono: null , ['class' => 'form-control', 'readonly' ]) !!}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    {!! Form::label('remote_access', 'Acceso Remoto') !!}
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        {!! Form::text('remote_access',isset($network->remote_access)? $network->remote_access: null , ['class' => 'form-control', 'readonly' ]) !!}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    {!! Form::label('correo', 'Correo') !!}
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        {!! Form::text('correo',isset($grupo_caracteristica->correo)? $grupo_caracteristica->correo: null , ['class' => 'form-control', 'readonly' ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<div class="row">
    <div class="col-md-6">
        <div class="col-md-12">
            <div class="mb-3">
                {!! Form::label('app', 'Aplicación') !!}
                    <div class="input-group">
                        <div class="input-group-text"><i class="fa fa-cubes"></i></div>
                        @if(isset($aplicaciones))
                            {!! Form::select('application_id', $aplicaciones, $app_id, ['reasignar' => false, 'class' => 'select2','placeholder' => 'Seleccione una aplicacion', 'style' => 'width:50%', 'id' => 'aplicacionId']) !!}
                        @else
                            {!! Form::select('application_id', [], null, ['reasignar' => false, 'class' => 'select2','placeholder' => 'Seleccione una aplicacion', 'style' => 'width:50%', 'id' => 'aplicacionId']) !!}
                        @endif
                    </div>
                {!! Form::hidden('owner_id') !!}
                {!! Form::hidden('atm_parts',$atm_parts) !!}
                {!! Form::hidden('atm_id',null, ['id' => 'atmId']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                @if($atm_parts <= 0)
                    {!! Form::hidden('reasignar',false, ['id' => 'reasignar']) !!}
                    <div class="mb-3">
                        {!! Form::label('tipo_dispositivo', 'Tipo Dispositivo') !!}
                        <div class="input-group">
                            <div class="input-group-text">
                                <i class="fa fa-desktop"></i>
                            </div>
                            {!! Form::select('tipo_dispositivo', [ '1 | 3' => 'Reciclador - 3 cassettes', '2 | 4' => 'Gran Pagador - 4 cassettes','2 | 6' => 'Gran Pagador - 6 cassettes', '3 | 0' => 'Miniterminal - Solo Box'], null, ['reasignar' => false, 'class' => 'select2','placeholder' => 'Seleccione un dispositivo', 'style' => 'width:50%', 'id' => 'tipoDispositivo']) !!}
                        </div>
                    </div>
                @else
                    {!! Form::hidden('reasignar',true, ['id' => 'reasignar']) !!}
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                {!! Form::label('user_id', 'Responsable') !!}<a style="margin-left: 8em" href='#' id="nuevoTipoUsuario" data-bs-toggle="modal" data-bs-target="#modalNuevoUsuario"><small>Agregar <i class="fa fa-plus"></i></small></a>
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-user"></i></div>  
                    {!! Form::select('user_id',$users ,$user_id , ['id' => 'user_id','class' => 'select2']) !!}
                </div> 
            </div>
        </div>
    </div>  
    
    <div class="col-md-6">
        @if ($posbox_status == 'No')
            <div class="col-md-12">
                <div class="mb-3">
                    <div class="mb-3 col-md-10 borderd-campaing" style="margin-left: 20PX;" >
                        <div class="" style="margin-left: 140PX;""><h4>&nbsp; <b> POS BOX </b>&nbsp;</h4></div>
                
                        <div class="mb-3 col-md-6" style="margin-top: 20PX;">
                            @if (\Sentinel::getUser()->hasAccess('pos_box_edit'))
                                <div class="mb-3">
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_box', 'Si', False) !!}
                                        {!! Form::label('pos_box', 'Activo') !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3 col-md-6" style="margin-top: 20PX;">
                            {!! Form::label('pos_turn_1', 'Horario de atención') !!}
                            @if (\Sentinel::getUser()->hasAccess('pos_box_edit'))
                                <div class="mb-3" id="horarios_atencion">
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_turn_1', 'Si', false) !!}
                                        {!! Form::label('pos_turn_1', '09:00 Hs - 12:00 Hs') !!}
                                    </div>
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_turn_2', 'Si', false) !!}
                                        {!! Form::label('pos_turn_2', '13:00 Hs - 18:00 Hs') !!}
                                    </div>
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_turn_3', 'Si', false) !!}
                                        {!! Form::label('pos_turn_3', '18:00 Hs - 23:59 Hs') !!}
                                    </div>
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_turn_4', 'Si', false) !!}
                                        {!! Form::label('pos_turn_4', '24 Hs') !!}
                                    </div>        
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::hidden('pos_box_edit', false) !!}
        @else
            <div class="col-md-12">
                <div class="mb-3">
                    <div class="mb-3 col-md-10 borderd-campaing" style="margin-left: 20PX;" >
                        <div class="title" style="margin-left: 140PX;""><h4>&nbsp;<b>POS BOX</b> &nbsp;</h4></div>

                        <div class="mb-3 col-md-6" style="margin-top: 20PX;">
                            @if (\Sentinel::getUser()->hasAccess('pos_box_edit'))
                                @if ($posbox_status == 'Si')
                                    <div class="mb-3">
                                        <div class="form-check">
                                            {!! Form::checkbox('pos_box', 'Si', true) !!}
                                            {!! Form::label('pos_box', 'Activo') !!}
                                        </div>
                                    </div>                                    
                                @endif
                            @endif
                        </div>

                        <div class="mb-3 col-md-6" style="margin-top: 20PX;">
                            {!! Form::label('pos_turn_1', 'Horario de atención') !!}
                            <div class="mb-3" id="horarios_atencion">
                                
                                @if ($turno_1 == 'Si')
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_turn_1', 'Si', true) !!}
                                        {!! Form::label('pos_turn_1', '09:00 Hs - 12:00 Hs') !!}
                                    </div>
                                @else
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_turn_1', 'Si', false) !!}
                                        {!! Form::label('pos_turn_1', '09:00 Hs - 12:00 Hs') !!}
                                    </div>
                                @endif

                                @if ($turno_2 == 'Si')
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_turn_2', 'Si', true) !!}
                                        {!! Form::label('pos_turn_2', '13:00 Hs - 18:00 Hs') !!}
                                    </div>
                                @else
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_turn_2', 'Si', false) !!}
                                        {!! Form::label('pos_turn_2', '13:00 Hs - 18:00 Hs') !!}
                                    </div>
                                @endif


                                @if ($turno_3 == 'Si')
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_turn_3', 'Si', true) !!}
                                        {!! Form::label('pos_turn_3', '18:00 Hs - 23:59 Hs') !!}
                                    </div>
                                @else
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_turn_3', 'Si', false) !!}
                                        {!! Form::label('pos_turn_3', '18:00 Hs - 23:59 Hs') !!}
                                    </div>
                                @endif

                                @if ($turno_4 == 'Si')
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_turn_4', 'Si', true) !!}
                                        {!! Form::label('pos_turn_4', '24 Hs') !!}
                                    </div>
                                @else
                                    <div class="form-check">
                                        {!! Form::checkbox('pos_turn_4', 'Si', false) !!}
                                        {!! Form::label('pos_turn_4', '24 Hs') !!}
                                    </div>
                                @endif
                                                
                            </div>
                        </div>

                    </div> 
                </div>
            </div>
            {!! Form::hidden('pos_box_edit', true) !!}
        @endif
    </div>
</div>