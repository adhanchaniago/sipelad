<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('obat'); ?>" class="btn btn-sm btn-secondary">Kembali</a>
			</div>
		</div>
	</div>
</div>

<!-- Main Content -->
<section class="section">

	<div class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">

						<form action="<?= base_url('obat/store'); ?>" method="post">
							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama obat</label>
								<div class="col-sm-12 col-md-6">
									<input type="text" class="form-control <?= form_error('nm_obat') ? 'is-invalid' : ''; ?>" name="nm_obat" value="<?= set_value('nm_obat'); ?>">
									<div class="invalid-feedback">
										<?= form_error('nm_obat'); ?>
									</div>
								</div>
							</div>
							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
								<div class="col-sm-12 col-md-6">
									<input type="text" class="form-control <?= form_error('kategori') ? 'is-invalid' : ''; ?>" name="kategori" value="<?= set_value('kategori'); ?>">
									<div class="invalid-feedback">
										<?= form_error('kategori'); ?>
									</div>
								</div>
							</div>

							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Rak</label>
								<div class="col-sm-12 col-md-3">
									<input type="number" class="form-control <?= form_error('no_rak') ? 'is-invalid' : ''; ?>" name="no_rak" min="1" value="<?= set_value('no_rak'); ?>">
									<div class="invalid-feedback">
										<?= form_error('no_rak'); ?>
									</div>
								</div>
							</div>
							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
								<div class="col-sm-12 col-md-3">
									<input type="text" class="form-control <?= form_error('harga') ? 'is-invalid' : ''; ?>" name="harga" value="<?= set_value('harga'); ?>">
									<div class="invalid-feedback">
										<?= form_error('harga'); ?>
									</div>
								</div>
							</div>

							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah</label>
								<div class="col-sm-12 col-md-3">
									<input type="text" class="form-control <?= form_error('jumlah') ? 'is-invalid' : ''; ?>" name="jumlah" value="<?= set_value('jumlah'); ?>">
									<div class="invalid-feedback">
										<?= form_error('jumlah'); ?>
									</div>
								</div>
							</div>

							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
								<div class="col-sm-12 col-md-7">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
