<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('pasien/create'); ?>" class="btn btn-sm btn-success">Tambah Pasien</a>
			</div>
		</div>
	</div>
</div>
<!-- /page header -->

<!-- Main Content -->
<section class="section">

	<div class="content">
		<?php if ($this->session->flashdata('message')) : ?>
			<?= $this->session->flashdata('message'); ?>
		<?php endif; ?>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped" id="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Pasien</th>
										<th>Nama Keluarga</th>
										<th>Jenis Kelamin</th>
										<th>Umur</th>
										<th>Alamat</th>
										<th class="text-center">
											<i class="icon-cog5"></i>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($pasiens->result_array() as $key => $pasien) : ?>
										<tr>
											<th><?= $key += 1; ?></th>
											<td><?= $pasien['nm_pasien']; ?></td>
											<td><?= $pasien['nm_keluarga']; ?></td>
											<td><?= $pasien['jenis_kelamin'] == 'l' ? 'Laki-laki' : 'Perempuan'; ?></td>
											<td><?= $pasien['umur']; ?></td>
											<td><?= $pasien['alamat']; ?></td>
											<td class="text-center">
												<a href="<?= base_url('pasien/edit/' . encode($pasien['id_pasien'])); ?>" class="btn btn-primary btn-sm">Edit</a>
												<a href="<?= base_url('pasien/delete/' . encode($pasien['id_pasien'])); ?>" class="btn btn-danger btn-sm btn-delete">Hapus</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
