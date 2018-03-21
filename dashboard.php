<?php
	session_start();
    //checking user log in or not
	if( ! isset($_SESSION['loginid']))
	{
		
		$_SESSION['errormsg']='plz login first';
		header("location:login.php");
	}
?>
<!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
	</head>
	<body>
	
		<nav class="navbar navbar-inverse">
  			<div class="container-fluid">
    			<div class="navbar-header">
     		 		<a class="navbar-brand" href="#">WEBSITE</a>
   			 	</div>
	    		<ul class="nav navbar-nav">
		      		<li><a href="classList.php" class="active">Class</a></li>
		      		<li><a href="StudentList.php">Student</a></li>
		    	  	<li><a href="TeacherList.php">Teacher</a></li>
	    		</ul>
	    		<ul class="nav navbar-nav navbar-right">
     			 <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
   				 </ul>
  			</div>
		</nav>
	
</body>
</html>