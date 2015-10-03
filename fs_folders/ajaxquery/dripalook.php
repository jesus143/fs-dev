<?php
	require("connect.php");
	session_start();
	if($_SESSION['mno']!="")
	{
		$id=$_GET['id'];
		$q=mysql_query("select * from pl_drips where plno=$id and mno=".$_SESSION['mno'])or die(mysql_error());
		if(!(mysql_fetch_array($q))){
			$q="insert into pl_drips values(0,$id,".$_SESSION['mno'].")";
			$ex=mysql_query($q) or die(mysql_error());
			$q="insert into activity values(0,$mno,'Dripped','postedlooks',$id,'".date("Y-m-d h:m:s")."')";
			$ex=mysql_query($q) or die(mysql_error()); 
			echo "1";
		}
		else
			echo "3";
	}
	else
		echo "2";
?>