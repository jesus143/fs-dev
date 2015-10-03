<?php 
	require("../../php_functions/connect.php");
	require("../../php_functions/function.php");
	require("../../php_functions/library.php");
	require("../../php_functions/source.php");
	require("../../php_functions/myclass.php");   

	$mc = new myclass();   

	$email =  ( !empty( $_GET["email"] ) ) ? $_GET["email"] : '' ; 
 	$fn =  ( !empty( $_GET["fn"] ) ) ? $_GET["fn"] : '' ;
 	$wb =  ( !empty( $_GET["wb"] ) ) ? $_GET["wb"] : '' ;   
 	$type =  ( !empty( $_GET["type"] ) ) ? $_GET["type"] : '' ;  

 	
 	 

 	echo "<div style='display:none' >";

 		
 		// disable this part while its not yet ready 
 		// just endable it to send emails to members 
 	 
 		/* 
	 		// send to member 

				$mc->invited_people_send_emails( 
			        array( 
			          'invited_email'=>$email, 
			          'invited_fn'=>$fn, 
			          'invited_wob'=>$wb,
			          'status'=>'signup' 
			        ) 
			    );
			    
			// send to admin 

				$mc->send_email_to_admin( 
					$fn ,  
					null , 
					$email , 
					$wb
				); 	 
			
			// send to user 

				$mc->send_email_signup_to_user(  
					$fn,  
					$email, 
					$type
				);     


		*/
			
	echo "</div>";
?> 