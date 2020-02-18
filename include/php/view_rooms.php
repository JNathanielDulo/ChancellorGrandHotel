<?php
session_start();
require "connection.php";
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
  <link href="../../asset/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../../asset/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../../asset/css/style.css" rel="stylesheet">

  <link href="../../asset/css/sweetalert.css" rel="stylesheet">
</head>
<body class="fixed-sn black-skin" style="background: #efe9c7">

  <!-- Start your project here-->
  <!--Navbar-->
  <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar" style="background-color:#222">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="../../index.php">
        <img src="../../asset/img/hotel/logoreal2.png" style="width:50%;margin-top: 1%">
      </a>
      <div class="collapse navbar-collapse navbar-position" id="navbarNav" >

        <!--Links-->
        <ul class="navbar-nav mr-auto smooth-scroll " style="margin-top:1%">
        </ul>
        <ul class="navbar-nav" style="margin-top:1%">
          <li class="nav-item"><a class="nav-link" href="../../index.php"> HOME <span class="sr-only">(current)</span></a></li>
          <li class="nav-item btn-group"><a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" data-offset="100"> ROOMS</a>          
            <div class="dropdown-menu">
              <?php
              $sql = "SELECT * FROM accomodation";
              $result = mysqli_query($db, $sql);
              while ($rows = mysqli_fetch_array($result))
              {
                ?>
                <a class="dropdown-item" href="view_rooms.php?id=<?php echo $rows[0] ?>"><?php echo $rows[1];?></a>
                <?php
              }
              ?>
            </div></li>
            <li class="nav-item"><a class="nav-link" href="">BAQUET & FUNCTIONS</a></li>
            <li class="nav-item"><a class="nav-link" href="">NICCO'S RESTO & KTV</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!--/Navbar-->
    <!--Modal: Login Form-->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header light-blue darken-3 white-text">
            <h4 class="title"><i class="fa fa-user"></i> Log in</h4>
          </div>
          <!--Body-->
          <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="modal-body">
              <div class="md-form form-sm">
                <i class="fa fa-envelope prefix"></i>
                <input type="email" name="username" id="form30" class="form-control" required>
                <label for="form30">Your email</label>
              </div>
              <div class="md-form form-sm">
                <i class="fa fa-lock prefix"></i>
                <input type="password" name="password" pattern=".{5,10}" title="8 to 12 characters" id="form31" class="form-control" required>
                <label for="form31">Your password</label>
              </div>
              <div class="text-center mt-2">
                <button type="submit" name="submit" class="btn btn-info">Log in <i class="fa fa-sign-in ml-1"></i></button>
              </div>
            </div>
          </form>
          <!--Footer-->
          <div class="modal-footer">
            <div class="options text-center text-md-right mt-1">
              <p>Not a member? <a href="include/register.php">Sign Up</a></p>
            </div>
            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close <i class="fa fa-times-circle ml-1"></i></button>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
    <!--Modal: Login Form-->
    <!--First Row-->
    <?php 
    $id = $_GET['id'];
    $sql = "SELECT * FROM accomodation WHERE room_id = '$id'";
    $result = mysqli_query($db, $sql);
    while ($rows = mysqli_fetch_array($result))
    {
      ?>
      <div class="container margin-small-top" style="margin-top: 10%;margin-bottom: 3%">
        <div class="row">
          <div class="col-lg-6">
            <div style="padding-right: 1%">
              <img src="../../asset/img/hotel/<?php echo $rows[2]; ?>" style="width:90%" />
            </div>
          </div>
          <div class="col-lg-6">
            <h2 style="font-weight: 500"><?php echo $rows[1]?></h2>
            <div style="padding-right: 3%">
              <hr>
              <p><?php echo $rows[4] ?></p>
              <ul style="margin-left: 20%;font-size: 15px">
                <?php
                $list  = "SELECT * FROM accomodation_features WHERE room_list_item = '$id' ";
                $result_1 = mysqli_query($db, $list);
                while($list = mysqli_fetch_array($result_1))
                {
                  ?>
                  <li ><?php echo $list[2] ?></li>
                  <li><?php echo $list[3] ?></li>
                  <li><?php echo $list[4] ?></li>
                  <li><?php echo $list[5] ?></li>
                  <li><?php echo $list[6] ?></li>
                  <li><?php echo $list[7] ?></li>
                  <li><?php echo $list[8] ?></li>
                  <li><?php echo $list[9] ?></li>
                  <li><?php echo $list[10] ?></li>
                  <li><?php echo $list[11] ?></li>
                  <li><?php echo $list[12] ?></li>
                  <li><?php echo $list[13] ?></li>
                  <?php
                }
                ?>
              </ul>
              <hr>
              <div style="padding:0%"> 
                <h5>Share with:</h4>
                  <ul style="display: flex">
                    <li><button data-network="facebook"  class="btn st-custom-button"  style="background-color: #4264aa"><i class="fa fa-facebook"></i> Facebook</button></li>
                    <li><button data-network="twitter"  class="btn st-custom-button" style="background-color:#55ACEE"><i class="fa fa-twitter"></i> Twitter</button></li>
                    <li><button data-network="pinterest"  class="btn st-custom-button"" style="background-color: #bd081c"><i class="fa fa-pinterest"></i> Pinterest</button></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
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
              <p>MANILA LINE: (63 2) 925 8571</p>
              <p>ChancellorHotel.com</p>
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
            © 2017 Copyright: <a href="https://ChancellorHotel.com"> ChancellorHotel.com </a>
          </div>
        </div>
        <!--/.Copyright-->

      </footer>
      <!--/.Footer-->
      <!--/Footer-->

      <!-- SCRIPTS -->
      <!-- JQuery -->
      <script type="text/javascript" src="../../vendor/js/jquery-3.1.1.min.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="../../vendor/js/tether.min.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="../../vendor/js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="../../vendor/js/mdb.min.js"></script>
      <script type="text/javascript" src="../../vendor/js/sweetalert.min.js"></script>
      <script type="text/javascript">
        function te(val){
          swal({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Logout",
            closeOnConfirm: false
          },
          function(){
           window.location='include/php/logout.php';
         });
        }
      </script>
      <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59536dd7779d2a0012862912&product=inline-share-buttons' async='async'></script>
    </body>
    </html>
