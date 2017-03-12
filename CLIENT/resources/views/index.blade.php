@include('/templates/header')
<!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h1 class="page-title"> Inicio
                <small>Resultados generales</small>
            </h1>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="/">Inicio</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Resultados generales</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                            Acciones
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="#">
                                    <i class="icon-bell"></i> Agregar reservación
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <pre>{!!  $token !!}</pre>
            <!-- END PAGE HEADER-->
            <div class="row">
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@include('/templates/footer')