$(document).ready(function () {
	$('#form-add-pasien').validate({
		errorClass: 'validation-invalid-label',
		successClass: 'validation-valid-label',
		validClass: 'validation-valid-label',
		highlight: function (element, errorClass) {
			$(element).removeClass(errorClass);
		},
		unhighlight: function (element, errorClass) {
			$(element).removeClass(errorClass);
		},

		// Different components require proper error label placement
		errorPlacement: function (error, element) {

			// Unstyled checkboxes, radios
			if (element.parents().hasClass('form-check')) {
				error.appendTo(element.parents('.form-check').parent());
			}

			// Input with icons and Select2
			else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
				error.appendTo(element.parent());
			}

			// Input group, styled file input
			else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
				error.appendTo(element.parent().parent());
			}

			// Other elements
			else {
				error.insertAfter(element);
			}
		},
		submitHandler: function () {
			let formdata = $('#form-add-pasien').serialize();
			$.ajax({
				type: 'post',
				url: 'http://localhost/tugas_akhir/sipelad/pasien/store_ajax',
				data: formdata,
				success: function (response) {
					let result = JSON.parse(response);
					if (result.status === 'success') {
						$('#pasien').prepend(result.data);
						$('#pasien').trigger('change');
						$('#form-add-pasien')[0].reset();
						$('#modal-add-pasien').modal('hide');
					}
				}
			})
		}
	})
})
