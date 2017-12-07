<?php
include("connection.php");
include("checklogin.php");
CheckLogin();
$lenh = "select * from categories";
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

    <title>Admin | Thêm loại phòng</title>

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
                            <a href="phong.php"><i class="fa fa-home fa-fw"></i> Phòng</a>
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
		<h1 class="page-header">Quản lý loại phòng</h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-tasks"></i> Quản lý</li>
			<li ><a href="loaiphong.php"><i class="fa fa-bed"></i> Loại phòng</a></li>
      <li class="active"><i class="fa fa-plus"></i> Thêm loại phòng</li>
		</ol>
	</div>

</div>
<div class="row">
  <div class="col-sm-9">
    <form class="form-horizontal" action="themphong.php" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">ID:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="id" name="id" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Tên</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nameP" placeholder="Tên loại phòng" name="nameP" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <a href="loaiphong.php"><button type="button" class="btn btn-default">Huỷ bỏ</button></a>
          <button type="submit" class="btn btn-success">Thêm mới</button>
        </div>
      </div>
    </form>
  </div>

</div>


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
