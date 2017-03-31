
$(document).ready(function () {
    var porId =$('#expe').attr('data-id');
    getArchivos(porId);
});
$('#mdlArchivos').on('show.bs.modal', function (event) {

    $("#formDropZone").append("<form id='dZUpload' class='dropzone borde-dropzone' style='cursor: pointer;'>" +
        "<div class='dz-default dz-message text-center'>" +
        "<span><h2>Arrastra los archivos aquí</h2></span><br>" +
        "<p>(o Clic para seleccionar)</p></div></form>");
    myAwesomeDropzone = {
        url: "/public/archivosExpedientes/php/main.php",
        addRemoveLinks: true,
        paramName: "Archivo",
        maxFilesize: 4, // MB
        dictRemoveFile: "Remover",
        params: {
            parametro1: 'valor1',
            parametro2: 'valor2'
        },
        success: function (file, response) {
            var imgName = response;
            file.previewElement.classList.add("dz-success");
            console.log("Successfully uplddoaded fff:" + imgName);
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        }
    } // FIN myAwesomeDropzone
    var myDropzone = new Dropzone("#dZUpload", myAwesomeDropzone);
    myDropzone.on("complete", function (file, response) {

    });
});
$('#mdlArchivos').on('hidden.bs.modal', function (event) {
    event.preventDefault();
    $("#formDropZone").empty();
    var porId =$('#expe').attr('data-id');
    getArchivos(porId);
});

function getArchivos(porIds) {

    $.ajax({
        type: 'GET',
        url: "/expedientes/get/archivos/" + porIds,
        success: function (data) {

            $("#divMostrarArchivos").html("");
            $("#divMostrarArchivos").html(data);
        }
    });
}