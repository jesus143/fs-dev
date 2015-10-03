 <?php
 	require("../../php_functions/connect1.php");	
	require("../../php_functions/function.php");
	require("../../php_functions/myclass.php");
	require("../../php_functions/library.php");
	require("../../php_functions/source.php"); 
	$search_res=searchOne('fs_pltag',9,$_GET["purchased_at_type_in"],'plt_purchased_at','10');

	$store=convert_1d($search_res,8);
	$store=remove_duplicate($store);
 	// $store=array('gaisano','mall','unitop','unicity','unitop','unicity','unitop','unicity','unitop',"unicitsdsdy $_GET[purchased_at_type_in]");
 	if (!empty($store)) { 

 		echo "
 		<div id='ajax_div_container'>
			<span id='x' onclick='close_x()' title='(close)' >x</span>
			<table border=0 cellpadding=0 cellSpacing=2> 
		";
		$c=0;
 		for ($i=0; $i <count($store) ; $i++) { 
 			
 			$c++;
 			$b=$store[$i];
 			if ($c%9==0) {
 				echo'<tr>'; 					
 			}else { 
 				echo "<td> <span  onclick='get_clicked_PURCHASED(\"$b\")' >  $b </span></td> ";
 			}
 		}
 		echo "
 			</table>
 		</div>";	
 		}
 ?>
 






