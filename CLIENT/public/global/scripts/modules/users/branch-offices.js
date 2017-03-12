/**
 * Created by dar5_ on 04/02/2017.
 */
// On load function
$(document).ready(function () {

});
$(".cancelBranchOffices").on('click', function () {
    var addBranchOffice = '<div class="form-actions"><button type="submit" class="btn green addBranchOffice">Agregar nuevo departamento</button></div>';
    $("#form_sample_2 .updateInputBranchOffices").html('').append(addBranchOffice);
    $("#form_sample_2 .cancelBranchOffices").html('');
    clearInputsBranch();
});

$("#form_sample_2").on('click', '.restoreBranchOffices', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-idRestore');
    var pass = null;
    var uname = $("#uname").val();
    checkPasswordAdminBranch(id, uname, pass);
});

$('#checkDeleted input[type=radio]').on('change', function(){
    for(var i = 0; i < $("#TableBranchOffices").DataTable().page.info().length; i++){
        var data = $("#TableBranchOffices").DataTable().row(i).data();
    }
    //$('#TableBranchOffices').empty();
    TableDatatablesManaged.branch_offices();
});

function updateBranchOffices() {
    var form2 = $('#form_sample_2');
    var error2 = $('.alert-danger', form2);
    var success2 = $('.alert-success', form2);
    if(  ( $("#id").val() == '' || $("#id").val() == null )  || ( $("#id_observation").val() == '' || $("#id_observation").val() == null )  || ( $("#token") == '' || $("#token") == null ) ) {
        form2.valid();
        $(".alert-danger span").html("Error al actualizar la sucursal, verifique que tenga una sucursal seleccionada.");
        success2.hide();
        error2.show().delay(5000).hide();
    } else {
        if( form2.valid() ) {
            updateBranch();

        }
    }
}

// Create a department
function createBranchOffice() {
    var form2 = $('#form_sample_2');
    var error2 = $('.alert-danger', form2);
    var success2 = $('.alert-success', form2);
    var options = {
        element: $("#form_sample_2"),
        background: $("body"),
        message: 'Cargando...'
    };
    App.myStartPageLoading(options);
    if($("#token") != '' || $("#token") != null){
        $.ajax({
            method: "POST",
            url: "/users/branch-offices/create",
            data: $("#form_sample_2").serialize()
        }).done(function (data) {
            App.mystopPageLoading();
            if(data[0].MESSAGE != 'ERROR'){
                $(".alert-success span").html("Se ha agregado la nueva sucursal.").show();
                error2.hide();
                success2.show().delay(5000).hide();
            }else {
                $(".alert-danger span").html("Se han producido algunos errores, favor de verificar sus datos, de igual manera verificar la sucursal no exista.").show();
                success2.hide();
                error2.show().delay(5000).hide();
            }
            $('#TableBranchOffices').DataTable().ajax.reload();
        });
    }
    clearInputsBranch();
}
// Update department
function updateBranch() {
    var form2 = $('#form_sample_2');
    var error2 = $('.alert-danger', form2);
    var success2 = $('.alert-success', form2);
    if(  ( $("#id").val() == '' || $("#id").val() == null )  || ( $("#id_observation").val() == '' || $("#id_observation").val() == null )  || ( $("#token").val() == '' || $("#token").val() == null ) ) {
        $(".alert-danger span").html("Error al actualizar la sucursal, verifique que tenga una sucursal seleccionada.");
        success2.hide();
        error2.show().delay(5000).hide();
    } else {
        var options = {
            element: $("#form_sample_2"),
            background: $("body"),
            message: 'Cargando...'
        };
        App.myStartPageLoading(options);
        if($("#token").val() != '' || $("#token").val() != null){
            $.ajax({
                method: "PUT",
                url: "/users/branch-offices/update",
                data: $("#form_sample_2").serialize()
            }).success(function (data) {
            }).error(function (data) {
            }).done(function (data) {
                App.mystopPageLoading();
                if(data[0].MESSAGE != 'ERROR'){
                    $(".alert-success span").html("Se ha actualizado la sucursal.").show();
                    success2.show().delay(5000).hide();
                    error2.hide();
                }else {
                    $(".alert-danger span").html("Error al actualizar la sucursal, verifique que tenga una sucursal seleccionada.").show();
                    success2.hide();
                    error2.show().delay(5000).hide();
                }
                clearInputsBranch();
                $('#TableBranchOffices').DataTable().ajax.reload();
            });
            App.myStartPageLoading(options);
        }
    }
    clearInputsBranch();
}

//trash department
function trashBranchOffice(id) {
    var tabla = $('.table-alerts');
    var error2 = $('.alert-danger', tabla);
    var success2 = $('.alert-success', tabla);
    if( id == null || id == 0 ) {
        $(".table-alerts .alert-danger span").html("Se ha producido un error al intentar mover la sucursal a la papelera, intente nuevamente más tarde.");
        success2.hide();
        error2.show().delay(5000).hide();
    } else {
        var options = {
            element: $("#TableBranchOffices"),
            background: $("body"),
            message: 'Cargando...'
        };
        App.myStartPageLoading(options);
        if($("#token") != '' || $("#token") != null){
            $.ajax({
                method: "DELETE",
                url: "/users/branch-offices/trash",
                data: { id: id }
            }).done(function (data) {
                App.mystopPageLoading();
                if(data[0].MESSAGE != 'ERROR'){
                    $(".table-alerts .alert-success span").html("Se ha mandado la sucursal a la papelera.").show();
                    error2.hide();
                    success2.show().delay(5000).hide();
                }else {
                    $(".table-alerts .alert-danger span").html("Se ha producido un error al intentar mover la sucursal a la papelera, intente nuevamente más tarde.").show();
                    success2.hide();
                    error2.show().delay(5000).hide();
                }
                $('#TableBranchOffices').DataTable().ajax.reload();
            });
        }
    }
    clearInputsBranch();
}

function clearInputsBranch() {
    $("#id").val("");
    $("#id_observation").val("");
    $("#name").val("");
    $("#observation").val("");
    $("#status").prop("selectedIndex", 0);
    $("#type").prop("selectedIndex", 0);
    var addBranchOffice = '<div class="form-actions"><button type="submit" class="btn green addBranchOffice">Agregar nueva sucursal</button></div>';

    $("#form_sample_2 .updateInputBranchOffices").html('').append(addBranchOffice);
    $("#form_sample_2 .cancelBranchOffices").html('');
}