function activateCalendar() {
	var calendarLoc = document.getElementById('datepicker');
	$calLoc = $(calendarLoc);
	$calLoc.datepicker({defaultDate: -8000, changeYear: true, yearRange: "1900:2015" });
}


var map;
function initMap() {
        map = new google.maps.Map(document.getElementById('map_area'), {
          center: {lat: 39.057573, lng: -77.105878} ,
          zoom: 8
        });
}

//state today's date
var today = new Date();
var dateString = today.toDateString();
var dateText = document.createTextNode(dateString);
document.getElementById('date_box').appendChild(dateText);

//validate registration form
function validatehikerform(){
		var usersname = document.forms["registeraccount"]["username"].value;
		var nameofperson = document.forms["registeraccount"]["firstname"].value;
		var pass1 = document.forms["registeraccount"]["dcpassword"].value;
		var pass2 = document.forms["registeraccount"]["dcpasswordverify"].value;
		var zipcode = document.forms["registeraccount"]["zipcode"].value;
		//we assume username is unique unless we find out otherwise
		var usernameExists = false;

		var xhr = new XMLHttpRequest();
		//find if username exists
		xhr.onload = function(){
			if(xhr.status == 200){
				var totalfile = xhr.responseText.toString();
				var username4check = usersname.trim().concat("@");
				var stringSearchIndex = totalfile.search(username4check);
				if (stringSearchIndex > -1){
					usernameExists = true;				
				}
				}
			else {alert ('Problem with ajax request, please try again later');return false;}
			}
	//This will get behind the browser using cached data
	today = new Date();
	today = today.getTime();
	xhr.open('GET', "../storage/ajax_lists/usernamelist.txt?" + today, false);
	xhr.send(null);
			
	if ((usersname == null || nameofperson == null || pass1 == null || pass2 == null || zipcode==null) ||
	   (usersname == "" || nameofperson == "" || pass1 == "" || pass2 == "" || zipcode=="")){
		var errorMessage = "You Have Blank Fields, Please Re-Check Form";
		alert(errorMessage);
		return false;
	}
	else if (usernameExists){
		var errorMessage = "The username you selected already is taken.  Please select another";
		alert(errorMessage);
		return false;
		}
	else if (zipcode.length < 5 || isNaN(parseInt(zipcode))){
		var errorMessage = "The zip code you submitted is not valid";
		alert(errorMessage);
		return false;
	}
	else if (pass1 != pass2){
		var errorMessage = "Your passwords Do Not Match, Please re-Check";
		alert(errorMessage);
		return false;
	}
	else{
		return true;
	}
}



function validatelogin(){
		var usersname = document.forms["dcHKRlogin"]["username"].value;
		var password = document.forms["dcHKRlogin"]["password"].value;
					
	if ((usersname == null || password == null) || (usersname == "" || password == "")){
		var errorMessage = "You Have Blank Fields, Please Re-Check Form";
		alert(errorMessage);
		return false;
	}
	else {
		return true;
	}
}




