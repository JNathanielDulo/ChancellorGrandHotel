<?php
session_start();
require "../php/connection.php";
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
<body class="fixed-sn black-skin" style="background: whitesmoke">
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
				<li class="breadcrumb-item"><a href="checkin.php" style="font-size: 15px;font-weight: 300"><i class="fa fa-calendar-plus-o"></i> Checkin</a></li> <li class="breadcrumb-item" style="font-size: 15px;font-weight: 300"><i class="fa fa-user-o"></i> Guest Info</a></li>
			</ol>
		</div>
		<ul class="nav navbar-nav ml-auto flex-row">
			<li class="nav-item dropdown">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge red count" style="border-radius: 10px;"></span><i class="fa fa-bell"></i> <span class="hidden-sm-down">Notifcation</span></a>
					<div class="dropdown-menu dropdown-menu-right" id="notif_id">
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
			<!--Ongoing page-->
			<main>
				<div class="container" style="margin-top:5%;margin-left: -2%">
					<div class="row">
						<div class="col-lg-6" style="margin-top:0%">
							<div class="row">
								<div class="col-lg-12">
									<form action="php/add_walking_booking.php?room_id=<?php echo $_GET['room_id']; ?>" method="post" id="myForm" onmouseout="setWalkin()">
										<div class="example z-depth-1" style="width:100%;height:100%;background-color: white">
											<h2 class="z-depth-1" style="background-color:#2ad1a3;position:relative;top:-30px;margin-left:35px;margin-right:35px;text-align:center;padding:20px;border-radius:5px;color:white"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Guest Information</h2>
											<div style="padding-left:20px;padding-right:20px;">
												<div class="row">
													<div class="col-lg-6">
														<div class="md-form">
															<i class="fa fa-hashtag prefix"></i>
															<input type="text" name="valid_id"  placeholder="Valid ID" id="form5" class="form-control validate" required   title="9 Digits Required">
														</div>
													</div>
													<div class="col-lg-6" style="margin-top:1.1%">
														<div class="md-form">
															<select id="discount"  class="mdb-select" align="center">
																<option value="0">Regular</option>
																<option value=".2">Senior</option>
															</select>
															<label>Type of Guest</label>
														</div>
													</div>
													<input type="hidden" value="Regular" name="guest" id="copy_guest" /> 
													<div class="col-lg-6">
														<div class="md-form">
															<i class="fa fa-user prefix"></i>
															<input type="text" name="fname" placeholder="Firstname" id="form5" class="form-control validate" required  pattern="[a-zA-Z]{4,}" title="Input more than 3 letters">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="md-form ">
															<i class="fa fa-user prefix"></i>
															<input type="text" name="lname" placeholder="Lastname" id="form6" class="form-control validate" required pattern="[a-zA-Z]{4,}" title="Input more than 3 letters">
														</div>
													</div>
													<div class="col-lg-12">
														<div class="md-form ">
															<i class="fa fa-map-marker prefix"></i>
															<input type="text" name="address" placeholder="Address" id="form7" class="form-control validate" required  title="Set your Address">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="md-form ">
															<i class="fa fa-mobile prefix"></i>
															<input type="text" name="contact" placeholder="Contact No" id="form8" class="form-control validate" required pattern="[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}" title="Number format +xx(xx)xxxx-xxxx">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="md-form ">
															<i class="fa fa-phone prefix"></i>
															<input type="text" name="landline" placeholder="Phone No" id="form8" class="form-control validate" required pattern="[0-9]{4,}-[0-9]{4,}" title="Number format xxx-xxxx">
														</div>
													</div>
													<div class="col-lg-6">
														<div class="md-form ">
															<i class="fa fa-envelope prefix"></i>
															<input type="email" name="email" placeholder="Email Address" id="form8" class="form-control validate" required title="Enter you Email Address">
														</div>
													</div><!--ET-->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-12" style="margin-top:2%">
										<div class="example z-depth-1" style="width: 100%;height:100%;background-color: white">
											<div style="padding-left:10%;padding-right:10%;padding-top: 5%;padding-bottom: 5%">
												<div class="row">
													<div class="col-lg-12">
														<h5>Room Selected</h5>
														<table class="table table-bordered">
															<tbody>
																<?php
																$id = $_GET['id'];
																$sql = mysqli_query($db,"SELECT * FROM accomodation WHERE room_id = '$id' ");
																while ($rows = mysqli_fetch_array($sql)) {
																	?>
																	<tr>
																		<td><?php echo $rows[1] ?></td>
																		<td>P<?php echo $rows[3]?>/night</td>
																		<input type="hidden" value="<?php echo $rows[1] ?>" name="room_name" />
																		<input type="hidden" value="<?php echo $rows[3] ?>" name="room_price" />
																		<input type="hidden" value="<?php echo $rows[3]?>" id="price" ?>
																	</tr>
																	<?php
																}
																?>
															</tbody>
														</table>
														<input type="hidden" id="days"/>
													</div>
													<div class="col-lg-6" style="margin-top:5%">
														<div class="md-form">
															<i class="fa fa-calendar-check-o prefix"></i>
															<input type="text" name="arrival_date" id="arrival"  placeholder=" "  class="form-control"   />
															<label for="arrival">Check-in</label>
														</div>
													</div>
													<div class="col-lg-6"  style="margin-top:5%">
														<div class="md-form">
															<i class="fa fa-calendar-times-o prefix"></i>
															<input type="text" name="departure" placeholder=" " id="departure" class="form-control">
															<label for="departure">Check-out</label>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="md-form"  style="text-align: center;text-align-last: center;">
															<select  class="mdb-select" align="center">
																<option value="2">2</option>
																<option value="3">3</option>
															</select>
															<input type="hidden" name="adult" value="2">
															<input type="hidden" name="child" value="2">
															<label>Adult</label>
														</div>
													</div>
													<div class="col-lg-6" style="margin-top:1.1%">
														<div class="md-form"  style="text-align: center;text-align-last: center;">
															<select name="child" class="mdb-select" align="center">
																<option value="2">2</option>
																<option value="3">3</option>
															</select>
															<label>Child</label>
														</div>
													</div>
													<div class="col-lg-12" align="right">
														<h4 id="output_price"></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12" style="margin-top: 2%" align="center">
									<div class="example z-depth-1" style="width:100%;height:100%;background-color: white">
										<div style="padding-left:20px;padding-right:20px;padding-top:20px;padding-bottom: 0px">
											<div class="row">
												<div class="col-lg-6" align="left">
													<div class="md-form">
														<i class="fa  prefix"> ₱</i>
														<input type="text" id="change" placeholder="₱ 0.00" class="form-control" disabled>
														<label >Change:</label>
													</div>
												</div>
												<div class="col-lg-6" align="left">
													<div class="md-form">
														<i class="fa  prefix"> ₱</i>
														<input type="text" id="payment" onchange="changeMoney()" class="form-control">
														<label for="payment">Payment:</label>
														<input type="hidden" id="total_cost_value" name="total_cost_value"> 
														<input type="hidden" id="change"> 
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-12" style="margin-top:2%" align="center">
									<button type="button" data-toggle="modal" data-target="#password" class="btn" style="background-color: #2ad1a3">Submit</button>
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
									$sql = "SELECT * FROM admin WHERE username='".$_SESSION['username']."' ";
									$results = mysqli_query($db,$sql);
									if(mysqli_num_rows($results) > 0){
										while($rows = mysqli_fetch_array ($results))
										{
											?>
											<!--Header-->
											<div class="modal-header">
												<img src="../../asset/img/admin/<?php echo $rows[8];?>" class="rounded-circle" style="width:100%;height: auto!important">
											</div>
											<!--Body-->
											<div class="modal-body text-center mb-1">

												<h5 class="mt-1 mb-2"><?php echo $rows[1];?></h5>

												<div class="md-form ml-0 mr-0">
													<input name="password" type="password" type="text" id="form18" class="form-control ml-0">
													<label for="form18" class="ml-0">Enter password</label>
												</div>

												<div class="text-center">
													<button  type="submit" name="password_admin"  class="btn mt-1" style="background-color: #2ad1a3">Login <i class="fa fa-sign-in ml-1"></i></button>
												</div>
											</div>
										</div>
										<?php
									}
								}
								?>
								<!--/.Content-->
							</div>
							<!--/Modal: Avatar-->
						</form>
					</div><!--End Cfontainer-->
				</main>
				<!--/Ongoing page-->
				<!-- SCRIPTS -->
				<script type="text/javascript" src="../../vendor/js/compiled.min.js"></script>
				<script type="text/javascript" src="../../vendor/js/checkers.js"></script>
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
						$('#departure')[0].focus();
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
				<script>
					$(".button-collapse").sideNav();
					var el = document.querySelector('.custom-scrollbar');
					Ps.initialize(el);
				</script>
				<script type="text/javascript">
					$(document).ready(function() {
						$('.mdb-select').material_select();
					});
				</script>
			</body>
			</html>
