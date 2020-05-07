$(document).ready(function () {

})

var site_url = 'http://localhost/tugas_akhir/sipelad/rawat-jalan/';
var url = {
	ajax_get_obat: 'ajax_get_obat',
	get_obat: 'get_ajax'
}

var config_select2 = {
	allowClear: true,
	ajax: {
		url: '',
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
			};
		}
	},
	cache: true,
	tags: true
};

function initialize_select2_obat(el) {
	var config = config_select2;
	config.ajax.url = url.get_obat;

	$.each(el, function (i, e) {
		$(e).select2(config);
		$(e).on('select2:select', () => {
			$(".select2-results:not(:has(a))").hover(function () {
				$('.select2-results__option').removeClass('select2-results__option--highlighted');
			}).click(function () {
				console.log(e);
				$(e).select2('close');
			});
		});
	})
}

function initialize_change_jumlah(id) {
	$('#obat-' + id + ' .jumlah').change(function (e) {
		calc_obat(id);
	});
}

function initialize_change_obat(id) {
	$('#obat-' + id + ' .obat').change(function (e) {
		$.ajax({
			type: 'get',
			url: url.ajax_get_obat,
			data: {
				id: $(this).val()
			},
			success: function (res) {

				if (res) {
					res = JSON.parse(res);
					console.log(res)
					if (obats[id]) {
						obat = obats[id];
					} else {
						obat = Object();
					}

					$('#obat-' + id + ' .harga').val(res.harga);
					$('#obat-' + id + ' .kategori').val(res.kategori);
					var jumlah = $('#obat-' + id + ' .jumlah').val();
					if (!jumlah) {
						$('#obat-' + id + ' .jumlah').val(1);
						jumlah = 1;
					}
					obat.harga = res.harga;
					obat.kategori = res.kategori;
					obat.jumlah = jumlah;
					obats[id] = obat;
					calc_obat(id);
				}
			}
		});
	});
}

function calc_obat(id) {
	var harga = parseFloat($('#obat-' + id + ' .harga').val());
	var jumlah = parseFloat($('#obat-' + id + ' .jumlah').val());
	if (!isNaN(harga) && !isNaN(jumlah) && harga && jumlah) {
		var subtotal = harga * jumlah;
		$('#obat-' + id + ' .subtotal').val(subtotal);
		obats[id].jumlah = jumlah;
		obats[id].harga = harga;
		obats[id].subtotal = subtotal;
		calc_total();
	}
}

function calc_total() {
	var total = 0;

	if (Object.keys(obats).length > 0) {
		$.each(obats, function (i, obat) {
			var id = obat.id_obat;
			var subtotal = parseFloat(obat.jumlah) * parseFloat(obat.harga);
			total += subtotal;
		})
	}
	$('#total td input[name="total"]').val(total);
	$('#total td.text-right h5').text(total);

	// var total = subtotal + charges_fee + tax;
	// $('#total h5').text(money(total));
}

function obat_add() {
	row++;
	var html = '<tr id="obat-' + row + '">' +
		'<td>' +
		'   <select data-placeholder="Select a state" data-fouc name="obat[' + row + '][id_obat]" id="obat-obat-' + row + '" class="form-control obat" data-placeholder=""></select>' +
		'</td>' +
		'<td>' +
		'   <input name="obat[' + row + '][kategori]" class="form-control kategori">' +
		'</td>' +
		'<td>' +
		'    <input type="text" name="obat[' + row + '][harga]" class="form-control harga" min="1">' +
		'<td>' +
		'    <input type="number" name="obat[' + row + '][jumlah]" class="form-control jumlah" autocomplete="off">' +
		'</td>' +
		'</td>' +
		'<td>' +
		'    <input type="text" disabled="" class="form-control text-right subtotal">' +
		'</td>' +
		'<td><a href="javascript:void(0);" onclick="obat_remove(' + row + ')"><i class="icon-x"></i></a></td>' +
		'</tr>';
	$('#table-rawat-jalan').append(html);
	initialize_select2_obat($("#obat-" + row + " .obat"));
	initialize_change_obat(row);
	initialize_change_jumlah(row);

}

function obat_remove(id) {
	delete obats[id];
	$('#obat-' + id).remove();
	if ($('#table-rawat-jalan tbody tr').length == 0) {
		row = -1;
		obat_add();
	}
	calc_total();
}

initialize_change_obat(0);
initialize_change_obat(1);
initialize_change_jumlah(0);
initialize_change_jumlah(1);
