 <?php 
	require("fs_folders/php_functions/connect1.php");
	require("fs_folders/php_functions/function.php");
	require("fs_folders/php_functions/myclass.php"); 
	require("fs_folders/php_functions/library.php");
	require("fs_folders/php_functions/source.php");
	$mc  = new myclass( );
	 
	// echo " all ads connected here and redirect to their original websites and must be saved also to fs database in order to records the ads stat.";

	$ads_location = str_replace(" ",".", $_GET["loc"]); 
	$mc->get_visitor_info( "" , " [ advertisement clicked ] = link $ads_location " , "home" );  
	$ads_location = $mc->generate_url( $ads_location );
?>

	<?php  
			// $mc->header_attribute( 
 		// 		"Fashion Sponge | OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration " , 
 		// 		"FASHION SPONGE IS THE EASIEST AND FASTEST WAY TO... Show your OOTD, see the lastest trends, discover new fashion blogs, get beauty and style tips and get fashion inspiration.",
 		// 		"OOTD | Trends | Fashion Blogs | Beauty Tips | Fashion Inspiration "
 		// 	); 


			$mc->go($ads_location);



 			?>


