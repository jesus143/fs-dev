



 <?php 
 	$material = array('Cotton','Linen','Silk','Wool','Fur','Polyester','Rayon','Nylon','Acrylic','Chambray','Chino','Corduroy','Denim','Khaki','Leather','Lace','Latex','Spandex');
 
 		echo "
 		<div id='ajax_div_container'>
 		<span id='x' onclick='close_x()'  title='(close)' >x</span>
 		</BR>
 		 <CENTER>MATERIAL</CENTER> 
			<table border=0 cellpadding=0 cellSpacing=2> 
		";
		$c=0;
 		for ($i=0; $i <count($material) ; $i++) { 
 			$c++;
 				$b=$material[$i];
 			if ($c%9==0) {
 				echo'<tr>'; 					
 			}
 			else { 
 				echo "<td> <span  onclick='get_clicked_material(\"$b\")' >  $b </span></td> ";
 			}
 		}
 		echo "
 			</table>
 		</div>";	
 		 
 ?>
 






