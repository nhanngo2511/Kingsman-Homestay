<?php
include("connection.php");
include("checklogin.php");
CheckLogin();
   $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
   $cmnn = mysqli_real_escape_string($conn, $_REQUEST['cmnn']);
   $hoten = mysqli_real_escape_string($conn, $_REQUEST['hoten']);
   $loaiphong = mysqli_real_escape_string($conn, $_REQUEST['loaiphong']);
   $ngaydi = mysqli_real_escape_string($conn, $_REQUEST['ngaydi']);
   $sdt = mysqli_real_escape_string($conn, $_REQUEST['sdt']);
   $diachi = mysqli_real_escape_string($conn, $_REQUEST['diachi']);
   $ngayden = mysqli_real_escape_string($conn, $_REQUEST['ngayden']);
   $ghichu = mysqli_real_escape_string($conn, $_REQUEST['ghichu']);
   $goi = mysqli_real_escape_string($conn, $_REQUEST['goi']);
   $date1=date_create($ngayden);
   $date2=date_create($ngaydi);
   $diff = date_diff($date1,$date2)->format("%R%a");
   $trangthai = mysqli_real_escape_string($conn, $_REQUEST['trangthai']);
   $sqlprice = "select Price from rooms where ID='$loaiphong'";
   $kq = mysqli_query($conn, $sqlprice);
   while($row = mysqli_fetch_row($kq)){
    $tongtien = $row[0]*$diff;
   }
   $sql = "update orders
   set CustomerIdentifyNumber='$cmnn',CustomerName='$hoten', CustomerPhone='$sdt', CustomerAddress='$diachi', RoomID='$loaiphong', CheckInDate='$ngayden', CheckOutDate='$ngaydi', Total='$tongtien', Note='$ghichu', NumberOfCall='$goi', Status='$trangthai'
   where ID='$id'";

   if(mysqli_query($conn, $sql)){
     header('Location:donhang.php');
             exit();
   } else{

       echo "Khong the thuc thi cau lenh $sql. " . mysqli_error($conn);

   }
   mysqli_close($conn);

?>
