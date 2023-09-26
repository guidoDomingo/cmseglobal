<?php 
    
    $resultado = isset($bots) ? $bots : [];

?>



@extends('app')

@section('title')
Telegram
@endsection

@section('content')

<div class="container" style="width:1000px;">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div id="success-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row" style="margin-top:15px">
        <div class="col-md-6 card-bot">
            <!-- Aquí se mostrará información sobre cómo crear un bot en Telegram -->
            <div class="card info-bot">
                <div class="card-header">Cómo crear un bot de Telegram</div>

                <div class="card-body">
                    <p>Para crear un bot de Telegram, sigue estos pasos:</p>
                    <ol>
                        <li>Abre la aplicación de Telegram y busca el bot llamado "BotFather".</li>
                        <li>Inicia una conversación con "BotFather" y escribe el comando "/newbot".</li>
                        <li>Sigue las instrucciones de "BotFather" para crear el bot y obtener su token.</li>
                        <li>Importante inicia la conversación con el bot que creaste.</li>
                    </ol>
                </div>
            </div>

            <div class="card card-youtube">
                <img src="https://i.ytimg.com/vi/9j3B5oK-Vr4/hqdefault.jpg" class="card-img-top img-fluid img-thumbnail" alt="miniatura del video">
                <div class="card-body card-body-youtube">
                    <h5 class="card-title">Video tutorial de cómo crear un bot de telegram</h5>
                    <a href="https://www.youtube.com/embed/9j3B5oK-Vr4" class="btn btn-primary" target="_blank">Ver video</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Aquí se mostrará el formulario para guardar el nombre y el token de Telegram -->
            <div class="card-header">Agrega tu Username</div>

            <div class="card-body">
                <form method="POST" action="{{ route('guardar_bot_telegram') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <select class="js-select-users" name="user_id" style="width:100%">
                            <option value="">Seleccione el username</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->username }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="token">Token de Telegram</label>
                        <input id="token" type="text" class="form-control @error('token') is-invalid @enderror" name="token" value="{{ old('token') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="token">Nombre del usuario</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <select class="js-select-users" name="group_name" style="width:100%">
                            <option value="">Selecciona el grupo</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="operativo">Operativo</option>
                        </select>
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary" id="guardar-btn">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    
    <div class="row">
        <div class="col-md-12">
            <!-- Aquí se mostrará la lista de los campos nombre, token, fecha y acciones de editar y eliminar -->
            <div class="col-md-12">
                <table id="zero-config" class="table table-striped dt-table-hover display responsive nowrap"
                                style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Token</th>
                                    <th>Chat_id</th>
                                    <th>Grupo_id</th>
                                    <th>Grupo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($resultado as $item)   
                                
                                    <tr>
                                        <td class="red"  style="border-top: 1px solid #ccc">{{ $item['name'] }}</td>
                                        <td  style="border-top: 1px solid #ccc">{{ $item['token'] }}</td>
                                        <td  style="border-top: 1px solid #ccc">{{ $item['chat_id'] }}</td>
                                        <td  style="border-top: 1px solid #ccc">{{ $item['group_chat_id'] }}</td>
                                        <td  style="border-top: 1px solid #ccc">{{ $item['group_name'] }}</td>
                                        <td class="" style="border-top: 1px solid #ccc; cursor: pointer">
                                            <div class="form-group row justify-content-center">

                                                <div class="col-md-3 acciones-bot " style="margin-left:5px">

                                                        <button type="button" class="btn btn-primary edit-bot-btn" data-bot-id="{{ $item['id'] }}" data-toggle="modal" data-target="#editBotModal">
                                                            Editar Bot
                                                        </button>

                                                        <button type="button" class="btn btn-danger delete-bot" onclick="confirmDelete({{ $item['id'] }})">Eliminar bot</button>


                                                </div>

                                            </div>
                                        </td>
                                        
                                    </tr> 

                                @endforeach  

                            </tbody>         

                    </table>
            </div>

        </div>
    </div>
</div>

<!-- Botón para abrir el modal -->


<!-- Modal -->
<div class="modal fade" id="editBotModal" tabindex="-1" aria-labelledby="editBotModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span><i class="fa fa-mobile"></i> Telegram</span>
                <span><i class="fa fa-comments"></i>Editar</span>
            </div>
            <form action="{{ route('updated_bot_telegram')}}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <!-- Campos del formulario para editar el bot -->
                    <input type="hidden" class="form-control" id="edit-id" name="id" value="">

                    <div class="mb-3">
                        <label for="edit-name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="edit-name" name="name" value="">
                    </div>
                    <div class="mb-3">
                        <label for="edit-token" class="form-label">Token</label>
                        <input type="text" class="form-control" id="edit-token" name="token" value="">
                    </div>
                    <div class="mb-3">
                        <label for="edit-chat_id" class="form-label">Chat ID</label>
                        <input type="text" class="form-control" id="edit-chat_id" name="chat_id" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

