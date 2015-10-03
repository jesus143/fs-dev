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
 

	$mc->header_attribute( 
		"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration | Fashion Sponge " , 
		"Fashion Sponge is the easiest & fastest way to: Show your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.",
		"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration "
	);   
  
 
 
 
	$_SESSION['article_image'] = array(
		'http://cdn.sheknows.com/authors/profile/headshot_chrissy_callahan.jpg',
		'http://cdn1-www.thefashionspot.com/assets/uploads/2014/07/tanktop-p-230x338.jpg',
		'http://cdn.sheknows.com/articles/2014/07/get-the-look-kate-hudson-collage.jpg',
		'http://cdn3-www.thefashionspot.com/assets/uploads/2014/08/kristin-k-wardrobe-p-230x338.jpg',
		'http://ris.fashion.telegraph.co.uk/RichImageService.svc/imagecontent/1/TMG11012461/l/VB-GETTY-MAIN_2996628a.jpg',
		'http://ris.fashion.telegraph.co.uk/RichImageService.svc/imagecontent/1/TMG11000372/v/AW14DetailP-344_2991437a.jpg'
	);

	$_SESSION['article_video'] = array(
		'//www.youtube.com/embed/Fi2R0IlCXlA',
		'//www.youtube.com/embed/Qtvrc1PE9vs',
		'//www.youtube.com/embed/XIiU9zh5hf8',
		'//www.youtube.com/embed/CdOOxuQii_s'
	); 

 
	$_SESSION['current_index_video'] = 0;
	$_SESSION['current_index_image'] = 0;  
	$_SESSION['source_url']          = null;
	$_SESSION['source_item']         = null;	 

