<?php
    session_start();
    require "php/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="../asset/img/hotel/icon.png" />
    <title>Chancellor Grand Hotel</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../asset/css/compiled.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../asset/css/style.css" rel="stylesheet">

</head>
<body class="fixed-sn black-skin" style="background: #efe9c7">

        <!-- Start your project here-->
        <!--Navbar-->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar" style="background-color:#222">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand" href="../index.php">
                    <img src="../asset/img/hotel/logoreal2.png" style="width:50%;margin-top: 1%">
                </a>
                <div class="collapse navbar-collapse navbar-position" id="navbarNav" >

                    <!--Links-->
                    <ul class="navbar-nav mr-auto smooth-scroll " style="margin-top:1%">
                    </ul>
                    <ul class="navbar-nav" style="margin-top:1%">
                        <li class="nav-item"><a class="nav-link" href="../index.php"> HOME <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item btn-group"><a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" data-offset="100"> ROOMS</a>          
                        <div class="dropdown-menu">
                          <?php
                              $sql = "SELECT * FROM accomodation";
                              $result = mysqli_query($db, $sql);
                              while ($rows = mysqli_fetch_array($result))
                              {
                          ?>
                          <a class="dropdown-item" href="php/view_rooms.php?id=<?php echo $rows[0] ?>"><?php echo $rows[1];?></a>
                          <?php
                            }
                            ?>
                      </div></li>
                      <li class="nav-item"><a class="nav-link" href="events.php">BAQUET & FUNCTIONS</a></li>
                      <li class="nav-item"><a class="nav-link" href="resto.php">NICCO'S RESTO & KTV</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--/Navbar-->
          <!--First Row-->
          <div class="container" style="margin-top: 8%">
            <h2 style="font-weight: 500">Nicco's Resto / Bar</h2> 
                <div class="row" style="margin-bottom: 5%">
                       <div class="col-lg-4">
                          <img src="../asset/img/dining/Dining1.jpg" class="img-fluid ">
                        </div>
      
                    <div class="col-lg-4">
                           <img src="../asset/img/dining/Dining2.jpg" class="img-fluid ">
                     </div>
      
                        <div class="col-lg-4">
                             <img src="../asset/img/dining/Dining3.jpg" class="img-fluid ">
                            </div>
                    <div class="col-lg-12" style="margin-top: 3%">
                            <p>
                                Savor the flavorful Asian cuisine and the lavish taste of the west at Nicco’s Resto/Bar – the hotel’s main dining facility. Open daily for breakfast, lunch, dinner and in between meals. The chef prepares quintessential concoctions with over a hundred dishes to choose from. So whether you want a quick bite or prefer a leisurely meal, Nicco’s is definitely the best place to go to.
                            </p>
                    </div>
                </div>
                <h2 style="font-weight: 500">Family Videoke</h2> 
                <div class="row">
                       <div class="col-lg-4">
                          <img src="../asset/img/dining/enter1.jpg" style="height: 300px; width: 340px;">
                        </div>
      
                    <div class="col-lg-4">
                           <img src="../asset/img/dining/enter2.jpg" style="height: 300px; width: 340px;">
                     </div>
      
                        <div class="col-lg-4">
                             <img src="../asset/img/dining/enter3.jpg" style="height: 300px; width: 340px;">
                            </div>
                    <div class="col-lg-12" style="margin-top: 3%">
                            <p>A videoke date with family & friends in one of the private videoke rooms is an added attraction at the hotel. Enjoy sumptuous appetizers and drinks at very appealing consumable rates.
                            </p>
                    </div>
                </div>
        </div>
        <!--/Contact Us-->
        <!--Footer-->
        <!--Footer-->
    <footer class="page-footer center-on-small-only" style="background-color:#222;margin-top: 3%">
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
                © 2017 Copyright: <a href="https://Chancellor.com"> ChancellorGrandHotel.com </a>
            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->
        <!--/Footer-->

        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="../vendor/js/compiled.min.js"></script>
          <script type="text/javascript">
             $(function () {
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
});
          </script>
</body>
</html>
