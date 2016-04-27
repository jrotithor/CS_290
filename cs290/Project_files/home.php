

<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
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
<div>
<p>MTH 251</p>
<p><a href = https://www.mathsisfun.com/calculus/derivatives-introduction.html>https://www.mathsisfun.com/calculus/derivatives-introduction.html</a><p>
<p><a href = http://tutorial.math.lamar.edu/Classes/CalcI/limitsIntro.aspx>http://tutorial.math.lamar.edu/Classes/CalcI/limitsIntro.aspx</a><p>


</div>

<div>
<p>CS 161</p>
<p><a href = http://www.tutorialspoint.com/cplusplus/cpp_for_loop.htm>http://www.tutorialspoint.com/cplusplus/cpp_for_loop.htm</a><p>
<p><a href = http://www.cplusplus.com/doc/tutorial/pointers/>http://www.cplusplus.com/doc/tutorial/pointers/</a><p>
</div>

<div>
<p>PH 211</p>
<p><a href = http://www.physicsclassroom.com/class/1DKin/Lesson-6/Kinematic-Equations>http://www.physicsclassroom.com/class/1DKin/Lesson-6/Kinematic-Equations</a><p>
<p><a href = http://hyperphysics.phy-astr.gsu.edu/hbase/frict.html>http://hyperphysics.phy-astr.gsu.edu/hbase/frict.html</a><p>
</div>

<div>
<p>MTH 231</p>
<p><a href = http://www.purplemath.com/modules/inductn.htm>http://www.purplemath.com/modules/inductn.htm</a><p>
<p><a href =https://www.mathsisfun.com/combinatorics/combinations-permutations.html>https://www.mathsisfun.com/combinatorics/combinations-permutations.html</a><p>
</div>

<div>
<p>CS 290</p>
<p><a href =https://developer.mozilla.org/en-US/docs/Web/HTML>https://developer.mozilla.org/en-US/docs/Web/HTML</a><p>
<p><a href =https://secure.php.net/manual/en/index.php>https://secure.php.net/manual/en/index.php</a><p>
</div>
<?php
session_start();

$DB_HOST = 'oniddb.cws.oregonstate.edu';
$DB_USER = 'rotithoj-db';
$DB_PASSWORD = 'uJ15OkbLpgOujFeG';
$DB_NAME = 'rotithoj-db';
//require_once('connect.php');
  // Connect to the database
  $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
  $User = $_SESSION['valid_user'];
  $Course = $_POST['course'];
  $Link = $_POST['link'];
  if(isset($_SESSION['valid_user'])){
  $query = "INSERT INTO Links (UserName, Course, Link) VALUES ('$User', '$Course', '$Link')";
    mysqli_query($dbc, $query);
  $selection = "SELECT * FROM Links";
     $res =  mysqli_query($dbc, $selection);

	 while($row = mysqli_fetch_assoc($res)){
		if($row['UserName'] == $User){
		  echo "<p>" .$row['Course']. "</p>";
		 echo "<p>" .$row['Link']. "</p><br/>";
		}
	 }
}
else{
	echo 'You must be logged in to add links.<br/><br/>';
}
  ?>
<form method="post" action = "home.php" onsubmit = "add()"> 
Type the course that you want to add to:
<br/>
<input type = "text" id = "course" name = "course"/><br/>
Type a link here if you want to add to the page:
<br/>
<input type = "text" id = "link" name = "link"/><br/>
<input type = "submit" value = "Add to page"/>
</form>
<p id = "add"></p>
</html>