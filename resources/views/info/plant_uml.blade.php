@extends('app')

@section('title')
Generación de diagramas UML
@endsection
@section('content')
<style>
    input:invalid+span:after {
        content: '✖';
        padding-left: 5px;
    }

    input:valid+span:after {
        content: '✓';
        padding-left: 5px;
    }

    textarea {}


    tr {
        height: 15px;
    }

    .points {
        max-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<?php
//Variables que se usan en todo el blade.
$records = $data['lists']['records'];

?>

<section class="content-header">

    <div class="box box-default" style="border-radius: 5px;">
        <div class="box-header with-border">
            <h3 class="box-title" style="font-size: 25px;">Generación de diagramas UML
            </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-info" type="button" title="Convertir diagrama a PNG" style="margin-right: 5px" onclick="view(null)">
                    <span class="fa fa-plus"></span> Agregar nuevo diagrama
                </button>
            </div>
        </div>

        <div class="box-body">
            <div id="div_load" style="text-align: center; margin-bottom: 10px; font-size: 20px;">
                <div>
                    <i class="fa fa-spin fa-refresh fa-2x" style="vertical-align: sub;"></i> &nbsp;
                    Cargando...

                    <p id="rows_loaded" title="Filas cargadas"></p>
                </div>
            </div>

            <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Ancho</th>
                        <th>Alto</th>
                        <th>Fecha y Hora</th>
                        <th>Ver diagrama</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($records as $item)
                    <?php
                    $item_aux = json_encode($item);
                    ?>

                    <tr>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['description'] }}</td>
                        <td>{{ $item['width'] }}</td>
                        <td>{{ $item['height'] }}</td>
                        <td>{{ $item['created_at'] }}</td>
                        <td>
                            <button class="btn btn-warning" type="button" title="Convertir diagrama a PNG" style="margin-right: 5px" onclick="view({{$item_aux}})">
                                <span class="fa fa-eye"></span> Ver
                            </button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="modal fade" role="dialog">

        <div class="modal-dialog modal-dialog-centered" role="document" style="background: white; border-radius: 5px; width: 99%">

            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    <div class="modal-title" style="font-size: 20px; text-align: center">
                        Generar diagrama
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>
                            <div class="box box-default" style="border-radius: 5px; border: 1px solid #d2d6de;">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="font-size: 25px;">Código de PlantUml
                                    </h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <textarea id="code" style="resize: vertical; height: 600px; max-height: 1000px; min-height: 250px; width: 100%; background-color: #135564; color: white; border-radius: 5px"></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-7">

                            <div class="box box-default collapsed-box" style="border-radius: 5px; border: 1px solid #d2d6de;">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="font-size: 25px;">Datos de diagrama
                                    </h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="width">Ancho</label>
                                            <input type="number" id="width" class="form-control" placeholder="Ancho"></input>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="height">Alto</label>
                                            <input type="number" id="height" class="form-control" placeholder="Alto"></input>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="title">Título</label>
                                            <input type="text" id="title" class="form-control" placeholder="Ingresa un Título"></input>
                                        </div>
                                    </div>

                                    <br />

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="description">Descripción</label>
                                            <textarea id="description" style="resize: vertical; height: 150px; max-height: 150px; min-height: 50px; width: 100%; border-radius: 5px" placeholder="Ingresa una descripción del diagrama..."></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input name="id" id="id" type="hidden">
                                            <input name="mode" id="mode" type="hidden">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box box-default" style="border-radius: 5px; border: 1px solid #d2d6de;">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="font-size: 25px;">Diagrama UML:
                                    </h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-warning" title="Convertir diagrama a PNG" style="margin-right: 5px" id="button_png">PNG</button>
                                        <button class="btn btn-warning" title="Convertir diagrama a SVG" style="margin-right: 5px" id="button_svg">SVG</button>
                                        <button class="btn btn-warning" title="Convertir diagrama a TXT" style="margin-right: 5px" id="button_txt">TXT</button>
                                        <button class="btn btn-success" title="Guardar datos de diagrama" style="margin-right: 5px" id="button_save">
                                            <span class="fa fa-save"></span> Guardar
                                        </button>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center;" id="div_img_uml">
                                            <img id="img_uml" png_link="" svg_link="" txt_link="" uml=''>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="content">

</section>

@endsection

@section('js')

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

<!-- plant_uml -->
<!--<script type="text/javascript" src="/js/plant_uml/jquery.js"></script>-->
<script type="text/javascript" src="/js/plant_uml/rawdeflate.js"></script>
<script type="text/javascript" src="/js/plant_uml/jquery_plantuml.js"></script>
<!-- <script type="text/javascript" src="/js/plant_uml/PrintArea.js"></script> -->

