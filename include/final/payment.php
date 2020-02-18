<?php
session_start();
$_SESSION['uid'] = '1';
require "../php/connection.php";
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr';
$paypal_id='seorabeolgrand123@gmail.com';

    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $address = $_GET['address'];
    $contact = $_GET['contact'];
    $landline = $_GET['landline'];
    $email = $_GET['email'];
    $total_cost = $_GET['total_cost'];
    
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Connecting...</title>
<style>
.loader {
border: 16px solid #f3f3f3;
border-radius: 50%;
border-top: 16px solid #3498db;
width: 120px;
height: 120px;
-webkit-animation: spin 2s linear infinite;
animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
0% { -webkit-transform: rotate(0deg); }
100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
0% { transform: rotate(0deg); }
100% { transform: rotate(360deg); }
}

</style>
<body onload="document.frm1.submit()">
   <form action="<?php echo $paypal_url ?>" name="frm1">
     <div class="container" style="margin-top:250px;" align="center">
     <div class="col-lg-12">
       <div class="loader"></div>
   </div>
     <input type='hidden' name='business' value='<?php echo $paypal_id;?>'>
     <input type='hidden' name='cmd' value='_xclick'>
     <input type='hidden' name='currency_code' value='PHP'>
     <input type='hidden' name='handling' value='0'>
     <input type='hidden' name='no_shipping' value='1'>
     <input type='hidden' name='item_number' value='2'>
     <input type='hidden' name='item_name' value='try'>
      <input type='hidden' name='return' value='http://localhost/seorabeol95/include/final/add_booking.php?fname=<?php echo $fname ?>&lname=<?php echo $lname ?>&address=<?php echo $address ?>&contact=<?php echo $contact ?>&landline=<?php echo $landline ?>&email=<?php echo $email ?>&total_cost=<?php echo $total_cost ?>'>
    <input type="hidden" name="amount" value="<?php echo $total_cost ?>"/>  
      
   <div class="col-lg-4">
           <input type="hidden" class="date-style"  name="fname" required  pattern="[a-zA-Z]{4,}" title="Please enter more than three Letters" />
   </div>                  <input type='hidden' name='cancel_return' value='http://localhost/paypal/cancel.php'>
   <input type="image" style="opacity: 0;" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
   <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
   </form>
</body>
</html>
