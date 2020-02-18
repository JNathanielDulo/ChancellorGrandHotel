<?php
session_start();
require "../../php/connection.php";
$departure = $_SESSION['departure'];
$total_cost = $_SESSION['update_total'];
$balance = $_SESSION['balance_update'];

$id = $_GET['id'];
$update = "UPDATE booking SET departure_date = '".$departure."', total_cost = '".$total_cost."', balance = '".$balance."' WHERE customer_no = '".$id."' ";
mysqli_query($db, $update);
echo "<script>window.alert('Successfully Update');</script>";
header("location:check_pending.php?id=".$id."&remarks=success");
?>