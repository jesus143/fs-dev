 <br> <Br><Br>
<div id="login-body-container" >    
	<div id="forgot-password" style="display:block; "  >  
		<table border="0" cellpadding="0" cellspacing="0" >  
			<tr>  
				<td style="padding-bottom:20px;" > 	
					<center> <div style="font-size:16px;" ><?php echo strtoupper("<b>PROVIDE A FASHION SPONGE SIGN UP CODE</b>"); ?></div> </center>
				</td> 
			<tr>
			 
				<td style="padding-bottom:10px;" >  
					<input type="text" placeholder='signup code' id="signup-code"  onfocus="jquery_effects( '.signup-warning-funame' , 'slide-down' )" onblur="jquery_effects( '.signup-warning-funame' , 'slide-up' )" onkeyUp="validate_login(  'signup-code' , 'signup-code' , event )" />  
					<div id="login-message-alert-warning"  class="signup-warning-funame" style="display:none" > 
					 	Add the code proved by the Fashion Sponge Team to enter and join the site, Thank you so much.
					</div>  
				</td>  
			<tr> 	 
				<td> 
					<div id="login-result-container" > 
						<div id="signup-code-error-or-success" > 
						</div> 
						<center>
							<div id="signup-code-loader"> 
								<img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  > 
							</div> 
						</center>
						<br>
					</div>
				</td>
			<tr>
				<td style="padding-bottom:20px;" > 
					
						<div onclick="validate_login( 'signup-code' , 'signup-code-submit'  , event )" >  
						 	<!-- <img src="<?php echo "$this->genImgs/user-login-recover-button.png"; ?>" style='width:100%;  height:90%;' >  -->
						 	<input type="button" value="submit" style=" color: #fff;" >
						</div>

				</td>
			<tr>
				<td>
					<center> 
						<div style="color:#b32727;cursor:pointer; padding-top:5px;" onclick="ajax_close('#login-wrapper')" >
							<a href="logout.php">
								<b title='when you close this you will be redirected to logged out' >Close</b>
							</a>
						</div>
					</center>
				</td>  
		</table> 
	</div>  
</div>