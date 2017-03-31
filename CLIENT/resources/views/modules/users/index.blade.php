@include('/templates/header')
<!-- BEGIN CONTENT -->
<input type="hidden" id="uname" value="{{ $result['usuario'] }}">
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Usuarios
            <small>Listado de usuarios</small>
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/">Inicio</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Usuarios</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true" style="margin-top: 4px;margin-right: 5px;">
                        Acciones
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="#">
                                <i class="fa fa-list"></i> Listar usuarios
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-plus"></i> Agregar usuario
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-refresh"></i> Actualizar usuario
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="inbox userModule">
            <input type="hidden" id="typeTABLE" value="1">
            <div class="row">
                <div class="col-md-2">
                    <div class="inbox-sidebar">
                        <button type="button" class="btn blue btn-block addbtntop"><i class="fa fa-edit"></i>Agregar usuario</button>
                        <ul class="inbox-nav">
                            <li class="active">
                                <a href="javascript:;" data-type="inbox" data-title="Inbox" data-id="1"> Todos
                                    <span class="badge badge-success recordsTotal">1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="inbox-body">
                        <div class="inbox-content">
                            <div class="table-toolbar">
                                <div class="row button-tools-add">
                                    <!--div class="col-md-6">
                                        <div class="btn-group">
                                            <a class="btn sbold green" onclick="$('#sample_Users').DataTable().ajax.reload();"> Agregar un nuevo departamento
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div-->
                                    <div class="col-md-5">
                                        <div class="caption font-blue-sharp">
                                            <i class="icon-settings font-blue-sharp"></i>
                                            <span class="caption-subject bold uppercase"> Listado de usuarios </span>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        @if($result["idUsuarios"] == 1)
                                            <div class="btn-group" data-toggle="buttons" id="checkDeleted" style="display: none;">
                                                <label class="btn blue active" data-value="0"><span class="md-click-circle md-click-animate" style="height: 86px; width: 86px; top: -28px; left: 21px;"></span><input type="radio" class="toggle" value="0" name="typeTableElements"> Todos</label>
                                                <label class="btn blue" data-value="1"><input type="radio" class="toggle" value="1" name="typeTableElements">Eliminados </label>
                                                <label class="btn blue" data-value="2"><input type="radio" class="toggle" value="2" name="typeTableElements"> No eliminados</label>
                                            </div>
                                        @else
                                            <div class="btn-group" data-toggle="buttons" id="checkDeleted" style="display: none">
                                                <label class="btn blue active" data-value="2"><input type="radio" class="toggle" value="2" name="typeTableElements"> No eliminados</label>
                                            </div>
                                        @endif
                                        <div class="btn-group pull-right">
                                            <button class="btn blue  btn-outline dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-cogs"></i>
                                                Herramientas
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right" aria-controls="sample_Users">
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
                                <div class="addElement margin-top-10">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> <span>Se han producido algunos errores, favor de verificar sus datos, de igual manera verificar que el departamento no exista. </span>
                                    </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> <span>Se ha agregado el nuevo departamento</span>
                                    </div>
                                    <div class="alert alert-deleted" style="display: none;">
                                        <button class="restoreDepartment pull-right btn btn-default">Restaurar</button>
                                        <span>Departamento actualmente eliminado del listado</span>
                                    </div>
                                    <div class="col-sm-12 addUserLine">
                                        <span><img src="/public/global/img/linea.png" alt="Separator"></span>
                                    </div>
                                    <div class="col-sm-12 addUserForm">
                                        <form id="form_sample_user" class="form-horizontal" novalidate="novalidate">
                                            <input type="hidden" name="token" value="{{ Cookie::get('token') }}">
                                            <input type="hidden" name="identificator" id="identificator">
                                            <input type="hidden" name="idInformacion" id="idInformacion">
                                            <div class="col-sm-12">
                                                <div class="col-sm-4">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Código:</label>
                                                            <div class="col-md-9">
                                                                <div class="input-icon right">
                                                                    <i class="fa fa-lock"></i>
                                                                    <input type="text" class="form-control" name="code" id="code" placeholder="(Generado automáticamente)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Nombre:</label>
                                                            <div class="col-md-9">
                                                                <div class="input-icon right">
                                                                    <i class="fa fa-user"></i>
                                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Apellido:</label>
                                                            <div class="col-md-9">
                                                                <div class="input-icon right">
                                                                    <i class="fa fa-user"></i>
                                                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Ingrese el apellido">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Edad:</label>
                                                            <div class="col-md-9">
                                                                <div class="input-icon right">
                                                                    <input type="number" min="18" max="90" class="form-control" name="age" id="age" value="18">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Teléfono:</label>
                                                            <div class="col-md-9">
                                                                <div class="input-icon right">
                                                                    <i class="fa fa-phone"></i>
                                                                    <input type="tel" class="form-control" name="mask_phone" id="mask_phone" placeholder="Ingrese el teléfono">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-2">Correo:</label>
                                                            <div class="col-md-9">
                                                                <div class="input-icon right">
                                                                    <i class="fa fa-envelope"></i>
                                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese el correo electrónico">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <!-- AQUI -->
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Genero:</label>
                                                            <div class="col-md-9">
                                                                <div class="input-icon right">
                                                                    <select class="form-control" name="gender" id="gender">
                                                                        <option value="">Seleccionar género</option>
                                                                        <option value="1">Masculino</option>
                                                                        <option value="0">Femenino</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tipo:</label>
                                                            <div class="col-md-9">
                                                                <div class="input-icon right">
                                                                    <select class="form-control" name="type" id="type">
                                                                        <option value="">Seleccionar tipo de usuario</option>
                                                                        <option value="2">Usuario</option>
                                                                        <option value="1">Administrador</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Estado:</label>
                                                            <div class="col-md-9">
                                                                <div class="input-icon right">
                                                                    <select class="form-control" name="estado" id="estado">
                                                                        <option value="">Seleccionar estado</option>
                                                                        <option value="1">Activo</option>
                                                                        <option value="0">Inactivo</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Dirección:</label>
                                                            <div class="col-md-9">
                                                                <div class="input-icon right">
                                                                    <i class="fa fa-home"></i>
                                                                    <input type="text" class="form-control" name="address" id="address" placeholder="Ingrese la dirección">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="col-md-offset-8 col-md-4 without-padding">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-6 updateInputDepartment">
                                                                <div class="form-actions">
                                                                    <div class="form-actions"><button type="button" class="btn green addUser" id="agregarUsuarios" onclick="createUser()">Agregar</button></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 cancelDepartment">
                                                                <div class="form-actions"><button type="button" class="btn cancelUser">Cancelar</button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
                                    <table class="table table-striped table-advance table-hover display responsive nowrap dataTable dtr-inline" id="sample_Users" width="100%" role="grid" aria-describedby="sample_3_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="sample_Users" rowspan="1" colspan="1" aria-label=" Nivel: activate to sort column ascending" style="width: 145.2px;">&nbsp;Tipo de usuario</th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_Users" rowspan="1" colspan="1" aria-label=" Código: activate to sort column ascending" style="width: 145.2px;"> CURP</th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_Users" rowspan="1" colspan="1" aria-label="ascending" aria-label=" Nombre: activate to sort column descending" style="width: 186.2px;"> Nombre </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_Users" rowspan="1" colspan="1" aria-label=" Correo: activate to sort column ascending" style="width: 145.2px;"> Correo </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_Users" rowspan="1" colspan="1" aria-label=" Teléfonos: activate to sort column ascending" style="width: 145.2px;"> Teléfono </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_Users" rowspan="1" colspan="1" aria-label=" Permiso: activate to sort column ascending" style="width: 145.2px;"> Estado </th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_Users" rowspan="1" colspan="1" aria-label=" Acciones: activate to sort column ascending" style="width: 145.2px;"> Acciones</th>
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

        <!-- END PAGE HEADER-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@extends('/templates/footer')
@section('scripts_per_page')

    {!! HTML::script("/public/global/plugins/fancybox/source/jquery.fancybox.pack.js") !!}
    {!! HTML::script("/public/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js") !!}
    {!! HTML::script("/public/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/js/vendor/load-image.min.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/js/jquery.fileupload.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js") !!}
    {!! HTML::script("/public/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js") !!}
    
    {!! HTML::script("/public/global/scripts/modules/userFunctions.js") !!}
    {!! HTML::script("/public/apps/scripts/inbox.js") !!}
    {!! HTML::script("/public/global/scripts/modules/users/users.js") !!}

@endsection
@section('styles_per_page')
    {!! HTML::style("/public/global/plugins/fancybox/source/jquery.fancybox.css") !!}
    {!! HTML::style("/public/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css") !!}
    {!! HTML::style("/public/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css") !!}
    {!! HTML::style("/public/global/plugins/jquery-file-upload/css/jquery.fileupload.css") !!}
    {!! HTML::style("/public/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css") !!}
    {!! HTML::style('/public/global/css/components-md.min.css') !!}

    {!! HTML::style('/public/css/modules/users/users.css') !!}
    {!! HTML::style('/public/apps/css/inbox.min.css') !!}
@endsection