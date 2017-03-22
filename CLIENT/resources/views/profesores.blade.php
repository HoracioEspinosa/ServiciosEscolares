@include('/templates/header')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Inicio
            <small>Profesores</small>
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
                    <a href="/profesores/create" class="btn btn-lg blue"> Registro Nuevo
                        <i class="fa fa-edit"></i>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="/profesores/create"> Agregar </a>
                        </li>
                        <li>
                            <a href="/profesores/update"> Modificar </a>
                        </li>
                        <li>
                        <li class="divider"> </li>
                        <li>
                            <a href="javascript:;"> Eliminar </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clearfix">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title">Profesores</h3>
                </div>
                <!-- Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th> # </th>
                        <th> Nombre </th>
                        <th> Paterno </th>
                        <th> Materno </th>
                        <th> Status </th>
                        <th> Teléfono </th>
                        <th> E-mail </th>
                        <th> Acciones </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> Mark </td>
                        <td> Otto </td>
                        <td> Sánchez </td>
                        <td> Activo </td>
                        <td> 999888555 </td>
                        <td> ejemplo1@gmail.com </td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> 2 </td>
                        <td> Jacob </td>
                        <td> Thornton </td>
                        <td> Pérez </td>
                        <td> Inactivo </td>
                        <td> 999777666 </td>
                        <td> ejemplo2@gmail.com </td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default" href="#form_modal11" data-toggle="modal">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="#form_moda222" data-toggle="modal">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="#form_moda333" data-toggle="modal">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> 3 </td>
                        <td> Larry </td>
                        <td> the Bird </td>
                        <td> Hernández </td>
                        <td> Activo </td>
                        <td> 999222333 </td>
                        <td> ejemplo3@gmail.com </td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="form_modal11" class="modal fade" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
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
                        <button class="btn blue" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="form_moda222" class="modal fade" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
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
                        <button class="btn red" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        <button class="btn green" data-dismiss="modal">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="form_moda333" class="modal fade" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Eliminar Registro</h4>
                    </div>
                    <div class="modal-body">
                        <form action="#" class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="alert alert-danger">
                                    Se va a <strong>ELIMINAR</strong> el registro de la Base de datos, está seguro?  </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn green" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                        <button class="btn red" data-dismiss="modal">Eliminar</button>
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