<?php
	require("connect.php");
	session_start();
	$email=$_GET['email'];
	$uname=$_GET['uname'];
	if($uname!=""){
		$q=mysql_query("select * from fs_member_accounts where username='$uname'") or die(mysql_error());
		if($f=mysql_fetch_array($q))
			echo "1";
		else
			echo "0";
	}
	if($email!=""){
		$q=mysql_query("select * from fs_member_accounts where email='$email'") or die(mysql_error());
		if($f=mysql_fetch_array($q))
			echo "1";
		else
			echo "0";
	}
?>