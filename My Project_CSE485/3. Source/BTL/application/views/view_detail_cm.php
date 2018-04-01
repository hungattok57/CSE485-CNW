<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<div class="container">
		<div class="col-sm-12">
			<?php foreach ($ketquaview as $key => $value): ?>
				
			<h2 class="detail_chuyenmuc"><?php echo $value['tenchuyenmuc'] ?></h2>
			<?php endforeach ?>
			<hr>


		</div>
	</div>
</body>
</html>