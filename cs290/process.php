
<?php

  require_once('connect.php');
  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $userName = mysqli_real_escape_string($dbc, trim($_POST['userName']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $firstName = mysqli_real_escape_string($dbc, trim($_POST['firstName']));	
	$lastName =  mysqli_real_escape_string($dbc, trim($_POST['lastName']));	


    if (!empty($userName) && !empty($password1)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM Users WHERE userName = '$userName'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO Users (userName, password, firstName, lastName) VALUES ('$userName', '$password1', '$firstName', 'lastName')";
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