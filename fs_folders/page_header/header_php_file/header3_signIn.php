<?php
		/*
		*   date replaced: novemeber 01 , 2013
		*	required to work header correctly. 
		*   fs_folders/page_header/css/header1.css
		*	fs_folders/page_header/js/header1_js.js
		*	fs_folders/page_header/js/header1_query.js
		*/  
  		# set up if show header of hide 

			$show = true;
			if (!empty($_SESSION['hide_page'])) { 
				if ( in_array('header' , $_SESSION['hide_page'] )  ) {
				 	$show = false;
				} 
			}   
			if ( $show == true ): 
				# initialized session
				   
					$_SESSION['noti_limit_start'] = 0;									// notification start limit 
					$_SESSION['noti_limit_end']   = 1;                                 // nitification limit end or total show in every show more
		 
					$_SESSION['noti_limit_start_init'] = 0;								// notification start limit 
					$_SESSION['noti_limit_end_init']   = 5;                            // nitification limit end or total show in every show more, user for fb friends on fs, fb friends to invite
				 
				# searching in the field header 

						$_SESSION['counter_member']     = 0; 	 						// member counter for view more limit start
						$_SESSION['counter_article']    = 0;     						// article counter for view more limit start
						$_SESSION['counter_look']       = 0;     						// look counter for view more limit start
						$_SESSION['view_more']          = 6;    						// 10 view more 
						$_SESSION['keySearch']          = 'a';   					  	// default search keyword 
						$_SESSION['modal_style']        = 'width:50px;height:50px;'; 	 //this is the style of the modal shows in search result
						$_SESSION['view_more_text']     = 'VIEW MORE';  

				# messageing initialized      
						$_SESSION['msg_limit_start_init']    = 0;
						$_SESSION['msg_limit_end_init']      = 10;
		 	 
		 
				# initialize data 

					$userInfo = $this->get_user_full_fs_info( $mno );  
					$fullName    = $userInfo['fullName'];
					$username    =  $this->identity_username;//$userInfo['username'];
					$opercentage = $userInfo['opercentage']; 
					$tfollowers  = $userInfo['tfollowers']; 
					$tlikes      = $userInfo['tlikes'];  
					$tdrips      = $userInfo['tdrips'];   
					$trating     = $userInfo['trating'];  
					$rank        =  '0';


		 			// echo "<div style='color:black' > ";
		 			// $this->print_r1($userInfo );
		 			// echo "</div>";

		 			// echo " $trating ";


			  		// print_r($get_user_full_fs_infofo);  

				// $fullname = 'Jesus Erwin Suarez Suaresdasdzasdas12';  

				$fnamelen = strlen($fullName); 
				if ( $fnamelen > 20 ) { 
					$fullName = substr($fullName,0,18); 
					$fullName.='..';
					// echo " if $fullName1";
				}   
				$username = $this->get_username_by_mno( $mno );
				$header_settings_tab_profile_style = '';
				$header_settings_tab_account_style = '';


		 
				switch ( $header_page ) {
					case 'profile':
						 	$header_settings_tab_profile_style = 'background-color:#284372;color:white';
						break;
					case 'account':
						 	$header_settings_tab_account_style = 'background-color:#284372;color:white';
						break;
					case 'home':
						 	$header_settings_tab_style = 'background-color:#284372;';
						break;
					case 'lookdetails':
						 	$header_settings_tab_style = 'background-color:#284372;';
						break; 
					case 'feed': 

						break;
					default: 
						break;
				}  





				// notification

					$tnotification =  $this->posted_modals_notification_Query ( 
						array(      
						  'mno1'=>$mno,  
						  'notification_query'=>'get-total-notification-not-oppend'  
						) 
					); 

					/*
						$response =  $this->posted_modals_notification_Query ( 
							array(      
							  'mno1'=>$mno, 
							  'limit_start'=>$_SESSION['noti_limit_start_init'],
							  'limit_end'=>$_SESSION['noti_limit_end_init'], 
							  'orderby'=> 'nno desc',
							  'notification_query'=>'get-notification-modal'  
							) 
						); 
					*/

					// $tnotification = 90; 
					$notification_buble_Style = $this->get_notification_cricle_design( $tnotification );  
		 
				// message 

					$tmessage = $this->fs_message(   array(  'type'=>'get-total-message-notification',  'mno' => $mno ) ); 
					$message_buble_Style  = $this->get_notification_cricle_design( $tmessage );   
					$variables = array();  
				    // response from table fs_message and lits of your all messages
				    	/* 
						    $variables['response'] = $this->fs_message(    
						    	array( 
						    		'type'       => 'get-all-message-id',     
						    		'mno'    	 => $mno , 
						    		'orderby'    => 'order by date desc' ,   
						    		'limit_start'=> $_SESSION['msg_limit_start_init'],   
						    		'limit_end'  => $_SESSION['msg_limit_end_init']  
						    	)  
						    );     
						   */  
			
			
		 
		 
				switch ( $header_page ) {
					case 'home':
						 	$style_blue_header = 'border:1px solid none; margin-top:45px; margin-left:0px;  background-color:#284372; position:absolute; width:1010px; height:45px;z-index:105;'; 	
						break; 
					case 'profile':
						 	$style_blue_header = 'border:1px solid none; margin-top:45px; margin-left:-1px;  background-color:#284372; position:absolute; width:1012px; height:45px;z-index:105;'; 	
						break; 
					default:
							$style_blue_header = 'border:1px solid none; margin-top:45px; margin-left:-1px;  background-color:#284372; position:absolute; width:1010px; height:45px;z-index:105;'; 
						break;
				}



				/** 
				* Show hide notification in suggested member dropdown icon if the suggested  member, friends on fs and friends on fb exist or not
				* @todo add auto height for the specific dropdown suggested member use the variable suggestedMemberStyle or you can add more.  
				*/
 
				$suggestedMember = TRUE;
				$friendsOnFsFromFacebook = TRUE;
				$friendsToInviteFromFacebook = TRUE;  
				$setHight = 500;


				$r = $this->getSuggestedMember(); 
 				if(empty($r)) { 
 					$suggestedMember = FALSE;
 					$suggestedMemberStyle = '';
 				} 

 				if($this->get_fb_freinds_on_fs( $mno , '-+-' ) == FALSE ) { 
 					$friendsOnFsFromFacebook = FALSE;
 					$suggestedMemberStyle = '';
 				}
 
				if($this->get_fb_freinds_on_fb($mno,"-+-",0,5) == FALSE) {  
					$friendsToInviteFromFacebook = FALSE;  
					$suggestedMemberStyle = '';
				}

				$suggestedMemberStyle = 'height:' . $setHight;
  

				?> 
					<script type="text/javascript" src="fs_folders/page_header/js/header1_query.js"></script>
					<script type="text/javascript" src="fs_folders/page_header/js/header1_js.js"></script>
					<link rel="stylesheet" type="text/css" href="fs_folders/page_header/css/header3_signIn.css">   

						<div id="header-wrapper"  > 
							<div id="audio-alert" >
								
							</div>


						 			<!-- <div id='bgimg'> 
							 			<img src="fs_folders/images/header/bgheaderperson1.png">
							 		</div> --> 


					 		<!-- response search dropdown --> 

						 		<div style="position:absolute;margin-left:57;margin-top:35px;" >
									<?php     $this->header( array('type'=>'search-response') ); ?>	
								</div>  

					 		<!-- new bottom area  --> 
					 		
						 		<div id="new-bottom-header-signin" style="<?php echo $style_blue_header; ?>border-bottom: 1px solid white" > 
							 		<span id='myacc' > MY ACCOUNT </span> 
							 		<table id='profile_t' border="0" cellpadding="0" cellspacing="0"  >  
								 		<tr>  
								 			<td id='prof_img' width="38px" >   
								 				<div style="margin-top:0px;" >
								 			 		<!-- Profile pic  --> 
									 			 	<a href="profile?id=<?php  echo $mno; ?>" >
									 			 		<?php 	  

									 			 		    // height: 32px;width: 36px;border-radius:3px;border:1px solid  #e2e2df;margin-top: -17px;
									 			 			$this->member_thumbnail_display( "fs_folders/images/uploads/members/mem_thumnails/", $mno , "fs_folders/images/uploads/members/mem_thumnails/", null , '36px', null, '32px', 'margin-top:-17px'  );  
									 			 		?>
									 			 	</a>
								 			 	</div>
								 			</td>
								 			<td id='prof_desc' style="width:302px;padding:0px ;margin:0px ; padding-left: 8px;" >   

									 			<div id='full_name'  style="margin-top:2px;"  >  
									 				 <?php echo $fullName; ?>
									 			</div>  
									 			<div style="margin-top:23px;"  > 
										 			<a href="<?php echo "$username"; ?>   ">
											 			<span id='full_fashion_link'> 
											 				 http://www.fashionsponge.com/<?php echo $username; ?>   
											 			</span>
										 			</a>
									 			</div>   
								 			</td>  
											<td id='prof_icons' width="140px" > 

										 		<div id='hmessage_Contaner'> 
									 				 <table border="0" cellpadding="0" cellspacing="0"> 
									 				 	<tr>
									 				 		<td width="30px" > 
									 				 			<span id='header_invisible' ><!-- (0) --></span> 
									 				 			<img title='memebers' id='invite_img1' class="grey" src="fs_folders/images/header/icon-header-invite-icon.png"  onclick="member_suggest_load ('view-notification-load' , '0' , '5' , '<?php echo $mno; ?>', 'member-suggest-container-td', 'member-suggest', 'notification-view-init-loader')" > 
									 				 			<img title='memebers' id='invite_img2' class="red"  src="fs_folders/images/header/icon-header-member-red.png"   onclick=" showHideParentOverFlow('body', 'show')"  > 				 				 			
									 				 		</td>
									 				 		<td width="30px" > 
									 				 			<?php if( $tmessage > 0 ): ?>
									 				 			<div id="message-container-buble" style='<?php echo "$message_buble_Style"; ?>' ><?php echo $tmessage ?></div>	
									 				 			<?php endif;?> 
									 				 			<span> <!-- 999+ --> </span> 
									 				 			<img title='messages' id='message_img1' src="fs_folders/images/header/icon-header-message-icon-grey-1.png" onclick="chat ( 'messaging' , 'view-messages-load' , 'mno1' , 'profilepic' , 'method' , event , '#message-container-buble' )"  > 
									 				 			<img title='messages' id='message_img2' src="fs_folders/images/header/icon-header-message-icon-red.png" onclick=" showHideParentOverFlow('body', 'show')"  >  
									 				 		</td>
                                                            <td width="30px" >
                                                                <?php if( $tnotification > 0 ): ?>
                                                                    <div id="notification-container-buble" style='<?php echo "$notification_buble_Style"; ?>' ><?php echo $tnotification ?></div>
                                                                <?php endif;?>
                                                                <span> <!-- 999+ --> </span>
                                                                <img title='notifcations' id='notifcation_img1' src="fs_folders/images/header/icon-header-notifcation-icon.png"  onclick="notification ( 'view-notification-load' , '0' , '5' , '<?php echo $mno; ?>'  )"  >
                                                                <img title='notifcations' id='notifcation_img2' src="fs_folders/images/header/icon-header-notification-red.png" onclick=" showHideParentOverFlow('body', 'show')"  >
                                                            </td>
                                                            <td width="30px" >
                                                                <?php if( $tnotification > 0 ): ?>
                                                                    <div id="notification-container-buble" style='<?php echo "$notification_buble_Style"; ?>' ><?php echo $tnotification ?></div>
                                                                <?php endif;?>
                                                                <span> <!-- 999+ --> </span>
                                                                <img title='notifcations' id='notifcation_img1' src="fs_folders/images/header/new-post.png"  onclick="notification ( 'view-notification-load' , '0' , '5' , '<?php echo $mno; ?>'  )"  >
                                                                <img title='notifcations' id='notifcation_img2' src="fs_folders/images/header/new-post-mouse-over.png" onclick=" showHideParentOverFlow('body', 'show')"  >
                                                            </td>
									 				 		<td>  
									 				 			<span  id='header_invisible' ><!-- (0) --></span>  
									 				 			<!-- <img title='settings' id='settings_img1' src="fs_folders/images/header/icon-header-settings-icon.png" onclick="fs_logout()" >    -->
									 				 			<img title='settings' id='settings_img1' src="fs_folders/images/header/icon-header-settings-icon.png" >   
									 				 			<img title='settings' id='settings_img2' src="fs_folders/images/header/icon-header-settings-red.png"  onclick=" showHideParentOverFlow('body', 'show')"  > 
									 				 		</td>
									 				 </table>
										 		</div>    
										 		<div id="invite_result" > 
										 			invite
										 		</div>




                                                <!-- member suggest result container -->
                                                <div id="notification-container" class="notification-member-suggest" style="overflow-y:visible" >
                                                	<div> 



                                                		<?php if($suggestedMember) { ?>

                                                		<!-- Suggested people from fs -->
	                                                	<div style="border:1px solid none" >  
		                                                    <table id="notification-main-table" border="0" cellpadding="0" cellspacing="0"  style="width:353px;"  >
		                                                        <tr>
		                                                            <td id="notification-header"  style="padding-left:10px;" >
		                                                                <div> <b>Suggest Member<b> </div>
		                                                            </td>
		                                                    </table> 
		                                                    <table id="notification-main-table" border="0" cellpadding="0" cellspacing="0" >
		                                                        <tr>
		                                                            <td   >
		                                                                <!-- <center><?php $this->image( array( 'type'=>'loader' , 'id'=>"notification-view-init-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> -->
		                                                            </td>
		                                                        <tr>
		                                                            <td>
		                                                                <div id="member-suggest-container-td" style=" overflow-y:scroll;  overflow-x:hidden; "  >
		                                                                 	<?php  //$this-> notification_design( $response ); ?>
		                                                                </div>
		                                                            </td>
		                                                    </table>

		                                                    <table id="notification-main-table" border="0" cellpadding="0" cellspacing="0"  >
		                                                        <tr>
		                                                            <td id="notification-footer" >
		                                                                <div>
		                                                                    <center><?php $this->image( array( 'type'=>'loader' , 'id'=>"notification-view-init-loader1" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center>
		                                                                </div>
		                                                                <div > <b onclick="member_suggest( 'view-more-notification', 0, 5, '<?php echo $mno ?>', 'member-suggest-container-td', 'member-suggest', 'notification-view-init-loader1')" style='cursor:pointer' > View More.. <b> </div>
		                                                            </td> 
		                                                    </table>
		                                               	</div> 

		                                               	<?php } ?>

		                                               	<?php if($friendsOnFsFromFacebook) { ?>
		                                               	<!-- Friends on fs from facebook --> 
		                                               	<div style="border:1px solid none" > 

		                                                    <table id="notification-main-table" border="0" cellpadding="0" cellspacing="0"  style="width:344px;"  >
		                                                        <tr>
		                                                            <td id="notification-header"  style="padding-left:10px;" >
		                                                                <div class="header-suggested-member-title" > <b>Facebook Friends On Fashion Sponge<b> </div>
		                                                            </td>
		                                                    </table> 
		                                                    <table id="notification-main-table" border="0" cellpadding="0" cellspacing="0" >
		                                                        <tr>
		                                                            <td >
		                                                                <!-- <center><?php $this->image( array( 'type'=>'loader' , 'id'=>"notification-view-init-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> -->
		                                                            </td>
		                                                        <tr>
		                                                            <td>
		                                                                <div id="fb-friends-on-fs-container-td" style=" overflow-y:scroll;  overflow-x:hidden; "  >
		                                                                   <!-- content here.. <?php  //$this-> notification_design( $response ); ?> -->
		                                                                </div>
		                                                            </td>
		                                                    </table>

		                                                    <table id="notification-main-table" border="0" cellpadding="0" cellspacing="0"  >
		                                                        <tr>
		                                                            <td id="notification-footer" >
		                                                                <div>
		                                                                    <center><?php $this->image( array( 'type'=>'loader' , 'id'=>"notification-view-more-loader-2" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center>
		                                                                </div>
		                                                                <div > <b onclick="member_suggest( 'view-more-notification', 0, 5, '<?php echo $mno ?>', 'fb-friends-on-fs-container-td', 'fb-friends-on-fs', 'notification-view-more-loader-2')" style='cursor:pointer' > View More.. <b> </div>
		                                                            </td>
		                                                    </table>
		                                               	</div>  

		                                               	<?php } ?>  
		                                               	<?php if($friendsToInviteFromFacebook) { ?>
		                                               	<!-- Friends to invite from facebook -->
		                                              	<div style="border:1px solid none" > 

		                                                    <table id="notification-main-table" border="0" cellpadding="0" cellspacing="0"  style="width:344px;"  >
		                                                        <tr>
		                                                            <td id="notification-header"  style="padding-left:10px;" >
		                                                                <div class='header-suggested-member-title' > <b>Facebook Friends On Fashion Sponge<b> </div>
		                                                            </td>
		                                                    </table> 
		                                                    <table id="notification-main-table" border="0" cellpadding="0" cellspacing="0" >
		                                                        <tr>
		                                                            <td >
		                                                                <!-- <center><?php $this->image( array( 'type'=>'loader' , 'id'=>"notification-view-init-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> -->
		                                                            </td>
		                                                        <tr>
		                                                            <td>
		                                                                <div id="fb-friends-to-invite-on-fs-container-td" style=" overflow-y:scroll;  overflow-x:hidden; "  >
		                                                                   <!-- content here.. <?php  //$this-> notification_design( $response ); ?> -->
		                                                                </div>
		                                                            </td>
		                                                    </table>

		                                                    <table id="notification-main-table" border="0" cellpadding="0" cellspacing="0"  >
		                                                        <tr>
		                                                            <td id="notification-footer" >
		                                                                <div>
		                                                                    <center><?php $this->image( array( 'type'=>'loader' , 'id'=>"notification-view-more-loader-3" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center>
		                                                                </div>
		                                                                <div > <b onclick="member_suggest( 'view-more-notification', 0, 5, '<?php echo $mno ?>', 'fb-friends-to-invite-on-fs-container-td', 'fb-friends-to-invite-on-fs', 'notification-view-more-loader-3')" style='cursor:pointer' > View More.. <b> </div>
		                                                            </td>
		                                                    </table>
		                                               	</div>   
		                                               	<?php } ?>   
                                                	</div>
                                                </div>


                                                <!-- message result container -->
											 		<div id="notification-container"  class="notification-message"  >  
												 		 <table id="notification-main-table" border="0" cellpadding="0" cellspacing="0" style="border:none"  >
												 				<tr> 
												 					<td id="notification-header"  style="padding-left:10px;" > 
												 						<div> <b>Messages<b> </div>
												 					</td>  
												 			</table> 
												 			<table id="notification-main-table" border="0" cellpadding="0" cellspacing="0" style="width:344px;" >
												 				<tr>  
												 					<td>	 
												 						<center><?php $this->image( array( 'type'=>'loader' , 'id'=>"messaging-view-init-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
												 					</td> 
												 				<tr>
												 					<td> 	 
												 						<div id="messaging-container-td" style="height:340px; overflow-y:scroll;  overflow-x:hidden; "  > 
												 							<?php // $this->notification_design_message( $variables['response'] , null , $mno ); ?>    
												 						</div>
												 					</td>
												 			</table> 
												 			<table id="message-main-table" border="0" cellpadding="0" cellspacing="0"  >
												 				<tr> 
												 					<td id="notification-footer" > 
												 						<div>
												 							<center><?php $this->image( array( 'type'=>'loader' , 'id'=>"messaging-view-more-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
												 						</div>
												 						<div > <b onclick=" chat ( 'messaging' , 'view-more-message' )" style='cursor:pointer' > Show more <b> </div>
												 					</td>  
												 			</table>
											 		</div> 

										 		<!-- notification result container -->
											 		<div id="notification-container" class="notification-activity" >  
												 			<table id="notification-main-table" border="0" cellpadding="0" cellspacing="0"  style="width:344px;"  >
												 				<tr> 
												 					<td id="notification-header"  style="padding-left:10px;" > 
												 						<div> <b>Notifications<b> </div>
												 					</td>  
												 			</table>

												 			<table id="notification-main-table" border="0" cellpadding="0" cellspacing="0" >
												 				<tr>  
												 					<td>	 
												 						<!-- <center><?php $this->image( array( 'type'=>'loader' , 'id'=>"notification-view-init-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center>  -->
												 					</td> 
												 				<tr>  
												 					<td>   
												 						<div id="notification-container-td" style="height:340px; overflow-y:scroll;  overflow-x:hidden; "  > 
												 							<?php  //$this-> notification_design( $response ); ?>    
												 						</div>
												 					</td>
												 			</table> 	
												 		 
												 			<table id="notification-main-table" border="0" cellpadding="0" cellspacing="0"  >
												 				<tr> 
												 					<td id="notification-footer" > 
												 						<div>
												 							<center><?php $this->image( array( 'type'=>'loader' , 'id'=>"notification-view-more-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
												 						</div>
												 						<div > <b onclick="notification( 'view-more-notification' )" style='cursor:pointer' > View More.. <b> </div>
												 					</td>  
												 			</table> 
											 		</div> 

											 	<!-- settings result container --> 

											 		<div id="settings_result"     > 
											 			<table border="0" cellpadding="0" cellspacing="0" >
											 				<!-- <tr> -->
											 					<td style='display:none'  onclick="settings_dropdown_tab_clicked ( '1' , '<?php echo "$username"; ?>' )"  ><div style='<?php echo "$header_settings_tab_profile_style"; ?>' id='header-settings-dropdown-1' ><?php echo "$fullName"; ?></div></td>
											 				<tr> 
											 					<td onclick="settings_dropdown_tab_clicked ( '2' , 'account' )"                   ><div  style='<?php echo "$header_settings_tab_account_style"; ?>'  id='header-settings-dropdown-2'  > Account Settings </div></td>
											 				<tr>
											 					<td onclick="settings_dropdown_tab_clicked ( '3' , 'logout.php' )"  > <div  id='header-settings-dropdown-3'  > Sign Out </div></td>
											 			</table>  
											 		</div> 

								 			</td> 


								 			<td id="prof_ratings"  width="200px" >

                                                <table border="0" cellpadding="0" cellspacing="0" id="header-article-stat" >
                                                    <tr>
                                                        <td  id="ratigs" > <span>  </span> </td>
                                                        <td  id="ratigs" > <span>  <?php echo $this->trating_article; ?> </span> </td>
                                                        <td  id="ratigs" > <span>  #<?php echo "$rank"; ?>  </span> </td>
                                                        <td  id="ratigs" > <span>  <?php echo "$tfollowers"; ?>  </span> </td>
                                                    <tr>
                                                        <td id="ratigs_names"> <div class="modal-stat" onclick="hide_show_hide('#header-article-stat', '#header-look-stat')" > ARTICLE </div> </td>
                                                        <td id="ratigs_names"  > <span> LIKES </span> </td>
                                                        <td id="ratigs_names"  > <span> RANK </span> </td>
                                                        <td id="ratigs_names"  >  <span> FOLLOWERS </span> </td>
                                                    <tr>
                                                </table>



                                                <table border="0" cellpadding="0" cellspacing="0" id="header-look-stat" style="display:none"  >
                                                    <tr>
                                                        <td  id="ratigs" > <span>  </span> </td>
                                                        <td  id="ratigs" > <span>  <?php echo $this->trating_look; ?> </span> </td>
                                                        <td  id="ratigs" > <span>  #<?php echo "$rank"; ?>  </span> </td>
                                                        <td  id="ratigs" > <span>  <?php echo "$tfollowers"; ?>  </span> </td>
                                                    <tr>
                                                        <td id="ratigs_names"> <div class="modal-stat" onclick="hide_show_hide('#header-look-stat', '#header-article-stat')" > LOOKS </div> </td>
                                                        <td id="ratigs_names"  > <span> LIKES </span> </td>
                                                        <td id="ratigs_names"  > <span> RANK </span> </td>
                                                        <td id="ratigs_names"  >  <span> FOLLOWERS </span> </td>
                                                    <tr>
                                                </table>



                                            </td>
								 			<td id='prof_post' width=" "  > 
									 		    <!-- <input type='button' value='image'  >  -->
									 		    <table border="0" cellpadding="0" cellspacing="0"> 
									 		    	<tr>  
									 		    		<td> <div class="header-post-text">POST </div> </td>
									 		    		<td> 
									 		    			<!-- <img id ="post_now" title='POST NOW' src="fs_folders/images/header/header_post.png">  -->
									 		    			<!-- <a href="post-contest"> -->
									 		    				<img id = "post-button-modal"  src="fs_folders/images/header/header_post.png" style='height:30px;' onmouseover="change_image_src ( '#post-button-modal' , 'fs_folders/images/header/post-mouse-over-button.png' )" onmouseout="change_image_src ( '#post-button-modal' , 'fs_folders/images/header/header_post.png' )"   >  
									 		    			<!-- </a> -->
									 		    		</td>
									 		    	<tr> 
									 		    		<td></td>
									 		    		<td id="post_option_td" >   
									 		    		 	<div id="post-dropdownoption " > 
										 		    		 	<div id="settings_result-1" class="close"     > 
														 			<table border="0" cellpadding="0" cellspacing="0" >
														 				<!-- <tr> -->
														 					<td style='display:none'  onclick="settings_dropdown_tab_clicked ( '1' , '<?php echo "$username"; ?>' )"  ><div style='<?php echo "$header_settings_tab_profile_style"; ?>' id='header-settings-dropdown-1' ><?php echo "$fullName"; ?></div></td>
														 				<tr> 
														 					<!-- <td onclick="header_post_popup_category_show ( )"   ><div  id='header-settings-dropdown-2'  > POST LOOK </div></td> -->
														 					<!-- <td onclick="fs_popup( 'postarticle' , 'modal-attribute' , 'look-modal-design' ) "  ><div  id='header-settings-dropdown-2'  > POST LOOK </div></td> -->
														 					<td>
														 						<a href="postalook">
															 						<div  id='header-settings-dropdown-2'  > 
															 							POST LOOK 
															 						</div>
														 						</a>
														 					</td> 
														 				<tr>
														 					<!-- <td>  <a href='postarticle' > <div  id='header-settings-dropdown-2'  > POST ARTICLE </div> </a> </td> -->
														 					<!-- <td> <div  id='header-settings-dropdown-2'  onclick="fs_popup( 'postarticle' , 'postarticle' , 'design' ) " > POST ARTICLE </div>  </td> -->
														 					<td> 
														 						<a href="postarticle">
															 						<div  id='header-settings-dropdown-2'> 
															 							POST ARTICLE 
															 						</div>  
														 						</a>
														 					</td>
														 			</table>  
														 		</div> 
									 		    		 	</div> 

									 		    		</td>
									 		    </table> 
								 			</td> 
								 			<td>  
												<div id="post_option_div" class="close" > 
					 		    					<ul> 
						 		    					<li> <a href="postalook"> LOOK </a></li>
								 		    			<li> <a href="postamedia"> MEDIA </a></li>
								 		    			<li> <a href="postarticle"> ARTICLE </a></li>
							 		    			</ul>
					 		    					<img id ="post_option" src="fs_folders/images/header/post_option.png"> 				
								 		    	</div>
								 			</td>
								 	</table>  
								</div>

							<!-- fix result area   --> 
							
								<div  id="res-fixed" style="position:fixed; margin-top:100px;color:#000; display:block;z-index:150;background-color:white;display:none " >  
									res here
								</div>   

						 	<!-- new upper area  --> 

						 		<div id='header_container' style="<?php echo $style_main_table; ?>" > 
						 			<table border="0" width="100%"> 
						 				<tr> 
						 					<td> 
									 			<div id='header_menu' >  
									 				<!-- new top area  -->
											 		<table border="0" id='hmt' > 
											 			<tr> 
											 				<td id='htd1' > 
												 				
												 					<table border="0" id='httdt3'> 
												 						<tr> 
													 			 			<td>  
														 			 			<a href="/">
														 			 				<img src="<?php echo "$this->genImgs/blue-logo.png"; ?>" style='height:30px; border:1px solid none' >
														 			 				<!-- <img src="fs_folders/images/logo/updated-FashionSponge-Logo.png" >  -->
														 			 			</a>
													 			 			</td>
													 			 			<td id="sign_in_beta_td" width="50px;" > 

										 			 			 				<a href="/">
										 			 			 					<span id="beta"  class='color-blue' style='display:none' > (ALPHA) </span>
										 			 			 				</a>
																			</td>
													 			 	</table>
													 			 
											 				</td>
											 				<!-- <td  id='htd2'> -->
											 					<!-- <table border="0" style=" "  > 
											 					<tr>  
															 		 	<td width=" " >             
															 		 		<div id='home1'>     							  
															 		 		<?php if( $header_page == 'feed' ): ?>
															 		 				<a href="feed" id="header-link-text-1" style="color: rgb(33, 89, 157);" onmouseover="header_dropdown ( '#header-link-text-1' , '#b01e23' , '.header-link-underline-1' , 'visible' )" onmouseout="header_dropdown ( '#header-link-text-1' , 'color: rgb(33, 89, 157)' , '.header-link-underline-1' , 'hidden' )" >HOME </a>
															 		 		<?php else: ?> 
															 		 			<a href="feed" id="header-link-text-1" style="color: rgb(33, 89, 157);"   onmouseover="header_dropdown ( '#header-link-text-1' , '#b01e23' , '.header-link-underline-1' , 'visible' )" onmouseout="header_dropdown ( '#header-link-text-1' , 'color: rgb(33, 89, 157)' , '.header-link-underline-1' , 'hidden' )"   >HOME </a>
															 		 		<?php endif; ?>
															 		 		</div> 
															 		 	</td>  
															 			<td width=" " >             <div id='participate' style="margin-left:15px;" > <a href="#" 	 id="header-link-text-2" style="color: rgb(33, 89, 157);"    onmouseover="header_dropdown ( '#header-link-text-2' , '#b01e23' , '.header-link-underline-2' , 'visible' )" onmouseout="header_dropdown ( '#header-link-text-2' , 'color: rgb(33, 89, 157)' , '.header-link-underline-2' , 'hidden' )"  >FASHION</a>  </div></td>
															 			<td width=" " >             <div id='comunity'>  							  <a href="#" 	 id="header-link-text-3" style="color: rgb(33, 89, 157);"   onmouseover="header_dropdown ( '#header-link-text-3' , '#b01e23' , '.header-link-underline-3' , 'visible' )" onmouseout="header_dropdown ( '#header-link-text-3' , 'color: rgb(33, 89, 157)' , '.header-link-underline-3' , 'hidden' )"   >BEAUTY </a>   </div></td>
	                                                                    <td width=" " >			    <div id='info'>       							  <a href="#"    id="header-link-text-4" style="color: rgb(33, 89, 157);"    onmouseover="header_dropdown ( '#header-link-text-4' , '#b01e23' , '.header-link-underline-4' , 'visible' )" onmouseout="header_dropdown ( '#header-link-text-4' , 'color: rgb(33, 89, 157)' , '.header-link-underline-4' , 'hidden' )"  >LIFESTYLE</a>         </div></td>
	                                                                    <td width=" " >			    <div id='entertainment'>       							  <a href="#"    id="header-link-text-5" style="color: rgb(33, 89, 157);"    onmouseover="header_dropdown ( '#header-link-text-5' , '#b01e23' , '.header-link-underline-5' , 'visible' )" onmouseout="header_dropdown ( '#header-link-text-5' , 'color: rgb(33, 89, 157)' , '.header-link-underline-5' , 'hidden' )"  >ENTERTAINMENT</a>         </div></td>
																	 				 
														 			<tr> 
															 			<td> <div id="red-underline" class="header-link-underline-1" style="width:33px;" >  </div>  </td>
															 			<td> <div id="red-underline" class="header-link-underline-2" style="width: 55px; margin-left: 15px;" >  </div>  </td>
															 			<td> <div id="red-underline" class="header-link-underline-3" style="width:50px;" >  </div>  </td>
                                                                        <td> <div id="red-underline" class="header-link-underline-4" style="width:64px" >  </div>  </td>
                                                                        <td> <div id="red-underline" class="header-link-underline-5" style="width:102px;" >  </div>  </td>
											 					</table> -->
											 				<!-- </td> -->
											 				<td id="new-header-signin-upper-td2" >
								                                 <table>
								                                     <tr>
								                                        <td>
								                                            <div id="new-header-signin-link"  > <a href="feed" >         FEED        </a>  </div>
								                                        </td>
								                                        <td>
								                                            <div id="new-header-signin-link"  > <a href="#" onmouseover="hide_show_hide('#dropdown-header-fashion, #dropdown-header-beauty, #dropdown-header-lifestyle, #dropdown-header-entertainment', '#header-dropdown-look, #dropdown-header-look')" >         LOOKS       </a>  </div>
								                                        </td> 
								                                        <td>
								                                            <div id="new-header-signin-link"  > <a href="#"  onmouseover="hide_show_hide('#dropdown-header-look, #dropdown-header-beauty, #dropdown-header-lifestyle, #dropdown-header-entertainment', '#header-dropdown-look, #dropdown-header-fashion')"  > FASHION  </a>  </div>
								                                        </td>
								                                         <td>
								                                             <div id="new-header-signin-link"  > <a href="#"  onmouseover="hide_show_hide('#dropdown-header-fashion, #dropdown-header-look, #dropdown-header-lifestyle, #dropdown-header-entertainment', '#header-dropdown-look, #dropdown-header-beauty')"  >   BEAUTY   </a>  </div>
								                                         </td>
								                                         <td>
								                                             <div id="new-header-signin-link"  > <a href="#"  onmouseover="hide_show_hide('#dropdown-header-fashion, #dropdown-header-beauty, #dropdown-header-look, #dropdown-header-entertainment', '#header-dropdown-look, #dropdown-header-lifestyle')" >        LIFESTYLE        </a>  </div>
								                                         </td>
								                                         <td>
								                                             <div id="new-header-signin-link"  > <a href="#"   onmouseover="hide_show_hide('#dropdown-header-fashion, #dropdown-header-beauty, #dropdown-header-lifestyle, #dropdown-header-look', '#header-dropdown-look, #dropdown-header-entertainment')"  >        ENTERTAINMENT        </a>  </div>
								                                         </td>
								                                 </table>
								                            </td>
											 				<td  id='htd3' >   
											 					<div>
												 					<table border="0" id='header_search_field' style="padding-right:50px;"  > 
												 						<tr> 
												 							<td>
												 								<input id='new-header-signout-search' type='text' placeholder="SEARCH" onkeyup="header( 'search-field' , event  )"  onfocus="header( 'search-field-show' , event  )"   >
												 								 
												 							</td>
												 							<td>   
												 								<input id='new-header-signout-scope' type='image' src="fs_folders/images/genImg/header-search-icon.png" >
												 							</td>
												 					</table>   
											 					</div>  
											 				</td> 
											 		</table> 
									 			</div> 
							 				</td>	
							 			<tr>
								 			<td> 
							 					<hr id="line_separator" style="display:none" >
							 				</td>
							 			<tr>  
							 				<td id='td2' > 

							 				</td>
							 			<tr>
							 				<td id='td3' > 
							 				</td>
						 			</table>

						 			<!-- the separator -->
						 				<center> <div style="clear:both; border-bottom:1px solid #e2e2df; width:888px; margin-top:33px;margin-left:-2px;display:none " >  </div> </center>
						 		</div>   

					 		<!-- new dropdowns  -->

			 			 		<div id="all_menu_ropdown_c" style="<?php echo $this->attribute['disable_dropdowns']; ?>" >  

							 		<div id="info_dd_container"          onmouseover="header_dropdown ( '#header-link-text-4' , '#b01e23' , '.header-link-underline-4' , 'visible' )" onmouseout="header_dropdown ( '#header-link-text-4' , '#284372' , '.header-link-underline-4' , 'hidden' )"  > 
						 				<div id="info_handle" > 
						 					<span >   </span>
						 					<!-- <img src="fs_folders/images/header/drop info/handle.png"> --> 
						 				</div>

						 				<table id="iddc_leftT"  cellpadding="0" cellspacing="0"> 
						 				 	<tr>  	
						 				 		<td id="t1" >  <span >  WHAT CAN I DO </span> </td>
						 				 	<tr>  	
						 				 		<td  id="link" > <a href="#">  <span>  ABOUT US  </span>  </a> </td>
						 				 	<tr>  	
						 				 		<td  id="link" > <a href="#"><span>  OUR STORY </span></a> </td>
						 				 	<tr>  	
						 				 		<td  id="link" > <a href="#"><span>  CAREERS  </span></a> </td>
						 				 	<tr>  	
						 				 		<td  id="link" > <a href="#"><span>  CONTEST & RULES </span></a> </td>
						 				 	<tr>  	
						 				 		<td  id="link" > <a href="#"><span>  PRIVACY POLICY </span></a> </td>
						 				 	<tr>  	
						 				 		<td  id="link" > <a href="#"><span>  TERM OF SERVICE </span></a> </td>
						 				 </table>
						 				 <table id="iddc_rightT"  border="0" cellpadding="5" cellspacing="0" > 
						 				 	<tr>  
						 				 		<td>  <center> <a href="#"> <img id="iddc_feedback"     src="fs_folders/images/header/drop info/feedback.png">    </a>  </center> </td>
						 				 		<td>  <center> <a href="#"> <img id="iddc_dvertise"     src="fs_folders/images/header/drop info/advertise.png">   </a>  </center> </td>
						 				 		<td>  <center> <a href="#"> <img id="iddc_ettiquiette"  src="fs_folders/images/header/drop info/ettiquette.png">  </a>  </center> </td>
						 				 		<td>  <center> <a href="#"> <img id="iddc_contribute"   src="fs_folders/images/header/drop info/contribute.png">  </a>  </center> </td>
						 				 		<td>  <center> <a href="#"> <img id="iddc_help"         src="fs_folders/images/header/drop info/faq.png">         </a>  </center> </td>
						 				 	<tr> 
						 				 		<td id="link" > <a href="#"> <span> SUBMIT FEEDBACK </span> </a></td>
						 				 		<td id="link" > <a href="#"> <span> ADVERTISE       </span> </a></td>
						 				 		<td id="link" > <a href="#"> <span> ETTIQUIETTE     </span> </a></td>
						 				 		<td id="link" > <a href="#"> <span> LINK PROGRAM      </span> </a></td>
						 				 		<td id="link" > <a href="#"> <span> FAQ            </span> </a></td>
						 				 </table>
							 		</div>

						 			<div id="community_dd_container"    onmouseover="header_dropdown ( '#header-link-text-3' , '#b01e23' , '.header-link-underline-3' , 'visible' )" onmouseout="header_dropdown ( '#header-link-text-3' , '#284372' , '.header-link-underline-3' , 'hidden' )"    >
						 				<!-- community dropdown -->
						 				<div id="community_handle"> 
						 					<span> <!-- COMMUNITY --> </span>
						 					<!-- <img src="fs_folders/images/header/drop info/handle.png"> -->
						 				</div>


						 				<table id="cddc_t1" border="0" cellpadding="0" cellspacing="0" > 
						 					<tr>  
						 						<td id="icon_bmember" >  
						 							 <table border="0"> 
						 							 	<tr>
						 							 		<td> 
				 												<center> <a href="#"> <img id=""   src="fs_folders/images/header/drop community/members-icon.png">  </a>  </center> 
				 											</td>  
				 										<tr>  
				 											<td id="ibtext">  
				 												<center> <a href="#"> <span> BROWSE MEMBERS </span> </a>   </center>
				 											</td>  
						 							 </table>
						 						</td>
				 								<td id="icon_ifriends" >  
				 									 <table border="0"> 
						 							 	<tr>
						 							 		<td> 
				 												<center> <a href="#"> <img id=""   src="fs_folders/images/header/drop community/invite icon.png">  </a>  </center> 
				 											</td>  
				 										<tr>  
				 											<td id="iftext">  
				 												<center><a href="#"> <span> INVITE FRIENDS </span> </a></center>
				 											</td>  
						 							 </table>
				 								</td>
				 								<td id="icon_ginspiration" >  
				 									<table border="0"> 
						 							 	<tr>
						 							 		<td> 
				 												<center> <a href="#"> <img id=""   src="fs_folders/images/header/drop community/inspiration-icon.png">  </a>  </center> 
				 											</td>  
				 										<tr>  
				 											<td id="igtext">  
				 												<center> <a href="#"> <span> GET INSPIRATION </span> </a></center> 
				 											</td>  
						 							 </table>
				 								</td>
				 								<td id="icon_ddrip" >  
				 									<table border="0"> 
						 							 	<tr>
						 							 		<td> 
				 												<center> <a href="#"> <img id=""   src="fs_folders/images/header/drop community/blog-icon.png">  </a>  </center> 
				 											</td>  
				 										<tr>  
				 											<td id="idtext">  
				 												<center> <a href="#"> <span> THE DAILY DRIP (OUR BLOG)</span> </a></center>
				 											</td>  
						 							 </table>
				 								</td>
				 		 				 	<tr>
						 				</table> 
						 			</div>

						 			<div id="participate_dd_container"  onmouseover="header_dropdown ( '#header-link-text-2' , '#b01e23' , '.header-link-underline-2' , 'visible' )" onmouseout="header_dropdown ( '#header-link-text-2' , '#284372' , '.header-link-underline-2' , 'hidden' )"  > 
						 				<div id="participate_handle"> 
						 					<span>  <!-- PARTICIPATE --> </span>
						 					<!-- <img src="fs_folders/images/header/drop info/handle.png"> -->
						 				</div>
						 				

						 				<table id="pddc_leftT" border="0"   cellpadding="0" cellspacing="0"> 
						 				 	<tr>  	
						 				 		<td id="t1" style="visibility:hidden"                                           >  <span >  WHAT CAN I DO   </span> </td> 
						 				 	<tr>  	
						 				 		<td  id="link" > <a href="#"  onclick="fs_popup( 'postarticle' , 'modal-attribute' , 'look-modal-design' ) "     ><span>  POST A LOOK        </span>  </a> </td>
						 				 	<tr>  	
						 				 		<td  id="link" > <a href="rate-look"                                            ><span>  RATE A LOOKS       </span></a> </td>
						 				 	<tr>  	
						 				 		<td  id="link" > <a href="postarticle"                                          ><span>  POST AN ARTICLE    </span></a> </td>
						 				 	<tr>  	
						 				 		<td  id="link" > <a href="#"                                                    ><span>  READ AN ARTICLE    </span></a> </td>
						 				 	<tr>  	
						 				 		<td  id="link" > <a href="#"                                                    ><span>  POST MEDIA         </span></a> </td>
						 				 	<tr>  	
						 				 		<td  id="link" > <a href="#"                                                    ><span>  VIEW MEDIA         </span></a> </td>
						 				 </table>


			 

						 				<div id="pddc_look_container" >  
							 				<table id="pddc_look_containertt1" border="0"  cellpadding="0" cellspacing="0" > 
							 					<tr>
							 						<td id="pddc_t1"> 
							 							<span> WHAT CAN I DO  </span>
							 						</td>
							 						<td id="pddc_t2"> 
							 							<span>TRENDING NOW </span>
							 						</td>
							 						<td id="pddc_t3"> 
							 							<!-- <span> TOP POST </span> -->
							 						</td>
						 					</table> 
						 				

							 				<table id="pddc_look_img_t"  border="0" > 
							 					<tr>  
								 					<td> 
									 					<table id="top_lookt" border="0" >  

									 						<tr>  
									 							<td> 
									 								<img src="fs_folders/images/header/drop participate/top-look.png">
									 							</td>
									 						<tr>  
									 							<td> 
									 								<span> THIS IS THE TOP LOOK UPLOADED </span> 
									 							</td>
									 					</table>
								 					</td>
								 					<td> 
									 					<table id="top_articlet" border="0" >  
									 						<tr>  
									 							<td> 
									 								<img src="fs_folders/images/header/drop participate/top-article.png">
									 							</td>
									 						<tr>  
									 							<td> 
									 								<span> THIS IS THE TOP ARTICLE UPLOADED </span> 
									 							</td>
									 					</table>
								 					</td>
								 					<td> 
									 					<table id="top_mediat" border="0" >  
									 						<tr>  
									 							<td> 
									 								<img src="fs_folders/images/header/drop participate/top-media.png">
									 							</td>
									 						<tr>  
									 							<td> 
									 								<span> THIS IS THE TOP MEDIA UPLOADED </span> 
									 							</td>
									 					</table>
								 					</td> 
							 				</table>
						 				</div> 


						 				<div id="right_tags_container"> 
						 					<table border="0" cellpadding="0" cellspacing="0"> 
						 						<tr>  
						 							<td> <span id="top_tags">TOP TAGS </span>  </td>
						 						<tr>  
						 							<td id='tags_Desc_ctd'>  
						 							 	 <table id="top_look_tags"> 
						 							 	 	<tr>  
						 							 	 		<td> <span id="tags_title">  Looks </span> </td>
						 							 	 	<tr>  
						 							 	 		<td> 
						 							 	 			<span id="tags_desc">   
						 							 	 				#green #cotton #floral #100 <br>
						 							 	 				#green #cotton #floral #100 <br>
						 							 	 				#green #cotton #floral #100 <br>
						 							 	 			</span> 
						 							 	 		</td>
						 							 	 </table>
						 							 	 <table id="top_look_tags"> 
						 							 	 	<tr>  
						 							 	 		<td> <span id="tags_title">  Looks </span> </td>
						 							 	 	<tr>  
						 							 	 		<td> 
						 							 	 			<span id="tags_desc">   
						 							 	 				#green #cotton #floral #100 <br>
						 							 	 				#green #cotton #floral #100 <br>
						 							 	 				#green #cotton #floral #100 <br>
						 							 	 			</span> 
						 							 	 		</td>
						 							 	 </table>
						 							 	 <table id="top_look_tags"> 
						 							 	 	<tr>  
						 							 	 		<td> <span id="tags_title">  Looks </span> </td>
						 							 	 	<tr>  
						 							 	 		<td> 
						 							 	 			<span id="tags_desc">   
						 							 	 				#green #cotton #floral #100 <br>
						 							 	 				#green #cotton #floral #100 <br>
						 							 	 				#green #cotton #floral #100 <br>
						 							 	 			</span> 
						 							 	 		</td>
						 							 	 </table>
						 							</td>
						 					</table> 
						 				</div>
						 			</div>  
						 		</div> 
						 		 
						 	<!-- arrow up when mouse is over the footer -->

						 		<div id="fs-arrow-up-container" >
						 			 <div  id="fs-arrow-up" > 
<!--						 			 	<img src="--><?php //echo "$this->genImgs/arrow up.png" ?><!--" title='move up' onclick="fs( 'arrow-up' )"  />-->
                                            <img
                                                 onclick="fs( 'arrow-up' )"
                                                 id="scroll-top-button"
                                                 class="scroll-top-button"
                                                 src="fs_folders/images/details/top-button.png"
                                                 onmousemove=" mousein_change_button ( '#scroll-top-button' , 'fs_folders/images/details/top-button_mouse_over.png' )"
                                                 onmouseout="mouseout_change_button (  '#scroll-top-button'  , 'fs_folders/images/details/top-button.png' )"
                                             />
						 			 </div>
						 		</div>



					</div>	 	 
					<?php  
					if (false) 
					{
						switch ( $header_page ):
							case 'home':  
							    /* 
									$this->dialog( 
										array(
											'style'=>'top: 35px; left: 700.5px; display: none; position: absolute; z-index: 125;',
											'title'=>'this is the title',
											'description'=>'this is the descriptionthis is the descriptionthis is the descriptionthis is the description',
											'type'=>'popover', 
											'id_present'=>'popover_1',
											'id_next'=>'popover_2' 
										) 
									);  
									$this->dialog( 
										array(
											'style'=>'top: 85px; left: 285.5px; position: absolute; z-index: 125; display: none;',
											'title'=>'this is the title',
											'description'=>'this is the descriptionthis is the descriptionthis is the descriptionthis is the description',
											'type'=>'popover', 
											'id_present'=>'popover_2',
											'id_next'=>'popover_3' 
										) 
									);  
									$this->dialog( 
										array(
											'style'=>'top: 85px; left: 312.5px; position: absolute; z-index: 125; display: none;',
											'title'=>'this is the title',
											'description'=>'this is the descriptionthis is the descriptionthis is the descriptionthis is the description',
											'type'=>'popover', 
											'id_present'=>'popover_3',
											'id_next'=>'popover_4' 
										) 
									);  
									$this->dialog( 
										array(
											'style'=>'top: 85px; left: 345px; position: absolute; z-index: 125; display: none;',
											'title'=>'this is the title',
											'description'=>'this is the descriptionthis is the descriptionthis is the descriptionthis is the description',
											'type'=>'popover', 
											'id_present'=>'popover_4',
											'id_next'=>'popover_5' 
										) 
									); 
									$this->dialog( 
										array(
											'style'=>'top: 85px; left: 372.5px; position: absolute; z-index: 125; display: none;',
											'title'=>'this is the title',
											'description'=>'this is the descriptionthis is the descriptionthis is the descriptionthis is the description',
											'type'=>'popover', 
											'id_present'=>'popover_5',
											'id_next'=>'popover_6' 
										) 
									); 
									$this->dialog( 
										array(
											'style'=>'top: 85px; left: 424.5px; position: absolute; z-index: 125; display: none;',
											'title'=>'this is the title',
											'description'=>'this is the descriptionthis is the descriptionthis is the descriptionthis is the description',
											'type'=>'popover', 
											'id_present'=>'popover_6',
											'id_next'=>'popover_7' 
										) 
									); 
									$this->dialog( 
										array(
											'style'=>'top: 85px; left: 460.5px; position: absolute; z-index: 125; display: none;',
											'title'=>'this is the title',
											'description'=>'this is the descriptionthis is the descriptionthis is the descriptionthis is the description',
											'type'=>'popover', 
											'id_present'=>'popover_7',
											'id_next'=>'popover_8' 
										) 
									); 
									$this->dialog( 
										array(
											'style'=>'top: 85px; left: 510px; position: absolute; z-index: 125; display: none;',
											'title'=>'this is the title',
											'description'=>'this is the descriptionthis is the descriptionthis is the descriptionthis is the description',
											'type'=>'popover', 
											'id_present'=>'popover_8',
											'id_next'=>'popover_9' 
										) 
									); 
									$this->dialog( 
										array(
											'style'=>'top: 85px; left: 545px; position: absolute; z-index: 125; display: none;',
											'title'=>'this is the title',
											'description'=>'this is the descriptionthis is the descriptionthis is the descriptionthis is the description',
											'type'=>'popover', 
											'id_present'=>'popover_9',
											'id_next'=>'popover_10' 
										) 
									);   
									*/
								break; 
							case 'profile': 
								break; 
							default: 
								break;
						endswitch;  	
					} 
				endif;?>

<link rel="stylesheet" type="text/css" href="fs_folders/gen_css/signin.css" >
<div class="header-dropdown-main-container" id='header-dropdown-look'   >
    <?php require('fs_folders/dropdown/dropdown_php_file/header-dropdown.php'); ?>
</div>