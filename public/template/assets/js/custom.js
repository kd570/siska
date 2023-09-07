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
var base_url = window.location.origin;

$('ul.sidebar-menu li a').each(function() {
    if ($(this).attr('href').indexOf(url) !== -1) {
        $(this).parent().addClass('active').parent().parent('li').addClass('active')
    }
})


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
    })
    $('#table-unitkerja').DataTable({
        rowReorder: true,
        columnDefs: [
            //kolom yang dapat di sort
            { orderable: true, className: 'reorder', targets: [0,1,2,3,4] },
            { orderable: false, targets: '_all' },
            //kolom yang dapat di cari
            { searchable: true, targets: [1,2,3,4] },
            { searchable: false, targets: '_all' }
        ]
    }) 
    $('#table-guna').DataTable({
        rowReorder: true,
        columnDefs: [
            //kolom yang dapat di sort
            { orderable: true, className: 'reorder', targets: [0,1] },
            { orderable: false, targets: '_all' },
            //kolom yang dapat di cari
            { searchable: true, targets: [1] },
            { searchable: false, targets: '_all' }
        ]
    }) 
    $('#table-sertifikat').DataTable({
        rowReorder: true,
        columnDefs: [
            //kolom yang dapat di sort
            { orderable: true, className: 'reorder', targets: [0,1] },
            { orderable: false, targets: '_all' },
            //kolom yang dapat di cari
            { searchable: true, targets: [1] },
            { searchable: false, targets: '_all' }
        ]
    }) 
    $('#table-aset').DataTable({
        rowReorder: true,
        columnDefs: [
            //kolom yang dapat di sort
            { orderable: true, className: 'reorder', targets: [0,2,3,4,5] },
            { orderable: false, targets: '_all' },
            //kolom yang dapat di cari
            { searchable: true, targets: [1,2,3,4,5] },
            { searchable: false, targets: '_all' }
        ]
    }) 
    $('#table-okupasi').DataTable({
        rowReorder: true,
        columnDefs: [
            //kolom yang dapat di sort
            { orderable: true, className: 'reorder', targets: [0,2,3,4,5] },
            { orderable: false, targets: '_all' },
            //kolom yang dapat di cari
            { searchable: true, targets: [1,2,3,4,5] },
            { searchable: false, targets: '_all' }
        ]
    }) 
    
} )


//Select2 
$( document ).ready(function() {
	//untuk memanggil plugin select2
    $('#id_uk').select2({
	  	placeholder: 'Pilih Unit Kerja',
	  	language: "id"
	})
    $('#guna').select2({
	  	placeholder: 'Pilih Peruntukan Lahan',
	  	language: "id"
	})
    $('#j_setifikat').select2({
	  	placeholder: 'Pilih Jenis Sertifikat',
	  	language: "id"
	})
    $('#provinsi').select2({
	  	placeholder: 'Pilih Provinsi',
	  	language: "id"
	})
	$('#kota').select2({
	  	placeholder: 'Pilih Kota/Kabupaten',
	  	language: "id"
	})
	$('#kecamatan').select2({
	  	placeholder: 'Pilih Kecamatan',
	  	language: "id"
	})
	$('#kelurahan').select2({
	  	placeholder: 'Pilih Kelurahan',
	  	language: "id"
	})


    $("#provinsi").change(function() {
        var id_provinsi = $("#provinsi").val();
        $.ajax({
            url: '/areaaset/get_kota',
            method: 'POST',
            data: {
                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',
                id_provinsi : id_provinsi
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var html2 = '';
                var html3 = '';
                var i;
                html += '<option value="">Pilih Kabupaten/Kota</option>';
                html2 += '<option value="">Pilih Kecamatan</option>';
                html3 += '<option value="">Pilih Desa/Kelurahan</option>';
                for (i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                }
                $('#kota').html(html);
                $('#kecamatan').html(html2);
                $('#kelurahan').html(html3);
            }
        })
    })

    $("#kota").change(get_kecamatan);
    function get_kecamatan(){
        var id_kota = $("#kota").val();
        $.ajax({
            url: base_url+'/areaaset/get_kecamatan',
            method: 'POST',
            data: {
                id_kota : id_kota
            },
            async: false,
            dataType: 'json',
            success: function(data2) {
                console.log(data2);
                var html = '';
                var html2 = '';
                var i;
                html += '<option value="">Pilih Kecamatan</option>';
                html2 += '<option value="">Pilih Desa/Kelurahan</option>';
                for (i = 0; i < data2.length; i++) {
                    html += '<option value="' + data2[i].id + '">' + data2[i].name + '</option>';
                }
                $('#kecamatan').html(html);
                $('#kelurahan').html(html2);
            }
        })
    }
    $("#kecamatan").change(get_kelurahan);
    function get_kelurahan(){
        var id_kecamatan = $("#kecamatan").val();
        $.ajax({
            url: base_url+'/areaaset/get_kelurahan',
            method: 'POST',
            data: {
                id_kecamatan : id_kecamatan
            },
            async: false,
            dataType: 'json',
            success: function(data3) {
                console.log(data3);
                var html = '';
                var i;
                html += '<option value="">Pilih Desa/Kelurahan</option>';
                for (i = 0; i < data3.length; i++) {
                    html += '<option value="' + data3[i].id + '">' + data3[i].name + '</option>';
                }
                $('#kelurahan').html(html);
            }
        })
    }
})

// auto close flash data
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 5000)


//modal confirmation
function submitDel(id) {
    $('#del-'+id).submit()
}

//logout confirmation
function returnLogout(id) {
    var link = $('#logout').attr('href')
    $(location).attr('href', link)
}
