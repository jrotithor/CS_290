

<!DOCTYPE HTML>
<html>
<head>
<title>High scores</title>

<link rel = "stylesheet" href = "styles_a5.css"> 
<script src = "rps_a5.js"></script>
</head>
<body onload = "print_wins()">

<nav>
<ul id = "nav">
<li><a href = "login_a5.php">Log in</a></li>
<li><a href = "signup_a5.php">Sign Up</a></li>
<li><a href = "scoreboard_a5.php">Scoreboard</a></li>
<li><a href = "logout_a5.php">Logout</a></li>
<li><a href = "rps_a5.php">Game</a></li>



</li>
</nav>
<?php
	session_start();
	$DB_HOST = 'oniddb.cws.oregonstate.edu';
$DB_USER = 'rotithoj-db';
$DB_PASSWORD = 'kI5bgbiOkLUbQs41';
$DB_NAME = 'rotithoj-db';
$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
	include 'navigation.php';
	
	if (isset($_SESSION['firstName'])){
		$firstName = $_SESSION['firstName'];
		echo " <h3> Welcome back ".$firstName."</h3>"; 
		$query = "SELECT * FROM Users";
		$result= mysql_query($query);
		while($name = mysql_fetch_assoc($result)){
			foreach($row as $key => $val){
				echo $key . ": " . $val . "<br/>";
			}
		}
	}
	else{
		echo 'You need to be logged in to see scores.';
	}	
echo '
<table>
<tr>

</tr>


</table>'
?>
<p id = "wins"></p>
</body>
</html>