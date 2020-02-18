<?php
	header('Access-Control-Allow-Origin : *');
	require "../php/connection.php";
	$fname = $_POST["fname"];

	$query = "SELECT * FROM booking WHERE fname= '$fname' AND  status='Pending'";
	$result = mysqli_query($db, $query);
	$info = array();
	if(mysqli_num_rows($result) != 0)
	{
	while($rows = mysqli_fetch_array($result))
	{
		array_push($info, $rows);

	}
	echo json_encode($info);
	}
	else
	{
		echo json_encode("boo");
	}

	
?>