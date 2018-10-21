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
	<script src="timepicker/jquery.timepicker.min.js"></script>
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
		<div class="navbar navbar-static-top">
				<div class="navbar navHeaderCollapse" id="a">
					<ul class="nav nav-justified">
						<li><a href="home">HOME</a></li>						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">PROFILE</a>
							<ul class="dropdown-menu" >
								<li> <a href="student">STUDENT</a></li>
								<li> <a href="student.proctor">PROCTOR</a></li>
								<li> <a href="student.warden">WARDEN</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">LEAVE FORM</a>
							<ul class="dropdown-menu" >
								<li> <a href="home">SUBMIT LEAVE FORM&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
								<li> <a href="status">LEAVE FORM STATUS</a></li>								
							</ul>
						</li>
						<li><a href="#">ATTENDANCE</a></li>
						<li><a href="Logout">LOGOUT</a></li>
					</ul>
				</div>
		</div>
		<div class="col-sm-offset-1 container col-sm-10" id="leaveform">
		<div class="panel panel-default">
		<div class="panel-heading"><center><h4>SUBMIT LEAVE FORM</h4></center></div>
		
		<div class="panel-body">
		
		<form class="form-inline" id="datetimepicker" role="form" action="Leave" method="POST">
		
			
		
		<div class="row">
			<div class="col-sm-offset-1 col-sm-2">
				<input class="form-control date start" name="startdate" id="startdate" placeholder="START DATE" required type="text" autocomplete="off">
			</div>
			<div class="col-sm-offset-1  col-sm-2">
                <input class="form-control time start ui-timepicker-input" name="starttime" id="pickstarttime" type="text">
			</div>
			<div class="col-sm-2">
				<input class="form-control date end" name="enddate" id="enddate" placeholder="END DATE" required type="text" autocomplete="off">
			</div>
			<div class="col-sm-offset-1 col-sm-2">
				<input class="form-control time end ui-timepicker-input" name="endtime" id="pickendtime"  type="text">
			</div>
		</div>
		<br><br>
		<div class="row">		
			<div class="col-sm-offset-1 col-sm-4">
				<textarea class="form-control" id="visiting-address" name = "visiting" rows="4" cols="30" placeholder="Visiting Address" maxlength="25" required></textarea>
			</div>
			<div class="col-sm-offset-1 col-sm-4">
				<textarea class="form-control" id="purpose" name="purpose" rows="4" cols="30" placeholder="Purpose of visit" maxlength="25" required></textarea>
			</div>
		</div>
		<br><br>
		
		<div class="col-sm-offset-5">
		<input value="SUBMIT" class="btn btn-primary" type="submit">
		</div>
		
		
		
		</form>
		</div>
		
		</div>
		
		</div>
 
	<script src="js/timepicker.js"></script>
</body>
</html>
