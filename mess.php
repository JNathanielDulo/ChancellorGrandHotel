<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/php/PHPMailer/PHPMailer/src/Exception.php';
require 'vendor/php/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'vendor/php/PHPMailer/PHPMailer/src/SMTP.php';

$mail =  new PHPMailer();
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com:465';
$mail->SMTPAuth = TRUE;
$mail->Port = 465;
$mail->mail = 'smtp';
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(TRUE);
$mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
$mail->Username = 'mykelandrww@gmail.com';
$mail->Password = 'mikie123';
$mail->From = 'mykelandrww@gmail.com';
$mail->FromName = 'demo';
$mail->Body = 'qweqweqweqw';
$mail->Subject = 'demo';
$mail->AddAddress('mykelandrww@gmail.com');
if(!$mail->send()) {
    echo "boo";
    echo $mail->ErrorInfo;
} else {
    echo "yeheyy";
}