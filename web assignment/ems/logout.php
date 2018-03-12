<?php
	session_start();
	session_destroy();
?>
<script type="text/javascript">
	alert("You have logout successfully");
	window.open("index.php","_self");
</script>