<?php
session_start();
//Before sending HTML, Several variables will be set
//1)$loggedIn = true if login cookie found 2)number of picture to use for banner (randomly chosen) 3)person's name
//4)Person's Location (either by submitted zip code or geolocation) for weather info
//5)Title of page in $pageTitle variable
$firstName = ''; $locZip = '';
if (isset($_COOKIE['yoga'])){	
	if (htmlentities($_COOKIE['yoga']) == 'pants'){
    	$loggedIn = true;
		//include code to set session data
		$firstName = $_SESSION['firstName'];
	}
	else {$loggedIn = false;}
	}		
	else
	{	
        $loggedIn = false;
	}
$pageTitle = "dcHiker Home Page - Create Your Account";
include("template_head.html");

//stop page if user is already logged in

if ($loggedIn == true) {
	print "<div id='main_container'><div class = 'main_panel'>Please log out to create a new account
	</div></div></body></html><script>window.stop();</script>";
}
?>

<div id="main_container">
<script src="hikerjs.js"></script>
<div class = "hiker_form">
	<h2>Register An Account, Save Your Hikes, Keep Your Planning Information</h2>
	<form name="registeraccount" action="hikerregister.php" onsubmit="return validatehikerform()" method="post">
	<p class="formprompt">Select A Username: 
	<input type="text" name="username" size="18" maxlength="20" />
	</p>
	<p class="formprompt">What's Your First Name?
	<input type="input" name="firstname" size="18" maxlength="20" />
	</p>
	<p class="formprompt">Please Enter Your Zip Code
	<input type="input" name="zipcode" size="5" maxlength="5" />
	</p>
	<p class="formprompt">What Type of Hiker Are You?
	<select name="hiker_type">
		<option value="beginner">Beginner</option>
		<option value="occasional">Occasional</option>
		<option value="day_hiker">Day Hiker</option>
		<option value="backpacker">Backpacker</option>
		<option value="world_traveler">World Traveler</option>
		<option value="pro">Pro</option>			
	</select>
	</p>
	<p class="formprompt">Select Password: 
	<input type="password" name="dcpassword" size="18" maxlength="20" />
	</p>
	<p class="formprompt">Re-type Your Password: 
	<input type="password" name="dcpasswordverify" size="18" maxlength="20" />
	</p>

	<p class="formpromptleft"><br/>
	<input type = "submit" name="submitbtn" value="submit" id="smit"/>
	</p>
	</form>
</div>
</div>

</body>
</html>