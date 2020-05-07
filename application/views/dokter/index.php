<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('dokter/create'); ?>" class="btn btn-sm btn-success">Tambah Dokter</a>
			</div>
		</div>
	</div>
</div>
<!-- /page header -->

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
									<tr class="text-center">
										<th>#</th>
										<th>Username</th>
										<th>Nama Dokter</th>
										<th>Spesialis</th>
										<th>Nomor Telepon</th>
										<th>Alamat</th>
										<th>
											<i class="icon-cog5"></i>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($dokters->result_array() as $key => $dokter) : ?>
										<tr>
											<th><?= $key += 1; ?></th>
											<td><?= $dokter['username']; ?></td>
											<td><?= $dokter['nm_dokter']; ?></td>
											<td><?= $dokter['spesialis']; ?></td>
											<td><?= $dokter['tlp_dokter']; ?></td>
											<td class="text-center"><?= $dokter['alamat'] ? $dokter['alamat'] : '-'; ?></td>
											<td class="text-center">
												<a href="<?= base_url('dokter/edit/' . encode($dokter['id_dokter'])); ?>" class="btn btn-primary btn-sm">Edit</a>
												<a href="<?= base_url('dokter/delete/' . encode($dokter['id_dokter'])); ?>" class="btn btn-danger btn-sm btn-delete">Hapus</a>
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
