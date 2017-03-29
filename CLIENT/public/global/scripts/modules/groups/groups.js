/**
 * Created by jepe_ on 29/03/2017.
 */
$(document).ready(function () {
    $('.grupo').on('click', function () {
        alert($(this).attr('data-id'));
    })
})