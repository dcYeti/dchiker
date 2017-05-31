@include('template_head')


<div id="main_container">
<script src="js/hikerjs.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<div class = "hiker_form">
	<h2>Register An Account, Save Your Hikes, Keep Your Planning Information</h2>
	<form name="registeraccount" action="registerAcct" onsubmit="return validatehikerform()" method="post">
	<p class="formprompt">Select A Username: 
	<input type="text" name="username" size="18" maxlength="20" />
	</p>
	<p class="formprompt">What's Your First Name?
	<input type="input" name="firstname" size="18" maxlength="20" />
	</p>
	<p class="formprompt">Last Name?
	<input type="input" name="lastname" size="18" maxlength="20" />
	</p>
	<p class="formprompt">Gender?
		<select name="gender">	
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
	</p>
	<p class="formprompt">Enter Date of Birth
	<input type="date" name="birth_date" id = "datepicker" size="15" maxlength="15" />
	</p>
	<p class="formprompt">Enter Zip Code
	<input type="input" name="zipcode" size="10" maxlength="10" />
	</p>
	<p class="formprompt">What Type of Hiker Are You?
	<select name="hiker_type">
		<option value="beginner">Beginner</option>
		<option value="occasional">Occasional</option>
		<option value="day_hiker">Day Hiker</option>
		<option value="backpacker">Backpacker</option>
		<option value="world_traveler">World Traveler</option>
		<option value="pro">Pro</option>			
	</select>
	</p>
	<p class="formpromptleft"></p>
	<p class="formprompt">Select Password: 
	<input type="password" name="dcpassword" size="18" maxlength="20" />
	</p>
	<p class="formprompt">Re-type Your Password: 
	<input type="password" name="dcpasswordverify" size="18" maxlength="20" />
	</p>
	<p class="formpromptleft"><br/>
	<input type = "submit" name="submitbtn" value="submit" id="smit"/>
	</p>
	<input type = "hidden" name="_token" value="{{ csrf_token() }}" />
	</form>
</div>
</div>
<script>activateCalendar();</script>
</body>
</html>