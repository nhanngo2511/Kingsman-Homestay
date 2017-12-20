<?php
include("connection.php");
// $username =  mysqli_real_escape_string($conn, $_REQUEST['username']);
// $pw = mysqli_real_escape_string($conn, $_REQUEST['pw']);
// $sql = "select * from moderators where Username='$username'";
// $kq = mysqli_query($conn,$sql);
// $N= mysqli_num_rows($kq);
// if ($N!=0) {
//   while($row = mysqli_fetch_row($kq)){
//     if ($row[3]==$pw) {
//       header('Location:index.php');
//       exit();
//     }
//     else {
//       header('Location:login.php');
//       exit();
//     }
//   }
// }
// else {
//   header('Location:login.php');
//   exit();
// }

if (isset($_POST['submit']))
{   

  $username=$_POST['username'];
  $password=$_POST['pw'];

  $query = mysqli_query($conn, "SELECT username FROM moderators WHERE Username='$username' and Password='$password'");

  if (mysqli_num_rows($query) != 0)
  { 
    session_start();
    $_SESSION['login_user']=$username;

    echo "<script language='javascript' type='text/javascript'> location.href='index.php' </script>"; 
  }

  else
  {
    echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')  location.href='login.php'</script>";
  }

}

mysqli_close($conn);
?>
