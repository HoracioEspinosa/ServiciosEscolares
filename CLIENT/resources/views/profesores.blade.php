@include('/templates/header')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Profesores
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/">Inicio</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Lista de Profesores</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <!-- Large button group -->
                <div class="btn-group">
                    <a href="/profesores/create" class="btn btn-lg btn-primary"> Registro Nuevo
                        <i class="fa fa-edit"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="inbox userModule">
            <div class="row">
                <div class="col-sm-12">

                    <div class="inbox-body">
                        <div class="inbox-content">
                            <div class="table-toolbar">
                                <div class="row button-tools-add">

                                    <div class="col-md-5">
                                        <div class="caption font-blue-sharp">
                                            <i class="icon-settings font-blue-sharp"></i>
                                            <span class="caption-subject bold uppercase"> Listado de Profesores </span>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="btn-group pull-right">
                                            <button class="btn blue  btn-outline dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-cogs"></i>
                                                Herramientas
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right" aria-controls="initTableProfesores">
                                                <li class="printContent">
                                                    <a><i class="fa fa-print printDepartment"></i> Imprimir </a>
                                                </li>
                                                <li class="pdfContent">
                                                    <a href="javascript:;"><i class="fa fa-file-pdf-o"></i> Guardar como PDF</a>
                                                </li>
                                                <li class="excelContent">
                                                    <a href="javascript:;"><i class="fa fa-file-excel-o"></i> Exportar a Excel </a>
                                                </li>
                                                <li class="csvContent">
                                                    <a href="javascript:;"><i class="fa fa-file-o"></i> Exportar a CSV </a>
                                                </li>
                                                <li class="copyContent">
                                                    <a href="javascript:;"><i class="fa fa-copy"></i> Copiar contenido </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 table-alerts">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> <span>Se ha producido un error al intentar mover el departamento a la papelera, intente nuevamente más tatde. </span>
                                </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> <span>Se ha mandado el departamento a la papelera.</span>
                                </div>
                            </div>
                            <div id="sample_3_wrapper" class="dataTables_wrapper no-footer">
                                <div class="table">
                                    <table class="table table-striped table-advance table-hover display responsive nowrap dataTable dtr-inline" id="initTableProfesores" width="100%" role="grid" aria-describedby="initTableProfesores_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="initTableProfesores" rowspan="1" colspan="1" aria-label=" Start : activate to sort column ascending" style="width: 162px;">Nombre</th>
                                            <th class="sorting" tabindex="0" aria-controls="initTableProfesores" rowspan="1" colspan="1" aria-label=" End : activate to sort column ascending" style="width: 162px;">Apellido</th>
                                            <th class="sorting" tabindex="0" aria-controls="initTableProfesores" rowspan="1" colspan="1" aria-label=" Status : activate to sort column ascending" style="width: 131px;">Teléfono</th>
                                            <th class="sorting" tabindex="0" aria-controls="initTableProfesores" rowspan="1" colspan="1" aria-label=" Status : activate to sort column ascending" style="width: 131px;">Correo</th>
                                            <th class="sorting" tabindex="0" aria-controls="initTableProfesores" rowspan="1" colspan="1" aria-label=" Status : activate to sort column ascending" style="width: 131px;">Estado</th>
                                            <th class="sorting_disabled" tabindex="0" aria-controls="initTableProfesores" rowspan="1" colspan="1" aria-label=" Actions : activate to sort column ascending" style="width: 80px;">Acciones</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div id="view" class="modal fade" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Datos Profesor</h4>
                    </div>
                    <div class="modal-body">
                        <form action="#" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-md-4">Nombre</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">
                                        Jacob Thornton Pérez
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Cédula</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">
                                        098554648656
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Especialidad</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">
                                        Maestría en Historia. Doctorado en Lengua española.
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Status</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">
                                        Inactivo
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Materias</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">
                                        Historia, Español
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Grupos</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">
                                        A410, B810, A411
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Turnos</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">
                                        Matutino, Vespertino
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Horarios</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">
                                        Lunes, 07:00 - 9:40 / 11:30 - 12:20 / 17:45 - 19:30
                                    <p></p>
                                        Martes, 07:00 - 9:40 / 11:30 - 12:20 / 17:45 - 19:30
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Notas</label>
                                <div class="col-md-8">
                                    <p class="form-control-static">
                                        Se encuentra de licencia trabajando en investigación para universidad.
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="modify" class="modal fade" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Datos Profesor</h4>
                    </div>
                    <div class="modal-body">
                        <form action="#" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input-circle" placeholder="Ingrese Nombre o nombres">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Apellido</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input-circle" placeholder="Apellido Paterno">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Apellido</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input-circle" placeholder="Apellido Materno">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Cédula</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                                                    <span class="input-group-addon input-circle-left">
                                                                        <i class="fa fa-credit-card"></i>
                                                                    </span>
                                        <input type="text" class="form-control input-circle-right" placeholder="Ingrese Cédula Profesional"> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                                                    <span class="input-group-addon input-circle-left">
                                                                        <i class="fa fa-envelope"></i>
                                                                    </span>
                                        <input type="email" class="form-control input-circle-right" placeholder="Correo elctrónico"> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Teléfono</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                                                    <span class="input-group-addon input-circle-left">
                                                                        <i class="fa fa-phone"></i>
                                                                    </span>
                                        <input type="text" class="form-control input-circle-right" placeholder="Número de Teléfono"> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Notas</label>
                                <div class="col-md-6">
                                    <textarea class="form-control rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-6">
                                    <select class="bs-select form-control" data-style="blue">
                                        <option>Activo</option>
                                        <option>Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        <button class="btn green" data-dismiss="modal">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">

        </div>
    </div>
    <!-- END CONTENT BODY -->


</div>
<!-- END CONTENT -->

@extends('/templates/footer')
@section('scripts_per_page')
    {!! HTML::script('/public/global/scripts/modules/profesores/profesores.js') !!}
@endsection
@section('styles_per_page')
    {!! HTML::style('/public/global/css/components-md.min.css') !!}
    {!! HTML::style('/public/apps/css/inbox.min.css') !!}
    {!! HTML::style('/public/css/modules/users/users.css') !!}

@endsection