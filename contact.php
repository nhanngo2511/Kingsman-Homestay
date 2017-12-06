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

  <title>Liên hệ</title>

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
  <style>
  
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #ffffff; /* White */
    color: #555555;
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 20px;
    padding-bottom: 70px;
  }
  

</style>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img class="spin" src="admin/images/logo.png" alt="logo" style="width: 35px"> Kingsman Homestay</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Trang chủ

            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="introduce.php">Giới thiệu
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Liên hệ</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- First Container -->
  <div class="container-fluid text-center">

    <img class="spin" src="admin/images/logo.png" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="300" height="300">

    <h2>Kingsman Homestay</h2>
  </div>

  <!-- Second Container -->
  <div class="container-fluid bg-2 text-center">
    <h3 class="margin">Thông tin liên hệ</h3>
    <div class="social-networks">

      <p>Địa chỉ: 69, Bùi Viện, Phường Phạm Ngũ Lão, Quận 1, TP.HCM</p>

      <p>Số điện thoại: 090999999</p>

      <p><a href="#" class="facebook"><i class="fa fa-facebook" style="font-size: 30px;"></i></a><span style="margin-left: 50px">https://facebook.com/kingsmanhomestay</span></p>

      <p><a href="#" class="google"><i class="fa fa-google-plus" style="font-size: 30px;"></i></a><span style="margin-left: 39px">https://googleplus.com/kingsmanhomestay</span></p>
      
      
    </div>
    
  </div>

  <!-- Third Container (Grid) -->
  <div class="container-fluid bg-3 text-center">    
    <div class="row">
      <div id="googleMap1" style="width:100%;height:100%;"></div>
    </div>
  </div>

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
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Liên hệ</a></li>
          </ul>
        </div>
        <div class="col-sm-4">
          <div id="googleMap2" style="width:100%;height:100%;"></div>

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
      var map=new google.maps.Map(document.getElementById("googleMap1"),mapProp);
      var map=new google.maps.Map(document.getElementById("googleMap2"),mapProp);
      var Marker = new google.maps.Marker({
       map: map,
       position: map.getCenter()
     });
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiYH432QkKr8PSPO44k6xsMbbJvHjIZ_8&callback=myMap"></script>
</body>

</html>

