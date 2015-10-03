<?php 

	

	// occupation 
		$occupation  = (!empty($uinfo[0]['occupation'])) ? $uinfo[0]['occupation'] : '' ;  
		$occupation  .= (!empty($occupation)) ? ' at ' : '' ;  
		$occupation  .=  (!empty($uinfo[0]['work_at'])) ? $uinfo[0]['work_at'] : '' ;  

  	// about 
  		$ab = ''; 

  		if ( $uinfo[0]['aboutme'] != null ) {  
 	 		$ab .= $uinfo[0]['aboutme'];
  		}
	// education 

		$educ = ''; 
		if ( !empty($uinfo[0]['studied_at'])) { 
			$educ.= $uinfo[0]['studied_at']; 
		} 
		if ( !empty($uinfo[0]['studied_with'])) { 
			$educ.= ' / '.$uinfo[0]['studied_with']; 
		}
		if ( $uinfo[0]['studied_graduate_date'] != '0000' ) { 
			$educ.= ' / '.$uinfo[0]['studied_graduate_date']; 
		}  
	  

	// location 
		$loc = '';

		if ( !empty($uinfo[0]['city'])) { 
			$loc.= $uinfo[0]['city']; 
		}  
		if ( !empty($uinfo[0]['state_'])) { 
			$loc.= ', '.$uinfo[0]['state_']; 
		} 
		if ( !empty($uinfo[0]['zip'])) { 
			$loc.= ', '.$uinfo[0]['zip']; 
		}  
		if ( !empty($uinfo[0]['country'])) { 
			$loc.= ', '.$uinfo[0]['country']; 
		} 
	
	
	// datejoined  
		$djoined = $mc-> date_format( $uinfo[0]['datejoined'] );    
	  	$mi['about']      = $ab; //'e specimen book. It has survived not only  tting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'; //$ab;
	  	$mi['occupation'] = $occupation; //'Fashion Designer, Diesel';  //$occupation;
	  	$mi['location']   = $loc; // 'Atlanta, GA, USA';   // $loc;
	  	$mi['education']  = $educ; //'Savanna College of Art and Design <br> Fashion Design, 2006'; //$educ;
	  	$mi['djoined']    = $djoined;  
	  	$logtime          = ( $uinfo[0]['logtime'] != '0000-00-00 00:00:00' ) ? $mc->get_time_ago($uinfo[0]['logtime']) : '22 HOURS' ; 
	  	$url_facebook     = $uinfo[0]['url_facebook'];
	  	$url_twitter      = $uinfo[0]['url_twitter'];
	  	$url_pinterest    = $uinfo[0]['url_pinterest'];
	  	$url_instagram    = $uinfo[0]['url_instagram'];
	  	$url_tumblr       = $uinfo[0]['url_tumblr'];
	  	$url_web          = $uinfo[0]['url_web'];
	  	$url_google_plus  = $uinfo[0]['url_google_plus'];  
	  	$url_youtube      = 'youtube.com'; //$uinfo[0]['url_youtube'];   
	    $logStat          = $uinfo[0]['logstat'];  


	  	// echo "facebook = " . $uinfo[0]['url_facebook']; 
	  	// echo "This is the best I can <br>"; 
	    // echo "  
	    // url_pinterest = $url_pinterest <br>
		// url_instagram = $url_instagram  <br>
		// url_tumblr = $url_tumblr   <br>
		// url_web = $url_web   <br>
		// url_google_plus = $url_google_plus <br>
		// url_youtube = $url_youtube  <br>  



		// echo " log stat = $logStat <br> ";
	    // "; 
?>

 
<!-- background black opacity to make the text  visible -->
 <div style=" position:absolute; z-index:100; width:900px;  height:240px; background-color:#000; opacity:0.6; " >   
	</div>		  

<!-- profile member info  -->
	<div id="profile-body-content-info-right" style="display:block;border:1px solid none ;"  >     
		<table border="0" cellpadding="0" cellspacing="0" id="profile-body-content-info-right-table"  style="width:100%;color:black; float:left; margin-top:20px;" >  
			<tr>
				<td> 
			      	<div class="profile-close" onclick="hide_profile_about()" > <span>x</span> </div>
			    </td>	 
			<tr>  
				<td style="height:70px;"  >   
					<div id="profile-userdesc-title" > 
						About  
					</div>
					<div> 
						<?php echo $mi['about']; ?> 
					</div>  
				</td>
			<tr> 
				<td> 
					<table  border="0" cellpadding="0" cellspacing="0" style="width:100%" > 	
						<tr> 
							<td style="width:350px;height:70px;" >  														
								<div id="profile-userdesc-title" > 
									Occupation
								</div>
								<div style="width:280px;border:1px solid none;" > 

									<?php echo $mi['occupation'];  ?> 
								</div> 
							 </td>
							<td> 															
								<div id="profile-userdesc-title" > 
									Location
								</div>
								<div> 
									<?php  echo $mc->ucname($mi['location']); ?> 
								</div>
							 </td>
					</table> 
				</td> 
			<tr>
				<td> 
					<table  border="0" cellpadding="0" cellspacing="0"  style="width:100%" > 	
						<tr> 
							<td style="width:350px;height:70px;"  > 	
								<div id="profile-userdesc-title" > 
									Education
								</div>
								<div style="width:280px;" class="education-info"  > 
									<?php echo $mc->ucname($mi['education']); ?> 
								</div>
								</td>
							<td> 
								<table border="0" cellpadding="0" cellspacing="0"  style="width:100%" >
									<tr> 
										<td style="width:70%" > <div> Date  Joined </div> </td><td> 

										<?php  
											if($logStat > 0) { 
												echo "<div style='color:green'>Online Now<div>";		
											} else { 
												echo "<div style='color:red'>Online<div>";		
											}
										?> 
										

										</td> <tr>
										<td> <div><?php echo $mi['djoined']; ?></div>  </td><td><div> <?php echo strip_tags( $logtime ); ?></div> </td>
								</table>
								<div id="profile-userdesc-title" > 
									 
								</div>
								<div> 
									
								</div> 
							</td>
					</table> 
				</td>
		</table>  
	</div>    
