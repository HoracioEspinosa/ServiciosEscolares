$(document).on('click', '.mybutton', function(e) {
    var idProfesor = $(this);
    $.get('http://servicioseduapi.dev/api/profesors/get/tablebyid/'+idProfesor.attr('data-llave'), function (data) {
        $(e.currentTarget).find('input[name="modname"]').val(data[0].nombre);
        var apellido = data[0].apellido;
        apellido = apellido.split(" ");
        $(e.currentTarget).find('input[name="modplname"]').val(apellido[0]);
        $(e.currentTarget).find('input[name="modmlname"]').val(apellido[1]);
        $(e.currentTarget).find('input[name="modcedula"]').val(data[0].cedulas);
        $(e.currentTarget).find('input[name="modemail"]').val(data[0].email);
        $(e.currentTarget).find('input[name="modphone"]').val(data[0].phone);
        $(e.currentTarget).find('textarea[name="modnotes"]').val(data[0].notas);
        $(e.currentTarget).find('input[name="modestatus"]').val(data[0].estatus);
        $(e.currentTarget).find('input[name="idInformacion"]').val(data[0].idInformacion);

        console.log(data[0]);

        $(e.currentTarget).find('p[name="panombre"]').text(data[0].nombre + " " + apellido[0] + " " +apellido[1]);
        $(e.currentTarget).find('p[name="pacedula"]').text(data[0].cedulas);
        $(e.currentTarget).find('p[name="paemail"]').text(data[0].email);
        $(e.currentTarget).find('p[name="patelefono"]').text(data[0].phone);
        $(e.currentTarget).find('p[name="panotas"]').text(data[0].notas);
        $(e.currentTarget).find('p[name="paestatus"]').text(data[0].estatus);
    });
});


$(document).ready(function () {
    TableDatatablesManaged.profesores();
});



