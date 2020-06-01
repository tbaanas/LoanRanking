<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Użytkownicy</h1>
	<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
	<?php if(isset($_SESSION['success'])){?>
		<div class="alert alert-success"><?php echo $_SESSION['success'];?></div><?php
	}
	?>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Użytkownicy</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>#</th>
						<th>login</th>
						<th>email</th>
						<th>aktywny</th>
						<th>Edytuj/Usuń</th>
					</tr>
					</thead>
					<tfoot>
					<tr>
						<th>#</th>
						<th>Login</th>
						<th>Email</th>
						<th>Aktywny</th>
						<th>Edytuj/Usuń</th>
					</tr>
					</tfoot>
					<tbody>
					<?php
					foreach ($users as $user){
					?>
					<tr>
						<td><?php echo $user->id; ?></td>
						<td><?php echo $user->username; ?></td>
						<td><?php echo $user->email; ?></td>
						<td><?php if($user->active==1){
							?>
								<a href="<?php echo base_url('panel/users/disable/'.$user->id.'')?>" class="btn btn-success btn-circle btn-lg" >
									<i class="fas fa-check"></i>

								</a>
							<?php
							}else{
						?>
								<a href="<?php echo base_url('panel/users/active/'.$user->id.'')?>" class="btn btn-danger btn-circle btn-lg" >
									<i class="fas fa-times"></i>
								</a>
							<?php }
						 ?></td>
						<td><a href="<?php echo base_url('panel/users/edit/'.$user->id.'')?>" class="btn btn-info btn-circle btn-lg">
								<i class="fas fa-info-circle"></i>
							</a>
							<a href="<?php echo base_url('panel/users/delete/'.$user->id.'')?>" class="btn btn-danger btn-circle btn-lg">
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

