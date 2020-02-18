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

                <a class="navbar-brand" href="../../index.php">
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
          <div class="row" style="margin-top: 3%">
          <div class="col-lg-6">

              <h1 style="color:#222;font-weight: 500">Wedding</h1>
             <h6>TAKE A LOOK AND HAVE FUN</h6>
                        <div id="mdb-lightbox-ui"></div>
                        <div class="mdb-lightbox no-margin">

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(117).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(117).jpg" class="img-fluid">
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(98).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(131).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(131).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(123).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(123).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(118).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(118).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(128).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(128).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(132).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(132).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(115).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(115).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(133).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(133).jpg" class="img-fluid" />
                                </a>
                            </figure>

                        </div>
          </div>
              <div class="col-md-6">
              <h1 style="color:#222;font-weight: 500">Debut</h1>
             <h6>TAKE A LOOK AND HAVE FUN</h6>
                        <div id="mdb-lightbox-ui"></div>
                        <div class="mdb-lightbox no-margin">

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(117).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(117).jpg" class="img-fluid">
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(98).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(98).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(131).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(131).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(123).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(123).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(118).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(118).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(128).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(128).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(132).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(132).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(115).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(115).jpg" class="img-fluid" />
                                </a>
                            </figure>

                            <figure class="col-md-4">
                                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img%20(133).jpg" data-size="1600x1067">
                                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(133).jpg" class="img-fluid" />
                                </a>
                            </figure>

                        </div>

                    </div>
                </div>
            </div>
          <div class="container margin-small-top" style="margin-top: 5%;margin-bottom: 3%">
              <div class="row">   
                    <div class="col-lg-12">
                        <h2 style="font-weight: 500">Achilles</h2>
                        <p>
                      Located in the main lobby, this 48-square meter function room is ideal for small meetings of up to 30 people in a banquet set-up or 25 for U-shape / block arrangement.
                        </p>
                    </div>
                    <div class="col-lg-12"  style="margin-top: 4%">
                        <h2 style="font-weight: 500">Busan Hall</h2>
                        <p>
                        This 1st half of the Grand Ballroom – Busan Hall is a 199-square meter stretch with built-in stage and dance floor, perfect for social gatherings and formal affairs like weddings, debuts, product launches and conventions.
                        </p>
                    </div>
                    <div class="col-lg-12"  style="margin-top: 4%">
                        <h2 style="font-weight: 500">Subic Hall</h2>
                        <p>
                    168 square meters in floor size, Subic Hall is the other half of the entire ballroom. It fits 80 – 100 people and is best for conferences, seminars, birthdays and other social and corporate affairs.
                        </p>
                    </div>
                    <div class="col-lg-12"  style="margin-top: 4%">
                        <h2 style="font-weight: 500">Seorabeol Grand Ballroom</h2>
                        <p>
                        The hotel’s premier event venue consists of Busan & Subic halls. It is one of the largest private venues in the Freeport that caters to up to 250 sit-down banquets, 300 cocktails and 500 theater style seat plans.

                        The way these venues are carefully planned and arranged by our banquet team makes it a standout. Our team helps create elegant and themed designs to make every occasion truly memorable.
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
                <p>Makati City,s Philippines</p>
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
                © 2017 Copyright: <a href="https://ChancellorHotel.com"> ChancellorGrandHotel.com </a>
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
