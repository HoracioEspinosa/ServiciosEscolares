//"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
// begin first table
// Internationalisation. For more info refer to http://datatables.net/manual/i18n

function clearInputs() {
    $("#form_sample_8 #id").val("");
    $("#form_sample_8 #id_observation").val("");
    $("#form_sample_8 #name").val("");
    $("#form_sample_8 #observation").val("");
    $("#form_sample_8 #status").prop("selectedIndex", 0);
    var addDepartment = '<div class="form-actions"><button type="submit" class="btn green addDepartment">Agregar nuevo departamento</button></div>';
    $("#form_sample_8 .updateInputDepartment").html('').append(addDepartment);
    $("#form_sample_8 .cancelDepartment").html('');
    $("#branch_id").prop("selectedIndex", 0);
}

function checkPasswordAdmin(id, username, password) {
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
                pass = (null === result) ? null : result;
                var token = $("#form_sample_8 input[name=token]").val();
                $.ajax({
                    method: "POST",
                    url: "/users/check/password",
                    data: { 'username': username, 'password': pass, 'token' : token }
                }).done(function (data) {
                    if(data == 'OK'){
                        restoreDepartment(id);
                        $(".alert-deleted").hide();
                        clearInputs();
                        var addDepartment = '<div class="form-actions"><button type="submit" class="btn green addDepartment">Agregar nuevo departamento</button></div>';
                        $("#form_sample_8 .updateInputDepartment").html('').append(addDepartment);
                        $("#form_sample_8 .cancelDepartment").html('');
                    }else {
                    }
                });
            }
        }
    });
}

function checkPasswordAdminBranch(id, username, password) {
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
                pass = (null === result) ? null : result;
                var token = $("#form_sample_8 input[name=token]").val();
                $.ajax({
                    method: "POST",
                    url: "/users/check/password",
                    data: { 'username': username, 'password': pass, 'token' : token }
                }).done(function (data) {
                    if(data == 'OK'){
                        restoreBranchOffice(id);
                        $(".alert-deleted").hide();
                        clearInputs();
                        var addDepartment = '<div class="form-actions"><button type="submit" class="btn green addDepartment">Agregar nuevo departamento</button></div>';
                        $("#form_sample_8 .updateInputDepartment").html('').append(addDepartment);
                        $("#form_sample_8 .cancelDepartment").html('');
                    }else {
                    }
                });
            }
        }
    });
}

function restoreUser(id) {
    var tabla = $('.table-alerts');
    var error2 = $('.alert-danger', tabla);
    var success2 = $('.alert-success', tabla);
    var options = {
        element: $("#sample_Users"),
        background: $("body"),
        message: 'Cargando...'
    };
    App.myStartPageLoading(options);
    $.ajax({
        method: "PUT",
        url: "/users/restore",
        data: { 'id': id }
    }).done(function (data) {
        if(data[0].MESSAGE != 'ERROR'){
            $(".table-alerts .alert-success span").html("Se ha restaurado el usuario correctamente.").show();
            success2.show();
            error2.hide();
        }else {
            $(".table-alerts .alert-danger span").html("Se ha producido un error al intentar restaurar el usuario.").show();
            success2.hide();
            error2.show();
        }
        App.mystopPageLoading();
        $('#sample_Users').DataTable().ajax.reload();
        return data;
    });
}

function restoreDepartment(id) {
    var tabla = $('.table-alerts');
    var error2 = $('.alert-danger', tabla);
    var success2 = $('.alert-success', tabla);
    var options = {
        element: $("#sample_Departments"),
        background: $("body"),
        message: 'Cargando...'
    };
    App.myStartPageLoading(options);
    $.ajax({
        method: "PUT",
        url: "/users/departments/restore",
        data: { 'id': id }
    }).done(function (data) {
        if(data[0].MESSAGE != 'ERROR'){
            $(".table-alerts .alert-success span").html("Se ha restaurado el departamento correctamente.").show();
            success2.show();
            error2.hide();
        }else {
            $(".table-alerts .alert-danger span").html("Se ha producido un error al intentar restaurar el departamento.").show();
            success2.hide();
            error2.show();
        }
        App.mystopPageLoading();
        $('#sample_Departments').DataTable().ajax.reload();
        return data;
    });
}

