8@include('/templates/header')
<input type="hidden" id="uname" value="{{ $result['uname'] }}">
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Perfil de usuario</h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/">Inicio</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="/users">Usuarios</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="/users/profile">Perfil</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">

                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="profile-sidebar">
                    <!-- PORTLET MAIN -->
                    <div class="portlet light profile-sidebar-portlet ">
                        <!-- SIDEBAR USERPIC -->
                        <div class="profile-userpic">
                            <img src="{{ $active["photo"] }}" class="img-responsive" alt=""> </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"> {{ $active["name"]." ".$active["lastname"] }} </div>
                            <div class="profile-usertitle-job"> {{ $active["level_name"] }} </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR BUTTONS -->
                        <div class="profile-userbuttons">
                            <button type="button" class="btn btn-circle green btn-sm">Llamar</button>
                            <button type="button" class="btn btn-circle red btn-sm">Mensaje</button>
                        </div>
                        <!-- END SIDEBAR BUTTONS -->
                        <!-- SIDEBAR MENU -->
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li class="active">
                                    <a href="#">
                                        <i class="icon-home"></i> Información general</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-settings"></i> Configuración de cuenta</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-info"></i> Ayuda</a>
                                </li>
                            </ul>
                        </div>
                        <!-- END MENU -->
                    </div>
                    <!-- END PORTLET MAIN -->
                    <!-- PORTLET MAIN -->
                    <div class="portlet light ">
                        <!-- STAT -->
                        <div class="row list-separated profile-stat">
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> 37 </div>
                                <div class="uppercase profile-stat-text"> Reservaciones </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> 51 </div>
                                <div class="uppercase profile-stat-text"> Tareas </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="uppercase profile-stat-title"> 61 </div>
                                <div class="uppercase profile-stat-text"> Mensajes</div>
                            </div>
                        </div>
                        <!-- END STAT -->
                        <div>
                            <h4 class="profile-desc-title">Acerca de {{ $active["name"]." ".$active["lastname"] }}</h4>
                            <span class="profile-desc-text"> Mi pequeña descripción </span>
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-phone"></i>
                                <a href="tel:+52{{ str_replace(array('(',')','-',' '),'',$active["extra_phones"]) }}"> +52 {{ $active["extra_phones"] }}</a>
                            </div>
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-home"></i>
                                <span> {{ $active["address"] }}</span>
                            </div>
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:{{ $active["email"] }}">{{ $active["email"] }}</a>
                            </div>
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-lock"></i>
                                <span>{{ $active["code"] }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET MAIN -->
                </div>
                <!-- END BEGIN PROFILE SIDEBAR -->
                <!-- BEGIN PROFILE CONTENT -->
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- BEGIN PORTLET -->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <i class="icon-bar-chart theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Mi actividad</span>
                                        <span class="caption-helper hide">weekly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">Hoy</label>
                                            <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Semana</label>
                                            <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Mes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row number-stats margin-bottom-30">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="stat-left">
                                                <div class="stat-chart">
                                                    <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                    <div id="sparkline_bar"></div>
                                                </div>
                                                <div class="stat-number">
                                                    <div class="title"> Total </div>
                                                    <div class="number"> 2460 </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="stat-right">
                                                <div class="stat-chart">
                                                    <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                    <div id="sparkline_bar2"></div>
                                                </div>
                                                <div class="stat-number">
                                                    <div class="title"> Nuevos </div>
                                                    <div class="number"> 719 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover table-light">
                                            <thead>
                                            <tr class="uppercase">
                                                <th> Earnings </th>
                                                <th> CASES </th>
                                                <th> CLOSED </th>
                                                <th> RATE </th>
                                            </tr>
                                            </thead>
                                            <tr>
                                                <td> $345 </td>
                                                <td> 45 </td>
                                                <td> 124 </td>
                                                <td>
                                                    <span class="bold theme-font">80%</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> $345 </td>
                                                <td> 45 </td>
                                                <td> 124 </td>
                                                <td>
                                                    <span class="bold theme-font">80%</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> $345 </td>
                                                <td> 45 </td>
                                                <td> 124 </td>
                                                <td>
                                                    <span class="bold theme-font">80%</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> $345 </td>
                                                <td> 45 </td>
                                                <td> 124 </td>
                                                <td>
                                                    <span class="bold theme-font">80%</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET -->
                        </div>
                        <div class="col-md-6">
                            <!-- BEGIN PORTLET -->
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption caption-md">
                                        <i class="icon-globe theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Historial</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_1_1" data-toggle="tab"> Sistema </a>
                                        </li>
                                        <li>
                                            <a href="#tab_1_2" data-toggle="tab"> Activitidades </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <!--BEGIN TABS-->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1_1">
                                            <div class="scroller" style="height: 320px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                <ul class="feeds">
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New application received. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 21 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> Dev90 web server restarted. Pending overall system check. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 22 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New member registered. Pending approval </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 21 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> L45 Network failure. Schedule maintenance. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 22 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> Order canceled with failed payment. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 21 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> Web-A2 clound instance created. Schedule full scan. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 22 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-default">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> Member canceled. Schedule account review. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 21 hours </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-bullhorn"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> New order received. Please take care of it. </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 22 hours </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_1_2">
                                            <div class="scroller" style="height: 337px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                <ul class="feeds">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New order received </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> 10 mins </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-danger">
                                                                        <i class="fa fa-bolt"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc"> Order #24DOP4 has been rejected.
                                                                        <span class="label label-sm label-danger "> Take action
                                                                                        <i class="fa fa-share"></i>
                                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date"> 24 mins </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <div class="col1">
                                                                <div class="cont">
                                                                    <div class="cont-col1">
                                                                        <div class="label label-sm label-success">
                                                                            <i class="fa fa-bell-o"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="cont-col2">
                                                                        <div class="desc"> New user registered </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col2">
                                                                <div class="date"> Just now </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END TABS-->
                                </div>
                            </div>
                            <!-- END PORTLET -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- BEGIN PORTLET -->
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <i class="icon-bar-chart theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Comentarios y mensajes</span>
                                        <span class="caption-helper">45 pendientes</span>
                                    </div>
                                    <div class="inputs">
                                        <div class="portlet-input input-inline input-small ">
                                            <div class="input-icon right">
                                                <i class="icon-magnifier"></i>
                                                <input type="text" class="form-control form-control-solid" placeholder="buscar..."> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                        <div class="general-item-list">
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="/public/pages/media/users/avatar4.jpg">
                                                        <a href="" class="item-name primary-link">Nick Larson</a>
                                                        <span class="item-label">3 hrs ago</span>
                                                    </div>
                                                    <span class="item-status">
                                                                    <span class="badge badge-empty badge-success"></span> Open</span>
                                                </div>
                                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="/public/pages/media/users/avatar3.jpg">
                                                        <a href="" class="item-name primary-link">Mark</a>
                                                        <span class="item-label">5 hrs ago</span>
                                                    </div>
                                                    <span class="item-status">
                                                                    <span class="badge badge-empty badge-warning"></span> Pending</span>
                                                </div>
                                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat tincidunt ut laoreet. </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="/public/pages/media/users/avatar6.jpg">
                                                        <a href="" class="item-name primary-link">Nick Larson</a>
                                                        <span class="item-label">8 hrs ago</span>
                                                    </div>
                                                    <span class="item-status">
                                                                    <span class="badge badge-empty badge-primary"></span> Closed</span>
                                                </div>
                                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh. </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="/public/pages/media/users/avatar7.jpg">
                                                        <a href="" class="item-name primary-link">Nick Larson</a>
                                                        <span class="item-label">12 hrs ago</span>
                                                    </div>
                                                    <span class="item-status">
                                                                    <span class="badge badge-empty badge-danger"></span> Pending</span>
                                                </div>
                                                <div class="item-body"> Consectetuer adipiscing elit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="/public/pages/media/users/avatar9.jpg">
                                                        <a href="" class="item-name primary-link">Richard Stone</a>
                                                        <span class="item-label">2 days ago</span>
                                                    </div>
                                                    <span class="item-status">
                                                                    <span class="badge badge-empty badge-danger"></span> Open</span>
                                                </div>
                                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, ut laoreet dolore magna aliquam erat volutpat. </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="/public/pages/media/users/avatar8.jpg">
                                                        <a href="" class="item-name primary-link">Dan</a>
                                                        <span class="item-label">3 days ago</span>
                                                    </div>
                                                    <span class="item-status">
                                                                    <span class="badge badge-empty badge-warning"></span> Pending</span>
                                                </div>
                                                <div class="item-body"> Lorem ipsum dolor sit amet, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img class="item-pic" src="/public/pages/media/users/avatar2.jpg">
                                                        <a href="" class="item-name primary-link">Larry</a>
                                                        <span class="item-label">4 hrs ago</span>
                                                    </div>
                                                    <span class="item-status">
                                                                    <span class="badge badge-empty badge-success"></span> Open</span>
                                                </div>
                                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET -->
                        </div>
                        <div class="col-md-6">
                            <!-- BEGIN PORTLET -->
                            <div class="portlet light  tasks-widget">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <i class="icon-bar-chart theme-font hide"></i>
                                        <span class="caption-subject font-blue-madison bold uppercase">Tareas pendientes</span>
                                        <span class="caption-helper">16 pendientes</span>
                                    </div>
                                    <div class="inputs">
                                        <div class="portlet-input input-small input-inline">
                                            <div class="input-icon right">
                                                <i class="icon-magnifier"></i>
                                                <input type="text" class="form-control form-control-solid" placeholder="buscar..."> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="task-content">
                                        <div class="scroller" style="height: 282px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                            <!-- START TASK LIST -->
                                            <ul class="task-list">
                                                <li>
                                                    <div class="task-checkbox">
                                                        <input type="hidden" value="1" name="test" />
                                                        <input type="checkbox" class="liChild" value="2" name="test" /> </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Present 2013 Year IPO Statistics at Board Meeting </span>
                                                        <span class="label label-sm label-success">Company</span>
                                                        <span class="task-bell">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <input type="checkbox" class="liChild" value="" /> </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Hold An Interview for Marketing Manager Position </span>
                                                        <span class="label label-sm label-danger">Marketing</span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <input type="checkbox" class="liChild" value="" /> </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> AirAsia Intranet System Project Internal Meeting </span>
                                                        <span class="label label-sm label-success">AirAsia</span>
                                                        <span class="task-bell">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <input type="checkbox" class="liChild" value="" /> </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Technical Management Meeting </span>
                                                        <span class="label label-sm label-warning">Company</span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <input type="checkbox" class="liChild" value="" /> </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Kick-off Company CRM Mobile App Development </span>
                                                        <span class="label label-sm label-info">Internal Products</span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <input type="checkbox" class="liChild" value="" /> </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Prepare Commercial Offer For SmartVision Website Rewamp </span>
                                                        <span class="label label-sm label-danger">SmartVision</span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <input type="checkbox" class="liChild" value="" /> </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Sign-Off The Comercial Agreement With AutoSmart </span>
                                                        <span class="label label-sm label-default">AutoSmart</span>
                                                        <span class="task-bell">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="task-checkbox">
                                                        <input type="checkbox" class="liChild" value="" /> </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> Company Staff Meeting </span>
                                                        <span class="label label-sm label-success">Cruise</span>
                                                        <span class="task-bell">
                                                                        <i class="fa fa-bell-o"></i>
                                                                    </span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="last-line">
                                                    <div class="task-checkbox">
                                                        <input type="checkbox" class="liChild" value="" /> </div>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> KeenThemes Investment Discussion </span>
                                                        <span class="label label-sm label-warning">KeenThemes </span>
                                                    </div>
                                                    <div class="task-config">
                                                        <div class="task-config-btn btn-group">
                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                <i class="fa fa-cog"></i>
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-check"></i> Complete </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">
                                                                        <i class="fa fa-trash-o"></i> Cancel </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- END START TASK LIST -->
                                        </div>
                                    </div>
                                    <div class="task-footer">
                                        <div class="btn-arrow-link pull-right">
                                            <a href="javascript:;">Ver todas las tareas</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET -->
                        </div>
                    </div>

                </div>
                <!-- END PROFILE CONTENT -->
            </div>
        </div>
        <!-- END PAGE HEADER-->
    </div>
    <!-- END CONTENT BODY -->
</div>
@extends('/templates/footer')
@section('scripts_per_page')
    {!! HTML::script("/public/global/scripts/modules/userFunctions.js") !!}
    {!! HTML::script("/public/global/plugins/jquery.sparkline.min.js") !!}
    {!! HTML::script("/public/pages/scripts/profile.min.js") !!}
@endsection
@section('styles_per_page')
    {!! HTML::style('/public/pages/css/profile.min.css') !!}
@endsection