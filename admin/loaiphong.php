<?php
include("connection.php");
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

    <title>Admin | Loại Phòng</title>

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
                            <a href="loaiphong.php" class="active"><i class="fa fa-bed fa-fw"></i> Loại phòng</a>
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
			<li class="active"><a href="loaiphong.php"><i class="fa fa-bed"></i> Loại phòng</a></li>
		</ol>
	</div>

</div>
<div class="row">
  <div class="col-lg-5">
    <a href='themloaiphong.php'
      class='btn btn-success   btn-sm'> <span
        class='glyphicon glyphicon-plus'></span> Thêm mới
    </a>
  </div>
</div>

<div class="row">
	<div class="col-lg-10">
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<tr>
									<th>Id</th>
									<th>Tên</th>
									<th></th>
								</tr>
                    <?php
                    while($row = mysqli_fetch_row($kq))
                      {
                        echo "<tr><td>$row[0]</td>
    										<td>$row[1]</td>";

										echo "<td><a href='sualoai.php?id=$row[0]'
											class='btn btn-default btn-sm'> <span
												class='glyphicon glyphicon-edit'></span> Sửa
										</a></td></tr>";
                  }
                 ?>
							</table>
						</div>
					</div>
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
