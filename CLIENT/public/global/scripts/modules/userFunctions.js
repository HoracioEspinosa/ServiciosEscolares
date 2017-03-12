/**
 * Created by dar5_ on 23/12/2016.
 */
jQuery(document).ready(function () {
    //bootbox.alert("hola");
    $(".copyContent").on('click', function (e) {
        $(".dt-buttons a:nth-child(1)").click();
    });
    $(".excelContent").on('click', function (e) {
        $(".dt-buttons a:nth-child(2)").click();
    });
    $(".csvContent").on('click', function (e) {
        $(".dt-buttons a:nth-child(3)").click();
    });
    $(".pdfContent").on('click', function (e) {
        $(".dt-buttons a:nth-child(4)").click();
    });
    $(".printContent").on('click', function (e) {
        $(".dt-buttons a:nth-child(5)").click();
    });
    $('.page-sidebar-menu').children('li').removeClass('active');
    $(".page-sidebar-menu").children('li').eq(7).addClass('active');
    var $selectedCHild = $('.page-sidebar-menu').children('li').eq(7).children('a');
    $selectedCHild.append('<span class="selected"></span>');
    //$('body').modalmanager('loading');
    /*$("#form_sample_8").on('submit', function (e) {
        e.preventDefault();
        console.log("Se ha dado submit")
    });*/

    $('.printDepartment').on('click', function(e){
        $(this).hide();
        $('.colvis-group-hide[data-group="' + $(this).data('group') + '"]').show();
        $("#sample_Departments").button('printDepartment').trigger();
        e.preventDefault();
    });

});