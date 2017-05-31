<!DOCTYPE HTML>
<html>
<head>
	<title><?php print $pageTitle; ?></title>
	<link href="css/hikerstyles.css" type="text/css" rel="stylesheet" />
	<link href="css/hikerforms.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<header>
	<div id = "pic_container">
	
	<div id = "navbarbox">
	<ul id="navbarhead">
<?php 	
	//this portion will decide the navbar contents
	//This portion will randomize the banner photo
	$bannerIndex = rand(1, 13);
	$bannerFile = "banner_photos/topbanner-$bannerIndex.jpg";
	//$loggedIn = true;
	if ($loggedIn == true){
		print "<a href='profile.php'><li class='navbar' id='profile'>Hi $firstName - View Profile</li></a>";
		print "<li class = 'spacer'>Text to give space</li>";
		print "<a href='index.php'><li class='navbar'>Home</li></a>";
		print "<a href='myhikes.php'><li class='navbar'>My Hikes</li></a>";
		print "<a href='logout.php'><li class='navbar'>Logout</li></a>";
	} else {
		print "<a href='index.php'><li class='navbar' id='profile'>Home</li></a>";
		print "<li class = 'spacer'> </li>";
		print "<li class = 'spacer'> </li>";
		print "<a href='createAcct'><li class='navbar'>Create Account</li></a>";
		print "<a href='login.php'><li class='navbar'>Login</li></a>";	
	}
?>
</ul>
</div>
<div id="namebox">dcHIKER</div>
</div>
</header>
<?php
	print "<div><script> var bannerPic = document.getElementById('pic_container');";
	print "bannerPic.style.backgroundImage = " . '"' . "url('$bannerFile')" . '" </script></div>';
?>




