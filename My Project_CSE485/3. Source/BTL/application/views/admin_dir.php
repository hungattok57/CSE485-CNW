<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản trị chuyên Mục</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>main.css">
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/tether.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>

</head>
<body>
	<div class="ndquantri">
		<div class="container">
			<a href="<?php echo base_url() ?>index.php/admin" class="btn btn-outline-success mt-2">Quản lý sách</a>
			<hr>
			<h3>Danh sách các chuyên mục sách: </h3>
			<hr>
			<ul class="list-group  ds_dir_admin">
				<?php foreach ($dulieucm as $key => $value): ?>
					<li class="list-group-item">
						<?php echo $value['tenchuyenmuc'] ?>
						<a href="<?php echo base_url(); ?>index.php/admin/edit_dir_in/<?php echo $value['id'] ?>" class="btn btn-outline-success"><i class="fas fa-pencil-alt"></i></a>
						<a href="<?php echo base_url(); ?><?php echo base_url(); ?>index.php/admin/del_dir/<?php echo $value['id'] ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
						
					</li>
				<?php endforeach ?>
			</ul>

			<hr>
			<div class="row mt-2">
				<div class="col-sm-8">
					<h3 class="text-xs-center">Thêm Chuyên Mục Mới: </h3>
					<div class="form-group row">
						<label for="tenchuyenmuc" class="col-sm-2 form-control-label">Tên chuyên mục: </label>
						<div class="col-sm-10">
							<input name="tenchuyenmuc" type="text
							" class="form-control" id="tenchuyenmuc" placeholder="Tên Chuyên Mục" required>
						</div>
					</div> <!-- Hết một trường -->
					<div class="form-group row text-xs-center">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-outline-success themdulieu">Thêm mới</button>
							<button type="reset" class="btn btn-outline-danger">Nhập lại</button>
						</div>
					</div>
				</div> <!-- Hết phần Form Thêm -->
			</div>			
		</div>
	</div>
</body>
</html>