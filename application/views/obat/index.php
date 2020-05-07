<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('obat/create'); ?>" class="btn btn-sm btn-success">Tambah Obat</a>
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
										<th>Nama Obat</th>
										<th>Kategori</th>
										<th>No. Rak</th>
										<th>Harga</th>
										<th>Jumlah</th>
										<th class="text-center">
											<i class="icon-cog5"></i>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($obats->result_array() as $key => $obat) : ?>
										<tr>
											<th><?= $key += 1; ?></th>
											<td><?= $obat['nm_obat']; ?></td>
											<td><?= $obat['kategori']; ?></td>
											<td><?= $obat['no_rak']; ?></td>
											<td><?= format_rupiah($obat['harga']); ?></td>
											<td><?= $obat['jumlah']; ?></td>
											<td class="text-center">
												<a href="<?= base_url('obat/edit/' . encode($obat['id_obat'])); ?>" class="btn btn-primary btn-sm">Edit</a>
												<a href="<?= base_url('obat/delete/' . encode($obat['id_obat'])); ?>" class="btn btn-danger btn-sm btn-delete">Hapus</a>
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
