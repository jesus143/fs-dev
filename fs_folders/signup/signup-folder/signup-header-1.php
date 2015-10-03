<!-- <div id="signup-row-title" style=" text-align:center; position:absolute; border:1px solid none; margin-top:100px; margin-left:600px; color:#fff; width:300px; z-index:101;  "   >
	<div style="border:1px solid none; width:300px;  " >
		SOMETHING COOL IS COMING TO FASHION LOVERS!
	</div>  
	<div style="font-size:25px;   width:250px; margin:auto; border:1px solid none; margin-top:10px;" >
	 	Sign up for the private beta
	</div> 
	<div style="font-size:12px; font-family:arial; border:1px solid none; width:250px; margin:auto; margin-top:10px; 	"  >
	 	Enter your email address to receive an invite to our private BETA. Space is limited so sign up now.
	</div>  
		<div style="border:1px solid none; width:250px;    margin:auto;margin-top:10px; border: none; " >
		<input  id="email1" type="text"    value='E-MAIL' style="border-radius:5px; padding:7px;    width:250px; color: #ccc;  padding-right:75px; height:35px; border: none; "  /> 
		<input type="submit"  value=""  onclick="gen_popup_check_invited_info( '#email1' , '' , '' )"  style=" background:url('<?php echo "$mc->genImgs/signup-submit.png" ?>');    position:relative;  width:73px;   height:30px; background-repeat:no-repeat;   border-radius:5px; cursor:pointer;  float:right; margin-top:-32px; margin-right:2px;border: none;  " />
	</div>  
	 <div style="font-size:12px; font-family:arial; width:220px; margin:auto;  margin-top:10px;  " >
	 	* Sign ups are currently restricted to  invite-only until the beta period is over.
	 </div>
