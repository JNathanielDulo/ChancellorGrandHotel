<?php
    session_start();
    require "../../php/connection.php";
    if(isset($_POST['admin'])) {
    $user = mysqli_real_escape_string($db,$_POST['username']);
    $pass = mysqli_real_escape_string($db,$_POST['password']);
    $query = "SELECT * FROM admin WHERE username = '".$user."' AND password = '".$pass."' ";
    $result = mysqli_query($db,$query);
    if(mysqli_num_rows($result)) {
        $data = mysqli_fetch_array($result);
        $_SESSION['username'] = $data['username'];
        $_SESSION['name'] = $data['firstname'];
        header("location:../dashboard.php?get=get");
    }
    else
    {
        echo "<script> window.alert('Admin Account Does Not Exist'); </script>";
    }
  }
?>
