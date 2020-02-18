<?php
session_start();
if(isset($_POST['check_available']))
{
	$_SESSION['arrival'] = $_POST['arrival'];
	$_SESSION['departure'] = $_POST['departure'];
	$_SESSION['adult'] = 2;
	$_SESSION['child'] = 2;
	header("location:room_rates.php");
}
else
{
	echo "boo";
}

?>