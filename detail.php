<?php   
 	@setcookie( 'plno' , (!empty($_GET['id'])) ? $_GET['id'] : $_SESSION['table_id']  ,  time()+3600*24 ); 
   if (empty($page_viewer)){ 
    	require ("fs_folders/php_functions/connect.php");
		require ("fs_folders/php_functions/function.php");
		require ("fs_folders/php_functions/library.php");
		require ("fs_folders/php_functions/source.php");
		require ("fs_folders/php_functions/myclass.php");   
		require ('fs_folders/php_functions/Database/post.php');
		$database = new Database();
      	$post = new Post();
		$mc = new myclass();  
	    $ri = new resizeImage ();  	  	    
	    $database->connect();


    }  
    echo " <div style='display:none' > ";   
		    if($_GET['id'] = helper::get_table_id($_GET['id'],$_SESSION['table_id'])){if(!$_GET['id']){$mc->go("/");}unset($_SESSION['table_id']);}
		    $_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
		 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );    
 	   		header_remove(); 
  
    		# INITIALIZE 
	    		echo "<br><BR><BR><BR><BR>";  
			 	$nno 	              = ( !empty($_GET['nno']) ) ? intval($_GET['nno']) : 0 ;   
			 	$table_id             = ( !empty($_GET['id'] ) ) ? intval($_GET['id']) : 0 ;  
			 	$table_name           = 'fs_postedarticles';   
				$modal['table_id']    = $table_id;
				$modal['table_name']  = $table_name;     
			# UPDATE NOTIFICATION AS VIEWED   
 
	 		# GET THE SPECIFIC MODAL INFO
			    $modal['modal'] = $mc->fs_postedarticles( 
			    	array( 
				      	'aticle_type'=> 'select',
				      	'limit_start'=>0,
				      	'limit_end'=>1, 
				      	'orderby'=> 'artno desc', 
				      	'where'=>"artno = $table_id"  
				    ) 
			    );    
			    $modal['mno']  = $modal['modal'][0]['mno'];	

			# GET MORE MODALS
		    $modal['modal_more'] = $mc->fs_postedarticles( 
		    	array( 
			      	'aticle_type'=> 'select',
			      	'limit_start'=>0, 
			      	'limit_end'=>30, 
			      	'orderby'=> 'artno desc',
			      	'where'=>"mno = $modal[mno]" 
			    ) 
		    );
		    // print_r($modal['modal_more']); 
		
			# GET SPECIFIC MODAL COMMENT


			# get first latest comment by cno
			  	$modal['comments'] =  $mc->posted_modals_comment_Query (
			  		array(  
					    'table_name'=>$table_name,
					    'table_id'=>$table_id, 
					    'orderby'=>'cno asc',
					    'limit_start'=>0,
					    'limit_end'=> 10, 
					    'comment_query'=>'get-comment-modal'   
				  	) 
			  	);  

		  	# get total comment
			  	$modal['comments_all'] = $mc->posted_modals_comment_Query (
			  		array(  
					    'table_name'=>$table_name,
					    'table_id'=>$table_id, 
					    'orderby'=>'cno asc',
					    'limit_start'=>0,
					    'limit_end'=> 1000, 
					    'comment_query'=>'get-comment-modal'   
				  	)   
			  	);   
			  	$modal['comments_len'] = count( $modal['comments_all'] );  

			# get next prev  
		
			  	$modal['nextprev'] = $mc->db_result_next_prev(  $modal['table_name']    , $modal['table_id'] , $modal['modal_more'] , 'all' ); 

			  	// $mc->print_r1( $modal['modal_more']);  
			  	// $modal['next'] 
			  	// $modal['prev'] 
			  	// $mc->print_r1( $modal['nextprev']);  
			  	// echo " total comments are $modal[comments_len]     <br> "; 
			  	// $mc->print_r1($modal['modal'] );   
				// $mc->print_r1( $modal['modal_more'] ); 

			# SET SESSION  

			  	$_SESSION['modal_more']  = $modal['modal_more']; 
			  	$_SESSION['nextprev']    = $modal['nextprev']; 
			  	$_SESSION['modal']       = $modal['modal']; 
			   
			# get image src 
			  	$modal['src']  = $mc->image( 
				    array(
				        'table_name'=>$modal['table_name'],
				        'table_id'=>$modal['table_id'],
				        'type'=>'get-default-image-src',
				        'size'=>'detail' 
			      	)
			 	);


			  	echo " this is the main image src $modal[src]  <br> ";	 

			# MODAL DISPLAYED  



				$modal['prev']                              = $modal['nextprev']['prev']; 
				$modal['next']                              = $modal['nextprev']['next']; 
				$modal['next']                              = $modal['nextprev']['next']; 
			    $modal['prev']                              = $modal['nextprev']['prev']; 


			  
			    $modal['type']                              = $modal['modal'][0]['type'];
			    $modal['source_item']                       = $modal['modal'][0]['source_item']; 
			    $modal['title']                             = $modal['modal'][0]['title']; 
			    $modal['description']                       = $modal['modal'][0]['description']; 
			    $modal['keyword']                           = $modal['modal'][0]['keyword']; 
			    $modal['category']                          = $modal['modal'][0]['category']; 
			    $modal['topic']                             = $modal['modal'][0]['topic']; 
			    $modal['source_url']                        = $modal['modal'][0]['source_url']; 
			    $modal['source_item']                       = $modal['modal'][0]['source_item']; 
			    $modal['extention']                         = $modal['modal'][0]['extention']; 
			    $modal['tshare']                            = $modal['modal'][0]['tshare']; 
			    $modal['tdrip']                             = $modal['modal'][0]['tdrip']; 
			    $modal['tfavorite']                         = $modal['modal'][0]['tfavorite'];  
			    $modal['tcomment']                          = $modal['modal'][0]['tcomment'];  
			    $modal['trating']                           = $modal['modal'][0]['trating']; 
			    $modal['tpercentage']                       = $modal['modal'][0]['tpercentage']; 
			    $modal['tview']                             = $modal['modal'][0]['tview']; 
			    $modal['active']                            = $modal['modal'][0]['active']; 
			    $modal['date']                              = $modal['modal'][0]['date'];    
			    $modal['modal_style']                       = $mc->lookdetails_set_size_of_the_look( $modal['src'] , $ri ); 
			    $modal['modalowner']                        = $modal['modal'][0]['date'];      
			    $modal['current']                           = $table_id;  
			    $modal['mno']                               = $mc->get_modal_owner( $table_name , $table_id );  
			    $modal['modalownername']                    = $mc->get_full_name_by_id( $modal['mno'] );  
			    $modal['kind'] 								= 'ARTICLE';
			    $modal['position']                          = 1;
			    $modal['total']                             = 30;
			    $modal['view_footer_id']                    = 'lf_div_container';
			    $modal['thumbsUp']                          = 'look-white-thumb.png';
				$modal['thumbsDown']                        = 'look-white-down-thumb.png';
				$modal['stat_rated']                        = 'look not rated';
				$modal['stat_dripted']                      = 'look not dripted';
				$modal['stat_favorited']                    = 'look not favorited';
				$modal['headermssg']                        = 'SUCCESSFULLY FAVORITED'; # this is for success message popup
				$modal['contentmssg']                       = 'This Look is now on your favorite list.'; # this is for success message popup  
				$modal['src_img_drip']                      = "look-icon-drip.png";   
				$modal['src_img_favorite']                  = "look-icon-favorite.png"; 
				$modal['src_img_share']                     = "look-icon-share.png";  
				$modal['src_img_flag']         			    = "modal-flag-dot.png";//"modal-flag.png";  
				$modal['src_img_main'] 						= ""; 


							// $modal['src_img_flag']        = "large-flag-red.png"; 

		    #USER OWNER MODAL 
	 
			    $user['user']                               = $mc->get_user_full_fs_info( $modal['mno'] );     
			    $user['trating']                            = $user['user']['otrating']; 
			    $user['tfollower']                          = $user['user']['tfollowers']; 
			    $user['following']                          = $user['user']['tfollowing'];  
			    $user['tlook']                              = $user['user']['tlooks']; 
			    $user['tpercentage']                        = $user['user']['opercentage']; 
			    $user['username']                           = $user['user']['username']; 
			    $user['tarticle']                           = $user['user']['tarticle'];  
			    $user['profile_tab']  						= 'articles';
		  
			  	

				// echo " username ".$user['username'] ;
				  //   $next = $modal['nextprev']['next']; 
				  //     $prev = $modal['nextprev']['prev'];   
			 	// $mc->print_name_looktitle_look_desc_for_share( $lookOwnerMno , $plno ,  $modal['title'] , $modal['description'] );   
			    // echo  'image src = '.$modal['src']." style modal image ". $modal['modal_style'].'<br>';  
				// $mc->print_look_details_look_owner_header( $mno , $mno1 , $plno , $plno1  , false ,  $lookOwnerMno , $lookOwnerName , $opercentage , $date_ , $user_total_rating , $user_total_followers , $user_total_following , $user_total_lookuploaded );   
	 
			# set view and add
			   	$mc->view(  
			   		array(
			   			'table_name'=>$modal['table_name'],
			   			'table_id'=>$modal['table_id'],
			   			'mno'=> $mno,
			   			'type'=> 'add-view'
			   		)
			   	); 

			#check if already thumbs up or down
				$modal['response'] = $mc->posted_modals_rate_Query( array(  'mno'=>$mno,  'table_name'=>$modal['table_name'] , 'table_id'=>$modal['table_id'],  'rate_query'=>'get-user-rated-type'  )  );    
				if ( $modal['response'] == true ): 
					$modal['stat_rated'] =  'look already rated'; 
					if ( $modal['response'] == 'like') {
						$modal['thumbsUp'] = 'look-red-thumbs.png';
					} 
					if ( $modal['response'] == 'dislike') { 
					   $modal['thumbsDown'] = 'look-red-thumb-down.png';
					}
				endif;   
			#set points color   
				$modal['response_drip'] =  $mc->fs_drip_modals_Query (  
					array(      		     
					    'limit_start'=>0, 
					    'limit_end'=>1,
					    'query_where'=>"table_id = $modal[table_id] and mno = $mno",  
					    'query_order'=>'dmno asc', 
					    'query_drip'=>'get-all-user-dripped' 
					)
				);   
				if (!empty( $modal['response_drip'] ) ) {
					$modal['src_img_drip'] = "look-icon-drip-selected.png";  
				} 
				$modal['response_favorite'] =  $mc->fs_favorite_modals_Query (   
					array(      		     
					    'limit_start'=>0, 
					    'limit_end'=>1,
					    'query_where'=>"table_id = $modal[table_id] and mno = $mno", 
					    'query_order'=>'fmno asc', 
					    'query_favorite'=>'get-all-user-favorite' 
					)
				); 
				if (!empty( $modal['response_favorite'] ) ) { 
					$modal['src_img_favorite'] = "look-icon-favorite-selected.png";  
				} 
				$response = $mc->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $modal[table_id] and table_name= 'fs_postedarticles' and mno = $mno "  )  );   
				if ( !empty($response) ) {
					  $modal['src_img_flag']   = "large-flag-red.png";
				}  
			# set status of owner or not for the user not allow to rate , drip and favorite the modal
 
				if ( $modal['mno'] == $mno ): 				 

					$modal['stat_rated']	 =  'modal owner'; 
					$modal['stat_dripted'] 	 =  'modal owner'; 
					$modal['stat_favorited'] =  'modal owner';  
				endif;  
			/* 
			*  set view more for the article link  
			*/ 
			$more = $mc->look_with_more( $modal['table_id'] , $modal['source_url'] , 'fs_postedarticles' ); // set more..
			page::set_url_for_modal_details($modal['table_id'],'article',$modal['topic'],$modal['date'],$modal['title']); // set url of the page 
			// $modal['source_url'] = strip_tags($modal['source_url']);
			// echo " <br><br><br>this is the me  url ".$modal['source_url'].'<br>' ; 
			// echo " click $more  to show popup <br> ";



			/** get article attribute */  

      			    $post_attr = $post->get_post("table_id = $table_id and table_name = 'fs_postedarticles'");   
      			    $alt =  (!empty($post_attr[0]['alt'])) ? $post_attr[0]['alt'] : "";  
 

	echo "</div>"; 
