<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Iniciar sesión</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #2 for " name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="/public/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/public/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/public/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/public/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="/public/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/public/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="/public/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="/public/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/public/pages/css/login-2.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class=" login">
<div class="loadinggeneral"></div>
<!-- BEGIN LOGO -->
<div class="logocontent" style="padding-top: 100px">
    <div class="logo">
        <a href="/login">
            <img src="/favicon.ico" style="margin-bottom: -30px;width: 125px;" alt="">
        </a>
    </div>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" id="formulario-login" action="#" method="get">
        <div class="form-title">
            <span class="form-title">Bienvenido, </span>
            <span class="form-subtitle">Por favor inicie sesión</span>
        </div>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Ingrese un usuario y contraseña. </span>
        </div>
        <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button>
            <span>  </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Correo electrónico</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Nombre de usuario" name="username" id="username" /> </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Contraseña" name="password" id="password" /> </div>
        <div class="form-actions">
            <button type="submit" class="btn red btn-block uppercase login-btn" id="login-btn">Iniciar sesión</button>
        </div>
        <div class="form-actions">
            <div class="pull-left">
                <label class="rememberme mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" value="1" /> Recordarme
                    <span></span>
                </label>
            </div>
            <div class="pull-right forget-password-block">
                <a href="javascript:;" id="forget-password" class="forget-password">¿Olvidó su contraseña?</a>
            </div>
        </div>
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" id="forget-form" action="index.html" method="post">
        <div class="form-title">
            <span class="form-title">¿Olvidó su contraseña?,</span>
            <span class="form-subtitle">Ingrese su correo</span>
        </div>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> </span>
        </div>
        <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button>
            <span>  </span>
        </div>
        <div class="form-group">
            <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Correo electrónico" name="email" id="email" /> </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn btn-default">Regresar</button>
            <button type="submit" class="btn btn-primary uppercase pull-right">Enviar</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!--[if lt IE 9]>
<script src="/public/global/plugins/respond.min.js"></script>
<script src="/public/global/plugins/excanvas.min.js"></script>
<script src="/public/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="/public/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/public/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/public/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="/public/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/public/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/public/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/public/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/public/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="/public/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="/public/global/scripts/app.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/public/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>