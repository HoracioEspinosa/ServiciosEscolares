@include('/templates/header')
<!-- BEGIN CONTENT -->

<style type="text/css">
    .borde-dropzone{
        border: 2px dashed #47a447 !important;
        border-radius: 5px !important;
        background: white !important;
    }
</style>
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Inicio
            <small>Resultados generales</small>
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/">Inicio</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Resultados generales</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                        Acciones
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a data-toggle="modal"  data-target="#mdlArchivos">
                                <i class="icon-plus"></i> Agregar Archivo
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- END PAGE HEADER-->
        <input type="hidden" name="idalumno" data-id="<?php echo $idAlumnoo ?>" id="expe" value="<?php echo $idAlumnoo ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-13 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">j</h3>
                        </div>
                        <div class="panel-body text-center" >
                            <div class="row" id="divMostrarArchivos"> </div>
                        </div>
                    </div> <!-- Fin del panel panel-default -->
                </div>
            </div> <!-- Fin del Row -->
            <!-- Modal -->
            <div id="mdlArchivos" class="modal fade">
                <div class="modal-dialog" style="width: 65%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Subir Archivos</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12" id="formDropZone"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>

<!-- END CONTENT -->
@include('/templates/footer')



