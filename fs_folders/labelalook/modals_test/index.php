<!DOCTYPE html>

<html>

	<head>
		
		<title>Modals</title>
		
		<meta name="description" content="Free Web tutorials">
		<meta name="keywords" content="HTML,CSS,XML,JavaScript">
		<meta name="author" content="Ståle Refsnes">
		<meta charset="UTF-8">

		<!-- new fonts  -->
			<link rel="stylesheet" href="meso_style/miso_regular_macroman/stylesheet.css" type="text/css" charset="utf-8" />
			<link rel="stylesheet" href="meso_style/miso_bold_macroman/stylesheet.css" type="text/css" charset="utf-8" />
			<link rel="stylesheet" href="meso_style/miso_light_macroman/stylesheet.css" type="text/css" charset="utf-8" />
		<!-- end fonts -->

		<!-- new style sheets -->
			<link rel="stylesheet" type="text/css" href="meso_style/modal.css" >
		<!-- end style sheets -->

		<!-- new script -->

		<!-- end script -->

		<?php 
			$pic = 1;
		?>	


	</head>
 
	<body>
 		<div id='wrapper' > 
	 		<div id='container' >  
	 			<div id='leftPhoto' > 	
		 			<table border=0 cellpadding="1" id='main_left_t'> 
		 				<tr> 
			 				<td  id='duplicate_left'  > 
			 					<table border=1> 
			 					<!-- <tr> -->
			 						<!-- <td> <span id='title' > LOOK MODAL </span> </td> <tr>  -->

			 						<!-- <td>  -->
			 							<!-- <table>  -->
			 							<!-- <tr>  -->
			 								<!-- <td>  -->
			 									<!-- <div id='profilePic'>  -->
							 						<!-- <img src="images/profile.jpg" > -->
							 					<!-- </div> -->
			 								<!-- </td>  -->
			 							 	<!-- <td>  -->
			 							 		<!-- <div id='profileInfo'>  -->
								 					<!-- <span> My name is jesus erwin suarez the most handsome of the world.  </span> -->
								 				<!-- </div> -->
			 							 	<!-- </td> -->
						 				<!-- </table> -->
			 						<!-- </td>  -->
			 					<!-- <tr> 
			 						<td id='hiden'> </td> 
			 					<tr>
 -->
			 						<td>
			 							<div> 
			 								<img  id='img_look' src="images/<?php echo $pic; ?>.jpg" width="" height="" >  
			 							</div> 
			 							
			 							<div id='lms_container'> 
			 								<div id='look_midle_start'> 
			 									* * * * * 
			 								</div>
			 							</div>
			 							

			 							<div id='lfi_container' > 
			 								
			 								<div id='look_footer_info'> 	 								 
				 							</div>

				 							<div id='lfi_attr'>
				 								<table border=0 cellspacing="0" cellpadding="2" > 
					 							<tr> 
					 								<td> <img id='img_percentage' src="images/attr/percentage.jpg">  </td>
					 								<td> 
					 								<span> 100% </span> 
					 								</td>
					 								<td> rate(999999+) </td>
					 							<tr> 
					 							</table>
				 							</div>		

			 							</div>
			 							
			 						</td> <tr> 
			 					</table>
		 					</td>



			 				<td id='duplicate_right' > 
			 					<table border=1> 
				 					<!-- <tr> -->
				 						<!-- <td> <span id='title' > LOOK MODAL(mouseover) </span> </td> <tr>  -->

				 						<!-- <td>  -->
				 							<!-- <table>  -->
				 							<!-- <tr>  -->
				 								<!-- <td>  -->
				 									<!-- <div id='profilePic'>  -->
								 						<!-- <img src="images/profile.jpg" > -->
								 					<!-- </div> -->
				 								<!-- </td>  -->
				 							 	<!-- <td>  -->
				 							 		<!-- <div id='profileInfo'>  -->
									 					<!-- <span>My name is jesus erwin suarez the most handsome of the world. </span> -->
									 				<!-- </div> -->
				 							 	<!-- </td> -->
							 				<!-- </table> -->
				 						<!-- </td>  -->
				 					<!-- <tr> 
				 						<td id='hiden'> </td> 
				 					<tr> -->

				 						<td>
				 							<div> 
				 								<img id='img_look' src="images/<?php echo $pic; ?>.jpg" width="" height=""  >  
				 							</div> 
				 							
				 							<div id='look_bg_hovered' > 
				 							<span>
				 								content here!
				 							</span>
				 							

				 							</div>

				 						</td> <tr> 
			 					</table>
			 				</td>
		 			</table>
	 			</div>
 
	</body>

</html>