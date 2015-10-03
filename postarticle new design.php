<?php 
	require("fs_folders/php_functions/connect.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php");
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");
	$_SESSION['post_a_look_is_look_upload_once_in_db'] = false 
 	// $mc = new myclass();
  	// $mc->automatic_insert(5);
  	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>		
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>FashionSponge - Don't Just Dress. Dress Well. #DJDDW</title>
			 <meta name="description" content=" FashionSponge is the easiest and fastest way to find fashion inspiration, fashionable people, blogs, brands, post your outfit of the day and get style advice." />
			 

		<!-- new online job -->
					
			<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
			<!-- <title>Employer And Job-Seeker Log-In | OnlineJobs.PH</title>
			<link rel="shortcut icon" href="fs_pages/images/logo/weblogo.png" type="image/x-icon" />
			<meta name="description" content="Log-in page for employers and job seekers registered on OnlineJobs.PH" />
			<meta name="keywords" content="" />
			<meta name="robots" content="index,follow" /> -->

			
			<!-- http-meta -->
			<!-- <meta http-equiv="Content-Language" content="en" />
			<meta http-equiv="Content-Script-Type" content="text/javascript" />
			<meta http-equiv="Content-Style-Type" content="text/css" /> -->
			<!-- page-metadata -->
			<!-- <meta name="homedesc" content="OnlineJobs is a site dedicated to all Filipinos looking for jobs online, and employers looking to hire Filipinos." />

			<meta name="publisher" content="OnlineJobs" />
			<meta name="copyright" content="Copyright (c) 2009 - 2013  Onlinejobs.ph" />

			<meta name="robots" content="index,follow" />
			<meta name="revisit-after" content="3 days" />
			<meta name="google-site-verification" content="nTGsUgmmQEF1iB-s-4D5mBwAMxHIbViQnanlPvefGCs" /> -->
		<!-- new online job -->

 

		<!-- new fonts -->
			<link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_bold_macroman/stylesheet.css">
		    <link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_light_macroman/stylesheet.css">
			<link rel="stylesheet" type="text/css" href="fs_folders/style/fonts/miso_regular_macroman/stylesheet.css">
		<!-- end fonts -->
 
 		<!-- new plugin  -->
			<script type="text/javascript" src='fs_folders/js/jquery-1.7.1.min.js'> </script>
			<script type="text/javascript" src='fs_folders/js/function_js.js'></script>
		<!-- new plugin  -->

			<!-- new home -->
			<link rel="stylesheet" type="text/css" href="fs_folders/index_home/home_css/home.css">
			<link rel="stylesheet" type="text/css" href="fs_folders/modals/latest_modals/modal.css" >
			<script type="text/javascript" src='fs_folders/index_home/home_js/home_ajax.js'> </script>
			<script type="text/javascript" src='fs_folders/index_home/home_js/home_query.js'> </script>
		<!-- end home -->

		<!-- new local css -->
			<link rel="stylesheet" type="text/css" href="fs_folders/postarticle/postarticle_style/postarticle.css">
		<!-- end local css -->
	</head>
	<body onload="init('<?php echo $_GET['fs_home_tab']; ?>')"   >
		<?php include_once("fs_folders/google_analytics/analyticstracking.php") ?>
 		<div id='main_wrapper' > 
 			<div id='wrapper_head'> 
 			</div>
	 		<div id='main_container' >
 
	 			<!--  new header  -->
 
		 				<script type="text/javascript" src="fs_folders/page_header/js/header1_query.js"></script>
						<script type="text/javascript" src="fs_folders/page_header/js/header1_js.js"></script>
			 			<link rel="stylesheet" type="text/css" href="fs_folders/page_header/css/header1.css">
		 				<?php require("fs_folders/page_header/header1.php"); ?>
	 			<!-- end header -->
 
		 		<div id='body_wrapper'> 
		 			<div id='body_container'> 
	 					<table border="0" id="table_wrapper_body" >   
				 			<tr> 
				 				<td id='bct1_td1' >   
					 				<div id='body_menu'> 
 
					 				</div> 	<!-- end body menu  -->
								</td>
							<tr> 
								<td  style='display:block' > 
					 				<div id='body_banner'> 
					 					<table border="0" cellpadding="0" cellspacing="0"> 
						 					<tr> 
						 						<td> <span>ADVERTISEMENT</span> </td> 
						 					<tr>
						 						<td> <center> <img src="fs_folders/images/ads/banner.png" > </center> </td>
					 					</table>
						 			</div>  <!-- end body banner -->
					 			</td>
					 		<tr>
					 			<td id="title_field">
					 				<table border="0" width="900px" > 
						 				 <tr>  
						 				 	<td width="270">  <span id="t1"> POST ARTICLE </span>  </td>
						 				 	<td>  
						 				 		<span id="d1" > 
						 				 			You can post article via link or upload  a 
						 				 			You can post article via link or upload  a 
						 				 			You can post article via link or upload  a  
						 				 		</span>  
						 				 	</td>
					 				</table>		
					 			</td> 
					 		<tr> 
					 			<td id="search_field" >
						 			<table> 
						 				<tr>
						 					<td> 
						 						<span id="d1"> Paste Article URL (link) into field </span>	
						 					</td>
						 				<tr> 
						 					<td> 
						 						<input id='article_url_field'  type='text' value='' name='articleLink'  onkeyup='send_article_url("typing")'   placeholder='URL' /> 
											</td>  	
						 			</table>
					 			</td>
				 			<tr>
								<td id="td_body_content" >   
						 			<div id='body_content'>

										<div id="article_right_content"> 
											<div id="article_video_next" > 
							 					<img src="fs_folders/images/header/reg_next1.png" > 
							 				</div>
							 				<div id="article_video_prev"> 
							 					<img src="fs_folders/images/header/reg_prev1.png" > 
							 				</div>
 
					 						<div id="article_video_res"> 
						 						<iframe 
						 							width="350" height="350" src="//www.youtube.com/embed/wTpjjxCfWq0" 
						 							frameborder="0" allowfullscreen>
						 						</iframe>
						 					</div> 
						 				 
						 				</div> 	

						 				<div id="article_left_content"> 
						 					<div id="article_img_next" > 
							 					<img src="fs_folders/images/header/reg_next1.png"   width="250"  > 
							 				</div>
							 				<div id="article_img_prev"> 
							 					<img src="fs_folders/images/header/reg_prev1.png"   width="250"   > 
							 				</div>
						 					<div id="article_img_res"> 
						 						<img src="fs_folders/images/posted articles/37.jpg" > 
						 					</div> 
						 			 
						 				</div> 	
						 			</div> 
					 			</td>
					 		<tr>
					 			<td id='moretd'> 
					 			 
					 			</td>
			 			</table>
		 			</div>
		 		</div> <!-- end body wrapper -->
		 		<div id="footer"> 
		 			footer 

		 		</div>
	 		</div> <!-- end main container -->
	 	</div>  <!-- end main wrapper -->
	</body>
</html>