<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class homepage extends Controller
{
//This will create the "Home Page" depending on whether user is logged in or no
public function runHome(){
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
	else{	
        $loggedIn = false;
		}
	$pageTitle = "dcHiker Home Page - A guide to hiking destinations near (or far) from the DMV";
	//Get weather data and tell the folks if it's a good day to hike
    $request = 'http://api.openweathermap.org/data/2.5/weather?zip=20852,us&APPID=d341316a16d476aa2d13fba24c5fa71f';
    $response  = file_get_contents($request);
    $jsonobj  = json_decode($response, true);
	$wthrDesc = strtoupper($jsonobj['weather'][0]['description']);
	return view('index',array('weatherDesc'=>$wthrDesc, 'pageTitle'=>$pageTitle, 'loggedIn'=>$loggedIn));	
		
	}
}
