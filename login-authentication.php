<?php
	@session_start();
	// $_SESSION['temp_mno'] = 754; //
	// $_SESSION['temp_mno'] = 133; // rico
	// $_SESSION['temp_mno'] = 134;  kayab
	// $_SESSION['temp_mno'] = 135;
    // $_SESSION['temp_mno'] = 1169; 
	$lastpagevisited = (!empty($_GET['url'])) ?  $_GET['url'] : $lastpagevisited; 
	if ( $_SESSION['temp_mno'] != null ) {     
		setcookie( 'mno' , $_SESSION['temp_mno']  ,   time() + (10 * 365 * 24 * 60 * 60) );       
		require("fs_folders/php_functions/connect1.php");    
		require("fs_folders/php_functions/function.php");
		require("fs_folders/php_functions/myclass.php");
		$mc = new myclass();     
		$lastpagevisited =   ( !empty($_SESSION['lastpagevisited']) ) ? $_SESSION['lastpagevisited'] : '/' ;  
		$_SESSION['mno'] = $_SESSION['temp_mno']; 
		// echo "succesfully authenticated, please wait.....";  
		$mc->update_total_login( $_SESSION['mno'] , 1 );  
		$mc->confirm_mem_account( $_SESSION['mno'] ); 
		// echo "  lastpagevisited $lastpagevisited ";
		$mc->add_new_member_profile_pic( $_SESSION['mno'] );
		// $mc->add_new_member_time_lime( $_SESSION['mno'] );
		$db->update('fs_members',array('logtime'=>"$mc->date_time"),"mno=$_SESSION[mno]"); //update logtime everylogin 
		$db->update('fs_members',array('logstat'=>1),"mno=$_SESSION[mno]"); //update logtime everylogin 
		$mc->go("$lastpagevisited");   
		
	}
	else{

		echo " failled to authenticate, sorry for inconvenience we are redirecting you to login area.."; 
		$mc->go("home");  
	}  
?>      