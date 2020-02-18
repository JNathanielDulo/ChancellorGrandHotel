<?php

$db = mysqli_connect("localhost", "root", "", "hotel reservation");
$modif_from = date("Y-m-d", strtotime($_GET['from']));
$modif_to = date("Y-m-d", strtotime($_GET['to']));
?>
<!DOCTYPE html>
<html>
<head><title>Print canvas</title>
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
	<style>
	body{
		font-family:roboto;
		text-align:center
	} 
</style>
</head>
<body style="background-color: white;margin-top:2%">
	<div class="row">
		<div class="col-lg-6">
			<h1>Seorabeol Grand Leisure Hotel</h1>
			<ul style="list-style:none"><li>Waterfront Road, Subic Bay Freeport Zone Olongapo Zambales Philippines</li><li>+63 47 252 2765 / 2766</li>
			</ul>
			<li>
				<?php
				date_default_timezone_set('Asia/Manila');
				echo  date('M d, Y');
				?>
			</li></ul>
		</div>
		<div class="col-lg-6">
			<img src="../../asset/img/hotel/logoreal1.png" />
		</div>
	</div>
	<ul style="margin-top:4%">
		<li><h5>Summary Report for: <?php echo date("M d, Y",strtotime($modif_from))?> to <?php echo date("M d, Y",strtotime($modif_to))?> </h5></li>
		<li>Total Sum of Summary Cost
			<?php 
			$sql1 = mysqli_query($db,"SELECT SUM(total_cost) FROM booking WHERE arrival_date >= '2017-08-02' AND departure_date <= '2018-01-05'");
			while($row_sum = mysqli_fetch_array($sql1)) {
				?>
				: P
				<?php echo number_format($row_sum[0],2); ?>
				<?php
			}
			?></li>
		</ul>
		<table id="customers" class="table" style="margin-top:2%">
			<thead><th style="font-weight:500">Customer ID</th><th style="font-weight:500">Customer Name</th><th style="font-weight:500">Contact No</th><th style="font-weight:500">Adult</th><th style="font-weight:500">Child</th><th style="font-weight:500">Checkin</th><th style="font-weight:500">Checkout</th><th style="font-weight:500">Total Cost</th>
				<tbody>
					<?php
					$sql = mysqli_query($db, "SELECT * FROM booking WHERE arrival_date >= '$modif_from' AND departure_date <= '$modif_to'");
					while($rows = mysqli_fetch_array($sql)) {
						?>
						<tr>
							<td style="font-weight: 300"><?php echo $rows[0] ?></td>
							<td style="font-weight: 300"><?php echo $rows[1] ?> <?php echo $rows[2] ?></td>
							<td style="font-weight: 300"><?php echo $rows[4] ?></td>
							<td style="font-weight: 300"><?php echo $rows[9] ?></td>
							<td style="font-weight: 300"><?php echo $rows[10] ?></td>
							<td style="font-weight: 300"><?php echo $rows[7] ?></td>
							<td style="font-weight: 300"><?php echo $rows[8] ?></td>
							<td style="font-weight: 300"><?php echo $rows[12] ?></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</body>
		<script type="text/javascript" src="../../vendor/js/compiled.min.js"></script>
		<script type="text/javascript" src="../../vendor/js/chart.min.js"></script>
		<script type="text/javascript" src="graph/profit_chart.js"></script>
		<script type="text/javascript" src="graph/daily_chart.js"></script>
		<script type="text/javascript">
			function printGraph(e) {
				var restore = document.body.innerHTML;
				var print_content = document.getElementById(e).innerHTML;
				document.body.innerHTML = print_content;
				window.print();
				document.body.innerHTML = restore;
			}
			function printReport(e) {
				var restore = document.body.innerHTML;
				var print_content = document.getElementById(e).innerHTML;
				document.body.innerHTML = print_content;
				window.print();
				document.body.innerHTML = restore;
			}
		</script>
		</html>