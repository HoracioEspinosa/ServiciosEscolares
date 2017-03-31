@include('/templates/header')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Grupos
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/">Inicio</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>grupos</span>
                </li>
                <li>
                    <i class="fa fa-angle-right"></i>
                    <span>crear grupo</span>
                </li>
            </ul>
            <div class="page-toolbar">
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form method="post" action="/grupos" class="form-horizontal">
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nombre del grupo</label>
                        <div class="col-md-4">
                            <input name="nombre" type="text" class="form-control input-circle" maxlength="45" placeholder="Ingrese nombre o nombres">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input has-info">
                                <select class="form-control" name="carrera">
                                    <option value=""></option>
                                    @foreach($carreras as $carrera)
                                        <option value={{$carrera['idCarreras']}}>{{$carrera['Nombre_carrera']}}</option>
                                    @endforeach
                                </select>
                                <label for="form_control_1">Carrera</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-4">
                            <div class="form-group form-md-line-input has-info">
                                <select class="form-control" name="horario">
                                    <option value=""></option>
                                @foreach($horarios as $horario)
                                        <option value={{$horario['idHorario_Alumno']}}>{{$horario['Nombre_Grupo']}}</option>
                                        @endforeach
                                </select>
                                <label for="form_control_1">Horario</label>
                            </div>
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
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@extends('/templates/footer')
@section('styles_per_page')
    <link rel="stylesheet" href="/public/css/modules/grupos/grupos.css">
@endsection
@section('scripts_per_page')
    <script src="/public/global/scripts/modules/groups/groups.js"></script>
@endsection