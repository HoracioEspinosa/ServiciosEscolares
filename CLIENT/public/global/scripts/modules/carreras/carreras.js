/**
 * Created by omar on 23/03/2017.
 */
$(document).ready(function () {
    $('#carrera').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            method:'POST',
            url:'/carreras/create',
            data:$('#formcarrera').serialize()
        }).done(function (data) {
            console.log(data);
            if(data.error)
            {
                alert('No se pudo Agregar el Registro');
            }else{
                alert('Se Agrego el Registro');
            }

        });
    });
});