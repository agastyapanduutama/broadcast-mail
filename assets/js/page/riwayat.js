$(document).ready(function () {
	table = $('#list_riwayat').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],

		"ajax": {
			"url": baseUrl + 'admin/mail/riwayat/data',
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
				"orderable": true
			},
			{
				"targets": [2],
				"orderable": true
			},
			{
				"sClass": "text-center",
				"targets": [3],
				"orderable": true
			},
		],
	});
	// $("#id_upk").val(upk)
})



var tipena = $("#tipena").val()

$(document).ready(function () {
	table = $('#list_detailriwayat').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],

		"ajax": {
			"url": baseUrl + 'admin/mail/riwayat/detail/data/' + tipena,
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
				"orderable": true
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
		],
	});
	// $("#id_upk").val(upk)
})