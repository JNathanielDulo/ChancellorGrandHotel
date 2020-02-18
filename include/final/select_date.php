<?php
    session_start();
    require "../php/connection.php";
    date_default_timezone_set('Asia/Manila');
  
// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}
  
// Check format
$timestamp = strtotime($ym."-01");
if ($timestamp === false) {
    $timestamp = time();
}
  
// Today
$today = date('Y-m-j', time()); // change "d" to " j" 
// For H3 title
$html_title = date('M / Y', $timestamp);
  
// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
  
// Number of days in the month
$day_count = date('t', $timestamp);
  
// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
  
  
// Create Calendar!!
$weeks = array();
$week = '';
  
// Add empty cell
$week .= str_repeat('<td></td>', $str);
  
for ( $day = 1; $day <= $day_count; $day++, $str++) {
     
    $date = $ym.'-'.$day;
     
    if ($today == $date) {
        $week .= '<td class="today">'.$day;
    } else {
        $week .= '<td>'.$day;
    }
    $week .= '</td>';
     
    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {
         
        if($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }
         
        $weeks[] = '<tr>'.$week.'</tr>';
         
        // Prepare for new week
        $week = '';
         
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
    <title>Chancellor Hotel</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../../asset/css/compiled.min.css" rel="stylesheet">
    <link href="../../asset/css/style.css" rel="stylesheet">
    <link href="../../asset/css/bootstrap-datepicker.css" rel="stylesheet">
</head>
<style>

     .th_date {
            text-align: center;
            font-weight: 700;
          border: 1px solid  #73623d;
        }
        .td_date {
          text-align: center;
          border: 1px solid  #73623d;
        }
        .today {
            background: #73623d;
            color: white;
        }
    </style>
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
             <h2 style="color: #73623d;font-weight: 500">Chancellor hotel</h2>
      <p> Makati City, Philippines</p>
        <!-- Horizontal Steppers -->
        <div class="row">
            <div class="col-md-12">
                <!-- Stepers Wrapper -->
                <ul class="stepper stepper-horizontal">

                    <!-- First Step -->
                    <li class="completed">
                        <a href="#!">
                            <span class="circle"> 1</span>
                            <span class="label">Select Date</span>
                        </a>
                    </li>

                    <!-- Second Step -->
                    <li class="next">
                        <a href="#!">
                            <span class="circle">2</span>
                            <span class="label">Room & Rates</span>
                        </a>
                    </li>
                    <!-- Third Step -->
                    <li class="next">
                        <a href="#!">
                            <span class="circle">3</span>
                            <span class="label">Checkout</span>
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
        <div class="row">
              <div class="col-lg-4">
              <div class="col-lg-12">
                  <div class="z-depth-1" style="padding: 10%;background-color: white;border-radius: 3px">
                      <div class="float-xs-left" style="margin-top: -13%;margin-left: -13%">
                      <h3><span class="badge " style="background-color: #73623d">Your Stay Dates</span></h3>
                      </div>
                      <div align="left">
                        <form action="session_date.php" method="post">
                          <div class="row" align="left" style="padding-top: 10%">
                              <div class="col-lg-12">
                                   <div class="md-form">
                                        <input type="text" id="arrival"  placeholder="" name="arrival" class="form-control datepicker">
                                        <label for="arrival" >Checkin</label>
                                    </div>
                              </div>
                              <div class="col-lg-12" style="margin-top: 5%">
                                   <div class="md-form">
                                        <input type="text" id="departure" placeholder="" name="departure" class="form-control datepicker">
                                        <label for="arrival" >Checkout</label>
                                    </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                  <div class="z-depth-1" style="background-color: white;padding: 3%; ">
                  <h3 style="font-weight: 500">Availability</h3>
                    <div style="border: 1px solid #ddd;padding:3%">
                      <h5 class="text-center"><a href="?ym=<?php echo $prev; ?>" style="color:#73623d">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>" style="color:#73623d">&gt;</a></h5><br>
                      <table class="table table-bordered table-striped">
                        <tr>
                            <th class="th_date">S</th>
                            <th class="th_date">M</th>
                            <th class="th_date">T</th>
                            <th class="th_date">W</th>
                            <th class="th_date">T</th>
                            <th class="th_date">F</th>
                            <th class="th_date">S</th>
                        </tr>
                        <?php
                            foreach ($weeks as $week) {
                                echo $week;
                            }   
                        ?>
                    </table>
                      <ul class="list-inline" align="center">  
                          <li class="list-inline-item"><i class="fa fa-square" style="color:#ddd"></i> Rooms are Available</li>
                          <li class="list-inline-item"><i class="fa fa-square" style="color:#73623d"></i> No Availble Rooms </li>
                      </ul>
                  </div>
                  </div>
              </div>
        </div>
                              <div align="right" style="margin-top: 1%">
                                  <button class="btn" name="check_available" type="submit" style="background-color: #73623d" ><i class="fa fa-calendar prefix"></i>  Check Availability</button>
                              </div>
                            </form>
    </div>
 <!--Copyright-->
    <footer class="page-footer center-on-small-only" style="background-color:#222">
        <div class="footer-copyright" style="background-color:#353230">
            <div class="container-fluid">
                © 2017 Copyright: <a href="https://seorabeolgrandleisurehotel.com"> seorabeolgrandleisurehote.com </a>
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
        <script type="text/javascript" src="../../vendor/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.mdb-select').material_select();
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
<script type="text/javascript">
  new WOW().init(); 
</script>
<script type="text/javascript">
   $(function () {
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
});

var currentdatearrival = new Date();
var shortdatearrival = currentdatearrival.toLocaleDateString();
var currentdatedeparture = new Date();
var date = new Date();
date.setDate(date.getDate() + 1);
var short =date.toLocaleDateString();

    document.getElementById("arrival").value = shortdatearrival;
     document.getElementById("departure").value = short;
</script>
</body>
</html>
