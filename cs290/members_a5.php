<?php
	session_start();
	include 'navigation.php';
	
	if (isset($_SESSION['firstName'])){
		$firstName = $_SESSION['firstName'];
		echo " <h3> Welcome back ".$firstName."</h3>"; 
	}	
?>

<!DOCTYPE html>
<html>
<head>
<title>Members</title>
<link rel = "stylesheet" href = "styles_a5.css"> 
<script src = "rps_a5.js"></script>
</head>
<body>
<nav>
<ul id = "nav">
<li><a href = "login_a5.php">Log in</a></li>
<li><a href = "signup_a5.php">Sign Up</a></li>
<li><a href = "scoreboard_a5.php">Scoreboard</a></li>
<li><a href = "logout_a5.php">Logout</a></li>
<li><a href = "rps_a5.php">Game</a></li>



</li>
</nav>
	<h1> Members Page </h1>
	<p>
	<p>
	<a href="logout_a5.php">Logout</a>
</body>
</html>		
			
		