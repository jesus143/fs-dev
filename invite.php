<?php 
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php"); 
	require("fs_folders/php_functions/myclass.php");  
	$mc = new myclass(); 
	$mc->auto_detect_path(); 
	$mc->init_peoplebehindyou_peopleaheadofyou( ); 
	if (isset($_POST['submit'])) {
		// echo "submit clicked!";	 
		$invited_fn    = $_POST['invited_fn'];
		$invited_ln    = $_POST['invited_ln'];
		$invited_email = $_POST['invited_email']; 
		$invited_wob   = $_POST['invited_wob']; 
		$invited_occu  = $_POST['invited_occu'];
		$invited_style = $_POST['invited_style'];
		$invited_offer = $_POST['invited_offer']; 

		$mc->insert_invited( $invited_fn , $invited_ln , $invited_email , $invited_wob , $invited_occu , $invited_style , $invited_offer ); 
		$mc->send_email_to_admin( $invited_fn , $invited_ln , $invited_email , $invited_wob , $invited_occu , $invited_style , $invited_offer );
		$mc->send_email_to_user( $invited_fn ,  $invited_email ); 
		$response_text = true;  
	} else {  
		$mc->get_visitor_info( "" , "invite" );
		$response_text = false;
	}   
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
	<head> 


			<?php  $mc->header_attribute( 
 				"Sign Up | Fashion Sponge" , 
 				"Fashion Sponge is the easiest & fastest way to: Show your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.",
 				"ootd | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration " 
 			); ?> 
 


		<!-- new outsite -->
			 <link rel="stylesheet" type="text/css" href="fs_folders/page_footer/css/invite_footer.css" >
		<!-- end outsite -->
 

		<!-- new header  -->
		 	  <link rel="stylesheet" type="text/css" href="fs_folders/invite/reg_css/style.css" >
		<!-- end header  -->

		<!-- new local css --> 
		<!-- end local css --> 

		<!-- new general script  -->
			<script type="text/javascript" src='fs_folders/js/jQv1.8.2.js'> </script>
			<script type="text/javascript" src='fs_folders/js/function_js.js'></script>
		<!-- end general script -->

		<!-- new slide show -->
			 <script type="text/javascript" src="fs_folders/invite/reg_js/cycle.js"></script>


		<!-- end slide show -->




		<!-- new owned scrip -->
			<script type="text/javascript" src='fs_folders/invite/reg_js/invite_query.js'> </script>
			<script type="text/javascript" src='fs_folders/invite/reg_js/invite_js.js'> </script>
		<!-- end owned scrip --> 
		
	</head>
	<body>
		<?php 
			// require('fs_folders/fs_popUp/popUp_php_file/popupinvite.php'); 

			$mc->plugins( "google analytic" , " invite " );
		?> 


		<?php  
			if ( isset($_POST['submit']) ) {  

				$mc->invite_popUp( $response_text ,  $invited_fn , 'invite' );  

			} else if ( !empty($_GET["invite_from_otherpage"]) ) {   
			 	
			 	$email = $_GET["email"];
			 	$fn = $_GET["fn"];  

				$mc->insert_invited( 
					$fn , 
					null , 
					$email  
				); 
				$mc->send_email_to_admin( 
					$fn , 
					null , 
					$email 
				); 
				$mc->send_email_to_user(  
					$fn,  
					$email 
		 		);   
		 		$mc->invite_popUp( 
		 			true ,  
		 			$fn 
		 		);   

			}  
		?>  
	 	<div id='reg_wrapper'>  
	 		 <div id="direct_location">
 		 			<!-- direct location  -->
 		 	</div>
			<div id='reg_header' > 
				<div id='slideShowContainer'>
					 
					<a href="http://fashitects.blogspot.com/" target="_blank" >
						<img  src='fs_folders/invite/reg_img/slideshow/1.jpg' />
					</a> 
					<a href="http://www.soulofashopper.com/" target="_blank" >
						<img  src='fs_folders/invite/reg_img/slideshow/2.jpg' />
					</a>
					<img  src='fs_folders/invite/reg_img/slideshow/3.jpg' />
					<a href="http://garnerstyle.blogspot.com/" target="_blank" >
						<img  src='fs_folders/invite/reg_img/slideshow/4.jpg' />
					</a>
					<img  src='fs_folders/invite/reg_img/slideshow/5.jpg' />
					<img  src='fs_folders/invite/reg_img/slideshow/6.jpg' />
				</div>
				<center> 
		 			<table border="0" id='hmt' > 
		 			<tr> 
		 				<td id='htd1' >  
				 				<table id="left_logo_table" border="0" > 
			 						<tr>  
			 							<td id="logo_td"> 
		 			 					<a href="/">
			 			 					<img src="fs_folders/images/logo/updated-FashionSponge-Logo.png">
			 			 				</a>
 			 						</td>
 			 			 			<td id="beta_td"> 
 			 			 				<a href="/">
 			 			 					<span id="beta"> (ALPHA) </span>
 			 			 				</a>
 			 			 			</td>
	 			 			 	</table> 
			 			 	</table>
		 				</td>
		 				<td  id='htd2'>
		 					<center>
			 					<table border=0 id='httdt2' cellpadding="15"> 
			 					<tr> 
						 		 	<td width="40px" > <span id='home'>        <a href="/">HOME </a>        </span> </td>
						 			<td width="25px" > <span id='participate' onclick="warning_link_under_onstruction() ">  <a href="">PARTICIPATE</a> </span></td>
						 			<td width="25px" > <span id='comunity'    onclick="warning_link_under_onstruction() ">  <a href="">COMMUNITY </a>   </span></td>
						 			<td width="25px" > <span id='info'        onclick="">  						            <a href="info">INFO</a>        </span></td>
			 					</table>
		 					</center>
		 				</td>
		 				<td  id='htd3' > 
		 					<table border="0" id='httdt3'> 
		 						<tr> 
		 							<td><input id='search' type='text' value="" ></td><td> <input id='scope' type='image' src="fs_folders/images/header/reg_scope.png" > </td>
		 					</table>
		 				</td>
		 			</table>
		 			<table id='dicover' border="0" > 
		 				<tr>  
		 					<td> <span id='dtittle' > DISCOVER </span> </td> <tr>
		 					<td> <span id='ddesc'> Discover fashionable </span> </td> <tr>  
		 					<td> <span id='ddesc' > people , brands and blogs </span> </td>  
		 			</table>
		 			<table id='nextprebT' border="0"  > 
		 				<tr>  
		 					<td  id='reg_prev' > <img src="fs_folders/images/header/reg_prev.png">  </td>
		 					<td id='reg_next' >  <img src="fs_folders/images/header/reg_next.png">  </td>
		 			</table>
 		 		</center>
 		 	</div> 
 			<div id='reg_body' >  
 				<center>  
	 				<div id="invite-body-close-open-bracket-div" > 
	 					bracket
	 				</div>
	 				<div id="body-contetent-container"   > 
			 				<div id="invite-center-div-header" > 
				 				<span id='invite-center-div-header-title' > GET YOUR INVITE NOW </span> <br>
				 				<span id='invite-center-div-header-desc' > You don't want to be fashionably late. </span> 
			 				</div>
			 				<table id='getInvite_and_FieldsT' border="0" >  
			 					<tr>  
			 						<td id='getYourInviteContainer' >  
			 							<div id='GYIdiv'> 
				 							<span id='invite-left-body-content-table-header' > 4 REASON TO SIGN UP TO FASHION SPONGE </span>    
				 							<table id="invite-left-body-content-table" border="0" cellpadding="0" cellspacing="0" >  
				 								<tr>   
				 									<td id='invite-left-body-content-table-img'  >  
				 										<center> 
				 											<img src='<?php echo "$mc->genImgs/exposure-icon.png"; ?>' />
				 										<center> 
				 									</td> 
				 									<!-- <td id='invite-left-body-content-table-desc'  >  -->
				 									<td id="invite-left-body-content-table-desc" >
				 										<span id='invite-left-body-content-table-desc-title' > EXPOSURE </span>  <br>
			 											<span id='invite-left-body-content-table-desc-desc'> 
			 										 		Get free exposure for your <span id='redt' > blog </span> or <span id='redt' > brand </span>  by sharing your ootd.
			 										 	</span> 
				 									</td>  
				 								<tr>
				 									<td id='invite-left-body-content-table-img'  >
				 										<center>
				 											<img src='<?php echo "$mc->genImgs/learn-icon.png"; ?>' />
				 										</center>  
				 									</td> 
				 									<td id="invite-left-body-content-table-desc" >
				 										<span id='invite-left-body-content-table-desc-title' > LEARN </span>  <br> 
				 										<span id='invite-left-body-content-table-desc-desc'> 
				 											Get fashion <span id='redt' >inspiration</span> and style <span id='redt' >advice</span>.
															<!-- Find fashion <span id='redt' >inspiration</span>, get beauty and grooming  <span id='redt'>tips</span>  and style <span id='redt' >advice</span>. -->
													 	</span>  
				 									</td> 
				 								<tr>
				 									<td id='invite-left-body-content-table-img'  >  
				 										<center> 
				 											<img src='<?php echo "$mc->genImgs/discover-icon.png"; ?>' />
				 										<center> 
				 									</td> 
				 									<td id="invite-left-body-content-table-desc" >
				 										<span id='invite-left-body-content-table-desc-title' > DISCOVER </span>  <br>
				 										<span id='invite-left-body-content-table-desc-desc'> 
															See the latest<span id='redt' > trends</span>. Discover fashionable <span id='redt' >people</span>, <span id='redt'>brands</span> and <span id='redt'> blogs</span>.
														</span>
				 									</td> 
				 								<tr>
				 									<td id='invite-left-body-content-table-img'  >  
				 										<center> 
				 											<img src='<?php echo "$mc->genImgs/reward-icon.png"; ?>' />
				 										<center> 
				 									</td> 
				 									<td id="invite-left-body-content-table-desc" >
				 										<span id='invite-left-body-content-table-desc-title' > REWARDS </span>  <br>
				 										<span id='invite-left-body-content-table-desc-desc'>   
				 											Get <span id='redt' >featured</span> on our <span id='redt' >popular page</span>  for sharing your ootd. 
				 										</span> 
				 									</td>  
				 							</table>  
				 								<!-- <div id='lineCover1'> 1  </div> -->
				 								<!-- new not in used -->
					 								<center style='display:none' > 
						 							 	<table border="0">  
						 							 		<tr>  
						 							 			<td> <span id='GYTtittle2' > GET YOUR INVITE </span> </td> <tr> 
						 							 			<td> <span id='GYTtittle1' > NOW!</span> </td> <tr>
						 							 			<td> 
						 							 				 <span id='GYTdesc' > 
						 							 				 	Once your request has been recieved and  <br>
						 							 				 	approved you will gain access to the site. To <br>
						 							 				 	learn more about Fashion Sponge visit our  <br>
						 							 				 	about <a href="info?infp=about_us"> <span id='redt' >Info</span> </a> page. Looking to 
						 							 				 	advertise your <br>  services, product or event 
						 							 				 	visit our <a href="info?infp=advertise"> <span id='redt'> advertising </span> </a>  <br>
						 							 				 </span> 
						 							 			</td><tr>
						 							 	</table>
					 							 	</center>
					 							 <!--end not in used -->
				 							 	<!-- <div id='lineCover2'> 2 </div> -->
										</div>
			 						</td>
			 						<td  id='Infofields' >  
			 							<div id='Ifdiv' > 
											<!--  <span id="required_fullname" >required(*) </span> 
			 								<span id="required_email" >required(*) </span> 
											 -->
			 								<form name='form' onSubmit="return invited_info_check();" method="post" action="invite"  >
				 								<table id='invite-right-container-table' border="0" cellpadding="2"  > 
				 									<tr>  
				 										<td>
				 											  <input id='fn'       type='text' name="invited_fn"    value="FIRST NAME & LAST NAME" onblur="fieldChecker('#fn')" >     
				 										</td>  
				 										<td style="display:none" > <input id='ln' type='text' name="invited_ln"    value="LAST NAME ( NULL ) "  > </td> <tr>  
				 										<td>  <input id='email'                   type='text' name="invited_email" value="E-MAIL * "  >       <!-- onclick="alert('Make sure you enter your correct email address to ensure we get your request.')"  --> </td> <tr>  
				 										<td>  <input id='wob'                     type='text' name="invited_wob"   value="WEBSITE OR BLOG"  >  <!--  onclick="alert('Leaving your website, blog or social network domain is another way for us to notify you that your invite has been sent.')" --> </td> <tr>  
				 										<input id="os_input"                      type="text" name="invited_occu"  value="OCCUPATION" />
							 							<input id="ss_input"                      type="text" name="invited_style" value="STYLE" />
				 										
				 										<td style="display:block">  	 
				 											<!-- <div id="bridge_occu"> </div>
				 											<div > </div> -->
				 											<div id='ocpstyle' > 
					 											<table border="0" cellpadding="0"> 
					 												<tr>
							 											<td id="occu_td" > <span id="os" >OCCUPATION </span> </td> <td id="bridge_occu"  > <img id="occupationDD" src="fs_folders/images/body/reg_drop_down.png"></td>
							 											<td id="style_td" > <span id="ss" >STYLE </span> </td> <td id="bridge_style"  >  <img id="styleDD" src="fs_folders/images/body/reg_drop_down.png"> </td>
							 										<tr> 
							 											<td id="DDcontainer_occupation_td"> 	
							 												<div id="DDcontainer_occupation" > 
							 													<span id='title_occu'> YOUR OCCUPATION </span>
								 												<ul id="occupation_res" >
								 													<li onclick="occ_clicked('Accessory Designer')" >Accessory Designer</li>
																					<li onclick="occ_clicked('Art Director')" >Art Director</li>
																					<li onclick="occ_clicked('Blogger')" >Blogger</li>
																					<li onclick="occ_clicked('Boutique / Store Owner')" >Boutique / Store Owner</li>
																					<li onclick="occ_clicked('Brand Manager')" >Brand Manager</li>
																					<li onclick="occ_clicked('Brand Representative')" >Brand Representative</li>
																					<li onclick="occ_clicked('Buyer')" >Buyer</li>
																					<li onclick="occ_clicked('Consultant')" >Consultant</li>
																					<li onclick="occ_clicked('Copywriter')" >Copywriter</li>
																					<li onclick="occ_clicked('Costume Designer')" >Costume Designer</li>
																					<li onclick="occ_clicked('Creative Director')" >Creative Director</li>
																					<li onclick="occ_clicked('Editor')" >Editor</li>
																					<li onclick="occ_clicked('Event Planner')" >Event Planner</li>
																					<li onclick="occ_clicked('Fashion Designer')" >Fashion Designer</li>
																					<li onclick="occ_clicked('Footwear Designer')" >Footwear Designer</li>
																					<li onclick="occ_clicked('Hair Stylist')">Hair Stylist</li>
																					<li onclick="occ_clicked('Illustrator')">Illustrator</li>
																					<li onclick="occ_clicked('Jewelry Designer')">Jewelry Designer</li>
																					<li onclick="occ_clicked('Makeup Artist')">Makeup Artist</li>
																					<li onclick="occ_clicked('Marketer')">Marketer</li>
																					<li onclick="occ_clicked('Model')">Model</li>
																					<li onclick="occ_clicked('Photographer')">Photographer</li>
																					<li onclick="occ_clicked('Personal Assistant')">Personal Assistant</li>
																					<li onclick="occ_clicked('Public Relation Specialist')">Public Relation Specialist</li>
																					<li onclick="occ_clicked('Retail Manager')">Retail Manager</li>
																					<li onclick="occ_clicked('Sales Representative')">Sales Representative</li>
																					<li onclick="occ_clicked('Social Media Marketer')">Social Media Marketer </li>
																					<li onclick="occ_clicked('Tailor')">Tailor</li>
																					<li onclick="occ_clicked('Trend Analyst')">Trend Analyst </li>
																					<li onclick="occ_clicked('Videographer')" >Videographer</li>
																					<li onclick="occ_clicked('Visual Merchandiser ')" >Visual Merchandiser </li>
																					<li onclick="occ_clicked('Wardrobe Stylist')" >Wardrobe Stylist</li>
																					<li onclick="occ_clicked('Writer')" >Writer</li> 
								 												</ul> 
								 											</div>
							 											</td> 
							 											<td id="DDcontainer_style_td"> 
							 												<div id="DDcontainer_style" > 
							 													<span id='title_occu'> YOUR STYLE </span>
								 												<ul  id="style_res" > 
								 													<li onclick="style_clicked('Androgynous')" >Androgynous</li>
																					<li onclick="style_clicked('Bohemian')">Bohemian</li>
																					<li onclick="style_clicked('Chic')" >Chic</li>
																					<li onclick="style_clicked('Casual')" >Casual</li>
																					<li onclick="style_clicked('Electric')" >Electric</li>
																					<li onclick="style_clicked('Goth')" >Goth</li>
																					<li onclick="style_clicked('Grunge')" >Grunge</li>
																					<li onclick="style_clicked('Harajuku')" >Harajuku</li>
																					<li onclick="style_clicked('Menswear')" >Menswear</li>
																					<li onclick="style_clicked('Preppy')" >Preppy</li>
																					<li onclick="style_clicked('Punk')" >Punk</li>
																					<li onclick="style_clicked('Street')">Street</li>
																					<li onclick="style_clicked('Tradition')" >Tradition </li>
																					<li onclick="style_clicked('rban')">Urban</li>
																					<li onclick="style_clicked('Vintage')" >Vintage</li>
								 												</ul> 
								 											</div> 
							 											</td>
					 											</table>
					 										</div> 
					 									</td>  
					 								<tr>  
				 										<td><textarea id='infTA' name="invited_offer">WHAT WOULD YOU LIKE A FASHION COMMUNITY TO OFFER.</textarea> </td> <tr>  
				 										<td id='invite-right-promice-table'> 
					 										<center>
						 										<table cellspacing="0" cellpadding="0" border="0" > 
						 											<tr> 
						 												<td>   
						 													<span id=''>We guarantee 100% privacy. <br> Your information will never be shared. </span> 
						 												</td>
						 												<td width="40px;"> 
						 													<img src='<?php echo "$mc->genImgs/lock.png"; ?>'>
						 												</td>
						 										</table>
						 									</center> 
				 										</td>
				 									<tr>
				 										<td id="submit_td" > 
				 											<input  id="submit_invite" type='submit' name="submit" value='SIGN UP' >
				 											<!-- <img type='submit'  id="submit_invite" src="fs_folders/images/buttons/submit-invite.png" onclick="invited_info_check();" >  -->
				 										</td> 
				 							 	</table>
			 							 	</form>
										</div>
			 						</td>
			 				</table> 
	 				</div>
 				</center> 
 			</div>
 		<div id='reg_footer'> 
 				<?php require("fs_folders/page_footer/footer_php_file/footer1.php") ?>
	 	</div> 
	 	
	 	<!-- end main wrapper -->
  </body>
</html>