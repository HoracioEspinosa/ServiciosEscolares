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
                                    <span>Asignacion de horarios</span>
                                </li>
                            </ul>
                            
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        
                        <h1 class="page-title"> Asignacion de Horarios
                            
                        </h1>

                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->

                        <div class="container">
                          <h2>Listado de Docentes</h2>
                                                                                                                
                          <div class="table-responsive">          
                          <table class="table">
                            <thead>
                              <tr>

                                <th>Cedula</th>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Edad</th>
                                <th>Fecha de ingreso</th>
                                <th>opciones</th>
                              </tr>
                            </thead>
                            <tbody>

                            @foreach($informacion as $key => $informacion)

                                <tr id="inf{{$informacion['idInformacion']}}">
                                    <td>{{$informacion['curp']}}</td>
                                    <td>{{$informacion['apellido']}}</td>
                                    <td>{{$informacion['nombre']}}</td>
                                    <td>{{$informacion['edad']}}</td>
                                    <td>{{$informacion['fecha_ingreso']}}</td>
                                    <td>
                                        <a href="/horario/disponible/{{$informacion['idProfesores']}}"  style="margin-left: 15px;" class="btn btn-success">
                                            <span class="glyphicon glyphicon-pencil"> tiempo disponible</span>
                                        </a>
                                        <a href="/horario/docente" style="margin-left: 15px;" class="btn btn-success">
                                            <span class="glyphicon glyphicon-pencil"> horario</span>
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





@include('/templates/footer')