<!DOCTYPE html>
<html lang="en">

<head>
	<title>LEAVE FORM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">	
	<link rel="stylesheet" href="timepicker/jquery.timepicker.css">
	<link rel="stylesheet" href="datetime/lib/bootstrap-datepicker.css">
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="timepicker/jquery.timepicker.js"></script>
	<script src="datetime/lib/bootstrap-datepicker.js"></script>   
	<script src="datetime/jquery.datepair.js"></script>

			
</head>

<body background="img/fabric.png" class="container">
		<div class="page-header col-sm-12">
			<header>
				<div class="row">
				<div class="col-sm-3">
				<img src="img/vit_logo.png" id="vit_logo" alt="VIT LOGO">
				</div>
				<div class="col-sm-9">
				<h2 class="title col-sm-offset-2">LEAVE MANAGEMENT SYSTEM<h2>
				</div>
				</div>
			</header>
		</div>

		<div class="container col-sm-12" id="leaveform">
		<div class="panel panel-default">
		<div class="panel-heading"><center><h4>ENTER STUDENT ID</h4></center></div>
			
		<div class="panel-body">
			<form class="form-inline" role="form" action="securitysearch" method="post">
				<div class="row">
				<center>
					<input type="text" class="form-control" name="username" maxlength="9" required>
					<input type="submit" class="btn btn-primary" value="SEARCH">
				</center>
				</div>
			</form>
		</div>		
		</div>		
		</div>
 
	<script src="js/timepicker.js"></script>
</body>
</html>
