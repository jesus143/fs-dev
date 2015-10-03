<?php  require('require_connect_modals.php'); $con = new connections (); $con->modal_connect(); ?>
<div id='imgs'> 

<?php 
	$mc = new  myclass(); 	
	$ri = new  resizeImage();

  		$tres = $_GET['tres']; 
  	$home_tab = $_GET['home_tab']; 



  	echo "  tres = $tres $home_tab = $home_tab";



	$con->calculate_show(12, intval($_GET['tres']) , $mc);
	$con->home_tabs_selected($home_tab , $mc);

	// while(false)

	$img_article = $con->article_img_directory."2.jpg"; 

  

	$coding = "postarticle"; 
	if ( $coding == "postarticle" ) 
	{
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
			</li>
<?php	
		}
	}
	else 
	{ 

		// for ($h=$con->show_start ; $h < $con->show_end; $h++) 
		for ($h=0 ; $h < 9; $h++) 
		{  
			if ( $con->i < $con->Tresults ) 
			{
	 			// $con->ads_counter($h);
	 			$con->latest_activity_sorting($mc , $ri , $con->i);
				if ( $con->activity[$con->i]['type'] == 'ads' or $con->latest_look[$con->i]['type'] == 'ads' or $con->all_users[$con->i]['type'] == 'ads' ) 
				{
					if ( !empty($con->activity[$con->i]['ads_id']) ) 
					{
						$ads = $con->activity[$con->i]['ads_id'];
					}
					else if ( !empty($con->latest_look[$con->i]['ads_id']) ) 
					{
						$ads = $con->latest_look[$con->i]['ads_id'];
					}
					else if ( !empty($con->all_users[$con->i]['ads_id']) ) 
					{
						$ads = $con->all_users[$con->i]['ads_id'];
					}
					?>
			 		<li > 
			 			<div id='padding_ads' style="<?php echo "$con->padding_ads_top" ?>" > </div>
			 			<div id='ads_container' > 
	 			 			<img id='ads_img'  src="fs_folders/images/ads/<?php  echo $ads; ?>" title='<?php  echo $ads; ?>' >
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
				}  
				else 
				{  
					if ($con->look and $con->look_open) 
					{   
						if ( file_exists($con->lookExist.$con->plno_pic.'.jpg' ) ) 
						{
							



							
						 ?>
							<li > 

								<div id="look_height_width" class="look_container_div"  style="<?php echo $con->look_height_width; ?>"  >
									 
									<table  id='look_t' border="0" cellpadding="0" cellspacing="0"  onmouseout="img_mouseout('.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>' , '.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>')" > 
										<tr>
											<td id='user_header_t' style='<?php echo $con->user_header_style; ?>' > 
													<div id='profilePic'> 
													<?php  if ( file_exists($con->memExist.$con->look_owner.'.jpg') ) {?> 
														<img src="<?php echo $con->member_img_directory.$con->look_owner.'.jpg'; ?>">
													<?php } else { 

														?> 
														<img src="<?php echo $con->member_img_directory.'0.jpg'; ?>">
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
																// echo "<br> width = ".$ri->getWidth();
																// echo "<br> height = ".$ri->getHeight().'<br>';
																// echo $con->i;	
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
												 			
											<?php 
									 			#not in use
									 			if ( $con->big_look ) 
									 				{ 																	?> 
											 			<div id='look_footer_bg_c' style="<?php echo $con->look_footer_bg_c; ?>" class='look_footer_bg_c<?php echo $con->plno; ?>' > 
											 				<table id='look_f_1row' border="0" onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?>  , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
											 					<tr>
											 					 	<td> <img  id = "percentage_img" <img src="fs_folders/images/body/Look/look icon.png" >  </td> 
											 					 	<td> <span id='percentage_text' > <?php echo $con->rating_percent;?> % </span></td> 
											 					 	<td> <span id='mesage_text' > RATE ( <?php echo $con->rating_total; ?> ) </span> <img id = "mesage_img" src="fs_folders/images/body/Look/transparent bubble.png" >  </td> 
											 				</table>


											 				<table id='look_f_2row'  border="0"  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?>  , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
											 					<tr>   	 
											 					<td> <img id='tmsg'  src="fs_folders/images/body/Look/comment icon.png"   title="comments" > </td> <td> <span> <?php echo $con->comment; ?>   </span> </td>
											 					<td> <img id='teye'  src="fs_folders/images/body/Look/views icon.png"     title="views"    > </td> <td> <span> <?php echo $con->view; ?>      </span> </td>
											 					<td> <img id='tarrw' src="fs_folders/images/body/Look/redrip.png"         title="drip"     > </td> <td> <span> <?php echo $con->redrip; ?>    </span> </td>
											 					<td> <img id='thrt'  src="fs_folders/images/body/Look/favorites icon.png" title="favorites"> </td> <td> <span> <?php echo $con->favorites; ?> </span> </td>
											 				</table>
												 			<div id='footer_bg' >  
												 			</div>
											 			</div>
											 			<?php 
									 				}																									?> 
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
									 								   
									 								<?php echo strtolower($mc->split_string_multiple($con->lookName , 15 , 20)); ?>	

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
									 			<div id='look_mouserOver_bg' class='look_mouserOver_bg<?php echo $con->plno; ?>'  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
									 			</div>
		 							 			<!-- <img id='look_img' src="fs_folders/images/posted look/<?php echo $look_id; ?>.jpg"  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > -->
									 			<!-- <div id='body_auto_background' class='body_auto_background<?php echo $con->plno; ?>' onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')" >  </div>  -->
									 			<table border="0" cellpadding="0" cellspacing="0" >  
										 			<tr> 
										 				<td  id="img_container_td" class="img_container_td<?php echo $con->plno; ?>" > 

										 					<img id='look_img' style="<?php echo $min_look_hight; ?>"   src="<?php  echo $con->look_img_directory.$con->plno_pic.'.jpg'?>"  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .body_auto_background<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>','.img_container_td<?php echo $con->plno; ?>' , '.look_mouserOver_bg<?php echo $con->plno; ?>')"  >
										 				</td>
										 			<tr>  
										 				<td>
										 					<div id='look_footer_bg_c' style="margin-top:-96px;"  class='look_footer_bg_c<?php echo $con->plno; ?>' > 
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
					  		</li><?php  
						}
					} 
					if ($con->blog and $con->blog_open ) 
					{   ?>
				 	 	<li >
					 	 	<table border="0" cellpadding="0" cellspacing="0"> 
					 	 		<tr>
					 	 			<td> 
					 	 				<div id='blog_c'> 
								 		 	
								 		 	<div id='right_img'> 
								 		 		 <img id='txblg'  src="fs_folders/images/attr/text_blog.png">
								 		 	</div>
								 			<table id='blog_row_one'  border="0"    > 
								 				<tr>   
								 				<td> <img id='tmsg'  src="fs_folders/images/attr/total_message.png"> </td>  
								 				<td> <img id='teye'  src="fs_folders/images/attr/total_eye.png">     </td>  
								 				<td> <img id='tarrw' src="fs_folders/images/attr/total_arrow.png">   </td>  
								 				<td> <img id='thrt'  src="fs_folders/images/attr/total_heart.png">   </td>  
								 				<tr>
								 				<td> <span> 9999 </span> </td>
												<td> <span> 9999 </span> </td>  
												<td> <span> 9999+ </span> </td>
												<td> <span> 9999+ </span> </td>
								 			</table>
									 		<div id='footer_bg_blog' >  
									 		</div>
								 		</div>
					 	 				<img id='blog_img' src="fs_folders/images/posted look/<?php echo $blog_id; ?>.jpg" >
					 	 			</td>
					 	 	</table>
							<div id='padding'> </div>
						 </li >			 
						<?php  
					}  
					if ($con->photo and $con->blog_open ) 
					{   ?>

					 	<li >

						 	<table border="0" cellpadding="0" cellspacing="0"> 
					 	 		<tr>
					 	 			<td> 
					 	 				<div id='blog_c'> 
								 		 	
								 		 	<div id='right_img'> 
								 		 		 <img id='txblg'  src="fs_folders/images/attr/frame_photo.png">
								 		 	</div>
								 			<table id='blog_row_one'  border="0"    > 
								 				<tr>   
								 				<td> <img id='tmsg'  src="fs_folders/images/attr/total_message.png"> </td>  
								 				<td> <img id='teye'  src="fs_folders/images/attr/total_eye.png">     </td>  
								 				<td> <img id='tarrw' src="fs_folders/images/attr/total_arrow.png">   </td>  
								 				<td> <img id='thrt'  src="fs_folders/images/attr/total_heart.png">   </td>  
								 				<tr>
								 				<td> <span> 9999 </span> </td>
												<td> <span> 9999 </span> </td>  
												<td> <span> 9999+ </span> </td>
												<td> <span> 9999+ </span> </td>
								 			</table>
									 		<div id='footer_bg_blog' >  
									 		</div>
								 		</div>
					 	 				<img id='blog_img' src="fs_folders/images/posted look/<?php echo $photo_id; ?>.jpg" >
					 	 			</td>
					 	 	</table>
							 
							<div id='padding'> </div>
					 	</li><?php 
					} 
					if ($con->user and $con->user_open ) 
					{   ?>
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
					 								bg
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
										<div id='padding'> </div>
					 				</td>
					 		</table> 
					 	</li><?php 
						// }
					} 
				}
	 		$con->i++;
			}
		} // end loop
	}
?>
</div>
