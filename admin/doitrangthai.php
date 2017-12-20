<?php
include("connection.php");
$id = @$_GET['id'];
$sql = "select Status,RoomID from orders where ID=$id";
$kq = mysqli_query($conn, $sql);
$status = 0;
while($row = mysqli_fetch_row($kq))
  {
    switch ($row[0]) {
      case 1:
        $status = 2;
        $sqlst = "update rooms set Status='0' where ID=$row[1]";
        $kqst = mysqli_query($conn, $sqlst);
        break;
      case 2:
        $status = 3;
        $sqlst1 = "update rooms set Status='1' where ID=$row[1]";
        $kqst1 = mysqli_query($conn, $sqlst1);
        break;
      case 3:
        $status = 3;
        break;
      case 4:
        $status = 4;
        break;
      default:
        # code...
        break;
    }
  }
  $sql2 = "select CheckInDate from orders where ID=$id";
  $kq2 = mysqli_query($conn, $sql2);
  while($row3 = mysqli_fetch_row($kq2))
    {
      $checking = date("d-m-Y", strtotime($row3[0]));
      $nowday = date('d-m-Y');
      if ($checking==$nowday) {
        $sql1 = "update orders set Status='$status' where ID=$id";
            if(mysqli_query($conn, $sql1)){
              header('Location:donhang.php');
                      exit();
            } else{

                echo "Khong the thuc thi cau lenh $sql. " . mysqli_error($conn);

            }
      }
      else {
        header('Location:donhang.php');
                exit();
      }
    }

    mysqli_close($conn);
 ?>
