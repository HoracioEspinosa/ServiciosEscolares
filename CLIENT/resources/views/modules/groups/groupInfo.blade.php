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
                    <input type="hidden" id="idGrupo" value="{{$id}}">
                    <i class="icon-home"></i>
                    <a href="/">Inicio</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>grupos</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <div class="page-toolbar">
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
                                                <span class="caption-subject bold uppercase"> Listado de Alumnos </span>
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
                                        <button class="close" data-close="alert"></button> <span>Se ha producido un error al intentar mover el recurso a la papelera, intente nuevamente más tatde. </span>
                                    </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> <span>Se ha mandado el recurso a la papelera.</span>
                                    </div>
                                </div>
                                <div id="sample_3_wrapper" class="dataTables_wrapper no-footer">
                                    <div class="table">
                                        <table class="table table-striped table-advance table-hover display responsive nowrap dataTable dtr-inline" id="initTableProfesores" width="100%" role="grid" aria-describedby="initTableProfesores_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="initTableProfesores" rowspan="1" colspan="1" aria-label=" Start : activate to sort column ascending" style="width: 162px;">Nombre</th>
                                                <th class="sorting" tabindex="0" aria-controls="initTableProfesores" rowspan="1" colspan="1" aria-label=" End : activate to sort column ascending" style="width: 162px;">Apellidos</th>
                                                <th class="sorting" tabindex="0" aria-controls="initTableProfesores" rowspan="1" colspan="1" aria-label=" Status : activate to sort column ascending" style="width: 131px;">Matricula</th>
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