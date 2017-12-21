<?php


include("connection.php");

include("checklogin.php");
CheckLogin();


$lenhloaiphong = "select * from categories";
$lenhphong = "select * from rooms";
$lenhdonhang = "select * from orders";

$kqloaiphong = mysqli_query($conn,$lenhloaiphong);
$Nloaiphong= mysqli_num_rows($kqloaiphong);

$kqphong = mysqli_query($conn,$lenhphong);
$Nphong= mysqli_num_rows($kqphong);

$kqdonhang = mysqli_query($conn,$lenhdonhang);
$Ndonhang= mysqli_num_rows($kqdonhang);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | Index</title>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" ></script>



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
                <a class="navbar-brand" href="index.php">Kingsman Homestay</a>
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
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="index.php" class="active"><i class="fa fa-tachometer fa-fw"></i> Dashboard</a>
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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bed fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $Nloaiphong; ?></div>
                                    <div>Loại Phòng</div>
                                </div>
                            </div>
                        </div>
                        <a href="loaiphong.php">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $Nphong; ?></div>
                                    <div>Phòng</div>
                                </div>
                            </div>
                        </div>
                        <a href="phong.php">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $Ndonhang; ?></div>
                                    <div>Đơn Hàng</div>
                                </div>
                            </div>
                        </div>
                        <a href="donhang.php">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="col-lg-4 col-md-6">
                    <label for="sel2">Chọn năm:</label>
                    <select class="form-control" id="sel2" name="year">
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                    </select>

                </div>
                <canvas id="line-chartcanvas2"></canvas>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                 <canvas id="line-chartcanvas"></canvas>
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
<script src="https://codepen.io/anon/pen/aWapBE.js"></script>

<script>

    var year = $('#sel2').val();
    orderchart(year);
    roomchart();

    $('#sel2').change(function(event) {
        orderchart();
    });

    function orderchart(year) {

        year = $('#sel2').val();

        $.ajax({
          url: 'getstatisticsordertotal.php?year=' + year,
          type: 'GET',
          dataType: 'json',

          success: function(data) {

            var score = {
                years: ['January', 'February', 'March', 'April', 'May', 'June','July', 'August','September','Octorber', 'November', 'December'],
                total:[data[0].January, data[0].February, data[0].March, data[0].April,data[0]. May, data[0].June,data[0].July, data[0].August,data[0].September,data[0].Octorber, data[0].November, data[0].December]
            };
            var datalength = data.length;

            var char = new Chart($('#line-chartcanvas2'), {
                type:'line',
                data:{
                    labels: score.years,
                    datasets:[{
                        label:'',
                        data:score.total,
                        backgroundColor:'rgba(0,255,0,0.5)'
                    }]
                },
                options:{
                   title:{
                    text:'Tổng doanh thu trong năm ' + year + ' là: ' + FormatNumber(data[0].total_yearly) + ' VND',
                    display:true,
                    fontColor:'#666',
                    fontSize:30
                },
                legend:{
                    display:false
                },
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                            // OR //
                            beginAtZero: true   // minimum value will be 0.
            }
        }]
    }


}

});

        }
    });

    }

    function roomchart() {
        $.ajax({
          url: 'getstatisticsroom.php',
          type: 'GET',
          dataType: 'json',

          success: function(data) {


            var score = {
                roomname: [],
                roomcount:[]
            };

            var datalength = data.length;

            for (var i = 0; i < datalength; i++) {
                score.roomname.push(data[i].Name);
                score.roomcount.push(data[i].roomcount);
            }

            var char = new Chart($('#line-chartcanvas'), {
                type:'bar',
                data:{
                    labels: score.roomname,
                    datasets:[{
                        label:'Thống kê số lượng phòng đã được đặt',
                        data:score.roomcount,
                        backgroundColor: palette('tol',datalength).map(function(hex) {
                            return '#' + hex;
                        }
                        )
                    }]
                },
                options:{
                   title:{
                    text:'Thống kê số lượng phòng đã được đặt',
                    display:true,
                    fontColor:'#666',
                    fontSize:30
                },
                legend:{
                    display:false
                },
                scales: {
                    yAxes: [
                    {
                        ticks: {
                                    min: 0, // it is for ignoring negative step.
                                    beginAtZero: true,
                                    stepSize: 1  // if i use this it always set it '1', which look very awkward if it have high value  e.g. '100'.
                                }
                            }
                            ]
                        }    
                    }

                });

        }
    });

    }

    function FormatNumber(str) {
  var strTemp = GetNumber(str);
  if (strTemp.length <= 3)
    return strTemp;
  strResult = "";
  for (var i = 0; i < strTemp.length; i++)
    strTemp = strTemp.replace(",", "");
  var m = strTemp.lastIndexOf(".");
  if (m == -1) {
    for (var i = strTemp.length; i >= 0; i--) {
      if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
        strResult = "," + strResult;
      strResult = strTemp.substring(i, i + 1) + strResult;
    }
  } else {
    var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
    var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."),
      strTemp.length);
    var tam = 0;
    for (var i = strphannguyen.length; i >= 0; i--) {

      if (strResult.length > 0 && tam == 4) {
        strResult = "," + strResult;
        tam = 1;
      }

      strResult = strphannguyen.substring(i, i + 1) + strResult;
      tam = tam + 1;
    }
    strResult = strResult + strphanthapphan;
  }
  return strResult;
}

function GetNumber(str) {
  var count = 0;
  for (var i = 0; i < str.length; i++) {
    var temp = str.substring(i, i + 1);
    if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
      alert(inputnumber);
      return str.substring(0, i);
    }
    if (temp == " ")
      return str.substring(0, i);
    if (temp == ".") {
      if (count > 0)
        return str.substring(0, ipubl_date);
      count++;
    }
  }
  return str;
}

function IsNumberInt(str) {
  for (var i = 0; i < str.length; i++) {
    var temp = str.substring(i, i + 1);
    if (!(temp == "." || (temp >= 0 && temp <= 9))) {
      alert(inputnumber);
      return str.substring(0, i);
    }
    if (temp == ",") {
      return str.substring(0, i);
    }
  }
  return str;
}
</script>

</body>

</html>
