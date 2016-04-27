<?php
	session_start();
	$old_user = $_SESSION['valid_user'];
	unset($_SESSION['valid_user']);
	session_destroy();
?>
<html>
<head>
<title>Logout</title>
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