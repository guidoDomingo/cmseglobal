@extends('app')

@section('title')
    Importar Dispositivos
@endsection
@section('content')

    <section class="content-header">
        <h1>
            Dispositivos
            <small>Importar nuevos dispositivos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Dispositivos</a></li>
            <li class="active">importar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Importar Dispositivos</h3>
                    </div>
                    <div class="box-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                Error al importar archivo<br><br>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" enctype="multipart/form-data" action="{{ route('miniterminales.store_import') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <table class="table">
                                    <tr>
                                        <td width="40%" align="right"><label>Select File for Upload</label></td>
                                        <td width="30">
                                            <input type="file" name="select_file" />
                                        </td>
                                        <td width="30%" align="left">
                                            <input type="submit" name="upload" class="btn btn-primary" value="Subir">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40%" align="right"></td>
                                        <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                                        <td width="30%" align="left"></td>
                                    </tr>
                                </table>
                            </div>
                            <a class="btn btn-default" href="#" role="button">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

<script src="/bower_components/admin-lte/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/bower_components/admin-lte/plugins/select2/select2.min.js"></script>
<!-- date-range-picker -->
<link href="/bower_components/admin-lte/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<script src="/bower_components/admin-lte/plugins/daterangepicker/moment.min.js"></script>

<!-- bootstrap datepicker -->
<script src="/bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/bower_components/admin-lte/plugins/datepicker/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
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