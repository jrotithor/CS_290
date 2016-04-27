function add(){
	
	document.getElementById("add").innerHTML = "Added!";
}
function welcome(){
	
	document.getElementById("welcome").innerHTML = "Welcome!";
}
function show_photo(){
	
	document.getElementById("photo").innerHTML = "<img src = 'jd.png' alt = 'jd'>";
}
function show_message(){
	document.getElementById("message").innerHTML = "Create an account and start adding links!"
}
function alert_user(){
	document.getElementById("alerts").innerHTML = "You must have an account if you want to add links to the main page."
}
function checkUserName(userName) {
  var xhr = new XMLHttpRequest();

// Register the embedded handler function
  xhr.onreadystatechange = function () {
  
    if (xhr.readyState == 4 && xhr.status == 200) {
		
		var result = (xhr.responseText);
	    // Strip out new line chars and whitespace 
		result = result.replace(/(\r\n|\n|\r)/gm,"");
		
		if (result == "0")  {
			document.getElementById("Username").innerHTML = "Could not log you in";
			document.getElementById("Username").focus();

	   } 
	}
  }
  xhr.open("GET", "ajax_user_login.php?userName=" + userName, true);
  xhr.send(null);


}