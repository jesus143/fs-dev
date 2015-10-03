<?php $page_viewer = "";
    if (empty($page_viewer)) {
    	require ("fs_folders/php_functions/connect.php");
		require ("fs_folders/php_functions/function.php");
		require ("fs_folders/php_functions/library.php");
		require ("fs_folders/php_functions/source.php");
		require ("fs_folders/php_functions/myclass.php");   
		$mc = new myclass();  
	    $ri = new resizeImage ();  	 
    }

        $_GET['id'] = 10;
     	@setcookie( 'plno' , (!empty($_GET['id'])) ? $_GET['id'] : $_SESSION['table_id']  ,  time()+3600*24 );  
    	echo " <div style='display:none' > ";
		if($_GET['id'] = helper::get_table_id((!empty($_GET['id'])) ? $_GET['id'] : null   ,$_SESSION['table_id'])){if(!$_GET['id']){$mc->go("/");}unset($_SESSION['table_id']);}
		$mc = new myclass();  
	    $ri = new resizeImage ();     
	    $mc->save_current_page_visited();    
	  
	
    	# initialize 1 
		 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
		 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );  
		 	// echo " <bR><br><bR><Br>mno ".$_SESSION['mno'];   
		 	// echo " $mno "; 
		 	/* 
			if ( empty($_GET['id'])) { 
				$mc->go("/");   
				$looks        = $mc-> retreive_specific_user_all_looks( $mno  , "order by plno desc " ); 
				$_GET['id']   = $looks[0]["plno"]; 
			}else{   
			} 
			*/        
			echo " get ".$_GET['id'].'<br>';   
			$plno             = $_GET['id'];    
			$plno             = $mc->clean_input( $plno );      
			if ( $mc->look_exist( $plno )  ) {       
			}      
			else{     
				// $mc->go("/");
			}            
			$mc->auto_detect_path();      
		    
		  
			$_SESSION['plno']    = $plno;
//			$plno                = $plno;
			$img                 = "$mc->look_folder_lookdetails/$plno.jpg";
			$modal['table_name'] = 'postedlooks'; 
			$modal['table_id']   =  $plno;  
			$mc->get_visitor_info( 
				"" , 
				"lookdetails page lookid = $plno " , 
				"home" 
			);     
			$nno   = ( !empty($_GET['nno']) ) ? intval($_GET['nno']) : 0 ;    

		# UPDATE NOTIFICATION AS VIEWED 

			if ( $nno  != 0 ) {
				$response =  $mc->posted_modals_notification_Query ( 
					array(      
					  'nno'=>$nno,  
					  'notification_query'=>'set-notification-viewed'  
					) 
				); 
			} 

		# get image src 

		  	$modal['src']  = $mc->image( 
			    array(
			        'table_name'=>$modal['table_name'], 
			        'table_id'=>$modal['table_id'],
			        'type'=>'get-default-image-src',
			        'size'=>'detail' 
		      	)
		 	);  
		  	// echo " this is the src $modal[src] <br> "; 

	 	# initialized 2 

			$li                  = $mc->posted_look_info($_GET['id']);  
			$_SESSION['plno']    = $_GET['id'];
			$date_               = $li['date_']; 
			$lookOwnerMno        = intval($li["lookOwnerMno"]);
			$mno1                = intval($li["lookOwnerMno"]);	 
			$memFsInfo           = $mc->get_user_full_fs_info( $mno1  );   
			$opercentage         = $memFsInfo['opercentage'];  	
			$otrating            = $memFsInfo['otrating'];  
			$user['username']    = $memFsInfo['username'];    
			$user['profile_tab'] = 'looks';   
			$mno 			     = $_SESSION["mno"];
			$lookOwnerName       = $li["lookOwnerName"];  
			$pltags              = $li['pltags'];    
			$plstyle             = $li['style']; 
			$Ttag                = count($li['pltags']);   
			$lookName            = $li["lookName"]; 
			$lookAbout           = $li["lookAbout"];  
			$pltvotes            = $li["pltvotes"]; 
			$trating             = $li["trating"]; 
			$style               = $li["style"]; 

			$pltratings          = number_format( $li["trating"]); 
			$webDesc             = "Fashion Sponge is the easiest & fastest way to: Show your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration."; 
		    $looks               = $mc-> retreive_specific_user_all_looks( $lookOwnerMno , "order by plno desc " ); 
			$next_prev           = $mc->db_result_next_prev( 'postedlooks' , $plno , $looks , 'all' );  
			$total_looks 	     = $mc->get_res_len( $looks );
			$total_show_looks    = $mc->get_total_limit_show( intval( $total_looks ) , 30 );  
			$mem_info            = $mc->get_user_info_by_id( $mno1  ); 
			$tlooks 		     = number_format($mem_info[0]['tlooks']);
			$tratings 		     = number_format($otrating);   /*number_format($mem_info[0]['tratings']); */ 
			$tfollower 		     = number_format($mem_info[0]['tfollower']);
			$tfollowing 	     = number_format($mem_info[0]['tfollowing']);
			$tpercentage 	     = number_format($mem_info[0]['tpercentage']);  
			$lookmodalsstyle     = $mc->lookdetails_set_size_of_the_look( $img , $ri );
		  	// $mc->add_look_view( $plno );    
			$look_countingPos    = $mc->get_modal_position_detail( $plno , $looks , 'plno' );  
			$article_link        = $li['article_link'];   
			$more                = $mc->look_with_more( $plno , $article_link );  
			$tlc                 = $mc->get_total('plcno','posted_looks_comments','plno',$_SESSION['plno']);   

			$modal['table_name']				        = 'postedlooks';
			$modal['table_id']  				        = $plno; 
			$modal['mno']                               = $mno1;
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
			$modal['src_img_favorite']                  = "look-icon-favorite-detail-yellow.png"; 
			$modal['src_img_share']                     = "look-icon-share.png";   
			$modal['src_img_flag']         			    = "modal-flag-dot-white.png";//"modal-flag.png";  
			$modal['tdrip']                             =  $li["tdrip"];  
			$modal["title"]  							=  $li["lookName"];   
			$modal['tfavorite']                         =  $li["tfavorite"]; 

		# set view and add

		   	$mc->view(  
		   		array(
		   			'table_name'=>$modal['table_name'],
		   			'table_id'=>$modal['table_id'],
		   			'mno'=> $mno,
		   			'type'=> 'add-view'
		   		)
		   	);  

		# check if already thumbs up or down

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

		# set points color  

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
				// $modal['src_img_drip'] = "look-icon-drip-selected.png";  
				$modal['src_img_drip'] = "look-icon-drip.png";   
				
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
				$modal['src_img_favorite'] = "look-icon-favorite-detail-yellow.png";  
			}   
			$response = $mc->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $plno and table_name= 'postedlooks' and mno = $mno "  )  );   
			if ( !empty($response) ) {
				  $modal['src_img_flag']        = "large-flag-red.png";
			}  
		# set status of owner or not for the user not allow to rate , drip and favorite the modal 
			if ( $modal['mno'] == $mno ): 				 
				$modal['stat_rated']	 =  'modal owner'; 
				$modal['stat_dripted'] 	 =  'modal owner'; 
				$modal['stat_favorited'] =  'modal owner';    
			endif;  
	    $keyword = modal::conver_cetegory_to_keyword($pltags); 
        $title=page::set_url_for_modal_details($modal['table_id'],'look',$style,$date_,$lookName); // set url of the page 
	echo "</div>";  







	// echo " $keyword "; 
	// $lookName = 'Mauricio (member) has 7 people who signed up using the referral link.There are currently1000 people on the waiting list who has no association to any member on the';  
	// echo " this is the len of the string ".strlen($lookName);   
