<?php
$id= $_GET['id'];
require "../../php/connection.php";
if(isset($_POST['submit']))
{
	$subject = $_POST['subject'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	        require "../../../vendor/php/PHPMailer-master/PHPMailerAutoLoad.php";
	        $mail  = new PHPMailer();
	        $mail ->IsSmtp();
	        $mail ->SMTPAuth = true;
	        $mail ->SMTPSecure = 'ssl';
	        $mail ->Host = "smtp.gmail.com";
	        $mail ->Port = 465;
	        $mail ->IsHTML(true);
	        $mail ->Username = "mykelandrww@gmail.com";
	        $mail ->Password = "mikie123";
	        $mail ->SetFrom("mykelandrww@gmail.com");
	        $mail ->Subject = "'.$subject.'";
	        $mail ->Body = "'.$message.'";
	        $mail ->AddAddress($email);


	      if(!$mail ->Send())
	      {
	        echo "Mail not sent";
	      }
	      else
	      {
	        $sql = "UPDATE inbox SET remarks = 'mailed' WHERE id= '$id'";
	        mysqli_query($db, $sql);
	        header("location:../inbox.php");
	      
	      }
	
}
?>