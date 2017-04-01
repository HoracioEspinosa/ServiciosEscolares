/**
 * Created by enrique on 17/03/17.
 */
jQuery.fn.reset = function () {
    $(this).each (function() {
        this.reset();
    });
}
jQuery(document).ready(function () {
    /*$('#sample_editable_1_new').on('click', function () {
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
    });*/
    $('#nuevoPeriodo').on('click', function () {
        $('#formPeriodos').reset();
        elemento = document.getElementById('form_control_1').className;
        $('#form_control_1').removeClass(elemento).addClass('form-control edited');
    })
});

function createPeriodo(){
    var options = {
        element: $("#formPeriodos"),
        background: $("body"),
        message: 'Procesando...'
    };
    App.myStartPageLoading(options);
    $.ajax(
        {
            method: "POST",
            url: "/periodos/create",
            data: $("#formPeriodos").serialize(),
        }
    ).done(function (data) {
        App.mystopPageLoading();
        //$('#tabla_periodos').DataTable().ajax.reload();
        //console.log(data);
        //if(data == 'OK'){
          location.reload();
        //}
    });
}
function getPeriodosByID(idPeriodo) {
    $.ajax(
        {
            method: "GET",
            url: "/periodos/update/"+idPeriodo,
            data: {},
        }
    ).done(function (data) {
        if(data[0].inicio == "enero"){
            $('#inPeriodo').val(1);
        }
        else if(data[0].inicio == "mayo"){
            $('#inPeriodo').val(2);
        }else{
            $('#inPeriodo').val(3);
        }
        $('#idPeriodos').val(data[0].idPeriodos);
        elemento = document.getElementById('inAnio').className;
        $('#inAnio').removeClass(elemento).addClass('form-control edited');
        $('#inAnio').val(data[0].anio);
        //$('#log').html(data);
        console.log(data[0].inicio);
    });
}

function update() {
    var options = {
        element: $("#formPeriodos"),
        background: $("body"),
        message: 'Procesando...'
    };
    App.myStartPageLoading(options);
    $.ajax(
        {
            method: "POST",
            url: "/periodos/update",
            data: $("#formPeriodosEditar").serialize(),
        }
    ).done(function (data) {
        App.mystopPageLoading();
        location.reload();
        //console.log(data)
    });
}

function deletePeriod(id) {
    var options = {
        element: $("#formPeriodos"),
        background: $("body"),
        message: 'Procesando...'
    };
   // App.myStartPageLoading(options);
    $.ajax(
        {
            method: "POST",
            url: "/periodos/delete",
            data: 'id='+id,
        }
    ).done(function (data) {
        App.mystopPageLoading();
        location.reload();
        //console.log(data)
    });
}

function changeStatus(id, status) {
    var options = {
        element: $("#formPeriodos"),
        background: $("body"),
        message: 'Procesando...'
    };
    // App.myStartPageLoading(options);
    $.ajax(
        {
            method: "POST",
            url: "/periodos/changeStatus",
            data: 'id='+id+'&status='+status,
        }
    ).done(function (data) {
        //App.mystopPageLoading();
        //location.reload();
        //console.log(data)
    });
}