?> 
<!DOCTYPE html>
<html>
	<head>

		<!-- new fonts -->
			<link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_bold_macroman/stylesheet.css">
		    <link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_light_macroman/stylesheet.css">
			<link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_regular_macroman/stylesheet.css">
		<!-- end fonts -->
		

		<!-- new plugin  -->
			<script type="text/javascript" src='fs_folders/js/jquery-1.7.1.min.js'> </script>
			<script type="text/javascript" src='fs_folders/js/function_js.js'></script>
		<!-- new plugin  -->



		<!-- new local plugin -->
			<script type="text/javascript" src='fs_folders/postarticle/postarticle_js/postarticle_ajax.js'></script>  
		<!-- end loca plugin -->

		 


		<title> FS | post article </title> 
	</head>


	<body  onunload="init()" style="padding:0px;margin:0px;" >  
		<div id="postarticle-container" > 
			<table  id="postarticle-main-table" border="0" cellpadding="0" cellspacing="0" >
				<tr> 
					<td id="postarticle-header" >  </td>	
				<tr>
					<td id="postarticle-title-message" > 
						<table border="0" cellpadding="0" cellspacing="0"  >
							<tr> 
								<td style="width:270px;" > 
									<span> 
										POST AN ARTICLE
									</span>
								</td>
								<td> 
									<div >
										Posting a look is easy... but if you need help click like to watch a video on posting an article. 
									</div>
								</td>
						</table>
					</td>	
				<tr>
					<td id="postarticle-url-field" >  
						<div style="padding-bottom:10px;display:none" > 
							ARTICLE URL 
						</div>
						<div> 	
							<input type="text" placeholder='PASTE ARTICLE URL' id="article_url_field"  onkeyup="article_nex_prev ( 'search' , '' , 'fs-general-ajax-response' , 'postarticle-search-field-loader' , event ) " />
						</div>
						<center>
						<div style="padding-top:10px;" >   
							 <?php $mc->image( array( 'type'=>'loader' , 'id'=>"postarticle-search-field-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> 
						</div> 
					</center> 
					</td>	
				<tr>
					<td id="postarticle-select-image-or-video" >  
 					<div id='container-img-vid-container'  >   
 							<div style="padding-bottom:20px;" >
	 							<form action=""> 
		 						 	<ul id="postarticle-choices"  style="display:none" >
		 						 		<li> 
		 						 			<center>
		 						 				<input type="radio" name="select" value="image" title="select image"    id="postarticle-image-select"       onclick="article_nex_prev( 'select-article-modal' , 'image' , 'fs-general-ajax-response' , '' , event )" checked> click to select ( image ) <br>
		 						 				<!-- <input type="radio" name="sex" value="male">Male<br> -->
		 						 			</center>
		 						 		</li>
		 						 		<li> 
		 						 			<center>
		 						 				<input type="radio" name="select" value="video"  title="select video"   id="postarticle-video-select"         onclick="article_nex_prev( 'select-article-modal' , 'video' , 'fs-general-ajax-response' , '' , event )" >click to select ( video )
		 						 				<!-- <input type="radio" name="sex" value="female">Female -->
		 						 			</center>
		 						 		</li>
		 						 	</ul> 
	 						 	</form> 
 						 	</div>  
								<div id='container-vid' onclick="article_nex_prev( 'select-article-modal' , 'video' , 'fs-general-ajax-response' , '' , event )" >  
									<div style="height:20px;"  > 
 									<ul id="postarticle-status" >
 										<li><div id="stat-video"> </div></li> 
 										<li><div id='counter-video'> </div></li>
 										<li><div id="stat-video-1"> </div></li>  
 										
 									</ul>
									</div>	  
									<div id="content-nofound-video" > 
										<center>
										 	<ul>
										 		<li> <img src='<?php echo "$mc->genImgs/video-play-1.png"; ?>' />   </li>
										 		<li> <div class="fs-text-blue" > <!-- No Video found --> </div> </li> 
											</ul>  
										</center>
									</div> 
									<div id="content-video" >
										<iframe src="asdd" style="display:none" ></iframe>
									</div>   
									<div id="postarticle-next-prev-video-div" style="display:none" >
 									<table id="postarticle-next-prev-video" border="0" cellpadding="0" cellspacing="0"  >
 										<tr> 
 											<td> <div style="float:left; padding-left:20px;font-size:40px;color:white;cursor:pointer"  title="previous" onclick="article_nex_prev ( 'video' , 'prev' , 'content-video' , 'content-video-loader' , event )"  > < </div> </td>
 											<td onclick="choose( 'video' )" > 
 												<center>
 													<div>   
 														<?php $mc->image( array( 'type'=>'loader' , 'id'=>"content-video-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> 
 													</div> 
 												</center> 
 											</td>
 											<td><div style="float:right;padding-right:20px;font-size:40px;color:white;cursor:pointer"  title="next" onclick="article_nex_prev ( 'video' , 'next' , 'content-video' , 'content-video-loader' , event )" > > </div> </td>
 									</table>  
									</div>
								</div>   

								<div id='container-img' onclick="article_nex_prev( 'select-article-modal' , 'image' , 'fs-general-ajax-response' , '' , event )"   >   
									<div style="height:20px;">
 									<ul id="postarticle-status" >
 										<li><div id="stat-image"></div></li>
 										<li><div id='counter-image'></div></li>
 										<li><div id="stat-image-1"></div></li> 
 									</ul>
									</div>	 
									<div id="content-nofound-image" >  
									 	<center> 
									 		<form  action="photo.resize.php?type=upload-article-and-resize" method="POST" enctype="multipart/form-data" id="upload-article" >   
										 		<ul>
										 			 <li> <input type='file' id="ariticle_image_file" name="file" runat="server" style="display:none;"  />  </li>
 										 		<li> <img src='<?php echo "$mc->genImgs/postarticle-image-nofound.png"; ?>' />   </li>
 										 		<li> <div class="fs-text-blue" > <!-- No images found  --></div> </li>
 										 		<li> <img src='<?php echo "$mc->genImgs/postarticle-upload.jpg"; ?>' id="avatar-right-uploadprofile"  onclick="$('#ariticle_image_file').click( );"   />   </li> 
											 	</ul> 
										 	</form> 
										</center> 
									</div>  
									<div id="content-image" ></div>   
									<div id="postarticle-next-prev-image-div" style="display:none" >
 									<table id="postarticle-next-prev-image"    border="0" cellpadding="0" cellspacing="0" >
 										<tr> 
 											<td> <div style="float:left; padding-left:20px;font-size:40px;color:white;cursor:pointer"  title="previous" onclick="article_nex_prev (  'image' , 'prev' , 'content-image' , 'content-image-loader' , event )"  > < </div> </td>
 											<td onclick="choose( 'image' )" > 
 												<center>
 													<div>   
 														 <?php $mc->image( array( 'type'=>'loader' , 'id'=>"content-image-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> 
 													</div> 
 												</center> 
 											</td>
 											<td><div style="float:right;padding-right:20px;font-size:40px;color:white;cursor:pointer"  title="next" onclick="article_nex_prev (  'image' , 'next' , 'content-image' , 'content-image-loader' , event )" > > </div> </td>
 									</table>   
									</div>
								</div>  
 					</div>  
					</td>	
				<tr> 
					<td style="display:none" >
						<input type="text" value="image"  id="article-upload-selected"    >
						<input type="text" value="image content"  id="article-upload-image" >
						<input type="text" value="video content"  id="article-upload-video" >
					</td>
				<tr>
					<td id="postarticle-attributes"  >

 					<div style="font-size:20px;font-family:misoRegular; color:#b32727; padding-bottom:10px;" >
 						Details
 					</div>

						<table  border="0" cellpadding="0" cellspacing="0"  >
							<tr> 
								<td> 
									<div id="postarticle-title-3" >
										Title ( 160 characters max )
									</div>
									<div>
										<textarea  maxlength='160' title="text" id="postarticle-title" style="height:30px;" ></textarea>
									</div> 
								</td> 
							<tr>
								<td>
									<div id="postarticle-title-3" >
										 Description ( 700 characters max )
									</div>
									<div>
										<textarea maxlength='700' id="postarticle-description" ></textarea> 
									</div>
								</td> 
							<tr> 
								<td> 
 								<table  border="0" cellpadding="0" cellspacing="0" >  
 									<tr> 
 										<td  style=" width:250px;" >  
 											<div id="postarticle-title-3" >
 												Category
 											</div> 
 											<div>
	 											<select onchange="postarticle_select_category( ) " id="postarticle-change-category"  style="padding:5px; width:100%; " > 
	 												<option value="Select"        >Select</option>
 											 		<option value="Beauty"        >Beauty</option>
 											 		<option value="Entertainment" >Entertainment</option>
 											 		<option value="Fashion"       >Fashion</option> 
 											 		<option value="Lifestyle"     >Lifestyle</option>  
 											 		<option value="Technology"    >Technology</option> 
 											 		<option value="Other"         >Other</option> 
	 											</select> 
 											</div>
 										</td>
 										<td  style="width:250px; " >
 											<div id="postarticle-title-3" >
 												Topic
 											</div> 
 											<div>  
 												<select id="postarticle-topic" > 
 													<option>None</option> 
 												</select> 
 											</div>  
 										</td>  
 										<td>

		 									<div id="postarticle-title-3" >
		 										Keywords
		 									</div>
		 									<div>	
		 										<table>
		 											<tr> 
		 												<td> 
		 													<div type="text" title="put a comma after word to add tag." value="" placeholder='Example: winter , spring , summer' id="postarticle-keyword"  onkeyup="article_nex_prev( 'update-keyword' , 'postarticle-keyword' , 'fs-general-ajax-response' , 'postarticle-submit-loader' , event )" />  
		 													</div> 		
		 												</td>
		 											<tr>  
		 												<td> 
			 												<div id='postarticle-keyword-dropdown' > 
			 													<center>
				 													<div>
				 														 <?php $mc->image( array( 'type'=>'loader' , 'id'=>"postarticle-suggested-keyword-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> 
				 													</div>
			 													</center>
			 													<!-- <ul>
			 													 	<li  onclick ="article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , 'this is the li 1' , 'postarticle-submit-loader' , event )"  > this is the li 1 </li> 
			 													 	<li  onclick ="article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , 'this is the li 1' , 'postarticle-submit-loader' , event )"  > this is the li 1 </li> 
			 													 	<li  onclick ="article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , 'this is the li 1' , 'postarticle-submit-loader' , event )"  > this is the li 1 </li> 
			 													 	<li  onclick ="article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , 'this is the li 1' , 'postarticle-submit-loader' , event )"  > this is the li 1 </li> 
			 													 	<li  onclick ="article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , 'this is the li 1' , 'postarticle-submit-loader' , event )"  > this is the li 1 </li> 
			 													 	<li  onclick ="article_nex_prev( 'select-keyword-dropdown' , 'postarticle-keyword' , 'this is the li 1' , 'postarticle-submit-loader' , event )"  > this is the li 1 </li> 
			 													</ul> -->
			 												</div>
		 												</td>
		 										</table>
		 										
		 									</div>   
		 									<script> $('#postarticle-keyword').each(function(){ this.contentEditable = true; }); </script>  
		 								</td> 
 								</table>
								</td>
						</table> 
					</td>	
				<tr>
					<td id="postarticle-social-post" style="display:none" >  
						<div id="title" > 
							POST THIS ARTICLE ON:
						</div>

						<table  border="0" cellpadding="0" cellspacing="0" >
							<tr> 
								<td style="width:20px;" >  </td> <td> <div> Facebook </div> </td>
							<tr> 
								<td style="width:20px;" >  </td> <td> <div> Twitter </div> </td>
							<tr> 
								<td style="width:20px;" >  </td> <td> <div> Tumblr </div> </td>
							<tr> 
								<td style="width:20px;" >  </td> <td> <div> Pinterest </div> </td>
						</table>
					</td>	
				<tr>
					<td id="postarticle-post-or-cancel" >  
					 	<table   border="0" cellpadding="0" cellspacing="0"  >
					 		<tr> 
					 			<td> 
					 				<a href="\" ><img src="fs_folders/images/genImg/new-postalook-post-cancel.png" id="new-postalook-upload-button-cancel" />    </a>
					 			</td> 
					 			<td>   						 				  
								<img src="fs_folders/images/genImg/postarticle-post.jpg"  id='postarticle-submit' onclick="article_nex_prev( 'submit' , '' , 'fs-general-ajax-response' , 'postarticle-submit-loader' , event )" />     
					 			</td>  
					 			<td> 
					 				<center>
									<div>   
										 <?php $mc->image( array( 'type'=>'loader' , 'id'=>"postarticle-submit-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> 
									</div> 
								</center> 	
					 			</td>
					 	</table> 
					</td>	 
			</table>
		</div>  
	</body>
</html>
 
 