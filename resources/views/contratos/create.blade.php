@extends('app')

@section('title')
    Contratos
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Contratos
            <small>Agregar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Contratos</a></li>
            <li class="active">Agregar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
           
                    <div class="container-fluid">
                    @include('partials._flashes')
                    @include('partials._messages')
                    {!! Form::open(['route' => 'contracts.store' , 'method' => 'POST', 'role' => 'form', 'id' => 'nuevoContrato-form']) !!}

                    <div class="p-1">
                        <div class="row mb-3">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    {!! Form::label('number', 'Número de Contrato', ['class' => 'form-label']) !!}
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-file"></i></span>
                                        {!! Form::text('number', isset($contrato) ? $contrato->number : null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de contrato.', 'id' => 'number_contract']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    {!! Form::label('group_id', 'Grupo', ['class' => 'form-label']) !!}
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-sitemap"></i></span>
                                        {!! Form::select('group_id', $groups, null, ['id' => 'group_id', 'class' => 'select2 object-type', 'placeholder' => 'Seleccione un grupo...']) !!}
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    {!! Form::label('contract_type', 'Tipo de Contrato', ['class' => 'form-label']) !!}
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-filter"></i></span>
                                        {!! Form::select('contract_type', $contract_types, null, ['id' => 'contract_type', 'class' => 'select2', 'placeholder' => 'Seleccione un tipo de contrato...']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    {!! Form::label('credit_limit', 'Línea de Crédito', ['class' => 'form-label']) !!}
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-money"></i></span>
                                        {!! Form::text('credit_limit', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la línea de crédito', 'id' => 'credit_limit_contract']) !!}
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    {!! Form::label('status', 'Estado', ['class' => 'form-label']) !!}
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-check-square-o"></i></span>
                                        {!! Form::select('status', ['1' => 'RECEPCIONADO', '2' => 'ACTIVO', '3' => 'INACTIVO', '4' => 'VENCIDO'], null, ['class' => 'form-control', 'id' => 'status_contract']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="reservationtime" class="form-label">Rango de vigencia:</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                        <input name="reservationtime" type="text" id="reservationtime" class="form-control" value="{{$reservationtime_contract ?? ''}}" placeholder="__/__/____" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                @if((\Sentinel::getUser()->inRole('contract.check.receptiondate')) || (\Sentinel::getUser()->inRole('superuser')))
                                    @if(isset($contrato))
                                        @if($contrato->signature_date !== null)
                                            <div class="mb-3 form-check">
                                                {!! Form::checkbox('reception_date', 1, true) !!}
                                                {!! Form::label('reception_date', 'Documentos recepcionados', ['class' => 'form-check-label']) !!}
                                            </div>
                                        @else
                                            <div class="mb-3 form-check">
                                                {!! Form::checkbox('reception_date', 1, false) !!}
                                                {!! Form::label('reception_date', 'Documentos recepcionados', ['class' => 'form-check-label']) !!}
                                            </div>
                                        @endif
                                    @else
                                        <div class="mb-3 form-check">
                                            {!! Form::checkbox('reception_date', 1, false) !!}
                                            {!! Form::label('reception_date', 'Documentos recepcionados', ['class' => 'form-check-label']) !!}
                                        </div>
                                    @endif
                                @endif
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    {!! Form::label('observation', 'Observaciones', ['class' => 'form-label']) !!}
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-comments"></i></span>
                                        <textarea rows="4" cols="30" class="form-control" id="observation" name="observation" placeholder="Agregar un comentario" value=""></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-secondary" href="{{ route('contracts.index') }}" role="button">Cancelar</a>

                    {!! Form::close() !!}
                </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<!-- date-range-picker -->
<link href="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<script src="/bower_components/admin-lte/plugins/daterangepicker/moment.min.js"></script>
<script src="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
<script type="text/javascript">
    $('.select2').select2();

    //validacion formulario 
    $('#nuevoContrato-form').validate({
        rules: {
            "number": {
                required: true,
            },
            "group_id": {
                required: true,
            },
            "contract_type": {
                required: true,
            },
            "credit_limit": {
                required: true,
            },
            "reservationtime": {
                required: true,
            },
        },
        messages: {
            "number": {
                required: "Ingrese el numero de contrato.",
            },
            "group_id": {
                required: "Seleccione el grupo.",
            },
            "contract_type": {
                required: "Seleccione el tipo de contrato.",
            },
            "credit_limit": {
                required: "Ingrese la linea de crédito.",
            },
            "reservationtime": {
                required: "Ingrese el rango de vigencia.",
            },
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }
    });

    
    //separador de miles - limite de credito | Contratos
    var separador = document.getElementById('credit_limit_contract');
    separador.addEventListener('input', (e) => {
        var entrada = e.target.value.split(','),
        parteEntera = entrada[0].replace(/\./g, ''),
        salida = parteEntera.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        e.target.value = salida;
    }, true);

    var credit_limit_contract = document.getElementById('credit_limit_contract').value;
    entry = credit_limit_contract.split(',');
    partEntera = entry[0].replace(/\./g, ''),
    output = partEntera.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    console.log(output);
    //insertar valor con separadores de miles
    document.getElementById("credit_limit_contract").value = output;

    //Date range picker
    $('#reservationtime').daterangepicker({
        opens: 'right',
        locale: {
            applyLabel: 'Aplicar',
            fromLabel: 'Desde',
            toLabel: 'Hasta',
            customRangeLabel: 'Rango Personalizado',
            daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie','Sab'],
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            firstDay: 1
        },
        format: 'DD/MM/YYYY',
        startDate: moment(),
        endDate: moment().add(12,'months'),
    });
  
</script>
@endsection
@section('aditional_css')
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <style>
        .dark .box  {
           background-color: #191E3A;
        }
        .dark .box-body  {
           background-color: #191E3A;
        }

        .dark .box-header {
            background-color: #191E3A;
        }

        .dark .box-footer {
            background-color: #191E3A;
		}
    </style>
@endsection