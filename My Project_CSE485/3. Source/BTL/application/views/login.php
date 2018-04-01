<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng Nhập</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>main.css">
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/tether.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
</head>
<body>
	<div class="container">
		<div class="row vertical-center-row"> 
			<div class="col-md-4 col-center-block login-widget" id="formlogin" style="width: 100%;margin: auto;"> 
				<h1 class="text-center"><i class="fa fa-dot-circle-o"></i>ADMIN
				</h1> 
				<form action="<?php echo base_url() ?>index.php/admin/login_act" enctype="multipart/form-data" method="post">
					<div> 
						<div class="form-group"> 
							<div class="input-group"> 
								<div class="input-group-addon"><i class="fa fa-user fa-fw"></i>
								</div> <input name="ten" class="form-control" placeholder="huynv" type="text"> 
							</div> 
						</div> 
						<div class="form-group"> 
							<div class="input-group"> 
								<div class="input-group-addon"><i class="fa fa-key fa-fw"></i>
								</div> <input name="pass" class="form-control" placeholder="******" type="password"> 
							</div> 
						</div> 
						<div class="form-group"> 
							<button type="submit" class="btn btn-primary btn-block">Đăng nhập</button> 
						</div> 
					</div> 
				</form>
			</div><!--  Hết form đăng nhập -->
		</div>
	</div>
</body>
</html>