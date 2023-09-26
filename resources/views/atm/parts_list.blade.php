@extends('app')
@section('title')
Configuración de Partes
@endsection
@section('content')
<section class="content-header">
  <h1>
    Configuración de Partes
    <small>Listado</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('atm.index') }}">Atms</a></li>
    <li><a href="#">Configuración de Partes</a></li>
    <li class="active">lista</li>
  </ol>
</section>
<section class="content">
  @include('partials._flashes')
<div class="">
    <div class="box-header">
        <h3 class="box-title">
        </h3>
        <div class="box-tools">
            <div class="input-group" style="width:150px;">
            {!! Form::model(Request::only(['name']),['route' => ['atm.parts', $atmId], 'method' => 'GET', 'class' => 'form-horizontal', 'role' => 'search']) !!}
            {!! Form::text('name' ,null , ['class' => 'form-control input-sm pull-right', 'placeholder' => 'Nombre', 'autocomplete' => 'off' ]) !!}
            {!! Form::close() !!}
            </div>
        </div>
    </div>
    {!! Form::open(['route' => ['atm.parts_update',$atmId] , 'method' => 'POST', 'role' => 'form', 'id'=>'parts-form']) !!}
    <div class="box-body  no-padding">
        <div class="row">
            <div class="col-xs-12">
                <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                    <thead>
                        <tr>
                        <th style="width:10px">#</th>
                        <th>Parte</th>
                        <th>Nombre</th>
                        <th style="width:220px">Denominación</th>
                        <th style="width:220px">Cant. Mínima</th>
                        <th style="width:220px">Cant. Alarma</th>
                        <th style="width:220px">Cant. Máxima</th>
                        <th style="width:50px">Activo</th>
                        </tr>
                    </thead>
                    {{-- */$index = 0/* --}}
                    @foreach($parts as $part)
                        <tr index="{{ $index }}" data-id="{{ $part->id  }}">
                            <td> {!! $part->id !!}. </td>
                            <td> {!! $part->tipo_partes !!} </td>
                            <td> {!! $part->nombre_parte !!} </td>
                            <td> {!! Form::select('denominacion['.$index.']', [50 => '50', 100 => '100', 500 => '500', 1000 => '1000', 2000 => '2.000', 5000 => '5.000', 10000 => '10.000', 20000 => '20.000', 50000 => '50.000', 100000 => '100.000'], $part->denominacion, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'denominacion']) !!}</td>
                            <td> {!! Form::text('cantidad_minima['.$index.']', $part->cantidad_minima, ['class' => 'form-control autoNumeric', 'placeholder' => '']) !!} </td>
                            <td> {!! Form::text('cantidad_alarma['.$index.']', $part->cantidad_alarma, ['class' => 'form-control autoNumeric', 'placeholder' => '']) !!} </td>
                            <td> {!! Form::text('cantidad_maxima['.$index.']', $part->cantidad_maxima, ['class' => 'form-control autoNumeric', 'placeholder' => '']) !!} 
                            {!! Form::hidden('id['.$index.']', $part->id, []) !!}
                            </td>
                            <td> {!! Form::checkbox('activo['.$index.']', $part->activo, $part->activo, ['class' => 'formCheck', 'placeholder' => '']) !!} </td>
                        </tr>
                        {{-- */$index++/* --}}
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="row">
            <div class="col-sm-5">
                <div class="dataTables_info" role="status" aria-live="polite">{{ $parts->total() }}
                    registros en total
                </div>
            </div>
            <div class="col-sm-12">
                <div class=" ">
                    {!! $parts->appends(Request::only(['name']))->links('paginator') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <a class="btn btn-default" href="{{ route('atm.index')}}" role="button">Cancelar</a>
        <button type="submit" class="btn btn-primary pull-right">Guardar</button>
    </div>
    {!! Form::close() !!}
</div>
</section>

@endsection
@section('page_scripts')
    <!-- DATA TABLE-->

    <script src="{{ asset('src/plugins/src/table/datatable/datatables.js') }}"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10
        });
    </script>

 <!-- DATA TABLE - FIN -->
    <script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/bower_components/admin-lte/plugins/autoNumeric/autoNumeric.js"></script>
    <script src="/bower_components/admin-lte/plugins/iCheck/icheck.min.js"></script>
    <script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
<script>
    $(function(){
        var opciones = {aSep: '.', aDec: ',', mDec: '0', vMin: '0'};

        $('.select2').select2();
        $('input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-green',
        });

        $('#parts-form').validate({
            errorPlacement: function (error, element) {
                error.appendTo(element.parent());
            },
            submitHandler: function(form){
                $('.autoNumeric').each(function(){
                    $(this).val($(this).autoNumeric('get'));
                });

                form.submit();
            }
        });

        $('.autoNumeric').autoNumeric('init', opciones);

        $('input[name^="denominacion"').each(function(index){
           $('input[name="denominacion['+index+']"]').rules('add',{
                required: true,
                messages: {
                    required: "Ingrese la denominación",
                }
            }); 
        });

        $('input[name^="cantidad_minima"').each(function(index){
           $('input[name="cantidad_minima['+index+']"]').rules('add',{
                required: true,
                messages: {
                    required: "Ingrese la cant. mínima",
                }
            }); 
        });

        $('input[name^="cantidad_alarma"').each(function(index){
           $('input[name="cantidad_alarma['+index+']"]').rules('add',{
                required: true,
                messages: {
                    required: "Ingrese la cant. alarma",
                }
            }); 
        });

        $('input[name^="cantidad_maxima"').each(function(index){
           $('input[name="cantidad_maxima['+index+']"]').rules('add',{
                required: true,
                messages: {
                    required: "Ingrese la canti. máxima",
                }
            }); 
        });

        $(document).on('ifChecked','.formCheck',function(){
            $(this).val(this.checked);
            console.log($(this).val());
        });
    });
</script>
@endsection
@section('aditional_css')
    <link href="{{ asset('src/assets/css/light/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/elements/custom-pagination.css') }}" rel="stylesheet" type="text/css" />
    <!-- DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->
    <link href="/bower_components/admin-lte/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
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
        .paginator li>a {
            border: 1px solid white;
        }
        .paginator li>a {
            background-color: #060818;
        }
    </style>
@endsection
