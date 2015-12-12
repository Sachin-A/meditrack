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
		<script>
		$("table tr").editable({
		  // enable keyboard support
		  keyboard: true,
		  // double click to start editing
		  dblclick: true,
		  // enable edit buttons
		  button: true,
		  // CSS selector for edit buttons
		  buttonSelector: ".edit",
		  // uses select dropdown instead of input field
		  dropdowns: {},
		  // maintains column width when editing
		  maintainWidth: true,
		  // callbacks for edit, save and cancel actions
		  edit: function(values) {},
		  save: function(values) {},
		  cancel: function(values) {}
		  save: function(values) {
		  var id = $(this).data('t');
		  $.post('/api/object/' + id, values);
		}
		});
		</script>
	</head>
	<body class="text-center";>
						<p><a class="btn btn-primary" role="button" data-toggle="collapse" href="#form" aria-expanded="false" aria-controls="collapseExample">
						 <i class="fa fa-calendar faa-float faa-fast animated"></i> ADD DAILY LOG
						 </a></p>
						 <div class="collapse" id="form" aria-expanded="false">
							<form id="form" method="post" action="register.php">
							   <div class="form-group">
								  <label>
								  <span>Username: </span>
								  <input placeholder=" Enter your user name" type="text" name="uname" class="form-control" tabindex="1" autofocus required>
								  </label>
							   </div>
							   <div class="form-group">
								  <label>
								  <span>Date: </span>
								  <input type="date" name="dt" tabindex="2" required>
								  </label>
							   </div>
							   <div>
									<label>
										<span>Had Breakfast? </span>
										<select name="bf" tabindex="3" class="form-control" required>
											<option value="1">Yes</option>
											<option value="2">No</option>
											<option value="2">Partially</option>
										</select>
									</label>
								</div>
								<div>
									<label>
										<span>Took morning tablets & injection: </span>
										<select name="mtabl" tabindex="4" class="form-control" required>
											<option value="1">Yes</option>
											<option value="2">No</option>
											<option value="2">Partially</option>
										</select>
									</label>
								</div>
								<div>
									<label>
										<span>Had Lunch? </span>
										<select name="lu" tabindex="5" class="form-control" required>
											<option value="1">Yes</option>
											<option value="2">No</option>
											<option value="2">Partially</option>
										</select>
									</label>
								</div>
								<div>
									<label>
										<span>Took afternoon tablets & injection: </span>
										<select name="atabl" tabindex="6" class="form-control" required>
											<option value="1">Yes</option>
											<option value="2">No</option>
											<option value="2">Partially</option>
										</select>
									</label>
								</div>
								<div>
									<label>
										<span>Had dinner? </span>
										<select name="dn" tabindex="7" class="form-control" required>
											<option value="1">Yes</option>
											<option value="2">No</option>
											<option value="2">Partially</option>
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
								  <input type="text" name="bs" class="form-control" tabindex="9" autofocus required>
								  </label>
							   </div>
							   <div>
									<label>
										<span>Motion Passed? </span>
										<select name="dn" tabindex="10" class="form-control" required>
											<option value="1">Yes</option>
											<option value="2">No</option>
											<option value="2">With Difficulty</option>
										</select>
									</label>
								</div>
							    <div class="form-group">
								  <label>
								  <span>Comment: </span>
								  <textarea placeholder="Any other pain experienced?" name="comm" class="form-control" tabindex="11" required></textarea>
								  </label>
							    </div>
							    <label class="file">
							    <input type="file" id="file">
							    <span class="file-custom"></span>
							    </label>
							    <button name="submit" type="submit" class="btn btn-primary" id="submit">Submit</button>
							 </form>
						  </div>
						</br>
	</body>
</html>