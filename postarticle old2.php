<?php 	
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php"); 


// article_Id
// mno
// article_title
// article_description
// article_tags
// article_topic
// article_source_url
// article_dateuploaded

	$mc = new myclass();
	$pa = new  postarticle( );
	 

	 $pa->post_article( $mc );



 









 
?>





<!DOCTYPE html>
<html>
	<head>

		<!-- new fonts -->
			<link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_bold_macroman/stylesheet.css">
		    <link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_light_macroman/stylesheet.css">
			<link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_regular_macroman/stylesheet.css">
		<!-- end fonts -->

				<!-- new home -->
			<link rel="stylesheet" type="text/css" href="fs_folders/index_home/home_css/home.css">
			<link rel="stylesheet" type="text/css" href="fs_folders/modals/latest_modals/modal.css" >
			<script type="text/javascript" src='fs_folders/index_home/home_js/home_ajax.js'> </script>
			<script type="text/javascript" src='fs_folders/index_home/home_js/home_query.js'> </script>
		<!-- end home -->
			<link rel="stylesheet" type="text/css" href="fs_folders/page_header/css/header1.css">
		

		<!-- new plugin  -->
			<script type="text/javascript" src='fs_folders/js/jquery-1.7.1.min.js'> </script>
			<script type="text/javascript" src='fs_folders/js/function_js.js'></script>
		<!-- new plugin  -->



		<!-- new local plugin -->
			<script type="text/javascript" src='fs_folders/postarticle/postarticle_js/postarticle_ajax.js'></script>
			<script type="text/javascript" src='fs_folders/postarticle/postarticle_js/postarticle_query.js'></script>
		<!-- end loca plugin -->

		<title> FS | post article </title>
		<link rel="stylesheet" type="text/css" href="fs_folders/postarticle/postarticle_style/postarticle.css">
	</head>
	<body  onunload="init()" >
		<form action="postarticle" method="POST" > 
		 	<div id='sya_container' > 	
			 	<table id='body_table' border="1">
				 	<tr> 
				 		<td id="td_header"> 
					 	
			 				<?php require("fs_folders/page_header/header1.php"); ?>
				 		</td> 
				 	<tr>
					 	<td id="td_body_header" > 




					 		<center>
								<span  id='sya_headtext'> SHARE YOUR ARTICLE OR MIDEA  </span> <br><br> 
								<input id='article_url_field'  type='text' value='' name='articleLink'  onkeyup='send_article_url("typing")'   placeholder='URL' /> 
								<table border='0' cellpadding='20' >
									<tr> 
										<td> <input  id='article_cancel' type='button' value='cancel' name='submit' onclick='Go("home")'   /> </td>
										<td> <input  id='article_send_url' type='button' value='search'   onclick='send_article_url("search")' /> </td>
								</table>
								<div id='article_loader' style='visibility:hidden' >
				 					<img src="fs_folders/images/attr/loading 2.gif"> 
			    				</div>
							</center>
							<center> 
							 	<div id='article_total_result' style="visibility:hidden" > 
							 	  	<span> 
							 	  		Total article found is 0
							 	  	</span>
						 		</div>
					 		</center>
							 <hr id='line' >
							 <br><br> 
					 	</td>
				 	<tr>  
					 	<td id="td_body"  > 
							<div id='body_content'>
								<div id="article_right_content"> 
				 					right
				 				</div> 	
				 				
				 				<div id="article_left_content"> 
				 					<img src="fs_folders/images/posted articles/37.jpg"  width="250"  >

				 				</div> 	
					  			 
				 				

				 			

				 			</div> 
				 			<br>

				 			<input id="img_source_num" type="text" name="img_source_num" value="0" style="display:none" />
						</td>
					<tr>  
						<td id="td_footer" >
							<div id='article_description_title_c'> 	
								<hr id='line_second' >  <br> 
								<table id='article_description_title_t' border="0" cellpadding="0" cellspacing="0" > 
									<tr>
										<td> <center> <span     id='article_text_title'  > ARTICLE & DESCRIPTION </span>  </center> <br> </td> <tr>  
										<td> <input    id='article_title' type="text" name="article_title" maxlength="100"  /> <br><br>  </td> <tr>

										<td> <textarea id='article_description'name="article_description" maxlength="200"  > </textarea> <br><br> </td> <tr> 
										<td> <center> <span     id='article_text_title' > TAG AND CATEGORIZE ARTICLE </span> </center> <br>  </td> <tr>
										<td> 
											<table id='article_tag_cat_t' border="0" cellpadding="0" cellspacing="0" >
												<tr>  
													<td width="600" > 
														<input id='article_tags' type="text" name ="article_tags" placeholder='TAGS' 
														value="#tag1 , #tag2 , #tag3 , #tag4 , #tag5 , #tag6 , #tag7 , #tag8"> 
													</td>
													<td> 
														<select id='article_category' name = "article_category" >  
															<option> TOPIC1 </option>
															<option> TOPIC2 </option>
															<option> TOPIC3 </option>
															<option> TOPIC4 </option>
															<option> TOPIC5</option>
															<option> TOPIC6 </option>
														</select>
													</td>
											</table> 
										</td> 
								</table>
								<br> 
								<span> SHARE THIS ON: </span>
								<br><br>
								<table border="0" cellpadding="0" cellspacing="0"  width="100%"   > 
								<tr>  
									<td width="200" > 
										<table border="0" cellpadding="0" cellspacing="0" > 
											<tr>
												<td>  <img src="fs_folders/images/footer/footer/facebook.png"> </td> <td id="hidden" >--</td>
												<td>  <img src="fs_folders/images/footer/footer/twitter.png"> </td> <td id="hidden" >--</td>
												<td>  <img src="fs_folders/images/footer/footer/tumblr.png"> </td> 
												<tr> 
												<td>  <input type="checkbox" >  </td> <td  id="hidden" >--</td>
												<td>  <input type="checkbox" >  </td> <td  id="hidden" >--</td> 
												<td>  <input type="checkbox" >  </td> 
										</table>
						 			</td>
						 			<td> 
						 				<input id="article_post_now" name="submit" type="submit" value="POST" onclick="" ='Go("home")'  /> 
						 			</td>
								</table>
							</div>
						</td>
					
			 	</table>
					<ul id="article_res" style='possition:absolute' > 
						this unlisted array! 
					</ul>
			</div>
		</form>
	</body>
</html>
 
 