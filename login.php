<?php
include 'db_connect.php';

session_start();
if(isset($_POST['submit'])){ 
if(isset($_POST['uname'])  && isset($_POST['pwd']))
{  
	if($_POST['uname']!='' && $_POST['pwd']!=''){
	$uname = mysqli_real_escape_string($h , $_POST['uname']);
	$pwd = sha1(mysqli_real_escape_string($h , $_POST['pwd']));

	$query = "SELECT `u_id` , `type` from user_details where `uname`='$uname' AND `pwd`='$pwd';";
	$res=mysqli_query($h , $query) or die("Error ...");
    $rows = mysqli_num_rows($res);

    if(!$rows)
    	$err_cred = "Invalid Credentials .";

	else{
		header("Location:/meditrack");
		$arr = mysqli_fetch_array($res);
		$_SESSION['u_i']=$arr['u_id'];
	}
}
else{
	if (isset($_POST['uname'])!='') {
		$err_uname = "Please fill in the username field";

	}
	if (!isset($_POST['pwd'])!='') {
		$err_pwd = "Please fill in the password field";

}
}


}
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
						<div id="index" class="intro-message" style="padding-top:0%;padding-bottom:30%;">
						<h1><i class="fa fa-heart faa-pulse faa-fast animated"></i> MEDI TRACK</h1>
							<hr class="intro-divider">
			<h2><i class="fa fa-sign-in faa-passing faa-slow animated"></i>&nbsp;&nbsp; LOGIN</h2>
			<form id="form" action="login.php" method="post"> 
			<div class="form-group">
				<label>
					<span>Username: </span>
					<input placeholder="Enter your username" type="text" name="uname" tabindex="1" autofocus required>
					<span class="error"><?php if(isset($err_uname)) echo $err_uname;?></span>
				</label>
			</div>
			<div class="form-group">
				<label>
					<span>Password: </span>
					<input placeholder="Enter your password" type="password" name="pwd" tabindex="2" required>
					<span class="error"><?php if(isset($err_pwd)) echo $err_pwd;?></span>
				</label>
			</div>
			<div>
				<button name="submit" type="submit" id="submit" class="btn btn-primary">Submit</button>
				<span class="error"><?php if(isset($err_cred)) echo $err_cred;?></span>
			</div>
			</form>
			</br>
			<span>Please click <a href="register.php">Here</a> to register</span>
			</div>
			</div>
	  </div>
	  </div>
	  </div>
	  </div>
	</body>
</html>
