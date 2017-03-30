@include('/templates/header')
<style>
    .button {
        background-color: #00BB5E;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 2px;
    }

    .button:hover {
        background-color: #02CF69; /* Blue */
        color: white;
    }


</style>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->

    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->


        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="#">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Carreras</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->

        <h1 class="page-title"> Carreras

        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <div class="container">
            <input style="margin-left: 800px;" type="submit" class="button" value="Agregar carrera" data-toggle="modal" data-target="#myModal">

            <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% Modal %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">AGREGAR CARRERA</h4>
                        </div>
                        <div class="modal-body">
                            <form id="formcarrera">
                                <p>Datos de Carrera</p>

                                <div>
                                    <label for="">clave:</label><br>
                                    <input type="text"name="clave">
                                </div>
                                <br>
                                <div>
                                    <label for="">Nombre de carrera:</label><br>
                                    <input type="text" name="nombre">
                                </div>
                                <br>


                                    <div class="input-icon right">
                                        <!--<i class="fa fa-check" data-original-title=""></i>-->
                                        <select class="form-control" name="tipo"  aria-required="true" aria-invalid="false" aria-describedby="branch_id-error">
                                            <option value="">Seleccionar Tipo</option>
                                            <option value="diplomado">Diplomado</option>
                                            <option value="posgrado">Posgrado</option>
                                            <option value="pregrado">Pregrado</option>
                                            <option value="curso">Curso</option>
                                        </select>
                                    </div>

                                <br>
                                <div class="input-icon right">
                                    <!--<i class="fa fa-check" data-original-title=""></i>-->
                                    <select class="form-control" name="estado"  aria-required="true" aria-invalid="false" aria-describedby="branch_id-error">
                                        <option value="">Seleccionar Estado</option>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>
                                </div>
                                <br>

                                <div class="input-icon right">
                                    <!--<i class="fa fa-check" data-original-title=""></i>-->
                                    <select class="form-control" name="grupo"  aria-required="true" aria-invalid="false" aria-describedby="branch_id-error">
                                        <option value="">Seleccionar Grupo</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="carrera" data-dismiss="modal">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% Modal %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->

            <h2>Listado de Carreras</h2>

            <div style="width: 1000px; background: #FFFFFF;" class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Opciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carreras as $key => $carrera)
                        <tr id="carrera{{$carrera['idCarreras']}}">
                            <td>{{$carrera['idCarreras']}}</td>
                            <td>{{$carrera['Clave']}}</td>
                            <td>{{$carrera['Nombre_carrera']}}</td>
                            <td>{{$carrera['Tipo']}}</td>
                            <td>{{$carrera['Estado_Carrera']}}</td>


                            <td>
                                <a href="tiempo_disponible.html" style="margin-left: 15px;" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-pencil"> detalles</span>
                                </a>
                                <a href="#" style="margin-left: 15px;" class="btn btn-danger" id="eliminar">
                                    <span class="glyphicon glyphicon-pencil"> eliminar</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->




@extends('/templates/footer')
@section('scripts_per_page')
    {!! HTML::script('/public/global/scripts/modules/carreras/carreras.js') !!}
@endsection