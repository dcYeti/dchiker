<?php
session_start();
//Before sending HTML, Several variables will be set (Don't code HTML before the template include line)
//1)$loggedIn = true if login cookie found 2)number of picture to use for banner (randomly chosen) 3)person's name
//4)Person's Location (either by submitted zip code or geolocation) for weather info
//5)Title of page in $pageTitle variable
$firstName = ''; $locZip = '';
if (isset($_COOKIE['yoga'])){	
	if (htmlentities($_COOKIE['yoga']) == 'pants'){
    	$loggedIn = true;
		//getsessionvariables
		$firstName = $_SESSION['firstName'];
		$locZip =$_SESSION['zipcode'];
	}
	else {$loggedIn = false;}
	}		
	else
	{	
        $loggedIn = false;
	}
$pageTitle = "dcHiker Home Page - A guide to hiking destinations near (or far) from the DMV";
include("template_head.html");

//Get weather data and tell the folks if it's a good day to hike
    $request = 'http://api.openweathermap.org/data/2.5/weather?zip=20852,us&APPID=d341316a16d476aa2d13fba24c5fa71f';
    $response  = file_get_contents($request);
    $jsonobj  = json_decode($response, true);
 
?>


<div id="main_container">
	<div class = "main_panel">
	<div id="map_area">
	</div>
</div>

<aside class="side_panel">
	<p class="box_header">dcHIKER Resources</p>
	<ul>
		<li class="aside_list">Beginner's Guide</li>
		<li class="aside_list">Trail Manners & Guidelines</li>
		<li class="aside_list">Mid Atlantic Hiking Profile</li>
		
		
	</ul>
</aside>

<aside class="bottom_panel">
	<p class="box_header">Today Is<br/><br/>
		<span id="date_box"></span>
	</p>
	<br/>
	<p class="box_header">Current Conditions<br/>
	<?php //var_dump($jsonobj);  
			echo strtoupper($jsonobj['weather'][0]['description']);
	?>
	</p>	

</aside>
<footer>All Rights Reserved anthonyahn.com/dcHIKER</footer>
</div>
<script src="hikerjs.js"></script>
<script> initMap(); </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLRghOiShg-LpOnOapbbCZduf4AhCP4yk&callback=initMap" async defer></script>
</body>
</html>