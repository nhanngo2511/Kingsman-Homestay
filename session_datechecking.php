<?php 

session_start();

function DateCheckingSession()
{
	if (isset($_GET['search'])) {

		$checkindate = @$_GET['checkindate'];
		$checkoutdate = @$_GET['checkoutdate'];

		$datearray = array('checkindate' => $checkindate,
							'checkoutdate' => $checkoutdate);

		$_SESSION["datechecking"] = $datearray;

	}
}




?>