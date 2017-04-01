@include('/templates/header')

<!-- BEGIN CONTENT -->
   <div class="page-content-wrapper" id="log">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="modal fade bs-modal-sm" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <div class="caption font-green">
                                <i class="icon-calendar font-green"></i>
                                <span class="caption-subject bold uppercase"> Crear Nuevo Periodo Escolar</span>
                            </div>
                        </div>
                        <div class="modal-body">
                            @include('/modules/periodos/create')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn blue" onclick="createPeriodo()">Crear</button>
                            <button type="button" class="btn default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="modal fade bs-modal-sm" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <div class="caption font-green">
                                <i class="icon-calendar font-green"></i>
                                <span class="caption-subject bold uppercase"> Edicion de periodos</span>
                            </div>
                        </div>
                        <div class="modal-body">
                            @include('/modules/periodos/update')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn blue" onclick="update()">Guardar</button>
                            <button type="button" class="btn default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- BEGIN PAGE HEADER-->
            <h1 class="page-title"> Periodos
                <small></small>
            </h1>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="/">Inicio</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <i class="icon-calendar"></i>
                        <a href="/periodos">Periodos</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Vista</span>
                    </li>
                </ul>
            </div>
            <!--<pre>
                hola mundo
            </pre>-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <a id="nuevoPeriodo" class="btn sbold green" data-toggle="modal" href="#portlet-config"> Agregar Nuevo
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Herramientas
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-print"></i> Imprimir </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-pdf-o"></i> Guardar como PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <i class="fa fa-file-excel-o"></i> Exportar a Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="tabla_periodos" role="grid" aria-describedby="sample_1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 72px;">
                                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input type="checkbox" class="group-checkable" data-set="#tabla_periodos .checkboxes">
                                                    <span></span>
                                                </label>
                                            </th>
                                            <td class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Start : activate to sort column ascending" style="width: 162px;">Inicio</td>
                                            <td class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" End : activate to sort column ascending" style="width: 162px;">Fin</td>
                                            <td class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" End : activate to sort column ascending" style="width: 162px;">Año</td>
                                            <td class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Status : activate to sort column ascending" style="width: 131px;">Estado</td>
                                            <th class="sorting_disabled" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Actions : activate to sort column ascending" style="width: 80px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpoTablaPeriodos">

                                        @foreach($datosPeriodos as $periodo)

                                            <tr>
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>{{ucfirst($periodo['inicio'])}}</td>
                                                <td>{{ucfirst($periodo['fin'])}}</td>
                                                <td>{{$periodo['anio']}}</td>
                                                <td>

                                                    @if($periodo['status'] == "0")
                                                        <span class="badge badge-danger">Inactivo</span>
                                                        <!--<input type="checkbox" data-size="mini" class="make-switch" id="test" data-on-text="Activo" data-off-text="Inactivo">-->
                                                    @else
                                                        <span class="badge badge-success">Activo</span>
                                                        <!--<input type="checkbox" checked data-size="mini" class="make-switch" id="test" data-on-text="Activo" data-off-text="Inactivo">-->
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group" style="margin-top: 1px">
                                                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Acciones
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a onclick="getPeriodosByID({{$periodo['idPeriodos']}});" data-toggle="modal" href="#actualizar">
                                                                    <i class="fa fa-pencil"></i> Editar
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:deletePeriod({{$periodo['idPeriodos']}});">
                                                                    <i class="fa fa-trash-o"></i> Eliminar
                                                                </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                    @if($periodo['status'] == "0")
                                                                    <a href="javascript:changeStatus({{$periodo['idPeriodos']}});"><i class="fa fa-ban"></i> Activar</a>
                                                                    @else
                                                                        <a href="javascript:changeStatus({{$periodo['idPeriodos']}});"><i class="fa fa-ban" style="color: red"></i> Desactivar</a>
                                                                    @endif
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
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
        </div>
        <!-- END CONTENT BODY -->
    </div>
<!-- END CONTENT -->
@extends('/templates/footer')
@section('scripts_per_page')
    {!! HTML::script('/public/global/scripts/modules/periodos/periodos.js') !!}
@endsection