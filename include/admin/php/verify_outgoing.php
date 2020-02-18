<?php
session_start();
   $_SESSION['username'];	
   $id = $_GET['id'];
   $_SESSION['departure'] = $_POST['departure'];
   $_SESSION['update_total'] = $_POST['update_total'];
  $_SESSION['balance_update'] = $_POST['balance_update'];

    require "../../php/connection.php";
    if(isset($_POST['submit'])) {
    $pass = mysqli_real_escape_string($db,$_POST['password']);
    $query = "SELECT * FROM admin WHERE username = '".$_SESSION['username']."' AND password = '".$pass."' ";
    $result = mysqli_query($db,$query);
	    if(mysqli_num_rows($result)) 
	    {
	    	header("location:update_cost_outgoing.php?id=".$id);
	    }
	    else
	    {
	        echo "<script> window.alert('Wrong password');</script>"; 
	        echo "<a href='update_outgoing.php?id=$id'>Click Here</a>";
	    }

	}

?>