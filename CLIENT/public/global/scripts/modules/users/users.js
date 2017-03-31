/**
 * Created by dar5_ on 16/02/2017.
 */

function loadBADGES() {
    $.ajax({
        method: "GET",
        url: "/users/records",
        data: { }
    }).done(function (data) {
        App.mystopPageLoading();
        $(".inbox-nav").find('.recordsTotal').html(data.total);
        $(".inbox-nav").find('.adminsTotal').html(data.admins);
        $(".inbox-nav").find('.deletedTotal').html(data.deleted);
        $(".inbox-nav").find('.nodeletedTotal').html(data.no_deleted);
        $(".inbox-nav").find('.activeTotal').html(data.active);
        $(".inbox-nav").find('.inactiveTotal').html(data.inactive);
        clearInputsUsers();
    });
}

function checkChanges() {
    //loadBADGES();
}

$("#agregarUsuarios").on('click', function () {
    createUser();
});

$(document).ready(function () {

    $("#sample_Users tbody").on('click', '.deleteUser', function () {
        try {
            var table = $('#sample_Users').DataTable();
            var row = $(this).closest('tr').index('tr');
            var data = table.row(row-1).data();
            var name = data.nombre;
            var id = data.idUsuarios;
            console.log(id + ", " + name);
            bootbox.confirm({
                title: "Eliminar usuario",
                message: "¿Está seguro que desea eliminar el usuario <i><small>' "+ name +"' </small></i>? ",
                buttons: {
                    cancel: {
                        label: '<i class="fa fa-times"></i> Cancelar'
                    },
                    confirm: {
                        className: "red",
                        label: '<i class="fa fa-check"></i> Eliminar'
                    }
                },
                callback: function (result) {
                    if(result) {
                        trashUsers(id);
                        clearInputsUsers();
                    }
                }
            });
        } catch (err) {

        }
    });

    $("#sample_Users tbody").on('click', '.restoreUser', function (e) {
        try {
            e.preventDefault();
            var id = $(this).attr('data-idRestore');
            var pass = null;
            var uname = $("#uname").val();
            restoreUser(id);
        } catch (err) {

        }
    });

    $(".inbox-nav li a").on('click', function () {
        $("#typeTABLE").val($(this).attr('data-id'));
        TableDatatablesManaged.init();
        $(".inbox-nav li").removeClass('active');
        $(this).closest('li').addClass('active');
    });

    $(".addbtntop").on('click', function () {
        var addDepartment = '<div class="form-actions"><button type="button" class="btn blue addUser" id="agregarUsuarios" onclick="createUser()">Agregar</button></div>';
        $("#form_sample_user .updateInputDepartment").html('').append(addDepartment);
        $("#form_sample_user input[type=text]").val('');
        $("#form_sample_user input[type=email]").val('');
        $("#form_sample_user input[type=tel]").val('');
        $("#form_sample_user select option").eq(0).prop('selected', true);
        $("#form_sample_user #branch_id option").eq(0).prop('selected', true);
        $("#form_sample_user #department_id option").eq(0).prop('selected', true);
        $("#form_sample_user #status option").eq(0).prop('selected', true);
        $("#form_sample_user #code").attr('placeholder', '(Generado automáticamente)');
        $(".addUserForm").slideDown('2000');
    });
});

$(".addUserLine span").on('click', function() {
    $(".addUserForm").slideToggle('2000');
});

$("#form_sample_user .cancelUser").on('click', function () {
    clearInputsUsers();
});

function clearInputsUsers() {
    var addDepartment = '<div class="form-actions"><button type="button" class="btn blue addUser" id="agregarUsuarios" onclick="createUser()">Agregar</button></div>';
    $("#form_sample_user .updateInputDepartment").html('').append(addDepartment);
    $("#form_sample_user input[type=text]").val('');
    $("#form_sample_user input[type=email]").val('');
    $("#form_sample_user input[type=tel]").val('');
    $("#form_sample_user input[type=number]").val(18);
    $("#form_sample_user select option").eq(0).prop('selected', true);
    $("#form_sample_user #branch_id option").eq(0).prop('selected', true);
    $("#form_sample_user #department_id option").eq(0).prop('selected', true);
    $("#form_sample_user #status option").eq(0).prop('selected', true);
    $("#form_sample_user #code").attr('placeholder', '(Generado automáticamente)');

    $(".addUserForm").slideUp('2000');
    $("#form_sample_user .form-group").removeClass('has-success');
    $("#form_sample_user .col-md-9 i").removeClass('fa-check');
}

