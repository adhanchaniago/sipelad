<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('rekam-medis/create'); ?>" class="btn btn-sm btn-success">Tambah Rekam Medis</a>
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
										<th>Tanggal</th>
										<th>Diagnosa</th>
										<th>Resep Obat</th>
										<th>Kesimpulan</th>
										<th class="text-center">
											<i class="icon-cog5"></i>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rekam_medis->result_array() as $key => $rm) : ?>
										<tr>
											<th><?= $key += 1; ?></th>
											<td><?= $rm['nm_pasien']; ?></td>
											<td><?= $rm['tanggal']; ?></td>
											<td><?= $rm['diagnosa']; ?></td>
											<td><?= str_replace(' ', ', ', $rm['resep_obat']); ?></td>
											<td><?= $rm['kesimpulan']; ?></td>
											<td class="text-center">
												<a href="<?= base_url('rekam-medis/detail/' . encode($rm['id_rekam_medis'])); ?>" class="btn btn-info btn-sm">Detail</a>
												<a target="_blank" href="<?= base_url('rekam-medis/print/' . encode($rm['id_rekam_medis'])); ?>" class="btn btn-sm btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</a>
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
