<?php 
	if ($_SERVER['HTTP_HOST'] == 'localhost') 
 	{
 		// mysql_connect("localhost","root","replacement") or die(mysql_error()); Nnetbook
 		$con = mysql_connect("localhost","root","") or die(mysql_error()); //laptop
 	 	$dbName = "fs_records";
 		if ( $con  ) 
 		{
 		 	// echo " connected to localhost <br>"; 
 		}
 		else 
 		{ 
 			// echo " not connected to localhost <br>";
 		}
 	}
 	else
 	{
		// echo "online connect <br>";
 		// mysql_connect("localhost","ricopeco_fsgjaro","d7)pIG=#%{oy") or die(mysql_error()); // fs 
 		// $dbName = "recopeco_fs_records_v1"; #ss
 		// $dbName = "ricopeco_fs_records_v1"; #fs 
 		$dbName = "ricopeco_fs_records_v1_testing_1"; #fs 


 		$con  = mysql_connect("localhost","ricopeco_jesus7","Q?l-tpVNV)v+") or die(mysql_error()); // swag  
 		if ( $con  ) 
 		{
 		 	// echo " connected to online <br>";
 		}
 		else 
 		{ 
 			// echo " not connected to online <br>";
 		}
 	}

 	 $dbConn = mysql_select_db($dbName) or die("dili ka-connect sa database"); //fs

 	if ( $dbConn ) 
 	{ 
 		// echo "connected to $dbName <br> ";
 	}
 	else  
 	{
 		// echo "not connected to $dbName <br> ";
 	}
 	// echo " database $dbName <br> ";
	
?>
