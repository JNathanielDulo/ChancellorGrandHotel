<?php
session_start();
require "../php/connection.php";
date_default_timezone_set('Asia/Manila');
 $date = date('m/d/Y');
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SGLH (Admin)</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS -->
    <link href="../../asset/css/compiled.min.css" rel="stylesheet" type="text/css">
    <!-- External CSS -->
    <link href="admin-style.css" rel="stylesheet" type="text/css">
</head>
<style>
.sn-bg-1 {
  background: url(../../asset/img/hotel/frontdesk.jpg) no-repeat; 
  background-size: cover;
}
header, main, footer {
  padding-left: 240px;
}

@media only screen and (max-width : 992px) {
  header, main, footer {
    padding-left: 0;
  }
}
</style>
<body class="fixed-sn black-skin" style="background-color: whitesmoke;">
     <header>
        <ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar ">
            <li>
                <div class="logo-wrapper waves-effect" >
                    <a href="#"><img src="../../asset/img/hotel/logoreal2.png" class="img-fluid flex-center"></a>
                </div>
            </li>
            <li style="margin-top:10px;">
                <ul class="collapsible collapsible-accordion">
                    <li><a href="dashboard.php" class="waves-effect arrow-r"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <?php
                     $sql = "SELECT COUNT(id) AS id FROM inbox";
                     $results = mysqli_query($db,$sql);
                     while ($rows = mysqli_fetch_array($results)) {
                      ?>
                    <li><a href="inbox.php" class="waves-effect arrow-r"><i class="fa fa-inbox"></i> Inbox <span class="badge red" style="border-radius:10px"><?php echo $rows[0] ?></span></i></a></li>
                    <?php
                      }
                    ?>
                    <hr style="width:85%;background-color:#ddd">
                    <li><a href="checkin.php" class="waves-effect arrow-r"><i class="fa fa-calendar-plus-o"></i> Check-in</a></li>
                    <?php
                     $sql = "SELECT COUNT(customer_no) AS customer_id FROM booking WHERE   status ='pending'";
                     $results = mysqli_query($db,$sql);
                     while ($rows = mysqli_fetch_array($results)) {
                      ?>
                    <li><a href="pending.php" class="waves-effect arrow-r"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Pending <span class="badge red" style="border-radius:10px"><?php echo $rows[0] ?></span></a></li>    
                    <?php 
                    }
                    ?>  
                    <?php
                     $sql = "SELECT COUNT(customer_no) AS customer_id FROM booking WHERE   status ='approved' AND departure_date >= '".$date."' ";
                     $results = mysqli_query($db,$sql);
                     while ($rows = mysqli_fetch_array($results)) {
                      ?>
                     <li><a href="ongoing.php" class="waves-effect"><i class="fa fa-calendar-check-o"></i> Ongoing <span class="badge red" style="border-radius:10px"><?php echo $rows[0] ?></span></a></li>
                     <?php
                      }
                      ?>
                      <?php                   
                     $sql1 = "SELECT COUNT(customer_no) AS customer_id FROM booking WHERE  status ='approved' AND departure_date <= '".$date."' ";
                     $results1 = mysqli_query($db,$sql1);
                     while ($rows1 = mysqli_fetch_array($results1)) {
                      ?>
                    <li><a href="outgoing.php" class="waves-effect"><i class="fa fa-calendar-times-o"></i> Outgoing <span class="badge red" style="border-radius:10px"><?php echo $rows1[0] ?></span></a></li>
                    <?php
                    }
                    ?>
                    <hr style="width:85%;background-color:#ddd">
                    <li><a href="rooms.php" class="waves-effect arrow-r"><i class="fa fa-hotel"></i> Rooms</a></li>
                    <li><a href="reports.php" class="waves-effect arrow-r"><i class="fa fa-flag"></i> Reports</a></li>
                </ul>
            </li>
            <div class="sidenav-bg mask-strong"></div>
        </ul>
        </header>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-xs-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
                <div class="mr-auto">
                <ol class="header-breadcrumb breadcrumb fp-header-breadcrumb hidden-md-down">
                        <li class="breadcrumb-item"><a href="pending.php" style="font-size: 15px;font-weight: 300"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                 </ol>
            </div>
            <ul class="nav navbar-nav ml-auto flex-row">
            <li class="nav-item dropdown">
                   <a class="nav-link"><span class="badge red" style="border-radius: 10px;">1</span><i class="fa fa-inbox"></i> Inbox</a>  </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge red" style="border-radius: 10px;">1</span><i class="fa fa-bell"></i> <span class="hidden-sm-down">Notifcation</span></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div></li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $_SESSION['name'] ?></a>
                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                       <a class="dropdown-item" href="profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Account</a>
                       <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log-out</a>
                   </div>
               </li>
            </ul>
        </nav>

