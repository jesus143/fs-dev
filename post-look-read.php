<?php 
	require("fs_folders/php_functions/connect.php");    
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
 	require("fs_folders/php_functions/source.php");
 	$mc = new myclass();   
 	$_SESSION['mno'] =  $mc->get_cookie( 'mno' , 136 );  
 	$mno 			 =  $mc->get_cookie( 'mno' , 136 );  

 	#retrieved ads based on the category  
	if ( $mno != 136 ) {   
		$look_style = $mc->get_look_style_and_save_look_keyword( ); 
		$ads = $mc->retrieved_ads_based_on_categories( $look_style );   
	} else{
		$mc->save_current_page_visited( 'post-look-upload' );
	}  



?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>  
	<head>

 

	
		<?php 
			$mc->header_attribute( 
 				"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration | Fashion Sponge " , "Fashion Sponge is the easiest & fastest way to: Show 
 				your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.",
 				"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration "
 			); 
			if ( $mno != 136) { 
 				$mc->login_popup( $mno , ( !empty($_GET['welcome']) ) ? $_GET['welcome'] : null );   
 			}
 			else{
 				$mc->login_popup( $mno ,  'login' ) ;  
 			}


 			



 			$mc->timer_contest_countdown_plugin( ); 
 			
		?>   


 


	</head>  
 
	<body style="padding:0px;margin:0px;">
		<div id="new-postalook-container" > 
			<table border="0" cellpadding="0" cellspacing="0" style="width:100%;"  >
				<tr> 
					<td>  
						<?php 
							$mc->fs_header( 
								$mno,  
								'width:1015px;padding-left:8px;', 
								'width:1024px; border-left:1px solid #e2e2df;border-right:1px solid #e2e2df;padding-left:7px;', 
								'width:1024px;', 
								'margin-left:72px;margin-top:3px;', 
								'margin-left:34px; width:290px;' 
							);    
							// $mc->fs_header( 
							// 	$mno, 
							// 	'width:1012px;margin-left:-1px;', 
							// 	'width:1009px;',
							// 	'width:100%',
							// 	'margin-left:72px;margin-top:3px;',
							// 	'margin-left:35px;'
							// );  
						?>  	
					</td>
				<tr> 		 
					<td id="new-postalook-content" >    
						<table border="0" cellpadding="0" cellspacing="0" style="border:1px solid NONE; "  >
							<tr> 
								<td id="new-postalook-banner" >   
									<div style="font-family:arial;font-size:12px; font-weight:normal; padding-bottom:10px;" >
										CONTEST STARTS:
									</div>
									<div style="padding-bottom:5px;font-family:arial; font-size:12px;font-weight:normal;" >
										<!-- SEPTEMBER 1, 2013 - SEPTEMBER 30 2013 -->
										SEPTEMBER 4TH - SEPTEMBER 17TH 2014
									</div> 
									<div style="width:100%;border:1px solid none; " >
										<img src="fs_folders/images/banner/banner.png" style="width:100%" />	
									</div>   
								</td>
							<tr>
								<td id="new-postalook-timer" >    
									<center>
										<div style="padding-bottom:20px; font-family:arial; font-size:12px; color: #b32727;font-weight:normal;" >
											ACCEPTING ENTRIES 
										</div>
									</center>

									<div id="new-postalook-timer-container-div" >
										<ul>
									 		<li>
									 			<div id="new-postalook-timer-bg-div"  >  
									 				<div id="new-postalook-timer-name" style="margin-left: 42px;" >
									 					DAYS
									 				</div>  
									 				<div class="new-postalook-timer-number" id="fs-timer-days" >
									 					<?php echo $mc->remainingDays; ?>
									 				</div>  
									 			</div>
									 		</li>
									 		<li> 
									 			<div id="new-postalook-timer-bg-div" > 
									 				<div id="new-postalook-timer-name" style="margin-left: 36px;"  >
									 					HOURS
									 				</div> 
									 				<div class="new-postalook-timer-number" id="fs-timer-hours" >
									 					<?php echo $mc->hour; ?>
									 				</div>  
									 			</div>
									 		</li>
									 		<li>  
									 			<div id="new-postalook-timer-bg-div" > 
									 				<div id="new-postalook-timer-name"  style="margin-left: 30px;"  >
									 					MINUTES
									 				</div>  
									 				<div class="new-postalook-timer-number" id="fs-timer-minutes" >
									 					<?php echo $mc->min; ?>
									 				</div>  
									 			</div>	
									 		</li> 
									 		<li> 
									 			<div id="new-postalook-timer-bg-div" >   
									 				<div id="new-postalook-timer-name"  style="margin-left: 30px;"  >
									 					SECONDS
									 				</div>    
									 				<div class="new-postalook-timer-number" id="fs-timer-seconds-container" style="position:absolute;z-index:99; background:#a21a21;width:100%;border-radius:5px;  " >
									 					<?php echo $mc->sec; ?>
									 				</div>    
									 				<!-- <br><br><br><br><br><br><br><br><br><br><br><br><br> -->
									 				<div class="new-postalook-timer-number" id="fs-timer-seconds" style="position:relative;z-index:100;background:#a21a21; border-radius:5px; border:1px solid none;  " >
									 					<?php echo $mc->sec; ?>
									 				</div>     
									 			</div> 
									 		</li>
									 	</ul>  
									</div> 
								</td>
							<tr>
							 	<td id="new-postalook-body" > 
							 		<ul>
							 			<li style="width:588px;border:1px solid none" id="new-postalook-tabscontainer-container" > 
							 				<div id="new-postalook-body-container-content" > 

								 				<span id="new-postalook-body-container-title" >
								 			
								 					INFO 
								 				</span>  

								 				<div style="height:5px;" ></div>       

								 				<div id="new-postalook-body-menu-div"> 
								 					<table border="0" cellpadding="0" cellspacing="0"    >
								 					 	<tr> 
								 					 	 	<td> 
								 					 	 		<div onclick="new_postalook_page_show( '1' )"  id="new-postalook-tab1" style="color:#b21d23"  >
								 					 	 			ABOUT
								 					 	 		</div> 
								 					 	 	</td> 
								 					 	 	<td> 
								 					 	 		<div onclick="new_postalook_page_show( '2' )"  id="new-postalook-tab2" >
								 					 	 			DETAILS
								 					 	 		</div>
								 					 	 	</td>
								 					 	 	<td> 
								 					 	 		<div onclick="new_postalook_page_show( '3' )"  id="new-postalook-tab3" >
								 					 	 			JUDGES
								 					 	 		</div>
								 					 	 	</td>
								 					 	 	<td> 
								 					 	 		<div onclick="new_postalook_page_show( '4' )"  id="new-postalook-tab4" >
								 					 	 			AWARDING
								 					 	 		</div>
								 					 	 	</td> 
								 					 	 	<td> 
								 					 	 		<div onclick="new_postalook_page_show( '5' )"  id="new-postalook-tab5" >
								 					 	 			PRIZES
								 					 	 		</div>
								 					 	 	</td> 
								 					 	 	<td> 
								 					 	 		<div onclick="new_postalook_page_show( '6' )"  id="new-postalook-tab6" >
								 					 	 		 	SPONSORS 
								 					 	 		</div>
								 					 	 	</td> 
								 					 	 <tr>  
								 					 	 	<td style="padding-top:3px;" > 
								 					 	 		<div id="new-postalook-tab1-line" > 
							 									</div>
								 					 	 	</td> 
								 					 	 	<td style="padding-top:3px;" > 
								 					 	 		<div id="new-postalook-tab2-line" > 
							 									</div>
								 					 	 	</td>
								 					 	 	<td style="padding-top:3px;" > 
								 					 	 		<div id="new-postalook-tab3-line" > 
							 									</div>
								 					 	 	</td>
								 					 	 	<td style="padding-top:3px;" > 
								 					 	 		<div id="new-postalook-tab4-line" > 
							 									</div>    
								 					 	 	</td> 
								 					 	 	<td style="padding-top:3px;" >  
											 					<div id="new-postalook-tab5-line" > 
											 					</div>
								 					 	 	</td> 
								 					 	 	<td style="padding-top:3px;" > 
								 					 	 		<div id="new-postalook-tab6-line" > 
							 									</div>     
								 					 	 	</td>  
								 					</table>   
							 					</div> 
							 					


							 					<div id="new-postalook-content1"    style="display:block;"   name="details"  > 
							 						 
							 						<div id="new-postalook-read-text-title1" style="margin-top:-5px;" >
							 							FASHION SPONGE IS LOOKING FOR <br> <span class='fs-text-red' > "THE WORLD'S MOST STYLISH." </span> IS THAT YOU? 
							 						</div>

							 						<div id="new-postalook-read-text-title1" style="margin-top:20px;"  class='fs-text-red' >
							 							We want to see: just how well you dress?
							 						</div>



							 					 
							 				 
													<div id="new-postalook-read-text-desc" >
							 							Fashion Sponge is challenging you to showcase your sense of style. We are looking for stylish people who dress well in either  <b>streetwear,  menswear, chic or preppy</b> styles to compete against one another. 
							 						</div>
													<div id="new-postalook-read-text-desc" >
							 							Think you have what it takes to conquer the title of the "World's Most Stylish? Well submit an entry to see if others agree! Take a photo of your outfit of the day or upload one you previously wore.
							 						</div> 

							 						<div id="new-postalook-read-text-title"  >
							 							<b>1.</b> READ THE CONTEST DETAILS.
							 						</div>

							 						<div style="margin-top:10px;font-size:14px;" > 
							 							Click the contest details tab above to learn about the eligibility, judging process, judging criteria and style categories. 
							 						</div> 

							 						<div id="new-postalook-read-text-title" >
							 							<b>2.</b> SUBMIT.
							 						</div>

							 						<div style="margin-top:10px; font-size:14px;"  >  
														Now you got your photo, read the contest details it is time to submit your look!
							 						</div> 

							 						<div id="new-postalook-read-text-title" >
							 						 	<b>3.</b> PRIZES UP FOR GRABS.
							 						</div>
 
							 						<div style="margin-top:10px;font-size:14px;"   >
							 							<ul>
							 								<li>
							 									<b>1</b> &nbsp; A cash payment sent via Paypal ( Up to $500! )
							 								</li>
							 								<li>
							 									<b>2</b> &nbsp; Fashion Sponge Merchandise.
							 								</li>
							 								<li>
							 									<b>3</b> &nbsp; Personalized Award & Badge to place on Website or Blog.
							 								</li>
							 								<li>
							 									<b>4</b> &nbsp; Title of " The World's Most Stylish"
							 								</li>
							 								<li>
							 									<b>5</b> &nbsp; A feature in The Daily Drip.
							 								</li> 
							 							</ul>  
							 						</div>    
							 					</div>   

							 					<div id="new-postalook-content2"   style="display:none;"     name="details"  >   

							 						<ul>
							 							<li> <div onclick="post_look_read_contest_detail_tab( '1' )" id="new-postalook-content2-tab-1" style="color:#b21d23;"  > <b>ELIGIBILITY </b></div></li>
							 							<li> <div onclick="post_look_read_contest_detail_tab( '2' )" id="new-postalook-content2-tab-2" > <b>JUDGING PROCESS</b></div> </li>
							 							<li> <div onclick="post_look_read_contest_detail_tab( '3' )" id="new-postalook-content2-tab-3" > <b>JUDGING CRITERIA</b></div> </li>
							 							<li> <div onclick="post_look_read_contest_detail_tab( '4' )" id="new-postalook-content2-tab-4" > <b>CATEGORIES</b></div> </li>  
							 						</ul>     
							 						<br>  
							 						<table border="0" cellpadding="0" cellspacing="0" style="margin-top:15px !important;" > 
							 							<tr>  
							 								<td name='eligibilty' > 
								 								<div  style="display:block " id="new-postalook-content2-content-1"  class="eligibility" >    

																	<span>  
																		Contestants can only submit 1 look to a single category, with total number of entries equalling 4.
																	</span> 
																	<p class="fs-text-red"  > 
																		Contestants must sign up to www.fashionsponge.com to enter. Membership is free.
																	</p>
																	<p>
																		Entry must be received by 11:59:59PM (EST/ UTC-05) on <b>August, 10 2014</b> and be submitted through the contest gallery on FashionSponge.com
																	</p>
																		 
																	<p>
																		Contest is open only to individuals who have reached the age of majority in their jurisdiction of residence at the time of entry and who do
																		NOT reside in, Rhode Island, The Province of Quebec, Cuba, Iran, Syria, North Korea, Sudan, Myanmar (Burma), or to other individuals 
																		restricted by U.S. export controls and sanctions, and is void in any other nation, state, or province where prohibited or restricted by U.S. 
																		or local law.
																	</p>
																		  
																	<b>Disqualification </b> 

																	<p>
																		Ineligible entries may be disqualified at any phase of the competition without notification.
																	</p>


																	<b> Terms and Conditions of Entry/Usage </b>

																	<p>
																		Fashion Sponge assumes all entries are from the submitting entrant. In the event that an entrant without such rights submits an entry, 
																		the entrant will not be eligible for the competition. Fashion Sponge is not liable for any copyright infringement on the part of the entrant.
																	</p> 
																	<p>
																		Entries will be live and available on the Internet from the date of entry and accessible via http and standard Web browsers.
																	</p>
																	<p>
																		Submission of any entry acknowledges the right for Fashion Sponge to use it for exhibition, promotion and publication purposes in any medium.
																	</p>
																	<p>
																		If an entrant wins a prize or gets acknowledged, the manner and details of announcing such nomination and award is strictly within 
																		the discretion of Fashion Sponge.
																	</p> 
																	<p  class="fs-text-red" > 
																		Other requirements and restrictions apply, please read the Official Rules carefully.
																	</p> 
								 								</div> 
							 								</td>
							 							<tr>  
							 								<td name='juging process' > 
							 									<div  style="display:none"  id="new-postalook-content2-content-2"   class="judgin_process" > 


								 									<p>
								 										The World’s Most Stylish Nominees and Winners are selected by employees of Fashion Sponge from the best work entered through the Call for Entries.
								 									</p>

								 									<b> Judging: How looks are Judged </b>
								 									<p>
								 										From all of the entries submitted during the Call for Entries, employees of Fashion Sponge and guest judges will independently inspect each entry and rate them based on their respective judging criteria. The twenty five <b>(25)</b> entries from each category that best through this process are included on category specific shortlists and are further evaluated by the online community. Through this public vote Fashion Sponge will select a Winner from the Nominees in each category.
								 									</p>


								 									<b> Description of Fashion Sponge Employees and Guest Judges </b>

								 									<p> 
																		Employees of Fashion Sponge and guest judges are industry experts. As such, they have demonstrable expertise in the categories in which they review. In order to be accepted to be a judge, all judges must first submit an application. After their application is reviewed and accepted, and they are verified as experts and leaders in their peer groups, judges are given different entries for review in the respective categories of their expertise. They are barred from 
								 									</p>

								 									<b> Disclosure </b>

								 									<p>
								 										With all the connection and interconnection online, and because we not only acknowledge excellence, but we associate with it, the potential for conflicts of interest often arises. We take these conflicts very seriously. We do everything in our power to minimize occurrences of conflicts while ensuring that the best work is recognized. Fashion Sponge does not select the entries based on favoritism or personal feelings. We also do not  influence the judges in any way to select entrants based on their favorite entrant or personal feelings. We do select a diverse body of judges who we feel is objective, respected and knowledgeable in their category.
								 									</p> 

							 									</div> 
							 								</td>
							 							<tr>  
							 								<td name='judging criteria' > 
								 								<div  style="display:none"  id="new-postalook-content2-content-3"   class="judging_criteria"  >   
			 														<b>
																		Creativity
																	</b> 
																	<p>
																		Most stylish people employ a superior level of creativity. Judging the creativity of an entry focuses on a handful of elements including style, originality, innovation and the unique nature of the underlying idea. It includes a smartly selected color palette, great garment and accessory coordination and the relevant use of anything that communicates great styling. Great style can be characterized as engaging and relevant, with resonance and a point of view. It may be informative, functional, inspirational or technically mind-blowing, but overall it always leaves you wanting more from who ever is wearing it.
																	</p>  
																	<b> 
																		Quality Photos
																	</b>   
																	<p> 
																		Quality photos are highly visible images. A quality photo allows a viewer to clearly see all the detailing of the elements in the photo that supports the message. It clearly communicates the artist vision and may even take your breath away.
																	</p> 
																	<b>
																		Engagement
																	</b> 
																	<p>  
																		To develop a rapport with fans one must not rely solely on great content. Longevity in social media ultimately comes down to engagement. Conversing with fans is what builds a rapport with fans. Remember people buy you. Why? Because they like, believe and are inspired by you. Liking is an emotional act. Your fans will “only” visit your blog, social media pages and support you on voting sites because of the way show your appreciation. 
																	</p>   
								 								</div> 
							 								</td>
							 							<tr>  
							 								<td name='Category' > 

							 									<div  style="display:none"  id="new-postalook-content2-content-4" >  <b> CATEGORIES </b>  </div> 
							 								</td>
							 						</table>  
							 					</div>   
 
							 					<div id="new-postalook-content3"   style="display:none;"     name="judges"  >  

 													<div style="margin-top:-5px !important;" >
														<div> 
															<div style='text-align:center;color:#000; font-size: 37px; font-family:MisoLight; color:#b01e23;  ' > 
																We are currently looking for judges.
															</div>
															<div  style='text-align:center;color:#000; font-size: 15px; font-family:Helvetica; color:#284372;  ' >
																If you are looking for exposure and want to be acknowledged as an expert, email us now at  
																info@fashionsponge
															 </div> 
														</div> 
														<br>  
														<table border="0" cellpadding="0" cellspacing="0" style="margin-top:-20px;" >
															<tr> 
				 												<?php for ($i=0; $i <5 ; $i++) {  ?>
																	<td > 
			 															<table border='0' cellspacing='2' cellpadding='0'   > 
																			<tr> 
																				<td style="border:1px solid none" >    
																					<a href="#" > 
																						<img src="twms/images/judges/j11.jpg" /> 
																					</a>
																				</td>
																			<tr> 
																				<td style="padding-top:10px;display:none" > 
																					<?php  
																						echo "  
																							<ul>
																								<li>
																									<a href='#' target='_blank' > 
																							  			<img src='$mc->genImgs_twms/web-red.png'  style='width:15px;'  />  	
																							 		</a>
																								</li>
																								<li>
																									<a href='#' target='_blank' > 
																					  					<img src='$mc->genImgs_twms/facebook-red.png'     style='height:15px;'  /> 
																					  				</a> 
																								</li>
																								<li>
																									<a href='#' target='_blank' > 
																							 			<img src='$mc->genImgs_twms/twitter-red.png'      style='width:15px;'  /> 
																						 			</a> 	
																								</li>
																								<li>
																									<a href='#' target='_blank' > 
																				 						<img src='$mc->genImgs_twms/instagram-red.png'   style='width:15px;'  /> 
																							 		</a> 	
																								</li>
																							</ul>";
																						?>
																				 
																				 	<?php 

																				 		// echo "  
																				 		// 	<center> 
																					 	// 		<table border='1' cellspacing='0' cellpadding='0' style='width:80%;height:2px;' >  
																					 	// 			<tr> 
																					 	// 				<td> 
																					 	// 					<a href='#' target='_blank' > 
																					 	// 						<img src='$mc->genImgs_twms/web-red.png'  style='width:15px;'  />  	
																					 	// 					</a> 
																					 	// 				</td>  
																					 	// 				<td> 
																					 	// 					<a href='#' target='_blank' > 
																					 	// 						<img src='$mc->genImgs_twms/facebook-red.png'     style='height:15px;'  /> 
																					 	// 					</a> 
																					 	// 				</td>   
																					 	// 				<td> 
																							// 				<a href='#' target='_blank' > 
																					 	// 						<img src='$mc->genImgs_twms/twitter-red.png'      style='width:15px;'  /> 
																					 	// 					</a> 	
																					 	// 				</td>  
																					 	// 				<td>
																					 	// 					<a href='#' target='_blank' > 
																					 	// 						<img src='$mc->genImgs_twms/instagram-red.png'   style='width:15px;'  /> 
																							// 				</a> 	 
																					 	// 				</td>  
																					 	// 	 	</table> 
																					 	// 	</center> 
																				 		//  ";  
																				 	?> 
																				</td> 
																		</table>  
																	</td> 
																<?php } ?>  
														</table> 
													</div>
							 					</div> 

							 					<div id="new-postalook-content4"   style="display:none;"     name="awarding" >   
							 						<!-- awarding --> 
													<div style="padding-left:0px;  padding-right:0px; border:1px solid none;  overflow:auto; border:1px solid none;" >   
														<div style="font-size:37px; font-family:MisoLight; color:#b01e23; border:1px solid none; margin-top:-5px; ">Awarding the Winners and Nominees  </div> 
														<br>
														<div id="awarding-content"   rel="scrollcontent3"  >   
														 	<b Class='fs-text-blue' >
																Winners
															</b> 
															<p>
																In each of the 4 categories, there is only one chance to win the grand prize of "The World Most Stylish." Fashion Sponge employees and guest judges with category specific expertise will further evaluate the shortlisted entries based on the online votes and eventually cast ballots to determine Nominees and Winners. In the event of a tie, the Nominees who engaged the most most and had the most shared looks will be selected.
															</p> 
															<b Class='fs-text-blue' >
																Nominees
															</b> 
															<p>
																Fashion Sponge will acknowledge the four (<b>4</b>) entrants in each of the 4 categories with the highest scores following the grand prize winner. These sixteen (<b>16</b>) entrants will be recognized as Nominees. For more information regarding Nominees, see The Nominee Resource Center.
															</p> 
															<div style="display:none" >
																<b Class='fs-text-blue' >
																	Most Viral
																</b> 
																<p>
																	Due to the fact that only one (<b>1</b>) grand prize winner, can be chosen for each category, we will be giving a prize to the entrants that are worthy of recognition for having the most shared looks in their category. Three entrants from each category will win one of the three prizes. Prizes will be awarded to the entrants in the order of most shared looks. Grand prize winners are not eligible to win. 
																</p> 
															</div> 
														</div>
													</div>  
							 					</div>   

							 					<div id="new-postalook-content5"   style="display:none;"     name="prizes"  >     
			 										<div style="margin-top: -2px !important;" > 
			 											<table border="0" cellpadding="0" cellspacing="0" style="width:100%;margin-top:0px;" > 
			 												<tr>
			 													<td>
			 														<center>
					 													<div>
					 														<img src="twms/images/Large-cash.png">
					 													</div> 
				 														<div id="price-firstprize-title" >
				 															FIRST PLACE <br> STREETWEAR
				 														</div> 
				 														<div style="font-size:12px; " >
				 															up to
				 														</div> 
				 														<div id="price-firstprize-money" >
				 															$500 
				 														</div>
				 														<div id="price-firstprize-desc" >
				 															-Acrylic Award <br>
				 															-Prize from <br>
				 															sponsors<br>
				 														</div>
			 														</center>
			 													</td>
			 													<td  style="width:20px;"  >  
			 														<img src="twms/images/divider.png" id="divider-long"  >
			 													</td>

			 													<td>
			 														<center>
					 													<div>
					 														<img src="twms/images/Large-cash.png">
					 													</div> 
				 														<div id="price-firstprize-title" >
				 															FIRST PLACE <br> MENSWEAR
				 														</div>
				 														<div style="font-size:12px;  " >
				 															up to
				 														</div>
				 														<div id="price-firstprize-money" >
				 															$500 
				 														</div>
				 														<div id="price-firstprize-desc" >
				 															-Acrylic Award <br>
				 															-Prize from <br>
				 															sponsors<br>
				 														</div>
			 														</center>
			 													</td>
			 														<td  style="width:20px;" > 
			 															<img src="twms/images/middle-divider.png"  id="divider-short"  >
			 														</td>
			 													<td>
			 														<center>
					 													<div>
					 														<img src="twms/images/Large-cash.png">
					 													</div> 
				 														<div id="price-firstprize-title" >
				 															FIRST PLACE <br> CHIC 
				 														</div>
				 														<div style="font-size:12px; " >
				 															up to
				 														</div>
				 														<div id="price-firstprize-money" >
				 															$500 
				 														</div>
				 														<div id="price-firstprize-desc" >
				 															-Acrylic Award <br>
				 															-Prize from <br>
				 															sponsors<br>
				 														</div>
			 														</center>
			 													</td>
			 														<td  style="width:20px;" > 
				 														<img src="twms/images/divider.png" id="divider-long"  >
				 													</td>
			 													<td>
			 														<center>
					 													<div>
					 														<img src="twms/images/Large-cash.png">
					 													</div> 
				 														<div id="price-firstprize-title"   >
				 															FIRST PLACE <br> PREPPY
				 														</div>
				 														<div style="font-size:12px;">
				 															up to
				 														</div>
				 														<div id="price-firstprize-money" >
				 													 	 	$500 
				 														</div>
				 														<div id="price-firstprize-desc" >
				 															-Acrylic Award <br>
				 															-Prize from <br>
				 															sponsors<br>
				 														</div>
			 														</center>
			 													</td>
			 											</table>
			 										</div> 
			 										<center>
				 										<div style="margin-top:20px !important;display:none;" >  	
				 											<div style="position:relative;" > 
			 												 	<img src="twms/images/small-cash.png">
			 												 	<div  id="price-firstprize-title" >MOST VIRAL PRIZE </div>
			 												 	<div  id="price-firstprize-money" >$ 125, 75 AND 50 USD </div> 
				 											</div>   
				 										</div>
			 										</center> 
							 					</div>   

							 					<div id="new-postalook-content6"   style="display:none;"     name="sponsors"  >   
							 					 	<div style="margin-top: 0px !important; border:1px solid none; " >  
							 							<ul>
													  		<li> 
																<a href="http://www.laurenmessiah.com" target="_blank" >
																	<img id="main-sponsor" src="twms/images/slides/lauren.png"  /> 
																</a>
													  		</li> 
													  		<li>
													  			<center> 
																 	<table border=0 cellpadding="0" cellspacing="0" style="text-align:center;border:1px solid none; margin-top:0px !important " > 
																 		<tr> 
																 			<td> 
																				<div  style='text-align:center;color:#000; font-size:37px; font-family:MisoLight; width:255px; color:#b01e23;padding-bottom:10px;   ' > 
																					School of Style 
																				</div>
																			</td>
																		<tr>
																			<td> 
																				<div style="color:#284372; font-size:14px;" >      
																					School of Style is a boutique <br> 
																					fashion school for aspiring <br> 
																					stylists founded in 2008 by <br> 
																					stylist Luke Storey. Based on <br> 
																					our powerful and unique vision, <br> 
																					School of Style has quickly <br> 
																					become established worldwide <br> 
																					as the premiere fashion school <br> 
																					exclusively for stylists<br>  
																				</div>
																			</td>
																		<tr> 
																			<td>   
																				<div  style="position:relative; padding-top:10px; " >
																					<a href="http://www.facebook.com/SchoolofStyle" target="_"><img src="twms/images/fb-social-icons.png" /></a> &nbsp;&nbsp; 
																					<a href="https://twitter.com/schoolofstyle" target="_"><img src="twms/images/tw-social-icons.png" /></a>&nbsp;&nbsp;
																					<a href="http://www.youtube.com/user/SchoolofStyleLA" target="_"><img src="twms/images/yt-social-icons.png" /></a>
																				</div> 
																			</td>
																		<tr> 
																			<td style="padding-top:10px;" >   
				  																 
				 																<div style="float:left;border:1px solid none;float:left; font-size:12px; margin-left:5px;" > 
				 																	<a href="http://www.laurenmessiah.com" target="_blank" style="color:#284372" >
			 																			<span style=" position:relative; z-index:100;  font-weight:bold; font-size:12px; " > @LaurenMessiah </span>
			 																		</a>	
				 																</div> 
				 																<div style=" position:relative;  border:1px solid none; float:right" > 
				 																	<a href="http://www.lukestorey.com" target="_blank" style="color:#284372" >
			 																			<span style=" position:relative; z-index:100;  font-weight:bold; font-size:12px; " > @LukeStoreyStyle</span>
			 																		</a>
				 																</div>
																			</td> 
																	</table> 
																</center> 

													  		</li>

													  		<li>
													  			<a href="http://www.lukestorey.com" target="_blank" >
																	<img id='main-sponsor' src="twms/images/slides/luke.png"   />  
																</a> 
													  		</li>
													  	</ul>  
												  	</div> 
							 					</div>     

							 					<div style="margin-top:30px; padding-bottom:120px; " > 

							 						<?php if ( $mno != 136 ) { 
								 							echo " 
										 						<a href='post-look-upload'  onmousemove= 'mousein_change_button ( \"#postalook-submit-button\" , \"fs_folders/images/genImg/postalook-submit-look-hover.png\" )' onmouseout=' mousein_change_button ( \"#postalook-submit-button\" , \"fs_folders/images/genImg/postalook-submit-look.png\" )' > 
											 						<img src='fs_folders/images/genImg/postalook-submit-look.png' style='cursor:pointer' id='postalook-submit-button' />  
											 					</a> 
										 					"; 
							 							}   
							 							else{
							 								echo " 
										 						<a href='login'  onmousemove= 'mousein_change_button ( \"#postalook-submit-button\" , \"fs_folders/images/genImg/postalook-submit-look-hover.png\" )' onmouseout=' mousein_change_button ( \"#postalook-submit-button\" , \"fs_folders/images/genImg/postalook-submit-look.png\" )' > 
											 						<img src='fs_folders/images/genImg/postalook-submit-look.png' style='cursor:pointer' id='postalook-submit-button' />  
											 					</a> 
										 					"; 
							 							}
							 						?> 


							 					</div>    
							 				</div>   
							 			</li>  
							 			<li style="width:270px;border:1px solid none" id="new-postalook-ads-container"  >
							 				<!-- <li style="width:250px;"  >    -->  
							 				<div id="new-postalook-body-container-ads" >

									 			<span id='new-postalook-body-container-title' >
									 		 		SPONSORS
									 			</span>  
									 			 
									 			<div style="height:12px;" > 
										 		</div>
										 		
								 				<?php for ($i=0; $i < 3 ; $i++) {  ?>
									 			 		<div id="new-postalook-body-container-ads-content" > 
									 			 			<!-- <img src="fs_folders/images/ads/vday14_prize.jpg"> -->
									 			 		</div>	 
										 			 	<div style="height:10px;" > 
										 			 	</div>
								 			 	<?php } ?> 
								 			</div>   
								 			<div style="height:150px;" >  
								 			</div>
							 			</li>
							 		</ul>
							 	</td> 
							<tr>
						</table>  
					</td>
				<tr> 
					<td id="new-postalook-footer" >  
						<div style="margin-left:72px;" >   
				 			<div id="footer_res" style="display:none" > footer res  </div>    
				 			<?php 	
				 				 $footer_container_style = 'width:1022px !important;'; 
				 				 $footer_container_table_style = 'margin-left:-10px;';
				 				require("fs_folders/page_footer/footer_php_file/footer1.php"); 
				 			?> 
				 		</div> 
					</td>
			</table> 
		</div> 
	</body>  
</html>