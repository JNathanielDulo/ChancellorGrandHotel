
<?php
session_start();
require "../../php/connection.php";
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
<body style="background-color: whitesmoke" class="fixed-sn black-skin">
   <header>
        <ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar ">
            <li>
                <div class="logo-wrapper waves-effect" >
                    <a href="#"><img src="../../../asset/img/hotel/logoreal2.png" class="img-fluid flex-center"></a>
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
                        <li class="breadcrumb-item"><a href="../inbox.php" style="font-size: 15px;font-weight: 300"><i class="fa fa-inbox"></i> Inbox</a></li>
                        <li class="breadcrumb-item" style="font-size: 15px;font-weight: 300"><i class="fa fa-view"></i> View</a></li>
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
<!-- Notification -->
<!-- /.Navbar -->
<!--Ongoing page-->
    <div class="container" style="margin-top:7%;">
    <div>
      <a href="../inbox.php"><button class="btn" style="background: #2ad1a3;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
    </div>
        <div class="table-responsive margin-small-top">
          <div class="card-table">
            <div class="card-table-content">
                  <?php
                      $id = $_GET['id'];
                      $sql = "SELECT * FROM inbox WHERE id= '$id'";
                      $results = mysqli_query($db, $sql);
                      while($rows = mysqli_fetch_array($results))
                      {
                  ?>
            <h4 class="text-left"><?php echo $rows[3]?></h4>
              <h6 class="text-left"><?php echo $rows[1]?> <small><a href="">(<?php echo $rows[2]?>)</a></small></h6>
              <div style="background-color: #ddd;padding: 3%;border-radius: 2px;">
                    <h4 class="text-left">Message</h4>
                      <p style="padding-left: 10%" class="text-left"><?php echo $rows[4]?></p>
                      </div>
                    <form action="send_reply.php?id=<?php echo $rows[0]; ?>" method="post">
                    <div style="margin-top: 2%">
                       <div class="md-form">
                       <input type="hidden" name="subject" value="<?php echo $rows[3]?>">
                       <input type="hidden" name="name" value="<?php echo $rows[1]?>">
                       <input type="hidden" name="email" value="<?php echo $rows[2]?>">
                       <input type="hidden" name="message" value="<?php echo $rows[4]?>">
                      <textarea type="text" id="form76" class="md-textarea"></textarea>
                      <label for="form76">Seorabeol Grand Leisure Hotel</label>
                      </div>
                      <div class="text-right">
                      <button type="submit" name="submit" class="btn" style="background-color:#2ad1a3">Reply <i class="fa fa-reply" aria-hidden="true"></i></button>
                      </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>

          </div>

<!--/Ongoing page-->
    <!-- SCRIPTS -->
    <script type="text/javascript" src="../../../vendor/js/compiled.min.js"></script>.
    <script type="text/javascript" src="../../../vendor/js/chart.min.js"></script>
    <script type="text/javascript" src="graph/profit_chart.js"></script>

    <script type="text/javascript">
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"../fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('#notifcation_menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>
    <script>
    $(".button-collapse").sideNav();
    var el = document.querySelector('.custom-scrollbar');
    Ps.initialize(el);
    </script>
</body>
</html>
