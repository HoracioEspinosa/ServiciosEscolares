@include('/templates/header')

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Nuevo Registro
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
                    <a href="/profesores">Lista de Profesores</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Nuevo Registro</span>
                </li>
            </ul>

        </div>

        <div class="clearfix">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title">Profesores - Nuevo Registro</h3>

                </div>

                <!--##################-->

                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form method="post" action="/profesores/create" class="form-horizontal">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Nombre</label>
                                <div class="col-md-4">
                                    <input name="name" type="text" class="form-control input-circle" placeholder="Ingrese Nombre o nombres">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Apellido</label>
                                <div class="col-md-4">
                                    <input name="plname" type="text" class="form-control input-circle" placeholder="Apellido Paterno">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Apellido</label>
                                <div class="col-md-4">
                                    <input name="mlname" type="text" class="form-control input-circle" placeholder="Apellido Materno">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Cédula</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                                                    <span class="input-group-addon input-circle-left">
                                                                        <i class="fa fa-credit-card"></i>
                                                                    </span>
                                        <input name="cedula" type="text" class="form-control input-circle-right" placeholder="Ingrese Cédula Profesional"> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                                                    <span class="input-group-addon input-circle-left">
                                                                        <i class="fa fa-envelope"></i>
                                                                    </span>
                                        <input name="email" type="email" class="form-control input-circle-right" placeholder="Correo electrónico"> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Teléfono</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                                                    <span class="input-group-addon input-circle-left">
                                                                        <i class="fa fa-phone"></i>
                                                                    </span>
                                        <input name="phone" type="text" class="form-control input-circle-right" placeholder="Número de Teléfono"> </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Notas</label>
                                <div class="col-md-4">
                                    <textarea name="notes" class="form-control rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Status</label>
                                <div class="col-md-2">
                                    <select name="estatus" class="bs-select form-control" data-style="blue">
                                        <option value="ACTIVO">Activo</option>
                                        <option value="INACTIVO">Inactivo</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-circle blue">Agregar</button>
                                    <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancelar</button>
                                </div>
                            </div>
                        </div>

                    </form>
                    <!-- END FORM-->
                </div>

                <!--##################-->
            </div>
            <!-- Table -->
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