?>	  
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!-- new plugin  -->
			<script type="text/javascript" src='fs_folders/js/jquery-1.7.1.min.js'> </script>
			<script type="text/javascript" src='fs_folders/js/function_js.js'></script>
		<!-- new plugin  -->


		<!-- google plus -->
		<!-- 
			<meta property="og:title" content="this is the title "/>
			<meta property="og:description" content="this is the desc "/>
			<meta property="og:image" content="https://simplesharebuttons.com/wp-content/uploads/2014/08/simple-share-buttons-logo-square.png"/> 
		 --> 
	    <script src="http://connect.facebook.net/en_US/all.js"></script>
		<?php   
			$mc->header_attribute( 
 				 $modal['title'].'-'.$modal['modalownername'],
 					$modal['description']
 			);   
 			if ( $mno != 136) { 
 				$mc->login_popup( $mno , ( !empty($_GET['welcome']) ) ? $_GET['welcome'] : null );   
 			}
 			else{
 				$mc->login_popup( $mno ,  'login' ) ;  
 			}  
 		?>   
		<!-- new home --> 
			<link rel="stylesheet" type="text/css" href="fs_folders/index_home/home_css/home.css">
		<!-- end home --> 
		<!-- new lookdetails -->

			<script type="text/javascript" src='fs_folders/fs_lookdetails/lookdetails_js/lookdetails_ajax.js'></script>
			<script type="text/javascript" src='fs_folders/fs_lookdetails/lookdetails_js/lookdetails_query.js'></script>
			<link rel="stylesheet" type="text/css" href='fs_folders/fs_lookdetails/lookdetails_style/lookdetails.css'>

		<!-- end lookdetails --> 
		<div style="display:none" > 
			<div id="plno"      ><?php echo $modal['table_id']; ?></div> 			
			<div id="lookName"  ><?php echo $modal['title']; ?></div> 	 
			<div id="webDesc"   ><?php echo $webDesc; ?></div> 	
			<div id='lookOwnerName'><?php echo $modal['modalownername']; ?></div> 
		</div>     
		<?php 

			// $mc->header_attribute( 
	 		// " $modal[title]-$modal[modalownername]-Fashion Sponge" , 
	 		// $modal['description'], 
	 		// "OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration "
	 		// 	);   

			$mc->fs_popup_container_and_response( 'display:none' );    

		?>
	</head>

	<body onload="modal_thumbnail( 'fs_postedarticles' , '<?php echo $modal['table_id']; ?>' , 'small' , 'modal-thumbnail-loader' , 'load-thumbnail' , 'modal-detail' )"  itemscope itemtype="http://schema.org/Product"   > 
		<?php  

 		 	$mc->share_modal_dropdown( 
 		 		array(
 		 			'type'=>'pageinfo-to-retrieved-social-share', 
 		 			'table_name'=>$modal['table_name'], 
 		 			'table_id'=>$modal['table_id'], 
 		 			'title'=> $modal['title'], 
 		 			'description'=>$modal['description'] 
 		 		) 
 		 	);   
 		 	
			if ( $mno == 136 ) {    
			 	// require('fs_folders/fs_popUp/popUp_php_file/popupinvite.php');  
			}    
			$mc->image_mouseover_view(
				"../../../",
				$mc->article_home
			);   
			$mc->plugins( 
				"google analytic", 
				"lookdetails" 
			);   
			include_once("fs_folders/google_analytics/analyticstracking.php");      


		?>	 
		<div id='lookdetails-res' style="position:fixed; display:none; margin-left:790px;    font-size:11px;  font-wieght:bold; height:auto; width:200px; background-color:#000; color:white"> 
			res ult here
		</div>

		<!-- <div id='header_wrapper1'> 
		</div> -->
		<!-- <table border="0"> 
			<tr>  
				<td>  -->  

			 		<div id='lookdetails_wrapper' >   
				 		<div id='lookdetails_body_container'>  
					 		<div id='lookdetails_header'   >   
				 				<?php     
								// require("fs_folders/API/fb.php");  
								    $mc->fs_header( 
										$mno, 
										'width:1011px;margin-left:-1px;',
										'width:1010px; border-left:1px solid none;border-right:1px solid #e2e2df;',
										'width:100%',
										'margin-left:72px;margin-top:3px;',
										'margin-left:35px;',
										'details'
									 );   
				 					if ( !empty($mno)) {

										echo "<span style='display:none' id='isLog'>logIn</span>"; 
									}
				 				?>
				 					<!-- new comment -->
				 						<!--  I put it here because the header icons dropdown not working when i will put this in the top -->
										<link rel="stylesheet" type="text/css" href="fs_folders/fs_lookdetails/style1.css">
										<link rel="stylesheet" type="text/css" href="fs_folders/fs_lookdetails/look_comment_items/style.css"> 
									<!-- end comment -->   
				 			</div>  
							<table id='lbc_main_table' border="0" >
								<tr> 
									<td id="banner_view_and_look_view" >  
									 	<table id="banner_view_and_look_view_table_container" border="0"  cellpadding="0" cellspacing="0" > 
									 		<tr>   
									 			<td> 
									 				<?php
									 				// echo "test1";
										 				// echo " plno =  $plno <br>  looks <br>";
									 					// print_r($looks);
														// $mc->arrow_left_right_pressed_for_next_prev( $plno ,  $looks );  
										            ?> 
									 			</td>
									 	    <tr>
												<td id='lbc_ads_banner' >  
													<table id="lbc-body-header" border="0" cellpadding="0" cellspacing="0"> 	
														<tr>  
															<td>
																<span id='feed'>  
																	<!-- ADVERTISEMENT -->
																</span> 
															</td>
														<tr> 
															<td id="ads-banner" >  
																<center>
																	<a href="r?loc=http://theschoolofstyle com/" target="_blank" >
																		<img id='a-b' src="fs_folders/images/banner/new-sos-banner1.png" >
																	</a>
																</center> 
															</td>
														<tr> 
															<td id='next_prev_td'>   

																<a href="feed"  style='text-decoration:none' target="_parent" >
																	<span id='return_to_feed' title='return to feed'  > < < RETURN TO FEED </span>
																</a> 
																<div id='lookdetails-next-prev' >  
																	<table>
																		<tr> 
																			<td> 
																				<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"modal-content-loader-prev" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
																			</td>
																			<td> 
																				<span id='prev'   onclick="modal_thumbnail ( '<?php echo $modal['table_name']; ?>'  , '<?php echo $modal['prev']; ?>'  ,  'original'  , 'modal-content-loader-prev' , 'generate-specific-modal-detail' , 'modal-detail' )"   > 
																					PREVIOUS  
																				</span> 
																			</td>
																			<td style="padding-left:15px; padding-right:15px;" > 
																				<!-- <div id='next-prev-separator' > 
																					| 
																				</div>     -->
																				<div id="look-details-profile-look-owner-header-gray-bar"  style="margin-top:10px;" > 		 
									 											</div> 
																			</td>
																			<td> 
																				<span id='next' onclick="modal_thumbnail ( '<?php echo $modal['table_name']; ?>'  , '<?php echo $modal['next']; ?>'  ,  'original'  , 'modal-content-loader-next' , 'generate-specific-modal-detail' , 'modal-detail' )"   > 
																					NEXT 
																				</span>
																			</td> 
																			<td> 
																			<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"modal-content-loader-next" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
																			</td>
																	</table> 
																</div>
															</td>
														<tr>
															<td> 
																<div id='next_hr' >
																	
																</div>
																 
															</td>
														<tr>  
															<td id='look_title' > 
																<div id='look-title-div-container' > 
																	<span>   
																		<?php   
																			//  $modal['title'] =  wordwrap( $modal['title'], 50, "<br />", true);
																			echo  $modal['title'];  
																			?>
																	</span>
																</div>  
															</td>
													</table> 
												</td> 
											<!-- look view -->
											<tr>  
												<td id='lbc_look_view' >   
													<table id='lbc_look_view_tc' border="0" cellpadding="0" cellspacing="0" > 
														<tr>  
															<td id='look_view_header' >   
																<div style="margin-top:-40px;border:1px solid none; " >
																	<?php    
																	  	$mc->print_look_details_look_owner_header(  
																			array(
																				'table_name'	          => $modal['table_name'],           // table name
																				'mno'                     => $mno, 		                    // user logon 
																				'mno1'                    => $modal['mno'], 		        // user viewer
																				'table_id'                => $modal['current'], 	        // current modal id 
																				'table_id_1'              => $modal['next'], 		        // next modal id 
																				'inside_modals'           => false, 		                // boolean 
																				'lookOwnerMno'            => $modal['mno'], 	            // mno owner of the modal
																				'lookOwnerName'           => $modal['modalownername'], 	    // modal owner name
																				'opercentage'             => $modal['tpercentage'],         // over all percentage of one look
																				'date_'                   => $modal['date'], 		        // date modal uploaded
																				'user_total_rating'       => $modal['trating'], 		    // trating of the sepcific modal
																				'user_total_followers'    => $user['tfollower'], 		    // tfollower of the owner modal
																				'user_total_following'    => $user['following'], 		    // tfollowing of the owner modal
																				'user_total_lookuploaded' => $user['tarticle'],   	    	    // tlook of the owner modal
																				'link_edit' 			  => "#" 							// link edit
																			) 
																		);  
																	?> 
																</div> 
															</td>
														<tr>  
															<td id='look_view_img_td' style="height:450px;  " >   
																<center> 
																	<div id="load_look_picture_and_tags"  >
																		<?php if (  $modal['type'] == 'image'):  ?>  
																		<?php $article_modal_style = 'margin-top: -60px;width:889px'; ?>
					      													<img alt="<?php echo $alt; ?>"  src="<?php echo "$modal[src]" ?>" id='look_view_img' style='position:relative;width:100%;<?php echo $modal['modal_style']; ?>' />  
					      												<?php  else: ?>  
					      													<iframe alt="<?php echo $alt; ?>" src= "<?php echo $modal['source_item']; ?>?autoplay=1&showinfo=0&rel=0"  style='width:100%; height:390px; margin-top:-60px; border-radius:5px 5px 0px 0px' frameborder='0'  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					      												<?php 
					      													$modal['view_footer_id']  = 'lf_div_container1';
					      												endif; 
					      												?>  
				      												</div>  
																</center>  
															</td> 
														<tr>  
															<td id='lf_img_view_td'    >  
															 	<div id= "<?php echo $modal['view_footer_id']; ?>"  style=' border-radius:0px 0px 5px 5px; <?php echo "$article_modal_style"; ?> ' >    

																	<?php 
															 			if ( $modal['mno'] != $mno ) {
															 				// $mc->print_choose_votes_version2( $mno , $plno , $plstyle );  
															 			} 
															 		?> 

															 		<center>
																 		<table id="lfdc_t2" style="margin-top:20px;   " border="0" cellpadding="0" cellspacing="0"  > 
																 			<tr>   
																 				<td id='percentage'  > 
																 					<span title='(<?php echo $modal['tpercentage']; ?>%) Article Rating'  id='tpercentage'style='font-size:20px;color:#fff' ><?php echo $modal['tpercentage']; ?></span><span style='font-size:15px;color:#fff' > %</span>
																 				</td> 
																 				<td id="modal-likethis" >
																 					<div>LIKES THIS</div> 
																 				</td>
																 				<td style="padding-right:20px;" >   
																 					<table style=" width:40px;" border="0"  > 
							  										 	 				<tr>  
							  										 	 					<td> 
							  										 	 						<img src="<?php echo "  $mc->genImgs/$modal[thumbsUp]"; ?>" title='like'          style='height:18px;'      class='postedlooks-like<?php echo $modal['table_id']; ?>'      onclick="posted_modals_rate_Query ( '0' , '<?php echo $mno; ?>' , '<?php echo $modal['table_name']; ?>' , 'like' , '<?php echo $modal['table_id']; ?>' , 'insert' , 'rate'  , '.postedlooks-like<?php echo $modal['table_id']; ?>' , 'look-red-thumbs.png' , '#stat-look-rated<?php echo $modal['table_id']; ?>' , '<?php echo $modal['category']; ?>' )" > 
							  										 	 					</td> 
							  										 	 					<td> 
							  										 	 						<div style="margin-top:6px;" > 
							  										 	 							<img src="<?php echo " $mc->genImgs/$modal[thumbsDown]"; ?>" title='dislike'   style='height:18px;'     class='postedlooks-dislike<?php echo $modal['table_id']; ?>'   onclick="posted_modals_rate_Query ( '0' , '<?php echo $mno; ?>' , '<?php echo $modal['table_name']; ?>' , 'dislike' , '<?php echo $modal['table_id']; ?>' , 'insert' , 'rate' , '.postedlooks-dislike<?php echo $modal['table_id']; ?>' , 'look-red-thumb-down.png' , '#stat-look-rated<?php echo $modal['table_id']; ?>' , '<?php echo $modal['category']; ?>' )"  > 
							  										 	 						</div>
							  										 	 					</td>
						  										 	 				</table>  
 
																 				</td>
																 				<td id='ldmtd' title="(<?php echo $modal['trating'] ?>) Total Rates" >    
																 					<?php   
																 						$mc->print_specific_look_ratings(  
																	 						array(
																	 							'trating'=>$modal['trating'],
																								'table_name'=>$modal['table_name'],
																								'table_id'=>$modal['table_id'],
																								'category'=>$modal['category']
																	 						)
																	 					);   
																 					?>  
																 				</td> 
																 				<td id='ld_eyes' >  
																	 				<img src="<?php echo $mc->path_icons;?>/Views-Icon.png" title="views" > 
																 				</td>
																 				<td> 
																 					<span id='ttext' onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'views' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'VIEWS ( <?php echo "$modal[tview]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )"  >  
																 						<?php echo $modal['tview']; ?> 
																 					</span>
																 				</td> 
																 				<td id='total_arrow' > 	 
																 					<!-- <img src="<?php echo $mc->path_icons;?>/Drip-Icon.png"  title="drips"   class="modal-drip-img<?php echo $modal['table_id'] ?>"   onclick="drip_popup_show( '<?php echo $mno; ?>' , '<?php echo $modal['table_name'] ?>' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['title']; ?>' , 'Article' , '<?php echo $modal['mno'] ; ?>' , '<?php echo ".modal-drip-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/look-icon-drip-selected.png"; ?>' , '<?php echo $modal['table_id']; ?>' )" >  -->
																 					<img src="<?php echo "$mc->genImgs/$modal[src_img_drip]"; ?>"  title="drips"   class="modal-drip-img<?php echo $modal['table_id'] ?>"   onclick="drip_popup_show( '<?php echo $mno; ?>' , '<?php echo $modal['table_name'] ?>' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['title']; ?>' , 'Article' , '<?php echo $modal['mno'] ; ?>' , '<?php echo ".modal-drip-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/look-icon-drip-selected.png"; ?>' , '<?php echo $modal['table_id']; ?>' , '#stat-look-dripted<?php echo $modal['table_id']; ?>'  )" >  
																 				</td>																																																						  
																	 			<td > 																																  
																	 				<span id='ttext'  class="modal-tdriped<?php echo $modal['table_id']; ?>" onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'dripped' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'DRIPPED ( <?php echo "$modal[tdrip]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )" >  
																	 					<?php echo  $modal['tdrip']; ?> 
																	 				</span> 
																 				</td>
																 				<!-- <td id='total_heart' > 
																					<img src="<?php echo $mc->path_icons;?>/favorite-icon.png" title="Favorite">	
																 					<span id='ttext' > 9999+</span>
																 				</td> -->
																 				<td id='ld_star_with_cross'  > 
																 					<!-- <img src="<?php echo $mc->path_icons;?>/favorite-icon.png" class='modal-favorite-img<?php echo $modal['table_id']; ?>'   title="favorite" onclick="favorite_posting( '<?php echo $mno;  ?>' , '<?php echo "$modal[table_name]" ?>' , '<?php echo $modal['table_id'];  ?>' , '<?php  echo $modal['headermssg' ] ?>' ,'<?php echo $modal['contentmssg'] ?>'  , 'Article' , '<?php echo $modal['mno'];  ?>' , '<?php echo ".modal-favorite-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/look-icon-favorite-selected.png"; ?>'  )"  >  -->
																 					<img src="<?php echo "$mc->genImgs/$modal[src_img_favorite]"; ?>" class='modal-favorite-img<?php echo $modal['table_id']; ?>'   title="favorite" onclick="favorite_posting( '<?php echo $mno;  ?>' , '<?php echo "$modal[table_name]" ?>' , '<?php echo $modal['table_id'];  ?>' , '<?php  echo $modal['headermssg' ] ?>' ,'<?php echo $modal['contentmssg'] ?>'  , 'Article' , '<?php echo $modal['mno'];  ?>' , '<?php echo ".modal-favorite-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/look-icon-favorite-selected.png"; ?>' , '<?php echo $modal['tfavorite']; ?>' ,'#stat-look-favorited<?php echo $modal['table_id']; ?>'   )"  >  
																 				</td>  
																 				<td style="padding-left:10px;" > 
																	 				<span id='ttext' onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'favorites' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'FAVORITES ( <?php echo "$modal[tfavorite]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )" > 
																	 					<?php echo  $modal['tfavorite']; ?> 
																	 				</span>
																 				</td>   
																 				<td id='ld_square_with_arrow'  > 
																 					<img src="<?php echo $mc->path_icons;?>/share-icon.png" title="share"   onmouseover="share_mouser_over('<?php echo $modal['table_id']; ?>')" onmouseout="share_mouser_out('<?php echo $modal['table_id']; ?>')" >
																 					 
																 				</td>
															 					<td> 
																 					<span id='ttext' > <?php echo $modal['tshare']; ?> </span>
																 				</td> 
																 				
																 				<?php  $mc->print_look_footer_flag_or_edit( $mno , $modal['mno'] , $modal['table_id'] , $modal['table_name']   , $modal['src_img_flag'] , "#" ); ?> 


																 				<?php  if (  $modal['type'] == 'image'): ?> 
																	 				<td id='ld_scope' >
																	 					<a href="z?i=<?php echo $modal['table_id']; ?>&tn=<?php echo $modal['table_name']; ?>"  target="_blank" >
																	 						<img src="<?php echo $mc->path_icons;?>/zoom-icon.png" title="zoom" >
																	 					</a> 	
																	 				</td>  
																 				<?php endif; ?>     
																 				<td id="ld_padding" >  
																 				</td> 

																 				<td id="ld_hide_show" > 
																 					<img style="display:none"  id="rectangle-image-footer-hide" title="hide" onclick="hide_look_foooter_rectangle()"   src="<?php  echo  "$mc->path_icons/hide-icon.png"; ?>" /> 
																 				</td> 
																 			<tr> 
																 				<td>
																 				</td><td>
																 				</td><td>
																 				</td><td>
																 				</td><td>
																 				</td><td>
																 				</td><td>
																 				</td><td> 
																 				</td><td> 
																 				</td><td> 
																 				</td><td>
																 					<!-- dropdowns share --> 
												  										<div style="border:1px solid none;position:absolute" >
												  											<?php   
																		 						$mc->share_modal_dropdown( 
																			 						array(	
																			 							'type'=>'details',
																			 							'table_name'=>$modal['table_name'],
																			 							'table_id'=>$modal['table_id'],
																			 							'id'=>$modal['table_id'],
																			 							'about'=>$modal['description'],
																			 							'name'=>$modal['modalownername'],
																			 							'title'=>$modal['title'],
																			 							'page'=>'detail',  
																			 							'link'=>'',
																			 							'picture'=>''
																			 						)
																			 					);    
																		 					?> 
												  										</div> 
																 				</td><td> 
																 				</td><td> 
																 				</td><td> 
																 				</td><td> 
																 				</td><td>  
																 		</table>

																 		<!-- validator -->
										 								<div id="status-container" style='display:none'   >
								 											<input type="text" value="<?php echo "$modal[stat_rated]"; ?>"       id="stat-look-rated<?php echo $modal['table_id']; ?>"       /> <br>
								 											<input type="text" value="<?php echo "$modal[stat_dripted]"; ?>"     id="stat-look-dripted<?php echo $modal['table_id']; ?>"         /> <br>
								 											<input type="text" value="<?php echo "$modal[stat_favorited]"; ?>"   id="stat-look-favorited<?php echo $modal['table_id']; ?>"    /> <br>
								 										</div> 
															 		</center>    


															 	</div>   
															</td>  
													</table>  
												</td> 
									 	</table> 
									 </td>   <!--  end banner_view_and_look_view -->  
								<tr>  
									<td id='lbc_small_ads'  > 
										<table id='ads_main_table' border="0" cellpadding="0" cellspacing="0"> 
											<tr>  
												<td id='ld_small_ads'> 
													<table  id="ld_ads_table1" border="0"   cellpadding="0" cellspacing="0"  > 
														<tr> 
														 	 
															<td id="about_and_more_by" >
																<span  id='recomended_more_by_t' style='font-size:12px;' > <b> ABOUT THIS "<?php echo strtoupper($modal['category']); ?>" <?php echo $modal['kind']; ?> </b> </span> 
																<table  border="0" cellspacing="0" cellpadding="0" >
																 	<tr>  
															 			<td id="details-about" > 
																			<div><?php echo ucfirst("$modal[description]")." $more" ;  ?></div>  
																		</td> 
																	<tr> 
																		<!-- <td id ="more-by-link-header" >  
																			<span  style='font-size: 12px; font-family:arial ' >    MORE BY </span>  
																			<span id='recomended_name_t' style='font-size: 12px; font-family:arial '> <a href="<?php echo $user['username']; ?>" target='_parent' style="color:#b32727;" > <?php echo  strtoupper($modal['modalownername']); ?> </a> </span> <span id='recomended_bar_t' >|</span>  
																			<span style='font-size:12px;color:#b32727; font-family:arial' > <?php echo "$modal[position] of $modal[total] "; ?>  </span> 
																			<span id='recomended_all_t' style='padding-left:5px;font-size: 12px; font-family:arial' title='all article' > <a href="<?php echo "$user[username]-$user[profile_tab]"; ?>"  style='color:#b32727; ' target='_parent' > ALL ARTICLE >> </a>  </span></span>  
																		</td>  -->
																</table> 
															</td>
														<tr>  
															<td>   
																<!-- thumbnail cotainer  -->
																<table id="res_container_t" border="0" cellspacing="0" cellpadding="0" > 
										                            <tr> 
										                                <td>  
										                                    <div id='body_content'>    
										                                        <div id='res_container'>    
										                                        	<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"modal-thumbnail-loader" , 'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center>  
										                                            <?php 
										                                                $c=0;
										                                                for ($i=0; $i < 15 ; $i++) { // if you change limit here change also the lookdetails_thumbnail in function_js
										                                                    $c++;
										                                                    echo "  
										                                                        <li id='li_res$c'>  
										                                                            <div id='home_res$c' >   
										                                                            </div>
										                                                        </li>
										                                                    ";
										                                                }
										                                            ?>                                      
										                                        </div> 
										                                    </div>    
										                                    <!-- <div id="thumbnail_res" style="position:absolute" > -->
										                                    		<!-- thumbnail res  -->
										                                    <!-- </div> -->
										                                    <!-- <center> <div id='loading'  > <img src="fs_folders/images/attr/loading 2.gif" style="visibility:hidden;height:10px;" > </div></center> -->
										                                </td> 
										                        </table>   
															</td>



													</table>  
												</td>
											<tr>  
												<td id='lookdetails-ads-by-250' style="display:none" >  
												</td> 
										</table>
									</td>
								<tr>  
									<td id='lbc_comments' style="border:1px solid none; height:20px;" >  
										<div  style="border:1px solid none" id="lookdetails-comment-container" >
											<span id='feed'>  FEEDBACK </span> 
											<table id='look_comment_t1' border="0" cellpadding="0" cellspacing="0">  
												<tr>  
													<td id='header_comment_c_td'>
														<table id='comment_love_drip_t' border="0" cellspacing="0"  cellpadding="0" > 
															<tr> 
																<td  id='comment_tabs' > 
																	<span title='comments' >( <?php echo $modal['comments_len']; ?> ) COMMENTS</span> 
																	<hr id='comment_tabs_hr1' >
																</td>
																<td> 
																	<div style="margin-left:20px;margin-top:-17px;" >
																		<?php $mc->print_look_comment_sorting_option( $modal['table_name'] , $modal['table_id'] );  ?> 
																	</div>
																</td> 
														</table> 
													</td>
												<tr>  
													<td id='comment_header_line'> 
														 <div>
														 </div>
													</td> 
												<tr>  
													<td id='comment_content'>   
														<table border="0" >  
															<tr>  
																<td>  
																	<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"modal-comment-loader-test1" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
																</td>
															<tr>
																<td>  
																	<?php   $np = $mc->generate_next_prev_numbers( $modal['comments_len'] , 10 ); ?>  
																	<ul id="look-comment-cotainer-ul" >
																		<li id="comment-top-next-prev" >  
																			<?php  
																				$mc->print_next_prev_numbers(  $np , null , 'detail' , 'loader-down' , array( 'table_name'=>$table_name ,  'table_id'=> $table_id ) ) ;   
																			?>   
																		</li>  
																		<li> 
																			<div style="margin-left:36px; border:1px solid none;" >
																				<ul id='comments_result' class='comments_result' style="border:1px solid none" >  
																				 	<?php  
																				 		$c = 0;
																					 	for ($i=0; $i < count($modal['comments']) ; $i++) { 

																					 		// set background image container white or grey   

																					 		 
															 									if ( $c%2==0 ) {
															 										$background_color  = 'background-color:white;';
															 									}
															 									else {
															 										$background_color  = '';
															 									} 

															 								// function comment 

																					 			$mc->modal_print_comment( $modal['comments'][$i] , null , $background_color );  

																					 		// counter 

																					 			$c++;
																					 	} 
																				 	?>
																				</ul>
																			</div> 
																		</li> 
																	</ul>   
																</td> 
															<tr>
																<td> 
																	<?php 
																		$mc->print_next_prev_numbers(  $np , null , 'detail' , 'loader-down' , array( 'table_name'=>$table_name ,  'table_id'=> $table_id ) ) ;     
																	?>
																</td>
															<tr> 
																<td> 
																	<center><?php $mc->image( array( 'type'=>'loader' , 'id'=>"modal-comment-loader-test2" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> </center> 
																</td>
															<tr>
																<td>   
																	<div id="cmment" >
																		<?php  $mc->modal_comment_send_textarea( $mno , $table_id , $table_name , $table_id  ); ?> 
																	</div>
																	<ul id='comment_sending_result' > 	
																		<!-- look commnet res -->
																	</ul>  
																</td>  
														</table>  
														<div id="footer_res" style="display:none" >
											 				<!-- footer_res -->
											 			</div>
													</td>
												<tr>   
											</table>  
											<td id='comment_post_area'> 
												<!-- comment post  -->
											</td>
							 			</div>   
									</td> 
								<tr> 
									<td id='lbc_footer'>     

										<?php  $mc->fs_footer(  'width:1010px !important;' , 'margin-left:-13px;' );   ?>
									</td>
							</table>		 		 	
						</div>	
				 	</div>  
				 	<!-- end main wrapper -->
		 	<!-- </td> -->
	 	<!-- </table> --> 
	 	<?php $mc->invite_hellobar( $mno );   ?>
	</body>
</html>


