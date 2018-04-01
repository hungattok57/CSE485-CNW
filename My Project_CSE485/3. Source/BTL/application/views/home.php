<!DOCTYPE html>
<html lang="en">
<head>
 <title> Thư viện sách miễn phí </title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">  
 <script type="text/javascript" src="http://localhost/BTL/vendor/bootstrap.js"> 
 </script>
 <script type="text/javascript" src="http://localhost/BTL/main.js"></script>
 <link rel="stylesheet" href="http://localhost/BTL/vendor/bootstrap.css">
 <link rel="stylesheet" href="http://localhost/BTL/vendor/font-awesome.css">
 <link rel="stylesheet" href="http://localhost/BTL/main.css">
 <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700&amp;subset=latin-ext" rel="stylesheet" />
 <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet" />
 <script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
</head>
<body>
  <div class="menu">
    <nav class="navbar navbar-dark bg-inverse">
      <div class="container">
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#menu">
          &#9776;
        </button>
        <div class="collapse navbar-toggleable-xs" id="menu">
          <a class="navbar-brand tieude" href="<?php echo base_url() ?>index.php/home">Thư Viện Miễn Phí</a>
          <ul class="nav navbar-nav float-sm-right menuphai pr-3">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/home/gioithieu">Giới thiệu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>index.php/home/contact">Liên hệ</a>
            </li>
          </ul>
        </div>
      </nav> <!-- Hết khối menu -->
    </div>
  </nav>
</div> <!-- Hết phần menu -->
<div class="noidung">
  <!-- Phần danh mục và slide -->
  <div class="container">
    <div class="row">
      <div class="col-sm-3 mt-1">
       <h1 class="ml-2">Danh Mục</h1>
       <ul class="danhmuccon">
        <?php foreach ($dulieucm as $k => $v): ?>
          <li><a href="<?php echo base_url() ?>/index.php/view_cm/detail_cm/<?php echo $v['tenchuyenmuc'] ?>"><?php echo $v['tenchuyenmuc'] ?></a></li>
        <?php endforeach ?>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </ul>
    </div> <!-- Hết danh mục -->
    <div class="col-sm-9 float-sm-right mt-1">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img src="images/1.png" alt="First slide" class="img-fluid">
          </div>
          <div class="carousel-item">
            <img src="images/1.png" alt="First slide" class="img-fluid">
          </div>
          <div class="carousel-item">
            <img src="images/1.png" alt="First slide" class="img-fluid">
          </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="icon-prev" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="icon-next" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div> 
    </div> <!-- Hết phần slide -->
  </div> <!-- Hết Row 1 -->
  <div class="col-sm-9 khoisanpham float-sm-right mt-2">
    <div class="row">
      <?php foreach ($dulieu as $key => $value): ?>
        <div class="khoisach">
          <img  src="<?php echo $value['anhsach'] ?>">
          <h4 class="mt-1 ten_sach"><?php echo $value['tensach'] ?></h4>
          <p><?php echo $value['trichdan'] ?></p>
          <button class="btn btn-success"><a class="taive" href="<?php echo $value['filesach'] ?>">Tải về</a>
          </button>
          <button class="btn btn-outline-secondary"><a class="taive" href="<?php echo base_url() ?>index.php/home/view_sp/<?php echo $value['id'] ?>">Chi tiết</a>
          </button>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div> <!-- Hết Phần sản phẩm -->
</div> <!-- Hết row 2 -->
</div> <!-- Hết Container -->
</div> <!-- Hết phần nội dung -->
<footer>
  <h6>Copyright &copy; 2018</h6>
</footer>
</body>
</html>