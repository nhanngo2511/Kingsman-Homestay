<?php
include("connection.php");
$username =  mysqli_real_escape_string($conn, $_REQUEST['username']);
$pw = mysqli_real_escape_string($conn, $_REQUEST['pw']);
$sql = "select * from moderators where Username='$username'";
$kq = mysqli_query($conn,$sql);
$N= mysqli_num_rows($kq);
if ($N!=0) {
  while($row = mysqli_fetch_row($kq)){
    if ($row[3]==$pw) {
      header('Location:index.php');
      exit();
    }
    else {
      header('Location:login.php');
      exit();
    }
  }
}
else {
  header('Location:login.php');
  exit();
}

mysqli_close($conn);
 ?>
