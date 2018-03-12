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
function confirmedit(){
	var edit = confirm("You are about to edit an existing event. Do you wish to proceed?");
		
	if(edit == true){
		window.open("edit_event.php","_self");
		return edit;
	}
	else{
		return edit;
	}
}
function confirmdel(){
	var del = confirm("You are about to delete an existing event. Do you wish to proceed?");
		
	if(del == true){
		alert("The event has been deleted");
		return del;
	}
	else{
		return del;
	}
}
function confirmview(){
	var view = confirm("You are about to view an existing event. Do you wish to proceed?");
		
	if(view == true){
		window.open("detail_event.php","_self");
		return view;
	}
	else{
		return view;
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
			<p style="float:left; padding-left:20px;font-size:1.5em; font-family: 'Roboto', sans-serif;">WELCOME <b><?php echo $row["first"]; ?> <?php echo $row["last"]; ?></b>, TO EVENT MANAGEMENT SYSTEM</p>
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
		<div style="width:55%; float:right; font-size:16px; font-family: 'Roboto', sans-serif; border:solid 2px black;margin-top:5%; margin-right:5%; text-align:justify; background-color:rgba(225,225,225,0.5); border-radius:10px;">
			<p style="font-size:20px; text-align:center;"><strong>EVENT LIST</strong></p>
			<table width='100%' align='center' border='1' style="line-height:3em; text-align:center;">
				<tr>
					<th>ID</th>
					<th>TITLE</th>
					<th>START DATE</th>
					<th>FINAL DATE</th>
					<th>VIEW</th>
					<th>EDIT</th>
					<th>DELETE</th>
				</tr>
				<?php
					$query = "SELECT * FROM event WHERE user = '$user'";
					$run = mysql_query($query);
					
					while($place=mysql_fetch_array($run)){
						$id = $place[0];
						$title = $place[4];
						$start_date = $place[2];
						$end_date = $place[3];
				?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $title; ?></td>
					<td><?php echo $start_date; ?></td>
					<td><?php echo $end_date; ?></td>
					<td><a href='detail_event.php?view=<?php echo $id;?>' onclick="return confirmview();" role="button">VIEW</a></td>
					<td><a href='edit_event.php?edit=<?php echo $id;?>'onclick="return confirmedit();" role="button">EDIT</a></td>
					<td><a href='delete_event.php?del=<?php echo $id;?>' onclick="return confirmdel();" role="button">DELETE</a></td>
				</tr>
				<?php
					}
				?>
			</table>
			<!--<form action="" method="post" enctype="multipart/form-data">
				<p style="padding-left:20px;">FIRST NAME <br/><input type="text" id="first" name="first" size="50" readonly value="<?php echo $row["first"];?>" /></p>
				<p style="padding-left:20px;">LAST NAME <br/><input type="text" id="last" name="last" size="50" readonly value="<?php echo $row["last"];?>" /></p>
				<p style="padding-left:20px;">E-MAIL <br/><input type="email" id="email" name="email" size="50" readonly value="<?php echo $row["email"];?>" /></p> 
				<p style="padding-left:20px;">USERNAME <br/><input type="text" id="user" name="user" size="50" readonly value="<?php echo $row["user"];?>" /></p>
				<p style="padding-left:20px;">PASSWORD <br/><input type="text" id="pass" name="pass" size="50" readonly value="<?php echo $row["pass"];?>" /></p>
				<p style="padding-left:20px;"><button id="add_event" type="submit" class="btn btn-info" name="savebtn" onclick="myFunction()">EDIT PROFILE</button></p>
			</form>-->
		</div>
	</div>
</body>
</html>