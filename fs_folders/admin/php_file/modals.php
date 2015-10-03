<?php    
 	$mno1  = 133;
 	echo "<div style='color:black;display:none' >";  

 		# get url info 

 			// echo " username ".$_GET['user_name']; 
		 	//  $response = $mc->url( array('type'=>'get-dash-value' , 'url'=> $mc->url( array('type'=>'get-full-url') ) ) );    
			// $member['username']  = ( !empty($response[0]) ) ? str_replace(' ', '' , basename($response[0]).PHP_EOL ) : null ;  // get username fashionsponge.com/jesus-activity => username = jesus 
			// $member['tab1']      = ( !empty($response[1]) ) ? $response[1] : null ;    // get first tab after username-tab or ex: jesus-activity => tab = activity 

 			// $url 			    = explode('-',$_GET['user_name']); 
 			// $member['username'] = $url[0]; 
 			// $member['tab1']     = (!empty($url[1])) ? $url[1] : 'activity' ;   
 			// $member['tab2']     = (!empty($url[2])) ? $url[2] : null ;   
 			// $member['tab3']     = (!empty($url[3])) ? $url[3] : null ;     

			// echo "<BR> USER NAME  = $member[username]  <BR> "; 
			// echo " USER tab1  = $member[tab1]   <BR> "; 
			// echo " USER tab2  = $member[tab2]   <BR> "; 
			// echo " USER tab3  = $member[tab3]   <BR> "; 

			// echo " mno = $mno <br> ";    
			// echo " mno from username ".$mc->get_mnobyusername( $member['username'] );

	 	# get username  

		 	// if ( !empty($member['username']) ) {  $mno1 = intval($mc->get_mnobyusername( $member['username'] ) );   } else { $mno1  = 133; } 
		  	  

		 	// echo " mno1 = $mno1  <br> "; 



		# select tab loaded 
  			$member['tab1'] = 'latest'; 

		 	$member['tab_load'] = $mc->get_tab_load_init( 
		 		array( 
		 			'tab'=>'get-tab-to-loaded' , 
		 			'mno1'=>$mno1 , 
		 			'type'=>$member['tab1'],
		 			'page'=>'admin'
		 		)  
		 	); 
		 	echo $member['tab_load'];  

		# get information  
		 	// echo $mc->get_username_by_mno( $mno1 ); 
		 	// echo " mno1 $mno1"; 


			// $uinfo            = $mc->get_user_info_by_id( $mno1 );
			// $uacc             = $mc->get_user_account_by_id( $mno1  ); 
			// $memFsInfo        = $mc->get_user_full_fs_info( $mno1  );   
			// $opercentage      = $memFsInfo['opercentage'];   
			// $tfollowers       = $memFsInfo['tfollowers'];
			// $tfollowing       = $memFsInfo['tfollowing'];
			// $otrating         = $memFsInfo['otrating'];

			// $modal['table_name'] = 'fs_members'; 
		 // 	$modal['table_id']   =  $mno1; 

		 

			 
			// $_SESSION['mno1'] = 134  
			// $mno1 = 133;   
			// $user_total_percentage  = rand(90,97); 
			// $user_total_rating      = rand(90,97); 
			// $user_total_friends     = rand(90,97); 
			// $user_total_followers   = number_format($tfollowers); 
			// $user_total_following   = number_format($tfollowing); 
			// $user_total_look_percentage  = rand(90,97);
			// $user_total_look_star  = 4;
			// $user_total_look_views  = rand(90,97);
			// $user_total_look_drip   = rand(90,97);   
			// $user_total_look_share  = array( 
			//  	'overallsharetotal' => rand(100,200) ,
			//  	'facebook' => rand(100,200) ,  
			//  	'twitter' => rand(100,200) ,   
			//  	'tumblr' => rand(10,200) ,  
			//  	'pinterest' => rand(100,200) ,  
			//  	'google+' => rand(100,200) ,  
			//  	'stumbleupon' => rand(100,200) ,  
			//  	'email' => rand(100,200)   
			// );     

			// $fn = $uinfo[0]['lastname'];
			// $ln = $uinfo[0]['firstname']; 
			// $nn = $uinfo[0]['nickname']; 
			// $aboutme = $uinfo[0]['aboutme']; 
			// $fullname =  $ln.' '.$nn.' '. $fn;   

			// $education = $uinfo[0]['studied_at'].' '.$uinfo[0]['studied_with'].', '.$uinfo[0]['studied_graduate_date']; 
			// $location =  $uinfo[0]['city'].', '.$uinfo[0]['country'];    
  
			$user_total_lookuploaded = count($mc->retreive_specific_user_all_looks( $mno1 ));    
		  	// $mno = $_SESSION['mno'] = 133;     
		  	// $mc->add_user_profile_view( $mno  , $mno1 ,  $mc->date_time );     
		  	$mppno = $mc ->member_profile_pic_query( array('mno'=>$mno1  , 'type'=>'get-latest-mppno' ) );   
		  	$total['activity']          = $mc->fs_activity( array( 'type'=>'get-tactivity'  ) );
		  	$total['looks']             = $mc->posted_modals_postedlooks_Query(  array(  'postedlooks_query'=>'get-all-tlook' )  );  
		  	$total['followers']         = $mc->get_total_follower( $mno1 ); 
		  	$total['following']         = $mc->get_total_following( $mno1 );   	  
		  	$total['favorites']         = count( selectV1( '*', 'fs_favorite_modals', array('mno'=>$mno1) ) );                      
		  	$total['articles']          = count($mc->fs_postedarticles( array(  'aticle_type'=> 'select', 'limit_start'=>0, 'limit_end'=>10000,  'where'=>"mno > 0" )) );  
		  	$total['media']             = 0; 
		  	$total['comment']           = 0; 
		  	$total['comment_made']      = 0; 
		  	$total['comment_recieved']  = 0;  
		  	$total['member']  			= count(select_v3(  'fs_members' ,  '*',  " mno > 0 "  ) );      
		  	$total['flag']  			= count(select_v3(  'fs_flag' ,   '*' , 'flno > 0') );     
		  	$total['rating']            = 200; 
		# set view and add
		   	// $mc->view(  
		   	// 	array(
		   	// 		'table_name'=>$modal['table_name'],
		   	// 		'table_id'=>$modal['table_id'],
		   	// 		'mno'=> $mno,
		   	// 		'type'=> 'add-view'
		   	// 	)
		   	// );   



	echo "</div>"; 
	?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head> 
		<?php  $mc->fs_popup_container_and_response( );  ?>   

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
		<div id="profile-wrapper" > 
			<div id="profile-container" > 
				<table id="profile-container-table" border="0" cellpadding="0"  cellspacing="0" >
					<tr>  
						<td id="profile-header" >  
							<table style="float:right; margin-right:10px; display:none " >
								<tr> 
									<td> 
										<select>
									 		<option> most active </option>
									 		<option> just joined </option>
									 	</select>
									</td>
									<td> 
										<input type="text" placeholder='search member' />
									</td>
							 	
						 	</table>

						</td>
					<tr> 
						<td id="profile-body" > 
							<table id="profile-body-content" border="0" cellpadding="0" cellspacing="0" >  
								<tr>  
									<td id="profile-body-content-activities">   
										<table id="profile-body-content-activities-table" border="0" cellspacing="0" cellpadding="0" > 
											<tr>  
												<td id="profile-body-content-activities-table-menu" >   
													<div id="profile-main-menu-wrapper" >  
														<table id="profile-body-content-activities-table-menu-table" border="0" cellpadding="0" cellspacing="0" width="auto" > 	
															<tr> 
																<td id="profile-body-content-activities-table-menu-history" style="padding-left:0px;"  > <span> HISTORY </span> </td>
															<tr>  
																<td id="profile-body-content-activities-table-menu-activity"  class="profile-texttab"  onclick="profile_change_tab ( 'latest'    , '#profile-body-content-activities-table-menu-activity span'  , '#profile-tab-underline-activity div'  , 'profile-tab-loader-activity div img'     , '<?php echo $mno1; ?>'  , 'admin' , event  )" > <span> ACTIVITY   <span style='font-size:12px' >(<?php echo number_format($total['activity']); ?>)</span></span> </td>  
																<td id="profile-body-content-activities-table-menu-blogs"     class="profile-texttab"  onclick="profile_change_tab ( 'blogs'     , '#profile-body-content-activities-table-menu-blogs span'     , '#profile-tab-underline-blogs div'     , 'profile-tab-loader-blogs div img'        , '<?php echo $mno1; ?>'  , 'admin' , event  )" > <span> ARTICLES   <span style='font-size:12px' >(<?php echo number_format($total['articles']); ?>)</span></span> </td> 
																<td id="profile-body-content-activities-table-menu-looks"     class="profile-texttab"  onclick="profile_change_tab ( 'looks'     , '#profile-body-content-activities-table-menu-looks span'     , '#profile-tab-underline-looks div'     , 'profile-tab-loader-looks div img'        , '<?php echo $mno1; ?>'  , 'admin' , event  )" > <span> LOOKS      <span style='font-size:12px' >(<?php echo number_format($total['looks']); ?>)</span></span> </td>
																<td id="profile-body-content-activities-table-menu-media"     class="profile-texttab"  onclick="profile_change_tab ( 'media'     , '#profile-body-content-activities-table-menu-media span'     , '#profile-tab-underline-media div'     , 'profile-tab-loader-media div img'        , '<?php echo $mno1; ?>'  , 'admin' , event  )" > <span> MEDIA      <span style='font-size:12px' >(<?php echo number_format($total['media']) ; ?>)</span></span> </td>
																<td id="profile-body-content-activities-table-menu-comments"  class="profile-texttab"  onclick="profile_change_tab ( 'comments'  , '#profile-body-content-activities-table-menu-comments span'  , '#profile-tab-underline-comments div'  , 'profile-tab-loader-comments div img'     , '<?php echo $mno1; ?>'  , 'admin' , event  )" > <span> COMMENTS   <span style='font-size:12px' >(<?php echo number_format($total['comment']); ?>)</span></span> </td>   
																<td id="profile-body-content-activities-table-menu-member"    class="profile-texttab"  onclick="profile_change_tab ( 'member'    , '#profile-body-content-activities-table-menu-member span'    , '#profile-tab-underline-member div'    , 'profile-tab-loader-member div img'       , '<?php echo $mno1; ?>'  , 'admin' , event  )" > <span> MEMBER     <span style='font-size:12px' >(<?php echo number_format($total['member']); ?>)</span></span> </td>   
																<td id="profile-body-content-activities-table-menu-flag"      class="profile-texttab"  onclick="profile_change_tab ( 'flag'      , '#profile-body-content-activities-table-menu-flag span'      , '#profile-tab-underline-flag div'      , 'profile-tab-loader-flag div img'         , '<?php echo $mno1; ?>'  , 'admin' , event  )" > <span> FLAG       <span style='font-size:12px' >(<?php echo number_format($total['flag']); ?>)</span></span> </td>   
																<td id="profile-body-content-activities-table-menu-rating"    class="profile-texttab"  onclick="profile_change_tab ( 'rating'    , '#profile-body-content-activities-table-menu-rating span'    , '#profile-tab-underline-rating div'    , 'profile-tab-loader-rating div img'       , '<?php echo $mno1; ?>'  , 'admin' , event  )" > <span> RATING     <span style='font-size:12px' >(<?php echo number_format($total['rating']); ?>)</span></span> </td>   
															<tr>  
																<td id="profile-tab-underline-activity"   class="profile-underline" > <div>  </div>  </td>
																<td id="profile-tab-underline-blogs"      class="profile-underline" > <div>  </div>  </td> 
																<td id="profile-tab-underline-looks"      class="profile-underline" > <div>  </div>  </td>
																<td id="profile-tab-underline-media"      class="profile-underline" > <div>  </div>  </td>
																<td id="profile-tab-underline-comments"   class="profile-underline" > <div>  </div>  </td>  
																<td id="profile-tab-underline-member"     class="profile-underline" > <div>  </div>  </td>
																<td id="profile-tab-underline-flag"       class="profile-underline" > <div>  </div>  </td>  
																<td id="profile-tab-underline-rating"     class="profile-underline" > <div>  </div>  </td>  
															<tr> 
																<td id="profile-tab-loader-activity"      class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div> </td>
																<td id="profile-tab-loader-blogs"         class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td> 
																<td id="profile-tab-loader-looks"         class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td>
																<td id="profile-tab-loader-media"         class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td>
																<td id="profile-tab-loader-comments"      class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td>   
																<td id="profile-tab-loader-member"        class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td>
																<td id="profile-tab-loader-flag"          class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td>   
																<td id="profile-tab-loader-rating"          class="profile-loader"    > <div> <center> <?php $mc->image( array( 'type'=>'loader' , 'style'=>'visibility:hidden;height:10px;' ) ); ?>  </center></div>  </td>   
														</table>  
													</div> 
													<div id="profile-sub-menu-wrapper" >   

														<div id="profile-comment-sub-tabs" >
															<table border="0" cellpadding="0" cellspacing="0"   >
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
															</table>  
														</div>  
														<div id="profile-member-sub-tabs" >
															<table border="0" cellpadding="0" cellspacing="0"   >
																<tr> 
																	<td> 
																		<select id="modal-member-sub-query" onchange="profile_change_tab ( 'member-subdiv-dropdown'    , '#modal-member-sub-query'    , '#profile-tab-underline-member div'    , 'profile-tab-loader-member div img'       , '<?php echo $mno1; ?>'  , 'admin' , event  )" >
																			<option value="order by mno asc" >Most Active</option>
																			<option value="order by mno desc" >Just Joined</option>
																		</select>	 
																	</td>
																	<td style="padding-left:10px;" > 
																	 	<input id="modal-member-sub-search"  type="text" placeholder='search here'  onkeyup="profile_change_tab ( 'member-subdiv-search'    , '#modal-member-sub-search'    , '#profile-tab-underline-member div'    , 'profile-tab-loader-member div img'       , '<?php echo $mno1; ?>'  , 'admin' , event )" />
																	</td>
															</table>  
														</div>  
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
													<hr>  
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