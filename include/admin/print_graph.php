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
		text-align:center;
		background-color: white;
	} 
	#customers { 
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;border-collapse: collapse;
		width: 100%;
	}
	#customers td, #customers th { 
		border: 1px solid #ddd;padding: 8px;
	}
	#customers tr:nth-child(even){
		background-color: #f2f2f2;
	}
	#customers tr:hover {
		background-color: #ddd;
	}
	#customers th {padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #4CAF50;color: white;
	}
</style>
</head>
<body>
	<h1>Seorabeol Grand Leisure Hotel</h1>
	<ul style="list-style:none"><li>Waterfront Road, Subic Bay Freeport Zone Olongapo Zambales Philippines</li><li>+63 47 252 2765 / 2766</li>
		<li>
			<?php
			date_default_timezone_set('Asia/Manila');
			 echo  date('M d, Y');
			?>
		</li></ul>
		<div id="graphReports">
			<h4>Monthly Income of Year 2017</h4>
			<div id="monthly_income" style="width: 60%;">
				<canvas id="lineChart" ></canvas>
			</div>
			<h4>Most Occupied Rooms of Year 2017</h4>
			<div id="monthly_income" style="width: 60%;">
				<canvas id="barRoom" ></canvas>
			</div>
		</div>
		<div class="text-center"  style="margin-bottom: 80px;">
			<a href="#!" onclick="window.print()" class="btn green">Print Analytics</a>
		</div>
		</body>
		<script type="text/javascript" src="../../vendor/js/compiled.min.js"></script>
		<script type="text/javascript" src="../../vendor/js/chart.min.js"></script>
		<script type="text/javascript" src="graph/profit_chart.js"></script>
		<script type="text/javascript" src="graph/daily_chart.js"></script>
		</html>