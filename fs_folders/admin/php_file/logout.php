<?php 
	session_start();
	require ('../../php_functions/myclass.php');
	$mc = new myclass(); 
	unset($_SESSION['adm_no']);

	$mc->go("../../../adminlogin");

?>