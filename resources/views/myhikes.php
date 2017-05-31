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
$pageTitle = "dcHiker My Hikes - Hike History";
$loggedIn = true;
include("template_head.html");
require("classes/hiker_classes.php");
?>
<div id="main_container">
<div class = "hiker_form">
	<h2>My Hikes - Coming Soon</h2>
<?php
	$catoctin = new DomesticHike();
	$catoctin->HikeName("Catoctin Mountain Loop");
	$catoctin->HikeDistance("8");
	$catoctin->HikeType("Loop");
	$catoctin->HikeCity("Thurmont");
	$catoctin->HikeState("Maryland");
	$volcanSantaAna = new IntlHike();
	$volcanSantaAna->HikeName("Santa Ana Volcano");
	$volcanSantaAna->HikeDistance("16");
	$volcanSantaAna->HikeType("There and Back");
	$volcanSantaAna->HikeCity("Santa Ana");
	$volcanSantaAna->HikeCountry("El Salvador");
	$billygoat = new DomesticHike("Billy Goat Trail", "10", "Loop", "Potomac", "MD");
	$swisstrail = new IntlHike("Swiss HIke", "10", "There and Back", "Zurich", "Switzerland");
		
	DomesticHike::noThis("Holy Shit");
	$trails = array($catoctin, $volcanSantaAna, $billygoat, $swisstrail);
	foreach ($trails as $trailNo){
		echo "<br/><br/>";
		$trailNo->greatHike();
	}
	
	
?>	
	
</div>
</div>
</body>
</html>