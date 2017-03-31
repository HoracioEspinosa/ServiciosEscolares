<!DOCTYPE html>
<!--
Version: 1.0
Author: Horacio Darinel Espinosa Barceló
Website: http://www.cloudfrog.com.mx/
Contact: admin@cloudftog.com.mx
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Servicios escolares</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Servicios escolares" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" type="text/css">
    {!! HTML::style('/public/global/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! HTML::style('/public/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
    {!! HTML::style('/public/css/app.min.css') !!}
    {!! HTML::style('/public/global/plugins/datatables/datatables.min.css') !!}
    {!! HTML::style('/public/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
    {!! HTML::style('/public/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
    {!! HTML::style('/public/global/plugins/bootstrap-select/css/bootstrap-select.min.css') !!}
    {!! HTML::style('/public/global/css/components-md.min.css') !!}
    {!! HTML::style('/public/global/css/plugins-md.min.css') !!}
    {!! HTML::style('/public/layouts/layout2/css/layout.min.css') !!}
    {!! HTML::style('/public/layouts/layout2/css/themes/blue.min.css') !!}
    {!! HTML::style('/public/layouts/layout2/css/custom.min.css') !!}
    {!! HTML::style('/public/css/modules/users/users.min.css') !!}
    <style type="text/css">
        .page-content{ height: 100%;}
    </style>
<!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="/favicon.ico" /> 
</head>

    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<!-- END HEAD -->

<!-- <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">-->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md page-sidebar-closed">

<div class="loadinggeneral "></div>
<input type="hidden" value="{{ Cookie::get('token') }}" id="api-token">
<input type="hidden" value="{{ Cookie::get('token') }}" id="token">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/">
                <img src="/public/layouts/layout2/img/logo-default.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        <div class="page-actions">
            <div class="btn-group">
                <button type="button" class="btn btn-circle btn-outline blue dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-plus"></i>&nbsp;
                    <span class="hidden-sm hidden-xs">Nuevo&nbsp;</span>&nbsp;
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="javascript:;">
                            <i class="icon-user"></i> Usuario </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="icon-docs"></i> Alumno</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->
            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
            <form class="search-form search-form-expanded" action="#" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar..." name="query" id="searchByPage">
                    <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                </div>
            </form>
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class below "dropdown-extended" to change the dropdown styte -->
                    <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                    <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default"> 1 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold">1 notificación</span> pendiente</h3>
                                <a href="#">ver todas</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">9 días</span>
                                            <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                    <i class="fa fa-bolt"></i>
                                                </span> Error al realizar respaldo.
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-envelope-open"></i>
                            <span class="badge badge-default"> 1 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>Tienes
                                    <span class="bold">1 nuevo</span> mensaje</h3>
                                <a href="#">ver todos</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    <li>
                                        <a href="#">
                                            <span class="photo">
                                                <img src="/public/layouts/layout3/img/avatar11.jpg" class="img-circle" alt="">
                                            </span>
                                            <span class="subject">
                                                <span class="from"> Diana Fernández </span>
                                                <span class="time">46 mins </span>
                                            </span>
                                            <span class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="{{ $result['foto'] }}" />
                            <span class="username username-hide-on-mobile">{{ $result["nombre"] }} {{ $result["apellido"] }}</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="/users/profile">
                                    <i class="icon-user"></i> Perfil</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-envelope-open"></i> Mensajes
                                    <span class="badge badge-danger"> 3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="#l">
                                    <i class="icon-rocket"></i> Actividades
                                    <span class="badge badge-success"> 7 </span>
                                </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="/logout" >
                                    <i class="icon-logout" ></i> Cerrar sesión</a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- END SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                
                <li class="nav-item active">
                    <a href="/" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">Inicio</span>
                        <span class="selected"></span>
                    </a>
                </li>
<
                <li class="nav-item active">
                    <a href="/calificaciones" class="nav-link nav-toggle">
                        <i class="fa fa-book"></i>
                        <span class="title">Calificaciones</span>
                <li class="nav-item">
                    <a href="/profesores" class="nav-link nav-toggle">
                        <i class="icon-briefcase"></i>
                        <span class="title">Profesores</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item start">
                            <a href="/profesores/create" class="nav-link ">
                                <i class="fa fa-plus-circle"></i>
                                <span class="title">Agregar</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/users" class="nav-link nav-toggle">
                        <i class="icon-users"></i>
                        <span class="title">Usuarios</span>
                        <span class="selected"></span>
                    </a>

                <li class="nav-item">
                  <a href="/periodos" class="nav-link nav-toggle">
                  <i class="icon-calendar"></i> 
                  <span class="title">Periodos</span>          
                  <span class="arrow "></span>
                  </a>
                  <ul class="sub-menu">
                    <li >
                      <a href="/periodos/create">
                      <span class="badge badge-roundless badge-important">Nuevo</span>Crear</a>
                    </li>
                    <li >
                      <a href="/periodos/update">
                      Actualizar</a>
                    </li>
                    <li >
                      <a href="/periodos/destroy">
                      Eliminar</a>
                    </li>
                  </ul>

                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->