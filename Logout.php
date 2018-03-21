<?php

	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['id']);
	unset($_SESSION['loginid']);
	header("location:index.php");
?>