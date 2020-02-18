<?php
session_start();
require "../../php/connection.php";
$id = $_GET['id'];
date_default_timezone_set('Asia/Manila');
 $date = date('m/d/Y');
if(isset($_SESSION['username']))
{
 ?>
   <?php
  if(isset($_POST['add_cart']))
  {
    if(isset($_SESSION['item_cart']))
    {
      $item_array_id = array_column($_SESSION['item_cart'], 'item_id');
      if(!in_array($_GET['id'], $item_array_id))
      {
        $count = count($_SESSION['item_cart']);
        $item_array = array(
          'item_id'  => $_GET['id'],
          'item_name'  => $_POST['name'],
          'item_price'  => $_POST['price'],
          'item_quantity'  => $_POST['quantity']
        );
        $_SESSION['item_cart'][$count] = $item_array;
        echo "<script>window.alert('Added Successfully')</script>";
      }
      else
      {
        echo "<script>window.alert('Item already added')</script>";
        echo "<script>window.location='validation.php'</script>";
      }
    }
    else
    {
      $item_array = array(
        'item_id'  => $_GET['id'],
        'item_name'  => $_POST['name'],
        'item_price'  => $_POST['price'],
        'item_quantity'  => $_POST['quantity']
      );
      $_SESSION['item_cart'][0] = $item_array;
    }
  }
  if(isset($_GET['action']))
  {
    if($_GET['action'] == 'delete')
    {
      foreach($_SESSION['item_cart'] as $keys => $values)
      {
        if($values['item_id'] == $_GET['id'])
        {
          unset($_SESSION['item_cart'][$keys]);
          echo "<script>window.alert('Remove Success')</script>";
          echo "<script>window.location='validation.php'</script>";
        }
      }
    }
  }
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
<!--Datepicker-->
<link href="../../../asset/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">
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
<body class="fixed-sn black-skin" style="background-color: whitesmoke">
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
                        <li class="breadcrumb-item"><a href="check_ongoing.php?id=<?php echo $id ?>" style="font-size: 15px;font-weight: 300"><i class="fa fa-user-o"></i> Guest</a></li>
                        <li class="breadcrumb-item active" style="font-size: 15px;font-weight: 300"><i class="fa fa-pencil-square-o"></i> Update</a></li>
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
                <li class="nav-item dropdown">
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
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM booking WHERE customer_no='$id'";
        $results = mysqli_query($db,$sql);
        if(mysqli_num_rows($results) > 0){
        while($rows = mysqli_fetch_array ($results))
        {
        ?>
        <main>
    <div class="container" style="margin-top:3%;">
      <div class="row" >
          </tr>
        <div class="col-lg-7">
          <div class="example z-depth-1" style="height:130%;background-color: white;border-radius: 3px">
            <h2 class="z-depth-1" style="background-color:#2ad1a3;position:relative;top:-30px;margin-left:35px;margin-right:35px;text-align:center;padding:20px;border-radius:5px;color:white"><i class="fa fa-hotel prefix"></i> Reservation Information</h2>
            <div style="padding-left:50px;" align="center">
            <form action="change_pending.php?id=<?php echo $rows[0] ?>" method="post">
              <div class="form-inline" style="margin-bottom: 5%">
                  <div class="md-form form-group">
                     <i class="fa fa-calendar-check-o prefix"></i>
                      <label for="total_cost" data-error="wrong" data-success="right">Check-in</label>
                     <input type="text" name="arrival" placeholder="Check-in" value="<?php echo $rows[7]; ?>"  class="datepicker form-control text-center" id="" disabled/>
                 </div>
                 <div class="md-form form-group">
                    <i class="fa fa-calendar-times-o prefix"></i>
                     <label for="total_cost" data-error="wrong" data-success="right">Check-out</label>
                    <input type="text" name="departure" placeholder="Check-out"  value="<?php echo $rows[8]; ?>" class="datepicker form-control text-center" id="" disabled/>
                </div>
              </div>
              <div class="form-inline">
                  <div class="md-form form-group">
                     <i class="fa fa-male prefix"></i>
                      <label for="total_cost" data-error="wrong" data-success="right">Adult</label>
                     <input type="text" name="adult" placeholder="Adult" value="<?php echo $rows[9]; ?>"  class="datepicker form-control text-center" id="adult" disabled/>
                 </div>
                 <div class="md-form form-group">
                    <i class="fa fa-child prefix"></i>
                     <label for="total_cost" data-error="wrong" data-success="right">Child</label>
                    <input type="text" name="child" placeholder="Child"  value="<?php echo $rows[10]; ?>" class="datepicker form-control text-center" id="child" disabled/>
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
                  }
                  ?>
                <tr>
                <td>Total Cost</td>
                <td>₱ <?php echo number_format(($rows[12]), 2); ?></td>
                </tr>
                  <tr>
                    <?php
                       if(!empty($_SESSION['item_cart']))
                       {
                        foreach ($_SESSION['item_cart'] as $keys => $values1)
                       {
                      ?>
                        <td align="center"><?php echo $values1['item_name']; ?></td>
                       <td align="center"><?php echo $values1['item_quantity']; ?></td>
                        <td align="center">₱<?php echo $values1['item_price']; ?></td>
                       <td align="center"><a href="validation.php?action=delete&id=<?php echo $values1['item_id']; ?>"><span class="text-primary">Remove</span></a></td>
                  </tr>
                  <?php
                  }
                  ?>
               <?php
                     $total1 = 0;
                      $total1 = $total1 + ($values1['item_quantity'] * $values1['item_price']);
                       }
                    ?>
              </table>
              </form>
          </div>
        </div>
      </div>

    <?php
    }
}
    ?>
    <div class="col-lg-5">
                  <div class="card-wrapper" style="width: 120%;height: 130%;margin-top:0px;border-radius: 3px">
                        <div id="card-1" class="card-rotating effect__click">
                            <div class="face front" style="padding: 20px">
                                <div class="card-block">
                                    <h4 class="z-depth-1" style="background-color:#2ad1a3;position:relative;top:-70px;margin-left:35px;margin-right:35px;padding:20px;border-radius:5px;color:white"><i class="fa fa-calendar prefix"></i> Extend Check-in </h4>
                                              <?php
                                                $id = $_GET['id'];
                                                $sql = "SELECT * FROM booking WHERE customer_no='$id'";
                                                $results = mysqli_query($db,$sql);
                                                if(mysqli_num_rows($results) > 0){
                                                while($rows = mysqli_fetch_array ($results))
                                                {
                                                ?>
                                    <form action="verify_admin.php?id=<?php echo $rows[0]; ?>" method="post" id="extend" onmouseout="counted(this);">
                                       <div class="row form-inline">
                                            <div class="col-lg-6 ">
                                                  <div class="md-form ">
                                                     <i class="fa fa-calendar-check-o prefix"></i>
                                                     <input type="text" name="arrival" placeholder="Check-in" value="<?php echo $rows[8]; ?>"  class="datepicker form-control text-center" id="arrival" required/>
                                                        <label for="arrival" data-error="wrong" data-success="right">Current Checkout</label>
                                                 </div>
                                                 </div>
                                                 <div class="col-lg-6">
                                                 <div class="md-form ">
                                                    <i class="fa fa-calendar-times-o prefix"></i>
                                                    <input type="text" name="departure" placeholder="Date" value="" class="datepicker form-control text-center" id="departure" required/>
                                                    <label for="departure" data-error="wrong" data-success="right">Extend Check-in</label>
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                  <div class="md-form">
                                                     <i class="fa fa-calendar-plus-o prefix"></i>
                                                     <input type="text" id="days_counted"  placeholder="Date" value=""  class="form-control text-center" disabled />
                                                     <label for="days_counted" data-error="wrong" data-success="right">Days-Extend</label>
                                                 </div>
                                                 </div>
                                                 <div class="col-lg-6">
                                                 <div class="md-form ">
                                                    <i class="fa prefix">₱</i>
                                                    <input type="text"  id="total_cost" placeholder="₱ 0.00"  value="" class="form-control text-center" disabled />
                                                    <label for="total_cost"  data-error="wrong" data-success="right">Total-Cost</label>
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                 <div class="md-form ">
                                                    <i class="fa prefix">₱</i>
                                                    <input type="text" id="balance" placeholder="0"  value="" class="form-control text-center"  />
                                                    <label for="" data-success="right">Payment</label>
                                                </div>
                                                </div>
                                              </div>
                                              <input type="hidden" id="sub_total" value="<?php echo $rows[13] ?>">
                                              <input type="hidden" id="before_total" value="<?php echo $rows[12] ?>" />
                                              <input type="hidden" id="total_cost_update" name="balance_update" />
                                              <input type="hidden" id="total_price" name="update_total" />
                                          <?php
                                             }
                                           }
                                          ?>
                                              <div  align="center" style="margin-top: 1%">
                                                      <button type="button" data-toggle="modal" data-target="#password" class="btn" style="background-color:#2ad1a3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</button>
                                            </div>
                           <!--Triggering button-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!-- Modal -->
