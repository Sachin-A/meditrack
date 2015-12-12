<?php 
include 'db_connect.php';
if(isset($_POST['submit'])){
	$uname = $_POST['uname'];
	$fname = $_POST['fname'];
	$pwd = sha1($_POST['pwd']);
	$dob = $_POST['dt'];
	$ph_no = $_POST['ph'];
	$email = $_POST['email'];
	$addr = $_POST['addr'];
	$type = $_POST['type'];
	$query = "INSERT INTO user_details(`uname` , `full_name` , `pwd` , `dob` , `ph_no` , `address` ,`email` ,`type`) VALUES('$uname' , '$fname' , '$pwd' , '$dob' ,$ph_no , '$addr' , '$email' , {$type});";


	$res = mysqli_query($h , $query) or die("Error ...".mysqli_error($h)) ;
	if(mysqli_error($h)=='')
	echo 'Thank you for registering ! Please Click <a href="login.php">Here</a> to login';	
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
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery.js"></script>
	</head>

	<body>
			<div id="login" class="text-center">
			<h2>REGISTER</h2>
			<form id="form" method="post" action="register.php">
			<div>
				<label>
					<span>Name: </span>
					<input placeholder="Please enter your full name" type="text" name="fname" tabindex="1" autofocus required>
				</label>
			</div>
			<div>
				<label>
					<span>Username: </span>
					<input placeholder="Please enter your username" type="text" name="uname" tabindex="2" autofocus required>
				</label>
			</div>
			<div>
				<label>
					<span>Password: </span>
					<input placeholder="Please enter your password" type="password" name="pwd" tabindex="3" required>
				</label>
			</div>
			<div>
				<label>
					<span>Date of Birth: </span>
					<input type="date" name="dt" tabindex="4" required>
				</label>
			</div>
			<div>
				<label>
					<span>Phone Number: </span>
					<input type="number" name="ph" tabindex="5" required>
				</label>
			</div>
			<div>
				<label>
					<span>Email: </span>
					<input type="email" name="email" tabindex="6" required>
				</label>
			</div>
			<div>
				<label>
					<span>Address: </span>
					<textarea name="addr" tabindex="7" required></textarea>
				</label>
			</div>
			<div>
				<label>
					<span>Type: </span>
					<select name="type" tabindex="8" required>
						<option value="1">Patient</option>
						<option value="2">Doctor</option>
						<option value="3">Tracker</option>
					</select>
				</label>
			</div>
			<div>
				<button name="submit" type="submit" id="submit">Submit</button>
			</div>
			</form>
			<span>Please click <a href="login.php">Here</a> to login</span>
			</div>
	</body>
</html>
