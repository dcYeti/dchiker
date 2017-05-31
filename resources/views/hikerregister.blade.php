@include('template_head')


<?php
/*
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
$pageTitle = "dcHiker Home Page - Thanks for registering";
include("template_head.html");

//stop page if user is already logged in or accessing directly

if ($loggedIn == true || $_SERVER['REQUEST_METHOD'] != "POST") {
	print "<div id='main_container'><div class = 'main_panel'>Permission Denied
	</div></div></body></html><script>window.stop();</script>";
}

print "<div id='main_container'><div class = 'main_panel'>";
	

$username = strtolower($_POST['username']);
$name = $_POST['firstname'];
$password = $_POST['dcpassword'];
$zipcode = $_POST['zipcode'];
$level = $_POST['hiker_type'];

//mySQL connection say a prayer!
$dbName = 'anthopd6_dcHKR_users';
if(!$dbc = mysql_connect(localhost, anthopd6_stthng, israel2020)){
	print "Database Connection Error";
}
if(!@mysql_select_db($dbName, $dbc)){
	print "Error: Database not Selected Succesfully";
}
//assign table create query to car_users
$tableName = 'dcHKR_users';
if (mysql_num_rows(@mysql_query("SHOW TABLES LIKE '$tableName'")) == 0){
	$tableCreateQuery = "CREATE TABLE $tableName (entry_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(20) NOT NULL, firstname VARCHAR(20) NOT NULL, password VARCHAR(20) NOT NULL,
	zipcode VARCHAR(5) NOT NULL, hiker_type VARCHAR(20) NOT NULL)";
		if (@mysql_query($tableCreateQuery, $dbc)){	print "Table Made"; }
		else{
		print "Table Error";}
	}
	//write info to appropriate columns: entry_id, username, firstname, password, budget
	$insertQuery = "INSERT INTO $tableName (username, firstname, password, zipcode, hiker_type) VALUES 
	('$username', '$name', '$password', '$zipcode', '$level')";
	if (!@mysql_query($insertQuery, $dbc)){
		print "error inserting user data to database";   }
	
	//this is a general list of usernames used by ajax to check if username exists before hitting validation
	//add to file - javascript will pull file and check for repeats
	$filePath = "../../dchikerdata/usernamelist.txt";
	if(is_writable($filePath)){
		$username4storage = trim($username) . "@";
		file_put_contents($filePath, $username4storage, FILE_APPEND | LOCK_EX); 
		}
	else{ print "error writing username to file";}
	mysql_close($dbc);

print "Hello $name - Your account has been set up.  <br/>
Your username is <b>$username</b><br/>Please use link above to login<br/>";
?>
</div></div></body></html>
