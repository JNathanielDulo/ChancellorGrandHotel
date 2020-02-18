<?php
require "../../php/connection.php";
session_start();
$id = $_GET['id'];
 date_default_timezone_set('Asia/Manila');
$date = date('m/d/Y');
$time = date('  g:i:sa  ');
if(isset($_POST['submit'])) {
    $pass = mysqli_real_escape_string($db,$_POST['password']);
    $query = "SELECT * FROM admin WHERE username = '".$_SESSION['username']."' AND password = '".$pass."' ";
    $result = mysqli_query($db,$query);
	    if(mysqli_num_rows($result)) 
	    {

		$sql = "UPDATE booking SET status = 'approved', date_ago = '$date $time' WHERE customer_no='$id'";
		mysqli_query($db, $sql);
	    	header("location:../transaction.php?id=".$id);
	    }
	    else
	    {
	        echo "<script> window.alert('Wrong password');</script>"; 
	        echo "<a href='check_pending.php?id=$id'>Click Here</a>";
	    }

	}
?>
