 <?php 
  

 
 	$fs_home_tab = basename($_SERVER["PHP_SELF"]); 
 	$fs_home_tab = str_replace(".php","",$fs_home_tab);  
 	if ($fs_home_tab == "index") { $fs_home_tab = "latest"; }
 	// echo " fs tab = $fs_home_tab <br>"; 
 	$mc->get_visitor_info( "" , "home tab: $fs_home_tab " , "home" );  
	if ( $fs_home_tab == "index" )   { $clock_style = "display:none" ;   } else  { $clock_style = "display:none" ;  }   
 
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>		  

			<!-- inner script -->
				<script type="text/javascript"> //document.location ='signup'; </script>  

 			<?php    
 			// echo strlen("FASHION SPONGE IS THE EASIEST AND FASTEST WAY TO...  Show your OOTD, see the latest fashion trends, discover new fashion blogs, get beauty and style tips");
 			$mc->header_attribute( );    
 			?>   
 		<!-- new home -->
			<link rel="stylesheet" type="text/css" href="fs_folders/index_home/home_css/home.css">
			<link rel="stylesheet" type="text/css" href="fs_folders/modals/latest_modals/modal.css" >
			<script type="text/javascript" src='fs_folders/index_home/home_js/home_ajax.js'> </script>
			<script type="text/javascript" src='fs_folders/index_home/home_js/home_query.js'> </script> 
		<!-- end home -->


		<!-- new look -->
			<script type="text/javascript" src='fs_folders/look/look_js/lookajax.js' ></script>
			<script type="text/javascript" src='fs_folders/look/look_js/lookjquery.js' ></script>
		<!-- end look  -->  


	</head>  
	<body onload="admin( 'admin-modal' )"  >  
 		<div id='main_wrapper' > 
 			<div id='wrapper_head'> 
 			</div>
	 		<div id='main_container' > 
	 			<!--  new header  -->  
	 			<!-- end header -->  
		 		<div id='body_wrapper'>  
		 			<div id='body_container'> 
	 					<table border="0" id='bct1' >   
				 			<tr> 
				 				<td id='bct1_td1' >   
					 				<div id='body_menu'> 
					 					<div id='clock_sh'> 
					 					</div>   
					 					<table id='clock' border="0"  style="<?php echo "$clock_style"; ?>"  >   
					 						<tr>  
					 							<td id='clock_img_td'> 
					 							<!-- 	<center>  --><img id='clockimg' src="fs_folders/images/body/feed/clock.png" > <!-- </center>  -->
					 							</td>
					 						<tr>  
					 							<td id='clock_drop_td' style="display:none" >
					 								<div id='bmccb' > 
					 								</div>
					 								<div id='bmcc' > 
						 								<center>
						 									<!-- <img id='arrow_upb1' src="fs_folders/index_home/home_img/arrow_up.png">	 -->
						 								</center>
						 								<table id='bmct1' border="0" cellpadding="0" cellspacing="0" > 
						 									<tr> 
						 										<td id='bmcttd1_0'> <img src="fs_folders/images/body/feed/check.png" >  </td> <td id='bmcttd1_1' > <span id="bmct1"> TODAY </span> </td> 
						 									<tr>
						 										<td id='bmcttd2_0'> <img src="fs_folders/images/body/feed/check.png" >  </td> <td id='bmcttd2_1' > <span id="bmct2"> THIS WEEK </span> </td> 
						 									<tr>
						 										<td id='bmcttd3_0'> <img src="fs_folders/images/body/feed/check.png" > </td> <td id='bmcttd3_1' >  <span id="bmct3"> THIS MONTH </span> </td> 
						 									<tr> 
						 										<td id='bmcttd4_0'> <img src="fs_folders/images/body/feed/check.png" > </td> <td id='bmcttd4_1' >  <span id="bmct4"> THIS YEAR </span> </td> 
						 									<tr> 
						 										<td id='bmcttd5_0'> <img src="fs_folders/images/body/feed/check.png" > </td> <td id='bmcttd5_1' >  <span id="bmct5"> ALL TIMES</span> </td> 
						 								</table>
					 								</div>
					 							</td>
					 					</table>  
					 					<table id='bmt1'  border="0" style="display:none" >  
						 					<tr>
						 						<td>
						 							 <span  id='feed'> FEED </span> 
						 							<table border="0" id='bmt11' cellpadding="0" cellspacing="0" >   
						 								<tr>			
						 									<td> 
						 										<span id='bm1' class='latest' > LATEST </span> 
						 										 <div id='home_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div> 
						 									</td>
															<td> 
						 										<span id='bm4' class='plook' > POPULAR LOOKS </span> 
																<div id='look_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div>
						 									</td>
						 									<td> 
						 										<span id='bm3' class='pmember' > POPULAR MEMBERS </span> 
																<div id='member_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div>
						 									</td>
						 									<td> 
						 										<span id='bm2' class='pblog'  > POPULAR ARTICLE </span> 
																 <div id='blog_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div> 
						 									</td>
						 									<td> 
						 										<span id='bm5' class='pphoto' > POPULAR MEDIA </span> 
																<div id='photo_tabs_change_loader'> <img src="fs_folders/images/attr/loading 2.gif"> </div>
						 									</td>
						 								<tr>
							 								<td> <hr id='bmhr1'> <hr id='bmhr1_selected'> </td>
							 								<td> <hr id='bmhr4'> <hr id='bmhr4_selected'> </td>
							 								<td> <hr id='bmhr3'> <hr id='bmhr3_selected'> </td>
							 								<td> <hr id='bmhr2'> <hr id='bmhr2_selected'> </td>
							 								<td> <hr id='bmhr5'> <hr id='bmhr5_selected'> </td>
						 							</table>
						 							<hr id='bmhr6'>
						 						</td>
						 					<tr>
					 					</table>
					 				</div> 	<!-- end body menu  -->
								</td>
							<tr> 
								<td  style='display:none' id="ads-banner" >
									<center>   
										<div style="margin-top:5px;margin-bottom:5px; margin-left:14px;" >
									 		<a href="r?loc=http://theschoolofstyle com/" target="_blank" >
									 			<img src="fs_folders/images/banner/new-sos-banner1.png" style="cursor:pointer;border:1px solid none;" />  
									 		</a> 
										</div> 
						 			</center>  
					 			</td>
				 			<tr>
								<td>   
							 		<div id='body_content'>   
							 			<div id="res" style="display:none" > home_res </div>
							 			<div id='imgres' style='visibility: visible;display:none'  >  res </div>   
							 				<?php      
							 					echo " 
									 			<div id='res_container'>  
									 				<li id='li_res1'> 
						 								<div id='home_res1' >  
						 								 	this is the result 1
						 								</div>
						 							</li> 
						 							<li  id='li_res2' >      
						 								<div id='home_res2' >    
						 									this is the result 2
						 								</div>
						 							</li>
						 							<li id='li_res3'> 
						 							 	<div id='home_res3' >   
						 							 		this is the result 3
						 								</div>
						 							</li>				 			 					 
					 							</div>";
				 							?>
							 		</div>	<!-- end body content --> 
							 		 
					 			</td>
					 		<tr>
					 			<td id='moretd'> 
					 				<!-- <input  id='more' type='button' value='more' />  -->
					 				<center> 
					 				<div id='more_loading' >
					 				 	<img src="fs_folders/images/attr/loading 2.gif"  style="visibility:hidden;height:10px;"  > 
					 				 </div>
					 				 </center>   
					 				<img id='more' style="margin-left:3px;"  src="fs_folders/images/genImg/home-more-button.png" onclick="admin( 'admin-modal' )					 					onmousemove=" mousein_change_button ( '#more' , 'fs_folders/images/genImg/home-red-mouse-over.png' )" 
					 					onmouseout="mouseout_change_button (  '#more'  , 'fs_folders/images/genImg/home-more-button.png' ) "  
					 				/>  
					 			</td> 
			 			</table>
		 			</div>
		 		</div> <!-- end body wrapper --> 
		 		<div id="footer"> 
		 			   <div id="footer_res" style="display:none" > footer res  </div> 
					<!-- <link rel="stylesheet" type="text/css" href="fs_folders/page_footer/css/footer1.css" >  --> 
		 			<?php 
		 				$mc->fs_footer(  'width:1010px !important;' , 'margin-left:-13px;' );  
		 			?>
		 		</div>
	 		</div> <!-- end main container -->
	 	</div>  <!-- end main wrapper -->
	 	<?php 
	 		$mc->invite_hellobar( $mno );  
	 	?> 
	</body>
</html> 