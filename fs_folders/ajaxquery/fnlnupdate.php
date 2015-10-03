<?php 
	session_start();
	require("connect.php");
	include("../function.php");
	// $_GET['lname']= 'lastname1';
	// $_GET['fname'] = 'firsname1';
	// $_SESSION['mno']=134;

	if (!empty($_GET['fname'])) {
		if(update1('fs_members','firstname',$_GET['fname'],array('mno',$_SESSION['mno']))){ 
			echo "Your First Name Succesfully Updated ";
		}
	}
	if (!empty($_GET['lname'])) {
		// updateArray('fs_members',array('lastname'),$_GET['lname'],'mno',$_SESSION['mno']);
		if(update1('fs_members','lastname',$_GET['lname'],array('mno',$_SESSION['mno']))){ 
			echo "Your Last Name Succesfully Updated ";
		} 
	} 
	




?>