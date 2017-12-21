<?php

include("connection.php");

header('Content-type: application/javascript');

$year = @$_GET["year"];
  
$lenh = "SELECT 
    coalesce(SUM(IF(month = 'Jan', total, 0)),0) AS 'January',
     coalesce(SUM(IF(month = 'Feb', total, 0)),0) AS 'Febuary',
     coalesce(SUM(IF(month = 'Mar', total, 0)),0) AS 'March',
     coalesce(SUM(IF(month = 'Apr', total, 0)),0) AS 'April',
     coalesce(SUM(IF(month = 'May', total, 0)),0) AS 'May',
     coalesce(SUM(IF(month = 'Jun', total, 0)),0) AS 'June',
     coalesce(SUM(IF(month = 'Jul', total, 0)),0) AS 'July',
     coalesce(SUM(IF(month = 'Aug', total, 0)),0) AS 'August',
     coalesce(SUM(IF(month = 'Sep', total, 0)),0) AS 'September',
     coalesce(SUM(IF(month = 'Oct', total, 0)),0) AS 'Octorber',
     coalesce(SUM(IF(month = 'Nov', total, 0)),0) AS 'November',
    coalesce(SUM(IF(month = 'Dec', total, 0)),0) AS 'December',
    coalesce(SUM(total),0) AS total_yearly
    FROM (
SELECT DATE_FORMAT(CreationTime, \"%b\") AS month, SUM(Total) as total
FROM orders
WHERE YEAR(CreationTime) = $year and CreationTime >= Date_add(Now(),interval - 12 month)
GROUP BY DATE_FORMAT(CreationTime, \"%m-%Y\")) as sub";


$kq = mysqli_query($conn,$lenh);
$data = array();

foreach ($kq as $row) {
  $data[] = $row;
}

$kq->close();
$conn->close();

echo json_encode($data);


?>

