<DOCTYPE html>
<?php
	include("connection.php");
	
	$user = $_COOKIE['user'];
	
	session_start();
	
	if(!$_SESSION['user']){
		header("location: index.php");
	}
	
	mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("timetable") or die("Cannot connect to database");
		
	$id = $_REQUEST["edit"];
		
	$show = mysql_query("SELECT * FROM event WHERE id = $id");
	$place = mysql_fetch_assoc($show);

	if(isset($_POST["savebtn"])){
		
		$start_date = mysql_real_escape_string($_POST['start_date']);
		$end_date = mysql_real_escape_string($_POST['end_date']);
		$title = mysql_real_escape_string($_POST['title']);
		$description = mysql_real_escape_string($_POST['description']);
		$important = mysql_real_escape_string($_POST['important']);
		
		mysql_query("UPDATE event SET start_date='$start_date', end_date='$end_date', title='$title', description='$description', important='$important' WHERE id ='$id'");
		?>
		<script type="text/javascript">
			alert("Event updated");
		</script>
		<?php
			header("refresh:0.5; url=view_event.php");
	}
?>
<html>
<head>
<title>Event Management System</title>
<link href="main.css" type="text/css" media="all" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	.btn btn-info{color:black; text-decoration:none; font-size:1em; font-family: 'Roboto', sans-serif;}
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
	var result = confirm("You are about to update an event. Do you wish to proceed?");
	
	if(result == true){
		alert("Your event has been updated.");
		window.open('main_page.php','_self');
	}
}
</script>
<script>
function backFunction(){
	var back = confirm("You are about to abort. Do you wish to proceed?");
	
	if(back == true){
		alert("Your event will not be updated.");
		window.open('view_event.php','_self');
		header("location:view_event.php");
	}
}
</script>
<!--<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>-->
</head>
<body>
	<div id="main_top_box">
		<div id="main_top_left" style="width:100%; font-size:20px; font-family:'Roboto', sans-serif; background-color:rgb(89,143,153); color:rgba(255,255,255); margin:0%;">
		<?php
			$result = mysql_query("SELECT * FROM member WHERE user = '$user'");
			$row = mysql_fetch_assoc($result);
		?>
			<p style="float:left; padding-left:20px;font-size:1.5em;font-family: 'Roboto', sans-serif;">WELCOME <b><?php echo $row["first"]; ?> <?php echo $row["last"]; ?></b>, TO EVENT MANAGEMENT SYSTEM</p>
			<p style="float:right; font-size:20px; padding-top:8px; padding-right:20px; font-family: 'Roboto', sans-serif;"><a href="#" onclick="disp_conf()">LOGOUT</a></p>
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
		<div style="width:40%; float:right; font-size:16px; border:solid 2px black;margin-top:5%; margin-right:5%; text-align:justify; background-color:rgba(225,225,225,0.5); border-radius:10px;">
			<p style="font-size:20px; text-align:center;"><strong>EDIT EVENT</strong></p>
			<hr>
			<form action="" method="post" enctype="multipart/form-data">
				<p style="padding-left:20px;"><strong>START DATE</strong> <br/><input type="date" id="start_date" name="start_date" placeholder="START DATE" size="50" required /></p>
				<p style="padding-left:20px;"><strong>FINAL DATE</strong> <br/><input type="date" id="end_date" name="end_date" placeholder="END DATE" size="50" required /></p>
				<p style="padding-left:20px;"><strong>TITLE</strong> <br/><input type="text" class="text" id="title" name="title" size="50" value="<?php echo $place["title"];?>" required /></p> 
				<p style="padding-left:20px;"><strong>DESCRIPTION </strong><br/><textarea name="description" cols="52" rows="5"><?php echo $place["description"];?></textarea></p>
				<p style="padding-left:20px;"><strong>IMPORTANT</strong> <br/><input type="text" class="text" id="important" name="important" size="50" value="<?php echo $place["important"];?>" required /></p>
				
				<p style="padding-left:20px;"><button class="btn btn-info" type="submit" name="savebtn" onclick="myFunction()" >UPDATE</button>
				<button class="btn btn-info" type="reset" name="resetbtn">RESET</button>
				<button class="btn btn-info" name="menubtn" onclick="backFunction()">CANCEL</button>
				</p>
			</form>
		</div>
	</div>
</body>
</html>