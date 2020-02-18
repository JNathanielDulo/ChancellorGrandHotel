<?php  
 //pagination.php  
$db = mysqli_connect("localhost", "root", "", "hotel reservation");
$modif_from = date("Y-m-d", strtotime($_GET['from']));
$modif_to = date("Y-m-d", strtotime($_GET['to']));
$sql = mysqli_query($db, "SELECT * FROM booking WHERE arrival_date >= '$modif_from' AND departure_date <= '$modif_to'");
$data = array();
while($rows = mysqli_fetch_assoc($sql)) {
	$data[] = $rows;
}
echo json_encode($data);
?>
