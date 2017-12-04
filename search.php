<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tìm kiếm</title>
  <!-- Slider -->

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/css/bootstrap-slider.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/css/bootstrap-slider.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/bootstrap-slider.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/bootstrap-slider.min.js"></script>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-post.css" rel="stylesheet">

  <!-- datetime picker -->

  <link href="vendor/bootstrap/css/datepicker.css" rel="stylesheet">
  <link href="vendor/jquery/jquery-ui.css" rel="stylesheet" >



</head>
<body>
  <?php 

  include("connection.php");

  $category = @$_GET["category"];
  
  $checkindate = @$_GET["checkindate"];
  $formatcheckindate = date_format(date_create($checkindate),"Y-m-d");

  $checkoutdate = @$_GET["checkoutdate"];
  $formatcheckoutdate = date_format(date_create($checkoutdate),"Y-m-d");

  $price = @$_GET["price"];
  $members = @$_GET["members"];

  $lenhLP = 'select id, name from categories';
  $kqlenhLP = mysqli_query($conn,$lenhLP);


  // paging
  $sodong = 2;
  if(!isset($_GET["p"]))
    $p = 1;
  else
    $p = $_GET["p"];
  $x = ($p - 1)*$sodong;


  $lenh1 = "SELECT rooms.ID, rooms.Name, rooms.Description, rooms.Price, images.Name AS ImageName
  FROM rooms
  JOIN (SELECT name, RoomID FROM images GROUP by RoomID) AS Images ON rooms.ID = images.RoomID
  JOIN orders on orders.RoomID = rooms.ID
  WHERE 
  rooms.Status = 1 AND
  rooms.NumberOfPeople >= " .$members." AND
  rooms.CategoryID = " .$category." AND 
  rooms.Price <= " .$price." AND
  ((\"$formatcheckindate\" < orders.CheckInDate AND \"$formatcheckoutdate\" < orders.CheckInDate) OR (\"$formatcheckindate\" > orders.CheckOutDate AND \"$formatcheckoutdate\" > orders.CheckOutDate))
  ORDER BY rooms.Price limit ".$x.",".$sodong;

  $kq1 = mysqli_query($conn,$lenh1);

  // paging
  $tongsodong = mysqli_num_rows($kq1);
  $sotrang = ceil($tongsodong / $sodong);

  ?>


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
   <div class="container">
    <a class="navbar-brand" href="index.php"><img src="Images/logo.png" alt="logo" style="width: 35px"> Kingsman Homestay</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Trang chủ
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Giới thiệu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Liên hệ</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Post Content Column -->
    <div class="col-md-4">

      <!-- Search Widget -->
      <!-- Side Widget -->
      <div class="card my-4">
        <h5 class="card-header">Tìm kiếm</h5>
        <div class="card-body">
          <form method="GET" action="Search.php">
            <div class="form-group">
              <label for="">Loại phòng:</label>
              <select name="category" class="form-control">
                <option value="">Tất cả</option>
                <?php 
                while($rowLP = mysqli_fetch_row($kqlenhLP))
                {

                  if ($rowLP[0] == $category) {
                    echo "<option value=$rowLP[0] selected>$rowLP[1]</option>";
                  }else
                  echo "<option value=$rowLP[0]>$rowLP[1]</option>";

                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Ngày đến:</label>
              <input name="checkindate" type="text" class="form-control" id="datestart" value="<?php echo $checkindate; ?>">
            </div>
            <div class="form-group">
              <label for="">Ngày đi:</label>
              <input name="checkoutdate" type="text" class="form-control" id="dateend" value="<?php echo $checkoutdate; ?>">
            </div>
            <div class="form-group">
              <label for="">Giá: <span id="preview-price"></span></label>
              <input type="range" class="form-control" min="100000" max="1000000" name="price" id="price" value="<?php echo $price; ?>">

            </div>                  
            <div class="form-group">
              <label for="sel1">Số người:</label>
              <select class="form-control" id="sel1" name="members">

                <?php 
                for ($i=1; $i <=6 ; $i++) { 
                 if ($i == $members) {
                   ?>
                   <option value="<?php echo $i; ?>" selected ><?php echo $i; ?></option>
                   <?php
                 }else{
                  ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  <?php
                }
              }
              ?>

            </select>

          </div>
          <hr>
          <input type="submit" class="btn btn-default btn-block" value="Tìm Kiếm">
        </form>
      </div>
    </div>

  </div>
  <div class="col-lg-8">

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">

    </div>
    <h2>Tìm kiếm phòng</h2>
    <hr>
    <div class="row">

      <?php

      if (mysqli_num_rows($kq1) > 0) {
        while($rowP = mysqli_fetch_array($kq1))
        {
          ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="<?php echo "details.php?id=" .$rowP[0]; ?>"><img style =" height: 130px" class="card-img-top" src="Images/<?php echo $rowP[4]; ?>" alt=""></a>
              <div class="card-body" style="text-align: center;">
                <h4 class="card-title">
                  <a href="<?php echo "details.php?id=" .$rowP[0]; ?>"><?php echo $rowP[1]; ?></a>
                </h4>
              </div>
              <div class="truncate-text" style="text-align: center; margin-left: 10px; margin-right: 10px; height: 100px">
                <p>
                  <?php echo $rowP[2]; ?>
                </p>
              </div>
              <div class="card-footer">
                <h6>Giá: <span class="price"> <?php echo $rowP[3]; ?></span></h6> 
                <hr>
                <a class='btn btn-success btn-block' href="details.php?id<?php echo $rowP[0]; ?>">Xem chi tiết</a>
                <!-- <input type='submit' name='add_to_cart' class='btn btn-success' value='Thêm vào giỏ hàng'>  -->
              </div>
            </div>
          </div> 
        </div>
        <hr style="clear: both;">

        <nav aria-label="Page navigation example">
          <ul class="pagination" style="margin-left: 300px;">
            <?php
            for($i=1; $i<=$sotrang; $i++)
            {
              if($i==$p)
                echo "<li class='page-item active'> <a class='page-link' href='index.php?p=$i'>$i</a></li>";
              else
              {
                ?>
                <li class="page-item"> <a class="page-link" href="index.php?p=<?php echo $i;    ?>"><?php echo $i;    ?></a></li>
                <?php
              }
            }
            ?>

          </ul>
        </nav>
        <?php
      }
    }else{
     echo "<h3>Không tìm thấy dữ liệu phù hợp.<h3>";
   }



   ?>


   

 </div>
 <!-- /.row -->

</div>
<!-- /.col-lg-9 -->
<!-- Sidebar Widgets Column -->
<!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- datepicker -->
<script src="vendor/bootstrap/js/bootstrap-datepicker.js"></script>


<script type="text/javascript">

  $('.price').each(function( index ) {

    var priceR = parseInt($(this).text()).toString();;

    var formatprice = FormatNumber(priceR) + ' VNĐ / Ngày';

    $(this).text(formatprice);

  });

  var price = $('#price').val();
  $('#preview-price').html(' ' + FormatNumber(price) + ' VNĐ / Ngày');

  $('#datestart').datepicker();
  $('#dateend').datepicker();

    // Without JQuery
    $('#price').bind('change', function(){
      var price = $('#price').val();

      $('#preview-price').html(' ' + FormatNumber(price) + ' VNĐ / Ngày');

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

