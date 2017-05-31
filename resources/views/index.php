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
	<p class="box_header">The DC Area's Top Hikes</p>
	<ul>
		<li class="main_list">Billy Goat Trail</li>
		<li class="main_list">The Catoctin Mountain Loop</li>
		<li class="main_list">Old Rag Mountain</li>
		<li class="main_list">Harper's Ferry</li>
		<li class="main_list">Spruce Knob</li>
	</ul> <br/>
	<p class="box_header">Multi-Day Hikes</p>
	<ul>
		<li class="main_list">Three Rivers Wilderness</li>
		<li class="main_list">George Washington National Forest</li>
		<li class="main_list">Black Forest of Pennsylvania</li>
		<li class="main_list">Mt Rogers Grand Loop</li>

	</ul> <br/>
	<p class="box_header">Best within a Day's Drive</p>
	<ul>
		<li class="main_list">Mt. LeConte (Tennessee)</li>
		<li class="main_list">Mt Washington (New Hampshire)</li>
		<li class="main_list">Grayson Highlands (SW Virginia)</li>
		<li class="main_list">Mt Mitchell (North Carolina)</li>
		<li class="main_list">Adirondacks (New York)</li>
	</ul>
	
</div>

<aside class="side_panel">
	<p class="box_header">dcHIKER Resources</p>
	<ul>
		<li class="aside_list">Beginner's Guide</li>
		<li class="aside_list">Trail Manners & Guidelines</li>
		<li class="aside_list">Mid Atlantic Hiking Profile</li>
		<li class="aside_list">Packing & Attire</li>
		<li class="aside_list">Health & Safety</li>
		<li class="aside_list">Hiking in Inclement Weather</li>
		<li class="aside_list">Guide to Winter Hiking</li>
		<li class="aside_list">About dcHIKER</li>
		
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
<footer>All Rights Reserved AnthonyAhn.com/dcHIKER.com</footer>
</div>

<script src="hikerjs.js"></script>
</body>
</html>