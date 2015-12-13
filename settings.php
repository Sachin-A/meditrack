<?php
include 'db_connect.php';
session_start();
include 'chck.php';
if(isset($_POST['submit']))
{
	if($_POST['uname']!='')
	{	

		$uname = mysqli_real_escape_string($h ,$_POST['uname']);
		$type = mysqli_real_escape_string($h ,$_POST['type']);
		$query1	= "SELECT `u_id` from user_details where uname='$uname' and type = $type;";
		$res1= mysqli_query($h,$query1) or die("Error");
		$rows1 = mysqli_num_rows($res1);
		$arr = mysqli_fetch_array($res1);
		$user = $_SESSION['u_i'];
				

		if($rows1!=0)
		{	
			
			$uid=$arr['u_id'];
			if(chck($uid , $_POST['type'] , $user , $h)==1)
			{
				echo "<span style='font-size:20px;color:red;font-weight:bold;'>This person already tracks you</span>";
				
				
			}
			
			else				
				$person = ($type==2)?"doctors":"u_trackers";
		
		}
		
		else
			{
				echo "Please enter the username of a valid doctor or a tracker";
			}
			
		if(isset($person))
			{	
				$query2 = "UPDATE user_details SET $person=CONCAT($person,'$uid".";') WHERE u_id=$user;";
				$query3 = "UPDATE user_details SET patients = CONCAT(patients ,'$user".";') WHERE u_id=$uid;";
				$res2= mysqli_query($h,$query2) or die("Error in query ...".mysqli_error($h));
				$res3=mysqli_query($h,$query3) or die("Error in Query..");
				echo "You have successfully added ".$uname." to track you !";
			}	
		}
       else 
       	echo "Please enter in a proper username.";
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
						<div id="index" class="intro-message" style="padding-top:3%;padding-bottom:30%;">
							<h1><i class="fa fa-heart faa-pulse faa-fast animated"></i> MEDI TRACK</h1>
							<hr class="intro-divider">
							<a class="btn btn-primary" role="button" data-toggle="collapse" href="#formcollapse" aria-expanded="false" aria-controls="formcollapse"><i class="fa fa-user-md faa-tada animated"></i>&nbsp;&nbsp ADD DOCTORS/TRACKERS &nbsp;&nbsp<i class="fa fa-user faa-tada animated"></i></a>
							<div class="collapse" id="formcollapse" aria-expanded="false">
								<form id="form" method="post" action="settings.php">
								<div>
									<label>
										<span>Username: </span>
										<input placeholder="Enter your username" class="form-control form-control-warning" type="text" name="uname" tabindex="1" autofocus required>
									</label>
								</div>
								<div>
									<label>
										<span>Type: </span>
										<select name="type" tabindex="2" class="form-control" required>
											<option value="2">Doctor</option>
											<option value="3">Tracker</option>
										</select>
									</label>
								</div>
								<div>
									<button name="submit" type="submit" class="btn btn-primary" id="submit">Submit</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
		
	</body>
</html>