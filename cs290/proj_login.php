<?php
	session_start();
	//include 'connectvars.php';
 $DB_HOST = 'oniddb.cws.oregonstate.edu';
$DB_USER = 'rotithoj-db';
$DB_PASSWORD = 'uJ15OkbLpgOujFeG';
$DB_NAME = 'rotithoj-db';
	if ((isset($_POST['Username'])) && (isset($_POST['password'])) ){
		$Username = $_POST['Username'];
		$password = $_POST['password'];
	
		$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
		if (!$dbc) {
			die('Could not connect: ');
		}
	
		$query = "SELECT * FROM Final WHERE Username='$Username' and password='$password'";
		$result = mysqli_query($dbc, $query);
		if (mysqli_num_rows($result) == 1) {
	
			// The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
			  $row = mysqli_fetch_array($result);
			  $_SESSION['Firstname'] = $row['Firstname'];
			  $_SESSION['valid_user'] = $row['Username'];
			  
			}
		else {
          // The username/password are incorrect so set an error message
			echo "Sorry, you must enter a valid username and password to log in.";
		}
		mysqli_free_result($result);
		mysqli_close($dbc);
	}  

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="styles_proj.css">
<script src = "project.js"></script>
</head>
<body onload = "welcome()">

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
<p id = "welcome"></p>
<?php
	if (isset($_SESSION['valid_user'])) {
		echo " <h3> You are logged in as </h3><p> User: ".$_SESSION['valid_user']; 
		echo " <p> First Name: ".$_SESSION['Firstname']; 
		echo "<p> <a href='resources.php'>Log out </a><br />";
	}
	else {
		if (isset($userName)) {
			// user tried but can't log in
			echo "<h2> Could not log you in </h2>";
		} else {
			// user has not tried
			echo " <h2> You need to log in </h2> ";
		}
		// Log in form

		echo " <form method='post' action='proj_login.php' > ";
		echo " User name <input type='text' name='Username'> <br /> ";
		echo "  Password <input type='password' name='password' /> <br />";
		echo '<input type="submit" value="Log In" name="submit" />';
		echo "</form>";
	}	
?>
</body>

</html>