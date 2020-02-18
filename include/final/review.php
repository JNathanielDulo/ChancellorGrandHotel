<?php
session_start();
require "../php/connection.php";

$arrival = $_SESSION['arrival'];
$departure = $_SESSION['departure'];

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$address = $_GET['address'];
$contact = $_GET['contact'];
$landline = $_GET['landline'];
$email = $_GET['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" href="../../asset/img/hotel/icon.png" />
  <title>Chancellor Hotel</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../../asset/css/compiled.min.css" rel="stylesheet">
  <link href="../../asset/css/style.css" rel="stylesheet">
</head>
<style type="text/css">
input[type=text]:disabled {
  background: transparent;
  color: #757575;
  border-bottom: 1px solid #ccc
}
</style>
<body class="fixed-sn black-skin" style="background: #efe9ca">

  <!-- Start your project here-->
  <!--Navbar-->
  <nav class="navbar  navbar-toggleable-md navbar-dark scrolling-navbar" style="background-color: #222;opacity: 0.9">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div align="center">
        <a class="navbar-brand" href="../../index.php">
          <img src="../../asset/img/hotel/logoreal2.png" style="width:50%;margin-top: 1%">
        </a>
      </div>
    </div>
  </nav>
  <!--/Navbar-->   
  <div class="container" style="margin-top: 4%">
   <h2 style="color: #73623d;font-weight: 500">Chancellor Hotel</h2>
   <p> Makati City, Philippines</p>
   <!-- Horizontal Steppers -->
   <div class="row">
    <div class="col-md-12">
      <!-- Stepers Wrapper -->
      <ul class="stepper stepper-horizontal">

        <!-- First Step -->
        <li class="completed">
          <a href="select_date.php">
            <span class="circle"><i class="fa fa-check"></i> </span>
            <span class="label">Select Date</span>
          </a>
        </li>

        <!-- Second Step -->
        <li class="completed">
          <a href="#!">
            <span class="circle"><i class="fa fa-check"></i></span>
            <span class="label">Rooms & Rates</span>
          </a>
        </li>
        <!-- Third Step -->
        <li class="completed">
          <a href="#!">
            <span class="circle"><i class="fa fa-check"></i></span>
            <span class="label">Checkout </span>
          </a>
        </li>
        <!-- Fourth Step -->
        <li class="active">
          <a href="#!">
            <span class="circle">4</span>
            <span class="label">Review</span>
          </a>
        </li>
        <li class="next">
          <a href="#!">
            <span class="circle">5</span>
            <span class="label">Completed</span>
          </a>
        </li>
      </ul>
      <!-- /.Stepers Wrapper -->
    </div>
  </div>
  <div class="row" style="margin-top: 4%">
   <div class="col-lg-4">
    <div class="z-depth-1" style="background-color: white;border-radius: 4px">
      <div style="position:relative;top:-45px;left: 0%;">
        <button type="button" class="btn btn-tw" style="width: 19%;height: 65px;padding-left: 3%;background-color: #73623d"><i class="fa fa-hotel" aria-hidden="true" style="font-size: 40px"></i></button>
      </div>
      <div class="float-xs-left" style="margin-top: -7%">
        <h3><span class="badge " style="background-color: #73623d">Your Date Selected</span></h3>
      </div>
      <div style="padding: 3%">
        <div class="row" align="center">
          <div class="col-lg-12">
            <ul>
              <table class="table">
                <tbody>
                  <tr>
                    <td>Arrival Date</td>
                    <td><?php echo $arrival ?></td>
                  </tr>
                  <tr>
                    <td>Departure Date</td>
                    <td><?php echo $departure ?></td>
                  </tr>
                </tbody>
              </table>
            </ul>
          </div>
          <div class="float-xs-left" style="margin-top: -5%">
            <h3><span class="badge " style="background-color: #73623d">Your Room's Selected</span></h3>
          </div>
          <div class="col-lg-12" style="margin-top: 0%" align="left">
            <ul>
              <li style="font-size: 20px;font-weight: 500">Room Type</li>
              <table class="table" style="margin-top: 2%">
                <tbody align="center"> 
                  <?php
                  $total = 0;
                  $adult = 0;
                  $child = 0;
                  if(!empty($_SESSION['proccess_cart']))
                  {
                    
                    $totalDays =  $_SESSION['totalDays'];
                    foreach ($_SESSION['proccess_cart'] as $keys => $values)
                    {
                      $total = $total + ($values['item_price'] * $totalDays);

                      $adult = $adult + ($values['item_adult']);
                      $child = $child + ($values['item_child']);
                      ?>
                      <tr>
                        <td style="font-size: 15px;font-weight: 400" ><?php echo $values['item_name'] ?></td>
                        <td style="font-size: 15px;font-weight: 400" >PHP <?php echo $values['item_price'] ?>/Night </td>
                      </tr>
                      <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </ul>
          </div>
        </div>
        <div class="row">         
          <div class="col-lg-12" style="margin-top: 1%;margin-left: 0%" align="left">
            <ul class="list-inline">
              <li style="font-size: 20px;font-weight: 500">Guest</li>
              <table class="table">
                <tbody align="center">
                  <tr>
                    <td style="font-size: 15px;font-weight: 400;">Adult</td>
                    <td style="font-size: 15px;font-weight: 400;"><?php echo $adult ?></td>
                  </tr>
                  <tr>
                    <td style="font-size: 15px;font-weight: 400;">Child</td>
                    <td style="font-size: 15px;font-weight: 400;"><?php echo $child ?></td>
                  </tr>
                </tbody>
              </table>
            </ul>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6">
            <h4>Total Rate</h4>
          </div>
          <div class="col-lg-6">
            <h5 id="total_cost_view">PHP <?php echo number_format($total,2); ?></h5>
            <h6 style="color:gray">Including Service Fee</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8">
    <div class="row">
      <div class="col-lg-12">
        <div class="z-depth-1" style="background-color: white;padding: 4%">
          <h3 style="padding-left: 3%;font-weight: 500">MAIN GUEST</h3>
          <form action="check_available.php" method="get">  
            <div class="row" style="margin-top: 0%;padding: 3%">
              <div class="col-lg-6">
                <div class="md-form form">
                  <input  type="text" style="text-transform: capitalize;" value="<?php echo $fname; ?>" name="fname" id="fname"  class="form-control form-sm validate" >
                  <label class="active" for="fname">Firstname:</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="md-form form">
                  <input  type="text" style="text-transform: capitalize;" value="<?php echo $lname; ?>" name="lname" id="lname" class="form-control form-sm validate"  >
                  <label class="active" for="lname">Lastname:</label>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="md-form ">
                  <input  type="text" style="text-transform: capitalize;" value="<?php echo $address; ?>" name="address" id="address" class="form-control form-sm validate" >
                  <label class="active" for="address">Address:</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="md-form form">
                  <input  type="text" name="contact" id="contact" value="<?php echo $contact; ?>" class="form-control form-sm validate" >
                  <label class="active" for="contact">Mobile Number:</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="md-form form">
                  <input  type="text" name="landline" value="<?php echo $landline; ?>" id="landline" class="form-control form-sm validate" >
                  <label class="active" for="landline" >Telephone Number:</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="md-form ">
                  <input  type="email" id="email" value="<?php echo $email; ?>" name="email" class="form-control form-sm validate" >
                  <label class="active" for="email">E-mail:</label>
                  <input type="hidden" name="total_cost" value="<?php echo $total; ?>"/>
                </div>
              </div>
            </div>
            <h5 style="font-weight: 500;color:#222">Terms & Condition</h5>
            <p style="font-size: 14px">If you booked your hotel directly from the hotel through an ordinary program, most likely you will be able to cancel your hotel reservation even 24 hours before your arrival date and will get back most of the amount you paid or won't be charged if you haven't paid yet. This usually is the easy case. (2pm hours Manila Time) 
            </p>
            <h5 style="font-weight: 500;color:#222">Booking Policies</h5>
            <p style="font-size: 14px"><b>Booking</b>: Please provide payment details to guarantee your reservation.</p>
            <div class="form-group">
              <input type="checkbox" id="checkbox1"  required>
              <label for="checkbox1"> Please specify that you have read and understand the rate policies for your itinerary. *</label>
            </div>
          </div>
        </div>
      </div>
      <div align="right" style="margin-top: 1%">
        <a href="#" style="color: #2AD1A3">Modify the Reservation</a> <button class="btn" type="submit" name="confirm" style="background-color: #73623d"  >Confirm Reservation</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
</div>
<!--Copyright-->
<footer class="page-footer center-on-small-only" style="background-color:#222">
  <div class="footer-copyright" style="background-color:#353230">
    <div class="container-fluid">
      © 2017 Copyright: <a href="https://ChancellorHotel.com"> ChancellorHotel.com </a>
    </div>
  </div>
  <!--/.Copyright-->
</footer>
<!--/.Footer-->
<!--/Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="../../vendor/js/compiled.min.js"></script>

</body>
</html>
