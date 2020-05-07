<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('rawat-jalan'); ?>" class="btn btn-sm btn-secondary">Kembali</a>
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

						<form action="<?= base_url('rawat-jalan/store'); ?>" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="d-block">Nama Pasien</label>
										<select data-placeholder="Select a state" name="id_pasien" id="pasien" class="form-control select2" <?= form_error('id_pasien') ? 'is-invalid' : ''; ?>" data-fouc>
											<option></option>
											<?php foreach ($pasiens->result_array() as $pasien) : ?>
												<option value="<?= $pasien['id_pasien']; ?>"><?= $pasien['nm_pasien'] ?></option>
											<?php endforeach; ?>
										</select>
										<div class="invalid-feedback">
											<?= form_error('id_pasien'); ?>
										</div>

									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table" id="table-rawat-jalan">
											<thead class="bg-primary">
												<tr>
													<th width="200">Nama Obat</th>
													<th>Kategori</th>
													<th>Harga</th>
													<th class="" style="width: 130px;">Jumlah</th>
													<th>Subtotal</th>
													<th class="p-0" width="10px"></th>
												</tr>
											</thead>
											<tbody>
												<tr id="obat-0">
													<td>
														<div class="form-group">
															<select data-placeholder="Select a state" name="obat[0][id_obat]" id="obat-obat-0" class="form-control select2 obat" <?= form_error('id_obat') ? 'is-invalid' : ''; ?>" data-fouc>
																<option></option>
																<?php foreach ($obats->result_array() as $obat) : ?>
																	<option value="<?= $obat['id_obat']; ?>"><?= $obat['nm_obat'] ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" name="obat[0][kategori]" class="form-control kategori">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" name="obat[0][harga]" readonly class="form-control harga">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="number" name="obat[0][jumlah]" class="form-control jumlah" min="1">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" name="obat[0][subtotal]" readonly class="text-right form-control subtotal" id="subtotal">
														</div>
													</td>
													<td class="pt-0">
														<a href="javascript:void(0);" onclick="obat_remove(1)"><i class="icon-x"></i></a>
													</td>
												</tr>
												<tr id="obat-1">
													<td>
														<div class="form-group">
															<select data-placeholder="Select a state" name="obat[1][id_obat]" id="obat-obat-1" class="form-control select2 obat" <?= form_error('id_obat') ? 'is-invalid' : ''; ?>" data-fouc>
																<option></option>
																<?php foreach ($obats->result_array() as $obat) : ?>
																	<option value="<?= $obat['id_obat']; ?>"><?= $obat['nm_obat'] ?></option>
																<?php endforeach; ?>
															</select>
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" name="obat[1][kategori]" class="form-control kategori">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" name="obat[1][harga]" readonly class="form-control harga">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="number" name="obat[1][jumlah]" class="form-control jumlah" min="1">
														</div>
													</td>
													<td>
														<div class="form-group">
															<input type="text" name="obat[1][subtotal]" readonly class="text-right form-control subtotal">
														</div>
													</td>
													<td class="pt-0">
														<a href="javascript:void(0);" onclick="obat_remove(1)"><i class="icon-x"></i></a>
													</td>
												</tr>
											</tbody>
										</table>
										<a href="javascript:void(0);" class="btn btn-success" onclick="obat_add()">Tambah Obat</a>
									</div>
								</div>
							</div>

							<div class="d-md-flex flex-md-wrap">
								<div class="pt-2 mb-3 wmin-md-400 ml-auto">
									<div class="table-responsive">
										<table class="table" id="table-subtotal">
											<tbody>
												<tr id="total">
													<th>Total</th>
													<td class="text-right text-primary">
														<input type="text" name="total" class="text-right d-none">
														<h5 class="font-weight-semibold"></h5>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary float-right">Simpan</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	var obats = {};
	var row = 1;
</script>
<?php $this->load->view('pasien/modal_add', true);
