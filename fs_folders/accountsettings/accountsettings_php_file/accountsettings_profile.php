<?php    
	// http://www.catchstudio.com/labs/php-screenshots/
	


	 	
	// initialize info   
	// echo " session ".$_SESSION['mno']."<br>";  
	 	$mno  = $_SESSION['mno'];

		$uainfo  			   = $mc->get_user_account_by_id ( $mno  );
		$mano 			       = $uainfo[0]['mano']; 
		$email  			   = ( !empty($uainfo[0]['email'] ) ) ? $uainfo[0]['email']    : 'your email' ;
		$username 		       = $uainfo[0]['username'];
		$pass 			       = $uainfo[0]['pass']; 
		$uinfo 				   = $mc->get_user_info_by_id($mno ); 
	 	$lastname 		       = $uinfo[0]['lastname'];
	 	$middlename 	       = $uinfo[0]['middlename']; 
	 	$firstname  	       = $uinfo[0]['firstname']; 
	 	$nickname              = $uinfo[0]['nickname']; 
	 	$gender  			   = $uinfo[0]['gender'];
	 	$website  			   = ( !empty($uinfo[0]['website'] ) ) ? ucfirst($uinfo[0]['website'])   : 'Blog/ Website name' ;
	 	$bdate  			   = $uinfo[0]['bdate']; 
	 	$occupation 	        = ( !empty($uinfo[0]['occupation'] ) ) ? ucfirst($uinfo[0]['occupation'])   : 'Tell Us Your Occupation' ;   
	 	$preffered_style 	   = $uinfo[0]['preffered_style'];  
	 	$country		       = $uinfo[0]['country'];
	 	$state_			       = $uinfo[0]['state_'];
	 	$city			       = ( !empty($uinfo[0]['city']   ) ) ? ucfirst($uinfo[0]['city'])  : 'city' ;   
	 	$zip 				   = ( !empty($uinfo[0]['zip']   ) ) ? ucfirst($uinfo[0]['zip'])  : 'zipcode' ;     
	 	$blogdom 			   = $uinfo[0]['blogdom'];
	 	$aboutme 			   = $uinfo[0]['aboutme'];  
	 	$ispicset 			   = $uinfo[0]['ispicset'];  
	 	$fbid 				   = $uinfo[0]['fbid']; 
	 	$twid 				   = $uinfo[0]['twid']; 
	 	$isVal 				   = $uinfo[0]['isVal'];    
	 	$tpercentage  	       = $uinfo[0]['tpercentage'];
	 	$tlooks                = $uinfo[0]['tlooks'];
	 	$tarticle              = $uinfo[0]['tarticle'];
		$tmedia                = $uinfo[0]['tmedia'];
	 	$tfollower             = $uinfo[0]['tfollower'];
	 	$tfollowing            = $uinfo[0]['tfollowing'];  
		$work_at               = ( !empty( $uinfo[0]['work_at'] ) ) ? ucfirst($uinfo[0]['work_at'])  : 'Where Do You Work?' ;    
		$skill                 = $uinfo[0]['skill'];
		$studied_at            = ( !empty($uinfo[0]['studied_at']     ) ) ? ucfirst($uinfo[0]['studied_at'])  : 'what high school / collage or university you attended?'; 
		$studied_with          = ( !empty($uinfo[0]['studied_with']   ) ) ? ucfirst($uinfo[0]['studied_with'])  : 'what did you study?';   
		$studied_graduate_date = $uinfo[0]['studied_graduate_date']; 
		$url_facebook          = ( !empty($uinfo[0]['url_facebook']   ) ) ? ucfirst($uinfo[0]['url_facebook'])  : 'Facebook' ;  
		$url_twitter           = ( !empty($uinfo[0]['url_twitter']    ) ) ? ucfirst($uinfo[0]['url_twitter'])   : 'Twitter' ;    
		$url_pinterest         = ( !empty($uinfo[0]['url_pinterest']  ) ) ? ucfirst($uinfo[0]['url_pinterest']) : 'Pinterest' ;    
		$url_instagram         = ( !empty($uinfo[0]['url_instagram']  ) ) ? ucfirst($uinfo[0]['url_instagram']) : 'Instagram' ;    
	 	$datejoined            = $uinfo[0]['datejoined']; 

 


 	// assigns values

	 	# NAME
			$dbvalName  = "$firstname $nickname  $lastname";
			$defaultName  = 'Your Name and Nickname';     
			if (  !empty($firstname) ) { 
				$firstname_style = 'color:#b32727;';
			}
			else{
				$firstname =  "Your Firstname" ;	
				$firstname_style = 'color:#95a1a9;';	
			}
			if (  !empty($nickname) ) { 
				$nickname_style = 'color:#b32727;';
			}
			else{
				$nickname =  "Your Nickname / Alias" ;	
				$nickname_style = 'color:#95a1a9;';
			}
			if (  !empty($lastname) ) { 
				$lastname_style = 'color:#b32727;';
			} 
			else{
				$lastname =  "Your Lastname" ;	
				$lastname_style = 'color:#95a1a9;';
			}  
		# USERNAME 
			if ( !empty($username) ) {
				$username_style = 'color:#b32727;'; 	
				$dbvalUsername  = $username; 
			}
			else{
				$defaultUsername  = 'your.username';  
				$dbvalUsername  = 'username';
				$username_style = 'color:#95a1a9;';
			}  
		# ABOUT ME 
			if (  !empty($aboutme) ) {
				$dbvalAbout =  "$aboutme";
				$defaultAbout  = $aboutme; 
				$about_style = 'color:#b32727;';
			}
			else{
				$dbvalAbout =  "";
				$defaultAbout  = 'tell something about you';    	
				$about_style = 'color:#95a1a9;';
			}  
		# BIRTH YEAR  

				$dbvalBirthday = "$bdate"; 
				$defaultBirthday  = 'select birth year';    	 
		# GENDER  
			$davatar = $mc->get_male_female_avatar( $mno );
			$dbvalGender = "$gender";
			$defaultGender  = 'your gender';    
			$gender_male = null; 
			$gender_female = null;
			$gender_select = null;
			switch ( $gender ) {
				case 'Male':
					$gender_male = 'selected';
					break;
				case 'Female':
					$gender_female = 'selected';
					break; 
				default:
					$gender_select = 'selected';
					break;
			} 
		# WORK  

			$dbvalWork = "$work_at"; 
			$defaultWork  = 'Where Do You Work?';   

			$work_at_style = ( !empty( $uinfo[0]['work_at'] ) ) ? 'color:#b32727;' : 'color:#95a1a9;' ; 

		$dbvalPreferredStyle = "$preffered_style";
		$defaultPreferredStyle  = 'Select Your Preferred Style';  
  
		$dbvalOccupation = "$occupation";
		$defaultOccupation  = 'your occupation';  
		$occupation_style = ( !empty( $uinfo[0]['occupation'] ) ) ? 'color:#b32727;' : 'color:#95a1a9;' ;



		# SKILLS 
			$dbvalSkills = "$skill";
			$defaultSkills  = 'your skills';  
			$skills_list = array('Creative Director' , 'Textiles' , 'Programmer' , 'Designer' );

	   
		# EDUCATION
			$dbvalEducation    = "$studied_at , $studied_with , $studied_graduate_date";
			$defaultEducation  = 'Your School , You Course and Your Graduated year';  
		
			
			$studied_at_style   = ( !empty( $uinfo[0]['studied_at'] ) ) ? 'color:#b32727;' : 'color:#95a1a9;' ;
			$studied_with_style = ( !empty( $uinfo[0]['studied_with'] ) ) ? 'color:#b32727;' : 'color:#95a1a9;' ;
 

		$dbvalEmail = "$email";
		$defaultEmail  = 'your email';  

		$dbvalWebsiteBlog = "$website";
		$defaultWebsiteBlog  = 'Blog/ Website name';
		 

		#LOCATION 

		
			$dbvalLocation = " $city , $state_ , $zip , $country";
			$defaultLocation  = 'your current location';  

			$city_style   = ( !empty( $uinfo[0]['city'] ) ) ? 'color:#b32727;' : 'color:#95a1a9;' ;
			$zip_style    = ( !empty( $uinfo[0]['zip'] ) ) ? 'color:#b32727;' : 'color:#95a1a9;' ;


			// $dbvalSocialAccounts = "$url_facebook</a><br>$url_twitter</a><b>$rurl_pinterest</a><br>$url_instagram</a><br>";
			$defaultSocialAccounts  = 'your social accounts';   
	 		



			$dbvalSocialAccounts = ''; 

			if ( !empty($email)) {
				 $dbvalSocialAccounts .= $email.'<br>';
			}
			else{
				 $dbvalSocialAccounts .= "<span style='color:#95a1a9' > Your Email </span><br> ";	
			}
			if (  $website != 'Blog/ Website name' ) {
				 $dbvalSocialAccounts .= $website.'<br>';
			}
			else{
				$dbvalSocialAccounts .= "<span style='color:#95a1a9' >Blog/ Website name</span><br>";
			}
			if (  $url_facebook != 'Facebook' ) {
				 $dbvalSocialAccounts .= $url_facebook.'<br>';
			}
			else{ 
				$dbvalSocialAccounts .= "<span style='color:#95a1a9' > Your Facebook </span><br>";	
			}
			if ( $url_twitter != 'Twitter' ) {
				$dbvalSocialAccounts .= $url_twitter.'<br>';
			}
			else{
				$dbvalSocialAccounts .= "<span style='color:#95a1a9' > Your Twitter </span><br>";	
			}
			if ( $url_pinterest != 'Pinterest' ) {
				$dbvalSocialAccounts .= $url_pinterest.'<br>';
			}
			else{
				$dbvalSocialAccounts .= "<span style='color:#95a1a9' > Your Pinterest </span><br>";	
			}
			if (  $url_instagram != 'Instagram' ) {
				 $dbvalSocialAccounts .= $url_instagram.'<br>';
			} 
			else{
				$dbvalSocialAccounts .= "<span style='color:#95a1a9' > Your Instagram </span><br>";	
			}

 	 	

			 	  	
			
			
			
			
			
			
			
			
			


 
			










			
		
		// echo " stat = $stat <br>"; 
		// CONTACT 
			$email_style                 = ( !empty($uainfo[0]['email']         ) ) ? 'color:#b32727;' : 'color:#95a1a9;' ;
			$website_style   		     = ( !empty($uinfo[0]['website']        ) ) ? 'color:#b32727;' : 'color:#95a1a9;' ;
			$url_facebook_style          = ( !empty($uinfo[0]['url_facebook']   ) ) ? 'color:#b32727;' : 'color:#95a1a9;' ;
			$url_twitter_style           = ( !empty($uinfo[0]['url_twitter']    ) ) ? 'color:#b32727;' : 'color:#95a1a9;' ;
			$url_pinterest_style         = ( !empty($uinfo[0]['url_pinterest']  ) ) ? 'color:#b32727;' : 'color:#95a1a9;' ;
			$url_instagram_style         = ( !empty($uinfo[0]['url_instagram']  ) ) ? 'color:#b32727;' : 'color:#95a1a9;' ;  

























