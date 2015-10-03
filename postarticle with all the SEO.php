 <?php 	
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");   
 	$mc = new myclass();  


	//require('http://localhost/fs/new_fs/alphatest/fs_folders/ckeditor/samples/replacebyclass.html'); 
	//$base_url = 'http://localhost/fs/new_fs/alphatest'; 
 	$base_url = 'http://dev.fashionsponge.com'; 

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
  
 
 
 
	// $_SESSION['article_image'] = array(
	// 	'http://cdn.sheknows.com/authors/profile/headshot_chrissy_callahan.jpg',
	// 	'http://cdn1-www.thefashionspot.com/assets/uploads/2014/07/tanktop-p-230x338.jpg',
	// 	'http://cdn.sheknows.com/articles/2014/07/get-the-look-kate-hudson-collage.jpg',
	// 	'http://cdn3-www.thefashionspot.com/assets/uploads/2014/08/kristin-k-wardrobe-p-230x338.jpg',
	// 	'http://ris.fashion.telegraph.co.uk/RichImageService.svc/imagecontent/1/TMG11012461/l/VB-GETTY-MAIN_2996628a.jpg',
	// 	'http://ris.fashion.telegraph.co.uk/RichImageService.svc/imagecontent/1/TMG11000372/v/AW14DetailP-344_2991437a.jpg'
	// );

	// $_SESSION['article_video'] = array(
	// 	'//www.youtube.com/embed/Fi2R0IlCXlA',
	// 	'//www.youtube.com/embed/Qtvrc1PE9vs',
	// 	'//www.youtube.com/embed/XIiU9zh5hf8',
	// 	'//www.youtube.com/embed/CdOOxuQii_s'
	// ); 

 
	// $_SESSION['current_index_video'] = 0;
	// $_SESSION['current_index_image'] = 0;  
	// $_SESSION['source_url']          = null;
	// $_SESSION['source_item']         = null;	 




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

	$modal['style'] = 'display:block;';

	// This isset(var)		 thefashionspot mailparse_determine_best_xfer_encoding(fp) walay off communication		 

	// echo " this is the best part of the article <br>";

	# intialized data  

		$modal['title']   		 = ''; 
		$modal['description']    = ''; 
		$modal['category'] 		 = ''; 
		$modal['topic']    		 = ''; 
		$modal['keyword']  		 = ''; 
		$modal['cstyle']         = 'height:auto;'; // container style  
		$modal['dstyle']         = 'padding-top:0px;';
		$method 				 = 'not edit';
		$table_id                = 1;


		if( $method == 'edit' ):  

			$modal['style'] = 'display:none;';

			# get article info 

			$response = $mc->fs_postedarticles( array(  'aticle_type'=> 'select', 'limit_start'=>0, 'limit_end'=>1,  'where'=>"artno  = $table_id" )  );    
			$modal['title']   		 = $response[0]['title']; 
			$modal['description']    = $response[0]['description']; 
			$modal['category'] 		 = $response[0]['category']; 
			$modal['topic']    		 = $response[0]['topic']; 
			$modal['keyword']  		 = $response[0]['keyword'];   
			$modal['cstyle']         = 'height:auto';
			$modal['dstyle']         = 'padding-top:5%';

		endif;  



		

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


	<body style="padding:0px;" >     
										<!-- new plugin  -->
										   <script type="text/javascript"> 
									   			$(document).ready(function( ) {
										 			// mouse over to the video for next prev 
											 			mouseOver_elemShow_mouseOut_elemHide_v1( '#container-vid' , '#container-vid' , '#postarticle-next-prev-video' ); 
											 		 	mouseOver_elemShow_mouseOut_elemHide_v1( '#container-img' , '#container-img' , '#postarticle-next-prev-image' );  
										 		 	// select image for article
											 			function readImage1(file) { 
													        var reader = new FileReader();
													        var image  = new Image(); 
													        reader.readAsDataURL(file);  
													        reader.onload = function(_file) {
													            image.src    = _file.target.result;              // url.createObjectURL(file);
													            image.onload = function() {
													                var w = this.width,
													                    h = this.height,
													                    t = file.type,                           // ext only: // file.type.split('/')[1],
													                    n = file.name,
													                    s = ~~(file.size/1024) +'KB';       
													               		if ( w >= 100 &&  h >= 100) { 
														               		var imagestyle = get_image_style( h , w , 300 , 250 );   
													               			document.getElementById('content-image').innerHTML = '<center><img src="'+ this.src +' " style="position:relative;cursor:pointer;'+imagestyle+';z-index:120; ";   onclick=\"$(\'#ariticle_image_file\').click( );\" title=\"click to change\" > </center>'; 
														               		$('#new-postalook-file-upload-stat-display').text(n);	 
														               		$('#article-upload-image').val(1);	 
														               		
														               		$('#content-nofound-image').css('display','none');    
														               		article_nex_prev( 'select-article-modal' , 'image' , 'fs-general-ajax-response' , '' , 'event' );  
											 		               		} 
											 		               		else{
											 		               			document.getElementById('content-image').innerHTML = '';
											 		               			$('#content-nofound-image').css('display','block');  
											 		               			alert('Sorry We accept only size of 100 x 100 and above but you have '+w+' by '+h+' please try another look.' ); 
											 		               		}   
													            };
													            image.onerror= function() {
													                alert('Invalid file type: '+ file.type );
													            };      
													        };  
													    }
													    $("#ariticle_image_file").change(function (e) { 
													    	 


													        if(this.disabled) return alert('File upload not supported!');
													        var F = this.files; 


													        // alert( F.length ); 


													        if ( F.length > 0 ) { 
													        	if(F && F[0]){ 
													        		for(var i=0; i<F.length; i++){   
													        			readImage1( F[i] );
													        		}
													        	}
													    	}
													    	else{ 
													    		document.getElementById('content-image').innerHTML = '';
											 		        	$('#content-nofound-image').css('display','block');  
											 		        	$('#article-upload-image').val(0);	 
													    	}
													    }); 
										 		})  
										   </script>
										<!-- new plugin  --> 
										<center> 
											<div style="background-color:white;width:910px;  border-radius:5px;" >
									 			<div id="postarticle-container" style="position:relative;padding:0px; border-radius:5px; margin:0px;width:890px;padding:7px;<?php echo $modal['cstyle']; ?> " > 
										 			<table  id="postarticle-main-table" border="0" cellpadding="0" cellspacing="0" style="width:890px;" >
                                                        <tr>
                                                            <td>
                                                                <div id="category-table" ></div>
                                                            </td>
                                                        </tr>
										 				<tr> 
										 					<td id="postarticle-header" >  </td>	
										 				<tr>

										 					<td id="postarticle-title-message" style="display:none"  > 
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
										 					<td id="postarticle-url-field" style="padding-top:0px;<?php echo $modal['style']; ?>" >   
										 						<center>
																	<div style="padding-top:5px;" >   
																		 <?php $mc->image( array( 'type'=>'loader' , 'id'=>"postarticle-search-field-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?> 
																	</div> 
																</center> 
										 					</td>	
										 				<tr>
										 					<td id="postarticle-select-image-or-video" style="<?php echo $modal['style']; ?>" >  
											 					<div id='container-img-vid-container'  >   
											 							<div>
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
										 										 		<li>  
									 										 				<img   
																								id="postarticle-upload-video" 
																								src="fs_folders/images/post/play.png"  
																								onmousemove=" mousein_change_button ( '#postarticle-upload-video' , 'fs_folders/images/post/play-mouse-over.png' )" 
																								onmouseout="mouseout_change_button (  '#postarticle-upload-video' , 'fs_folders/images/post/play.png' ) " 
																							/> 
										 										 		</li>

										 										 		<li> <div class="fs-text-blue" > <!-- No Video found --> </div> </li> 
										 											</ul>  
										 										</center>
										 									</div> 
										 									<div id="content-video"  >
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


										 									<div id="article-url-field"> 	 
										 										<label>Paste Featured Youtube Video Link</label>
														 						<input type="text" placeholder="" id="article_url_field" onkeyup="article_nex_prev ( 'search' , '' , 'fs-general-ajax-response' , 'postarticle-search-field-loader' , event ) ">  
													 						</div>
										 								</div>   
										 								<div class="postarticle-or" >
										 									Or
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
                                                                                            <li> <input type="hidden" value="2-article-lover-this-is-my-title-300x400" id="file-name" name="fileName" > </li>
                                                                                            <li> <input type="hidden" value="this-is-the-url-fashion" id="file-url" name="fileUrl" > </li>
											 										 		<li>  
											 										 			<img   
																									id="postarticle-upload-image" 
																									src="fs_folders/images/post/upload-article.png" 
																									onclick="$('#ariticle_image_file').click( );" 
																									onmousemove=" mousein_change_button ( '#postarticle-upload-image' , 'fs_folders/images/post/upload-article-mouse-over.png' )" 
																									onmouseout="mouseout_change_button (  '#postarticle-upload-image' , 'fs_folders/images/post/upload-article.png' ) " 
																								/> 
											 										 		</li>
											 										 		<li> <div   class="fs-text-blue" > <!-- No images found  --></div> </li>
											 										 		<li> 
											 										 			<div id="postarticle-upload-browse" >
												 										 			<label>Upload Featured Image</label>
												 										 			<img  src='<?php echo "$mc->genImgs/postarticle-upload.jpg"; ?>' id="avatar-right-uploadprofile"  onclick="$('#ariticle_image_file').click( );"   />   
											 										 			</div>
											 										 		</li> 
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
										 					<td style="display:none;" >
										 						<input type="text" value="image"  id="article-upload-selected"    >
										 						<input type="text" value="image content"  id="article-upload-image" >
										 						<input type="text" value="video content"  id="article-upload-video" >
										 					</td>
										 				<tr>
											 				<td style="padding-top:20px;"> 
											 				</td>  
											 			<tr>
											 				<td  class="postarticle-title-and-link-td" >   
											 					<table> 
											 						<tr> 
											 							<td> 
											 								<div id="article-title-container" > 
																				<div>  
																					<label>Article Title</label>  																			
																				</div>					
																			 	<table style="background-color: white; "> 
																			 		<tbody>
																			 			<tr> 
																					    <td> 
																					        <input type="text" name="article_title" id="article-title" onkeyup="article_seo(this)" max="70" min="0" value="">
																				        </td> 
																				        <td>  
																					        <div id="article-title-counter" class="counter">  
																					        	<counter style="color: rgb(0, 128, 0);">56</counter> / 70 characters 
																					        	<rating><b style="color:green">  </b></rating>
																					        </div> 
													    								</td>  
													    							</tbody>
													    						</table>  
													 						</div> 
											 							</td>
											 							<td> 
											 								 <div> <label> Link to article </label> </div>  
											 								 <input type="text" id="postarticle-link-to-article" />
											 							</td>
											 					</table>  
										    				</td> 
										    			<tr> 
										    				<td class="postarticle-category-topic-and-tags-td" >  
							    								<table  border="0" cellpadding="0" cellspacing="0" >  
								 									<tr> 
								 										<td>  
								 											<div>
								 												Category
								 											</div>  
								 										</td>
								 										<td>
								 											<div>
								 												Topic
								 											</div>  
								 										</td>  
								 										<td> 
										 									<div>
										 										Keywords
										 									</div> 
										 								</td>  
										 							<tr> 
										 								<td class="postarticle-category-td" >
										 									<div>
									 											<select onchange="postarticle_select_category( ) " id="postarticle-change-category"  style="padding:5px; width:100%; "  > 
									 											 
										 											<option value="Select"        <?php if( $modal['category'] == 'Select'        ) { echo "selected"; }  ?> >Select</option>  
								 											 		<option value="Beauty"        <?php if( $modal['category'] == 'Beauty'        ) { echo "selected"; }  ?> >Beauty</option>
								 											 		<option value="Entertainment" <?php if( $modal['category'] == 'Entertainment' ) { echo "selected"; }  ?> >Entertainment</option>
								 											 		<option value="Fashion"       <?php if( $modal['category'] == 'Fashion'       ) { echo "selected"; }  ?> >Fashion</option> 
								 											 		<option value="Lifestyle"     <?php if( $modal['category'] == 'Lifestyle'     ) { echo "selected"; }  ?> >Lifestyle</option>  
								 											 		<option value="Technology"    <?php if( $modal['category'] == 'Technology'    ) { echo "selected"; }  ?> >Technology</option> 
								 											 		<option value="Other"         <?php if( $modal['category'] == 'Other'         ) { echo "selected"; }  ?> >Other</option> 
									 											</select> 
								 											</div>
										 								</td> 
										 								<td class="postarticle-topic-td" >
										 									<div>  
								 												<select id="postarticle-topic" >   
								 													<?php if ( $method == 'edit' ): ?>	
										 												<option value="<?php echo  $modal['category']; ?>" ><?php echo  $modal['topic']; ?></option>
										 											<?php else: ?>
										 												<option>None</option> 
										 											<?php endif; ?> 
								 												</select> 
								 											</div>  
										 								</td> 
										 								<td class="postarticle-tags-td">
										 									<div>	
										 										<table>
										 											<tr> 
										 												<td> 
										 													<?php if ( $method != 'edit' ): ?>
										 														<!-- <div type="text" title="put a comma after word to add tag."  placeholder='Example: winter , spring , summer' id="postarticle-keyword"  onkeyup="article_nex_prev( 'update-keyword' , 'postarticle-keyword' , 'fs-general-ajax-response' , 'postarticle-submit-loader' , event )" /><?php echo $modal['keyword']; ?></div> 		 -->
										 													<?php else: ?>
										 														<!-- <input style="font-size:12px;padding:0px;margin:0px;"  type="text" title="put a comma after word to add tag." placeholder='Example: winter , spring , summer' id="postarticle-keyword"  onkeyup="article_nex_prev( 'update-keyword' , 'postarticle-keyword' , 'fs-general-ajax-response' , 'postarticle-submit-loader' , event )" value="<?php echo $modal['keyword']; ?>" />  -->
										 													<?php endif;?> 

										 													<input type="text"  placeholder='Example: winter , spring , summer' id="postarticle-keyword" onkeyup="article_nex_prev( 'update-keyword' , 'postarticle-keyword' , 'fs-general-ajax-response' , 'postarticle-submit-loader' , event )" /> 

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

										 									<!-- this code is to make the div as editable -->
											 									<script> 
												 									// $('#postarticle-keyword').each(function(){  
												 									// 	this.contentEditable = true;   
												 									// });   


											 									</script>  
										 								</td>
								 								</table>  
										    				</td>
							 							<tr> 
										 					<td id="postarticle-attributes" style="<?php  echo $modal['dstyle'];  ?>"   >

											 					<div style="font-size:20px;font-family:misoRegular; color:#b32727; padding-bottom:10px;display:none" >
											 						Details
											 					</div> 
										 						<table  border="0" cellpadding="0" cellspacing="0" >    
													 				<tr>
														 				<td>

														 					<div id="postarticle-description-preview">
														 						<table>
														 							<tr>
														 								<td>  
														 									<div id="postarticle-description-content" >
																		 						<content>
																								  	Description
																								</content>
																							</div>
														 								</td>  
														 								<td> 
														 									<div id="postarticle-description-counter" >
														 										<counter>
																						    		0 
																						  		</counter>	
														 									</div> 
														 								</td>  
														 								<td> 
														 									/ 
														 								</td> 
														 								<td>
														 									<div id="postarticle-description-counter" >
														 										<rating>empty</rating>
														 									</div>  	
														 								</td>   
														 								<td> 
																						  	<div id="postarticle-description-search-term"> 
																						      
																						       	<text> 
																					         		Search Term
																					         	</text>
																					      
																							      <found>
																							        0
																							      </found>
																							      
																							      <text>
																							        of
																							      </text>
																							      
																							      <total>
																							        12
																							      </total>
																							      
																							      <rating> 
																							      </rating> 
																							</div>  
																					    </td>
														 						</table>
																		</div> 
										 									<div> 
										 										<?php 
									 											    require("$base_url/fs_folders/ckeditor/samples/replacebyclass.html");   
									 											 ?>
										 										<!-- <textarea maxlength='2000' max="2000"  min="0" id="postarticle-description" onkeyup="article_seo(this)" ><?php echo $modal['description']; ?></textarea>   -->


										 									</div>
										 								</td>  
										 						</table> 
										 					</td>	
										 				<tr>
										 					<td style="height:20px;">   
										 					</td>
										 				<tr>
											 				<td id="SEO-preview-td"> 
															    <div id="SEO-preview"> 
																  	<ul> 
																  		<li> 
																		  <div>
																		    <title-1>
																		      	Search Engine Preview
																		  	</title-1>
																		 	<br> <br> 
																		    <title-link id="article-title-view"></title-link> 
																		    <br> 

																		    <label id="perma-link-view-url">www.fashionsponge.com/</label><url id="perma-link-view"></url> 

																		     <br> 
																			    <description id="meta-description-view"></description> 
																		  	<div>  
																		 	</div></div></li><li>  
																		    <title-1> 															         
																		    	Seo Keyword Checker											
																		    </title-1> 			
																			<br><br> 

																			<div id="permalink-status"> 
																		    	<description> Permalink :</description> <status> No </status> 
																		    	<img src="fs_folders/images/genImg/question-mark.png" title="keyword not found in permalink " />
																		    </div> 
																		    <div id="content-status"> 
																		    	<description> Content: </description> <status id="content-status"> No </status>
																		    	<img src="fs_folders/images/genImg/question-mark.png" title="keyword not found in Content " />
																		    </div>
	 

																		    <div id="meta-desc-status">
																		    	<description> Meta Description: </description> <status> No </status>
																		    	<img src="fs_folders/images/genImg/question-mark.png" title="keyword not found in Meta Description " />
																		    </div>
	 

																		    <div id="image-file-status">
																		    	<description> Image File: </description> <status> No </status> 
																		    	<img src="fs_folders/images/genImg/question-mark.png" title="keyword not found in Image File " />
																		    </div> 
	 
																		</li>  
																  	</ul>
																</div>
															</td>   
										 				<tr>
										 					<td id="postarticle-attributes" style="padding-top:0px;"> 
											 					<table border="0" cellpadding="0" cellspacing="0" id="article-attribute-table">
											 						<tbody>
											 						<tr> 						 								
																		<td>
																			<div>																				            
																				<label>Perma Link</label>   
																			</div>    	 
																			<table border="0" cellpadding="0" cellspacing="0" id="perma-link-table" >
																				<tr>
																					<td style="width: 100;color: black;" >   
																						<label>http://www.ashionsponge.com/</label>
																					 </td>
																					 <td>
																					 	<input type="text" name="perma_link" id="perma-link" onkeyup="article_seo(this)" max="100" min="0" value="" />
																					 </td>
																				<tr>
																			</table>
																	<tr> 
																		<td>
																			<div> 
																				<label>Meta Description</label>  
																			</div> 
																          	<table class="postarticle-meta-description-table" >
																				<tr>
																		        	<td id="meta-desc-td" >    					          	
																		         		<input type="text" name="meta_description" id="meta-description" onkeyup="article_seo(this)" max="160" min="0" value="" />

																					</td> 
																				<td>


																				    <div id="meta-description-counter" class="counter" >
																				         <counter> 160 </counter>/ 160 characters
																				          <rating></rating>
																				    </div> 
																				   


																				</td>
																				<table>  
																    	</td>
																    <tr>
																    	<td>
                                                                          	<div>							
																            	<label>Image Title</label>  
                                                                          	</div> 
																	        <input type="text" name="image_title" id="image-title" class='image-title' onkeyup="article_seo(this)"> 
																    	</td>
																    <tr>  	
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

										 						<!-- This is the original code of cancel and post for the article -->

									 						 	<table border="0" cellpadding="0" cellspacing="0" style="margin-top:-40px;display:none"   >
									 						 		<tr> 
									 						 			<td style="width: 100;" > 
									 						 				<a  onclick=" fs_popup( 'close' ) " ><img src="fs_folders/images/genImg/cancel.png" id="new-postalook-upload-button-cancel" />    </a>
									 						 			</td> 
									 						 			<td>   						 				  
																			 <img  src="fs_folders/images/genImg/post.jpg"  id='postarticle-submit' onclick="article_nex_prev( 'submit' , '' , 'fs-general-ajax-response' , 'postarticle-submit-loader' , event , '<?php echo $method; ?>' , '<?php echo $table_id; ?>'  )" />
																	         <!-- <img  src="fs_folders/images/genImg/post.jpg"  id='postarticle-submit' onclick="save_post_data(this)" />     -->
									 						 			</td>  
									 						 			<td> 
									 						 				<center>
																				<div>   
																					 <?php $mc->image( array( 'type'=>'loader' , 'id'=>"postarticle-submit-loader" ,'style'=>'visibility:hidden;height:10px;'  ) ); ?>
																				</div> 
																			</center> 	
									 						 			</td>
									 						 	</table>    

									 						 	<!-- This code is from post a look page popup -->  

									 						 	<div style="border:1px solid none;width:200px; margin-left:0px; margin-top: -20px;" > 
																	<table>
																		<tr> 
																			<td>  
																				<!-- <input type="button" value="cancel" onclick=" fs_popup( 'close' ) " />    --> 
																				<img
																					id="postarticle-cencel"     
																					src="<?php echo "$mc->genImgs/cancel.png"; ?>" 
																					onclick=" fs_popup( 'close' ) " 
																					onmousemove=" mousein_change_button ( '#postarticle-cencel' , '<?php echo "$mc->genImgs/cancel-mouse-over.png"; ?>' )" 
																					onmouseout="mouseout_change_button (  '#postarticle-cencel'  , '<?php echo "$mc->genImgs/cancel.png"; ?>' ) "  
																				/> 
																			</td> 
																			<td>
																				<img  
																					id='postarticle-submit-1' 
																					src="<?php echo "$mc->genImgs/post.png"; ?>" 
																					onclick="article_nex_prev( 'submit' , '' , 'fs-general-ajax-response' , 'postarticle-submit-loader' , event , '<?php echo $method; ?>' , '<?php echo $table_id; ?>'  )" 
																					onmousemove=" mousein_change_button ( '#postarticle-submit-1' , '<?php echo "$mc->genImgs/post-mouse-over.png"; ?>' )" 
																					onmouseout="mouseout_change_button (  '#postarticle-submit-1'  , '<?php echo "$mc->genImgs/post.png"; ?>' ) "  
																				/>  
																			</td> 
																			<td> 
																				<?php $mc->image( array( 'type'=>'loader' , 'id'=>"post-modal" ,'style'=>'visibility:hidden;height:10px;width:10px;'  ) ); ?>
																			</td>
																	</table>
																</div>


										 					</td>
                                                        <tr> 
                                                            <td id="results"> 
                                                            </td>
										 			</table>
									 			</div>  
								 			</div> 

							 			</center>  



	</body>
</html>
 
 