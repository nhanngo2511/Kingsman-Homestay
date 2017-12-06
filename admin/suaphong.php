<?php
include("connection.php");
$id = @$_GET['id'];
$lenh = "select * from rooms where ID=$id";
$kq = mysqli_query($conn,$lenh);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | Sửa phòng</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">King Man Homestay</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
						<li>
                            <a href="index.php"><i class="fa fa-tachometer fa-fw"></i> Dashboard</a>
                        </li>
						 <li>
                            <a href="loaiphong.php"><i class="fa fa-bed fa-fw"></i> Loại phòng</a>
                        </li>
						 <li>
                            <a href="phong.php" class="active"><i class="fa fa-home fa-fw"></i> Phòng</a>
                        </li>
						<li>
                            <a href="donhang.php"><i class="fa fa-list-alt fa-fw"></i> Đơn hàng</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
           <div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Quản lý phòng</h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-tasks"></i> Quản lý</li>
			<li ><a href="phong.php"><i class="fa fa-home"></i> Phòng</a></li>
      <li class="active"><i class="fa fa-pencil-square-o"></i> Sửa phòng</li>
		</ol>
	</div>

</div>
<div>
  <form enctype="multipart/form-data" action="editphong.php" method="post">
    <?php
    while($row = mysqli_fetch_row($kq)){
      echo "
        <input type='hidden' class='form-control' value=$row[0] name='id'>
        <div class='row'>
          <div class='col-sm-4'>
            <div class='form-group'>
              <label>Tên</label>
              <input type='text' class='form-control' value='$row[1]' name='ten' required>
            </div>
          </div>
          <div class='col-sm-4'>
            <div class='form-group'>
              <label>Loại phòng</label>
                <select class='form-control' name='loaiphong'>";
                $lenh = "select * from categories";
                $kq = mysqli_query($conn,$lenh);
                while($row1 = mysqli_fetch_row($kq))
                  {
                    if ($row[6]==$row1[0]) {
                        echo " <option value=$row1[0] selected>$row1[1]</option>";
                    }
                    else {
                      echo " <option value=$row1[0]>$row1[1]</option>";
                    }
                  }
                echo "</select>
            </div>
          </div>";
      echo "
              <div class='col-sm-4'>
                  <div class='form-group'>
                    <label>Số người</label>
                    <input type='number' class='form-control' value=$row[4] name='songuoi' required>
                  </div>
              </div>
      </div>
      <div class='row'>
        <div class='col-sm-4'>
          <div  class='form-group'>
          <label>Hình ảnh</label>
          <input type='file' class='form-control' name='my_file[]'' multiple></div>
        </div>
        <div class='col-sm-4'>
          <div class='form-group'>
            <label>Giá</label>
            <input type='text' class='form-control' value=$row[5] name='gia' required>
          </div>
        </div>
          <div class='col-sm-4'>
          </div>
        </div>
        <div class='row'>
          <div class='col-sm-6'>
            <div class='form-group'>
              <label>Mô tả</label>
              <textarea class='form-control' rows='5' name='mota' required>$row[2]</textarea>
            </div>
          </div>
          <div class='col-sm-6'>
              <div class='form-group'>
                <label>Tiện ích phòng</label>
                <textarea class='form-control' rows='5' name='tienichphong' required>$row[3]</textarea>
              </div>
          </div>
        </div>";
    }
    ?>

							<div class="form-group pull-right">
                <a href="phong.php"><button type="button" class="btn btn-default">Huỷ bỏ</button></a>
                <button type="submit" class="btn btn-info">Sửa</button>
							</div>
						</form>
</div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
