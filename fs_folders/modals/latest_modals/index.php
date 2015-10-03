<?php 
	if ( session_start()) {echo " session started";  }else { echo " session not started"; }
	require('require_connect_modals.php'); 
	$con = new connections (); 
	$con->modal_connect(); 
?>
<div id='imgs'> 

<?php 
	$mc = new myclass (); 	
	$ri = new resizeImage ();
	$pa = new postarticle ();



  	$tres     = $_GET['tres']; 
 	$home_tab = $_GET['home_tab']; 

  	$home_tab = "lates";

	if ( !empty( $home_tab ) )  
	{

		$_SESSION['home_tab'] = $home_tab; 
		echo " tab is not empty  tab = $home_tab session is  ". $_SESSION['home_tab']."<br>";
	}
	else 
	{ 	
		echo " tab is empty  tab = $home_tab session is  ". $_SESSION['home_tab']."<br>";
		$home_tab = $_SESSION['home_tab'];
		
	} 

	 
 



 
  	// echo "  tres = $tres home_tab = $home_tab";







	$con->calculate_show(22, intval($_GET['tres']) , $mc);
	$con->home_tabs_selected($home_tab , $mc , 80 );

	// while(false) 

	$activity = $con->activity; 
    $Tresults = $con->Tresults;
	print_r($activity);

    echo " total results $Tresults <br>";
    $ads = "fs_folders/images/ads/5.gif";
 
	
 
	  
	$coding = "postarticle1"; 
	if ( $coding == "postarticle" ) {
		for ($i=0; $i < 9 ; $i++) { ?> 
			 <li > 
				<div id="article_height_width" class="article_container_div"    >
					<table  id='article_t' border="0" cellpadding="0" cellspacing="0"  >
						<tr>  
							<td id="article_img_td"> 
								 <img id="article_img" src="<?php echo$img_article;?>" >
							</td>
						<tr>  
							<td id="article_body_td" > 
								<span id="article_title2" > ITS SATURDAY ROUND-UP. COME AND SEE THE WEEK RECAP. </span> <br> 
								<span id="article_description" > 
									She's Back! Exclusive Excerpt from Helen Fielding's Bridget Jones: Mad About the Boy
									She's Back! Our favorite hapless heroine returns after a decade-plus hiatus, juggling two kids, potential boyfriends, smug marrieds, rogue gadgets, and her nascent Twitter feed.
									..<a id="article_link" href="#"> more </a> 
								</span> <br>  	
							</td>
						<tr>
							<td id="article_footer_td"> 
							    <div id="article_footer_content_dv"> 
	 								<center>
									    <table id="aticle_footer_table1" border="0" cellspacing="0" cellpadding="0" > 
									    	<tr>
									    		<td> 
									    			<img src="fs_folders/images/body/article/text_blog.png">
									    		</td> 
									    		<td> 
									    			<table border="0" cellpadding="0" cellspacing="0" > 
									    				<tr> 
									    					<td width="50"> 
									    						<center><img src="fs_folders/images/body/article/comment icon.png"></center>	
									    					</td> 
									    					<td width="50"> 
									    						<center><img src="fs_folders/images/body/article/views icon.png"></center>	
									    					</td> 
									    					<td width="50"> 
									    						<center><img src="fs_folders/images/body/article/redrip.png"></center>	
									    					</td> 
									    					<td> 
									    						<center><img src="fs_folders/images/body/article/total_heart1.png"></center>	
									    					</td>
									    				<tr>
									    					<td> 
									    						<center> <span> 9999 </span> </center> 
									    					</td> 
									    					<td> 
									    					 	<center> <span> 9999 </span> </center> 	
									    					</td>
									    					<td> 
									    					 	<center> <span> 9999+ </span> </center> 
									    					</td> 
									    					<td> 
									    					 	<center> <span> 9999+ </span> </center> 
									    					</td>
									    			</table>
									    		</td>  
									    </table>
									</center>
								</div>
								<img id="article_footer_bg" src="fs_folders/images/body/article/transparent rectangle.png">
							</td>
					</table>

				</div>
				<div id='article_padding'> </div>
			</li><?php	
		}
	} else {  
		echo " <br> "; 
		echo " start $con->show_start  end $con->show_end"; 
		for ($h=$con->show_start ; $h < $con->show_end; $h++)  {  
  			 
  			echo " h $h <br>";
			$i = $con->i; 

			if ( $i < $Tresults) {
	 			
				$item = $activity[$i]['type'];


				 
				/* ads no header 
				*
				*
				*/








				if (  $item  == 'ads' ) { 

					?>
			 		<li > 
			 			<div style="position:absolute;visibility:hidden;"> 
							<class>thiss_ads_c</class><class>thiss_ads_c</class>
						</div>  
			 			<div id='padding_ads' style="<?php echo "$con->padding_ads_top" ?>" > </div>
			 			<div id='ads_container' > 
	 			 			<img id='ads_img'  src="<?php echo $ads;?>" title='<?php  echo $ads; ?>' >
	 			 			<div id='ads_desc'  > 
			 			 		<span> 
				 			 		This 300 x 250 square block AD is placed prominently 
				 			 		above-the-fold on the feed. 
				 			 		This is the first AD readers will see.
			 			 		</span>
		 			 		</div>
			 			</div>
						<div id='padding_ads' style="<?php echo "$con->padding_ads_bottom" ?>" > </div>
				  	</li>

				  	<?php 
				} else {  
					$con->latest_activity_sorting( $mc , $ri , $i , $activity ); // para rani sa mga picture walay labot ang ads
  				 

					if ( !empty( $con->latest_item ) ) {
						$item = $con->latest_item;
					}

					if ( $item  == "plook") {
						// echo " posted look";   
						// $plno = $activity[$i]['plno']; 
						// echo " look result";
						// if ( file_exists($con->lookExist.$con->plno_pic.'.jpg' ) ) 
						// 	{ 
							 ?>
								<li >   
									<div style="position:absolute;visibility:hidden;"> 
										<class>look_t<?php echo  $con->plno; ?></class><class>look_t<?php echo  $con->plno; ?></class>
									</div>   
									<div id="look_height_width" class="look_container_div"  style="<?php echo $con->look_height_width; ?>"  >
										
										<table  id='look_t' border="0" cellpadding="0" cellspacing="0"  onmouseout="img_mouseout('.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>' , '.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>')" > 
											<tr>
												<td id='user_header_t' style='<?php echo $con->user_header_style; ?>' > 
														<div id='profilePic'>   
														<?php  if ( file_exists("../../../fs_folders/images/uploads/members/mem_thumnails/$con->look_owner.jpg") ) {?>  
														 	<a href="profile?id=<?php echo $look_owner; ?>"> 
																<img src="<?php echo "$con->ppic_profile/$con->look_owner.jpg"; ?>"> 
															</a> 
														<?php } else {  
															?>   
															<a href="profile?id=<?php echo $look_owner; ?>"> 
																<img src="<?php echo $con->ppic_thumbnail.'/default_avatar.png'; ?>" />
															</a> 
														<?php }?> 
														<?php  
														// new to be transfer to class
															$ri->load("../../../".$con->look_img_directory.$con->plno_pic.'.jpg');
															if ($ri->getHeight() < 201) 
															{
																$min_look_hight = 'height:230px;';
																// echo "height less 300";
															} 
															else 
															{ 
																$min_look_hight = 'height:auto;';
															}
														// end to be transfer to class

															?>

													</div>
														<div id='profileInfo'> 
															<span id='action'> 
																<?php  

																	echo $con->user_act;
																 	// echo " mno = $con->mno ";
																 
																	// echo "<br> width = ".$ri->getWidth();
																	// echo "<br> height = ".$ri->getHeight().'<br>';
																	// echo $con->i;	


																	echo " $con->plno_pic ";
																?>
															</span>
														</div>	 
														<div id='hiden' class='mheader_tp'> </div>
									 			</td> 
								 			<tr>
										 		<td>   
										 			<table border="0" id='rate' class='rate<?php echo $con->plno; ?>' onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?>  ,  .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
										 				<tr> 
										 					<!-- <td>  <img src="fs_folders/images/body/Look/<?php echo $con->stars; ?> stars.png" > </td>  -->
										 			</table>
													 		 
					 								<div id='look_mouserOver_c' class='look_mouserOver_c<?php echo $con->plno; ?>' style="display:none" > 
					 									<table id='look_f_1row'   border="0" onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?>  , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')" > 
										 					<tr>
										 					 	<td> <img  id = "percentage_img" <img src="fs_folders/images/body/Look/look icon.png" >   </td> 
										 					 	<td> <span id='percentage_text' > <?php echo $con->rating_percent;?> %   </span></td> 
										 					 	<td> <span id='mesage_text' > RATE ( <?php echo $con->rating_total; ?> ) </span> <img id = "mesage_img" src="fs_folders/images/body/Look/transparent bubble.png">  </td> 
										 				</table>
										 				<table id='title_desc_t' border="0" onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')" > 
										 					<tr> 
										 						<td> 
										 							<div  id='tdpadding' > 
										 								paddding 
										 							</div>   
										 						</td> 
										 					<tr>
										 						<td id='title_desc_container' onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?>  , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
										 							<span id='look_title' >  
										 								   
										 								<?php  echo strtolower($mc->split_string_multiple($con->lookName , 15 , 20)); ?>	

										 							</span> 
										 						</td> 
										 					<tr> 
										 						<td id='title_desc_container' onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?>  , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
										 							<span id='look_desc' >  
											 							<?php  echo strtolower($mc->split_string_multiple($con->lookAbout , 15 , 20)); ?>	
										 							</span> 
										 						</td>
										 				</table>
										 				<table id='look_f_2row1'  border="0"  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
												 			<tr>   
													 			<td> <img id='tmsg'  src="fs_folders/images/body/Look/comment icon.png"   title="comments (<?php echo $con->comment; ?>)"    > </td> <td> <span> <?php echo $con->comment; ?>   </span> </td>
													 			<td> <img id='teye'  src="fs_folders/images/body/Look/views icon.png"     title="views (<?php echo $con->view; ?>)"         > </td> <td> <span> <?php echo $con->view; ?>      </span> </td>
													 			<td> <img id='tarrw' src="fs_folders/images/body/Look/redrip.png"         title="drip (<?php echo $con->redrip; ?>)"         > </td> <td> <span> <?php echo $con->redrip; ?>    </span> </td>
													 			<td> <img id='thrt'  src="fs_folders/images/body/Look/favorites icon.png" title="favorites (<?php echo $con->favorites; ?>)" > </td> <td> <span> <?php echo $con->favorites; ?> </span> </td>
												 		</table>
					 								</div>
					 								<a href="lookdetails?id=<?php echo  $con->plno; ?>#look_view_header"> 
											 			<div id='look_mouserOver_bg' class='look_mouserOver_bg<?php echo $con->plno; ?>'  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
											 			</div>
										 			</a>


											 			 
										 			
			 							 			<!-- <img id='look_img' src="fs_folders/images/posted look/<?php echo $look_id; ?>.jpg"  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > -->
										 			<!-- <div id='body_auto_background' class='body_auto_background<?php echo $con->plno; ?>' onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')" >  </div>  -->
										 			<table border="0" cellpadding="0" cellspacing="0" >  
											 			<tr> 
											 				<td  id="img_container_td" class="img_container_td<?php echo $con->plno; ?>" > 

											 					<img id='look_img' style="<?php echo $min_look_hight; ?>"   src="<?php  echo $con->look_img_directory.$con->plno_pic.'.jpg'?>"  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>','.img_container_td<?php echo $con->plno; ?>' , '.look_mouserOver_bg<?php echo $con->plno; ?>')"  >
											 				</td>
											 			<tr>  
											 				<td>
											 					<div id='look_footer_bg_c' style="margin-top:-92px;"  class='look_footer_bg_c<?php echo $con->plno; ?>' > 
													 				<table id='look_f_1row' border="0" onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?>  , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
													 					<tr>
													 					 	<td> <img  id = "percentage_img" <img src="fs_folders/images/body/Look/look icon.png" >  </td> 
													 					 	<td> <span id='percentage_text' > <?php echo $con->rating_percent;?> % </span></td> 
													 					 	<td> <span id='mesage_text' > RATE ( <?php echo $con->rating_total; ?> ) </span> <img id = "mesage_img" src="fs_folders/images/body/Look/transparent bubble.png" >  </td> 
													 				</table>
														 			<div id='footer_bg' >  
														 			</div>
													 			</div>
												 				<table id='look_f_2row'  border="0"  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?>  , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
												 					<tr>   	 
												 					<td> <img id='tmsg'  src="fs_folders/images/body/Look/comment icon.png"   title="comments" > </td> <td> <span> <?php echo $con->comment; ?>   </span> </td>
												 					<td> <img id='teye'  src="fs_folders/images/body/Look/views icon.png"     title="views"    > </td> <td> <span> <?php echo $con->view; ?>      </span> </td>
												 					<td> <img id='tarrw' src="fs_folders/images/body/Look/redrip.png"         title="drip"     > </td> <td> <span> <?php echo $con->redrip; ?>    </span> </td>
												 					<td> <img id='thrt'  src="fs_folders/images/body/Look/favorites icon.png" title="favorites"> </td> <td> <span> <?php echo $con->favorites; ?> </span> </td>
												 				</table>
											 				</td>
										 			</table>
										 		</td>
										</table>
										<div id='padding'> </div>
									</div>
						  		</li>




						  		<?php  
							// }
					} 	
					else if ( $item  == "pmember") 
					{  
  
					 	?>
						 	<li >
						 		<table id='user_table' border="0" cellpadding="0" cellspacing="0" onmouseout="img_mouseout('.user_mouserOver_c<?php echo  $con->mno; ?>','.user_contaner<?php echo  $con->mno; ?>')" > 
							 		<tr> 
							 			<td id='user_header_t' style='<?php echo $con->user_header_style; ?>' > 
												<div id='profilePic'> 
												 
												                      
												<?php  if ( file_exists($con->memExist.$con->mno.'.jpg' ) ) { ?> 
													<img src="<?php echo $con->member_img_directory.$con->mno.'.jpg'; ?>">
												<?php } else {  ?> 
													<img src="<?php echo $con->member_img_directory.'0.jpg'; ?>">
												<?php }?>
											</div>
												<div id='profileInfo'> 
													 	<span id='action'> 
															<?php  echo $con->user_act; ?>
														</span>
												</div>	 
												<div id='hiden' class='mheader_tp'> </div>
							 			</td> 
							 		<tr> 
						 				<td id='user_table_td2'  > 
						 					<div id='user_contaner' class='user_contaner<?php echo  $con->mno; ?>'> 
							 					<table border="0"  id='mem_table_c' onmouseover="img_mouseover('user','.user_contaner<?php echo  $con->mno; ?>','.user_mouserOver_c<?php echo  $con->mno; ?>')" >  
							 						<tr> 
								 						<td> 
									 						<table border="0" cellpadding="0" cellspacing="0" id='user_table_r1' > 
									 							<tr> 
									 								<td>  <img id='imgman'  src="fs_folders/images/body/Member/member icon.png"></td>
									 								<td>  <span id='mprecentage'>  <?php echo $con->mem_rating_percatage; ?> % </span> </td>
									 								<td>  <span id='mesage_text' > ( <?php echo $con->mem_rating_total; ?> ) RATINGS  </span> <img id = "user_mesage_img" src="fs_folders/images/body/Member/transparent-bubble.png"></td>
								 							</table>
								 						</td>  
													<tr>   
								 						<td> 
								 							<table border="0" cellpadding="0" cellspacing="0" id='user_table_r2'> 
									 							<tr> 
									 								<td id='utr2_td1'  > <img id='fcheck'  src="fs_folders/images/body/Member/check.png"></td>
									 								<td id='utr2_td2'  > <span id='ftext'>FOLLOWERS </span><span id='tf1' > <?php echo $con->mem_total_followers; ?> </span></td>   
									 								<td id='utr2_td3'  > <span id='bar'> / </span> </td>
									 								<td id='utr2_td4'  > <span id='ftext'>FOLLOWING </span><span id='tf2' > <?php echo $con->mem_total_following; ?> </span> </td> 
								 							</table>
								 						</td>
								 					<tr> 
								 						 
							 					</table>
							 				 
						 						<div id='mem_bg_footer'    > 
						 							 
						 						</div>
						 					</div>

						 					<div id='user_mouserOver_c' class='user_mouserOver_c<?php echo  $con->mno; ?>' onmouseover="img_mouseover('user','.user_contaner<?php echo  $con->mno; ?>','.user_mouserOver_c<?php echo  $con->mno; ?>')" > 
						 					  	

						 					  	<div id='mouserOver_content'>

						 					  	 	 <table border="0" cellpadding="0" cellspacing="0" id='hover_user_t1' width="100%" > 
									 					<tr> 
									 						<td  id='hup'   >  </td> <tr>
										 					<td>  <img id='imgman_hover' src="fs_folders/images/body/Member/member icon.png"></td>
										 					<td>  <span id='mprecentage_hover'>  <?php echo $con->mem_rating_percatage; ?> % </span> </td>
										 					<td>  <span id='mesage_text_hover' > ( <?php echo $con->mem_rating_total; ?> ) RATINGS  </span> <img id = "user_mesage_img_hover" src="fs_folders/images/body/Member/transparent-bubble.png"> </td>
								 					</table>
								 					<table border="0" cellpadding="0" cellspacing="0" id='user_table_r2'> 
									 					<tr> 
									 						<td id='utr2_td1'  > <img id='fcheck'  src="fs_folders/images/body/Member/check.png"></td>
									 						<td id='utr2_td2'  > <span id='ftext'>FOLLOWERS </span><span id='tf1' > <?php echo $con->mem_total_followers; ?> </span></td>   
									 						<td id='utr2_td3'  > <span id='bar'> / </span>  </td>
									 						<td id='utr2_td4'  > <span id='ftext'>FOLLOWING </span><span id='tf2' > <?php echo $con->mem_total_following; ?> </span> </td> 
								 					</table>

								 					<table border="0" id='td_title' > 
								 						<tr> 
								 							<td id='uptd'> </td> <tr> 
								 							<td> 
								 								<div  id='user_title' > 
								 									<span >  
									 									<?php 
									 										// echo strtoupper($firstname.' '.$lastname.' '.$middlename)."<br>";
									 										// echo strtoupper($occupation)."<br>";
									 										// echo strtoupper($cc);
									 										// echo  strtoupper($mc->convert_date_format_profile($datejoined));
									 										// unset($cc);

									 										echo strtoupper($con->minfo);
									 										unset($con->minfo);
									 								 
									 									?>
								 									</span> 
								 								</div>
								 							</td> 
								 						<tr> 
								 							<td> 

								 							<div  id='user_desc' > 
								 								<span> 
								 									<!-- Nullem quis risus eget urna mollis ornare vel eu leo.
								 									Vevamus sagittis lacus ve augue 
								 									laorest retrum faucibus dolor auctor.
								 									Crass justo odio dapibus ac facisies in . 
								 									egestas eget quam maecenas sed diam eget risus. -->
								 									<?php 
								 										echo $con->aboutme; 
								 									?>
								 								</span> 
								 							</div>
								 							
								 							</td>
								 					</table>

								 					
						 						</div>
						 						
						 					 	<div id='user_mouserOver_bg'  > 	 
						 						</div>  

						 					

						 					</div>

						 					<table border="0" cellpadding="0" cellspacing="0" id='user_hover_footer'   onmouseover="img_mouseover('user','.user_contaner<?php echo  $con->mno; ?>','.user_mouserOver_c<?php echo  $con->mno; ?>')"  > 
										 				<tr> 
										 					<td> <img  id = 'percentage'   src="fs_folders/images/body/Member/small look icon.png"     title="look" > </td>
										 					<td> <span> <?php echo $con->mem_total_look ; ?>   </span>  </td>
										 					<td> <img id='text_blog'       src="fs_folders/images/body/Member/small media icon.png"    title="media"  > </td>
										 					<td> <span> <?php echo $con->mem_total_media; ?>   </span>  </td>
										 					<td> <img id='text_blog'       src="fs_folders/images/body/Member/small article icon.png"  title="article"  > </td>
										 					<td> <span> <?php echo $con->mem_total_article; ?> </span>  </td>
										 					<td> <img id='user_eye'        src="fs_folders/images/body/Member/views icon.png"          title="views"  > </td>
										 					<td> <span> <?php echo $con->mem_total_views ; ?>   </span> </td>
									 				
								 				</table>

						 					<!-- <img id='user_img' src="fs_folders/images/member/<?php echo $user_id; ?>.jpg"  onmouseover="img_mouseover('user','.user_contaner<?php echo  $con->mno; ?>','.user_mouserOver_c<?php echo  $con->mno; ?>')"  )  > -->
											
											<?php  
												if ( file_exists($con->memExist.$con->mno.'.jpg') ) {?>
													<img id='user_img' src="<?php  echo $con->member_img_directory.$con->mno.'.jpg'?>"  onmouseover="img_mouseover('user','.user_contaner<?php echo  $con->mno; ?>','.user_mouserOver_c<?php echo  $con->mno; ?>')"  )  ><?php 
						 						} else {?>
						 							<img id='user_img' src="<?php  echo $con->member_img_directory.'0.jpg'?>"  onmouseover="img_mouseover('user','.user_contaner<?php echo  $con->mno; ?>','.user_mouserOver_c<?php echo  $con->mno; ?>')"  )  > 
												<?php } ?>
											<div id='mem_padding'> </div>
						 				</td>
						 		</table> 
						 	</li>








						 	<?php 
							// }
					} 
					else if ( $item  == "particle") 
					{  
						if ( !empty(  $con->latest_item ) )  #latest  
						{
							$article_Id = $con->article_Id; 
							$posted_articles=selectV1(
								'*',
								'fs_postedarticles',
								array("article_Id"=>$article_Id) 
							); 
							if ( !empty($posted_articles[0]['article_extension']) ){ $article_extension = $posted_articles[0]['article_extension']; } else { $article_extension = "jpg";  }
							$img_article  			= $con->article_img_directory.$article_Id.".$article_extension";
							$article_type		    = $posted_articles[0]['article_type'];	
							if ($article_type == "video" ) { $article_source_item    = $pa->get_video_embeded_code( $posted_articles[0]['article_source_item'] ); }else { $article_source_item = $posted_articles[0]['article_source_item'];}
							$article_title      	= $posted_articles[0]['article_title'];
							$article_description 	= $posted_articles[0]['article_description'];
							$article_source_url  	= $posted_articles[0]['article_source_url'];
							// echo " 
							// 	article_extension = $article_extension <br>
							// 	img_article = $img_article <br>
							// 	article_source_item = $article_source_item <br>
							// 	article_Id = $article_Id <br>
							// 	article_title = $article_title <br>
							// 	article_description = $article_description <br>
							// 	article_source_url = $article_source_url <br>
							// 	article_type = $article_type <br>
							// ";

						}
						else 
						{ 
							// echo " empty or not article tab <br>";
							$article_extension 	=  $activity[$i]['article_extension'];  
							if ( empty( $article_extension ) ) { $article_extension = "jpg"; }
							$img_article  			= $con->article_img_directory.$activity[$i]['article_Id'].".$article_extension";
							$article_source_item    = $pa->get_video_embeded_code( $activity[$i]['article_source_item'] );
							$article_Id   			= $activity[$i]['article_Id'];
							$article_title      	= $activity[$i]['article_title'];
							$article_description 	= $activity[$i]['article_description'];
							$article_source_url  	= $activity[$i]['article_source_url'];
							$article_type		    = $activity[$i]['article_type'];
							 
						}
						
						// vimeo links : http://vimeo.com/30574825

						 ?>
						<li > 
							<div id="article_height_width" class="article_container_div"    >
								<table  id='article_t' border="0" cellpadding="0" cellspacing="0"  >
									<tr> <!-- img and video -->
										<td id='user_header_t' style='<?php echo $con->user_header_style; ?>' > 
											<div id='profilePic'> 
												<?php  
													if ( file_exists($con->memExist.$con->mno.'.jpg') ) 
													{
														?> 
														<img src="<?php echo $con->member_img_directory.$con->mno.'.jpg'; ?>"><?php 
													} 
													else 
													{
														?> 
														<img src="<?php echo $con->member_img_directory.'0.jpg'; ?>"><?php 
													}  
														?>
 
												</div>
												<div id='profileInfo'> 
													<span id='action'> 
														<?php  

															echo $con->user_act;
														 	// echo " mno = $con->mno ";
										 
														?>
													</span>
												</div>	 
												<div id='hiden' class='mheader_am'> </div>
								 			</td> 
								 	<tr>
										<?php 
											if ( $article_type == "video") 
											{  
												?>
												<td id="article_video_td"> 
												
													<?php if ( $pa->vedio_type == "youtube" ) 
													{ ?>
														<iframe  width="285" height="285" src="//www.youtube.com/embed/<?php echo $article_source_item; ?>" frameborder="0" allowfullscreen title="<?php echo $article_Id; ?>" ></iframe> <?php 
													}
													else 
													{   ?>
														<iframe src="//player.vimeo.com/video/30574825" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><?php 
													} ?>	
												</td><?php 
											} 
											else 
											{ 
												?>
												<td id="article_img_td"> 
													 <img id="article_img" src="<?php echo$img_article;?>" title="<?php echo $article_title; ?>" >
												</td><?php 
											} 
												?> 
 
									 <tr> <!-- title and description -->
										<td id="article_body_td" > 
											<span id="article_title2" > <!-- ITS SATURDAY ROUND-UP. COME AND SEE THE WEEK RECAP.  -->
												<?php echo str_replace("quattasd", "'",$article_title); ?> 
											</span> <br> 
											<span id="article_description" > 
													<?php echo  str_replace("quattasd", "'",$article_description); ?> <!-- She's Back! Exclusive Excerpt from Helen Fielding's Bridget Jones: Mad About the BoyShe's Back! Our favorite hapless heroine returns after a decade-plus hiatus, juggling two kids, potential boyfriends, smug marrieds, rogue gadgets, and her nascent Twitter feed. -->
												..<a id="article_link" href="postarticleview?url=<?php echo str_replace("."," ", $article_source_url); ?>"> more </a> 
											</span> <br>  	
										</td>
									<tr> <!-- footer icons -->
										<td id="article_footer_td"> 
										    <div id="article_footer_content_dv"> 
				 								<center>
												    <table id="aticle_footer_table1" border="0" cellspacing="0" cellpadding="0" > 
												    	<tr>
												    		<td> 
												    			<img src="fs_folders/images/body/article/text_blog.png">
												    		</td> 
												    		<td> 
												    			<table border="0" cellpadding="0" cellspacing="0" > 
												    				<tr> 
												    					<td width="50"> 
												    						<center><img src="fs_folders/images/body/article/comment icon.png"></center>	
												    					</td> 
												    					<td width="50"> 
												    						<center><img src="fs_folders/images/body/article/views icon.png"></center>	
												    					</td> 
												    					<td width="50"> 
												    						<center><img src="fs_folders/images/body/article/redrip.png"></center>	
												    					</td> 
												    					<td> 
												    						<center><img src="fs_folders/images/body/article/total_heart1.png"></center>	
												    					</td>
												    				<tr>
												    					<td> 
												    						<center> <span> 9999 </span> </center> 
												    					</td> 
												    					<td> 
												    					 	<center> <span> 9999 </span> </center> 	
												    					</td>
												    					<td> 
												    					 	<center> <span> 9999+ </span> </center> 
												    					</td> 
												    					<td> 
												    					 	<center> <span> 9999+ </span> </center> 
												    					</td>
												    			</table>
												    		</td>  
												    </table>
												</center>
											</div>
											<img id="article_footer_bg" src="fs_folders/images/body/article/transparent rectangle.png">
										</td>
								</table>
							</div>
							<div id='article_padding'> </div>
						</li>


						<?php
					} 
					else if ( $item  == "pmedia") 
					{   
 
						if ( !empty(  $con->latest_item ) ) #latest
						{
							$media_id = $con->media_Id;
							$posted_media=selectV1(
								'*',
								'fs_postedmedia',
								array("media_id"=>$media_id) 
							);
							if ( !empty($posted_media[0]['media_extension']) ) {  
							$media_extension 	= $posted_media[0]['media_extension'];}else {$media_extension = "jpg"; }
							$img_media			= $con->media_img_directory.$media_id.".$media_extension";
							$media_type		    = $posted_media[0]['media_type'];	
							if ($media_type == "video" ){ $media_source_item    = $pa->get_video_embeded_code( $posted_media[0]['media_source_item'] );	}else { $media_source_item    = $posted_media[0]['media_source_item'];	}
							$media_title      	= $posted_media[0]['media_title'];
							$media_description 	= $posted_media[0]['media_description'];
							$media_source_url  	= $posted_media[0]['media_source_url'];
							// echo " 
							// 	media_extension = $media_extension <br>
							// 	img_media = $img_media <br>
							// 	media_source_item = $media_source_item <br>
							// 	media_Id = $media_Id <br>
							// 	media_title = $media_title <br>
							// 	media_description = $media_description <br>
							// 	media_source_url = $media_source_url <br>
							// 	media_type = $media_type <br>
							// ";
						}
						else 
						{  
							$media_extension 	=  $activity[$i]['media_extension'];  
							if ( empty( $media_extension ) ) { $media_extension = "jpg"; }
							$img_media  		= $con->media_img_directory.$activity[$i]['media_id'].".$media_extension";
							$media_source_item	= $pa->get_video_embeded_code( $activity[$i]['media_source_item'] );
							$media_id   		= $activity[$i]['media_id'];
							$media_title      	= $activity[$i]['media_title'];
							$media_description 	= $activity[$i]['media_description'];
							$media_source_url  	= $activity[$i]['media_source_url'];
							$media_type		    = $activity[$i]['media_type'];
						} 
					 ?>
						<li > 
							<div id="article_height_width" class="article_container_div"    >
								<table  id='article_t' border="0" cellpadding="0" cellspacing="0"  >
									<tr> <!-- user modal -->
										<td id='user_header_t' style='<?php echo $con->user_header_style; ?>' > 
											<div id='profilePic'> 
												<?php  
													if ( file_exists($con->memExist.$con->mno.'.jpg') ) 
													{
														?> 
														<img src="<?php echo $con->member_img_directory.$con->mno.'.jpg'; ?>"><?php 
													} 
													else 
													{
														?> 
														<img src="<?php echo $con->member_img_directory.'0.jpg'; ?>"><?php 
													}  
														?>

											</div>
											<div id='profileInfo'> 
												<span id='action'> 
													<?php echo $con->user_act; ?>
												</span>
											</div>	 
											<div id='hiden' class='mheader_am'> </div>
							 			</td> 
									<tr> <!-- img and video -->
										<?php if ( $media_type == "video") {  ?>
											<td id="article_video_td"> 
												<iframe  width="285" height="285" src="//www.youtube.com/embed/<?php echo $media_source_item; ?>" frameborder="0" allowfullscreen title="<?php echo $article_Id; ?>" ></iframe>
											</td>
										<?php } else { ?>
											<td id="article_img_td"> 
												 <img id="article_img" src="<?php echo$img_media;?>" title="<?php echo $media_title; ?>" >
											</td>
										<?php } ?> 

									 <tr> <!-- title and description -->
										<td id="article_body_td" > 
											<span id="article_title2" > <!-- ITS SATURDAY ROUND-UP. COME AND SEE THE WEEK RECAP.  -->
												<?php echo str_replace("quattasd", "'",$media_title); ?> 
											</span> <br> 
											<span id="article_description" > 
													<?php echo  str_replace("quattasd", "'",$media_description); ?> <!-- She's Back! Exclusive Excerpt from Helen Fielding's Bridget Jones: Mad About the BoyShe's Back! Our favorite hapless heroine returns after a decade-plus hiatus, juggling two kids, potential boyfriends, smug marrieds, rogue gadgets, and her nascent Twitter feed. -->
												..<a id="article_link" href="postarticleview?url=<?php echo str_replace("."," ", $media_source_url); ?>"> more </a> 
											</span> <br>  	
										</td>
									<tr> <!-- footer icons -->
										<td id="article_footer_td"> 
										    <div id="article_footer_content_dv"> 
				 								<center>
												    <table id="aticle_footer_table1" border="0" cellspacing="0" cellpadding="0" > 
												    	<tr>
												    		<td> 
												    			<img src="fs_folders/images/body/article/text_blog.png">
												    		</td> 
												    		<td> 
												    			<table border="0" cellpadding="0" cellspacing="0" > 
												    				<tr> 
												    					<td width="50"> 
												    						<center><img src="fs_folders/images/body/article/comment icon.png"></center>	
												    					</td> 
												    					<td width="50"> 
												    						<center><img src="fs_folders/images/body/article/views icon.png"></center>	
												    					</td> 
												    					<td width="50"> 
												    						<center><img src="fs_folders/images/body/article/redrip.png"></center>	
												    					</td> 
												    					<td> 
												    						<center><img src="fs_folders/images/body/article/total_heart1.png"></center>	
												    					</td>
												    				<tr>
												    					<td> 
												    						<center> <span> 9999 </span> </center> 
												    					</td> 
												    					<td> 
												    					 	<center> <span> 9999 </span> </center> 	
												    					</td>
												    					<td> 
												    					 	<center> <span> 9999+ </span> </center> 
												    					</td> 
												    					<td> 
												    					 	<center> <span> 9999+ </span> </center> 
												    					</td>
												    			</table>
												    		</td>  
												    </table>
												</center>
											</div>
											<img id="article_footer_bg" src="fs_folders/images/body/article/transparent rectangle.png">
										</td>
								</table>
							</div>
							<div id='article_padding'> </div>
						</li>


						<?php
					}  
				}
			 
	 			$con->i++;
			}
		} // end loop
	}








?>
</div>









