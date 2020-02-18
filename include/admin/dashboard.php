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
						<hr style="width:85%;background-color:#ddd">
						<li><a href="checkin.php" class="waves-effect arrow-r"><i class="fa fa-calendar-plus-o"></i> Check-in</a></li>  
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
					<li class="breadcrumb-item"><a href="pending.php" style="font-size: 15px;font-weight: 300"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				</ol>
			</div>
			<ul class="nav navbar-nav ml-auto flex-row">
				<li class="nav-item dropdown">
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
					<div class="container">
						<div class="row">
							<?php
							$sql = "SELECT COUNT(room_status) FROM rooms WHERE room_status = 'Available'";
							$results = mysqli_query($db,$sql);
							while ($rows = mysqli_fetch_array($results))
							{
								?>
								<div class="col-md-4">
									<div class="carder-css">
										<div class="carder-header">
											<h1 class="header-card">Room Available</h1>
											<h3 class="count-card"><?php echo $rows[0] ?></h3>
											<i class="fa fa-bed card-icon" aria-hidden="true"></i>
										</div>
										<?php
										$sql1 = "SELECT * FROM booking WHERE  customer_no ORDER BY customer_no DESC LIMIT 1" ;
										$results1 = mysqli_query($db,$sql1);
										while($rows1 = mysqli_fetch_array ($results1)){
											?>
											<div class="carder-body" style="margin-top:-3%;">
												<h6 style="font-size: 13px;padding-left: 3%;color:white">Last Update <?php echo facebook_time_ago($rows1[15]); ?></h6>
												<div class="well well-carder"><a href="checkin.php" class="view-carder white-text">View <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>
											</div>
											<?php
										} 
										?>
									</div>
								</div>
								<?php
							}
							?>
							<?php
							$sql = "SELECT COUNT(customer_no) AS user_id FROM booking";
							$results = mysqli_query($db,$sql);
							while ($rows = mysqli_fetch_array($results)) {
								?>
								<div class="col-md-4">
									<div class="carder-css2">
										<div class="carder-header2">
											<h1 class="header-card2">Guest</h1>
											<h3 class="count-card2"><?php echo $rows[0]; ?></h3>
											<i class="fa fa-users card-icon2" aria-hidden="true"></i>
										</div>
										<div class="carder-body2" style="margin-top:-3%;">
											<h6 style="font-size: 13px;padding-left: 3%;color:white">Last Update 21minutes Ago</h6>
											<div class="well well-carder2"><a href="membership.php" class="view-carder white-text">View <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
							<?php
							$sql = "SELECT COUNT(*) AS customer_no, status = 'Pending' FROM booking";
							$results = mysqli_query($db,$sql);
							while ($rows = mysqli_fetch_array($results)) {
								?>
								<div class="col-md-4">
									<div class="carder-css3">
										<div class="carder-header3">
											<h1 class="header-card3">Pending</h1>
											<h3 class="count-card3"><?php echo $rows[1]; ?></h3>
											<i class="fa fa-hourglass-half card-icon2" aria-hidden="true"></i>
										</div>
										<div class="carder-body3" style="margin-top:-3%;">
											<?php
											$time = "SELECT * FROM booking WHERE status='Pending' OR status='Temporary' GROUP BY customer_no DESC LIMIT 1";
											$result_time = mysqli_query($db, $time);
											while($row_time = mysqli_fetch_array($result_time))
											{
												?>
												<h6 style="font-size: 13px;padding-left: 3%;color:white">Last Update <?php echo facebook_time_ago($row_time[15]) ?></h6>
												<?php
											}
											?>
											<div class="well well-carder3"><a href="pending.php" class="view-carde white-text">View <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<!--/Cards Information-->
						<div class="row" style="margin-top:5%;margin-left: -1%">
							<div class="col-lg-7">
								<div class="z-depth-1" style="width: 100%;background-color: white;border-radius: 5px">
									<div style="position:relative;top:-30px;left: 10px;">
										<button type="button" class="btn btn-tw" style="width: 13%;height: 60px;padding-left: 3%;background-color: dodgerblue"><i class="fa fa-line-chart" aria-hidden="true" style="font-size: 40px"></i></button>
									</div>
									<div class="float-xs-left" style="margin-left:3%;margin-top:-3%">
										<h4>Monthly Income</h4>
										<p style="color:grey">Include the discount of Members and Senior </p>
									</div>
									<div style="padding-top:1%;padding-right: 5%;padding-left: 5%;padding-bottom: 5%">
										<canvas id="lineChart" style="width: 100%;"></canvas>
									</div>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="z-depth-1" style="background-color: white;border-radius: 5px">
									<div style="position:relative;top:-30px;left: 10px;">
										<button type="button" class="btn btn-tw" style="width: 15%;height: 60px;padding-left: 4%;background-color: #2ecc71"><i class="fa fa-user" aria-hidden="true" style="font-size: 40px"></i></button>
									</div>
									<div class="float-xs-left" style="margin-left:3%;margin-top:-3%">
										<h4>Loyal Customer</h4>
										<p style="color:grey">Include the Members</p>
									</div>
									<div style="padding-top:1%;padding-right: 5%;padding-left: 5%;padding-bottom: 5%">
										<table class="table table-striped table-hover">
											<thead>
												<th style="font-weight: 400">Customer name</th>
											</thead>
											<tbody>
												<tr>
													<td style="font-weight: 300">Mica Aubrey Flores</td>
												</tr>
												<tr>
													<td style="font-weight: 300">Mart Macion</td>
												</tr>
												<tr>
													<td style="font-weight: 300">Jasmin Giba</td>
												</tr>
												<tr>
													<td style="font-weight: 300">Alex Luna</td>
												</tr>
												<tr>
													<td style="font-weight: 300">Lance Asiatico</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="margin-top:3%">
							<div class="col-lg-6">
								<div class="z-depth-1" style="background-color: white;border-radius: 5px">
									<div style="position:relative;top:-30px;left: 10px;">
										<button type="button" class="btn btn-tw" style="width: 15%;height: 60px;padding-left: 2%;background-color: dodgerblue"><i class="fa fa-hotel" aria-hidden="true" style="font-size: 40px"></i></button>
									</div>
									<div class="float-xs-left" style="margin-left:3%;margin-top:-3%">
										<h4>Monthly Grossing Room</h4>
									</div>
									<div style="padding-top:1%;padding-right: 5%;padding-left: 5%;padding-bottom: 5%">
										<table class="table table-striped table-hover">
											<thead>
												<th style="font-weight: 400">Room Type</th>
												<th style="font-weight: 400">Room Total</th>
											</thead>
											<tbody>
												<?php
												$room = "SELECT room_name, COUNT(*), SUM(room_total) FROM transaction GROUP BY room_name DESC";
												$results = mysqli_query($db, $room);
												while($rows = mysqli_fetch_array($results))
												{
													?>
													<tr>
														<td style="font-weight: 300"><?php echo $rows[0] ?></td>
														<td style="font-weight: 300">PHP <?php echo number_format($rows[2],2) ?></td>
													</tr>
													<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="z-depth-1" style="background-color: white;border-radius: 5px">
									<div style="position:relative;top:-30px;left: 10px;">
										<button type="button" class="btn btn-tw" style="width: 15%;height: 60px;padding-left: 2%;background-color: #e53935"><i class="fa fa-bath" aria-hidden="true" style="font-size: 40px"></i></button>
									</div>
									<div class="float-xs-left" style="margin-left:3%;margin-top:-3%">
										<h4>Total Income this Year</h4>
									</div>
									<div style="padding-top:1%;padding-right: 5%;padding-left: 5%;padding-bottom: 5%">
										<table class="table table-striped table-hover">
											<thead>
												<th style="font-weight: 400">Year</th>
												<th style="font-weight: 400">Total Income</th>
											</thead>
											<tbody>
												<?php
												$room = "SELECT year(checkout), SUM(total_cost) AS 'total', count(*) FROM reports GROUP BY year(checkout), 'total'";
												$results = mysqli_query($db, $room);
												while($rows = mysqli_fetch_array($results))
												{
													?>
													<tr>
														<td style="font-weight: 300"><?php echo $rows[0] ?></td>
														<td style="font-weight: 300">PHP <?php echo number_format($rows[1],2) ?></td>
													</tr>
													<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<hr style="margin-top: 5%">
					</div>
				</main>
				<!--/Graphs Information-->
				<!--/DASHBOARD ANALYTICS-->
				<!-- SCRIPTS -->
				<script type="text/javascript" src="../../vendor/js/compiled.min.js"></script>
				<script type="text/javascript" src="../../vendor/js/chart.min.js"></script>
				<script type="text/javascript" src="graph/profit_chart.js"></script>
				<script type="text/javascript" src="graph/daily_chart.js"></script>
				<script type="text/javascript" src="graph/week_chart2.js"></script>
				<script type="text/javascript">
					$(document).ready(function(){
						
						function load_unseen_notification(view = '')
						{
							$.ajax({
								url:"fetch.php",
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
			<?php
		}
		else
		{
			header("location:login.php");
		}
		?>