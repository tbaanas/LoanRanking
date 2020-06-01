<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Użytkownik </h1>
	<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
	<?php if(isset($_SESSION['success'])){?>
		<div class="alert alert-success"><?php echo $_SESSION['success'];?></div><?php
	}
	if(isset($_SESSION['error'])){?>
		<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php
	}
	?>
	<form class="user" action="" method="post">
		<?php

		foreach ($user as $user){
		?>
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input type="text" class="form-control form-control-user" id="Username" name="username" placeholder="Login" value="<?php echo $user->username; ?>">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input type="email" class="form-control form-control-user" id="Email" name="email" placeholder="Email" value="<?php echo $user->email; ?>">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<input type="password" class="form-control form-control-user" id="Password" name="password" placeholder="Hasło">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-9 mb-6 mb-sm-2">
				<p>Aktywny</p>
				<div class="onoffswitch">
					<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="admin" <?php if($user->active==1) {?> checked <?php }?>>
					<label class="onoffswitch-label" for="admin">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch"></span>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-9 mb-6 mb-sm-2">
				<p>Admin</p>
				<div class="onoffswitch">
					<input type="checkbox" name="isAdmin" class="onoffswitch-checkbox" id="myonoffswitch" <?php if($user->admin==1) {?> checked <?php }?>>
					<label class="onoffswitch-label" for="myonoffswitch">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch"></span>
					</label>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-6 mb-3 mb-sm-0">
				<button type="submit" class="btn btn-primary btn-user btn-block" name="edit">
					Aktualizuj
				</button>
			</div>
		</div>
		<?php }?>
	</form>

</div>