<!-- /.Navbar -->
  <!--DASHBOARD ANALYTICS-->
  <!--Profile Information-->
<main>
    <div class="container" style="margin-top:8%;">
        <div class="row">
          <div class="col-lg-8" style="margin-left: -5%;margin-right:3%">
              <div class="table-responsive margin-small-top" style="width:107%">
                <div class="card-table">
                  <div class="card-table-content" style="padding:30px">
                    <h3 class="table-float" style="background-color:#2ad1a3;color:white">Edit Profile <i class="fa fa-user-circle-o" aria-hidden="true"></i></h3>
                          <div class="row">
                          <?php
                            $sql = "SELECT * FROM admin WHERE username='".$_SESSION['username']."' LIMIT 1";
                            $result = mysqli_query($db, $sql);
                            while ($rows = mysqli_fetch_array($result))
                            {
                          ?>
                                <div class="col-lg-4" style="margin-bottom: 5%;">
                                      <div class="md-form">
                                        <input placeholder="<?php echo $rows[1];?>" type="text" id="form6" class="form-control" >
                                        <label class="active" for="form6">Username</label>
                                    </div>
                                </div>
                                 <div class="col-lg-4">
                                      <div class="md-form">
                                        <input placeholder="<?php echo $rows[2];?>" type="text" id="form6" class="form-control">
                                        <label class="active" for="form6">Password</label>
                                    </div>
                                </div>
                                   <div class="col-lg-4">
                                      <div class="md-form">
                                        <input placeholder="<?php echo $rows[5];?>" type="text" id="form6" class="form-control">
                                        <label class="active" for="form6">Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="margin-bottom: 5%;">
                                      <div class="md-form">
                                        <input placeholder="<?php echo $rows[3];?>" type="text" id="form6" class="form-control">
                                        <label class="active" for="form6">Firstname</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                      <div class="md-form">
                                        <input placeholder="<?php echo $rows[4];?>" type="text" id="form6" class="form-control">
                                        <label class="active" for="form6">Lastname</label>
                                    </div>
                                </div>
                                <div class="col-lg-12" style="margin-bottom: 5%;">
                                      <div class="md-form">
                                        <input placeholder="<?php echo $rows[6];?>" type="text" id="form6" class="form-control">
                                        <label class="active" for="form6">Address</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                      <div class="md-form">
                                        <textarea type="text" placeholder="<?php echo $rows[7];?>"  class="md-textarea"></textarea>
                                        <label class="active" for="form6">About me</label>
                                    </div>
                                </div>
                          </div>           
                    </div>
                  </div>
                </div>
                </div>
                <div class="col-lg-4" style="margin-top:-5%;">
                <div class="modal-dialog modal-sm cascading-modal modal-avatar" role="document">
                        <!--Content-->
                        <div class="modal-content"  style="width:120%;">

                            <!--Header-->
                            <div class="modal-header">
                                <img src="../../asset/img/admin/<?php echo $rows[8];?>" class="rounded-circle "  style="width: 100%;height: auto!important;">
                            </div>
                            <!--Body-->
                            <div class="modal-body text-center mb-1">
                                <h6 class="mt-1 mb-2" style="color:silver">ADMIN</h6>
                                <h5 class="mt-1 mb-2"><?php echo $rows[3];?> <?php echo $rows[4];?></h5>

                                <p>
                                <?php echo $rows[7];?>...
                                </p>
                                </div>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                    <?php
                        }
                    ?>
                    <!--/Modal: Avatar-->
                    </div>
                </div>
            </div><!--End Container-->
            </main>
    <!--/Profile Information-->
    <!--/Graphs Information-->
  <!--/DASHBOARD ANALYTICS-->
    <!-- SCRIPTS -->
    <script type="text/javascript" src="../../vendor/js/compiled.min.js"></script>
    <script>
    $(".button-collapse").sideNav();
    var el = document.querySelector('.custom-scrollbar');
    Ps.initialize(el);
    </script>
</body>
</html>
