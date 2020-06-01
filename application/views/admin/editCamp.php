<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Użytkownik </h1>
	<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
	<?php if(isset($_SESSION['success'])){?>
		<div class="alert alert-success"><?php echo $_SESSION['success'];?></div><?php
	}
	?>
	<?php echo form_open_multipart();?>
		<?php
		foreach ($campaign as $campaign){

			?>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Name" name="name" placeholder="Nazwa Kampanii" value="<?php echo $campaign->name; ?>">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<textarea type="text" class="form-control form-control-user" id="Desc" name="desc" placeholder="Opis" ><?php echo $campaign->desc; ?></textarea>
				</div>
			</div>
			<small>Oprocentowanie</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="number" class="form-control form-control-user" id="Rate" name="rate" step="0.01" placeholder="Oprocentowanie" value="<?php echo $campaign->rate; ?>">
				</div>
			</div>
			<small>Prowizja</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="number" class="form-control form-control-user" id="Commission" name="commission" step="0.01" placeholder="Prowizja" value="<?php echo $campaign->commission; ?>">
				</div>
			</div>
			<small>Kliknięcia w Ofertę</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="number" class="form-control form-control-user" id="Views" name="views"  placeholder="Kliknięcia w Ofertę" value="<?php echo $campaign->views; ?>">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Link" name="link" placeholder="Link" value="<?php echo $campaign->link; ?>">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<label for="exampleFormControlFile1">Obrazek</label>
					<input type="file" class="form-control-file" id="Userfile" name="userfile">
				</div>
			</div><small>Link do obrazka</small>
			<div class="form-group row">

				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="pLink" name="linkImg" placeholder="Link" value="<?php
					$pos = strpos($campaign->fileName, "http://");
					if($pos===false){
						echo '';
					}else

						echo $campaign->fileName; ?>">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-9 mb-6 mb-sm-2">
					<p>Aktywna</p>
					<div class="onoffswitch">
						<input type="checkbox" name="active" class="onoffswitch-checkbox" id="myonoffswitch" <?php if($campaign->active==1) {?> checked <?php }?>>
						<label class="onoffswitch-label" for="myonoffswitch">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch"></span>
						</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-9 mb-6 mb-sm-2">
					<p>Bik</p>
					<div class="onoffswitch">
						<input type="checkbox" name="bik" class="onoffswitch-checkbox" id="bik" <?php if($campaign->bik==1) {?> checked <?php }?>>
						<label class="onoffswitch-label" for="bik">
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
