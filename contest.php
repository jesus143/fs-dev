<?php 
    require ("fs_folders/php_functions/connect.php");
    require ("fs_folders/php_functions/function.php");
    require ("fs_folders/php_functions/library.php");
    require ("fs_folders/php_functions/source.php");
    require ("fs_folders/php_functions/myclass.php"); 
    $mc = new myclass();  

    $mc->header_attribute( 'The World’s Most Stylish Contest' , 'Fashion Sponge is challenging you to showcase your streetwear, menswear, chic or preppy style. Prizes totaling $3000 USD, so visit now to learn more.' );   
    $mc->auto_detect_path(); 
    $mc->plugins( "google analytic" , " home " );  
	// echo " This is the path ".$mc->genImgs_twms;   
?> 
	<link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_bold_macroman/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_light_macroman/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_regular_macroman/stylesheet.css">   
<html>
	<head> 
		<style type="text/css">
		  /* Height & width for the container - The rest is done by the jQuery part. */ 
		  div[rel='scrollcontent1'] { width: 60%;  }
		  div[rel='scrollcontent3'] {  }
		   
		  
		  /* Basic CSS for the elements - If rel is "scrollcontent1", style its scrollbar by referring to ".scrollcontent-content", ".scrollcontent-bar", etc. */
		  .scrollcontent1-content ,  .scrollcontent3-content { /* background: #eee; */ } /* for vertical content, no explicit width is required for inner DIV */
		  .scrollcontent1-bar , .scrollcontent3-bar { width: 11px; background: #fffeda; border-radius: 4px; box-shadow: inset 0px 0px 5px #444444; overflow: hidden; }
		  .scrollcontent1-drag , .scrollcontent3-drag { background: #ad5134; border-radius: 4px; cursor: pointer; }
		  
		  div[rel='scrollcontent2'] { width: 300px; height: 300px; }
		  
		  /* Basic CSS for the elements - If rel is "scrollcontent2", style its scrollbar by referring to ".scrollcontent2-content", ".scrollcontent2-bar", etc. */
		  .scrollcontent2-content  { width: 999px; } /* for horizontal content, width should be set to total width of all floated inner container elements */
		  .scrollcontent2-bar { height: 15px; background: #ccc; border-radius: 5px; box-shadow: inset 0px 0px 5px #444444; overflow: hidden; }
		  .scrollcontent2-drag  { background: #425a8a; border-radius: 5px; cursor: pointer; }
		  
		  /* Not needed elements */
		  #contentwrap { padding: 5px; border: 1px #444444 solid; display: block; width: 300px; border-radius: 10px; }
		  .scrollcontent1-content p, .scrollcontent2-content p , .scrollcontent3-content p  {margin:0; padding:0}
			
		.style1 {
	font-family: 'helveticabold';
	font-size: 15px;
}
.style2 {
	font-family: 'helvetica';
	font-size: 15px;
}
</style>
	 
		<script type="text/javascript" src="twms/jquery.mousewheel.min.js"></script>
		<script src="twms/slickcustomscroll.js"></script> 
		<script type="text/javascript">

			$( document ).ready( function() {
				$( "div[rel='scrollcontent1']" ).customscroll( { direction: "vertical" } );
				$( "div[rel='scrollcontent2']" ).customscroll( { direction: "vertical" } ); 
				$( "div[rel='scrollcontent3']" ).customscroll( { direction: "vertical" } ); 
				
			});
		</script>
	</head>
	<body>
		<style>
		a img{ 
			border:0px;
		}
		a{text-decoration:none}
		table{
			border-collapse:collapse;
		}
		#slide_container{
			background:white;height:350px;
			overflow:hidden;
			width:780px;
		}
		#tab_slide { 
			background:#f4f3f2;
		}
		#tab_slide td{
			width:780px;text-align:center;vertical-align:top;
		}
		#tab_slide img{
			cursor:pointer;
		}
		.slide_img{
			width:780px;
		}
		.nav_square{
			padding:0 6px 0 6px;background:#d1cfcf;border-radius:5px;cursor:pointer;
		}
		.nav_text{
			color:#d1cfcf;//font:14px 'trebuchet ms';
			cursor:pointer;font:bold 12px 'helvetica'
		}
		.bold{ 
			font-weight: bold;
		}
		#red { color: #b01e23; font-weight: bold; } 
	</style> 
		

 	<link rel="stylesheet" type="text/css" href="twms/fs_folders/contest/contest.css" >
 	<script type="text/javascript" src='twms/fs_folders/contest/contest.js'></script> 
	<script type="text/javascript" src="twms/scripts/script.js" ></script> 
	<?php $mc->print_twms_invite_popup( 'contest' );  ?> 
	
	<div style="position:absolute;top:0;left:0;width:100%;">   
		<div style="background:#1b396d;text-align:center;padding:10px;color:white; ">   
			<a href="http://www.fashionsponge.com" target="_blank" >
				<image alt="FashionSponge" src="twms/images/logo-big.png" />
			</a><br> 

			<?php 
				$b=$_SERVER['HTTP_USER_AGENT'];
				if($b=="Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; InfoPath.2; .NET CLR 1.1.4322; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; handyCafeCln/3.3.21)")
					$b="ie";
				else
					$b="ch";
			?>	 
			
		</div>	 
		<div style="background:#f4f3f2;padding:10px;text-align:center; display:block; height:200px">
			<div style="width:788px;margin:0 auto;padding:25px;text-align:left;"> 
				<!-- <img src="images/fs-looking.png" /><br><br>    -->

					<span style='color:#284372; font-size: 50px; font-family:MisoLight' > FASHION SPONGE IS LOOKING FOR  <br>
					<span style='color:#b01e23' >"THE WORLD'S MOST STYLISH."</span> IS THAT YOU?  </span>  
	
 					<!-- <p style='color:#284372; font-size: 50px; font-family:MisoLight'  >
 						FASHION SPONGE IS LOOKING FOR   	
 					</p>
 						 
					 <p  style='color:#b01e23' >
					 	"THE WORLD'S MOST STYLISH."  IS THAT YOU?     	
					 </p> -->
					 
				<br><br> 
				<a href="http://www.fashionsponge.com" target="_">
					<table border="0" cellpadding="0" cellspacing="0" >
						 <tr> 
						 	<td>
						 		<span style='color:#284372; font-family:arial;font-weight:bold;font-size:14px;' >
						 			LEARN ABOUT FASHION SPONGE
						 		</span>  
						 	</td> 
						 	<td style="padding-top:3px;" > 
						 		&nbsp; <img src="twms/images/learn.png" title="Learn About FashionSponge" />
						 	</td> 
					</table> 
				</a>
			</div>
		</div>     
		<div style="background:#1b396d url('twms/images/back.jpg') center bottom  repeat-y;text-align:center; auto; ">  
			<center><img src="twms/images/down-arr.png" /></center><br>
			<div style="width:980px;margin:0 auto;font-family: Helvetica;">
				<table width=100%>
					<td valign=center style="width:100px" >
						<input type=image src="twms/images/left.png" onClick="clearInterval(t);getID('PlayPause').src='twms/images/btn_play.png';state='pause';navigate('prev')" />
					</td>
					<td width=*% valign=top   >
						<div id="slide_container">
							<table style="position:relative;" id="tab_slide" >  
								<!-- orders : intro, contest details, judging, awarding, prizes and sponsors -->  
								
								<!-- intro -->
									<td style="background-color:#f4f3f2;height:200px;"  >    
										<div style="padding-left:0px; padding-top:20px; padding-right:0px; border:1px solid none; width:780px " > 

											<table border="0" cellpadding="0" cellspacing="0" style="margin-left:20px; ;width:740px;background-color:#f4f3f2; border:1px solid none;  ; "  > 
												<tr> 
													<td style="background-color:#f4f3f2; padding-left:20px;  " > 
												 	 	<span  style='  border:1px solid none; float:left; text-align:left;color:#b01e23; font-size: 50px; font-family:MisoLight;background-color:#f4f3f2;width:730px;border: 1px solid none' > 
												 	 		We want to see: just how well  you dress?  
												 	 	</span>   
													 	 	<div style='padding-bottom:10px; text-align:left;color:#284372; font-size: 14px; font-family:Helvetica;background-color:#f4f3f2; width:690px; border: 1px solid none; padding-top:10px;'  >   
													 	 		Have you ever been told that you were fashionable and your style is inspirational? If 
													 	 		yes, then now is your chance to show the world. We are currently in our BETA period but 
													 	 		to jump-start our official launch, we will be hosting a styling competition. 
													 	 	</div>   
													 	 	<div style='padding-bottom:10px;text-align:left;color:#284372; font-size: 14px; font-family:Helvetica;background-color:#f4f3f2; width:690px;border: 1px solid none' >   
													 	 		Fashion Sponge is challenging you to showcase your sense of style. We are looking for stylish people who dress well 
													 	 		in either <b> streetwear, menswear, chic or preppy </b> styles to compete against other stylish Individuals. So do you think 
													 	 		you have what it takes to conquer the title of the <span class='bold'>"World's Most Stylish."?</span> If so sign up now to stay informed on 
													 	 		when we will start accepting entries. You don't want to be <span class ='bold'>FASHIONABLY LATE!</span>   
 															</div>  
													 	 	<div style='padding-bottom:10px;text-align:left;color:#284372; font-size: 14px; font-family:Helvetica;background-color:#f4f3f2; width:690px;border: 1px solid none' >   
													 	 		<span id='red' >16 chances to win.</span>  4 grand prize winners will win up to <span id='red' >$500 USD</span> and additional prizes. 
													 	 	</div> 
												 	 	<br>  
													 	 	<div  style='text-align:left;color:#284372; font-size: 20px; font-family:Helvetica;background-color:#f4f3f2; width:690px;border: 1px solid none' > 
													 	 		<center>
													 	 			<span id='red' >
														 	 			ACCEPTING ENTRIES <br>
														 	 		</span>
														 	 		<span class='bold'>	
																		SUMMER OF 2014
																	</span>
																</center>
													 	 	</div>  
														</td>  
												<!-- <tr>
													<td style="background-color:#f4f3f2; padding-top:15px; display:none " > 
														<table border="1" cellpadding="0" cellspacing="0"  style="background-color:#f4f3f2;width:740px" > 
															<tr> 	
																<td style="background-color:#f4f3f2;  " >
																	<div style="font-family:arial;color:#284372;background-color:#f4f3f2;text-align:left; font-size:13px" >
																		Four winners will win <span style='font-weight:bold;color:#b01e23' > $500 USD </span>
																		and additional prizes, so make you submit 
																		your best styled look.
																	</div>  
																	<br><br>
																	 
																		<div style="font-family:arial;color:#284372; font-size:15px;font-weight:bold;background-color:#f4f3f2" > 
																			
																			<div style='color:#b01e23; float:left' >
																				ACCEPTING ENTRIES STARTING <br>
																			</div>
																			<br>
																			 <div style="border:1px solid none; width:230px; float:left" >
			           															SUMMER OF 2014 
			           														</div>
			           														 
																		</div>
																	</center>
																</td> 
																<td style="background-color:#f4f3f2;width:500px  " >  
																	<img src="images/slides/1.jpg" style="float:right;border:1px solid none; " /> 
																</td>
														</table>

													</td> -->
											</table> 
										</div> 
									</td>    
								<!-- contest details --> 
									<td valign=top style="vertical-align:top"  >  
										<img src="twms/images/slides/60.jpg"  class="slide_img" style='' /><br>
										<table style="width:780px;" border="0" >
											<td style="width:560px;text-align:left;padding:20px 0 20px 20px;vertical-align:top" valign=top>
												<span style="font-size:40px; font-family:MisoLight; color:#b01e23;  ">Contest Details</span><br><br>  
												<div id="contest-details-menu" >  
													<ul> 
														<li><div style="padding-left:0px;"  id="eligibility"     onclick="contest_detail_open_tab('.eligibility','#eligibility')"           >ELIGIBILITY      </div></li>  
														<li><div style="padding-left:10px;" id="judgin_process"  onclick="contest_detail_open_tab('.judgin_process','#judgin_process')"     >JUDGING PROCESS  </div></li> 
														<li><div style="padding-left:10px;" id="judging_criteria"onclick="contest_detail_open_tab('.judging_criteria','#judging_criteria')" >JUDGING CRITERIA </div></li> 
														<li><div style="padding-left:10px;" id='categories'      onclick="contest_detail_open_tab('.categories','#categories')"             >CATEGORIES       </div></li> 
													</ul> 
												</div>    
												<div id="contest-details-content"   rel="scrollcontent1" style="height:220px;" > 
													<div  class="eligibility"  >
														<p>  
															The World's Most Stylish is open to all individuals and there is no limit to the number of categories you 
															may enter, you just can not submit more then one look to single category.
														</p>
															<br>
														<p id="red" > 
															You must sign up to www.fashionsponge.com to enter. Membership is free.
														</p>
															<br>
														<p>
															Entry must be received by <b> 11:59:59PM </b> (EST/ UTC-05) on August, 4 2014 and be submitted through 
															the contest gallery on FashionSponge.com 
														</p> 
															<br> 
														<p>
															Contest is open only to individuals who have reached the age of majority in their jurisdiction of residence 
															at the time of entry and who do NOT reside in , Rhode Island, The Province of Quebec, Cuba, Iran, Syria, 
															North Korea, Sudan, Myanmar (Burma), or to other individuals restricted by U.S. export controls and 
															sanctions, and is void in any other nation, state, or province where prohibited or restricted by U.S. 
															or local law.
														</p>
															<br>
														<b> Unacceptable Entry </b>
															<br><br> 
														<p>
															Entries must not be a 3rd party stock image. 
														</p>
															<br> 
														<p>
															Entries that contain watermarks, other people or distinguishing artist marks (such as prominent signatures) 
														</p> 
															<br>  
														<b> 
															Disqualification 
														</b>
	 														<br> <br> 
	 													<p> 
															Ineligible entries may be disqualified at any phase of the competition without notification.
														</p> 
															<br>  
														<b> 
															Terms and Conditions of Entry/Usage
														</b>
															<br> <br> 
														<p> 
															Fashion Sponge assumes all entries are from the submitting entrant. In the event that an entrant without such rights submits an entry, the entrant will not be eligible for the competition. Fashion Sponge is not liable for any copyright infringement on the part of the entrant.														
														</p> 
															<br> 
														<p>
															Entries will be live and available on the Internet from the date of entry and accessible via http and standard Web browsers.
														</p>
															<br>
														<p>
															Submission of any entry acknowledges the right for Fashion Sponge to use it for exhibition, promotion and publication purposes in any medium.
														</p>
															<br>
														<p>
															If an entrant receives an wins or gets acknowledged, the manner and details of announcing such nomination and award is strictly within the discretion of Fashion Sponge.
														</p>
															<br>
														<p id="red" >
															Other requirements and restrictions apply, please read the Official Rules carefully. 
														</p> 
													</div> 
													<div class="judgin_process" >  
														<b> Establishing Nominees and Winners </b>
															<br><br> 
														<p>
															The World’s Most Stylish Nominees and Winners are selected by employees of Fashion Sponge from the best work entered through the Call for Entries. 
														</p>
															<br> 
														<b>Judging </b>
															<br><br> 
														<p>How looks are Judged</p> 
															<br> 
														<p> 
															From all of the entries submitted during the Call for Entries, employees of Fashion Sponge will independently inspect each entry and rate them based on their respective judging criteria. The twenty five (25) entries from each category that best through this process are included on category specific shortlists and are further evaluated by the online community. Through a public vote we will select a winner from the Nominees in each category. 
														</p>
															<br>

														<b>  Description of Fashion Sponge Employees and Guest Judges </b>
															<br><br> 
														<p>
															Employees of Fashion Sponge and guest judges are industry experts. As such, they have demonstrable expertise in the categories in which they review. In order to be accepted to be a judge, all judges must first submit an application. After their application is reviewed and accepted, and they are verified as experts and leaders in their peer groups, judges are given different entries for review in the respective categories of their expertise. They are barred from judging any entry with which they have a conflict of interest, or any personal or professional affiliation. Fashion Sponge inspects the work of each judge for fairness and accuracy, and verifies Judges' qualifications and level of expertise for judging.
														</p>
															<br> 
														<b> Disclosure </b>  
															<br><br>
														<p>
															With all the connection and interconnection online, and because we not only acknowledge excellence, but we associate with it, the potential for conflicts of interest often arises. We take these conflicts very seriously. We do everything in our power to minimize occurrences of conflicts while ensuring that the best work is recognized. Fashion Sponge does not select the Nominees, the Winners, or influence the judges in any way. We do select a diverse body of judges who we feel is objective, respected and knowledgeable in their category.  
														</p>    
														<!-- 
														<b>
															Establishing Nominees and Winners
														</b>
															<br><br> 
														<p>
															The World's Most Stylish Nominees are selected by employees of Fashion Sponge from the best work entered through the Call for Entries. 
														</p>
															<br>	
														<b>
															TIER I: Round 1 Judging
														</b>
															<br><br> 
														<p> 
															How looks are Judged
														</p>
															<br>
														<p> 
															From all of the entries submitted during the Call for Entries, employees of Fashion Sponge will independently inspect each entry and rate them based on their respective judging criteria. The entries that best through this process are included on category specific shortlists and are further evaluated by the online community. Through a public vote we will select a winner from the Nominees in each category. 
														</p>
															<br>
														<b>TIER II: Establish Nominees and Winners - FINAL JUDGING</b>
															<br><br>

														<p>
															Nominees and Winners are Chosen
														</p>
															<br> 
														<p>
															Fashion Sponge employees and guest judges with category specific expertise further evaluate the shortlisted entries based on the online votes and eventually cast ballots to determine Nominees and Winners. In the event of a tie, the Nominees with the most shared looks will be selected. 
														</p>
															<br>
														<p>
															Due to the fact that only four (4) nominees, including one (1) winner, can be chosen for each category, other entries that are worthy of recognition are eligible to win a prize for having the most shared looks in their category. 
														</p>
															<br> 
														<b>
															Description of Fashion Sponge Employees and Guest Judges
														</b>
															<br><br> 
														<p>
															Employees of Fashion Sponge and guest judges are industry experts. As such, they have demonstrable expertise in the categories in which they review. In order to be accepted to be a judge, all judges must first submit an application. After their application is reviewed and accepted, and they are verified as experts and leaders in their peer groups, judges are given different entries for review in the respective categories of their expertise. They are barred from judging any entry with which they have a conflict of interest, or any personal or professional affiliation. Fashion Sponge inspects the work of each judge for fairness and accuracy, and verifies Judges' qualifications and level of expertise for judging.
														</p>
															<br>
														<b> 
															Disclosure
														</b> 
															<br><br>
														<p>
															With all the connection and interconnection online, and because we not only acknowledge excellence, but we associate with it, the potential for conflicts of interest often arises. We take these conflicts very seriously. We do everything in our power to minimize occurrences of conflicts while ensuring that the best work is recognized. Fashion Sponge does not select the Nominees, the Winners, or influence the judges in any way. We do select a diverse body of judges who we feel is objective, respected and knowledgeable in their category. The nominees are entirely in the hands of Fashion Sponge employees who select and vote on them through an independent process.
														</p>
															<br>
														<p>
															Judges may not vote for any entry with which they have a conflict of interest; such situations are closely monitored, depending on both the personal integrity of the judges and various sources of knowledge to police such activity.
														</p>  --> 
													</div> 
													<div class="judging_criteria" > 
 														<b>
															Creativity
														</b>
														<br><br>
														<p>
															Most stylish people employ a superior level of creativity. Judging the creativity of an entry focuses on a handful of elements including style, originality, innovation and the unique nature of the underlying idea. It includes a smartly selected color palette, great garment and accessory coordination and the relevant use of anything that communicates great styling. Great style can be characterized as engaging and relevant, with resonance and a point of view. It may be informative, functional, inspirational or technically mind-blowing, but overall it always leaves you wanting more from who ever is wearing it.
														</p> 
															<br>
														<b> 
															Quality Photos
														</b>  
														<br><br>
														<p> 
															Quality photos are highly visible images. A quality photo allows a viewer to clearly see all the detailing of the elements in the photo that supports the message. It clearly communicates the artist vision and may even take your breath away.
														</p>
															<br>
														<b>
															Engagement
														</b>
															<br><br>
														<p>  
															To develop a rapport with fans one must not rely solely on great content. Longevity in social media ultimately comes down to engagement. Conversing with fans is what builds a rapport with fans. Remember people buy you. Why? Because they like, believe and are inspired by you. Liking is an emotional act. Your fans will “only” visit your blog, social media pages and support you on voting sites because of the way show your appreciation. 
														</p>  
													</div>  
													<div class="categories" >

														categories  
													</div> 
												</div>   
											</td>
											<td style="width:2px;padding:20px; " > <img src="twms/images/divider.jpg" /> </td>
											<td> 
												<br> 
													<div id='contest-details-right' >  
															Submit 1 look thats either 
														<span id='red' style='width:100%' > 
															(chic, menswear , streetwear or preppy) 
														</span> 
														to compete in that style 
														category. Photo must be at least 5 megabytes, must be JPEG or JPG format,
														and must be at least 640 x600 pixels.  
													</div> 
												<br> 
												<a href="#"  ><img src="twms/images/submit looks.jpg" /></a><br>
										    <br>
												<img src="twms/images/or.jpg" /><br><br>
												<a href="#"  ><img src="twms/images/browse entries.jpg" /></a>
											</td>
										</table> 
									</td>           	 
								<!-- juges 1  --> 



									<td> 



										<img src="twms/images/slides/60.jpg"  class="slide_img" style='height:1px;' /><br>
										<br><br>
										<div> 
											<div style='text-align:center;color:#000; font-size: 54px; font-family:MisoLight; color:#b01e23;  ' > 
												We are currently looking for judges.
											</div>
											<div  style='text-align:center;color:#000; font-size: 15px; font-family:Helvetica; color:#284372;  ' >
												If you are looking for exposure and want to be acknowledged as an expert, email us now at <br> 
												info@fashionsponge
											 </div> 
										</div> 
										<br>  
										<table width='100%' border="0" cellpadding="1" cellspacing="0" >
											<tr> 
 												<?php for ($i=0; $i <5 ; $i++) {  ?>
													<td> 
														<table border='0' cellspacing='0' cellpadding='0' > 
															<tr> 
																<td>   
																	<a href="http://www.youtube.com/user/PassionJonesz" target="_blank" >

																		<img src="twms/images/judges/j11.jpg" />

																	</a>
																</td>
															<tr> 
																<td style=" padding-top:10px;" > 
																 	<?php 
																 		echo "  
																 			<center> 
																	 			<table border='0' cellspacing='0' cellpadding='0' style='width:80%;' >  
																	 				<tr> 
																	 					<td> 
																	 						<a href='#' target='_blank' > 
																	 							<img src='$mc->genImgs_twms/web-red.png'  style='width:15px;'  />  	
																	 						</a> 
																	 					</td>  
																	 					<td> 
																	 						<a href='#' target='_blank' > 
																	 							<img src='$mc->genImgs_twms/facebook-red.png'     style='height:15px;'  /> 
																	 						</a> 
																	 					</td>   
																	 					<td> 
																							<a href='#' target='_blank' > 
																	 							<img src='$mc->genImgs_twms/twitter-red.png'      style='width:15px;'  /> 
																	 						</a> 	
																	 					</td>  
																	 					<td>
																	 						<a href='#' target='_blank' > 
																	 							<img src='$mc->genImgs_twms/instagram-red.png'   style='width:15px;'  /> 
																							</a> 	 
																	 					</td>  
																	 		 	</table> 
																	 		</center> 
																 		 ";  
																 	?> 
																</td> 
														</table>  
													</td> 
												<?php } ?> 
										</table>







									</td>    







									<td style='display:none'>

										<img src="twms/images/slides/3.jpg"  class="slide_img" /> 
									</td>    






								<!-- awarding -->
									<td style="background-color:#f4f3f2;"  >    
										<div style="padding-left:0px; padding-top:20px; padding-right:0px; border:1px solid none; width:780px; overflow:auto" >   
											<div style="font-size:40px; font-family:MisoLight; color:#b01e23; border:1px solid none; float:left; padding-left:20px; padding-bottom:20px;  ">Awarding the Winners, Nominees and Most Viral </div> 
											<div id="awarding-content"   rel="scrollcontent3"  >   
											 	<b id='red'>
													Winners
												</b>
													<br> <br> 
												<p>
													In each of the 4 categories, there is only one chance to win the grand prize of "The World Most Stylish." Fashion Sponge employees and guest judges with category specific expertise will further evaluate the shortlisted entries based on the online votes and eventually cast ballots to determine Nominees and Winners. In the event of a tie, the Nominees who engaged the most most and had the most shared looks will be selected.
												</p>
												 <br> 
												<b id='red'>
													Nominees
												</b>
												<br> <br> 
												<p>
													Fashion Sponge will acknowledge the four (4) entrants in each of the 4 categories with the highest scores following the grand prize winner. These sixteen (16) entrants will be recognized as Nominees. For more information regarding Nominees, see The Nominee Resource Center.
												</p>
												<br> 
												<b id='red'>
													Most Viral
												</b>
												<br> <br> 
												<p>
													Due to the fact that only one (1) grand prize winner, can be chosen for each category, we will be giving a prize to the entrants that are worthy of recognition for having the most shared looks in their category. Three entrants from each category will win one of the three prizes. Prizes will be awarded to the entrants in the order of most shared looks. Grand prize winners are not eligible to win. 
												</p> 
										  

											</div>
										</div> 
									</td>       
								<!--  prize -->
									<td  id="price"   >  
										<div style="width:780px; padding-top:20px"  > 
	 										<div > 
	 											<table border="0" cellpadding="0" cellspacing="0" style="height:250px;" > 
	 												<tr>
	 													<td>
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
	 													</td>
	 													<td  style="width:20px;"  >  
	 														<img src="twms/images/divider.png" id="divider-long"  >
	 													</td>
	 													<td>
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
	 													</td>
	 														<td  style="width:20px;" > 
	 															<img src="twms/images/middle-divider.png"  id="divider-short"  >
	 														</td>
	 													<td>
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
	 													</td>
	 														<td  style="width:20px;" > 
		 														<img src="twms/images/divider.png" id="divider-long"  >
		 													</td>
	 													<td>
		 													<div>
		 														<img src="twms/images/Large-cash.png">
		 													</div> 
	 														<div id="price-firstprize-title" >
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
	 													</td>
	 											</table>
	 										</div> 
	 										<div> 
	 											<div style="position:relative; margin-top:-40px;" > 
 												 	<img src="twms/images/small-cash.png">
 												 	<div  id="price-firstprize-title" >MOST VIRAL PRIZE </div>
 												 	<div  id="price-firstprize-money" >$ 125, 75 AND 50 USD </div> 
	 											</div>  
	 										</div>
 										</div>




									</td>      	  
								<!-- sponsors -->
									<td valign=top >   
										<table border="0" cellpadding="1" cellspacing="0" class="slide_img"   >
											<tr>
												<td style="width:20px;" > 
													<a href="http://www.laurenmessiah.com" target="_blank" >
														<img src="twms/images/slides/lauren.png" style="border:1px solid none;float:left; height:347px; margin-left:-1px; margin-top:2px;"  /> 
													</a>
												</td>
												<td style="width:330px;" >  	
													<center>
														<br> 
													 	<table border="0" cellpadding="0" cellspacing="0" style="text-align:center;border:1px solid none;  " > 
													 		<tr> 
													 			<td> 
																	<div  style='text-align:center;color:#000; font-size:54px; font-family:MisoLight; width:290px; color:#b01e23;  ' > 
																		School of Style 
																	</div>
																</td>
															<tr>
																<td> 
																	<div style="color:#284372; font-size:15px;" >    


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
																	<div  style="position:relative; padding-top:20px; " >
																		<a href="http://www.facebook.com/SchoolofStyle" target="_"><img src="twms/images/fb-social-icons.png" /></a> &nbsp;&nbsp; 
																		<a href="https://twitter.com/schoolofstyle" target="_"><img src="twms/images/tw-social-icons.png" /></a>&nbsp;&nbsp;
																		<a href="http://www.youtube.com/user/SchoolofStyleLA" target="_"><img src="twms/images/yt-social-icons.png" /></a>
																	</div> 
																</td>
															<tr> 
																<td>   
	  																	 <br><br>
	 																<div style="float:left;border:1px solid none;float:left; font-size:12px; margin-left:5px;" > 
	 																	<a href="http://www.laurenmessiah.com" target="_blank" style="color:#284372" >
 																			<span style="font-weight:bold" > @LaurenMessiah </span>
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
												<td style=" padding-right:30px; " >  
													<a href="http://www.lukestorey.com" target="_blank" >
														<img src="twms/images/slides/luke.png" style="position:absolute; border:1px solid none; float:left;height:348px;  z-index:99; margin-left:-100px; margin-top:15px; "   />  
													</a>
												</td>
										</table>  
									</td>     
								<!-- judging  disabled --> 
									<!-- <td valign=top style='vertical-align:top' style="display:none" >
										<img src="images/slides/60.jpg"  class="slide_img" style='height:1px;' /><br>
										<table style="width:780px">
											<td style="width:560px;text-align:left;padding:20px 0 20px 20px" valign=top>
												<span style="font:30px raleway_thin">Judging</span><br><br>
												<div style="height:230px;width:560px;overflow:auto;font:12px 'helvetica (OT1)'" rel="scrollcontent2" >
													<table style="width:100%">
														<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
														<td style="text-align:left;font:12px 'helvetica'">
															25 Semi-Finalists will be selected by full-time Fashion Sponge
															staff and guest judges.
															<br><br>
														</td></tr>	
														<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
														<td style="text-align:left;font:12px helvetica">
															From the Semi-Finalists, Fashion Sponge staff and guest judges based on the community votes and critiques will select the final three winners! The prizes for the most viral photo will be based on the entrants who looks get shared on social networks the most.
															<br><br>
														</td></tr>
														<tr><td valign=top style="width:1px;" ><span style="background:url('images/bullet.jpg') left center no-repeat;padding:2px 15px 2px 0 " ></span></td>
														<td style="text-align:left;font:12px 'helvetica'">
															All entries will be judged on the following criteria:<br><br>
															<b>Photography:</b> Visual impact and clarity of photo.<br>
															<b>Wardrobe:</b> Success in communicating styling ability.<br>
															<b>Appearance:</b> The presence of the individual (Hair, Make-up, Grooming)<br>
															<b>Originality:</b> Making a style your own while still showcasing great styling.<br>
															<b>Consistency:</b> Showcasing great styling, photography, appearance.<br>
															<br><br>
														</td></tr>
													</table>
												</div>
											</td>
											<td style="width:2px;padding:20px;" > <img src="images/divider.jpg" /> </td>
											<Td style="width:220px;text-align:left;padding:20px 20px 20px 0;text-align:left;font:12px 'helvetica'" valign=top >
												Submit photo. Photo 5
												megabytes or smaller, must
												be JPEG or JPG format,
												and must be atleast 1, 600
												pixels wide if a horizontal
												image and 1, 600 pixels tall
												if a vertical image.<br><br><br> 
											<a href="http://fashionsponge.com/fs-contest/signup.php" target="_blank" ><img src="images/submit looks.jpg" /></a><br><br>
											<input type=image src="images/or.jpg" /><br><br>
										                                        
	                                        <a href="http://fashionsponge.com"  target="_blank" ><img src="images/browse entries.jpg" /></a>
									</td>      </table>  </td>     -->    
 
							</table>
							<span style="position:relative;top:-90px;left:10px;">
								<input style="display:none" type='image' alt="Play/Pause" src="twms/images/btn_pause.png" title="Pause" id="PlayPause" onClick="PlayPause()" />
							</span>
						</div>
					</td>
					<td valign=center style="width:100px"  align=right >
						<input   type='image' src="twms/images/right.png" onClick="clearInterval(t);getID('PlayPause').src='twms/images/btn_play.png';state='pause';navigate('next')" />
					</td>
				</table>
			</div>
			<div style="width:780px;margin:0 auto;text-align:center;">
				<div style="padding:5px;"></div>
				<div style="margin:0 auto;">

					<div style="padding:10px;color:white;background:url('images/back-trans.png');text-align:left; border:1px solid none; ">

						<span id="nav_span_0" style="display:none" ></span>
						<span class="nav_square" id="nav_span_1" onClick="navigate_text(1)"  title="INTRO" style="background:white">&nbsp;</span>
						<span class="nav_square" id="nav_span_2" onClick="navigate_text(2)"  title="CONTEST DETAILS">&nbsp;</span>
						<span class="nav_square" id="nav_span_3" onClick="navigate_text(3)"  title="JUDGING" >&nbsp;</span>
						<span style="//display:none" class="nav_square" id="nav_span_4" onClick="navigate_text(4)"  title="AWARDING" >&nbsp;</span>
						<span class="nav_square" id="nav_span_5" onClick="navigate_text(5)"  title="PRIZES" >&nbsp;</span>
						<span class="nav_square" id="nav_span_6" onClick="navigate_text(6)"  title="SPONSORS" >&nbsp;</span>

						<!-- <span   class="nav_square" id="nav_span_6" onClick="navigate_text(6)"  title="Rules" >&nbsp;</span>
						<span  class="nav_square" id="nav_span_7" onClick="navigate_text(7);"  title="Judging & Criteria" >&nbsp;</span> -->
						
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
						<span id="nav_text_0" style="display:none" ></span>
						<span class="nav_text" 	 id="nav_text_1" onClick="navigate_text(1);" title="INTRO" style="color:white" >INTRO</span>&nbsp;&nbsp; / &nbsp;&nbsp;
						<span class="nav_text" 	 id="nav_text_2" onClick="navigate_text(2)"  title="CONTEST DETAILS" >CONTEST DETAILS</span> &nbsp;&nbsp; / &nbsp;&nbsp;
						<span class="nav_text" 	 id="nav_text_3" onClick="navigate_text(3)"  title="JUDGES" >JUDGES</span>&nbsp;&nbsp; / &nbsp;&nbsp;
						<span class="nav_text" 	 id="nav_text_4" onClick="navigate_text(4)"  title="AWARDING" >AWARDING</span>&nbsp;&nbsp; / &nbsp;&nbsp;
						<span class="nav_text"   id="nav_text_5" onClick="navigate_text(5)"  title="PRIZES" >PRIZES</span> &nbsp;&nbsp; / &nbsp;&nbsp;
						<span class="nav_text"   id="nav_text_6" onClick="navigate_text(6)"  title="SPONSORS" >SPONSORS</span> 
						 
						<!-- 
						<span class="nav_text" 	  id="nav_text_6" onClick="navigate_text(6);" title="Rules" >RULES</span>&nbsp;&nbsp;&nbsp;
						<span   class="nav_text" 	 id="nav_text_7" onClick="navigate_text(7);" title="Judging & Criteria" >JUDGING & CRITERIA</span> -->
					</div>
					<br>   
					<div>  
						<?php 
							echo "  
								<img src='$mc->genImgs_twms/sign up button.png'   style='width:780px;cursor:pointer' onclick='signup_clicked()'  />  
							"; 
						?> 
					</div>
					<br>
					<table width=100% style="color:white" border="0" >
						<td valign=top > 
							<?php
								if($b=="ch")
									echo '<span style="font-family:misoLight;font-size:36px;color:white">';
								else
									echo '<span style="font-family:raleway_thin;font-size:36px;color:white">';
							?> 
									HOW<br>TO<br>ENTER<br> 
								</span>
							<b 
								<?php
									if($b=="ch")
										echo '<b style="font-family:misoLight;font-size:15px;color:white">';
									else
										echo '<b style="font-family:misoLight;font-size:15px;color:white">';
								?>
							(WORLDWIDE 16+)</b>
						</td>
						<td valign=top >
							<table style="color:white">
								<td valign=top style="font-family:misoLight;font-size:50px;color:white;padding:0 20px 0 0">1</td>
								<td valign=top style="font-family:helvetica;font-size:12px">

									30 sec registration using<br> facebook connect. 
									<!-- 30 sec registration using<br> facebook or twitter connect. -->

								<div style="padding:3px"></div>
									<a href="#"   style="color:#d20e0e;font-family:helveticabold">OFFICIAL RULES</a>
								</td>
							</table>
						</td>
						<td valign=top  >

							<ul id="footer-content" >
								<li  style="font-family:misoLight;font-size:50px;color:white;padding-right:20px;" > 2 </li>
								<li style="font-family:helvetica;font-size:12px"  > 
									Grab your favorite camera<br>
 									(idevice, smart phone, Nikon,<br>
 									Canon, etc.) and take a high<br>
 									quality photo that showcases<br>
 									only you so we can see styling<br>
 									ability. 
								</li>
							</ul> 
						</td>
						<td valign=top >
							<table style="color:white">
								<td valign=top style="font-family:misoLight;font-size:50px;color:white;padding:0 20px 0 0">3</td>
								<td valign=top style="font-family:helvetica;font-size:12px;">   
									Submit 1 look thats either<br>  
									(chic, menswear, streetwear<br>  
									or preppy) to compete in<br>  
									that style category. Photo<br>  
									must be at least 5 megabytes,<br>  
									must be JPEG or JPG format,<br>
									and must be at least 640 x 600<br>  
									pixels.    
									<br><br><br>
								</td>
							</table> 
						</td>
					</table>
					<br>
						<div style="padding:2px;border-bottom:1px solid #5f7293; "></div>  
						<div style="padding:5px;"> 
						</div>    
						<table width=70%  border="0" > 
							<td valign=top style="padding:0px 25px 5px 0;border-right:1px solid #5f7293;"><a style="text-decoration:none;" href='http://www.fashionsponge.com' target="_" ><img src="twms/images/logo-small-x.png" width=150 /></a></td>
							<td valign=top style="padding:10px 25px 5px 25px;border-right:1px solid #5f7293;">
								 
								<a style="color:#d20e0e;font-family:helveticabold;font-size:12px" target="_" href='info'  >ABOUT</a>
							</td>
							<td valign=top style="padding:10px 25px 5px 25px;border-right:1px solid #5f7293;"> 
								<a style="color:#d20e0e;font-family:helveticabold;font-size:12px"  href='#'  >BLOG</a>
							</td>
							<td valign=top style="padding:8px 25px 5px 25px; "> 
								<a href="https://www.facebook.com/FASHIONSPONGE " target="_"><img src="twms/images/fb-small.png" /></a>&nbsp;&nbsp;&nbsp;
								<a href="https://twitter.com/FashionSponge " target="_"><img src="twms/images/tw-small.png" /></a>&nbsp;&nbsp;&nbsp;
								<a href="http://fashionsponge.tumblr.com/ " target="_"><img src="twms/images/th-small.png" /></a>&nbsp;&nbsp;&nbsp;
								<a href="http://pinterest.com/fashionsponge/" target="_"><img src="twms/images/pin-small.png" /></a>&nbsp;&nbsp;&nbsp;
							</td> 
						</table>
					<br><br><br>
				</div>	 
			</div> 
		</div> 
		<div style="height:150px; background-color:#1b396d; width:100%; " >  
		</div>

	</div>
	</body>
</html>