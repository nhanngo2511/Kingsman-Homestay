<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<?php
include("connection.php");
$lenh = "select * from laptop";
$kq = mysqli_query($conn,$lenh);
$tongsodong = mysqli_num_rows($kq);
$sodong = 5;
$sotrang = ceil($tongsodong / $sodong);
if(!isset($_GET["p"]))
$p = 1;
else
$p = $_GET["p"];

$name = @$_GET["name"];
$x = ($p - 1)*$sodong;
$lenh2 = "select COUNT(malaptop) FROM laptop WHERE tenlaptop like \"%$name%\"";
$lenh1 = "select * from laptop where tenlaptop like \"%$name%\" limit ".$x.",".$sodong;


$kq1 = mysqli_query($conn,$lenh1);
$kq2 = mysqli_query($conn,$lenh2);


echo'<table width="660" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#99FFFF" bgcolor="#FFFFCC" style="border-collapse:collapse">
  <tr>
    <td colspan="8" align="center" bgcolor="#FFCCFF" height ="30"><span class="style1">THÔNG TIN LAPTOP</span>
    <br>
    <form name="frm1" method="GET" action="timkiem.php">
		Nhập tên laptop: <input type="text" name="name">		
		<input type="submit" value="Tìm">
	</form>
    </td>
  </tr>
  <tr>
    <td align="center">STT</td>
	<td align="center">Mã số</td>
    <td align="center">Tên laptop</td>
    <td align="center">Số lượng</td>
	<td align="center">Giá </td>
	<td align="center">Ngày nhập</td>
    <td align="center">Hình</td>
	<td align="center">Ghi chú</td>
   </tr>';
   $stt = $x + 1;
   while($row = mysqli_fetch_row($kq1))
   {
  echo"<tr>
    <td align='center' >$stt</td>
    <td><a href=chitiet.php?id=$row[0]>$row[0]</a></td>
    <td>$row[1]</td>
    <td>$row[2] Cái</td>
	<td>$row[3] VNĐ</td>
	<td>$row[4]</td>";
	echo '<td> <img style = "width:200px" src="'.$row[5] .'"></td>
	<td>'.$row[6].'</td>
		  </tr>';
	$stt++;
	}
echo"</table>";
?>
<p align="center">

<?php
	for($i=1; $i<=$sotrang; $i++)
	{
		if($i==$p)
			echo $i."&nbsp;";
		else
	{
?>
	<a href="timkiem.php?name=<?php echo $name; ?>&p=<?php echo $i;    ?>"><?php echo $i;    ?></a>
<?php
}
}
?>
</p>
</body>

