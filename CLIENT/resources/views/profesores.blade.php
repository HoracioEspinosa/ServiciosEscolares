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
                    <button class="btn btn-square red btn-lg dropdown-toggle" type="button" data-toggle="dropdown"> Acciones
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="profesores/create"> Agregar </a>
                        </li>
                        <li>
                            <a href="javascript:;"> Modificar </a>
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
                        <th> First Name </th>
                        <th> Last Name </th>
                        <th> Status </th>
                        <th> Teléfono </th>
                        <th> E-mail </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> Mark </td>
                        <td> Otto </td>
                        <td> Activo </td>
                        <td> 999888555 </td>
                        <td> ejemplo1@gmail.com </td>
                    </tr>
                    <tr>
                        <td> 2 </td>
                        <td> Jacob </td>
                        <td> Thornton </td>
                        <td> Inactivo </td>
                        <td> 999777666 </td>
                        <td> ejemplo2@gmail.com </td>
                    </tr>
                    <tr>
                        <td> 3 </td>
                        <td> Larry </td>
                        <td> the Bird </td>
                        <td> Activo </td>
                        <td> 999222333 </td>
                        <td> ejemplo3@gmail.com </td>
                    </tr>
                    </tbody>
                </table>
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