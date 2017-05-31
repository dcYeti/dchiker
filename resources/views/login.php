<?php
//Use output buffer to set cookies upon successful login
ob_start();
session_start();
//Before sending HTML, Several variables will be set
//1)$loggedIn = true if login cookie found 2)number of picture to use for banner (randomly chosen) 3)person's name
//4)Person's Location (either by submitted zip code or geolocation) for weather info
//5)Title of page in $pageTitle variable
$firstName = ''; $locZip = '';
if (isset($_COOKIE['yoga'])){	
	if (htmlentities($_COOKIE['yoga']) == 'pants'){
    	$loggedIn = true;
		$firstName = $_SESSION['firstName'];
	}
	else {$loggedIn = false;}
	}		
	else
	{	
        $loggedIn = false;
	}
$pageTitle = "dcHiker Home Page - Login";
//Handle form if user is already logged in and prevent continue
if ($loggedIn == true) {
	include("template_head.html");
	print "<div id='main_container'><div class = 'main_panel'>You are already logged in - Please log out first to access new account
	</div></div></body></html><script>window.stop();</script>";
}
//handle login credentials
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	//get the info the user is submitting, store to variable
	$username4check = strtolower(trim($_POST['username']));
	$password4check = $_POST['password'];

	//connect and select the db
	$dbName = 'anthopd6_dcHKR_users';
	if(!$dbc = mysql_connect(localhost, anthopd6_stthng, israel2020)){
	include("template_head.html");
	print '<div id="main_container"><div class = "hiker_form">';
	print "Database Connection Error";
	print "</div><script>window.stop();</script></div></body></html>";
	}
	if(!@mysql_select_db($dbName, $dbc)){
	include("template_head.html");
	print '<div id="main_container"><div class = "hiker_form">';
	print "Error: Database not Selected Succesfully";
	print "</div><script>window.stop();</script></div></body></html>";
	}
	//check to see if the username's there
	$tableName = 'dcHKR_users';
	$usernameExistsQuery = "SELECT * FROM $tableName WHERE username = '$username4check'";
	$usernamecheck = mysql_query($usernameExistsQuery, $dbc);
	$userInfo = mysql_fetch_array($usernamecheck);
	
	$trueUsername = $userInfo['username'];
	$truePass = $userInfo['password'];
	$trueFirstName = $userInfo['firstname'];
	$trueZipcode = $userInfo['zipcode'];
	$trueLevel = $userInfo['hiker_type'];
	  if (($username4check == $trueUsername) && ($password4check == $truePass)){
		//set cookie and start session
		setcookie('yoga', "pants", time()+7200);
		$_SESSION['firstName'] = $trueFirstName;
		$_SESSION['username'] = $trueName;
		$_SESSION['level'] = $trueLevel;
		$_SESSION['zipcode'] = $trueZipcode;
		$loggedIn = true;
		$firstName = $_SESSION['firstName'];
		include("template_head.html");		
		print '<div id="main_container"><div class = "hiker_form">';
		print "<h2>You are now logged in!  You Can Now Make A Profile and View Your Hikes</h2>";
		print "</div><script>window.stop();</script></div></body></html>";
		ob_end_flush();
	  }
	  else {
		include("template_head.html");
		print '<div id="main_container"><div class = "hiker_form">';
		print '<h2>Your username or password is not correct!  Try again.</h2>';
		print "</div><script>window.stop();</script></div></body></html>";
		ob_end_flush();
	  }
	ob_end_flush();
	mysql_close($dbc);
 }
 else {
	 include("template_head.html");
 }
?>

<div id="main_container">
<script src="hikerjs.js"></script>
<div class = "hiker_form">
	<h2>Login to dcHIKER - Access Your Hiker Profile & More!</h2>
	<form name="dcHKRlogin" action="login.php" onsubmit="return validatelogin()" method="post">
	<p class="formprompt">Enter Username: 
	<input type="text" name="username" size="18" maxlength="20" />
	</p>
	<p class="formprompt">Enter Password:
	<input type="password" name="password" size="18" maxlength="20" />
	</p>
	<p class="formpromptleft"><br/>
	<input type = "submit" name="submitbtn" value="submit" id="smit"/>
	</p>
	</form>
</div>
</div>
</body>
</html>
