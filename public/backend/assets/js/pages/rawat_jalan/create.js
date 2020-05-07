$(document).ready(function () {
	$('body').on('change', '#obat', function () {
		let id_obat = $(this).val();
		$.ajax({
			type: 'get',
			url: 'http://localhost/tugas_akhir/sipelad/rawat_jalan/get_ajax',
			data: {
				'id_obat': id_obat
			},
			success: function (response) {
				let result = JSON.parse(response)
				$('#kategori').val(result.obat.kategori)
				$('#harga').val(result.obat.harga)
				$('#jumlah').val(1)
				$('#subtotal').val(result.obat.harga * 1)
			}
		})
	})

	$('body').on('change', '#jumlah', function () {
		$jumlah = parseInt($(this).val())
		$harga = $('#harga').val();

		$('#subtotal').val($harga * $jumlah)
	})
})
