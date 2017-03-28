</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2016 &copy; Sistema administrativo
        <a target="_blank" href="http://www.serviciosescolares.mx">Servicios escolares</a> &nbsp
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
</div>
<!-- END FOOTER -->
@yield('styles_per_page')
<!--[if lt IE 9]>
{!! HTML::script('/public/global/plugins/respond.min.js') !!}
{!! HTML::script('/public/global/plugins/excanvas.min.js') !!}
{!! HTML::script('/public/global/plugins/ie8.fix.min.js') !!}
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
{!! HTML::script('/public/global/plugins/jquery.min.js') !!}
{!! HTML::script('/public/global/plugins/bootstrap/js/bootstrap.min.js') !!}

{!! HTML::script('/public/global/plugins/js.cookie.min.js') !!}
{!! HTML::script('/public/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
{!! HTML::script('/public/global/plugins/jquery.blockui.min.js') !!}
{!! HTML::script('/public/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
{!! HTML::script('/public/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') !!}
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
{!! HTML::script("/public/global/scripts/datatable.js") !!}
{!! HTML::script("/public/global/plugins/datatables/datatables.all.min.js") !!}
{!! HTML::script("/public/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js") !!}
{!! HTML::script("/public/global/plugins/jquery-validation/js/jquery.validate.min.js") !!}
{!! HTML::script("/public/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js") !!}
{!! HTML::script("/public/global/plugins/jquery.input-ip-address-control-1.0.min.js") !!}

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->
{!! HTML::script('/public/global/scripts/app.js') !!}

<!-- END THEME GLOBAL SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
{!! HTML::script("/public/pages/scripts/table-datatables-managed.js") !!}

{!! HTML::script("/public/global/plugins/bootbox/bootbox.min.js") !!}
{!! HTML::script("/public/pages/scripts/ui-bootbox.js") !!}
{!! HTML::script("/public/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js") !!}
{!! HTML::script('/public/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
{!! HTML::script("/public/global/plugins/bootstrap-select/js/bootstrap-select.min.js") !!}
{!! HTML::script("/public/pages/scripts/form-validation.js") !!}
{!! HTML::script("/public/pages/scripts/form-input-mask.min.js") !!}

<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
{!! HTML::script('/public/layouts/layout2/scripts/layout.min.js') !!}
{!! HTML::script('/public/layouts/layout2/scripts/demo.min.js') !!}
{!! HTML::script('/public/layouts/global/scripts/quick-sidebar.min.js') !!}
{!! HTML::script('/public/layouts/global/scripts/quick-nav.min.js') !!}
{!! HTML::script('/public/global/scripts/global.js') !!}
{!! HTML::script("/public/pages/scripts/components-bootstrap-select.js") !!}

@yield('scripts_per_page')
<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>