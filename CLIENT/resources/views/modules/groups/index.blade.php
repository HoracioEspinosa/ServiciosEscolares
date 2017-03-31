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
                    <span>grupos</span>
                </li>
            </ul>
            <div class="page-toolbar">
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <?php
        $count = 0;
        ?>
        @foreach($groups as $group)
            @if($count == 0)
                <div class="col-sm-12">
            @elseif($count == 6)
                <?php $count = 0; ?>
            @endif
            <div class="col-sm-2 grupo" data-id="{{$group['idGrupos']}}">
                <h2>Nombre: {{$group['nombre']}}</h2>
                <h4>Cantidad de Alumnos: {{$group['cantidadAlumnos']}}</h4>
            </div>
                <?php $count++; ?>
            @if($count == 6)
                </div>
                <?php $count = 0; ?>
            @endif
        @endforeach
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