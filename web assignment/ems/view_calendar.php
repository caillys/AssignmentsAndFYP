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
		<div style="width:25%; float:right; font-size:16px; font-family: 'Roboto', sans-serif; border:solid 2px black;margin-top:5%; margin-right:5%; text-align:justify; background-color:rgba(225,225,225,0.5); border-radius:10px;">
			<p style="font-size:20px; text-align:center;"><strong>EVENT CALENDAR</strong></p>
			<table width='100%' align='center' border='1' style="line-height:3em; text-align:center;">
			<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php
class Calendar
{
	var $events;

	function Calendar($date)
	{
		if(empty($date)) $date = time();
		define('NUM_OF_DAYS', date('t',$date));
		define('CURRENT_DAY', date('j',$date));
		define('CURRENT_MONTH_A', date('F',$date));
		define('CURRENT_MONTH_N', date('n',$date));
		define('CURRENT_YEAR', date('Y',$date));
		define('START_DAY', (int) date('N', mktime(0,0,0,CURRENT_MONTH_N,1, CURRENT_YEAR)) - 1);
		define('COLUMNS', 7);
		define('PREV_MONTH', $this->prev_month());
		define('NEXT_MONTH', $this->next_month());
		$this->events = array();
	}

	function prev_month()
	{
		return mktime(0,0,0,
				(CURRENT_MONTH_N == 1 ? 12 : CURRENT_MONTH_N - 1),
				(checkdate((CURRENT_MONTH_N == 1 ? 12 : CURRENT_MONTH_N - 1), CURRENT_DAY, (CURRENT_MONTH_N == 1 ? CURRENT_YEAR - 1 : CURRENT_YEAR)) ? CURRENT_DAY : 1),
				(CURRENT_MONTH_N == 1 ? CURRENT_YEAR - 1 : CURRENT_YEAR));
	}
	
	function next_month()
	{
		return mktime(0,0,0,
				(CURRENT_MONTH_N == 12 ? 1 : CURRENT_MONTH_N + 1),
				(checkdate((CURRENT_MONTH_N == 12 ? 1 : CURRENT_MONTH_N + 1) , CURRENT_DAY ,(CURRENT_MONTH_N == 12 ? CURRENT_YEAR + 1 : CURRENT_YEAR)) ? CURRENT_DAY : 1),
				(CURRENT_MONTH_N == 12 ? CURRENT_YEAR + 1 : CURRENT_YEAR));
	}
	
	function getEvent($timestamp)
	{
		$event = NULL;
		if(array_key_exists($timestamp, $this->events))
			$event = $this->events[$timestamp];
		return $event;
	}
	
	function addEvent($event, $day = CURRENT_DAY, $month = CURRENT_MONTH_N, $year = CURRENT_YEAR)
	{
		$timestamp = mktime(0, 0, 0, $month, $day, $year);
		if(array_key_exists($timestamp, $this->events))
			array_push($this->events[$timestamp], $event);
		else
			$this->events[$timestamp] = array($event);
	}
	
	function makeEvents()
	{
		if($events = $this->getEvent(mktime(0, 0, 0, CURRENT_MONTH_N, CURRENT_DAY, CURRENT_YEAR)))
			foreach($events as $event) echo $event.'<br />';
	}
	
	function makeCalendar()
	{
		echo '<table border="1" cellspacing="4"><tr>';
		echo '<td width="30"><a href="?date='.PREV_MONTH.'">&lt;&lt;</a></td>';
		echo '<td colspan="5" style="text-align:center">'.CURRENT_MONTH_A .' - '. CURRENT_YEAR.'</td>';
		echo '<td width="30"><a href="?date='.NEXT_MONTH.'">&gt;&gt;</a></td>';
		echo '</tr><tr>';
		echo '<td width="30">Mon</td>';
		echo '<td width="30">Tue</td>';
		echo '<td width="30">Wed</td>';
		echo '<td width="30">Thu</td>';
		echo '<td width="30">Fri</td>';
		echo '<td width="30">Sat</td>';
		echo '<td width="30">Sun</td>';
		echo '</tr><tr>';
		
		echo str_repeat('<td>&nbsp;</td>', START_DAY);
		
		$rows = 1;
		
		for($i = 1; $i <= NUM_OF_DAYS; $i++)
		{
			if($i == CURRENT_DAY)
				echo '<td style="background-color: #C0C0C0"><strong>'.$i.'</strong></td>';
			else if($event = $this->getEvent(mktime(0, 0, 0, CURRENT_MONTH_N, $i, CURRENT_YEAR)))
				echo '<td style="background-color: #99CCFF"><a href="?date='.mktime(0,0,0,CURRENT_MONTH_N,$i,CURRENT_YEAR).'">'.$i.'</a></td>';
			else
				echo '<td><a href="?date='.mktime(0 ,0 ,0, CURRENT_MONTH_N, $i, CURRENT_YEAR).'">'.$i.'</a></td>';
					
			if((($i + START_DAY) % COLUMNS) == 0 && $i != NUM_OF_DAYS)
			{
				echo '</tr><tr>';
				$rows++;
			}
		}
		echo str_repeat('<td>&nbsp;</td>', (COLUMNS * $rows) - (NUM_OF_DAYS + START_DAY)).'</tr></table>';
	}
}		
		$cal = new Calendar($_GET['date']);
					$query = "SELECT * FROM event WHERE user = '$user'";
					$run = mysql_query($query);
					
					while($place=mysql_fetch_array($run)){
						$title = $place[4];
						$start_date = $place[2];
						$end_date = $place[3];
						$convert_date = strtotime($start_date);
						$month = intval(date('m',$convert_date));
						$day = intval(date('j',$convert_date));
						$cal->addEvent($title, $day, $month);
					}
					$cal->makeCalendar();
					$cal->makeEvents();

?>

			</table>
			
		</div>
	</div>
</body>
</html>