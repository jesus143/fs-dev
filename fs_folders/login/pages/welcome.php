<?php 

	require( "fs_folders/js/country_state.php" );  
	$_SESSION['mno'] =  $this->get_cookie( 'mno' , 136 );  
 	$mno 			 =  $this->get_cookie( 'mno' , 136 ); 

  
  
?> 
<link rel="stylesheet" type="text/css" href="fs_folders/accountsettings/accountsettings_style_file/accountsettings.css" > 
<script type="text/javascript" src="fs_folders/accountsettings/accountsettings_js_file/accountsettings_ajax.js" ></script>
<script type="text/javascript" src="fs_folders/accountsettings/accountsettings_js_file/accountsettings_jquery.js" ></script>

 
<script type="text/javascript"> 
	$(document).ready( function ( ) {

		welcome_change_content( '#welcome-result-container', 'fs_folders/login/pages/welcome/welcome-about.php' , '#more_loading1 img'  , '1'  ); 	
		set_center( '#login-welcome-container' , 'gen_popup' ,  -70 );
		// set_center( '#login-welcome-container' , 'gen_popup' ,  0 );

	});
</script>
 
<br> 
<div style="border:1px solid none"  id="login-welcome-container" >    
	<?php $this->login_welcome_tab( $page ); ?>   
	<div style="margin-top:20px;" id='welcome-result-container'  >    
	</div>
</div> 


 
