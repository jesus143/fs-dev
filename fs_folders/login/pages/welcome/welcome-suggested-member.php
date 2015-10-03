<?php   
	require("../../../../fs_folders/php_functions/connect.php");    
	require("../../../../fs_folders/php_functions/function.php");
	require("../../../../fs_folders/php_functions/myclass.php");
	require("../../../../fs_folders/php_functions/library.php");
	require("../../../../fs_folders/php_functions/source.php"); 
 	$mc = new myclass();   


 	# get mno logon

	 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
	 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );   
	  
 	# fb friends on fs init

	 	$_SESSION['csm_fb'] = 2; // page number for fb friends suggested
	 	$_SESSION['csm_limit'] = 6; // limit show every show more 
	  
 	# fs members with simillar interest

	 	$_SESSION['csm_fs'] = 2;   // page num for fs member suggested 
		$_SESSION['wtres'] = 6;  // this is for the suggested member from fs show 6 
		  
	# general initialization

		$limit = 6;  // show 6 modals because it is showing from latest and the latest is his own modals so thats why query 7 but show 6. 

	#retrieved the fs members who are almost having same brands

		$members_fs = $mc->get_all_user( $limit+1 );       

	# retrieved the fb friends on fs

	    $fb_friends_on_fs = $mc->get_fb_freinds_on_fs($mno,"-+-");   

	    if ( $fb_friends_on_fs != false ): 	

		    $fb_friends_on_fs_len = count($fb_friends_on_fs);  
		    $_SESSION['fb_friends_on_fs'] = $fb_friends_on_fs; #THIS IS USED FOR VIEW MORE fb friends on fb 

		endif;   
		
	# save  brands selected  

		if ( !empty($_GET['brands']) ) {

			// echo " mno $mno <br>"; 
			$selectedBrand  = explode(',', $_GET['brands'] ); 
	 		$mc->account_settings_brand_insert( $selectedBrand , $mno );  	 

		} 

