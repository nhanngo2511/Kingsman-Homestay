<?php

include("connection.php");

header('Content-type: application/javascript');

  $checkindate = $_POST["checkindate"];
  $formatcheckindate ="";
  if ($checkindate != null) {
    $formatcheckindate = date_format(date_create($checkindate),"Y-m-d");
  }
  

  $checkoutdate = $_POST["checkoutdate"];
  $formatcheckoutdate="";
  if ($checkoutdate != null) {
    $formatcheckoutdate = date_format(date_create($checkoutdate),"Y-m-d");
  }

  $roomID = $_POST["roomID"];


$lenh = "SELECT COUNT(orders.ID) AS rows
  FROM orders
  WHERE orders.RoomID = '$roomID' AND
  ((\"$formatcheckindate\" < orders.CheckInDate AND \"$formatcheckoutdate\" < orders.CheckInDate) OR (\"$formatcheckindate\" > orders.CheckOutDate AND \"$formatcheckoutdate\" > orders.CheckOutDate))";


$kq = mysqli_query($conn,$lenh);
$data=mysqli_fetch_assoc($kq);

echo $lenh;

if ($data["rows"] == 0 ) {
  $return = array('isExist' => true);
}else
  $return = array('isExist' => false);

echo json_encode($return);

?>