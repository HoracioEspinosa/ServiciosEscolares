@include('/templates/header')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Grupos
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="/">Inicio</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span></span>
                </li>
            </ul>
            <div class="page-toolbar">
            </div>
        </div>
        <!-- END PAGE HEADER-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@extends('/templates/footer')
@section('styles_per_page')
    <link rel="stylesheet" href="public/css/modules/grupos/grupos.css">
@endsection
@section('scripts_per_page')
    <script src="public/global/scripts/modules/groups/groups.js"></script>
@endsection