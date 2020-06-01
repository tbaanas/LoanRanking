<!-- Begin Page Content -->
<div class="container-fluid">
	<?php if(isset($_SESSION['success'])){?>
		<div class="alert alert-success"><?php echo $_SESSION['success'];?></div><?php
	}
	?>
	<?php if(isset($_SESSION['error'])){?>
		<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div><?php
	}
	?>
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Ustawienia</h1>
	<form class="settings" action="" method="post">
		<?php
		if($settings==null){
			?>
			<small>Adres url strony</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Url" name="url" placeholder="URL" >
				</div>
			</div>
			<small>Tytuł strony</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Title" name="title" placeholder="Tytuł strony" >
				</div>
			</div>
			<small>Meta opis</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Meta" name="meta" placeholder="Meta opis" >
				</div>
			</div>
			<small>Słowa kluczowe po przecinku</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Keyword" name="keyword"
						   placeholder="Słowa kluczowe po przecinku" >
				</div>
			</div>
			<small>Token BlueLead</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Token" name="token"
						   placeholder="Token BlueLead" >
				</div>
			</div>
			<small>Stopka</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Footer" name="footer" placeholder="Stopka">
				</div>
			</div>
			<?php
		}
		foreach($settings as $settings) {

			?>
			<small>Adres url strony</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Url" name="url" placeholder="URL" value="<?php echo $settings['url']; ?>">
				</div>
			</div>
			<small>Tytuł strony</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Title" name="title" placeholder="Tytuł strony" value="<?php echo $settings['title']; ?>">
				</div>
			</div>
			<small>Meta opis</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Meta" name="meta" placeholder="Meta opis" value="<?php echo $settings['meta']; ?>">
				</div>
			</div>
			<small>Słowa kluczowe po przecinku</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Keyword" name="keyword"
						   placeholder="Słowa kluczowe po przecinku" value="<?php echo $settings['keyword']; ?>">
				</div>
			</div>
			<small>Token BlueLead</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Token" name="token"
						   placeholder="Token BlueLead" value="<?php echo $settings['tokenBL']; ?>">
					<input type="hidden" class="form-control form-control-user" name="id"
						  value="<?php echo $settings['id']; ?>">
				</div>
			</div>
			<small>Stopka</small>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<input type="text" class="form-control form-control-user" id="Footer" name="footer" placeholder="Stopka" value="<?php echo $settings['footer']; ?>">
				</div>
			</div>
				<?php
		}
		?>
			<div class="form-group row">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<button type="submit" class="btn btn-primary btn-user btn-block" name="settings">
						Zapisz Ustawienia
					</button>
				</div>
			</div>

	</form>

</div>
