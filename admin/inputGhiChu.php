<?php
include("connection.php");
include("checklogin.php");
CheckLogin();
$id = @$_GET['id'];
$lenh = "select * from orders where ID=$id";
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
    <title>Admin | Thêm ghi chú đơn hàng</title>
    <script type="text/javascript">
  	function Xoa()
  	{
      var strconfirm = confirm("Bạn có muốn xoá đơn hàng này không?");
    if (strconfirm == true) {
        return true;
    }
  	}
    function Goi()
  	{
      var strconfirm = confirm("Bạn đã gọi điện cho khách hàng chưa?");
    if (strconfirm == true) {
        return true;
    }
  	}
  </script>
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
    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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
                <a class="navbar-brand" href="index.html">King Man Homestay</a>
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
                            <a href="tables.html"><i class="fa fa-tachometer fa-fw"></i> Dashboard</a>
                        </li>
						 <li>
                            <a href="tables.html"><i class="fa fa-bed fa-fw"></i> Loại phòng</a>
                        </li>
						 <li>
                            <a href="forms.html"><i class="fa fa-home fa-fw"></i> Phòng</a>
                        </li>
						<li>
                            <a href=""><i class="fa fa-list-alt fa-fw"></i> Đơn hàng</a>
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
		<h1 class="page-header">Quản lý đơn hàng</h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-tasks"></i> Quản lý</li>
			<li><a href="donhang.php"><i class="fa fa-list-alt"></i> Đơn hàng</a></li>
      <li class="active"><i class="fa fa-sticky-note"></i> Ghi chú</li>
		</ol>
	</div>

</div>
<div >

      <?php
      while($row = mysqli_fetch_row($kq))
        {
          echo "<h4>THÊM GHI CHÚ</h4>
          <h6>Mã đơn hàng: $row[0] - Khách hàng: $row[2] - CMND: $row[1] - Ngày đến: $row[6] - Ngày đi: $row[7]</h6>";
          echo "  <form action='themghichu.php' method='post'>
              <input type='hidden' name='id' value=$row[0]>
              <div class='form-group'>
              <label for='comment'>Ghi chú:</label>
              <textarea class='form-control' rows='5' name='note'>$row[9]</textarea>
              <hr />
                <div class='form-group pull-right'>
              <a href='donhang.php'><button type='button' class='btn btn-default'>Huỷ</button></a>
              <button type='submit' class='btn btn-primary'>Thêm</button>
              </div>
            </div>
            </form>";
        }
            ?>

  </div>

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
