@include('/templates/header')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title">Alta de Calificaciones
        </h1>

        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    Grupo 1 </div>
            </div>
        <div class="portlet-body">
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                    <tr>
                        <td> Clave </td>
                        <td>ISOFT811</td>
                    </tr>
                    <tr>
                        <td> Carrera </td>
                        <td>Ingenieria en software </td>
                    </tr>
                    <tr>
                        <td> Turno </td>
                        <td> Matutino </td>

                    </tr>
                    <tr>
                        <td> No. Alumnos </td>
                        <td> 28 </td>

                    </tr>
                    <tr>
                        <td> Asignatura </td>
                        <td> Reingenieria </td>

                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="col-sm-9 col-xs-8">
                <form class="search-form search-form-expanded" action="page_general_search_3.html" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar..." name="query">
                        <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                    </div>
                </form>
            </div>
            <div class="col-sm-3 col-xs-4">
                <div class="form-group">
                    <select class="bs-select form-control">
                        <option>Matricula</option>
                        <option>Nombre</option>
                    </select>
                </div>
            </div>
        <div class="portlet light portlet-fit ">
            <div class="portlet-title">

            <div class="portlet-body">

                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                    <tr>
                        <th> Matrícula </th>
                        <th> Nombre </th>
                        <th> Promedio </th>
                        <th> Unidad 1 </th>
                        <th> Unidad 2 </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> 201400187 </td>
                        <td> Francisco Xavier Victoria Rodriguez </td>
                        <td>  </td>
                        <td> 9 </td>
                        <td >  </td>
                        <td>
                            <a class="edit" href="javascript:;"> Edit </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
        <!-- END PAGE HEADER-->
        <div class="row">
        </div>
        </div>
    </div>
    </div>

    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@extends('/templates/footer')
$('.page-sidebar-menu').children('li').removeClass('active');
$('.page-sidebar-menu').children('li').eq(1).addClass('active');
var $SelectedChild=$('.page-sidebar-menu').children('li').eq(1).children('a');
$selectedChild.append('<span class="selected"></span>');