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
	<body style="overflow:hidden;" class="text-center">
		<div class="container">
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
						<input placeholder="Please enter your username" class="form-control form-control-warning" type="text" name="rem" tabindex="2" autofocus required>
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
			<div class="panel panel-success">
				<div class="panel-body">Reminder 1</div>
				<div class="panel-footer">Time</div>
			</div>
			<div class="panel panel-success">
				<div class="panel-body">Panel content</div>
				<div class="panel-footer">Panel footer</div>
			</div>
			<div class="panel panel-success">
				<div class="panel-body">Panel content</div>
				<div class="panel-footer">Panel footer</div>
			</div>
		</div>	
	</body>
</html>