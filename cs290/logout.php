<?php
	session_start();
	$old_user = $_SESSION['valid_user'];
	unset($_SESSION['valid_user']);
	session_destroy();
?>
<html>
<head>
<title>Logout</title>
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
	<h1> Log Out Page</h1>
	<?php
		if (!empty($old_user)) {
			echo 'User: '.$old_user.' is logged out';
		} else {
			echo 'You were not logged in!';
		}
	?>

</body>
</html>