</div>    -->
 
		 <?php
		  	$browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		    if ($browser == true){
		    	$browser = 'iphone';
		    	$table = "<table border='0' cellpadding='5' cellspacing='0' style='width:800px;'	 >";  
		    	$style['private_signup_title_1'] = 'private-signup-title-1-iphone'; 
		    	$style['private_signup_title_2'] = 'private-signup-title-2-iphone'; 

		    	// echo "this is iphone <br> ";
		  	} 
		  	else{ 
		  		$browser = 'not iphone';	
		  		$table = "<table border='0' cellpadding='10' cellspacing='0' style='width:800px;'	 > ";  
		  		$style['private_signup_title_1'] = 'private-signup-title-1'; 
		    	$style['private_signup_title_2'] = 'private-signup-title-2'; 
		    	// echo " this is not iphone <br>";
		  	}  
		  	// echo " u used a $browser <br> ";
		?>
	<div id="private-signup-header-container" >   
		<?php //$mc->menu( ); ?>   

		<!-- header logo -->
			<table border="0" cellpadding="0" cellspacing="0" style="width:100%;padding-bottom:10px;" >
				<tr> 
					<td style="width:90%" >   
						<a href="\">  <img src="<?php echo "$mc->genImgs/blue-logo.png"; ?>" style='height:30px;' ></a>  
					</td>
					<td> 
						<a href="\"> 
							<div  id="signup-login-text" class="fs-text-blue" > Log in </div>
						</a> 
					</td>
			</table> 
 
		<!-- header design  --> 
			<div id="private-signup-header-content" style="display:block" >   
				<center> 
					<?php echo 	$table ;  ?>
						<tr>  
							<td> 
								<div  id="<?php echo $style['private_signup_title_2']; ?>"  > 
									<!-- TIRED OF SPENDING DAYS AND HOURS CREATING CONTENT THAT HARDLY GETS SEEN ON SOCIAL NETWORKS? ... YES -->
									<?php  
										$title = 'A better way to discover fashionable people, places and things.'; 
										// $title = 'Something cool is coming... What? ';
										echo "<b style=\"font-family:arial !important; font-size:35px; word-spacing: -1px; \"  >$title</b>";  
									?> 
								</div>
							</td>	
						<tr> 
							<td style="display:none" >  
								<div id="<?php echo $style['private_signup_title_1']; ?>" > 

									So were we! So we decided to build Fashion Sponge, an better alternative to posting on Facebook, Look Book, Instagram, Pinterest and Tumblr.
									<!-- A better way to discover fashionable people, places and things. -->
								</div> 
							</td>	
						<tr> 
							<td> 
								<div id="<?php echo $style['private_signup_title_2']; ?>"  >
									Sign up for the private beta
								</div>
							</td>	
						<tr> 
							<td> 
								<div id="<?php echo $style['private_signup_title_1']; ?>" > 
									Enter your email and website / blog address for a chance to receive an invite. 
								</div> 
							</td>	
						<tr> 
							<td>  
								<center> 
									<div style="border:1px solid none; width:525px; height:40px; " >   
										<input id="email1" type="text" value='E-MAIL' 						onkeyup = "gen_popup_check_invited_info( '#email1' , '#web_blog' , '' , 'submit-not' , event )"	 style="border-radius:5px; border: none;  padding:7px;  width:250px;  color: #ccc; float:left; height:35px  "  />  			
										<div style="border:1px solid none; width:200px; float:right " >
											<input  id="web_blog" type="text"    value='WEBSITE / BLOG' 	onkeyup = "gen_popup_check_invited_info( '#email1' , '#web_blog' , '' , 'submit-not' , event )"	 style="border-radius:5px; padding:7px; border: none;    width:250px; color: #ccc; float:right; padding-right:75px; height:35px  "  /> 
											<input type="submit"  value=""                                  onclick = "gen_popup_check_invited_info( '#email1' , '#web_blog' , '' , 'submit-yes' , event )"   style=" background:url('<?php echo "$mc->genImgs/signup-submit.png" ?>');  position:relative;  width:73px;   height:30px; background-repeat:no-repeat;   border-radius:5px; cursor:pointer;  float:right;margin-top:-32px; margin-right:2px;border: none;  " />
										</div> 
							 		</div>  
							 	</center> 
							</td>	
						<tr> 
							<td> 
								<div id="<?php echo $style['private_signup_title_1']; ?>" >
									*Membership is restricted to people who can prove they <br> consistently create high quality compelling content. 
								</div>  
							</td>	 
					</table> 
				</center> 
			</div> 

				<!-- <div id="private-signup-header-bg-img" >   --> 
					<!-- <img  src='<?php echo "$mc->genImgs/signup-slide1.jpg" ?>'  />  --> 
				<!-- </div>  -->  	

			


			<div id='slideShowContainer' style="position:absolute; border:1px solid red;  " >  


				<!--
				<a href="http://fashitects.blogspot.com/" target="_blank" >
					<img  src='<?php echo "$mc->genImgs/collage.jpg" ?>' style='width:900px; height:auto; display:block '  />
				</a>
				 <a href="http://fashitects.blogspot.com/" target="_blank" >
					<img  src='<?php echo "$mc->genImgs/signup-slide1.jpg" ?>' style='width:900px; height:400px; display:block '  />
				</a>
				<a href="http://garnerstyle.blogspot.com/" target="_blank" >
					<img  src='<?php echo "$mc->genImgs/signup-slide2.jpg" ?>'  style='width:900px; height:400px;   display:block' /> 
				</a> 
				<a href="http://www.soulofashopper.com/"  target="_blank" >
					<img  src='<?php echo "$mc->genImgs/signup-slide3.jpg" ?>'  style='width:900px; height:400px;   display:block' /> 
				</a>
				<a href="http://themartinity.com/"       target="_blank" >
					<img  src='<?php echo "$mc->genImgs/signup-slide4.jpg" ?>'  style='width:900px; height:400px;   display:block' /> 
				</a>   -->
			</div>    
 			
 			<div id="private-signup-header-bg-color-1"  >    
			</div>  
			<div id="private-signup-header-bg-color"  >    
			</div>  

	</div>
 