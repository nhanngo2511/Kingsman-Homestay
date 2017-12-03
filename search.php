<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang chủ | Booking Homestay</title>


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

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">Booking Homestay</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Trang chủ
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Giới thiệu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Liên hệ</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="account.html">Tài khoản</a>
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

              <?php
                include("connection.php");

                $city = @$_GET["city"];
                $datestart = @$_GET["datestart"];
                $dateend = @$_GET["dateend"];
                $price = @$_GET["price"];
                $members = @$_GET["members"];


               ?>
              <form method="GET" action="Search.php">
                  <div class="form-group">
                    <label for="">Tên chỗ đến/ điểm điến:</label>
                    <input name="city" type="" class="form-control" id="" placeholder="Đà Lạt,Hồ Chí Minh,..." value="<?php  echo $city    ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Ngày đến:</label>
                    <input name="datestart" type="text" class="form-control" id="datestart"  value="<?php  echo $datestart    ?>" >
                  </div>
                  <div class="form-group">
                    <label for="">Ngày đi:</label>
                    <input name="dateend" type="text" class="form-control" id="dateend"  value="<?php  echo $dateend    ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Giá: <span id="preview-price"></span></label>
                    <input type="range" class="form-control" min="100000" max="1000000" name="price" id="price"  value="<?php  echo $price   ?>">
                  
                  </div>                  
                  <div class="form-group">
                    <label for="sel1">Số người:</label>
                    <select class="form-control" id="sel1" name="members">
                      <option <?php if (isset($members) && $members=="1") echo "selected";?> value="1">1</option>
                      <option <?php if (isset($members) && $members=="2") echo "selected";?> value="2">2</option>
                      <option <?php if (isset($members) && $members=="3") echo "selected";?> value="3">3</option>
                      <option <?php if (isset($members) && $members=="4") echo "selected";?> value="4">4</option>
                      <option <?php if (isset($members) && $members=="5") echo "selected";?> value="5">5</option>
                      <option <?php if (isset($members) && $members=="6") echo "selected";?> value="6">6</option>        
                    </select>
                  </div>
                  <button type="submit" class="btn btn-default">Tìm kiếm</button>
                </form>
            </div>
          </div>

        </div>
        <div class="col-lg-8">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">

          </div>

          <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="1detail.html"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="1detail.html">Nắng homestay</a>
                  </h4>
                  <h6> (Cách trung tâm 3 km)</h6>
                  <p class="card-text">
Nằm tại thành phố Đà Lạt, cách Quảng trường Lâm Viên 1,6 km, Nắng homestay cung cấp Wi-Fi miễn phí. Một số phòng nghỉ nhìn ra quang cảnh khu vườn/thành phố. Chỗ nghỉ có lễ tân 24 giờ.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="2detail.html"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="2detail.html">T-Homestay Da Nang</a>
                  </h4>
                    <h6> (Cách trung tâm  300m)</h6>
                  <p class="card-text">Chỗ nghỉ này cách bãi biển 6 phút đi bộ. T-Homestay Da Nang nằm ở vị trí trung tâm này cung cấp các phòng nghỉ yên tĩnh và thoải mái với Wi-Fi miễn phí trong toàn khuôn viên. </p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="3detail.html"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="3detail.html">Homestay Vung Tau</a>
                  </h4>
                    <h6> (Cách trung tâm  300m)</h6>
                  <p class="card-text">Với Wi-Fi miễn phí, căn hộ Homestay Vung Tau tọa lạc tại thành phố Vũng Tàu, cách Hải đăng Vũng Tàu 800 m.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="4detail.html"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="4detail.html">Flower Homestay</a>
                  </h4>
                  <h6> (Cách trung tâm  4km)</h6>
                  <p class="card-text">Mỗi phòng được trang bị TV truyền hình vệ tinh màn hình phẳng và ấm đun nước. Các phòng đi kèm phòng tắm riêng...</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="5detail.html"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="5detail.html">My Dream Homestay</a>
                  </h4>
                    <h6> (Cách trung tâm  1.3km)</h6>
                  <p class="card-text">Tất cả các phòng nghỉ tại đây đều có phòng tắm riêng và TV màn hình phẳng.

Chỗ nghỉ cung cấp dịch vụ đưa đón miễn phí...</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="6detail.html"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="6detail.html">Nomad Home Dalat</a>
                  </h4>
                  <h6> (Cách trung tâm  2.2km)</h6>
                  <p class="card-text">Nằm trong bán kính 900 m từ Vườn hoa Đà Lạt ở thành phố Đà Lạt...</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

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

       var price = $('#price').val();
      $('#preview-price').html(' ' + FormatNumber(price) + ' VNĐ');

      $('#datestart').datepicker();
      $('#dateend').datepicker();

    // Without JQuery
     $('#price').bind('change', function(){
        var price = $('#price').val();

        $('#preview-price').html(' ' + FormatNumber(price) + ' VNĐ');

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

