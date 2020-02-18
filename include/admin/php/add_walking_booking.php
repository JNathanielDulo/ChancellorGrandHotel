<?php

session_start();
require "../../php/connection.php";
$room_id = $_GET['room_id'];

if(isset($_POST['password_admin']))
{
  $pass = mysqli_real_escape_string($db,$_POST['password']);
  $password = "SELECT * FROM admin WHERE username = '".$_SESSION['username']."' AND password = '".$pass."' ";
  $result_password = mysqli_query($db,$password);
  if(mysqli_num_rows($result_password)) 
  {
    if(isset($_POST['fname']))
    {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $address = $_POST['address'];
      $contact = $_POST['contact'];
      $landline = $_POST['landline'];
      $email = $_POST['email'];
      $arrival = $_POST['arrival_date'];
      $departure = $_POST['departure'];
      $adult = $_POST['adult'];
      $child = $_POST['child'];
      $total = $_POST['total_cost_value'];
      $sub_total = $_POST['room_price'];
      $room_name = $_POST['room_name'];
      date_default_timezone_set('Asia/Manila');
      $date = date('m/d/Y');
      $time = date('  g:i:sa  ');
      $valid_id = $_POST['valid_id'];
      $guest = $_POST['guest'];
      $insert = "INSERT INTO booking(fname,lname,address,contact,landline,email,arrival_date,
      departure_date,adult,child,status,total_cost,sub_total,balance,date_ago,valid_id,guest) VALUES('$fname','$lname','$address','$contact','$landline','$email','$arrival','$departure','$adult','$child','approved','$total','0','0','$date$time','$valid_id','$guest')";
      if(mysqli_query($db,$insert))  {
        $select = "SELECT customer_no FROM booking ORDER BY customer_no DESC LIMIT 1";
        $result_select = mysqli_query($db , $select);
        $rows = mysqli_fetch_array($result_select);
        $customer_no = $rows[0];
        $update = mysqli_query($db, "UPDATE rooms SET room_status = 'Occupied', customer_no = '$customer_no' WHERE  room_no = '$room_id' ");
        $inser_tran = mysqli_query($db, "INSERT INTO transaction(customer_no,room_name,room_quantity,room_total) VALUES('$customer_no','$room_name','1','$sub_total')");
        header("location:../checkin.php");
      }
    }
    else {
      echo "qwe";
    }
  }
  else
  {
    echo "wrong";
  }

}

?>
