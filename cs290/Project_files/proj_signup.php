<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="styles_proj.css">
    <!-- Script for the event handlers    -->
	<script src = "project.js"></script>
</head>
<body onload = "alert_user()">
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
  <h3>Sign Up</h3>
  <p id = "alerts"></p>

<?php
session_start();
$DB_HOST = 'oniddb.cws.oregonstate.edu';
$DB_USER = 'rotithoj-db';
$DB_PASSWORD = 'uJ15OkbLpgOujFeG';
$DB_NAME = 'rotithoj-db';
//require_once('connect.php');
  // Connect to the database
  $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

 // mysql_select_db('Users') or die("database not found");
  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $Username = $_POST['Username'];
    $password = $_POST['password'];
    $Firstname = $_POST['Firstname'];	
	$Lastname = $_POST['Lastname'];

	
    if (!empty($Username) && !empty($password)) {
    if(strlen($password) >= 6){
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM Final WHERE Username = '$Username'";
      $data = mysqli_query($dbc, $query);
	  
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO Final (Username, password, Firstname, Lastname) VALUES ('$Username', '$password', '$Firstname', '$Lastname')";
        mysqli_query($dbc, $query);
	
        // Confirm success with the user
        echo '<p>Your new account has been successfully created. You\'re now ready to log in.</p>';

        mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $username = "";
      }
	}
	else{
		echo "Password must be at least 8 characters long.";
	}
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }

  mysqli_close($dbc);
?>

  <p>Please enter your username and desired password to sign up for an account. The password must be at least 8 characters long.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Registration Info</legend>
      <label for="username">Username:</label>
      <input type="text" id="Username" name="Username" value="<?php if (!empty($Username)) echo $Username; ?>" /><br />
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" /><br />
      <label for="firstname">First name:</label>
      <input type="text" id="Firstname" name="Firstname" /><br />      	  
	        <label for="lastname">Last name:</label>
      <input type="text" id="Lastname" name="Lastname" /><br /> 
    </fieldset>
    <input type="submit" value="Sign Up" name="submit" />
  </form>
</body> 
</html>