/**
 *  Functions for CRUD Users
 **/

function createUser() {
    var form2 = $('#form_sample_user');
    var error2 = $('.alert-danger', form2);
    var success2 = $('.alert-success', form2);
    var options = {
        element: $("#form_sample_user"),
        background: $("body"),
        message: 'Cargando...'
    };
    if(form2.valid()) {
        App.myStartPageLoading(options);
        $.ajax({
            method: "POST",
            url: "/users/create",
            data: $("#form_sample_user").serialize()
        }).done(function (data) {
            App.mystopPageLoading();
            if(data[0].MESSAGE != 'ERROR'){
                $(".alert-success span").html("Se ha agregado el nuevo usuario.").show();
                error2.hide();
                success2.show().delay(5000).hide();
            }else {
                $(".alert-danger span").html("Se han producido algunos errores, favor de verificar sus datos.").show();
                success2.hide();
                error2.show().delay(5000).hide();
            }
            $('#sample_Users').DataTable().ajax.reload();
            checkChanges();
        });
        clearInputsUsers();
    }
}

function updateUser() {
    var form2 = $('#form_sample_user');
    var error2 = $('.table-alerts .alert-danger', form2);
    var success2 = $('.table-alerts .alert-success', form2);
    var options = {
        element: $("#form_sample_user"),
        background: $("body"),
        message: 'Cargando...'
    };
    if(form2.valid()) {
        App.myStartPageLoading(options);
        $.ajax({
            method: "PUT",
            url: "/users/update",
            data: $("#form_sample_user").serialize()
        }).done(function (data) {
            App.mystopPageLoading();
            if(data[0].MESSAGE != 'ERROR'){
                $(".alert-success span").html("Se ha agregado el nuevo usuario.").show();
                error2.hide();
                success2.show().delay(5000).hide();
            }else {
                $(".alert-danger span").html("Se han producido algunos errores, favor de verificar sus datos.").show();
                success2.hide();
                error2.show().delay(5000).hide();
            }
            $('#sample_Users').DataTable().ajax.reload();
            checkChanges();
        });
        clearInputsUsers();
    }
}

function trashUsers(id) {
    var tabla = $('.table-alerts');
    var error2 = $('.alert-danger', tabla);
    var success2 = $('.alert-success', tabla);
    if( id == null || id == 0 ) {
        $(".table-alerts .alert-danger span").html("Se ha producido un error al intentar mover el usuario a la papelera, intente nuevamente más tarde.");
        success2.hide();
        error2.show().delay(5000).hide();
    } else {
        var options = {
            element: $("#sample_users"),
            background: $("body"),
            message: 'Cargando...'
        };
        App.myStartPageLoading(options);
        if($("#token") != '' || $("#token") != null){
            $.ajax({
                method: "DELETE",
                url: "/users/delete",
                data: { id: id }
            }).done(function (data) {
                App.mystopPageLoading();
                if(data[0].MESSAGE != 'ERROR'){
                    $(".table-alerts .alert-success span").html("Se ha mandado el usuario a la papelera.").show();
                    error2.hide();
                    success2.show().delay(5000).hide();
                }else {
                    $(".table-alerts .alert-danger span").html("Se ha producido un error al intentar mover el usuario a la papelera, intente nuevamente más tarde.").show();
                    success2.hide();
                    error2.show().delay(5000).hide();
                }
                $('#sample_Users').DataTable().ajax.reload();
                checkChanges();
            });
        }
    }
    clearInputs();
}

function checkPasswordAdminUser(id, username, password) {
    bootbox.prompt({
        title: "Ingrese la contraseña del administrador:",
        inputType: 'password',
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Cancelar'
            },
            confirm: {
                className: "red",
                label: '<i class="fa fa-check"></i> Restaurar'
            }
        },
        callback: function (result) {
            if(result) {
                password = (null === result) ? null : result;
                var token = $("#form_sample_user input[name=token]").val();
                $.ajax({
                    method: "POST",
                    url: "/users/check/password",
                    data: { 'username': username, 'password': password, 'token' : token }
                }).done(function (data) {
                    if(data == 'OK'){
                        restoreUser(id);
                        $(".alert-deleted").hide();
                        clearInputsUsers();
                    }
                });
            }
        }
    });
}
