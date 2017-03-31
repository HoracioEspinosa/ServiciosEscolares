@include('/templates/header')

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
                    <a href="horario.html">Asignacion de horarios</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Registro tiempo disponible</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->

        <h1 class="page-title"> Asignacion de Horario
            <small>Docentes</small>
        </h1>

        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <div class="container">
            <h2>Registro de Horario</h2>

            <div style="width: 1000px;" class="table-responsive">
                <table class="table">
                    <thead>


                    </thead>
                    <tbody style="background: #F9F9F9;">
                    <tr>
                        <th> cedula: </th>
                        <td>0198766373</td>
                    </tr>
                    <tr>
                        <th>Apellidos: </th>
                        <td>Perez R</td>
                    </tr>
                    <tr>
                        <th>Nombres: </th>
                        <td>German</td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <form action="">
                <div style="width: 1000px;" class="input-icon right">
                    <!--<i class="fa fa-check" data-original-title=""></i>-->
                    <select class="form-control" name="tipo"  aria-required="true" aria-invalid="false" aria-describedby="branch_id-error">
                        <option value="">Seleccionar una Carrera</option>
                        <option value="turismo">Turismo</option>
                        <option value="administracion">Administracion</option>
                        <option value="software">Software</option>
                        <option value="cocina">Cocina</option>
                    </select>
                </div>
                <br>
                <div style="width: 1000px;" class="input-icon right">
                    <!--<i class="fa fa-check" data-original-title=""></i>-->
                    <select class="form-control" name="tipo"  aria-required="true" aria-invalid="false" aria-describedby="branch_id-error">
                        <option value="">Seleccionar un Nivel</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <br>
                <div style="width: 1000px;" class="input-icon right">
                    <!--<i class="fa fa-check" data-original-title=""></i>-->
                    <select class="form-control" name="tipo"  aria-required="true" aria-invalid="false" aria-describedby="branch_id-error">
                        <option value="">Seleccionar una Materia</option>
                        <option value="">analisis de sistemas</option>
                        <option value="posgrado">redes</option>
                        <option value="pregrado">algoritmos</option>
                        <option value="curso">ingles</option>
                    </select>
                </div>
            </form>


            <h2>Horario</h2>
            <div style="width: 1000px;" class="table-responsive">
                <table class="table">
                    <thead>
                    <tr style="background: #8BD7D4;">
                        <th>Hora/Dia</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sabado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="background: #8BD7D4;">07:00-08:00</td>
                        <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                        <td></td>
                        <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                        <td></td>
                        <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td style="background: #8BD7D4;">08:00-09:00</td>
                        <td><input type="checkbox" name="vehicle1" value=""></td>
                        <td></td>
                        <td><input type="checkbox" name="vehicle1" value=""></td>
                        <td></td>
                        <td><input type="checkbox" name="vehicle1" value=""></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td style="background: #8BD7D4;">09:00-10:00</td>
                        <td></td>
                        <td></td>
                        <td><input type="checkbox" name="vehicle1" value=""></td>
                        <td><input type="checkbox" name="vehicle1" value=""></td>
                        <td><input type="checkbox" name="vehicle1" value=""></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td style="background: #8BD7D4;">10:00-11:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="checkbox" name="vehicle1" value=""></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td style="background: #8BD7D4;">11:00-12:00</td>
                        <td><input type="checkbox" name="vehicle1" value=""></td>
                        <td></td>
                        <td></td>
                        <td><input type="checkbox" name="vehicle1" value=""></td>
                        <td><input type="checkbox" name="vehicle1" value=""></td>
                        <td></td>
                    </tr>





                    </tbody>
                </table>
            </div>

            <input type="submit" class="button" value="Registrar">



        </div>
    </div>

    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

@extends('/templates/footer')