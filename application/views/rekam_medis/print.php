<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= public_url(); ?>libraries/bootstrap/css/bootstrap.css">

</head>

<!-- Main Content -->
<div class="main-content">
	<section class="section">

		<div class="section-body">
			<div class="invoice">
				<div class="invoice-print">
					<div class="row">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-md-6">
									<address>
										<strong>Dokter:</strong><br>
										<?= $this->session->userdata('nama'); ?><br>
										<?= $rm['tlp_dokter']; ?><br>
										<?= $rm['alamat_dktr']; ?>
									</address>
								</div>
								<div class="col-md-6 text-md-right">
									<address>
										<strong>Pasien:</strong><br>
										<?= $rm['nm_pasien']; ?><br>
										<?= $rm['jenis_kelamin'] == 'l' ? 'Laki-laki' : 'Perempuan'; ?><br>
										<?= $rm['umur']; ?><br>
										<?= $rm['alamat']; ?>
									</address>
								</div>
							</div>

						</div>
					</div>

					<div class="row mt-4">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped table-hover table-md">
									<tr>
										<th data-width="40">#</th>
										<th>Tanggal</th>
										<th class="text-center">Diagnosa</th>
										<th class="text-center">Resep Obat</th>
										<th class="text-right">Kesimpulan</th>
									</tr>
									<tr>
										<?php $array_obat = explode(' ', $rm['resep_obat']); ?>
										<td>1</td>
										<td><?= $rm['tanggal']; ?></td>
										<td class="text-center"><?= $rm['diagnosa']; ?></td>
										<td class="text-center"><?= $array_obat[0]; ?></td>
										<td class="text-right"><?= $rm['kesimpulan']; ?></td>
									</tr>
								</table>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>

<script>
	window.print();
</script>
