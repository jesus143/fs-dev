<?php 
	require("fs_folders/php_functions/connect.php");    
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php"); 
	$mc = new myclass( ); 

 

 	if ( !empty( $_GET['code'] ) ) { 

 		 	$c = $_GET['code'];   

 		 	// get code to db 
	 			$mi = selectV1(
					'*', 
					'fs_members',
					array('identity_generated_code'=>$c) 
				);    

 			// update user account as verified
				if ( !empty($mi)) {  
					$mno = intval($mi[0]['mno']);  
					$mc->confirm_mem_account( $mno ); 
	        		
	        		if ( $b ) {
	        			echo " successfully verified <br> "; 

	        			$_SESSION['temp_mno'] = $mno; 
	        			$_SESSION['lastpagevisited'] = 'account';
	        			$mc->go('login-authentication.php'); 
	        		}
	        		else{
	        			echo " failed verified <br> ";	
	        		}
				}
				else{
					echo " code not found "; 
				}  
 	}
 	else{
 		echo " query required in the url <br>";
 	}




?>