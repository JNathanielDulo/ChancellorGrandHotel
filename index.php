<?php
session_start();
require "include/php/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" href="asset/img/hotel/icon.png" />
  <title>Chancellor Grand Hotel </title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="asset/css/compiled.min.css" rel="stylesheet">
  <link href="asset/css/style.css" rel="stylesheet">
  <link href="asset/css/bootstrap-datepicker.css" rel="stylesheet">
</head>
<body class="fixed-sn black-skin" style="background: #efe9c7">

  <!-- Start your project here-->
  <!--Navbar-->
  <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar" style="background-color: #222;opacity: 0.8">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="#">
        <img src="asset/img/hotel/logoreal2.png" style="width:50%;margin-top: 1%">
      </a>
      <div class="collapse navbar-collapse navbar-position" id="navbarNav" >

        <!--Links-->
        <ul class="navbar-nav mr-auto smooth-scroll " style="margin-top:1%">
        </ul>
        <ul class="navbar-nav" style="margin-top:1%">
          <li class="nav-item"><a class="nav-link" href="#home"> HOME <span class="sr-only">(current)</span></a></li>
          <li class="nav-item btn-group"><a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" data-offset="100"> ROOMS</a>          
            <div class="dropdown-menu">
              <?php
              $sql = "SELECT * FROM accomodation";
              $result = mysqli_query($db, $sql);
              while ($rows = mysqli_fetch_array($result))
              {
                ?>
                <a class="dropdown-item" href="include/php/view_rooms.php?id=<?php echo $rows[0] ?>"><?php echo $rows[1];?></a>
                <?php
              }
              ?>
            </div></li>
            <li class="nav-item"><a class="nav-link" href="include/events.php">BAQUET & FUNCTIONS</a></li>
            <li class="nav-item"><a class="nav-link" href="include/resto.php">NICCO'S RESTO & KTV</a></li>
            <li class="nav-item"><a class="nav-link" href="include/final/select_date.php"><button type="button" class="btn btn-rounded btn-md" style="width: 100%;background-color: #73623d;margin-top: -6%">Book Now</button></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!--/Navbar-->
    <!--background mask -->
    <div class="view intro hm-black-light" id="home" style="background: url(asset/img/hotel/cover2.jpg)no-repeat;background-position: center;background-size: cover;border-bottom: 1px solid #73623d">
      <div class="hm-black-strong-1">
        <div class="full-bg-img flex-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="divider-new div-white" style="color:white">
                  <h1 align="center" style="color:whitesmoke;font-weight: 500;font-family: raleway">Your home and event venue inside the City!</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="z-depth-1"  style="background-color: #222;position: relative;top:-20%;left:30px;width: 95%;height:120px;opacity: 0.9;border: 2px solid  #73623d;border-radius: 3px">
      <div style="position: absolute;width: 100%;height:400px;opacity: 1">
        <div align="center">
          <form action="include/final/session_date.php" method="post">
            <div class="row" style="padding-left: 13%;padding-right: 7%;padding-top: 3%">
             <div class="col-lg-3">
              <div class="md-form text-left">
                <i class="fa fa-calendar-check-o prefix"></i>
                <input type="text"  style="color:white" name="arrival"  class="datepicker form-control" id="arrival" required />
                <label for="arrival" style="color:whitesmoke">Checkin</label>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="md-form text-left">
                <i class="fa fa-calendar-times-o prefix"></i>
                <input type="text" style="color:white" name="departure"  class="datepicker form-control" id="departure" required />
                <label for="departure" style="color:white">Checkout</label>
              </div>
            </div>
            <div class="col-lg-6">
              <button class="btn" style="background-color: #73623d" type="submit" name="check_available"><i class="fa fa-calendar prefix"></i>  Check Availability</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--/background-mask-->
  <!--First Row-->
  <!--/First Row-->
  <!--Second Row-->
  <div class="container wow fadeInUp" data-wow-delay="0.7s" style="margin-top: -6%">
    <div class="row">
      <div class="col-lg-6">
        <h1  style="font-size:50px;color:#333;font-weight: 500">Welcome to Chancellor Grand Hotel !</h1>
        <p style="font-size:15px;">Experience the friendliest welcome and an outpour of warmth of Filipino hospitality.</p>
        <p style="font-size:15px;">Chancellor Grand Hotel is located right in the middle of the bustling Makati City, an ideal base for companies and <br>individuals who seek
        the enjoyment of the limitless leisure diversions that only the Chancellor Grand Hotel provides.</p>
        <p style="font-size:15px;" >Chancellor Grand Hotel... Your home and event venue in the City!</p>
      </div>
      <div class="col-lg-6">
        <img src="asset/img/hotel/landing-image2.jpg" class="img-fluid" alt="Responsive image">
      </div>
    </div>
  </div>
  <!--/Second row-->
  <hr class="margin-small-top" style="width:84%;background-color:#73623d;">
  <!--Gallery-->
  <div class="container margin-small-top wow fadeInUp"  data-wow-delay="0.7s" align="center">
    <h1 style="font-weight: 500">Why Choose Us?</h1>
    <div class="row margin-small-top">
      <div class="col-lg-4">
        <div class="overlay hm-blue-strong">
          <img src="asset/img/hotel/gallery2.jpg" style="width:100%;height:240px;" alt="">
          <div class="mask flex-center">
          </div>
        </div>
        <div>
          <h3 class="margin-small-top" style="font-weight: 500">Food Service</h3>
          <p>It is the trusted in terms of arranging an secure accommodations at a hotel or restaurant</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class=" overlay hm-blue-strong">
          <img src="asset/img/hotel/gallery1.jpg" style="width:100%;height:240px;" alt="">
          <div class="mask flex-center">

          </div>
        </div>
        <div>
          <h3 class="margin-small-top" style="font-weight: 500">Shared Room</h3>
          <p>Every room have been of good quality and very comfortable</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class=" overlay hm-blue-strong" style="font-weight: 500">
          <img src="asset/img/hotel/gallery3.jpg" style="width:100%;height:240px;" alt="">
          <div class="mask flex-center">
          </div>
        </div>
        <div>
          <h3 class="margin-small-top" style="font-weight: 500">Our Team</h3>
          <p>Our customer service is treating customers with a friendly, helpful attitude. helping customers efficiently, being positive and willing to assist your customers to the best of your ability</p>
        </div>
      </div>
    </div>
  </div>
  <!--/Contact Us-->
  <!--Footer-->
  <!--Footer-->
  <footer class="page-footer center-on-small-only" style="background-color:#222">
    <!--Footer Links-->
    <div class="container-fluid wow fadeIn" data-wow-delay="0.6s">
      <div class="row">
        <!--First column-->
        <div class="col-md-12" align="center">
          <h1 class="title">Visit Our Hotel</h1>
          <p>Experience the friendliest welcome and an outpour of warmth of Filipino hospitality..</p>
          <a href="../accomodation.php"><button class="btn" style="background-color:#2AD1A3;border-radius:30px;">BOOK NOW</button></a>
        </div>
        <!--/.First column-->
        <hr class="hidden-md-up">

      </div>
    </div>
    <!--/.Footer Links-->
    <hr>
    <div align="center" class="wow fadeIn" data-wow-delay="0.6s">
      <ul style="display:flex;">
        <div class="col-lg-6">
          <li>LOCATION</li>
          <p>Makati City, Philippines</p>
          <p>CONTACT</p>
          <p>MANILA LIINE: (63 2) 925 8571</p>
          <p>ChancellorGrandHotel@gmail.com</p>
        </div>
        <div class="col-lg-6">
          <li>STAY IN TOUCH</li>
          <button class="btn" style="background-color:#2962ff;border-radius:100px;padding:15px;width:50px;"><i class="fa fa-facebook prefix"></i></button>
          <button class="btn" style="background-color:dodgerblue;border-radius:100px;padding:15px;width:50px;"><i class="fa fa-twitter prefix"></i></button>
          <button class="btn" style="background-color:brown;border-radius:100px;padding:15px;width:50px;"><i class="fa fa-instagram prefix"></i></button>
        </div>
      </ul>
    </div>
    <!--/.Social buttons-->

    <!--Copyright-->
    <div class="footer-copyright" style="background-color:#353230">
      <div class="container-fluid">
        © 2017 Copyright: <a href="https://seorabeolgrandleisurehotel.com"> ChancellorGrandHotel_.com </a>
      </div>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->
  <!--/Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="vendor/js/compiled.min.js"></script>
  <!--External Datepicker-->
  <script type="text/javascript" src="vendor/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript">
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('#arrival').datepicker({
      color: 'green',
      onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
      }
      checkin.hide();
      $('#dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('#departure').datepicker({
      color: 'green',
      onRender: function(date) {
        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      checkout.hide();
    }).data('datepicker');
  </script>
  <script type="text/javascript">
    new WOW().init(); 
  </script>
  <script type="text/javascript">
   $(function () {
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
  });

   var currentdatearrival = new Date();
   var shortdatearrival = currentdatearrival.toLocaleDateString();
   var currentdatedeparture = new Date();
   var date = new Date();
   date.setDate(date.getDate() + 1);
   var short =date.toLocaleDateString();

   document.getElementById("arrival").value = shortdatearrival;
   document.getElementById("departure").value = short;
 </script>
</body>
</html>
