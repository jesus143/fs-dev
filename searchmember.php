<!DOCTYPE html>
<html>
	<head>
		<title>Look Details</title>
		<!-- new fonts -->
			<link rel="stylesheet" type="text/css" href="home/home_css/miso_bold_macroman/stylesheet.css">
		    <link rel="stylesheet" type="text/css" href="home/home_css/miso_light_macroman/stylesheet.css">
			<link rel="stylesheet" type="text/css" href="home/home_css/miso_regular_macroman/stylesheet.css">
		<!-- end fonts -->



		<!-- new outsite -->
			<link rel="stylesheet" type="text/css" href="home/home_css/home.css">
		<!-- end outsite -->


		<!-- new header  -->
			<link rel="stylesheet" type="text/css" href="page_header/css/header1.css">
			<link rel="stylesheet" type="text/css" href="page_footer/css/footer.css">
		<!-- end header  -->

		<!-- new local css -->
			<link rel="stylesheet" type="text/css" href='lookdetails/lookdetails_style/lookdetails.css'>
		<!-- end local css -->

		<!-- new script -->

			<script type="text/javascript" src='js/jquery-1.7.1.min.js'> </script>
			<script type="text/javascript" src='js/function_js.js'></script>

			<script type="text/javascript" src='lookdetails/lookdetails_js/lookdetails_ajax.js'></script>
			<script type="text/javascript" src='lookdetails/lookdetails_js/lookdetails_query.js'></script>

		<!-- end <span></span>cript -->
	</head>
	<body>
		<div id='res' style="position:fixed"> res </div>

		<div id='header_wrapper1'> 
		</div>
 		<div id='lookdetails_wrapper' > 
 			<div id='lookdetails_header'>  
 				<?php require("page_header/header1.php"); ?>
 			</div>
	 		<div id='lookdetails_body_container'> 
				<table id='lbc_main_table' border="0" > 
					<tr>  	
						<td id='lbc_ads_banner' > 	
							<table border="0" cellpadding="0" cellspacing="0"> 	
								<tr>  
									<td>
										<span id='feed'> 
											ADVERTISEMENT
										</span> 
									</td>
								<tr> 
									<td> 
										<img src="images/header/banner.jpg" title="big banner">
									</td>
								<tr> 
									<td id='next_prev_td'> 
										<span id='return_to_feed' title='return to feed' > < < RETURN TO FEED </span>
										<span id='next_prev' > 
											<span id='prev' title='previous' > 
												PREVIOUS  
											</span>
											<span id='next' title='next' > 
												NEXT 
											</span>
										</span>

									</td>
								<tr>  
									<td> 
										<hr id='next_hr'> 
									</td>
								<tr>  
									<td id='look_title' > 
										<span> 
											CURABITUR BLANDIT TEMPUS PORTTITOR.
											NULLA VITAELIBERO , A PHARETRA
										</span>
									</td>
							</table>
						</td>
					<tr>  
						<td id='lbc_look_view' > 
							<table id='lbc_look_view_tc' border="0" cellpadding="0" cellspacing="0" > 
								<tr>  
									<td id='look_view_header'> 
										look view header 
									</td>
								<tr>  
									<td id='look_view_img_td'>  
										<center> 
											<img id='look_view_img' src="images/posted look/3.jpg">
										</center>
									</td>
								<tr>  
									<td id='lf_img_view_td'>

									 	<div id='lf_div_container'> 
									 		<table id='lfdc_t1' border="0" cellpadding="0" cellspacing="0"> 
									 			<tr>  
									 				<td id='percentage'> 
									 					<span title='percentage' >100%</span> 
									 				</td>
									 				<td id='ldmtd'>  
															<img id='ldmsc' src="images/attr/ld_message_c.png" title="message container" >  
									 					<img id='ldms' src="images/attr/ld_5stars.png" title="start">  
									 				</td>
									 				<td id='ld_eyes' >  
										 				<img src="images/attr/ld_eyes.png" title="eyes ni sya" >
										 				<span id='ttext' > 9999+ </span>
									 				</td>
									 				<td id='total_arrow' > 
									 					<img src="images/attr/total_arrow.png" title="square arrow">
									 					<span id='ttext' > 9999+</span>
									 				</td>
									 				<td id='total_heart' > 
														<img src="images/attr/total_heart.png" title="temp heart">
									 					<span id='ttext' > 9999+</span>
									 				</td>
									 				<td id='ld_star_with_cross'  > 
									 					<img src="images/attr/ld_star_with_cross.png" title="star with cross" >
									 				</td>
									 				<td id='ld_scope' >
									 					<img src="images/attr/ld_scope.png" title="scope" >
									 				</td>
									 				<td id='ld_negative'  > 
									 					<img src="images/attr/ld_negative.png"  title="circle with negative" >
									 				</td>
									 				<td id='ld_square_with_arrow'  > 
									 					<img src="images/attr/ld_square_with_arrow.png" title=" square with arrow" >
									 				</td>
									 				<td id='ld_pencil'  > 
									 					<img src="images/attr/ld_pencil.png"  title="pencil" >
									 				</td>
									 		</table>
									 	</div>
									 	<table id='tag_colors' border="0" cellspacing="0"> 
									 		<tr>  
									 		<?php  
									 			$tag_total = 5;
									 			$tag_colors = array('#b7253a','#f2822e','#f3c97c','#6d7a4f','#9e9a5a');
													for ($i=0; $i < $tag_total; $i++) { 
 													$tc = $tag_colors[$i]; 

 													if ( $i == 0 ) 
 													{
 														 $tagcolors_style = "background-color:$tc; border-radius:0 0 0 5px;";
 													}
 													else if ( $i == $tag_total-1) 
 													{ 
 														$tagcolors_style = "background-color:$tc;  border-radius:0 0 5px 0;";
 													}
 													else 
 													{ 
 														$tagcolors_style = "background-color:$tc";
 													}  																									?>
												 	 		 <td id='tag_colors_td' style='<?php echo $tagcolors_style; ?>' >  </td><?php 
									 		 	} 
									 		 	?>
									 	</table> 
									</td>
							</table>
							<!-- look big view  -->
							<div id='square_with_arrow_clicked_cotainer' > 
								<center>
									<img id='ld_arrow_up' src="images/attr/ld_arrow_up.png" title="temp heat">
								</center>
								<div> 	
									<table border="0" cellpadding="0" cellspacing="0"  > 
										<tr>  
											<td><img src="images/attr/ld_white_fb.png"    title="facebook" ></td>
											<td><img src="images/attr/ld_white_tw.png"    title="twitter" ></td>
											<td><img src="images/attr/ld_white_t.png"     title="tumblr" ></td>
											<td><img src="images/attr/ld_white_q.png"     title="q" ></td>
											<td><img src="images/attr/ld_white_g+.png"    title="google" ></td>
											<td><img src="images/attr/ld_white_line.png"  title="line" ></td>
											<td><img src="images/attr/ld_white_mail.png"  title="mail" ></td>
									</table>
								</div>
							</div>
							<br>  
						</td>
					<tr>  
						<td id='lbc_small_ads' > 
							<table id='ads_main_table' border="0" cellpadding="0" cellspacing="0"> 
								<tr>  
									<td id='ld_small_ads'> 

										<div id='look_smallads_display' > 
											<span id='recommended_c'>	<span  id='recomended_more_by_t'>	MORE BY </span>  <span id='recomended_name_t' > MARY LAVENDER EINSTEIN III</span>  <span id='recomended_bar_t' >  | </span> <span id='recomended_all_t' title='show all >>' > ALL>> </span></span>
											<table id='recomended_lookt' border="0" cellpadding="0" cellspacing="0" > 
												<tr>  
												<?php 
												$c = 0; 
												$img_style_a = array('portrate','landscape','landscape','portrate','landscape','landscape');
												for ($i=0; $i < 6  ; $i++) 
												{ 
													$img_pos = $img_style_a[$i];
													$c++;
													if ( $img_pos == 'landscape' ) 
													{?>
														<td> 
															<img id='landscape' src="images/posted look thumb nail/<?php echo $c; ?>.jpg">
														</td>
												<?php 
													}
													else 
													{?>
														<td> 
															<img id='portrate' src="images/posted look thumb nail/<?php echo $c; ?>.jpg">
														</td>
												<?php 
													}
													if ( $c%3==0) 
													{
														echo "<tr>";
													}
												} 

												?>
											</table>
										</div>
										<div id='look_desc_display'  > 
											<span> 
												Look Good Feel Better is a non-medical, brand-neutral public service program that teaches beauty techniques to cancer patients to help them manage the appearance-related side effects of cancer treatment.
									 			group programs are open  cer who are undergoing chemotherapy, radiation, or other forms of treatment. In the United States alone, more than 850,000 women have participated in the program, which now offers 15,400 group workshops nationwide in more than 2,500 locations.
											</span>
										</div>	
										<div  id='look_tags_display' > 
											<table border="0"> 
											<tr>  
												<td id='tag_pattern_td' > 
													<table cellspacing="0" cellpadding="0"> 
														<tr>  	
															<td> <span> TAGS</span> </td>
															<td><img id='' src="images/attr/ld_tag_pattern.jpg" ></td>
													</table>
													
												</td>
											<tr>  
												<td> 
													<?php 
													$c=0;
													for ($i=0; $i < $tag_total; $i++) 
													{  
													 	$c++;
														echo "
															<div id='ltag_display'  > 
															 <span id='lnum'> $c </span> <span id='ltitle' >   #PARADISEROADTRIP #BUTTONUP </span> <br>
															 
																<span id='llink' > www.urbanoutfitters.com </span> <br>
																<span id='lhashtag' > #green #cotton #floral #100 </span> <br>
															</div> 
													 	";
													} 
													?>
												</td>
											</table>
										</div>			
														
									</td>
								<tr>  
									<td id='ld_big_ads'> 
										<span id='feed' style=' margin-left: 192px;' > 
											ADVERTISEMENT
										</span>  
										<table border="0"> 
											<tr>  
												<td> 
													<img src="images/ads/1.jpg">
												</td>
												<td> 
													<img src="images/ads/2.jpg">
												</td>
												<td> 
													<img src="images/ads/3.jpg">
												</td>
											<tr>  
												<td> 
													<img src="images/ads/2.jpg">
												</td>
												<td> 
													<img src="images/ads/3.jpg">
												</td>
										</table>
										
										
									</td>
							</table>
						</td>
					<tr>  
						<td id='lbc_comments' > 

							<span id='feed'>  FEEDBACK </span>
							<table id='look_comment_t1' border="0" cellpadding="0" cellspacing="0"> 
								<tr>  
									<td id='header_comment_c_td'>
										 
										<table id='comment_love_drip_t' cellspacing="0"  cellpadding="0" > 
											<tr> 
												<td  id='comment_tabs' > 
													<span title='comments' >( 23 ) COMMENTS</span> 
													<hr id='comment_tabs_hr1' >
												</td>
											 
												<td  id='love_tabs' >
													<span title='loves' >( 23 ) LOVES</span> 
													<hr id='love_tabs_hr1' >
												</td>
											 
												<td  id='drip_tabs' >
													<span title='drips' >( 234 ) DRIPS</span>	
													<hr id='drip_tabs_hr1' >
												</td>
										</table>
									 



										<span id='higest_rate'> 
											<span id='red_bold' title='prev comment' ><</span> 
											<?php 
												$c=0;
												$tcomment_page = 6; 
												for ($i=0; $i < $tcomment_page; $i++) 
												{ 
													$c++;
													echo " <span id='c_pages'> $c </span>";	
												}

											?>
											<span id='red_bold' title='next comment' >></span> 


											| HIGHEST RATED  
										</span>
									</td>
								<tr>  
									<td id='comment_header_line'> 
										<hr> 
									</td>
								 
								<tr>  
									<td> comment body </td>
								<tr>  
									<td> comment post </td>
							</table>

				 	<br> <br> <br> <br> <br> 
						</td>
					<tr> 
						<td id='lbc_footer'> 
							<?php  require ("page_footer/footer.php") ?> 
						</td>
				</table>		 		 	
			</div>	
	 	</div>  <!-- end main wrapper -->
	</body>
</html>