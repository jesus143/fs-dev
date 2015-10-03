<?php  /*  dec  6 , 2013 */
    require ("../../../fs_folders/php_functions/connect.php");
    require ("../../../fs_folders/php_functions/function.php");
    require ("../../../fs_folders/php_functions/library.php");
    require ("../../../fs_folders/php_functions/source.php");
    require ("../../../fs_folders/php_functions/myclass.php"); 
    $mc        = new myclass();   
    $load      = $_GET["load"]; 
    $plno      = ( !empty($_GET["plno"]) ) ? $_GET["plno"] : null ;  
    $ext1      = ( !empty($_GET["ext1"]) ) ? $_GET["ext1"] : '' ; 
    $mno       = ( !empty($_GET['mno'])) ? $_GET['mno'] : 0 ; 
    $rating    = ( !empty($_GET['rating'])) ? intval($_GET['rating']) : 0 ;
    $style     = ( !empty($_GET['style'])) ?  $_GET['style'] : '';

	$lvoption1   = (  !empty($_GET['lvoption1']) ) ? $_GET['lvoption1']   : 0 ;
	$lvoption2   = (  !empty($_GET['lvoption2']) ) ? $_GET['lvoption2']   : 0 ;
	$lvoption3   = (  !empty($_GET['lvoption3']) ) ? $_GET['lvoption3']   : 0 ;
	$lvoption4   = (  !empty($_GET['lvoption4']) ) ? $_GET['lvoption4']   : 0 ; 
	$lvoption5   = (  !empty($_GET['lvoption5']) ) ? $_GET['lvoption5']   : 0 ;
	$lvoption6   = (  !empty($_GET['lvoption6']) ) ? $_GET['lvoption6']   : 0 ;  
	$lvoption7   = (  !empty($_GET['lvoption7']) ) ? $_GET['lvoption7']   : 0 ;  
	$sum         = (  !empty($_GET['sum']      ) ) ? $_GET['sum']         : 0 ;     
	$table_id    = (!empty($_GET['table_id'])) ? $_GET['table_id']      : 0 ;   
	$table_name  = (!empty($_GET['table_name'])) ? $_GET['table_name']  : 0 ;    

