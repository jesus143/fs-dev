<?php
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");
	require("fs_folders/dropdown/dropdown_php_file/dropdown.php");
	$dd = new dropdown();
	$mc = new myclass();  
	$mc->auto_detect_path();

    // $mc->get_visitor_info( "" , "info" );
 	if ( !empty($_GET["infp"]))  {
	 	$infp = $_GET["infp"];
	 	// echo "$infp";
	}
	else {  
		$infp = "about_us";
	}   
	$mc->get_visitor_info( "" , "info tab: $infp " , "info" );   
?> 

<html>  
	<head>  
		<?php  $mc->header_attribute( 
 				" Info | Fashion Sponge" , 
 				"Fashion Sponge is the easiest & fastest way to: Show your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.",
 				"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration " 
 		); ?>
		 
 
	 	<link rel="stylesheet" type="text/css" href="fs_folders/info/info_style_file/info_style.css"> 
		<!-- new inner script -->
			<script type="text/javascript" src="fs_folders/info/info_js_file/info_ajax.js" ></script>
			<script type="text/javascript" src="fs_folders/info/info_js_file/info_jquery.js" ></script>
		<!-- end inner script -->
  
		<?php  $dd->dropdown_v1(); ?>
	</head> 
	<body onload="info_start('<?php echo $infp; ?>')" >  

		<?php  
			// require('fs_folders/fs_popUp/popUp_php_file/popupinvite.php');
			// require ("fs_folders/fs_popUp/popUp_php_file/popUp.php");  
			
			$mc->plugins( "google analytic" , " invite " );
		?> 
		<center>
			<div id="info_wrapper" >  
				<table id="info_table_container" border="0" cellpadding="0" cellspacing="0" > 
					<tr> 
						<td id="info_header" >  
							<?php require ("fs_folders/page_header/header_php_file/header4_info.php");  ?>   
						</td>
					<tr>
						<td id="info_body" >  
							<div id="info_body_right"> 	  
								<div id="content_about_us"  style="padding-top:10px;" > 
								 	<span id="about_us_title1" > WHAT IS FASHIONSPONGE.COM?  </span>
								 	<table id="about_us_t1" border="0" cellpadding="0" cellspacing="0" style="padding-right:10px;" > 
								 		<tr> 
								 		<td id="about_us_intro_left" > 
								 			<span > 
								 				<!-- Fashion Sponge is the easiest and fastest way to <br>
								 				share fashion and lifestyle photos, your outfit of <br>
								 				the day and blog articles. You can also discover <br>
								 				fashionable people, brands and blogs, get beauty <br>
								 				and grooming tips and style advice while having <br>
								 				the chance of becoming social media famous by <br>
								 				being featured on our popular page and blog.<br> -->


								 				<!-- Fashion Sponge is the easiest and fastest way <br>
								 				to: Show your <span title='outfit of the day' > ootd </span>, see the latest fashion trends, <br>
								 				discover new fashion blogs, get style tips and <br>
								 				find fashion inspiration, while having the chance <br>
								 				of becoming social media famous by being  <br>
								 				featured on our popular page.<br> --> 

								 				FASHION SPONGE IS THE EASIEST AND FASTEST <br>  WAY TO... 
								 				Show your OOTD, see the latest trends,  <br>discover  new 
								 				blogs and people, get fashion  inspiration <br>  and  style 
								 				advice, while having a chance at  winning <br> monthly prizes. 
								 				
								 			</span> 
								 		</td>
								 		<td id="about_us_intro_right"  >
								 			<br>
								 			<img src="fs_folders/images/info/double_quote_red.png">
								 			<br><br>
								 			<span style='text-transform:uppercase'    >
									 			<?php 
										 			// echo strtoupper( 
										 			// 	"Our mission is to be <br>
										 			// 	the go to source for <br>
										 			// 	all things fashion;	<br>"
										 			// 	);  
									 			?>
								 				Our mission is to be 
								 				a go to source for 
								 				discovering the 
								 				latest within fashion, 
								 				beauty, culture and 
								 				entertainment.
								 			</span> 
								 		</td>
								 	</table>
								 	<table id="about_us_t2" border="0" cellpadding="0" cellspacing="0"  > 
								 		<tr>  	
								 		 
								 		<tr>  
									 		<td id="about_us_title2" > 
									 			<span> WHAT IS A FASHION SPONGE ? </span> 
									 		</td>
									 	<tr> 
									 		<td id="about_us_desc2" > 
									 			<span> A person who consumes fashion and shares it with the world for others to be inspired. </span>
									 		</td>
									 	<tr>
									 		<td  id="about_us_title2" > 
									 			<span> OUR SLOGAN </span>
									 		</td> 
										<tr>
											<td id="about_us_desc2" >
												<span>  "Dont Just Dress. Dess Well, or DJDDW  </span>
											</td>
										<tr>	
											<td id="about_us_title2" >
												<span> OUR MISSION </span>
											</td>
										<tr>
											<td id="about_us_desc2" >
												<!-- <span> Our mission is to be the go to source for all things fashion. Our primary focus is helping members improve their overall appearance and knowledge on new and emerging fashion brands. </span> -->
												<span> Our mission is to be a go to source for discovering the latest within fashion, beauty, culture and entertainment. The primary focus is helping members improve their overall appearance plus there knowledge on new and emerging fashion brands and beauty and grooming products. </span>
											</td>
										<tr>
											<td id="about_us_title2"  >
												<span> OUR VISION </span>
											</td>
										<tr>
											<td id="about_us_desc2" >
												<span> We see Fashion Sponge changing the way people go about connecting, sharing, discovering and purchasing fashionable products and information online. Simply put if it relates to fashion, you will see it on Fashion Sponge. </span>
											</td>
										<tr>
											<td id="about_us_title2"  >
												<span> OUR CORE VALUES </span>
											</td>
										</table>


										<table id="about_us_t3" border="0" cellpadding="0" cellspacing="0"> 
										<tr>
											<td id="about_us_title3"  >
												<span> WE ARE <span id="red"> FUN - FILLED. </span> </span>
											</td>
										<tr>

											<td  id="about_us_desc3" >
												<span> We know having a fun workplace will create a relaxing and stress free environment. </span>
											</td>
										<tr>
											<td id="about_us_title3" >
												<span> WE ARE VERY <span id="red"> APPRECIATIVE. </span> </span>
											</td>
										<tr>
											<td id="about_us_desc3">
												<span> We acknowledged that our business success solely depends on our members, staff and partners. </span>
											</td>
										<tr>
											<td id="about_us_title3" >
												<span> WE LOVE TO <span id="red"> SIMPLIFY.</span> </span>
											</td>
										<tr>
											<td id="about_us_desc3" >
												<span> We believe in being simple, because everything else is just complicated.</span>
											</td>
										<tr>
											<td id="about_us_title3" >
												<span> WE ARE <span id="red"> HELPFUL.</span>  </span>
											</td>
										<tr>
											<td id="about_us_desc3" >
												<span> We enjoying supporting others.</span>
											</td>
										<tr>
											<td id="about_us_title3" >
												<span> WE HAVE  <span id="red" > INTEGRITY.</span>  </span>
											</td>
										<tr>
											<td id="about_us_desc3" >
												<span> We only do business one way, the right way. </span>
											</td>
										<tr>
											<td id="about_us_title3" >
												<span> WE ARE <span id="red" >OPEN - MINDED.</span>  </span>
											</td>
										<tr>
											<td id="about_us_desc3" >
												<span> We love getting feedback because feedback is the fabric to our success.</span>
											</td>
										<tr>
											<td id="about_us_title3" >
												<span> WE ARE OPEN <span id="red" >NURTURING.</span>  </span>
											</td>
										<tr>
											<td id="about_us_desc3" >
												<span> We believing in creating a diverse workplace that will continue to sparks creativity, fuel growth and offer advancement.</span>
											</td>
										<tr>
									</table>
								</div>  
								<div id="content_our_story" style="padding-top:10px;"   class="content_our_story" >  
									<table border="0" cellspacing="0" cellpadding="0" style="width:100%;"   > 
										<tr>
											<td style=" padding-bottom:20px;" > 
												<span id="our_story_title1" > OUR STORY  </span>
											</td>
										<tr>
											<td>
												
											 	 <ul> 
											 		<li style="width:49%;">
											 			<span style='font-family:arial;font-size:12px;' >   
											 				Working as a wardrobe stylist Salvador, the founder 
											 				of Fashion Sponge, realized that billions of people 
											 				throughout the world wore clothing, but only a few 
											 				applied them correctly to appear well dressed. 
											 				Looking to help a large number of people dress and 
											 				look well, he knew that the internet was the only 
											 				space he could create the global impact he was 
											 				looking to make. After discovering that the popular 
											 				online fashion communities did not focus on helping 
											 				members improve their overall appearance nor did they 
											 				showcase enough diversity, he knew there was a rift in 
											 				the online fashion communities! He also strongly believes 
											 				that diversity sparks inspiration which fuels innovation. 
											 				So combining his love for fashion, technology and philanthropy 
											 				he decided to create Fashion Sponge.
											 			</span>  
											 		</li>
											 		<li style="  padding-left:6%; width:40%; padding-top:3%; " > 
											 			<table  border="0" cellpadding="0" cellspacing="0"  > 
											 				<tr>
											 					<td> <img src="fs_folders/images/info/double_quote_red.png"> <br><br> </td>
											 				<tr>
											 					<td> 
											 						<span style='text-transform:uppercase; font-size: 20px; font-weight: bold; color: #c51d20;  ' >
														 		 		AFTER DICOVERING THAT 
														 		 		THE POPULAR ONLINE
														 		 		FASHION COMMUNITIES DID 
														 		 		NOT FOCUS ON HELPING 
														 		 		MEMBERS TO IMPROVE THEIR 
														 		 		AVERALL APPEARANCE
															 		</span> 
															 	</td> 
											 			</table>
											 		</li> 	 
											 	</ul>
										 	</td>
										 <tr>
										 	<td> 
											 	<table  border="0" cellpadding="0" cellspacing="0"  > 
											 		<tr>
											 			<td id="our_story_intro_left1" > 
												 			<span> 
											 				 	The founder believes Fashion Sponge will serve as a go to source for discovering the latest within fashion, beauty, culture
																and entertainment. The primary focus is helping members improve their overall appearance plus there knowledge on new and 
																emerging fashion brands and beauty and grooming products. Creating the tagline, “Don’t Just Dress. Dress Well." he wanted 
																members to always remember that when your shopping, putting on clothing, styling your hair, applying your makeup or getting 
																groomed, you are doing it, so it brings out the best of you. 
												 			</span>
											 			</td>  
											 	</table> 
										 	</td>
									</table>
								</div> 
								<div id="content_FAQ"     style="display:none;padding-top:10px;" > 

									<!-- FAQ -->
								</div>
								<div id="content_careers" style="display:none;padding-top:10px;"> 

									<!-- careers -->
								</div>
								<div id="content_advertise" style="padding-top:10px;" >  

									<span id="advertise_title1" >  ADVERTISE WITH FASHION SPONGE </span>
								 	<table id="advertise_t1" border="0" cellpadding="0" cellspacing="0" > 
								 		<tr> 
								 		<td id="advertise_intro_left" > 
								 			<span > 
								 				Are you a boutique owner who has <br>
								 				inventory that needs to be seen by the <br>
								 				masses? Are you hosting a fashion event <br>
								 				and looking for attendees? Are you an <br>
								 				emerging brand looking to launch your <br>
								 				product? Are you a creative firm, agency <br>
								 				or school looking for talented people? <br>
								 				Answering yes means we can help you <br>
								 				reach your target audience. <br>
								 			</span> 
								 		</td>
								 		<td id="advertise_intro_right"  >
								 			<br>
								 			<img src="fs_folders/images/info/double_quote_red.png">
								 			<br><br>
								 			<span>
								 			<?php 
								 			echo strtoupper(  
								 				"We offer competitive <br> 
								 				weekly and monthly <br>
								 				advertising opportunities <br>"
								 				);
								 				?>
								 			</span> 
								 		</td>
								 	</table >

								 	<table id="advertise_t2" border="0" cellpadding="0" cellspacing="0" > 
								 		<tr>
								 			<td id="our_community" > 
									 			<span>
									 				Our community of tastemakers and fashion industry professionals return to<br> 
									 				Fashion Sponge every day to read blog articles, get fashion inspiration and <br>
									 				to discover the latest products and services.
									 			</span>
								 			</td>  
								 		<tr>
								 			<td id="advertising_solutions" > 
								 				<span> ADVERTISING SOLUTIONS </span> 
								 			</td>	
									 	<tr>		 
						 					<td id="advertising_solutions_desc"  > 
						 					 	<span> 
						 					 		Our advertising team has worked closely with our developers to create a  <br>
						 					 		advertisement solution that will spark engagement and provide a high amount of AD <br> 
						 					 		exposure which will give you the opportunity to brand your product with our <br>
						 					 		community of influencers. <br><br>  
													We offer competitive weekly and monthly advertising opportunities.  
						 					 	</span>
						 					</td>  
								 		<tr>	
								 			<td id="available_options" > 
								 				<span> <b> AVAILABLE OPTIONS</b> </span> 
								 			</td>
								 		<tr>	
								 			<td id="available_options_desc"  > 
								 				<ul>
													<li> Banner Ads </li>								 					
													<li> Video Ads </li>	
													<li> Custom Content </li>	
													<li> Product Giveaways </li>	
													<li> Sponsored Contest</li>	
													<li> Multi Platform Advertising </li>	
													<li> Advanced Targeting </li>
													<li> Sponsored Contest </li>
													<li> Site Takeover </li> 
								 				</ul> 
								 			</td>  
								 		<tr>
								 			<td id="field_desc" >  
									 			<span>
													While, on this page, several AD’s within our network were clicked. <br>  
													One could have been yours! Quickly fill out the required fields below and we will get <br>
													back to you as soon as possible. Our sales team will to happy to create custom <br>
													packages and provide our media kit with current rates. <br>
													
													<b style='color:#c51d20'> For even faster service, call 1800 - 555 -1212. </b>			 				

									 			</span> 

								 			</td>  
								 		<tr>
								 			<td id="fields"  > 


									 			<table id="table1" border="0" cellpadding="0" cellspacing="0" > 
									 				<tr>
									 					<td> <span> First Name </span> </td>    <td id="field_right" > <span> Last Name </span> </td> <tr>  
									 					<td> <input id="advertise-fname" type="text"  />    </td>    <td id="field_right" > <input id="advertise-lname" type="text"  /> </td> 
									 				<tr>   
									 					<td><span> E-mail </span> </td>
									 				<tr>	
									 					<td> <input id="advertise-Email" type="text"  /> </td>
									 				<tr>	
									 					<td> <span>  Website </span></td>
									 				<tr>	
									 					<td> <input id="advertise-website" type="text"  /> </td>
									 				<tr>	
									 					<td> Business Name </td>
									 				<tr>	
									 					<td> <input id="advertise-business-name" type="text"  />  </td>
									 				<tr>	
									 					<td> Phone Number </td>
									 				<tr>	
									 					<td><input id="advertise-phone-number" type="text"  /> </td>
									 				<tr>	
									 					<td style="display:none"  > Advertisement Budget </td>
									 				<tr>	
									 					<td style="display:none"  id="advertise-budget"  > <input type="text"  /> </td>
									 				<tr>	
									 					<td>  </td>
									 				<tr>	
									 					<td> <span> Advertisement Budget </span></td> 
									 				<tr>	
									 					<td> 
									 						<table id="dropdown_table" border="0" cellpadding="0" cellspacing="0" > 
											 					<tr>  	
												 					<td>
												 						<div id='ocpstyle' class="ocpstyle4" > 
								 											<table border="0" cellpadding="0" style="width:210px;" > 
								 												<tr>
										 											<td id="td_selected" > <span id="os" class="pa_selected4" >SELECT</span> </td> <td id="bridge_occu" class="bridge_occu4"  > <img src="fs_folders/images/body/reg_drop_down.png"></td>
										 										<tr> 
										 											<td > 	
										 												<div id="DDcontainer_occupation" class="DDcontainer_occupation4"  style="" > 
										 													<span id='title_occu'> SELECT </span>
											 												<ul> 
											 													<li onclick="occ_clicked('$1,000 USD - $5,000 USD','.os_input4','.pa_selected4')" > $1,000 USD - $5,000 USD </li> 
											 													<li onclick="occ_clicked('$5,000 USD - $10,000 USD','.os_input4','.pa_selected4')" > $5,000 USD - $10,000 USD </li> 
											 													<li onclick="occ_clicked('$10,000 USD - $25,000 USD','.os_input4','.pa_selected4')" > $10,000 USD - $25,000 USD </li> 
											 													<li onclick="occ_clicked('Over $25,000 USD','.os_input4','.pa_selected4')" > Over $25,000 USD </li> 
											 												</ul> 
											 											</div>
										 											</td>  
										 										<tr>
										 											<td> 
										 												<input id="os_input" class="os_input4" type="text" name="invited_occu"  value="" />
										 											</td> 
								 											</table>
								 										</div> 
												 					</td> 
											 				</table>  
									 					</td>
									 				<tr> 
									 					<td> <span> Preferred Advertisement </span></td>
									 				<tr>	
									 					<td> 
									 						<table id="dropdown_table" border="0" cellpadding="0" cellspacing="0" > 
											 					<tr>  	
												 					<td>
												 						<div id='ocpstyle' class="ocpstyle1" > 
								 											<table border="0" cellpadding="0" style="width:210px;" > 
								 												<tr>
										 											<td id="td_selected" > <span id="os" class="pa_selected1" >SELECT</span> </td> <td id="bridge_occu" class="bridge_occu1"  > <img src="fs_folders/images/body/reg_drop_down.png"></td>
										 										<tr> 
										 											<td > 	
										 												<div id="DDcontainer_occupation" class="DDcontainer_occupation1" style=" " > 
										 													<span id='title_occu'> SELECT </span>
											 												<ul> 
											 													<li onclick="occ_clicked('Advanced Targeting','.os_input1','.pa_selected1')" >Advanced Targeting</li>
											 													<li onclick="occ_clicked('Banner Ads','.os_input1','.pa_selected1')" >Banner Ads</li>
											 													<li onclick="occ_clicked('Custom Content','.os_input1','.pa_selected1')" >Custom Content</li> 
											 													<li onclick="occ_clicked('Multi Platform Advertising','.os_input1','.pa_selected1')" >Multi Platform Advertising</li> 
											 													<li onclick="occ_clicked('Product Giveaways','.os_input1','.pa_selected1')" >Product Giveaways</li> 
											 													<li onclick="occ_clicked('Sponsored Contest','.os_input1','.pa_selected1')" >Sponsored Contest</li> 
											 													<li onclick="occ_clicked('Site Takeover','.os_input1','.pa_selected1')" >Site Takeover</li> 
											 													<li onclick="occ_clicked('Sponsored Contest','.os_input1','.pa_selected1')" >Sponsored Contest</li> 
											 													<li onclick="occ_clicked('Video Ads','.os_input1','.pa_selected1')" >Video Ads</li>  
											 												</ul> 
											 											</div>
										 											</td>  
										 										<tr>
										 											<td> 
										 												<input id="os_input" class="os_input1" type="text" name="invited_occu"  value="" />
										 											</td> 
								 											</table>
								 										</div> 
												 					</td> 
											 				</table>  
									 					</td>
									 				<tr>  
									 					<td> You are...</td>
									 				<tr>	
									 					<td> 
									 						<table id="dropdown_table" border="0" cellpadding="0" cellspacing="0" > 
											 					<tr>  	
												 					<td>
												 						<div id='ocpstyle' class="ocpstyle2" > 
								 											<table border="0" cellpadding="0" style="width:210px;" > 
								 												<tr>
										 											<td id="td_selected" > <span id="os" class="pa_selected2" >SELECT</span> </td> <td id="bridge_occu" class="bridge_occu2"  > <img src="fs_folders/images/body/reg_drop_down.png"></td>
										 										<tr> 
										 											<td > 	
										 												<div id="DDcontainer_occupation" class="DDcontainer_occupation2" style=" " > 
										 													<span id='title_occu'> SELECT </span>
											 												<ul> 
											 													<li onclick="occ_clicked('Agency','.os_input2','.pa_selected2')" >Agency</li>
											 													<li onclick="occ_clicked('Boutique Owner ','.os_input2','.pa_selected2')" >Boutique Owner </li>
											 													<li onclick="occ_clicked('Creative Firm','.os_input2','.pa_selected2')" >Creative Firm</li>
											 													<li onclick="occ_clicked('Emerging Brand','.os_input2','.pa_selected2')" >Emerging Brand</li>
											 													<li onclick="occ_clicked('Event Planer','.os_input2','.pa_selected2')" >Event Planer</li>
											 													<li onclick="occ_clicked('Fashion School','.os_input2','.pa_selected2')" >Fashion School</li>
											 													<li onclick="occ_clicked('Store Owner','.os_input2','.pa_selected2')" >Store Owner</li>
											 													<li onclick="occ_clicked('Other','.os_input2','.pa_selected2')" >Other</li> 
											 												</ul> 
											 											</div>
										 											</td>  
										 										<tr>
										 											<td> 
										 												<input id="os_input" class="os_input2" type="text" name="invited_occu"  value="" />
										 											</td> 
								 											</table>
								 										</div> 
												 					</td> 
											 				</table>  
									 					</td>
									 			</table>

									 			<table id="table2" border="0" cellpadding="0" cellspacing="0" > 
									 				<tr>
									 					<td>  
									 						<textarea id="advertise-textarea" class="textarea" placeholder="Tell us how we can help your brand or business: Space for 200 or more." >

									 						</textarea>
									 					</td>
									 				<tr>	
									 					<td id="submit" >  
											 				<!-- <input type="submit" value="" onclick="info_advertise()" >  -->
											 				<img src="fs_folders/images/buttons/submit3.png" onclick="info_advertise()" >
											 			</td> 
									 			</table> 
								 			</td>  
								 		<tr> 
								 	</table> 
								</div> 
								<div id="content_contribute" style="display:none;padding-top:10px;" > 
								</div>
								<div id="content_contatact_us" style="padding-top:10px;" > 
  
									<span id="contatact_us_title1" > CONTACT US  </span>
								 	<table id="contatact_us_t1" border="0" cellpadding="0" cellspacing="0" > 
								 		<tr> 
									 		<td id="contatact_us_intro_left" > 
									 			<span > 
									 				<!-- Have a question about Fashion Sponge? Contact us by filling  
									 				out the form below and a member of our team will   
									 				get back to you ASAP. We also can be reach on our  
									 				social media pages if you simply want to say hi.
									 				 -->
									 				Have a question about FashionSponge? Do you want
									 				to give feedback that can help improve the site? 
									 				Contact us by filling out the form below and a 
									 				member of our team will get back to you ASAP. 
									 				We also can be reach on our social media pages 
									 				if you simply want to say hi.  
									 			</span> 
									 		</td>
									 		<td id="contatact_us_intro_right"  >
									 			<table border="0" cellpadding="0" cellspacing="0" > 
									 				<tr>
									 					<td id="contatact_us_intro_right_title" > 
									 						<span> SOCIAL <span> <br><br> 
									 					</td>
									 				<tr>
									 					<td id="contatact_us_intro_right_desc"> 
									 						<span>
													 			 Connect with Fashion Sponge
													 		</span> 
													 	</td> 
													<tr>
														<td id="contatact_us_social_icons" > 
															<table border="0" cellpadding="0" cellspacing="0"  > 
																 <tr>
																	<td>  
																	<a href="https://facebook.com/FashionSponge/"       target="_blank" title="facebook" > <img src="fs_folders/images/icons/social sites/facebook.png"></a>
																	</td> 	
																 
																	<td> 
																		<a href="https://twitter.com/FashionSponge/"    target="_blank" title="twitter" > <img src="fs_folders/images/icons/social sites/twitter.png"> </a>
																	</td> 	
															 
																	<td>
																		<a href="http://instagram.com/FashionSponge/"   target="_blank" title="instagram"> <img src="fs_folders/images/icons/social sites/instagram.png">	</a>
																	</td> 	
															</table>

														</td>
									 			</table> 
								 			</td>
								 	</table>
								 	<br><br> 
								 	<table id="contact_us_fields" border="0" cellpadding="0" cellspacing="0"  > 
								 		<tr>
								 			<td id="email" > 
								 				<table border="0" cellpadding="0" cellspacing="0" > 
								 					<tr>
									 					<!-- <td  style="padding-bottom:10px" > 
									 						<label >E-mail Address </label> 
									 					</td> 
									 				<tr>	 -->
									 					<td>
									 						<input id="contact_us_email" type="text"  placeholder='Your Email'  />
									 					</td> 
								 				</table> 
								 			</td>  
								 		<tr>
						 					<td style="padding-bottom:10px;display:none"> 
						 						<label>Select a topic </label><br> 
						 					</td> 
								 		<tr>
								 			<td id="select" style="display:none" >   
						 						<table id="dropdown_table" border="0" cellpadding="0" cellspacing="0" > 
								 					<tr>  	
									 					<td>
									 						<div id='ocpstyle' class="ocpstyle3" > 
										 						<table border="0" cellpadding="0"  style="width:280px;"  > 
					 												<tr>
							 											<td  id="td_selected"  > <span id="os" class="pa_selected3" >SELECT</span> </td> <td id="bridge_occu" class="bridge_occu3"  > <img src="fs_folders/images/body/reg_drop_down.png"></td>
							 										<tr> 
							 											<td > 	
							 												<div id="DDcontainer_occupation" class="DDcontainer_occupation3" > 
							 													<span id='title_occu'> SELECT A TOPIC </span>
								 												<ul>
								 													<li onclick="occ_clicked('Accessory Designer1','.os_input3','.pa_selected3')" >Accessory Designer1</li>
								 													<li onclick="occ_clicked('Accessory Designer2','.os_input3','.pa_selected3')" >Accessory Designer2</li>
								 													<li onclick="occ_clicked('Accessory Designer3','.os_input3','.pa_selected3')" >Accessory Designer3</li> 
								 												</ul> 
								 											</div>
							 											</td>  
							 										<tr>
							 											<td> 
							 												<input id="os_input" class="os_input3" type="text" name="invited_occu"  value="select a topic" />
							 											</td> 
					 											</table>
					 								 		</div>

						 								 </td>
						 						</table>
							 					 	
									 		</td> 
								 		<tr>
									 		<td id="subject" > 
										 		<input id="contact_us_subject" type="text" placeholder="Subject"  />
								 			</td>  
								 		<tr>
								 			<td id="textarea" > 
										 		<textarea id="contact_us_message" class="textarea" placeholder="Your Message"></textarea>
								 			</td>   
								 		<tr> 
								 			<td id="submit" >  
								 				<!-- <input type="submit" value="" onclick="info_contact_us()"  >  -->
								 				<img src="fs_folders/images/buttons/submit3.png" onclick="info_contact_us()" >
								 			</td>
								 		<tr>  
								 	</table> 
								</div>  
							</div>  
							<div id="info_body_left" > 
						 		<table border="0" cellspacing="0" cellpadding="0" >
						 			<tr> 
						 				<td><span id="tab_about_us"     onclick="colored_info_tabs('#tab_about_us'      ,'#content_about_us'     ,'info?infp=about_us' , 'Info | About Us')"        >ABOUT US   </span> <div id="horizontal_line_about_us" >|     </div>  </td>
						 			<tr>
										<td><span id="tab_our_story"    onclick="colored_info_tabs('#tab_our_story'     ,'#content_our_story'    ,'info?infp=our_story' , 'Info | Our Story' )"      >OUR STORY   </span>  <div id="horizontal_line_our_story" >|   </div>  </td>  
									<tr>	  
										<td style="display:none" ><span id="tab_FAQ"          onclick="colored_info_tabs('#tab_FAQ'           ,'#content_FAQ'          ,'info?infp=FAQ' , 'Info | FAQ')"                  >FAQ   </span>  <div id="horizontal_line_FAQ" >| 	      </div>  </td>  
									<tr>	
										<td style="display:none" ><span id="tab_careers"      onclick="colored_info_tabs('#tab_careers'       ,'#content_careers'      ,'info?infp=careers' ,   'Info | Careers' )"          >CAREERS   </span>  <div id="horizontal_line_careers" >|     </div>  </td>  
									<tr>		
										<td style="display:none"  ><span id="tab_advertise"    onclick="colored_info_tabs('#tab_advertise'     ,'#content_advertise'    ,'info?infp=advertise' ,'Info | Advertise' )"      >ADVERTISE   </span>  <div id="horizontal_line_advertise" >|   </div>  </td>  
									<tr> 
										<td style="display:none" ><span id="tab_contribute"   onclick="colored_info_tabs('#tab_contribute'    ,'#content_contribute'   ,'info?infp=contribute' ,'Info | Contribute' )"   >CONTRIBUTE   </span>  <div id="horizontal_line_contribute" >|  </div>  </td>  
									<tr>
										<td><span id="tab_contatact_us" onclick="colored_info_tabs('#tab_contatact_us' ,'#content_contatact_us'  ,'info?infp=contatact_us' , 'Info | Contact Us')" > CONTACT US   </span>  <div id="horizontal_line_contatact_us" >|</div> </td>    
						 		</table>
							</div>
						</td> 
					<tr>
						<td id="info_footer" >  	 
							 <?php require("fs_folders/page_footer/footer_php_file/footer1.php") ?>
						</td>
					<tr>
				</table> 
			</div> 
		</center>
		<script type="text/javascript" src="//s3.amazonaws.com/scripts.hellobar.com/f577f8a72ff54a4820a1e8b4aaca15eaea39cd2c.js"></script>
	</body>
</html>