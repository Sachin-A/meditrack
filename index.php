<?php 
session_start();
if(!isset($_SESSION['u_i']))
	header("Location:/meditrack/land.html");

if(isset($_GET['logout']))
{
	unset($_SESSION['u_i']);
	header("Location:/meditrack/land.html");
}
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
		<link rel="stylesheet" href="font-awesome/font-awesome-animation/vendor/font-awesome-animation.css">
		<link rel="stylesheet" href="font-awesome/font-awesome-animation/dist/font-awesome-animation.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>

	<body style="overflow:hidden">
			<div class="intro-header">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div id="index" class="intro-message">
							<h1><i class="fa fa-heart faa-pulse faa-fast animated"></i>&nbsp;&nbspMEDI TRACK</h1>
							<hr class="intro-divider">
							<a href="settings.php" class="btn btn-default btn-lg" style="float:left"><i class="fa fa-spin fa-cog"></i> SETTINGS </a>
							<a href="index.php?logout=1" class="btn btn-default btn-lg" style="float:right"><i class="fa fa-sign-out faa-passing animated"></i>&nbsp;&nbsp LOG OUT </a>
							<h3 class="container">View/edit patient history, log/monitor daily schedule and set reminders for daily tasks!</h3>
							<ul class="list-inline">
								<li>
									<a href="ph.php" class="btn btn-default btn-lg"><span class="network-name"><i class="fa fa-heart faa-pulse animated"></i>&nbsp;&nbsp PATIENT HISTORY</span></a>
								</li>
								<li>
									<a href="#" class="btn btn-default btn-lg"><span class="network-name"><i class="fa fa-list-alt faa-horizontal animated"></i>&nbsp;&nbsp DAILY LOG </span></a>
								</li>
								<li>
									<a href="#" class="btn btn-default btn-lg"><span class="network-name"><i class="fa fa-tasks faa-flash animated"></i>&nbsp;&nbsp REMINDERS </span></a>
								</li>
								<li>
									<a href="#" class="btn btn-default btn-lg"><span class="network-name"><i class="fa fa-ambulance faa-horizontal animated"></i>&nbsp;&nbsp EMERGENCY </span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</body>
</html>
