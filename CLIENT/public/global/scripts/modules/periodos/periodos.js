/**
 * Created by enrique on 17/03/17.
 */
jQuery.fn.reset = function () {
    $(this).each (function() {
        this.reset();
    });
}
jQuery(document).ready(function () {
    $('#sample_editable_1_new').on('click', function () {
        $.ajax(
            {
                method: "GET",
                url: "/periodos/information",
                data: {},
            }
        ).done(function (data) {
            console.log(data);
            //$('#idUser').val(data[0].curp);
        });
    });
    $('#nuevoPeriodo').on('click', function () {
        $('#formPeriodos').reset();
        elemento = document.getElementById('form_control_1').className;
        $('#form_control_1').removeClass(elemento).addClass('form-control edited');
    })
});

function getPeriodosByID(idPeriodo) {
    $.ajax(
        {
            method: "POST",
            url: "/periodos/byID",
            data: {"id":idPeriodo},
        }
    ).done(function (data) {
        console.log(data);
    });
}