 




 <?php 
$Accessories = array('Bag','Belt','Bra','Bracelet','Cufflink','Earring','Eyewear','Glove','Hat','Leggings','Pocket Square','Purse','Ring','Scarf','Sock','Stockings','Sunglasses','Suspenders','Ties','Tie Clips','Umbrellas','Wallet','Watch');
$Clothing = array('Blazer','Blouse','Bodysuit','Cardigan','Coat','Dress','Dress Pant','Fleece','Hoodie','Jeans','Jacket','Jumper','Leggings','One-Piece','Outerwear','Pants','Romper','Shirt','Shorts','Skirts','Sport Coat','Sweater','Sweatshirt','Bathing Suit','Top','T-Shirt','Vest');
$shoes = array('Boots','Clogs','Dress Shoes','Flats','Heels','Loafers','Pumps','Sandals','Sneakers','Special Occasion','Wedges');


   




  
 		echo "<div id='ajax_div_container' style='padding-top:20px'>
 			<span id='x' onclick='close_x()'  title='(close)' >x</span>
 		";

 		echo "<center>ACCESSORIES</center>
 			
 		";

		echo "<table border=0 cellpadding=0 cellSpacing=2> ";
		$c=0;
 		for ($i=0; $i <count($Accessories) ; $i++) { 
 			$c++;
 			$b=$Accessories[$i];
 			if ($c%9==0) { 
 				echo'<tr>'; 					
 			}
 			else { 
 				echo "<td><span  onclick='get_clicked_garment(\"$b\")' >  $b </span></td> ";
 			
 			}
 		}
 		echo "</table>";
 		echo "<center>CLOTHING</center>";
		echo "<table border=0 cellpadding=0 cellSpacing=2> ";
		$c=0;
 		for ($i=0; $i <count($Clothing) ; $i++) { 
 			$c++;
 			$b=$Clothing[$i];
 			if ($c%9==0) {
 				echo'<tr>'; 					
 			}
 			else { 
 				echo "<td><span  onclick='get_clicked_garment(\"$b\")' >  $b </span></td> ";
 			}
 		}
 		echo "</table>";


 		echo "<center>SHOES</center>";
		echo "<table border=0 cellpadding=0 cellSpacing=2> ";
 		$c=0;
 		for ($i=0; $i <count($shoes) ; $i++) { 
 			$c++;
 			$b=$shoes[$i];
 			if ($c%9==0) {
 				echo'<tr>'; 					
 			}
 			else { 
 				echo "<td><span  onclick='get_clicked_garment(\"$b\")' >  $b </span></td> ";
 			}
 		}
 		echo "</table>";

 		echo "</div>";	
 	
 ?>
 





 
 