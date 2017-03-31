@include('/templates/header')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Mis calificaciones
            <small>Resultados generales</small>
        </h1>
        <!-- BEGIN STUDENT INFO TABLE-->
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    Alumno </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                        <tr>
                            <td> Matrícula </td>
                            <td>{{$userInf[0]['matricula']}}</td>
                        </tr>
                        <tr>
                            <td> Nombre </td>
                            <td>{{$userInf[0]['nombre']}} {{$userInf[0]['apellido']}} </td>
                        </tr>
                        <tr>
                            <td> Carrera </td>
                            <td> {{$studentCareer[0]['nombreCarrera']}} </td>

                        </tr>
                        <tr>
                            <td> Grupo </td>
                            <td>{{$studentGroup[0]['nombre']}}  {{$userInf[0]['turno']}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Student Information Table-->
        <!-- START GRADES TABLE-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    @foreach($studentSubject as $subject)
                        @if($subject['status']="activo")
                            <i class=""></i>Periodo {{$subject['inicio']}}  /  {{$subject['fin']}} </div>
                            @break;
                        @endif
                    @endforeach
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="reload"> </a>
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                    <tr>
                        <th width="5%"> Clave </th>
                        <th width="30%"> Materia </th>
                        <th width="30%"> Promedio </th>
                        <?php $var = 0; ?>
                        @foreach($studentGrades as $sub1)
                            @if($sub1['numeroUnidad']>$var)
                                <th width="30%"> Unidad{{$var+1}}</th>
                                <?php $var = $var+1; ?>
                            @endif
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($studentSubject as $subject)
                        @if($subject['status']="activo")
                        <tr>
                        <td width="5%"> {{$subject['idMaterias']}} </td>
                        <td width="30%"> {{$subject['nombre']}} </td>
                            <td width="30%">  </td>
                            @foreach($studentGrades as $sub1)
                                @if($sub1['idMaterias']==$subject['idMaterias'])
                                    @if($sub1['calificacion']==0)
                                        <td width="30%"> </td>
                                    @else
                                        <td width="30%"> {{$sub1['calificacion']}}</td>
                                    @endif

                                @endif
                            @endforeach
                        </tr>
                        @endif
                    @endforeach

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
$('.page-sidebar-menu').children('li').removeClass('active');
$('.page-sidebar-menu').children('li').eq(1).addClass('active');
var $SelectedChild=$('.page-sidebar-menu').children('li').eq(1).children('a');
$selectedChild.append('<span class="selected"></span>');