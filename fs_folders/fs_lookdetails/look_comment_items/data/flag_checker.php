<?php
	session_start();
	require ("../../../php_functions/connect.php");
	require ("../../../php_functions/function.php");
	require ("../../../php_functions/library.php");
	require ("../../../php_functions/source.php");
	require ("../../../php_functions/myclass.php");
	$mc = new myclass();
 
	 

	$fexist=select('fs_cflag',1,array('plcno',$_GET['plcno']));
	

	 
	if (empty($fexist)) {
		echo "false";
	}else if(count($fexist)==1){
		echo "true";
	} 


?>