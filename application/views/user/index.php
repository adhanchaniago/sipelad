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

<!-- Main Content -->
<section class="section">
	<div class="content">
		<div class="row">
			<!-- Column -->
			<div class="col-lg-4 col-xlg-3 col-md-5">
				<div class="card">
					<div class="card-block">
						<center class="mt-4"> <img src="<?= public_url(); ?>global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="150" />
							<h4 class="card-title m-t-10"><?= $this->session->userdata('nama'); ?></h4>
							<h6 class="card-subtitle"><?= ucfirst($this->session->userdata('level')) ?></h6>

						</center>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
	</div>
</section>

<!-- /main content -->
