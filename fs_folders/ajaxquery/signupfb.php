<?php
	require("connect.php");
	session_start();
	if($_SESSION['mno']=="")
	{
			$fbid=$_GET['id'];
			$q="select fs.mno,fa.username from fs_members fs,fs_member_accounts fa where fa.mno=fs.mno and fs.fbid='$id' or fs.twid='$id'";
			$ex=mysql_query($q) or die(mysql_error());
			if($r=mysql_fetch_array($ex))
			{
				$_SESSION['mno']=$r[0];
				$_SESSION['uname']=$r["username"];
				echo "1";
			}
			else
			{
				$_SESSION['mno']=$r[0];
				$_SESSION['uname']=$r["username"];
				echo "2";
			}
	}
	else
	{
		echo "2";
	}
	/*
	if($_SESSION['mno']=="")
	{
		$fbid=$_GET['fbid'];
		$lname=$_GET['lname'];
		$fname=$_GET['fname'];
		$email=$_GET['email'];
		$gender=$_GET['gender'];
		$uname=$_GET['uname'];
		$q="select mno from fs_members where fbid='$fbid'";
		$ex=mysql_query($q) or die(mysql_error());
		if($r=mysql_fetch_array($ex))
		{
			$_SESSION['mno']=$r[0];
			$q="update fs_members set lastname='$lname', firstname='$fname', gender='$gender' where mno='".$r[0]."'";
			$ex=mysql_query($q) or die("$r[0]: ln:$lname,fn:$fname,gen:$gender | nag-error 1");
			$ex=mysql_query("update fs_member_accounts set email='$email' where mno=$r[0]")or die("nag-error 2");
			echo "1";
		}
		else
		{
			$q="insert into fs_members(fbid,lastname,firstname,gender) values('$fbid','$lname','$fname','$gender')";
			$ex=mysql_query($q) or die(mysql_error());
			$ex=mysql_query("select mno from fs_members where fbid='$fbid'")or die(mysql_error());
			$r=mysql_fetch_array($ex);
			$ex=mysql_query("insert into fs_member_accounts values(0,$r[0],'$email','$uname','password')")or die(mysql_error());
			$_SESSION['mno']=$r[0];
			echo "1";
		}
	}
	else
	{
		echo "2";
	}*/
?>