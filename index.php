<?php 
session_start();
if(!isset($_SESSION['u_hash']))
	header("Location:/meditrack/land.html");


?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MEDI TRACK</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/landing-page.css" rel="stylesheet">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/jquery-2.1.1.min.js"></script>
	</head>

	<body>
			<div id="index" class="text-center">
			<h2>MEDI TRACK</h2>
			<a href="#" style="float:left"><i class="fa fa-cog">SETTINGS</i></a>
			<p class="container">View/edit patient history, log/monitor daily schedule and set reminders for daily tasks!</p>
			<p class="container">
				<a href="#"><i class="fa fa-heart"> PATIENT HISTORY </i></a>
				<a href="#"><i class="fa fa-list-alt"> DAILY LOG </i></a>
				<a href="#"><i class="fa fa-tasks"> REMINDERS </i></a>
				<a href="#"><i class="fa fa-ambulance"> EMERGENCY </i></a>
			</p>
			</div>
	</body>
</html>