?>  
<?php  
	class lookdetailsModals extends lookdetails_modals_code {	  
		public function load_look_thumbnail($mc, $mno, $style, $table_id, $table_name='postedlooks') {  

			$r = $mc->retreive_specific_user_all_looks_by_style( $mno , $style , "plno desc", "30", $table_id );  

 
			// print_r($r); 
			$c=0;    
			$modal['path']       = '../../../';   
			$modal['table_name'] = 'postedlooks'; 
			$modal['table_id']   = null; 
			
			for ($i=0; $i < count($r); $i++) {  

				$modal['table_id'] = $r[$i]['plno']; 

				# get image src 
				  	$modal['src']  = $mc->image( 
					    array(
					        'table_name'=>$modal['table_name'],
					        'table_id'=>$modal['table_id'],
					        'type'=>'get-default-image-src',
					        'size'=>'thumbnail',
					        'path'=>$modal['path']
				      	)
				 	);

				# get image src 
				  	$modal['src_1']  = $mc->image( 
					    array(
					        'table_name'=>$modal['table_name'],
					        'table_id'=>$modal['table_id'],
					        'type'=>'get-default-image-src',
					        'size'=>'home',
					        'path'=>$modal['path']
				      	)
				 	);
				 ?>    
					<li >  
						 
					    <!-- <img  onmousemove="mouse_enter('#follow_div' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['src_1']; ?>' )" onmouseout="mouse_out('#follow_div')" onclick="thumbnail_clicked('<?php echo $modal['table_id']; ?>', '<?php echo $_SESSION['details_user_mno']; ?>' )" id='thumbnail<?php echo $modal['table_id']; ?>'  src="<?php echo $modal['src']; ?>" /> -->

					    <a href="lookdetails-dev.php?id=<?php echo $modal['table_id']; ?>">
					     	<img  onmousemove="mouse_enter('#follow_div' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['src_1']; ?>' )" onmouseout="mouse_out('#follow_div')"  id='thumbnail<?php echo $modal['table_id']; ?>'  src="<?php echo $modal['src']; ?>" />
					     </a>
					</li>  
					<?php
		    	$c++; 
			}   
		}  
		public function load_look_nex_prev( $mc , $plno ) {
		}
		public function load_look_title( $mc , $plno ) {   
		}
		public function look_look_owner_info( $mc , $plno ) { 
		}
		public function load_look_picture_and_tags( $mc , $plno ) {   

		 		$ri = new resizeImage ();
				$mc->auto_detect_path();
				$img = "$mc->look_folder_lookdetails/$plno.jpg";
				// echo "<img id='look_view_img' src='$mc->look_folder_home/$plno.jpg'  >"; 
				$li=$mc->posted_look_info($plno);
				// $_SESSION['plno']=$_GET['id']; 
				$pltags           	 = $li['pltags'];  
				$plstyle          	 = $li['style'];   
				$lookName         	 = $li["lookName"]; 
				$date_            	 = $li['date_'];  
				$lookOwnerMno    	 = $li["lookOwnerMno"];
				$lookOwnerName    	 = $li["lookOwnerName"];
				$lookAbout        	 = $li["lookAbout"];  
				$pltvotes         	 = $li["pltvotes"]; 
				$trating        	 = $li["trating"];  
				
				$mno1             	 = intval($li["lookOwnerMno"]);	 
				$memFsInfo        	 = $mc->get_user_full_fs_info( $mno1  );   
				$opercentage      	 = $memFsInfo['opercentage'];  	
				$otrating         	 = $memFsInfo['otrating'];   


				$pltratings      = number_format($li["pltratings"]); 
				$mno 			 = intval( $mc->get_cookie( 'mno' , 136 ) );
				//  generate next and prev temporary.
					// $limit = 10;
					// $looks = $mc->get_all_latest_look( $limit );   
					// $r=$mc->shuffle_array( $looks , "plno" , $limit );  
					// $user_look_next = $r[0]; // temporary
					// $user_look_prev = $r[1]; // temporary  
				$Ttag   = count($li['pltags']);  
				$mem_info = $mc->get_user_info_by_id( $mno1  );   
				$tlooks 		= number_format($mem_info[0]['tlooks']); 
				$tratings 		= number_format($otrating);   /*number_format($mem_info[0]['tratings']); */ 
				$tfollower 		= number_format($mem_info[0]['tfollower']);
				$tfollowing 	= number_format($mem_info[0]['tfollowing']);
				$tpercentage 	= number_format($mem_info[0]['tpercentage']);  
			    $user_total_percentage   = $tpercentage;
				$user_total_rating       = $tratings ;  
				$user_total_lookuploaded = count($mc->retreive_specific_user_all_looks( $lookOwnerMno ));
				$user_total_followers    = $tfollower;
				$user_total_following    = $tfollowing;
				$user_total_look_percentage = $li['pltpercentage'];
				$user_total_look_star    = 0;
				$user_total_look_views   = $li['tlview'];
				$user_total_look_drip    = 0;  
				$user_total_look_share   = array( 
				 	'overallsharetotal' => rand(100,200) ,
				 	'facebook' => rand(100,200) ,  
				 	'twitter' => rand(100,200) ,  
				 	'tumblr' => rand(10,200) ,  
				 	'pinterest' => rand(100,200) ,  
				 	'google+' => rand(100,200) ,  
				 	'stumbleupon' => rand(100,200) ,  
				 	'email' => rand(100,200)   
				);   
				// $looks = $mc->get_all_latest_look();  
				$looks = $mc-> retreive_specific_user_all_looks( $lookOwnerMno , "order by plno desc " ); 	
				// $next_prev        = $mc->db_result_next_prev( $plno , $looks , 'all' );   
				$next_prev        = $mc->db_result_next_prev( 'postedlooks' , $plno , $looks , 'all' );  
				// $mc->add_look_view( $plno );  
				$lookmodalsstyle =  $mc->lookdetails_set_size_of_the_look( "../../../".$img , $ri ); 
				// echo "$lookmodalsstyle";  
				$mc->header_attribute( 
	 				"$lookName-$lookOwnerName-Fashion Sponge" , 
	 				$lookAbout, 
	 				"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration "
 				);  
				$mc->print_name_looktitle_look_desc_for_share( $lookOwnerMno , $plno , $lookname , $lookAbout ); 





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
			    $modal['src_img_drip']                      = "look-icon-drip.png";   
			    $modal['src_img_favorite']                  = "look-icon-favorite.png";  
				$modal['src_img_share']                     = "look-icon-share.png";   
				$modal['src_img_flag']         			    = "modal-flag-dot.png"; //"modal-flag.png";  
				$modal['tdrip']                             =  $li["tdrip"];  
				$modal["title"]  							=  $li["lookName"];   
				$modal['tfavorite']                         =  $li["tfavorite"];
				$modal['path'] 								= '../../../'; 














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
							$modal['src_img_favorite']  = "look-icon-favorite-detail-yellow.png";  
						}

						$response = $mc->fs_flag( array(  'type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"table_id  = $plno and table_name= 'postedlooks' and mno = $mno "  )  );   
						if ( !empty($response) ) {
							  $modal['src_img_flag']        = "large-flag-red.png";
						}
 
					# get image src 

					  	$modal['src']  = $mc->image( 
						    array(
						        'table_name'=>$modal['table_name'],
						        'table_id'=>$modal['table_id'],
						        'type'=>'get-default-image-src',
						        'size'=>'detail',
						        'path'=>$modal['path']
					      	)
					 	);
 
					# set status of owner or not for the user not allow to rate , drip and favorite the modal

						if ( $modal['mno'] == $mno ): 	 
							$modal['stat_rated']	 =  'modal owner'; 
							$modal['stat_dripted'] 	 =  'modal owner'; 
							$modal['stat_favorited'] =  'modal owner';    
				   	 		
						endif; 
					#get title url of the page 
						$url=page::set_url_for_modal_details($plno,'look',$plstyle,$date_,$look_attr['title']); ?>    


					<style type="text/css">
						#posted-look-response { list-style: none; }
					</style>
				<ul id="posted-look-response" > 
					<pageurl><?php echo $url; ?><pageurl>
					<pagetitle><?php echo "$lookName-$lookOwnerName-Fashion Sponge";  ?> <pagetitle>
					<item>1</item>
					<item><?php echo "$lookName-$lookOwnerName-Fashion Sponge"; ?></item> 
					<item>2</item> 
					<item>  
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
																				</div> -->
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
																<div id='next_hr'> 
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
																	    		'inside_modals'           => true,
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
															<td id='look_view_img_td'>   
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
																								                    <span id='tag-name' style='display:none' >  PRICE:    </span> <span  id='tag-desc' >   #$plt_price            </span>  </td>  <tr>
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
																								                    <span id='tag-name'  style='display:none'  >  PRICE:    </span> <span  id='tag-desc' >     #$plt_price            </span>  </td>  <tr>
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
															 	<div id='lf_div_container'>   
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
																	 					<img src="<?php echo "$mc->genImgs/$modal[src_img_drip]"; ?>"  title="drips"   class="modal-drip-img<?php echo $modal['table_id'] ?>"   onclick="drip_popup_show( '<?php echo $mno; ?>' , '<?php echo $modal['table_name'] ?>' , '<?php echo $modal['table_id']; ?>' , '<?php echo $modal['title']; ?>' , 'Look' , '<?php echo $modal['mno'] ; ?>' , '<?php echo ".modal-drip-img$modal[table_id]"; ?>' , '<?php echo "$mc->genImgs/look-icon-drip-selected.png"; ?>' , '<?php echo $modal['table_id']; ?>' , '#stat-look-dripted<?php echo $modal['table_id']; ?>'  )" >  
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
									 								<div id="status-container" style='display:none'   >
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
					</item> 
				</ul> 

			 	<?php   
		}  
		public function load_about_and_moreby(  $mc , $plno  ) {

			 	$li=$mc->posted_look_info($plno); 
				$pltags = $li['pltags'];    
				$plstyle =$li["style"]; 
				$lookName=$li["lookName"]; 
				$lookAbout           = $li["lookAbout"];  
				$date_               = $li['date_'];  
				$lookOwnerMno        = $li["lookOwnerMno"];
				$lookOwnerName       = $li["lookOwnerName"];
				$mno1                = intval($li["lookOwnerMno"]); 
				$total_show_looks    = 1; 
				$total_looks         = 2;  
				$user['username']    = $mc->get_username_by_mno( $lookOwnerMno  );   
				$user['profile_tab'] = 'looks';   
				$looks               = $mc-> retreive_specific_user_all_looks( $lookOwnerMno , "order by plno desc " ); 
				$next_prev           = $mc->db_result_next_prev( 'postedlooks' , $plno , $looks , 'all' );  
				$total_looks 	     = $mc->get_res_len( $looks );
				$total_show_looks    = $mc->get_total_limit_show( intval( $total_looks ) , 30 );  
				$look_countingPos    = $mc->get_modal_position_detail( $plno , $looks , 'plno' );  
				$article_link        = $li['article_link']; 
				$more                = $mc->look_with_more( $plno , $article_link ); 


				?>  
				<span  id='recomended_more_by_t' style='font-size:12px;' > <b> ABOUT THIS "<?php echo strtoupper($plstyle); ?>" LOOK  </b> </span>  
				<table  border="0" cellspacing="0" cellpadding="0" >
				 	<tr>    
						<td id="details-about" > 
							<div> <?php echo  ucfirst($lookAbout)."$more" ; ?></div>  
						</td> 
					<tr>  
						<td id ="more-by-link-header" >    
							<span  style='font-size: 12px; font-family:arial ' >  MORE BY   </span>  
							<span id='recomended_name_t' style='font-size: 12px; font-family:arial '> <a href="<?php echo $user['username']; ?>" target='_parent' style="color:#b32727;" > <?php echo  strtoupper($lookOwnerName); ?> </a>   </span> <span id='recomended_bar_t' >|</span>  
							<span style='font-size:12px; font-family:arial' > <?php echo "$look_countingPos of $total_looks"; ?>  </span> 
							<span id='recomended_all_t' style='padding-left:5px;font-size: 12px; font-family:arial' title='all looks' > <a href="<?php echo "$user[username]-$user[profile_tab]"; ?>"  style='color:#b32727; '  target='_parent' > ALL LOOKS >> </a>  </span></span> 
						</td> 

				</table><?php  
		}
		public function load_look_view_footer_attribute( ) { 
		} 
		public function load_look_comments( $mc , $plno ) {   
		} 
  
	}   
	class lookdetails_modals_code {   
		// public function retreive_specific_user_all_looks( $mc , $mno , $orderby ) { 
		// 	$r = $mc->selectV1(
		// 		'plno', 
		// 		'postedlooks',
		// 		'',
		// 		"$orderby"
		// 	);
		// 	return $r; 
		// }
		// public function retreive_specific_user_all_looks_voted_by_viewer( $mno_viewed , $mno_viewer ) { 
		// }
		// public function retreive_specific_user_all_looks_not_voted_by_viewer( $mno_viewed , $mno_viewer ) {  
		// } 
	}  
	$lm = new lookdetailsModals();  
	if (!empty($ext1)) {
		 $lm->load_about_and_moreby( $mc , $plno );	 
	}
    else if ( $load ==  "load_look_thumbnail") {

    	$lm->load_look_thumbnail( $mc , $mno, $style, $table_id);	 
    } 
    else if ( $load ==  "load_look_nex_prev") { 
    	
    	$lm->load_look_nex_prev( $mc , $plno );
    } 
    else if ( $load ==  "load_look_title") { 

    	$lm->load_look_title( $mc , $plno );
    } 
    else if ( $load ==  "look_look_owner_info") { 

    	$lm->look_look_owner_info( $mc , $plno );
    } 
    else if ( $load ==  "load_look_picture_and_tags") {  
    	
    	$lm->load_look_picture_and_tags( $mc , $plno );
    } 
    else if ( $load ==  "load_look_view_footer_attribute" ) { 
    } 
    else if ( $load ==  "load_look_comments") { 

    	$lm->load_look_comments( $mc , $plno );
    }  
    else if ( $load ==  "load_look_save_rating" ) {  
    	$rated = $mc->get_my_rate_to_this_look( $mno , $plno );  
        if( $mc->is_look_i_rated( $rated ) == false )  { 
          $mc->my_look_rating_save( $mno , $plno , $rating ); 
        }  
        $rated = $mc->get_my_rate_to_this_look( $mno , $plno );  
        print_r($rated); 
    }  
    else if ( $load ==  "load_look_save_votes" ) {   
    	$val = array(
            'mno'         =>  $mno, 
            'plno'        =>  $plno, 
            'lvoption1'   =>  $lvoption1, 
            'lvoption2'   =>  $lvoption2, 
            'lvoption3'   =>  $lvoption3, 
            'lvoption4'   =>  $lvoption4, 
            'lvoption5'   =>  $lvoption5, 
            'lvoption6'   =>  $lvoption6, 
            'lvoption7'   =>  $lvoption7,  
            'lvtotal'     =>  $sum, 
            'lvdate'      =>  date("Y-m-d H:i:s"),
            'table_name'  =>  'fs_look_votes',
            'row_id_name' =>  'lvno'
        );


        // print_r($val);
    	$mc->save_my_look_vote_or_update( $val ); 
    	// echo " this is modals";
    } 
  	else if ( $load ==  "load_look_view_more_rating" ) {   
  		// echo " this is view more rating modals here ";
  		$mc->fs_popup ( $plno );
    }  
?>

<head>  

</head>
