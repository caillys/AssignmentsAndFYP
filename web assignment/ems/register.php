<!DOCTYPE html>
<?php
	include("connection.php");
	session_start();
	$variable;
	
	if(isset($_POST["savebtn"])){
		if(isset($_POST['acceptTerms'])){
			$variable = ($_POST['acceptTerms']);
			
			$first = mysql_real_escape_string($_POST['first']);
			$last = mysql_real_escape_string($_POST['last']);
			$email = mysql_real_escape_string($_POST['email']);
			$user = mysql_real_escape_string($_POST['user']);
			$pass = mysql_real_escape_string($_POST['pass']);
			$bool = true;
			
			$get = mysql_query("SELECT * FROM member");
			while($row = mysql_fetch_array($get)){
				$table_user = $row['user'];
				if($user == $table_user){
					$bool = false;
					Print '<script>alert("Username has been taken!");</script>';
					Print '<script>window.location.assign("register.php");</script>';
				}
			}
			if($bool){
				mysql_query("INSERT INTO member (first, last, email, user, pass) VALUES ('$first', '$last', '$email', '$user', '$pass')");
				Print '<script>alert("You are successfully registered! Please login.");</script>';
				Print "<script>window.open('index.php','_self');</script>";
			}
		}
		else{
			$variable = 0;
		}
	}
?>
<html>
<head>
<title>Event Management System</title>
<link href="main_outer.css" type="text/css" media="all" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
<style>
	a
	{color:white; text-decoration:none; display:inline-block;}
	body
	{background:rgba(0,0,0,0.5) url(pic/Back.jpg) no-repeat center fixed; background-size:cover;}
	<!--{background:url(Back.jpg) no-repeat center fixed; background-size:cover;}-->
