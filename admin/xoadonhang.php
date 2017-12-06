<?php
include("connection.php");
$id = @$_GET['id'];
$sql = "update orders set Status='4' where ID=$id";
    if(mysqli_query($conn, $sql)){
      header('Location:donhang.php');
              exit();
    } else{

        echo "Khong the thuc thi cau lenh $sql. " . mysqli_error($conn);

    }
    mysqli_close($conn);
 ?>
