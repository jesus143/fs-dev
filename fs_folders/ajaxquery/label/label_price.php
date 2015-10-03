 




 <?php 
 	$price = array('10','20','30','40','50','60','70','80','90','100','150','200','250','300','350','400','450','500','over 500','over 1000'); 		
 	
 		echo "
 		<div id='ajax_div_container'>
 		<span id='x' onclick='close_x()'  title='(close)' >x</span>
 		</BR>
 		 <CENTER>PRICE</CENTER> 
 		 
			<table border=0 cellpadding=0  > 
		";
		$c =0;
 		for ($i=0; $i <count($price) ; $i++) { 
 			$c++;
 				$b=$price[$i];
 				
 			if ($c%9==0) {
 				echo'<tr>'; 					
 			}
 			else { 
 				echo "<td> <span  onclick='get_clicked_price(\"$b\")' >  $b </span></td> ";
 			}
 		}
 		echo "
 			</table>
 		</div>";	
 		 
 ?>
 






