    
<!-- 
<link rel="stylesheet" type="text/css" href="../popUp_style_file/popUp_style.css">
<script type="text/javascript" src='../../js/jquery-1.7.1.min.js'></script>
<script type="text/javascript" src='../../js/function_js.js'></script>
<script type="text/javascript" src="../popUp_js_file/popUp_ajax.js" ></script>
<script type="text/javascript" src="../popUp_js_file/popUp_jquery.js" ></script> 
 -->  
<link rel="stylesheet" type="text/css" href="fs_folders/fs_popUp/popUp_style_file/popupinvitestyle.css">
<script type="text/javascript" src="fs_folders/fs_popUp/popUp_js_file/popUp_ajax.js" ></script>
<script type="text/javascript" src="fs_folders/fs_popUp/popUp_js_file/popUp_jquery.js" ></script> 
 <?PHP  
	 $mc->init_peoplebehindyou_peopleaheadofyou( );
	 $mc->invite_popUp( TRUE ,  'JESUS' );   
	 $mc->invite_popUp_newsletter( ); 
 ?> 
<div id='gen-popup-wrapper'> 
	<div id="popUp-container-gen" >   
		<center>   
			<!-- <div id="popup_res" > 
				popup_res 
			</div> -->  
			<div id="popup-wrapper" > 
				<div id="popup-wrapper-body" > 
					<div id="popup-wrapper-body-close" > 
						<img src='<?php echo "$mc->genImgs/popup-close-icon.png"; ?>' >
					</div>
			  		<table id="popup-wrapper-table" border="0" cellpadding="0" cellspacing="0" > 
			  			<tr> 
			  				<td id="popup-wrapper-table-left-content" > 
							 	<div id='popup-GYIdiv'> 
									<div id='invite-left-body-content-table-header' >  
										4 REASONS TO SIGN UP <br>TO FASHION SPONGE  
									</div>     
									<br><br>
									<table id="invite-left-body-content-table" border="0" cellpadding="0" cellspacing="0" >  
										<tr>    
											<td id='invite-left-body-content-table-img'  >  
												<center> 
													<img src='<?php echo "$mc->genImgs/exposure-icon.png"; ?>' />
												<center> 
											</td> 
											<!-- <td id='invite-left-body-content-table-desc'  >  -->
											<td id="invite-left-body-content-table-desc" >
												<span id='invite-left-body-content-table-desc-title' > EXPOSURE </span>  <br>
												<span id='invite-left-body-content-table-desc-desc'>   
	 										 		Get exposure for your blog or brand for posting your OOTD.
	 										 	</span> 
											</td> 
										<tr>
											<td id='invite-left-body-content-table-img'  >  
												<center> 
													<img src='<?php echo "$mc->genImgs/discover-icon.png"; ?>' />
												<center> 
											</td> 
											<td id="invite-left-body-content-table-desc" >
												<span id='invite-left-body-content-table-desc-title' > DISCOVER </span>  <br>
												<span id='invite-left-body-content-table-desc-desc'>  
												 	Discovering new brands and people couldn't be easier. 
												</span>
											</td> 
										<tr>
											<td id='invite-left-body-content-table-img'  >
												<center>
													<img src='<?php echo "$mc->genImgs/learn-icon.png"; ?>' />
												</center>  
											</td> 
											<td id="invite-left-body-content-table-desc" >
												<span id='invite-left-body-content-table-desc-title' > INSPIRATION  </span>  <br>
												<span id='invite-left-body-content-table-desc-desc'>    
													See the best examples on how to dress for any occasion.
												</span> 
											</td> 
										
										<tr>
											<td id='invite-left-body-content-table-img'  >  
												<center> 
													<img  id='star' src='<?php echo "$mc->genImgs/reward-icon.png"; ?>' />
												<center> 
											</td> 
											<td id="invite-left-body-content-table-desc" >
												<span id='invite-left-body-content-table-desc-title' > REWARDS </span>  <br>
												<span id='invite-left-body-content-table-desc-desc'>  
													Have a chance at winning  prizes for posting your OOTD. 
		 										</span> 
											</td> 
									</table>    
								</div>  
			  				</td>  
			  				<td id="popup-wrapper-table-right-content"  >  
								<center> 
									<!-- <form name='gen_popup_form' name='form' onSubmit="return gen_popup_check_invited_info();" method="post" action="info"  > -->

										<div id='popup-wrapper-table-right-content-table-back' > asd </div>
										<table id="popup-wrapper-table-right-content-table" border="0" cellspacing="0" cellpadding="0"  >
											<tr>  
												<td style="padding-top:2px;" > 
													<span id='invite-center-div-header-title' > GET YOUR INVITE <br> NOW! </span> <br>
							 						<span id='invite-center-div-header-desc' > You don't want to be fashionably late. </span> 
												</td>
											<tr> 
												<td id='gen-invite-popup-fields1' >  
													<center>
														<input  type='text' id="popup_invited_fn_and_ln" name="gen_popup_invited_fn_and_ln" value ="FIRST NAME & LAST NAME(*)"  > 
													</center>
												</td>
											<tr>
												<td id='gen-invite-popup-fields2' >     
													<center>
														<input  type='text'  id="popup_invited_email" name="gen_popup_invited_email"     value="E-MAIL(*)"  >    
													</center>
												</td> 
											<tr>
												<td id="popup-wrapper-table-right-content-table-guarantee" > 
													<table id="popup-table-security" border="0" cellpadding="0" cellspacing="0" > 
														<tr> 
															<td> 
																<center>
																	<span >We guarantee 100% privacy. <br> Your information will never be shared. </span>
																</center>
															</td>   
															<td width="40px;" id="privacy-lock" > 
																<img src='<?php echo "$mc->genImgs/lock.png"; ?>'>
															</td>
													</table> 
												</td>  
											<tr> 
												<td id="gen-invite-popup-signup" >  
													<input id="send_invited_info"  type='button' name="gen_invite_submit" value='SIGN UP' onclick="gen_popup_check_invited_info( 'signup' )" >
													<!-- <img type='submit'  id="submit_invite" src="fs_folders/images/buttons/submit-invite.png" onclick="invited_info_check();" >  -->
												</td>  
										</table>
									</center> 
								<!-- </form> -->
			  		</table>
		  		</div>
			</div>  
		</center> 
	</div> 
</div>
<!--  
<div id="original_content">
<br><br><br><br>
	at the back 
</div> 
 -->

