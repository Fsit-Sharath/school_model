
<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
	</head>
	<body >
		<div class="container-fluid">
			<div class="row well">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<h4>SIGN UP</h4>
						<!--display error msg--> 
						<?php
							session_start();
						    if(isset($_SESSION['ActivationErrorMsg']))							
							echo "<p>".$_SESSION['ActivationErrorMsg']."</p>";
							unset($_SESSION['ActivationErrorMsg']);
							if(isset($_SESSION['InavildInputMsg']))	
							echo $_SESSION['InavildInputMsg'];
							unset($_SESSION['InavildInputMsg']);
							if(isset($_SESSION['EmailExist']))	
							echo $_SESSION['EmailExist'];
							unset($_SESSION['EmailExist']);
										                 
						?>
						<!-- recaptcha validation-->
						<script>
							function validateForm()
							{
                               var cptch=document.getElementById("captch").value;

                               if(cptch=='')
                               {
                               	document.getElementById("captchMsg").style.color="red";
                               	document.getElementById("captchMsg").innerHTML="please fill captch";
                               	return false;
                               }
                              
							}
						    var code;
							window.addEventListener("load",function(){
								/*var a=Math.floor(Math.random()*9)+'';
								var b=Math.floor(Math.random()*9)+'';
								var c=Math.floor(Math.random()*9)+'';
								var d=Math.floor(Math.random()*9)+'';*/
								code=Math.random().toString(36).substring(7);

								document.getElementById("reCaptcha").innerHTML=code;
							})
                             
                             function validate()
                             {
                             	var captch=document.getElementById("captch").value;

                             	if(code==captch)
                             	{
                             		document.getElementById("captchMsg").innerHTML="";
                             	}
                             	else{
                             		document.getElementById("captchMsg").innerHTML="please fill captch correctly";
                             	}
                             }
							
		               </script>
		               <!-- sign up form-->
                    <form action="signup.php" method="POST" onsubmit="return validateForm()">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control">
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pwd" class="form-control">
						</div>
						<div class="form-group">
							<div style="padding:10px 10px 30px 30px;color:black;font-size: 20px;border: 2px solid black;height: 40px; width: 100px;" id='reCaptcha'></div>
						</div>
						<div>
							<lable>Enter Captch</lable>
							<input type="text"  id="captch" class="form-control" onchange="validate()">
							<span id='captchMsg'></span>
						</div>
						<br>
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