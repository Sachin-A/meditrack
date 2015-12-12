<?php 
include 'db_connect.php';
session_start();

$id=$_SESSION['u_i'];
	$q = "SELECT `type` from user_details where u_id = $id;";
	$r = mysqli_query($h,$q) or die("Error....");
	$arr_T = mysqli_fetch_array($r);
	$type = $arr_T['type'];
if(!isset($_SESSION['u_i']))
	header("Location:/meditrack/land.html");


if(isset($_POST['submit']))
{
	$uname = mysqli_real_escape_string($h , $_POST['uname']);
	$date = mysqli_real_escape_string($h , $_POST['dt'] );

	$s_level = mysqli_real_escape_string($h ,$_POST['sl']);
	$bp = mysqli_real_escape_string($h , $_POST['bp']);
	$d = mysqli_real_escape_string($h ,$_POST['disease_desc']);
	$symptoms = mysqli_real_escape_string($h , $_POST['symp']);
	$cmt = mysqli_real_escape_string($h , $_POST['cmts']);

	
	$q_uname = "SELECT `u_id`  , `imgs_uploaded` from user_details where uname='$uname';";
	$res = mysqli_query($h , $q_uname);
	$arr = mysqli_fetch_array($res);
	$filename = $uname.'_'.(string)($arr['imgs_uploaded']+1).'.png';
	$imgs = $arr['imgs_uploaded']+1;

	$query_img = "UPDATE user_details set imgs_uploaded=$imgs where uname='$uname';";
	$res_img = mysqli_query($h,$query_img) or die("error.."); 

	$p_id = mysqli_real_escape_string($h,$arr['u_id']);
	
	$query = "INSERT INTO patient_history values($p_id , $id , NOW(),$s_level , $bp , '$d' , '$symptoms' ,'$cmt' , $imgs);";
	$res = mysqli_query($h,$query);
	$path = $_SERVER['DOCUMENT_ROOT'].'/meditrack/uploads/'.$filename;
	
	move_uploaded_file($_FILES['upload_file']['tmp_name'], $path);

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
   <body>
      <div id="login" class="text-center">
         <?php if($type!=3){ ?>
         <a class="btn btn-primary" role="button" data-toggle="collapse" href="#form" aria-expanded="false" aria-controls="collapseExample">
         <i class="fa fa-heart"> ADD PATIENT HISTORY </i>
         </a>
         <div class="collapse" id="form" aria-expanded="false">
            <form id="form" method="post" action="ph.php" enctype="multipart/form-data">
               <div class="form-group">
                  <label>
                  <span>uname: </span>
                  <input placeholder="Please enter your full name" type="text" name="uname" class="form-control" tabindex="1" autofocus required>
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
                  <span>Disease Description: </span>
                  <textarea name="disease_desc" class="form-control" tabindex="7" required></textarea>
                  </label>
               </div>
               <div class="form-group">
                  <label>
                  <span>Symptoms: </span>
                  <textarea name="symp" class="form-control" tabindex="8" required></textarea>
                  </label>
               </div>
               <div class="form-group">
                  <label>
                  <span>Comments: </span>
                  <textarea name="cmts" class="form-control" tabindex="9" required></textarea>
                  </label>
               </div>
               <label class="file">
               <input type="file" id="file" name="upload_file" accept="image/gif,image/jpeg,image/jpg,image/png">
               <span class="file-custom"></span>
               </label>
               <button name="submit" type="submit" class="btn btn-primary" id="submit">Submit</button>
            </form>
         </div>
         <?php }?>
         <ul class="nav nav-pills nav-justified">
            <li role="presentation" class="active">
               <a href="#atr" class="btn btn-primary" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="atr">By Attribute</a>
               <div class="collapse" id="atr" aria-expanded="false">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                     <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                           <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Sugar Levels
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
                              Heart Rate
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
            </li>
            <li role="presentation" class="active">
               <a href="#dat" class="btn btn-primary" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="dat">By Date</a>
               <div class="collapse" id="dat" aria-expanded="false">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                     <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="h1">
                           <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#date1" aria-expanded="true" aria-controls="date1">
                              Date 1
                              </a>
                           </h4>
                        </div>
                        <div id="date1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h1">
                           <div class="panel-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                           </div>
                        </div>
                     </div>
                     <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="h2">
                           <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#date2" aria-expanded="false" aria-controls="date2">
                              Date 2
                              </a>
                           </h4>
                        </div>
                        <div id="date2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h2">
                           <div class="panel-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                           </div>
                        </div>
                     </div>
                  </div>
				</div>
            </li>
            </div>
         </ul>
      </div>
   </body>
</html>
