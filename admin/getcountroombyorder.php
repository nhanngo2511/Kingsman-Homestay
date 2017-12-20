<?php

include("connection.php");

header('Content-type: application/javascript');

  
$lenh = "SELECT rooms.Name, coalesce(orders.ordercount,0) as roomcount  FROM rooms LEFT JOIN
(SELECT orders.RoomID, COUNT(orders.RoomID) as ordercount FROM orders
GROUP BY orders.RoomID) orders ON orders.RoomID = rooms.ID
ORDER BY rooms.ID DESC";


$kq = mysqli_query($conn,$lenh);
$data = array();

foreach ($kq as $row) {
  $data[] = $row;
}

$kq->close();
$conn->close();

echo json_encode($data);

?>