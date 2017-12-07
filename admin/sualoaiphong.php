<?php
include("connection.php");
include("checklogin.php");
CheckLogin();
$id =  mysqli_real_escape_string($conn, $_REQUEST['id']);
$name = mysqli_real_escape_string($conn, $_REQUEST['nameP']);
$sql = "update categories set Name='$name' where ID=$id";
    if(mysqli_query($conn, $sql)){
      echo "Cập nhật thành công";
      header('Location:loaiphong.php');
              exit();
    } else{

        echo "Khong the thuc thi cau lenh $sql. " . mysqli_error($conn);

    }
    mysqli_close($conn);
 ?>
