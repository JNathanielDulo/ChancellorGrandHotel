<?php
session_start();
require "../php/connection.php";
$arrival = $_SESSION['arrival'];
$departure = $_SESSION['departure'];
$adult = $_SESSION['adult'];
$child = $_SESSION['child'];
$new_arrival = date("Y-m-d", strtotime($arrival));
$new_departure = date("Y-m-d", strtotime($departure));
$datediff = strtotime($new_departure) - strtotime($new_arrival);
$_SESSION['totalDays'] = floor($datediff / (60 * 60 * 24));
if(isset($_POST['add_cart']))
{
  if(isset($_SESSION['proccess_cart']))
  {
    $item_array_id = array_column($_SESSION['proccess_cart'], 'item_id');
    if(!in_array($_GET['id'], $item_array_id))
    {
      $count = count($_SESSION['proccess_cart']);
      $item_array = array(
        'item_id'  => $_GET['id'],
        'item_name'  => $_POST['name'],
        'item_price'  => $_POST['price'],
        'item_adult'  => $_POST['adult'],
        'item_child'  => $_POST['child']
      );
      $_SESSION['proccess_cart'][$count] = $item_array;
    }
    else
    {
      echo "<script>window.alert('Room already selected')</script>";
      echo "<script>window.location='room_rates.php'</script>";
    }
  }
  else
  {
    $item_array = array(
      'item_id'  => $_GET['id'],
      'item_name'  => $_POST['name'],
      'item_price'  => $_POST['price'],
      'item_adult'  => $_POST['adult'],
      'item_child'  => $_POST['child']
    );
    $_SESSION['proccess_cart'][0] = $item_array;
  }
}



