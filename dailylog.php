<?php
include 'db_connect.php';

if(isset($_POST['submit']))
{	$uname = $_POST['uname'];
	$dt = $_POST['dt'];
	$h_b = $_POST['bf'];
	$mt = $_POST['mtabl'];
	$h_l = $_POST['lu'];
	$at= $_POST['atabl'];
	$h_d = $_POST['dn'];
	$bs = $_POST['bs'];
	$bp = $_POST['bp'];
	
	$q1 = "SELECT `u_id` from user_details where uname='$uname';";
	$r1=mysqli_query($h,$q1);
	$arr= mysqli_fetch_array($r1);
	$id = $arr['u_id'];

	$query = "INSERT INTO daily_log values($id , $h_b,$mt,$h_l,$at ,$h_d , $bs,$bp );";
	$r = mysqli_query($h, $query);
	echo "daily log updated!"
	//to be validated
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
		<script src="table/build/table-edits.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
		<div class="intro-header" style="background-repeat:repeat; color:white;">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="index" class="intro-message" style="padding-top:3%;padding-bottom:20%;">
						<p><a class="btn btn-primary" role="button" data-toggle="collapse" href="#form" aria-expanded="false" aria-controls="collapseExample">
						 <i class="fa fa-calendar faa-float faa-fast animated"></i> ADD DAILY LOG
						 </a></p>
						 </br></br>
						 <div class="collapse" id="form" aria-expanded="false">
							<form id="form" method="post" action="dailylog.php">
							   <div class="form-group">
								  <label>
								  <span>Username: </span>
								  <input placeholder=" Enter your user name" type="text" name="uname" class="form-control" tabindex="1" autofocus required>
								  </label>
							   </div>
							   <div class="form-group">
								  <label>
								  <span>Date: </span>
								  <input type="date" name="dt" tabindex="2" class="form-control" required>
								  </label>
							   </div>
							   <div>
									<label>
										<span>Had Breakfast? </span>
										<select name="bf" tabindex="3" class="form-control" required>
											<option value="1">Yes</option>
											<option value="2">No</option>
											<option value="3">Partially</option>
										</select>
									</label>
								</div>
								<div>
									<label>
										<span>Took morning tablets & injection?: </span>
										<select name="mtabl" tabindex="4" class="form-control" required>
											<option value="1">Yes</option>
											<option value="2">No</option>
											<option value="3">Partially</option>
										</select>
									</label>
								</div>
								<div>
									<label>
										<span>Had Lunch? </span>
										<select name="lu" tabindex="5" class="form-control" required>
											<option value="1">Yes</option>
											<option value="2">No</option>
											<option value="3">Partially</option>
										</select>
									</label>
								</div>
								<div>
									<label>
										<span>Took afternoon tablets & injection: </span>
										<select name="atabl" tabindex="6" class="form-control" required>
											<option value="1">Yes</option>
											<option value="2">No</option>
											<option value="3">Partially</option>
										</select>
									</label>
								</div>
								<div>
									<label>
										<span>Had dinner? </span>
										<select name="dn" tabindex="7" class="form-control" required>
											<option value="1">Yes</option>
											<option value="2">No</option>
											<option value="3">Partially</option>
										</select>
									</label>
								</div>
								<div class="form-group">
								  <label>
								  <span>Blood Sugar: </span>
								  <input placeholder=" In mg/dL" type="text" name="bs" class="form-control" tabindex="8" autofocus required>
								  </label>
							   </div>
							   <div class="form-group">
								  <label>
								  <span>Blood Pressure: </span>
								  <input type="text" name="bp" class="form-control" tabindex="9" autofocus required>
								  </label>
							   </div>
							   <div>
									<label>
										<span>Motion Passed? </span>
										<select name="dn" tabindex="10" class="form-control" required>
											<option value="1">Yes</option>
											<option value="2">No</option>
											<option value="3">With Difficulty</option>
										</select>
									</label>
								</div>
							    <div class="form-group">
								  <label>
								  <span>Comment: </span>
								  <textarea placeholder="Any other pain experienced?" name="comm" class="form-control" tabindex="11" required></textarea>
								  </label>
							    </div>
								<div>
							    <label class="file">
							    <input type="file" id="file" name='file_upload'>
							    <span class="file-custom"></span>
							    </label>
								</div>
								<div>
								<label>
							    <button name="submit" type="submit" class="btn btn-primary" id="submit">Submit</button>
								</label>
								</div>
							 </form>
						  </div>
<<<<<<< HEAD
						  <table class="table table-bordered">
							<tr style="background-color:#34495E; color:#1B1E25">
						    <th>Data</th>
							<th>Data</th>
							<th>Data</th>
							<th>Data</th>
							<th>Data</th>
							<th>Data</th>
							</tr>
							<tr style="background-color:#34495E">
						    <td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							</tr>
							<tr style="background-color:#34495E">
						    <td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							</tr>
							<tr style="background-color:#34495E">
						    <td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							</tr>
							<tr style="background-color:#34495E">
						    <td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							</tr>
							<tr style="background-color:#34495E">
						    <td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							<td>Data</td>
							</tr>
						  </table>
						  </br>
						</div>
					</div>
				</div>
			</div>
		</div>	
		</br>
	</body>
</html>