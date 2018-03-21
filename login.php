<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="login.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row well">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<h4>Log In</h4>
						<!-- login error msg printing-->
						<?php
                             session_start();
                             if ((isset($_SESSION['LoginErrorMsg'])))//error msg for fields not entered properly
                             {       
                             	echo $_SESSION['LoginErrorMsg'];
                             	unset($_SESSION['LoginErrorMsg']);
                             }
                             if( (isset($_SESSION['errormsg'])) )//error msg for trying to access page directly
                             {
                             	echo $_SESSION['errormsg'];
                             	unset($_SESSION['errormsg']);
                             }
                             if( (isset($_SESSION['ActivationError'])) )//error msg for activate link
                             {
                             	echo $_SESSION['ActivationError'];
                             	unset($_SESSION['ActivationError']);
                             }
						?>
						<!-- captcha validation-->
						
						<!-- sign up form-->
                    <form action="Usercheck.php" method="POST" onsubmit="return validateForm()">
						
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" id="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pwd" id="pwd" class="form-control">
						</div>
						
						<div class="form-group">
							<div style="padding:10px 10px 30px 20px;color:black;font-size: 20px;border: 2px solid black;height: 40px; width: 100px;" id='loginctph'></div>
						</div>
						<div>
							<lable>Enter Captch</lable>
							<input type="text"  id="logincpt" class="form-control" onchange="validate()">
							<span id='cptMsg'></span>
						</div><br>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">submit</button>
						</div>
					</form>
					</div>
					<div class="col-sm-4"></div>
					
			</div>
		</div>
	</body>
</html>