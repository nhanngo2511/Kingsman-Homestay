<?php
include("connection.php");
   $cmnn = mysqli_real_escape_string($conn, $_REQUEST['cmnn']);
   $hoten = mysqli_real_escape_string($conn, $_REQUEST['hoten']);
   $loaiphong = mysqli_real_escape_string($conn, $_REQUEST['loaiphong']);
   $ngaydi = mysqli_real_escape_string($conn, $_REQUEST['ngaydi']);
   $sdt = mysqli_real_escape_string($conn, $_REQUEST['sdt']);
   $diachi = mysqli_real_escape_string($conn, $_REQUEST['diachi']);
   $ngayden = mysqli_real_escape_string($conn, $_REQUEST['ngayden']);
   $date1=date_create($ngayden);
   $date2=date_create($ngaydi);
   $diff = date_diff($date1,$date2)->format("%R%a");
   $ghichu = mysqli_real_escape_string($conn, $_REQUEST['ghichu']);
   $sqlprice = "select Price from rooms where ID='$loaiphong'";
   $kq = mysqli_query($conn, $sqlprice);
   while($row = mysqli_fetch_row($kq)){
    $tongtien = $row[0]*$diff;
   }
   $sql = "insert into orders (ID, CustomerIdentifyNumber,CustomerName, CustomerPhone, CustomerAddress, RoomID, CheckInDate, CheckOutDate, Total, Note, NumberOfCall, Status)
   VALUES ('', '$cmnn', '$hoten', '$sdt', '$diachi', '$loaiphong', '$ngayden', '$ngaydi', '$tongtien', '$ghichu', '0', '1')";

   if(mysqli_query($conn, $sql)){
     header('Location:donhang.php');
             exit();
   } else{

       echo "Khong the thuc thi cau lenh $sql. " . mysqli_error($conn);

   }
   mysqli_close($conn);

?>
