<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Login &mdash; Sipelad</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= public_urll(); ?>libraries/bootstrap/css/bootstrap.min.css">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= public_urll(); ?>node_modules/bootstrap-social/bootstrap-social.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= public_urll(); ?>assets/css/style.css">
	<!-- <link rel="stylesheet" href="<?= public_urll(); ?>assets/css/components.css"> -->
</head>

<body>
	<div id="app">
		<section class="">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="login-brand"></div>

						<div class="card card-primary">
							<div class="card-header">
								<h4>Login</h4>
							</div>

							<div class="card-body">
								<?php if ($this->session->flashdata('message')) : ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong><?= $this->session->flashdata('message'); ?></strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								<?php endif; ?>

								<form method="POST" action="<?= base_url('auth'); ?>">
									<div class="form-group">
										<label for="username">Username</label>
										<input id="username" type="text" class="form-control <?= form_error('username') ? 'is-invalid' : ''; ?>" name="username" autofocus value="<?= set_value('username'); ?>">
										<div class="invalid-feedback">
											<?= form_error('username') ?>
										</div>
									</div>

									<div class="form-group">
										<div class="d-block">
											<label for="password" class="control-label">Password</label>
										</div>
										<input id="password" type="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" name="password" tabindex="2">
										<div class="invalid-feedback">
											<?= form_error('password') ?>
										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Login
										</button>
									</div>
								</form>

							</div>
						</div>
						<!-- <div class="mt-5 text-muted text-center">
							Don't have an account? <a href="auth-register.html">Create One</a>
						</div> -->
						<div class="simple-footer"></div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<!-- Jquery CDN -->
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
	<!-- Jquery -->
	<script src="<?= public_urll(); ?>libraries/jquery/jquery-3.4.1.min.js"></script>

	<!-- Popper CDN -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
	<!-- Popper -->
	<script src="<?= public_urll(); ?>libraries/popper/popper.min.js"></script>

	<!-- Bootstrap CDN -->
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
	<!-- Bootstrap -->
	<script src="<?= public_urll(); ?>libraries/bootstrap/js/bootstrap.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?= public_urll(); ?>assets/js/stisla.js"></script>

	<!-- Template JS File -->
	<script src="<?= public_urll(); ?>assets/js/scripts.js"></script>
	<script src="<?= public_urll(); ?>assets/js/custom.js"></script>

	<!-- Page Specific JS File -->
</body>

</html>
