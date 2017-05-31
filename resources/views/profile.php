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
$pageTitle = "dcHiker User Profile - Edit Your Details";
include("template_head.html");
?>
<div id="main_container">
<div class = "hiker_form">
	<h2>My Profile</h2><p class="profile_desc">
	<?php
	print "Hello {$_SESSION['firstName']}<br/>";
	print "Your Hiker Level is {$_SESSION['level']}<br/>";
	print "Here are your hikes closes to {$_SESSION['zipcode']}";
	?>
	</p>
</div>
</div>
</body>
</html>