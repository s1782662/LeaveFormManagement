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
		<div class="container col-sm-12" id="leaveform">
		<div class="panel panel-default">
		<div class="panel-heading"><center><h4>LEAVE FORM STATUS</h4></center></div>
		<table class="table table-responsive col-sm-offset-2" id="leave_status">
		<tbody>
			<br>
			<tr>
				<td><label>ID</label></td><td colspan="3"><?php echo "$id" ;?></td>
			</tr>
			<tr>
				<td><label>NAME</label></td><td colspan="3"><?php echo "$name" ;?></td>
			</tr>
			<tr>
				<td><label>PLACE</label></td><td colspan="3"><?php echo "$place" ;?></td>
			</tr>
			<tr>
				<td><label>LEAVING TIME</label></td><td colspan="3"><?php echo "$exitOn" ;?></td>
			</tr>
			
			<tr>
				<td><label>RETURNING TIME</label></td><td colspan="3"><?php echo "$entryOn" ;?></td>
			</tr>
			<tr>
				<td><label>STATUS</label></td><td colspan="3"><?php echo ($leaveStatus == 0)?"NOT APPROVED":"APPROVED";?></td>
			</tr>
			<tr>
				<td><label>PURPOSE</label></td><td colspan="3"><?php echo "$purpose" ;?></td>
			</tr>
			<tr>
				<td>
					<form role="form" action="cancelleave" method="POST">
						<input class="btn btn-danger col-sm-offset-6" type="submit" value="CANCEL"></td>
					</form>
				</td>
			</tr>
		</tbody>
		</table>
		<div class="panel-body">
			
		</div>		
		</div>		
		</div>
 
	<script src="js/timepicker.js"></script>
</body>
</html>
