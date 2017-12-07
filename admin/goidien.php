<?php
include("connection.php");
include("checklogin.php");
CheckLogin();
$id = @$_GET['id'];
$lenh = "select * from orders where ID=$id";
$kq = mysqli_query($conn, $lenh);
$phonen = 0;
while($row = mysqli_fetch_row($kq))
  {
    $phonen = $row[10];
  }
  $phonen=$phonen+1;
  $sql = "update orders set NumberOfCall='$phonen' where ID=$id";
    if(mysqli_query($conn, $sql)){
      header('Location:donhang.php');
              exit();
    } else{

        echo "Khong the thuc thi cau lenh $sql. " . mysqli_error($conn);

    }
    mysqli_close($conn);
 ?>
