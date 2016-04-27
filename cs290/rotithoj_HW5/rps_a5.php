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
<link rel = "stylesheet" href = "styles_a5.css"> 
<script src = "rps_a5.js"></script>
<nav>
<ul id = "nav">
<li><a href = "login_a5.php">Log in</a></li>
<li><a href = "signup_a5.php">Sign Up</a></li>
<li><a href = "scoreboard_a5.php">Scoreboard</a></li>
<li><a href = "logout_a5.php">Logout</a></li>
<li><a href = "rps_a5.php">Game</a></li>



</li>
</nav>
</head>
<body>
<p>Instructions: The object of the game is to beat your opponent by choosing one of rock, paper, or scissors. <br/>
The hierarchy goes as follows: rock beats scissors, scissors cuts paper, and paper covers rock.<br/>
So for example, if I played paper and you played scissors, you would win, but if you played rock, I would win.<br/>
If you have already played a game but would like to play again, simply click one of the rock, paper, or scissors buttons<br/>
and the game will restart. </p>

<button id = "rock" onclick ="play_rps('rock')"><img src = "rock.jpg" alt = "rock" class = "img">Rock</button>
<button id = "paper" onclick = "play_rps('paper')"><img src = "paper.jpg" alt = "paper" class = "img">Paper</button>
<button id = "scissors" onclick = "play_rps('scissors')"><img src = "scissors.jpg" alt = "scissors" class = "img">Scissors</button><br/>
<p id = "result"></p>
<p id = "computer_object"></p>
<p id = "end_result"></p>
User Wins: <p id = "score">0</p>
Computer Wins: <p id = "score2">0</p>
Ties : <p id = "score3">0</p>

</body>


</html>