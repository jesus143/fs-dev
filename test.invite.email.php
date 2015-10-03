
	<?php 
		$to = 'brainoffashion@fashionsponge.com';   		 
		$body =  " 
					<html xmlns='http://www.w3.org/1999/xhtml'>
					 <head> 
										<!-- If you delete this tag, the sky will fall on your head -->
										<meta name='viewport' content='width=device-width, initial scale=1.0'> 
										<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>   

										
									</head>
									 
									<body bgcolor='#FFFFFF'>

									<!-- HEADER -->
									<!-- /HEADER -->

									<style type='text/css'> 
											/* ------------------------------------- 
													GLOBAL 
											------------------------------------- */
											* { 
												margin:0;
												padding:0;
											}
											* { font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; }

											img { 
												max-width: 100%; 
											}
											.collapse {
												margin:0;
												padding:0;
											}
											body {
												-webkit-font-smoothing:antialiased; 
												-webkit-text-size-adjust:none; 
												width: 100%!important; 
												height: 100%;
											}


											/* ------------------------------------- 
													ELEMENTS 
											------------------------------------- */
											a { color: #2BA6CB;}

											.btn {
												text-decoration:none;
												color: #FFF;
												background-color: #666;
												padding:10px 16px;
												font-weight:bold;
												margin-right:10px;
												text-align:center;
												cursor:pointer;
												display: inline-block;
											}

											p.callout {
												padding:15px;
												background-color:#ECF8FF;
												margin-bottom: 15px;
											}
											.callout a {
												font-weight:bold;
												color: #2BA6CB;
											}

											table.social {
											/* 	padding:15px; */
												background-color: #ebebeb;
												
											}
											.social .soc-btn {
												padding: 3px 7px;
												font-size:12px;
												margin-bottom:10px;
												text-decoration:none;
												color: #FFF;font-weight:bold;
												display:block;
												text-align:center;
											}
											a.fb { background-color: #3B5998!important; }
											a.tw { background-color: #1daced!important; }
											a.gp { background-color: #DB4A39!important; }
											a.ms { background-color: #000!important; }

											.sidebar .soc-btn { 
												display:block;
												width:100%;
											}

											/* ------------------------------------- 
													HEADER 
											------------------------------------- */
											table.head-wrap { width: 100%;}

											.header.container table td.logo { padding: 15px; }
											.header.container table td.label { padding: 15px; padding-left:0px;}


											/* ------------------------------------- 
													BODY 
											------------------------------------- */
											table.body-wrap { width: 100%;}


											/* ------------------------------------- 
													FOOTER 
											------------------------------------- */
											table.footer-wrap { width: 100%;	clear:both!important;
											}
											.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
											.footer-wrap .container td.content p {
												font-size:10px;
												font-weight: bold;
												
											}


											/* ------------------------------------- 
													TYPOGRAPHY 
											------------------------------------- */
											h1,h2,h3,h4,h5,h6 {
											font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
											}
											h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

											h1 { font-weight:200; font-size: 44px;}
											h2 { font-weight:200; font-size: 37px;}
											h3 { font-weight:500; font-size: 27px;}
											h4 { font-weight:500; font-size: 23px;}
											h5 { font-weight:900; font-size: 17px;}
											h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

											.collapse { margin:0!important;}

											p, ul { 
												margin-bottom: 10px; 
												font-weight: normal; 
												font-size:14px; 
												line-height:1.6;
											}
											p.lead { font-size:17px; padding-top: 15px;text-align: left;color: #000000;}
											p.last { margin-bottom:0px;}

											ul li {
												margin-left:5px;
												list-style-position: inside;
											}

											/* ------------------------------------- 
													SIDEBAR 
											------------------------------------- */
											ul.sidebar {
												background:#ebebeb;
												display:block;
												list-style-type: none;
											}
											ul.sidebar li { display: block; margin:0;}
											ul.sidebar li a {
												text-decoration:none;
												color: #666;
												padding:10px 16px;
											/* 	font-weight:bold; */
												margin-right:10px;
											/* 	text-align:center; */
												cursor:pointer;
												border-bottom: 1px solid #777777;
												border-top: 1px solid #FFFFFF;
												display:block;
												margin:0;
											}
											ul.sidebar li a.last { border-bottom-width:0px;}
											ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}



											/* --------------------------------------------------- 
													RESPONSIVENESS
													Nuke it from orbit. It's the only way to be sure. 
											------------------------------------------------------ */

											/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
											.container {
												display:block!important;
												max-width:600px!important;
												margin:0 auto!important; /* makes it centered */
												clear:both!important;
											}

											/* This should also be a block element, so that it will fill 100% of the .container */
											.content {
												padding:15px;
												max-width:600px;
												margin:0 auto;
												display:block; 
											}

											/* Let's make sure tables in the content area are 100% wide */
											.content table { width: 100%; }


											/* Odds and ends */
											.column {
												width: 300px;
												float:left;
											}
											.column tr td { padding: 15px; }
											.column-wrap { 
												padding:0!important; 
												margin:0 auto; 
												max-width:600px!important;
											}
											.column table { width:100%;}
											.social .column {
												width: 280px;
												min-width: 279px;
												float:left;
											}

											/* Be sure to place a .clear element after each set of columns, just to be safe */
											.clear { display: block; clear: both; }


											/* ------------------------------------------- 
													PHONE
													For clients that support media queries.
													Nothing fancy. 
											-------------------------------------------- */
											@media only screen and (max-width: 600px) {
												
												a[class='btn'] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

												div[class='column'] { width: auto!important; float:none!important;}
												
												table.social div[class='column'] {
													width:auto!important;
												}
											}

											.header-1 { 
											/* border:1px solid red; */
												text-align:center;
											} 
											.header-1 div  { 
												margin:auto; 
											} 
											.text-1 { 
												color: 1a386a;
												font-size: 23px;  
												font-family:arial;   
												color:#c51d20;
												border-top:1px solid #ccc; 
												border-bottom:1px solid #ccc; 
												padding: 15px 0px 15px 0px; 
												line-height: 1;
												font-weight:bold;
											}
											.text-2{ 
												font-weight:bold;
											}
											.image{ 
												padding-bottom:20px;
												padding-top:20px;
											}
											.container-1{
												border: 1px solid #f4f3f2;  
												padding: 10px;
											}
											table.table-1 {
											    width: 100%;
											    padding-bottom: 10px;
											}
											 

											td.logo {
											    width: 50%;
											}

											td.logo img {
											    float: right;
											} 

										</style>
									<!-- BODY -->
									<table class='body-wrap'>
										<tbody><tr>
											<td></td>
											<td class='container' bgcolor='#FFFFFF'>

												<div class='content'>
												<table>
													<tbody><tr>
														<td class='container-1' style='border: 1px solid #f4f3f2; padding:10px;'> 
																  <div class='header-1'> 
																  <center> 
												                    
												                        <table border='0' cellspacing='0' cellpadding='0' class='table-1'> 
																		   <tbody> <tr> 
																			    <td class='logo'> 
																					<div style=' /* border: 1px solid red; */  padding-right: 10px; '> 	
																					 	<a href='fashionsponge.com' target='_blank'>
																			       			<img src='http://test.fashionsponge.com/fs_folders/images/genImg//blue-logo.png' style='height:30px;'>
																			      		</a> 
																					</div> 
																		    	</td> 
																				<td> 
							 												<div style=' border-left: 1px solid rgb(204, 204, 204); height: 20px; '> </div> 
									                                         </td> 
									                                         <td class='text'> 
																	          	<div style='color:#1a386a; font-size: 12px;font-weight:bold;margin-top: 0px;padding-left: 10px;/* border-left: 1px solid red; */'> 
																	          		FASHION AND ALL THE FIXINGS. 
																	        	</div>
																		       </td>  												             
																			</tr></tbody>
																		</table> 
															  	</center></div> 
													<center> 
														<h3 class='text-1' style='color: #c51d20;font-size:23px; border-bottom: 1px solid #f4f3f2;border-top: 1px solid #f4f3f2;padding: 15px 0px 15px 0px;line-height: 1;font-weight: bold;'> FINALLY, SOMETHING COOL FOR BLOGGERS. </h3>
													</center> 
													<div class='lead'> 
													  <p class='text-3'> Hey,   </p>
													  <p>
													  My name is <b> Mauricio </b>, my reason for emailing you is really very straight forward.  I am a fan of your blog and it's unfortunate that great contents like yours is not being seen by the masses. I created Fashion Sponge so bloggers who create compelling content could get the exposure they deserve. Now that I am days from launching my private beta, I knew I wanted to personlly invite you to join. 
													  </p></div> 
													 <div class='lead'> 
															<p class='text-2'> <b> WHAT IS FASHION SPONGE? </b> </p>   
														  	<p>
																Fashion Sponge is the best place to post or discover whats fashionable in Fashion, Beauty, Lifestyle, Technology and Entertainment by people who share your interest. click <a style='color: #284372;text-decoration: underline;' href='fashionsponge.com/signup' target='_blank'> here </a> to learn more.
														  	</p> 								 
													</div> 
													<div class='lead'> 
														<p>
					                                 		 <span style='color: black;'>  
						                                        Mauricio | Founder &amp; Creative Director  <br>
						                                        <a style='color:#b01e23'>Mauricio@fashionsponge.com</a> 
						                                  	</span>
														 </p>
 													</div> 
													<div style='border-top:1px solid #f4f3f2;border-bottom:1px solid #f4f3f2; padding-top: 15px; padding-bottom: 15px;font-size: 23px;font-family:arial; color:#c51d20 ;text-align: center;line-height: 1;'> 
														<b>  'This is not a site. It's a discovery engine.  Discover and get discovered.' </b>  
													</div>
													 
													<!-- A Real Hero (and a real human being) -->
													<p class='image'>
														<a href='fashionsponge.com' target='_blank'>
															<img src='http://test.fashionsponge.com/fs_folders/images/genImg/email-screenshots.png'></a></p><!-- /hero --><a href='fashionsponge.com' target='_blank'> 
														</a>
							  						<!-- footer  !-->  
							  							<div style='border-top:1px solid #f4f3f2;border-bottom:1px solid #f4f3f2; padding-top: 15px; padding-bottom:10px;font-size: 23px; &nbsp;'> 
										                    <center> 
										                    <span style='font-family:arial; color:#c51d20;'>
										                        <b style='font-size: 23px;'>SIGN UP NOW. SPACE IS LIMITED<br></b>
										                      <b style='font-size:12px;color:#000;font-family: arial;'>
															  SIGNING UP TAKES ONLY 10 SECONDS.

															</b>  
										                    </span><br> 
										                    <a href='fashionsponge.com/signup' target='_blank'>
										                    	<img style='width:auto;margin-top: 10px;cursor: pointer;height: 30px;' src='http://test.fashionsponge.com/fs_folders/images/genImg/sign-up.png'> 
										                    </a>
										                    </center> 
										                </div> 
															<div style='padding-top: 40px; text-decoration:none; text-align: center;'>

														  <p>
																This invitation was sent to <a style='color:#b01e23'>$to</a>  If you don't want to receive emails from Fashion Sponge in the future, click <a style='color: #284372;text-decoration: underline;' href='http://fashionsponge.com/remove-email' target='_blank'> here </a>  to remove your email.
														  </p>

														</div> 
													<!-- Callout Panel -->
													<!-- /Callout Panel --> 		
													<br>
													<br>		 			
													<!-- social & contact -->
													<!-- /social & contact --> 
												</td>
											</tr>
										</tbody></table>
										</div> 			
									</td>
									<td></td>
									</tr>
									</tbody></table><!-- /BODY -->   
								 	</body>
								 </html> ";   
		echo $body; 
		
	?>