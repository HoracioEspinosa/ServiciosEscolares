<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet-body form">
    <form role="form" id="formPeriodosEditar">
        <div class="form-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <input type="hidden" name="id" value="" id="idPeriodos">
                        <select class="form-control" id="inPeriodo" name="periodo">
                            <option value="1">Enero - Abril</option>
                            <option value="2">Mayo - Agosto </option>
                            <option value="3">Septiembre - Diciembre</option>
                        </select>
                        <label for="inPeriodo">Periodo</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <input type="number" class="form-control " id="inAnio" name="anio">
                        <label for="inAnio">Año</label>
                        <span class="help-block">Año del periodo escolar</span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- END SAMPLE FORM PORTLET-->