<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Kampanie</h1>
	<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
	<?php if (isset($_SESSION['success'])) { ?>
		<div class="alert alert-success"><?php echo $_SESSION['success']; ?></div><?php
	}
	?>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Kampanie</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>Nazwa</th>
						<th>Link</th>
						<th>Baner</th>
						<th>Dodaj</th>
					</tr>
					</thead>
					<tfoot>
					<tr>
						<th>Nazwa</th>
						<th>Link</th>
						<th>Baner</th>
						<th>Dodaj</th>
					</tr>
					</tfoot>
					<tbody>

					<?php

					foreach ($blueActions as $blueActions) {

						if (isset($blueActions["banners"][1]["code"])) {

							$banner = explode("\"", $blueActions["banners"][1]["code"]);
							$banner = $banner[5];
						} else {
							$banner = "";
						}

						/*
											//	$link = explode("\"", $blueActions["links"][0]["code"]);
												try {
													$link = explode("\"", $blueActions["links"][0]["code"]);
													$campId = explode("=", $blueActions["links"][0]["code"]);
												} catch (Exception $e) {

												}*/
						$link = explode("\"", $blueActions["links"][0]["code"]);
						$campId = explode("=", $blueActions["links"][0]["code"]);

						?>

						<tr>
							<td><?php echo $blueActions["name"]; ?></td>

							<td><?php echo $link[1]; ?></td>
							<td><img src="<?php echo $banner; ?>" style="max-width: 200px; max-height: 200px"/></td>
							<td><a href="<?php echo base_url('panel/blueLead/add/' . $campId[4]) ?>"
								   class="btn btn-success btn-circle btn-lg">
									<i class="fas fa-check"></i>
								</a></td>
						</tr>
						<?php

					} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

