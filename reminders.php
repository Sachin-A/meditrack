<?php
include 'db_connect.php';
session_start();

if(isset($_POST['submit']))
{
	$uname = $_POST['uname'];
	$remainder = $_POST['rem'];
	$d_time = $_POST['time'];

	$query1 = "SELECT `u_id` from user_details where uname='$uname';";
	$r1 = mysqli_query($h,$query1) or die("error....");

	$arr1=mysqli_fetch_array($r1);
	$u_id = $arr1['u_id'];

	$query_ins = "INSERT INTO reminders values($u_id , '$remainder' , '$d_time');";
	
	$r_ins = mysqli_query($h, $query_ins) or die("Error.....");
	echo "reminder successfully added!";

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
	<body>
		<div class="intro-header" style="background-repeat:repeat">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="index" class="intro-message" style="padding-top:0%;padding-bottom:0%;">
			<h1><i class="fa fa-heart faa-pulse faa-fast animated"></i> MEDI TRACK </h1>
			<hr class="intro-divider">
			<h1><a class="btn btn-primary" style="font-size:18px;" role="button" data-toggle="collapse" href="#formcollapse" aria-expanded="false" aria-controls="formcollapse"><i class="fa fa-list faa-horizontal animated"></i>&nbsp;&nbsp  ADD REMINDERS </a></h1>
			</br>
			<div class="collapse" id="formcollapse" aria-expanded="false">
				</br>
				<form id="form" method="post" action="reminders.php">
				<div>
					<label>
						<span>Username: </span>
						<input placeholder="Enter username" class="form-control form-control-warning" type="text" name="uname" tabindex="1" autofocus required>
					</label>
				</div>
				<div>
					<label>
						<span>Remainder: </span>
						<input placeholder="Enter remainder" class="form-control form-control-warning" type="text" name="rem" tabindex="2" autofocus required>
					</label>
				</div>
				<div>
					<label>
						<span>Time: </span>
						<input class="form-control form-control-warning" type="datetime-local" name="time" tabindex="3" autofocus required>
					</label>
				</div>
				<div>
					<button name="submit" type="submit" class="btn btn-primary" id="submit">Submit</button>
				</div>
				</form>
				</br>
			</div>
		</div>
			</div>
					</div>
				</div>
			</div>
			
<?php 
			if(isset($_SESSION['u_id']))
				$id=$_SESSION['u_id'];
			else
				$id = $_SESSION['u_i'];
		$query_loop = "SELECT * FROM reminders where u_id = $id;";
		$r_loop = mysqli_query($h,$query_loop) or die("error..");
		
		while($arrl = mysqli_fetch_array($r_loop))
		{
			echo '<div class="panel panel-success">
				  	<div class="panel-body">'.$arrl["description"].'</div>
				  	<div class="panel-footer">'.$arrl["alloted_time"].'</div>
				</div>';
		}
	?>		
		</div>	
	</body>
</html>