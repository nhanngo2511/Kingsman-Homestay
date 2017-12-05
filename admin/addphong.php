<?php
include("connection.php");
$ten = mysqli_real_escape_string($conn, $_REQUEST['ten']);
$mota = mysqli_real_escape_string($conn, $_REQUEST['mota']);
$tienichphong = mysqli_real_escape_string($conn, $_REQUEST['tienichphong']);
$songuoi = mysqli_real_escape_string($conn, $_REQUEST['songuoi']);
$gia = mysqli_real_escape_string($conn, $_REQUEST['gia']);
$loaiphong = mysqli_real_escape_string($conn, $_REQUEST['loaiphong']);
$Mangtype = array("png", "PNG", "gif","GIF", "jpg","JPG", "jpeg");
$mangFile = $_FILES["my_file"];
$sql = "insert into rooms (ID, Name, Description, Ultilities, NumberOfPeople, Price, CategoryID)
VALUES (NULL, '$ten', '$mota', '$tienichphong', '$songuoi', '$gia', '$loaiphong')";

if(mysqli_query($conn, $sql)){
  $id = 0;
  $sql1 = "select ID from rooms order by ID DESC LIMIT 1";
  $kq1 = mysqli_query($conn, $sql1);
  while($row1 = mysqli_fetch_row($kq1))
    {
      $id = $row1[0];
    }
  for ($i=0 ; $i < count($mangFile["name"]) ; $i++ ) {
    $tmp = $mangFile["name"][$i];
    $sql3 = "insert into images (ID, Name, RoomID) VALUES (NULL, '$tmp', '$id')";
    $kq3 = mysqli_query($conn, $sql3);
  }
} else{

    echo "Khong the thuc thi cau lenh $sql. " . mysqli_error($conn);

}

	for($i=0; $i<count($mangFile["name"]); $i++){

		$target_file = "images/" . basename($mangFile["name"][$i]);
		$uploadOk = 0;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		// check fake			$_FILES["avatar"]["tmp_name"]
		$check = getimagesize($mangFile["tmp_name"][$i]);
		if($check != false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Check file size  $_FILES["avatar"]["size"]
		if ($mangFile["size"][$i] > 100*1024*1024) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if( !in_array($imageFileType, $Mangtype) ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($mangFile["tmp_name"][$i], $target_file)) {
				echo "The file ". basename( $mangFile["name"][$i]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
		/////////////////
	}
  header('Location:phong.php');
  exit();
 ?>
