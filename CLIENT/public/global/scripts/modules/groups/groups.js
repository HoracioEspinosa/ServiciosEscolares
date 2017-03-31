/**
 * Created by jepe_ on 29/03/2017.
 */
$(document).ready(function () {
    var idGrupo;
    $('.grupo').on('click', function () {
        window.location = '/grupos/' + $(this).attr('data-id');
        idGrupo = $(this).attr('data-id');
    });
    TableDatatablesManaged.studentsGrupos($('#idGrupo').val());
});


