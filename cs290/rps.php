<?php
session_start();
 $DB_HOST = 'oniddb.cws.oregonstate.edu';
$DB_USER = 'rotithoj-db';
$DB_PASSWORD = 'kI5bgbiOkLUbQs41';
$DB_NAME = 'rotithoj-db';
$dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
$wins = "SELECT wins FROM Users where userName = 'james'";
mysqli_query($dbc, $wins);
++$wins;
$query = "UPDATE Users
SET wins = $wins";
mysqli_query($dbc, $query);
?>
<html>
<head>
<title>
Rock-Paper-Scissors
</title>
<link rel = "stylesheet" href = "styles_a4.css"> 
<script src = "a4.js"></script>
<nav>
<ul id = "nav">
<li><a href = "login.php">Log in</a></li>
<li><a href = "signup.php">Sign Up</a></li>
<li><a href = "scoreboard.php">Scoreboard</a></li>
<li><a href = "logout.php">Logout</a></li>
<li><a href = "rps.php">Game</a></li>



</li>
</nav>
</head>
<body>
<p>Instructions: The object of the game is to beat your opponent by choosing one of rock, paper, or scissors. <br/>
The hierarchy goes as follows: rock beats scissors, scissors cuts paper, and paper covers rock.<br/>
So for example, if I played paper and you played scissors, you would win, but if you played rock, I would win.<br/>
If you have already played a game but would like to play again, simply click one of the rock, paper, or scissors buttons<br/>
and the game will restart. </p>

<form method = "post" action = "rps.php" onsubmit = "process_input()">
<h2>Welcome to rock-paper-scissors! choose your tool.</h2><br/>
<input type = "radio" id = "b1" value = "1">Rock</button>
<input type = "radio" id = "b2" value = "2">Paper</button>
<input type = "radio" id = "b3" value = "3">Scissors</button><br/>


<input type="submit" value="Play" name="submit"/>
<p id = "result"></p>
<p id = "computer_object"></p>
<p id = "end_result"></p>
User Wins: <p id = "score"></p>
<!--Computer Wins: <p id = "score2">0</p>
Ties : <p id = "score3">0</p>-->
</body>


</html>