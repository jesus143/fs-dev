<?php

	// echo " key typed = ".$_GET['key_typed']; 
 	
	$a = array('Amusement Park','Baby Shower','BBQ','Beach','Birthday Dinner','Blind Date','Bridal Shower','Brunch','Casual Party','Clubbing','Cocktail','College','Company Event','Conference','Dinner Date','Dinner Party','Everyday','Formal Event','High School','Internship','Interview','Lunch Date','Movie Night','Music Concert','Photo shoot','Picnic','Pool Party','Prom','Romantic Dinner','Theater / Play / Opera','Wedding','Wine Tasting','Work');

	$c=0;	
	echo "<span onclick='close_x()'   class='x_out'  title='(close)' >x</span>";
	echo " <br> <center> <span>Occasion </span></center> <br>";
	 echo "<table border=0>" ;
 									 		 
								 		 
								 		 
	for ($i=0; $i < count($a) ; $i++) { 
		$c++;
		$b=$a[$i];

		echo "<td><p onclick='hide_x_beore_accasion_name(\"$i\");remove_Selected_taggs(\"$b\")'  id='remove_tags_$i' class='remove_tags_occasion'>x</p></td>
										<td onclick='get_clicked_accation(\"$b\",\"$i\")' style=''   >   $b </td>
		";
	
		if ($c%5==0) {
			
			echo "<tr>";
		}
	}

	echo "</table>";
?>
