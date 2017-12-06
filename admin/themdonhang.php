<?php
include("connection.php");
$lenh = "select * from rooms";
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

    <title>Admin | Thêm đơn hàng</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">
    <script>
    function check(){
      var startDate = new Date($('#startDate').val());
      var endDate = new Date($('#endDate').val());
      if (startDate > endDate){
          alert('Ngày đi phải lớn hơn ngày đến !');
          returnToPreviousPage();
          return false;
      }
    }
     </script>
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {display:none;}

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
    </style>
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
                            <a href="donhang.php" class="active"><i class="fa fa-list-alt fa-fw"></i> Đơn hàng</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


                <<div id="page-wrapper">
                   <div class="row">
        	<div class="col-lg-12">
        		<h1 class="page-header">Quản lý đơn hàng</h1>
        		<ol class="breadcrumb">
        			<li><i class="fa fa-tasks"></i> Quản lý</li>
        			<li><a href="donhang.php"><i class="fa fa-list-alt"></i> Đơn hàng</a></li>
              <li class="active"><i class="fa fa-plus"></i> Thêm đơn hàng</li>
        		</ol>
	</div>

</div>
<div class="row">
  <form action="adddonhang.php" method="post">
    <div class="col-sm-6">
      <div class="form-group">
        <label>Số CMND</label>
        <input type="text" class="form-control" name="cmnn" required maxlength='9' pattern="\d*">
      </div>
      <div class="form-group">
        <label>Họ và Tên</label>
        <input type="text" class="form-control" name="hoten" required>
      </div>
      <div class="form-group">
        <label>Phòng</label>
        <select class="form-control" name="loaiphong">
          <?php
          include("connection.php");
          $lenh = "select * from rooms";
          $kq = mysqli_query($conn,$lenh);
          while($row = mysqli_fetch_row($kq))
            {
              if ($row[6]==1) {
                  echo " <option value=$row[0]>$row[1]</option>";
              }
            }
           ?>
      </select>
      </div>
      <div class="form-group">
        <label>Ngày đi</label>
        <input type="date" class="form-control" name="ngaydi" required id="endDate">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>Số điện thoại</label>
        <input type="text" class="form-control" name="sdt" required pattern="\d*" maxlength='11'>
      </div>
      <div class="form-group">
        <label>Địa chỉ</label>
        <input type="text" class="form-control" name="diachi" required>
      </div>
      <div class="form-group">
        <label>Ngày đến</label>
        <input type="date" class="form-control" name="ngayden" required id="startDate">
      </div>
    </div>
    <div class="col-sm-12" >
      <div class="form-group">
        <label>Ghi Chú</label>
        <textarea class="form-control" name="ghichu"></textarea>
      </div>

    </div>
							<div class="form-group pull-right">
                <a href="donhang.php"><button type="button" class="btn btn-default">Huỷ bỏ</button></a>
                <button type="submit" class="btn btn-success" onclick="check()">Thêm mới</button>
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
