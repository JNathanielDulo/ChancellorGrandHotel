<?php
session_start();
require "../php/connection.php";
$id = $_GET['id'];
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
                        <li class="breadcrumb-item"><a href="ongoing.php" style="font-size: 15px;font-weight: 300"><i class="fa fa-calendar-check-o"></i> Ongoing</a></li>
                        <li class="breadcrumb-item active"><a href="php/check_ongoing.php?id=<?php echo $id ?>" style="font-size: 15px;font-weight: 300"><i class="fa fa-user-o"></i> Guest</a></li>
                        <li class="breadcrumb-item active" style="font-size: 15px;font-weight: 300"><i class="fa fa-calendar-times-o"></i> Checkout</a></li>
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
                       <a class="dropdown-item" href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Account</a>
                       <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log-out</a>
                   </div>
               </li>
            </ul>
        </nav>
    <main>
    <div class="container">
    <form action="php/add_reports.php" method="post" id="penalty" onmouseout="setPenalty()">
        <div class="row">
             <div class="col-lg-8" style="margin-left: -5%;margin-right:3%">
              <div class="table-responsive margin-small-top" style="width:107%;height: auto">
                <div class="card-table">
                  <div class="card-table-content" style="padding:30px">
                    <h3 class="table-float" style="background-color:#2ad1a3;color:white">Guest Info <i class="fa fa-user-circle-o" aria-hidden="true"></i></h3>
                          <div class="row">
                                <?php
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM booking WHERE customer_no='$id'";
                                    $results = mysqli_query($db,$sql);
                                    if(mysqli_num_rows($results) > 0){
                                    while($rows = mysqli_fetch_array ($results))
                                    {
                                    ?>
                                <div class="col-lg-4" style="margin-bottom: 5%;">
                                      <div class="md-form">
                                        <input name="customer_no" value="<?php echo $rows[0] ?>" type="text" id="form6" class="form-control text-center"  >
                                        <label class="active" for="form6">Customer no</label>
                                    </div>
                                </div>
                                 <div class="col-lg-4">
                                      <div class="md-form">
                                        <input name="fname" value="<?php echo $rows[1] ?>" type="text" id="form6" class="form-control text-center" >
                                        <label class="active" for="form6">Firstname</label>
                                    </div>
                                </div>
                                   <div class="col-lg-4">
                                      <div class="md-form">
                                        <input name="lname" value="<?php echo $rows[2] ?>" type="text" id="form6" class="form-control text-center" >
                                        <label class="active" for="form6">Lastname</label>
                                    </div>
                                </div>
                                <div class="col-lg-12" style="margin-bottom: 5%;">
                                      <div class="md-form">
                                        <input name="address" value="<?php echo $rows[3] ?>" type="text" id="form6" class="form-control text-center" >
                                        <label class="active" for="form6">Address</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                      <div class="md-form">
                                        <input name="contact" value="<?php echo $rows[4] ?>" type="text" id="form6" class="form-control text-center" >
                                        <label class="active" for="form6">Contact</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                      <div class="md-form">
                                        <input name="landline" value="<?php echo $rows[5] ?>" type="text" id="form6" class="form-control text-center" >
                                        <label class="active" for="form6">Landline</label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                      <div class="md-form">
                                        <input name="email" value="<?php echo $rows[6] ?>" type="text" id="form6" class="form-control text-center" >
                                        <label class="active" for="form6">Email</label>
                                    </div>
                                </div>
                          </div>           
                    </div>
                  </div>
                </div>
                </div>

            <div class="col-lg-4" style="">
              <div class="table-responsive margin-small-top" style="width:120%;height: auto">
                <div class="card-table">
                  <div class="card-table-content" style="padding:30px">
                    <h3 class="table-float" style="background-color:#2ad1a3;color:white">Damaged Item <i class="fa fa-chain-broken" aria-hidden="true"></i></h3>
                    <div class="row" style="margin-top:-20px">
                        <div class="col-lg-12">
                              <table class="table table-bordered">
                              <tr>
                                  <th style="text-align: center;font-weight: 400; padding:1;">Item</th>
                                  <th style="text-align: center;font-weight: 400; padding:1;">Cost</th>
                              </tr>
                              <?php
                                    $sql1 = "SELECT * FROM damage_item";
                                    $results1 = mysqli_query($db,$sql1);
                                    while($item = mysqli_fetch_array ($results1))
                                    {
                              ?>                              
                              <tr>
                                    <td style="padding:1;">
                                        <fieldset onchange="damage()" class="form-group text-left check">
                                        <input  type="checkbox" class="filled-in item_damage" id="check<?php echo $item[0]; ?>" value="<?php echo $item[2] ?>" />
                                        <label style="font-size: 15px;" for="check<?php echo $item[0]; ?>"><?php echo $item[1] ?></label>
                                    </fieldset>
                                    </td>
                                    <td style="font-size: 15px;">₱ <?php echo number_format($item[2],2); ?></td>
                              </tr>
                              <?php
                                }
                              ?>
                              <tr>
                                  <td>Total Damage:</td>
                                  <td id="total_damage">₱ 0.00</td>
                              </tr>
                              </table>
                              </div>
                    </div>
                  </div>
                </div>
                </div>
                </div>
            <div class="col-lg-6" style="margin-top: 3.2%;margin-left: -5%;margin-bottom: 5%">
              <div class="table-responsive margin-small-top " style="width:105%">
                <div class="card-table ">
                  <div class="card-table-content" style="padding:30px">
                    <h3 class="table-float" style="background-color:#2ad1a3;color:white">Payment <i class="fa fa-money" aria-hidden="true"></i></h3>
                <div class="row">
                                <div class="col-lg-6">
                                      <div class="md-form">
                                        <input name="arrival" value="<?php echo $rows[7] ?>" type="text" id="form6" class="form-control text-center" >
                                        <label class="active" for="form6">Check-in</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                      <div class="md-form">
                                        <input name="departure"  value="<?php echo $rows[8] ?>" type="text" id="departure" class="form-control text-center" >
                                        <label class="active" id="label_departure" for="departure">Check-out</label>
                                    </div>
                                    <input type="hidden" value=""  id="overtime" class="form-control text-center" disabled/>
                                    <input type="hidden" id="days_counted" value="" disabled>
                                    <input type="hidden" id="days_penalty" value="<?php echo $rows[13] ?>"  >
                                    <input type="hidden" id="total_penalty" value="" />
                                </div>
                <div class="col-lg-12">
                <table class="table table-bordered text-center" style="margin-bottom: 9%">
                <tbody>
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
                      <td>Adult</td>
                      <td><?php echo $rows[9] ?></td>
                  </tr>
                  <tr>
                      <td>Child</td>
                      <td><?php echo $rows[10] ?></td>
                  </tr>
                  <tr>
                      <td>Penalty</td>
                      <td id="view_penalty"></td>
                  </tr>
                              <tr>
                                  <td>Damage Item</td>
                                  <td style="padding-left:10%">
                                    <ul class="list-square" id="damages">
                                    </ul>
                                  </td>
                              </tr>
                <tr>
                <td>Total Cost:</td>
                <td id="costing">₱ <?php echo number_format(($rows[12]), 2); ?></td>
                <input type="hidden" name="total_cost" value="<?php echo $rows[12]; ?>" id="costing_value" /> 
                </tr>
                </tbody>
              </table>
              </div>
                                <div class="col-lg-6">
                                      <div class="md-form">
                                        <input placeholder="₱  <?php echo number_format($rows[14],2); ?>" type="text" id="old_balance" class="form-control text-center" disabled>
                                        <label class="active" for="form6">Balance</label>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                      <div class="md-form">
                                        <input placeholder="0" onchange="pay_balance()" type="text" id="payment" class="form-control text-center">
                                        <label class="active" for="payment" id="label_payment">Payment</label>
                                    </div>
                                </div>
                                <div class="co-lg-12">
                                    <button type="submit" name="report" class="btn" style="background-color:#2ad1a3 "><i class="fa fa-calendar-times-o" aria-hidden="true"></i> Checkout</button>
                                   </div>
                      </div>
                      <input type="hidden"  value=" <?php echo $rows[14]; ?>" id="balance" />
                      <input type="hidden" value="<?php echo $rows[12] ?>" id ="old_cost">
                      <input type="hidden" value="0" id="damage_payment">
                      <input type="hidden" value="<?php echo $rows[14]; ?>" id="total_balance" >
                      <input type="hidden" value="0" id="official_pay" >
                      <input type="hidden" value="0" id="qwe" >
                    </div>
                  </div>
                </div>
                </div>
                <div class="col-lg-6" style="margin-top: 5%;margin-left: 5%;margin-bottom:5%;font-family: Merchant Copy">
                        <div class="example z-depth-1" style="background-color: white;height: 100%">
                            <div style="padding:20px;">
                    <h3 class="table-float" style="background-color:#2ad1a3;color:white;font-family: roboto" align="center">Payment <i class="fa fa-money" aria-hidden="true"></i></h3>
                                  <div class="example z-depth-0" id="elem">
                                      <table  class=""  align="center" style="font-family: Merchant Copy">
                                        <h4 align="center">Seorabeol Grand Leisure Hotel</h4>
                                          <thead style="border: 1px dashed black" align="center">
                                              <th style="font-size: 20px;padding:2%;text-align: center">Room Accomodate</th>
                                              <th style="font-size: 20px;padding:2%;text-align: center">Quantity</th>
                                              <th style="font-size: 20px;padding:2%;text-align: center">Credit</th>
                                          </thead>
                                          <tbody style="border: 1px dashed black" align="center">
                                              <?php
                                              $sql = "SELECT * FROM transaction WHERE customer_no='$id'";
                                              $results = mysqli_query($db,$sql);
                                              while($room = mysqli_fetch_array ($results))
                                              {
                                              ?>
                                              <tr>
                                              <td style="font-size: 18px;padding:2%;"><?php echo $room[2]; ?> : </td>
                                              <td style="font-size: 18px;padding:2%;"><?php echo $room[3]; ?></td>
                                              <td style="font-size: 18px;padding:2%;"> ₱ <?php echo number_format($room[4],2); ?></td>         
                                              </tr>                                    
                                              <?php
                                              }
                                              ?>
                                              <?php
                                              $sql = "SELECT * FROM item_transaction WHERE customer_no='$id'";
                                              $results = mysqli_query($db,$sql);
                                              while($item = mysqli_fetch_array ($results))
                                              {
                                              ?>
                                              <tr>
                                                  <td style="font-size: 18px;padding:2%;"><?php echo $item[2] ?> : </td>
                                                  <td style="font-size: 18px;padding:2%;"><?php echo $item[3] ?></td>
                                                  <td style="font-size: 18px;padding:2%;"> ₱ <?php echo number_format($item[4],2); ?></td>
                                                </tr>
                                              <?php
                                              }
                                              ?>
                                              <tr>
                                                  <td style="font-size: 18px;padding:2%;">Adult : </td>
                                                  <td style="font-size: 18px;padding:2%;"><?php echo $rows[9] ?></td>
                                                  <td style="font-size: 18px;padding:2%;"></td>
                                              </tr>
                                              <tr>
                                                  <td style="font-size: 18px;padding:2%;">Child : </td>
                                                  <td style="font-size: 18px;padding:2%;"><?php echo $rows[10] ?></td>
                                                  <td style="font-size: 18px;padding:2%;"></td>
                                              </tr>
                                              </tbody>
                                              <tbody style="border: 1px dashed black" align="center">
                                                <tr style="border: 1px dashed black">
                                                <td style="font-size: 18px;padding-top:-10%">Damage Item : </td>
                                                <td style="font-size: 18px;border:1px dashed black;padding:2%">
                                                  <ul id="reciept_damage" style="text-align: center;"></ul>
                                                </td>
                                                <td style="padding-top:10%;padding-left:2%;font-size: 18px;text-align: left;" id="recipe_damage_total">Total Damage: ₱ 0.00</td>
                                                </tr>
                                                <tr style="border: 1px dashed black">
                                                  <td>Check-in:  <?php echo $rows[7] ?></td>
                                                  <td></td>
                                                  <td>Check-out: <?php echo $rows[8] ?></td>
                                                </tr>
                                              <tr>
                                                  <td></td>
                                                  <td  style="font-size: 18px;text-align: right;"></td>
                                                  <td style="font-size: 18px;padding:2%;text-align: left;">Accomodate Total: ₱ <?php echo number_format(($rows[12]), 2); ?></td>
                                              </tr>
                                              <tr>
                                                <td style="font-size: 18px"></td>
                                                <td style="font-size: 18px;text-align: right;"></td>
                                                <td style="font-size: 18px;padding:2%;text-align: left;" id="recipe_penalty">Penalty:  </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 18px"></td>
                                                    <td style="font-size: 18px"></td>
                                                    <td style="font-size: 18px;padding:2%;text-align: left;" id="recipe_total">Total Cost: ₱ <?php echo number_format(($rows[12]), 2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 18px"></td>
                                                    <td style="font-size: 18px"></td>
                                                    <td style="font-size: 18px;padding:2%;text-align: left;">Amount Due:</td>
                                                </tr>
                                                <tr style="border-top: 1px dashed black">
                                                    <td style="font-size: 18px"></td>
                                                    <td style="font-size: 18px;font-size:20px">Thanks  for Coming!</td>
                                                    <td style="font-size: 18px;"></td>
                                                </tr>
                                          </tbody>
                                      </table>
                                  </div>
                            </div>
                              <div class="text-center" style="margin-bottom:5%">
                                    <button type="button" class="btn" style="background-color:#2ad1a3;" onclick="PrintElem()"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                              </div>
                        </div>
                </div>
        </div>
                       <?php
                       }
                     }
                  ?>
        </form>
        </div>
        </main>
    <!-- SCRIPTS -->
    <script type="text/javascript" src="../../vendor/js/compiled.min.js"></script>
    <script type="text/javascript" src="../../vendor/js/checkout.js"></script>
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