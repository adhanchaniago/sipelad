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

<!-- Main Content -->
<section class="section">

	<div class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">

						<form action="<?= base_url('rekam-medis/store'); ?>" method="post">
							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pasien</label>
								<div class="col-sm-12 col-md-6">
									<select data-placeholder="Select a state" name="id_pasien" id="pasien" class="form-control select2 <?= form_error('id_pasien') ? 'is-invalid' : ''; ?>" data-fouc>
										<option></option>
										<?php foreach ($pasiens->result_array() as $pasien) : ?>
											<option value="<?= $pasien['id_pasien']; ?>"><?= $pasien['nm_pasien'] ?></option>
										<?php endforeach; ?>
									</select>
									<div class="invalid-feedback">
										<?= form_error('id_pasien'); ?>
									</div>
								</div>
								<div class="col-md-2 d-flex">
									<a href="javascript:void(0)" class="mt-1 justify-content-center" data-toggle="modal" data-target="#modal-add-pasien"><i class="icon-plus3"></i> Tambah</a>
								</div>
							</div>

							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Diagnosa</label>
								<div class="col-sm-12 col-md-6">
									<textarea name="diagnosa" id="" cols="30" rows="10" class="form-control <?= form_error('diagnosa') ? 'is-invalid' : ''; ?>"><?= set_value('diagnosa'); ?></textarea>
									<div class="invalid-feedback">
										<?= form_error('diagnosa'); ?>
									</div>
								</div>
							</div>

							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Resep Obat</label>
								<div class="col-sm-12 col-md-6">
									<textarea name="resep_obat" id="" cols="30" rows="10" class="form-control <?= form_error('resep_obat') ? 'is-invalid' : ''; ?>"><?= set_value('resep_obat'); ?></textarea>
									<div class="invalid-feedback">
										<?= form_error('resep_obat'); ?>
									</div>
								</div>
							</div>

							<div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kesimpulan</label>
								<div class="col-sm-12 col-md-6">
									<textarea name="kesimpulan" id="" cols="" rows="" class="form-control <?= form_error('kesimpulan') ? 'is-invalid' : ''; ?>"><?= set_value('kesimpulan'); ?></textarea>
									<div class="invalid-feedback">
										<?= form_error('kesimpulan'); ?>
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
<?php $this->load->view('pasien/modal_add', true);