@section('page_scripts')
@include('partials._selectize')
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
    <script>
        var csrfToken = '{{ csrf_token() }}';
    </script>

   <!-- datatables -->
    <link rel="stylesheet" href="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css">
    <script src="/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- date-range-picker -->
    <link href="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet"
        type="text/css" />
    <script src="/bower_components/admin-lte/plugins/daterangepicker/moment.min.js"></script>
    <script src="/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- bootstrap datepicker -->
    <script src="/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>

    <!-- iCheck -->
    <link rel="stylesheet" href="/bower_components/admin-lte/plugins/iCheck/square/grey.css">
    <script src="/bower_components/admin-lte/plugins/iCheck/icheck.min.js"></script>

    <!--select2 -->
    <link rel="stylesheet" href="/bower_components/admin-lte/plugins/select2/select2.min.css">

    <!--select2 -->
    <script src="/bower_components/admin-lte/plugins/select2/select2.full.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{"https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"}}">
    
    <!-- Iniciar objetos -->

    <!-- jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <!-- Bootstrap JS -->
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

    <script>
        // Esperar 3 segundos y luego eliminar el mensaje de éxito
        setTimeout(function() {
            document.getElementById('success-message').remove();
        }, 3000);

    </script>

    <script>
        var guardarBtn = document.getElementById('guardar-btn');
        guardarBtn.addEventListener('click', function() {
            guardarBtn.classList.add('spin');
        });
    </script>


    <script type="text/javascript">
        $('.js-select-users').select2();


        /*Llamar modal a través de Ajax*/
        
        $(document).ready(function() {
            // Botón de editar (asume que hay un botón de editar para cada bot en la lista)
            $('button.edit-bot-btn').on('click', function() {
                const botId = $(this).data('botId');
                const url = "{{ url('bots') }}/" + botId;

                // Carga la información del bot usando AJAX
                $.get(url, function(bot) {
                    console.log(bot);
                    // Actualiza el formulario del modal con la información del bot
                    //$('#editBotForm').attr('action', "{{ url('bots') }}/" + bot.id);
                    $('#edit-name').val(bot.name);
                    $('#edit-token').val(bot.token);
                    $('#edit-id').val(bot.id);
                    $('#edit-chat_id').val(bot.chat_id);
                    //$('#chat_id').val(bot.chat_id);

                    // Muestra el modal
                    $('#editBotModal').modal('show');
                });
            });
        });

        /*Fin de llamada Ajax*/

        /*Eliminar bot*/
        
        function confirmDelete(botId) {
            if (confirm('¿Está seguro de que desea eliminar este bot?')) {
                // Si el usuario confirma, llama a la función para eliminar el bot
                deleteBot(botId);
            }
        }

        function deleteBot(botId) {
        // Realizar una solicitud AJAX para eliminar el bot
            $.ajax({
                url: '/bots/' + botId, // Asegúrate de que esta URL coincide con la ruta definida en tu archivo de rutas
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    // Si la eliminación fue exitosa, actualiza la interfaz de usuario (por ejemplo, elimina el bot de la lista)
                    console.log('Bot eliminado con éxito');
                    location.reload(); // Recarga la página para actualizar la lista de bots
                },
                error: function(xhr, textStatus, errorThrown) {
                    // Si ocurrió un error, muestra un mensaje de error
                    console.error('Error al eliminar el bot:', errorThrown);
                    location.reload(); 
                }
            });
        }


        /*Fin de eliminar bot*/


        //Datatable config
        var data_table_config = {
            orderCellsTop: true,
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
            processing: true,
            initComplete: function(settings, json) {
        
                
                $("#graph_spinn").hide();
                $("#content").show();
             
                //$('body > div.wrapper > header > nav > a').trigger('click');
            }
        }

        // Order by the grouping
        $('#datatable_1 tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                table.order([groupColumn, 'desc']).draw();
                 $(".btn_spinn").hide();
            } else {
                table.order([groupColumn, 'asc']).draw();
                 $(".btn_spinn").hide();
            }
        });

        var table = $('#datatable_1').DataTable(data_table_config);

        //$('#hide_show_columns').append('Ocultar columna/s de la tabla: <br/>');

        var hide_show_columns = [];

        var ths = $("#datatable_1").find("th");

        var index = 0;

        for (var i = index; i < ths.length; i++) {
            hide_show_columns.push(ths[i].innerHTML);
        }

        for (var i = index; i < hide_show_columns.length; i++) {

            var description = hide_show_columns[i];

            $('#hide_show_columns').append(
                '<a class="toggle-vis btn btn-default btn-sm" data-column="' + i + '" id="toggle-vis-' + i +
                '" value="' + description + '" state="on" title="Mostrar / Ocultar columna: ' + description +
                '" style="margin-top: 3px">' +
                '<i class="fa fa-eye"></i> &nbsp;' + description +
                '</a> '
            );
        }

        $('a.toggle-vis').on('click', function(e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column($(this).attr('data-column'));

            // Toggle the visibility
            column.visible(!column.visible());
        });

        var selective_config = {
            delimiter: ',',
            persist: false,
            openOnFocus: true,
            valueField: 'id',
            labelField: 'description',
            searchField: 'description',
            maxItems: 1,
            options: {}
        };
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
