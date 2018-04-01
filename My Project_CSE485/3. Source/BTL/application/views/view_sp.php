<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sách</title>
</head>
<body>
	<div class="container">
		<div class="detail_sp mt-3" style="width: 100%;margin:auto;">
			<?php foreach ($ketqua as $key => $value): ?>
				<img class="img-fluid"  src="<?php echo $value['anhsach'] ?>">
				<h4 class="mt-1 ten_sach"> <?php echo $value['tensach'] ?></h4>
				<p><b>Chuyên mục: </b><?php echo $value['tenchuyenmuc'] ?></p>
				<p><b>Trích dẫn: </b><?php echo $value['trichdan'] ?></p>
				<p><b>Giới thiệu: </b><?php echo $value['gioithieu'] ?></p>

				<button class="btn btn-success"><a class="taive" href="<?php echo $value['filesach'] ?>">Tải về</a>
				</button>
				<button class="btn btn-outline-secondary"><a class="taive" href="<?php echo base_url() ?>index.php/home">Trở về</a>
				</button>
			<?php endforeach ?>
		</div>
	</div>
</body>
</html>