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
          <a href="#">
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
        <li class="completed">
          <a href="#!">
            <span class="circle"><i class="fa fa-check"></i></span>
            <span class="label">Review</span>
          </a>
        </li>
        <li class="active">
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
                    $count = count($_SESSION['proccess_cart']);
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
        <div class="z-depth-1" style="background-color: white;border-radius: 4px">
          <div style="position:relative;top:-45px;left: 0%;">
            <button type="button" class="btn btn-tw" style="width: 12%;height: 65px;padding-left: 4%;background-color: #73623d"><i class="fa fa-user" aria-hidden="true" style="font-size: 40px"></i></button>
          </div>
          <div class="float-xs-left" style="margin-top: -5%">
            <h3><span class="badge " style="background-color:#73623d">Your Reservation has been Completed</span></h3>
          </div>
          <div style="padding:2%">
           <h5 style="padding-left: 3%">MAIN GUEST</h5>
           <form action="session_2.php" method="post">
            <div class="row" style="margin-top: -1%;padding: 3%">
              <div class="col-lg-6">
                <div class="md-form form-sm">
                  <input  type="text" value="<?php echo $fname; ?>" style="text-transform: capitalize;" name="fname" id="fname"  class="form-control form-sm" disabled>
                  <label class="active" for="fname">Firstname:</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="md-form form-sm">
                  <input  type="text" value="<?php echo $lname; ?>" style="text-transform: capitalize;" name="lname" id="lname" class="form-control form-sm" disabled>
                  <label class="active" for="lname">Lastname:</label>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="md-form form-sm">
                  <input  type="text" value="<?php echo $address; ?>" style="text-transform: capitalize;" name="address" id="location" class="form-control form-sm" disabled>
                  <label class="active" for="location">Address:</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="md-form form-sm">
                  <input  type="text" value="<?php echo $contact; ?>" name="contact" id="contact" class="form-control form-sm" disabled>
                  <label class="active" for="contact">Mobile Number:</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="md-form form-sm">
                  <input  type="text" value="<?php echo $landline; ?>" name="landline" id="landline" class="form-control form-sm" disabled>
                  <label class="active" for="landline" >Telephone Number:</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="md-form form-sm">
                  <input  type="text" value="Booking" id="reservation"  class="form-control form-sm" disabled>
                  <label class="active" for="reservation">Reservation Type:</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="md-form form-sm">
                  <input  type="text" value="<?php echo $email; ?>" id="email" name="email" class="form-control form-sm" disabled>
                  <label class="active" for="email">E-mail:</label>
                </div>
              </div>
              <h6 style="font-size: 13px;padding-left:3% "><small style="font-size: 13px;color: dodgerblue">Note:</small> For your Booking Reservation you need to use your Room Reserve</h6>
            </div>
            <div align="center">
              <a href="#!" class="btn btn-md" onclick="printAll('print_reciept')" style="background-color: #73623d"><i class="fa fa-print"></i> Print </a>
            </div>
          </div>
        </div>
      </div>
      <div  id="print_reciept" style="display:none;text-align: center;text-align-last: center;">
        <img src="../../asset/img/hotel/logoreal1.png" class="img-responsive text-center" style="height: 10%;margin-bottom: 5%" />
        <table class="table text-center">
          <tbody>
            <tr>
              <td>Booking Number: </td>
              <td><?php echo $_SESSION['customer_no']; ?></td>
            </tr>
            <tr>
              <td>Email: </td>
              <td><a href="#!">mykelandrww@gmail.com</a></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td>Your Reservation: </td>
              <td><?php echo $totalDays; ?>night, <?php echo $count; ?>room</td>
            </tr>
            <tr>
              <td>Check in:</td>
              <td><?php echo  $arrival; ?><span style="font-size: 13px;">(2pm Manila Time Hour)</span></td>
            </tr>
            <tr>
              <td>Check out:</td>
              <td><?php echo  $departure; ?><span style="font-size: 13px;">(12pm Manila Time Hour)</span></td>
            </tr>
          </tbody>
          <tbody>
            <?php
            if(!empty($_SESSION['proccess_cart']))
            {
              foreach ($_SESSION['proccess_cart'] as $keys => $values)
              {
                ?>
                <tr>
                  <td><?php echo $values['item_name']?></td>
                  <td>P<?php echo number_format($values['item_price'],2)?></td>
                </tr>
                <?php
              }
            }
            ?>
            <tr>
              <td>VAT</td>
              <td>0%</td>
            </tr>
            <tr>
              <td><h5>Total Price:</h5></td>
              <td>P<?php echo number_format($total,2); ?></td>
            </tr>
            <tr>
              <td colspan="2"><p>Please Note: additional supplements(e.g extra bed) are not added to this total.The Total Price is shown is the amount you will pay to the property. Seorabeol Grand Leisure Hotel does not charge any reservation, Administration or other fees.</p></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-lg-12">
        <div class="z-depth-1" style="background-color: white;border-radius: 4px;margin-top: 2%">
          <div style="padding: 4%">
            <h5>Direction and Location</h5>
            <div id="floating-panel">     
              <label>Mode</label>
              <select class="mdb-select form-sm" id="mode">
                <option value="DRIVING">Driving</option>
                <option value="WALKING">Walking</option>
                <option value="BICYCLING">Bicycling</option>
                <option value="TRANSIT">Transit</option>
              </select>
            </div>
            <div style="width:100%;height: 300px;" id="map">Internet Connection Failed</div>
          </div>
        </div>
      </div>
      <div align="center" style="margin-top: 5%">
        <a href="../php/sessionunset.php"><button class="btn" type="button" style="background-color: #73623d">Go Home Page</button></a>
      </div>
    </div>
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
<script>
  function printAll(e) {
    var restore = document.body.innerHTML;
    var print_content = document.getElementById(e).innerHTML;
    document.body.innerHTML = print_content;
    window.print();
    document.body.innerHTML = restore;
  }
  function initMap() {
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var directionsService = new google.maps.DirectionsService;
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 18,
      center: {lat: 37.77, lng: -122.447}
    });
    directionsDisplay.setMap(map);
    calculateAndDisplayRoute(directionsService, directionsDisplay);
    document.getElementById('mode').addEventListener('change', function() {
      calculateAndDisplayRoute(directionsService, directionsDisplay);
    });
  }
  function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    var selectedMode = document.getElementById('mode').value;
    var inpet = document.getElementById("location").value;
    directionsService.route({
          origin: inpet,  // Haight.
          destination: "Seorabeol Grand Leisure Hotel, Subic Bay Freeport Zone",  // Ocean Beach.
          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: google.maps.TravelMode[selectedMode]
        }, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1HyQ6MAy8I8CXj1Yi1mvL-hX5fqCLwos&callback=initMap">
</script>
</body>
</html>
