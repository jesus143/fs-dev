	 			
	<?php 
		/*
		*   date replaced: novemeber 01 , 2013
		*	required to work header correctly. 
		*   fs_folders/page_header/css/header1.css
		*	fs_folders/page_header/js/header1_js.js
		*	fs_folders/page_header/js/header1_query.js
		*/

	?>

		<script type="text/javascript" src="fs_folders/page_header/js/header1_query.js"></script>
		<script type="text/javascript" src="fs_folders/page_header/js/header1_js.js"></script>
		<link rel="stylesheet" type="text/css" href="fs_folders/page_header/css/header1_signIn.css">  

 
	 			<div id='bgimg'> 
		 			<img src="fs_folders/images/header/bgheaderperson1.png">
		 		</div>
		 		<span id='myacc' > MY ACCOUNT </span>

		 		<table id='profile_t' border="0" cellpadding="0" cellspacing="0"  >  
			 		<tr>  
			 			<td id='prof_img' > 
			 			 <!-- Profile pic  -->
			 			 	<a href="profile">
			 			 		<img src="fs_folders/images/uploads/member/profile3.jpg">
			 			 	</a>
			 				
			 			</td>
			 			<td id='prof_desc' > 
				 			<span id='full_name'> 
				 				 JOHN JERRYCMORPHERSON JENKIS
				 			</span>
				 		<br>
				 			<span id='full_fashion_link'> 
				 				 http://www.fashionsponge.com/johnjerrymorphersonjenkins 
				 			</span>
			 			</td>
						<td id='prof_icons' > 
					 		<div id='hmessage_Contaner'> 
				 				 <table border="0" cellpadding="0" cellspacing="0"> 
				 				 	<tr>  
				 				 		<td> 
				 				 			<span id='header_invisible' ><!-- (0) --></span> 
				 				 			<img title='invite' id='invite_img1' class="grey" src="fs_folders/images/header/icon-header-invite-icon.png" > 
				 				 			<img title='invite' id='invite_img2' class="red" src="fs_folders/images/header/icon-header-member-red.png"> 				 				 			
				 				 		</td>
				 				 		<td> 
				 				 			<span> <!-- 999+ --> </span> 
				 				 			<img title='message' id='message_img1' src="fs_folders/images/header/icon-header-message-icon-grey.png"> 
				 				 			<img title='message' id='message_img2' src="fs_folders/images/header/icon-header-message-icon-red.png" > 
				 				 		</td>
				 				 		<td> 
				 				 			<span> <!-- 999+ --> </span> 
				 				 			<img title='notifcation' id='notifcation_img1' src="fs_folders/images/header/icon-header-notifcation-icon.png" >  
				 				 			<img title='notifcation' id='notifcation_img2' src="fs_folders/images/header/icon-header-notification-red.png">
				 				 		</td>
				 				 		<td> 
				 				 			<span  id='header_invisible' ><!-- (0) --></span> 
				 				 			<img title='settings' id='settings_img1' src="fs_folders/images/header/icon-header-settings-icon.png" >   
				 				 			<img title='settings' id='settings_img2' src="fs_folders/images/header/icon-header-settings-red.png"> 
				 				 		</td>
				 				 </table>
					 		</div>
					 		<div id="invite_result" > 
					 			invite
					 		</div>
					 		<div id="message_dropdown_container" class="close" >  
						 		<div id="arrow_up"> <img src="fs_folders/images/header/arrow_up.png"> </div>
						 		<table id="ms_headerT" border="0" cellpadding="0" cellspacing="0"> 
						 			<tr>  
							 			<td> <a href="read_messages"><span title="read all messages.."> READ ALL </span></a></td>
							 			<td>
							 				<a href="home"> 
							 					<img src="fs_folders/images/header/message-add-icon.png"> 
							 				</a> 
							 			</td>
						 		</table>
						 		<table id="ms_footerT" border="0" cellpadding="0" cellspacing="0"> 
						 			<tr>  
							 			<td> </td>
							 			<td> </td>
						 		</table>
						 		<div id="message_result"> 
						 			<?php 
						 				$na = array(
						 					'rated a look of ms jessica allunzo and like the other looks.', 
						 					'love a look of lapu2x and drip..', 
						 					'shared a blog of you and commented..', 
						 					'angillica panganiban change her profile', 
						 					'roben padilla uploaded new look and drip..', 
						 				);
						 				for ($i=0; $i <20 ; $i++) {  

						 				?> 
									<table id="ms_bodyT" border="0" cellpadding="0" cellspacing="0"> 
										<tr>  
										
										 	 
											<td id="ms_profile_td"> 
												<a href="profile">
													<img id="messages_profile" src="fs_folders/images/member/profile3.jpg">
												</a>
											</td>
											<td id="messages_desc_td">
												<div id="messsage_activity"> 
													<a href="lookdetails">
														<span id="messages_name"> 
															Jesus erwin suarez  the 3rd
														</span>
														<br>
														<span id="messages_desc"> 
													  	  <?php 
													  	  	echo $na[rand(0,count($na)-1)];
													  	  ?>
													  	</span>
												  	</a>

												</div> 
											</td>
									 

										<tr>  
											<td id="header_invisible">ds  </td> 
										<tr>
										
									</table> 
									<?php } ?>
								</div>
					 		</div>
					 		<div id="notification_result"> 
					 			notification
					 		</div>
					 		<div id="settings_result"> 
					 			settings
					 		</div>
			 			</td>
			 			<td id='prof_post' > 
				 		    <!-- <input type='button' value='image'  >  -->
				 		    <table border="0" cellpadding="0" cellspacing="0"> 
				 		    	<tr>  
				 		    		<td> <span>POST</span> </td>
				 		    		<td> <img id ="post_now" title='POST NOW' src="fs_folders/images/header/header_post.png"> </td>
				 		    	<tr> 
				 		    		<td></td>
				 		    		<td id="post_option_td" > 
				 		    		</td>
				 		    </table>
			 		    	<div id="post_option_div" class="close" > 
 		    					<ul> 
	 		    					<li> <a href="postalook"> LOOK </a></li>
			 		    			<li> <a href="postamedia"> MEDIA </a></li>
			 		    			<li> <a href="postarticle"> ARTICLE </a></li>
		 		    			</ul>
 		    					<img id ="post_option" src="fs_folders/images/header/post_option.png"> 				
			 		    	</div>
			 			</td>
			 	</table>
		 		<div id='header_container'> 
		 			<table border=0 width="100%"> 
		 				<tr> 
		 					<td> 
					 			<div id='header_menu' > 
						 			<table border=0 id='hmt' > 
						 			<tr> 
						 				<td id='htd1' > 
						 					<table border=0 id='httdt3'> 
						 						<tr> 
							 			 			<td> 
							 			 				<a href="home">
							 			 					<img src="fs_folders/images/logo/fs_logo1.png" >
							 			 				</a>
							 			 				 

							 			 			</td>
							 			 			<td id="sign_in_beta_td"> 
				 			 			 				<a href="home">
				 			 			 					<span id="beta"> (ALPHA) </span>
				 			 			 				</a>
													</td>
							 			 	</table>
						 				</td>
						 				<td  id='htd2'>
						 					<table border=0 id='httdt2'> 
						 					<tr> 
									 		 	<td width="40px" > <span id='home'>        <a href="home">HOME </a>        </span> </td>
									 			<td width="25px" > <span id='participate'> <a href="#">PARTICIPATE</a> </span></td>
									 			<td width="25px" > <span id='comunity'>    <a href="#">COMMUNITY </a>   </span></td>
									 			<td width="25px" > <span id='info'>        <a href="#">INFO</a>        </span></td>
						 					</table>
						 				</td>
						 				<td  id='htd3' > 
						 					<table border=0 id='httdt3'> 
						 						<tr> 
						 							<td><input id='search' type='text'  ></td><td> <input id='scope' type='image' src="fs_folders/images/header/scope.jpg" > </td>
						 					</table>
						 				</td>
						 			</table>
					 			</div>  <!--  end header menu -->
			 				</td>
			 			<tr>  
			 				<td id='td2' > 
			 				</td>
			 			<tr>
			 				<td id='td3' > 
			 				</td>
		 			</table>
		 		</div> 
  
		 		<div id="all_menu_ropdown_c"> 

			 		<div id="info_dd_container"  > 
		 				<div id="info_handle"> 
		 					<span>  INFO </span>
		 					<img src="fs_folders/images/header/drop info/handle.png">
		 				</div>
		 				<table id="iddc_leftT"  cellpadding="0" cellspacing="0"> 
		 				 	<tr>  	
		 				 		<td id="t1" >  <span >  WHAT CAN I DO </span> </td>
		 				 	<tr>  	
		 				 		<td  id="link" > <a href="#">  <span>  ABOUT US  </span>  </a> </td>
		 				 	<tr>  	
		 				 		<td  id="link" > <a href="#"><span>  OUR STORY </span></a> </td>
		 				 	<tr>  	
		 				 		<td  id="link" > <a href="#"><span>  CAREERS  </span></a> </td>
		 				 	<tr>  	
		 				 		<td  id="link" > <a href="#"><span>  CONTEST & RULES </span></a> </td>
		 				 	<tr>  	
		 				 		<td  id="link" > <a href="#"><span>  PRIVACY POLICY </span></a> </td>
		 				 	<tr>  	
		 				 		<td  id="link" > <a href="#"><span>  TERM OF SERVICE </span></a> </td>
		 				 </table>
		 				 <table id="iddc_rightT"  border="0" cellpadding="5" cellspacing="0" > 
		 				 	<tr>  
		 				 		<td>  <center> <a href="#"> <img id="iddc_feedback"     src="fs_folders/images/header/drop info/feedback.png">    </a>  </center> </td>
		 				 		<td>  <center> <a href="#"> <img id="iddc_dvertise"     src="fs_folders/images/header/drop info/advertise.png">   </a>  </center> </td>
		 				 		<td>  <center> <a href="#"> <img id="iddc_ettiquiette"  src="fs_folders/images/header/drop info/ettiquette.png">  </a>  </center> </td>
		 				 		<td>  <center> <a href="#"> <img id="iddc_contribute"   src="fs_folders/images/header/drop info/contribute.png">  </a>  </center> </td>
		 				 		<td>  <center> <a href="#"> <img id="iddc_help"         src="fs_folders/images/header/drop info/faq.png">         </a>  </center> </td>
		 				 	<tr> 
		 				 		<td id="link" > <a href="#"> <span> SUBMIT FEEDBACK </span> </a></td>
		 				 		<td id="link" > <a href="#"> <span> ADVERTISE       </span> </a></td>
		 				 		<td id="link" > <a href="#"> <span> ETTIQUIETTE     </span> </a></td>
		 				 		<td id="link" > <a href="#"> <span> CONTRIBUTE      </span> </a></td>
		 				 		<td id="link" > <a href="#"> <span> HELP            </span> </a></td>
		 				 </table>
			 		</div>

		 			<div id="community_dd_container" > 
		 				<!-- community dropdown -->
		 				<div id="community_handle"> 
		 					<span> COMMUNITY </span>
		 					<img src="fs_folders/images/header/drop info/handle.png">
		 				</div>


		 				<table id="cddc_t1" border="0" cellpadding="0" cellspacing="0" > 
		 					<tr>  
		 						<td id="icon_bmember" >  
		 							 <table border="0"> 
		 							 	<tr>
		 							 		<td> 
 												<center> <a href="#"> <img id=""   src="fs_folders/images/header/drop community/members-icon.png">  </a>  </center> 
 											</td>  
 										<tr>  
 											<td id="ibtext">  
 												<center> <a href="#"> <span> BROWSE MEMBERS </span> </a>   </center>
 											</td>  
		 							 </table>
		 						</td>
 								<td id="icon_ifriends" >  
 									 <table border="0"> 
		 							 	<tr>
		 							 		<td> 
 												<center> <a href="#"> <img id=""   src="fs_folders/images/header/drop community/invite icon.png">  </a>  </center> 
 											</td>  
 										<tr>  
 											<td id="iftext">  
 												<center><a href="#"> <span> INVITE FRIENDS </span> </a></center>
 											</td>  
		 							 </table>
 								</td>
 								<td id="icon_ginspiration" >  
 									<table border="0"> 
		 							 	<tr>
		 							 		<td> 
 												<center> <a href="#"> <img id=""   src="fs_folders/images/header/drop community/inspiration-icon.png">  </a>  </center> 
 											</td>  
 										<tr>  
 											<td id="igtext">  
 												<center> <a href="#"> <span> GET INSPIRATION </span> </a></center> 
 											</td>  
		 							 </table>
 								</td>
 								<td id="icon_ddrip" >  
 									<table border="0"> 
		 							 	<tr>
		 							 		<td> 
 												<center> <a href="#"> <img id=""   src="fs_folders/images/header/drop community/blog-icon.png">  </a>  </center> 
 											</td>  
 										<tr>  
 											<td id="idtext">  
 												<center> <a href="#"> <span> THE DAILY DRIP (OUR BLOG)</span> </a></center>
 											</td>  
		 							 </table>
 								</td>
 		 				 	<tr>
		 				</table>


		 			</div>
		 			<div id="participate_dd_container" > 
		 				<div id="participate_handle"> 
		 					<span>  PARTICIPATE </span>
		 					<img src="fs_folders/images/header/drop info/handle.png">
		 				</div>
		 				

		 				<table id="pddc_leftT" border="0"   cellpadding="0" cellspacing="0"> 
		 				 	<tr>  	
		 				 		<td id="t1" style="visibility:hidden" >  <span >  WHAT CAN I DO </span> </td> 
		 				 	<tr>  	
		 				 		<td  id="link" > <a href="#"><span>  POST A LOOK  </span>  </a> </td>
		 				 	<tr>  	
		 				 		<td  id="link" > <a href="#"><span>  RATE A LOOKS </span></a> </td>
		 				 	<tr>  	
		 				 		<td  id="link" > <a href="#"><span>  POST AN ARTICLE </span></a> </td>
		 				 	<tr>  	
		 				 		<td  id="link" > <a href="#"><span>  READ AN ARTICLE </span></a> </td>
		 				 	<tr>  	
		 				 		<td  id="link" > <a href="#"><span>  POST MEDIA </span></a> </td>
		 				 	<tr>  	
		 				 		<td  id="link" > <a href="#"><span>  VIEW MEDIA </span></a> </td>
		 				 </table>

		 				<div id="pddc_look_container" >  
			 				<table id="pddc_look_containertt1" border="0"  cellpadding="0" cellspacing="0" > 
			 					<tr>
			 						<td id="pddc_t1"> 
			 							<span> WHAT CAN I DO  </span>
			 						</td>
			 						<td id="pddc_t2"> 
			 							<span>TRENDING NOW </span>
			 						</td>
			 						<td id="pddc_t3"> 
			 							<!-- <span> TOP POST </span> -->
			 						</td>
		 					</table> 
		 				

			 				<table id="pddc_look_img_t"  border="0" > 
			 					<tr>  
				 					<td> 
					 					<table id="top_lookt" border="0" >  

					 						<tr>  
					 							<td> 
					 								<img src="fs_folders/images/header/drop participate/top-look.png">
					 							</td>
					 						<tr>  
					 							<td> 
					 								<span> THIS IS THE TOP LOOK UPLOADED </span> 
					 							</td>
					 					</table>
				 					</td>
				 					<td> 
					 					<table id="top_articlet" border="0" >  
					 						<tr>  
					 							<td> 
					 								<img src="fs_folders/images/header/drop participate/top-article.png">
					 							</td>
					 						<tr>  
					 							<td> 
					 								<span> THIS IS THE TOP ARTICLE UPLOADED </span> 
					 							</td>
					 					</table>
				 					</td>
				 					<td> 
					 					<table id="top_mediat" border="0" >  
					 						<tr>  
					 							<td> 
					 								<img src="fs_folders/images/header/drop participate/top-media.png">
					 							</td>
					 						<tr>  
					 							<td> 
					 								<span> THIS IS THE TOP MEDIA UPLOADED </span> 
					 							</td>
					 					</table>
				 					</td>

			 				</table>
		 				</div>
		 				<!-- <table id="pddc_menu" border="1" cellpadding="0" cellspacing="0"> 
		 				 	<tr>  
		 				 		<td  id='pddc_t1' ><span> WHAT CAN I DO </span></td>
		 				 		<td  id='pddc_t2' ><span> TRENDING NOW </span></td>
		 				 		<td  id='pddc_t3'><span> TOP TAGS </span></td>
		 				</table> -->
		 				<div id="right_tags_container"> 
		 					<table border="0" cellpadding="0" cellspacing="0"> 
		 						<tr>  
		 							<td> <span id="top_tags">TOP TAGS </span>  </td>
		 						<tr>  
		 							<td id='tags_Desc_ctd'>  
		 							 	 <table id="top_look_tags"> 
		 							 	 	<tr>  
		 							 	 		<td> <span id="tags_title">  Looks </span> </td>
		 							 	 	<tr>  
		 							 	 		<td> 
		 							 	 			<span id="tags_desc">   
		 							 	 				#green #cotton #floral #100 <br>
		 							 	 				#green #cotton #floral #100 <br>
		 							 	 				#green #cotton #floral #100 <br>
		 							 	 			</span> 
		 							 	 		</td>
		 							 	 </table>
		 							 	 <table id="top_look_tags"> 
		 							 	 	<tr>  
		 							 	 		<td> <span id="tags_title">  Looks </span> </td>
		 							 	 	<tr>  
		 							 	 		<td> 
		 							 	 			<span id="tags_desc">   
		 							 	 				#green #cotton #floral #100 <br>
		 							 	 				#green #cotton #floral #100 <br>
		 							 	 				#green #cotton #floral #100 <br>
		 							 	 			</span> 
		 							 	 		</td>
		 							 	 </table>
		 							 	 <table id="top_look_tags"> 
		 							 	 	<tr>  
		 							 	 		<td> <span id="tags_title">  Looks </span> </td>
		 							 	 	<tr>  
		 							 	 		<td> 
		 							 	 			<span id="tags_desc">   
		 							 	 				#green #cotton #floral #100 <br>
		 							 	 				#green #cotton #floral #100 <br>
		 							 	 				#green #cotton #floral #100 <br>
		 							 	 			</span> 
		 							 	 		</td>
		 							 	 </table>
		 							</td>
		 					</table>
		 					 
		 				</div>
		 			</div>
		 		</div>
		 		<!-- end header -->
		 	 