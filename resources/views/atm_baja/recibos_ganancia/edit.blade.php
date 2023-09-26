@extends('app')

@section('title')
BAJA | Modificar Recibo de ganancia
@endsection
@section('content')

    <section class="content-header">
        <h1>
            GESTIÓN JUDICIAL |
            <small>Modificar Recibo de ganancia</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Gestor de terminales</a></li>
            <li><a href="#">Baja</a></li>
            <li><a href="#">Recibo de ganancia</a></li>
            <li class="active">Modificar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">
                        @include('partials._flashes')
                        @include('partials._messages')
                        {!! Form::model($recibo, ['route' => ['recibos_ganancia.update', $recibo->id ] , 'method' => 'PUT', 'id' => 'editarRecibo-form','enctype'=>'multipart/form-data']) !!}
                            <div class="form-row">
                                <div class="form-group col-md-6 borderd-campaing">
                                    <div class="title"><h4>&nbsp;<i class="fa fa-file-text-o"></i>&nbsp; RECIBO DE GANANCIA &nbsp;</h4></div>
                                    <div class="container-campaing">
                            
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                {!! Form::label('numero', 'Número interno') !!}
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </div>
                                                    {!! Form::text('numero', null , ['class' => 'form-control','readonly'=>'readonly' ]) !!}
                                                 </div>
                                            </div>
                                        
                                            <div class="form-group col-md-6">
                                                {!! Form::label('fecha_finiquito', 'Fecha de finiquito:') !!}
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    {!! Form::text('fecha_finiquito', null , ['class' => 'form-control', 'data-inputmask' => "'alias': 'dd/mm/yyyy'", 'data-mask' => 'dd/mm/yyyy' ]) !!}
                                                </div>
                                            </div>
                            
                                            <div class="form-group col-md-6">
                                                {!! Form::label('importe_cobrado', 'Importe Cobrado:') !!}
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </div>
                                                    {!! Form::text('importe_cobrado', null , ['class' => 'form-control', 'placeholder' => 'Gs.' ]) !!}
                                                 </div>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                {!! Form::label('capital', 'Capital:') !!}
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </div>
                                                    {!! Form::text('capital', null , ['class' => 'form-control', 'placeholder' => 'Gs.' ]) !!}
                                                 </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                {!! Form::label('interes', 'Porcentaje de interes:') !!}
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </div>
                                                    {!! Form::text('interes', null , ['class' => 'form-control', 'placeholder' => '%.' ]) !!}
                                                 </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                {!! Form::label('gestionado', 'Gestionado por:') !!}
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </div>
                                                    {!! Form::text('gestionado', null , ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del encargado.' ]) !!}
                                                 </div>
                                            </div>
                            
                                            <div class="form-group col-md-6">
                                                {!! Form::label('imagen', 'Adjuntar comprobante:') !!}
                                                <input type="file" class="filepond"  name="imagen" data-max-file-size="3MB" data-max-files="3">
                                                @if(isset($recibo->imagen) && $recibo->imagen != '')
                                                <small style="">Nota: cargar un archivo multimedia solo en caso de querer modificar el actual</small>
                                                @endif
                                            </div>
                                           
                            
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    {!! Form::label('comentario', 'Comentario:') !!}
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-comments"></i>
                                                        </div>
                                                        <textarea rows="10" cols="30" class="form-control" id="comentario" name="comentario" placeholder="Agregar un comentario" value="">{{$recibo->comentario}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                                @include('atm_baja.info')
                            </div>      

                            <div class="clearfix"></div>                            
                            <div class="form-row">
                                <a class="btn btn-default"  href="{{ url('atm/new/'.$grupo->id.'/'.$grupo->id.'/recibo_ganancia') }}" role="button">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script src="/js/filepond/filepond-plugin-image-preview.js"></script>
<script src="/js/filepond/filepond-plugin-image-exif-orientation.js"></script>
<script src="/js/filepond/filepond-plugin-file-validate-size.js"></script>
<script src="/js/filepond/filepond-plugin-file-encode.js"></script>
<script src="/js/filepond/filepond.min.js"></script>
<script src="/js/filepond/filepond.jquery.js"></script>

<script src="/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/bower_components/admin-lte/plugins/datepicker/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
<script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>

<link rel="stylesheet" href="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css">
<script src="/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
         //separador de miles - Capital de la poliza
         var separadorPol = document.getElementById('importe_cobrado');

        separadorPol.addEventListener('input', (e) => {
            var entradaPol = e.target.value.split(','),
            parteEnteraPol = entradaPol[0].replace(/\./g, ''),
            salidaPol = parteEnteraPol.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            e.target.value = salidaPol;
        }, false);

        var importe_cobrado = document.getElementById('importe_cobrado').value;
        entryPoliza = importe_cobrado.split(',');
        partEnteraPoliza = entryPoliza[0].replace(/\./g, ''),
        outputPoliza = partEnteraPoliza.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        //insertar importe_cobrado con separadores de miles
        document.getElementById("importe_cobrado").value = outputPoliza;

         //separador de miles - Capital de la poliza
         var separadorPol = document.getElementById('capital');

        separadorPol.addEventListener('input', (e) => {
            var entradaPol = e.target.value.split(','),
            parteEnteraPol = entradaPol[0].replace(/\./g, ''),
            salidaPol = parteEnteraPol.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            e.target.value = salidaPol;
        }, false);

        var capital = document.getElementById('capital').value;
        entryPoliza = capital.split(',');
        partEnteraPoliza = entryPoliza[0].replace(/\./g, ''),
        outputPoliza = partEnteraPoliza.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        //insertar capital con separadores de miles
        document.getElementById("capital").value = outputPoliza;
    });
</script> 
<script type="text/javascript">
    $('.select2').select2();
    $('#listadoAtms').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "displayLength": 3,
        "language":{"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
        "bInfo" : false


    });
    $('#fecha_finiquito').datepicker({
        language: 'es',
        format: 'dd/mm/yyyy',
    });
    //validacion formulario 
    $('#editarRecibo-form').validate({
        rules: {
            "numero": {
                required: true,
            },
            "fecha_finiquito": {
                required: true,
            },
            "gestionado": {
                required: true,
            },
            "importe_cobrado": {
                required: true,
            },
            "capital": {
                required: true,
            },
            "interes": {
                required: true,
            },
        },
        messages: {
            "numero": {
                required: "Ingrese una númeracion interna.",
            },
            "fecha_finiquito": {
                required: "Seleccione una fecha de finiquito.",
            },
            "gestionado": {
                required: "Ingrese el nombre del encargado.",
            },
            "importe_cobrado": {
                required: "Ingrese el importe cobrado.",
            },
            "capital": {
                required: "Ingrese el importe del capital.",
            },
            "interes": {
                required: "Ingrese porcentaje de interes.",
            },
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }
    });

    // Turn input element into a pond
    FilePond.registerPlugin(
            FilePondPluginFileEncode,
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize
        );

        $('.filepond').filepond({
            allowMultiple: false,
            imagePreviewHeight: 210,
        });
   
