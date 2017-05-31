<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//This Class handles get/post coming from new_account_form
class NewAccount extends Controller
{
    //Create Account Functionality
	public function createAccount() {
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
		//stop page if user is already logged in
		if ($loggedIn == true) {
			print "<div id='main_container'><div class = 'main_panel'>Please log out to create a new account
			</div></div></body></html><script>window.stop();</script>";
		}
		else {
				return view('new_account_form', array('firstName'=>$firstName, 'loggedIn'=>$loggedIn, 'pageTitle'=>$pageTitle));
		}
	}
	
	//This will handle the post of new account
	public function registerAccount(){
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

		
		//If logged in, exit
		//...to be completed
		
		//Include Login Info
		require(app_path() . '/Includes/db_creds.php');
		//Retrieve vars from POST array
		$userName = strtolower($_POST['username']);
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$gender = $_POST['gender'];
		$dob = $_POST['birth_date'];
		$zip = $_POST['zipcode'];
		$level = $_POST['hiker_type'];
		$password = $_POST['dcpassword'];
		
		


		
		return view('hikerregister', array('pageTitle'=>$pageTitle, 'loggedIn'=>$loggedIn, 'firstName'=>$firstName,
		      'username'=>$username, 'dbError'=>$db_error));
	}
	
	
}