function restoreBranchOffice(id) {
    var tabla = $('.table-alerts');
    var error2 = $('.alert-danger', tabla);
    var success2 = $('.alert-success', tabla);
    var options = {
        element: $("#TableBranchOffices"),
        background: $("body"),
        message: 'Cargando...'
    };
    App.myStartPageLoading(options);
    $.ajax({
        method: "PUT",
        url: "/users/branch-offices/restore",
        data: { 'id': id }
    }).done(function (data) {
        if(data[0].MESSAGE != 'ERROR'){
            $(".table-alerts .alert-success span").html("Se ha restaurado el departamento correctamente.").show();
            success2.show();
            error2.hide();
        }else {
            $(".table-alerts .alert-danger span").html("Se ha producido un error al intentar restaurar el departamento.").show();
            success2.hide();
            error2.show();
        }
        App.mystopPageLoading();
        $('#TableBranchOffices').DataTable().ajax.reload();
        return data;
    });
}

var TableDatatablesManaged = function () {


    var initTableUsers = function () {
        var deletedTYPE = $("#typeTABLE").val();
        var token = $("#api-token").val();
        var deleted = $("#checkDeleted .active").data("value");
        var table = $('#sample_Users').DataTable({
            processing: true,
            //sProcessing: 'Procesando...',
            bProcessing: true,
            bPaginate: true,
            bLengthChange: true,
            bInfo: true,
            bAutoWidth: true,
            bStateSave: true,
            sPaginationType: "full_numbers",
            serverSide: true,
            bJQueryUI: true,
            "bDestroy": true,
            ajax: {
                "type"   : "GET",
                "url"    : 'http://serviciosescolaresapi.dev/api/users/list',
                "data"   : {
                    "token" : token,
                    "deleted" : deletedTYPE
                },
            },
            columns: [
                {
                    data: 'tipo',
                    render: function (nivel, type, full, meta) {
                        var tipodealumno = "";
                        if (nivel == 1) {
                            tipodealumno = "Administrativo";
                        } else if (nivel == 2) {
                            tipodealumno = "Alumno";
                        } else if (nivel == 3) {
                            tipodealumno == "Profesor";
                        } else {

                        }
                        return tipodealumno;
                    }
                },
                {
                    data: 'curp',
                },
                {
                    data : 'nombre',
                    render: function (name, type, full, meta ) {
                        return name + ' ' + full.apellido;
                    }
                },
                {
                    data: 'correo',
                    render: function (correo, type, full, meta) {
                        return '<a href="mailto:'+correo+'">' + correo + '</a>';
                    }
                },
                {
                    data: 'telefono',
                    render: function (telefono, type, full, meta) {
                        return '<a href="tel:+52'+telefono+'">' + telefono + '</a>'
                    }
                },
                {
                    data : 'estado',
                    render: function (estado, type, full, meta) {
                        if(estado){
                            return '<span class="label label-sm label-primary" style="background: #3598dc;"> Activo </span>'
                        } else {
                            return '<span class="label label-sm label-warning"> Inactivo </span>';
                        }
                    }
                },
                {
                    data: "name",
                    searchable: true,
                    sortable: true,
                    render: function (id, type, full, meta) {
                        var $element = "";
                        if(!full.estado) {
                            $element = '<div class="btn-group"><button class="btn btn-xs blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Acciones<i class="fa fa-angle-down"></i></button><ul class="dropdown-menu" role="menu"><li><a class="updateUserList"><i class="icon-refresh"></i> Actualizar</a></li><li><a class="restoreUser" data-idRestore="'+full.idUsuarios+'"><i class="icon-trash"></i> Restaurar</a></li></ul></div>';
                            $("#form_sample_user .restoreUser").attr('data-idRestore', full.idUsuarios);
                        } else {
                            var username = full.usuario.toString().toLowerCase();
                            username = username.replace(/á/gi,"a");
                            username = username.replace(/é/gi,"e");
                            username = username.replace(/í/gi,"i");
                            username = username.replace(/ó/gi,"o");
                            username = username.replace(/ú/gi,"u");
                            $element = '<div class="btn-group"><button class="btn btn-xs blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Acciones<i class="fa fa-angle-down"></i></button><ul class="dropdown-menu" role="menu"><li><a href="/users/profile/' + username + '"><i class="icon-user"></i> Perfil</a></li><li><a class="updateUserList"><i class="icon-refresh"></i> Actualizar</a></li><li><a class="deleteUser"><i class="icon-trash"></i> Eliminar</a></li></ul></div>';
                        }
                        return $element;
                    },
                    type: "duration"
                }

            ],
            "bSortClasses": false,
            sDom: "lBfrtip",
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [0,1,2]
                    }
                },
                {
                    extend: 'excel',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'csv',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'pdf',
                    orientation: 'landscape',
                    title: "Listado de usuarios",
                    message: "Listado de usuarios",
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    customize: function (doc) {
                        doc.content[2].table.widths = Array(doc.content[2].table.body[0].length + 1).join('*').split('');
                        /*doc.content[1] = {
                         title: 'asdadad',
                         message: "Hola como estás",
                         margin: [ 0, 0, 0, 0 ],
                         alignment: 'right',
                         image:'data:image/png;base64,',
                         width: 80,
                         };*/
                        doc.styles.title.alignment = "left";
                        doc.styles.tableHeader  = {
                            alignment : "left",
                            bold : true,
                            color : "white",
                            fillColor : "#26344b",
                            fontSize : 11,
                            padding: [50,0,0,50]
                        };
                        doc.defaultStyle =  {
                            fontSize: 10,
                            'padding-left': '100px',
                            'padding': '100px'
                        }
                        doc.styles['td'] = {
                            background: 'red',
                        }
                    },
                    className: 'pdfUsers',
                },
                {
                    extend: 'print',
                    orientation: 'landscape',
                    title: "Listado de usuarios",
                    message: "Listado de usuarios de Caribbean Connection",
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    },
                    className: 'printDepartment',
                }
            ],
            language: {
                aria: {
                    sortAscending: ": activate to sort column ascending",
                    sortDescending: ": activate to sort column descending"
                },
                emptyTable: "No se han encontrado registros",
                info: "Mostrando del _START_ al _END_ de _TOTAL_ registros",
                infoEmpty: "No se han encontrado resultados",
                infoFiltered: "(Filtrado de _MAX_ registros)",
                lengthMenu: "Número de departamentos &nbsp; _MENU_",
                search: "Buscar: &nbsp;",
                zeroRecords: "No se han encontrado resultados",
                paginate: {
                    previous:"Anterior",
                    next: "Siguiente",
                    last: "Último",
                    first: "Primero"
                },
                select: {
                    info: false
                }
            },
            lengthMenu: [
                [2, 5, 15, 20, -1],
                [2, 5, 15, 20, "Todos"]
            ],

            pageLength: 5,
            iDisplayLength: 2,
            initComplete: function(settings, json) {
                //loadBADGES();
            },
        });

        table.select.info( false );
        $('#sample_Users tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        } );

        $('#sample_Users tbody').on( 'click', '.updateUserList', function () {
            if($(this).closest('tr').children().length > 1) {
                $(".addUserForm").slideDown('2000');
                var row = $(this).closest('tr').index('tr');
                var data = table.row(row-1).data();
                var inputUpdate = ' <div class="form-actions"><button type="button" class="btn blue updateUser" onclick="updateUser();">Actualizar</button></div>';
                $("#form_sample_user .updateInputDepartment").html('').append(inputUpdate);
                try{
                    if(data.deleted == 1) {
                        $("#form_sample_user").find(".alert-deleted").show();
                        $("#form_sample_user .addUser").prop('disabled', 'disabled');
                        $("#form_sample_user .updateUser").prop('disabled', 'disabled');
                    } else {
                        $("#form_sample_user .alert-deleted").hide();
                        $("#form_sample_user .addUser").prop('disabled', '');
                        $("#form_sample_user .updateDepartment").prop('disabled', '');
                    }
                    $("#form_sample_user #code").val(data.curp);
                    $("#form_sample_user #mask_phone").val(data.telefono);
                    $("#form_sample_user #name").val(data.nombre);
                    $("#form_sample_user #email").val(data.correo);
                    $("#form_sample_user #lastname").val(data.apellido);
                    $("#form_sample_user #address").val(data.direccion)
                    $("#form_sample_user #identificator").val(data.idUsuarios);
                    $("#form_sample_user #age").val(data.edad);
                    $("#form_sample_user #idInformacion").val(data.idInformacion);

                    if(data.estado == 0){
                        $('#form_sample_user #estado option').eq(2).prop('selected', true);
                    }else {
                        $('#form_sample_user #estado option').eq(1).prop('selected', true);
                    }

                    if(data.tipo != 1){
                        $('#form_sample_user #type option').eq(1).prop('selected', true);
                    }else {
                        $('#form_sample_user #type option').eq(2).prop('selected', true);
                    }

                    if(data.genero == 1){
                        $('#form_sample_user #gender option').eq(1).prop('selected', true);
                    }else {
                        $('#form_sample_user #gender option').eq(2).prop('selected', true);
                    }

                    $('#form_sample_user #branch_id option[value=' + idUsuarios + ']').prop('selected', true);

                    //$('#form_sample_user #branch_id').children('option[value="1"]').prop('selected', true);

                    //$('#form_sample_user #branch_id option[value="' + id_branch + '"]').prop('selected', true);


                    $('#form_sample_user #branch_id option[value="' + data.id_branch_offices + '"]').prop('selected', true);
                    $("#form_sample_user #observation").val(data.Observations);
                    $(".addDepartmentPorlet").css('box-shadow', '0 0 10px rgba(0, 0, 0, 0.58)');
                } catch (Exception) {

                }


            } else {
                clearInputsUsers();
            }
        } );
        $('#sample_Users tbody').on( 'dblclick', 'tr', function () {
            if($(this).closest('tr').children().length > 1) {
                $(".addUserForm").slideDown('2000');
                var row = $(this).closest('tr').index('tr');
                var data = table.row(row-1).data();
                var inputUpdate = ' <div class="form-actions"><button type="button" class="btn blue updateUser" onclick="updateUser();">Actualizar</button></div>';
                $("#form_sample_user .updateInputDepartment").html('').append(inputUpdate);
                try{
                    if(data.deleted == 1) {
                        $("#form_sample_user").find(".alert-deleted").show();
                        $("#form_sample_user .addUser").prop('disabled', 'disabled');
                        $("#form_sample_user .updateUser").prop('disabled', 'disabled');
                    } else {
                        $("#form_sample_user .alert-deleted").hide();
                        $("#form_sample_user .addUser").prop('disabled', '');
                        $("#form_sample_user .updateDepartment").prop('disabled', '');
                    }
                    $("#form_sample_user #code").val(data.curp);
                    $("#form_sample_user #mask_phone").val(data.telefono);
                    $("#form_sample_user #name").val(data.nombre);
                    $("#form_sample_user #email").val(data.correo);
                    $("#form_sample_user #lastname").val(data.apellido);
                    $("#form_sample_user #address").val(data.direccion)
                    $("#form_sample_user #identificator").val(data.idUsuarios);
                    $("#form_sample_user #age").val(data.edad);
                    $("#form_sample_user #idInformacion").val(data.idInformacion);

                    if(data.estado == 0){
                        $('#form_sample_user #estado option').eq(2).prop('selected', true);
                    }else {
                        $('#form_sample_user #estado option').eq(1).prop('selected', true);
                    }

                    if(data.tipo != 1){
                        $('#form_sample_user #type option').eq(1).prop('selected', true);
                    }else {
                        $('#form_sample_user #type option').eq(2).prop('selected', true);
                    }

                    if(data.genero == 1){
                        $('#form_sample_user #gender option').eq(1).prop('selected', true);
                    }else {
                        $('#form_sample_user #gender option').eq(2).prop('selected', true);
                    }

                    $('#form_sample_user #branch_id option[value=' + idUsuarios + ']').prop('selected', true);

                    //$('#form_sample_user #branch_id').children('option[value="1"]').prop('selected', true);

                    //$('#form_sample_user #branch_id option[value="' + id_branch + '"]').prop('selected', true);


                    $('#form_sample_user #branch_id option[value="' + data.id_branch_offices + '"]').prop('selected', true);
                    $("#form_sample_user #observation").val(data.Observations);
                    $(".addDepartmentPorlet").css('box-shadow', '0 0 10px rgba(0, 0, 0, 0.58)');
                } catch (Exception) {

                }


            } else {
                clearInputsUsers();
            }

        });

    }

    return {
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }
            initTableUsers();
        },
        departments: function () {
        },
        branch_offices: function () {
            initTableBranchOffices();
        },
        users: function () {
            initTableUsers();
        }
    };
}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        TableDatatablesManaged.init();
    });
}

function getBranchIDfromDepartment(id, dataa) {
    $.ajax({
        method: "GET",
        url: "/users/get/id",
        data: { 'id': id }
    }).done(function (data) {
        $('#form_sample_user #branch_id option[value=' + data + ']').prop('selected', true);
        fillSelectDepartments(data, dataa);
    });
}

function fillSelectDepartments(id, dataa) {
    $.ajax({
        method: 'POST',
        url: '/users/department/get/id',
        data: { id: id }
    }).done(function (data) {
        var $default = '<option value="">Seleccionar departamento</option>';
        var $select = $('#form_sample_user #department_id');
        $select.html($default);
        var $options = '';
        for (var i = 0; i < data.length; i++ ) {
            $options += '<option value="' + data[i].id_departments + '">' + data[i].name + '</option>';
        }
        $select.append($options);
        $('#form_sample_user #department_id option[value=' + dataa.id_departments + ']').prop('selected', true);
    });
}

$('#form_sample_user #branch_id').on('change', function (e) {
    e.preventDefault();
    fillSelectDepartments($(this).val(), $(this).val());
});
