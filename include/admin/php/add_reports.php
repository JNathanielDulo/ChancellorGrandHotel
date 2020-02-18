<?php
session_start();
require "../../php/connection.php";
if(isset($_POST['report']))
{
 $customer_no = $_POST['customer_no'];
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $address = $_POST['address'];
 $contact = $_POST['contact'];
 $landline = $_POST['landline'];
 $email = $_POST['email'];
 $arrival = $_POST['arrival'];
 $departure = $_POST['departure'];
date_default_timezone_set('Asia/Manila');
 $checkout = date('Y-m-d');
 $total_cost = $_POST['total_cost'];

 $insert = "INSERT INTO reports(customer_id,fname,lname,address,contact,landline,email,arrival,departure,checkout,total_cost) VALUES('$customer_no','$fname','$lname','$address','$contact','$landline','$email','$arrival','$departure','$checkout','$total_cost')";
	  if(mysqli_query($db, $insert))
	  {
            		$update = "UPDATE booking SET status = 'checkout'  WHERE customer_no = '$customer_no'";
            		if(mysqli_query($db, $update))
            		{
                                                            $update = mysqli_query($db, "UPDATE rooms SET room_status = 'Available' WHERE customer_no = '$customer_no' ");
            			header("location:../reports.php");
            		}
            		else
            		{
            		echo "error";
            		}
	  }
	  else
	  {
	  	echo "error Db";
	  }
}

?>