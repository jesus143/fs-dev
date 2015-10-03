<?php  $facebook = $this->social_login( 'facebook' );  ?> 
<?php  

		$gcode = '';
		if ( !empty($_SESSION['gcode']) ) {
			$style1 = 'display:none';
			$style2 = 'display:block';
			$gcode  = $_SESSION['gcode'];

		}
		else{
			$style1 = 'display:block';	
			$style2 = 'display:none';
		}
 ?>
<div id="login-body-container">       

	<div id="login-logo" >
		<img src='fs_folders/images/login/login-logo.png' >
	</div>  

	<div id="login-form"  style="<?php echo $style1; ?>" > 
		<table border="0" cellpadding="0" cellspacing="0" >   
			<tr> 
				<td style="padding-bottom:20px;" > 
					<div>  

					 
					 	<?php 
					 		$this->social_login( 
						 		'print-image' , 
						 		'fs_folders/images/login/fb-button.png' , 
						 		"$facebook",
						 		'fs_folders/images/login/fb-mouse-over.png',
						 		'login-facebook-image'
						 	); 
					 	?> 


					</div>
				</td>
			<tr>
				<td style="padding-bottom:10px;" >  
					<input type="text" placeholder='E-mail' id="login-email"          onkeyUp="validate_login(  'login' , '' , event )"   /> 
				</td>
			<tr>
				<td style="padding-bottom:10px;" > 
					<input type="password" placeholder='Password' id="login-password" onkeyUp="validate_login(  'login' , '' , event )"  />   
				</td>
			<tr> 	
				<td> 
					<div id="login-result-container" > 
						<div id="login-error-or-success" > 
						</div> 
						<div id="login-loader"> 
							<img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  > 
						</div> 
					</div> 
				</td>
			<tr> 
				<td style="padding-bottom:20px;" > 
					<div> 
						<b>
							<span onclick="toogle( '#login-form' , '#forgot-password' )" class='login-forgot-password' >
								Forgot Password?
							</span>
						</b>
					</div>
				</td>
			<tr>
				<td style="padding-bottom:20px;" > 
					<div onclick="validate_login( 'login' , 'login' , event )" >  

					 	<!-- <img src="<?php echo "$this->genImgs/user-login-log-in-button.png"; ?>"  id='login-popup-button'  >  -->

					 	<?php
					 		$this->social_login( 
						 		'print-image', 
						 		'fs_folders/images/login/log-in-pop.png', 
						 		"#",
						 		'fs_folders/images/login/log-in-pop-mouse-over.png',
						 		'login-popup-button'
						 	); 
					 	?>
					</div>
				</td>
			<tr>
				<td>
					<center>
						<div id='login-popup-text' >
							<span>New to Fashion Sponge?</span> <br>
							<span onclick="toogle( '#login-form , #forgot-password' , '#signup-form' )" class='login-create-account' >Create account</span>  	
						</div>  
						<div class="login-close" onclick="ajax_close('#login-wrapper')" >
							<b>Close</b>
						</div>
					</center>
				</td>  
		</table> 
	</div>
   
	<div id="signup-form" style="<?php echo $style2; ?>"  > 

		<table border="0" cellpadding="0" cellspacing="0" >  
			<tr>  
				<td style="padding-bottom:10px;" > 	
					<center>
						<div style="font-size:16px;" > 
							<?php //echo strtoupper(" <b>Your Fashionable!</b> <br> So why be old fashioned? ");  ?>
						</div> 
					</center>
				</td>
			<tr> 
				<td style="padding-bottom:10px;" > 
					<div> 

					 	<?php 
					 		  //$this->social_login( 'print-image' , 'user-login-login-with-FB-button.png' , "$facebook" ); 
					 	?>

					 	<?php  
					 		$this->social_login( 
						 		'print-image' , 
						 		'fs_folders/images/login/fb-button.png' , 
						 		"$facebook",
						 		'fs_folders/images/login/fb-mouse-over.png',
						 		'login-facebook-image-signup'
						 	);  
					 	?>

					 	 

					</div>
				</td>
			<tr>
				<td style="padding-bottom:20px;" >
					<center>
						<div style="color:black" >
							---- Or sign up with your email address ----	
						</div>
					</center>
				</td>
			<tr> 
				<td style="padding-bottom:10px;" > 
					<input type="text" placeholder='First Name' id="signup-fname"  onfocus="jquery_effects( '.signup-warning-fname' , 'slide-down' )" onblur="jquery_effects( '.signup-warning-fname' , 'slide-up' )"      onkeyUp="validate_login(  'signup' , '' , event )"  />
					<div id="login-message-alert-warning"  class="signup-warning-fname" style="display:none; " > 
					 	This will serve as your first name in the site but you can change it when you log on. 
					</div>  
				</td>
			<tr> 
				<td style="padding-bottom:10px;" > 
					<input type="text" placeholder='E-mail' id="signup-email" onfocus="jquery_effects( '.signup-warning-email' , 'slide-down' )" onblur="jquery_effects( '.signup-warning-email' , 'slide-up' )"      onkeyUp="validate_login(  'signup' , '' , event )"  />  
					<div id="login-message-alert-warning"  class="signup-warning-email" style="display:none" > 
						 This email will be used to verify your account.
					</div>  
				</td>
			<tr>  
				<td style="padding-bottom:10px;" > 
					<input type="text" placeholder='Password' id="signup-pass"  onfocus="jquery_effects( '.signup-warning-pass' , 'slide-down' )" onblur="jquery_effects( '.signup-warning-pass' , 'slide-up' )"      onkeyUp="validate_login(  'signup' , '' , event )"  />
					<div id="login-message-alert-warning"  class="signup-warning-pass" style="display:none" > 
					 	Password is visible to ensure your entering it correctly.
					</div>  
				</td>  
			<tr>
				<td style="padding-bottom:10px;" > 
					<input type="text" placeholder='Code' value="<?php echo $gcode; ?>" id="signup-code"  onfocus="jquery_effects( '.signup-warning-code' , 'slide-down' )" onblur="jquery_effects( '.signup-warning-code' , 'slide-up' )"      onkeyUp="validate_login(  'signup' , '' , event )"  />
					<div id="login-message-alert-warning"  class="signup-warning-code" style="display:none" > 
					 	Please provide the code given from Fashion Sponge.
					</div>  
				</td>   
			<tr>
				<td style="padding-bottom:10px;"  >  
					<?php  
						$n1 = rand(0,1000);
						$n2 = rand(0,1000); 
						$s = $n1+$n2;
					?>
					<table border="0" cellpadding="0" cellspacing="0" style="width:100%" > 
						<tr> 
							<td> <div class="login-register-addition" > <?php echo "$n1 + $n2 =";?> </div> </td>
							<td> <input type="text"  id="signup-uanswer" placeholder='<?php echo $s; ?>'  onfocus="jquery_effects( '.signup-warning-answer' , 'slide-down' )" onblur="jquery_effects( '.signup-warning-answer' , 'slide-up' )" onkeyUp="validate_login(  'signup' , '' , event )" /> </td>
							<td> <input type="text"  id="signup-ranswer" placeholder='answer' style="display:none" value="<?php echo $s; ?>" onkeyUp="validate_login(  'signup' , '' , event )"  /></td>
					</table>   
					<div id="login-message-alert-warning"  class="signup-warning-answer" style="display:none" > 
					 	Write the answer in the field to identify that you are a human.
					</div>  
				</td>  
			<tr> 
				<td> 
					<div id="login-result-container" > 
						<div id="signup-error-or-success" > 
						</div> 
						<div id="signup-loader"> 
							<img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  > 
						</div> 
					</div>
				</td>
			<tr>
				<td style="padding-bottom:10px;display:block" >
					<div style="font-size:12px;" >
                        I agree to Fashion Sponge's  <a href='terms-and-conditions' target="_blank" style="text-decoration:underline;color:#b32727" >Terms & Conditions.</a>
					</div>
				</td>
			<tr> 
				<td style="padding-bottom:20px;" > 
					<div onclick="validate_login( 'signup' , 'signup' , event )" >   
						 	<?php  
						 		$this->social_login( 
							 		'print-image' , 
							 		'fs_folders/images/login/sign-up-button.png' , 
							 		"#",
							 		'fs_folders/images/login/sign-up-button-mouse.png',
							 		'login-image-signup'
							 	);  
						 	?> 
					</div>
				</td>
			<tr>
				<td>
					<center>
						<div id='login-popup-text' > 
							<b>Already have an account?</b> <span  onclick="toogle( '#signup-form , #forgot-password' , '#login-form' )"  class='login-signup-link' >Sign in</span>
						</div>  
						<div class="login-close" onclick="ajax_close('#login-wrapper')" >
							<b>Close</b>
						</div>
					</center>
				</td>  
		</table> 
	</div>  

	<div id="forgot-password" style="display:none;" >  
		<table border="0" cellpadding="0" cellspacing="0" >  
			<tr>  
				<td style="padding-bottom:20px;" > 	
					<center> <div style="font-size:16px;" > <b>Password / Username Recovery </div> </center>
				</td> 
			<tr>
				<td style="padding-bottom:10px;" >  
					<input type="text" placeholder='E-mail' id="rc-email" onfocus="jquery_effects( '.signup-warning-femail' , 'slide-down' )" onblur="jquery_effects( '.signup-warning-femail' , 'slide-up' )" onkeyUp="validate_login(  'rcpass' , '' , event )" />  
					<div id="login-message-alert-warning"  class="signup-warning-femail" style="display:none" >  
						Use your email in the site and we will send your username and password to your email.
					</div>  
				</td> 
			<tr> 
				<td style="padding-bottom:10px;" > 
					<b>
						<div id='login-or'> 
						Or
						</div>
					</b> 
				</td>
			<tr>
				<td style="padding-bottom:10px;" >  
					<input type="text" placeholder='Username' id="rc-fname"  onfocus="jquery_effects( '.signup-warning-funame' , 'slide-down' )" onblur="jquery_effects( '.signup-warning-funame' , 'slide-up' )" onkeyUp="validate_login(  'rcpass' , '' , event )" />  
					<div id="login-message-alert-warning"  class="signup-warning-funame" style="display:none" > 
					 	Use your username in the site and we will send your password along with your username to your email.
					</div>  
				</td>  
			<tr> 	 
				<td> 
					<div id="login-result-container" > 
						<div id="rcpass-error-or-success" > 
						</div> 
						<div id="rcpass-loader"> 
							<img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  > 
						</div> 
					</div>
				</td>
			<tr>
				<td style="padding-bottom:20px;" > 
					<div onclick="validate_login( 'rcpass' , 'rcpass' , event )" >  


					 	<!-- <img src="<?php echo "$this->genImgs/user-login-recover-button.png"; ?>" id='login-popup-button' >  -->


					 
					 	<?php 
					 		$this->social_login( 
						 		'print-image' , 
						 		'fs_folders/images/login/reset.png' , 
						 		"#",
						 		'fs_folders/images/login/reset-mouse-over.png',
						 		'login-reset-image'
						 	); 
					 	?> 


					</div>
				</td>
			<tr>
				<td>
					<center>
						<div id='login-popup-text' >
						 	<span  class='login-login-text' onclick="toogle( '#forgot-password , #signup-form' , '#login-form' )" >Log In </span>  <b>Or</b>  <span onclick="toogle( '#login-form  , #forgot-password' , '#signup-form' )" class='login-create-account' >Create account</span>  	
						</div>  
						<div class="login-close"  onclick="ajax_close('#login-wrapper')" >
							<b>Close</b>
						</div>
					</center>
				</td>  
		</table> 
	</div> 

	<div id="resend-email" style="display:none"  > 
	
		forgot password
	</div>   

</div>