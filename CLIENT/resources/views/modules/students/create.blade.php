@include('/templates/header')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Alumnos
            <small>Crear alumno</small>
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
                <form method="post" action="/students/create">
                    <div class="col-md-4">
                        <div class="portlet light bordered">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input name="name" class="form-control spinner" type="text" placeholder="John" />
                                </div>
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input name="lastname" class="form-control spinner" type="text" placeholder="Doe" />
                                </div>
                                <div class="form-group">
                                    <label>Género</label>
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="genero" id="idmasculino" value="Masculino" checked>Masculino
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="genero" id="idfemenino" value="Femenino">Femenino
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Edad</label>
                                    <input name="age" class="form-control spinner" type="number" min="15" max="100" step="1" placeholder="18" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portlet light bordered">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Curp</label>
                                    <input name="curp" class="form-control spinner" type="text" placeholder="VIMD960706VNNHQR02" />
                                </div>
                                <div class="form-group">
                                    <label>Matricula</label>
                                    <input name="matricula" class="form-control spinner" type="text" placeholder="Doe" />
                                </div>
                                <div class="form-group">
                                    <label>Turno</label>
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="turno" id="optionsRadios4" value="Matutino" checked>Matutino
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="turno" id="optionsRadios5" value="Vespertino">Vespertino
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portlet light bordered">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Carreras</label>
                                    <select class="form-control" name="carrera" id="">
                                        @foreach($carreras as $carrera)
                                            <option value="{{$carrera['idCarreras']}}">{{$carrera['nombreCarrera']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Grupo</label>
                                    <select class="form-control" name="grupo" id="">
                                        @foreach($grupos as $grupo)
                                            <option value="{{$grupo['idGrupos']}}">{{$grupo['nombre']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Generaciones</label>
                                    <select class="form-control" name="generacion" id="">
                                        @foreach($generaciones as $generacion)
                                            <option value="{{$generacion['idGeneraciones']}}">{{$generacion['generacion']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-md-4">
                        <div class="portlet light bordered" style="height:280px;">
                            <div class="form-body">
                                <div class="mt-element-overlay">
                                    <div class="mt-overlay-1" style="height:250px;">
                                        <img src="/public/global/img/portfolio/600x600/2.jpg" />
                                        <div class="mt-overlay">
                                            <ul class="mt-info">
                                                <li>
                                                    <div class="form-group">
                                                        <input type="file" id="exampleInputFile1">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
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