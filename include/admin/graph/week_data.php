<?php
header('Content-Type: application/json');

require "../../php/connection.php";

$sql = sprintf("SELECT  WEEK(checkout),  SUM(total_cost) AS 'total' FROM reports GROUP BY  WEEK(checkout),  'total' ");



$results = $db->query($sql);


$data = array();

foreach ($results as $rows) {
  $data[] = $rows;
}

$results -> close();

$db -> close(); 

print json_encode($data);
 ?>
