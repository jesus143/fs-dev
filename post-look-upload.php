<?php 
	require("fs_folders/php_functions/connect.php");    
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
 	require("fs_folders/php_functions/source.php");
 	$mc = new myclass();   
 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 ); 
 	$mno             =  $mc->get_cookie( 'mno' , 136 ); 

?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html> 
	<head> 
		<?php 
			$mc->header_attribute( 
 				"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration | Fashion Sponge " , "Fashion Sponge is the easiest & fastest way to: Show 
 				your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.",
 				"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration "
 			);   
		?> 
	</head>    
	<body style="padding:0px;margin:0px;"> 
		<?php  
			$mc->postalook_upload_popup_rules_print( ); 
		?>
		<div id="new-postalook-post-container" >    
			<div id="new-postalook-post-header" style="border:1px solid none;" >
				<table border='0' cellpadding="0" cellspacing="0" width="100%;" >
				 	<tr> 
				 		<td style="width:330px;" > 
				 			<div style="font-family:misoLight;font-size:50px;color:#b01d23;float:right;border:1px solid none; padding-right:30px;  " >
				 				UPLOAD LOOK
				 			</div> 
				 		</td> 
				 		<td > 
				 			<div style="border:1px solid none; width:620px;" >
				 				ang fashion sponge team nag pasalamat sa iny pag supporta sa amoa sds sds maau pa unta mo padaun mo sa inyg aa supporsdsta taman sa kataposan sa inyong adlaw.
				 			</div>
				 		</td> 
				</table> 
			</div>
			<form action="post-look-validate" method="POST"  enctype="multipart/form-data" onsubmit="return new_postalook_submit_new_uploaded_looks( ); " >
				<div id="new-postalook-upload-content"  style="border:1px solid none;" >  
					<table  border='0' style="width:350px;margin:auto;" >
						<tr> 
							<td> 
								<div id="new-postalook-post-container-upload-img" >
									<table border="0" cellpadding="0" cellspacing="0"   >
										<tr>
											<td> 		
												<center>
												<div id="new-postalook-upload-preview" > 
												</div>
													<input type='file' id="f_image" name="image" runat="server" style="display:none;"    />
				    								<!-- <img id="avatar-right-uploadprofile" src='<?php echo "$mc->genImgs/change-profile.png"; ?>'  > --> 
													<img src="fs_folders/images/genImg/new-postalook-post-arrow-up.png" style="cursor:pointer" onclick='post_look_upload_select_file()' />   
												</center>
											</td>
										<tr> 
											<td style="padding-top:20px;" > <center><div style="color:#b32727" id="new-postalook-file-upload-stat-display" >CHOOSE FILE</div></center> </td>
										<tr> 
											<td> <center><div> jpeg, jpg or png file extentions </div></center> </td>
									</table>
								</div>
							</td>
						<tr>
							<td id="new-postalook-post-rotate" >    
								<center>
								 	<table border="0" style="width:210px;" > 
										<tr>
											<td style="width:auto" >  
												<div id="new-postalook-check-div-image-rotate" class="new-postalook-not-rotate" >
													<img src="fs_folders/images/genImg/postalook-grey-check.png" onclick="new_postalook_upload_rotate_check_uncheck( )" > 
													<input type="text" value="not rotate" name="rotate" style="display:none"  />  
												</div> 
											</td>
											<td> 
												<div onclick="new_postalook_upload_rotate_check_uncheck( )"  style="cursor:pointer" >
													I want to crop or rotate my image.
												</div>
											</td> 
									</table>
								</center>  
							</td> 
						<tr> 
							<td id="new-postalook-post-rules"  >  
								<center>
									<table border="0" style="width:210px;" > 
										<tr> 
											<td style="width:auto" >  
												<div id="new-postalook-check-div-rule-agree" class="new-postalook-not-agree"  onclick="new_postalook_upload_rules_check_uncheck( )"  >
													<img src="fs_folders/images/genImg/postalook-grey-check.png">
													<input type="text" value="not agree" name="agree" style="display:none"  /> 
												</div> 
											</td> 
											<td> 
												<div style="cursor:pointer"  onclick="new_postalook_upload_rules_check_uncheck( )" >
													<span >I agree to the </span> <span style="color:#b32727" > posting look rule. </span> 
												</div>
											</td>  
									</table>
								</center>  
							</td>
						<tr>
							<td id="new-postalook-post-cancel-submit" >
								<div> 
									<div>  
										<a href="\" onmousemove=" mousein_change_button ( '#new-postalook-upload-button-cancel' , 'fs_folders/images/genImg/new-postalook-post-cancel-hover.png' )" onmouseout=" mousein_change_button ( '#new-postalook-upload-button-cancel' , 'fs_folders/images/genImg/new-postalook-post-cancel.png' )"  >
											<img src="fs_folders/images/genImg/new-postalook-post-cancel.png" id="new-postalook-upload-button-cancel" />   
										</a>  
									</div> 

									<div style='margin-top:-51px;' > 

										<input type="submit" name="uploadNow" value=""  id="new-postalook-upload-button-upload"  onmousemove="mousein_change_background_image (  '#new-postalook-upload-button-upload' , 'url(fs_folders/images/genImg/postalook-upload-look-mouse-over.png)'   )"  onmouseout="mouseout_change_background_image (  '#new-postalook-upload-button-upload' , 'url(fs_folders/images/genImg/postalook-upload-look.png)'   )"    /> 
										
									</div> 
									<!-- <img src="fs_folders/images/genImg/new-postalook-post-submit.png" style="float:right" />    -->
								</div>  
							</td>
						<tr>
					</table> 
				</div>
			</form>
 
		</div>	 
	</body> 

</html>