



 <?php 
 	$pattern = array('Argyle','Camo','Checkered','Houndstooth','Floral','Leopard','Paisley','Pied','Pinstripe','Plaid','Polka-dotted','Stripe','Symmetry','Tiger Stripe','Zebra Print','Zigzag');
 
 		echo "
 		<div id='ajax_div_container'>
 		<span id='x' onclick='close_x()'  title='(close)' >x</span>
 		</BR>
 		 <center>PATTERN</center> 
			<table border=0 cellpadding=0 cellSpacing=2> 
		";
		$c=0;
 		for ($i=0; $i <count($pattern) ; $i++) { 
 			$c++;
 				$b=$pattern[$i];
 			if ($c%9==0) {
 				echo'<tr>'; 					
 			}
 			else { 
 				echo "<td> <span  onclick='get_clicked_pattern(\"$b\")' >  $b </span></td> ";
 			}
 		}
 		echo "
 			</table>
 		</div>";	
 		 
 ?>
 






