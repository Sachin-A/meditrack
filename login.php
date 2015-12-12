<?php
include 'db_connect.php';

if(isset($_POST['submit'])){ 
if(isset($_POST['uname'])  && isset($_POST['pwd']))
{  
	if($_POST['uname']!='' && $_POST['pwd']!=''){
	$uname = mysqli_real_escape_string($h , $_POST['uname']);
	$pwd = sha1(mysqli_real_escape_string($h , $_POST['pwd']));

	$query = "SELECT `u_id` from user_details where `uname`='$uname' AND `pwd`='$pwd';";
	$res=mysqli_query($h , $query) or die("Error ...");
    $rows = mysqli_num_rows($res);

    if(!$rows)
    	$err_cred = "Invalid Credentials .";
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
        <title>Medi Track</title>
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/css/bootstrap-theme.css" type="text/css" media="screen" />
        <script src="bootstrap-3.3.6-dist/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans|Baumans' rel='stylesheet' type='text/css'>
	</head>

	<body>
			<div id="login" class="text-center">
			<h2>LOGIN</h2>
			<form id="form" action="login.php" method="post"> 
			<div>
				<label>
					<span>Username: </span>
					<input placeholder="Please enter your username" type="text" name="uname" tabindex="1" autofocus required>
					<span class="error"><?php if(isset($err_uname)) echo $err_uname;?></span>
				</label>
			</div>
			<div>
				<label>
					<span>Password: </span>
					<input placeholder="Please enter your password" type="password" name="pwd" tabindex="2" required>
					<span class="error"><?php if(isset($err_pwd)) echo $err_pwd;?></span>
				</label>
			</div>
			<div>
				<span class="error"><?php if(isset($err_cred)) echo $err_cred;?></span>
			</div>
			<div>
				<button name="submit" type="submit" id="submit">Submit</button>
			</div>
			</form>
			</div>
	</body>
</html>
