<?php
include("connection.php");
$id =  mysqli_real_escape_string($conn, $_REQUEST['id']);
$note = mysqli_real_escape_string($conn, $_REQUEST['note']);
$sql = "update orders set Note='$note' where ID='$id'";
    if(mysqli_query($conn, $sql)){
      header('Location:donhang.php');
              exit();
    } else{

        echo "Khong the thuc thi cau lenh $sql. " . mysqli_error($conn);

    }
    mysqli_close($conn);
 ?>
