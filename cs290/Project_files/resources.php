<?php
	session_start();
	$old_user = $_SESSION['valid_user'];
	unset($_SESSION['valid_user']);
	session_destroy();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Logout</title>
<link rel="stylesheet" href="styles_proj.css">
<script src = "project.js"></script>
</head>
<body>
<nav>
<ul id = "nav">
<li><a href = "about_me.html">About me</a></li>
<li><a href = "resources.php">Logout</a></li>
<li><a href = "home.php">Main page</a></li>
<li><a href = "help.html">Help using this page</a></li>
<li><a href = "proj_login.php">Login</a><li>
<li><a href = "proj_signup.php">Sign Up</a></li>
</ul>
</nav>


</body>
<h1> Log Out Page</h1>
	<?php
		if (!empty($old_user)) {
			echo 'User: '.$old_user.' is logged out';
		} else {
			echo 'You were not logged in!';
		}
	?>

</html>