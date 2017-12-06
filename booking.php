<?php 
  include("connection.php");

if (isset($_POST['booking'])) {

  $roomID = $_POST['roomID'];

  $customername = $_POST['customername'];
  $customerphone = $_POST['customerphone'];

  $checkindate = $_POST['checkindate'];
  $formatcheckindate = date_format(date_create($checkindate),"Y-m-d");

  $checkoutdate = $_POST['checkoutdate'];
  $formatcheckoutdate = date_format(date_create($checkoutdate),"Y-m-d");

  $total = $_POST['total'];

  $lenhbooking = "INSERT INTO orders (ID, CustomerIdentifyNumber, CustomerName, CustomerPhone, CustomerAddress, RoomID, CheckInDate, CheckOutDate, Total, Note, NumberOfCall, Status, CreationTime) VALUES (NULL, NULL, \"$customername\", \"$customerphone\", NULL, '$roomID', \"$formatcheckindate\", \"$formatcheckoutdate\", '$total', NULL, '0', '1', CURRENT_TIMESTAMP)";

  $result = mysqli_query($conn,$lenhbooking);

  if ($result) {
   header('Location:thankyou.php');
  }else {
    header('Location:index.php');
  }

}



?>