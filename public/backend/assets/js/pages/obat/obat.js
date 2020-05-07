$(document).ready(function () {

	// tombol hapus
	$('body').on('click', '.btn-delete', function (e) {
		e.preventDefault();

		let href = $(this).attr('href');
		let title = $('.page-title h2').text();
		Swal.fire({
			title: 'Apakah anda yakin',
			text: 'Obat akan dihapus',
			type: 'question',
			showCancelButton: true,
			confirmButtonText: 'Hapus data!',
			cancelButtonText: 'Batal',
			confirmButtonClass: 'btn btn-primary',
			cancelButtonClass: 'btn btn-danger',
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		});

	})
})
