<?php
session_start();
require "../php/connection.php";
require "php/long_time_ago.php";
date_default_timezone_set('Asia/Manila');
 $date = date('m/d/Y');
if(isset($_SESSION['username']))
{
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../asset/img/hotel/icon.png" />
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
<?php 
$get_admin = $_GET['get'];
if(isset($get_admin))
{
?>
<body class="fixed-sn black-skin" onload="toastr.success('Hello! I <?php echo $_SESSION['name']; ?> Welcome Back!');" style="background-color: whitesmoke">
<?php
}
?>
<body class="fixed-sn black-skin" style="background-color: whitesmoke">
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
                     $sql1 = "SELECT COUNT(customer_no) AS customer_id FROM booking WHERE  status ='approved'  ";
                     $results1 = mysqli_query($db,$sql1);
                     while ($rows1 = mysqli_fetch_array($results1)) {
                      ?>
                    <li><a href="transaction.php" class="waves-effect"><i class="fa fa-calendar-check-o"></i> Transaction <span class="badge red" style="border-radius:10px"><?php echo $rows1[0] ?></span></a></li>
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
                        <li class="breadcrumb-item"><a href="pending.php" style="font-size: 15px;font-weight: 300"><i class="fa fa-hotel"></i> Rooms</a></li>
                 </ol>
            </div>
            <ul class="nav navbar-nav ml-auto flex-row">
            <li class="nav-item dropdown">
                   <a class="nav-link"><span class="badge red" style="border-radius: 10px;">1</span><i class="fa fa-inbox"></i> Inbox</a>  </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge red count" style="border-radius: 10px;"></span><i class="fa fa-bell"></i> <span class="hidden-sm-down">Notifcation</span></a>
                            <div class="dropdown-menu dropdown-menu-right" id="notifcation_menu">
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
  <!--Cards Information-->  
  <main>
      <div class="container" style="margin-top: -5%;margin-bottom: 5%">
      <div class="row">
        <?php
          $sql = "SELECT * FROM accomodation";
          $result = mysqli_query($db, $sql);
          if(mysqli_num_rows($result) > 0)
         {
          while ($rows = mysqli_fetch_array($result))
          {
            if($rows[7] < 0)
            {
         ?>


         <?php
       }
       else 
       {
         ?>
        <div class="col-lg-6" style="margin-top:30px;">
          <div class="card ovf-hidden" style="width:100%;border-top:2px solid #2ad1a3;">
              <div class="view overlay hm-white-slight">
                  <img src="../../asset/img/hotel/<?php echo $rows[2]; ?>" class="img-fluid" alt="">
                  <a><div class="mask waves-effect waves-light"></div></a>
              </div>
              <div class="card-block">
                  <button class="btn activator" style="background-color:#2ad1a3;border-radius:50px;width:9%;height:50px;padding:1%;"><i class="fa fa-hotel"></i></button>
                  <!--Title-->
                  <h4 class="card-title"><?php echo $rows[1]; ?></h4>
                  <!--Text-->
                  <hr>
                  <ul style="font-weight:400;text-align:center;">
                    <li class="card-text" style="font-size:20px;"><small style="color:#2ad1a3;font-size:20px;"><?php echo $rows[5]; ?></small> adult and <small style="color:#2ad1a3;;font-size:20px;"><?php echo $rows[6]; ?></small> child </li>
                    <li class="card-text" style="font-size:20px;">Room Slot <small style="color:#2ad1a3;font-size:20px;"><?php echo $rows[7]; ?></small></li>
                    <li class="card-text" style="font-size:20px;"><small style="color:#2ad1a3;;font-size:20px;">₱<?php echo $rows[3]; ?></small>/night</li>
                  <hr>
                    <li class="card-text"><?php echo $rows[4]; ?></li>
              </div>
          </div>
        </div>
        <?php
          }
        }
      }
        ?><div class="" style="position:fixed;top: 590px; left: 92%;" >
    <button class="btn btn-lg green" href="#" type="button" data-toggle="modal" data-target="#basicExample">
       <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="basicExample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Add Rooms</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                  <div class="row" style="padding: 5%">
                  <div class="col-lg-12">
                        <div class="file-field">
                          <div class="btn btn-primary btn-sm">
                              <span>Choose file</span>
                              <input type="file">
                          </div>
                          <div class="file-path-wrapper">
                             <input class="file-path validate" type="text" placeholder="Upload Image">
                          </div>
                      </div>
                  </div>
                      <div class="col-lg-6">
                        <div class="md-form form-sm">
                              <input type="text" id="form1" class="form-control">
                              <label for="form1" class="">Example label</label>
                          </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="md-form form-sm">
                              <input type="text" id="form1" class="form-control">
                              <label for="form1" class="">Example label</label>
                          </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="md-form form-sm">
                              <input type="text" id="form1" class="form-control">
                              <label for="form1" class="">Example label</label>
                          </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="md-form form-sm">
                              <input type="text" id="form1" class="form-control">
                              <label for="form1" class="">Example label</label>
                          </div>
                      </div>
                  </div>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Add</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal -->

      </div>
       </div>
</main>
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
<?php
}
else
{
  header("location:login.php");
}
?>