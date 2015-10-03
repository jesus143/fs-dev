<?php 
	require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php");  

	$mc   = new myclass();  
	$type = ( !empty( $_GET['type'] ) ) ? $_GET['type'] : null ;
	$sc   = ( !empty( $_GET['sc'] ) ) ? $_GET['sc'] : null ;
	$status = false;
 	$login_error = false;

	switch ( $type ) { 
		case 'login': 
				$pass = $_GET['pass'];
				$mail = $_GET['mail'];



				if ( !empty($pass) and !empty($mail )) {


					 //$npass = $mc->encrypt_password( $pass , 1000 );
					 //$mno = $mc->set_Login( $mail , $npass ,  array('tableName'=>'fs_member_accounts' , 'userRow'=>'email' , 'passRow'=>'pass' )   );
					/*
						echo " pass: $pass and  npass: $npass <br> ";
						echo " email: $mail <br> "; 
						echo " mno: $mno ";   
					*/



                    $r = select_v3( 'fs_members' , '*' , "identity_email = '$mail' and identity_login = '$pass'" );
                    $mno = $r[0]['mno'];
				}

				if ( !empty($mno) ){   
					$_SESSION['temp_mno'] = $mno;
					$login_error = false;     
				}
				else {
					$login_error = "Ohhps! username and password combination is not correct !";
				}

			break; 
		case 'signup':

			 	// echo "signup result <br>";  
			    $fname    	  = $_GET['fname'];   
			 	$mail      	  = $_GET['mail'];   
			 	$pass     	  = $_GET['pass'];   
			 	$uanswer  	  = $_GET['uanswer'];   
			 	$ranswer  	  = $_GET['ranswer'];   
			 	$signupcode  = $_GET['signup_code'];   


			 	$login_error = $mc->check_signup_fields( $fname , $mail , $pass , $uanswer ,  $ranswer , $signupcode , $login_error  ); 
 
			 	if ( $login_error == false ) {


			 		// insert new account info 

						$mno = $mc->add_new_user( array('firstname'=>$fname , 'email'=>$mail , 'pass'=>$pass ) );

			 		// insert update the code 

						$response = mysql_query( "UPDATE fs_signup_code SET mno = $mno , date = '$mc->date_time' WHERE generated_code = '$signupcode' " ); 	

						// $login_error .=  " code ($signupcode) <br>";  

						if  ($response) { 
 
								// $login_error .= "sign up code successfully validate"; 	   

							//  add 1 with the total login

								$mc->update_total_login( $mno , 1 , true );   	 
 
						}
						else{

							$login_error .=  ' (*) failled update new user code. <br>';  
							$this->error_red_field( 'signupcode' );
							// $smessage = "<span class='fs-text-red' > failled update new user code. . . . </span> $sc and mno = $mno "; 	  
						}   
			 	}  
			 	if ( !empty($mno) ) {
			 		$_SESSION['temp_mno'] = $mno;  
			 		// $mc->add_activity_wall_post ( $mno , $mno , 'Joined' , 'fs_members' , $mc->date_time );      
			 		$mc->send_verification_code_to_email( $mail , $mc->generate_vefirification_code( $mail ) , $fname ); 
			 	}  


				 	// CHECK IF EMAIL EXIST
				 	// CHECK PASSWORD MINIMUM OF 6
				    // INSERT NEW USER AND GET NEW MNO  
				 	// echo " fname = $fname mail =  $mail pass=  $pass <br> "; 
				 	// $login_error = 'this is an error ';   
			break;
		case 'rcpass': 

				$mno = 133;
				$fname = $_GET['fname'];   
			 	$mail  = $_GET['mail'];     
				$exist = 0; 
				// echo " recover password $fname  $mail    <br>"; 

				if ( !empty( $mail) && !empty( $fname )) {
					$login_error .= '(*) please input only one field <br>';   
				}
				else{ 
					if ( !empty( $mail ) ) {  
						if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
							$login_error .= '(*) email is not valid <br>'; 
					  	}else{     
					  		$exist = $mc->get_password_by ( 'email' , $mail  );  
					  	} 
					}
					else if ( !empty( $fname )) {   
							$exist = $mc->get_password_by ( 'username' , $fname  );   
					} 
					else{  
						$login_error .= '(*) please provide iether email or username to retrieve password<br>';  
					}  
					if ( $exist  > 0  ) {

						if ( empty( $mc->e )) {   
							if ( $login_error == false ) {
								$login_error .= "(*) Sorry <b>$mail</b> didn't exist. . .<br>";  	
							}
						}
						else if ( !empty( $mc->p )) {   
							if ( $mc->send_password_to_email( $mc->e , $mc->p , $mc->un , "$mc->fn $mc->nn $mc->ln" ) ) { 
								$smessage = "Password successfully sent to email: $mc->e <br>";
							}
						}
						else{  
							if ( $login_error == false ) {
								$login_error .= "(*) Sorry <b> $fname $mail </b> don't have a password. .<br>";  	
							} 
						}
					}
					else{ 
						if ( $login_error == false ) {

							$login_error .= "(*) <b> $fname $mail </b> not exist..<br>";  
						} 
					} 
				}





				if ( $login_error != false ) {
					echo "<span style='display:none' >";
					echo "<error>error-found<error>";
					echo "</span>";
				} 




				// echo " password $p  "; 
			break;
		case 'signup-code':

				$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 				$mno 			 =  $mc->get_cookie( 'mno' , 136 );    
 				$status          =  false;
			 	$response = $mc->fs_signup_code(   array(  'type' =>'select-specific-code', 'generated_code'=>$sc  )  ); 
				if( !empty($response))  {  
					if ( empty($response[0]['mno']) ) {
						$response = mysql_query( "UPDATE fs_signup_code SET mno = $mno , date = '$mc->date_time' WHERE generated_code = '$sc' " ); 	
						if ( !empty($response) ) {
							$smessage = "sign up code successfully validate"; 	  
							$status   = true;
							// update tlogin = 1 for the user to see the popup welcome 
							$mc->update_total_login( $mno , 1 , true );   	
						}
						else{
							$smessage = "<span class='fs-text-red' > failled update new user code. . . . </span> $sc and mno = $mno "; 	  
						} 
					}
					else{ 
						$smessage = "<span class='fs-text-red' > Code allready in used </span> "; 	
					} 
			 	}
			 	else{
			 		$smessage = "<span class='fs-text-red' > Code not exist </span> "; 	
			 	} 
			break;
		default:   
			break;
	} 
	if ( $login_error == false ) {  

		$smessage = ( !empty($smessage) ) ? $smessage  : 'successfully validated' ;
		echo "<div id='login-success-message' >$smessage</div>";	 
		echo "<span style='display:none' ><mno>$mno<mno></span>"; 
		echo "<span style='display:none' ><status>$status<status></span>"; 

	}
	else {

		echo "<div id='login-error-message' >$login_error</div>";	

	} 
?>