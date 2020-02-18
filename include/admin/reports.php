<?php
session_start();
require "../php/connection.php";
require "php/long_time_ago.php";
date_default_timezone_set('Asia/Manila');
$date = date('m/d/Y');
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
	<!--External Datepicker-->
	<link href="../../asset/css/bootstrap-datepicker.css" rel="stylesheet">
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
<body id="rows_data" class="fixed-sn black-skin" style="background-color: whitesmoke">
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
	<!-- Navbar -->
	<nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav">
		<!-- SideNav slide-out button -->
		<div class="float-xs-left">
			<a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
		</div>
		<div class="mr-auto">
			<ol class="header-breadcrumb breadcrumb fp-header-breadcrumb hidden-md-down">
				<li class="breadcrumb-item"><a href="pending.php" style="font-size: 15px;font-weight: 300"><i class="fa fa-flag-o"></i> Reports</a></li>
			</ol>
		</div>
		<ul class="nav navbar-nav ml-auto flex-row">
			<li class="nav-item dropdown">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge red count" style="border-radius: 10px;"></span><i class="fa fa-bell"></i> <span class="hidden-sm-down">Notifcation</span></a>
					<div class="dropdown-menu dropdown-menu-right" id="notif_id">
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
				<div class="container" style="margin-top:0%;">
					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive margin-small-top">
								<div class="card-table">
									<div class="card-table-content">
										<div style="position:relative;top:-50px;left: -43%;">
											<button type="button" class="btn btn-tw" style="width: 13%;height: 80px;padding-left: 3%;background-color: #2ad1a3"><i class="fa fa-flag" aria-hidden="true" style="font-size: 40px"></i></button>
										</div>
										<div class="float-xs-left" style="margin-left:3%;margin-top:-3%;text-align: left">
											<h3>Reports</h3>
											<p style="color:grey">The Daily Reports</p>
										</div>
										<div style="float: right;margin-top:-9%">
											<div class="row">
												<div class="col-lg-4">
													<div class="md-form">
														<input type="text"  id="arrival"  placeholder="From"  class="form-control"   />
													</div>
												</div>
												<div class="col-lg-4">
													<div class="md-form">
														<input type="text"  id="departure"  placeholder="To"  class="form-control"   />
													</div>
												</div>
												<div class="col-lg-4">
													<a href="#!" id="dateFilter" class="btn green">Filter</a>
												</div>
												<div class="col-lg-6" style="margin-top:1.1%;text-align: center;text-align-last:center">
													<a href="print_report.php?rows=10" id="print_reports" class="btn green">Print Data</a>
												</div>
												<div class="col-lg-6" style="margin-top:1.1%;text-align: center;text-align-last:center">
													<a href="print_graph.php"  class="btn green">Analytics</a>
												</div>
											</div>
										</div>
										<div class="table-responsive"  style="margin-top:-1%;">
											<table class='table  table-hover table-striped' style="text-align: center;text-align-last: center">  
												<thead>  
													<th style='font-weight:500'>Customer ID</th>
													<th style='font-weight:500'>Customer Name</th>
													<th style='font-weight:500'>Contact No</th>
													<th style='font-weight:500'>Adult</th>
													<th style='font-weight:500'>Child</th>
													<th style='font-weight:500'>Checkin</th>
													<th style='font-weight:500'>Checkout</th>
													<th style='font-weight:500'>Total Cost</th>
												</thead>
												<tbody id="reports_daily"></tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>     
						<div class="col-lg-6" style="margin-top:1%">
							<div class="card-table">
								<div class="card-table-content">
									<h3 class="text-left " style="color: #2ad1a3"><i class="fa fa-bar-chart" aria-hidden="true"></i> Daily</h3>
									<table class="table table-striped table-hover" style="margin-top:5%">
										<tr>
											<thead>
												<th style="font-weight: 500;text-align: center">Month</th>
												<th style="font-weight: 500;text-align: center">Day</th>
												<th style="font-weight: 500;text-align: center">Year</th>
												<th style="font-weight: 500;text-align: center">Total Income</th> 
											</thead>
										</tr>
										<tbody align="center">
											<?php
											$daily = "SELECT  year(checkout), month(checkout), day(checkout), count(*), total_cost FROM reports GROUP BY year(checkout), month(checkout), day(checkout) ORDER BY month(checkout) DESC LIMIT 7";
											$result = mysqli_query($db, $daily);
											while($rows = mysqli_fetch_array($result))
											{
												?>
												<tr>
													<td style="font-weight: 300"><?php echo $rows[1] ?></td>
													<td style="font-weight: 300"><?php echo $rows[3] ?></td>
													<td style="font-weight: 300"><?php echo $rows[0] ?></td>
													<td style="font-weight: 300">₱ <?php echo number_format($rows[4]) ?></td>
												</tr>
												<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-lg-6" style="margin-top:1%">
							<div class="card-table">
								<div class="card-table-content">
									<h3 class="text-left " style="color: #2ad1a3"><i class="fa fa-area-chart" aria-hidden="true"></i> Weekly</h3>
									<table class="table table-striped table-hover" style="margin-top:5%">
										<tr>
											<thead>
												<th style="font-weight: 500;text-align: center">Weeks</th>
												<th style="font-weight: 500;text-align: center">Month</th>
												<th style="font-weight: 500;text-align: center">Year</th>
												<th style="font-weight: 500;text-align: center">Total Income</th> 
											</thead>
										</tr>
										<tbody align="center">
											<?php
											$daily = "SELECT year(checkout), WEEK(checkout), month(checkout), count(*), SUM(total_cost) AS 'total' FROM reports GROUP BY year(checkout), WEEK(checkout), month(checkout), 'total' ORDER BY month(checkout) DESC LIMIT 7";
											$result = mysqli_query($db, $daily);
											while($rows = mysqli_fetch_array($result))
											{
												?>
												<tr>
													<td style="font-weight: 300"><?php echo $rows[1] ?></td>
													<td style="font-weight: 300"><?php echo $rows[3] ?></td>
													<td style="font-weight: 300"><?php echo $rows[0] ?></td>
													<td style="font-weight: 300">₱ <?php echo number_format($rows[4])  ?></td>
												</tr>
												<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-lg-6" style="margin-top:1%">
							<div class="card-table">
								<div class="card-table-content">
									<h3 class="text-left " style="color: #2ad1a3"><i class="fa fa-bar-chart" aria-hidden="true"></i> Monthly</h3>
									<table class="table table-striped table-hover" style="margin-top:5%">
										<tr>
											<thead>
												<th style="font-weight: 500;text-align: center">Month</th>
												<th style="font-weight: 500;text-align: center">Year</th>
												<th style="font-weight: 500;text-align: center">Total Income</th>
											</thead>
										</tr>
										<tbody align="center">
											<?php
											$daily = "SELECT year(checkout), month(checkout), count(*), SUM(total_cost) AS 'total' FROM reports GROUP BY year(checkout), month(checkout), 'total'";
											$result = mysqli_query($db, $daily);
											while($rows = mysqli_fetch_array($result))
											{ 
												?>
												<tr>
													<td style="font-weight: 300"><?php echo "0",date($rows[1]) ?></td>
													<td style="font-weight: 300"><?php echo $rows[0]  ?></td>
													<td style="font-weight: 300">₱ <?php echo number_format($rows[3])  ?></td>
												</tr>
												<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-lg-6" style="margin-top:1%">
							<div class="card-table">
								<div class="card-table-content">
									<h3 class="text-left " style="color: #2ad1a3"><i class="fa fa-line-chart" aria-hidden="true"></i> Yearly</h3>
									<table class="table table-striped table-hover" style="margin-top:5%">
										<tr>
											<thead>
												<th style="font-weight: 500;text-align: center">Year</th>
												<th style="font-weight: 500;text-align: center">Total Income</th>
											</thead>
										</tr>
										<tbody align="center">
											<?php
											$daily = "SELECT year(checkout), SUM(total_cost) AS 'total', count(*) FROM reports GROUP BY year(checkout), 'total'";
											$result = mysqli_query($db, $daily);
											while($rows = mysqli_fetch_array($result))
											{ 
												?>
												<tr>
													<td style="font-weight: 300"><?php echo $rows[0]  ?></td>
													<td style="font-weight: 300">₱ <?php echo number_format($rows[1])  ?></td>
												</tr>
												<?php
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div><!--row -->
				</div><!--End Container-->
			</main>
			<!--/Ongoing page-->
			<!-- SCRIPTS -->
			<script type="text/javascript" src="../../vendor/js/compiled.min.js"></script>
			<script type="text/javascript" src="../../vendor/js/chart.min.js"></script>
			<script type="text/javascript" src="../../vendor/js/filter.js"></script>
			<script type="text/javascript" src="graph/profit_chart.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					var nowTemp = new Date();
					var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

					var checkin = $('#arrival').datepicker({
						color: 'green',
					})
					var checkout = $('#departure').datepicker({
						color: 'green'
					})
					function load_unseen_notification(view = '')
					{
						$.ajax({
							url:"fetch.php",
							method:"POST",
							data:{view:view},
							dataType:"json",
							success:function(data)
							{
								$('#notif_id').html(data.notification);
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
			<!--External Datepicker-->
			<script type="text/javascript" src="../../vendor/js/bootstrap-datepicker.js"></script>
			<script>
				$('.mdb-select').material_select();
				$(".button-collapse").sideNav();
				var el = document.querySelector('.custom-scrollbar');
				Ps.initialize(el);
			</script>
			<script>  
				$(document).ready(function(){  
					load_data();  
					$('#rows_data').ready(function(){
						var rows = $(this).val();
						var from = $('#arrival').val();
						var to = $('#departure').val();
						document.getElementById("print_reports").href="print_report.php?from="+from+"&to="+to+"";
						$.ajax({  
							url:"http://localhost/seorabeol95/include/admin/php/daily.php?from=2017-09-02&to=2017-12-16",  
							method:"GET", 
							dataType: "JSON", 
							success:function(data){  
								var body = '';
								var sub= 0;
								for(var i = 0; i<data.length; i++) {
									sub = data[i].total_cost;
									body+='<tr>';
									body+='<td style="font-weight: 300">'+data[i].customer_no+'</td>';
									body+='<td style="font-weight: 300">'+data[i].fname+' '+ data[i].lname +'</td>';
									body+='<td style="font-weight: 300">'+data[i].contact+'</td>';
									body+='<td style="font-weight: 300">'+data[i].adult+'</td>';
									body+='<td style="font-weight: 300">'+data[i].child+'</td>';
									body+='<td style="font-weight: 300">'+data[i].arrival_date+'</td>';
									body+='<td style="font-weight: 300">'+data[i].departure_date+'</td>';
									body+='<td style="font-weight: 300">'+sub.toLocaleString(undefined,  { minimumFractionDigits: 2 }  )+'</td>';
									body+='</tr>';
								} $('#reports_daily').html(body); 
							}  
						})  
					});
					function load_data()  
					{  
						$.ajax({  
							url:"http://localhost/seorabeol95/include/admin/php/daily.php?rows=10",  
							method:"GET", 
							dataType: "JSON", 
							success:function(data){  
								var body = '';
								var sub= 0;
								for(var i = 0; i<data.length; i++) {
									sub = data[i].total_cost;
									body+='<tr>';
									body+='<td style="font-weight: 300">'+data[i].customer_no+'</td>';
									body+='<td style="font-weight: 300">'+data[i].fname+' '+ data[i].lname +'</td>';
									body+='<td style="font-weight: 300">'+data[i].contact+'</td>';
									body+='<td style="font-weight: 300">'+data[i].adult+'</td>';
									body+='<td style="font-weight: 300">'+data[i].child+'</td>';
									body+='<td style="font-weight: 300">'+data[i].arrival_date+'</td>';
									body+='<td style="font-weight: 300">'+data[i].departure_date+'</td>';
									body+='<td style="font-weight: 300">'+sub.toLocaleString(undefined,  { minimumFractionDigits: 2 }  )+'</td>';
									body+='</tr>';
								} $('#reports_daily').html(body); 
							}  
						})  
					}  
					$(document).on('click', '.daily_link', function(){  
						var page = $(this).attr("id");  
						load_data(page);  
					});  
				}); 
			</script>  
		</body>
		</html>
