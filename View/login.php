<!DOCTYPE html>
<html lang="en">

<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/loadCaptcha.js"></script>
</head>

<body background="img/fabric.png">
	<div class="container">
	
	<div class="page-header">
			<header>
				<div class="row ">
				<div class="col-sm-3">
				<img src="img/vit_logo.png" id="vit_logo" alt="VIT LOGO">
				</div>
				<div class="col-sm-9">
				<span class="col-sm-offset-1"><h2 class="title">LEAVE FORM MANAGEMENT SYSTEM</h2></span>
				</div>
				</div>
			</header>
	</div>
	<br>
	<div class="row row-sm-offset-12">
		<div class="col-sm-4 col-sm-offset-4">
			<div class="panel panel-default">
			<div class="panel-heading"><center><h4><b>LOGIN</b></h4></center></div>
                <div class="panel-body">
    <!--/LeaveFormManagement/Login -->
					<form method="POST" action="/LeaveFormManagement/cap_comp">
						<fieldset>									
							<div class="form-group">
								<input class="form-control" placeholder="Enter your ID" name="username" type="text" maxlength="9" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Enter Password" name="password" type="password" maxlength="20" required>
                            </div>
							<div class="form-group">
								<img src="/LeaveFormManagement/captcha" class="col-sm-offset-3" id="captcha">
								<span class="glyphicon glyphicon-refresh" id="reloadCaptcha"><span/>
							</div>
              
							<div class="form-group">
								<input class="form-control" placeholder="Enter the above characters" name="captcha" type="text" maxlength="7" required>
							</div>
							
							<div class="text-center">
								<input type="submit" value="LOGIN" class="btn btn-primary">
							</div>
						</fieldset>
					</form>
				</div>					
			</div>
		</div>
	</div>
</body>
</html>
