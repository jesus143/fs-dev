<?php 

	require("../../../../fs_folders/php_functions/connect.php");    
	require("../../../../fs_folders/php_functions/function.php");
	require("../../../../fs_folders/php_functions/myclass.php");
	require("../../../../fs_folders/php_functions/library.php");
	require("../../../../fs_folders/php_functions/source.php"); 
 	$mc = new myclass();   
 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );   




 	# initialize about info  

 	    $ui    	   = $mc->get_user_info_by_id ( $mno );  
	 	$fname     = $ui[0]['firstname']; 
	 	$nname     = $ui[0]['nickname']; 
	 	$lname     = $ui[0]['lastname'];
	 	$uname     = $ui[0]['identity_username'];
	 	$byear     = $ui[0]['bdate']; 
	 	$gender    = $ui[0]['gender'];
	 	$about     = $ui[0]['aboutme'];   
	 	$country   = $ui[0]['country'];
	 	$province  = $ui[0]['state_'];
	 	$city      = $ui[0]['city']; 
	 	$ziptcode  = $ui[0]['zip'];   


?> 

 <style type="text/css">
	.title-text{ 
		font-size: 12px;
		color:blue;
		padding-bottom: 5px;
		padding-top:2px; 
	}

 </style>


 <div id='res' style="display:none" >
 	
 </div>


