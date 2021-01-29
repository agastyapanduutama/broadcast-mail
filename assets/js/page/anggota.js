$(document).ready(function () {
	table = $('#list_anggota').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],

		"ajax": {
			"url": baseUrl + 'admin/anggota/data',
			"type": "POST",
			"complete": function () {
				cekPilihanNa()
			},
			"error": function (error) {
				errorCode(error)
			}
		},

		"columnDefs": [{
				"sClass": "text-center",
				"targets": [0],
				"orderable": false
			},
			{
				"targets": [1],
				"orderable": false
			},
			{
				"targets": [2],
				"orderable": true
			},
			{
				"targets": [3],
				"orderable": true
			},
			{
				"targets": [4],
				"orderable": true
			},
			{
				"targets": [5],
				"orderable": true
			},
			{
				"targets": [6],
				"orderable": true
			},
			{
				"sClass": "text-center",
				"targets": [7],
				"orderable": false
			},
			{
				"sClass": "text-center",
				"targets": [8],
				"orderable": false
			},
		],
	});
	getPangkat()
	getJabatan()
	getKategori()
})

$('#list_anggota').on('click', '#edit', function () {
	let id = $(this).data('id');
	$.ajax({
		url: baseUrl + 'admin/anggota/get/' + id,
		type: "GET",
		success: function (result) {
			response = JSON.parse(result)
			$("#idData").val(response.id)
			$("#nrp1").val(response.nrp)
			$("#anggota1").val(response.nama)
			$("#email1").val(response.email)
			$("#id_pangkat1").val(response.id_pangkat)
			$("#id_kategori1").val(response.id_kategori)
			$("#id_jabatan1").val(response.id_jabatan)
			$("#keterangan1").val(response.keterangan)
			$("#modalEdit").modal('show')
		},
		error: function (error) {
			errorCode(error)
		}
	})
})

$('#list_anggota').on('click', '#delete', function () {
	let id = $(this).data('id');
	confirmSweet("Data akan terhapus secara permanen !")
		.then(result => {
			if (result) {
				$.ajax({
					url: baseUrl + 'admin/anggota/delete/' + id,
					type: "GET",
					success: function (result) {
						response = JSON.parse(result)
						if (response.status == 'ok') {
							table.ajax.reload(null, false)
							// msgSweetSuccess(response.msg)
							toastSuccess(response.msg)
						} else {
							// msgSweetWarning(response.msg)
							toastWarning(response.msg)
						}
					},
					error: function (error) {
						errorCode(error)
					}
				})
			}
		})
})

$("#formAddanggota").submit(function (e) {
	e.preventDefault();
	$.ajax({
		url: baseUrl + "admin/anggota/insert",
		type: "post",
		data: new FormData(this),
		processData: false,
		contentType: false,
		cache: false,
		beforeSend: function () {
			disableButton()
		},
		complete: function () {
			enableButton()
		},
		success: function (result) {
			let response = JSON.parse(result)
			if (response.status == "fail") {
				msgSweetError(response.msg)
			} else {
				table.ajax.reload(null, false)
				toastSuccess(response.msg)
				clearInput($("input"))
				$("#id_pangkat").val(upk)
			}
		},
		error: function (event) {
			errorCode(event)
		}
	});
})

$("#formEditanggota").submit(function (e) {
	e.preventDefault();
	$.ajax({
		url: baseUrl + "admin/anggota/update",
		type: "post",
		data: new FormData(this),
		processData: false,
		contentType: false,
		cache: false,
		beforeSend: function () {
			disableButton()
		},
		complete: function () {
			enableButton()
		},
		success: function (result) {
			let response = JSON.parse(result)
			if (response.status == "fail") {
				// msgSweetError(response.msg)
				clearInput($("input"))
				$("#modalEdit").modal('hide')
			} else {
				table.ajax.reload(null, false)
				toastSuccess(response.msg)
				clearInput($("input"))
				$("#modalEdit").modal('hide')
			}
		},
		error: function (event) {
			errorCode(event)
		}
	});
})



// Ambil Data Pangkat
function getPangkat() {

    $('#id_pangkat').find('option').remove().end()
    $('#id_pangkat').append("<option value=''> -- Silakan Pilih -- </option>");
    $.ajax({
        dataType: "json",
        url: baseUrl + "admin/anggota/getPangkat",
        success: function (result) {
            console.log(result);
            let response = jQuery.parseJSON(JSON.stringify(result));
            response.forEach(item => {
                $('#id_pangkat').append("<option value=" + item.id + ">" + item.nama_pangkat + "</option>");
            })
        }
    })

    
    $('#id_pangkat1').find('option').remove().end()
    $.ajax({
        dataType: "json",
        url: baseUrl + "admin/anggota/getPangkat",
        success: function (result) {
            console.log(result);
            let response = jQuery.parseJSON(JSON.stringify(result));
            response.forEach(item => {
                $('#id_pangkat1').append("<option value=" + item.id + ">" + item.nama_pangkat + "</option>");
            })
        }
    })

}



// Ambil Data Jabatan
function getJabatan() {

    $('#id_jabatan').find('option').remove().end()
    $('#id_jabatan').append("<option value=''> -- Silakan Pilih -- </option>");
    $.ajax({
        dataType: "json",
        url: baseUrl + "admin/anggota/getJabatan",
        success: function (result) {
            console.log(result);
            let response = jQuery.parseJSON(JSON.stringify(result));
            response.forEach(item => {
                $('#id_jabatan').append("<option value=" + item.id + ">" + item.nama_jabatan + "</option>");
            })
        }
    })

    
    $('#id_jabatan1').find('option').remove().end()
    $.ajax({
        dataType: "json",
        url: baseUrl + "admin/anggota/getJabatan",
        success: function (result) {
            console.log(result);
            let response = jQuery.parseJSON(JSON.stringify(result));
            response.forEach(item => {
                $('#id_jabatan1').append("<option value=" + item.id + ">" + item.nama_jabatan + "</option>");
            })
        }
    })

}


// Ambil Data Kategori
function getKategori() {
    $('#id_kategori').find('option').remove().end()
    $('#id_kategori').append("<option value=''> -- Silakan Pilih -- </option>");
    $.ajax({
        dataType: "json",
        url: baseUrl + "admin/anggota/getKategori",
        success: function (result) {
            console.log(result);
            let response = jQuery.parseJSON(JSON.stringify(result));
            response.forEach(item => {
                $('#id_kategori').append("<option value=" + item.id + ">" + item.nama_kategori + "</option>");
            })
        }
    })

    
    $('#id_kategori1').find('option').remove().end()
    $.ajax({
        dataType: "json",
        url: baseUrl + "admin/anggota/getKategori",
        success: function (result) {
            console.log(result);
            let response = jQuery.parseJSON(JSON.stringify(result));
            response.forEach(item => {
                $('#id_kategori1').append("<option value=" + item.id + ">" + item.nama_kategori + "</option>");
            })
        }
    })

}