<!-- datatables -->
<link rel="stylesheet" href="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css">
<script src="/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- Iniciar objetos -->
<script type="text/javascript">
    var global_mode = null;

    function view(parameters) {

        console.log('parameters: ', parameters);

        if (parameters == null) {
            parameters = {
                id: null,
                title: null,
                description: null,
                code: '@startuml\n@endtuml',
                width: null,
                height: null,
                mode: 'insert'
            }
        }

        var id = parameters.id;
        var title = parameters.title;
        var description = parameters.description;
        var code = parameters.code;
        var width = parameters.width;
        var height = parameters.height;
        var mode = parameters.mode;

        $("#id").val(id);
        $("#title").val(title);
        $("#description").val(description);
        $("#code").val(code);
        $("#width").val(width);
        $("#height").val(height);
        $("#mode").val(mode);

        regenerate_diagram();

        $('#modal').modal('show');
    }

    function regenerate_diagram() {

        var code = $("#code").val();
        var width = $("#width").val();
        var height = $("#height").val();

        $("#img_uml").remove();

        $("#div_img_uml").append('<img id="img_uml" png_link="" svg_link="" txt_link="" uml="">');

        if (width !== null && height !== null) {
            $("#img_uml").css({
                width: width + 'px',
                height: height + 'px'
            });

            console.log('Se ajustó el ancho y alto.');
        }

        $("#img_uml").attr({
            png_link: '',
            svg_link: '',
            txt_link: '',
            uml: code
        });

        console.log($("#img_uml").attr('uml'));

        plantuml_runonce();
    }


    function save() {
        var url = '/info_plant_uml_save/';

        var id = $("#id").val();
        var title = $("#title").val();
        var description = $("#description").val();
        var code = $("#code").val();
        var width = $("#width").val();
        var height = $("#height").val();
        var mode = $("#mode").val();

        var json = {
            _token: token,
            id: id,
            title: title,
            description: description,
            code: code,
            width: width,
            height: height,
            mode: mode
        };

        $.post(url, json, function(data, status) {
            var error = data.error;
            var text = data.message;
            var title = '';
            var type = '';

            if (error == true) {
                type = 'error';
                title = 'Ocurrió un error.';
            } else {
                type = 'success';
                title = 'Acción exitosa.';
            }

            Swal.fire({
                    title: title,
                    text: text,
                    type: type,
                    showCancelButton: false,
                    confirmButtonColor: '#3c8dbc',
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'No.',
                    closeOnClickOutside: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        location.reload();
                    }
                }
            );
        });
    }

    $(document).ready(function() {
        $('#content').css('display', 'block');
        $('#div_load').css('display', 'none');
        $('body > div.wrapper > header > nav > a').trigger('click');

        $("#code").on("keyup change", function(e) {
            regenerate_diagram();
        });

        $("#width").on("keyup change", function(e) {
            regenerate_diagram();
        });

        $("#height").on("keyup change", function(e) {
            regenerate_diagram();
        });

        $("#button_png").click(function() {
            var png_link = $("#img_uml").attr('png_link');
            window.open(png_link, '_blank', 'location=yes,height=700,width=700,scrollbars=yes,status=yes');
        });

        $("#button_svg").click(function() {
            var svg_link = $("#img_uml").attr('svg_link');
            window.open(svg_link, '_blank', 'location=yes,height=700,width=700,scrollbars=yes,status=yes');
        });

        $("#button_txt").click(function() {
            var txt_link = $("#img_uml").attr('txt_link');
            window.open(txt_link, '_blank', 'location=yes,height=700,width=700,scrollbars=yes,status=yes');
        });

        $("#button_save").click(function() {
            save();
        });

        //-----------------------------------------------------------------------------------------------

        //Datatable config
        var data_table_config = {
            fixedHeader: true,
            pageLength: 20,
            lengthMenu: [
                1, 2, 5, 10, 20, 30, 50, 70, 100, 150, 300, 500, 1000, 1500, 2000
            ],
            dom: '<"pull-left"f><"pull-right"l>tip',
            language: {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            scroller: true,
            displayLength: 10,
            order: [],
            columnDefs: [{
                targets: 'no-sort',
                orderable: false,
            }],
            initComplete: function(settings, json) {
                $('#div_load').css('display', 'none');
                $('#content').css('display', 'block');
            }
        }

        var table = $('#datatable_1').DataTable(data_table_config);
    });
</script>
@endsection

@section('aditional_css')
    <!-- DATA TABLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <!-- DATA TABLE - FIN -->
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
