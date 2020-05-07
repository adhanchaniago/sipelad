<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $title; ?> &mdash; Sipelad</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= public_url(); ?>global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?= public_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= public_url(); ?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?= public_url(); ?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?= public_url(); ?>assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?= public_url(); ?>assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<link href="<?= public_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<style>
		.dashboard-stat {
			position: relative;
		}

		.visual>i {
			position: relative;
			top: 25px;
			margin-left: -30px !important;
			font-size: 100px;
			line-height: 80px;
			color: #FFF;
			opacity: .1;
		}

		.detail {
			position: absolute;
			top: 25px;
			right: 1px;
			padding-right: 10px;
		}

		.number {
			text-align: right;
			font-size: 34px;
			line-height: 36px;
			letter-spacing: -1px;
			margin-bottom: 0;
			font-weight: 300;
			color: #FFF;
		}

		.card-header:not([class*=bg-]):not([class*=alpha-]) {
			padding-top: .8rem;
			padding-bottom: .8rem;
		}

		.net-worth {
			border-bottom: 1px solid rgba(0, 0, 0, .125) !important;
		}
	</style>

	<?php if (isset($addon_style)) : ?>
		<?php addon_style($addon_style) ?>
	<?php endif; ?>

</head>

<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark fixed-top">
		<div class="navbar-brand">
			<a href="<?= base_url('dashboard'); ?>" class="d-inline-block text-uppercase text-white">
				<p>Sipelad</p>
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

			</ul>

			<span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

			<ul class="navbar-nav">

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="<?= public_url(); ?>global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
						<span><?= $this->session->userdata('nama'); ?></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?= base_url('user'); ?>" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<a href="<?= base_url('auth/logout'); ?>" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header">
							<div class="text-uppercase font-size-xs line-height-xs">Menu <?= $this->session->userdata('level'); ?></div> <i class="icon-menu" title="Main"></i>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('dashboard'); ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>

						<?php if ($this->session->userdata('level') == 'admin') : ?>
							<!-- <li class="nav-item"><a href="#" class="nav-link <?= $this->uri->segment(1) == 'admin' ? 'active' : ''; ?>"><i class="icon-user-tie"></i> <span>Admin</span></a></li> -->
							<li class="nav-item"><a href="<?= base_url('dokter'); ?>" class="nav-link <?= $this->uri->segment(1) == 'dokter' ? 'active' : ''; ?>"><i class="icon-user-tie"></i> <span>Dokter</span></a></li>
							<li class="nav-item"><a href="<?= base_url('apoteker'); ?>" class="nav-link <?= $this->uri->segment(1) == 'apoteker' ? 'active' : ''; ?>"><i class="icon-users"></i> <span>Apoteker</span></a></li>
							<li class="nav-item"><a href="<?= base_url('pasien'); ?>" class="nav-link <?= $this->uri->segment(1) == 'pasien' ? 'active' : ''; ?>"><i class="icon-users2"></i> <span>Pasien</span></a></li>
							<li class="nav-item nav-item-submenu">
								<a href="#" class="nav-link"><i class="icon-graph"></i> <span>Laporan</span></a>
								<ul class="nav nav-group-sub" data-submenu-title="Laporan">
									<li class="nav-item"><a href="<?= base_url('penjualan-obat'); ?>" class="nav-link <?= $this->uri->segment(1) == 'penjualan-obat' ? 'active' : ''; ?>">Penjualan Obat</a></li>
								</ul>
							</li>
							<!-- /Admin -->

						<?php elseif ($this->session->userdata('level') == 'dokter') : ?>
							<li class="nav-item"><a href="<?= base_url('pasien'); ?>" class="nav-link <?= $this->uri->segment(1) == 'pasien' ? 'active' : ''; ?>"><i class="icon-users2"></i> <span>Pasien</span></a></li>
							<li class="nav-item"><a href="<?= base_url('rekam-medis'); ?>" class="nav-link <?= $this->uri->segment(1) == 'rekam-medis' ? 'active' : ''; ?>"><i class="icon-width"></i> <span>Rekam Medis</span></a></li>
							<!-- /Dokter -->
						<?php elseif ($this->session->userdata('level') == 'apoteker') : ?>
							<li class="nav-item"><a href="<?= base_url('obat'); ?>" class="nav-link <?= $this->uri->segment(1) == 'obat' ? 'active' : ''; ?>"><i class="icon-cube4"></i> <span>Obat</span></a></li>
							<li class="nav-item"><a href="<?= base_url('rawat-jalan'); ?>" class="nav-link <?= $this->uri->segment(1) == 'rawat-jalan' ? 'active' : ''; ?>"><i class="icon-width"></i> <span>Rawat Jalan</span></a></li>
							<li class="nav-item nav-item-submenu">
								<a href="#" class="nav-link"><i class="icon-graph"></i> <span>Laporan</span></a>
								<ul class="nav nav-group-sub" data-submenu-title="Laporan">
									<li class="nav-item"><a href="<?= base_url('penjualan-obat'); ?>" class="nav-link <?= $this->uri->segment(1) == 'penjualan-obat' ? 'active' : ''; ?>">Penjualan Obat</a></li>
								</ul>
							</li>
						<?php endif; ?>
						<li class="nav-item"><a href="<?= base_url('auth/logout'); ?>" class="nav-link"><i class="icon-switch2"></i> <span>Logout</span></a></li>

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->

		</div>
		<!-- /main sidebar -->
		<!-- Main content -->
		<div class="content-wrapper">
