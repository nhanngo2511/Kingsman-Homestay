<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="admin/images/logo.ico">
  <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
  <link rel="stylesheet" href="vendor/bootstrap/font-awesome/css/font-awesome.min.css">

  <title>Trang chủ</title>

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

  <link href="vendor/jquery/jquery-ui.css" rel="stylesheet" >
  <link href="vendor/bootstrap/css/datepicker.css" rel="stylesheet">


</head>

<body>

  <?php 

  include("connection.php");
  include("session_datechecking.php");
  DateCheckingSession();

  // if (!empty($_SESSION["datechecking"])) {
  //   // $checkindate = $_SESSION["datechecking"]["checkindate"];
  //   // $checkoutdate = $_SESSION["datechecking"]["checkoutdate"];

  //   // echo  $checkindate ;
  //    echo  "OK" ;
  // }


  $lenhLP = 'select id, name from categories';
  $kqlenhLP = mysqli_query($conn,$lenhLP);

  $lenhR = "select id from rooms";
  $kqlenhR = mysqli_query($conn,$lenhR);
  $tongsodong = mysqli_num_rows($kqlenhR);
  $sodong = 6;
  $sotrang = ceil($tongsodong / $sodong);
  if(!isset($_GET["p"]))
    $p = 1;
  else
    $p = $_GET["p"];
  $x = ($p - 1)*$sodong;
  $lenh1 = "SELECT rooms.ID, rooms.Name, rooms.Description, rooms.Price, images.Name as ImageName from rooms join (SELECT name, RoomID FROM images GROUP by RoomID) as Images on rooms.ID = images.RoomID order by rooms.ID DESC limit ".$x.",".$sodong;
  $kq1 = mysqli_query($conn,$lenh1);

  ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img class="spin" src="admin/images/logo.png" alt="logo" style="width: 35px"> Kingsman Homestay</a>
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
            <a class="nav-link" href="introduce.php">Giới thiệu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Liên hệ</a>
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


                    echo "<option value=$rowLP[0]>$rowLP[1]</option>";

                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Ngày đến:</label>
                <input name="checkindate" type="date" class="form-control" id="datestart">
              </div>
              <div class="form-group">
                <label for="">Ngày đi:</label>
                <input name="checkoutdate" type="date" class="form-control" id="dateend">
              </div>
              <div class="form-group">
                <label for="">Giá: <span id="preview-price"></span></label>
                <input type="range" class="form-control" min="100000" max="1000000" name="price" id="price" value="100000">

              </div>                  
              <div class="form-group">
                <label for="sel1">Số người:</label>
                <select class="form-control" id="sel1" name="members" value="3">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>                     
                </select>
              </div>
              <hr>
              <input type="submit" class="btn btn-default btn-block" value="Tìm Kiếm" name="search">
            </form>
          </div>
        </div>

      </div>
      <div class="col-lg-8">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="admin/images/thumnail1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="admin/images/thumnail2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="admin/images/thumnail3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

          <?php
          while($rowP = mysqli_fetch_row($kq1))
          {
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="<?php echo "detail.php?id=" .$rowP[0]; ?>"><img style =" height: 130px" class="card-img-top" src="admin/images/<?php echo $rowP[4]; ?>" alt=""></a>
                <div class="card-body" style="text-align: center;">
                  <h4 class="card-title">
                    <a href="<?php echo "detail.php?id=" .$rowP[0]; ?>"><?php echo $rowP[1]; ?></a>
                  </h4>
                </div>
                <div class="truncate-text" style="text-align: center; margin-left: 10px; margin-right: 10px; height: 100px">
                  <p>
                    <?php echo $rowP[2]; ?>
                  </p>
                </div>
                <div class="card-footer" style="text-align: center;">
                  <h6><span class="price"> <?php echo $rowP[3]; ?></span></h6> 
                  <hr>
                  <a class='btn btn-success btn-block' href="detail.php?id=<?php echo $rowP[0]; ?>">Xem chi tiết</a>
                  <!-- <input type='submit' name='add_to_cart' class='btn btn-success' value='Thêm vào giỏ hàng'>  -->
                </div>
              </div>
            </div>
            <?php
          }
          ?>

          
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
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->
      <!-- Sidebar Widgets Column -->
      <!-- /.row -->

    </div>
    <!-- /.container -->
  </div>
  <!-- Footer -->
  <footer id="myFooter">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <img class="spin" src="admin/images/logo.png" style="width: 130px">
        </div>
        <div class="col-sm-2">
           <h6>Kingsman Homestay</h6>
          <ul>
            <li><a href="#">Trang chủ</a></li>
            <li><a href="introduce.php">Giới thiệu</a></li>
            <li><a href="contact.php">Liên hệ</a></li>
          </ul>
        </div>
        <div class="col-sm-4">
          <div id="googleMap" style="width:100%;height:100%;"></div>

        </div>

        <div class="col-sm-3">
          <div class="social-networks">
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
          </div>

        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <p>© 2016 Copyright Text </p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- datepicker -->
  <script src="vendor/bootstrap/js/bootstrap-datepicker.js"></script>


  <script type="text/javascript">

    function myMap() {
      var mapProp= {
        center:new google.maps.LatLng(10.762996, 106.693339),
        zoom:15,

      };
      var mapPin = " http://www.google.com/mapfiles/marker.png";
      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
      var Marker = new google.maps.Marker({
       map: map,
       position: map.getCenter()
     });
    }

    function ValidationDate(datestart, dateend) {
     if (datestart > dateend) {
      alert("Chọn ngày không hợp lệ.");
      $('#dateend').val("");
    }

  }

  $('#datestart').bind('change', function() {
    var datestart = $('#datestart').val();
    var dateend = $('#dateend').val();



    if (datestart != "" && dateend != "") {
      ValidationDate(datestart, dateend);          
    }


  });

  $('#dateend').bind('change', function() {
    var datestart = $('#datestart').val();
    var dateend = $('#dateend').val();

    if (datestart != "" && dateend != "") {
      ValidationDate(datestart, dateend);
    }

  });

  $('.price').each(function( index ) {

    var priceR = parseInt($(this).text()).toString();;

    var formatprice = FormatNumber(priceR) + ' VNĐ/Ngày';

    $(this).text(formatprice);

  });



  var price = $('#price').val();
  $('#preview-price').html(' ' + FormatNumber(price) + ' VNĐ / Ngày');


      // $('#datestart').datepicker();
      // $('#dateend').datepicker();

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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiYH432QkKr8PSPO44k6xsMbbJvHjIZ_8&callback=myMap"></script>
</body>

</html>