?> 
<div id="welcome-content-container" >  	 
	<center>   
		<div id="welcome-about-container" >     

					<div id="suggested-member-res" style="display:none"  >
						result here 	
					</div> 
					<?php if ( $fb_friends_on_fs != false  ): ?>
						<!-- from facebook friends -->
							<div>
								<div>
									<b> Familliar Faces: </b> <br>
									Follow your Facebook friends who are already enjoying Fashion Sponge.
								</div>	 
								<!-- profile pic --> 
									<div style="margin-top:10px;" id="c-sfb-friends-on-fs"  >
										<table  >
											<tr>  
												<?php    
													$c=0;  
													for ($i=0; $i <  $limit ; $i++):   
														$c++;     
														if ( $c < $fb_friends_on_fs_len ): 

															$mno1 =  $fb_friends_on_fs[$i];    
															// $mno1 = $mem[0]['mno'];  
															// $mem = $mc->get_fb_user_fs_info( intval($fbid) );   
															
															$followed = $mc->check_if_already_followed( $mno , $mno1 );
															$fullname = $mc->get_full_name_by_id( $mno1 );     
															// echo " mno1 = $mno1  <br>"; 
															echo "
															<td style='padding-right:10px;' >  
																<table border='0' >  
																	<tr> 
																		<td>  
																			<center> 
																			";    

																				$mppno = $mc ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );  
																		  		if ( file_exists("../../../../$mc->ppic_profile/$mppno.jpg")) { 
																					echo "<img src= '$mc->ppic_profile/$mppno.jpg' style='cursor:pointer; width:120px;height:120px;'"; 
																				}else{   
																					$avatar = $mc->get_male_female_avatar( $mno1 );  
																					echo "<img src= '$mc->ppic_profile/$avatar' style='cursor:pointer; width:120px;height:120px;'  />";  
																				}  
																			echo "   
																			</center> 
																		</td>  
																	<tr>
																		<td> 
																			<div  id='welcome-name-container' >
																				$fullname
																			</div>
																		</td>
																	<tr> 
																		<td style='padding-bottom:5px;'  >  
																			<center>
																			";   
																			if ( empty($followed)) {
																				echo "  
																					<img id='suggested-member-follow-image$mno1'  class='suggested-member-follow'  src='$mc->genImgs/profile-follow.png' style='cursor:pointer; ' onclick='suggested_member_follow ( \"#suggested-member-follow-image$mno1\" , \"$mno1\" )' /> 
																				";
																			}else{
																				echo " 
																					<img id='suggested-member-unfollow-image$mno1'  class='suggested-member-unfollow'  src='$mc->genImgs/profile-unfollow.png' style='cursor:pointer; ' onclick='suggested_member_follow ( \"#suggested-member-unfollow-image$mno1\" , \"$mno1\" )' /> 
																				";
																			}    
																		echo " 
																			</center>
																		</td> 
																</table>
															</td>  
															";  
															if ( $c%6 == 0 ):  
																echo "<tr>";
															endif;  
														endif;
													endfor;  
												?> 
										</table>  
									</div>  
									<div> 
									<table border="0" > 
										<tr> 
											<td> 
								 			 	<div id='more-sfb-friends-on-fs' > <img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  > 
								 			</td>   
								 		<tr>
								 			<td> 
								 				<img src="<?php echo "$mc->genImgs/brand-more.png";  ?>" onclick="welcome_more( 'c-sfb-friends-on-fs' , 'more-sfb-friends-on-fs img' , 'sf-fb' )"    >   			  
								 			</td>
							 		</table> 
							</div> 
						<?php endif; ?>
					<!-- from fashion sponge friends -->
						<br> 
						<div>
							<div>
								<b> Suggested Members: </b> <br>
								We recommend you to follow these members.
							</div>	 
							<!-- profile pic -->
								<div style="margin-top:10px;" id="c-smember-on-fs" >
									<table >
										<tr>  
											<?php   
												$c=0;
												for ($i=1; $i < count($members_fs)  ; $i++) :   
													$c++;
													$mno1 = $members_fs[$i]['mno'];  
													$followed = $mc->check_if_already_followed( $mno , $mno1 );
													$fullname = $mc->get_full_name_by_id( $mno1 );    
													// echo " mno1 = $mno1  <br>"; 
													echo "
													<td style='padding-right:10px;' >  
														<table border='0' >  
															<tr> 
																<td>  
																	<center> 
																	";    
																		$mppno = $mc ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );  
																  		if ( file_exists("../../../../$mc->ppic_profile/$mppno.jpg")) { 
																			echo "<img src= '$mc->ppic_profile/$mppno.jpg' style='cursor:pointer; width:120px;height:120px;'"; 
																		}else{   
																			$avatar = $mc->get_male_female_avatar( $mno1 );  
																			echo "<img src= '$mc->ppic_profile/$avatar' style='cursor:pointer; width:120px;height:120px;'  />";  
																		}   
																	echo "
																	</center>    
																</td>  
															<tr>
																<td> 
																	<div id='welcome-name-container'  > 
																		$fullname
																	</div>
																</td>
															<tr> 
																<td style='padding-bottom:5px;' > 
																	<center> ";   
																		if ( empty($followed)) {
																			echo "  
																				<img id='suggested-member-follow-image$mno1'  class='suggested-member-follow'  src='$mc->genImgs/profile-follow.png' style='cursor:pointer; float:right' onclick='suggested_member_follow ( \"#suggested-member-follow-image$mno1\" , \"$mno1\" )' /> 
																			";
																		}else{
																			echo " 
																				<img id='suggested-member-unfollow-image$mno1'  class='suggested-member-unfollow'  src='$mc->genImgs/profile-unfollow.png' style='cursor:pointer; float:right; m' onclick='suggested_member_follow ( \"#suggested-member-unfollow-image$mno1\" , \"$mno1\" )' /> 
																			";
																		}    
																		echo " 
																	</center>
																</td> 
														</table>
													</td>  
													";  
													if ( $c%6 == 0 ):  
														echo "<tr>";
													endif; 
												endfor; 
											?> 
									</table> 
								</div> 
								<div> 
									<table border="0" > 
										<tr> 
											<td> 
								 			 	<div id='more-smember-fs' > <img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  > 
								 			</td>   
								 		<tr>
								 			<td> 
								 				<img src="<?php echo "$mc->genImgs/brand-more.png";  ?>" onclick="welcome_more( 'c-smember-on-fs' , 'more-smember-fs img' , 'sf-fs' )"    >   			  
								 			</td>
							 		</table>
									 
								</div>
						</div>	 
					<div> 
				</div>   
				</div>     
			<!--  skip or continue button -->
		 		<div style="background-color:#e9eaed; padding:20px;margin-left:-20px; width:100%; border-radius: 0px 0px 5px 5px;" > 
					<center>  
						<table>
							<tr>	
								<td> 
									<a href="#">
										<img src="<?php echo "$mc->genImgs/login-welcome-skip.png";  ?>"  onclick="welcome_change_content( '#welcome-result-container', '<?php echo "$mc->login_path_page/welcome/welcome-invite-friends.php"; ?>' , '#more_loading4 img' , '4'  )"  >  
									</a>
								</td>
								<td> 
									<a href="#">
										<img src="<?php echo "$mc->genImgs/login-welcome-continue.png";  ?>"  onclick="welcome_change_content( '#welcome-result-container', '<?php echo "$mc->login_path_page/welcome/welcome-invite-friends.php"; ?>' , '#more_loading4 img' , '4'  )"  >  
									<a/>
								</td>
						</table>
					</center>
				</div> 
	 	</div>
	</center>
</div>    
