<?php
session_start();
require "../php/connection.php";
require "php/long_time_ago.php";
$id = $_GET['id'];
date_default_timezone_set('Asia/Manila');
 $date = date('m/d/Y');

if(isset($_SESSION['username']))
{
 ?>
<!DOCTYPE html>
<html lang="en">
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
}

@media only screen and (max-width : 992px) {
  header, main, footer {
    padding-left: 0;
  }
}
</style>
<?php 
if(isset($id))
{
?>
<body class="fixed-sn black-skin" onload="toastr.success('Successfully Added!');" style="background-color: whitesmoke">
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
        <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-xs-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
                <div class="mr-auto">
                <ol class="header-breadcrumb breadcrumb fp-header-breadcrumb hidden-md-down">
                        <li class="breadcrumb-item"><a href="ongoing.php" style="font-size: 15px;font-weight: 300"><i class="fa fa-calendar-check-o"></i> Ongoing</a></li>
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
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Profile</a>
                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                       <a class="dropdown-item" href="profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Account</a>
                       <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log-out</a>
                   </div>
               </li>
            </ul>
        </nav>
<!-- /.Navbar -->
<!--Ongoing page-->
<main>
    <div class="container">
        <div class="table-responsive margin-small-top">
          <div class="card-table">
            <div class="card-table-content">
            <div style="position:relative;top:-50px;left: -43%;">
          <button type="button" class="btn btn-tw" style="width: 13%;height: 80px;padding-left: 3%;background-color: #2ad1a3"><i class="fa fa-calendar-check-o" aria-hidden="true" style="font-size: 40px"></i></button>
          </div>
          <div class="float-xs-left" style="margin-left:3%;margin-top:-3%;text-align: left">
            <h3>Ongoing</h3>
            <p style="color:grey">Proccessing of the Booking</p>
          </div>
              <table class="table table-hover table-pending table-striped" style="margin-top:3%">
                <thead>
                    <tr class="table-header">
                              <th style="color:#2b2b2b;font-weight: 400">Reserved</th>
                              <th style="color:#2b2b2b;font-weight: 400">Custome_No</th>
                              <th style="color:#2b2b2b;font-weight: 400">Custome_Name</th>
                              <th style="color:#2b2b2b;font-weight: 400">Status</th>
                              <th style="color:#2b2b2b;font-weight: 400">Remarks</th>
                              <th style="color:#2b2b2b;font-weight: 400">Action</th>
                            </tr>
                  </thead>
                  <tbody align="center" class="" >
                  <?php
                  if(isset($id))
                          {
                         $sql1 = "SELECT * FROM booking WHERE  customer_no = '$id' AND status ='approved' AND departure_date >= '".$date."' ORDER BY customer_no DESC LIMIT 1" ;
                        $results1 = mysqli_query($db,$sql1);
                        while($rows1 = mysqli_fetch_array ($results1)){
                          ?>
                        <tr class="fadeInLeft animated">
                          <td style="font-weight: 300"><?php echo facebook_time_ago($rows1[15]);?></td>
                          <td style="font-weight: 300"><?php echo $rows1[0];?></td>
                          <td style="font-weight: 300"><?php echo $rows1[1];?> <?php echo $rows1[2]; ?></td>
                          <td style="font-weight: 300"><?php echo $rows1[11]; ?></td>
                          <td style="font-weight: 300">Paid </td>
                          <td><a href="php/check_ongoing.php?id=<?php echo $rows1[0]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#2ad1a3;"></i></a></td>
                        </tr>
                          <?php
                          }
                        }
                          ?>
                        <?php
                         $sql = "SELECT * FROM booking WHERE NOT customer_no = '$id' AND status ='approved' AND departure_date >= '".$date."' ORDER BY customer_no DESC";
                        $results = mysqli_query($db,$sql);
                        if(mysqli_num_rows($results) > 0){
                        while($rows = mysqli_fetch_array ($results)){
                        ?>
                        <tr >
                          <td style="font-weight: 300"><?php echo facebook_time_ago($rows[15]);?></td>
                          <td style="font-weight: 300"><?php echo $rows[0];?></td>
                          <td style="font-weight: 300"><?php echo $rows[1];?> <?php echo $rows[2]; ?></td>
                          <td style="font-weight: 300"><?php echo $rows[11]; ?></td>
                          <td style="font-weight: 300">Paid </td>
                          <td><a href="php/check_ongoing.php?id=<?php echo $rows[0]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#2ad1a3;"></i></a></td>
                        </tr>
                        <?php
                        }
                        }
                        else
                        {
                        echo "<td colspan='6'>No Pending</td>";
                        }
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <hr style="margin-top: 10%">
    </div><!--End Container-->
    </main>
<!--/Ongoing page-->
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