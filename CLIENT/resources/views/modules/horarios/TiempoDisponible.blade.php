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
                        
                        <h1 class="page-title"> Asignacion de Horarios
                            <small>Docentes</small>
                        </h1>

                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->

                        <div class="container">
                          <h2>Registro de Tiempo Disponible</h2>
                                                                                                                
                          <div style="width: 1000px;" class="table-responsive">          
                          <table class="table">
                            <thead>
                              
                              
                            </thead>
                            <tbody style="background: #F9F9F9;">
                              <tr>
                                <th> cedula: </th>
                                <td>{{$informacion[$id]['curp']}}</td>
                              </tr>
                              <tr>
                                  <th>Apellidos: </th>
                                  <td>{{$informacion[$id]['apellido']}}</td>
                              </tr>
                              <tr>
                                  <th>Nombres: </th>
                                  <td>{{$informacion[$id]['nombre']}}</td>
                              </tr>
                            </tbody>
                          </table>
                          </div>


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
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                              </tr>
                              
                              <tr>
                                <td style="background: #8BD7D4;">08:00-09:00</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                              </tr>

                              <tr>
                                <td style="background: #8BD7D4;">09:00-10:00</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                              </tr>

                              <tr>
                                <td style="background: #8BD7D4;">10:00-11:00</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                              </tr>

                              <tr>
                                <td style="background: #8BD7D4;">11:00-12:00</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                              </tr>

                              <tr>
                                <td style="background: #8BD7D4;">12:00-13:00</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                              </tr>

                              <tr>
                                <td style="background: #8BD7D4;">13:00-14:00</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                              </tr>

                              <tr>
                                <td style="background: #8BD7D4;">14:00-15:00</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                              </tr>

                              <tr>
                                <td style="background: #8BD7D4;">15:00-16:00</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                              </tr>

                              <tr>
                                <td style="background: #8BD7D4;">16:00-17:00</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                              </tr>

                              <tr>
                                <td style="background: #8BD7D4;">17:00-18:00</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                              </tr>

                              <tr>
                                <td style="background: #8BD7D4;">18:00-19:00</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                              </tr>

                              <tr>
                                <td style="background: #8BD7D4;">19:00-20:00</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"></td>
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


@include('/templates/footer')