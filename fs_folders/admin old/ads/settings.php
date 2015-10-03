 	

 <html> 	
 	<head> 
 		<title> 
 		   	Ads settings 
 		</title>
 		<link rel="stylesheet" type="text/css" href="settings.css">
  	</head>

 	<body> 
 		<div id='container'> 

	 		<div id='header'>  
	 			<?php include("menu.php");   ?>
	 		</div>

	 		<div id='body'>
	 			
	 			<div id='body_container'>  


	 				<div id='body_title'>   
			 			<table> 
			 				<td> 
			 					<span id='titleName' > COMPANY NAME: </span> 
		  		 				<span id='titleDesc'>  Company Name:  </span> 
			 				</td> <tr> 
			 				<td> 
			 					<span id='titleName' > URL: </span> 
		  		 				<span id='titleDesc'>  URL Name:  </span> 
			 				</td> <tr> 
			 				<td> 
			 					<span id='titleName' > UPLOAD MEDIA Name: </span> 
		  		 				<span id='titleDesc'>  what is in here ( Example here ) </span> 
			 				</td> <tr> 
			 			</table>
		 			</div> 
		 			<br>

		 			
			 		<div id='body_content'> 
			 			<!-- new NEW AD -->  
				 			<table id='tnad'>  
				 				<tr> 
				 					<td> 
				 						<span id='title'> New AD </span>

				 					</td><tr>   
				 					<td>  

						 		 		<div id='divright' > 
						 		 			<table border=0 id='tright'> 	
								 			<tr> 
								 			<td> 
								 				<span id='title'> 
											 		AD Preview
												</span>
								 			</td> <tr>
								 			<td> 
								 				<div id='imgprev'> 
								 				 	<img src='../../images/ads/<?php echo $_GET['id'].".".$_GET['ext']; ?>' id='img'/>
								 				</div>
								 			</td> <tr> 
								 			</table>
						 		 		</div>
										<div id='divleft'> 
											<table border=0 id='tleft' > 
								 				<tr> 	
									 				<td> 
									 					<span id='title'> 
													 	 	 Compny name 
														</span>
									 				</td><tr>
									 				<td> 
									 					<span id='title'> 
																 		 
														</span>
									 				</td> <tr>
									 				<td> 
									 					<input type='text' name='cn' placeholder='Company Name'>  
									 				</td> <tr> 
									 				<td>  
									 					<input type='text' name='url' placeholder='URL'>  
									 				</td> <tr> 
									 				<td>  
									 					<input type='text' name='mu' placeholder='Media Upload'>  
									 				</td> <tr> 
									 				<td>  
									 					<textarea id='ta'> 
									 					</textarea>
									 				</td> <tr> 
								 			</table>
						 		 		</div>
						 		 	</td>
						 	</table>
			 			<!-- end NEW AD -->
		 				<!-- new location  -->
		 				 	<br>
			 				<table border=0 id='mloct'>  
			 				 	<tr>
			 				 		<td>  
					 					<span id='title'> 

						 				 	Location 
						 				</span>
					 				</td></tr>
					 				<td>  
						 				<div id='locdiv'> 
						 					<table border=0 cellpadding=5 id='loct'> 
						 						<tr> 
						 						<td> 
						 							<span id='ltext'> 
						 								Country 
						 							</span>		 							
						 						</td>
						 						<td> 
						 							<span id='ltext'> 
						 								State Province
						 							</span>		 							
						 						</td>
						 						<td> 
						 							<span id='ltext'> 
						 								City
						 							</span>		 							
						 						</td>
						 						<td> 
						 							<span id='ltext'> 
						 								 Zip
						 							</span>		 							
						 						</td><tr> 
						 						<td> 
						 							<input type='text' name='mu' >  
						 						</td>
						 						<td> 
						 							<input type='text' name='mu' >  
						 						</td>
						 						<td> 
						 							<input type='text' name='mu' >  
						 						</td>
						 						<td> 
						 							<input type='text' name='mu' >  
						 						</td>
						 					</table>
						 				</div>
					 				</td>
					 		</table>
					 	<!-- end location  -->
					 	<!-- new Demographic  -->
					 		<br>
						 	<div>  

						 		<table id='dmtble' border=0>  
						 			<tr> 
						 				<td> 
						 					<span id='title'> Demographic </span>
						 				</td>
						 				<tr> 
						 				<td id='bordertd'>  
									 	 	<table border=0 id='dmt'> 
										 	 	<tr>
										 	 		<td> 
										 	 			<span id='title'> Age </span>
										 	 		</td>
										 	 		<td> 
										 	 			<span id='title'> Gender </span>
										 	 		</td><tr> 
										 	 		<td> 
										 	 			<select id='slc1' > <?php for ($i=1; $i < 100 ; $i++) {  echo " <option>  $i </option> "; } ?> </select>
										 	 			- 
										 	 			<select id='slc1' > <?php for ($i=1; $i < 100 ; $i++) {  echo " <option>  $i </option> "; } ?> </select>
										 	 		</td> 

										 	 		<td> 
										 	 			 <select id='slc2'> 
										 	 			 	<option> Men </option>
										 	 			 	<option> Women</option>
										 	 			 </select>
										 	 		</td> 
									 	 	</table>
							 	 		</td>
							 	</table>
							</div>
					 	<!-- end Demographic  -->
					 	<!-- new Categories  -->
					 		<div> 
					 			<table border=0 id='ct'> 
 									<td> 
 										 <span id='title'> Categories </span>
 									</td><tr> 
 									<td id='bordertd' > 
 										<table id='cttd'> 
 											<tr>
 												<td> 
 													<table> 
 														<tr> 
 														<td> <input type='checkbox' name='street'> </td> 
 														<td> <span> Street </span> </td>
 													</table>
 												</td>
 												<td> 
 													<table> 
 														<tr> 
 														<td> <input type='checkbox' name='sherkes_hand'> </td> 
 														<td> <span> Sherkes hand </span> </td>
 													</table>
 												</td>
 												<td> 
 													<table> 
 														<tr> 
 														<td> <input type='checkbox' name='Casual'> </td> 
 														<td> <span> Casual </span> </td>
 													</table>
 												</td>
 												<td> 
 													<table> 
 														<tr> 
 														<td> <input type='checkbox' name='Boho'> </td> 
 														<td> <span> Boho </span> </td>
 													</table>
 												</td> <tr>
 												
 												<td> 
 													<table> 
 														<tr> 
 														<td> <input type='checkbox' name='plus_size'> </td> 
 														<td> <span> Plus Size </span> </td>
 													</table>
 												</td>
 												<td> 
 													<table> 
 														<tr> 
 														<td> <input type='checkbox' name='Chic'> </td> 
 														<td> <span> Chic </span> </td>
 													</table>
 												</td>
 												<td> 
 													<table> 
 														<tr> 
 														<td> <input type='checkbox' name='Grenge'> </td> 
 														<td> <span> Grenge </span> </td>
 													</table>
 												</td>
 												<td> 
 													<table> 
 														<tr> 
 														<td> <input type='checkbox' name='Grenge'> </td> 
 														<td> <span> Desyse </span> </td>
 													</table>
 												</td> 
 										</table>
 									</td>  
					 			</table>
					 		</div>
					 	<!-- end Categories  -->
		 			</div>

		 			<div id='body_footer'> 


		 			</div>




		 		</div>

     		</div>

	 		<div id='footer'> 

	 		</div>
 		</div>


 	</body>
 </html> 