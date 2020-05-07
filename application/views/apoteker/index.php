<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('apoteker/create'); ?>" class="btn btn-sm btn-success">Tambah Apoteker</a>
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
					<div class="">
						<div class="table-responsive">
							<table class="table table-striped" id="table">
								<thead>
									<tr class="text-center">
										<th>#</th>
										<th>Username</th>
										<th>Nama Apotker</th>
										<th>Alamat</th>
										<th>
											<i class="icon-cog5"></i>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($apotekers->result_array() as $key => $apoteker) : ?>
										<tr>
											<th><?= $key += 1; ?></th>
											<td><?= $apoteker['username']; ?></td>
											<td><?= $apoteker['nm_apoteker']; ?></td>
											<td class="text-center"><?= $apoteker['alamat']; ?></td>
											<td class="text-center">
												<a href="<?= base_url('apoteker/edit/' . encode($apoteker['id_apoteker'])); ?>" class="btn btn-primary btn-sm">Edit</a>
												<a href="<?= base_url('apoteker/delete/' . encode($apoteker['id_apoteker'])); ?>" class="btn btn-danger btn-sm btn-delete">Hapus</a>
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
