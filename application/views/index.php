<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Dashboard</title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet"
		  type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/switch.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

				<!-- Sidebar Toggle (Topbar) -->
				<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
					<i class="fa fa-bars"></i>
				</button>

				<!-- Topbar Search -->
				<span><a href="<?php echo base_url(); ?>">HOME</a></span>

				<!-- Topbar Navbar -->
				<ul class="navbar-nav ml-auto">



				<!--	<li class="nav-item dropdown no-arrow">
						<a class="nav-link" href="Kredyty" id="userDropdown">
							<span class="mr-2 d-none d-lg-inline text-gray-600 ">Kredyty</span>
						</a>
					</li>-->
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="kontakt" id="userDropdown" role="button">
							<span class="mr-2 d-none d-lg-inline text-gray-600">Kontakt</span>
						</a>
					</li>

				</ul>


			</nav>

			<div class="container-fluid">
				<div class="row justify-content-center">
					<div class="row">
						<div class="col-lg-9">

							<?php
							foreach($camp as $camp){
								?>
								<div class="col-lg-12">
									<div class="card shadow mb-4">
										<div class="card-header py-3">
											<div class="row">
												<div class="col-sm-10">
													<h6 class="m-0 font-weight-bold text-primary"><?php echo $camp->name;?></h6>
												</div>
												<div class="col-sm-2">
													<?php if ($camp->bik == 1) {

														?>
														<a href="#" class="btn btn-info btn-icon-split">

															<span class="text">BIK</span>
														</a>
														<?php
													} else {
														?>
														<a href="#" class="btn btn-danger btn-icon-split">

															<span class="text">Bez BIK</span>
														</a>
														<?php
													}
													?>

												</div>
											</div>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-sm-12 col-md-3">
													<img
														src="<?php echo $camp->fileName;?>"
														style="max-height: 150px; max-width: 150px;"/>
												</div>
												<div class="col-sm-12 col-md-6">
													<div>
														<h4>Oprocentowanie: <b><?php echo $camp->rate;?></b>% Prowizja: <b><?php echo $camp->commission;?></b>%</h4>
													</div>
													<hr>
													<div>
													<?php echo $camp->desc;?>
													</div>
												</div>

												<div class="col-sm-6 col-md-3">
													<span>Ofertę wybrało:<b><?php echo $camp->views;?></b> Osób</span>
													<a href="<?php echo base_url('link/?goto='.$camp->id); ?>" target="_blank" class="btn btn-info">SPRAWDŹ OFERTĘ!</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
							}

							?>
						</div>

						<div class="col-lg-3">
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-12 center-block">
											<img
												src="http://cdn.bsbox.pl/files/blueleadtest/ZDg7MDA_/978908d401682b9497922813d79884d0.jpg"
												style="max-height: 150px; max-width: 150px;"/>
										</div>
										<div class="col-12">
											The styling for this basic card example is created by using default
											Bootstrap utility classes.
										</div>
										<div class="col-12">
											<hr>
											<span>Ofertę wybrało:<b>12</b> Osób</span>
											<button type="button" class="btn btn-info">SPRAWDŹ OFERTĘ!</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>
</div>
</div>


<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Your Website 2019</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->


<!-- Bootstrap core JavaScript-->
<!-- Bootstrap core JavaScript-->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/js/demo/chart-area-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/js/demo/chart-pie-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/js/demo/datatables-demo.js') ?>"></script>

</body>

</html>
