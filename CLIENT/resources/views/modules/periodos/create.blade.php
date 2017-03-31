<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet-body form">
    <form role="form" id="formPeriodos">
        <div class="form-body">
            <!--<div class="row">
                <div class="col-md-6">
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <input type="text" class="form-control edited" id="form_control_1" name="incio_periodo" value="Enero">
                        <label for="form_control_1">Inicio</label>
                        <span class="help-block">Mes que inicia el periodo escolar</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <input type="text" class="form-control " id="form_control_2" name="fin_periodo">
                        <label for="form_control_2">Fin</label>
                        <span class="help-block">Mes que finaliza el periodo escolar</span>
                    </div>
                </div>
            </div>-->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <select class="form-control" id="form_control_1" name="periodo">
                            <option value="1">Enero - Abril</option>
                            <option value="2">Mayo - Agosto </option>
                            <option value="3">Septiembre - Diciembre</option>
                        </select>
                        <label for="form_control_1">Periodo</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input form-md-floating-label">
                        <input type="number" class="form-control " id="form_control_2" name="anio">
                        <label for="form_control_2">Año</label>
                        <span class="help-block">Año del periodo escolar</span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- END SAMPLE FORM PORTLET-->