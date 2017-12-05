<!DOCTYPE html>
<html lang="en">

<head>

 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <link rel="icon" href="Images/logo.ico">

 <title>Chi tiết</title>

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

  if (!empty($_SESSION["datechecking"])) {
   $checkindate = $_SESSION["datechecking"]["checkindate"];
   $checkoutdate = $_SESSION["datechecking"]["checkoutdate"];
 }

 




 $id = $_GET["id"];

 $lenhR = "SELECT rooms.ID, rooms.Name, rooms.Description, rooms.Price, images.Name as ImageName, rooms.NumberOfPeople, rooms.Ultilities, rooms.CategoryID  from rooms join (SELECT name, RoomID FROM images GROUP by RoomID) as Images on rooms.ID = images.RoomID where id = \"$id\"";




 $kqR = mysqli_query($conn,$lenhR);
 $row = mysqli_fetch_row($kqR);

 $lenhRLQ = "SELECT rooms.ID, rooms.Name, rooms.Price, images.Name as ImageName from rooms join (SELECT name, RoomID FROM images GROUP by RoomID) as Images on rooms.ID = images.RoomID where rooms.CategoryID = ".$row[7]." and rooms.Price >= ".$row[3];

 $kqRLQ = mysqli_query($conn,$lenhRLQ);
 $rowRLQ = mysqli_fetch_row($kqRLQ);

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
   <div class="col-md-2"  style="margin-top: 97px">

    <!-- Search Widget -->


    <!-- Side Widget -->
    <div class="card my-4">
      <h6 class="card-header">Phòng tương tự</h6>
      <div class="card-body">

      </div>
    </div>

  </div>
  <!-- Post Content Column -->
  <div class="col-lg-10">

    <h1 class="my-4"><?php echo $row[1]; ?></h1>
    <hr>

    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-lg-8">
        <img class="img-fluid" src="Images/<?php echo $row[4]; ?>" alt="">
      </div>


      <div class="col-lg-4">
        <form action="booking.php" method="POST">
          <label for="">Họ và tên:</label>
          <input required type="text" class="form-control" id="" name="customername">

          <label for="">Số điện thoại:</label>
          <input required type="text" class="form-control" id="customerphone" name="customerphone"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

          <?php

          $checkindate;
          $checkoutdate;
          if (!empty($_SESSION["datechecking"])) {
            $checkindate = $_SESSION["datechecking"]["checkindate"];
            $checkoutdate = $_SESSION["datechecking"]["checkoutdate"];
          }
          ?>

          <input id="roomID" type="hidden" name="roomID" value="<?php echo $row[0]; ?>">

          <label for="">Ngày đến:</label>
          <input required id="datestart" type="date" class="form-control" id="" name="checkindate" value="<?php echo $checkindate; ?>">


          <label for="">Ngày đi:</label>
          <input required id="dateend" type="date" class="form-control" id="" name="checkoutdate" value="<?php echo $checkoutdate; ?>">

          <label id="checkduplicatedate-message" style="color:red; display: none;">Đã có người đăng ký trong khoảng thời gian này rồi, Vui lòng chọn khoảng thời gian khác.</label>

          <input type="hidden" name="total" id="hiddentotal">

          <strong><p style="margin-top: 20px">Tổng tiền: <span id="total" style="color: red;"></span> </p></strong>

          <hr>
          <input type="submit" class="btn btn-primary btn-lg btn-block" name="booking" value="Đặt phòng" />


        </div>
      </div>

      <hr>
      <div>
        <p><strong style="font-size: 21px">Giá: </strong> <span class="price"><?php echo $row[3]; ?></span></p>
        <input type="hidden" id="hiddenprice" value="<?php echo $row[3]; ?>">
        <p><strong style="font-size: 21px">Số người ở tối đa: </strong> <span><?php echo $row[5]; ?> người.</span></p>            
      </div>
      <hr>
      <div>
        <h3 class="my-3">Mô tả</h3>
        <p><?php echo $row[2]; ?></p>
        <h3 class="my-3">Các tiện ích phòng</h3>
        <p><?php echo $row[6]; ?></p>
      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->

      <!-- /.row -->

      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->
    <!-- Sidebar Widgets Column -->
    <!-- /.row -->

  </div>
  <br>
  <br>
  <br>
  <!-- /.container -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Footer -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- datepicker -->
  <script src="vendor/bootstrap/js/bootstrap-datepicker.js"></script>


  <script type="text/javascript">

    if ($('#datestart').val() == "" || $('#dateend').val() == "" ) {
      $('#hiddentotal').val(0);
    }else{

      var total = CalculateTotal($('#datestart').val(), $('#dateend').val(), $('#hiddenprice').val());

      $('#hiddentotal').val(total);

      $('#total').text(FormatNumber(total.toString()) + ' VNĐ / ' + DiffDate($('#datestart').val(), $('#dateend').val()) + ' Ngày');

      var roomID = $('#roomID').val();
       CheckDuplicateDate($('#datestart').val(), $('#dateend').val(),roomID);
    }


    function CheckDuplicateDate(datestart, dateend,roomID) {

      $.ajax({
        url: 'checkduplicatedate.php',
        type: 'POST',
        dataType: 'json',
        data: {roomID: roomID,
          checkindate: datestart,
         checkoutdate: dateend

       },
       success: function(response) {
        if (response.isExist) {

          $('#checkduplicatedate-message').css('display','inline');
          $('#dateend').val("");
          $('#hiddentotal').val(0);
          $('#total').text("");
        }else{
          $('#checkduplicatedate-message').css('display','none');
        }
      }
    });



    }

    function DiffDate(datestart, dateend) {
      var result = new Date(dateend).getDate() - new Date(datestart).getDate();
      if (result == 1) {
        return "";
      }else{
        return result;
      }

    }

    function CalculateTotal(datestart, dateend, price){ 
      var dateleft = new Date(dateend).getDate() - new Date(datestart).getDate();
      var total = dateleft * price;

      return total;
    }

    function ValidationDate(datestart, dateend) {
     if (datestart > dateend) {
      alert("Chọn ngày không hợp lệ.");
      $('#dateend').val("");
    }else{
      var roomID = $('#roomID').val();
       CheckDuplicateDate(datestart, dateend,roomID);
    }

  }

  $('#datestart').bind('change', function() {
    var datestart = $('#datestart').val();
    var dateend = $('#dateend').val();
    var price = $('#hiddenprice').val();

    if (datestart != "" && dateend != "") {
      ValidationDate(datestart, dateend); 

      $('#hiddentotal').val(CalculateTotal(datestart, dateend, price));
      $('#total').text(FormatNumber(CalculateTotal(datestart, dateend, price).toString()) + ' VNĐ / ' + DiffDate($('#datestart').val(), $('#dateend').val()) + ' Ngày');



    }


  });

  $('#dateend').bind('change', function() {
    var datestart = $('#datestart').val();
    var dateend = $('#dateend').val();
    var price = $('#hiddenprice').val();

    if (datestart != "" && dateend != "") {
      ValidationDate(datestart, dateend);

      $('#hiddentotal').val(CalculateTotal(datestart, dateend, price));



      $('#total').text(FormatNumber(CalculateTotal(datestart, dateend, price).toString()) + ' VNĐ / ' + DiffDate($('#datestart').val(), $('#dateend').val()) + ' Ngày');

    }

  });

  $('.price').each(function( index ) {

    var priceR = parseInt($(this).text()).toString();

    var formatprice = FormatNumber(priceR) + ' VNĐ / Ngày';

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
