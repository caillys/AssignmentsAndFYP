<?php
	include("connection.php");
	
	$delete_id = $_GET['del'];
	
	$query = "DELETE FROM event WHERE id = '$delete_id'";
	
	if(mysql_query($query)){
		echo "<script>window.open('view_event.php?deleted = Event has been deleted!','_self')</script>";
	}
?>