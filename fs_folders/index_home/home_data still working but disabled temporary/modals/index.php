<?php  require('require_connect_modals.php'); $con = new connections (); $con->local_connect(); ?>
<div id='imgs'> 

<?php 
	$usr = new  myclass();
  	
  	$tres = $_GET['tres']; 
	$con->calculate_show(8, intval($_GET['tres']) , $usr);

	$con->home_tabs_selected($_GET['home_tab'] , $usr);
 
 	//  new do it once at a time
	// $con->latest_look  = get_all_look_latest();       
	// $con->all_users    = $usr->get_all_user();
 
	// $Tlatest_look = count($con->latest_look);
	// $Tall_users   = count($con->all_users);
	// end do it onece at a time

	// print_r($con->activity);



	// echo "<br>";
	  // $Tresults  =  2; //count($con->activity); 

	// for ($i=0; $i <count($con->activity) ; $i++) 
	// { 
		// echo ' con->mno = '.$con->activity[$i]['con->mno'].'<br>';	 
		// echo ' action = '.$con->activity[$i]['action'].'<br>';	 
		// echo ' _table = '.$con->activity[$i]['_table'].'<br>';	 
		// echo ' _table_id = '.$con->activity[$i]['_table_id'].'<br>';	
		

		// echo "user is name is = ". $usr->get_full_name_by_id($con->activity[$i]['con->mno']); 
		// echo " rate comment and favorite a look ";
		// echo "by = ".$usr->get_full_name_by_look_id($con->activity[$i]['_table_id']); 
		// echo "<br>";


		// $action = $con->activity[$i]['_table']; 


		// if ( $action == 'postedlooks' ) 
		// {
		// 	 echo "post look";
		// 	 $con->look = true;
		// }
		// else if ( $action == 'Postedblog') 
		// { 
		//   	echo "post blog";
		// } 
		// else if ( $action == 'Postedphoto' ) 
		// { 
		// 	echo "post photo";
		// } 
		// else if ( $action == 'Joined' ) 
		// { 
		// 	echo "post member";
		// }


	 



	// }
	// $Tresults = 10;

	// echo " <br> <br> Tresult = ".$con->Tresults." <br>";






















	

	for ($h=$con->show_start ; $h < $con->show_end; $h++) 
	{  
		if ( $con->i < $con->Tresults ) 
		{


		 




 



 
 		// con->mno,firstname,lastname,middlename,occupation,country,aboutme,datejoined
		 



		// $uinfo = $usr->user($con->plno);
		// print_r($lingfo);

	 
		// new user info 
	  		// $con->look_owner = $lingfo['con->mno']; 
	  		// $con->lookName   =  'look name'; //$lingfo['con->lookName']; 
	  		// $con->lookAbout  ='look desc'; //$lingfo['con->lookAbout']; 
	  		// $lookOwnerName  = $lingfo['lookOwnerName']; 
	  	// end user info 

  		// echo "look owner = $lookOwnerName ";
  		// echo $con->lookAbout.' '.$con->lookName ;



		// $con->ads_counter();	
	  	// new quee ads first of all 


			$con->ads_counter($h);

	  		// if ($con->ads_position == 'two' ) 
	  		// {	
	  		// 	$con->c++; 

	  		// 		// echo "string";
	  		// 	 if ( $h ==  2) 
	  		// 	 {   
		  	// 		$con->ads_position = '10 and so on..';
					// // $con->c=0;
					// $con->c=1;

				 //    $con->look  = false;   
					// $con->blog  = false;   
					// $con->photo = false;    
				 //    $con->user  = false;    
					// $con->ads   = true;       
	  		// 	 }
	  		// }
	  		// else if  ( $con->ads_position == '10 and so on..' ) 
	  		// {
	  		// 	$con->c++; 
	  		// 	if ( $con->c == 9 ) 
	  		// 	{ 
					// // $con->c = 0;
					// $con->c = 1;
				 //    $con->look  = false;   
					// $con->blog  = false;   
					// $con->photo = false;    
				 //    $con->user  = false;    
					// $con->ads   = true;    
	  		// 	}
	  		// }

	  		// $_SESSION['c'] = $con->c; 
	  		// $_SESSION['ads_counter'] = $con->ads_counter; 
	  	// end quee ads first of all 


			$con->latest_activity_sorting($usr);



		?>








			<?php   
			if ($con->ads and $con->ads_open) 
				{   	

					if ($con->home_tab == 'lates') 
					{
						$con->look  = true; 
						$con->blog  = true;
						$con->photo = true;
					    $con->user  = true;
						$con->ads   = false;
						$ads_id = 1; 
					}
					else 
					{  
						$con->look  = true; 
						$con->blog  = true;
						$con->photo = true;
					    $con->user  = true;
						$con->ads   = false;
						$ads_id = 1; 
					}


																													?>
		 		<li >
		 			 <div id='ads_container' > 
		 			  
		 			 			 
			 			 			<img id='ads_img' src="images/ads/<?php echo $ads_id; ?>.png" >
			 			 			<div id='ads_desc'  > 
					 			 		<span> 
						 			 		This 300 x 250 square block AD is placed prominently 
						 			 		above-the-fold on the feed. 
						 			 		This is the first AD readers will see.
					 			 		</span>
				 			 		</div>
			 			 		 
		 			 		 
		 			  
		 			 </div>
					


					<div id='padding_ads'> </div>
			  	</li>
			<?php } ?>



			<?php  
			if ($con->look and $con->look_open) 
			{   

				// if ( $con->i < $Tlatest_look   ) 
				// {                     
				 ?>
					<li >
						<table  id='look_t' border="0" cellpadding="0" cellspacing="0"  onmouseout="img_mouseout('.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>' , '.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>')" > 
							<tr>
								<td id='user_header_t' style='<?php echo $con->user_header_style; ?>' > 
										<div id='profilePic'> 
										 
										 <?php

										  // echo "h = $h || i = $con->i c = ".$con->c."<br>";

										  ?>



										<?php  if ( file_exists($con->memExist.$con->look_owner.'.jpg') ) {?> 
											<img src="<?php echo $con->member_img_directory.$con->look_owner.'.jpg'; ?>">
										<?php } else { ?> 
											<img src="<?php echo $con->member_img_directory.'0.jpg'; ?>">
										<?php }?>



									</div>
										<div id='profileInfo'> 
											<!-- <span id='fullname1'>  -->

												<!-- John JerryMcMorpherson Jenkins  --> <?php //echo $lookOwnerName; ?>
												<?php 
													// echo $usr->get_full_name_by_id($con->activity[$con->i]['con->mno']); 
												?>

											<!-- </span> <br> -->
											<!-- <span id='action'>     -->
												<?php 
													// echo $con->activity[$con->i]['action'].' a look by ';
												?>
												<!-- rated , commented and favorite a look by   -->
											<!-- </span> <br> -->

											<!-- <span id='fullname2'>  -->
												<!-- Ashley Marie Simpson -->
												<?php 
													// echo  $usr->get_full_name_by_look_id($con->activity[$con->i]['_table_id']);

												?>
											<!-- </span>   -->
											<span id='action'> 
												<?php  echo $con->user_act; ?>
											</span>
										</div>	 
										<div id='hiden' class='mheader_tp'> </div>
					 			</td> 
				 			<tr>
						 		<td>   
						 		<?php  
						 			// echo " total look = $Tlatest_look ";
						 		?>
						 		 
						 			<table border="0" id='rate' class='rate<?php echo $con->plno; ?>' onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
						 				<tr> 
						 					<td> <img src="images/attr/white_star.png" >  </td>
						 					<td> <img src="images/attr/white_star.png" >  </td>
						 					<td> <img src="images/attr/white_star.png" >  </td>
						 					<td> <img src="images/attr/black_star.png" >  </td>
						 					<td> <img src="images/attr/black_star.png" >  </td>

						 			</table>
						 			<div id='look_footer_bg_c' class='look_footer_bg_c<?php echo $con->plno; ?>' > 
						 				<table id='look_f_1row' border="0" onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
						 					<tr>
						 					 	<td> <img  id = "percentage_img" src="images/attr/percentage.jpg" > </td> 
						 					 	<td> <span id='percentage_text' > 100 % </span></td> 
						 					 	<td> <span id='mesage_text' > RATE (99999+) </span> <img id = "mesage_img" src="images/attr/mesage.png">  </td> 
						 				</table>
						 				<table id='look_f_2row'  border="0"  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
						 					<tr>   
						 					<td> <img id='tmsg' src="images/attr/total_message.png"> </td> <td> <span> 9999 </span> </td>
						 					<td> <img id='teye' src="images/attr/total_eye.png"> </td> <td> <span> 9999 </span> </td>
						 					<td> <img id='tarrw' src="images/attr/total_arrow.png"> </td> <td> <span> 9999+ </span> </td>
						 					<td> <img id='thrt' src="images/attr/total_heart.png"> </td> <td> <span> 9999+ </span> </td>
						 				</table>
							 			<div id='footer_bg' >  
							 			</div>
						 			</div>

	 								
	 								<div id='look_mouserOver_c' class='look_mouserOver_c<?php echo $con->plno; ?>'> 
	 									<table id='look_f_1row' border="0" onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')" > 
						 					<tr>
						 					 	<td> <img  id = "percentage_img" src="images/attr/percentage.jpg" > </td> 
						 					 	<td> <span id='percentage_text' > 100 % </span></td> 
						 					 	<td> <span id='mesage_text' > RATE (99999+) </span> <img id = "mesage_img" src="images/attr/mesage.png">  </td> 
						 				</table>
						 				<table id='title_desc_t' border="0" onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')" > 
						 					<tr> 
						 						<td> 
						 							<div  id='tdpadding' > 
						 								paddding 
						 							</div>   
						 						</td> 
						 					<tr>
						 						<td id='title_desc_container' onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
						 							<span id='look_title' >  
						 								<!-- ETIAM PORTA SEM MALESUADA MAGNA MOLLIS EUISMOD.  -->
						 								<?php echo $con->lookName; ?>	

						 							</span> 
						 						</td> 
						 					<tr> 
						 						<td id='title_desc_container' onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 

						 							<span id='look_desc' >  
							 						<!-- 	Nullam quis risus eget urna  vicomte was a nice-looking young man with soft features and polished manners, who evidently considered himself a celebrity but out of politeness modestly placed himself at the disposal of the circle in which he found himself. 
							 							The vicomte was a nice-looking young man with soft features and polished manners The vicomte was a nice-looking young man with soft features and polished manners.
							 							The vicomte was a nice-looking young man with soft features and polished manners The vicomte. -->
							 							<?php echo $con->lookAbout; ?>	
							 							
						 							</span> 
						 						</td>
						 				</table>
						 				<table id='look_f_2row1'  border="0"  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
								 			<tr>   
									 			<td> <img id='tmsg' src="images/attr/total_message.png"> </td> <td> <span> 9999 </span> </td>
									 			<td> <img id='teye' src="images/attr/total_eye.png"> </td> <td> <span> 9999 </span> </td>
									 			<td> <img id='tarrw' src="images/attr/total_arrow.png"> </td> <td> <span> 9999+ </span> </td>
									 			<td> <img id='thrt' src="images/attr/total_heart.png"> </td> <td> <span> 9999+ </span> </td>
								 		</table>
	 								</div>
						 			<div id='look_mouserOver_bg' class='look_mouserOver_bg<?php echo $con->plno; ?>'  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > 
						 			</div>
						 			<!-- <img id='look_img' src="images/posted look/<?php echo $look_id; ?>.jpg"  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  > -->
						 			<img id='look_img' src="<?php  echo $con->look_img_directory.$con->plno_pic.'.jpg'?>"  onmouseover="img_mouseover('look','.rate<?php echo $con->plno; ?> , .look_footer_bg_c<?php echo $con->plno; ?>','.look_mouserOver_bg<?php echo $con->plno; ?> , .look_mouserOver_c<?php echo $con->plno; ?>')"  >
									


						 			


						 		</td>
						</table>
						<div id='padding'> </div>
			  		</li><?php  
				// }
			} 
			?> 


			<?php   if ($con->blog and $con->blog_open ) {   ?>
		 	 	<li >

		 	 	<table border="0" cellpadding="0" cellspacing="0"> 
		 	 		<tr>
		 	 			<td> 
		 	 				<div id='blog_c'> 
					 		 	
					 		 	<div id='right_img'> 
					 		 		 <img id='txblg'  src="images/attr/text_blog.png">
					 		 	</div>
					 			<table id='blog_row_one'  border="0"    > 
					 				<tr>   
					 				<td> <img id='tmsg'  src="images/attr/total_message.png"> </td>  
					 				<td> <img id='teye'  src="images/attr/total_eye.png">     </td>  
					 				<td> <img id='tarrw' src="images/attr/total_arrow.png">   </td>  
					 				<td> <img id='thrt'  src="images/attr/total_heart.png">   </td>  
					 				<tr>
					 				<td> <span> 9999 </span> </td>
									<td> <span> 9999 </span> </td>  
									<td> <span> 9999+ </span> </td>
									<td> <span> 9999+ </span> </td>
					 			</table>
						 		<div id='footer_bg_blog' >  
						 		</div>
					 		</div>
		 	 				<img id='blog_img' src="images/posted look/<?php echo $blog_id; ?>.jpg" >
		 	 			</td>
		 	 	</table>

					


					<div id='padding'> </div>
				 </li >
			 
			<?php  } ?> 

			<?php   if ($con->photo and $con->blog_open ) {   ?>
			 	<li >

				 	<table border="0" cellpadding="0" cellspacing="0"> 
			 	 		<tr>
			 	 			<td> 
			 	 				<div id='blog_c'> 
						 		 	
						 		 	<div id='right_img'> 
						 		 		 <img id='txblg'  src="images/attr/frame_photo.png">
						 		 	</div>
						 			<table id='blog_row_one'  border="0"    > 
						 				<tr>   
						 				<td> <img id='tmsg'  src="images/attr/total_message.png"> </td>  
						 				<td> <img id='teye'  src="images/attr/total_eye.png">     </td>  
						 				<td> <img id='tarrw' src="images/attr/total_arrow.png">   </td>  
						 				<td> <img id='thrt'  src="images/attr/total_heart.png">   </td>  
						 				<tr>
						 				<td> <span> 9999 </span> </td>
										<td> <span> 9999 </span> </td>  
										<td> <span> 9999+ </span> </td>
										<td> <span> 9999+ </span> </td>
						 			</table>
							 		<div id='footer_bg_blog' >  
							 		</div>
						 		</div>
			 	 				<img id='blog_img' src="images/posted look/<?php echo $photo_id; ?>.jpg" >
			 	 			</td>
			 	 	</table>
					 
					<div id='padding'> </div>
			 	</li>
			<?php } ?>

			<?php   
			if ($con->user and $con->user_open ) 
			{   

				// if( $con->i < $Tall_users ) 
				// {  
			 ?>
			 	<li >
			 		<table border="0" cellpadding="0" cellspacing="0" onmouseout="img_mouseout('.user_mouserOver_c<?php echo  $con->mno; ?>','.user_contaner<?php echo  $con->mno; ?>')" > 
				 		<tr> 
				 			<td id='user_header_t' style='<?php echo $con->user_header_style; ?>' > 
									<div id='profilePic'> 
									<?php  
									  // echo "h = $h || i = $con->i c = ".$con->c."<br>";
									  // echo  " c = ".$con->c." h = $h ".' show start = '.$con->show_start.' show end = '.$con->show_end ." i = [$con->i] & total user =  ".count($con->all_users).' con->mno = '.$con->mno; 
									?>
									<!-- <img src="images/member/profile.jpg"> -->
									<?php  if ( file_exists($con->memExist.$con->mno.'.jpg') ) {?> 
										<img src="<?php echo $con->member_img_directory.$con->mno.'.jpg'; ?>">
									<?php } else { ?> 
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
			 				<td> 
			 					<div id='user_contaner' class='user_contaner<?php echo  $con->mno; ?>'> 
				 					<table border="0"  id='mem_table_c' onmouseover="img_mouseover('user','.user_contaner<?php echo  $con->mno; ?>','.user_mouserOver_c<?php echo  $con->mno; ?>')" >  
				 						<tr> 
					 						<td> 
						 						<table border="0" cellpadding="0" cellspacing="0" id='user_table_r1' > 
						 							<tr> 
						 								<td>  <img id='imgman'  src="images/attr/man.png"></td>
						 								<td>  <span id='mprecentage'>  100 % </span> </td>
						 								<td>  <span id='mesage_text' >  99999+ RATINGS  </span> <img id = "user_mesage_img" src="images/attr/mesage.png"></td>
					 							</table>
					 						</td>  
										<tr>   
					 						<td> 
					 							<table border="0" cellpadding="0" cellspacing="0" id='user_table_r2'> 
						 							<tr> 
						 								<td id='utr2_td1'  > <img id='fcheck'  src="images/attr/fcheck.png"></td>
						 								<td id='utr2_td2'  > <span id='ftext'>FOLLOWERS </span><span id='tf1' >9999+</span></td>   
						 								<td id='utr2_td3'  > <span id='bar'> / </span> </td>
						 								<td id='utr2_td4'  > <span id='ftext'>FOLLOWING </span><span id='tf2' >9999+</span> </td> 
					 							</table>
					 						</td>
					 					<tr> 
					 						 
				 					</table>
				 					<table border="0" cellpadding="0" cellspacing="0" id='user_table_r3' > 
						 				<tr> 
						 					<td> <img  id = 'percentage' src="images/attr/percentage.jpg" > </td>
						 					<td> <span> 9999 </span> </td>
						 					<td> <img id='text_blog'  src="images/attr/frame_photo.png"> </td>
						 					<td> <span> 9999 </span> </td>
						 					<td> <img id='text_blog'  src="images/attr/text_blog.png"> </td>
						 					<td> <span> 9999+ </span> </td>
						 					<td> <img id='user_eye'  src="images/attr/total_eye.png"> </td>
						 					<td> <span> 9999+ </span> </td>
						 								 
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
							 					<td>  <img id='imgman_hover'  src="images/attr/man.png"></td>
							 					<td>  <span id='mprecentage_hover'>  100 % </span> </td>
							 					<td>  <span id='mesage_text_hover' >  99999+ RATINGS  </span> <img id = "user_mesage_img_hover" src="images/attr/mesage.png"></td>
					 					</table>
					 					<table border="0" cellpadding="0" cellspacing="0" id='user_table_r2'> 
						 					<tr> 
						 						<td id='utr2_td1'  > <img id='fcheck'  src="images/attr/fcheck.png"></td>
						 						<td id='utr2_td2'  > <span id='ftext'>FOLLOWERS </span><span id='tf1' >9999+</span></td>   
						 						<td id='utr2_td3'  > <span id='bar'> / </span> </td>
						 						<td id='utr2_td4'  > <span id='ftext'>FOLLOWING </span><span id='tf2' >9999+</span> </td> 
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
						 										// echo  strtoupper($usr->convert_date_format_profile($datejoined));
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
			 						
			 					 	<div id='user_mouserOver_bg' > 	 
			 						</div>  

			 					

			 					</div>

			 					<table border="0" cellpadding="0" cellspacing="0" id='user_hover_footer'   onmouseover="img_mouseover('user','.user_contaner<?php echo  $con->mno; ?>','.user_mouserOver_c<?php echo  $con->mno; ?>')"  > 
							 				<tr> 
							 					<td> <img  id = 'percentage' src="images/attr/percentage.jpg" > </td>
							 					<td> <span> 9999 </span> </td>
							 					<td> <img id='text_blog'  src="images/attr/frame_photo.png"> </td>
							 					<td> <span> 9999 </span> </td>
							 					<td> <img id='text_blog'  src="images/attr/text_blog.png"> </td>
							 					<td> <span> 9999+ </span> </td>
							 					<td> <img id='user_eye'  src="images/attr/total_eye.png"> </td>
							 					<td> <span> 9999+ </span> </td>
						 				
					 				</table>

			 					<!-- <img id='user_img' src="images/member/<?php echo $user_id; ?>.jpg"  onmouseover="img_mouseover('user','.user_contaner<?php echo  $con->mno; ?>','.user_mouserOver_c<?php echo  $con->mno; ?>')"  )  > -->
								
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
			?>



       <?php  
		$con->i++;
		}
	} // end loop
?>
</div>
