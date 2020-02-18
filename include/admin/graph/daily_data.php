<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin-Method: *');
header("Content-Type: application/json; charset=UTF-8");
require "../../php/connection.php";
$sql = mysqli_query($db,"SELECT room_name, COUNT(*) AS occupied, SUM(room_total) AS total FROM transaction GROUP BY room_name DESC");
$data = array();
while($rows = mysqli_fetch_assoc($sql)) {
	$data[] = $rows;
}
echo json_encode($data,JSON_PRETTY_PRINT);
 ?>
