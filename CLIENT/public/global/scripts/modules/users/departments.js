/**
 * Created by dar5_ on 30/01/2017.
 */
// On load function
$(document).ready(function () {

});
$(".cancelDepartment").on('click', function () {
    var addDepartment = '<div class="form-actions"><button type="submit" class="btn green addDepartment">Agregar nuevo departamento</button></div>';
    $("#form_sample_8 .updateInputDepartment").html('').append(addDepartment);
    $("#form_sample_8 .cancelDepartment").html('');
    clearInputs();
});

$("#form_sample_8").on('click', '.restoreDepartment', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-idRestore');
    var pass = null;
    var uname = $("#uname").val();
    checkPasswordAdmin(id, uname, pass);
});

$('#checkDeleted input[type=radio]').on('change', function(){
    for(var i = 0; i < $("#sample_Departments").DataTable().page.info().length; i++){
        var data = $("#sample_Departments").DataTable().row(i).data();
        //console.log(data.deleted)
    }
    //$('#sample_Departments').empty();
    TableDatatablesManaged.departments();
});

function updateDepto() {
    var form2 = $('#form_sample_8');
    var error2 = $('.alert-danger', form2);
    var success2 = $('.alert-success', form2);
    if(  ( $("#id").val() == '' || $("#id").val() == null )  || ( $("#id_observation").val() == '' || $("#id_observation").val() == null )  || ( $("#token") == '' || $("#token") == null ) ) {
        form2.valid();
        $(".alert-danger span").html("Error al actualizar el departamento, verifique que tenga un departamento seleccionado.");
        success2.hide();
        error2.show().delay(5000).hide();
    } else {
        if( form2.valid() ) {
            updateDepartment(success2, error2);
            clearInputs();
        }
    }
}
// Element clicked function
$('.updateInputDepartment .updateDepartment').on('click', function (e) {

});

// Create a department
function createDepartment() {
    var form2 = $('#form_sample_8');
    var error2 = $('.alert-danger', form2);
    var success2 = $('.alert-success', form2);
    var options = {
        element: $("#form_sample_8"),
        background: $("body"),
        message: 'Cargando...'
    };
    App.myStartPageLoading(options);
    if($("#token") != '' || $("#token") != null){
        $.ajax({
            method: "POST",
            url: "/users/departments/create",
            data: $("#form_sample_8").serialize()
        }).done(function (data) {
            App.mystopPageLoading();
            if(data[0].MESSAGE != 'ERROR'){
                $(".alert-success span").html("Se ha agregado el nuevo departamento.").show();
                error2.hide();
                success2.show().delay(5000).hide();
            }else {
                $(".alert-danger span").html("Se han producido algunos errores, favor de verificar sus datos, de igual manera verificar que el departamento no exista.").show();
                success2.hide();
                error2.show().delay(5000).hide();
            }
            $('#sample_Departments').DataTable().ajax.reload();
        });
    }
    clearInputs();
}
// Update department
function updateDepartment() {
    var form2 = $('#form_sample_8');
    var error2 = $('.alert-danger', form2);
    var success2 = $('.alert-success', form2);
    if(  ( $("#id").val() == '' || $("#id").val() == null )  || ( $("#id_observation").val() == '' || $("#id_observation").val() == null )  || ( $("#token") == '' || $("#token") == null ) ) {
        $(".alert-danger span").html("Error al actualizar el departamento, verifique que tenga un departamento seleccionado.");
        success2.hide();
        error2.show().delay(5000).hide();
    } else {
        var options = {
            element: $("#form_sample_8"),
            background: $("body"),
            message: 'Cargando...'
        };
        App.myStartPageLoading(options);
        if($("#token") != '' || $("#token") != null){
            $.ajax({
                method: "PUT",
                url: "/users/departments/update",
                data: $("#form_sample_8").serialize()
            }).done(function (data) {
                App.mystopPageLoading();
                if(data[0].MESSAGE != 'ERROR'){
                    $(".alert-success span").html("Se ha actualizado el departamento.").show();
                    success2.show().delay(5000).hide();
                    error2.hide();
                }else {
                    $(".alert-danger span").html("Error al actualizar el departamento, verifique que tenga un departamento seleccionado.").show();
                    success2.hide();
                    error2.show().delay(5000).hide();
                }
                $('#sample_Departments').DataTable().ajax.reload();
            });
        }
    }
    clearInputs();
}

//trash department
function trashDepartment(id) {
    var tabla = $('.table-alerts');
    var error2 = $('.alert-danger', tabla);
    var success2 = $('.alert-success', tabla);
    if( id == null || id == 0 ) {
        $(".table-alerts .alert-danger span").html("Se ha producido un error al intentar mover el departamento a la papelera, intente nuevamente más tarde.");
        success2.hide();
        error2.show().delay(5000).hide();
    } else {
        var options = {
            element: $("#sample_Departments"),
            background: $("body"),
            message: 'Cargando...'
        };
        App.myStartPageLoading(options);
        if($("#token") != '' || $("#token") != null){
            $.ajax({
                method: "DELETE",
                url: "/users/departments/trash",
                data: { id: id }
            }).done(function (data) {
                App.mystopPageLoading();
                if(data[0].MESSAGE != 'ERROR'){
                    $(".table-alerts .alert-success span").html("Se ha mandado el departamento a la papelera.").show();
                    error2.hide();
                    success2.show().delay(5000).hide();
                }else {
                    $(".table-alerts .alert-danger span").html("Se ha producido un error al intentar mover el departamento a la papelera, intente nuevamente más tarde.").show();
                    success2.hide();
                    error2.show().delay(5000).hide();
                }
                $('#sample_Departments').DataTable().ajax.reload();
            });
        }
    }
    clearInputs();
}



function clearInputs() {
    $("#id").val("");
    $("#id_observation").val("");
    $("#name").val("");
    $("#observation").val("");
    $("#status").prop("selectedIndex", 0);
    $("#branch_id").prop("selectedIndex", 0);
    var addDepartment = '<div class="form-actions"><button type="submit" class="btn green addDepartment">Agregar nuevo departamento</button></div>';

    $("#form_sample_8 .updateInputDepartment").html('').append(addDepartment);
    $("#form_sample_8 .cancelDepartment").html('');
}

$('#TableBranchOffices tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
    }
    else {
        table.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
} );