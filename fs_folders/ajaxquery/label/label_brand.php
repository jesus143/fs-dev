<?php 
	require("../../php_functions/connect.php");
	require("../../php_functions/function.php");
	require("../../php_functions/myclass.php");
	// require("../../php_functions/library.php");
	// require("../../php_functions/source.php");

   
	$bkeyword = $_GET['bkeyword'];   

	$brand = selectV1(
		'*',
		"fs_brands",
		null,
		'order by bno desc',
		'limit 10',
		array(
			"rowName"=>"bname",
			"keySearch"=>$bkeyword
		)
	);     





 ?> 


 	 
 	<div id="new-postalook-brand-dropdown" >   
 		<ul >
 			<?php  
 			$c=0;
 			if ( count($brand) == 0 )  
 				echo "<li >  No Results Found.. </li>";   
 			else 
	 			for ($i=0; $i < count($brand); $i++) {  
	 				$bname = $brand[$i]['bname'];
	 				$c++; ?>
	 				<li onclick="click_selected_brand_from_dropdown ( '<?php echo $bname; ?>' , <?php echo $c; ?> )" ><?php echo $bname; ?></li> 
	 			<?php } ?>
 		</ul> 
 	</div> 
 
 