?> 
<!-- <div id='accountsetting-wrapper-container-table-body-right-profile' > -->


	<div id="profile_res" style="display:none"  > 
	res
	</div> 
	<table id='accountsetting-wrapper-container-table-body-right-profile-table' border="0" cellspacing="0" cellpadding="0" style="width:640px"  > 
		<tr> 
			<td style="border:none" id='accountsetting-wrapper-container-table-body-right-profile-table-name'           onmouseover="show_hide_profile_options ( '.profile-name-edit'     , 'show' )"        onmouseout="show_hide_profile_options ( '.profile-name-edit' , 'hide' )"    class="accountsetting-wrapper-container-table-body-right-profile-table-td"   >
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-name-right"   >  
					<div id='settings' class="profile-name-edit" style='text-decoration:underline; visibility:hidden' onclick="account_profile_edit('#profile-name-table' , 'slideDown' )" >  
						 edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>'  />
					</div id='settings'> 
					<div class="profile-display-container"  class="profile-display-container" style="text-transform:capitalize; " > 
				 		<?php   
				 			if ( $dbvalName != null ) {
					 			echo " 
									<span id='profile-name-display-container' style='color:#d6051d' > 
								 		$dbvalName
								 	</span>";  				 				 
				 			}else{	
				 				echo " 
									<span id='profile-name-display-container' style='color:#9d9d9d; font-weight:normal' > 
								 		 $defaultName 
								 	</span>";  	 
				 			} 
					 	?>
					</div> 
					<div id='profile-name-error-container'  class="profile-message-error-container" style="font-size:10px;display:none"  >
			 				[error: name exist] 
		 			</div>
					<table border="0" cellspacing="0" cellpadding="0" style="width:89%; display:none; " id="profile-name-table" > 
						<tr>
							<td style="padding-top:20px" > 
							 
								<input id="profile-firstname-field" type='text' style='text-transform:capitalize;width:250px; height:100%; <?php echo "$firstname_style"; ?>; padding:2%; ' value="<?php echo "$firstname"; ?>"  />
							</td> 
						<tr> 
							<td style="padding-top:10px" > 
								<input id="profile-nickname-field" type='text' style='text-transform:capitalize;width:250px; height:100%; <?php echo "$nickname_style"; ?>; padding:2%; ' value="<?php echo "$nickname"; ?>"  />
							</td>
						<tr>  
							<td style="padding-top:10px" > 
								<input id="profile-lastname-field" type='text' style='text-transform:capitalize;width:250px; height:100%; <?php echo "$lastname_style"; ?>; padding:2%; ' value="<?php echo "$lastname"; ?>"  />
							</td> 
						
						<tr> 
							<td style="padding-top:10px" >  
								<input id="profiele-name-update"  class='profile-update'    type='button'  onclick="account_update_profile ( 
									'#profile-firstname-field #profile-nickname-field #profile-lastname-field' , 
									'#profile-name-display-container' , 
									'#profile-name-error-container', 
									'fullname' , '#profile-name-table' ,  
									'profile-name-update' , 
									'firstname nickname lastname ' 
								)" 
								style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
								<input id="profiele-name-cancel"  class='profile-cancel'    type='button'  onclick="account_profile_edit   ('#profile-name-table')" style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
							</td>   
					</table> 
				</div> 
			  	<div id="accountsetting-wrapper-container-table-body-right-profile-table-name-left" > 
					Name
				</div>  
			</td>
		<tr>  
			<td id='accountsetting-wrapper-container-table-body-right-profile-table-name'           onmouseover="show_hide_profile_options ( '.profile-username-edit' , 'show' )"        onmouseout="show_hide_profile_options ( '.profile-username-edit' , 'hide' )"  class="accountsetting-wrapper-container-table-body-right-profile-table-td" >   
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-name-right"   >  
					<div id='settings' class='profile-username-edit' style='text-decoration:underline;visibility:hidden' onclick="account_profile_edit('#profile-username-table' , 'slideDown' )" >  
						<!-- endable this to make the username editable -->
						<!-- edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>'  /> -->
					</div id='settings'>
					
					<div class="profile-display-container"  class="profile-display-container" >

					 	<?php  
				 			if ( $dbvalUsername != null ) {
				 				echo "<a href='$dbvalUsername' style='color:#b32727' > 
					 				fashionsponge.com/<span id='profile-username-display-container' style='color:#d6051d' >$dbvalUsername</span>
				 				</a>";

				 			}else{	
				 				echo "fashionsponge.com/<span id='profile-username-display-container' style='color:#9d9d9d; font-weight:normal' >$defaultUsername</span>";  		
				 			} 
					 	?>
					</div>

					<div id='profile-username-error-container' class="profile-message-error-container" style="font-size:10px;display:none" >
			 				[error: username exist] 
		 			</div>
					<table border="0" cellspacing="0" cellpadding="0" style="width:89%; display:none " id="profile-username-table" > 
						<tr>
							<td style="padding-bottom:2%;padding-top:20px" > 
								<input id="profile-username-field" type='text' style='width:425px; height:100%; <?php echo "$username_style"; ?> padding:2%; ' value="<?php echo $dbvalUsername; ?>"  />
							</td>  
						<tr> 
							<td> 
							
								<input id="profiele-username-update"  class='profile-update'    type='button'  onclick="account_update_profile ( '#profile-username-field' , '#profile-username-display-container' , '#profile-username-error-container', 'username' , '#profile-username-table' ,'profile-username-update' , 'username' )" style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
								<input id="profiele-username-cancel"  class='profile-cancel'    type='button'  onclick="account_profile_edit('#profile-username-table')"                             																														   style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
							</td>   
					</table> 
				</div> 
			  	<div id="accountsetting-wrapper-container-table-body-right-profile-table-name-left" > 
					Username
				</div>  
			</td>
		<tr>    
			<td id='accountsetting-wrapper-container-table-body-right-profile-table-about'          onmouseover="show_hide_profile_options ( '.profile-about-edit'    , 'show' )"        onmouseout="show_hide_profile_options ( '.profile-about-edit' , 'hide' )" class="accountsetting-wrapper-container-table-body-right-profile-table-td"  >  
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-about-right"  >   
						<div id='settings' class="profile-about-edit" style='text-decoration:underline;visibility:hidden'  onclick="account_profile_edit('#profile-about-table' , 'slideDown' )" >  
							 edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>' />
						</div id='settings'> 
						<div id='profile-about-display-container'  class="profile-display-container" >   
						<?php  
				 			if (  strlen($aboutme) > 2 ) {
					 			echo " 
									<span id='profile-about-display-container' style='color:#d6051d' > 
								 		$dbvalAbout
								 	</span>";  				 				 
				 			}else{	
				 				echo " 
									<span id='profile-about-display-container' style='color:#9d9d9d; font-weight:normal' > 
								 		 $defaultAbout 
								 	</span>";  
				 			} 
					 	?>  
						</div>  
						<div id='profile-about-error-container' class="profile-message-error-container" style="font-size:10px;display:none" >
			 				[error: about exist] 
		 				</div>
					  	<table border="0" cellspacing="0" cellpadding="0" style="width:89%; display:none "  id="profile-about-table"  > 
							<tr>
								<td style="padding-bottom:2%;padding-top:20px" > 
									<textarea maxlength='200' id="profile-about-field" type='text' style=' width:425px; height:100px; <?php echo "$about_style"; ?> padding:2%; resize:none; font-family:arial; '  value="name"  /><?php echo "$defaultAbout"; ?></textarea> 
								</td>  
							<tr> 
								<td>  
									<input id="profiele-about-update" type='button'  onclick="account_update_profile ( '#profile-about-field' , '#profile-about-display-container' , '#profile-about-error-container', 'about' , '#profile-about-table' ,'profile-about-update' , 'aboutme' )"   style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
									<input id="profiele-about-cancel" type='button'  onclick="account_profile_edit('#profile-about-table')"   																																						   style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
								</td>   
						</table>  
				</div>
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-about-left" > 
					About You
				</div>  
			</td> 
		<tr> 
			<td id='accountsetting-wrapper-container-table-body-right-profile-table-birthday'       onmouseover="show_hide_profile_options ( '.profile-birthday-edit' , 'show' )"        onmouseout="show_hide_profile_options ( '.profile-birthday-edit' , 'hide' )" class="accountsetting-wrapper-container-table-body-right-profile-table-td"  >  
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-birthday-right"  > 
					<div id='settings' class="profile-birthday-edit" style='text-decoration:underline;visibility:hidden' onclick="account_profile_edit('#profile-birthyear-table' , 'slideDown' )"  >  
						 edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>' />
					</div id='settings'>   
					<div class="profile-display-container"  class="profile-display-container" >
					
						
						<?php  
				 			if ( $dbvalBirthday != null ) {
					 			echo " 
									<span id='profile-birthyear-display-container' style='color:#d6051d' > 
								 		$dbvalBirthday 
								 	</span>";  				 				 
				 			}else{	
				 				echo " 
									<span id='profile-birthyear-display-container' style='color:#9d9d9d; font-weight:normal' > 
								 		 $defaultBirthday  
								 	</span>";  		

				 			} 
					 	?>


					</div> 
					<div id='profile-birthyear-error-container'  class="profile-message-error-container" style="font-size:10px;display:none"  >
						[error: name exist] 
					</div> 
					<table border="0" cellspacing="0" cellpadding="0" style="width:89%; display:none "  id="profile-birthyear-table" > 
						<tr>
							<td style="padding-bottom:2%;padding-top:20px" > 
								<select id="profile-birthyear-select" class="profile-select"  >
									<option> Select Birth Year </option>
									<?php 
										$year = 1950;
										for ($i=$year; $i < 2005 ; $i++) {  

											if ( $i == $bdate ) {
												echo "<option selected>$i</option>"; 
											}
											else{
												echo "<option>$i</option>"; 	
											}
											
										}
									?> 
								</select> 
							</td>  
						<tr> 
							<td>  
								<input id="profiele-about-update" type='button' onclick="account_update_profile ( '#profile-birthyear-select' , '#profile-birthyear-display-container' , '#profile-birthyear-error-container', 'birthyear' , '#profile-birthyear-table' ,'profile-birthyear-update' , 'bdate' )" style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
								<input id="profiele-about-cancel" type='button' onclick="account_profile_edit('#profile-birthyear-table')"   																																	                                                 style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
							</td>   
					</table>  
				</div>
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-birthday-left" > 
					Birthday Year
				</div>  
			</td>
		<tr> 
			<td style="display:none" id='accountsetting-wrapper-container-table-body-right-profile-table-gender'         onmouseover="show_hide_profile_options ( '.profile-gender-edit'   , 'show' )"        onmouseout="show_hide_profile_options ( '.profile-gender-edit' , 'hide' )" class="accountsetting-wrapper-container-table-body-right-profile-table-td"  >
			 	<div id="accountsetting-wrapper-container-table-body-right-profile-table-gender-right"  >  
			 		<div id='settings' class="profile-gender-edit" style='text-decoration:underline;visibility:hidden' onclick="account_profile_edit('#profile-gender-table' , 'slideDown' )"  >  
						 edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>' />
					</div id='settings'>
					 
					<div class="profile-display-container"  class="profile-display-container" > 
						<?php  
				 			if ( $dbvalGender != null ) {
					 			echo " 
									<span id='profile-gender-display-container' style='color:#d6051d' > 
								 		$dbvalGender
								 	</span>";  				 				 
				 			}else{	
				 				echo " 
									<span id='profile-gender-display-container' style='color:#9d9d9d; font-weight:normal' > 
								 		 $defaultGender 
								 	</span>";  		

				 			} 
					 	?>   
					</div> 
					<div id='profile-gender-error-container'  class="profile-message-error-container" style="font-size:10px;display:none"  >
						[error: gender exist] 
					</div>
					
					<table border="0" cellspacing="0" cellpadding="0" style="width:89%; display:none" id="profile-gender-table" > 
						<tr>
							<td style="padding-bottom:2%;padding-top:20px" > 
								<select id="profile-gender-select" class="profile-select" value='2' >  
									<option <?php echo "$gender_male";?>    >Male</option>
									<option <?php echo "$gender_female";?>  >Female</option>
								</select> 

								 
							</td>  
						<tr> 
							<td>  
								<input id="profiele-about-update" type='button'  onclick="account_update_profile ( '#profile-gender-select' , '#profile-gender-display-container' , '#profile-gender-error-container', 'gender' , '#profile-gender-table' ,'profile-gender-update' , 'gender' )" style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
								<input id="profiele-about-cancel" type='button'  onclick="account_profile_edit('#profile-gender-table')" 																																		     style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
							</td>   
					</table>  
				</div>
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-gender-left" > 
					Gender
				</div>  
			</td>
		<tr> 
			<td style="display:none" id='accountsetting-wrapper-container-table-body-right-profile-table-preferedstyle'  onmouseover="show_hide_profile_options ( '.profile-preferedstyle-edit'   , 'show' )" onmouseout="show_hide_profile_options ( '.profile-preferedstyle-edit' , 'hide' )" class="accountsetting-wrapper-container-table-body-right-profile-table-td"  > 
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-preferedstyle-right"  >  
					<div id='settings' class="profile-preferedstyle-edit" style='text-decoration:underline;visibility:hidden' onclick="account_profile_edit('#profile-preferredstyle-table' , 'slideDown' )"  > 
						 edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>'  /> 
					</div id='settings'>
					<div class="profile-display-container"  class="profile-display-container" > 
						<?php  
				 			if ( $dbvalPreferredStyle != null ) {
					 			echo " 
									<span id='profile-preferredstyle-display-container' style='color:#d6051d' > 
								 		$dbvalPreferredStyle
								 	</span>";  				 				 
				 			}else{	
				 				echo " 
									<span id='profile-preferredstyle-display-container' style='color:#9d9d9d; font-weight:normal' > 
								 		 $defaultPreferredStyle
								 	</span>";  		

				 			} 
					 	?>   
					</div> 
					<div id='profile-preferredstyle-error-container'  class="profile-message-error-container" style="font-size:10px;display:none"  >
						[error: preferredstyle exist] 
					</div> 
					<table border="0" cellspacing="0" cellpadding="0" style="width:89%; display:none " id="profile-preferredstyle-table" > 
						<tr>
							<td style="padding-bottom:2%;padding-top:20px" > 
								<?php
									$ps = array('Streetwear','Mensware','Chic','Preppy');
								?>
								<select id="profile-preferredstyle-select" class="profile-select" > 
									<option>Preferred Style </option> 
									<?php 
										for ($i=0; $i < count($ps) ; $i++) { 
											$style = $ps[$i];
											if ( $style == $dbvalPreferredStyle) {


												echo "<option selected>$style</option>";
											}
											else{
												echo "<option >$style</option>";	
											} 
										} 
									 ?>
								</select> 
							</td>  
						<tr> 
							<td>  
								<input id="profiele-preferredstyle-update" type='button'  onclick="account_update_profile ( '#profile-preferredstyle-select' , '#profile-preferredstyle-display-container' , '#profile-preferredstyle-error-container', 'preferred style' , '#profile-preferredstyle-table' ,'profile-preferredstyle-update' , 'preffered_style' )"  style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
								<input id="profiele-preferredstyle-cancel" type='button'  onclick="account_profile_edit('#profile-preferredstyle-table')"  																																												    style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
							</td>   
					</table>  
				</div>
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-preferedstyle-left" > 
					Preferred Style
				</div>  
			</td>
		<tr>  
			<td id='accountsetting-wrapper-container-table-body-right-profile-table-work'            onmouseover="show_hide_profile_options ( '.profile-work-edit'   , 'show' )" onmouseout="show_hide_profile_options ( '.profile-work-edit' , 'hide' )" class="accountsetting-wrapper-container-table-body-right-profile-table-td"  >  
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-work-right"  >  
					<div id='settings' class="profile-work-edit"  style='text-decoration:underline;visibility:hidden'  onclick="account_profile_edit('#profile-work-table' , 'slideDown' )"  >  
						 edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>' />
					</div id='settings'>  

					<div  id="profile-display-container"  class="profile-display-container" style="text-transform:capitalize;"> 
						<?php    


							if ( $dbvalWork != 'Where Do You Work?' || $occupation != 'Tell Us Your Occupation' ) {
									



					 			echo " 
									<span id='profile-work-display-container' style='color:#d6051d' > 
								 	 	$occupation at $dbvalWork 
								 	</span>";  				 				  

				 			}else{	
				 				echo " 
									<span id='profile-work-display-container' style='color:#9d9d9d; font-weight:normal' >  
								 		 Where Do You Work And What Is Your Occupation
								 	</span>";  		

				 			} 
					 	?>   
					</div>  
					<div id='profile-work-error-container' class="profile-message-error-container" style="font-size:10px;display:none" >
					    [error: about exist] 
					</div>

					<table border="0" cellspacing="0" cellpadding="0" style="width:89%; display:none " id="profile-work-table" > 
						<tr>
							<td style="padding-bottom:2%;padding-top:20px" > 
								<input id="profile-work-field" type='text' style='text-transform:capitalize;width:425px; height:100%; <?php echo "$work_at_style"; ?> padding:2%; ' value="<?php echo "$work_at"; ?>"  />
							</td>  
						<tr>
							<td style="padding-bottom:2%;padding-top:20px" > 
								<input id="profile-occupation-field" type='text' style='text-transform:capitalize;width:425px; height:100%; <?php echo "$occupation_style"; ?> padding:2%;' value="<?php echo "$occupation"; ?>"  />
							</td>  
						<tr>
							<td style="padding-bottom:2%;padding-top:20px; display:none" >  
								<select id="profile-skills-select" class="profile-select" >  
									<option>Select Skill</option>
									<?php  
										for ($i=0; $i < count($skills_list) ; $i++) { 
											$sl = $skills_list[$i];
											if ($sl == $dbvalSkills ) {
												echo "<option selected>$sl</option>";
											}
											else{
												echo "<option>$sl</option>";
											}
										} 
									?> 
								</select> 
							</td>  
						<tr> 
							<td> 
								<input id="profiele-work-update" type='button'   
								
								onclick="account_update_profile ( 
									'#profile-work-field #profile-occupation-field' , 
									'#profile-work-display-container' , 
									'#profile-work-error-container', 
									'work' , 
									'#profile-work-table' ,
									'profile-work-update' , 
									'work_at occupation' 
								)"	 

								style='width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
								<input id="profiele-work-cancel" type='button'  onclick="account_profile_edit('#profile-work-table')" 																																							 style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
							</td>   
					</table>  
						<!-- onclick="account_update_profile ( 
									'#profile-email-field #profile-website-field #profile-socialaccount-facebook-field #profile-socialaccount-twitter-field #profile-socialaccount-pinterest-field #profile-socialaccount-instagram-field' , 
									'#profile-socialaccount-display-container' , 
									'#profile-socialaccount-error-container', 
									'socialaccount' , 
									'#profile-socialaccount-table' ,'profile-socialaccount-update' , 
									'email website url_facebook url_twitter url_pinterest url_instagram' 
								)"  -->
				</div>
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-work-left" > 
					Work
				</div>  
			</td>
			<!-- 
				<tr>  
					<td id='accountsetting-wrapper-container-table-body-right-profile-table-occupation'      class="accountsetting-wrapper-container-table-body-right-profile-table-td"  >  
						<div id="accountsetting-wrapper-container-table-body-right-profile-table-occupation-right"  >  
							
							<div id='settings' style='text-decoration:underline' onclick="account_profile_edit('#profile-occupation-table' , 'slideDown' )"    >  
								 edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>' />
							</div id='settings'>
							

							<div  id="profile-display-container"  class="profile-display-container" >
								  <span id='profile-occupation-display-container' style='display:none' >
									Fashion Designer
									your occupation
								</span> 
								<?php  
						 			if ( $dbvalOccupation!= null ) {
							 			echo " 
											<span id='profile-occupation-display-container' style='color:#d6051d' > 
										 		$dbvalOccupation
										 	</span>";  				 				 
						 			}else{	
						 				echo " 
											<span id='profile-occupation-display-container' style='color:#9d9d9d; font-weight:normal' > 
										 		 $defaultOccupation
										 	</span>";  		

						 			} 
							 	?>   
							</div>  
							<div id='profile-occupation-error-container' class="profile-message-error-container" style="font-size:10px;display:none" >
								[error: about exist] 
							</div> 
							<table border="0" cellspacing="0" cellpadding="0" style="width:89%; display:none " id="profile-occupation-table" > 
								<tr>
									<td style="padding-bottom:2%;padding-top:20px" > 
										<input id="profile-occupation-field" type='text' style='width:425px; height:100%; color:#95a1a9; padding:2%; ' value="tell us your occupation"  />
									</td>  
								<tr> 
									<td> 
										<input id="profiele-occupation-update" type='button'  onclick="account_update_profile ( '#profile-occupation-field' , '#profile-occupation-display-container' , '#profile-occupation-error-container', 'occupation' , '#profile-occupation-table' ,'profile-occupation-update' , 'occupation' )"  style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
										<input id="profiele-occupation-cancel" type='button'  onclick="account_profile_edit('#profile-occupation-table')" 																																				       style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
									</td>   
							</table>    
						</div>
						<div id="accountsetting-wrapper-container-table-body-right-profile-table-occupation-left" > 
							Occupation
						</div>  
					</td>
			 
				<tr> 
				<td id='accountsetting-wrapper-container-table-body-right-profile-table-sprcialty'       class="accountsetting-wrapper-container-table-body-right-profile-table-td"  > 
					<div id="accountsetting-wrapper-container-table-body-right-profile-table-sprcialty-right"  >  
						<div id='settings' style='text-decoration:underline' onclick="account_profile_edit('#profile-Skills-table' , 'slideDown' )"   >  
							 edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>' />
						</div id='settings'>
						
						<div class="profile-display-container"  class="profile-display-container" >
							<span id='profile-Skills-display-container' style='display:none' >
								Skills
								your skills
							</span>   
							<?php  
					 			if ( !empty($skill) ) {
						 			echo " 
										<span id='profile-Skills-display-container' style='color:#d6051d' > 
									 		$dbvalSkills
									 	</span>";  				 				 
					 			}else{	
					 				echo " 
										<span id='profile-Skills-display-container' style='color:#9d9d9d; font-weight:normal' > 
									 		 $defaultSkills
									 	</span>";  		

					 			} 
						 	?>  
						</div> 
						<div id='profile-Skills-error-container'  class="profile-message-error-container" style="font-size:10px;display:none"  >
								[error: Skills exist] 
						</div>
						<table border="0" cellspacing="0" cellpadding="0" style="width:89%; display:none " id="profile-Skills-table" > 
							<tr>
								<td style="padding-bottom:2%;padding-top:20px" > 
									<select id="profile-skills-select" class="profile-select" > 
										<option>Select Skill</option>
										<option>Creative Director</option>
										<option>Textiles</option>
										<option>Programmer</option>
										<option>Designer</option>
									</select> 
								</td>  
							<tr> 
								<td>  
									<input id="profiele-Skills-update" type='button'  onclick="account_update_profile ( '#profile-skills-select' , '#profile-Skills-display-container' , '#profile-Skills-error-container', 'Skills' , '#profile-Skills-table' ,'profile-Skills-update' , 'skill' )" style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
									<input id="profiele-Skills-cancel" type='button'  onclick="account_profile_edit('#profile-Skills-table')" 																																												      style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
								</td>   
						</table>  
					</div>
					<div id="accountsetting-wrapper-container-table-body-right-profile-table-sprcialty-left" > 
						Skills
					</div>  
				</td>
			-->
		<tr> 
			<td id='accountsetting-wrapper-container-table-body-right-profile-table-education'       onmouseover="show_hide_profile_options ( '.profile-education-edit'   , 'show' )" onmouseout="show_hide_profile_options ( '.profile-education-edit' , 'hide' )"  class="accountsetting-wrapper-container-table-body-right-profile-table-td"  > 
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-education-right"  >  
					<div id='settings' class="profile-education-edit"  style='text-decoration:underline;visibility:hidden'   onclick="account_profile_edit('#profile-education-table' , 'slideDown' )" > 
						edit <img src=	'<?php echo "$mc->genImgs/edit.png"; ?>' /> 
					</div id='settings'> 
					
					<div class="profile-display-container"  class="profile-display-container" style="text-transform:capitalize;" >
						<!-- <span id='profile-education-display-container' >
							Savannah College of Art and Design Fashion Design, 2006
							your school address , school name and graduation date
						</span>   -->
						<?php    
							$s = false;
							if ( strpos($studied_at, 'you attended')  < 1   ) {
								// echo " school is not empty <br> ";	 
								$s = true;
							}
							if ( $studied_with != 'what did you study?' ) {
								// echo " Course is not empty <br> ";	 	 
								$s = true;
							}
							if ( $studied_graduate_date != '0000' ) {
								 // echo "year is not empty <br> ";	 
								$s = true;
							}  
				 			if ( $s == true ) {
					 			echo " 
									<span id='profile-education-display-container' style='color:#d6051d' > 
								 		$dbvalEducation
								 	</span>";  				 				 
				 			}else{	
				 				echo " 
									<span id='profile-education-display-container' style='color:#9d9d9d; font-weight:normal' > 
								 		 $defaultEducation
								 	</span>";  		
 
				 			} 
					 	?>  
					</div> 
					<div id='profile-education-error-container'  class="profile-message-error-container" style="font-size:10px;display:none"  >
						[error: education exist] 
					</div> 
					<table border="0" cellspacing="0" cellpadding="0" style="width:89%; padding-top:20px; display:none " id="profile-education-table" > 
						<tr>
							<td> 
								<input id="profile-where_scholl_u_go-field" type='text' style='text-transform:capitalize;width:425px; height:100%; <?php echo "$studied_at_style";  ?>    padding:2%; ' value="<?php echo "$studied_at"; ?>"  /> 
							</td>
						<tr>
							<td style="padding-top:10px;" > 
								<input id="profile-what_did_you_study-field" type='text' style='text-transform:capitalize;width:425px; height:100%; <?php echo "$studied_with_style";  ?>  padding:2%; ' value="<?php echo "$studied_with"; ?>"  /> 
							</td>
						<tr>
							<td style="padding-bottom:2%;padding-top:20px" > 
								<select id="profile-graduationdate-select" class="profile-select" > 
									<option>Graduation Date </option>
 									<?php  
										$year = 1950;
										for ($i=$year; $i <= intval(date("Y")) ; $i++) {  

											if ( $i == $studied_graduate_date ) {
												 echo "<option selected>$i</option>"; 
											}
											else{ 
												echo "<option>$i</option>"; 
											}
											
										}
									?>  
								</select> 
							</td>  
						<tr> 
							<td>  
								<input id="profiele-education-update" type='button'  onclick="account_update_profile ( '#profile-where_scholl_u_go-field #profile-what_did_you_study-field #profile-graduationdate-select' , '#profile-education-display-container' , '#profile-education-error-container', 'education' , '#profile-education-table' ,'profile-education-update' , 'studied_at studied_with studied_graduate_date' )"  style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
								<input id="profiele-education-cancel" type='button'  onclick="account_profile_edit('#profile-education-table')"  																																													    style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
							</td>   
					</table>  
				</div>
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-education-left" > 
					Education
				</div>  
			</td> 
			<!-- 
				#this is the sign filled for the email or blog in profile tab 	
				<tr>  
				<td id='accountsetting-wrapper-container-table-body-right-profile-table-email'           class="accountsetting-wrapper-container-table-body-right-profile-table-td"  > 
					<div id="accountsetting-wrapper-container-table-body-right-profile-table-email-right"  > 
						<div id='settings' style='text-decoration:underline' onclick="account_profile_edit('#profile-email-table' , 'slideDown' )"  >  
							 edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>' />
						</div id='settings'>


						<div  id="profile-display-container"  class="profile-display-container" >
							 <span id='profile-email-display-container' style='display:none' >
								jerry@jenkins.com
								your email
							</span> 
							<?php  
					 			if ( $dbvalEmail != null ) {
						 			echo " 
										<span id='profile-email-display-container' style='color:#d6051d' > 
									 		$dbvalEmail
									 	</span>";  				 				 
					 			}else{	
					 				echo " 
										<span id='profile-email-display-container' style='color:#9d9d9d; font-weight:normal' > 
									 		 $defaultEmail
									 	</span>";  	 
					 			} 
						 	?>  
						</div>  
						<div id='profile-email-error-container' class="profile-message-error-container" style="font-size:10px;display:none" >
							[error: about exist] 
						</div> 
						<table border="0" cellspacing="0" cellpadding="0" style="width:89%; display:none " id="profile-email-table"  > 
							<tr>
								<td style="padding-bottom:2%;padding-top:20px" > 
									<input id="profile-email-field" type='text' style='width:425px; height:100%; color:#95a1a9; padding:2%; ' value="your email"  />
								</td>  
							<tr> 
								<td> 
									<input id="profiele-email-update" type='button' onclick="account_update_profile ( '#profile-email-field' , '#profile-email-display-container' , '#profile-email-error-container', 'email' , '#profile-email-table' ,'profile-email-update' , 'email' )" style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
									<input id="profiele-email-cancel" type='button' onclick="account_profile_edit('#profile-email-table')"  																																					    style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
								</td>   
						</table>   
					</div>
					<div id="accountsetting-wrapper-container-table-body-right-profile-table-email-left" > 
						Email
					</div>  
				</td>
			-->
			<!-- 
				#this is the sign filled for the website or blog in profile tab 
				<tr>  
					<td id='accountsetting-wrapper-container-table-body-right-profile-table-websiteorblog'   class="accountsetting-wrapper-container-table-body-right-profile-table-td"  >  
						<div id="accountsetting-wrapper-container-table-body-right-profile-table-websiteorblog-right"  >  
							<div id='settings' style='text-decoration:underline' onclick="account_profile_edit('#profile-website-table' , 'slideDown' )"  >  
								 edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>' />
							</div id='settings'>
							
							<div  id="profile-display-container"  class="profile-display-container" >
								  <span id='profile-website-display-container' style='display:none'  >
									www.ilovejerry.com
									your website or blog domain
								</span> 
								<?php  
						 			if ( $dbvalWebsiteBlog != null ) {
							 			echo " 
											<span id='profile-website-display-container' style='color:#d6051d' > 
										 		$dbvalWebsiteBlog
										 	</span>";  				 				 
						 			}else{	
						 				echo " 
											<span id='profile-website-display-container' style='color:#9d9d9d; font-weight:normal' > 
										 		 $defaultWebsiteBlog
										 	</span>";  		

						 			} 
							 	?>  
							</div>  
							<div id='profile-website-error-container' class="profile-message-error-container" style="font-size:10px;display:none" >
								[error: about exist] 
							</div>
							



							<table border="0" cellspacing="0" cellpadding="0" style="width:89%; display:none"  id="profile-website-table" > 
							<tr>
								<td style="padding-bottom:2%;padding-top:20px" > 
									<input id="profile-website-field" type='text' style='width:425px; height:100%; color:#95a1a9; padding:2%; ' value="your website"  />
								</td>  
							<tr> 
								<td> 
									<input id="profiele-website-update" type='button'   onclick="account_update_profile ( '#profile-website-field' , '#profile-website-display-container' , '#profile-website-error-container', 'website' , '#profile-website-table' ,'profile-website-update' , 'website' )"  style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
									<input id="profiele-website-cancel" type='button'   onclick="account_profile_edit('#profile-website-table')"  																																					 style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
								</td>   
						</table>   
						</div>
						<div id="accountsetting-wrapper-container-table-body-right-profile-table-websiteorblog-left" > 
							Website/Blog
						</div>  
					</td>
			-->
		<tr> 
			<td id='accountsetting-wrapper-container-table-body-right-profile-table-location'         onmouseover="show_hide_profile_options ( '.profile-location-edit'   , 'show' )" onmouseout="show_hide_profile_options ( '.profile-location-edit' , 'hide' )" >   
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-location-right"   class="accountsetting-wrapper-container-table-body-right-profile-table-td"  >   
					<div id='settings'  class="profile-location-edit"  style='text-decoration:underline;visibility:hidden' onclick="account_profile_edit('#profile-location-table' , 'slideDown' )"  >  
						 edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>' />
					</div id='settings'> 
					<div class="profile-display-container"  class="profile-display-container" style="text-transform:capitalize;" > 
						<?php  


						$lc = false;
						if ( $country == Null ) {
							 $lc = true;
							// echo " country empty $country<br>";
						}
						if ( $state_ == Null ) {
							 $lc = true;
							// echo " state empty $state <br>";
						}
						if ( !empty( $city ) ) {
							 $lc = true;
							// echo " city empty $city <br>";
						} 
						if (  !empty($zip) ) {
							 $lc = true;
							// echo " zipcode empty $zip<br>";
						} 
				 
			 			if ( $lc == true ) {
				 			echo " 
								<span id='profile-location-display-container' style='color:#d6051d' > 
							 		$dbvalLocation 
							 	</span>";  				 				 
			 			}else{	
			 				echo " 
								<span id='profile-location-display-container' style='color:#9d9d9d; font-weight:normal' > 
							 		 $defaultLocation  
							 	</span>";  		

			 			} 
					 	?>  
					</div> 
					<div id='profile-location-error-container'  class="profile-message-error-container" style="font-size:10px;display:none"  >
						[error: location exist] 
					</div> 
 
					<table border="0" cellspacing="0" cellpadding="0" style="width:98%; display:none " id="profile-location-table" > 
						<tr>
							<td style="padding-bottom:2%;padding-top:20px;" >  
									 
									<select class="profile-select" id="country" name ="country" onchange="print_state('state',this.selectedIndex);" style="text-transform:capitalize;" >
										<option> Select Country </option>
									</select> 
									<script language="javascript">print_country("country");</script>  
							</td>  
						<tr> 
							<td style=" padding:5px 0px 5px 0px" >  
								<select class="profile-select" id ="state" name ="state"  onchange="print_city('city',this.selectedIndex);" style="text-transform:capitalize;"  >
									<option> Select State </option>
								</select> 
							</td>
						<tr>
							<td style=" padding:5px 0px 5px 0px "  > 
								<input id="profile-location-city-field"          type='text'   style='text-transform:capitalize; width:200px; height:100%; <?php echo "$city_style";  ?> padding:2%; '  value="<?php echo "$city";  ?>"  />
								<!-- 
									<select class="profile-select" id="city"  name="city" onchange="print_zipcode()"   >
										<option>
											Select City
										</option>
									</select>
 								--> 
							</td>
						<tr>
							<td style="  padding:5px 0px 5px 0px "  >   
									<input id="profile-location-zip-field"            type='text'  style='text-transform:capitalize;width:200px; height:100%; <?php echo "$zip_style";  ?> padding:2%; '  value="<?php echo "$zip";  ?>"  />
								<!-- 
									<select class="profile-select" id="zipcode"  name="zipcode"  >
										<option>
											Select Zip Code
										</option>
									</select> 
								--> 
							</td>
						<tr>
							<td style=" padding:5px 0px 5px 0px "  > 
								<input id="profiele-location-update" type='button' onclick="account_update_profile ( '#country #state #profile-location-city-field #profile-location-zip-field' , '#profile-location-display-container' , '#profile-location-error-container', 'location' , '#profile-location-table' ,'profile-location-update' , 'country state_ city zip' )"  style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="update"  />
								<input id="profiele-location-cancel" type='button' onclick="account_profile_edit('#profile-location-table')" 																																														 																	    style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  />
							</td>   
					</table>   
				</div>
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-location-left"  style="padding-top:20px;" > 
					Location
				</div>  
			</td>
		<tr> 
			<td id='accountsetting-wrapper-container-table-body-right-profile-table-social-accounts'  onmouseover="show_hide_profile_options ( '.profile-accounts-edit'   , 'show' )" onmouseout="show_hide_profile_options ( '.profile-accounts-edit' , 'hide' )" >   
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-location-right"   class="accountsetting-wrapper-container-table-body-right-profile-table-td"  >   
					<div id='settings' class="profile-accounts-edit"  style='text-decoration:underline;visibility:hidden' onclick="account_profile_edit('#profile-socialaccount-table' , 'slideDown' )"  >  
						 edit <img src='<?php echo "$mc->genImgs/edit.png"; ?>' />
					</div id='settings'> 
					<div class="profile-display-container"  class="profile-display-container" > 
 						<?php  
				 			if ( !empty($url_facebook) || !empty( $url_twitter ) || !empty($url_pinterest) || !empty($url_instagram)  ) {
					 			echo " 
									<span id='profile-socialaccount-display-container' style='color:#d6051d' >  
								 		$dbvalSocialAccounts
								 	</span>";  				 				 
				 			}else{	
				 				echo " 
									<span id='profile-socialaccount-display-container' style='color:#9d9d9d; font-weight:normal' > 
								 		 $defaultSocialAccounts
								 	</span>";  	 
				 			}  

					 	?>  
					</div> 
					<div id='profile-socialaccount-error-container'  class="profile-message-error-container" style="font-size:10px;display:none"  >
						[error: socialaccount exist] 
					</div>  
					<table border="0" cellspacing="0" cellpadding="0" style="width:98%; display:none; " id="profile-socialaccount-table" >  
						<tr>
							<td  style=" padding:5px 0px 5px 0px;padding-top:20px;"   > 
								<input id="profile-email-field" type='text' style='width:425px; height:100%; <?php echo "$email_style"; ?> padding:2%; ' value="<?php echo "$email"; ?>"  />
							</td> 
						<tr>
							<td  style=" padding:5px 0px 5px 0px"  > 
								<input id="profile-website-field" type='text' style='width:425px; height:100%; <?php echo "$website_style"; ?> padding:2%; ' value="<?php echo "$website"; ?>"  />
							</td>  
						<tr>
							<td  style=" padding:5px 0px 5px 0px"   > 
								<input id="profile-socialaccount-facebook-field"   type='text'   style='width:200px; height:100%; <?php echo "$url_facebook_style"; ?>  padding:2%; '  value="<?php echo "$url_facebook"; ?>"  />
							</td>
						<tr>
							<td style=" padding:5px 0px 5px 0px" > 
								<input id="profile-socialaccount-twitter-field"    type='text'   style='width:200px; height:100%; <?php echo "$url_twitter_style"; ?>  padding:2%;'   value="<?php echo "$url_twitter"; ?>"  />
							</td>  
						<tr> 
							<td style=" padding:5px 0px 5px 0px" > 
								<input id="profile-socialaccount-pinterest-field"  type='text'   style='width:200px; height:100%; <?php echo "$url_pinterest_style"; ?>  padding:2%;'   value="<?php echo "$url_pinterest"; ?>"  />
							</td>
						<tr>
							<td style="  padding:5px 0px 5px 0px "  >  
								<input id="profile-socialaccount-instagram-field"  type='text'  style='width:200px; height:100%; <?php echo "$url_instagram_style"; ?>  padding:2%; '  value="<?php echo "$url_instagram"; ?>"  />
							</td>
						<tr>
							<td style=" padding:5px 0px 5px 0px "  > 
								<input id="profiele-socialaccount-update" type='button' 
									onclick="account_update_profile ( 
										'#profile-email-field #profile-website-field #profile-socialaccount-facebook-field #profile-socialaccount-twitter-field #profile-socialaccount-pinterest-field #profile-socialaccount-instagram-field' , 
										'#profile-socialaccount-display-container' , 
										'#profile-socialaccount-error-container', 
										'socialaccount' , 
										'#profile-socialaccount-table' ,'profile-socialaccount-update' , 
										'email website url_facebook url_twitter url_pinterest url_instagram' 
									)" 
								style=' width:60px; padding:1%; height:30px; background-color:#d6051d; border:none; color:#fff;    font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' 
								value="update"  
							/>
								<input id="profiele-socialaccount-cancel" type='button' onclick="account_profile_edit('#profile-socialaccount-table')" 																																																																											  style=' width:60px; padding:1%; height:30px; background-color:#e6e5e3; border:none; color:#d6051d; font-weight:bold; cursor:pointer; border-radius:5px;  border:1px solid #95a1a9; ' value="cancel"  /> 
							</td>   
					</table>   
				</div> 
				<div id="accountsetting-wrapper-container-table-body-right-profile-table-location-left"  style="padding-top:20px;" >  
					Social
				</div>  
			</td> 
		<tr>
			<td id='accountsetting-wrapper-container-table-body-right-profile-table-avatar' class="accountsetting-wrapper-container-table-body-right-profile-table-td"  >  
				<ul>  
					<li id="accountsetting-wrapper-container-table-body-right-profile-table-avatar-left" style="border:1px solid none;font-size:13px;font-weight:normal">  
						Image
					</li>  
					<li id="accountsetting-wrapper-container-table-body-right-profile-table-avatar-center" style="border:1px solid none;width:69%" >  

						<table border="0" cellpadding="0" cellspacing="0" width="100%" >
							<tr> 
								<td> <div style="font-size:12px; text-align:center" > Profile Photo </div></td> <td class ='account-profile-timeline' >
                                    <div  style="text-align:center; " > Cover Photo </div></td> <tr>
								<td style="padding-top:20px; text-align:center" >
									<?php 	  
										$mppno = $mc ->member_profile_pic_query( array('mno'=>$mno  , 'type'=>'get-latest-mppno' ) );

										if (  file_exists("$mc->ppic_profile/$mppno.jpg")) { 		
											echo " <img id='img_prev' src='$mc->ppic_profile/$mppno.jpg'  style='width: 90px !important; height: 90px !important;'  > ";
										}else{
											echo " <img id='img_prev' class='profile-pic-default' src='$mc->ppic_profile/$davatar'  style='width: 90px !important; height: 90px !important;' > ";
										} 
									?>  
								</td>
								<td style="padding-top:20px; " >
                                    <div class ='account-profile-timeline' >
									<?php
										$mptno = $mc->member_profile_timeline_query( array('mno'=>$mno , 'type'=>'get-latest-mptno' ) );
										// echo " $mptno  $mptno  ";
										if (  file_exists("$mc->profileTimeline_cropped/$mptno.jpg")) { 		
											echo " <img id='img_prev' class='profile-pic-default' src='$mc->profileTimeline_cropped/$mptno.jpg'  > ";
										}else{
											echo " <img id='img_prev' class='profile-pic-default' src='$mc->profileTimeline_cropped/default-profile-timeline.jpg'  > ";
										} 
									?>
                                    </div>
								</td>
							<tr>
								<td style="padding-top:10px;text-align: center;" >
									<form  action="profile_crop_display.php" method="POST" enctype="multipart/form-data" id="upload-profile-pic" >
										<input type='file' id="f_image_profile_pic" name="file" runat="server" style="display:none;"  />
	    								

	    								<!-- <img 
		    								id="avatar-right-uploadprofile" 
		    								src='<?php echo "$mc->genImgs/change-profile.png"; ?>' 
		    								onclick="$('#f_image_profile_pic').click( );" 
	    								>
 										-->

	    								<img 
						 					id="avatar-right-uploadprofile1"  
							 				src="fs_folders/images/accountsettings/update.png" 
							 				onclick="$('#f_image_profile_pic').click( );" 
							 				onmousemove=" mousein_change_button ( '#avatar-right-uploadprofile1' , 'fs_folders/images/accountsettings/update-mouse-over.png' )" 
							 				onmouseout="mouseout_change_button (  '#avatar-right-uploadprofile1'  , 'fs_folders/images/accountsettings/update.png' ) "
						 				/> 

    								</form>
								</td>
								<td class="account-profile-timeline-button" >
                                    <center>
                                        <form  action="profile_crop_display.php?type=profile-timeline" method="POST" enctype="multipart/form-data" id="upload-profile-pic-timeline" >
                                            
                                            <input type='file' id="f_image_timeline" name="file" runat="server" style="display:none;"  />
                                            
                                        <!--     <img 
	                                            id="avatar-right-uploadprofile" 
	                                            src='<?php echo "$mc->genImgs/change-profile.png"; ?>' 
	                                            onclick="$('#f_image_timeline').click( );" 
                                            >
 -->
                                            <img 
							 					id="avatar-right-uploadprofile2"  
								 				src="fs_folders/images/accountsettings/update.png" 
								 				onclick="$('#f_image_timeline').click( );" 
								 				onmousemove=" mousein_change_button ( '#avatar-right-uploadprofile2' , 'fs_folders/images/accountsettings/update-mouse-over.png' )" 
								 				onmouseout="mouseout_change_button (  '#avatar-right-uploadprofile2'  , 'fs_folders/images/accountsettings/update.png' ) "
						 					/> 


                                        </form>
                                    </center>
								</td>
						</table>  
					</li> 
				</ul> 
			</td>
		<tr> 
			<td style="display:none" >  
			 	<!-- <input type = 'button' value="NEXT" id="account-settings-next" style=" padding:10px; border:1px solid none; color:#fff; font-weight:bold; float: right; width: 19%; border-radius:5px; background-color: #d6051d; display:block" />   -->
			</td>
	</table> 
<!-- </div> -->


