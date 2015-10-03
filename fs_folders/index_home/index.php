<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<!-- new fonts -->
			<link rel="stylesheet" type="text/css" href="home_css/miso_bold_macroman/stylesheet.css">
		    <link rel="stylesheet" type="text/css" href="home_css/miso_light_macroman/stylesheet.css">
			<link rel="stylesheet" type="text/css" href="home_css/miso_regular_macroman/stylesheet.css">
		<!-- end fonts -->

		<!-- new header  -->
			<link rel="stylesheet" type="text/css" href="../page_header/css/header.css">
		<!-- end header  -->

		<link rel="stylesheet" type="text/css" href="home_css/home.css">
		<link rel="stylesheet" type="text/css" href="home_data/modals/meso_style/modal.css" >



		<script type="text/javascript" src='../js/jquery-1.7.1.min.js'> </script>
		<script type="text/javascript" src='../js/function_js.js'></script>
		<script type="text/javascript" src='home_js/home_ajax.js'> </script>
		<script type="text/javascript" src='home_js/home_query.js'> </script>
	</head>
	<body>

 		<div id='main_wrapper' > 

 			<div id='wrapper_head'> </div>
	 		<div id='main_container' > 
	 			<!--  new header  -->
	 				<?php require("../page_header/header.php"); ?>
	 			<!-- end header -->
		 		<div id='body_wrapper'> 
		 			<div id='body_container'> 
	 					<table border="0" id='bct1' >   
				 			<tr> 
				 				<td id='bct1_td1' >   
					 				<div id='body_menu'> 
					 					<div id='clock_sh'> 
					 					</div>
					 					<table id='clock' border=0>   
					 						<tr>  
					 							<td id='clock_img_td'> 
					 								<center> <img id='clockimg' src="home_img/clock.png"> </center> 
					 							</td>
					 						<tr>  
					 							<td id='clock_drop_td' style="display:none" >
					 								<div id='bmccb' > 
					 								</div>
					 								<div id='bmcc' > 
						 								<center>
						 									<img id='arrow_upb1' src="home_img/arrow_up.png">	
						 								</center>
						 								<table id='bmct1' border=0  cellpadding="2"> 
						 									<tr> 
						 										<td id='bmcttd1_0'> <img src="home_img/check.png" >  </td> <td id='bmcttd1_1' > <span id="bmct1"> TODAY </span> </td> 
						 									<tr>
						 										<td id='bmcttd2_0'> <img src="home_img/check.png" >  </td> <td id='bmcttd2_1' > <span id="bmct2"> THIS WEEK </span> </td> 
						 									<tr>
						 										<td id='bmcttd3_0'> <img src="home_img/check.png" > </td> <td id='bmcttd3_1' >  <span id="bmct3"> THIS MONTH </span> </td> 
						 									<tr> 
						 										<td id='bmcttd4_0'> <img src="home_img/check.png" > </td> <td id='bmcttd4_1' >  <span id="bmct4"> THIS YEAR </span> </td> 
						 									<tr> 
						 										<td id='bmcttd5_0'> <img src="home_img/check.png" > </td> <td id='bmcttd5_1' >  <span id="bmct5"> ALL TIMES</span> </td> 
						 								</table>
					 								</div>
					 							</td>
					 					</table>
					 					<table id='bmt1' border="0"> 
						 					<tr>
						 						<td>
						 							 <span  id='feed'> FEED </span> 
						 							<table border="0" id='bmt11' cellpadding="0" cellspacing="0" >   
						 								<tr>
						 									
						 									
						 									<td> 
						 										<span id='bm1' class='latest' >  LATEST        </span> 
						 										 <div id='home_tabs_change_loader'> <img src="../images/attr/loading 2.GIF"> </div> 
						 									</td>
						 									<td> 
						 										<span id='bm2' class='pblog'  >  POPULAR BLOGS     </span> 
																 <div id='blog_tabs_change_loader'> <img src="../images/attr/loading 2.GIF"> </div> 
						 									</td>
						 									<td> 
						 										<span id='bm3' class='pmember' >  POPULAR MEMBERS   </span> 
																<div id='member_tabs_change_loader'> <img src="../images/attr/loading 2.GIF"> </div>
						 									</td>
						 									<td> 
						 										<span id='bm4' class='plook' >  POPULAR LOOKS     </span> 
																<div id='look_tabs_change_loader'> <img src="../images/attr/loading 2.GIF"> </div>
						 									</td>
						 									<td> 
						 										<span id='bm5' class='pphoto' >  POPULAR PHOTOS     </span> 
																<div id='photo_tabs_change_loader'> <img src="../images/attr/loading 2.GIF"> </div>
						 									</td>
						 								<tr>
							 								<td> <hr id='bmhr1'> <hr id='bmhr1_selected'> </td>
							 								<td> <hr id='bmhr2'> <hr id='bmhr2_selected'> </td>
							 								<td> <hr id='bmhr3'> <hr id='bmhr3_selected'> </td>
							 								<td> <hr id='bmhr4'> <hr id='bmhr4_selected'> </td>
							 								<td> <hr id='bmhr5'> <hr id='bmhr5_selected'> </td>
						 							</table>
						 							<hr id='bmhr6'>
						 						</td>
						 					<tr>
						 			 
					 					</table>
					 				</div> 	<!-- end body menu  -->
								</td>
							<tr> 
								<td  style='display:none' > 
					 				<div id='body_banner'> 
					 					<table border="0" cellpadding="0" cellspacing="0"> 
						 					<tr> 
						 						<!-- <td> <span>ADVERTISEMENT</span> </td>  -->
						 					<tr>
						 						<td> <center> <img src="home_img/banner.jpg" > </center> </td>
					 					</table>
						 			</div>  <!-- end body banner -->
					 			</td>
				 			<tr>
								<td>   
							 		<div id='body_content'>  
							 			<div id='imgres' style='visibility: hidden;'  >  res </div>
							 			<center>
								 			<div id='res_container'> 
								 				<li>
					 								<div id='home_res1' > 
					 									<!-- res1 -->
					 								</div>
				 								</li>
		 										<li>		 
					 								<div id='home_res2' > 
					 									<!-- res2 -->
					 								</div>
				 								</li>
		 											<li>
					 								<div id='home_res3' > 
					 									<!-- res3  -->
					 								</div>
				 								</li>
				 							</div>
			 							</center>
							 		</div>	<!-- end body content -->
					 			</td>
					 		<tr>
					 			<td id='moretd'> 
					 				<!-- <input  id='more' type='button' value='more' />  -->
					 				 <center> <div id='more_loading' > <img src="../images/attr/loading 2.GIF"> </div></center>
					 				<input  id='more' type='image' src='../images/attr/more.png' onclick='more_click () ' >

					 			</td>
				 			<tr> 
				 				<td id='footer_td'> 
 									<!-- new footer  -->
 										<?php require("footer.php"); ?>
 									<!-- end footer  -->
				 				</td>
				 			<tr> 
			 			</table>

		 			</div>
		 		</div> <!-- end body wrapper -->
	 		</div> <!-- end main container -->
	 	</div>  <!-- end main wrapper -->
	 	 
	</body>
</html>