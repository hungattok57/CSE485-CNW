<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản trị thư viện</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>main.css">
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/tether.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>main.js"></script>

</head>
<body>
	<div class="ndquantri">
		<div class="container">
			<h3>Danh sách các đầu sách :</h3>
			<hr>
			<ul class="list-group  ds_sach_admin">
				<?php foreach ($dulieu as $key => $value): ?>
					<li class="list-group-item">
						<img class="anh_ds_sach" src="<?php echo $value['anhsach'] ?>" />
						<?php echo $value['tensach'] ?>
						<a href="<?php echo base_url(); ?>index.php/edit_sach/book/<?php echo $value['id'] ?>" class="btn btn-outline-success"><i class="fas fa-pencil-alt"></i></a>
						<a href="<?php echo base_url(); ?>index.php/admin/delete/<?php echo $value['id'] ?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
						
					</li>
				<?php endforeach ?>
			</ul>

			<hr>
			<div class="row mt-2">
				<div class="col-sm-8">
					<h3 class="text-xs-center">Thêm Sách Mới</h3>
					<form action="<?php echo base_url() ?>index.php/admin/add_book" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label for="tensach" class="col-sm-2 form-control-label">Tên sách: </label>
							<div class="col-sm-10">
								<input name="tensach" type="text
								" class="form-control" id="tensach" placeholder="Tên sách" required>
							</div>
						</div> <!-- Hết một trường -->
						<div class="form-group row">
							<label for="tacgia" class="col-sm-2 form-control-label">Tên tác giả: </label>
							<div class="col-sm-10">
								<input name="tacgia" type="text" class="form-control" id="tacgia" placeholder="Tên tác giả" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="tenchuyenmuc" class="col-sm-2 form-control-label">Chuyên Mục: </label>
							<div class="col-sm-10">
								<select name="tenchuyenmuc" class="form-control" id="tenchuyenmuc" required>
									<?php foreach ($dulieucm as $key => $value): ?>
										<option>
											<?php echo $value['tenchuyenmuc']; ?>
										</option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="trichdan" class="col-sm-2 form-control-label">Trích dẫn: </label>
							<div class="col-sm-10">
								<input name="trichdan" type="text" class="form-control" id="trichdan" placeholder="Trích dẫn" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="gioithieu" class="col-sm-2 form-control-label">Giới thiệu: </label>
							<div class="col-sm-10">
								<input name="gioithieu" type="text" class="form-control" id="gioithieu" placeholder="Giới thiệu sách" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="anhsach" class="col-sm-2 form-control-label">Ảnh sách: </label>
							<div class="col-sm-10">
								<input name="anhsach" type="file" class="form-control" id="anhsach" placeholder="Ảnh sách" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="filesach" class="col-sm-2 form-control-label">File sách (<=15Mb): </label>
							<div class="col-sm-10">
								<input name="filesach" type="file" class="form-control" id="filesach" placeholder="Upload File" required>
							</div>
						</div>
						<div class="form-group row text-xs-center">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-outline-success">Thêm mới</button>
								<button type="reset" class="btn btn-outline-danger">Nhập lại</button>
							</div>
						</div>
					</form>
				</div> <!-- Hết phần Form Thêm -->
			</div>			
		</div>
	</div>
</body>
</html>