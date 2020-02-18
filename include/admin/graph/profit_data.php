<?php
header('Content-Type: application/json');

require "../../php/connection.php";

$sql = sprintf("SELECT year(checkout), month(checkout), SUM(total_cost) AS 'total' FROM reports GROUP BY year(checkout), month(checkout), 'total' ORDER BY month(checkout) ASC");



$results = $db->query($sql);


$data = array();

foreach ($results as $rows) {
  $data[] = $rows;
}

$results -> close();

$db -> close(); 

print json_encode($data);
 ?>
