$(document).ready( function () {
    $('#myTable').DataTable();
    
//$( "div" ).children( ".selected" ).css( "color", "blue" );
$( ".dataTables_filter" ).children("span").replaceWith( ` <label><input type="search" class="form-control" placeholder="חיפוש" aria-controls="myTable"></label> ` );
    
} );