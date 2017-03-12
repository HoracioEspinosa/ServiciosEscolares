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
    <title>Recuperación de contraseña</title>
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
    <link rel="shortcut icon" href="/favicon.ico" /> </head>
<!-- END HEAD -->

<body class=" login">
<div class="loadinggeneral"></div>
<!-- BEGIN LOGO -->
<div class="logocontent" style="padding-top: 100px">
    <div class="logo">
        <a href="/login">
            <img src="/public/layouts/layout2/img/logo-default.png" style="margin-bottom: -10px;" alt="" /> </a>
    </div>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="reset-form" id="formulario-reset" action="#" method="get">
        <div class="form-title" style="text-align: center">
            <span class="form-title">Recuperación de contraseña </span>
        </div>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Las contraseñas no coinciden. </span>
        </div>
        <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button>
            <span>  </span>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Token</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="hidden" autocomplete="off" placeholder="Token" name="token" id="token" value="{{ $_GET['token'] }}" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="hidden" autocomplete="off" placeholder="Email" name="email" id="email" value="{{ $_GET['email'] }}" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Nueva contraseña</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Nueva contraseña" name="password" id="password" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Confirmar contraseña</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirmar contraseña" name="retypepassword" id="retypepassword" />
        </div>
        <div class="form-actions">
            <button type="submit" class="btn red btn-block uppercase login-btn" id="reset-btn">Actualizar contraseña</button>
        </div>
    </form>
    <!-- END LOGIN FORM -->
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
<script src="/public/pages/scripts/reset.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>