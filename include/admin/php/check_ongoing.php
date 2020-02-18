<?php
session_start();
require "../../php/connection.php";
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
    <link href="../../../asset/css/compiled.min.css" rel="stylesheet" type="text/css">
    <!-- External CSS -->
    <link href="../admin-style.css" rel="stylesheet" type="text/css">
</head>
<style>
.sn-bg-1 {
  background: url(../../../asset/img/hotel/frontdesk.jpg) no-repeat; 
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
$success = $_GET['remarks'];
if(isset($success))
{
?>
<body class="fixed-sn black-skin" onload="toastr.success('Successfully Update!');" style="background-color: whitesmoke">
<?php
}
?>
<body class="fixed-sn black-skin" style="background-color: whitesmoke;">
         <header>
        <ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar ">
            <li>
                <div class="logo-wrapper waves-effect" >
                    <a href="#"><img src="../../../asset/img/hotel/logoreal2.png" class="img-fluid flex-center"></a>
                </div>
            </li>
            <li style="margin-top:10px;">
                <ul class="collapsible collapsible-accordion">
                    <li><a href="../dashboard.php" class="waves-effect arrow-r"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <?php
                     $sql = "SELECT COUNT(id) AS id FROM inbox";
                     $results = mysqli_query($db,$sql);
                     while ($rows = mysqli_fetch_array($results)) {
                      ?>
                    <li><a href="../inbox.php" class="waves-effect arrow-r"><i class="fa fa-inbox"></i> Inbox <span class="badge red" style="border-radius:10px"><?php echo $rows[0] ?></span></i></a></li>
                    <?php
                      }
                    ?>
                    <hr style="width:85%;background-color:#ddd">
                    <li><a href="../checkin.php" class="waves-effect arrow-r"><i class="fa fa-calendar-plus-o"></i> Check-in</a></li>
                    <?php
                     $sql = "SELECT COUNT(customer_no) AS customer_id FROM booking WHERE   status ='pending'";
                     $results = mysqli_query($db,$sql);
                     while ($rows = mysqli_fetch_array($results)) {
                      ?>
                    <li><a href="../pending.php" class="waves-effect arrow-r"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Pending <span class="badge red" style="border-radius:10px"><?php echo $rows[0] ?></span></a></li>    
                    <?php 
                    }
                    ?>  
                    <?php
                     $sql = "SELECT COUNT(customer_no) AS customer_id FROM booking WHERE   status ='approved' AND departure_date >= '".$date."' ";
                     $results = mysqli_query($db,$sql);
                     while ($rows = mysqli_fetch_array($results)) {
                      ?>
                     <li><a href="../ongoing.php" class="waves-effect"><i class="fa fa-calendar-check-o"></i> Ongoing <span class="badge red" style="border-radius:10px"><?php echo $rows[0] ?></span></a></li>
                     <?php
                      }
                      ?>
                      <?php                   
                     $sql1 = "SELECT COUNT(customer_no) AS customer_id FROM booking WHERE  status ='approved' AND departure_date <= '".$date."' ";
                     $results1 = mysqli_query($db,$sql1);
                     while ($rows1 = mysqli_fetch_array($results1)) {
                      ?>
                    <li><a href="../outgoing.php" class="waves-effect"><i class="fa fa-calendar-times-o"></i> Outgoing <span class="badge red" style="border-radius:10px"><?php echo $rows1[0] ?></span></a></li>
                    <?php
                    }
                    ?>
                    <hr style="width:85%;background-color:#ddd">
                    <li><a href="../rooms.php" class="waves-effect arrow-r"><i class="fa fa-hotel"></i> Rooms</a></li>
                    <li><a href="../reports.php" class="waves-effect arrow-r"><i class="fa fa-flag"></i> Reports</a></li>
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
                        <li class="breadcrumb-item"><a href="../ongoing.php" style="font-size: 15px;font-weight: 300"><i class="fa fa-calendar-check-o"></i> Ongoing</a></li>
                        <li class="breadcrumb-item active" style="font-size: 15px;font-weight: 300"><i class="fa fa-user-o"></i> Guest</a></li>
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
                            </div></li>  <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Profile</a>
                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                       <a class="dropdown-item" href="../profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Account</a>
                       <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log-out</a>
                   </div>
               </li>
            </ul>
        </nav>
<!-- /.Navbar -->
<!--Ongoing page-->
<main>
    <div class="container" style="margin-top:3%">
      <div class="row">
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM booking WHERE customer_no='$id'";
        $results = mysqli_query($db,$sql);
        if(mysqli_num_rows($results) > 0){
        while($rows = mysqli_fetch_array ($results))
        {
        ?>                      
        <div class="col-lg-7" >
          <div class="example z-depth-1" style="height:102%;background-color: white">
            <h2 class="z-depth-1" style="background-color:#2ad1a3;position:relative;top:-30px;margin-left:35px;margin-right:35px;text-align:center;padding:20px;border-radius:5px;color:white"><i class="fa fa-hotel prefix"></i> Reservation Information </h2>
            <div style="padding-left:50px;" align="center">
              <div class="form-inline">
                  <div class="md-form form-group">
                     <i class="fa fa-calendar-check-o prefix"></i>
                     <input type="text" name="arrival" placeholder="Check-in" value="<?php echo $rows[7]; ?>"  class="datepicker form-control text-center" id="arrival" disabled/>
                 </div>
                 <div class="md-form form-group">
                    <i class="fa fa-calendar-times-o prefix"></i>
                    <input type="text" name="departure" placeholder="Check-out"  value="<?php echo $rows[8]; ?>" class="datepicker form-control text-center" id="departure" disabled/>
                </div>
              </div>
              <div class="form-inline">
                  <div class="md-form form-group">
                     <i class="fa fa-male prefix"></i>
                     <input type="text" name="arrival" placeholder="Adult" value="<?php echo $rows[9]; ?>"  class="datepicker form-control text-center" id="arrival" disabled/>
                 </div>
                 <div class="md-form form-group">
                    <i class="fa fa-child prefix"></i>
                    <input type="text" name="departure" placeholder="Child"  value="<?php echo $rows[10]; ?>" class="datepicker form-control text-center" id="departure" disabled/>
                </div>
              </div>
            </div>
            <div style="padding-left:20px;padding-right:25px;">
              <br>
              <h4 class="text-center" style="color:#2ad1a3">Room Accomodate</h4>
              <table class="table table-bordered text-center">
                  <?php
                  $id = $_GET['id'];
                  $sql = "SELECT * FROM transaction WHERE customer_no='$id'";
                  $results = mysqli_query($db,$sql);
                  while($rows1 = mysqli_fetch_array ($results))
                  {
                  ?>
                  <tr>
                  <td><?php echo $rows1[2];?></td>
                  <td><?php echo $rows1[3];?></td>
                </tr>
                  <?php
                  }
                   ?>
                  <?php
                  $id = $_GET['id'];
                  $sql = "SELECT * FROM item_transaction WHERE customer_no='$id'";
                  if($results = mysqli_query($db,$sql))
                  {
                  while($rows1 = mysqli_fetch_array ($results))
                  {
                  ?>
                  <tr>
                  <td><?php echo $rows1[2];?></td>
                  <td><?php echo $rows1[3];?></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                  <td>Total Cost: </td>
                  <td> ₱<?php echo number_format(($rows[12]), 2); ?></td>
                </tr>
                  <?php
  
                 }
                   ?>
              </table>
              <div  align="right">
              <a href="update_ongoing.php?id=<?php echo $rows[0]; ?>"><button class="btn" style="background-color:#2ad1a3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</button></a>
              <a href="../checkout.php?id=<?php echo $rows[0];?>"><button class="btn" type="button" style="background-color:#2ad1a3"><i class="fa fa-calendar-times-o" aria-hidden="true"></i> Checkout</button></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="example z-depth-1" style="width:120%;height:102%;background-color: white;border-radius: 3px">
          <h2 class="z-depth-1" style="background-color:#2ad1a3;position:relative;top:-30px;margin-left:35px;margin-right:35px;text-align:center;padding:20px;border-radius:5px;color:white"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Guest Information </h2>
          <div style="padding-left:20px;padding-right:20px;">
            <div class="row">
              <div class="col-lg-6">
                  <div class="md-form">
                     <i class="fa fa-hashtag prefix"></i>
                    <input placeholder="Placeholder" value="<?php echo $rows[0] ?>" type="text"  class="form-control text-center" disabled>
                </div>
                </div>
              <div class="col-lg-6">
                  <div class="md-form">
                     <i class="fa fa-user prefix"></i>
                    <input placeholder="Type of Customer" value="<?php echo $rows[17] ?>" type="text"  class="form-control text-center" disabled>
                </div>
                </div>
              <div class="col-lg-6">
                  <div class="md-form">
                     <i class="fa fa-user prefix"></i>
                    <input placeholder="Placeholder" value="<?php echo $rows[1]; ?>" type="text"  class="form-control text-center" disabled>
                </div>
                </div>
                <div class="col-lg-6">
                  <div class="md-form">
                    <i class="fa fa-user prefix"></i>
                    <input placeholder="Placeholder" value="<?php echo $rows[2]; ?>" type="text"  class="form-control text-center" disabled>
                </div>
                </div>
                <div class="col-lg-12">
                  <div class="md-form">
                    <i class="fa fa-map-marker prefix"></i>
                    <input placeholder="Placeholder" id="location" value="<?php echo $rows[3]; ?>" type="text"  class="form-control text-center" disabled>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="md-form">
                  <i class="fa fa-mobile prefix"></i>
                  <input placeholder="Placeholder" value="<?php echo $rows[4]; ?>" type="text"  class="form-control text-center" disabled>
              </div>
              </div>
              <div class="col-lg-6">
              <div class="md-form">
                <i class="fa fa-phone prefix"></i>
                <input placeholder="Placeholder" value="<?php echo $rows[5]; ?>" type="text"  class="form-control text-center" disabled>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="md-form">
              <i class="fa fa-envelope prefix"></i>
              <input placeholder="Placeholder" value="<?php echo $rows[6]; ?>" type="text" class="form-control text-center" disabled>
            </div>
            </div>
          </div>
          </div>
        </div>
    </div>
    </div>
<?php
}
}
?>
  </div><!--End Container-->
  </main>
<!--/Ongoing page-->
    <!-- SCRIPTS -->
    <script type="text/javascript" src="../../../vendor/js/compiled.min.js"></script>.
    <script type="text/javascript" src="../../../vendor/js/chart.min.js"></script>
    <script type="text/javascript" src="graph/profit_chart.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
    $('.mdb-select').material_select();
  });
    </script>
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