</style>
<script>
$(document).ready(function() {
	
	$('#password').keyup(function(){
		$('#result').html(checkStrength($('#password').val()))
	})
	
	function checkStrength(password){
		
		//initial strength
		var strength = 0
		
		//if the password length is less than 6, return message
		if(password.length < 6){
			$('#result').removeClass()
			$('#result').addClass('short')
			$('#result').css("color", "red");
			return 'PASSWORD TOO SHORT'
		}
		
		//length is ok, lets continue
		
		//if length is 8 characters or more, increase strength value
		if(password.length > 7) strength += 1
		
		//if password contains both lower and upper case characters, increase strength value
		if(password.match(/([a-z].*[A-Z])|([A-Z].*[a-z]/)) strength += 1
		
		//if it has one special character, increase strength value
		if(password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
		
		//if it has two special characters, increase strength value
		if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
		
		//now we have calculated strength value, we can return messages
		
		//if value is less than 200px
		if(strength < 2){
			$('#result').removeClass()
			$('#result').addClass('weak')
			$('#result').css("color", "red");
			return 'PASSWORD IS WEAK'
		}else if(strength == 2){
			$('#result').removeClass()
			$('#result').addClass('good')
			$('#result').css("color", "yellow");
			return 'PASSWORD IS GOOD'
		}else{
			$('#result').removeClass()
			$('#result').addClass('strong')
			$('#result').css("color", "green");
			return 'PASSWORD IS STRONG'
		}
	}
});
</script>
<script>
function checkForm(form){
	if(form.user.value == ""){
		alert("Error: Username cannot be blank!");
		form.user.focus();
		return false;
	}
	re = /^\w+$/;
	if(!re.test(form.user.value)){
		alert("Error: Username must contain only letters, numbers, and underscore!");
		form.user.focus();
		return false;
	}
	if(form.pass.value != ""){
		if(form.pass.value.length < 6){
			alert("Error: Password must contain at least 6 characters!");
			form.pass.focus();
			return false;
		}
		if(form.pass.value == form.user.value){
			alert("Error: Password must be different from Username!");
			form.pass.focus();
			return false;
		}
		re = /[0-9]/;
		if(!re.test(form.pass.value)){
			alert("Error: Password must contain at least one number! (0-9)");
			form.pass.focus();
			return false;
		}
		re = /[a-z]/;
		if(!re.test(form.pass.value)){
			alert("Error: Password must contain at least one lowercase letter! (a-z)");
			form.pass.focus();
			return false;
		}
		re = /[A-Z]/;
		if(!re.test(form.pass.value))
		{
			alert("Error: Password must contain at least one capital letter! (A-Z)");
			form.pass.focus();
			return false;
		}
	}
	else{
		alert("Please check that you've entered and confirm your password!");
		form.pass.focus();
		return false;
	}
	alert("You've entered a valid password correctly.");
}
function validate(evt){
	var theEvent = evt || window.event;
	var key = theEvent.keyCode || theEvent.which;
	key = String.fromCharCode(key);
	var regex = /[0-9]|\./;
	if(!regex.test(key)){
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	}
}
function myFunction(){
	if(acceptTerms.checked == 1){
		alert("Please wait");
		window.location("main.php");
	}
	else{
		alert("Please accept the Terms & Conditions");
	}
}
</script>
<script>
function changeType(){
	document.registerMember.pass.type=(document.registerMember.option.value=(document.registerMember.option.value=1)?'-1':'1')=='1'?'text':'password';
}
</script>
</head>
<body>
	<div id="index_top_box">
		<div id="index_top_left">
			<img src="pic/Logo.png"/ width="200px" height="200px">
			<p style="font-size:30px; color:white;"><b>Event Management System:</b></p>
			<p style="color:white;">The smart way to take charge of your life.</p>
			<p style="color:white;">Free, Fast, safe without limitation!</p>
		</div>
		<div id="index_top_right" style="background-color:rgba(255,255,255,0.5);">
			<p style="color:black; font-size:20px; font-family: 'Roboto', sans-serif;">SIGN UP AS NEW USER</p>
			<form style="color:black; font-size:20px; font-family:Arial;" id="registerMember" name="registerMember" action="" method="post" onsubmit="return (checkForm(this) && false);">
				<p style="color:black; font-size:20px; font-family:Arial;"><input type="text" class="text" id="first" name="first" placeholder="FIRSTNAME" size="50" required /></p>
				<p style="color:black; font-size:20px; font-family:Arial;"><input type="text" class="text" id="last" name="last" placeholder="LASTNAME" size="50" required /></p>
				<p style="color:black; font-size:20px; font-family:Arial;"><input type="email" class="text" id="email" name="email" placeholder="EMAIL" size="50" /></p>
				<p style="color:black; font-size:20px; font-family:Arial;"><input type="text" name="user" placeholder="USERNAME" size="50px" required /></p>
				<p style="color:black; font-size:20px; font-family:Arial;"><input type="password" name="pass" placeholder="PASSWORD" size="50" maxlength="50" required /><br/>
				<span id="result" ></span></p>
				<!--<p style="color:black;"><input type="checkbox" name="option" value="0" onclick="changeType()" />&nbsp;&nbsp;Show Password</p>-->
				<p style="color:black; font-size:20px; font-family: 'Roboto', sans-serif;"><input id="acceptTerms" type="checkbox" name="acceptTerms" value="value1" />&nbsp;&nbsp;I agree to the Terms & Conditions and Privacy Policy</p>
				<p style="color:black; font-size:20px; font-family: 'Roboto', sans-serif;"><button id="registerNew" type="submit" class="btn btn-info" name="savebtn" onclick="myFunction()">SIGN UP</button></p>
			</form>
			<form method="get" action="index.php">
				<button type="submit" name="sign_in" class="btn btn-info">BACK TO SIGN IN</button>
			</form>
		</div>
	</div>
	<!--<div id="index_mid_box">
		<div style="width:90%; float:left; margin-top:3%; margin-left:80px;">
			<form method="get" action="index.php">
				<button type="submit" name="sign_in" class="btn btn-info">BACK TO SIGN IN</button>
			</form>
			<p><button type="submit" name="sign_up" href="register.php">JOIN NOW</button></p>-->
		</div>
	</div>
</body>
</html>