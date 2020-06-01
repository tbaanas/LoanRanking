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
						<a class="nav-link dropdown-toggle" href="<?php echo base_url('kontakt'); ?>>" id="userDropdown"
						   role="button">
							<span class="mr-2 d-none d-lg-inline text-gray-600">Kontakt</span>
						</a>
					</li>

				</ul>


			</nav>

			<div class="container-fluid">
				<div class="row justify-content-center">

					<div class="col-6">
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<div class="row">
									<div class="col-12">
										<h6 class="m-0 font-weight-bold text-primary">Kontakt</h6>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<form class="user" action="" method="post">
											<?php if (isset($_SESSION['success'])) { ?>
												<div
													class="alert alert-success"><?php echo $_SESSION['success']; ?></div><?php
											}
											if (isset($_SESSION['error'])) {
												?>
												<div
													class="alert alert-danger"><?php echo $_SESSION['error']; ?></div><?php
											}
											?>
											<div class="form-group row">
												<div class="col-12 mb-3 mb-sm-0">
													<input type="text" class="form-control form-control-user" id="Name"
														   name="name" placeholder="Imie i nazwisko" required>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-12 mb-3 mb-sm-0">
													<input type="email" class="form-control form-control-user"
														   id="Email" name="email" placeholder="Email" required>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-12 mb-3 mb-sm-0">
													<textarea class="form-control form-control-user" id="Text"
															  name="text" required></textarea>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-12 mb-3 mb-sm-0">
													<button type="submit" class="btn btn-primary btn-user btn-block"
															name="message">
														Wyślij
													</button>
												</div>
											</div>
										</form>
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
