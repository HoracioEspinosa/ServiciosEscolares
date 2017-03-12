/**
 * Created by dar5_ on 02/02/2017.
 */

$('#searchByPage').on( 'keyup', function () {
    $("#sample_Departments, #TableBranchOffices, #sample_Users").DataTable().search( this.value ).draw();
} );