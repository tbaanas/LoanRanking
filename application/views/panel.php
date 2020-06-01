<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<table class="table table-striped">
	<thead>
	<tr>
		<th scope="col">#</th>
		<th scope="col">login</th>
		<th scope="col">email</th>
		<th scope="col">aktywny</th>
	</tr>
	</thead>
	<tbody>
	<?php

	foreach ($users as $user){

	?>
	<tr>
		<th scope="row"><?php echo $user->id; ?></th>
		<td><?php echo $user->username; ?></td>
		<td><?php echo $user->email; ?></td>
		<td><?php if($user->active==1){
			echo "TAK";
			}else
			echo 'NIE'; ?></td>
	</tr>
	<?php }?>
	</tbody>
</table>
</body>
</html>

