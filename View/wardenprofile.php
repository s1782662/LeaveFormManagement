<!DOCTYPE html>
<html lang="en">

<head>
	<title>PROFILE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">	
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body background="img/fabric.png" class="container">
		<div class="page-header col-sm-12">
			<header>
				<div class="row">
				<div class="col-sm-3">
				<img src="img/vit_logo.png" id="vit_logo" alt="VIT LOGO">
				</div>
				<div class="col-sm-9">
				<span class="col-sm-offset-1"><h2 class="title">LEAVE MANAGEMENT SYSTEM<h2></span>
				</div>
				</div>
			</header>
		</div>
		<div class="navbar navbar-static-top ">
				<div class="navbar navHeaderCollapse" id="a">
					<ul class="nav nav-justified">
						<li><a href="unapprove.forms">HOME</a></li>						
						<li><a href="warden">PROFILE</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">LEAVE FORM</a>
							<ul class="dropdown-menu" >
                                <li> <a href="approve.forms">APPROVED FORMS&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
								<li> <a href="unapprove.forms">UNAPPROVED FORMS</a></li>								
							</ul>
						</li>
						<li><a href="#">VIEW STUDENT PROFILE</a></li>
						<li><a href="Logout">LOGOUT</a></li>
					</ul>
				</div>
		</div>
		</div>
		<br><br>
		<div class="container panel panel-default col-sm-12" id="profile-panel">
		<div class="panel-heading"><h4 id="profile-name" ><?php echo "$name"; ?></h4></div>
		<div class="table-responsive">
		<table class="table">
		<thead>
		</thead>
		<tbody >
			<tr>
      <td class="col-sm-4"><label>USER ID: <?php echo "$id"; ?></label><br><br><label>MOBILE :<?php echo "$mobile"; ?></label><br><br><label>EMAIL :<?php echo "$email" ; ?></label></td>
			<td class="col-sm-4" ><label>ADDRESS:<br> <?php echo "$address"; ?><br><?php echo "$area"; ?><br><?php echo "$city"; ?><br><?php echo "$state"; ?><br><?php echo "$pincode"; ?></label></td>
			<td class="col-sm-4" >
			<label>EDIT PASSWORD</label><br>
			<form role="form" action="update" method = "POST">			
			<fieldset >
			<div class="input-group">
			<input type="password" class="form-control" name ="password"  placeholder="CURRENT PASSWORD" maxlength="15" required><br><br>
			<input type="password" class="form-control"  name ="newpassword" placeholder="NEW PASSWORD" maxlength="15" required><br><br>
			<input type="password" class="form-control" name ="confirmpassword" placeholder="CONFIRM PASSWORD" maxlength="15" required><br><br>
			<input type="submit" class="btn btn-primary">
			</div>
			</fieldset>
			</form>
 			</td>
			</tr>
			
		</tbody>
		</table>
		</div>
		</div>
</body>
</html>
