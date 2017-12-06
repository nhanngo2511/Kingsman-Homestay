<?php
include("connection.php");
$name = mysqli_real_escape_string($conn, $_REQUEST['nameP']);
$sql = "insert into categories (ID,Name) VALUES ('', '$name')";

    if(mysqli_query($conn, $sql)){
      echo "<script type='text/javascript'>alert('Thêm thành công');</script>";
      header('Location:loaiphong.php');
              exit();
    } else{

        echo "Khong the thuc thi cau lenh $sql. " . mysqli_error($conn);

    }
    mysqli_close($conn);
 ?>
