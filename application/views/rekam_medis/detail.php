<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('rekam-medis'); ?>" class="btn btn-sm btn-secondary">Kembali</a>
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

			</div>
		</div>

		<div>
			<div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="mb-4">
								<div class="mb-4 text-muted mt-md-2">Dokter :</div>
								<ul class="list list-unstyled mb-0">
									<li>
										<h5 class="my-2"><?= $this->session->userdata('nama'); ?></h5>
									</li>
									<li><?= $rm['tlp_dokter']; ?></li>
									<li><?= $rm['alamat_dktr']; ?></li>
								</ul>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="mb-4">
								<div class="text-sm-right">
									<div class="mb-4 text-muted mt-md-2">Pasien :</div>
									<ul class="list list-unstyled mb-0">
										<li>
											<h5 class="my-2"><?= $rm['nm_pasien']; ?></h5>
										</li>
										<li><span class="font-weight-semibold"><?= $rm['jenis_kelamin'] == 'l' ? 'Laki-laki' : 'Perempuan'; ?></span></li>
										<li><?= $rm['umur']; ?> Tahun</li>
										<li><?= $rm['alamat']; ?></li>
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
								<th>Tanggal</th>
								<th class="text-center">Diagnosa</th>
								<th class="text-center">Resep Obat</th>
								<th class="text-right">Kesimpulan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td><?= $rm['tanggal']; ?></td>
								<td class="text-center"><?= $rm['diagnosa']; ?></td>
								<td class="text-center"><?= $rm['resep_obat']; ?></td>
								<td class="text-right"><?= $rm['kesimpulan']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
	<!-- /editable invoice -->
</div>