<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <!--Modal: Avatar-->
                    <div class="modal-dialog modal-sm cascading-modal modal-avatar" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <?php
                                                $id = $_GET['id'];
                                                $sql = "SELECT * FROM admin WHERE username='".$_SESSION['username']."' ";
                                                $results = mysqli_query($db,$sql);
                                                if(mysqli_num_rows($results) > 0){
                                                while($rows = mysqli_fetch_array ($results))
                                                {
                                                ?>
                            <!--Header-->
                            <div class="modal-header">
                                <img src="../../../asset/img/admin/<?php echo $rows[8];?>" class="rounded-circle" style="width:100%;height: auto!important">
                            </div>
                            <!--Body-->
                            <div class="modal-body text-center mb-1">

                                <h5 class="mt-1 mb-2"><?php echo $rows[1];?></h5>

                                <div class="md-form ml-0 mr-0">
                                    <input name="password" type="password" type="text" id="form18" class="form-control ml-0">
                                    <label for="form18" class="ml-0">Enter password</label>
                                </div>

                                <div class="text-center">
                                    <button name="submit"  type="submit" class="btn mt-1" style="background-color: #2ad1a3">Login <i class="fa fa-sign-in ml-1"></i></button>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <!--/.Content-->
                    </div>
                    <!--/Modal: Avatar-->
                    <?php
                    }
                  }
                    ?>
</div>
<!-- Modal -->

            </div>
          </div><!--End Container-->
          </main>
<!--/Ongoing page-->
    <!-- SCRIPTS -->
    <script type="text/javascript" src="../../../vendor/js/compiled.min.js"></script> 
    <script type="text/javascript" src="../../../vendor/js/bootstrap-datepicker.js"></script>
    <!--Date Manipulate-->
    <script type="text/javascript" src="../../../vendor/js/extend.js"> </script>
    <!--Datepicker option -->
    <script>
    $(".button-collapse").sideNav();
    var el = document.querySelector('.custom-scrollbar');
    Ps.initialize(el);
    </script>
        <script type="text/javascript">
    if(!this.form.checkbox.checked)
    {
    alert('You must agree to the terms first.');
    return false;
    }
    </script>
    <script>
      $("[type='number']").keypress(function (evt) {
    evt.preventDefault();
});
    </script>
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
</body>
</html>
<?php
}
else
{
  header("location:login.php");
}
?>