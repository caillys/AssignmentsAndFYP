<DOCTYPE html>
<?php
	include("connection.php");
	
	$user = $_COOKIE['user'];
	
	session_start();
	
	if(!$_SESSION['user']){
		header("location: index.php");
	}
	

?>
<html>
<head>
<title>Event Management System</title>
<link href="main.css" type="text/css" media="all" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	a
	{color:black; text-decoration:none; display:inline-block; font-size:1.5em; font-family: 'Roboto', sans-serif;}
	body
	{background:rgba(0,0,0,0.5) url(pic/back.jpg) no-repeat center fixed; background-size:cover;}
	a:hover
	{color: white; text-decoration:none; font-size:2.0em; font-family: 'Roboto', sans-serif; display:inline-block;}
</style>
<script type="text/javascript">
	function disp_conf(){
		var result = confirm("You are about to logout. Do you wish to proceed?");
		
		if(result == true){
			window.open("logout.php","_self");
			return result;
		}
		else{
			return result;
		}
	}
</script>
<script>
function myFunction(){
	window.location("main_page.php");
}
</script>

</head>
<body>
	<div id="main_top_box">
		<div id="main_top_left" style="width:100%; font-size:20px; font-family: 'Roboto', sans-serif; background-color:rgb(89,143,153); color:rgba(255,255,255); margin:0%;">
		<?php
			$result = mysql_query("SELECT * FROM member WHERE user = '$user'");
			$row = mysql_fetch_assoc($result);
		?>
			<p style="float:left; padding-left:20px; font-size:1.5em; font-family: 'Roboto', sans-serif;">WELCOME <b><?php echo $row["first"]; ?> <?php echo $row["last"]; ?></b>, TO EVENT MANAGEMENT SYSTEM</p>
			<p style="float:right; font-size:20px; padding-top:8px; padding-right:20px;"><a href="#" onclick="disp_conf()">LOGOUT</a></p>
		</div>
		<div id="main_mid_box">
			<div id="main_mid_left" style="width:30%; float:left; font-size:15px; border:solid 2px black; margin-top:5%; margin-left:5%; text-align:justify; background-color:rgba(225,225,225,0.5); border-radius:20px; padding-bottom:100px;">
				<p style="padding-left:20px;"><a href="main_page.php">HOME</a></p>
				<hr>
				<p style="padding-left:20px;"><a href="user_profile.php">PROFILE</a></p>
				<hr>
				<p style="padding-left:20px;"><a href="add_event.php">ADD EVENT</a></p>
				<hr>
				<p style="padding-left:20px;"><a href="view_event.php">VIEW EVENT</a></p>
				<hr>
				<p style="padding-left:20px;"><a href="view_calendar.php">VIEW CALENDAR</a></p>
			</div>
		</div>
		<div style="width:40%; float:right; font-size:16px; font-family: 'Roboto', sans-serif; border:solid 2px black;margin-top:5%; margin-right:5%; text-align:justify; background-color:rgba(225,225,225,0.5); border-radius:10px;">
			<p style="font-size:20px; text-align:center;"><strong>PROFILE</strong></p>
			<hr>
			<form action="" method="post" enctype="multipart/form-data">
				<p style="padding-left:20px;"><strong>FIRST NAME </strong><br/><input type="text" id="first" name="first" size="50" readonly value="<?php echo $row["first"];?>" /></p>
				<p style="padding-left:20px;"><strong>LAST NAME </strong><br/><input type="text" id="last" name="last" size="50" readonly value="<?php echo $row["last"];?>" /></p>
				<p style="padding-left:20px;"><strong>E-MAIL </strong><br/><input type="email" id="email" name="email" size="50" readonly value="<?php echo $row["email"];?>" /></p> 
				<p style="padding-left:20px;"><strong>USERNAME </strong><br/><input type="text" id="user" name="user" size="50" readonly value="<?php echo $row["user"];?>" /></p>
				<p style="padding-left:20px;"><strong>PASSWORD </strong><br/><input type="text" id="pass" name="pass" size="50" readonly value="<?php echo $row["pass"];?>" /></p>
				
			</form>
		</div>
	</div>
</body>
</html>