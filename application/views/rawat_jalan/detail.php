<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('rawat-jalan'); ?>" class="btn btn-sm btn-secondary">Kembali</a>
			</div>
		</div>
	</div>
</div>
<!-- /page header -->

<!-- Main Content -->
<div class="content">
	<!-- Editable invoice -->
	<div class="card">
		<div class="card-header header-elements-inline">
			<h6 class="card-title"></h6>
			<div class="header-elements">
				<button type="button" class="btn btn-light btn-sm ml-3" onclick="cetak()"><i class="icon-printer mr-2"></i> Print</button>
			</div>
		</div>

		<div>
			<div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="mb-4">
								<div class="mb-4 text-muted mt-md-2">Apoteker :</div>
								<ul class="list list-unstyled mb-0">
									<li>
										<h5 class="my-2"><?= $rj['nm_apoteker']; ?></h5>
									</li>
									<li><?= $rj['alamat_aptk']; ?></li>
									<li></li>
								</ul>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="mb-4">
								<div class="text-sm-right">
									<div class="mb-4 text-muted mt-md-2">Pasien :</div>
									<ul class="list list-unstyled mb-0">
										<li>
											<h5 class="my-2"><?= $rj['nm_pasien']; ?></h5>
										</li>
										<li><span class="font-weight-semibold"><?= $rj['jenis_kelamin'] == 'l' ? 'Laki-laki' : 'Perempuan'; ?></span></li>
										<li><?= $rj['umur']; ?> Tahun</li>
										<li><?= $rj['alamat']; ?></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="table-responsive">
					<table class="table table-lg">
						<thead>
							<tr>
								<th data-width="40">#</th>
								<th class="text-center">Nama Obat</th>
								<th class="text-center">Harga</th>
								<th class="text-center">Jumlah Obat</th>
								<th class="text-right">Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($detail->result_array() as $key => $drj) : ?>
								<tr>
									<td><?= $key += 1; ?></td>
									<td><?= $drj['nm_obat']; ?></td>
									<td class="text-center"><?= format_rupiah($drj['harga']); ?></td>
									<td class="text-center"><?= $drj['jumlah']; ?></td>
									<td class="text-right"><?= format_rupiah($drj['total_harga']); ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<div class="card-body">
					<div class="d-md-flex flex-md-wrap">

						<div class="pt-2 mb-3 wmin-md-400 ml-auto">

							<div class="table-responsive">
								<table class="table">
									<tbody>
										<tr>
											<th>Total:</th>
											<td class="text-right text-primary">
												<h5 class="font-weight-semibold"><?= format_rupiah($rj['total']); ?></h5>
											</td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- /editable invoice -->
</div>

<script>
	function cetak() {
		window.print();
	}
</script>
