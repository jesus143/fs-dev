<?php
	require("connect.php");
	session_start();
	if($_SESSION['mno']!="")
	{
		$mno=$_SESSION['mno'];
		$id=$_GET['id'];
		$rate=$_GET['rate'];
		$ex=mysql_query("select * from ratings where mno=$mno and plno=$id") or die(mysql_error());
		if(!($r=mysql_fetch_array($ex)))
		{
			$q="insert into ratings values(
				0,
				$id,
				".$_SESSION['mno'].",
				$rate,
				'".date("Y-m-d")."'
			)";
			$ex=mysql_query($q) or die(mysql_error());
			$q="insert into activity values(
				0,
				$mno,
				'Rated',
				'postedlooks',
				$id,
				'".date("Y-m-d h:m:s")."'
			)";
			$ex=mysql_query($q) or die(mysql_error()); 
			echo "succesfully rated";
		}
		else
		{
			echo "already  rated";
		}
	}
	else
	{ 
		echo "not login";
	}
?>


<?php 

	// session_start();
	// require("connect.php");
	// require ("program.php");
	// require ("../function.php");
	// require ("../source.php");
	// require ("../myclass.php");



	// if($_SESSION['mno']!="")
	// {
	// 	$mno=$_SESSION['mno'];
	// 	$id=$_GET['id'];
	// 	$rate=$_GET['rate'];

	// 	if(!select_w_2('ratings',4,array('plno',$id,'mno',$_SESSION['mno']),'and')){ 
	// 		insert('ratings',array('plno','mno','rating'),array($id,$_SESSION['mno'],$rate),'rno');
	// 		echo "1";
	// 	}else{
	// 		echo "3";
	// 	}

 
?>