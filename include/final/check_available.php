<?php
session_start();
require "../php/connection.php";
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$address = $_GET['address'];
$contact = $_GET['contact'];
$landline = $_GET['landline'];
$email = $_GET['email'];
$total_cost = $_GET['total_cost'];
date_default_timezone_set('Asia/Manila');
$date = date('m/d/Y');
$time = date('  g:i:sa  ');
if(isset($_SESSION['proccess_cart'])) {
 foreach ($_SESSION['proccess_cart'] as $keys => $values) {
  echo $item_id =  $values['item_id'];              	    
  $item_name =  $values['item_name'];
  $item_price = $values['item_price'];
  $rooms = "SELECT * FROM rooms WHERE room_no = '$item_id' ";
  $rooms_result = mysqli_query($db, $rooms); 
  while ($rooms_row = mysqli_fetch_array($rooms_result))  {
    if($rooms_row[1] == "")
    {
     header("location:select_date.php");
   } else {
     header("location:payment.php?fname=$fname&lname=$lname&address=$address&contact=$contact&landline=$landline&email=$email&total_cost=$total_cost");
   }
 }
}
}
?>