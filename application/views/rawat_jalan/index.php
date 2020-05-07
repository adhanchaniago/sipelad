<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('rawat-jalan/create'); ?>" class="btn btn-sm btn-success">Tambah Rawat Jalan</a>
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
							<table class="table table-striped" id="datatable">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Pasien</th>
										<th>Tanggal</th>
										<th>Total</th>
										<th class="text-center">
											<i class="icon-cog5"></i>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rawat_jalan->result_array() as $key => $rj) : ?>
										<tr>
											<th><?= $key += 1; ?></th>
											<td><?= $rj['nm_pasien']; ?></td>
											<td><?= $rj['tanggal']; ?></td>
											<td><?= format_rupiah($rj['total']); ?></td>
											<td class="text-center">
												<a href="<?= base_url('rawat-jalan/detail/' . encode($rj['id_rawat_jalan'])); ?>" class="btn btn-info btn-sm">Detail</a>
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
