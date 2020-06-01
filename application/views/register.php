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
	<link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url('assets/css/sb-admin-2.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/switch.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-6 col-lg-6 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg-12">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Zarejestruj się!</h1>
						</div>
						<form class="user" action="" method="post">
							<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
							<?php if(isset($_SESSION['success'])){?>
								<div class="alert alert-success"><?php echo $_SESSION['success'];?></div><?php
							}
							?>
							<div class="form-group">

									<input type="text" class="form-control form-control-user" id="Username" placeholder="Login" name="username">

							</div>
							<div class="form-group">

									<input type="password" class="form-control form-control-user" id="Password" name="password" placeholder="Hasło">

							</div>



							<div class="form-group">
								<input type="email" class="form-control form-control-user" id="Email" name="email" placeholder="Email">
							</div>

							<button  type="submit" class="btn btn-primary btn-user btn-block" name="register">
								Rejestruj
							</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/js/demo/chart-area-demo.js')?>"></script>
<script src="<?php echo base_url('assets/js/demo/chart-pie-demo.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/js/demo/datatables-demo.js')?>"></script>
</body>

</html>
