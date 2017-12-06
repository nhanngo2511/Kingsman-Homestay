
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="Images/logo.ico">
	<link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
  <link rel="stylesheet" href="vendor/bootstrap/font-awesome/css/font-awesome.min.css">

	<title>Cảm ơn</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/blog-post.css" rel="stylesheet">
	<style>
	.or{
		background: #0080ff;
		border-radius: 40px;
		color: #FFFFFF;
		font-family: 'Roboto', sans-serif;
		font-size: 16px;
		height: 50px;
		line-height: 50px;
		margin-top: 75px;
		text-align: center;
		width: 50px;
	}
</style>

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img class="spin" src="admin/images/logo.png" alt="logo" style="width: 35px"> Kingsman Homestay</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
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
		<br>
		<br>
		<br>
		<div class="jumbotron text-xs-center">
			<h1 class="display-3">Cảm ơn :)</h1>
			<p class="lead"><strong>Đã đặt phòng thành công</strong>, chúng tôi sẽ liên lạc với bạn sớm nhất.</p>
			<hr>
			<p>
				Xem thông tin <a href="Contact.php">liên hệ</a>
			</p>
			<p class="lead">
				<a class="btn btn-primary btn-sm" href="index.php" role="button">Trang chủ</a>
			</p>
		</div>
	</div>
	<!-- /.container -->

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
<script>
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
</script>
	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/popper/popper.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiYH432QkKr8PSPO44k6xsMbbJvHjIZ_8&callback=myMap"></script>

</body>

</html>
