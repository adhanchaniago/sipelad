<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

	</div>

</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
	<div class="row">
		<div class="col-lg-3">
			<div class="card bg-primary-400">
				<div class="card-body dashboard-stat">
					<a href="#" class="stretched-link"></a>
					<div class="visual">
						<i class="icon-users"></i>
					</div>
					<div class="detail">
						<div class="number">
							<span><?= $dokter; ?></span>
						</div>
						<div class="desc text-right"> Dokter </div>
					</div>
				</div>

				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
		</div>

		<div class="col-lg-3">
			<div class="card bg-danger-400">
				<div class="card-body dashboard-stat">
					<a href="#" class="stretched-link"></a>
					<div class="visual">
						<i class="icon-users"></i>
					</div>
					<div class="detail">
						<div class="number">
							<span><?= $apoteker; ?></span>
						</div>
						<div class="desc text-right"> Apoteker </div>
					</div>
				</div>

				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
		</div>

		<div class="col-lg-3">
			<div class="card bg-success-400">
				<div class="card-body dashboard-stat">
					<a href="#" class="stretched-link"></a>
					<div class="visual">
						<i class="icon-users"></i>
					</div>
					<div class="detail">
						<div class="number">
							<span><?= $pasien; ?></span>
						</div>
						<div class="desc text-right"> Pasien </div>
					</div>
				</div>

				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
		</div>

		<div class="col-lg-3">
			<div class="card bg-info-400">
				<div class="card-body dashboard-stat">
					<a href="#" class="stretched-link"></a>
					<div class="visual">
						<i class="icon-credit-card"></i>
					</div>
					<div class="detail">
						<div class="number">
							<span><?= format_rupiah($total_obat['total']); ?></span>
						</div>
						<div class="desc text-right"> Penjualan Obat </div>
					</div>
				</div>

				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
		</div>

	</div>

</div>
