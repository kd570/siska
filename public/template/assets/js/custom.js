/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";


//Custom menu drop down active
var path = location.pathname.split('/')
var url = location.origin + '/' + path[1]

$('ul.sidebar-menu li a').each(function() {
    if ($(this).attr('href').indexOf(url) !== -1) {
        $(this).parent().addClass('active').parent().parent('li').addClass('active')
    }
})

// console.log(location.origin)

//data tables
$(document).ready( function () {
    $('#table-users').DataTable({
        rowReorder: true,
        columnDefs: [
            //kolom yang dapat di sort
            { orderable: true, className: 'reorder', targets: [0,1,2,3,4] },
            { orderable: false, targets: '_all' },
            //kolom yang dapat di cari
            { searchable: true, targets: [1,2,3,4] },
            { searchable: false, targets: '_all' }
        ]
    });
    
} );
$(document).ready( function () {
    $('#table-jd').DataTable({
        rowReorder: true,
        columnDefs: [
            //kolom yang dapat di sort
            { orderable: true, className: 'reorder', targets: [0,1,2,3,4] },
            { orderable: false, targets: '_all' },
            //kolom yang dapat di cari
            { searchable: true, targets: [1,2,3,4] },
            { searchable: false, targets: '_all' }
        ]
    });
    
} );


// auto close flash data
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 5000);


//modal confirmation
function submitDel(id) {
    $('#del-'+id).submit()
}

//logout confirmation
function returnLogout(id) {
    var link = $('#logout').attr('href')
    $(location).attr('href', link)
}
