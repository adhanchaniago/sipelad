$(document).ready(function () {
	$('.select2').select2({
		allowClear: true,
		ajax: {
			url: 'http://localhost/tugas_akhir/sipelad/home/get_ajax',
			dataType: 'json',
			type: 'get',
			delay: 250,
			data: function (params) {
				return {
					q: params.term
				}
			},
			processResults: function (data) {
				return {
					results: data
				}
			},
			cache: true
		}
	})
})
