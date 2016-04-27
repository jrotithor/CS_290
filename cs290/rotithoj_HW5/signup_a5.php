<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="styles_a5.css">
    <!-- Script for the event handlers    -->
	<script type = "text/javascript"  src = "validateSignUp.js" > </script>	
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
  <h3>Sign Up</h3>

<?php
session_start();
$DB_HOST = 'oniddb.cws.oregonstate.edu';
$DB_USER = 'rotithoj-db';
$DB_PASSWORD = 'kI5bgbiOkLUbQs41';
$DB_NAME = 'rotithoj-db';
//require_once('connect.php');
  // Connect to the database
  $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

 // mysql_select_db('Users') or die("database not found");
  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $userName = $_POST['userName'];
    $password1 = $_POST['password1'];
    $firstName = $_POST['firstName'];	
	$lastName = $_POST['lastName'];

    if (!empty($userName) && !empty($password1)) {

      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM Users WHERE userName = '$userName'";
      $data = mysqli_query($dbc, $query);
	  
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO Users (userName, password, firstName, lastName,wins) VALUES ('$userName', '$password1', '$firstName', '$lastName','0')";
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
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }

  mysqli_close($dbc);
?>

  <p>Please enter your username and desired password to sign up for an account.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Registration Info</legend>
      <label for="username">Username:</label>
      <input type="text" id="userName" name="userName" value="<?php if (!empty($userName)) echo $userName; ?>" /><br />
      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" /><br />
      <label for="firstname">First name:</label>
      <input type="text" id="firstName" name="firstName" /><br />      	  
	        <label for="lastname">Last name:</label>
      <input type="text" id="lastName" name="lastName" /><br /> 
    </fieldset>
    <input type="submit" value="Sign Up" name="submit" />
  </form>
</body> 
</html>
