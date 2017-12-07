<?php
include("connection.php");
$lenh = "select * from orders";
$kq = mysqli_query($conn,$lenh);
$tongsodong = mysqli_num_rows($kq);
$sodong = 5;
$sotrang = ceil($tongsodong / $sodong);
if(!isset($_GET["p"]))
  $p = 1;
else
  $p = $_GET["p"];
$x = ($p - 1)*$sodong;
$lenh1 = "SELECT * FROM `orders` JOIN rooms ON orders.RoomID = rooms.ID order by orders.ID DESC limit ".$x.",".$sodong;
$kq1 = mysqli_query($conn,$lenh1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Admin | Quản lý đơn hàng</title>
  <meta name="author" content="">
  <script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
  <script type="text/javascript">
    function Status()
    {
      var strconfirm = confirm("Bạn có muốn thay đổi trạng thái ?");
      if (strconfirm == true) {
        return true;
      }
    }
    function Xoa()
    {
      var strconfirm = confirm("Bạn có muốn huỷ đơn hàng này không?");
      if (strconfirm == true) {
        return true;
      }
    }
    function Goi()
    {
      var strconfirm = confirm("Bạn đã xong cuộc gọi cho khách hàng chưa?");
      if (strconfirm == true) {
        return true;
      }
    }
  </script>

</script>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.price{
  color: red;
  font-weight: bold;
}

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

        <div id="page-wrapper">
         <div class="row">
           <div class="col-lg-12">
            <h1 class="page-header">Quản lý đơn hàng</h1>
            <ol class="breadcrumb">
             <li><i class="fa fa-tasks"></i> Quản lý</li>
             <li class="active"><a href="donhang.php"><i class="fa fa-list-alt"></i> Đơn hàng</a></li>
           </ol>
         </div>

       </div>
       <div class="row">
        <div class="col-lg-5">
          <a href='themdonhang.php'
          class='btn btn-success   btn-sm'> <span
          class='glyphicon glyphicon-plus'></span> Thêm mới
        </a>
      </div>
    </div>
    <div >
      <div class="table-responsive">
        <table class="table table-hover table-striped">
          <tbody>
            <tr>
              <th>Đơn hàng</th>
              <th>Khách hàng</th>
              <th>Phòng</th>
              <th style="width: 200">Thu tiền</th>
              <th>Trạng thái</th>         
              <th>Thao tác</th>
              <th></th>
            </tr>
            <?php
            while($row = mysqli_fetch_row($kq1))
            {
              $ngaydi = date("d-m-Y", strtotime($row[7]));
              $ngayden = date("d-m-Y", strtotime($row[6]));
              $ngaytao = date("d-m-Y", strtotime($row[12]));
              echo "<tr style='height:150px'>
              <td><strong>ID: </strong>$row[0]<hr style='background-color: #808080; height: 1px; border: 0;'><strong>Ngày tạo: </strong>$ngaytao<hr style='background-color: #808080; height: 1px; border: 0;'><strong>Ghi chú: </strong>$row[9]";
              if ($row[11]==1) {
                echo "<hr style='background-color: #808080; height: 1px; border: 0;'>  <a href='xoadonhang.php?id=$row[0]'
                class='btn btn-danger btn-sm' id='xoa' onclick='Xoa()' data-toggle='tooltip' title='Huỷ đơn hàng'><span
                class='glyphicon glyphicon-remove-circle'></span> Hủy đơn hàng 
                </a>
                
                ";
              }
              echo "</td>
              <td><strong>Tên: </strong> $row[2] <br> <strong>SĐT: </strong>$row[3]<br><strong>Địa chỉ: </strong>$row[3] <br> <strong>CMND: </strong>$row[1]</td>
              <td><strong>Tên phòng: </strong>$row[14] <br>
              <strong>Giá: </strong><span class='price'> $row[18]</span> </td>
              <td><strong>Ngày đến: </strong>$ngayden<br>
              <strong>Ngày đi: </strong>$ngaydi<br><hr style='background-color: #808080; height: 1px; border: 0;'>
              <strong>Tổng tiền: </strong><span class='price'>$row[8]</span><br></td>";
              


              if ($row[11]==1) {
                echo "<td><a href='doitrangthai.php?id=$row[0]' onclick='Status()' data-toggle='tooltip' title='Đổi trạng thái'><button type='button' class='btn btn-warning'>Chưa nhận phòng</button></a>";
              }
              elseif ($row[11]==2) {
                echo "<td><a href='doitrangthai.php?id=$row[0]' onclick='Status()' data-toggle='tooltip' title='Đổi trạng thái'><button type='button' class='btn btn-success'>Đã nhận phòng</button></a>";
              }
              elseif ($row[11]==3) {
                echo "<td><button type='button' class='btn btn-info' data-toggle='tooltip' title='Đổi trạng thái'>Đã thanh toán</button>";
              }
              elseif ($row[11]==4) {
                echo "<td><button type='button' class='btn btn-danger' data-toggle='tooltip' title='Đổi trạng thái'>Đã huỷ</button>";
              }

              echo "<hr style='background-color: #808080; height: 1px; border: 0;'><strong>Đã gọi: </strong>$row[10] lần<br>
              <a href='goidien.php?id=$row[0]'
              class='btn btn-success btn-sm' onclick='Goi()' data-toggle='tooltip' title='Gọi khách hàng'> <span
              class='glyphicon glyphicon-earphone'></span> Gọi khách hàng
              </a></td>";
             
              echo "
              <td>
              <div>
              <a href='suadonhang.php?id=$row[0]'
              class='btn btn-default btn-sm' data-toggle='tooltip' title='Sửa đơn hàng'> <span
              class='glyphicon glyphicon-edit'></span> Sửa đơn hàng
              </a>
              </div>
              <br>
              <div>
              <a href='inputGhiChu.php?id=$row[0]'
              class='btn btn-warning btn-sm' data-toggle='tooltip' title='Thêm ghi chú'> <span
              class='fa fa-sticky-note'></span>Thêm ghi chú 
              </a></div>";
              
              echo "</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div >
      <div class="row" align="center">
        <ul class="pagination">
          <?php
          for($i=1; $i<=$sotrang; $i++)
          {
            if($i==$p)
             echo "<li class='active'><a>$i</a></li>";
           else
           {
            ?>

            <li><a href="donhang.php?p=<?php echo $i;    ?>"><?php echo $i;    ?></a></li>
            <?php
          }
        }
        ?>
      </ul>
    </div>
  </div>
</div>
<!-- /#page-wrapper -->

</div>

<!-- /#wrapper -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
<script>
$('.price').each(function( index ) {

  var priceR = parseInt($(this).text()).toString();

  var formatprice = FormatNumber(priceR) + ' VNĐ';

  $(this).text(formatprice);

});


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
