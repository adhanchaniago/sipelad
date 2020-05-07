<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('dokter'); ?>" class="btn btn-sm btn-secondary">Kembali</a>
			</div>
		</div>
	</div>
</div>

<section class="section">

	<div class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">

						<form action="<?= base_url('dokter/store'); ?>" method="post">
							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Dokter</label>
								<div class="col-sm-12 col-md-6">
									<input type="text" class="form-control <?= form_error('nm_dokter') ? 'is-invalid' : ''; ?>" name="nm_dokter" value="<?= set_value('nm_dokter'); ?>">
									<div class="invalid-feedback">
										<?= form_error('nm_dokter'); ?>
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
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Spesialis</label>
								<div class="col-sm-12 col-md-6">
									<input type="text" class="form-control <?= form_error('spesialis') ? 'is-invalid' : ''; ?>" name="spesialis" value="<?= set_value('spesialis'); ?>">
									<div class="invalid-feedback">
										<?= form_error('spesialis'); ?>
									</div>
								</div>
							</div>

							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Telepone</label>
								<div class="col-sm-12 col-md-4">
									<input type="text" class="form-control <?= form_error('tlp_dokter') ? 'is-invalid' : ''; ?>" name="tlp_dokter" value="<?= set_value('tlp_dokter'); ?>">
									<div class="invalid-feedback">
										<?= form_error('tlp_dokter'); ?>
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
