

<!DOCTYPE HTML>
<html>
<head>
<title>High scores</title>

<link rel = "stylesheet" href = "styles_a4.css"> 
<script src = "a4.js"></script>
</head>
<body>

<nav>
<ul id = "nav">
<li><a href = "login.php">Log in</a></li>
<li><a href = "signup.php">Sign Up</a></li>
<li><a href = "scoreboard.php">Scoreboard</a></li>
<li><a href = "logout.php">Logout</a></li>
<li><a href = "rps.php">Game</a></li>



</li>
</nav>
<?php
	session_start();
	include 'navigation.php';
	
	if (isset($_SESSION['firstName'])){
		$firstName = $_SESSION['firstName'];
		echo " <h3> Welcome back ".$firstName."</h3>"; 
	}
	else{
		echo 'You need to be logged in to see scores.';
	}	
?>
</body>
</html>