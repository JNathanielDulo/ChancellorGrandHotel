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
$arrival = $_SESSION['arrival'];
$departure = $_SESSION['departure'];
$adult = $_SESSION['adult'];
$child = $_SESSION['child'];
$new_arrival = date("Y-m-d", strtotime($arrival));
$new_departure = date("Y-m-d", strtotime($departure));
date_default_timezone_set('Asia/Manila');
$date = date('m/d/Y');
$time = date('  g:i:sa  ');
if(isset($_SESSION['proccess_cart']))
{
  $insert_customer = "INSERT INTO booking(fname,lname,address,contact,landline,email,arrival_date,
  departure_date,adult,child,status,total_cost,sub_total,balance,date_ago,guest) VALUES('$fname','$lname','$address','$contact','$landline','$email','$new_arrival','$new_departure','$adult','$child','approved','$total_cost','0','0','$date$time','regular')";
  if(mysqli_query($db, $insert_customer)) {
    $notif = "INSERT INTO notification(notif_subject,notif_time,notif_status) VALUES('New Reservation','$date$time','0')";
    if(mysqli_query($db, $notif)) {
      $select = "SELECT customer_no FROM booking ORDER BY customer_no DESC LIMIT 1";
      $result = mysqli_query($db , $select);
      $rows = mysqli_fetch_array($result);
      $customer_no = $rows[0];
      $_SESSION['customer_no'] = $rows[0];
      foreach ($_SESSION['proccess_cart'] as $keys => $values)
      {
       $item_id =  $values['item_id'];                    
       $item_name =  $values['item_name'];
       $item_price = $values['item_price'];
       $update_room = "UPDATE rooms SET room_status= 'Occupied', customer_no = '$customer_no', arrival = '$new_arrival', departure = '$new_departure' WHERE room_no = '$item_id'  ";
       $update_room_result = mysqli_query($db, $update_room);
       $insert_room = "INSERT INTO transaction(customer_no,room_name,room_quantity,room_total) VALUES('$customer_no','$item_name','1','$item_price')";
       $insert_room_result = mysqli_query($db,$insert_room);
     }
   }
 } else {
  echo "qwe"; } }
header("location:completed.php?fname=$fname&lname=$lname&address=$address&contact=$contact&landline=$landline&email=$email&total_cost=$total_cost")

?>