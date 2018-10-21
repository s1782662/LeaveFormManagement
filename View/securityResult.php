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
		<div class="panel-heading"><center><h4>STUDENT LEAVE FORM STATUS</h4></center></div>
			
		<div class="panel-body">
			<form class="form-inline" role="form" action="securityview" method="post">
				<div class="row col-sm-offset-2 ">
				<table class="security-result">
				
				<tr>
					<td><label>STUDENT ID</label></td>
					<td><label>:</label></td>
                    <td><label><?php echo $id; ?></label></td>
				</tr>
				
				<tr>
					<td><label>NAME:</label></td>
					<td><label>:</label></td>
                    <td><label><?php echo $name; ?></label></td>
				</tr>
				
				<tr>
					<td><label>PLACE:</label></td>
					<td><label>:</label></td>
                    <td><label><?php echo $place; ?></label></td>
				</tr>
				
				<tr>
					<td><label>OUT TIME:</label></td>
					<td><label>:</label></td>
                    <td><label><?php echo $exitOn; ?></label></td>
				</tr>
				
				<tr>
					<td><label>IN TIME:</label></td>
					<td><label>:</label></td>
                    <td><label><?php echo $entryOn; ?></label></td>
				</tr>
				
				<tr>
					<td><label>STATUS</span></label></td>
                    <td><label>:</label></td>
                    <?php
                        if ($wardenAppDispp == 1){
                    ?>
					    <td><label class="approved">APPROVED</label></td>
                    <?php
                        }else{
                    ?>
					    <td><label class="not-approved">NOT APPROVED</label></td>
                    <?php
                        }
                    ?>
				</tr>
				
				</table>
				</div>
				<center>
				<input type="submit" class="btn btn-primary" value="BACK">
				</center>
			</form>
		</div>		
		</div>		
		</div>
 
	<script src="js/timepicker.js"></script>
</body>
</html>
