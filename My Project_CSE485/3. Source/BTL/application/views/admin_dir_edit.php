<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa chuyên mục</title>
	<title>Quản trị chuyên Mục</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>main.css">
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/tether.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-sm-8">
			<?php foreach ($dulieucmedit as $key => $value): ?>
				<form action="<?php echo base_url() ?>/index.php/admin/edit_dir" method="post" enctype="multipart/form-data">			
					<h3 class="text-xs-center">Cập nhật chuyên mục: </h3>
					<hr>
					<div class="form-group row">
						<label for="tenchuyenmuc" class="col-sm-2 form-control-label">Tên chuyên mục: </label>
						<div class="col-sm-10">
							<input name="tenchuyenmuc" type="text
							" class="form-control" id="tenchuyenmuc" placeholder="Tên Chuyên Mục" required value="<?php echo $value['tenchuyenmuc'] ?>">
							<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
						</div>
					</div> <!-- Hết một trường -->
					<div class="form-group row text-xs-center">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-outline-success">Cập nhật</button>
							<button type="reset" class="btn btn-outline-danger">Nhập lại</button>
						</div>
					</div>
				</div> <!-- Hết phần Form Thêm -->
			</form>
		<?php endforeach ?>
	</div>
</body>
</html>