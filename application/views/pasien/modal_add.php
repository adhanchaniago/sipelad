<div id="modal-add-pasien" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form id="form-add-pasien" action="" method="post" class="form">
				<div class="modal-body">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Nama Pasien</label>
						<div class="col-sm-8">
							<input type="name" class="form-control" name="nm_pasien" required="">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Nama Keluarga</label>
						<div class="col-sm-8">
							<input type="text" name="nm_keluarga" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-8">
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input type="radio" class="form-check-input-styled" checked data-fouc name="jenis_kelamin" value="l">
									Laki-laki
								</label>
							</div>

							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input type="radio" class="form-check-input-styled" data-fouc name="jenis_kelamin" value="p">
									Perempuan
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Umur</label>
						<div class="col-sm-4">
							<input type="number" name="umur" class="form-control" min="1" required=''>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Alamat</label>
						<div class="col-sm-8">
							<textarea name="alamat" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn bg-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	var base_url = "<?php echo base_url('pasien/store_ajax'); ?>"
</script>
