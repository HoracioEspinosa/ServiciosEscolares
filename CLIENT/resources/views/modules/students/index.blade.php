@include('/templates/header')
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Alumnos
            <small>Listado de alumnos</small>
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
                            <a href="/students">
                                <i class="fa fa-list"></i> Listar usuarios
                            </a>
                        </li>
                        <li>
                            <a href="/students/create">
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
                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                <thead>
                <tr role="row">
                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 72px;">
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes">
                            <span></span>
                        </label>
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Start : activate to sort column ascending" style="width: 162px;">Alumno</tf>
                    <td class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" End : activate to sort column ascending" style="width: 162px;">Matricula</td>
                    <td class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Status : activate to sort column ascending" style="width: 131px;">Estado</td>
                    <td class="sorting_disabled" tabindex="0"  rowspan="1" colspan="1" style="width: 80px;">Acciones</td>
                </tr>
                </thead>
                <tbody id="cuerpoTablaStudents">
                @foreach($allUsuarios as $objeto)
                    <tr>
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input data-set="#sample_1" type="checkbox" class="checkboxes" value="1">
                                <span></span>
                            </label>
                        </td>
                        <td>{{ucfirst($objeto['nombre'])}} {{ucfirst($objeto['apellido'])}}</td>
                        <td>{{$objeto['matricula']}}</td>
                        <td>{{$objeto['estado']}}</td>
                        <td>
                            <div class="btn-group" style="margin-top: 1px">
                                <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Acciones
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left" role="menu">
                                    <li>
                                        <a href="/students/update/{{$objeto['idAlumnos']}}">
                                            <i class="fa fa-pencil"></i> Editar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-trash-o"></i> Eliminar
                                        </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-ban"></i> Desactivar
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>

        <!-- END PAGE HEADER-->
    </div>
    <!-- END CONTENT BODY -->
</div>

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