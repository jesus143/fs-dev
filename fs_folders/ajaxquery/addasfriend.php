<?php
	require("connect.php");
	session_start();
	
	$mno1=$_GET['mno1'];
	$mno2=$_GET['mno2'];
	
	mysql_query("insert into friends values(0,$mno1,$mno2,0)") or die(mysql_error());
	echo "1";
?> 