?>	  
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>  
	    <script src="http://connect.facebook.net/en_US/all.js"></script>
		<?php  
			$mc->header_attribute( 
 				"$lookName-$lookOwnerName" , 
 				$lookAbout,
 				$keyword
 			);  
 			if ( $mno != 136) { 
 				$mc->login_popup( $mno , ( !empty($_GET['welcome']) ) ? $_GET['welcome'] : null );   
 			}
 			else{
 				$mc->login_popup( $mno ,  'login' ) ;  
 			}
 			// 	echo "
 			// 		<div style='position:absolute' >
	 		// 			<div id='popUp-background'>    
				// 				<div id='popup-response' style='color:white' > 
			// 		</div>   

			// 		</div> 
			// 	</div>
			// ";    
			$mc->fs_popup_container_and_response( );  
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
			<div id="plno"      ><?php echo $plno; ?></div> 			
			<div id="lookName"  ><?php echo $lookName; ?></div> 	 
			<div id="webDesc"   ><?php echo $webDesc; ?></div> 	
			<div id='lookOwnerName'><?php echo $lookOwnerName; ?></div> 
		</div>    
	</head>
	<body onload='lookdetails_loaded( <?php echo $lookOwnerMno; ?> )' itemscope itemtype="http://schema.org/Product"   >  
		<?php    

 		 	 $mc->share_modal_dropdown( 
 		 		array(
 		 			'type'=>'pageinfo-to-retrieved-social-share', 
 		 			'table_name'=>$modal['table_name'], 
 		 			'table_id'=>$modal['table_id'], 
 		 			'title'=> $lookName, 
 		 			'description'=>$lookAbout
 		 		) 
 		 	);    
			if ( $mno == 136 ) {    
			 	// require('fs_folders/fs_popUp/popUp_php_file/popupinvite.php');  
			}   
			$mc->image_mouseover_view(
				'fs_folders/images/uploads/posted looks/thumbnail',
				'fs_folders/images/uploads/posted looks/home'
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
				<td> --> 
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
										'lookdetails'
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
							<table id='lbc_main_table' >
								<tr> 
									<td id="banner_view_and_look_view"  >  
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

																<a href="feed" style='text-decoration:none' target="_parent" >
																	<span id='return_to_feed' title='return to feed'  > < < RETURN TO FEED </span>
																</a> 
																<div id='lookdetails-next-prev' > 
																	<table>
																		<tr> 
																			<td> 
																				<span id='prev'  onclick="load_look_picture_and_tags( '<?php echo $next_prev['prev']; ?>')"   > 
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
																				<span id='next'  onclick="load_look_picture_and_tags( '<?php echo $next_prev['next']; ?>')" > 
																					NEXT 
																				</span>
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
																			// $lookName =  wordwrap($lookName, 50, "<br />", true);
																			echo $lookName;  
																			?>
																	</span>
																</div>
															</td>
													</table> 
												</td> 
											<!-- look view -->
											<tr>  
												<td id='lbc_look_view' >  
														<?php   
															$user_total_followers = $tfollower;
															$user_total_following = $tfollowing; 
														    $user_total_percentage   = $tpercentage;
															$user_total_rating       = $tratings ;   
															$user_total_lookuploaded = count($mc->retreive_specific_user_all_looks( $lookOwnerMno )); 
															$user_total_look_percentage  = $li['tpercentage'];
															$user_total_look_star  = 0;
															$user_total_look_views  = $li['tlview'];
															$user_total_look_drip   = 0;  
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
															$mc->print_name_looktitle_look_desc_for_share( $lookOwnerMno , $plno , $lookName , $lookAbout ); 
														?> 
													<table id='lbc_look_view_tc' border="0" cellpadding="0" cellspacing="0" > 
														<tr>  
															<td id='look_view_header' >   
																<div style="margin-top:-40px;border:1px solid none; " >
																	<?php  
																		$plno1 = $next_prev['next'];  
																	    $mc->print_look_details_look_owner_header(   
																	    	array(
																	    		'mno'                     => $mno,
																	    		'mno1'                    => $mno1,
																	    		'table_id'                => $plno,
																	    		'table_id_1'              => $plno1,
																	    		'inside_modals'           => false,
																	    		'lookOwnerMno'            => $lookOwnerMno,
																	    		'lookOwnerName'           => $lookOwnerName,
																	    		'opercentage'             => $user_total_look_percentage,
																	    		'date_'                   => $date_,
																	    		'user_total_rating'       => $trating,
																	    		'user_total_followers'    => $user_total_followers,
																	    		'user_total_following'    => $user_total_following,
																	    		'user_total_lookuploaded' => $user_total_lookuploaded,
																	    		'link_edit'  			  => "post-look-label?kooldi=$plno&type=u"
																	    	) 
																	    );   
																	?> 
																</div> 
															</td>
														<tr>  
															<td id='look_view_img_td' style=" height: 500px;  padding-bottom: 17px; ">   
																<center> 
																	<div id="load_look_picture_and_tags"  >
																		<?php  
																			// print_r($pltags); 
																			// if (empty($pltags)) {
																			//  	 $db_Ttagged=0;
																			// }
																			// else { 
																			//  	 $db_Ttagged=count($pltags);
																			// } 
																			echo " 
																			<div class='pos' style='display:block'> ";
																				$c=0;
																				for ($i=0; $i < count($pltags) ; $i++) {  
																					$plt_color = $pltags[$i]["plt_color"];	
																					$plt_brand = $pltags[$i]["plt_brand"];
																					$plt_garment = $pltags[$i]["plt_garment"];
																					$plt_material = $pltags[$i]["plt_material"];
																					$plt_pattern = $pltags[$i]["plt_pattern"];
																					$plt_price = $pltags[$i]["plt_price"]; 
																					$plt_purchased_at = $pltags[$i]["plt_purchased_at"];  
																					// echo " pattern $plt_pattern <br>";
																				    $plt_color        = ( empty($plt_color)                   ) ? "NONE" :  strtoupper($plt_color);
																				 	$plt_brand        = ( $plt_brand        == "BRAND"        ) ? "NONE" : strtoupper($plt_brand); 
																				 	$plt_garment      = ( $plt_garment      == "GARMENT"      ) ? "NONE" : strtoupper($plt_garment);
																				 	$plt_material     = ( $plt_material     == "MATERIAL"     ) ? "NONE" : strtoupper($plt_material);
																				 	$plt_pattern      = ( $plt_pattern      == "PATTERN"      ) ? "NONE" : strtoupper($plt_pattern);
																				 	$plt_price        = ( $plt_price        == "PRICE"        ) ? "NONE" : strtoupper($plt_price);
																				 	$plt_purchased_at = ( $plt_purchased_at == "PURCHASED AT" ) ? "NONE" : strtoupper($plt_purchased_at);
																					// echo " 
																					// $plt_color <br>
																					// $plt_brand <br>$next_prev[next]
																					// $plt_garment <br>
																					// $plt_material <br>
																					// $plt_pattern <br>
																					// $plt_price <br>
																					// $plt_purchased_at <br>
																					// "; 
																					//counter starts from 1 
																						$c++;
																					//retrieve position z and y from database. 
																						/*
																					    $left = $pltags[$i]["plt_x"]+175;
															 							$top = $pltags[$i]["plt_y"]-15;
															 							*/

															 							$left = $pltags[$i]["plt_x"];
															 							$top = $pltags[$i]["plt_y"]+85;

															 							// echo " x =  $left and y = $top <br> ";
																				 	// set position for the red circle tag. 
																			            // $db_Ttagged = 4;

																			            if ( $c < 10)   {  
																			                $number_single  = "  margin-left: 11px;  "; 
																			                $style =  $number_single; 
																			            } else {  
																			                $number_double  = " margin-left: 7px; ";
																			                $style =  $number_double; 
																			            }  

																			     		$circle_tag_stye = "margin-top:".$top."px; margin-left:".$left."px; visibility:hidden"; 	
																			     		
																			     		 echo " <div id='tag-circle' class='tag-circle-$c'   onmouseout='circle_tag_mouseout(\".tag-circle-$c\")' onmouseenter='circle_tag_mouseover(\".tag-circle-$c\")' style='$circle_tag_stye'  >
																				     		 <img id='tag-circle-img' src='$mc->genImgs/tag-red-circle.jpg' /> 
																				     		 <div id='tag-circle-value' style='$style'  > $c </div>  
																			     		 </div>";  
																					 	// $circle_tag_stye = "margin-top:".$top."px; margin-left:".$left."px;"; 	
																					 	// echo " <span id='tag-circle' class='tag-circle-$c'  onmouseout='circle_tag_mouseout(\".tag-circle-$c\")' onmouseenter='circle_tag_mouseover(\".tag-circle-$c\")' style='$circle_tag_stye' >
																					 	// $c
																					 	// </span>";	 
				  																	//set bubble arrow asd left
																					 	if ( $left < 430 ) {
																					 		// echo "arrow right<br>";
																					 		$tag_arrow = "left"; 
																					 	}else if ( $left >= 430 ) { 
																					 		// echo "arrow left<br>";
																					 		$tag_arrow = "right"; 
																					 	}
																				 	// add top and left for TAG DIV CONTAINER POSITION
																					 	$top-=50;
																					 	$left+=20; 
																					 	$tag_circle_tag_div = "margin-top:".$top."px; margin-left:".$left."px;"; 
																					 	$tn = array("ZERO","ONE","TWO","THREE","FOUR","FIVE","SIX","SEVEN","EIGHT","NINE","TEN","ELEVEN","TWELVE","THIRTEN","FOURTEN","FIFTHTEN"); 
																				 	
																				 	//  set url  
																					 	// www.google.com
																					 	// https://www.google.com
																					 	// http://www.google.com
																					 	// google.com 
																					 	// $url = "www.google.com";
																					 	// $url = "https://www.google.com";
																					 	// $url = "http://www.facebook.com"; # working link   
																					 	$url = str_replace("."," ",$plt_purchased_at); 
																				 	// if the bubble tag arrow is left



																					 	if ( $tag_arrow == "left") {
																						 	 echo "  
																						 	 	<div id='tag-circle-tag-div' class='tag-circle-$c-tag-div' onmouseenter='circle_tag_mouseover(\".tag-circle-$c-tag-div\")' style='$tag_circle_tag_div' >
																						 	 		<div id='tag-bubble-body' > 
																						 	 			<img id='tag-bubble-arrow-left-img' src='$mc->genImgs/tag-bubble-arrow-left.png' >
																								       <center> <span id='tag-bubble-title' >ABOUT ITEM NUMBER ".$tn[$c]."</span>  </center>
																								        <table id='tag-bubble-table' border='0' cellpadding='0' cellspacing='0' > 
																								            <tr> 
																								              <td >  <span  id='tag-name' >  COLOR:    </span> <span  id='tag-desc' > #$plt_color            </span>  </td> <tr> 
																								              <td > <span id='tag-name' >  BRAND:    </span> <span  id='tag-desc' >   #$plt_brand            </span>  </td> <tr>
																								              <td > <span id='tag-name' >  GARMENT:  </span> <span  id='tag-desc' >   #$plt_garment          </span>  </td> <tr>
																								              <td > <span id='tag-name' >  MATERIAL: </span> <span  id='tag-desc' >   #$plt_material         </span>  </td> <tr>
																								              <td > <span id='tag-name' >  PATTERN:  </span> <span  id='tag-desc' >   #$plt_pattern          </span> 
																								                    <span id='tag-name' style='display:none' >  PRICE:    </span> <span  id='tag-desc'  style='display:none'  >   #$plt_price            </span>  </td>  <tr>
																								              <td  style='display:none' > <span id='tag-url' > <a href='r?loc=$url' target='_blank' >   $plt_purchased_at </a> </span> </td>  
																								        </table> 
																								        <hr id='tag-bubble-body-hr' style='display:none'  >  
																								         <a style='display:none'  href='r?loc=$url' target='_blank' id='visit-store'  > <img src='$mc->button/visit-store.png'>  </a> 
																								    </div>
																								</div>
																						 	";   
																						}
																						else if ( $tag_arrow == "right") { // if the bubble tag arrow right
																						 	$left-=410; 
																						 	$tag_circle_tag_div = "margin-top:".$top."px; margin-left:".$left."px;"; 
																						 	echo "  
																						 	 	<div id='tag-circle-tag-div' class='tag-circle-$c-tag-div' onmouseenter='circle_tag_mouseover(\".tag-circle-$c-tag-div\")' style='$tag_circle_tag_div' >
																						 	 		<div id='tag-bubble-body' > 
																						 	 			<img id='tag-bubble-arrow-right-img' src='$mc->genImgs/tag-bubble-arrow-right.png' >
																								       <center> <span id='tag-bubble-title' >ABOUT ITEM NUMBER ".$tn[$c]."</span>  </center>
																								        <table id='tag-bubble-table' border='0' cellpadding='0' cellspacing='0' > 
																								          	<tr> 
																								              <td >  <span  id='tag-name' >  COLOR:    </span> <span  id='tag-desc' >   #$plt_color            </span>  </td> <tr> 
																								              	<td > <span id='tag-name' >  BRAND:    </span> <span  id='tag-desc' >   #$plt_brand            </span>  </td> <tr>
																								              	<td > <span id='tag-name' >  GARMENT:  </span> <span  id='tag-desc' >   #$plt_garment          </span>  </td> <tr>
																								              	<td > <span id='tag-name' >  MATERIAL: </span> <span  id='tag-desc' >   #$plt_material         </span>  </td> <tr>
																								              	<td > <span id='tag-name' >  PATTERN:  </span> <span  id='tag-desc' >   #$plt_pattern          </span> 
																								                    <span id='tag-name'  style='display:none'  >  PRICE:    </span> <span  id='tag-desc'  style='display:none'  >     #$plt_price            </span>  </td>  <tr>
																								              	<td  style='display:none'  > <span id='tag-url' > <a href='r?loc=$url' target='_blank' >   $plt_purchased_at </a> </span> </td>  
																								        </table> 
																								        <hr id='tag-bubble-body-hr' style='display:none'  >  
																								         <a style='display:none'   href='r?loc=$url' target='_blank' id='visit-store'  > <img src='$mc->button/visit-store.png'>  </a> 
																								    </div>
																								 </div>
																						 	"; 
																					 	} 
																				}  
																			echo "  
																			</div>"; 
																			// if ( empty($con->plook) ) {
																			//  	echo "<img id='look_view_img' src='$mc->look_folder_home/3.jpg'  >";
																			// } else  { 
																				echo " <img id='look_view_img' style='$lookmodalsstyle'  src='$modal[src]'  onclick=\"load_look_picture_and_tags('$next_prev[next]')\" > ";
																			// } 
																		?>    
																	</div> 
																</center>  
															</td> 
														<tr>  
															<td id='lf_img_view_td' >   
															 	<div id='lf_div_container' style="margin-left:0px;border:1px solid none" >   
															 		<?php 
															 			if ( false ) {
															 				$mc->print_choose_votes_version2( $mno , $plno , $plstyle );  
															 			} 
															 		?> 
															 		<center>
																 		<table id='lfdc_t1' border="0" cellpadding="0" cellspacing="0"> 
																 			<tr> 
																 				<td id='percentage'  > 
																 					<span title='(<?php echo $user_total_look_percentage; ?>%) Looks Rating' id='tpercentage'style='font-size:20px;' ><?php echo $user_total_look_percentage; ?></span><span style='font-size:15px;' > %</span>
																 				</td>
																 				<td id="modal-likethis" >
																 					<div>LIKES THIS</div>  
																 				</td>
																 				<td style="padding-right:20px;" >   
																 					<table style=" width:40px;" border="0"  > 
							  										 	 				<tr>  
							  										 	 					<td> 
							  										 	 						<img src="<?php echo "  $mc->genImgs/$modal[thumbsUp]"; ?>" title='like'          style='height:18px;'      class='postedlooks-like<?php echo $modal['table_id']; ?>'      onclick="posted_modals_rate_Query ( '0' , '<?php echo $mno; ?>' , '<?php echo $modal['table_name']; ?>' , 'like' , '<?php echo $modal['table_id']; ?>' , 'insert' , 'rate'  , '.postedlooks-like<?php echo $modal['table_id']; ?>' , 'look-red-thumbs.png' , '#stat-look-rated<?php echo $modal['table_id']; ?>'  , '<?php echo $plstyle; ?>'   )" > 
							  										 	 					</td> 
							  										 	 					<td> 
							  										 	 						<div style="margin-top:6px;" > 
							  										 	 							<img src="<?php echo " $mc->genImgs/$modal[thumbsDown]"; ?>" title='dislike'   style='height:18px;'  class='postedlooks-dislike<?php echo $modal['table_id']; ?>'     onclick="posted_modals_rate_Query ( '0' , '<?php echo $mno; ?>' , '<?php echo $modal['table_name']; ?>' , 'dislike' , '<?php echo $modal['table_id']; ?>' , 'insert' , 'rate' , '.postedlooks-dislike<?php echo $modal['table_id']; ?>' , 'look-red-thumb-down.png' , '#stat-look-rated<?php echo $modal['table_id']; ?>' , '<?php echo $plstyle; ?>' )"  > 
							  										 	 						</div>
							  										 	 					</td>
						  										 	 				</table>   
																 				</td>  
																 				<td id='ldmtd' title="(<?php echo $trating; ?>) Total Rates" >    
																 					<?php 
																 						$mc->print_specific_look_ratings(  
																	 						array(
																	 							'trating'=>$trating,
																								'table_name'=>'postedlooks',
																								'table_id'=>$plno,
																								'category'=>$plstyle
																	 						)
																	 					); 
																 					?>  
																 				</td>
																 				<td id='ld_eyes' >  
																	 				<img src="<?php echo $mc->path_icons;?>/Views-Icon.png" title="views" > 
																 				</td>
																 				<td> 
															 						<span id='ttext' onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'views' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'VIEWS ( <?php echo "$user_total_look_views"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )"  > 
																 						<?php echo $user_total_look_views; ?>  
																 					</span>	 																 					 
																 				</td> 
																 				<td id='total_arrow' >  
																 					<img src="<?php echo "$mc->genImgs/$modal[src_img_drip]"; ?>"  title="drips"   class="modal-drip-img<?php echo $modal['table_id'] ?>"   onclick="drip_popup_show( '<?php echo $mno; ?>' , '<?php echo $modal['table_name'] ?>' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['title']; ?>' , 'Look' , '<?php echo $modal['mno'] ; ?>' , '<?php echo ".modal-drip-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/$modal[src_img_drip]"; ?>' , '<?php echo $modal['table_id']; ?>' , '#stat-look-dripted<?php echo $modal['table_id']; ?>'  )" >  
																 				</td>
																	 			<td > 
																	 				<span id='ttext' class="modal-tdriped<?php echo $modal['table_id']; ?>" onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'dripped' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'DRIPPED ( <?php echo "$modal[tdrip]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )" > 
																	 					<?php echo $modal['tdrip'];  ?> 
																	 				</span>
																 				</td>   
																 				<td id='ld_star_with_cross'  > 
																 					<!-- <img src="<?php echo $mc->path_icons;?>/favorite-icon.png" title="favorite">  -->
																 					<img src="<?php echo "$mc->genImgs/$modal[src_img_favorite]"; ?>" class='modal-favorite-img<?php echo $modal['table_id']; ?>'   title="favorite" onclick="favorite_posting( '<?php echo $mno;  ?>' , '<?php echo "$modal[table_name]" ?>' , '<?php echo $modal['table_id'];  ?>' , '<?php  echo $modal['headermssg' ] ?>' ,'<?php echo $modal['contentmssg'] ?>'  , 'Article' , '<?php echo $modal['mno'];  ?>' , '<?php echo ".modal-favorite-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/look-icon-favorite-detail-yellow.png"; ?>' , '<?php echo $modal['tfavorite']; ?>' ,'#stat-look-favorited<?php echo $modal['table_id']; ?>'   )"  >  
																 				</td> 
																 				<td style="padding-left:10px;" > 
																	 				<span id='ttext' onclick="fs_modal_popup( 'fs-modal-popup' , 'design' , 'favorites' , '<?php echo $modal['table_name']; ?>' , '<?php echo $modal['table_id']; ?>' , 'FAVORITES ( <?php echo "$modal[tfavorite]"; ?> ) ' , 'fron-end' ,	'#popup-more-doing-the-action-loader img' )" >
																	 			 		<?php echo  $modal['tfavorite']; ?>  
																	 			 	</span>
																 				</td>
																 				<td id='ld_square_with_arrow'  > 
																 					<img src="<?php echo $mc->path_icons;?>/share-icon.png" title="share"  onmouseover="share_mouser_over('<?php echo $plno; ?>')" onmouseout="share_mouser_out('<?php echo $plno; ?>')" >
																 				</td>
															 					<td> 
																 					<span id='ttext' > <?php echo $user_total_look_share["overallsharetotal"]; ?> </span>
																 				</td> 
																 				
																 				<?php  $mc->print_look_footer_flag_or_edit( $mno , $mno1 , $modal['table_id']  , $modal['table_name']  , $modal['src_img_flag'] , "post-look-label?kooldi=$modal[table_id]&type=u" ); ?> 
																 				<td id='ld_scope' >
																 					<a href="z?i=<?php echo $plno; ?>"  target="_blank" >
																 						<img src="<?php echo $mc->path_icons;?>/zoom-icon.png" title="zoom" >
																 					</a> 	
																 				</td>   
																 				
																 				<!-- <td id='ld_scope'  > 
																 					<img src="<?php echo $mc->path_icons;?>/flag-icon.png"  title="flag" style='display:none' >
																 				</td>   --> 
																 				
																 				
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
												  										<div style="border:1px solid none;positio:absolute" >
												  											<?php   
																			 					$mc->share_modal_dropdown( 
																			 						array(	
																			 							'type'=>'details',
																			 							'table_name'=>$modal['table_name'],
																			 							'table_id'=>$modal['table_id'],
																			 							'id'=>$modal['table_id'],
																			 							'about'=>$lookAbout,
																			 							'name'=>$lookOwnerName,
																			 							'title'=>$lookName,
																			 							'page'=>'lookdetails',  
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
															 		</center> 
															 	</div>
															 	<!-- validator -->
									 								<div id="status-container"    >
							 											<input type="text" value="<?php echo "$modal[stat_rated]"; ?>"       id="stat-look-rated<?php echo $modal['table_id']; ?>"       /> <br>
							 											<input type="text" value="<?php echo "$modal[stat_dripted]"; ?>"     id="stat-look-dripted<?php echo $modal['table_id']; ?>"         /> <br>
							 											<input type="text" value="<?php echo "$modal[stat_favorited]"; ?>"   id="stat-look-favorited<?php echo $modal['table_id']; ?>"    /> <br>
							 										</div>  
															 	<table id='tag_colors' border="0" cellspacing="0" style="display:block"  > 
															 		<tr>  
															 		<?php 
															 			// $tag_colors = array('#b7253a','#f2822e','#f3c97c','#6d7a4f','#9e9a5a'); 
															 			 //  	
															 			// echo " Ttag $Ttag ";
															 			if ( !empty($Ttag) ) {
															 				  
																			for ($i=0; $i < $Ttag ; $i++) { 
																					 
																				$tc = $mc->get_html_colo_code( str_replace(" ","",$pltags[$i]["plt_color"]));		 
 
																					  
							 													if ( $i == 0 ) {

							 														if (!empty($tc )) {
							 															$tagcolors_style = "background-color:#$tc; border-radius:0 0 0 5px;";
							 														}
							 														else{
							 															if ( $i == $Ttag-1 ) { 
							 														 		$tagcolors_style = "background-color:#000;border-radius:0 0 5px 5px;opacity:0.8;";
							 														 	} 
							 														} 
							 													}
							 													else if ( $i == $Ttag-1 ) { 
							 														if (!empty($tc )) {
							 															$tagcolors_style = "background-color:#$tc;  border-radius:0 0 5px 0;";
							 														}
							 														else{
							 														 	$tagcolors_style = "background-color:#000;border-radius:0 0 5px 0;opacity:0.8;";
							 														} 
							 														
							 													} 
							 													else { 
							 														$tagcolors_style = "background-color:#$tc";
							 													}  ?>

																				<td id='tag_colors_td' style='<?php echo $tagcolors_style; ?>' >   
																				</td> 
																				<?php 
																 		 	} 
																 		 }else { 
																 		 	$tagcolors_style = "background-color:#000;border-radius:0 0 5px 5px;opacity:0.8;";
																 		 	echo "<td id='tag_colors_td' style='$tagcolors_style'> </td>";
																 		 }
																 		 	?> 
															 	</table>  
															</td> 
													</table> 
													


												
												</td> 
									 	</table>
									 </td>   <!--  end banner_view_and_look_view -->  
								<tr>  
									<td id='lbc_small_ads' > 
										<table id='ads_main_table' border="0" cellpadding="0" cellspacing="0"> 
											<tr>  
												<td id='ld_small_ads'> 
													<table  id="ld_ads_table1" border="0"   cellpadding="0" cellspacing="0"  > 
														<tr>  
															
															 
															<td id="about_and_more_by" >
																<span  id='recomended_more_by_t' style='font-size:12px;' > <b> ABOUT THIS "<?php echo strtoupper($plstyle); ?>" LOOK  </b> </span>  
																<table  border="0" cellspacing="0" cellpadding="0" >
																 	<tr>   
															 			<td id="details-about" > 
																			<div> <?php echo  ucfirst($lookAbout)."$more" ;  ?></div>  
																		</td> 
																	<tr> 
																		<td id ="more-by-link-header" >  
																			<span  style='font-size: 12px; font-family:arial ' >  MORE BY   </span>  
																			<span id='recomended_name_t' style='font-size: 12px; font-family:arial '> <a href="<?php echo $user['username']; ?>" target='_parent' style="color:#b32727;" > <?php echo  strtoupper($lookOwnerName); ?> </a>   </span> <span id='recomended_bar_t' >|</span>  
																			<span style='font-size:12px; font-family:arial' > <?php echo "$look_countingPos of $total_looks"; ?>  </span> 
																			<span id='recomended_all_t' style='padding-left:5px;font-size: 12px; font-family:arial' title='all looks' > <a href="<?php echo "$user[username]-$user[profile_tab]"; ?>"  style='color:#b32727; ' target='_parent' > ALL LOOKS >> </a>  </span></span> 
																		</td> 
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
													<!-- advertisement is temporary -->
													<div> 
														FOLLOW US
													</div>   
													<?php 
														$advertise = array("Instagram","Facebook","Twitter");
														$loc_ads  = array( "" ,"http://instagram.com/FashionSponge/","https://facebook.com/FashionSponge/","https://twitter.com/FashionSponge/");
													?> 
													<table border="0"  cellpadding="5" cellspacing="0"  > 
														<tr>  
															<td>  
																<a href="r?loc=<?php echo  str_replace('.',' ', $loc_ads[1]); ?>" target="_blank" >
																	<img src="fs_folders/images/ads/1.jpg" title="<?php echo $advertise[0]; ?>" >
																</a>
															</td>
															<td> 
																<a href="r?loc=<?php echo  str_replace('.',' ', $loc_ads[1]); ?>" target="_blank" >
																	<img src="fs_folders/images/ads/2.jpg" title="<?php echo $advertise[1]; ?>" >
																</a>
															</td>
															<td> 
																<a href="r?loc=<?php echo  str_replace('.',' ', $loc_ads[1]); ?>" target="_blank" >
																	<img src="fs_folders/images/ads/3.jpg" title="<?php echo $advertise[2]; ?>" >
																</a>
															</td> 
														<!-- <tr>  
															<td> 
																<img src="fs_folders/images/ads/2.jpg">
															</td>
															<td> 
																<img src="fs_folders/images/ads/3.jpg">
															</td> -->
													</table>
												</td> 
										</table>
									</td>
								<tr>  
									<td id='lbc_comments' style="border:1px solid none;" > 
										<div  style="border:1px solid none" id="lookdetails-comment-container" >
											<span id='feed' >  FEEDBACK </span> 
											<table id='look_comment_t1' border="0" cellpadding="0" cellspacing="0">  
												<tr>  
													<td id='header_comment_c_td'>
														<table id='comment_love_drip_t' border="0" cellspacing="0"  cellpadding="0" > 
															<tr> 
																<td  id='comment_tabs' > 
																	<span title='comments' >( <?php echo $tlc; ?> ) COMMENTS</span> 
																	<hr id='comment_tabs_hr1' >
																</td>
																<td> 
																	<div style="margin-left:20px;margin-top:-17px;" >
																		<?php $mc->print_look_comment_sorting_option( 'postedlooks' , $plno );  ?> 
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
														<table border="0" cellpadding="0" cellspacing="0"  style="width:100%;">  
															<tr>  
																<td> 
																	<?php  $np = $mc->generate_next_prev_numbers( $tlc , 10 ); ?>  
																	<ul id="look-comment-cotainer-ul" >
																		<li id="comment-top-next-prev" >  
																			<?php $mc->print_next_prev_numbers(  $np , $plno , null , 'loader-down' ); ?>    
																		</li>
																		<li> 
																			<div style="margin-left:36px; border:1px solid none;" >
																				<ul id='comments_result' class='comments_result' style="border:1px solid none" >
																					<?php $mc->print_look_comment( $mno , $plno , null , 'init' ,  $mc->date_time , null , 1 , 'order by plcno desc'  ); ?>
																				</ul>
																			</div> 
																		</li> 
																	</ul>   
																</td>  
															<tr>
																<td> 
																	<?php $mc->print_next_prev_numbers( $np , $plno , null , 'loader-up' ); ?>
																</td>
															<tr> 
																<td>   
																	<div id="cmment" style="margin-top:10px;"  >
																		<?php $mc->print_look_comment_textarea( $plno );   ?> 
																	</div>
																	<ul id='comment_sending_result' > 	
																		<!-- look commnet res -->
																	</ul>  
																</td>  
														</table>  
													</td>
												<tr>  
													<td id='comment_post_area'> 
														<!-- comment post  -->
													</td>
											</table>  
									 			<div id="footer_res" style="display:none" >
									 				<!-- footer_res -->
									 			</div>
							 			</div>
									</td> 
								<tr>  
									<td id='lbc_footer'>    
										<?php 
											$mc->fs_footer(  'width:1010px !important;' , 'margin-left:-13px;' );  
										?>
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