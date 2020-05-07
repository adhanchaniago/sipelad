<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('apoteker'); ?>" class="btn btn-sm btn-secondary">Kembali</a>
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

						<form action="<?= base_url('apoteker/store'); ?>" method="post">
							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Apoteker</label>
								<div class="col-sm-12 col-md-6">
									<input type="text" class="form-control <?= form_error('nm_apoteker') ? 'is-invalid' : ''; ?>" name="nm_apoteker" value="<?= set_value('nm_apoteker'); ?>">
									<div class="invalid-feedback">
										<?= form_error('nm_apoteker'); ?>
									</div>
								</div>
							</div>
							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
								<div class="col-sm-12 col-md-6">
									<input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : ''; ?>" name="username" value="<?= set_value('username'); ?>">
									<div class="invalid-feedback">
										<?= form_error('username'); ?>
									</div>
								</div>
							</div>

							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
								<div class="col-sm-12 col-md-6">
									<textarea name="alamat" id="" cols="" rows="" class="form-control <?= form_error('alamat') ? 'is-invalid' : ''; ?>"><?= set_value('alamat'); ?></textarea>
									<div class="invalid-feedback">
										<?= form_error('alamat'); ?>
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
