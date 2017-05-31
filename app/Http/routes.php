<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'homepage@runHome');

Route::get('createAcct','NewAccount@createAccount');

Route::post('registerAcct','NewAccount@registerAccount');

Route::get('quickcalc/{km}', function ($km){
	$result = $km / 2.2;
	$result = round($result,3);
	echo "The value of $km kilometers is $result miles!";
});
