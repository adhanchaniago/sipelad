<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Dashboard &mdash; Sipelad</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= public_url(); ?>libraries/bootstrap/css/bootstrap.min.css">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= public_url(); ?>node_modules/jqvmap/dist/jqvmap.min.css">
	<link rel="stylesheet" href="<?= public_url(); ?>node_modules/summernote/dist/summernote-bs4.css">
	<link rel="stylesheet" href="<?= public_url(); ?>node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= public_url(); ?>node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= public_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= public_url(); ?>assets/css/components.css">
</head>

<body>
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
						<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
					</ul>
				</form>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" src="<?= public_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
							<div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('nama'); ?></div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Logged in 5 min ago</div>
							<a href="features-profile.html" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profile
							</a>
							<a href="features-activities.html" class="dropdown-item has-icon">
								<i class="fas fa-bolt"></i> Activities
							</a>
							<a href="features-settings.html" class="dropdown-item has-icon">
								<i class="fas fa-cog"></i> Settings
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<div class="main-sidebar">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="#">Sipelad</a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="index.html">Spld</a>
					</div>
					<ul class="sidebar-menu">
						<li class="nav-item dropdown active">
							<a href="#" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
						</li>

						<?php if ($this->session->userdata('level') == 'admin') : ?>
							<li><a class="nav-link" href="<?= base_url('admin'); ?>"><i class="far fa-square"></i> <span>Admin</span></a></li>
							<li><a class="nav-link" href="<?= base_url('dokter'); ?>"><i class="far fa-square"></i> <span>Dokter</span></a></li>
							<li><a class="nav-link" href="<?= base_url('Apoteker'); ?>"><i class="far fa-square"></i> <span>Apoteker</span></a></li>
							<li><a class="nav-link" href="<?= base_url('Pasien'); ?>"><i class="far fa-square"></i> <span>Pasien</span></a></li>
						<?php elseif ($this->session->userdata('level') == 'dokter') : ?>
							<li><a class="nav-link" href="<?= base_url('Pasien'); ?>"><i class="far fa-square"></i> <span>Pasien</span></a></li>
							<li><a class="nav-link" href="<?= base_url('rekam_medis'); ?>"><i class="far fa-square"></i> <span>Rekam Medis</span></a></li>
							<li><a class="nav-link" href="<?= base_url('rawat_jalan'); ?>"><i class="far fa-square"></i> <span>Rawat Jalan</span></a></li>
						<?php elseif ($this->session->userdata('level') == 'apoteker') : ?>
							<li><a class="nav-link" href="<?= base_url('obat'); ?>"><i class="far fa-square"></i> <span>Obat</span></a></li>
							<li><a class="nav-link" href="<?= base_url('laporan'); ?>"><i class="far fa-square"></i> <span>Laporan</span></a></li>
						<?php endif; ?>
						<li><a class="nav-link" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-pencil-ruler"></i> <span>Logout</span></a></li>
					</ul>

				</aside>
			</div>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Dashboard</h1>
					</div>

					<div class="section-body">
					</div>
				</section>
			</div>
			<footer class="main-footer">
				<div class="footer-left">
					Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
				</div>
				<div class="footer-right">
					2.3.0
				</div>
			</footer>
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<!-- Jquery -->
	<script src="<?= public_url(); ?>libraries/jquery/jquery-3.4.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<!-- Popper -->
	<script src="<?= public_url(); ?>libraries/popper/popper.min.js"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- Bootstrap -->
	<script src="<?= public_url(); ?>libraries/bootstrap/js/bootstrap.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?= public_url(); ?>assets/js/stisla.js"></script>
	<!-- Font Awesome -->
	<script src="<?= public_url(); ?>libraries/fontawesome/js/all.js"></script>
	<!-- JS Libraies -->
	<script src="<?= public_url(); ?>node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="<?= public_url(); ?>node_modules/chart.js/dist/Chart.min.js"></script>
	<script src="<?= public_url(); ?>node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
	<script src="<?= public_url(); ?>node_modules/summernote/dist/summernote-bs4.js"></script>
	<script src="<?= public_url(); ?>node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

	<!-- Template JS File -->
	<script src="<?= public_url(); ?>assets/js/scripts.js"></script>
	<script src="<?= public_url(); ?>assets/js/custom.js"></script>

	<!-- Page Specific JS File -->
	<script src="<?= public_url(); ?>assets/js/page/index.js"></script>
</body>

</html>
