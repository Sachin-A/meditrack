<?php 
include 'db_connect.php';
session_start();

if(!isset($_SESSION['u_i']))
	header("Location:/meditrack/land.html");


if(isset($_POST['submit']))
{
	$fname = mysqli_real_escape_string($h , $_POST['fname']);
	$date = mysqli_real_escape_string($h , $_POST['dt'] );

	$s_level = mysqli_real_escape_string($h ,$_POST['sl']);
	$bp = mysqli_real_escape_string($h , $_POST['bp']);
	$d = mysqli_real_escape_string($h ,$_POST['disease']);
	$symptoms = mysqli_real_escape_string($h , $_POST['symp']);
	$id=$_SESSION['u_i'];

	$q_uname = "SELECT `uname` , `imgs_uploaded` from user_details where u_id=$id";
	$res = mysqli_query($h , $q_uname);
	$arr = mysqli_fetch_array($res);
	$filename = $arr['uname'].'_'.(string)($arr['imgs_uploaded']+1);

	move_uploaded_file($_FILES['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/meditrack/uploads/'.$filename);
	echo "Done uploading successfully!";
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
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>

	<body style="overflow:hidden">
			<div id="login" class="text-center">
			<a class="btn btn-primary" role="button" data-toggle="collapse" href="#form" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-heart"> ADD PATIENT HISTORY </i></a>
			<div class="collapse" id="form" aria-expanded="false">
			<form id="form" method="post" action="ph.php">
			<div class="form-group">
				<label>
					<span>Name: </span>
					<input placeholder="Please enter your full name" type="text" name="fname" class="form-control" tabindex="1" autofocus required>
				</label>
			</div>
			<div class="form-group">
				<label>
					<span>Date: </span>
					<input type="date" name="dt" tabindex="2" required>
				</label>
			</div>
			<div class="form-group">
				<label>
					<span>Sugar Level: </span>
					<input type="number" name="sl" class="form-control" tabindex="3" required>
				</label>
			</div>
			<div class="form-group">
				<label>
					<span>BP Level</span>
					<input type="number" name="bp" class="form-control" tabindex="6" required>
				</label>
			</div>
			<div class="form-group">
				<label>
					<span>Disease: </span>
					<textarea name="disease" class="form-control" tabindex="7" required></textarea>
				</label>
			</div>
			<div class="form-group">
				<label>
					<span>Symptoms: </span>
					<textarea name="symp" class="form-control" tabindex="7" required></textarea>
				</label>
			</div>
			<label class="file">
			<input type="file" id="file" name="file_upload">
			<span class="file-custom"></span>
			</label>
				<button name="submit" type="submit" class="btn btn-primary" id="submit">Submit</button>
			</form>
			</div>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  </div>
			</div>
	</body>
</html>