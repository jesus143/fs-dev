<?php 
	@session_start();   
	require("fs_folders/php_functions/connect1.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");
	$_SESSION['post_a_look_is_look_upload_once_in_db'] = false ; 
 	$mc      = new myclass();   
 	$article = new postarticle ( ); 
 	$image  = new resizeImage( );  
 	$mc->auto_detect_path();   

 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );   
 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );     
?>     
	<!DOCTYPE html>
	<html> 
		<head>   
			<?php $mc->header_attribute( "Log-in or Sign Up | Fashion Sponge" ); ?> 	
		</head>
		<body style="padding:0px; margin:0px;" >
		
			<div id="login-container" >   

			</div>

			<div id= 'login-container1' >
				<?php if ( $mno != 136 ) { $mc->go('/'); } ?>
				<?php $p =  ( !empty($_GET['p']) ) ? $_GET['p'] : 0 ; ?>
				<?php $mc->login_popup( $mno , ( !empty($_GET['welcome']) ) ? $_GET['welcome'] : null );  ?> 
			</div> 
		</body>
	</html> 	  