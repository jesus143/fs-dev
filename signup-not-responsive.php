<?php 
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");
	$_SESSION['post_a_look_is_look_upload_once_in_db'] = false ;
 	$mc = new myclass();   
 	$mc->auto_detect_path();  
	$mc->header_attribute( 
		"Sign Up" , 
		"Instantly sign up and be one of the first to experience Fashion Sponge.",
		"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration"
	);    	
		

	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );  
	$mno 			 =  136;
 
?> 
<html>
	<head>     
		<script type="text/javascript"  src='fs_folders/js/jQv1.8.2.js'> </script>
		<script type="text/javascript"  src='fs_folders/js/function_js.js'></script> 
		<script type="text/javascript"  src="fs_folders/invite/reg_js/cycle.js"></script>  
		<script type="text/javascript"  src='fs_folders/signup/signup.js' ></script> 
		<link rel="stylesheet" type="text/css" href="fs_folders/signup/signup.css" >   

		<?php $mc->signup_popUp( true ,  ''  );  ?> 
		<?php $mc->login_popup( $mno , 'login' ); ?>

	</head>  
	<body style="padding:0px; margin:0px;   overflow-x: hidden; " > 
		<center>
			<div id="popup_res"  style="display:none" > res </div>
			<table border="0" cellspacing="0" cellpadding="0"  style="width:1010px; border:1px solid #ccc; background:white; margin-left:-1px; padding-bottom:50px;"  >  
				<tr> 
					<td>  
						<?php  
							require("fs_folders/signup/signup-folder/signup-header-1.php");
							// require("fs_folders/signup/signup-folder/signup-header.php")
						?> 
					</td>
				<tr> 
					<td> 
						<?php  
							require("fs_folders/signup/signup-folder/signup-body-1.php"); 
							// require("fs_folders/signup/signup-folder/signup-body.php"); 
						?> 
					</td>
				<tr> 
					<td> 
						<?php  
							require("fs_folders/signup/signup-folder/signup-footer-1.php"); 
							// require("fs_folders/signup/signup-folder/signup-footer.php"); 
						?> 
					</td>
			</table>
		</center> 
	</body>  
</html> 

