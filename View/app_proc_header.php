<!DOCTYPE html>
<html lang="en">
<!-- james this is the file -->
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
		<div class="navbar navbar-static-top ">
				<div class="navbar navHeaderCollapse" id="a">
					<ul class="nav nav-justified">
						<li><a href="proctor.unforms">HOME</a></li>						
						<li><a href="proctor">PROFILE</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">LEAVE FORM</a>
							<ul class="dropdown-menu" >
							<li> <a href="proctor.apforms">APPROVED FORMS&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
								<li> <a href="proctor.unforms">UNAPPROVED FORMS</a></li>					
							</ul>
						</li>
						<li><a href="#">VIEW STUDENT PROFILE</a></li>
						<li><a href="Logout">LOGOUT</a></li>
					</ul>
				</div>
		</div>
		<div class="container col-sm-12" id="leaveform">
		<div class="panel panel-default">
		<div class="panel-heading"><center><h4>APPROVED LEAVE FORMS</h4></center>
		<button class="btn btn-default" onclick=window.location.reload();>REFRESH</button></div>
			<table class="table table-responsive table-bordered" id="approve_leave">
				<thead>
					<th>ID</th><th>NAME</th><th>PLACE</th><th>LEAVING TIME</th><th>RETURNING TIME</th><th>PURPOSE</th><th colspan="2">STATUS</th>
				</thead>
				<tbody id="tbody">