<!-- profile avatar and circle options --> 
	<div id="profile-body-content-info-left-1" style="border:1px solid none"   >    
		<div id="profile-body-content-info-left-pic" > 
			<?php  if ( file_exists("$mc->ppic_profile/$mppno.jpg") ) { echo "<img src='$mc->ppic_profile/$mppno.jpg' >"; }else{ $avatar = $mc->get_male_female_avatar( $mno1 );  echo "<img src='$mc->ppic_profile/$avatar' />"; }   ?>
		</div>   
		<div id="profile-body-content-info-left-graph"   >    
		 	<!--- <img src="<?php echo $mc->genImgs."/TL-stat.png"; ?>">  !--> 
		</div>   

		<div class="profile-social-icons">  
      		<table> 
      			<tbody>
	      			<tr> 









	  					<?php if(!empty($url_pinterest)) { ?>
							<td>  
								<a href="<?php echo $url_pinterest; ?>" > 
									<img 
					 					id="profile-social-pinterest"  
					 					style="margin-left:3px;" 
						 				src="fs_folders/images/profile/white-pinterest.png"  
						 				onmousemove=" mousein_change_button ( '#profile-social-pinterest' , 'fs_folders/images/profile/red-pinterest.png' )" 
						 				onmouseout="mouseout_change_button (  '#profile-social-pinterest'  , 'fs_folders/images/profile/white-pinterest.png' ) "
					 				/>   
				 				</a>
							</td> 
						<?php } ?>

						<?php if(!empty($url_web)) {  ?>
							<td>  
								<a href="<?php echo $url_web; ?>" > 
									<img 
					 					id="profile-social-web"  
					 					style="margin-left:3px;" 
						 				src="fs_folders/images/profile/white-web.png"  
						 				onmousemove=" mousein_change_button ( '#profile-social-web' , 'fs_folders/images/profile/blue-web.png' )" 
						 				onmouseout="mouseout_change_button (  '#profile-social-web'  , 'fs_folders/images/profile/white-web.png' ) "
				 					/>   
				 				</a>
							</td>
						<?php } ?> 

						<?php if(!empty($url_facebook)) { ?>
							<td>  
								<a href="<?php echo $url_facebook; ?>" >
									<img 
					 					id="profile-social-facebook"  
					 					style="margin-left:3px;" 
						 				src="fs_folders/images/profile/white-facebook.png"  
						 				onmousemove=" mousein_change_button ( '#profile-social-facebook' , 'fs_folders/images/profile/mouse-facebook.png' )" 
						 				onmouseout="mouseout_change_button (  '#profile-social-facebook'  , 'fs_folders/images/profile/white-facebook.png' ) "
					 				/>   
				 				</a>
							</td> 
						<?php } ?> 

						<?php if(!empty($url_instagram)) { ?> 
							<td> 	 
								<a href="<?php echo $url_instagram; ?>" >
									<img 
					 					id="profile-social-instagram"  
					 					style="margin-left:3px;" 
						 				src="fs_folders/images/profile/white-instagram.png"  
						 				onmousemove=" mousein_change_button ( '#profile-social-instagram' , 'fs_folders/images/profile/mouse-instagram.png' )" 
						 				onmouseout="mouseout_change_button (  '#profile-social-instagram'  , 'fs_folders/images/profile/white-instagram.png' ) "
					 				/>    
				 				</a>
							</td>
						<?php } ?>


						<?php if(!empty($url_youtube)) { ?> 
							<td>  
								<a href="<?php echo $url_youtube; ?>" >
									<img 
					 					id="profile-social-youtube"  
					 					style="margin-left:3px;" 
						 				src="fs_folders/images/profile/white-youtube.png"  
						 				onmousemove=" mousein_change_button ( '#profile-social-youtube' , 'fs_folders/images/profile/mouse-youtube.png' )" 
						 				onmouseout="mouseout_change_button (  '#profile-social-youtube'  , 'fs_folders/images/profile/white-youtube.png' ) "
					 				/>     
				 				</a>
							</td> 
						<?php } ?>
 

						<?php if(!empty($url_twitter)) { ?> 
							<td>  
								<a href="<?php echo $url_twitter; ?>" >
									<img 
					 					id="profile-social-twitter"  
					 					style="margin-left:3px;" 
						 				src="fs_folders/images/profile/white-pinterest.png"  
						 				onmousemove=" mousein_change_button ( '#profile-social-twitter' , 'fs_folders/images/profile/red-pinterest.png' )" 
						 				onmouseout="mouseout_change_button (  '#profile-social-twitter'  , 'fs_folders/images/profile/white-pinterest.png' ) "
					 				/> 
				 				</a>  
							</td> 
						<?php } ?>

	      			</tr>
	      		</tbody>
      		</table>
  	 	</div>
	</div> 