if(isset($_GET['action']))
{
  if($_GET['action'] == 'delete')
  {
    foreach($_SESSION['proccess_cart'] as $keys => $values)
    {
      if($values['item_id'] == $_GET['id'])
      {
        unset($_SESSION['proccess_cart'][$keys]);
        echo "<script>window.alert('Remove Success')</script>";
        echo "<script>window.location='room_rates.php'</script>";
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
  <link rel="shortcut icon" href="../../asset/img/hotel/icon.png" />
  <title>SChancellor Hotel</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../../asset/css/compiled.min.css" rel="stylesheet">
  <link href="../../asset/css/style.css" rel="stylesheet">
</head>
<body class="fixed-sn black-skin" style="background: #efe9ca">

  <!-- Start your project here-->
  <!--Navbar-->
  <nav class="navbar  navbar-toggleable-md navbar-dark scrolling-navbar" style="background-color: #222;opacity: 0.9">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div align="center">
        <a class="navbar-brand" href="../../index.php">
          <img src="../../asset/img/hotel/logoreal2.png" style="width:50%;margin-top: 1%">
        </a>
      </div>
    </div>
  </nav>
  <!--/Navbar-->   
  <div class="container" style="margin-top: 4%">
   <h2 style="color: #73623d;font-weight: 500">Chancellor HotelL</h2>
   <p> Makati City, Philippines</p>
   <!-- Horizontal Steppers -->
   <div class="row">
    <div class="col-md-12">
      <!-- Stepers Wrapper -->
      <ul class="stepper stepper-horizontal">

        <!-- First Step -->
        <li class="completed">
          <a href="select_date.php">
            <span class="circle"><i class="fa fa-check"></i> </span>
            <span class="label">Select Date</span>
          </a>
        </li>

        <!-- Second Step -->
        <li class="active">
          <a href="#!">
            <span class="circle">2</span>
            <span class="label">Rooms & Rates</span>
          </a>
        </li>
        <!-- Third Step -->
        <li class="next">
          <a href="#!">
            <span class="circle">3</span>
            <span class="label">Checkout </span>
          </a>
        </li>
        <!-- Fourth Step -->
        <li class="next">
          <a href="#!">
            <span class="circle">4</span>
            <span class="label">Review</span>
          </a>
        </li>
        <li class="next">
          <a href="#!">
            <span class="circle">5</span>
            <span class="label">Completed</span>
          </a>
        </li>
      </ul>
      <!-- /.Stepers Wrapper -->
    </div>
  </div>
  <div class="row" style="margin-top: 4%">
   <div class="col-lg-3">
    <div class="z-depth-1" style="background-color: white;border-radius: 4px">
      <div style="position:relative;top:-45px;left: 0%;">
        <button type="button" class="btn btn-tw" style="width: 24%;height: 65px;padding-left: 3%;background-color: #73623d"><i class="fa fa-hotel" aria-hidden="true" style="font-size: 40px"></i></button>
      </div>
      <div class="float-xs-left" style="margin-top: -7%">
        <h3><span class="badge " style="background-color: #73623d">Your Date Selected</span></h3>
      </div>
      <div style="padding: 3%">
        <div class="row" align="center">
          <div class="col-lg-12">
            <ul>
              <table class="table">
                <tbody>
                  <tr>
                    <td style="font-size: 13px;font-weight: 500">Arrival Date</td>
                    <td><?php echo $arrival ?></td>
                  </tr>
                  <tr>
                    <td style="font-size: 13px;font-weight: 500">Departure Date</td>
                    <td><?php echo $departure ?></td>
                  </tr>
                </tbody>
              </table>
            </ul>
          </div>
        </div>
        <a href="select_date.php"><button class="btn btn-sm" style="background-color: #73623d">Modify</button></a>               
        <div class="float-xs-left" style="margin-top: 4%">
          <h3><span class="badge " style="background-color: #73623d">Your Rooms Selected</span></h3>
        </div>
        <div class="col-lg-12" style="margin-top: 5%">
          <ul>
            <table class="table">
              <tbody align="left">
                <?php
                $total = 0;
                if(!empty($_SESSION['proccess_cart']))
                {
                  $totalDays =  $_SESSION['totalDays'];
                  foreach ($_SESSION['proccess_cart'] as $keys => $values)
                  {
                    $total = $total + ($values['item_price'] * $totalDays);
                    ?>
                    <tr>
                      <td style="font-size: 13px;font-weight: 500"><?php echo $values['item_name']; ?></td>
                      <td><a href="room_rates.php?action=delete&id=<?php echo $values['item_id']; ?>" style="color: #73623d"><i class="fa fa-times"></i></a></td>
                    </tr>
                    <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </ul>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6">
            <h6 style="font-weight: 500"> Total Rate</h6>
          </div>
          <div class="col-lg-6">
            <h6 id="total_cost_view" >PHP <?php echo number_format($total,2) ?></h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-9">
    <h3 style="font-weight: 500;padding-left: 1%;padding-bottom: 1%">Available Rooms & Rates</h3>
    <div class="z-depth-1" style="background-color: white;border-radius: 4px;padding: 3%">
      <div class="table-reponsive">
        <table class="table product-table">
          <!-- Table body -->
          <tbody>
            <!-- First row -->
            <?php
            $check = "SELECT * FROM rooms WHERE departure >= '$new_arrival' AND arrival <= '$new_departure'  GROUP BY room_id";
            $check_result = mysqli_query($db, $check);
            while ($check_rows = mysqli_fetch_assoc($check_result)) { 
              $room_no = $check_rows['room_no'];
              $room_id = $check_rows['room_id'];
              $rooms = "SELECT * FROM accomodation WHERE room_id = '$room_id' ";
              $result = mysqli_query($db, $rooms);
              while($rooms_row = mysqli_fetch_array($result)) {
                ?>
                <tr align="left">
                  <th scope="row" style="width: 30%">
                    <img src="../../asset/img/hotel/<?php echo $rooms_row[2] ?>" alt="" class="img-fluid z-depth-0">
                  </th>
                  <td>
                    <h4><strong><?php echo $rooms_row[1] ?></strong></h4>
                    <p class="text-muted" style="font-size: 14px"><?php echo $rooms_row[4] ?></p>
                  </td>
                  <td align="right">
                    <h5 style="text-align: center;font-weight: 500">PHP <?php echo number_format($rooms_row[3],2) ?></h5>
                    <p class="text-muted" style="font-size: 12px">Including Room Service</p>
                    <form action="room_rates.php?action=add&id=<?php echo $room_no; ?>" method="post">
                     <input type="hidden" name="price" value="<?php echo $rooms_row[3] ?>">
                     <input type="hidden" name="name" value="<?php echo $rooms_row[1] ?>">
                     <input type="hidden" name="adult" value="<?php echo $rooms_row[5] ?>">
                     <input type="hidden" name="child" value="<?php echo $rooms_row[6] ?>">
                     <button type="submit" name="add_cart" class="btn" style="background-color: #73623d" data-toggle="tooltip" data-placement="top" title="Remove item" >SELECT
                     </button>
                   </form>
                 </td>
               </tr>
               <?php
             }
           }
           ?>
         </tbody>
         <!-- /.Table body -->           
       </table>
     </div>
   </div>
   <?php
   if(!empty($_SESSION['proccess_cart'])) {
    ?>
    <div align="right" style="margin-top: 1%">
      <a href="guest_info.php"><button class="btn" style="background-color: #73623d" type="submit" name="submit">Proceed</button></a>
    </div>
    <?php
  }
  ?>
</div>
</div>
</div>
<!--Copyright-->
<footer class="page-footer center-on-small-only" style="background-color:#222">
  <div class="footer-copyright" style="background-color:#353230">
    <div class="container-fluid">
      © 2017 Copyright: <a href="https://ChancellorHotel.com"> ChancellorHotel </a>
    </div>
  </div>
  <!--/.Copyright-->
</footer>
<!--/.Footer-->
<!--/Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="../../vendor/js/compiled.min.js"></script>
<!--External Datepicker-->

<script type="text/javascript">
  $(document).ready(function() {
    $('.mdb-select').material_select();
  });
</script>
</body>
</html>
