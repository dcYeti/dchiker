<?php
	//This will connect to the database and make sure that the tables are created
	DEFINE('DB_USER', 'root');
	DEFINE('DB_PASS','5onicspeed1eresm!the420');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('DB_NAME', 'dchikerDB');
	
	//Connect to MYSQL server
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASS) or die('Failure to connect to MySQL Server');
	//Connect to DB_HOST, the variable db_error will be flagged if there is a connection problem
	$db_error = false;
	//Create database
	$createdbQ = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
	@mysqli_query($dbc,$createdbQ);
	if(!@mysqli_select_db($dbc, DB_NAME)){
		$db_error = true;
	}
	
	//Set names for tables
	$userTable = 'user_table';
	$hikeTable = 'hike_table';
	
	//Create Table
	$createTableQ = "CREATE TABLE IF NOT EXISTS $userTable (user_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(20) NOT NULL, user_lastname VARCHAR(20) NOT NULL , user_firstname VARCHAR(20) NOT NULL, 
	hiker_type VARCHAR(20) NOT NULL, user_zip VARCHAR(9) NOT NULL, user_country VARCHAR(20), reg_date TIMESTAMP NOT NULL default NOW())";
	if(!@mysqli_query($dbc, $createTableQ)){
		$db_error = true;
	}
		
	