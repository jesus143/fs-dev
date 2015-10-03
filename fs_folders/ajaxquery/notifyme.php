<?php 
	session_start();
	require("connect.php");
	include("../function.php");

	

	// date("Y-m-d")
	set_notifyme();


	function set_notifyme() { 
		if(!$res=select_w_2('notifyme',4,array('mno',$_SESSION['mno'],'plno',$_GET['plno']),'and')){ 
			insert('notifyme',array('mno','plno','nsdate'),array($_SESSION['mno'],$_GET['plno'],''),'nno');
		}else{ 
			$del=delete_w_2('notifyme',array('mno',$_SESSION['mno'],'plno',$_GET['plno']),'and');
		}
		if (!$res) {
			echo "inserted";
		}
		if ($del) {
			echo "deleted";
		}
	}

	
	









?>