<?php   
	echo "<div style='color:black;display:none' >";    
	$mc->auto_detect_path();   
	$mc->save_current_page_visited( );   
	$_SESSION['mno']     =  $mc->get_cookie( 'mno' , 136 ); 
 	$mno 			     =  $mc->get_cookie( 'mno' , 136 );  
 	
 		# get url info  
 			echo " username ".$_GET['user_name']; 
		 	//  $response = $mc->url( array('type'=>'get-dash-value' , 'url'=> $mc->url( array('type'=>'get-full-url') ) ) );    
			// $member['username']  = ( !empty($response[0]) ) ? str_replace(' ', '' , basename($response[0]).PHP_EOL ) : null ;  // get username fashionsponge.com/jesus-activity => username = jesus 
			// $member['tab1']      = ( !empty($response[1]) ) ? $response[1] : null ;    // get first tab after username-tab or ex: jesus-activity => tab = activity  
 			print_r($_SESSION['url'] ); 
 			$url 			    = $_SESSION['url'];  
 			$member['username'] = $url[0]; 
 			$member['tab1']     = (!empty($url[1])) ? $url[1] : 'activity' ;   
 			$member['tab2']     = (!empty($url[2])) ? $url[2] : null ;   
 			$member['tab3']     = (!empty($url[3])) ? $url[3] : null ;    
 			$c=0;
 			$data['date_uploaded']='';  
			echo "<BR> USER NAME  = $member[username]  <BR> ";
			echo " USER tab1  = $member[tab1]   <BR> ";  
			echo " USER tab2  = $member[tab2]   <BR> ";    
			echo " USER tab3  = $member[tab3]   <BR> ";    
			echo " mno = $mno <br> ";    
			echo " mno from username ".$mc->get_mnobyusername( $member['username'] ); 
	 	# get username 
		 	if ( !empty($member['username']) ) {  $mno1 = intval($mc->get_mnobyusername( $member['username'] ) );   } else { $mno1  = 133; } 
		  	 // $mno1  = 133; 
		 	echo " mno1 = $mno1  <br> ";  
		# select tab loaded  
		 	$member['tab_load'] = $mc->get_tab_load_init( 
		 		array( 
		 			'tab'=>'get-tab-to-loaded' , 
		 			'mno1'=>$mno1 , 
		 			'type'=>$member['tab1'],
		 			'page'=>'profile-tabs'
		 		)  
		 	); 
		 	echo $member['tab_load'];  

		# get information  

		 	// echo $mc->get_username_by_mno( $mno1 ); 
		 	// echo " mno1 $mno1"; 


			$uinfo                         = $mc->get_user_info_by_id( $mno1 );
			$uacc                          = $mc->get_user_account_by_id( $mno1  ); 
			$memFsInfo                     = $mc->get_user_full_fs_info( $mno1  );   
			$opercentage                   = $memFsInfo['opercentage'];   
			$tfollowers                    = $memFsInfo['tfollowers'];
			$tfollowing                    = $memFsInfo['tfollowing'];
			$otrating                      = $memFsInfo['otrating']; 
			$total['tpercentage_article']  = $memFsInfo['tpercentage_article'];
			$total['tpercentage_look']     = $memFsInfo['tpercentage_look'];
		    $total['tpercentage_media']    = $memFsInfo['tpercentage_media'];
			$total['trating_article']      = $memFsInfo['trating_article'];
			$total['trating_look']         = $memFsInfo['trating_look'];
			$total['trating_media']        = $memFsInfo['trating_media']; 
			$modal['table_name']           = 'fs_members'; 
		 	$modal['table_id']             =  $mno1;  




			// $_SESSION['mno1'] = 134  
			// $mno1 = 133;   

			$user_total_percentage  = rand(90,97); 
			$user_total_rating      = rand(90,97); 
			$user_total_friends     = rand(90,97); 
			$user_total_followers   = number_format($tfollowers); 
			$user_total_following   = number_format($tfollowing); 
			$user_total_look_percentage  = rand(90,97);
			$user_total_look_star  = 4;
			$user_total_look_views  = rand(90,97);
			$user_total_look_drip   = rand(90,97);   
			$user_total_look_share  = array( 
			 	'overallsharetotal' => rand(100,200) ,
			 	'facebook' => rand(100,200) ,  
			 	'twitter' => rand(100,200) ,   
			 	'tumblr' => rand(10,200) ,  
			 	'pinterest' => rand(100,200) ,  
			 	'google+' => rand(100,200) ,  
			 	'stumbleupon' => rand(100,200) ,  
			 	'email' => rand(100,200)   
			);      
			$fn = $uinfo[0]['lastname'];
			$ln = $uinfo[0]['firstname']; 
			$nn = $uinfo[0]['nickname']; 
			$aboutme = $uinfo[0]['aboutme']; 
			$fullname =  $ln.' '.$nn.' '. $fn;   

			// $education = $uinfo[0]['studied_at'].' '.$uinfo[0]['studied_with'].', '.$uinfo[0]['studied_graduate_date']; 
			// $location =  $uinfo[0]['city'].', '.$uinfo[0]['country'];    

			 
			$user_total_lookuploaded = count($mc->retreive_specific_user_all_looks( $mno1 ));    
		  	// $mno = $_SESSION['mno'] = 133;     
		  	// $mc->add_user_profile_view( $mno  , $mno1 ,  $mc->date_time ); 

		  	$mppno 						= $mc ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );  
		  	$total['activity']          = count( $mc->get_my_profile_feed_activity( $mno1 ) ); 
		  	$total['looks']             = $mc->posted_modals_postedlooks_Query(  array(  'postedlooks_query'=>'get-tlook', 'mno'=>$mno1 )  );  
		  	$total['followers']         = $mc->get_total_follower( $mno1 ); 
		  	$total['following']         = $mc->get_total_following( $mno1 );   	  
		  	$total['favorite']          = count( selectV1( '*', 'fs_favorite_modals', array('mno'=>$mno1) ) );                      
		  	$total['articles']          = count($mc->fs_postedarticles( array(  'aticle_type'=> 'select', 'limit_start'=>0, 'limit_end'=>10000,  'where'=>"mno =  $mno1" )) );  
		  	$total['media']             = 0; 
		  	$total['comment']           = 0; 
		  	$total['comment_made']      = 0; 
		  	$total['comment_recieved']  = 0;  
 
		  	// retrieved visited user category for article list 

		  		$category['article'] = $mc->fs_member_categories(  
				    array( 
				        'type'=>'select', 
				        'where'=>"mno = $mno1 and table_name = 'fs_postedarticles'",
				        'limit_start'=>0,
						'limit_end'=>100
				    )
			    ); 

		  	// retrieved visited user category for look list 

			    $category['look'] = $mc->fs_member_categories(  
				    array( 
				        'type'=>'select', 
				        'where'=>"mno = $mno1 and table_name = 'postedlooks'",
				        'limit_start'=>0,
						'limit_end'=>100
				    )
			    );
 
		# set view and add


		   	$mc->view(  
		   		array(
		   			'table_name'=>'fs_member_profile_pic',
		   			'table_id'=> $mc->member_profile_pic_query( array('mno'=>$modal['table_id']  , 'type'=>'get-latest-mppno' ) ) ,
		   			'mno'=> $mno,
		   			'type'=> 'add-view'
		   		)
		   	);   

	echo "</div>"; 
	?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head> 
		<?php  
			/*
			echo "
 				<div style='position:absolute' >
	 				<div id='popUp-background'>   
	 					<div id='popUp-background-container' > 
		 					<center>
		 						<div id='popup-more-doing-the-action-loader' >
									<img src='fs_folders/images/attr/loading 2.gif' > 
								</div>  
				 				<div id='popup-response' style='color:white' >    
		 						</div>  
	 						</canter> 
	 					</div>
					</div> 
				</div>
			";
			*/   
			$mc->fs_popup_container_and_response( ); 
			
			$mc->header_attribute( 
 				"$fullname | Fashion Sponge  " , 
 				"$fullname : $aboutme ",
 				"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration "
 			);    
 			
 			if ( $mno != 136) { 
 				$mc->login_popup( $mno , ( !empty($_GET['welcome']) ) ? $_GET['welcome'] : null );   
 			}
 			else{
 				$mc->login_popup( $mno ,  'login' ) ;  
 			}

 			 // 'display:block' 

			$mptno = $mc->member_profile_timeline_query( array('mno'=>$mno1 ,  'type'=>'get-active-timeline-or-default' ) ); 

			// echo " $mptno ";  

			// default-profile-timeline.jpg
 		?>   

 		<script type="text/javascript" src='fs_folders/profile/profile_js/profile_ajax.js' ></script>
 		<script type="text/javascript" src='fs_folders/profile/profile_js/profile_jquery.js' ></script> 
 		<script type="text/javascript" src='fs_folders/js/knob.js' ></script> 
 		
 		<link rel="stylesheet" type="text/css" href="fs_folders/profile/profile_style/profile.css">  

 		<!-- new home -->
			<!-- <link rel="stylesheet" type="text/css" href="fs_folders/index_home/home_css/home.css"> -->
			<link rel="stylesheet" type="text/css" href="fs_folders/index_home/home_css/home.css">
			<link rel="stylesheet" type="text/css" href="fs_folders/modals/latest_modals/modal.css" >
			<!-- <link rel="stylesheet" type="text/css" href="fs_folders/modals/latest_modals/modal.css" > -->
			<script type="text/javascript" src='fs_folders/index_home/home_js/home_ajax.js'> </script>
			<script type="text/javascript" src='fs_folders/index_home/home_js/home_query.js'> </script> 
		<!-- end home -->
	</head>   
	<body onload="<?php echo $member['tab_load']; ?>" >     
		<?php 
			if ( $mno == 136 ) {  
			 	// require('fs_folders/fs_popUp/popUp_php_file/popupinvite.php');  
	 		}  
		?>
		<div id="profile-wrapper" > 
			<div id="profile-container" > 
				<table id="profile-container-table" border="0" cellpadding="0"  cellspacing="0" >
					<tr>  
						<td id="profile-header" > 
							 <?php  
							     
							    $mc->fs_header( 
									$mno, 
									'width:1012px;margin-left:-1px;',
									'width:1009px;',
									'width:100%',
									'margin-left:72px;margin-top:3px;',
									'margin-left:35px;', 
									'profile'
								 );  
							 	// require("testPage1.php");
							 ?> 
						</td>
					<tr> 
						<td id="profile-body" > 
							<table id="profile-body-content" border="0" cellpadding="0" cellspacing="0" >
								<tr> 
									<td id="profile-body-content-banner" st  > 
										<div id="ads-banner" >
											<div style=" margin-top:16px;margin-left:135px; " >   
					 							<a href="r?loc=http://theschoolofstyle com/" target="_blank" >
					 								<img src="fs_folders/images/banner/new-sos-banner1.png" >
					 							</a>	 
				 							</div>
			 							</div>
									</td>
								<tr>  
									<td id="profile-body-content-header" >   
										<table id="look_header_t" border="0" cellpadding="0" cellspacing="0"> 
											<tr>  
												<td style='padding-bottom:20px;' >  
													<table id="look_view_header_attrcontainer_t" border="0" cellpadding="5"  > 
														<tr>  
															<td> 
																<span id='profile_member_div_name' stlye='color:blue' > <?php echo $mc->ucname($fullname); ?>  </span> 
															</td>
															<td id="look_owner_percentage"     > 
																<div style="margin-top:6px;" >
																	<span title='overall percentage for looks and articles' stlye='color:red'  > <?php echo $opercentage; ?>%</span> 
																</div>
															</td>
															<td id="look_owner_total_rating" > 
																<!-- <div id='look-details-profile-look-owner-header-otrating' >
														 			<div id="look-details-profile-look-owner-header-text" >
														 				<?php echo $user_total_rating; ?> RATINGS	
														 			</div> 
														 		</div> --> 
																<img src="<?php echo $mc->genImgs."/Rating-Bubble.png"; ?>" style='margin-top:-2px;'  /> 
																<div style="font-size:12px;font-family:arial;font-weight:normal" title='total rates for both looks and articles' > <?php echo $otrating; ?> RATINGS </div>  
														 	</td>   

														 	<?php if( $mno == $mno1 ): ?>

														 		<?php $mc->print_edit_and_flag_user( $mno , $mno1 );  ?> 

														 	<?php else: ?> 

																<!-- <td id="look_owner_icon_friend"  > <img src="<?php echo $mc->genImgs."/profile-follow.png"; ?>" />   </td>  -->
																<td><?php $mc->print_follow_unfollow( $mno , $mno1 );  ?> </td>  
																<td id="look_followers_text"    style='display:none' > <div style="margin-top:0px;" > FOLLOWERS <?php echo $user_total_followers;  ?> </div> </td>
																<td id="look_forward_slash"     style='display:none' > <div style="margin-top:0px;" > / </div> </td>
																<td id="look_following_text"    style='display:none' > <div style="margin-top:0px;" > FOLLOWING <?php echo $user_total_following;  ?>  </div> </td>
																<td><?php    
												 				  	if ( $mno != $mno1 and $mno != 136 ) {  
																			$u = $mc->get_username_by_mno( $mno1 );  
												 				  			echo "<img src='$mc->genImgs/message.png' onclick=\"chat( 'chat?u=$u' , 'open-new-chat' )\" title='talk to $fullname'  />";

													 				}  ?>
											 				  	</td>	 

											 				  	<?php $mc->print_my_social_sites( $mno , $mno1  ); ?>  
 																<?php $mc->print_edit_and_flag_user( $mno , $mno1 );  ?> 
															<?php endif; ?>													  

													</table> 
												</td>  
										</table>    
									</td>   
								<tr>  
									<td>    
										<!-- 
										<div style="background: url('<?php echo "$mc->profileTimeline_cropped/$mptno"; ?>')" style='border:1px solid red; width:1010px;  height:500px;'   >
											asdasd	
										</div>
										!--> 

										<center> 
											<div style=" background-image: url('<?php echo "$mc->profileTimeline_cropped/$mptno"; ?>')" id='profile-timeline'  > 
												<?php require( "fs_folders/profile/page/profile_timeline_view.php" );  ?>
											</div>  
										</center> 
									</td>   
								<tr>
									<td id="profile-body-content-activities">   
										<table id="profile-body-content-activities-table" border="0" cellspacing="0" cellpadding="0" > 
											<tr>  
												<td id="profile-body-content-activities-table-menu" >   
													<div id="profile-main-menu-wrapper" >  
														<table id="profile-body-content-activities-table-menu-table" border="0" cellpadding="0" cellspacing="0" width="auto" > 	
															<tr> 
																<td id="profile-body-content-activities-table-menu-history" style="padding-left:0px;"  > <span> LATEST </span> </td>
															<tr>  
																<td id="profile-body-content-activities-table-menu-activity"  class="profile-texttab"  onclick="profile_change_tab ( 'latest'    , '#profile-body-content-activities-table-menu-activity span'  , '#profile-tab-underline-activity div'  , 'profile-tab-loader-activity div img'     , '<?php echo $mno1; ?>' , 'profile-tabs' , event , 'no sub tab' 		    ,  'profile-tabs'  )" > <span> ACTIVITY   <span style='font-size:12px' >(<?php echo number_format($total['activity']); ?>)</span></span> </td>  
																<td id="profile-body-content-activities-table-menu-blogs"     class="profile-texttab"  onclick="profile_change_tab ( 'blogs'     , '#profile-body-content-activities-table-menu-blogs span'     , '#profile-tab-underline-blogs div'     , 'profile-tab-loader-blogs div img'        , '<?php echo $mno1; ?>' , 'profile-tabs' , event , '#blog-sub-categories' ,  'profile-tabs' )" > <span> ARTICLES   <span style='font-size:12px' >(<?php echo number_format($total['articles']); ?>)</span></span> </td> 
																<td id="profile-body-content-activities-table-menu-looks"     class="profile-texttab"  onclick="profile_change_tab ( 'looks'     , '#profile-body-content-activities-table-menu-looks span'     , '#profile-tab-underline-looks div'     , 'profile-tab-loader-looks div img'        , '<?php echo $mno1; ?>' , 'profile-tabs' , event , '#look-sub-categories' ,  'profile-tabs' )" > <span> LOOKS      <span style='font-size:12px' >(<?php echo number_format($total['looks']); ?>)</span></span> </td>
																<td id="profile-body-content-activities-table-menu-media"     class="profile-texttab"  onclick="profile_change_tab ( 'media'     , '#profile-body-content-activities-table-menu-media span'     , '#profile-tab-underline-media div'     , 'profile-tab-loader-media div img'        , '<?php echo $mno1; ?>' , 'profile-tabs' , event , 'no sub tab' 			,  'profile-tabs' )" > <span> MEDIA      <span style='font-size:12px' >(<?php echo number_format($total['media']) ; ?>)</span></span> </td>
																<td id="profile-body-content-activities-table-menu-comments"  class="profile-texttab"  onclick="profile_change_tab ( 'comments'  , '#profile-body-content-activities-table-menu-comments span'  , '#profile-tab-underline-comments div'  , 'profile-tab-loader-comments div img'     , '<?php echo $mno1; ?>' , 'profile-tabs' , event , 'no sub tab' 			,  'profile-tabs' )" > <span> COMMENTS   <span style='font-size:12px' >(<?php echo number_format($total['comment']); ?>)</span></span> </td>   															
																<td id="profile-body-content-activities-table-menu-beloved"   class="profile-texttab"  onclick="profile_change_tab ( 'beloved'   , '#profile-body-content-activities-table-menu-beloved span'   , '#profile-tab-underline-beloved div'   , 'profile-tab-loader-beloved div img'      , '<?php echo $mno1; ?>' , 'profile-tabs' , event , 'no sub tab' 			,  'profile-tabs' )" > <span> FAVORITE   <span style='font-size:12px' >(<?php echo number_format($total['favorite']); ?>)</span></span> </td> 
																<td id="profile-body-content-activities-table-menu-followers" class="profile-texttab"  onclick="profile_change_tab ( 'followers' , '#profile-body-content-activities-table-menu-followers span' , '#profile-tab-underline-followers div' , 'profile-tab-loader-followers div img'    , '<?php echo $mno1; ?>' , 'profile-tabs' , event , 'no sub tab' 			,  'profile-tabs' )" > <span> FOLLOWERS  <span style='font-size:12px' >(<?php echo number_format($total['followers']); ?>)</span></span> </td> 
																<td id="profile-body-content-activities-table-menu-following" class="profile-texttab"  onclick="profile_change_tab ( 'following' , '#profile-body-content-activities-table-menu-following span' , '#profile-tab-underline-following div' , 'profile-tab-loader-following div img'    , '<?php echo $mno1; ?>' , 'profile-tabs' , event , 'no sub tab' 			,  'profile-tabs' )" > <span> FOLLOWING  <span style='font-size:12px' >(<?php echo number_format($total['following']); ?>)</span></span> </td>  
															<tr>  
																<td id="profile-tab-underline-activity"   class="profile-underline" > <div>  </div>  </td>
																<td id="profile-tab-underline-blogs"      class="profile-underline" > <div>  </div>  </td> 
																<td id="profile-tab-underline-looks"      class="profile-underline" > <div>  </div>  </td>
																<td id="profile-tab-underline-media"      class="profile-underline" > <div>  </div>  </td>
																<td id="profile-tab-underline-comments"   class="profile-underline" > <div>  </div>  </td>  
																<td id="profile-tab-underline-beloved"    class="profile-underline" > <div>  </div>  </td> 
																<td id="profile-tab-underline-followers"  class="profile-underline" > <div>  </div>  </td> 
																<td id="profile-tab-underline-following"  class="profile-underline" > <div>  </div>  </td>  
															<tr> 
																<td id="profile-tab-loader-activity"      class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div> </td>
																<td id="profile-tab-loader-blogs"         class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td> 
																<td id="profile-tab-loader-looks"         class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td>
																<td id="profile-tab-loader-media"         class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td>
																<td id="profile-tab-loader-comments"      class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td>   
																<td id="profile-tab-loader-beloved"       class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td> 
																<td id="profile-tab-loader-followers"     class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td>
																<td id="profile-tab-loader-following"     class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td>  
														</table>  
													</div> 
													<div id="profile-sub-menu-wrapper"  >     

						 								<table  border="0" cellpadding="0" cellspacing="0" width="100%" >
															<tr> 
																<td>    
																	<div id='profile-sub-left-row' >  
																		<!-- this is the result here. . . .  -->
																	</div>  
																</td>  
																<td style="width:5%" id='sub-right-row'  >   
																	<div id="profile-comment-sub-tabs" class='profile-tab-sub' style='display:none;' > 
																		<!-- <table border="0" cellpadding="0" cellspacing="0"   >
																			<tr>  
																				<td> 
																					<div id="profile-comment-sub-tabs-made" >
																						MADE <span >(<?php echo $total['comment_made']; ?>)</span>	
																					</div> 
																				</td>
																				<td style="padding-left:10px;" > 
																					<div id="profile-comment-sub-tabs-recieved" >
																						RECIEVED <span >(<?php echo $total['comment_recieved']; ?>)</span>	
																					</div> 
																				</td>
																		</table>   --> 
																		<select>
																			<option> COMMENT </option>									<option> COMMENT ( 123 ) </option>	
																			<option> RECIEVED ( 3213 ) </option>
																		</select>   
																	</div>  
																	<div id="profile-blog-sub-tabs" class='profile-tab-sub' style='display:none;' >  
																		<select id="blog-sub-categories" class="profile-option-sub-categories" onchange ="profile_change_tab ( 'blogs'     , '#profile-body-content-activities-table-menu-blogs span'     , '#profile-tab-underline-blogs div'     , 'profile-tab-loader-blogs div img'        , '<?php echo $mno1; ?>' , 'profile-tabs' , event , '#blog-sub-categories' , 'profile-tabs' )" >
																			<option>all articles</option>
																			<?php  
																				for ($i=0; $i < count($category['article']) ; $i++) { 
																 				  	$name = $category['article'][$i]['category'];  
																 					echo "<option>$name</option>";
																 				}
																			?>
										
																		</select> 
																	</div>  
																	<div id="profile-look-sub-tabs" class='profile-tab-sub' style='display:none;' >  
																	 	<select id="look-sub-categories" class="profile-option-sub-categories"  onchange="profile_change_tab ( 'looks' , '#profile-body-content-activities-table-menu-looks span' , '#profile-tab-underline-looks div' , 'profile-tab-loader-looks div img' , '<?php echo $mno1; ?>' , 'profile-tabs' , event, '#look-sub-categories' , 'profile-tabs' )"  >
																			<option>all looks</option>
																			<?php   																	
																				for ($i=0; $i < count($category['look']) ; $i++) { 
																 				  	$name = $category['look'][$i]['category'];  
																 					echo "<option>$name</option>";
																 				}
																			?>
																		</select> 
																	</div>    
																</td>  
														</table>
													</div> 
												</td> 
											<tr>
												<td id="profile-body-content-activities-table-nextprev-top" >   
												</td>
											<tr>
												<td> 
													<center> <div id='loading'  > <img src="fs_folders/images/attr/loading 2.gif" style="visibility:hidden;height:10px;" id='loading_img' > </div></center>
												</td>
											<tr> 
												<td id="profile-body-content-activities-table-modals" >  
				                                	<!-- <div id="res" > res </div> -->
				                            
					                                    <div id='body_content'>    
					                                        <div id='res_container'>    
		                                                        <li id='li_res1'>  
		                                                            <div id='home_res1' >  
		                                                            </div>
		                                                        </li>     
		                                                         <li id='li_res2'>  
		                                                            <div id='home_res2' >  
		                                                            </div>
		                                                        </li>     
		                                                         <li id='li_res3'>  
		                                                            <div id='home_res3' >  
		                                                            </div>
		                                                        </li>   
					                                        </div> 
					                                    </div>   
					                                    <div id="thumbnail_res" style="position:absolute" > 
					                                    </div>
					                                    <br> 
				                                </td>  
				                            <tr> 
												<td> 
												   	<center> <div id='loading'  > <img src="fs_folders/images/attr/loading 2.gif" style="visibility:hidden;height:10px;" id='loading_img' > </div></center>
												</td> 											 
											<tr>
												<td id="profile-body-content-activities-table-nextprev-bottom" >   

												</td>
											<tr>
												<td id="profile-body-content-activities-table-hr" > 
													 <div>
													 	 
													 </div>
												</td> 
										</table> 
									</td>   
							</table> 
						</td> 
					<tr>
						<td id="profile-footer" >  
		 					<?php 
		 						$mc->fs_footer(  'width:1010px !important;' , 'margin-left:-13px;' );   
		 					?>
						</td> 
				</table>
			</div>
		</div> 
		 <?php $mc->invite_hellobar( $mno );   ?>
	</body> 
</html>