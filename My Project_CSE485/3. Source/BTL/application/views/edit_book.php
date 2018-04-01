<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa sách</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>vendor/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>main.css">
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/tether.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
</head>
<body>
	<div class="container">
		<h3>Sửa thông tin sách:</h3>
		<hr>
		<?php foreach ($dulieuedit as $key => $value): ?>
		<form action="<?php echo base_url() ?>index.php/edit_sach/sua_sach" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="tensach" class="col-sm-2 form-control-label">Tên sách: </label>
				<div class="col-sm-10">
					<input name="tensach" type="text
					" class="form-control" id="tensach" placeholder="Tên sách" required value="<?php echo $value['tensach'];?>">
				</div>
			</div> <!-- Hết một trường input -->
			<div class="form-group row">
				<label for="tacgia" class="col-sm-2 form-control-label">Tên tác giả: </label>
				<div class="col-sm-10">
					<input name="tacgia" type="text" class="form-control" id="tacgia" placeholder="Tên tác giả" required value="<?php echo $value['tacgia'];?>">
				</div>
			</div><!-- Hết một trường input -->
			<div class="form-group row">
				<label for="tenchuyenmuc" class="col-sm-2 form-control-label">Chuyên Mục: </label>
				<div class="col-sm-10">
					<?php foreach ($dulieucm as $k => $v){ ?>
					<select name="tenchuyenmuc" class="form-control" id="tenchuyenmuc" required >
						
						<option><b><?php echo $v['tenchuyenmuc']?></b></option>
						
					</select>
					<?php } ?>
				</div>
			</div> <!-- Hết một trường input -->
			<div class="form-group row">
				<input name="id" type="hidden" class="form-control" id="id" value="<?php echo $value['id'];?>" >
				<label for="trichdan" class="col-sm-2 form-control-label">Trích dẫn: </label>
				<div class="col-sm-10">
					<input name="trichdan" type="text" class="form-control" id="trichdan" placeholder="Trích dẫn" required value="<?php echo $value['trichdan'];?>">
				</div>
			</div><!-- Hết một trường input -->
			<div class="form-group row">
				<label for="gioithieu" class="col-sm-2 form-control-label">Giới thiệu: </label>
				<div class="col-sm-10">
					<input name="gioithieu" type="text" class="form-control" id="gioithieu" placeholder="Giới thiệu sách" required value="<?php echo $value['gioithieu'];?>">
				</div>
			</div><!-- Hết một trường input -->
			<div class="form-group row">
				<label for="anhsach" class="col-sm-2 form-control-label">Ảnh sách: </label>
				<div class="col-sm-10">
					<img style="width: 250px;height: 250px;"  src="<?php echo $value['anhsach'];?>"/>
					<input name="anhsach" type="file" class="form-control" id="anhsach" placeholder="Ảnh sách">
					<input name="anhsach_1" type="hidden" class="form-control" id="anhsach_1" placeholder="Ảnh sách" value="<?php echo $value['anhsach'];?>">
				</div>
			</div><!-- Hết một trường input -->
			<div class="form-group row">
				<label for="filesach" class="col-sm-2 form-control-label">File sách (<=15Mb): </label>
				<div class="col-sm-10">
					<input name="filesach" type="file" class="form-control" id="filesach" placeholder="Upload File">
					<input name="filesach_1" type="hidden" class="form-control" id="filesach_1" placeholder="File sách" value="<?php echo $value['filesach'];?>">
				</div>
			</div><!-- Hết một trường input -->
			<div class="form-group row text-xs-center">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-outline-success">Cập nhật</button>
					<button type="reset" class="btn btn-outline-danger">Nhập lại</button>
				</div> <!-- Khối button -->
			</div>
		</form>
		<?php endforeach ?>
	</div> <!-- Hết phần sửa sách -->
</body>
</html>