<div id="welcome-content-container" >  	 
	<center>  
		<div id="welcome-about-container" >  
			<div>
	 			<table border="0" cellpadding="0" cellspacing="0" style="width:100%" > 
	 				<tr>
	 					<td style="background-color:#f6f7f8; padding:20px; padding-top:5px;border-radius:5px;" > 
	 						<table border="0" cellpadding="0" cellspacing="0" style="width:100%" id='' >
	 						 	<tr> 
	 						 		<td> <div class="title-text" >NAME</div> </td>
	 						 		<td> </td>
	 						 		<td> </td>
	 						 		<td> <div  class="title-text" style="margin-left:3px;" > USERNAME</div> </td>
	 						 	<tr> 
	 						 		<td  style="width:200px; background-color:#fff;" >  
		 						 		<center> 
		 						 			<input style="border:1px solid white"  type="text"  placeholder='FIRST NAME' value="<?php echo "$fname"; ?>" id='fname' /> 
		 						 			<div id="fname-err"  class="error-container" >  ( * ) first name required </div>
		 						 		</center>
	 						 		</td> 
	 						 		<td  style="width:200px; background-color:#fff;" >  
		 						 		<center> 
		 						 			<input style="border:1px solid white"  type="text"  placeholder='MIDDLE NAME / NICK NAME'  value="<?php echo "$nname"; ?>" id='nname' /> 
		 						 			<div id="nname-err"  class="error-container" >  ( * ) first name required </div>
		 						 		</center>
		 						 	</td>
	 						 		<td  style="width:200px; background-color:#fff;" >  
		 						 		<center> 
		 						 			<input style="border:1px solid white"  type="text"  placeholder='LAST NAME'  value="<?php echo "$lname"; ?>" id='lname' />
		 						 			<div id="lname-err"  class="error-container" >  ( * ) last name required </div>
		 						 		</center> 
		 						 	</td>
	 						 		<td  style=" background-color:#fff;" >  
		 						 		<center> 	
		 						 			<input style="border:1px solid white"  type="text"  placeholder='USER NAME'  value="<?php echo "$uname"; ?>" id='uname' onfocus="jquery_effects( '.signup-warning-username' , 'slide-down' )" onblur="jquery_effects( '.signup-warning-username' , 'slide-up' )"  />
		 						 			<div id="uname-err"  class="error-container" >  ( * ) username exist </div> 
		 						 		</center> 
		 						 	</td>  
		 						 <tr> 
		 						 	<td> </td>
		 						 	<td> </td>
		 						 	<td> </td>
		 						 	<td> <div id="login-message-alert-warning"  class="signup-warning-username" style="display:none; position:absolute; width:197px;margin-left:3px;" >  username can’t be change once submitted </div>   </td>

	 						</table> 
	 					</td> 
	 				<tr> 
	 					<td style="visibility:hidden"  > 1 </td>
	 				<tr> 
	 					<td>   
		 					<table style="width:100.5%;margin-left:-3px;" border="0"   >
		 						<tr> 
		 							<td> 
		 								<table border="0" cellspacing="0" cellpadding="0" width="100%;" style="background-color:#f6f7f8; padding:20px; padding-top:5px;border-radius:5px;"  >
				 						 
				 							<tr> 
				 								<td style="width:400px;" > 

					 								<div style="margin-top:-56px;" > 
					 								<table border="0" cellpadding="0" cellspacing="0" style="width:100%;" >
					 									<tr> 	
					 										<td> <div class="title-text" >  BIRTH YEAR </div> </td>
					 										<td> <div class="title-text" >  GENDER </div> </td>
					 									<tr> 
					 										<td> 
					 											<select id='byear' style="width:100%;border:1px solid white;background-color:white" > <option>Birth year</option> <?php for ($i=2005; $i >  1950 ; $i--) { echo "<option>$i</option>"; } ?> </select>  
					 											<div id="byear-err"  class="error-container" >  ( * ) birth year required </div>
					 										</td>
					 										<td> 
					 											<select id='gender' style="border:1px solid white;background-color:white" ><option>Gender</option> <option>Male</option>  <option>Female</option>   </select>  
					 											<div id="gender-err"  class="error-container" >  ( * ) gender required </div>
					 										</td>
					 								</table> 
					 								</div>
					 							</td>   
				 								<td> 
				 									<table border="0" cellpadding="0" cellspacing="0" style="width:100%" >
				 										<tr> 
				 											<td>  
				 												<div class="title-text" >  ABOUT </div>
				 											</td>
				 										<tr>
				 											<td> 
				 												<textarea id='about' style="width:101%;height:90px;resize:none; border:1px solid white; background-color:white" placeholder='TELL SOMETHING ABOUT YOU' ><?php echo "$about"; ?></textarea>
				 											</td>
				 									</table>
				 									
				 								</td> 
				 						</table>  
		 							</td>    
		 					</table> 
	 					</td> 
	 				<tr> 
	 					<td style="visibility:hidden" > 2 </td>
	 				<tr>	
	 					<td style="background-color:#f6f7f8;  padding:20px;padding-top:5px;border-radius:5px;" > 
	 						<table border="0" cellpadding="0" cellspacing="0" style="width:100%" id='' >
	 						 	<tr> 
	 						 		<td style="width:210px" > <div class="title-text" >LOCATION</div> </td>
	 						 		<td style="width:210px" > </td>
	 						 		<td style="width:210px" > </td>
	 						 		<td style=" " > </td>
	 						 	<tr> 
	 						 		<td style="width:200px; background-color:#fff;" > 
	 						 			<center>
	 						 				<select style="border:1px solid white"  class="profile-select" id="country" name ="country" onchange="print_state('state',this.selectedIndex);" style="text-transform:capitalize;" ><option>Country</option> </select> 
	 						 				<div id="country-err"  class="error-container" >  ( * ) country required </div> 
	 						 				<script language="javascript">print_country("country");</script>     
	 										
	 						 			</center></td> 
	 						 		<td style="width:200px; background-color:#fff;" > 
	 						 			<center>
	 						 				<select style="border:1px solid white" class="profile-select" id ="state" name ="state"  onchange="print_city('city',this.selectedIndex);" style="text-transform:capitalize;"  > <option>State / providence</option> </select>  
	 						 				<div id="state-err"  class="error-container" >  ( * ) state required </div>
	 						 			</center>
	 						 		</td>
	 						 		<td style="width:200px; background-color:#fff;" > 
	 						 			<center>
	 						 				<input style="border:1px solid white" type="text"  placeholder='CITY'     value="<?php echo "$city"; ?>"      id='city'  />
	 						 				<div id="city-err"  class="error-container" >  ( * ) city required </div>
	 						 			</center> 
	 						 		</td>
	 						 		<td style=" background-color:#fff;" > 
	 						 			<center>
	 						 				<input style="border:1px solid white" type="text"  placeholder='ZIP CODE' value="<?php echo "$ziptcode"; ?>"  id='zipcode'   /> 
	 						 				<div id="zipcode-err"  class="error-container" >  ( * ) zip code required </div>
	 						 			</center> 
	 						 		</td> 
	 						</table> 	
	 					</td>
	 				<tr> 
	 					<td style="visibility:hidden" >  4 </td>  
	 			</table>   
	 		</div>  
	 		<div style="background-color:#f6f7f8; padding:20px;margin-left:-20px; width:100%; border-radius: 0px 0px 5px 5px;" > 
				<center> 
					<!-- <a href="?welcome=select-brand"> --> 
							<!-- <img src="<?php echo "$mc->genImgs/login-welcome-continue.png";  ?>"  onclick="welcome_change_content( '#welcome-result-container', '<?php echo "$mc->login_path_page/welcome/welcome-select-brands.php"; ?>' , '#more_loading2 img' , '2'  )"  >   			  -->
					<!-- </a> --> 
	 					<img src="<?php echo "$mc->genImgs/login-welcome-continue.png";  ?>" onclick="welcome_change_content( '#welcome-result-container', '<?php echo "$mc->login_path_page/welcome/welcome-suggested-member.php"; ?>' , '#more_loading3 img' , '3' )"  >   			   
				</center>
			</div> 
	 	</div>
	</center>
 </div>   