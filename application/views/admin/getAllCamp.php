<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Kampanie</h1>
	<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
	<?php if(isset($_SESSION['success'])){?>
		<div class="alert alert-success"><?php echo $_SESSION['success'];?></div><?php
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
						<th>#</th>
						<th>Nazwa</th>
						<th>Miniaturka</th>
						<th>Opis</th>
						<th>Link</th>
						<th>Aktywna</th>
						<th>Edytuj/Usuń</th>
					</tr>
					</thead>
					<tfoot>
					<tr>
						<th>#</th>
						<th>Nazwa</th>
						<th>Miniaturka</th>
						<th>Opis</th>
						<th>Link</th>
						<th>Aktywna</th>
						<th>Edytuj/Usuń</th>
					</tr>
					</tfoot>
					<tbody>
					<?php
					foreach ($campaigns as $campaign){
						?>
						<tr>
							<td><?php echo $campaign->id; ?></td>
							<td><?php echo $campaign->name; ?></td>
							<td><img src="<?php
								$pos = strpos($campaign->fileName, "http://");
if($pos===false){
	echo base_url('uploads/img/'.$campaign->fileName);
}else
								echo $campaign->fileName; ?>" style="width: 150px; height: 150px;"/></td>
							<td><?php echo $campaign->desc; ?></td>
							<td><?php echo $campaign->link; ?></td>

							<td><?php if($campaign->active==1){
									?>
									<a href="<?php echo base_url('panel/campaigns/disable/'.$campaign->id.'')?>" class="btn btn-success btn-circle btn-lg" >
										<i class="fas fa-check"></i>

									</a>
									<?php
								}else{
									?>
									<a href="<?php echo base_url('panel/campaigns/active/'.$campaign->id.'')?>" class="btn btn-danger btn-circle btn-lg" >
										<i class="fas fa-times"></i>
									</a>
								<?php }
								?></td>
							<td><a href="<?php echo base_url('panel/campaigns/edit/'.$campaign->id.'')?>" class="btn btn-info btn-circle btn-lg">
									<i class="fas fa-info-circle"></i>
								</a>
								<a href="<?php echo base_url('panel/campaigns/delete/'.$campaign->id.'')?>" class="btn btn-danger btn-circle btn-lg">
									<i class="fas fa-trash"></i>
								</a>

							</td>
						</tr>
					<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

