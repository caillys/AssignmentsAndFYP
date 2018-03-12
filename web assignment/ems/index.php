<!DOCTYPE html>
<?php
	include("connection.php");
	session_start();
?>
<html>
<head>
<title>Event Management System</title>
<link href="main_outer.css" type="text/css" media="all" rel="stylesheet">
<style>
	a
	{color:black; text-decoration:none; display:inline-block;}
	body
	{background:rgba(0,0,0,0.5) url(pic/back.jpg) no-repeat center fixed; background-size:cover;}
	a:hover
	{color: white; text-decoration:none; font-size:1.2em; font-family:bold; display:inline-block;}
	<!--{background:url(Back.jpg) no-repeat center fixed; background-size:cover;}-->
</style>
</head>
<body>
	<div id="index_top_box">
		<div id="index_top_left">
			<img src="pic/logo.png"/ width="300px" height="300px" vspace="50">
			<p style="font-size:40px; color:white;"><strong>Event Management System</strong></p>
			<p style="color:white;"><strong>The smart way to take charge of your life.</strong></p>
			<p style="color:white;"><strong>Free, Fast, safe without limitation!</strong></p>
		</div>
		<div id="index_top_right" style="background-color:rgba(255,255,255,0.5);">
			<form action="" method="post">
				<p><strong>SIGN IN</p>
				<p><input type="text" name="user" placeholder="USERNAME" size="50px" /></p>
				<p><input type="password" name="pass" placeholder="PASSWORD" size="50px" /></p>
				<p><button type="submit" name="sign_in"><strong>SIGN IN</strong></button></p>
			</form>
		</div>
	</div>
	<div id="index_mid_box">
		<div id="index_mid_right" style="color:black; background-color:rgba(255,255,255,0.5);">
			<p><strong>NEW TO EVENT TIMETABLE</strong></P>
			<hr>
			<p>SIGN UP HERE!</p>
			<form method="get" action="register.php">
				<button type="submit" name="sign_up"><strong>JOIN NOW</strong></button>
			</form>
			<!--<p><button type="submit" name="sign_up" href="register.php">JOIN NOW</button></p>-->
		</div>
	</div>
	<div id="index_low_box">
		<div id="index_low_left">
			<p style="font-family:bold; "><a href="index.php" style="margin-right:20px;"><strong>HOME</a> | <a href="about.php" style="margin-right:20px; margin-left:20px;"><strong>ABOUT</a> | <a href="developer.php" style="margin-left:20px;"><strong>DEVELOPERS</a></p>
		</div>
	</div>
</body>
</html>
<?php
	include("connection.php");
	
	if(isset($_POST['sign_in'])){
		$user = mysql_real_escape_string($_POST['user']);
		$pass = mysql_real_escape_string($_POST['pass']);
		
		$check_user = mysql_query("SELECT * FROM member WHERE user = '$user'");
		$run = mysql_num_rows($check_user);
		
		$table_user = "";
		$table_pass = "";
		
		if($run > 0){
			while($row = mysql_fetch_assoc($check_user)){
				$table_user = $row['user'];
				$table_pass = $row['pass'];
			}
			if(($user == $table_user) && ($pass == $table_pass)){
				if($pass == $table_pass){
					$_SESSION['user'] = $user;
					setcookie("user","$user", time()+86400);
					echo "<script> alert('Welcome to Event Timetable System'); window.open('main_page.php','_self')</script>";
				}
			}
			else{
				Print '<script>alert("Incorrect Password!");</script>';
				Print '<script>window.location.assign(index.php");</scrpt>';
			}
		}
		else{
			Print '<script>alert("Incorrect Username!");</script>';
			Print '<script>window.location.assign("index.php");</script>';
		}
	}
?>