</script>
@endsection

@section('aditional_css')
    <link href="/bower_components/admin-lte/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <style>
        label span {
            font-size: 1rem;
        }

        label.error {
            color: red;
            font-size: 1rem;
            display: block;
            margin-top: 5px;
        }

        input.error {
            border: 1px dashed red;
            font-weight: 300;
            color: red;
        }

        .borderd-campaing {
            border: 1px solid #a1a1ac;
            border-radius: 4px;
            height: 550px;
            margin-top: 20px;
            position: relative;
        }

        .borderd-campaing .title {
            margin: -25px 0 0 50px;
            background: #fff;
            padding: 3px;
            display: inline-block;
            font-weight: bold;
            position: absolute;
        }

        .borderd-campaing .campaing {
            padding: 10px;
        }
        .container-campaing {
            margin-top: 20px;
        }

        .borderd-content {
            border: 1px solid #a1a1ac;
            border-radius: 4px;
            height: 180px;
            margin-top: 20px;
            position: relative;
        }
        .borderd-content .title {
            margin: -25px 0 0 50px;
            background: #fff;
            padding: 3px;
            display: inline-block;
            font-weight: bold;
            position: absolute;
        }

        /* INFO */
        .borderd-info {
            border: 1px solid #a1a1ac;
            border-radius: 4px;
            height: 550px;
            margin-top: 20px;
            position: relative;
            /* height: auto; */
        }

        .borderd-info .title {
            margin: -25px 0 0 50px;
            background: #fff;
            padding: 3px;
            display: inline-block;
            font-weight: bold;
            position: absolute;
        }
        .borderd-info .campaing {
            padding: 10px;
        }
        .container-info {
            margin-top: 20px;
        }

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