<?php 

session_start();

function CheckLogin()
{
	if (empty($_SESSION["login_user"])) {
		echo "<script language='javascript' type='text/javascript'> location.href='login.php' </script>";
	}
}

?>