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

	<body overflow="hidden">
		<div class="intro-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="index" class="intro-message">
							<h2>MEDI TRACK</h2>
							<hr class="intro-divider">
							<a class="btn btn-primary" role="button" data-toggle="collapse" href="#formcollapse" aria-expanded="false" aria-controls="formcollapse"><i class="fa fa-heart"> ADD DOCTORS/TRACKERS </i></a>
							<div class="collapse" id="formcollapse" aria-expanded="false">
								<form id="form" method="post" action="settings.php">
								<div>
									<label>
										<span>Username: </span>
										<input placeholder="Please enter your username" class="form-control form-control-warning" type="text" name="uname" tabindex="1" autofocus required>
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