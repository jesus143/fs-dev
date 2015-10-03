<?php 
	session_start();
	require("../connect.php");
	require ("../function.php");
	require ("../source.php");
	echo "Email has been succesfully change.";
	chang_email();
	// echo " hello jesus last email $_GET[lastMail] new mail is ".$_GET['Nmail']."<br>";
	// changable to confirmation of email
?>



<?php 
	function chang_email(){ 
		mail($_GET['lastMail'],"New Email Succesfully Change - from FashionSponge.com",
		"Your previous email $_GET[lastMail] and Succesfully change to $_GET[Nmail] ","Dear ".firstname($_SESSION['mno']).",");
		update1('fs_member_accounts','email',$_GET['Nmail'],array('mno',$_SESSION['mno']));
	}
?>