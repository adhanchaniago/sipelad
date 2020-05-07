<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h2><?= $title; ?></h2>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
			</div>
		</div>
	</div>
</div>
<!-- /page header -->

<!-- Main Content -->
<section class="section">

	<div class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row" id="filter">
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" name="period" readonly="" id="period" autocomplete="off">
								</div>
							</div>
							<div class="col-md-3">
								<button class="btn btn-primary" id="filter-submit">Filter</button>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table" id="table-report" data-url="<?php echo base_url('penjualan-obat/') . 'get_list'; ?>">
								<thead class="bg-primary">
									<tr>
										<th>#</th>
										<th>Tanggal</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody></tbody>
								<tfoot>
									<tr>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	var table_el = 'table-report';
</script>
