<?php
	require("connect.php");
	session_start();
	$fno=$_GET['fno'];
	mysql_query("update friends set status=1 where fno=$fno") or die(mysql_error());
	echo"1";
?>