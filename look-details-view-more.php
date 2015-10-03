<?php   
	require ("fs_folders/php_functions/connect.php");
	require ("fs_folders/php_functions/function.php");
	require ("fs_folders/php_functions/library.php");
	require ("fs_folders/php_functions/source.php");
	require ("fs_folders/php_functions/myclass.php");    

	$mc = new myclass(); 
    $ri = new resizeImage ();   
	$mc->auto_detect_path();  
	$url = $_GET["url"]; 
	$url=str_replace(" ",".", $url); 
	$url=str_replace("http","http:", $url); 
	$plno = intval($_GET['id']);
	  
	$mc->header_attribute( 
		"Fashion Sponge | OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration " , 
		"Fashion Sponge is the easiest & fastest way to: Show your ootd, see the latest trends, discover fashionable people & blogs, get beauty & style tips & find fashion inspiration.",
		"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration "
	);   




	echo " $url "; 
?>    





<html>  
	<head>   
		<script type="text/javascript" src='fs_folders/look-details-view-more/look-details-view-more.js' >  </script> 
		<link rel="stylesheet" type="text/css" href="fs_folders/look-details-view-more/look-details-view-more.css" />
	</head>  
	<body  id="body" >  
 
		<div id="articleview_wrapper" style="display:none" >  
			<div id="fs_menu"> 
				<table border="0" cellpadding="0" cellspacing="0" style="width:100%" style="padding:0px; maring:0px"   > 
					<tr>
						<td tyle='width:50%;' > 
							<a href="\"  >	

								<div style="padding-left:10px;" > 

						    		<img src="fs_folders/images/logo/fs_logo1.png" style="madin-left:20px;" >
						    	</div>

						    </a>	 
						</td>
						<td>    
							<center> 
							 	<table  border="0" cellpadding="0" cellspacing="0" style="width:600px" > 
							 		<tr>  	
							 			<td> 
							 				<span style='font-size:25px;' > 
							 					100 % 
							 				</span> 
							 			</td> 
							 			<td> 
							 				<img src="<?php echo $mc->genImgs;?>/3-star.png"  >
							 			</td>
							 			<td style="color:#ffffff; font-family:arial; font-size:11px;" > 
							 				EXCEPTIONAL STYLING
							 			</td>
							 			<td> 
							 				<img src="<?php echo $mc->path_icons;?>/Drip-Icon.png" title="drips">  
							 			</td>
							 			<td> 
							 				<span style='font-size:11px;' >
							 					9999+
							 				</span>
							 			</td>
							 			<td> 
							 				<img src="<?php echo $mc->path_icons;?>/share-icon.png" title="share" >
							 			</td>
							 			<td> 
							 				<span style='font-size:11px;' >
							 					9999+
							 				</span>
							 			</td>
							 			<td> 
							 				<img src="<?php echo $mc->path_icons;?>/favorite-icon.png" title="favorite"> 
							 	 		</td>
							 	 		<td> 
							 				<span style='font-size:11px;' >
							 					9999+
							 				</span>
							 			</td> 
							 	</table>  
							</center> 
						</td>
						<td style="width:20%; text-align:right; font-size:11px;  " > 
							<a href="lookdetails?id=<?php echo $plno; ?>#a-b">	
								<span style='padding-right:20px;' > 
						    		BACK TO FASHIONSPONGE.COM
						    	</span>
						    </a>	 
						</td> 
				</table> 
			</div>  
			<br><br><br><br>   	
		</div> 
 
		<div id="article_content"  >  
			 	<iframe src="<?php echo "$url"; ?>"></iframe>
		</div>  

		 <?php echo $url; ?>
		
	</body>
</html>